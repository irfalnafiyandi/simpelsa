
<script>
	$(document).ready(function(){
		$('#result').hide();
		validate("#editform","<?php print site_url()."/SuratKeluarControl/CaddSuratKeluar"  ?>","<?php print site_url()."/SuratKeluarControl/PengambilanSuratKeluar" ?>");
	});

	function fromjenis() {
		var inputVal = document.getElementById("jenis").value;
		$.ajax({
			type: "POST",
			url: "<?php print site_url("SuratKeluarControl/Caddfromjenis/");?>"+ inputVal,
			success: function (response) {
				$("#datasuratkeluar").html(response);
				//console.log(response);
			}
		});

	}
	function formSuratkeluar() {
		$('#datatujuan').css('display','block');
		//var inputVal = document.getElementById("jenis").value;
		$.ajax({
			type: "POST",
			url: "<?php print site_url("SuratKeluarControl/Cgetkodeklasifikasi/");?>",
			success: function (response) {
				$("#datakodeklasifikasi").html(response);
				//console.log(response);
			}
		});

	}
	function formKodeKlasifikasi() {
		$('#datatujuan').css('display','block');
		//var inputVal = document.getElementById("jenis").value;
		//$.ajax({
		//	type: "POST",
		//	url: "<?php //print site_url("SuratKeluarControl/Caddfromjenis/");?>//"+ inputVal,
		//	success: function (response) {
		//		$("#datasuratkeluar").html(response);
		//		//console.log(response);
		//	}
		//});

	}
</script>

<div class="content-wrapper">
	<div id="result"></div>
	<section class="content-header">
		<h1><?php print $projectname; ?>
			<small><?php print $title;  ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php print base_url('Aview'); ?>/home/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
			<li class="active"><?php print $title; ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h1><?php print $title; ?></h1>
						<?php print $desc; ?>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">
								<div class="row">
									<div class="col-md-6">
										<a href="<?php print base_url("SuratKeluarControl/PengambilanSuratKeluar"); ?>" class="btn  btn-warning" style="margin-bottom: 20px;">Kembali</a><br>


										<div class="panel panel-success">
											<div class="panel-body">
												<?php

												//print form_open_multipart('',$attributes); ?>
												<!--												<form action="--><?php //print site_url("/Acontrol/Caddadmin"); ?><!--" id="addform" name="addform" enctype="multipart/form-data" method="post" accept-charset="utf-8">-->

												<form class="col-md-12" id="editform" >
													<div class="form-group">
														<label>Jenis Surat:</label>
														<select class="form-control chosen-select" name="jenis" id="jenis" onchange="fromjenis()">
															<option value="" >Pilih Jenis Surat</option>
															<option value="naskahdinas" >Naskah Dinas</option>
															<option value="produkhukum" >Produk Hukum</option>
														</select>
													</div>

													<div id="datasuratkeluar"></div>
													<div id="datakodeklasifikasi"></div>
													<div id="datatujuan" style="display: none">
														<div class="form-group">
															<label>Tujuan:</label>
															<input class="form-control" name="tujuan" id="tujuan" type="text">
														</div>
														<div class="form-group">
															<label>Perihal:</label>
															<input class="form-control" name="perihal" id="perihal" type="text">
														</div>
														<div class="form-group">
															<label>Tembusan:</label>
															<input class="form-control" name="tembusan" id="tembusan" type="text">
														</div>
													</div>



													<center><button type="submit"  name="bsubmit" id="bsubmit" class="btn btn-lg btn-info">Tambah</button></center>
												</form>
											</div>
										</div>


									</div>
								</div>

							</div>

						</div>

					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
</div>

