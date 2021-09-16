<!-- Page Wrap -->
<div class="page" id="top">


	<!-- Home Section -->
	<section class="page-section bg-dark-alfa-90">
		<div class="container relative">

			<div class="align-center">


				<h3 class="small-title white">

					LAPORAN ANDA AKAN LANGSUNG KAMI PROSES PADA SAAT LAPORAN TELAH MASUK

				</h3>

			</div>

		</div>
	</section>
	<!-- End Home Section -->


	<!-- Content Section -->
	<section class="small-section">
		<div class="container relative">


			<!-- Blog Posts Grid -->
			<div class="row multi-columns-row">
				<?php
				foreach ($query as $keys => $values){
					$panelc=" ";
					if($values->status_laporan=="p"){
						$text= "Laporan Anda Telah Diverifikasi Oleh Administrator Kami Dan Akan Diproses Oleh Petugas";
						$panelc = "panel-warning";
					}elseif ($values->status_laporan=="y"){
						$text= "Laporan Anda Telah Selesai DiProses Oleh Petugas Kami";
						$panelc = "panel-success";
					}elseif ($values->status_laporan=="b"){
						$text= "Laporan Anda Akan Diverifikasi Oleh Administrator Kami";
						$panelc = "panel-info";
					}else{
						$text= "";
						$panelc = "panel-danger";
					}
					?>
					<div class="col-md-12">
						<div class="panel <?php print $panelc; ?>">
							<div class="panel-heading">
								<a data-toggle="collapse" href="#collapse<?php print $values->id_laporan; ?>"><h4 class=" text-white"><?php print $text; ?> </h4></a></div>

								<div id="collapse<?php print $values->id_laporan; ?>" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-4">
												<img src="<?php print base_url().'assets/laporan/'.$values->foto; ?>" class="img-rounded" alt="Cinque Terre">
											</div>
											<div class="col-md-8">
												<div class="text">
													<h5 class="uppercase">Keteragan</h5>
													<?php
													print $values->komentar;
													?>

												</div>

												<div class="text">
													<h5 class="uppercase">Laporan Ini Dibuat</h5>
													<?php
													print TglIndo($values->tanggal_laporan);
													?>
												</div>

											</div>
										</div>
										<hr/>

										<?php
										if($values->status_laporan=="y"){
											?>
											<div class="row">
												<div class="col-md-4">
													<img src="<?php print base_url().'assets/laporan/'.$values->foto_verifikasi; ?>" class="img-rounded" alt="Cinque Terre">
												</div>
												<div class="col-md-8">
													<div class="text">
														<h5 class="uppercase">Verifikasi Laporan</h5>
														Laporan Telah Diverifikasi Pada Tanggal <?php print TglIndo($values->tanggal_verifikasi); ?>

													</div>
												</div>


											</div>
											<?php

										}


										?>


									</div>

								</div>

						</div>
					</div>
					<?php
				}

				?>


			</div>
			<!-- End Blog Posts Grid -->


		</div>
	</section>
	<!-- End Content Section -->


</div>
<!-- End Page Wrap -->

<!-- Foter -->
<footer class="small-section bg-dark footer">
	<div class="container  " data-anim-type="bounce-in-up" data-anim-delay="0">
		<!-- Footer Text -->
		<div class="footer-text">
			<!-- Copyright -->
			<div class="footer-copy">
				<a href="#" target="_blank">&copy;  <span class="number">2021</span> APPELSA</a>
			</div>
			<!-- End Copyright -->

		</div>
		<!-- End Footer Text -->
	</div>
</footer>
<!-- End Foter -->

<!-- Works Expander -->
<div class="work-full">
	<div class="work-navigation clearfix">
		<a class="work-prev"><span><i class="fa fa-chevron-left"></i>&nbsp;Previous</span></a>
		<a class="work-all"><span><i class="fa fa-times"></i>&nbsp;All works</span></a>
		<a class="work-next"><span>Next&nbsp;<i class="fa fa-chevron-right"></i></span></a>
	</div>
	<div class="work-full-load">
	</div>
	<div class="work-loader">
	</div>
</div>
<div class="body-masked">
</div>
<div id="map"></div>
<!-- End Works Expander -->


<!-- JS -->
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/js/validate.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery-migrate-1.4.1.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/SmoothScroll.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery.localScroll.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery.ba-hashchange.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery.viewport.mini.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery.countTo.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery.appear.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery.sticky.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/all.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/contact-form.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/animations.min.js"></script>
<!--[if lt IE 10]><script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/placeholder.js"></script><![endif]-->
<script src="<?php print base_url(); ?>assets/web/js/animated-headers/TweenLite.min.js"></script>
<script src="<?php print base_url(); ?>assets/web/js/animated-headers/EasePack.min.js"></script>
<script src="<?php print base_url(); ?>assets/web/js/animated-headers/rAF.js"></script>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<!-- GOOGLE MAPS API -->
<script>
	function getData() {

		var nolap = $("#nolap").val();
		if (nolap === '') {
			alert('Nomor Laporan Tidak boleh kosong');
		} else {
			$.ajax({
				url: "<?php echo base_url('getlaporan'); ?>",
				data: "nolap=" + nolap,
				cache: false,
				beforeSubmit: function () {
					$('.spinner').show();
				},
				success: function (msg) {
					$("#odata").html(msg);
				}
			});
		}
	}




</script>

</body>
</html>
