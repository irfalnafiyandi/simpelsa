
<script>
    $(document).ready(function(){
        $('#result').hide();
        validate("#editform","<?php print site_url()."/Acontrol/Ceditadmingroup" ?>","<?php print site_url()."/Aview/admingroup" ?>");
    });
</script>
<script type="text/javascript">
	$(function(){ //Sama jika menggunakan $(document).ready(function(){

		$("#check-all1").click(function(){
			if ( (this).checked == true ){

				$('.checkradio1').prop('checked', true);

			} else {

				$('.checkradio1').prop('checked', false);

			}
		});
		$("#check-all2").click(function(){
			if ( (this).checked == true ){

				$('.checkradio2').prop('checked', true);

			} else {

				$('.checkradio2').prop('checked', false);

			}
		});
		$("#check-all3").click(function(){
			if ( (this).checked == true ){

				$('.checkradio3').prop('checked', true);

			} else {

				$('.checkradio3').prop('checked', false);

			}
		});
		$("#check-all4").click(function(){
			if ( (this).checked == true ){

				$('.checkradio4').prop('checked', true);

			} else {

				$('.checkradio4').prop('checked', false);

			}
		});

	});
</script>

<div class="content-wrapper">
	<div id="result"></div>
	<section class="content-header">
		<h1><?php print $projectname; ?>
			<small><?php print $title;  ?></small>
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
						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">
								<div class="row">
									<div class="col-md-6">
										<a href="<?php print base_url("Aview/admingroup"); ?>" class="btn btn-lg btn-warning" style="margin-bottom: 20px;">Kembali</a><br>

										<?php
										foreach ($querycat as $keycat => $valuecat){}
										?>

										<div class="panel panel-success">
											<div class="panel-body">
												<?php


												$id = $this->uri->segment(3);
												$attributes = array('id' => 'editform','name' => 'editform');
												print form_open_multipart("Acontrol/Ceditadmingroup/".$id,$attributes); ?>
												<input type="hidden" class="form-control" name="id"  value="<?php print $valuecat->groupId; ?>" required>

												<div class="form-group">
													<label>Group name:</label>
													<input type="text" class="form-control" name="groupname"  value="<?php print $valuecat->groupName; ?>" placeholder="Masukan nama admin group"  required>
												</div>
												<div class="row"><div class="col-md-12 col-sm-6 col-xs-12">
														<div class="table-responsive">
															<table class="table table-striped table-bordered table-hover dt-responsive nowrap">
																<thead>
																<tr>
																	<th width="30">&nbsp;</th>
																	<th width="250">&nbsp;</th>
																	<th width="50" class="text-center"><strong><?php print _('Lihat'); ?></strong></th>
																	<th width="50" class="text-center"><strong><?php print _('Tambah'); ?></strong></th>
																	<th width="50" class="text-center"><strong><?php print _('Edit'); ?></strong></th>
																	<th width="50" class="text-center"><strong><?php print _('Hapus'); ?></strong></th>
																</tr>
																</thead>
																<tbody>
																<tr>
																	<td style="border-left:0px" colspan="2"><strong></strong><?php print _('Pilih Semua'); ?></td>
																	<td class="text-center"><input type="checkbox" id="check-all1"></td>
																	<td class="text-center"><input type="checkbox" id="check-all2"></td>
																	<td class="text-center"><input type="checkbox" id="check-all3"></td>
																	<td class="text-center"><input type="checkbox" id="check-all4"></td>
																</tr>
																<?php

																$cook_gid = $this->session->userdata('level');
																$sql = "SELECT * FROM admin_menu_cat ORDER BY catSort ASC";

																$query =  $amodel->queryselect($sql);
																foreach($query as $key => $value){
																	$sqlx="SELECT * FROM admin_menu WHERE catId='$value->catId' ORDER BY menuSort ASC";

																	$query2 =  $amodel->queryselect($sqlx);
																	$count = count($query2);

																	if($count>0){
																		?>
																		<tr>
																			<td colspan="6"><strong><?php print $value->catName; ?></strong></td>
																		</tr>
																		<?php
																		foreach ($query2 as $key2=>$value2){
																			$sql3 = "SELECT * FROM admin_group_menu WHERE groupId='$id' AND menuId='$value2->menuId'";
																			$query3 =  $amodel->queryselect($sql3);
																			unset($value3);
																			unset($key3);
																			foreach ($query3 as $key3 => $value3) {}
																				?>
																				<tr>
																					<td>&nbsp;</td>
																					<td><?php print $value2->menuName; ?></td>
																					<td align="center"><?php if ($value2->menuView == "y") { ?>
																							<input
																							name="view[<?php print $value2->menuId . "-" . $value->catId; ?>]"
																							type="checkbox"
																							class="checkradio1"
																							value="y"<?php if (!empty($value3->gmView)) {
																								if ($value2->menuView == $value3->gmView) { ?> checked="checked"<?php }
																							} ?> /><?php } ?>
																					</td>
																					<td align="center"><?php if ($value2->menuAdd == "y") { ?>
																							<input
																							name="add[<?php print $value2->menuId . "-" . $value->catId; ?>]"
																							type="checkbox"
																							class="checkradio2"
																							value="y"<?php if (!empty($value3->gmAdd)) {
																								if ($value2->menuAdd == $value3->gmAdd) { ?> checked="checked"<?php }
																							} ?> /><?php } ?>

																					</td>
																					<td align="center"><?php if ($value2->menuEdit == "y") { ?>
																							<input
																							name="edit[<?php print $value2->menuId . "-" . $value->catId; ?>]"
																							type="checkbox"
																							class="checkradio3"
																							value="y"<?php if (!empty($value3->gmEdit)) {
																								if ($value2->menuEdit == $value3->gmEdit) { ?> checked="checked"<?php }
																							} ?> /><?php } ?>
																					</td>
																					<td align="center"><?php if ($value2->menuDelete == "y") { ?>
																							<input
																							name="delete[<?php print $value2->menuId . "-" . $value->catId; ?>]"
																							type="checkbox"
																							class="checkradio4"
																							value="y"<?php if (!empty($value3->gmDelete)) {
																								if ($value2->menuDelete == $value3->gmDelete) { ?> checked="checked"<?php }
																							} ?> /><?php } ?>
																					</td>
																				</tr>

																				<?php

																		}
																	}
																}
																?>

																</tbody>
															</table>
														</div>
													</div></div>




												<center><button type="submit"  name="bsubmit" id="bsubmit" class="btn btn-lg btn-info">Update</button></center>
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

