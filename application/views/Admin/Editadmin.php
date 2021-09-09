
<script>
    $(document).ready(function(){
        $('#result').hide();
        validate("#editform","<?php print site_url()."/Acontrol/Ceditadmin" ?>","<?php print site_url()."/Aview/admin" ?>");
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
										<a href="<?php print base_url("Aview/admin"); ?>" class="btn btn-lg btn-warning" style="margin-bottom: 20px;">Kembali</a><br>

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
												$attributes = array('id' => 'editform','name' => 'editform');
												print form_open_multipart("Acontrol/Ceditadmin/".$id,$attributes); ?>
													<input type="hidden" class="form-control" name="id"  value="<?php print $value2->adminId; ?>" placeholder="Masukan nama admin"  required>
													<div class="form-group">
														<label>Admin Group<span class="requiredcss">*</span></label>
														<select class="form-control chosen-select" name="admingroup" required>
															<option value="">Pilih Group</option>
															<?php
															foreach ($query as $key => $value) {
																?><option value="<?php print $value->groupId ?>" <?php if($value2->groupId ==$value->groupId  ){ print "selected";} ?> ><?php  print $value->groupName ?> </option><?php
															}
															?>
														</select>
													</div>


													<div class="form-group">
														<label>Nama Admin:</label>
														<input type="text" class="form-control" name="name"  value="<?php print $value2->adminName; ?>" placeholder="Masukan nama admin"  required>
													</div>
													<div class="form-group">
														<label>Username:</label>
														<input type="text" class="form-control" name="username"  autocomplete="username" value="<?php print $value2->adminUsername; ?>"  placeholder="Masukan Username" required>
													</div>

													<div class="form-group">
														<label>Profile Pic:</label>

														<div class="input-group date">
															<input type="file"  name="profilepic" class="form-control" >


														</div>
														<?php
														if($value2->adminPic){
															?>
															<br>

															<div style="padding-left: 20px;"><a data-fancybox="gallery" href="<?php print base_url()."assets/admin/".$value2->adminDirPic."/".$value2->adminPic; ?>"><img src="<?php print base_url()."assets/admin/".$value2->adminDirPic."/".$value2->adminPic; ?>" class="img-responsive" style="width: 50px;"></a></div>
															<?php

														}
														?>
														<br>

														<!-- /.input group -->
													</div>


													<div class="form-group">
														<label>Reset Password:</label>
														<input type="password" class="form-control" name="password" autocomplete="new-password" placeholder="Masukan Password" >
													</div>



													<center><button type="submit"  name="bsubmit" id="bsubmit" class="btn btn-lg btn-info">Update</button></center>
											</div>
										</div>
										<?php echo form_close(); ?>


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

