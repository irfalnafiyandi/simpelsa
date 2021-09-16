
<!-- Navigation panel -->
<div class="nav-bar-compact clearfix">
	<!-- Logo ( * your text or image into link tag *) -->
	<div class="nbc-logo-wrap local-scroll">
		<a href="#top" class="nbc-logo">
			APPELSA
		</a>
	</div>

	<!-- Menu Button -->
	<div class="nbc-menu-button">
		<i class="nbc-menu-icon"></i>
	</div>

	<!-- Menu Links -->
	<nav class="nbc-menu-wrap">
		<ul class="nbc-menu-links local-scroll">
			<li>
				<a href="<?php print base_url('Home') ?>">Home</a>
			</li>
			<li>
				<a href="<?php print base_url('about') ?>">Tentang Kami</a>
			</li>
			<?php
			if($session->userdata('id')){
				?>
				<li>
					<a href="<?php print base_url('laporan') ?>">Buat Laporan</a>
				</li>
				<li>
					<a href="<?php print base_url('laporanlist') ?>">Laporan Anda</a>
				</li>
				<li>
					<a href="<?php print base_url('logout') ?>">Keluar</a>
				</li>
				<?php
			}else{
				?>
				<li>
					<a href="<?php print base_url('Home/register') ?>#register">Register</a>
				</li>
				<?php

			}


			?>

		</ul>
	</nav>
</div>
<!-- End Navigation panel -->
