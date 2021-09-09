<script>
	$(document).ready(function () {
		$('#result').hide();
		//validate_delete(".delete","<?php print site_url() . "/Acontrol/Cdeleteadmin" ?>","<?php print site_url() . "/SuratControl/SuratKeluar" ?>");
		$('.fancybox-frame').fancybox({
			type: 'iframe',
			arrows: false,
			iframe : {
				css : {
					width : '600px',
					height : '600px'
				}
			},

		});
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
								<div class="pull-right">
									<a href="<?php print base_url('ProductControl'); ?>/AddProduct"
									   class="btn btn-primary "><i class="fa fa-plus"></i> Tambah</a>
									<a href="<?php print base_url('ProductControl'); ?>/ExportProduct"
									   class="btn btn-success "><i class="fa fa-file-excel-o"></i> Import Product </a>
								</div>
							</div>
						</div>

						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">


								<table id="example1" class="table table-bordered table-striped table-hover border-table">
									<thead>
									<tr>
										<th width="3% text-center" class="success border-table backgroundtable">No</th>
										<th width="" class="success border-table backgroundtable">Nama</th>
										<th width="" class="success border-table backgroundtable">Harga</th>
										<th width="5%" class="success border-table backgroundtable">Stock</th>

										<th width="5%" class="success border-table backgroundtable"><i
												class="fa fa-cog"></i></th>
										<th width="5%" class="success border-table backgroundtable"><i
												class="fa fa-cog"></i></th>
									</tr>
									</thead>
									<tbody>
									<?php
									/*

									$no = 1;

									foreach ($query as $key => $value) {
										?>
										<tr>
											<td class="text-center border-table"><?php print $no; ?></td>
											<td class="text-left border-table">
												<div class="row">
													<div class="col-md-2">
														<?php
														if($value->pPic){
															?>
															<a data-fancybox="gallery"
															   href="<?php print base_url() . "assets/product/" . $value->pDir . "/" . $value->pPic; ?>">
																<img src="<?php print base_url() . "assets/product/" . $value->pDir . "/" . $value->pPic; ?>"
																	 class="img-responsive" style="width: 100px;"
																	 onerror="this.onerror=null; this.src='<?php print base_url() . "assets/image/no-image.png" ?>'"></a>
															<?php
														}else{
															?>
															<a data-fancybox="gallery"
															   href="<?php print base_url() . "assets/image/no-image.png"  ?>">
																<img src="<?php print base_url() . "assets/image/no-image.png" ?>"
																	 class="img-responsive" style="width: 100px;"
																	 onerror="this.onerror=null; this.src='<?php print base_url() . "assets/image/no-image2.png" ?>'"></a>
															<?php
														}
														?>


													</div>
													<div class="col-md-10">
														<a href="<?php print base_url('productControl'); ?>/detailProduct/<?php print $value->pId; ?>" class=" fancybox-frame"><strong><?php print $value->pCode ?></strong>
															- <?php print $value->pName; ?><br></a>

														<small><b>Kategori: </b></small>  <span class="label label-warning" data-toggle="tooltip" data-placement="top" title="Kategori: <?php print $value->cName; ?> "><?php print $value->cName; ?></span><br>
														<small><b>Supplier: </b></small>  <span class="label label-info" data-toggle="tooltip" data-placement="top" title="Supplier: <?php print $value->sName; ?> "><?php print $value->sName; ?></span>
													</div>
												</div>
											</td>
											<td class="text-left border-table">
												<div ><small ><b>Harga Modal: </b></small>  <span class="label label-primary" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Harga Modal: <?php print "Rp".number_format($value->pPriceBasic, 0, ',', '.') ?> "><?php print "Rp".number_format($value->pPriceBasic, 0, ',', '.') ?></span> </div><br>
												<small><b>Harga Jual:&nbsp;&nbsp;&nbsp;&nbsp; </b></small>  <span class="label label-success" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Harga Jual: <?php print "Rp".number_format($value->pPrice, 0, ',', '.') ?> "><?php print "Rp".number_format($value->pPrice, 0, ',', '.') ?></span> <br/>

											</td>
											<td class="text-left border-table">
												<span class="label label-default" data-toggle="tooltip" data-placement="top" title="Sisa Stok Barang: <?php print $value->pQty." ".$value->spName; ?> "><?php print $value->pQty." <b>".$value->spName; ?></b></span>
												</b></td>


											<td class="text-center border-table">
												<a href="<?php print base_url("/ProductControl/EditProduct/" . $value->pId); ?>"
												   class="" data-toggle="tooltip" data-placement="top" title="Edit Data: <?php print $value->pName; ?> "><i class="fa fa-pencil-square" style=""></i></a></td>
											<td class="text-center border-table">
												<a class="delete"
												   href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk hapus data ini?"; ?>')){ validate_delete('<?php print site_url() . "/ProductControl/CdeleteProduct/" . $value->pId ?>','<?php print site_url() . "/ProductControl/" ?>') };"
												   style="color:red " data-toggle="tooltip" data-placement="top" title="Hapus Data: <?php print $value->pName; ?> "><i class="fa fa-trash"></i></a>
											</td>

										</tr>
										<?php
										$no++;
									}
									*/
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
