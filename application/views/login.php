<!DOCTYPE html>
<?php

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php print $title ?> | <?php print $projectname ?></title>
	<!-- CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="<?php print base_url(); ?>/assets/style/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>/assets/style/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>/assets/style/css/form-elements.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>/assets/style/css/login.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>/assets/plugins/sweetalert/sweetalert.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Favicon and touch icons -->
	<link rel="shortcut icon" href="<?php print base_url(); ?>/assets/image/ico/favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php print base_url(); ?>/assets/image/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php print base_url(); ?>/assets/image/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php print base_url(); ?>/assets/image/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php print base_url(); ?>/assets/image/ico/apple-touch-icon-57-precomposed.png">
	<script src="<?php print base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php print base_url(); ?>assets/style/js/validate.js"></script>
</head>
<script>
    $(document).ready(function(){
        $('#result').hide();
        validate("#login","<?php print site_url()."/Acontrol/login" ?>","<?php print site_url()."/Aview/home" ?>");
    });
</script>

<body style="background-color: #2f3542">
<!-- Top content -->
<div class="top-content">
	<div class="inner-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-2"></div>
				<div class="col-md-4 col-sm-8 animated bounceInDown" >
					<div class="panel panel-default" style="color: ">
						<div class="panel-heading" style="padding:2px"><h5 style="color:green"><b><center>LOGIN SISTEM</center></b></h5></div>
						<div class="panel-body" style="padding-bottom:0px ; padding-left:3px;padding-right:3px;margin:20px;margin-top:0px">
							<center><img src="<?php print $this->config->item('LOGO_LOGIN'); ?>" class="img-responsive" width="70%" height="40%" ></center><br>
							<?php
							$attributes = array('id' => 'login','name' => 'login');
							print form_open_multipart('Acontrol/login',$attributes); ?>
							<!--<label for="username" style="color:#34495e">Username:</label>-->

							<div style="margin-bottom: 20px" class="input-group">
								<span class="input-group-addon"  style="background-color:#34495e"><i class="glyphicon glyphicon-user" style="color:#ecf0f1"></i></span>
								<input id="username" type="text" class="form-control " name="username" value="" placeholder="Masukan Username Anda" required>
							</div>

							<!--<label for="password" style="color:#34495e">Password:</label><br>-->
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon" style="background-color:#34495e"><i class="glyphicon glyphicon-lock" style="color:#ecf0f1"></i></span>
								<input id="password" type="password" class="form-control " name="password" placeholder="Masukan Password Anda" required>
							</div>

							<button type="submit" class="btn btn-primary btn-block ">LOGIN</button>
							</form>
						</div>
						<div class="panel-footer"><center style="color:#bdc3c7">@<?php print $this->config->item('SITENAME_TITLE'); ?></center></div>

					</div><!--div panel default -->



				</div><!--div col-md-4 -->
				<div class="col-md-4 col-sm-2">
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php print base_url(); ?>/assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?php print base_url(); ?>/assets/style/js/jquery.min.js"></script>
<script src="<?php print base_url(); ?>/assets/style/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php print base_url(); ?>/assets/style/js/jquery.backstretch.min.js"></script>
<script src="<?php print base_url(); ?>/assets/style/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>
