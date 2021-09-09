

<div class="container">
	<div class="col-md-12 col-xs-12">
		<div class="box">
			<div class="box-header">
				<h1><?php print $title; ?></h1>
				<?php print $desc; ?>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="panel panel-default table-responsive">
					<div class="panel-body table-responsive">
						<table class="table table-bordered">
							<?php
							foreach ($detail as $keyd => $valued) {}

							?>

							<tbody>
							<tr>
								<td width="20%"><strong>Nama Product</strong></td>
								<td width="4%">:</td>
								<td><?php print $valued->pName ?></td>
							</tr>
							<tr>
								<td><strong>Stok</strong></td>
								<td>:</td>
								<td><span class="label label-default" data-toggle="tooltip" data-placement="top" title="Sisa Stok Barang: <?php print $valued->pQty." ".$valued->spName; ?> "><?php print $valued->pQty." <b>".$valued->spName; ?></b></span></td>
							</tr>
							<tr>
								<td><strong>Supplier</strong></td>
								<td>:</td>
								<td><span class="label label-info" data-toggle="tooltip" data-placement="top" title="Supplier: <?php print $valued->sName; ?> "><?php print $valued->sName; ?></span></td>
							</tr>
							<tr>
								<td><strong>Kategori</strong></td>
								<td>:</td>
								<td> <span class="label label-warning" data-toggle="tooltip" data-placement="top" title="Kategori: <?php print $valued->cName; ?> "><?php print $valued->cName; ?></span></td>
							</tr>
							</tbody>
						</table>

					</div>

				</div>
				<div class="panel panel-default table-responsive">
					<div class="panel-body table-responsive">
						<table id="example1" class="table table-bordered table-striped table-hover border-table">
							<thead>
							<tr>
								<th width="3% text-center" class="success border-table backgroundtable">No</th>

								<th width="" class="success border-table backgroundtable">Jumlah</th>
								<th width="" class="success border-table backgroundtable">Tanggal</th>
								<th width="" class="success border-table backgroundtable">User</th>
								<th width="10%" class="success border-table backgroundtable">Status</th>

							</tr>
							</thead>
							<tbody>
							<?php
							$no = ($this->uri->segment('3') ) + 1;

							foreach ($query as $key => $value) {
								?>
								<tr>
									<td class="text-center border-table"><?php print $no; ?></td>

									<td class="text-center border-table">
										<span class="label label-warning" style="font-size: small;color: black !important;" data-toggle="tooltip" data-placement="top" title="Sisa Stok: <?php print number_format($value->stockQty, 0, ',', '.') ?> "><?php print $value->stockQty." <strong>".$value->spName."</strong>"; ?></span>
									</td>

									<td class="text-left border-table"><?php print date('d F Y H:i A',$value->stockTime); ?></td>
									<td class="text-left border-table"><?php print $value->adminName; ?></td>
									<td class="text-center border-table">
										<?php
										if($value->stockStatus == "in"){
											?><span class="label label-success" data-toggle="tooltip" data-placement="top" title="Status: Tambahan Stock "><?php print "Penambahan"; ?></span><?php

										}else{
											?><span class="label label-danger"  data-toggle="tooltip" data-placement="top" title="Status: Pembelian Prodcut "><?php print "Pembelian"; ?></span><?php

										}
										?>



								</tr>
								<?php
								$no++;
							}


							?>
							</tbody>

						</table>

					</div>

				</div>

			</div>
		</div>
		<!-- /.box-body -->
	</div>


</div>
