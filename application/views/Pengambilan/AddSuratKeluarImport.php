
<script>
	$(document).ready(function(){
		$('#result').hide();
		validate("#editform","<?php print site_url()."/SuratKeluarControl/CaddSuratKeluarImport"  ?>","<?php print site_url()."/SuratKeluarControl/AddSuratKeluarImport" ?>");
	});
	function fromjenis() {
		var inputVal = document.getElementById("jenis").value;
		$.ajax({
			type: "POST",
			url: "<?php print site_url("SuratKeluarControl/Caddfromjenis/");?>"+ inputVal,
			success: function (response) {
				$("#datasuratkeluar").html(response);
			}
		});
	}
	function formSuratkeluar() {
		$('#datatujuan').css('display','block');
		$.ajax({
			type: "POST",
			url: "<?php print site_url("SuratKeluarControl/Cgetkodeklasifikasi/");?>",
			success: function (response) {
				$("#datakodeklasifikasi").html(response);
			}
		});
	}
	function formKodeKlasifikasi() {
		$('#datatujuan').css('display','block');
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
										<a href="<?php print base_url("SuratKeluarControl/PengambilanSuratKeluar"); ?>" class="btn  btn-warning" style="margin-bottom: 20px;">Kembali</a>
										<a href="<?php print base_url("SuratKeluarControl/PengambilanSuratKeluar"); ?>" class="btn  btn-success" style="margin-bottom: 20px;" target="_blank"><i class="fa fa-file-excel-o"></i> Download Template</a><br>
										<div class="panel panel-success">
											<div class="panel-body">
												<form class="col-md-12" id="editform" method="post"  >
													<div class="form-group">
														<label>File Excel:</label>
														<input type="file" name="xlsapk" class="form-control">
													</div>
													<center><button type="submit"  name="bsubmit" id="bsubmit" class="btn btn-lg btn-success">Check Excel</button></center>
												</form>
											</div>
										</div>


									</div>
								</div>

							</div>

						</div>

						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">
								<table id="example1" class="table table-bordered table-striped table-hover border-table">
									<thead>
									<tr>
										<th width="3%" class="success border-table backgroundtable">No</th>
										<!--										<th  class="success border-table backgroundtable">Kode Klaisifikasi</th>-->
										<th  class="success border-table backgroundtable">No Surat Keluar</th>
										<th  class="success border-table backgroundtable">Jenis Surat</th>
										<th  class="success border-table backgroundtable">Pegawai</th>
										<th class="success border-table backgroundtable">Bidang</th>
										<th  class="success border-table backgroundtable">Tujuan</th>
										<th  class="success border-table backgroundtable">Ambil</th>
										<!--										<th class="success border-table backgroundtable"><i class="fa fa-cog"></i></th>-->
										<!--										<th class="success border-table backgroundtable"><i class="fa fa-cog"></i></th>-->
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;

										$id = $this->session->userdata('id');
										$sqlx="SELECT * FROM pengambilansuratimport where adminId='$id' ORDER BY psId ASC";
										$queryimport = $amodel->queryselect($sqlx);
										foreach ($queryimport as $key => $value) {
											?>
											<tr>
												<td class="text-center border-table"><?php print $no; ?></td>
												<!--												<td class="text-left border-table">--><?php //print $value->kKodeKlasifikasi; ?><!--</td>-->
												<td class="text-left border-table"><h4 style="font-size: 20px;"><span class="label label-success"><?php print $value->kKodeKlasifikasi." - "."<b style='color: black'>".$value->sCode."/".$value->pNo."</b>"."/".$value->pMonth."/".$value->pYear; ?></span></h4></td>
												<td class="text-left border-table"><B><?php print $value->sName; ?></B></td>
												<td class="text-left border-table"><?php print $value->adminName; ?></td>
												<td class="text-left border-table"><?php print $value->bName; ?></td>
												<td class="text-left border-table"><?php print $value->pTujuan; ?></td>
												<td class="text-left border-table"><?php print date("d/F/Y",$value->pTimestampGet); ?></td>


												<!--												<td class="text-center border-table">-->
												<!--													<a href="--><?php //print base_url("/SuratControl/EditSuratKeluar/".$value->SId); ?><!--" class=""><i class="fa fa-pencil-square" style=""></i></a></td>-->
												<!--												<td class="text-center border-table">-->
												<!--													<a class="delete" href="javascript:if (window.confirm('--><?php //print "Apakah anda yakin untuk hapus data ini?"; ?><!--')){ validate_delete('--><?php //print site_url()."/SuratControl/CdeleteSuratKeluar/".$value->SId ?><!--','--><?php //print site_url()."/SuratControl/SuratKeluar" ?><!--') };" style="color:red "><i class="fa fa-trash" ></i></a>-->
												<!--												</td>-->

											</tr>
											<?php
											$no++;
										}


									/*									window.location='<?php print base_url('Acontrol/Cdeleteadmin/'.$value->adminId) ?>';*/
									?>
									</tbody>
									<tfoot>
									</tfoot>
								</table>

							</div>

						</div>

					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
</div>

