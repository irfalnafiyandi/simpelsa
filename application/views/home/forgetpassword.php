<!-- Page Wrap -->
<div class="page" id="top">



	<!-- Some Facts Section -->
	<section class="page-section padding-section " id="signin" style="padding-top: 40px;padding-bottom: 40px;">
		<div class="container relative">
			<!-- Section Headings -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
					<div class="section-title">
						Masukan Email Anda<span class="st-point">.</span>
					</div>
					<div class="section-line mb-60 mb-xxs-30">
					</div>
				</div>
			</div>


			<!-- End Section Headings -->
			<!-- Counters -->
			<!-- Row -->

			<div class="row">
				<div class="col-sm-12 ">
					<div class="alert error" role="alert" id="result" style="display:none;"></div>
				</div>


				<div class="col-sm-4 mb-40">
				</div>
				<div class="col-sm-4 mb-40">


					<form method="post" action="<?php echo base_url('forgetpassword/proses'); ?>" id="form" role="form"
						  class="form"  style="text-transform: none">
						<div class="mb-20 mb-md-10">
							<!-- Email -->
							<input type="email" name="email" id="email" class="form-control" placeholder="Email"
								   maxlength="100" required>
						</div>

						<center>
							<button class="btn btn-mod btn-border btn-large" type="submit">Proses</button>
						</center>
						<!-- Toggle -->


					</form>

				</div>
				<div class="col-sm-4 mb-40">
				</div>
			</div>
			<!-- End Row -->
			<!-- End Counters -->

		</div>
	</section>
	<!-- End Some Facts Section -->
</div>
<!-- End Page Wrap -->

<!-- Foter -->
<footer class="small-section bg-dark footer">
	<div class="container " data-anim-type="bounce-in-up" data-anim-delay="0">
		<!-- Footer Text -->
		<div class="footer-text">
			<!-- Copyright -->
			<div class="footer-copy">
				<a href="#" target="_blank">&copy;  <span class="number">2021</span> Aplikasi Pelaporan Sampah</a>
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
<!--<script type="text/javascript" src="<?php /*print base_url(); */?>assets/web/js/animations.min.js"></script>-->
<!--[if lt IE 10]><script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/placeholder.js"></script><![endif]-->
<script src="<?php print base_url(); ?>assets/web/js/animated-headers/TweenLite.min.js"></script>
<script src="<?php print base_url(); ?>assets/web/js/animated-headers/EasePack.min.js"></script>
<script src="<?php print base_url(); ?>assets/web/js/animated-headers/rAF.js"></script>
<script src="<?php print base_url(); ?>assets/web/js/animated-headers/demo-1.js"></script>

<script>
	$(function () {
		$('#result').hide();
		validate('#result', '#form', '<?php echo base_url('Home/forgetpasswordsukses'); ?>');
	});

</script>


</body>
</html>
