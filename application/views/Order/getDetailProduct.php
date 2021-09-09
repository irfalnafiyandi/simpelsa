<?php


$sqlx="SELECT * FROM product p inner join category c on p.cId = c.cId inner join supplier s on s.sId = p.sId inner join satuan sp on   sp.spId = p.spId where p.pId = '$id' ";
$query =  $amodel->queryselect($sqlx);
foreach ($query as $key=>$value){

}

?>
<div class="panel panel-default" style="margin-top: 20px;">

	<div class="panel-body">
		<table class="table table-bordered">
			<tbody>
			<tr>
				<td><strong>Harga Modal</strong></td>
				<td>:</td>
				<td><span class="label label-primary" data-toggle="tooltip" data-placement="top" title="Harga Modal: <?php print "Rp".number_format($value->pPriceBasic, 0, ',', '.') ?> "><?php print "Rp".number_format($value->pPriceBasic, 0, ',', '.') ?></span></td>
			</tr>
			<tr>
				<td><strong>Sisa Stok</strong></td>
				<td>:</td>
				<td><span class="label label-warning" style="color: black !important;" data-toggle="tooltip" data-placement="top" title="Sisa Stok:<?php print $value->pQty; ?> "><?php print $value->pQty." ".$value->spName; ?> </span></td>
			</tr>
			<tr>
				<td><strong>Supplier</strong></td>
				<td>:</td>
				<td><span class="label label-info" data-toggle="tooltip" data-placement="top" title="Supplier: <?php print $value->sName; ?> "> <?php print $value->sName; ?></span></td>
			</tr>

			<tr>
				<td><strong>Kategori</strong></td>
				<td>:</td>
				<td><span class="label label-success" data-toggle="tooltip" data-placement="top" title="Kategori: <?php print $value->cName; ?> "><?php print $value->cName; ?></span></td>
			</tr>
			</tbody>
		</table>


	</div>
</div>
