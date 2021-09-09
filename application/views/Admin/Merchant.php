


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
									<a href="<?php print base_url('Mcview'); ?>/addmerchant" class="btn btn-primary "><i class="fa fa-plus"></i> Tambah</a>
								</div>
							</div>
						</div>

						<div class="row block-break mb-20">
							<div class="col-md-12">
								<div class="pull-right">
									<form method="post" action="<?php print  base_url('Mcview/merchant') ?>" class="form-inline" name="add" id="add">
										<div class="form-group">
											<label>Pencarian : </label>
											<input type="text" name="keyword" size="30" value="<?php if(!empty($keyword)){print $keyword; }  ?>" class="form-control input-sm">
										</div>
										<button type="submit" name="submit" value="Cari" class="btn btn-sm btn-info">Cari</button>
										<?php print form_close() ?>
								</div>
							</div>
						</div>

						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">
								<table id="example1" class="table table-bordered table-striped table-hover border-table">
									<thead>
									<tr>
										<th width="3% text-center" class="success border-table backgroundtable">No</th>
										<th width="47%" class="success border-table backgroundtable">Nama</th>
										<th width="20%" class="success border-table backgroundtable">Username</th>
										<th width="20%" class="success border-table backgroundtable">Email</th>
										<th width="20%" class="success border-table backgroundtable">No WhatsApp</th>
										<th width="10%" class="success border-table backgroundtable"><i class="fa fa-cog"></i></th>
										<th width="10%" class="success border-table backgroundtable"><i class="fa fa-cog"></i></th>
										<th width="10%" class="success border-table backgroundtable"><i class="fa fa-cog"></i></th>
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
												<td class="text-left border-table"><?php print $value->merchantName; ?></td>
												<td class="text-left border-table"><b><?php print $value->merchantUsername; ?></b></td>
												<td class="text-left border-table"><b><?php print $value->merchantEmail; ?></b></td>
												<td class="text-left border-table"><b><?php print $value->merchantWa; ?></b></td>
												<td class="text-center border-table"><?php
													if($value->merchantStatus == "y"){
														?>
														<a class="delete" href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk hapus merchant ini?"; ?>')){ validate_delete('<?php print site_url()."/Mccontrol/Canonctive/".$value->merchantId ?>','<?php print site_url()."/Mcview/merchant" ?>') };" style="color:green "><i class="fa fa-user" ></i></a>
														<?php
													}else{
														?><a href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk mengaktifkan akun ini?"; ?>')){ window.location='<?php print base_url('Mccontrol/Cactive/'.$value->merchantId) ?>'; };" style="color:red "><i class="fa fa-user" style=""></i></a><?php
													} ?></td>

												<td class="text-center border-table">
													<a href="<?php print base_url("/Mcview/Editmerchant/".$value->merchantId); ?>" class=""><i class="fa fa-pencil-square" style=""></i></a></td>
												<td class="text-center border-table">
													<a class="delete" href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk hapus merchant ini?"; ?>')){ validate_delete('<?php print site_url()."/Mccontrol/Cdeletemerchant/".$value->merchantId ?>','<?php print site_url()."/Mcview/merchant" ?>') };" style="color:red "><i class="fa fa-trash" ></i></a>
												</td>

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
						<div class="text-center" style="margin-top: 20px;">
							<?php
							print  $this->pagination->create_links();
							?>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
</div>
