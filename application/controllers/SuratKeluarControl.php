<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/PHPExcel.php';

class SuratKeluarControl extends CI_Controller
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

//level name
//1 : Web Developer
//2 : Super Administrator
//6 : Sekretaris
//10 : Kepala Cabang
//8 : Kabid
//9 : Staff


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Amodel');
		#SESSION DATA
		$nama_session = $this->session->userdata('nama');
		$username_session = $this->session->userdata('username');
		$level_session = $this->session->userdata('level');
		$from = $this->uri->segment(2);
		if (!empty($from)) {
			$nama_session = $this->session->userdata('nama');
			if (empty($nama_session)) {
				redirect('Acontrol/logout');
			}
		}
		if ($from == "index") {
			$nama_session = $this->session->userdata('nama');
			if (empty($nama_session)) {
				redirect('Acontrol/logout');
			}
		}
	}

	public function PengambilanSuratKeluar()
	{
		$data['page'] = 50;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Pengambilan Surat Keluar";
		$data['desc'] = "Halaman yang mengelola data surat keluar";

		$level = $this->session->userdata('level');

		$jumlah_data = $this->Amodel->jumlah_dataquery("psId", "pengambilansurat");
		//level name
		//1 : Web Developer
		//2 : Super Administrator
		//6 : Sekretaris
		//10 : Kepala Cabang
		//8 : Kabid
		//9 : Staff

		//bidang

		$data['query'] = $this->Amodel->queryselect("SELECT * FROM pengambilansurat p  INNER JOIN kodeklasifikasi k ON p.KodeId = k.KodeId INNER JOIN suratkeluar s ON s.SId  = p.SId INNER JOIN admin a on p.adminId = a.adminId INNER JOIN bidang b on b.bId = a.bId ORDER by p.pNo DESC");
		$data['rows'] = $jumlah_data;
		$data['level'] = $level;

		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('Pengambilan/Suratkeluar', $data);
		$this->load->view("Com/Com-footer", $data);
	}

	public function AddSuratKeluar()
	{
		$data['page'] = 50;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Pengambilan No Surat Keluar ";
		$data['desc'] = " ";
		$data['amodel'] = $this->Amodel;

		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('Pengambilan/AddSuratKeluar', $data);
		$this->load->view("Com/Com-footer", $data);
	}

	public function AddSuratKeluarImport()
	{
		$data['page'] = 50;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Pengambilan No Surat Keluar ";
		$data['desc'] = " ";
		$data['amodel'] = $this->Amodel;

		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('Pengambilan/AddSuratKeluarImport', $data);
		$this->load->view("Com/Com-footer", $data);
	}

	public function EditSuratKeluar()
	{
		$data['page'] = 50;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
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
		$data['query2'] = $this->Amodel->Detail_query("suratkeluar", $where);

		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('MasterSuratKeluar/EditSuratKeluar', $data);
		$this->load->view("Com/Com-footer", $data);
	}


	//ADMIN GROUP
	public function CaddSuratKeluar()
	{
		$now = time();
		$table = "pengambilansurat";
		$error = "";
		$nama_session = $this->session->userdata('nama');
		$username_session = $this->session->userdata('username');
		$level_session = $this->session->userdata('level');
		$adminid = $this->session->userdata('id');

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($jenis) Or empty($tujuan) Or empty($surat) or empty($kodeklasifikasi) or empty($perihal)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}


		if (empty($tembusan)) {
			$tembusan = "";
		}


		if (empty($error)) {

			$date = date("Y") . "-" . date("m") . "-" . date("d");
			$day = date("d");
			$month = date("m");
			$year = date("y");
			$now = time();
			$nextid = $this->Amodel->nextid("pNo", "pengambilansurat");
			$data = array(

				'KodeId' => $kodeklasifikasi,
				'SId' => $surat,
				'adminId' => $adminid,
				'pNo' => $nextid,
				'pDay' => $day,
				'pMonth' => $month,
				'pYear' => $year,
				'pTimestampGet' => $now,
				'pDate' => $date,
				'pTujuan' => $tujuan,
				'pPerihal' => $perihal,
				'pTembusan' => $tembusan,
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

		print $surat;
		exit;

		if (empty($name) or empty($id) or empty($jenis)) {
			$error = "Lengkapi data yang diperlukan";
		}

		if (empty($error)) {
			$data = array(
				'sName' => $name,
				'sType' => $jenis,
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

	//ADMIN GROUP
	public function Caddfromjenis()
	{
		$now = time();
		$table = "suratkeluar";
		$error = "";
		#DATA DEFAULT
		$jenis = $this->uri->segment(3);
		$data = $this->Amodel->dataquery("suratkeluar");
		?>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				var config = {
					'.chosen-select': {},
					'.chosen-select-deselect': {allow_single_deselect: true},
					'.chosen-select-rtl': {rtl: true},
					'.chosen-select-width': {width: '95%'}
				}
				for (var selector in config) {
					$(selector).chosen(config[selector]);
				}
			});
		</script>
		<div class="form-group">
			<label>Surat Keluar:</label>
			<select class="form-control chosen-select" name="surat" id="surat" onchange="formSuratkeluar()">
				<option value="">Pilih Jenis Surat Keluar</option>
				<?php
				$data = $this->Amodel->queryselect("SELECT * FROM suratkeluar s where s.sType='$jenis'");
				//				$sql = "SELECT * FROM kodeklasifikasi ORDER BY kKodeKlasifikasi ASC";
				//				$query =  $amodel->queryselect($sql);
				foreach ($data as $key => $value) {
					?>
					<option value="<?php print $value->SId ?>" ><?php print $value->sName ?>    </option><?php
				} ?>
			</select>
		</div>


		<?php

	}

	//ADMIN GROUP
	public function Cgetkodeklasifikasi()
	{
		$now = time();
		$table = "suratkeluar";
		$error = "";
		#DATA DEFAULT
		$jenis = $this->uri->segment(3);
		//$data = $this->Amodel->dataquery("kodeklasifikasi");
		?>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				var config = {
					'.chosen-select': {},
					'.chosen-select-deselect': {allow_single_deselect: true},
					'.chosen-select-rtl': {rtl: true},
					'.chosen-select-width': {width: '95%'}
				}
				for (var selector in config) {
					$(selector).chosen(config[selector]);
				}
			});
		</script>
		<div class="form-group">
			<label>Kode Klasifikasi:</label>
			<select class="form-control chosen-select" name="kodeklasifikasi" id="kodeklasifikasi"
					onchange="formKodeKlasifikasi()">
				<option value="">Pilih Kode Klasifikasi</option>
				<?php
				$data = $this->Amodel->queryselect("SELECT * FROM kodeklasifikasi  ");
				//				$sql = "SELECT * FROM kodeklasifikasi ORDER BY kKodeKlasifikasi ASC";
				//				$query =  $amodel->queryselect($sql);
				foreach ($data as $key => $value) {
					?>
					<option
					value="<?php print $value->KodeId ?>" ><?php print $value->kKodeKlasifikasi ?>    </option><?php
				} ?>
			</select>
		</div>


		<?php

	}

	function CaddSuratKeluarImport()
	{

		if (isset($_FILES['xlsapk'])) {
			$this->load->library('upload');
			$error = "";
			$kodeklasifikasi = "";
			$kodeid = "";
			$surat = "";
			$tujuan = "";
			$perihal = "";
			$tembusan = "";
			$folder = "excel";
			$nowdir = date('dmY');
			$nmfile = time();


			$config['upload_path'] = './assets/excel/' . $nowdir . '/';
			if (!@opendir($config['upload_path'])) {
				mkdir("./assets/" . $folder . "/" . $nowdir);
			}
			$config['allowed_types'] = 'xlsx';
			$config['max_size'] = 1024 * 20;
			$config['file_name'] = $nmfile . 'dataexcel.xlsx';
			$this->upload->initialize($config);

			if ($this->upload->do_upload('xlsapk')) {
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('assets/excel/' . $nowdir . '/' . $nmfile . 'dataexcel.xlsx');
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
				$no = 1;
				foreach ($sheet as $row) {
					//GET DATA SURAT
					if ($no > 1) {
						 $surat = $row['B'];

						if (empty($surat)) {
							$error .= "<li> Jenis Surat tidak boleh kosong</li>";
						} else {

							$suratarray = $this->Amodel->getval("SId", "suratkeluar", "sName='$surat'");
							if (empty($kodeid)) {
								$error .= "<li> Kode Klasifikasi Tidak ditemukan</li>";
							}
						}
						print $suratarray;
						exit;
						//GET DATA KODE KLASIFIKASI
						$kodeklasifikasi = $row['B'];
						if (empty($kodeklasifikasi)) {
							$error .= "<li> Kode ID tidak boleh kosong</li>";
						} else {
							$kodeid = $this->Amodel->getval("KodeId,", "kodeklasifikasi", "kKodeKlasifikasi={$kodeklasifikasi}");
							if (empty($kodeid)) {
								$error .= "<li> Kode Klasifikasi Tidak ditemukan</li>";
							}
						}
						//GET DATA Tujuan
						$tujuan = $row['C'];
						if (empty($tembusan)) {
							$error .= "<li> Tujuan tidak boleh kosong</li>";
						}
						$perihal = $row['D'];
						if (empty($perihal)) {
							$error .= "<li> Perihal tidak boleh kosong</li>";
						}
						//GET DATA TEMBUSAN
						$tembusan = $row['E'];
						if (empty($tembusan)) {
							$error .= "<li> Tembusan tidak boleh kosong</li>";
						}
						$nextid = $this->Amodel->nextid("pNo", "pengambilansurat");
						$data = array(
							'KodeId' => $kodeid,
							'SId' => $suratarray == '' ? '' : $suratarray,
							'adminId' => $adminid == '' ? '' : $adminid,
							'pNo' => $nextid == '' ? '' : $nextid,
							'pDay' => $day == '' ? '' : $day,
							'pMonth' => $month == '' ? '' : $month,
							'pYear' => $year == '' ? '' : $year,
							'pTimestampGet' => $now == '' ? '' : $now,
							'pDate' => $date == '' ? '' : $date,
							'pTujuan' => $tujuan == '' ? '' : $tujuan,
							'pError' => $error == '' ? '' : $error,
						);
						$insert_rekon = $this->Amodel->input($data, 'pengambilansuratimport');

					}
					$no++;
				}

			}

		}

		#unlink(base_url().'/assets/excel/'.$nowdir.'/dataexcel.xlsx');
		$msg['oke'] = TRUE;

	}





}
