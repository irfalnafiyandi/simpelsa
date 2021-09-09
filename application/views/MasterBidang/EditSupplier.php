<?php
$id =  $this->uri->segment(3);
?>
<script>
	$(document).ready(function(){
		$('#result').hide();
		validate("#editform","<?php print site_url()."/SupplierControl/CeditSupplier/".$id  ?>","<?php print site_url()."/SupplierControl/" ?>");
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
										<a href="<?php print base_url("SupplierControl/"); ?>" class="btn btn-lg btn-warning" style="margin-bottom: 20px;"><i class="fa fa-angle-double-left"></i> Kembali</a><br>

										<?php
										foreach ($query2 as $key2 => $value2){}
										?>

										<div class="panel panel-success">
											<div class="panel-body">
												<?php
												$id = $this->uri->segment(3);
												?>
												<form class="" id="editform" >



													<div class="form-group">
														<label>Nama <span class="requiredcss"></span></label>
														<input type="text" class="form-control" name="name"  value="<?php print $value2->sName; ?>" placeholder="Masukan nama admin"  required>
													</div>
													<div class="form-group">
														<label>No HP</label>
														<input type="text" class="form-control" name="hp" placeholder="Masukan no hp"  value="<?php print $value2->sNoHP; ?>" >
													</div>
													<div class="form-group">
														<label>Alamat </label>
														<textarea class="form-control" name="alamat" placeholder="Masukan Alamat"><?php print $value2->sAlamat; ?> </textarea>

													</div>

													<center>
														<button type="submit" name="bsubmit" id="bsubmit"
																class="btn btn-primary"><i class="fa fa-plus"></i> Update
														</button>
														<a href="<?php print base_url("SupplierControl/"); ?>"  name="bsubmit" id="bsubmit"
														   class="btn  btn-warning"><i class="fa fa-angle-double-left"></i> Kembali
														</a>
													</center>





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

