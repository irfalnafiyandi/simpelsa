<script>
	$(document).ready(function () {
		$('#result').hide();
		//validate_delete(".delete","<?php print site_url() . "/Acontrol/Cdeleteadmin" ?>","<?php print site_url() . "/SuratControl/SuratKeluar" ?>");
	});
</script>

<?php

if(empty($tahun)){
	$tahun = date('Y');
}

?>


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
							<form action="<?php print site_url() . "/ReportControl/" ?>" method="post">
							<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
								<div class="pull-right">
									<div class="form-group">
										<label for="sel1">Pilih Tahun:</label>
										<select class="form-control" name="tahun" id="tahun" onchange="this.form.submit()" >
											<option value="2017" <?php if($tahun=="2017"){ print "selected"; } ?> >2017</option>
											<option value="2018" <?php if($tahun=="2018"){ print "selected"; } ?>>2018</option>
											<option value="2019" <?php if($tahun=="2019"){ print "selected"; } ?>>2019</option>
											<option value="2020" <?php if($tahun=="2020"){ print "selected"; } ?>>2020</option>
											<option value="2021" <?php if($tahun=="2021"){ print "selected"; } ?>>2021</option>
											<option value="2022" <?php if($tahun=="2022"){ print "selected"; } ?>>2022</option>
											<option value="2023" <?php if($tahun=="2023"){ print "selected"; } ?>>2023</option>
										</select>
									</div>
								</div>
							</div>
							</form>
						</div>

						<?php
						$query = array("1","2","3","4","5","6","7","8","9","10","11","12");
						$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");


						?>



						<div class="panel panel-default table-responsive">

							<div class="panel-body table-responsive">
								<table id="" class="table table-bordered table-striped table-hover border-table">
									<thead>
									<tr>
										<th width="3% text-center" class="success border-table backgroundtable">No</th>
										<th width="" class="success border-table backgroundtable">Bulan Dan Tahun</th>
										<th width="" class="success border-table backgroundtable">Total</th>
										<th width="" class="success border-table backgroundtable">Keuntungan</th>


									</tr>
									</thead>
									<tbody>
									<?php



										$no = 1;

										$namabulan = "";
										$totalp = 0;
										$keuntunganp = 0;
										foreach ($query as $key => $value) {
											if($value==1){
												$value =  $value - 1;
												$namabulan = $bulan[$value];
												
											}elseif($value==2){
												$value =  $value - 1;
												$namabulan = $bulan[$value];
												
											}elseif($value==3){
												$value =  $value - 1;
												$namabulan = $bulan[$value];

											}elseif($value==4){
												$value =  $value - 1;
												$namabulan = $bulan[$value];

											}elseif($value==5){
												$value =  $value - 1;
												$namabulan = $bulan[$value];

											}elseif($value==6){
												$value =  $value - 1;
												$namabulan = $bulan[$value];

											}elseif($value==7){
												$value =  $value - 1;
												$namabulan = $bulan[$value];

											}elseif($value==8){
												$value =  $value - 1;
												$namabulan = $bulan[$value];

											}elseif($value==9){
												$value =  $value - 1;
												$namabulan = $bulan[$value];

											}elseif($value==10){
												$value =  $value - 1;
												$namabulan = $bulan[$value];

											}elseif($value==11){
												$value =  $value - 1;
												$namabulan = $bulan[$value];

											}elseif($value==12){
												$value =  $value - 1;
												$namabulan = $bulan[$value];
											}
											$value = $value+1;

											?>
											<tr>
												<td class="text-center border-table"><?php print $no; ?></td>
												<td class="text-center border-table"><?php print $namabulan." ".$tahun; ?></td>
												<td class="text-right border-table">
													<?php $hasil = $amodel->getKeuntungan($value,$tahun);
													$totalp = $totalp + $hasil['total'];
													$keuntunganp = $keuntunganp + $hasil['profit']
													?>

													<span class="label label-primary" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Total: <?php print "Rp".number_format($hasil['total'], 0, ',', '.') ?> "><?php print "Rp".number_format($hasil['total'], 0, ',', '.');  ?></span>
												</td>
												<td class="text-right border-table">


													<span class="label label-success" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Total Keuntugan: <?php print "Rp".number_format($hasil['profit'], 0, ',', '.') ?> "><?php print "Rp".number_format($hasil['profit'], 0, ',', '.');  ?></span>

												</td>


											</tr>
											<?php
											$no++;
										}


									?>
									<tr>
										<td class="text-center border-table" colspan="2"><h4><strong>Total</strong></h4></td>
										<td class="text-right border-table text-bold" ><?php print "Rp".number_format($totalp, 0, ',', '.');  ?></td>
										<td class="text-right border-table text-bold"> <?php print "Rp".number_format($keuntunganp, 0, ',', '.');  ?></td>




									</tr>
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
