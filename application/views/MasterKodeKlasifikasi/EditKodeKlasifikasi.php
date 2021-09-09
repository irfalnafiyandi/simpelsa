<?php
$id =  $this->uri->segment(3);
?>
<script>
	$(document).ready(function(){
		$('#result').hide();
		validate("#editform","<?php print site_url()."/KlasifikasiControl/CeditKodeKlasifikasi/".$id  ?>","<?php print site_url()."/KlasifikasiControl/KodeKlasifikasi" ?>");
	});
</script>

<div class="content-wrapper">
	<div id="result"></div>
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
						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">
								<div class="row">
									<div class="col-md-6">
										<a href="<?php print base_url("KlasifikasiControl/KodeKlasifikasi"); ?>" class="btn btn-lg btn-warning" style="margin-bottom: 20px;">Kembali</a><br>

										<?php
										foreach ($query2 as $key2 => $value2){}
										?>

										<div class="panel panel-success">
											<div class="panel-body">
												<?php

												//print form_open_multipart('',$attributes); ?>
												<!--												<form action="--><?php //print site_url("/Acontrol/Caddadmin"); ?><!--" id="addform" name="addform" enctype="multipart/form-data" method="post" accept-charset="utf-8">-->
												<?php
												$id = $this->uri->segment(3);
												?>
												<form class="col-md-6" id="editform" >

												<input type="hidden" class="form-control" name="id"  value="<?php print $value2->KodeId; ?>" placeholder="Masukan nama admin"  required>

												<div class="form-group">
													<label>Kode:</label>
													<input type="text" class="form-control" name="name"  value="<?php print $value2->kKodeKlasifikasi; ?>" placeholder="Masukan nama admin"  required>
												</div>
												<div class="form-group">
													<label>Jenis :</label>
													<input type="text" class="form-control" name="jenis"  value="<?php print $value2->kJenis; ?>" placeholder="Masukan nama admin"  required>
												</div>



												<center><button type="submit"  name="bsubmit" id="bsubmit" class="btn btn-lg btn-info">Update</button></center>
												</form>
											</div>
										</div>


									</div>
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

