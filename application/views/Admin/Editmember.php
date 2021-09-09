<script>
    $(document).ready(function(){
        $('#result').hide();
        validate("#addform","<?php print site_url()."/Mcontrol/Ceditmember" ?>","<?php print site_url()."/Mview/member" ?>");
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
										<a href="<?php print base_url("Mview/member"); ?>" class="btn btn-lg btn-warning" style="margin-bottom: 20px;">Kembali</a><br>
										<div class="panel panel-success">
											<?php
											foreach ($query2 as $key2 => $value2){}
											?>
											<div class="panel-body">
												<?php
												$attributes = array('id' => 'addform','name' => 'addform');
												print form_open_multipart('Mcontrol/Ceditmember',$attributes); ?>
												<div class="form-group">
													<input type="hidden" class="form-control" name="id"  value="<?php print $value2->mId; ?>" required>
													<label>Nama Member:</label>
													<input type="text" class="form-control" name="name" value="<?php print $value2->mName ?>" placeholder="Masukan nama member" required>
												</div>
												<div class="form-group">
													<label>Email:</label>
													<input type="email" class="form-control" name="email"  autocomplete="email" value="<?php print $value2->mEmail ?>" placeholder="Masukan email" required>
												</div>
												<div class="form-group">
													<label>Masukan no WhatsApp:</label>
													<input type="number" class="form-control" name="nowa" placeholder="Masukan no WhatsApp" value="<?php print $value2->mWA ?>" required>
												</div>
												<div class="form-group">
													<label>Jenis Kelamin:</label><br>
													<label class="radio-inline"><input type="radio" name="jeniskelamin"  <?php if($value2->mGender == "m"){ print "checked";} ?> value="m"  required>Laki-Laki</label>
													<label class="radio-inline"><input type="radio" name="jeniskelamin" value="f" <?php if($value2->mGender == "f"){ print "checked";} ?> required> Perempuan</label>
												</div>
											</div>
											<center><button type="submit"  name="bsubmit" id="bsubmit" class="btn btn-lg btn-info">Update</button></center>
											<br>
										</div>
									</div>
									<?php echo form_close(); ?>


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

