<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php print $title ?> | <?php print $projectname ?></title>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> 
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/style/css/skins/_all-skins.css">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/plugins/bootstrap-datepicker2/css/datepicker3.css">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/style/css/AdminLTE.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/style/css/style-custom.css">
<!--	<link rel="stylesheet" href="--><?php //print base_url(); ?><!--assets/style/chosen/chosen.css">-->
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/style/fancybox/jquery.fancybox.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">





	<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script> -->
    <!-- Bootstrap 3.3.6 -->
	<script src="<?php print base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php print base_url(); ?>assets/style/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php print base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php print base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <!-- FastClick -->
    <script src="<?php print base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php print base_url(); ?>assets/style/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php print base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php print base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php print base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php print base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php print base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?php print base_url(); ?>assets/style/js/pages/dashboard2.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="<?php print base_url(); ?>assets/plugins/bootstrap-datepicker2/js/bootstrap-datepicker.js"></script>
    <script src="<?php print base_url(); ?>assets/style/js/demo.js"></script>
<!--	<script src="--><?php //print base_url(); ?><!--assets/style/chosen/chosen.jquery.js"></script>-->
	<script src="<?php print base_url(); ?>assets/style/fancybox/jquery.fancybox.min.js"></script>
	<script src="<?php print base_url(); ?>assets/style/js/validate.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/af.min.js"></script>

    
    <script type="text/javascript">
    jQuery(document).ready(function($){
     
      
      $(".datepickerdate").datepicker({
        //startDate: '<?php echo date('d') ?>/<?php echo date('m') ?>/<?php echo date('Y') ?>',
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        toggleActive: true,
        autoclose: true
      });



      
    });
</script>
    

</head>
<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">
  <header class="main-header">
  <!-- Logo Sipakli -->
    <a href="<?php base_url("Aview/home"); ?>" class="logo">
      <span class="logo-mini"><b><?php print $projectnamelitte ?></b></span>
      <span class="logo-lg"><b><?php print $projectname ?></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown notifications-menu">
                <li class="dropdown tasks-menu">
        </ul>
    </div>
    </nav>
  </header>

