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

						</div>



						<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
							<tr>
								<th></th>
								<th>Nama</th>

								<th>Email</th>
								<th>No Hp</th>

							</tr>
							</thead>


							<tbody>
							<?php
							if($query){
								foreach ($query as $key => $value){
									?>
									<tr>
										<td width="5%">
											<div class="btn-group btn-group-sm">
												<a  href="<?php print base_url('pelaporlistedit/'.$value->id_pelapor) ?>" class="btn btn-primary text-white" data-toggle="tooltip" title="Edit"><i class="mdi mdi-pencil"></i></a>
												<a data-toggle="tooltip" title="Hapus" href="<?php echo base_url('pelaporlistdelete/'.$value->id_pelapor ); ?>" class="btn btn-danger text-white" data-placement="top" onclick="return confirm('Apakah anda yakin ingin menghapus : <?php echo addslashes($value->nama_pelapor); ?>?')"><i class="mdi mdi-delete "></i></a>



											</div>
										</td>
										<td><?php print $value->nama_pelapor ?></td>
										<td><?php print $value->email_pelapor ?></td>
										<td><?php print $value->hp_pelapor ?></td>

									</tr>
									<?php



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

