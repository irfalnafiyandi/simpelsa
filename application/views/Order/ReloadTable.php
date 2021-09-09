<?php
$getdata = $amodel->getval("orderPCC,orderTimestamp,orderCompleted,orderStatus","orders","orderId='$id'");
$countdata = $amodel->countdata("ordersdetail","orderId='$id'");

?>


<script>
	$(document).ready(function () {
		$('#result').hide();

		function reloadTable() {
			$.ajax({
				url: "<?php print base_url("OrderControl/reloadTable/".$id);?>",
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
					width : '600px'
				}
			},
			afterClose: function () {
				reloadTable();
			},
		});




	});
</script>

<div class="panel panel-default table-responsive">
	<div class="panel-body table-responsive">
		<table id=""
			   class="table table-bordered table-striped table-hover border-table">
			<thead>
			<tr>
				<th width="3% text-center" class="success border-table backgroundtable">No</th>
				<th width="" class="success border-table backgroundtable">Nama Product</th>

				<th width="10%" class="success border-table backgroundtable">Harga</th>
				<th width="5%" class="success border-table backgroundtable">Kuantiti</th>
				<th width="5%" class="success border-table backgroundtable">Diskon</th>
				<th width="" class="success border-table backgroundtable">Sub Total</th>


				<?php
				if($getdata[0]->orderStatus=="unpaid"){
					?>
					<th width="5%" class="success border-table backgroundtable"><i
							class="fa fa-cog"></i></th>
					<th width="5%" class="success border-table backgroundtable"><i
							class="fa fa-cog"></i></th><?php

				}
				?>

			</tr>
			</thead>
			<tbody>
			<?php

			$sqlx="SELECT * FROM ordersdetail o inner join  product p on p.pId = o.pId inner join category c on p.cId = c.cId inner join supplier s on s.sId = p.sId inner join satuan sp on   sp.spId = p.spId WHERE orderId='$id'  ";
			$query =  $amodel->queryselect($sqlx);
			$rows =  count($query);
			$subtotal = 0;
			$diskon = 0;
			$no = 1;
			if ($rows < 1) {
				?><tr><td class="text-center" colspan="8">Data tidak ditemukan</td></tr><?php
			} else {
				foreach ($query as $key => $value) {
					$subtotal = $subtotal + $value->detailSubtotal;
					$diskon = $diskon + $value->detailDiscount;
					?>
					<tr>
						<td class="text-center border-table"><?php print $no; ?></td>
						<td class="text-left border-table">
							<div class="row">
								<div class="col-md-2 col-xs-2">
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
												 onerror="this.onerror=null; this.src='<?php print base_url() . "assets/image/no-image.png" ?>'"></a>
										<?php
									}
									?>


								</div>
								<div class="col-md-10  col-xs-10">
									<a href="<?php print base_url('productControl'); ?>/detailProduct/<?php print $value->pId; ?>" class=" fancybox-frame"><strong><?php print $value->pCode ?></strong>
										- <?php print $value->pName; ?><br></a>
									<small><b>Kategori: </b></small>  <span class="label label-warning" data-toggle="tooltip" data-placement="top" title="Kategori: <?php print $value->cName; ?> "><?php print $value->cName; ?></span><br>
									<small><b>Supplier: </b></small>  <span class="label label-info" data-toggle="tooltip" data-placement="top" title="Supplier: <?php print $value->sName; ?> "><?php print $value->sName; ?></span>
								</div>
							</div>
						</td>
						<td class="text-center border-table">
							<span class="label label-primary" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Harga Modal: <?php print "Rp".number_format($value->pPrice, 0, ',', '.') ?> "><?php print "Rp".number_format($value->pPrice, 0, ',', '.');  ?></span></td>
						<td class="text-center border-table">
							<span class="label label-warning" style="font-size: small;color: black !important;" data-toggle="tooltip" data-placement="top" title="Sisa Stok: <?php print "".number_format($value->detailQty, 0, ',', '.') ?> "><?php print $value->detailQty." <strong>".$value->spName."</strong>"; ?></span>
						</td>
						<td class="text-center border-table">
							<span class="label label-primary" style="font-size: small"><?php print "Rp".number_format($value->detailDiscount, 0, ',', '.');  ?></span></td>
						<td class="text-center border-table"><span class="label label-primary" style="font-size: small"><?php print "Rp".number_format($value->detailSubtotal, 0, ',', '.');  ?></span></td>


						<?php
						if($getdata[0]->orderStatus=="unpaid"){
							?>
							<td class="text-center border-table">

								<a href="<?php print base_url('OrderControl/Editdetailfancy/'.$id.'/'.$value->detailId); ?>"
								   class="  fancybox-frame"><i class="fa fa-pencil-square" style=""></i></a>
							</td>
							<td class="text-center border-table">
								<a class="delete"
								   href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk hapus data ini?"; ?>')){ validate_delete('<?php print site_url() . "/OrderControl/CdeleteDetailOrder/" . $value->detailId ?>/<?php print $id; ?>','<?php print site_url() . "/OrderControl/Adddetail/".$id; ?>') };"
								   style="color:red " data-toggle="tooltip" data-placement="top" title="Hapus Data: <?php print $value->pName; ?> "><i class="fa fa-trash"></i></a>
							</td>
							<?php

						}

						?>


					</tr>
					<?php
					$no++;
				}
			}



			?>
			<tr class="">
				<td class=" border-table" colspan="4" ><strong style="font-size: medium">Total</strong></td>

				<td class="text-center  border-table"><strong><?php print "Rp".number_format($diskon, 0, ',', '.');  ?></strong></td>
				<td class="text-center  border-table"><strong><?php print "Rp".number_format($subtotal, 0, ',', '.');  ?></strong></td>
				<?php
				if($getdata[0]->orderStatus=="unpaid"){
					?>
					<td></td>
					<td></td>
					<?php

				}

				?>




			</tr>

			</tbody>
			<tfoot>
			</tfoot>
		</table>

		<div class="row" style="margin-top: 20px;">
			<div class="col-md-12">
				<?php
				if($getdata[0]->orderStatus=="paid" ){
					?>
					<a href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk membatalkan orderan ini?"; ?>')){ validateurl('<?php print site_url() . "/OrderControl/CcancelOrder/" . $id ?>','<?php print site_url() . "/OrderControl/Adddetail/".$id ?>') };" class="btn btn-danger"><i class="fa fa-money"></i>  Batalkan Pemesanan</a>
					<a href="<?php print site_url() . "/OrderControl/cCetakOrder/" . $id ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>  Cetak Struk</a>
					<?php

				}elseif($getdata[0]->orderStatus=="unpaid" AND $countdata > 0){
					?>
					<a href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk menyelesaikan orderan ini?"; ?>')){ validateurl('<?php print site_url() . "/OrderControl/CdoneOrder/" . $id ?>','<?php print site_url() . "/OrderControl/Adddetail/".$id ?>') };" class="btn btn-success"><i class="fa fa-money"></i>  Selesaikan Pembayaran</a>
					<?php
				}
				?>


			</div>

		</div>





	</div>


</div>
