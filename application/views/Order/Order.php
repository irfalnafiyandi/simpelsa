<script>
	$(document).ready(function () {
		$('#result').hide();
		//validate_delete(".delete","<?php print site_url() . "/Acontrol/Cdeleteadmin" ?>","<?php print site_url() . "/SuratControl/SuratKeluar" ?>");
	});


</script>


<div class="content-wrapper">
	<section class="content-header">
		<h1><?php print $projectname; ?>
			<small><?php print $title; ?></small>
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
								<div class="pull-left">
									<?php

									if($uac['uac_add'] == "y"){
										?>
										<a href="<?php print base_url('OrderControl/CGenerateOrder'); ?>"
										   class="btn btn-success "><i class="fa fa-plus"></i> Tambah Orders</a>

										<a href="<?php print base_url('OrderControl/ExportOrder'); ?>"
										   class="btn btn-success "><i class="fa fa-file-excel-o"></i> Export Orders</a>
										<?php

									}



									?>

								</div>
							</div>
						</div>

						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">
								<table id="example1"
									   class="table table-bordered table-striped table-hover border-table">
									<thead>
									<tr>
										<th width="3% text-center" class="success border-table backgroundtable">No</th>
										<th width="" class="success border-table backgroundtable">No Invoice</th>
										<th width="" class="success border-table backgroundtable">Jumlah Item</th>
										<th width="" class="success border-table backgroundtable">Total</th>
										<th width="" class="success border-table backgroundtable">Keuntungan</th>
										<th width="" class="success border-table backgroundtable">Status</th>

<!--										<th width="5%" class="success border-table backgroundtable"><i-->
<!--												class="fa fa-cog"></i></th>-->
										<th width="5%" class="success border-table backgroundtable"><i
												class="fa fa-cog"></i></th>
										<th width="5%" class="success border-table backgroundtable"><i
												class="fa fa-cog"></i></th>
									</tr>
									</thead>
									<tbody>
									<?php
									$sqlx="SELECT * FROM orders o  WHERE orderDeleted ='0'  ";
									$query =  $amodel->queryselect($sqlx);
									$rows =  count($query);
									$subtotal = 0;
									$diskon = 0;
									$no = 1;

									foreach ($query as $key => $value) {
										?>
										<tr>
											<td class="text-center border-table"><?php print $no; ?></td>
											<td class="border-table">
												<strong><a href="<?php print base_url()."OrderControl/Adddetail/".$value->orderId; ?>" data-toggle="tooltip" data-placement="top" title="Detail Invoice: <?php print $value->orderPCC; ?>"><?php print $value->orderPCC; ?></a></strong><br>
												<small><strong>Tanggal Pesan: </strong> <?php print date("d F Y",$value->orderTimestamp); ?></small>

											</td>
											<td class="text-center border-table"  width="10%"><?php  $items =  $amodel->countdata("ordersdetail","orderId='$value->orderId'");print $items; ?></td>
											<td class="text-center border-table" width="7%">
												<span class="label label-primary" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Total: <?php print "Rp".number_format($value->orderTotal, 0, ',', '.') ?> "><?php print "Rp".number_format($value->orderTotal, 0, ',', '.');  ?></span>
											</td>
											<td class="text-center border-table" width="7%"><span class="label label-primary" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Total: <?php print "Rp".number_format($value->orderProfit, 0, ',', '.') ?> "><?php print "Rp".number_format($value->orderProfit, 0, ',', '.');  ?></span></td>
											<td class="text-center border-table" width="7%">
												<?php
												if($value->orderStatus=="unpaid"){
													?>
													<span class="label label-warning" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Status Belum Selesai"><?php print "Belum Selesai";  ?></span>
													<?php
												}elseif($value->orderStatus=="paid"){
													?>
													<span class="label label-success" style="font-size: small"  data-toggle="tooltip" data-placement="top" title="Status Selesai"><?php print "Selesai";  ?></span>
													<?php
												}
												?>
											</td>




											<td class="text-center border-table"  width="7%">
												<?php
												if($uac['uac_edit'] == "y"){
													?>
													<a href="<?php print base_url()."OrderControl/Adddetail/".$value->orderId; ?>"  data-toggle="tooltip" data-placement="top" title="Detail Order: <?php print $value->orderPCC;  ?>"><i class="fa fa-database"></i></a>
													<?php

												}
												?>

											</td>
											<td class="text-center border-table"  width="7%">
												<?php
												if($items == 0 AND $uac['uac_delete'] == "y"){
													?>
													<a class="delete"
													   href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk hapus data ini?"; ?>')){ validate_delete('<?php print site_url() . "/OrderControl/CdeleteOrder/" . $value->orderId ?>','<?php print site_url() . "/OrderControl/" ?>') };"
													   style="color:red " data-toggle="tooltip" data-placement="top" title="Hapus Data: <?php print $value->orderPCC; ?> "><i class="fa fa-trash"></i></a>

													<?php
												}
												?>

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
