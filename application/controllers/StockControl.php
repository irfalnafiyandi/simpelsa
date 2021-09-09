<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockControl extends CI_Controller {

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
		$data['page'] = 59;
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

		$session_gid = $this->session->userdata('level');
		$data['uac'] = $this->Amodel->CheckAkses($session_gid,$data['page']);
	}
	public function Index(){
		$data['page'] = 59;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "History Stock";
		$data['desc'] = "Halaman yang mengelola data history Stock";

		$level = $this->session->userdata('level');

		$session_gid = $this->session->userdata('level');
		$data['uac'] = $this->Amodel->CheckAkses($session_gid,$data['page']);

		$data['amodel'] = $this->Amodel;
		$jumlah_data = $this->Amodel->jumlah_dataquery("stockId","historystock");



		$data['query'] = $this->Amodel->queryselect("SELECT * FROM historystock s inner join product p on p.pId = s.pId inner join satuan sp on p.spId = sp.spId inner join admin a on a.adminId = s.adminId ORDER BY stockId DESC");
		$data['rows'] = $jumlah_data;
		$data['level'] = $level;


		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('Stock/Stock',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function EditSupplier()
	{
		$data['page'] = 59;
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

	public function AddStock()
	{
		$data['page'] = 59;
		$data['parentpage'] = $this->Amodel->getval("catId","admin_menu","menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Add Stock ";
		$data['desc'] = " ";

		$data['query'] = $this->Amodel->queryselect("SELECT * FROM product p where p.pQty != 0  ");

		#VIEW
		$this->load->view("Com/Com-library",$data);
		$this->load->view('Stock/AddStock',$data);

	}

	public function reloadTable(){
		$id = $this->uri->segment(3);
		$data['amodel'] = $this->Amodel;
		$data['query'] = $this->Amodel->queryselect("SELECT * FROM historystock s inner join product p on p.pId = s.pId inner join satuan sp on p.spId = sp.spId inner join admin a on a.adminId = s.adminId ORDER BY stockId DESC");
		$this->load->view('Stock/ReloadStock',$data);
	}

	//ADMIN GROUP
	public function CaddHistoryStock()
	{
		$now = time();
		$table = "historystock";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}




		if (empty($prodid)  or empty($jumlah) or empty($totalsub) ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}



		if (empty($error)) {
			$stock = $this->Amodel->getval("pQty,pName,pCode,pPriceBasic,pPrice", "product", "pId={$prodid}");

			$jumlah = preg_replace("/[,|.]/", "", $jumlah);
			$now = time();
			$day = date('d');
			$month = date('m');
			$year = date('Y');
			$time = date("H:i");
			$adminid = $this->session->userdata('id');
			$data = array(
				'pId' => $prodid,
				'stockQty' => $jumlah,
				'stockDay' => $day,
				'stockMonth' => $month,
				'stockYear' => $year,
				'stockTime' => $now,
				'stockStatus' => 'in',
				'adminId' => $adminid,
			);
			$update = $this->Amodel->input($data, $table);
			if($update){
				$stocksisa = $stock[0]->pQty + $jumlah;
				$dataupdate = array(
					'pQty' => $stocksisa,
				);
				$whereupdate = array(
					'pId' => $prodid,
				);
				$this->Amodel->Update("product", $dataupdate, $whereupdate);
			}
		} else {
			print $error;
		}
	}






	public function CdeleteHistoryStock()
	{
		$now = time();
		$table = "historystock";
		$error = "";

		$id = $this->uri->segment(3);
		$getdata = $this->Amodel->getval("pId,stockQty", "historystock", "stockId={$id}");
		$prodid = $getdata[0]->pId;

		$stock = $this->Amodel->getval("pQty,pName,pCode,pPriceBasic,pPrice", "product", "pId={$prodid}");
		//print $stock[0]->pQty;exit;


		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {
			$stocksisa = $stock[0]->pQty - $getdata[0]->stockQty;


				$where = array(
					'stockId' => $id,
				);
				$delete = $this->Amodel->delete($table, $where);
				if($delete){
					$dataupdate = array(
						'pQty' => $stocksisa,
					);
					$whereupdate = array(
						'pId' => $prodid,
					);
					$this->Amodel->Update("product", $dataupdate, $whereupdate);
				}

		} else {
			print $error;
		}


	}



}
