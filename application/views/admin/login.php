<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title>Appelsa - Login</title>
	<meta content="Admin Dashboard" name="description" />
	<meta content="ThemeDesign" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<link rel="shortcut icon" href="<?php print base_url() ?>assets/admin/images/favicon.ico">

	<link href="<?php print base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php print base_url() ?>assets/admin/css/icons.css" rel="stylesheet" type="text/css">
	<link href="<?php print base_url() ?>assets/admin/css/style.css" rel="stylesheet" type="text/css">

</head>


<body class="pb-0">
<div id="result"></div>
<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="accountbg">

	<div class="content-center">
		<div class="content-desc-center">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-5 col-md-8">
						<div class="card">
							<div class="card-body">
								<h3 class="text-center mt-0 m-b-15">
								</h3>
								<h4 class="text-muted text-center font-18"><b>APPELSA Sign In</b></h4>
								<div class="p-2">
									<form class="form-horizontal m-t-20" action="<?php print base_url('loginadmin') ?>" id="form" method="post">

										<div class="form-group row">
											<div class="col-12">
												<input class="form-control" type="text" required="" placeholder="Username" name="username">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-12">
												<input class="form-control" type="password" required="" placeholder="Password" name="password">
											</div>
										</div>



										<div class="form-group text-center row m-t-20">
											<div class="col-12">
												<button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
											</div>
										</div>


									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>




<script src="<?php print base_url() ?>assets/admin/js/jquery.min.js"></script>
<script src="<?php print base_url() ?>assets/js/jquery.form.js"></script>
<script src="<?php print base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php print base_url() ?>assets/js/validate.js"></script>
<script src="<?php print base_url() ?>assets/admin/js/bootstrap.bundle.min.js"></script>
<script src="<?php print base_url() ?>assets/admin/js/modernizr.min.js"></script>
<script src="<?php print base_url() ?>assets/admin/js/detect.js"></script>
<script src="<?php print base_url() ?>assets/admin/js/fastclick.js"></script>
<script src="<?php print base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>
<script src="<?php print base_url() ?>assets/admin/js/jquery.blockUI.js"></script>
<script src="<?php print base_url() ?>assets/admin/js/waves.js"></script><!-- App js -->
<script src="<?php print base_url() ?>assets/admin/js/app.js"></script>

<script>
	$(function () {
		$('#result').hide();
		validate('#result', '#form', '<?php echo base_url('Admin/home'); ?>');
	});
</script>
</body>
</html>
