<?php
$tahun  = $this->uri->segment('3');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cetak laporan </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/style/css/AdminLTE.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<style type="text/css">



</style>
<div class="container tluar">
	<div class="row tluar">
		<div class="col-xs-12" >
			<div class="text-center" style="font-size: x-large"><b>Laporan Appelsa</b></div>
			<div class="text-center" style="font-size: medium"><b>Jl. Hang Tuah Blk. A No.142 a dan 142 b</b></div>


		</div>
	</div>

	<div class="table-responsive" style="margin-top: 10px;">
		<table id="" class="table table-bordered table-striped table-hover border-table">
			<thead>
			<tr>
				<th width="3% " class="success border-table backgroundtable">No</th>
				<th width="" class="success border-table backgroundtable text-left">Pelapor</th>
				<th width="10%" class="success border-table backgroundtable">Email Pelapor</th>
				<th width="10%" class="success border-table backgroundtable">Hp Pelaporan</th>
				<th width="10%" class="success border-table backgroundtable">Tanggal Laporan</th>
				<th width="10%" class="success border-table backgroundtable">Keterangan</th>
				<th width="10%" class="success border-table backgroundtable">Statu</th>




			</tr>
			</thead>
			<tbody>
			<?php


			$bulanangka = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
			$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");


			$no = 1;

			$namabulan = "";
			$totalp = 0;
			$keuntunganp = 0;
			foreach ($query as $key => $value) {

				?>
				<tr>
					<td class="text-center border-table"><?php print $no; ?></td>
					<td class="text-left border-table"><b><?php print TglIndo($value->tanggal_laporan); ?></b></td>
					<td class="text-left border-table">

					</td>



				</tr>
				<?php
				$no++;
			}


			?>
			<tr>
				<td class="text-center border-table" colspan="2" style="padding: 0px;"><h4><strong>Total</strong></h4></td>
				<td class="text-right border-table text-bold" ><?php print "Rp".number_format($totalp, 0, ',', '.');  ?></td>
				<td class="text-right border-table text-bold"> <?php print "Rp".number_format($keuntunganp, 0, ',', '.');  ?></td>
			</tr>


			</tbody>
			<tfoot>
			</tfoot>
		</table>


	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">

				Pekanbaru, <?php print date('d')."/".date("m")."/".date("Y"); ?>&nbsp;&nbsp;&nbsp;&nbsp;
				<br><br><br><br><br><br>
				<b><?php print $namasession; ?></b>
			</div>
		</div>
	</div>








</body>
</html>
