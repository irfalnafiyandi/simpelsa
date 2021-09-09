<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acontrol extends CI_Controller
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

//	public $projectname 	 = $this->config->item('SITENAME');
//	public $projectnamelitte = $this->config->item('SITENAME');
//	public $site = "MEMBERSHIP";
//	public $CMS_SALT_STRING = "[[[[CM||SAu0m4t3&F44STENProc6]]]++";


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Amodel');
		$this->load->library('Mainmod');

	}

	public function login()
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
			'adminUsername' => $username,
			'adminActive' => "y",
		);

		$user = $this->Amodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php

		if (empty($user[0]->adminUsername)) {
			$error = "Username atau Password tidak valid";
		} else {
			$passwordl = sha1($password . $this->config->item('CMS_SALT_STRING'));
			if ($user[0]->adminPassword != $passwordl) {
				$error = "Username atau Password tidak valid";
			}
		}

		if (empty($error)) {
			$now = time();
			$data = array(
				'adminLastLogin' => $now,
			);
			$where = array(
				'adminUsername' => $user[0]->adminUsername,
			);
			$this->Amodel->Update($table, $data, $where);
			$session = array(
				'authenticated' => true, // Buat session authenticated dengan value true
				'id' => $user[0]->adminId,  // Buat session username
				'username' => $user[0]->adminUsername,  // Buat session username
				'nama' => $user[0]->adminName, // Buat session authenticated
				'level' => $user[0]->groupId, // Buat session authenticated
				'bidang' => $user[0]->bId // Buat session authenticated
			);
			$this->session->set_userdata($session); // Buat session sesuai $session
		} else {
			print $error;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy(); // Hapus semua session
		redirect('Aview'); // Redirect ke halaman login
	}

	public function Caddadmin()
	{
		$now = time();
		$table = "admin";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) OR empty($admingroup) OR empty($name) OR empty($username) OR empty($password) or empty($confirmpwd) ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$where = array(
			'adminUsername' => $username
		);
		$checkduplicate = $this->Amodel->jumlahdata_query($table, $where);

		if ($checkduplicate > 0) {
			$error = "Username telah digunakan";
		}

		if (strlen($password) < 8) {
			$error = "Password minimal memiliki 8 karakter";
		}
		if ($password != $confirmpwd) {
			$error = "Konfirmasi password tidak valid atau tidak sama";
		}

		$dirpic = '';
		$imgfilename = '';

		$pic = $_FILES['profilepic']['name'];
		if (empty($error)) {
			if (!empty($pic)) {
				$nowdir = date('dmY');
				$targetdir = "./assets/" . $table . "/" . $nowdir . "/";
				if (!@opendir($targetdir)) {
					mkdir("./assets/" . $table . "/" . $nowdir);
				}


				$config['upload_path'] = "./assets/" . $table . "/" . $nowdir;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = $now . "-" . $table;
				$config['max_size'] = 10240; // 2MB

				// load library upload
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('profilepic')) {
					$error = $this->upload->display_errors();
					// menampilkan pesan error
				} else {
					$adminfile = $config['file_name'] . $this->upload->data('file_ext');
				}
			}
		}

		if (empty($error)) {
			$password = sha1($password . $this->config->item('CMS_SALT_STRING'));
			$data = array(
				'groupId' => $admingroup,
				'adminName' => $name,
				'bId' => '',
				'adminUsername' => $username,
				'adminPassword' => $password,
				'adminLastLogin' => '0',
				'adminActive' => 'y',
			);
			if ($pic) {
				$data['adminDirPic'] = $nowdir;
				$data['adminPic'] = $adminfile;
			}
			$this->Amodel->input($data, $table);

		} else {
			print $error;
		}
	}

	public function Ceditadmin()
	{
		$now = time();
		$table = "admin";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($admingroup) OR empty($name) OR empty($username) OR empty($id) ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$checkduplicate = $this->Amodel->Checkdupicateedit($table, $username, $id);

		if ($checkduplicate > 0) {
			$error = "Username telah digunakan";
		}

		if ($password) {
			if (strlen($password) < 8) {
				$error = "Password minimal memiliki 8 karakter";
			}
		}
		$dirpic = '';
		$imgfilename = '';

		$pic = $_FILES['profilepic']['name'];
		if (empty($error)) {
			if (!empty($pic)) {
				$nowdir = date('dmY');
				$targetdir = "./assets/" . $table . "/" . $nowdir . "/";
				if (!@opendir($targetdir)) {
					mkdir("./assets/" . $table . "/" . $nowdir);
				}


				$config['upload_path'] = "./assets/" . $table . "/" . $nowdir;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = $now . "-" . $table;
				$config['max_size'] = 10240; // 2MB

				// load library upload
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('profilepic')) {
					$error = $this->upload->display_errors();
					// menampilkan pesan error
				} else {
					$adminfile = $config['file_name'] . $this->upload->data('file_ext');
				}

				$where = array(
					'adminId' => $id,
				);
				$datapic = $this->Amodel->Detail_query("admin", $where);
				$pic = $datapic[0]->adminPic;
				$picdir = $datapic[0]->adminDirPic;
				@unlink("assets/" . $table . "/" . $picdir . "/" . $pic);
			}
		}

		if (empty($error)) {
			$data = array(
				'groupId' => $admingroup,
				'adminName' => $name,
				'adminUsername' => $username,
				'bId' => '',
			);
			$where = array(
				'adminId' => $id,
			);
			if ($pic) {
				$data['adminDirPic'] = $nowdir;
				$data['adminPic'] = $adminfile;
			}
			if ($password) {
				$password = sha1($password . $this->config->item('CMS_SALT_STRING'));
				$data['adminPassword'] = $password;
			}
			$this->Amodel->Update($table, $data, $where);
		} else {
			print $error;
		}
	}

	public function Cdeleteadmin()
	{
		$now = time();
		$table = "admin";
		$error = "";
		$id = $this->uri->segment(3);
		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}
		if (empty($error)) {
			if ($id != 1) {
				$where = array(
					'adminId' => $id,
				);
				$this->Amodel->delete($table, $where);
			}
		} else {
			print $error;
		}
	}

	public function Cactive()
	{
		$now = time();
		$table = "admin";
		$error = "";

		$id = $this->uri->segment(3);

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}
		$data = array(
			'adminActive' => "y",
		);
		$where = array(
			'adminId' => $id,
		);

		$this->Amodel->Update($table, $data, $where);
		header("location:" . base_url("Aview/admin"));
	}

	public function Canonctive()
	{
		$now = time();
		$table = "admin";
		$error = "";

		$id = $this->uri->segment(3);

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}
		$data = array(
			'adminActive' => "n",
		);
		$where = array(
			'adminId' => $id,
		);

		$this->Amodel->Update($table, $data, $where);
		header("location:" . base_url("Aview/admin"));
	}

	//ADMIN GROUP
	public function Caddadmingroup()
	{
		$now = time();
		$table = "admin_group";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($groupname)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {
			$data = array(
				'groupName' => $groupname,
				'groupActive' => "y",
			);
			$this->Amodel->input($data, $table);
		} else {
			print $error;
		}
	}

	public function Ceditadmingroup()
	{
		$now = time();
		$table = "admin_group";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($groupname)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if(count($view)==0){
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {

			$where = array(
				'groupId' => $id,
			);
			$this->Amodel->delete("admin_group_menu_cat", $where);
			$this->Amodel->delete("admin_group_menu", $where);

			$num=1;
			foreach ($view as $key=>$value){
//				if ($value=="y"){
//					$addv    = ($add[$key])?$add[$key]:"n";
//					$editv   = ($edit[$key])?$edit[$key]:"n";
//					$deletev = ($delete[$key])?$delete[$key]:"n";
//					if(!empty($view[$key])){ $addv=$view[$key]; }else{$addv="n";}
					if(!empty($add[$key])){ $addv=$add[$key]; }else{$addv="n";}
					if(!empty($edit[$key])){ $editv=$edit[$key]; }else{$editv="n";}
					if(!empty($delete[$key])){ $deletev=$delete[$key]; }else{$deletev="n";}


					list($menuid,$cid)=explode("-",$key);


						//insert data into admin_group_menu
						$data = array(
							'groupId' => $id,
							'menuId' => $menuid,
							'gmView' => $value,
							'gmAdd' => $addv,
							'gmEdit' => $editv,
							'gmDelete' => $deletev,
						);

						$this->Amodel->input($data, "admin_group_menu");
						$mcat[$num]=$cid;
						$num++;

//				}
			}

			$mcat=array_unique($mcat);
			foreach ($mcat as $mkey=>$mvalue){
				$data = array(
					'groupId' => $id,
					'catId' => $mvalue,

				);
				$this->Amodel->input($data, "admin_group_menu_cat");
			}

			$data = array(
				'groupName' => $groupname,
				'groupActive' => "y",
			);
			$where = array(
				'groupId' => $id,
			);
			$this->Amodel->Update($table, $data, $where);
		} else {
			print $error;
		}


	}
	public function Cupdatesort()
	{

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		foreach ($s as $id=>$sortnum){
			$table="admin_menu_cat";
			$data = array(
				'catSort' => $sortnum,
			);
			$where = array(
				'catId' => $id,
			);
			$this->Amodel->Update($table, $data, $where);

		}
		foreach ($sm as $idm=>$msortnum){
			$table="admin_menu";
			$data = array(
				'menuSort' => $msortnum,
			);
			$where = array(
				'menuId' => $idm,
			);
			$this->Amodel->Update($table, $data, $where);

		}

	}

	public function Cdeleteadmingroup()
	{
		$now = time();
		$table = "admin_group";
		$error = "";

		$id = $this->uri->segment(3);

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}
		$colom = "adminId";
		$table2 = "admin";
		$where = array(
			'groupId' => $id,
		);
		$countadmin = $this->Amodel->checkgroupid($colom, $table2, $where);
		if ($countadmin > 0) {
			$error = "Tidak dapat menghapus, masih terdapat admin yang menggunakan group ini";
		}
		if (empty($error)) {
			if ($id != 1) {
				$where = array(
					'groupId' => $id,
				);
				$this->Amodel->delete($table, $where);
			}
		} else {
			print $error;
		}


	}

	//MENU CATEGORI
	public function Caddmenucategory()
	{
		$now = time();
		$table = "admin_menu_cat";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name)) {
			$error = "Lengkapi data yang diperlukan";
		}

		if (empty($error)) {


			$nextid = $this->Amodel->nextid("catId", "admin_menu_cat");
			$data = array(
				'catId' => $nextid,
				'catName' => $name,
				'catSort' => $nextid,
				'catMenuIcon' => $iconmenu,
			);
			$this->Amodel->input($data, $table);
		} else {
			print $error;
		}
	}

	public function Ceditmenucategory()
	{
		$now = time();
		$table = "admin_menu_cat";
		$error = "";
		$id = $this->uri->segment(3);

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) or empty($id)) {
			$error = "Lengkapi data yang diperlukan";
		}

		if (empty($error)) {
			$data = array(
				'catName' => $name,
				'catMenuIcon' => $iconmenu,
			);
			$where = array(
				'catId' => $id,
			);
			$this->Amodel->Update($table, $data, $where);
		} else {
			print $error;
		}
	}

	public function Cdeletemenucategory()
	{
		$now = time();
		$table = "admin_menu_cat";
		$error = "";
		$id = $this->uri->segment(3);


		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($id)) {
			$error = "Lengkapi data yang diperlukan";
		}

		$countmenu = $this->Amodel->countdata("admin_menu", "catId='$id'");
		if ($countmenu > 0) {
			$error = "Tidak dapat menghapus menu karna masih terdapat menu kategori";
		}

		if (empty($error)) {
			$where = array(
				'catId' => $id,
			);
			$this->Amodel->delete($table, $where);

		} else {
			print $error;
		}
	}

	//MENU
	public function Caddmenu()
	{
		$now = time();
		$table = "admin_menu";

		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) or empty($catid) or empty($file)) {
			$error = "Lengkapi data yang diperlukan";
		}


		if (empty($error)) {


			$nextid = $this->Amodel->nextid("menuId", "admin_menu");
			$data = array(
				'menuId' => $nextid,
				'catId' => $catid,
				'menuName' => $name,
				'menuFile' => $file,
				'menuSort' => $nextid,
				'menuView' => "y",
				'menuAdd' => "y",
				'menuEdit' => "y",
				'menuDelete' => "y",
			);
			$insert1 = $this->Amodel->input($data, $table);
			if ($insert1) {
				$table = "admin_group_menu";

				$data = array(
					'groupId' => $nextid,
					'menuId' => $catid,
					'gmView' => "y",
					'gmAdd' => "y",
					'gmEdit' => "y",
					'gmDelete' => "y",
				);
				$insert1 = $this->Amodel->input($data, $table);

			}
		} else {
			print $error;
		}
	}

	public function Ceditmenu()
	{
		$now = time();
		$table = "admin_menu";
		$error = "";
		$id = $this->uri->segment(3);

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) or empty($catid) or empty($file) or empty($id)) {
			$error = "Lengkapi data yang diperlukan";
		}


		if (empty($error)) {
			$data = array(
				'catId' => $catid,
				'menuName' => $name,
				'menuFile' => $file,
				'menuView' => "y",
				'menuEdit' => "y",
				'menuDelete' => "y",

			);
			$where = array(
				'menuId' => $id,
			);
			$this->Amodel->Update($table, $data, $where);
		} else {
			print $error;
		}
	}

	public function Cdeletemenu()
	{
		$now = time();
		$table = "admin_menu";
		$error = "";
		$id = $this->uri->segment(3);

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($id)) {
			$error = "Lengkapi data yang diperlukan";
		}


		if (empty($error)) {
			$where = array(
				'menuId' => $id,
			);
			$this->Amodel->delete($table, $where);
		} else {
			print $error;
		}
	}


}
