<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');


class Amodel extends CI_Model
{

	function data($number, $offset, $level_session, $keyword = NULL)
	{
		$this->db->select('*', $number, $offset);
		$this->db->join('admin_group', 'admin.groupId = admin_group.groupId', 'inner');
		#$this->db->join('bidang', 'bidang.bId = admin.bId', 'inner');
		if ($level_session != "1") {
			$array = array('admin.groupId !=' => 1,);
			$this->db->where($array);
		}
		if ($keyword) {
			$keywordA = explode(" ", $keyword);
			foreach ($keywordA as $key => $value) {
				$this->db->or_like('adminName', $value);
				$this->db->or_like('adminUsername', $value);
			}
		}
		return $query = $this->db->get('admin', $number, $offset)->result();
	}

	function jumlah_data($keyword)
	{
		$this->db->select('adminId');
		$this->db->join('admin_group', 'admin.groupId = admin_group.groupId', 'inner');
		if ($keyword) {
			$keywordA = explode(" ", $keyword);
			foreach ($keywordA as $key => $value) {
				$this->db->or_like('adminName', $value);
				$this->db->or_like('adminUsername', $value);
			}

		}
		return $query = $this->db->get('admin')->num_rows();
		//return $this->db->get('admin')->num_rows();
	}

	function jumlah_dataquery($colom, $table)
	{
		$this->db->select($colom);
		return $query = $this->db->get($table)->num_rows();

	}

	function dataquery($table, $level = NULL)
	{
//		if($level == 1){
//			return $this->db->get($table)->result();
//		}else{
//			$this->db->where('groupId !=', 1);
//			return $this->db->get($table)->result();
//
//		}

		return $this->db->get($table)->result();

	}

	function Jumlahdata_query($table, $where)
	{
		if ($where) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
			return $query = $this->db->get($table)->num_rows();

		} else {
			print "1";
			return $query = $this->db->get($table)->num_rows();
		}
	}

	function input($data, $table)
	{
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	function Update($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function Detail_query($table, $where)
	{
		$this->db->select('*');
		$this->db->from($table);
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		return $query = $this->db->get()->first_row();
	}

	function Checkdupicateedit($table, $username, $id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('adminUsername =', $username);
		$this->db->where('adminId !=', $id);
		return $query = $this->db->get()->num_rows();
	}

	function delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		return $table;
	}

	function checkgroupid($colom, $table, $where)
	{
		$this->db->select($colom);
		$this->db->where($where);
		return $query = $this->db->get($table)->num_rows();
	}

	function queryload($table, $where = NULL, $order = NULL)
	{
		$this->db->select('*');
		$this->db->from($table);
		if ($where) {
			$this->db->where($where);
		}
		if ($order) {
			$this->db->order_by($order);
		}
		return $query = $this->db->get()->result();
	}

	function queryselect($query)
	{
		return $hasil = $this->db->query($query)->result();
	}

	function nextid($colom, $table)
	{
		$this->db->select_max($colom, "latestId");
		$res1 = $this->db->get($table)->result();

		$nowId = 1;
		if (!empty($res1[0]->latestId)) {
			$lastid = (int)$res1[0]->latestId;
			$nowId = $lastid + 1;
		}
		return $nowId;
	}

	function getval($fieldToDisplay, $table, $fieldReference)
	{
		#$fieldReference = $this->db->escape($fieldReference);

		$kembali = "";
		$fieldToDisplay = str_replace(" ", "", $fieldToDisplay);
		$sql = "select $fieldToDisplay FROM $table where $fieldReference";

		$query = $this->db->query($sql)->result();


		$fields = explode(',', $fieldToDisplay);
		$fields = count($fields);
		if ($fields <= 1) {
			$kembali = $query[0]->$fieldToDisplay;
		} else {
			$kembali = $query;
//			foreach ($query as $key => $value){
//				array_push($kembali,[
//						$key=>$value
//				]);
//			}
		}

		return $kembali;
	}



	function countdata($table, $whereclause=NULL)
	{

		if($whereclause){
			$this->db->where($whereclause);
		}
		$query = $this->db->count_all_results($table);
		return $query;
	}

	function rows($query)
	{
		$hasil = $this->db->count_all_results($query);
		return $hasil;

	}

	function updateOrder($orderid)
	{
		//TOTAL
		$sql = "select * FROM ordersdetail where orderId='{$orderid}'";
		$query = $this->db->query($sql)->result();
		$subtotalb = 0;
		$diskon = 0;
		$profit = 0;
		foreach ($query as $keyq => $valueq) {
			$getdetail = $this->getval("orderId,pId,pPrice,detailSubtotal,detailDiscount,detailQty", "ordersdetail", "detailId={$valueq->detailId}");
			$stock = $this->getval("pQty,pName,pCode,pPriceBasic,pPrice", "product", "pId={$getdetail[0]->pId}");
			$subtotalb = $subtotalb + $valueq->detailSubtotal;
			$profit = $profit + ((($valueq->pPrice - $stock[0]->pPriceBasic) * $valueq->detailQty) - $valueq->detailDiscount);

		}

		$dataorder = array(
			'orderTotal' => $subtotalb,
			'orderProfit' => $profit,
		);


		$whereorder = array(
			'orderId' => $orderid,
		);




		$this->Update("orders", $dataorder, $whereorder);


	}
	function deletedetail($table, $where,$orderid)
	{
		$this->db->where($where);
		$this->db->delete($table);
		$this->updateOrder($orderid);
	}
	function getKeuntungan($bulan,$tahun,$day=NULL){
		if($day != NULL){
			$day = "AND orderDay='$day'";
		}
		$sql = "select * FROM  orders where orderYear='$tahun' AND orderMonth='$bulan' AND orderStatus='paid' $day";
		$query = $this->db->query($sql)->result();
		$keuntungan = 0;
		$total = 0;
		$hasil = array();
		foreach ($query as $keysum => $valuesum){
			$keuntungan = $keuntungan + $valuesum->orderProfit;
			$total = $total + $valuesum->orderTotal;
		}
		$hasil['profit'] = $keuntungan;
		$hasil['total'] = $total;

		return $hasil;
	}

	function CheckAkses($session_gid,$page){
		if(!empty($session_gid) and is_numeric($page)){

			$sql = "SELECT * FROM admin_group_menu WHERE menuId='$page' and groupId='$session_gid'";
			$query = $this->db->query($sql)->result();

			 $uac_allowed=count($query);

			if ($uac_allowed<1){
				redirect('Aview/home');
				exit;
			}else{
				foreach ($query as $keysum => $valuesum){}
				$data['uac_add']    = $valuesum->gmAdd;
				$data['uac_edit']   = $valuesum->gmEdit;
				$data['uac_delete'] = $valuesum->gmDelete;
				return $data;
			}
		}else{
			redirect('Acontrol/logout');

		}


	}

	public function save($field){
		$this->db->insert('pelapor', $field);
		if($this->db->affected_rows() > 0){
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}else{
			return false;
		}
	}


}
