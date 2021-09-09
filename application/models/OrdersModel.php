<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdersModel extends CI_Model {

	var $table = 'orders as o'; //nama tabel dari database
	var $column_order = array(null, 'o.orderId'); //field yang ada di table user
	var $column_search = array('o.orderPCC'); //field yang diizin untuk pencarian
	var $order = array('o.orderId' => 'ASC'); // default order

	private function _get_datatables_query()
	{
		$this->db->from($this->table);


		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if(isset($_POST['search']['value'])) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function getData($where){
		return $this->db->get_where('orders',$where)->row();
	}

	public function save($field){
		$this->db->insert('orders', $field);
		$insert_id = $this->db->insert_id();
		if($this->db->affected_rows() > 0){
			return $insert_id;
		}else{
			return false;
		}
	}

	public function all(){
		$this->db->order_by('orderId','desc');
		$query = $this->db->get('orders');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}

	}


	public function getId($id){
		$this->db->where('orderId', $id);
		$query = $this->db->get('orders');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


	public function update($field, $id){
		$this->db->where('orderId',$id);
		$this->db->update('orders', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id){
		$this->db->where('orderId', $id);
		$this->db->delete('orders');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
