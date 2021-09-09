
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
        <li class=" treeview <?php if($page == 1){ print "active"; } ?>" >
            <a href="<?php print base_url('Aview'); ?>/home/">
                <i class="fa fa-dashboard"></i> <span>Home</span>
            </a>
        </li>
		<?php
		$this->load->helper('menu');
		$level = $this->session->userdata('level');
		$menu = getMenu($level);
		//print_r($menu);

		foreach ($menu as $key => $value){
			$menucat = getMenuCat($value->catId,$level);
			if($menucat){
				?>
				<li class="treeview <?php if($parentpage == $value->catId){ print "active"; }  ?>">
					<a><?php
						if(!empty($value->catMenuIcon)){
							?><i class="<?php print $value->catMenuIcon ?>"></i> <?php print $value->catName;
						}else{
							?><i class="fa fa-cog"></i> <?php print $value->catName;
						}
						?>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu ">
						<?php



						foreach($menucat as $key2 => $value2){

							?><li  class='<?php if($page == $value2->menuId){ print "active"; }  ?>' ><a href="<?php print base_url($value2->menuFile); ?>"><i class="fa fa-circle-o"></i><?php print $value2->menuName; ?></a></li>
							<?php
						}
						?>
					</ul>
				</li>
				<?php
			}
		}
        ?>
         <li class="treeview">
            <a href="<?php print base_url('Acontrol/logout'); ?>">
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
