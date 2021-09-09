
  <aside class="main-sidebar">
   <section class="sidebar">
  <div class="user-panel">
        <div class="pull-center image">           
            <center><img src="<?php print base_url(); ?>assets/image/admin.png" class="img-circle img-responsive" style="width: 150px;border-style: solid;border-width: 5px;border-color: white;" alt="User Image" ></center>
            <div class="row">
            <div class="col-xs-12 ">
           <center> <h3 class="text-center text-uppercase" style="color: white;"><?php print  $this->session->userdata('nama'); ?></h3></center>
                <center>   <h4 class="text-center text-uppercase label label-primary" style="color: white;"><?php print  $this->session->userdata('username'); ?></h4></center></div></div>       
        </div>       
    </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
        <li class=" treeview">
            <a href="home.php">
                <i class="fa fa-dashboard"></i> <span>Home</span>
            </a>
        </li>

       
      <!--   <li class="treeview">           
            <a href="<?php print base_url('admin/datalaporan'); ?>">
                 <i class="fa fa-male"></i>
                <span>Data laporan </span>
                <span class="pull-right-container">              
            </span>
            </a>
        </li> -->
        
        <?php
        $level_session = $this->session->userdata('level');
        
        if($level_session == "KBP" OR $level_session == "ADMINISTRATOR"){
          ?>
          <li class="treeview">           
            <a href="<?php print base_url('admin/datalaporankbp'); ?>">
                 <i class="fa fa-male"></i>
                <span>Data laporan </span>
                <span class="pull-right-container">              
            </span>
            </a>
        </li>
          <?php            
        }elseif($level_session == "CSO"){
           ?>
          <li class="treeview">           
            <a href="<?php print base_url('admin/datalaporancso'); ?>">
                 <i class="fa fa-male"></i>
                <span>Data laporan Untuk Anda</span>
                <span class="pull-right-container">              
            </span>
            </a>
        </li>
          <?php
        }

         ?>
         <li class="treeview">
            <a href="<?php print base_url('admin/logout'); ?>">
                <i class="fa fa-sign-out"></i>
                <span>Logout </span>
                <span class="pull-right-container">
              
            </span>
            </a>
          </li>
       
          
        

    </ul>
</section>
    <!-- /.sidebar -->
  </aside>