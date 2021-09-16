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


		$this->load->model('Adminmodel');
		$this->load->model('Amodel');
		$this->load->helper('string');
		$this->load->helper('menu_helper');
		#SESSION DATA
		$this->id = $this->session->userdata('id');
		$this->admin_username = $this->session->userdata('admin_username');
		$this->email = $this->session->userdata('email');
		$this->nama = $this->session->userdata('nama');
		$this->hp = $this->session->userdata('hp');
		$this->admin_level = $this->session->userdata('admin_level');





	}

	public function Index(){

		$data['title'] = "Login";


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

		if (empty($username) OR empty($password)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$where = array(
			'admin_username' => $username,
		);

		$user = $this->Amodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php

		if (empty($user->admin_username)) {
			$error = "Username atau Password tidak valid";
		} else {
			$passwordl = sha1($password . $this->config->item('CMS_SALT_STRING'));


			if ($user->admin_password != $passwordl) {
				$error = "Username atau Password tidak valid ";
			}
		}

		if (empty($error)) {
			$now = time();

			$session = array(
				'authenticated' => true, // Buat session authenticated dengan value true
				'id' => $user->id_admin ,  // Buat session username
				'admin_username' => $user->admin_username,  // Buat session username
				'email' => $user->admin_email,  // Buat session username
				'nama' => $user->admin_fullname, // Buat session authenticated
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


		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "Home";
		$data['session'] = $this->session;

		$data['pelapor'] = $this->Amodel->countdata("pelapor", "");
		$data['laporanproses'] = $this->Amodel->countdata("laporan_sampah", "status_laporan='p'");

		$data['semualaporan'] = $this->Amodel->countdata("laporan_sampah", "");



		#VIEW




		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/home',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function adminchangepassword(){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "Change Password";
		$data['session'] = $this->session;


		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/adminchangepass',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function adminchangepasswordstore()
	{
		$now = time();
		$table = "admin";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}



		if (empty($passwordold) OR empty($passwordnew) OR empty($passwordkonfnew)   ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}else{

			$where = array(
				'id_admin' => $this->id,
			);
			$detail = $this->Adminmodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php


			$passwordoldl = sha1($passwordold . $this->config->item('CMS_SALT_STRING'));
			if ($passwordoldl != $detail->admin_password) {
				$error = "Password Lama Tidak Valid";
			}

			if($passwordold){
				if (strlen($passwordnew) < 8) {
					$error = "Password minimal memiliki 8 karakter";
				}

				if ($passwordnew != $passwordkonfnew) {
					$error = "Konfirmasi password tidak valid atau tidak sama";
				}
			}
		}



		if ($error) {
			echo "<span class='pl-4'>".$error."</span>";
		} else {
			$where = array(
				'id_admin' => $this->id,
			);
			$passwordnew = sha1($passwordnew . $this->config->item('CMS_SALT_STRING'));
			$data = array(
				'admin_password' => $passwordnew,
			);
			$id = $this->Adminmodel->Update($table, $data, $where);
			print "ok";

		}
	}

	public function adminlist(){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "User";
		$data['session'] = $this->session;
		$sql="SELECT * FROM admin  ORDER BY id_admin DESC";
		$data['query'] = $this->db->query($sql)->result();


		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/admin',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function adminadd(){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "Tambah User";
		$data['session'] = $this->session;


		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/adminadd',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function adminstore()
	{
		$now = time();
		$table = "admin";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}



		if (empty($nama) OR empty($username) OR empty($password) OR empty($passwordkonf) OR empty($email) OR empty($hp)  OR empty($level)  ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}else{
			$where = array(
				'admin_username' => $username
			);
			$checkduplicateusername = $this->Amodel->jumlahdata_query($table, $where);

			$where = array(
				'admin_email' => $email
			);
			$checkduplicateemail = $this->Amodel->jumlahdata_query($table, $where);

			$where = array(
				'admin_nohp' => $hp
			);
			$checkduplicatehp = $this->Amodel->jumlahdata_query($table, $where);

			if ($checkduplicateusername > 0) {
				$error = "Username telah digunakan";
			}

			if ($checkduplicateemail > 0) {
				$error = "Email telah digunakan";
			}

			if ($checkduplicatehp > 0) {
				$error = "No Hp telah digunakan";
			}

			if (strlen($password) < 8) {
				$error = "Password minimal memiliki 8 karakter";
			}
			if ($password != $passwordkonf) {
				$error = "Konfirmasi password tidak valid atau tidak sama";
			}

			$dirpic = '';
			$imgfilename = '';


		}



		if ($error) {
			echo "<span class='pl-4'>".$error."</span>";
		} else {
			$password = sha1($password . $this->config->item('CMS_SALT_STRING'));
			$code= random_string('alnum','32');
			$data = array(
				'admin_username' => $username,
				'admin_password' => $password,
				'admin_fullname' => $nama,
				'admin_email' => $email,
				'admin_nohp' => $hp,
				'admin_level' => $level,
			);
			$id = $this->Adminmodel->save($data);
			print "ok";

		}
	}
	public function adminedit($id){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "Edit User";
		$data['session'] = $this->session;
		$table= "admin";

		$where = array(
			'id_admin' => $id,
		);
		$detail = $this->Adminmodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php
		$data['detail'] = $detail;



		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/adminedit',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function adminupdate()
	{
		$now = time();
		$table = "admin";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}



		if (empty($nama) OR empty($username) OR empty($email) OR empty($hp)  OR empty($level) OR empty($id)  ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}else{

			$where = array(
				'admin_username' => $username,
				'id_admin !=' => $id,
			);
			$checkduplicateusername = $this->Amodel->jumlahdata_query($table, $where);

			$where = array(
				'admin_email' => $email,
				'id_admin !=' => $id,
			);
			$checkduplicateemail = $this->Amodel->jumlahdata_query($table, $where);

			$where = array(
				'admin_nohp' => $hp,
				'id_admin !=' => $id,
			);
			$checkduplicatehp = $this->Amodel->jumlahdata_query($table, $where);

			if ($checkduplicateusername > 0) {
				$error = "Username telah digunakan";
			}

			if ($checkduplicateemail > 0) {
				$error = "Email telah digunakan";
			}

			if ($checkduplicatehp > 0) {
				$error = "No Hp telah digunakan";
			}
			if($password){
				if (strlen($password) < 8) {
					$error = "Password minimal memiliki 8 karakter";
				}
				if ($password != $passwordkonf) {
					$error = "Konfirmasi password tidak valid atau tidak sama";
				}
			}
		}



		if ($error) {
			echo "<span class='pl-4'>".$error."</span>";
		} else {

			$code= random_string('alnum','32');
			$where = array(
				'id_admin' => $id,
			);
			$data = array(
				'admin_username' => $username,
				'admin_fullname' => $nama,
				'admin_email' => $email,
				'admin_nohp' => $hp,
				'admin_level' => $level,
			);
			if ($password) {
				$password = sha1($password . $this->config->item('CMS_SALT_STRING'));
				$data['admin_password'] = $password;
			}
			$id = $this->Adminmodel->Update($table, $data, $where);
			print "ok";

		}
	}
	public function deleteadmin($id)
	{
		$now = time();
		$table = "admin";
		$error = "";

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}
		if (empty($error)) {

				$where = array(
					'id_admin' => $id,
				);
				$this->Amodel->delete($table, $where);
				header("location:" . base_url("adminlist"));

		} else {
			print $error;
		}
	}

	public function laporansampah(){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "Laporan Sampah";
		$data['session'] = $this->session;
		$sql="SELECT * FROM laporan_sampah inner join pelapor on laporan_sampah.id_pelapor = pelapor.id_pelapor  ORDER BY id_laporan DESC";
		$data['query'] = $this->db->query($sql)->result();




		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/laporan',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function laporanverifikasi($id){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "Verifikasi Laporan";
		$data['session'] = $this->session;
		$table= "laporan_sampah";



		$sql="SELECT * FROM laporan_sampah inner join pelapor on laporan_sampah.id_pelapor = pelapor.id_pelapor where id_laporan='$id' ORDER BY id_laporan DESC";
		$data['detail'] = $this->db->query($sql)->first_row();







		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/laporanverifikasi',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function laporandetail($id){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "Detail Laporan";
		$data['session'] = $this->session;
		$table= "laporan_sampah";



		$sql="SELECT * FROM laporan_sampah inner join pelapor on laporan_sampah.id_pelapor = pelapor.id_pelapor where id_laporan='$id' ORDER BY id_laporan DESC";
		$data['detail'] = $this->db->query($sql)->first_row();







		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/detaillaporan',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function laporanverifikasiupdate()
	{
		$now = time();
		$table = "laporan_sampah";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}



		if (empty($id)  ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}else{



			$where = array(
				'id_laporan' => $id,

			);
			$checkduplicatehp = $this->Amodel->jumlahdata_query($table, $where);


			if ($checkduplicatehp == 0) {
				$error = "Laporan Tidak Ditemukan";
			}

		}



		if ($error) {
			echo "<span class='pl-4'>".$error."</span>";
		} else {


			$where = array(
				'id_laporan' => $id,
			);
			$data = array(
				'status_laporan' => 'p',
			);

			$id = $this->Adminmodel->Update($table, $data, $where);
			print "ok";

		}
	}
	public function laporanupdatestatus($id){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "Update Laporan";
		$data['session'] = $this->session;
		$table= "laporan_sampah";



		$sql="SELECT * FROM laporan_sampah inner join pelapor on laporan_sampah.id_pelapor = pelapor.id_pelapor where id_laporan='$id' ORDER BY id_laporan DESC";
		$data['detail'] = $this->db->query($sql)->first_row();







		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/updatestatuslaporan',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function laporanupdatestatusupdate()
	{
		$now = time();
		$table = "laporan_sampah";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}



		if (empty($id)  ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}else{



			$where = array(
				'id_laporan' => $id,

			);
			$checkduplicatehp = $this->Amodel->jumlahdata_query($table, $where);


			if ($checkduplicatehp == 0) {
				$error = "Laporan Tidak Ditemukan";
			}

		}



		if ($error) {
			echo "<span class='pl-4'>".$error."</span>";
		} else {

			if(isset($_FILES['file'])){
				$this->load->library('upload');
				$nmfile = "laporanupdate_" . time();
				$config['upload_path'] = './assets/laporan/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['max_size'] = '13072'; //maksimum besar file 3M
				$config['max_width'] = '15000'; //lebar maksimum 5000 px
				$config['max_height'] = '15000'; //tinggi maksimu 5000 px
				$config['file_name'] = $nmfile; //nama yang terupload nantinya

				$this->upload->initialize($config);

				if ($_FILES['file']['name']) {
					if ($this->upload->do_upload('file')) {
						$gbr = $this->upload->data();
						$namefile = $gbr['file_name'];
					}
				}
			}


			$where = array(
				'id_laporan' => $id,
			);
			$data = array(
				'status_laporan' => 'y',
				'tanggal_verifikasi'=>date('Y-m-d H:i:s'),
				'foto_verifikasi' => $namefile,
			);

			$id = $this->Adminmodel->Update($table, $data, $where);
			print "ok";

		}
	}

	public function cetaklaporan(){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "Cetak Laporan";
		$data['session'] = $this->session;


		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/cetaklaporan',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function cetaklaporanstore(){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}


		$now = time();
		$table = "laporan_sampah";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}
		foreach ($this->input->get() as $key => $value) {
			$$key = $value;
		}


		$data['title'] = "Cetak Laporan";
		$data['namadmin'] = $this->nama;



		$mulai = $tahun.'-'.$bulan.'-01';
		$sampai = $tahun.'-'.$bulan.'-31';

		$sql="SELECT * FROM laporan_sampah inner join pelapor on laporan_sampah.id_pelapor = pelapor.id_pelapor ORDER BY id_laporan DESC";
		$data['query'] = $this->db->query($sql)->result();






		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');

		$this->pdf->filename = "laporan.pdf";



		$this->pdf->load_view('admin/cetak',$data);





	}



	public function pelapor(){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "Pelapor";
		$data['session'] = $this->session;
		$sql="SELECT * FROM pelapor  ORDER BY id_pelapor DESC";
		$data['query'] = $this->db->query($sql)->result();


		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/pelapor',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function pelaporedit($id){
		if(empty($this->id) OR empty($this->admin_username)){
			header("location:" . base_url('adminlogout'));
		}

		$data['title'] = "Edit Pelapor";
		$data['session'] = $this->session;
		$table= "pelapor";

		$where = array(
			'id_pelapor' => $id,
		);
		$detail = $this->Adminmodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php
		$data['detail'] = $detail;



		#VIEW
		#$this->load->view('com/com-head',$data);

		$this->load->view('com/com-head',$data);
		$this->load->view('com/com-menu',$data);
		$this->load->view('com/com-nav',$data);
		$this->load->view('admin/pelaporedit',$data);
		$this->load->view('com/com-footer',$data);


	}
	public function pelaporupdate()
	{
		$now = time();
		$table = "pelapor";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}



		if (empty($nama)  OR empty($hp)   OR empty($id)  ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}else{



			$where = array(
				'hp_pelapor' => $hp,
				'id_pelapor !=' => $id,
			);
			$checkduplicatehp = $this->Amodel->jumlahdata_query($table, $where);

			if ($checkduplicatehp > 0) {
				$error = "No Hp telah digunakan";
			}
			if($password){
				if (strlen($password) < 8) {
					$error = "Password minimal memiliki 8 karakter";
				}
				if ($password != $passwordkonf) {
					$error = "Konfirmasi password tidak valid atau tidak sama";
				}
			}
		}



		if ($error) {
			echo "<span class='pl-4'>".$error."</span>";
		} else {


			$where = array(
				'id_pelapor' => $id,
			);
			$data = array(

				'nama_pelapor' => $nama,
				'hp_pelapor' => $hp,

			);
			if ($password) {
				$password = sha1($password . $this->config->item('CMS_SALT_STRING'));
				$data['password_pelapor'] = $password;
			}
			$id = $this->Adminmodel->Update($table, $data, $where);
			print "ok";

		}
	}
	public function pelapordelete($id)
	{
		$now = time();
		$table = "pelapor";
		$error = "";

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}
		if (empty($error)) {

			$where = array(
				'id_pelapor' => $id,
			);
			$this->Amodel->delete($table, $where);
			header("location:" . base_url("pelaporlist"));

		} else {
			print $error;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy(); // Hapus semua session
		header("location:" . base_url("Admin"));
	}
}
