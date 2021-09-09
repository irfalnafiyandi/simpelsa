<script>
	<?php
	$stat = "";

	$stat = $this->uri->segment(3);
	?>
	$(document).ready(function () {
		$('#result').hide();
		validate("#addform", "<?php print site_url() . "/StockControl/CaddHistoryStock/"  ?>", "<?php print site_url() . "/StockControl/AddStock/" ?>/y");

	});
</script>
<div class="container">
	<div class="row" style="margin: 20px">
		<div class="col-12">
			<div class="panel panel-success">
				<div class="panel-heading"><strong>Tambah History Stock Product </strong></div>
				<div class="panel-body">
					<?php
					$attributes = array('id' => 'addform', 'name' => 'addform');
					print form_open_multipart('OrderControl/CaddDetailOrder', $attributes); ?>

					<?php
					if($stat=="y"){
						?>
						<div class="alert alert-success">
							<strong>Success!</strong> Berhasil menambahkan data history.
						</div>

						<?php
					}

					?>




					<div class="form-group">
						<label>Product<span class="requiredcss">*</span></label>
						<select class="form-control chosen-select" name="prodid" id="prodid" onChange="selectProd();" required>
							<option value="">Pilih Product</option>
							<?php
							foreach ($query as $key => $value) {
								?>
								<option
								value="<?php print $value->pId ?>"><?php print $value->pCode . " - " . $value->pName ?> </option><?php
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="display: none;" id="proddetail" >
							Detail Product
						</button>
						<div id="demo" class="collapse">

						</div>


					</div>

					<div class="form-group">
						<label>Sisa Stock<span class="requiredcss">*</span></label>
						<div class="input-group">
							<input type="text" class="form-control" name="sisa" id="sisa" placeholder="Masukan sisa" onkeypress="return isNumberKey(event)"
								   required readonly>
						</div>
					</div>

					<div class="form-group col-1">
						<label>Jumlah<span class="requiredcss">*</span></label>
						<input type="number" class="form-control" name="jumlah" id="jumlah" autocomplete="jumlah" onkeypress="return isNumberKey(event)" onkeyup="totalstock();"
							   placeholder="Masukan  jumlah" required   style="width: 50%;"  min="0" >
					</div>



					<div class="form-group">
						<label>Total Stock<span class="requiredcss">*</span></label>
						<div class="input-group">
							<input type="text" class="form-control" name="totalsub" id="totalsub" autocomplete="name"
								   placeholder="0" required readonly>
						</div>
					</div>
					<center>
						<button type="submit" name="bsubmit" id="bsubmit"
								class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
						</button>
					</center>
				</div>
			</div>
			<?php echo form_close(); ?>

		</div>
	</div>

</div>

<script>

	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}



	function selectProd() {
		var prodid = $("#prodid").val();
		if(prodid == '' ){
			document.getElementById('proddetail').style.display = 'none';
			document.getElementById("sisa").value = 0;
		}else{
			$.ajax({
				url: "<?php print site_url("OrderControl/getDetailProd/");?>" + prodid,
				success: function (msg) {

					document.getElementById("sisa").value = msg;
					totalstock();
					$.ajax({
						url: "<?php print site_url("OrderControl/getDetailProduct/");?>" + prodid,
						success: function (msg2) {
							$('#demo').html(msg2);

							if(msg == null){
								document.getElementById('proddetail').style.display = 'none';
							}else{
								document.getElementById('proddetail').style.display = '';
							}


						},
					});
				},
			});

		}

	}


	function totalstock() {
		var price = (document.getElementById("sisa").value);

		var jumlah = (document.getElementById("jumlah").value);




		var priceB = changeReplace(price);
		var totalsubB = changeReplace(price);
		var jumlahB = changeReplace(jumlah);



		if (jumlah == null) {
			jumlahB = 0;
		}
		if (jumlah == '') {
			jumlahB = 0;
		}


		price = parseInt(priceB);
		totalsubB = parseInt(totalsubB);
		jumlahB = parseInt(jumlahB);

		totalsubB = ((price + jumlahB)).toString();

		if (totalsubB == null) {
			totalsubB = 0;
		}

		document.getElementById("totalsub").value = (totalsubB);
	}

	function changeReplace(str) {
		var txt = "";

		var prod = str.split(".");


		function myFunction(value, index, array) {
			txt = txt + value;
		}

		prod.forEach(myFunction)
		return txt;
	}




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


