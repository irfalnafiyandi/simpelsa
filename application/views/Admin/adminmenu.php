<script>
    $(document).ready(function(){
        $('#result').hide();
		validate("#sort","<?php print site_url()."/Acontrol/Cupdatesort" ?>","<?php print site_url()."/Aview/AdminMenu" ?>");
    });
</script>


<div class="content-wrapper">
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
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
								<div class="pull-right">
									<a href="<?php print base_url('Aview'); ?>/AddadminMenu" class="btn btn-primary "><i class="fa fa-plus"></i> Tambah Menu</a>
									<a href="<?php print base_url('Aview'); ?>/AddadminMenucategory" class="btn btn-primary "><i class="fa fa-plus"></i> Tambah Category menu</a>
								</div>
							</div>
						</div>



						<div class="panel panel-default table-responsive">
							<div class="panel-body table-responsive">
								<form  name="sort" id="sort">
									<div class="block-break">
										<button type="submit" name="update" value="<?php print _('Update Urutan'); ?>" class="btn btn-sm btn-info"><i class="fa fa-refresh"></i> <?php print _('Update Urutan'); ?></button>
										<br><br>
									</div>
									<div class="table-responsive">
										<table id="" class="table table-bordered table-striped table-hover border-table">
											<thead>
											<tr>
												<th class="backgroundtable"><?php print _('Urutan'); ?></th>
												<th colspan="3" class="backgroundtable"><?php print _('Kategori dan Menu'); ?></th>
												<th style="width:40px;" class="backgroundtable text-center"><i class="fa fa-cog"></i></th>
												<th style="width:40px;" class="backgroundtable text-center"><i class="fa fa-cog"></i></th>
											</tr>
											</thead>
											<tbody>

											<?php

											foreach ($query as $key => $data){


												?>
												<tr>
													<td width="60" class="text-center">
														<input type="text" size="3" name="s[<?php print $data->catId; ?>]" value="<?php print $data->catSort; ?>" class="text-center form-control" />
													</td>
													<td colspan="3"><strong><?php print empty($data->catMenuIcon) ? "<i class=\"fa fa-cog\"></i> ":"<i class=\"" . $data->catMenuIcon . "\"></i> "; ?><?php print $data->catName; ?></strong></td>
													<td class="text-center"><a href="<?php print base_url('Aview'); ?>/EditadminMenucategory/<?php print $data->catId; ?>" title="<?php print "Edit"; ?>: <?php print $data->catName; ?>"><i class="fa fa-edit"></i></a></td>
													<td class="text-center">
<!--														<a class="delete" href="admin_menu.php?form=submit&action=delcat&id=--><?php //print $data->catId; ?><!--" title="--><?php //print $data->catName; ?><!--"><i title="--><?php //print "Delete"; ?><!--: --><?php //print $data->catName; ?><!--" rel="tooltip" class="fa fa-trash-o"></i></a>-->

														<a class="delete" href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk hapus menu ini?"; ?>')){ validate_delete('<?php print site_url()."/Acontrol/Cdeletemenucategory/".$data->catId ?>','<?php print site_url()."/Aview/adminMenu" ?>') };" style="color:red "><i class="fa fa-trash" ></i></a>
													</td>
												</tr>
												<?php

												$query2 =  $amodel->queryload("admin_menu","catId='$data->catId'","menuSort ASC");
												foreach ($query2 as $key2 => $datax){
													?>
													<tr>
														<td width="60">&nbsp;</td>
														<td width="70" class="text-center">
															<input type="text" size="3" name="sm[<?php print $datax->menuId; ?>]" value="<?php print $datax->menuSort;  ?>" class="text-center form-control" />
														</td>
														<td><?php print $datax->menuName;  ?></td>
														<td width="150"><?php print $datax->menuFile;  ?></td>
														<td class="text-center"><a href="<?php print base_url('Aview'); ?>/EditadminMenu/<?php print $datax->menuId; ?>" title="<?php print _('Edit'); ?>: <?php print $datax->menuName; ?>"><i class="fa fa-edit"></i></a></td>
														<td class="text-center">
<!--															<a class="delete" href="admin_menu.php?form=submit&action=del&id=--><?php //print  $datax->menuId;  ?><!--" title="--><?php //print $datax->menuName;  ?><!--"><i title="--><?php //print _('Delete'); ?><!--: --><?php //print $datax->menuName; ; ?><!--" rel="tooltip" class="fa fa-trash-o"></i></a>-->

															<a class="delete" href="javascript:if (window.confirm('<?php print "Apakah anda yakin untuk hapus menu category ini?"; ?>')){ validate_delete('<?php print site_url()."/Acontrol/Cdeletemenu/".$datax->menuId ?>','<?php print site_url()."/Aview/adminmenu" ?>') };" style="color:red "><i class="fa fa-trash" ></i></a>

														</td>



													</tr>
													<?php

												}

												?>




												<?php
											}


											?>
											</tbody>
										</table>
									</div>
								</form>


							</div>

						</div>

					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
</div>
