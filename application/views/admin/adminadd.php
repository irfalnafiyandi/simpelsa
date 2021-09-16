

<div class="page-content-wrapper ">

	<div class="container-fluid">

		<div class="row">
			<div class="col-sm-12">
				<div class="float-right page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Appelsa</a></li>
						<li class="breadcrumb-item"><a href="#"><?php print $title; ?></a></li>

					</ol>
				</div>
				<h5 class="page-title"><?php print $title; ?></h5>
			</div>
		</div>
		<!-- end row -->

		<div class="row">
			<div class="col-6">
				<div class="card m-b-30">
					<div class="card-body">
						<form class="" id="form" action="<?php print base_url('adminstore') ?>" method="post">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" required placeholder="Nama" name="nama">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" required placeholder="Username" name="username">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" required placeholder="Password" name="password">
							</div>
							<div class="form-group">
								<label>Password Konfirmasi</label>
								<input type="password" class="form-control" required placeholder="Password Konfirmasi" name="passwordkonf">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" required placeholder="Email" name="email">
							</div>
							<div class="form-group">
								<label>Hp</label>
								<input type="text" class="form-control" required placeholder="Nomor Hp" name="hp">
							</div>

							<div class="form-group">
								<label class="">Level</label>

									<select class="form-control" name="level" required>
										<option value="">Pilih Level</option>
										<option value="petugas">Petugas</option>
										<option value="administrator">Administrator</option>
									</select>

							</div>


							<div class="form-group">
								<div>
									<a href="<?php print base_url('adminlist') ?>" class="btn btn-warning waves-effect m-l-5">
										Kembali
									</a>
									<button type="submit" class="btn btn-primary waves-effect waves-light">
										Simpan
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div> <!-- end col -->
		</div> <!-- end row -->



	</div><!-- container fluid -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->

<script>
	$(function () {
		$('#result').hide();
		validate('#result', '#form', '<?php echo base_url('adminlist'); ?>');
	});
</script>
