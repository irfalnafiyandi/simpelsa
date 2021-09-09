
<script>
	$(document).ready(function(){
		$('#result').hide();
		validate("#formvalidate","<?php print site_url()."/Suratmasukcontrol/CaddSuratMasuk"  ?>","<?php print site_url()."/suratmasukcontrol/suratmasuk" ?>");
	});


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
										<a href="<?php print base_url("suratmasukcontrol/suratmasuk"); ?>" class="btn  btn-warning" style="margin-bottom:20px;">Kembali</a><br>


										<div class="panel panel-success">
											<div class="panel-body">
												<form class="col-md-12" id="formvalidate" >
													<div class="form-group">
														<?php
														$adminidses = $this->session->userdata('id');
														$pencatat =  $amodel->getval("adminName","admin","adminId='$adminidses'");
														?>
														<label>Pencatat<span class="requiredcss">*</span></label>
														<input class="form-control"  type="text" value="<?php print $pencatat;  ?>" disabled>
														<input class="form-control"  type="hidden" name="pencatat" id="pencatat"   value="<?php print $adminidses;  ?>">
													</div>
													<div class="form-group">
														<label>Tanggal<span class="requiredcss">*</span></label>
														<input class="form-control datepickerdate"  type="text" name="tanggal" value="<?php print date('d/m/Y'); ?>" autocomplete="off" required>
													</div>
													<div class="form-group">
														<label>No KK<span class="requiredcss">*</span></label>
														<input class="form-control"  type="text" name="nokk" id="nokk"  required>
													</div>
													<div class="form-group">
														<label>No Tanggal Surat<span class="requiredcss">*</span></label>
														<input class="form-control"  type="text" name="notanggal" id="notanggal" required>
													</div>
													<div class="form-group">
														<label>Dari<span class="requiredcss">*</span></label>
														<input class="form-control"  type="text" name="dari" id="dari" required>
													</div>
													<div class="form-group">
														<label>Perihal<span class="requiredcss">*</span></label>
														<textarea class="form-control"  type="text" name="perihal" id="perihal" required></textarea>
													</div>
													<div class="form-group">
														<label for="filescan">File Scan Disposisi<span class="requiredcss">*</span></label>
														<input type="file" name="filescan" id="filescan" class="form-control" required>
													</div>
													<center><button type="submit"  name="bsubmit" id="bsubmit" class="btn btn-md btn-info">Tambah</button></center>
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

