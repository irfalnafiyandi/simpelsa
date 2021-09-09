<script>
	$(document).ready(function () {
		$('#result').hide();
		//validate_delete(".delete","<?php print site_url() . "/Acontrol/Cdeleteadmin" ?>","<?php print site_url() . "/SuratControl/SuratKeluar" ?>");
	});

	function deletedata(id) {
		if(window.confirm("Apakah anda yakin untuk hapus data ini?")){
			validate_delete('<?php print site_url()."/OrderControl/CdeleteOrder/" ?>' + id,'<?php print site_url()."/OrderControl" ?>')
		}
	}
</script>


<div class="content-wrapper">
	<section class="content-header">
		<h1><?php print $projectname; ?>
			<small><?php print $title; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php print base_url('Aview'); ?>/home/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
			<li class="active"><?php print $title; ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h1><?php print $title; ?></h1>
						<?php print $desc; ?>

					</div>
					<!-- /.box-header -->

					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
								<div class="pull-left">
									<?php

									if($uac['uac_add'] == "y"){
										?>
										<a href="<?php print base_url('OrderControl/CGenerateOrder'); ?>"
										   class="btn btn-success "><i class="fa fa-plus"></i> Tambah Orders</a>
										<?php

									}



									?>

								</div>
							</div>
						</div>

						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">
								<table id="datatable"
									   class="table table-bordered table-striped table-hover border-table">
									<thead>
									<tr>
										<th width="3% text-center" class="success border-table backgroundtable">No</th>
										<th width="" class="success border-table backgroundtable">No Invoice</th>
										<th width="" class="success border-table backgroundtable">Jumlah Item</th>
										<th width="" class="success border-table backgroundtable">Total</th>
										<th width="" class="success border-table backgroundtable">Keuntungan</th>
										<th width="" class="success border-table backgroundtable">Status</th>

										<!--										<th width="5%" class="success border-table backgroundtable"><i-->
										<!--												class="fa fa-cog"></i></th>-->
										<th width="5%" class="success border-table backgroundtable"><i
												class="fa fa-cog"></i></th>
										<th width="5%" class="success border-table backgroundtable"><i
												class="fa fa-cog"></i></th>
									</tr>
									</thead>
									<tbody>

									</tbody>
									<tfoot>
									</tfoot>
								</table>

							</div>

						</div>

					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
</div>


<script>
	var table;
	$(document).ready(function () {
		$('#result').hide();

		table = $('#datatable').DataTable({
			"pageLength" : 50,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?php echo base_url('OrderControl/allorders')?>",
				"type": "POST",

			},
			"columnDefs": [
				{
					"targets": [ 0 ],
					"orderable": false,
				},
			],
		});
	});
</script>

