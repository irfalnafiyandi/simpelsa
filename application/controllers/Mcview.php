<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcview extends CI_Controller
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
		$this->load->model('Mcmodel');
		$nama_session = $this->session->userdata('nama');
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

	public function Merchant()
	{
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');
		$data['title'] = "Merchant";
		$data['desc'] = "Halaman yang mengelola data merchant";


		if($this->input->post('keyword') != NULL ){
			$keyword = $this->input->post('keyword');
			$this->session->set_userdata(array("keyword"=>$keyword));
			$data['keyword'] = $keyword;
		}else{
			if($this->session->userdata('keyword') != NULL){
				$keyword = "";
				$data['keyword'] = $keyword;
			}
		}
		#PAGIANTION
		$jumlah_data = $this->Mcmodel->jumlah_data($keyword);
		$this->load->library('pagination');
		$config['reuse_query_string'] = TRUE;
		$config['base_url'] = base_url().'Mcview/merchant/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['query_string_segment'] = 'start';
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$from = $this->uri->segment(3);
		//$keyword = $this->uri->segment(4);
		$this->pagination->initialize($config);
		$data['query'] = $this->Mcmodel->data($config['per_page'],$from,$keyword);
		$data['rows'] = $jumlah_data;
		#VIEW
		$this->load->view("Admin/Com/Com-headadmin",$data);
		$this->load->view("Admin/Com/Com-menuadmin",$data);
		$this->load->view('Admin/Merchant',$data);
		$this->load->view("Admin/Com/Com-footer",$data);
	}
	public function Addmerchant()
	{
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambah akun merchant";
		$data['desc'] = " ";
		$level = 1;

		#VIEW
		$this->load->view("Admin/Com/Com-headadmin",$data);
		$this->load->view("Admin/Com/Com-menuadmin",$data);
		$this->load->view('Admin/Addmerchant',$data);
		$this->load->view("Admin/Com/Com-footer",$data);
	}
	public function EditMerchant()
	{
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit Merchant";
		$data['desc'] = " Edit Merchant";
		$where = array('merchantId' => $id,);
		$data['query'] = $this->Mcmodel->Detail_query("merchant",$where);

		#VIEW
		$this->load->view("Admin/Com/Com-headadmin",$data);
		$this->load->view("Admin/Com/Com-menuadmin",$data);
		$this->load->view('Admin/Editmerchant',$data);
		$this->load->view("Admin/Com/Com-footer",$data);
	}

}
