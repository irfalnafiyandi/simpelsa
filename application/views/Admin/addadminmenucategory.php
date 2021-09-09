<script>
    $(document).ready(function(){
        $('#result').hide();
        validate("#addform","<?php print site_url()."/Acontrol/Caddmenucategory" ?>","<?php print site_url()."/Aview/adminmenu" ?>");
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
										<a href="<?php print base_url("Aview/adminMenu"); ?>" class="btn btn-lg btn-warning" style="margin-bottom: 20px;">Kembali</a><br>

										<?php print validation_errors('<div class="label label-danger"><b>', '</b></div><br>');?>
										<div class="panel panel-success">
											<div class="panel-body">
												<?php
												$attributes = array('id' => 'addform','name' => 'addform');
												print form_open_multipart('Acontrol/Caddmenucategory',$attributes); ?>

												<div class="form-group">
													<label>Nama dan Menu Kategori<span class="requiredcss">*</span></label>
													<input name="name" type="text" id="name" size="50" required class="form-control" />
												</div>

												<div class="form-group">
													<label>Icon Menu<span class="requiredcss">*</span></label>
													<input name="iconmenu" type="text" id="iconmenu" size="50" class="form-control" />
													<span class="help-block"><?php print _('Contoh: fa fa-check'); ?></span>
												</div>
												<center><button type="submit"  name="bsubmit" id="bsubmit" class="btn btn-lg btn-info">Tambah</button></center>
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

