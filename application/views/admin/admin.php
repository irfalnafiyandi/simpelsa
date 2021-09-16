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
			<div class="col-12">
				<div class="card m-b-30">
					<div class="card-body">
						<div class="row mb-4">
							<div class="col-md-12 float-right">
								<a href="<?php print base_url('adminadd') ?>" class="btn btn-primary"><i class="mdi mdi-plus"></i>Tambah User</a>
							</div>
						</div>



						<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
							<tr>
								<th>No</th>
								<th></th>
								<th>Nama</th>
								<th>Username</th>
								<th>Email</th>
								<th>No Hp</th>
								<th>Level</th>
							</tr>
							</thead>


							<tbody>
							<?php
							if($query){
								$no=1;
								foreach ($query as $key => $value){
									?>
									<tr>
										<td width="5%"><?php print $no; ?></td>
										<td width="5%">
											<div class="btn-group btn-group-sm">
												<a  href="<?php print base_url('adminedit/'.$value->id_admin) ?>" class="btn btn-primary text-white" data-toggle="tooltip" title="Edit"><i class="mdi mdi-pencil"></i></a>
												<a data-toggle="tooltip" title="Hapus" href="<?php echo base_url('admindelete/'.$value->id_admin ); ?>" class="btn btn-danger text-white" data-placement="top" onclick="return confirm('Apakah anda yakin ingin menghapus : <?php echo addslashes($value->admin_fullname); ?>?')"><i class="mdi mdi-delete "></i></a>



											</div>
										</td>
										<td><?php print $value->admin_fullname ?></td>
										<td><?php print $value->admin_username ?></td>
										<td><?php print $value->admin_email ?></td>
										<td><?php print $value->admin_nohp ?></td>
										<td><?php print $value->admin_level ?></td>
									</tr>
									<?php


									$no++;

								}
							}

							?>



							</tbody>
						</table>

					</div>
				</div>
			</div> <!-- end col -->
		</div> <!-- end row -->



	</div><!-- container fluid -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->

