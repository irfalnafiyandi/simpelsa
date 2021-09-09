<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcontrol extends CI_Controller {

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
		$this->load->model('Mmodel');
		$this->load->library('Mainmod');
	}


	public function Caddmember(){
		$now  = time();
		$table = "member";
		$error = "";

		foreach ($this->input->post() as $key=>$value){
			$$key=$value;
		}

		if(empty($name) OR empty($email) OR  empty($nowa) or empty($jeniskelamin)){
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Email tidak valid";
		}

		if(!is_numeric($nowa)){
			$error = "Nomor WA wajib angka";
		}



		$checkemail = $this->Mmodel->Checkdupicate_emailadd($table,$email);
		if($checkemail > 0){
			$error = "Email sudah digunakan";
		}



		if(empty($error)){

			$data = array(
				'mName' => $name,
				'mEmail' => $email,
				'mWA' => $nowa,
				'mGender' => $jeniskelamin,
			);
			$this->Mmodel->input($data,$table);

		}else{
			print $error;
		}
	}
	public function Ceditmember(){
		$now  = time();
		$table = "member";
		$error = "";

		foreach ($this->input->post() as $key=>$value){
			$$key=$value;
		}

		if(empty($name) OR empty($email) OR  empty($nowa) or empty($jeniskelamin) OR empty($id)){
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Email tidak valid";
		}

		if(!is_numeric($nowa)){
			$error = "Nomor WA wajib angka";
		}

		$checkemail = $this->Mmodel->Checkdupicate_emailedit($table,$email,$id);

		if($checkemail > 0){
			$error = "Email sudah digunakan";
		}


		if(empty($error)){
			$data = array(
				'mName' => $name,
				'mEmail' => $email,
				'mWA' => $nowa,
				'mGender' => $jeniskelamin,
			);
			$where = array(
				'mId' => $id,
			);

			$this->Mmodel->Update($table,$data,$where);
		}else{
			print $error;
		}
	}
	public function Cdeletemember(){

		$now  = time();
		$table = "member";
		$error = "";

		$id = $this->uri->segment(3);

		if( empty($id)){
			$error = "Wajib mengisi seluruh field yang ada";
		}

			$where = array(
				'mId' => $id,
			);
			$this->Mmodel->delete($table,$where);


		header("location:".base_url("Mview/member"));
	}


}
