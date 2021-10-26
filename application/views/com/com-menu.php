<div class="left side-menu">
	<button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
		<i class="ion-close"></i>
	</button>

	<div class="left-side-logo d-block d-lg-none">
		<div class="text-center">


		</div>
	</div>

	<div class="sidebar-inner slimscrollleft">
		<div id="sidebar-menu">
			<ul>
				<li class="menu-title">Main</li>

				<li>
					<a href="<?php print base_url('Admin/Home') ?>" class=""><i class="dripicons-meter"></i><span> Dashboard </span></a>
				</li>

				<?php


				if($session->userdata('admin_level')=="administrator"){
					?>
					<li>
						<a href="<?php print base_url('adminlist') ?>" class=""><i class="mdi mdi-account"></i><span> User </span></a>
					</li>
					<li>
						<a href="<?php print base_url('laporansampah') ?>" class=""><i class="mdi mdi-camera-front-variant"></i><span> Pelaporan Sampah </span></a>
					</li>
					<li>
						<a href="<?php print base_url('pelaporlist') ?>" class=""><i class="mdi mdi-account-multiple"></i><span> Pelapor</span></a>
					</li>
					<li>
						<a href="<?php print base_url('cetaklaporan') ?>" class=""><i class="mdi mdi-printer"></i><span> Cetak Laporan </span></a>
					</li>



					<li>
						<a href="<?php print base_url('adminlogout') ?>" class=""><i class="mdi mdi-logout"></i><span> Sign Out </span></a>
					</li>
					<?php

				}elseif($session->userdata('admin_level')=="petugas"){
					?>

					<li>
						<a href="<?php print base_url('laporansampah') ?>" class=""><i class="mdi mdi-camera-front-variant"></i><span> Pelaporan Sampah </span></a>
					</li>



					<li>
						<a href="<?php print base_url('adminlogout') ?>" class=""><i class="mdi mdi-logout"></i><span> Log Out </span></a>
					</li>

					<?php

				}


				?>








			</ul>
		</div>
		<div class="clearfix"></div>
	</div> <!-- end sidebarinner -->
</div>
