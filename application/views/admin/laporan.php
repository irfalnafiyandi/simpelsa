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
								<th width="5%">No</th>
								<th></th>
								<th>Pelapor</th>
								<th>Tanggal Laporan</th>

								<th>Status</th>
							</tr>
							</thead>


							<tbody>
							<?php
							if($query){
								$no=1;
								foreach ($query as $key => $value){
									?>
									<tr>
										<td><?php print $no; ?></td>
										<td width="5%">
											<div class="btn-group btn-group-sm">
												<?php
												if($session->userdata('admin_level')=="administrator"){
													if($value->status_laporan=="b"){
														?><a  href="<?php print base_url('laporanverifikasi/'.$value->id_laporan) ?>" class="btn btn-success text-white" data-toggle="tooltip" title="Verifikasi Laporan" ><i class="mdi mdi-check"></i></a>
													<a data-toggle="tooltip" title="Hapus" href="<?php echo base_url('laporandelete/'.$value->id_laporan ); ?>" class="btn btn-danger text-white" data-placement="top" onclick="return confirm('Apakah anda yakin ingin menghapus laporan ini ')"><i class="mdi mdi-delete "></i></a><?php

													}elseif ($value->status_laporan=="p"){
														?><a  href="<?php print base_url('laporanupdatestatus/'.$value->id_laporan) ?>" class="btn btn-primary text-white" data-toggle="tooltip" title="Update Status Laporan" ><i class="mdi mdi-check"></i></a>
													<?php

													}


												}elseif($session->userdata('admin_level')=="petugas"){
													if($value->status_laporan=="b"){
														?><a  href="<?php print base_url('laporanverifikasi/'.$value->id_laporan) ?>" class="btn btn-success text-white" data-toggle="tooltip" title="Verifikasi Laporan" ><i class="mdi mdi-check"></i></a><?php

													}elseif ($value->status_laporan=="p"){
														?><a  href="<?php print base_url('laporanupdatestatus/'.$value->id_laporan) ?>" class="btn btn-primary text-white" data-toggle="tooltip" title="Update Status Laporan" ><i class="mdi mdi-check"></i></a><?php

													}

												}


												?>



												<a  href="<?php print base_url('laporandetail/'.$value->id_laporan) ?>" class="btn btn-info text-white" data-toggle="tooltip" title="Detail"><i class="mdi mdi-view-list"></i></a>





											</div>
										</td>
										<td><?php print $value->nama_pelapor ?></td>
										<td><?php print TglIndo($value->tanggal_laporan);  ?></td>

										<td><?php
											if($value->status_laporan=="b"){
												?><span class="badge badge-primary">Baru</span><?php

											}elseif ($value->status_laporan=="p"){
												?><span class="badge badge-warning">Proses</span><?php

											}elseif ($value->status_laporan=="y"){
												?><span class="badge badge-success">Selesai</span><?php

											}elseif ($value->status_laporan=="n"){
												?><span class="badge badge-danger">Ditolak</span><?php

											}

											  ?></td>

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



