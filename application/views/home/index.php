<!-- Change the value of lang="en" attribute if your website's language is not English.
You can find the code of your language here - https://www.w3schools.com/tags/ref_language_codes.asp -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php print $title; ?> &mdash; </title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="utf-8">
	<meta name="author" content="https://themeforest.net/user/bestlooker/portfolio">
	<!--[if IE]>
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php print base_url(); ?>assets/web/images/favicon.png">
	<link rel="apple-touch-icon" href="<?php print base_url(); ?>assets/web/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72"
		  href="<?php print base_url(); ?>assets/web/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114"
		  href="<?php print base_url(); ?>assets/web/images/apple-touch-icon-114x114.png">
	<!-- CSS -->
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/web/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/web/css/style.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/web/css/style-responsive.css">

	<link rel="stylesheet" href="<?php print base_url(); ?>assets/web/css/animate.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/web/css/animations.min.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/web/css/vertical-rhythm.min.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/web/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/web/css/magnific-popup.css">

	<link rel="stylesheet" href="<?php print base_url(); ?>assets/web/css/colors/blue.css">
	<!-- <link rel="stylesheet" href="css/colors/blue-extra.css"> -->


</head>
<body class="appear-animate">

<!-- Page Loader -->
<div class="page-loader">
	<b class="spinner">Loading...</b>
