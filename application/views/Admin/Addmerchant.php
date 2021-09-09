<script>
    $(document).ready(function(){
        $('#result').hide();
        validate("#addform","<?php print site_url()."/Mcontrol/Caddmember" ?>","<?php print site_url()."/Mview/member" ?>");
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
										<a href="<?php print base_url("Mcview/merchant"); ?>" class="btn btn-lg btn-warning" style="margin-bottom: 20px;">Kembali</a><br>
										<div class="panel panel-success">
											<div class="panel-body">
												<?php
												$attributes = array('id' => 'addform','name' => 'addform');
												print form_open_multipart('Mccontrol/Caddmerchant',$attributes); ?>
												<div class="form-group">
													<label>Nama Merchant:</label>
													<input type="text" class="form-control" name="name"  placeholder="Masukan nama Merchant" required>
												</div>
												<div class="form-group">
													<label>Email Merchant:</label>
													<input type="email" class="form-control" name="email"  autocomplete="username"  placeholder="Masukan email" required>
												</div>
												<div class="form-group">
													<label>Masukan no WhatsApp:</label>
													<input type="number" class="form-control" name="nowa" placeholder="Masukan no WhatsApp" required>
												</div>
												<div class="form-group">
													<label>Username Merchant:</label>
													<input type="email" class="form-control" name="username"  autocomplete="username"  placeholder="Masukan username" required>
												</div>
												<div class="form-group">
													<label>Password Merchant:</label>
													<input type="password" class="form-control" name="password"  autocomplete="password"  placeholder="Masukan password" required>
												</div>
												<div class="form-group">
													<label>Ulangin Password Merchant:</label>
													<input type="password" class="form-control" name="confirmpwd"  autocomplete="password"  placeholder="Ulangin Password Merchant" required>
												</div>
											</div>
											<center><button type="submit"  name="bsubmit" id="bsubmit" class="btn btn-lg btn-info">Tambah</button></center>
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

