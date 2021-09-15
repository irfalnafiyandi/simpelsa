


<!-- Page Wrap -->
<div class="page" id="top">


	<!-- Home Section -->
	<section class="page-section bg-dark-alfa-90" >
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
				<div class="col-sm-6 col-md-4 col-lg-4">
				</div>
				<div class="col-sm-6 col-md-4 col-lg-4">
					<div class="col-sm-12 ">
						<div class="alert error" role="alert" id="result" style="display:none;"></div>
						<?php echo $this->session->flashdata('pesan'); ?>
					</div>
					<!-- Form -->
					<form method="post" action="<?php echo base_url('laporan/proses'); ?>" id="form" role="form" class="form">
						<div class="mb-20 mb-md-10">
							<!-- Email -->
							<div id="image_preview" style="font-size: 100px;"><div id="previewing"><center><i class="fa fa-camera-retro " ></i></center></div></div>
							<label>Foto Laporan Anda</label>
							<input type="file" name="file" id="file" class="form-control"  >
						</div>
						<div class="mb-20 mb-md-10">
							<!-- Email -->
							<textarea name="note" id="note" class="form-control" placeholder="Deskripsi Laporan" rows="15" cols="15" style="text-transform: none !important;"></textarea>
							<input type="hidden" name="latitude" id="Latitude">
							<input type="hidden" name="longitude" id="Longitude">
						</div>

						<center><button class="btn btn-mod btn-border btn-large" type="submit">Buat Laporan</button></center>
					</form>
					<!-- End Form -->
				</div>
				<div class="col-sm-6 col-md-4 col-lg-4">
				</div>




			</div>
			<!-- End Blog Posts Grid -->



		</div>
	</section>
	<!-- End Content Section -->






</div>
<!-- End Page Wrap -->

<!-- Foter -->
<footer class="small-section bg-dark footer">
	<div class="container animate-init" data-anim-type="bounce-in-up" data-anim-delay="0">
		<!-- Footer Text -->
		<div class="footer-text">
			<!-- Copyright -->
			<div class="footer-copy">
				<a href="#" target="_blank">&copy; APPLESA <span class="number">2021</span></a>
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
	// Note: This example requires that you consent to location sharing when
	// prompted by your browser. If you see the error "The Geolocation service
	// failed.", it means you probably did not give permission for the browser to
	// locate you.
	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			center: {
				lat: -34.397
				, lng: 150.644
			}
			, zoom: 6
		});
		var infoWindow = new google.maps.InfoWindow({
			map: map
		});
		// Try HTML5 geolocation.
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				var pos = {
					lat: position.coords.latitude
					, lng: position.coords.longitude
				};
				infoWindow.setPosition(pos);
				infoWindow.setContent('Location found.');
				document.getElementById("Latitude").value = position.coords.latitude;
				document.getElementById("Longitude").value = position.coords.longitude;
				map.setCenter(pos);
			}, function () {
				handleLocationError(true, infoWindow, map.getCenter());
			});
		}
		else {
			// Browser doesn't support Geolocation
			handleLocationError(false, infoWindow, map.getCenter());
		}
	}

	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
		infoWindow.setPosition(pos);
		infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHuH2XwfvBYOhZGqpC2wOjP4LjBCN7J60&callback=initMap">
</script>


<!-- jQuery -->

<script>
	$(function() {
		$('#result').hide();
		validate('#result','#form','<?php echo base_url('Home/laporan'); ?>');
	});



	$(document).ready(function (e) {

		// Function to preview image after validation
		$(function() {
			$("#file").change(function() {

				$("#message").empty(); // To remove the previous error message
				var file = this.files[0];
				var imagefile = file.type;
				var match= ["image/jpeg","image/png","image/jpg"];
				if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
				{
					alert('123');
					$('#previewing').attr('src','noimage.png');
					$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
					return false;

				}
				else
				{

					var reader = new FileReader();
					reader.onload = imageIsLoaded;
					reader.readAsDataURL(this.files[0]);
				}
			});
		});
		function imageIsLoaded(e) {


			$('#image_preview').css("display", "block");
			$('#previewing').attr('src', e.target.result);
			$('#previewing').attr('width', '250px');
			$('#previewing').attr('height', '230px');
		};
	});
</script>


</body>
</html>
