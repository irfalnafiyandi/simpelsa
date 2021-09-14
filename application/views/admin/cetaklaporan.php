

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
						<form class="" id="form" action="<?php print base_url('cetaklaporanstore') ?>" method="get" target="_blank">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Bulan</label>
										<select class="form-control" name="bulan" required>
											<option value="">Pilih Bulan</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Tahun</label>
										<select class="form-control" name="tahun" required>
											<option value="">Pilih Tahun</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>

										</select>
									</div>
								</div>

							</div>




							<div class="form-group">
								<div>
									<button type="submit" class="btn btn-primary waves-effect waves-light">
										Submit
									</button>

									<a href="<?php print base_url('admin/home') ?>" class="btn btn-warning waves-effect m-l-5">
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
		validate('#result', '#form', '<?php echo base_url('adminlist'); ?>');
	});
</script>
