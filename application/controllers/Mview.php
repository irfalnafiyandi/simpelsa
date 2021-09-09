<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mview extends CI_Controller
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
		$this->load->model('Mmodel');
	}

	public function Member()
	{
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');
		$data['title'] = "Member";
		$data['desc'] = "Halaman yang mengelola data member";


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
		$jumlah_data = $this->Mmodel->jumlah_data($keyword);
		$this->load->library('pagination');
		$config['reuse_query_string'] = TRUE;
		$config['base_url'] = base_url().'Mview/member/';
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
		$data['query'] = $this->Mmodel->data($config['per_page'],$from,$keyword);
		$data['rows'] = $jumlah_data;




		#VIEW
		$this->load->view("Admin/Com/Com-headadmin",$data);
		$this->load->view("Admin/Com/Com-menuadmin",$data);
		$this->load->view('Admin/Member',$data);
		$this->load->view("Admin/Com/Com-footer",$data);

	}
	public function Addmember()
	{
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambah akun member";
		$data['desc'] = " ";
		$level = 1;
//		if($level = 1){
//			$data['query'] = $this->Amodel->dataquery("admin_group",$level);
//		}elseif($level = 2){
//			$data['query'] = $this->Amodel->dataquery("admin_group");
//		}
		#VIEW
		$this->load->view("Admin/Com/Com-headadmin",$data);
		$this->load->view("Admin/Com/Com-menuadmin",$data);
		$this->load->view('Admin/Addmember',$data);
		$this->load->view("Admin/Com/Com-footer",$data);
	}
	public function Editmember()
	{
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit member";
		$data['desc'] = " Edit member";
		$where = array(
			'mId' => $id,
		);

		$data['query2'] = $this->Mmodel->Detail_query("member",$where);

		#VIEW
		$this->load->view("Admin/Com/Com-headadmin",$data);
		$this->load->view("Admin/Com/Com-menuadmin",$data);
		$this->load->view('Admin/Editmember',$data);
		$this->load->view("Admin/Com/Com-footer",$data);
	}

}
