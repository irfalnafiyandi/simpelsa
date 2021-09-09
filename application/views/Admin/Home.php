<script>
	$(document).ready(function () {
	$('.fancybox-frame').fancybox({
		type: 'iframe',
		arrows: false,
		iframe : {
			css : {
				width : '800px',
				height : '600px'
			}
		},

	});
	});


</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
			<?php print $projectname; ?>
        <small><?php print $title; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="glyphicon glyphicon-home"></i> <?php print $projectname; ?></a></li>
            <li class="active"><?php print $title; ?></li>
        </ol>
    </section>   
    
    
    
    
    <!-- Main content -->

    <section class="content">
        <!-- Info boxes -->
		<?php
		if($session_gid!=9){
			?>
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-yellow"><i class="fa fa-gift"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">PRODUCT</span>
							<span class="info-box-number"><?php print $product ?></span>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">ORDER</span>
							<span class="info-box-number"><?php print $order ?></span>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-green"><i class="glyphicon glyphicon-bed"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">SUPPLIER</span>
							<span class="info-box-number"><?php print $supplier ?></span>
						</div>
					</div>
				</div>
				<!-- /.col -->
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon label-success"><i class="fa fa-money"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">TOTAL HARI INI</span>
							<span class="info-box-number"><?php print "Rp".number_format($totalhari, 0, ',', '.');  ?></span>

						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon label-success"><i class="fa fa-money"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">KEUNTUNGAN HARI INI</span>
							<span class="info-box-number"><?php print "Rp".number_format($keuntuganhari, 0, ',', '.');  ?></span>

						</div>
					</div>
				</div>
				<!-- /.col -->
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon label-primary"><i class="fa fa-money"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">TOTAL BULAN INI</span>
							<span class="info-box-number"><?php print "Rp".number_format($totalbulan, 0, ',', '.');  ?></span>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon label-primary"><i class="fa fa-money"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">KEUNTUNGAN BULAN INI</span>
							<span class="info-box-number"><?php print "Rp".number_format($keuntuganbulan, 0, ',', '.');  ?></span>

						</div>
					</div>
				</div>
				<!-- /.col -->
			</div>
			<?php
		}
		?>

		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="box">
					<div class="box-header">

					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="panel panel-default">
							<div class="panel panel-heading"><strong>List Product yang akan habis</strong> </div>

							<div class="panel-body table-responsive">
								<table id="example1" class="table table-bordered table-striped table-hover border-table">
									<thead>
									<tr>
										<th width="1% text-center" class="success border-table backgroundtable">No</th>
										<th width="" class="success border-table backgroundtable">Nama</th>
										<th width="5%" class="success border-table backgroundtable">Sisa Stock</th>
									</tr>
									</thead>
									<tbody>
									<?php

									$sqlx="SELECT * FROM product p inner join satuan sp on p.spId = sp.spId WHERE pQty < 3  ";
									$query =  $amodel->queryselect($sqlx);
									$rows =  count($query);
									$subtotal = 0;
									$diskon = 0;
									$no = 1;


										foreach ($query as $key => $value) {
											?>
											<tr>
												<td class="text-center border-table"><?php print $no; ?></td>
												<td class="text-left border-table">
													<div class="row">
														<div class="col-md-12">
															<a href="<?php print base_url('productControl'); ?>/detailProduct/<?php print $value->pId; ?>" class=" fancybox-frame"><strong><?php print $value->pCode ?></strong>
																- <?php print $value->pName; ?><br></a>
														</div>
													</div>
												</td>

												<td class="text-left border-table">
													<span class="label label-default" data-toggle="tooltip" data-placement="top" title="Sisa Stok Barang: <?php print $value->pQty." ".$value->spName; ?> "><?php print $value->pQty." <b>".$value->spName; ?></b></span>
													</b></td>




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
