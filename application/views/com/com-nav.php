<div class="content-page">
	<!-- Start content -->
	<div class="content">

		<!-- Top Bar Start -->
		<div class="topbar">

			<div class="topbar-left	d-none d-lg-block">
				<div class="text-center">

					<a href="<?php print base_url('Admin/home') ?>" class="logo"><span style="font-size: 30px;" class="text-white font-weight-bold">APPELSA</span> </a>
				</div>
			</div>

			<nav class="navbar-custom">

				<ul class="list-inline float-right mb-0">

					<li class="list-inline-item dropdown notification-list">
						<a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
						   aria-haspopup="false" aria-expanded="false">
							<img src="<?php print base_url() ?>assets/admin/images/users/user-1.jpg" alt="user" class="rounded-circle">
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
							<a class="dropdown-item" href="<?php print base_url('adminchangepassword') ?>"><i class="mdi mdi-lock m-r-5 text-muted"></i> Change Password</a>
							<a class="dropdown-item" href="<?php print base_url('adminlogout') ?>"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
						</div>
					</li>

				</ul>

				<ul class="list-inline menu-left mb-0">
					<li class="list-inline-item">
						<button type="button" class="button-menu-mobile open-left waves-effect">
							<i class="ion-navicon"></i>
						</button>
					</li>
				</ul>

				<div class="clearfix"></div>

			</nav>

		</div>
		<!-- Top Bar End -->
