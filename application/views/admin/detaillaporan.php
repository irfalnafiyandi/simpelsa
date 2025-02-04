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
								<hr/>

								<div class="form-group">
									<label>Email Pelapor</label><br>
									<?php print $detail->email_pelapor ?>
								</div>
								<hr/>

								<div class="form-group">
									<label>No HP</label><br>
									<?php print $detail->hp_pelapor ?>
								</div>
								<hr/>

								<div class="form-group">
									<label>Keterangan</label><br>
									<?php print $detail->keterangan; ?>
								</div>
								<hr/>

								<?php
								if($detail->catatan_verifikasi){
									?>
									<div class="form-group">
										<label>Catatan Verifikasi</label><br>
										<?php print $detail->catatan_verifikasi ?>
									</div>
									<hr>
									<?php

								}

								?>


								<div class="form-group">
									<label>Status Laporan</label><br>
									<?php
									if($detail->status_laporan=="b"){
										?><span class="badge badge-primary">Baru</span><?php

									}elseif ($detail->status_laporan=="p"){
										?><span class="badge badge-warning">Proses</span><?php

									}elseif ($detail->status_laporan=="y"){
										?><span class="badge badge-success">Selesai</span><?php

									}elseif ($detail->status_laporan=="n"){
										?><span class="badge badge-danger">Ditolak</span><?php

									}

									?>
								</div>
								<hr/>



								<div class="form-group">
									<label>Lokasi Sampah</label> <a
											href="https://www.google.com/maps?daddr=<?php print $detail->latitude ?>,<?php print $detail->longitude ?>&ll"
											target="_blank">Klik
										Disini Menetukan Rute</a><br>
									<div id="gmaps-markers" class="gmaps"></div>
								</div>
								<hr/>
							</div>
							<div class="col-md-6">
								<label>Foto laporan</label>
								<img class="img-rounded img-responsive"
									 src="<?php print base_url() . "assets/laporan/" . $detail->foto; ?>"
									 width="100%">
							</div>

						</div>
					</div>
				</div>
				<?php

				if ($detail->status_laporan == "y") {
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
									<label>Foto Verifikasi</label>
									<img class="img-rounded img-responsive" src="<?php print base_url() . "assets/laporan/" . $detail->foto_verifikasi; ?>" width="100%">
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
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>
<script src="<?php print base_url() ?>/assets/admin/plugins/gmaps/gmaps.min.js"></script>
<script>
	$(function () {
		$('#result').hide();
		validate('#result', '#form', '<?php echo base_url('laporansampah'); ?>');
	});

	var map;

	$(document).ready(function () {
		// Markers
		map = new GMaps({
			div: '#gmaps-markers',
			lat: <?php print $detail->latitude ?>,
			lng: <?php print $detail->longitude ?>
		});
		map.addMarker({
			lat: <?php print $detail->latitude ?>,
			lng: <?php print $detail->longitude ?>,
			title: 'Lima',
			details: {
				database_id: 42,
				author: 'HPNeo'
			},
			click: function (e) {
				if (console.log)
					console.log(e);
				alert('You clicked in this marker');
			}
		});

		// Overlays
		map = new GMaps({
			div: '#gmaps-overlay',
			lat: -12.043333,
			lng: -77.028333
		});
		map.drawOverlay({
			lat: map.getCenter().lat(),
			lng: map.getCenter().lng(),
			content: '<div class="gmaps-overlay">Our Office!<div class="gmaps-overlay_arrow above"></div></div>',
			verticalAlign: 'top',
			horizontalAlign: 'center'
		});

		//panorama
		map = GMaps.createPanorama({
			el: '#panorama',
			lat: 42.3455,
			lng: -71.0983
		});

		//Map type
		map = new GMaps({
			div: '#gmaps-types',
			lat: -12.043333,
			lng: -77.028333,
			mapTypeControlOptions: {
				mapTypeIds: ["hybrid", "roadmap", "satellite", "terrain", "osm"]
			}
		});
		map.addMapType("osm", {
			getTileUrl: function (coord, zoom) {
				return "https://a.tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
			},
			tileSize: new google.maps.Size(256, 256),
			name: "OpenStreetMap",
			maxZoom: 18
		});
		map.setMapTypeId("osm");
	});
</script>
