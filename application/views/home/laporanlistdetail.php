<!-- Page Wrap -->
<div class="page" id="top">


	<!-- Home Section -->
	<section class="page-section bg-dark-alfa-90">
		<div class="container relative">

			<div class="align-center">


				<h3 class="small-title white">

					Detail Laporan

				</h3>

			</div>

		</div>
	</section>
	<!-- End Home Section -->


	<!-- Content Section -->
	<section class="small-section">
		<div class="container relative">

			<div class="row">
				<div class="col-md-12 pd-4">
					<a href="<?php print base_url('laporanlist') ?>" class="btn btn-warning">Kembali</a>
					<br><br>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label><b>Tanggal Laporan</b></label><br>
						<?php print TglIndo($detail->tanggal_laporan) ?>

					</div>
					<hr/>
					<div class="form-group">
						<label><b>Keterangan Laporan</b></label><br>
						<?php print $detail->keterangan ?>

					</div>
					<hr/>
					<div class="form-group">
						<label>Lokasi Sampah</label> <br>
						<div id="map"></div>



					</div>
					<hr/>
				</div>
				<div class="col-md-6">
					<label><b>Foto Laporan</b></label><br>
					<a href="<?php print base_url().'assets/laporan/'.$detail->foto; ?>" data-fancybox="gallery" data-caption="Caption #2">
						<img src="<?php print base_url().'assets/laporan/'.$detail->foto; ?>" alt="" class="img-rounded" alt="Cinque Terre" width="50%"/>
					</a><br/>

					<?php
					if($detail->status_laporan=="y"){
						?>
							<hr/>
						<label><b>Foto Verifkasi</b></label><br>
						<a href="<?php print base_url().'assets/laporan/'.$detail->foto_verifikasi; ?>" data-fancybox="gallery" data-caption="Caption #2">
							<img src="<?php print base_url().'assets/laporan/'.$detail->foto_verifikasi; ?>" alt="" class="img-rounded" alt="Cinque Terre" width="50%"/>
						</a><br/>
						<hr/>
						<label>Diverifikasi pada tanggal </label><br>
						<?php print  TglIndo($detail->tanggal_verifikasi); ?>


						<?php

					}


					?>




				</div>
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
	<div class="container  " data-anim-type="bounce-in-up" data-anim-delay="0">
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
		validate('#result', '#form', '<?php echo base_url('laporansampah'); ?>');
	});


	function initMap() {
		var cwc2011_venue_data = [
			{
				latlng: new google.maps.LatLng(<?php print $detail->latitude ?>, <?php print $detail->longitude ?>),
			},


		];

		var cwc2011_venue_data_win = [
			"",
		];

		var map = new google.maps.Map(document.getElementById("map"), {
			zoom: 4,
			center: new google.maps.LatLng(0, 0),


			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		markers = Array();
		infoWindows = Array();

		for (var i = 0; i < cwc2011_venue_data.length; i++) {
			var marker  = new google.maps.Marker({
				position: cwc2011_venue_data[i].latlng,
				map: map,
				infoWindowIndex : i
			});

			var infoWindow = new google.maps.InfoWindow({
				content: cwc2011_venue_data_win[i]
			});
			google.maps.event.addListener(marker, 'click',
				function(event)
				{
					infoWindows[this.infoWindowIndex].open(map, this);
				}
			);

			infoWindows.push(infoWindow);
			markers.push(marker);
		}
		var latlngbounds = new google.maps.LatLngBounds();
		for (var i = 0; i < cwc2011_venue_data.length; i++) {
			latlngbounds.extend(cwc2011_venue_data[i].latlng);
		}
		map.fitBounds(latlngbounds);
	}


</script>


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
