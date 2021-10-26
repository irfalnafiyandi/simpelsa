<!-- Page Wrap -->
<div class="page" id="top">


	<!-- Home Section -->
	<section class="page-section bg-dark-alfa-90">
		<div class="container relative">

			<div class="align-center">


				<h3 class="small-title white">

					Ubah Profile

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
				<div class="col-sm-6 col-md-3 col-lg-3">
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">

					<div class="alert error" role="alert" id="result" style="display:none;"></div>
					<?php echo $this->session->flashdata('pesan'); ?>
					<!-- Form -->
					<form method="post" action="<?php echo base_url('updateprofile'); ?>" id="form" role="form" class="form"  style="text-transform: none; !important;">


						<div class="mb-20 mb-md-10">
							<div class="form-group">
								<label>No Hp</label>
								<input type="text" class="form-control" value="<?php print $detail->hp_pelapor  ?>" placeholder="No Hp Pelapor"  style="text-transform: none; !important;" name="hp">
							</div>
						</div>
						<div class="mb-20 mb-md-10">
							<div class="form-group">
								<label>Alamat Pelapor</label>
								<textarea  class="form-control" name="alamat" style="text-transform: none !important;"><?php print $detail->alamat_pelapor ?></textarea>
							</div>
						</div>
						<hr>
						<small>(Diisi jika ingin mengubah password kosongkan jika tidak ingin mengubah password)</small>
						<hr>
						<div class="mb-20 mb-md-10">
							<div class="form-group">
								<label>Password Baru </label>
								<input type="password" name="password" id="password" class="form-control"
										placeholder="Password" maxlength="100">
							</div>
						</div>
						<div class="mb-20 mb-md-10">
							<div class="form-group">
								<label>Konfirmasi Password Baru</label>
								<input type="password" name="passwordconf" id="passwordconf" class="form-control"
									   placeholder="Konfirmasi Password" maxlength="100">
							</div>
						</div>


						<center><button class="btn btn-mod btn-border btn-large" type="submit">Ubah</button></center>
					</form>
					<!-- End Form -->
				</div>
				<div class="col-sm-6 col-md-3 col-lg-3">
				</div>




			</div>
			<!-- End Blog Posts Grid -->


		</div>
		<!-- End Blog Posts Grid -->


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
				<a href="#" target="_blank">&copy; <span class="number">2021</span> Aplikasi Pelaporan Sampah</a>
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

<!-- End Works Expander -->


<!-- JS -->

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
<script src="<?php print base_url(); ?>assets/web/js/jquery.fancybox.min.js"></script>

<script>
	$(function () {
		$('#result').hide();
		validate('#result', '#form', '<?php echo base_url('changeprofil'); ?>');
	});





</script>




</body>
</html>