</div>
<!-- End Page Loader -->

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

							<div class="local-scroll">
								<a href="#about" class="btn btn-mod btn-w btn-large mb-xxs-10 hidden-xs">DAFTAR</a>
								<span class="hidden-xs">&nbsp;</span>
								<a href="#about" class="btn btn-mod btn-w btn-large mb-xxs-10 hidden-xs">SIGN IN</a>
							</div>

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
					<a href="#home">Home</a>
				</li>
				<li>
					<a href="#contact">About</a>
				</li>



			</ul>



		</nav>
	</div>
	<!-- End Navigation panel -->



	<!-- Some Facts Section -->
	<section class="page-section" id="counts">
		<div class="container relative">

			<!-- Counters -->
			<div class="row">

				<!-- Counter Item -->
				<div class="col-xs-6 col-sm-3">
					<div class="count-number">
						160
					</div>
					<div class="count-descr">
						<i class="fa fa-briefcase"></i>
						<span class="count-title">Jumlah Laporan</span>
					</div>
				</div>
				<!-- End Counter Item -->

				<!-- Counter Item -->
				<div class="col-xs-6 col-sm-3">
					<div class="count-number">
						150
					</div>
					<div class="count-descr">
						<i class="fa fa-heart"></i>
						<span class="count-title">Laporan Selesai</span>
					</div>
				</div>
				<!-- End Counter Item -->

				<!-- Counter Item -->
				<div class="col-xs-6 col-sm-3">
					<div class="count-number">
						10
					</div>
					<div class="count-descr">
						<i class="fa fa-coffee"></i>
						<span class="count-title">Laporan Proses</span>
					</div>
				</div>
				<!-- End Counter Item -->

				<!-- Counter Item -->
				<div class="col-xs-6 col-sm-3">
					<div class="count-number">
						0
					</div>
					<div class="count-descr">
						<i class="fa fa-lightbulb-o"></i>
						<span class="count-title">Laporan Palsu</span>
					</div>
				</div>
				<!-- End Counter Item -->

			</div>
			<!-- End Counters -->

		</div>
	</section>
	<!-- End Some Facts Section -->



	<!-- Contact Section -->
	<section class="page-section bg-scroll bg-dark-alfa-90" id="contact">
		<div class="container relative">

			<div class="row">

				<!-- Contact Info -->
				<div class="col-md-4">

					<!-- Phone -->
					<div class="contact-item mb-40 mb-md-20">

						<!-- Icon -->
						<div class="ci-icon">
							<i class="fa fa-phone"></i>
						</div>

						<div class="ci-title">Call Us</div>

						<div class="ci-phone">0307-567-890</div>

					</div>
					<!-- End Phone -->

					<!-- Address -->
					<div class="contact-item mb-40 mb-md-20">

						<!-- Icon -->
						<div class="ci-icon">
							<i class="fa fa-map-marker"></i>
						</div>

						<div class="ci-title">Address</div>

						<div class="ci-text">245 Quigley Blvd, Ste K</div>

					</div>
					<!-- End Address -->

					<!-- Email -->
					<div class="contact-item mb-md-40">

						<!-- Icon -->
						<div class="ci-icon">
							<a href="mailto:bigstream@lookandfeel.pro">
								<i class="fa fa-envelope"></i>
							</a>
						</div>

						<div class="ci-title">Say Hello</div>

						<div class="ci-text"><a href="mailto:bigstream@lookandfeel.pro">bigstream@lookandfeel.pro</a></div>

					</div>
					<!-- End Email -->

				</div>
				<!-- End Contact Info -->


				<div class="col-md-7 col-md-offset-1">

					<!-- Contact Form -->
					<form class="form contact-form" id="contact_form" autocomplete="off">
						<div class="clearfix mb-20 mb-xs-0">

							<div class="cf-left-col">

								<!-- Name -->
								<div class="form-group">
									<input type="text" name="name" id="name" class="ci-field form-control" placeholder="Name" pattern=".{3,100}" required>
								</div>

								<!-- Email -->
								<div class="form-group">
									<input type="email" name="email" id="email" class="ci-field form-control" placeholder="Email" pattern=".{5,100}" required>
								</div>
							</div>

							<div class="cf-right-col">

								<!-- Message -->
								<div class="form-group">
									<label for="message">Message</label>
									<textarea name="message" id="message" class="ci-area form-control"></textarea>
								</div>

							</div>

						</div>

						<!-- Send Button -->
						<button class="submit_btn btn btn-mod btn-large btn-full ci-btn" id="submit_btn">
							Send
						</button>

						<div id="result"></div>

					</form>
					<!-- End Contact Form -->

				</div>

			</div>

		</div>
	</section>
	<!-- End Contact Section -->


	<!-- Bottom menu -->
	<div class="bot-menu local-scroll">

		<!-- See Map -->
		<a href="#" class="bot-menu-item animate-init" data-anim-type="fade-in-right" data-anim-delay="0" id="see-map">
                    <span class="bot-menu-icon">
                        <i class="fa fa-map-marker"></i>
                    </span>
			See Map
		</a>
		<!-- End See Map -->

		<!-- Scroll Up -->
		<a href="#top" class="bot-menu-item animate-init" data-anim-type="fade-in-left" data-anim-delay="0">
                    <span class="bot-menu-icon">
                        <i class="fa fa-arrow-circle-o-up"></i>
                    </span>
			Scroll Up
		</a>
		<!-- End Scroll Up -->

	</div>
	<!-- End Bottom menu -->

	<!-- Google Map -->
	<div class="google-map">
		<div id="map-canvas">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d24572.368311964965!2d-75.602613!3d39.65993!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c703f3d191cf13%3A0xf4674106f987fe3a!2zMjQ1IFF1aWdsZXkgQmx2ZCBTdGUgSywgTmV3IENhc3RsZSwgREUgMTk3MjAsINCh0L_QvtC70YPRh9C10L3RliDQqNGC0LDRgtC4INCQ0LzQtdGA0LjQutC4!5e0!3m2!1suk!2sua!4v1536578653122" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
	<!-- End Google Map -->


	<!-- Foter -->
	<footer class="small-section bg-dark footer">
		<div class="container animate-init" data-anim-type="bounce-in-up" data-anim-delay="0">

			<!-- Footer Text -->
			<div class="footer-text">

				<!-- Copyright -->
				<div class="footer-copy">
					<a href="http://themeforest.net/user/theme-guru/portfolio" target="_blank">&copy; BigStream <span class="number">2014</span></a>.
				</div>
				<!-- End Copyright -->

				<div class="footer-made">
					Made with <span class="serif">love</span>
					for <span class="serif">great people</span>.
				</div>

			</div>
			<!-- End Footer Text -->

			<!-- Social Links -->
			<div class="footer-social-links">
				<div class="social-links tooltip-bot">
					<a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="#" title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a>
					<a href="#" title="LinkedIn+" target="_blank"><i class="fa fa-linkedin"></i></a>
					<a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
					<a href="#" title="E-mail" target="_blank"><i class="fa fa-envelope"></i></a>
				</div>
			</div>
			<!-- End Social Links -->

		</div>
	</footer>
	<!-- End Foter -->


</div>
<!-- End Page Wrap -->


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

</body>
</html>
