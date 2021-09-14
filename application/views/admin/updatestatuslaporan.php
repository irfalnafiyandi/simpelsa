<div class="page-content-wrapper ">

	<div class="container-fluid">

		<div class="row">
			<div class="col-sm-12">
				<div class="float-right page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Appelsa</a></li>
						<li class="breadcrumb-item"><a href="#"><?php print $title; ?></a></li>

					</ol>
				</div>
				<h5 class="page-title"><?php print $title; ?></h5>
			</div>
		</div>
		<!-- end row -->

		<div class="row">
			<div class="col-12">
				<div class="card m-b-30">
					<div class="card-body">

						<form class="" id="form" action="<?php print base_url('laporanupdatestatusupdate') ?>"
							  method="post">
							<div class="row">
								<div class="col-md-6">

									<input name="id" value="<?php print $detail->id_laporan ?>" type="hidden">
									<div class="form-group">
										<label>Upload File Sampah yang telah diangkut</label>
										<input type="file" class="form-control" required placeholder="Nama" name="file">
									</div>


								</div>
								<div class="col-md-6">
									<img class="img-rounded img-responsive"
										 src="<?php print base_url() . "assets/laporan/" . $detail->foto; ?>"
										 width="100%">
								</div>
							</div>
							<div class="form-group">
								<div>
									<button type="submit" class="btn btn-primary waves-effect waves-light">
										Update Status Laporan
									</button>

									<a href="<?php print base_url('laporansampah') ?>"
									   class="btn btn-warning waves-effect m-l-5">
										Kembali
									</a>
								</div>
							</div>
						</form>


					</div>
				</div>
			</div> <!-- end col -->

		</div> <!-- end row -->


	</div><!-- container fluid -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->

<script>
	$(function () {
		$('#result').hide();
		validate('#result', '#form', '<?php echo base_url('laporansampah'); ?>');
	});
</script>
