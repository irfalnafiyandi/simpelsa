<!-- Page Wrap -->
<div class="page" id="top">


	<!-- Home Section -->
	<section class="page-section bg-dark-alfa-90">
		<div class="container relative">

			<div class="align-center">


				<h3 class="small-title white">

					Laporan Anda

				</h3>

			</div>

		</div>
	</section>
	<!-- End Home Section -->


	<!-- Content Section -->
	<section class="small-section">
		<div class="container relative">

			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th width="5%">No</th>

								<th width="25%"></th>
								<th>Tanggal Pelaporan</th>
								<th>Status</th>


							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($query as $keys => $values) {
							$panelc = " ";

							?>
							<tr>
								<td><?php print $no; ?></td>
								<td>
									<div class="btn-group">
										<a href="<?php print base_url('laporanlistdetail/' . $values->id_laporan) ?>"
										   class="btn btn-info">Detail Laporan</a>
										<?php

										if ($values->status_laporan == "y") {
											if (empty($values->ulasan_laporan)) {
												?><a
												href="<?php print base_url('laporanulasan/' . $values->id_laporan) ?>"
												class="btn btn-success">Berikan Ulasan</a>
												<?php

											}

										}
										?>
								</td>


					</div>


					<td><?php print TglIndo($values->tanggal_laporan) ?></td>
					<td>
						<?php
						if ($values->status_laporan == "p") {
							?><span class="label label-warning">Proses</span><?php
						} elseif ($values->status_laporan == "y") {
							?><span class="label label-success">Selesai</span><?php
						} elseif ($values->status_laporan == "b") {
							?><span class="label label-primary">Baru</span><?php
						} else {
							?><span class="label label-danger">Ditolak</span><?php
						}

						if($values->ulasan_laporan){
							?>&nbsp;<span class="label label-warning">Sudah Diulas</span><?php

						}

						?>
					</td>

					</tr>

					<?php
					$no++;
					}


					?>


					</tbody>

					</table>
				</div>
			</div>
		</div>


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
<div id="map"></div>
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
<script type="text/javascript" src="<?php print base_url(); ?>assets/web/js/star-rating.min.js"></script>
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
