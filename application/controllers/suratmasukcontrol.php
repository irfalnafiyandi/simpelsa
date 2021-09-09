<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasukcontrol extends CI_Controller {



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

		#DATA DEFAULT
	}
	public function suratmasuk(){
		$data['page'] = 52;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Surat Masuk";
		$data['desc'] = "Halaman yang mengelola data surat keluar";

		$level = $this->session->userdata('level');
		$jumlah_data = $this->Amodel->jumlah_dataquery("SId","suratkeluar");
		$data['query'] = $this->Amodel->dataquery("suratkeluar",$level);
		$data['query'] = $this->Amodel->queryselect("SELECT * FROM suratmasuk sm inner join admin a on sm.adminId = a.adminId ORDER by sm.smTanggalTimestamp DESC");
		$data['rows'] = $jumlah_data;
		$data['level'] = $level;

		#VIEW
		$this->load->view("Com/Com-headadmin",$data);
		$this->load->view("Com/Com-menuadmin",$data);
		$this->load->view('SuratMasuk/SuratMasuk',$data);
		$this->load->view("Com/Com-footer",$data);
	}
	public function AddSuratMasuk()
	{
		$data['page'] = 52;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambah Surat Masuk ";
		$data['desc'] = " ";
		$data['amodel'] = $this->Amodel;

		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('SuratMasuk/AddSuratMasuk', $data);
		$this->load->view("Com/Com-footer", $data);
	}
	public function CaddSuratMasuk()
	{
		$now = time();
		$table = "suratmasuk";
		$error = "";
		$nama_session = $this->session->userdata('nama');
		$username_session = $this->session->userdata('username');
		$level_session = $this->session->userdata('level');
		$adminid = $this->session->userdata('id');

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($_FILES['filescan'])) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if(empty($pencatat) OR empty($tanggal) OR empty($notanggal) OR empty($dari) or empty($nokk) or empty($perihal)){
			$error = "Wajib mengisi seluruh field yang ada";
		}

		// process expired date
		list($day, $month, $year) = explode("/", $tanggal);
		#list($hh, $mm, $ss) = explode(":", $limitbayartime);
		if (!checkdate($month, $day, $year)) {
			$error .= "Tanggal Tidak valid";
		}
		$tanggal = mktime(0, 0, 0, $month, $day, $year);
		$tanggal2 = $year."-".$month."-".$day;


		if (empty($error)) {
			$pic = $_FILES['filescan']['name'];
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
				if (!$this->upload->do_upload('filescan')) {
					$error = $this->upload->display_errors();
					// menampilkan pesan error
				} else {
					$scanfile = $config['file_name'] . $this->upload->data('file_ext');
				}
			}
		}



		if (empty($error)) {
			$date = date("Y") . "-" . date("m") . "-" . date("d");
			$day = date("d");
			$month = date("m");
			$year = date("y");
			$now = time();





			$config['upload_path'] = "./assets/" . $table . "/" . $nowdir;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = $now . "-" . $table;
			$config['max_size'] = 10240; // 2MB

			$nextid = $this->Amodel->nextid("pNo", "pengambilansurat");
			$data = array(
				'smId' => '',
				'adminId' => $pencatat,
				'smTanggal' =>  $tanggal2,
				'smTanggalTimestamp' =>  $tanggal,
				'smNomorKK' =>  $nokk,
				'smNoTanggalSurat' =>  $notanggal,
				'smDari' =>  $dari,
				'smPerilhal' =>  $perihal,
				'smIsiDisposisi' =>  '',
				'smDir' => $nowdir,
				'smPic' => $scanfile,
				'smStatus' => 'new',
			);
			$this->Amodel->input($data, $table);
		} else {
			print $error;
		}
	}





}
