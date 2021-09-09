<?php
$id =  $this->uri->segment(3);
?>

<script>
	$(document).ready(function(){
		$('#result').hide();
		validate("#form","<?php print site_url()."/Acontrol/Ceditmenu/".$id ?>","<?php print site_url()."/Aview/adminmenu" ?>");
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
									<form class="col-md-6" id="form">
										<a href="<?php print base_url("Aview/adminMenu"); ?>" class="btn btn-lg btn-warning" style="margin-bottom: 20px;">Kembali</a><br>
										<?php
										foreach ($query2 as $key2 => $value2){}
										?>


										<div class="panel panel-success">
											<div class="panel-body">
												<div class="form-group">
													<label class="" for="catid"><?php print _('Kategory'); ?><span class="requiredcss">*</span>
													</label>
														<select name="catid" id="catid" class="form-control">
															<?php
															$queryload = $amodel->queryload("admin_menu_cat","","catSort ASC");
															foreach ($queryload as $key=>$value){
																?><option value="<?php print $value->catId; ?>" <?php if($value->catId ==$value2->catId ){ print "selected"; } ?>><?php print $value->catName; ?></option><?php
															}

															?>
														</select>
												</div>
												<div class="form-group">
													<label  for="name"><?php print _('Nama Menu'); ?> <span class="requiredcss">*</span>
													</label>
														<input name="name" type="text" id="name" size="50" required class="form-control " value="<?php print $value2->menuName; ?>"/>
												</div>
												<div class="form-group">
													<label  for="file"><?php print _('File/Path'); ?> <span class="requiredcss">*</span>
													</label>
														<input name="file" type="text" id="file" size="30" required class="form-control "  value="<?php print $value2->menuFile; ?>"/>
												</div>

												<center><button type="submit"  name="bsubmit" id="bsubmit" class="btn btn-lg btn-info">Update</button></center>
											</div>
										</div>
									</form>





							</div>

						</div>

					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		</div>
	</section>
</div>

