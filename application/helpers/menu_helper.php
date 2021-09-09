<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function ambilModul($id){
	$ci=& get_instance();
	$ci->load->database();
	$ci->db->select('adminName');

	$ci->db->from('admin');
	$ci->db->where('adminId', $id); // Produces: WHERE name = 'Joe'

	$query=$ci->db->get();

	return $query->result();
}
function getMenu($level){
	$ci=& get_instance();
	$ci->load->database();
	$sqln="SELECT * FROM admin_menu_cat c, admin_group_menu_cat g WHERE g.catId=c.catId AND g.groupId='$level' order BY c.catSort ASC";
	$ci->db->query($sqln);
	$data =  $ci->db->query($sqln)->result();
	//$query = $ci->db->result($sqln);
	return $data;
}
function getMenuCat($catid,$level){
	$ci=& get_instance();
	$ci->load->database();
	$sqlm="SELECT * FROM admin_menu m, admin_group_menu g WHERE m.catId='$catid' and m.menuId=g.menuId and g.groupId='$level' ORDER BY m.menuSort ASC";
	$ci->db->query($sqlm);
	$data =  $ci->db->query($sqlm)->result();
	//$query = $ci->db->result($sqln);
	return $data;
}
