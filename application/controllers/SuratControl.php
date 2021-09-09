<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratControl extends CI_Controller {

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
	public function SuratKeluar(){
		$data['page'] = 48;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Master Data : Surat Keluar";
		$data['desc'] = "Halaman yang mengelola data surat keluar";

		$level = $this->session->userdata('level');

		$jumlah_data = $this->Amodel->jumlah_dataquery("SId","suratkeluar");
		$data['query'] = $this->Amodel->dataquery("suratkeluar",$level);
		$data['query'] = $this->Amodel->queryselect("SELECT * FROM suratkeluar s ORDER by s.sType ASC");
		$data['rows'] = $jumlah_data;
		$data['level'] = $level;


		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('MasterSuratKeluar/Suratkeluar',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function EditSuratKeluar()
	{
		$data['page'] = 50;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit Surat Keluar ";
		$data['desc'] = " ";
		$where = array(
			'SId' => $id,
		);
		$data['amodel'] = $this->Amodel;
		$data['query2'] = $this->Amodel->Detail_query("suratkeluar",$where);

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('MasterSuratKeluar/EditSuratKeluar',$data);
		$this->load->view("Com/Com-footer",$data);
	}

	public function AddSuratKeluar()
	{
		$data['page'] = 48;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit Surat Keluar ";
		$data['desc'] = " ";

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('MasterSuratKeluar/AddSuratKeluar',$data);
		$this->load->view("Com/Com-footer",$data);
	}

	//ADMIN GROUP
	public function CaddSuratKeluar()
	{
		$now = time();
		$table = "suratkeluar";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) Or empty($jenis) Or empty($code)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {
			$data = array(
				'sName' => $name,
				'sType' => $jenis,
				'sCode' => $code,
			);
			$this->Amodel->input($data, $table);
		} else {
			print $error;
		}
	}




	public function CeditSuratKeluar()
	{
		$now = time();
		$table = "suratkeluar";
		$error = "";
		$id = $this->uri->segment(3);

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) or empty($id) or empty($jenis) Or empty($code)) {
			$error = "Lengkapi data yang diperlukan";
		}

		if (empty($error)) {
			$data = array(
				'sName' => $name,
				'sType' => $jenis,
				'sCode' => $code,
			);
			$where = array(
				'SId' => $id,
			);
			$this->Amodel->Update($table, $data, $where);
		} else {
			print $error;
		}
	}

	public function CdeleteSuratKeluar()
	{
		$now = time();
		$table = "suratkeluar";
		$error = "";

		$id = $this->uri->segment(3);

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {
			if ($id != 1) {
				$where = array(
					'SId' => $id,
				);
				$this->Amodel->delete($table, $where);
			}
		} else {
			print $error;
		}


	}




}
