
<script>
	$(document).ready(function () {
		$('#result').hide();

		function reloadTable() {
			$.ajax({
				url: "<?php print base_url("StockControl/reloadTable/");?>",
				cache: false,
				success: function (msg) {
					$('#reload').html(msg);
				}
			});
		}

		$('.fancybox-frame').fancybox({
			type: 'iframe',
			arrows: false,
			iframe : {
				css : {
					width : '600px',
					height : '600px'
				}
			},
			afterClose: function () {
				reloadTable();

			},
		});






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
									<a href="<?php print base_url('StockControl'); ?>/AddStock" class="btn btn-primary fancybox-frame"><i class="fa fa-plus"></i> Tambah</a>
								</div>
							</div>
						</div>

						<div  id="reload">
							<div class="panel panel-default table-responsive">
								<div class="panel-body table-responsive">
									<table id="example1" class="table table-bordered table-striped table-hover border-table">
										<thead>
										<tr>
											<th width="3% text-center" class="success border-table backgroundtable">No</th>
											<th width="20%" class="success border-table backgroundtable">Nama Product</th>
											<th width="" class="success border-table backgroundtable">Jumlah</th>
											<th width="" class="success border-table backgroundtable">Tanggal</th>
											<th width="" class="success border-table backgroundtable">User</th>
											<th width="10%" class="success border-table backgroundtable">Status</th>
											<th width="10%" class="success border-table backgroundtable"><i class="fa fa-cog"></i></th>
										</tr>
										</thead>
										<tbody>
										<?php
										$no =  1;
										$rows = count($query);


										foreach ($query as $key => $value) {
											?>
											<tr>
												<td class="text-center border-table"><?php print $no; ?></td>
												<td class="text-left border-table">
													<a href="<?php print base_url('productControl'); ?>/detailProduct/<?php print $value->pId; ?>" class=" fancybox-frame"><strong><?php print $value->pName; ?></strong></a>
												</td>
												<td class="text-center border-table">
													<span class="label label-warning" style="font-size: small;color: black !important;" data-toggle="tooltip" data-placement="top" title="Sisa Stok: <?php print number_format($value->stockQty, 0, ',', '.') ?> "><?php print $value->stockQty." <strong>".$value->spName."</strong>"; ?></span>
												</td>

												<td class="text-left border-table"><?php print date('d F Y H:i A',$value->stockTime); ?></td>
												<td class="text-left border-table"><?php print $value->adminName; ?></td>
												<td class="text-center border-table">
													<?php
													if($value->stockStatus == "in"){
														?><span class="label label-success" data-toggle="tooltip" data-placement="top" title="Status: Tambahan Stock "><?php print "Penambahan"; ?></span><?php

													}else{
														?><span class="label label-danger"  data-toggle="tooltip" data-placement="top" title="Status: Pembelian Prodcut "><?php print "Pembelian"; ?></span><?php

													}
													?>

												<td class="text-center border-table">
													<?php
													if($value->stockStatus == "in"){
														?><a class="delete" href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk hapus data ini?"; ?>')){ validate_delete('<?php print site_url()."/StockControl/CdeleteHistoryStock/".$value->stockId ?>','<?php print site_url()."/StockControl/" ?>') };" style="color:red "><i class="fa fa-trash" ></i></a><?php

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
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
</div>
