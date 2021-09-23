<?php
$tahun  = $this->uri->segment('3');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cetak laporan </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="<?php print base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<script src="<?php print base_url() ?>assets/admin/js/jquery.min.js"></script>
	<script src="<?php print base_url() ?>assets/admin/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container tluar">
	<div class="row tluar">
		<div class="col-xs-12" >
			<div class="text-center" style="font-size: x-large"><b>Laporan Appelsa</b></div>
			<div class="text-center" style="font-size: medium"><b>Jl. Hang Tuah Blk. A No.142 a dan 142 b</b></div>


		</div>
	</div>

	<div class="table-responsive" style="margin-top: 10px;">
		<table id="" class="table table-bordered" width="100%" border="1" style="border-collapse: collapse; width: 100%;">
			<thead>
			<tr>
				<th width="3% " class="success border-table backgroundtable">No</th>
				<th width="10%">Pelapor</th>
				<th width="10%" >Email Pelapor</th>
				<th width="10%" >Hp Pelaporan</th>
				<th width="10%" >Tanggal Laporan</th>

				<th width="10%" >Status</th>




			</tr>
			</thead>
			<tbody>
			<?php
			$namabulan = "";
			$totalp = 0;
			$keuntunganp = 0;
			$no=1;
			if($query){
				foreach ($query as $key => $value) {

					?>
					<tr>

						<td class="text-center border-table"><?php print $no; ?></td>

						<td class="text-center "> <?php print $value->nama_pelapor ?> </td>
						<td class="text-center "> <?php print $value->email_pelapor; ?> </td>
						<td class="text-center "> <?php print $value->hp_pelapor; ?> </td>
						<td class="text-center "> <?php print TglIndo($value->tanggal_laporan); ?> </td>

						<td class="text-center "> <?php
							if($value->status_laporan=="b"){
								?><span class="badge badge-primary">Baru</span><?php

							}elseif ($value->status_laporan=="p"){
								?><span class="badge badge-warning">Proses</span><?php

							}elseif ($value->status_laporan=="y"){
								?><span class="badge badge-success">Selesai</span><?php

							}elseif ($value->status_laporan=="n"){
								?><span class="badge badge-danger">Ditolak</span><?php

							} ?>
						</td>





					</tr>
					<?php
					$no++;
				}
			}else{
				?>
				<tr>

					<td colspan="6" class="text-center"><center><?php print "Data Tidak Ditemukan"; ?></center></td>







				</tr>
				<?php

			}



			?>



			</tbody>
			<tfoot>
			</tfoot>
		</table>


	</div>
	<br><br><br><br><br><br>
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">

				Pekanbaru, <?php print date('d')."/".date("m")."/".date("Y"); ?>&nbsp;&nbsp;&nbsp;&nbsp;
				<br><br><br><br><br><br>
				<b><?php print $namadmin; ?></b>
			</div>
		</div>
	</div>








</body>
</html>
