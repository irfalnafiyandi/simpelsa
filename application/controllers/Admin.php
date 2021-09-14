<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
//    public $projectname 	 = "MEMBERSHIP";
//	public $projectnamelitte = "MBS";
//	public $site = "MEMBERSHIP";
	//print_r($this->db->last_query());


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Amodel');
		#SESSION DATA
		$nama_session = $this->session->userdata('nama');
		$username_session = $this->session->userdata('username');
		$level_session = $this->session->userdata('level');
		$from = $this->uri->segment(2);

	}

	public function Index(){
		/*if(!empty($this->nama) AND !empty($this->email)  AND !empty($this->checkpoint) ){
			header("location:" . base_url("Home/laporan#laporan"));
		}*/

		$data['title'] = "Login";


		#VIEW
		#$this->load->view('com/com-head',$data);


		$this->load->view('admin/login',$data);



	}

	public function loginprocess()
	{
		$now = time();
		$table = "admin";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($email) OR empty($password)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$where = array(
			'admin_username' => $email,
		);

		$user = $this->Amodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php

		if (empty($user->admin_username)) {
			$error = "Username atau Password tidak valid";
		} else {
			$passwordl = sha1($password . $this->config->item('CMS_SALT_STRING'));

			if ($user->admin_password != $passwordl) {
				$error = "Username atau Password tidak valid";
			}
		}

		if (empty($error)) {
			$now = time();

			$session = array(
				'authenticated' => true, // Buat session authenticated dengan value true
				'id' => $user->id_pelapor ,  // Buat session username
				'admin_username' => $user->admin_username,  // Buat session username
				'email' => $user->admin_email,  // Buat session username
				'nama' => $user->nama_pelapor, // Buat session authenticated
				'hp' => $user->admin_nohp, // Buat session authenticated
				'admin_level' => $user->admin_level, // Buat session authenticated
				'checkpoint' => 'admin', // Buat session authenticated
			);
			$this->session->set_userdata($session); // Buat session sesuai $session
			print "ok";
		} else {
			print $error;
		}
	}

	public function Home(){
		/*if(!empty($this->nama) AND !empty($this->email)  AND !empty($this->checkpoint) ){
			header("location:" . base_url("Home/laporan#laporan"));
		}*/

		$data['title'] = "Home";


		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('admin/home',$data);
		$this->load->view('com/com-footer',$data);


	}
}
