<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
//    public $projectname 	 = "MEMBERSHIP";
//	public $projectnamelitte = "MBS";
//	public $site = "MEMBERSHIP";
	//print_r($this->db->last_query());


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Amodel');
		$this->load->helper('string');
		#SESSION DATA
		$this->id = $this->session->userdata('id');
		$this->nama = $this->session->userdata('nama');
		$this->email = $this->session->userdata('email');
		$this->checkpoint = $this->session->userdata('checkpoint');

	}


	public function index()
    {


		if(!empty($this->nama) AND !empty($this->email)  AND !empty($this->checkpoint) ){
			header("location:" . base_url("Home/laporan#laporan"));
		}

		$data['title'] = "Home";
		$data['session'] = $this->session;
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('home/index',$data);
    }

	public function register()
	{


		$data['title'] = "Register";
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('home/register',$data);


	}

	public function laporan()
	{

		if(empty($this->nama) AND empty($this->email)  AND empty($this->checkpoint) ){
			header("location:" . base_url("Home"));
		}


		$data['title'] = "Buat Laporan";
		$data['session'] = $this->session;
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('home/laporan',$data);


	}

	public function suksesregister()
	{
		$data['title'] = "Sukses Register";
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('home/suksesregister',$data);
	}
	public function sukseslapor()
	{
		$data['title'] = "Sukses Register";
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('home/sukseslaporkan',$data);
	}

	public function loginprocess()
	{
		$now = time();
		$table = "pelapor";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($email) OR empty($password)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$where = array(
			'email_pelapor' => $email,
			'statusemail_pelapor'=>'y',
		);

		$user = $this->Amodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php
	
		if (empty($user->email_pelapor)) {
			$error = "Username atau Password tidak valid";
		} else {
			$passwordl = sha1($password . $this->config->item('CMS_SALT_STRING'));
			if ($user->password_pelapor != $passwordl) {
				$error = "Username atau Password tidak valid";
			}
		}

		if (empty($error)) {
			$now = time();

			$session = array(
				'authenticated' => true, // Buat session authenticated dengan value true
				'id' => $user->id_pelapor ,  // Buat session username
				'email' => $user->email_pelapor,  // Buat session username
				'nama' => $user->nama_pelapor, // Buat session authenticated
				'hp_pelapor' => $user->hp_pelapor, // Buat session authenticated
				'checkpoint' => 'web', // Buat session authenticated
			);
			$this->session->set_userdata($session); // Buat session sesuai $session
		} else {
			print $error;
		}
	}

	public function registerprocess()
	{
		$now = time();
		$table = "pelapor";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) OR empty($email) OR empty($password) OR empty($passwordconf) OR empty($hp)  ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$where = array(
			'email_pelapor' => $email
		);
		$checkduplicate = $this->Amodel->jumlahdata_query($table, $where);

		if ($checkduplicate > 0) {
			$error = "Email telah digunakan";
		}

		if (strlen($password) < 8) {
			$error = "Password minimal memiliki 8 karakter";
		}
		if ($password != $passwordconf) {
			$error = "Konfirmasi password tidak valid atau tidak sama";
		}

		$dirpic = '';
		$imgfilename = '';


		if (empty($error)) {

		}

		if (empty($error)) {
			$password = sha1($password . $this->config->item('CMS_SALT_STRING'));
			$data = array(
				'email_pelapor' => $email,
				'nama_pelapor' => $name,
				'hp_pelapor' => $hp,
				'password_pelapor' => $password,
				'password_pelapor' => $password,
				'statusemail_pelapor' => 'n',
				'emailcode_pelapor'=>random_string('alnum','32'),
			);

			$this->Amodel->input($data, $table);
			print "ok";

		} else {
			print $error;
		}
	}
	public function updatepelapor($id,$code)
	{
		$now = time();
		$table = "pelapor";
		$error = "";



		if (empty($code)    ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$where = array(
			'id_pelapor' => $id,
			'emailcode_pelapor'=>$code,
		);
		$user = $this->Amodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php

		if (empty($user)) {
			$error = "Code Tidak Valid";
		}

		if (empty($error)) {
			$where = array(
				'statusemail_pelapor' => 'y',
			);
			$data = array(
				'statusemail_pelapor' => 'y',
			);
			$this->Amodel->Update($table, $data, $where);
			$session = array(
				'authenticated' => true, // Buat session authenticated dengan value true
				'id' => $user->id_pelapor ,  // Buat session username
				'email' => $user->email_pelapor,  // Buat session username
				'nama' => $user->nama_pelapor, // Buat session authenticated
				'hp_pelapor' => $user->hp_pelapor, // Buat session authenticated
				'checkpoint' => 'web', // Buat session authenticated
			);
			$this->session->set_userdata($session); // Buat session sesuai $session
			header("location:" . base_url("Home/laporan"));

		} else {
			print $error;
		}
	}
	public function logout()
	{
		$this->session->sess_destroy(); // Hapus semua session
		header("location:" . base_url("Home"));
	}



}

