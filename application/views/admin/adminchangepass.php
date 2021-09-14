

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
			<div class="col-6">
				<div class="card m-b-30">
					<div class="card-body">
						<form class="" id="form" action="<?php print base_url('adminchangepasswordstore') ?>" method="post">
							<div class="form-group">
								<label>Password Lama</label>
								<input type="password" class="form-control" required placeholder="Password lama" name="passwordold">
							</div>
							<div class="form-group">
								<label>Password baru</label>
								<input type="password" class="form-control" required placeholder="Password Baru" name="passwordnew">
							</div>
							<div class="form-group">
								<label>Password Baru Konfirmasi</label>
								<input type="password" class="form-control" required placeholder="Password Baru Konfirmasi" name="passwordkonfnew">
							</div>


							<div class="form-group">
								<div>
									<button type="submit" class="btn btn-primary waves-effect waves-light">
										Submit
									</button>
									<button type="reset" class="btn btn-secondary waves-effect m-l-5">
										Cancel
									</button>
									<a href="<?php print base_url('adminlist') ?>" class="btn btn-warning waves-effect m-l-5">
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
		validate('#result', '#form', '<?php echo base_url('adminlogout'); ?>');
	});
</script>
