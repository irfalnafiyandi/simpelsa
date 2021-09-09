<style>
	@page { margin: 0%; }
	/*@media print*/
	/*{*/
	/*	@page*/
	/*	{*/
	/*		size: 5.5in 8.5in ;*/
	/*		size: landscape;*/
	/*	}*/
	/*}*/
	@font-face {
		font-family: "Nunito;
		src: local("Nunito"), url("<?php print base_url("/assets/style/font/Nunito/Nunito-ExtraLight.ttf") ?>") format("truetype");
		font-weight: normal;
		font-style: normal;
	}


	body {
		font-size: 60%;
		font-family: "Nunito-ExtraLight", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;
	}





</style>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cetak Struk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!--	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

</head>
<body>
<?php
$getdata = $amodel->getval("orderPCC,orderStatus", "orders", "orderId={$id}");

?>

<div style="margin: 0px; width: 100%" >
	<center style=" font-size: large"  class="text-center"><b>ARFI FASHION</b></center>
	<center style="font-size: 90%;" class="text-center">Jl Hangtuah Ujung Ruko No. 142</center>
	<center style="font-size: 90%;" class="text-center">www.cobalaris.com</center>
	<center style="font-size: 90%;" class="text-center"><b>============================================</b></center>
	<div style="font-size: 90%;" class="text-center"><?php  print date('H:i')." ".date('d/m/Y'); ?>&nbsp;&nbsp;&nbsp;<span align="right"><?php print $getdata[0]->orderPCC ?></span></div>

	<center style="font-size: 90%;" class="text-center"><b>============================================</b></center>
	<table width="100%" border="0px">
		<tr style="font-weight: bold">
			<td style="font-size: 60%;">Name </td>
			<td style="font-size: 60%;width: 1%">Qty </td>
			<td style="font-size: 60%;width: 20%"> <center>Harga</center> </td>
			<td style="font-size: 60%;width: 20%"> <center>Diskon</center> </td>
			<td style="font-size: 60%;width: 20%"> <center>Subtotal</center> </td>

		</tr>
		<?php
		$sqlx="SELECT * FROM ordersdetail o inner join  product p on p.pId = o.pId inner join category c on p.cId = c.cId inner join supplier s on s.sId = p.sId inner join satuan sp on   sp.spId = p.spId inner join orders ord on ord.orderId = o.orderId  WHERE o.orderId='$id'  ";
		$query =  $amodel->queryselect($sqlx);
		$totqty = 0;
		foreach ($query as $keyc => $valuec){
			$totqty = $totqty + $valuec->detailQty;

			?>
			<tr>
				<td colspan="5" style=";font-size: 100%;"><?php print  $valuec->pName; ?></td>
			</tr>
			<tr>
				<td></td>

				<td  style="font-size: 85%;" align="right"> <span style="margin-right: 20px;"><?php print  $valuec->detailQty ?></span></td>
				<td  style="width: 50px;font-size: 85%;" class=""><center><?php print number_format($valuec->pPrice, 0, ',', '.');?></center></td>
				<td  style="width: 50px;font-size: 85%;" class=""><center><?php
					if($valuec->detailDiscount != 0){
						print number_format($valuec->detailDiscount, 0, ',', '.');
					}else{
						print "-";
					}?></center>
				</td>

				<td  style="width: 50px;font-size: 85%;" class="text-center"><?php print number_format($valuec->detailSubtotal, 0, ',', '.');?></td>

			</tr>


			<?php
		}

		?>



		<tr>
			<td><br> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td></td>

		</tr>
		<tr>
			<td><span style="font-size: 80%;"><strong>Total</strong></span></td>
			<td  style="font-size: 85%;" align="right"> <span style="margin-right: 20px;"><?php print  $valuec->detailQty ?></span></td>
			<td></td>
			<td></td>
			<td ><span  style="width: 50px;font-size: 85%;"><?php print number_format($valuec->orderTotal, 0, ',', '.');?></span></td>


		</tr>
	</table>
	<br>

	<center style="font-size: 90%;" class="text-center"><b>=====================================================</b></center>

	<center style="font-size: 85%; margin-top: 5px; " class="text-center">Terima Kasih, Selamat Berbelanja Kembali</center>
	<center style="font-size: 85%; margin-top: 5px;  " class="text-center"><span>=Layanan Konsumen ARFI FASHION=</span></center>
	<center style=" font-size: 85%; margin-top: 5px;" class="text-center"><span>HP 0813 7825 8488 | WA 0813 7825 8488 </span></center>
	<center style=" font-size: 85%; margin-top: 5px; " class="text-center"><span>HP 0822 8840 7688 | WA 0822 8840 7688 </span></center>




</div>


</body>
</html>
