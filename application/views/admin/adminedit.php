

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
						<form class="" id="form" action="<?php print base_url('adminupdate') ?>" method="post">
							<input name="id" value="<?php print $detail->id_admin ?>" type="hidden">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" required placeholder="Nama" name="nama" value="<?php print $detail->admin_fullname ?>">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" required placeholder="Username" name="username" value="<?php print $detail->admin_username ?>">
							</div>

							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" required placeholder="Email" name="email" value="<?php print $detail->admin_email ?>">
							</div>
							<div class="form-group">
								<label>Hp</label>
								<input type="text" class="form-control" required placeholder="Nomor Hp" name="hp" value="<?php print $detail->admin_nohp ?>">
							</div>

							<div class="form-group">
								<label class="">Level</label>

									<select class="form-control" name="level" required>
										<option value="">Pilih Level</option>
										<option value="petugas" <?php if($detail->admin_level=="petugas"){ print "selected";} ?> >Petugas</option>
										<option value="administrator" <?php if($detail->admin_level=="administrator"){ print "selected";}  ?>>Administrator</option>
									</select>

							</div>

							<small style="color: red"><i>*Kosongkan password jika tidak ingin mengubah password</i></small>

							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control"  placeholder="Password" name="password">
							</div>
							<div class="form-group">
								<label>Password Konfirmasi</label>
								<input type="password" class="form-control"  placeholder="Password Konfirmasi" name="passwordkonf">
							</div>


							<div class="form-group">
								<div>
									<button type="submit" class="btn btn-primary waves-effect waves-light">
										Submit
									</button>
									<button type="reset" class="btn btn-secondary waves-effect m-l-5">
										Cancel
									</button>
									<a href="<?php print base_url('adminlist') ?>" class="btn btn-warning waves-effect m-l-5">
										Kembali
									</a>
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
