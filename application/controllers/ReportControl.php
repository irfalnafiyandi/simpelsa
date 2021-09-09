<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportControl extends CI_Controller {

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
	public function Index(){
		$data['page'] = 58;

		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Report Order";
		$data['desc'] = "Halaman yang menampilkan data laporan order";

		$level = $this->session->userdata('level');

		$data['amodel'] = $this->Amodel;

		$data['level'] = $level;

		$tahun = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		$data['tahun'] = $tahun;





		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('ReportOrder/ReportOrder',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function EditSupplier()
	{
		$data['page'] = 58;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit Supplier ";
		$data['desc'] = " ";
		$where = array(
			'sId' => $id,
		);
		$data['amodel'] = $this->Amodel;
		$data['query2'] = $this->Amodel->Detail_query("supplier",$where);

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('MasterBidang/EditSupplier',$data);
		$this->load->view("Com/Com-footer",$data);
	}

	public function AddSupplier()
	{
		$data['page'] = 58;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Add Supplier ";
		$data['desc'] = " ";

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('MasterBidang/AddSupplier',$data);
		$this->load->view("Com/Com-footer",$data);
	}

	//ADMIN GROUP
	public function CaddSupplier()
	{
		$now = time();
		$table = "supplier";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {
			$data = array(
				'sName' => $name,
				'sNoHP' => $hp,
				'sAlamat' => $alamat,
			);
			$this->Amodel->input($data, $table);
		} else {
			print $error;
		}
	}




	public function CeditSupplier()
	{
		$now = time();
		$table = "supplier";
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
				'sName' => $name,
				'sNoHP' => $hp,
				'sAlamat' => $alamat,
			);
			$where = array(
				'sId' => $id,
			);
			$this->Amodel->Update($table, $data, $where);
		} else {
			print $error;
		}
	}

	public function CdeleteSupplier()
	{
		$now = time();
		$table = "category";
		$error = "";

		$id = $this->uri->segment(3);

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {
			if ($id != 1) {
				$where = array(
					'sId' => $id,
				);
				$this->Amodel->delete($table, $where);
			}
		} else {
			print $error;
		}


	}



}
