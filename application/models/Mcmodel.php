<?php



if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mcmodel extends CI_Model {

	function data($number,$offset,$keyword=NULL){
		$this->db->select('*',$number,$offset);
		return $query = $this->db->get('merchant',$number,$offset)->result();
	}
	function jumlah_data($keyword){
		$this->db->select('mId');
		if($keyword){
			$keywordA = explode(" ", $keyword);
			foreach ($keywordA as $key => $value) {
				$this->db->or_like('mName',$value);
				$this->db->or_like('mEmail',$value);
				$this->db->or_like('mHP',$value);
			}

		}
		return $query = $this->db->get('member')->num_rows();
		//return $this->db->get('admin')->num_rows();
	}
	function jumlah_dataquery($colom,$table){
		$this->db->select($colom);
		return $query = $this->db->get($table)->num_rows();

	}
	function dataquery($table,$level){
		if($level == 1){
			return $this->db->get($table)->result();
		}else{
			$this->db->where('groupId !=', 1);
			return $this->db->get($table)->result();

		}
	}
	function Jumlahdata_query($table,$where){
		if($where){
			foreach ($where as $key => $value){
				$this->db->where($key, $value);
			}
			return $query = $this->db->get($table)->num_rows();

		}else{
			return $query = $this->db->get($table)->num_rows();
		}
	}

	function input($data,$table){
		$this->db->insert($table,$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	function Update($table,$data,$where){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function Detail_query($table,$where){
		$this->db->select('*');
		$this->db->from($table);
		foreach ($where as $key => $value){
			$this->db->where($key, $value);
		}
		return $query = $this->db->get()->result();;
	}
	function Checkdupicate_emailadd($table,$email){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('mEmail =', $email);

		return $query = $this->db->get()->num_rows();
	}
	function Checkdupicate_emailedit($table,$email,$id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('merchantEmail =', $email);
		$this->db->where('merchantId !=', $id);
		return $query = $this->db->get()->num_rows();
	}
	function delete($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function checkgroupid($colom,$table,$where){
		$this->db->select($colom);
		$this->db->where($where);
		return $query = $this->db->get($table)->num_rows();
	}
	function checkduplicate($table,$field,$value){
		//this function will check whether data is already existed in the database
		$this->db->select($field);
		$this->db->from($table);
		$this->db->where($field, $value);
		$query = $this->db->get()->num_rows();
		return $query;
	}








}
