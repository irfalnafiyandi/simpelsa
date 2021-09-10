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
		#SESSION DATA

	}


	public function index()
    {

		if(!empty($username_session) AND !empty($nama_session)  AND !empty($level_session) ){
			redirect('Aview/home');
		}



		$data['title'] = "Home";


		#VIEW
		$this->load->view("com-web/com-head",$data);
		$this->load->view('home/index',$data);
		$this->load->view("com-web/com-footer",$data);
    }

	public function home(){
		$data['page'] = 1;
		$data['parentpage'] = 1;
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');
		$data['title'] = "Home";
		$data['desc'] = "Halaman yang mengelola data admin";
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);

		$data['session_gid'] = $session_gid = $this->session->userdata('level');

		

		$data['amodel'] = $this->Amodel;
		$data['product'] = $this->Amodel->countdata("product", "");
		$data['order'] = $this->Amodel->countdata("orders", "orderStatus='paid'");
		$data['supplier'] = $this->Amodel->countdata("supplier", "");
		$hasilbulan = $this->Amodel->getKeuntungan(date('n'),date('Y'));
		$data['keuntuganbulan'] = $hasilbulan['profit'];
		$data['totalbulan'] = $hasilbulan['total'];


		$hasilbulan = $this->Amodel->getKeuntungan(date('m'),date('Y'),date('d'));
		$data['keuntuganhari'] = $hasilbulan['profit'];
		$data['totalhari'] = $hasilbulan['total'];



		$this->load->view('Admin/Home',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function admin(){
		$data['page'] = 15;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");


		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');
		$data['title'] = "Admin";
		$data['desc'] = "Halaman yang mengelola data admin";
		#SESSION DATA
		$nama_session = $this->session->userdata('nama');
		$username_session = $this->session->userdata('username');
		$level_session = $this->session->userdata('level');

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
		$jumlah_data = $this->Amodel->jumlah_data($keyword,$level_session);
		$this->load->library('pagination');
		$config['reuse_query_string'] = TRUE;
		$config['base_url'] = base_url().'Aview/admin/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 20;
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
		$data['query'] = $this->Amodel->data($config['per_page'],$from,$level_session,$keyword);
		$data['rows'] = $jumlah_data;
		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Admin/Admin',$data);
		$this->load->view("Com/Com-footer",$data);

	}

	public function Addadmin()
	{
		$data['page'] = 15;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambah akun admin";
		$data['desc'] = " ";
		$level = 1;
		$data['amodel'] = $this->Amodel;
		$data['level'] = $level;
		$data['query'] = $this->Amodel->dataquery("admin_group",$level);
		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Admin/Addadmin',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function Editadmin()
	{
		$data['page'] = 15;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit akun admin";
		$data['desc'] = " ";


		$level_session = $this->session->userdata('level');
		$where = array(
			'adminId' => $id,
		);
		$data['amodel'] = $this->Amodel;


		$data['query'] = $this->Amodel->dataquery("admin_group",$level_session);
		$data['query2'] = $this->Amodel->Detail_query("admin",$where);

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Admin/Editadmin',$data);
		$this->load->view("Com/Com-footer",$data);
	}

	public function Admingroup()
	{
		$data['page'] = 11;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Admin Group";
		$data['desc'] = "Halaman yang mengelola data admin group";
		$data['amodel'] = $this->Amodel;

		$level = $this->session->userdata('level');

		$jumlah_data = $this->Amodel->jumlah_dataquery("groupId","admin_group");
		$data['query'] = $this->Amodel->dataquery("admin_group",$level);
		$data['rows'] = $jumlah_data;


		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Admin/Admingroup',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function Addadmingroup()
	{
		$data['page'] = 11;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambah akun admin group";
		$data['desc'] = " ";
		$data['amodel'] = $this->Amodel;

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Admin/Addadmingroup',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function Editadmingroup()
	{
		$data['page'] = 11;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit admin group";
		$data['desc'] = " ";
		$where = array(
			'groupId' => $id,
		);
		$data['amodel'] = $this->Amodel;
		$data['amodel'] = $this->Amodel;
		$data['querycat'] = $this->Amodel->Detail_query("admin_group",$where);

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Admin/Editadmingroup',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function adminMenu()
	{
		$data['page'] = 10;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Menu Admin";
		$data['desc'] = " ";
		$level = 1;
		$data['amodel'] = $this->Amodel;
		$sql="SELECT * FROM admin_menu_cat ORDER BY catSort ASC";
		$data['query'] = $this->db->query($sql)->result();

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Admin/adminmenu',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function AddadminMenucategory()
	{
		$data['page'] = 10;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");

		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambah Menu Admin Category";
		$data['desc'] = " ";


		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Admin/addadminmenucategory',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function EditadminMenucategory()
	{
		$data['page'] = 10;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit Menu Admin Category";
		$data['desc'] = " ";

		$id = $this->uri->segment(3);
		$where = array(
			'catId' => $id,
		);
		$data['query2'] = $this->Amodel->Detail_query("admin_menu_cat",$where);


		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Admin/Editadminmenucategory',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function AddadminMenu()
	{
		$data['page'] = 11;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambah Menu Admin";
		$data['desc'] = " ";
		$level = 1;
		$data['amodel'] = $this->Amodel;
		$sql="SELECT * FROM admin_menu_cat ORDER BY catSort ASC";
		$data['query'] = $this->db->query($sql)->result();

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Admin/Addadminmenu',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function EditadminMenu()
	{
		$data['page'] = 10;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit Menu Admin ";
		$data['desc'] = " ";
		$data['amodel'] = $this->Amodel;

		$id = $this->uri->segment(3);
		$where = array(
			'menuId' => $id,
		);
		$data['query2'] = $this->Amodel->Detail_query("admin_menu",$where);


		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Admin/Editadminmenu',$data);
		$this->load->view("Com/Com-footer",$data);
	}




}
