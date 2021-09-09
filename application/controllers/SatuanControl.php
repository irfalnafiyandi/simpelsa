<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SatuanControl extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the de fault controller in
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
		$data['page'] = 57;
		$session_gid = $this->session->userdata('level');
		$nama_session = $this->session->userdata('nama');
		$username_session = $this->session->userdata('username');
		$level_session = $this->session->userdata('level');
		$from = $this->uri->segment(2);
		if(!empty($from)){
			$nama_session = $this->session->userdata('nama');
			if(empty($nama_session)){ redirect('Acontrol/logout');}
		}
		if($from =="index"){
			$nama_session = $this->session->userdata('nama');
			if(empty($nama_session)){ redirect('Acontrol/logout');}
		}

		$this->Amodel->CheckAkses($session_gid,$data['page']);




	}
	public function Index(){
		$data['page'] = 57;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Master Data : Satuan";
		$data['desc'] = "Halaman yang mengelola data satuan";

		$level = $this->session->userdata('level');

		$data['amodel'] = $this->Amodel;
		$jumlah_data = $this->Amodel->jumlah_dataquery("spId","satuan");
		#$data['query'] = $this->Amodel->dataquery("category",$level);
		$data['query'] = $this->Amodel->queryselect("SELECT * FROM satuan s");
		$data['rows'] = $jumlah_data;
		$data['level'] = $level;

		$session_gid = $this->session->userdata('level');
		$data['uac'] = $this->Amodel->CheckAkses($session_gid,$data['page']);

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Satuan/Satuan',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function EditSatuan()
	{
		$data['page'] = 57;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit Satuan ";
		$data['desc'] = " Halaman Untuk Mengubah data Satuan";
		$where = array(
			'spId' => $id,
		);
		$data['amodel'] = $this->Amodel;
		$data['query2'] = $this->Amodel->Detail_query("satuan",$where);

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Satuan/EditSatuan',$data);
		$this->load->view("Com/Com-footer",$data);
	}

	public function AddSatuan()
	{
		$data['page'] = 57;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambah Satuan ";
		$data['desc'] = " Halaman Untuk Menambahkan Satuan";

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Satuan/AddSatuan',$data);
		$this->load->view("Com/Com-footer",$data);
	}

	//ADMIN GROUP
	public function CaddSatuan()
	{
		$now = time();
		$table = "satuan";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {
			$data = array(
				'spName' => $name,
			);
			$this->Amodel->input($data, $table);
		} else {
			print $error;
		}
	}




	public function CeditSatuan()
	{
		$now = time();
		$table = "satuan";
		$error = "";
		$id = $this->uri->segment(3);

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) or empty($id) ) {
			$error = "Lengkapi data yang diperlukan";
		}

		if (empty($error)) {
			$data = array(
				'spName' => $name
			);
			$where = array(
				'spId' => $id,
			);
			$this->Amodel->Update($table, $data, $where);
		} else {
			print $error;
		}
	}

	public function CdeleteSatuan()
	{
		$now = time();
		$table = "satuan";
		$error = "";

		$id = $this->uri->segment(3);

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {
			if ($id != 1) {
				$where = array(
					'spId' => $id,
				);
				$this->Amodel->delete($table, $where);
			}
		} else {
			print $error;
		}


	}



}
