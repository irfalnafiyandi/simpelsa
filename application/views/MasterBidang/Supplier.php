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
									<a href="<?php print base_url('SupplierControl'); ?>/AddSupplier" class="btn btn-primary "><i class="fa fa-plus"></i> Tambah</a>
								</div>
							</div>
						</div>

						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">
								<table id="example1" class="table table-bordered table-striped table-hover border-table">
									<thead>
									<tr>
										<th width="3% text-center" class="success border-table backgroundtable">No</th>
										<th width="20%" class="success border-table backgroundtable">Nama</th>
										<th width="" class="success border-table backgroundtable">No HP</th>
										<th width="" class="success border-table backgroundtable">Alamat</th>
										<th width="" class="success border-table backgroundtable">Product</th>
										<th width="10%" class="success border-table backgroundtable"><i class="fa fa-cog"></i></th>
										<th width="10%" class="success border-table backgroundtable"><i class="fa fa-cog"></i></th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;


									foreach ($query as $key => $value) {
										?>
										<tr>
											<td class="text-center border-table"><?php print $no; ?></td>
											<td class="text-left border-table"><?php print $value->sName; ?></td>
											<td class="text-left border-table"><?php print $value->sNoHP; ?></td>
											<td class="text-left border-table"><?php print $value->sAlamat; ?></td>
											<td class="text-left border-table"><center><span class="label label-primary"><?php print $amodel->countdata("product", "sId='{$value->sId}'");?></span></center></td>



											<td class="text-center border-table">
												<a href="<?php print base_url("/SupplierControl/EditSupplier/".$value->sId); ?>" class=""><i class="fa fa-pencil-square" style=""></i></a></td>
											<td class="text-center border-table">
												<a class="delete" href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk hapus data ini?"; ?>')){ validate_delete('<?php print site_url()."/SupplierControl/CdeleteSupplier/".$value->sId ?>','<?php print site_url()."/SupplierControl/" ?>') };" style="color:red "><i class="fa fa-trash" ></i></a>
											</td>

										</tr>
										<?php
										$no++;
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
