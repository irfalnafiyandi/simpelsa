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
						<a href="<?php print base_url('laporansampah') ?>"
						   class="btn btn-warning waves-effect m-l-5 mb-4">
							Kembali
						</a>


							<div class="row">
								<div class="col-md-6">

									<input name="id" value="<?php print $detail->id_laporan ?>" type="hidden">
									<div class="form-group">
										<label>Nama Pelapor</label><br>
										<?php print $detail->nama_pelapor ?>
									</div>

									<div class="form-group">
										<label>Email Pelapor</label><br>
										<?php print $detail->email_pelapor ?>
									</div>

									<div class="form-group">
										<label>No HP</label><br>
										<?php print $detail->hp_pelapor ?>
									</div>

									<div class="form-group">
										<label>Keterangan</label><br>
										<?php print $detail->komentar; ?>
									</div>

									<div class="form-group">
										<label>Lokasi Sampah</label><br>

									</div>


								</div>
								<div class="col-md-6">
									<img class="img-rounded img-responsive"
										 src="<?php print base_url() . "assets/laporan/" . $detail->foto; ?>"
										 width="100%">
								</div>
							</div>





					</div>


				</div>
				<?php

				if($detail->status_laporan=="y"){
					?>
				<div class="card m-b-30">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">

								<input name="id" value="<?php print $detail->id_laporan ?>" type="hidden">
								<div class="form-group">
									<label>Tanggal Verifikasi</label><br>
									<?php print TglIndo($detail->tanggal_verifikasi); ?>
								</div>




							</div>
							<div class="col-md-6">
								<img class="img-rounded img-responsive"
									 src="<?php print base_url() . "assets/laporan/" . $detail->foto_verifikasi; ?>"
									 width="100%">
							</div>
						</div>
					</div>
				</div>
					<?php

				}

				?>
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
