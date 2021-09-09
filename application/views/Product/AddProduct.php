<script>
	$(document).ready(function(){
		$('#result').hide();
		validate("#addform","<?php print site_url()."/ProductControl/Caddproduct" ?>","<?php print site_url()."/ProductControl/" ?>");
	});
</script>

<div class="content-wrapper">
	<div id="result"></div>
	<section class="content-header">
		<h1><?php print $projectname; ?>
			<small><?php print $title;  ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php print base_url('Aview'); ?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
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
						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">
								<div class="row">
									<div class="col-md-6">
										<a href="<?php print base_url("ProductControl/"); ?>" class="btn btn-lg btn-warning" style="margin-bottom: 20px;"><i class="fa fa-angle-double-left"></i> Kembali</a><br>
										<div class="panel panel-success">
											<div class="panel-body">
												<?php
												$attributes = array('id' => 'addform','name' => 'addform');
												print form_open_multipart('ProductControl/CaddProduct',$attributes); ?>

												<div class="form-group">
													<label>Kode Product<span class="requiredcss">*</span></label>
													<input type="text" class="form-control" name="code"  placeholder="Masukan kode" required>
												</div>

												<div class="form-group">
													<label>Nama Product<span class="requiredcss">*</span></label>
													<input type="text" class="form-control" name="name"  autocomplete="name"   placeholder="Masukan nama product" required>
												</div>

												<div class="form-group">
													<label>Kategori<span class="requiredcss">*</span></label>
													<select class="form-control chosen-select" name="category" required>
														<option value="">Pilih Kategori</option>
														<?php
														foreach ($query as $key => $value) {
															?><option value="<?php print $value->cId ?>"><?php  print $value->cName ?> </option><?php
														}
														?>
													</select>
												</div>

												<div class="form-group">
													<label>Supplier<span class="requiredcss">*</span></label>
													<select class="form-control chosen-select" name="supplier" required>
														<option value="">Pilih Supplier</option>
														<?php
														foreach ($query2 as $key => $value) {
															?><option value="<?php print $value->sId ?>"><?php  print $value->sName ?> </option><?php
														}
														?>
													</select>
												</div>


												<div class="form-group">
													<label>Stok Product</label>
													<input type="number" class="form-control" name="qty"  autocomplete="qty"   placeholder="Masukan Stok" required>
												</div>

												<div class="form-group">
													<label>Satuan<span class="requiredcss">*</span></label>
													<select class="form-control chosen-select" name="satuan" required>
														<option value="">Pilih Satuan Product</option>
														<?php
														foreach ($query3 as $key => $value) {
															?><option value="<?php print $value->spId ?>"><?php  print $value->spName ?> </option><?php
														}
														?>
													</select>
												</div>



												<div class="form-group">
													<label>Harga Modal<span class="requiredcss">*</span></label>
													<div class="input-group">
														<span class="input-group-addon alert-info" >Rp</span>
														<input type="text" class="form-control" name="modal" id="modal" autocomplete="modal"   placeholder="Masukan harga modal" required>

													</div>
												</div>
												<div class="form-group">
													<label>Harga Jual<span class="requiredcss">*</span></label>
													<div class="input-group">
														<span class="input-group-addon alert-info">Rp</span>
														<input type="text" class="form-control" name="jual" id="jual" autocomplete="jual"   placeholder="Masukan harga jual" required>
													</div>

												</div>



												<div class="form-group">
													<label>Gambar Product</label>
													<div class="input-group date">
														<input type="file"  name="pic" class="form-control" >
													</div>
													<!-- /.input group -->
												</div>
												<center>
													<button type="submit" name="bsubmit" id="bsubmit"
															class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
													</button>
													<a href="<?php print base_url("ProductControl/"); ?>"  name="bsubmit" id="bsubmit"
													   class="btn  btn-warning"><i class="fa fa-angle-double-left"></i> Kembali
													</a>
												</center>
											</div>
										</div>
										<?php echo form_close(); ?>


									</div>
								</div>

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
	var modal = document.getElementById('modal');
	modal.addEventListener('keyup', function (e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		modal.value = formatRupiah(this.value, '');
	});

	var jual = document.getElementById('jual');
	jual.addEventListener('keyup', function (e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		jual.value = formatRupiah(this.value, '');
	});

	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
	}
</script>

