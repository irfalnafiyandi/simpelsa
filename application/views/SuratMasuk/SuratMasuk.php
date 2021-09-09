<script>
	$(document).ready(function(){
		$('#result').hide();
		//validate_delete(".delete","<?php print site_url()."/Acontrol/Cdeleteadmin" ?>","<?php print site_url()."/SuratControl/SuratKeluar" ?>");
	});
</script>


<div class="content-wrapper">
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
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
								<div class="pull-right">

									<a href="<?php print base_url('Suratmasukcontrol'); ?>/AddSuratMasuk" class="btn btn-primary "><i class="fa fa-plus"></i> Tambah Surat Masuk</a>
								</div>
							</div>
						</div>

						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">
								<table id="example1" class="table table-bordered table-striped table-hover border-table">
									<thead>
									<tr>
										<th width="3%" class="success border-table backgroundtable">No</th>
										<th  class="success border-table backgroundtable">Pencatat</th>
										<th  class="success border-table backgroundtable">Tanggal</th>
										<th  class="success border-table backgroundtable">Nomor KK</th>
										<th class="success border-table backgroundtable">No Tanggal Surat</th>
										<th  class="success border-table backgroundtable">Dari</th>
										<th  class="success border-table backgroundtable">Perihal</th>
										<th style="width:40px;" class="backgroundtable text-center"><i class="fa fa-cog"></i></th>
										<th style="width:40px;" class="backgroundtable text-center"><i class="fa fa-cog"></i></th>
										<th style="width:40px;" class="backgroundtable text-center"><i class="fa fa-cog"></i></th>

									</tr>
									</thead>
									<tbody>
									<?php
									$no = ($this->uri->segment('3') ) + 1;
									if($rows < 1 ){
										?>
										<tr>
											<td class="text-center" colspan="7">Data tidak ditemukan</td>
										</tr>
										<?php

									}else{
										foreach ($query as $key => $value) {
											?>
											<tr>
												<td class="text-center border-table"><?php print $no; ?></td>
												<td class="text-left border-table"><?php print $value->adminName; ?></td>
												<td class="text-left border-table"><?php print date("d/F/Y",$value->smTanggalTimestamp); ?></td>

												<td class="text-left border-table"><B><?php print $value->smNomorKK; ?></B></td>
												<td class="text-left border-table"><B><?php print $value->smNoTanggalSurat; ?></B></td>
												<td class="text-left border-table"><B><?php print $value->smDari; ?></B></td>
												<td class="text-left border-table"><B><?php print $value->smPerilhal; ?></B></td>
												<td class="text-left border-table">
													<a data-fancybox data-type="iframe" data-src="<?php print site_url()."/Suratmasukcontrol/suratmasuk" ?>" href="javascript:;">
														<center><i class="fa fa-table" title=""></i></center>

													</a>
												</td>
												<td class="text-left border-table"></td>
												<td class="text-left border-table"></td>

											</tr>
											<?php
											$no++;
										}
									}

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
