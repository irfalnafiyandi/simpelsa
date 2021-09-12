<!-- Navigation panel -->
<div class="nav-bar-compact clearfix">
	<!-- Logo ( * your text or image into link tag *) -->
	<div class="nbc-logo-wrap local-scroll">
		<a href="#top" class="nbc-logo">
			SIMPELSA
		</a>
	</div>

	<!-- Menu Button -->
	<div class="nbc-menu-button">
		<i class="nbc-menu-icon"></i>
	</div>

	<!-- Menu Links -->
	<nav class="nbc-menu-wrap">
		<ul class="nbc-menu-links local-scroll">
			<li>
				<a href="<?php print base_url('Home') ?>">Home</a>
			</li>
			<?php
			if($session->userdata('id')){
				?>
				<li>
					<a href="<?php print base_url('Logout') ?>">Sign Out</a>
				</li>
				<?php

			}

			?>


		</ul>
	</nav>
</div>
<!-- End Navigation panel -->

<!-- Page Wrap -->
<div class="page" id="top">
	<!-- Home Section -->
	<section class="home-section bg-dark parallax-3" data-background="<?php print base_url() ?>assets/web/images/full-width-images/section-bg-20.jpg" id="home">
		<div class="js-height-full" id="large-header">
			<!-- Canvas Animation -->
			<canvas id="demo-canvas"></canvas>
			<!-- Home Page Content -->
			<div class="ah-content">
				<div class="home-content">
					<div class="home-text animate-init" data-anim-type="fade-in-up-big" data-anim-delay="100">
						<div class="container">
							<!-- Headings -->
							<h1 class="hs-line-8  mb-30 mb-xs-10">
								Hello <span class="serif">&</span>
								Welcome
							</h1>

							<h2 class="hs-line-9 mb-40 mb-xs-20">
								SISTEM PELAPORAN SAMPAH
							</h2>
							<!-- End Headings -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Home Page Content -->
			<!-- Scroll Down -->
			<div class="local-scroll">
				<a href="#about" class="scroll-down"><i class="scroll-down-icon"></i><span>Scroll Down</span></a>
			</div>
			<!-- End Scroll Down -->
		</div>
	</section>
	<!-- End Home Section -->

	<!-- Some Facts Section -->
	<section class="page-section padding-section " id="laporan" style="padding-top: 40px;padding-bottom: 40px;">
		<div class="container relative">
			<!-- Section Headings -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
					<div class="section-title">
						Buat Laporan<span class="st-point">.</span>
					</div>
					<h2 class="section-heading">175 hours of working time</h2>
					<div class="section-line mb-60 mb-xxs-30">
					</div>
				</div>
			</div>
			<!-- End Section Headings -->
			<!-- Counters -->
			<!-- Row -->
			<div class="row">
				<div class="col-sm-4 mb-40">
				</div>
				<div class="col-sm-4 mb-40">
					<div class="alert alert-danger" role="alert" id="result" style="display:;"></div>
					<!-- Form -->
					<form method="post" action="#" id="form" role="form" class="form">
						<div class="mb-20 mb-md-10">
							<!-- Email -->
							<input type="email" name="email" id="email" class="form-control" placeholder="Email" maxlength="100">
						</div>
						<div class="mb-20 mb-md-10">
							<!-- Password -->
							<input type="password" name="password" id="password" class="form-control" placeholder="Password" maxlength="100">
						</div>
					</form>
					<!-- End Form -->
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
	<div class="container animate-init" data-anim-type="bounce-in-up" data-anim-delay="0">
		<!-- Footer Text -->
		<div class="footer-text">
			<!-- Copyright -->
			<div class="footer-copy">
				<a href="#" target="_blank">&copy; SIMPELSA <span class="number">2021</span></a>
			</div>
			<!-- End Copyright -->
			<div class="footer-made">
				Made with <span class="serif">love</span>.
			</div>
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
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/animations.min.js"></script>
<!--[if lt IE 10]><script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/placeholder.js"></script><![endif]-->
<script src="<?php print base_url(); ?>assets/web/js/animated-headers/TweenLite.min.js"></script>
<script src="<?php print base_url(); ?>assets/web/js/animated-headers/EasePack.min.js"></script>
<script src="<?php print base_url(); ?>assets/web/js/animated-headers/rAF.js"></script>
<script src="<?php print base_url(); ?>assets/web/js/animated-headers/demo-1.js"></script>

<script>
	$(function() {
		$('#result').hide();
		validate('#result','#form','<?php echo base_url('Home/laporan#laporan'); ?>');
	});
</script>


</body>
</html>
