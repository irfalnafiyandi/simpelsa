<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mccontrol extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

//	public $projectname 	 = $this->config->item('SITENAME');
//	public $projectnamelitte = $this->config->item('SITENAME');
//	public $site = "MEMBERSHIP";
//	public $CMS_SALT_STRING = "[[[[CM||SAu0m4t3&F44STENProc6]]]++";


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mcmodel');
		$this->load->library('Mainmod');
	}
	public function login(){
		$now  = time();
		$table = "admin";
		$error = "";
		foreach ($this->input->post() as $key=>$value){
			$$key=$value;
		}
		if(empty($username) OR empty($password)){
			$error = "Wajib mengisi seluruh field yang ada";
		}
		$where = array('adminUsername' => $username,'adminActive' => "y",);
		$user = $this->Amodel->Detail_query($table,$where); // Panggil fungsi get yang ada di UserModel.php

		if (empty($user[0]->adminUsername)) {
			$error = "Username atau Password tidak valid";
		}else{
			$passwordl = sha1($password.$this->config->item('CMS_SALT_STRING'));
			if($user[0]->adminPassword != $passwordl ){
				$error = "Username atau Password tidak valid";
			}
		}

		if(empty($error)){
			$now  = time();
			$data = array(
				'adminLastLogin' => $now,
			);
			$where = array(
				'adminUsername' => $user[0]->adminUsername,
			);
			$this->Amodel->Update($table,$data,$where);
			$session = array(
				'authenticated' => true, // Buat session authenticated dengan value true
				'id' => $user[0]->adminId,  // Buat session username
				'username' => $user[0]->adminUsername,  // Buat session username
				'nama' => $user[0]->adminName, // Buat session authenticated
				'level' => $user[0]->groupId // Buat session authenticated
			);
			$this->session->set_userdata($session); // Buat session sesuai $session
		}else{
			print $error;
		}
	}
	public function logout(){
		$this->session->sess_destroy(); // Hapus semua session
		redirect('Mcview'); // Redirect ke halaman login
	}
	public function Caddmerchant(){
		$now  = time();
		$table = "merchant";
		$error = "";

		foreach ($this->input->post() as $key=>$value){
			$$key=$value;
		}

		if(empty($name) OR empty($email)  OR empty($nowa) OR empty($password) or empty($confirmpwd)){
			$error = "Wajib mengisi seluruh field yang ada";
		}
		$where = array(
			'merchantUsername' => $username
		);
		$checkduplicate = $this->Mcmodel->jumlahdata_query($table,$where);

		if($checkduplicate > 0){
			$error = "Username telah digunakan";
		}

		if(strlen($password)<8){
			$error= "Password minimal memiliki 8 karakter";
		}
		if($password != $confirmpwd){
			$error = "Konfirmasi password tidak valid atau tidak sama";
		}

		$dirpic='';
		$imgfilename='';

		$pic = $_FILES['profilepic']['name'];
		if(empty($error)){
			if(!empty($pic)){
				$nowdir=date('dmY');
				$targetdir= "./assets/".$table."/".$nowdir."/";
				if(!@opendir($targetdir) ){
					mkdir("./assets/".$table."/".$nowdir);
				}


				$config['upload_path']          = "./assets/".$table."/".$nowdir;
				$config['allowed_types']        = 'gif|jpg|png';
				$config['file_name']            = $now."-".$table;
				$config['max_size']             = 10240; // 2MB

				// load library upload
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('profilepic')) {
					$error = $this->upload->display_errors();
					// menampilkan pesan error
				}else{
					$adminfile = $config['file_name'].$this->upload->data('file_ext');
				}
			}
		}

		if(empty($error)){
			$password = sha1($password.$this->config->item('CMS_SALT_STRING'));
			$data = array(
				'merchantName' => $name,
				'merchantEmail' => $email,
				'merchantUsername' => $username,
				'merchantPassword' => $password,
				'merchantStatus' => 'y',
			);
			if($pic){
				$data['adminDirPic'] = $nowdir;
				$data['adminPic'] = $adminfile;
			}
			$this->Mcmodel->input($data,$table);

		}else{
			print $error;
		}
	}
	public function Ceditmerchant(){
		$now  = time();
		$table = "merchant";
		$error = "";
		foreach ($this->input->post() as $key=>$value){
			$$key=$value;
		}
		if(empty($name) OR empty($email) OR  empty($nowa)  OR empty($id)){
			$error = "Wajib mengisi seluruh field yang ada";
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Email tidak valid";
		}
		if(!is_numeric($nowa)){
			$error = "Nomor WA wajib angka";
		}

		$checkemail = $this->Mcmodel->Checkdupicate_emailedit($table,$email,$id);
		if($checkemail > 0){
			$error = "Email sudah digunakan";
		}

		$field = "merchantWa";
		$value = $nowa;
		$checkwa = $this->Mcmodel->checkduplicate($table,$field,$value);
		if($checkwa > 0){
			$error = "No WA sudah terdaftar";
		}

		if(empty($error)){
			$data = array(
				'merchantName' => $name,
				'merchantEmail' => $email,
				'merchantWa' => $nowa,
			);
			$where = array(
				'merchantId' => $id,
			);
			if($password){
				$password = sha1($password.$this->config->item('CMS_SALT_STRING'));
				$data['merchantPassword'] = $password;
			}

			$this->Mcmodel->Update($table,$data,$where);
		}else{
			print $error;
		}
	}
	public function Cdeletemerchant(){
		$now  = time();
		$table = "merchant";
		$error = "";
		$id = $this->uri->segment(3);
		if( empty($id)){
			$error = "Wajib mengisi seluruh field yang ada";
		}
		if(empty($error)){
			$where = array(
				'merchantId' => $id,
			);
			$this->Mcmodel->delete($table,$where);
		}else{
			print $error;
		}
	}
	public function Cactive(){
		$now  = time();
		$table = "merchant";
		$error = "";

		$id = $this->uri->segment(3);
		if( empty($id)){
			$error = "Wajib mengisi seluruh field yang ada";
		}
		if(empty($error)){
			$data = array(
				'merchantStatus' => "y",
			);
			$where = array(
				'merchantId' => $id,
			);
			$this->Mcmodel->Update($table,$data,$where);
		}else{
			print $error;
		}

	}
	public function Canonctive(){
		$now  = time();
		$table = "merchant";
		$error = "";
		$id = $this->uri->segment(3);
		if( empty($id)){
			$error = "Wajib mengisi seluruh field yang ada";
		}
		if(empty($error)){
			$data = array(
				'merchantStatus' => "n",
			);
			$where = array(
				'merchantId' => $id,
			);
			$this->Mcmodel->Update($table,$data,$where);
		}else{
			print $error;
		}
	}




}
