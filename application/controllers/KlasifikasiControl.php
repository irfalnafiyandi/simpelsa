<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KlasifikasiControl extends CI_Controller {

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
		#SESSION DATA
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
	}
	public function KodeKlasifikasi(){
		$data['page'] = 49;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Master Data : Kode Klasifikasi";
		$data['desc'] = "Halaman yang mengelola data Kode Klasifikasi";

		$level = $this->session->userdata('level');

		$jumlah_data = $this->Amodel->jumlah_dataquery("KodeId","kodeklasifikasi");
		$data['query'] = $this->Amodel->dataquery("kodeklasifikasi",$level);
		$data['rows'] = $jumlah_data;
		$data['level'] = $level;


		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('MasterKodeKlasifikasi/KodeKlasifikasi',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function EditKodeKlasifikasi()
	{
		$data['page'] = 49;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit Kode Klasifikasi ";
		$data['desc'] = " ";
		$where = array(
			'KodeId' => $id,
		);
		$data['amodel'] = $this->Amodel;
		$data['query2'] = $this->Amodel->Detail_query("kodeklasifikasi",$where);

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('MasterKodeKlasifikasi/EditKodeKlasifikasi',$data);
		$this->load->view("Com/Com-footer",$data);
	}

	public function AddKodeKlasifikasi()
	{
		$data['page'] = 49;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambah Kode Klasifikasi ";
		$data['desc'] = " ";

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('MasterKodeKlasifikasi/AddKodeKlasifikasi',$data);
		$this->load->view("Com/Com-footer",$data);
	}

	//ADMIN GROUP
	public function CaddKodeKlasifikasi()
	{
		$now = time();
		$table = "kodeklasifikasi";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) Or empty($jenis)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}
		$where = array(
			'kKodeKlasifikasi' => $name
		);
		$checkduplicate = $this->Amodel->jumlahdata_query($table, $where);

		if ($checkduplicate > 0) {
			$error = "kode Klasifikasi telah ditambahkan";
		}

		if (empty($error)) {
			$data = array(
				'kKodeKlasifikasi' => $name,
				'kJenis' => $jenis,
			);
			$this->Amodel->input($data, $table);
		} else {
			print $error;
		}
	}




	public function CeditKodeKlasifikasi()
	{
		$now = time();
		$table = "kodeklasifikasi";
		$error = "";
		$id = $this->uri->segment(3);

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) or empty($id) or empty($jenis)) {
			$error = "Lengkapi data yang diperlukan";
		}

//		$checkduplicate = $this->Amodel->Checkdupicateedit($table, $name, $id);
//
//		if ($checkduplicate > 0) {
//			$error = "kode Klasifikasi telah ditambahkan";
//		}

		if (empty($error)) {
			$data = array(
				'kKodeKlasifikasi' => $name,
				'kJenis' => $jenis,
			);
			$where = array(
				'KodeId' => $id,
			);
			$this->Amodel->Update($table, $data, $where);
		} else {
			print $error;
		}
	}

	public function CdeleteKodeKlasifikasi()
	{
		$now = time();
		$table = "kodeklasifikasi";
		$error = "";

		$id = $this->uri->segment(3);

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {
			if ($id != 1) {
				$where = array(
					'KodeId' => $id,
				);
				$this->Amodel->delete($table, $where);
			}
		} else {
			print $error;
		}


	}



}
