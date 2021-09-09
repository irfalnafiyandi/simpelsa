<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductControl extends CI_Controller
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
		$data['page'] = 54;
		$this->load->model('Amodel');
		#SESSION DATA
		$session_gid = $this->session->userdata('level');
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

		$this->Amodel->CheckAkses($session_gid,$data['page']);


	}

	public function Index()
	{
		$data['page'] = 54;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Product";
		$data['desc'] = "Halaman yang mengelola data product";

		$level = $this->session->userdata('level');

		$data['amodel'] = $this->Amodel;
		$jumlah_data = $this->Amodel->jumlah_dataquery("sId", "supplier");
		$data['query'] = $this->Amodel->queryselect("SELECT * FROM product p inner join category c on p.cId = c.cId inner join supplier s on s.sId = p.sId inner join satuan sp on   sp.spId = p.spId ORDER BY pCode ASC ");
		$data['rows'] = count($data['query']);
		$data['level'] = $level;

		$session_gid = $this->session->userdata('level');
		$data['uac'] = $this->Amodel->CheckAkses($session_gid,$data['page']);



		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('Product/ProductData', $data);
		$this->load->view("Com/Com-footer", $data);
	}

	public function allproduct(){
		$this->load->model('ProductModel');
		$list = $this->ProductModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key => $value) {
			$tit = '{"afterClose" : "function () {reloadTable();}"';

			if(($value->pPic)){
				$foto = base_url('assets/image/product/'.$value->pDir.'/'.$value->pPic);
				$url =  base_url('assets/image/product/'.$value->pDir.'/'.$value->pPic);

			}else{
				$foto = base_url('assets/image/no-image2.png');
				$url =  base_url('assets/image/no-image.png');
			}

			$no++;
			$row = array();
			$row[] = '<div class="text-center ">'.$no.'</div>';

			$row[] = '
<div class="row">
<div class="col-md-2">
<a data-fancybox="gallery" 
href="'.$url.'">
<img src="'.$foto.'"
class="img-responsive" style="width: 100px;"
onerror="this.onerror=null; this.src="'.base_url() .' "assets/image/no-image.png"></a>
</div>
<div class="col-md-10">
<a href="'.base_url("productControl/").'/detailProduct/'.$value->pId.'" data-fancybox data-type="iframe"><strong>'.$value->pCode.'</strong>-'.$value->pName.'<br></a>
<small><b>Kategori: </b></small>  <span class="label label-warning" data-toggle="tooltip" data-placement="top" title="Kategori:'.$value->cName.' ">'.$value->cName.'</span><br>
<small><b>Supplier: </b></small>  <span class="label label-info" data-toggle="tooltip" data-placement="top" title="Supplier: '.$value->sName.' ">'.$value->sName.'</span>
</div>
</div>';
			$row[] = '<div ><small ><b>Harga Modal: </b></small>  <span class="label label-primary" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Harga Modal: Rp"'.number_format($value->pPriceBasic, 0, ',', '.').' "> Rp'.number_format($value->pPriceBasic, 0, ',', '.').' </span> </div><br>
<small><b>Harga Jual:&nbsp;&nbsp;&nbsp;&nbsp; </b></small>  <span class="label label-success" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Harga Jual:  Rp.'.number_format($value->pPrice, 0, ',', '.').'">Rp'.number_format($value->pPrice, 0, ',', '.').'</span> <br/>';

			$row[] = '<span class="label label-default" data-toggle="tooltip" data-placement="top" title="Sisa Stok Barang: '.$value->pQty." ".$value->spName.'" > '.$value->pQty." <b>".$value->spName.' </b></span>';


			$row[] = '<div class="text-center "><a href="'.base_url("/ProductControl/EditProduct/" . $value->pId).'" toggle="tooltip" data-placement="top" class="btn btn-primary"  title="" data-fancybox data-type="iframe" date-option="'.$tit.'" href="javascript:;"><i class="fa fa-pencil-square"></i></a></div>';

//			$row[] = '<div class="text-center "><a href="javascript:if(window.confirm(Apakah anda yakin untuk hapus data ini?){validate_delete('.site_url() . "/ProductControl/CdeleteProduct/" . $value->pId.','. site_url() . "/ProductControl/".')})" toggle="tooltip" data-placement="top" title=""  style="color:red "><i class="fa fa-trash"></i></a></div>';

			$row[] = '<div class="text-center "><button onclick="deletedata('.$value->pId.')" class="btn btn-danger" toggle="tooltip" data-placement="top" title=""  style="color:white "><i class="fa fa-trash"></i></button></div>';



			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ProductModel->count_all(),
			"recordsFiltered" => $this->ProductModel->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}
	public function ExportProduct()
	{
		$data['page'] = 54;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Export Product ";
		$data['desc'] = " ";
		$data['query'] = $this->Amodel->dataquery("category");
		$data['query2'] = $this->Amodel->dataquery("supplier");
		$data['query3'] = $this->Amodel->dataquery("satuan");

		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('Product/ExportProduct', $data);
		$this->load->view("Com/Com-footer", $data);
	}

	public function AddProduct()
	{
		$data['page'] = 54;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambah Product ";
		$data['desc'] = " ";
		$data['query'] = $this->Amodel->dataquery("category");
		$data['query2'] = $this->Amodel->dataquery("supplier");
		$data['query3'] = $this->Amodel->dataquery("satuan");

		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('Product/AddProduct', $data);
		$this->load->view("Com/Com-footer", $data);
	}


	public function EditProduct()
	{
		$data['page'] = 54;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit Product ";
		$data['desc'] = " ";
		$where = array(
			'pId' => $id,
		);
		$data['amodel'] = $this->Amodel;
		$data['queryedit'] = $this->Amodel->Detail_query("product", $where);
		$data['query'] = $this->Amodel->dataquery("category");
		$data['query2'] = $this->Amodel->dataquery("supplier");
		$data['query3'] = $this->Amodel->dataquery("satuan");

		#VIEW
		#$this->load->view("Com/Com-headadmin", $data);
		#$this->load->view("Com/Com-menuadmin", $data);
		#VIEW
		$this->load->view("Com/Com-library", $data);
		$this->load->view('Product/EditProduct', $data);
		#$this->load->view("Com/Com-footer", $data);
	}
	public function detailProduct()
	{
		$data['page'] = 54;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Detail Product ";
		$data['desc'] = " ";
		$data['amodel'] = $this->Amodel;

		$data['query'] = $this->Amodel->queryselect("SELECT * FROM historystock s inner join product p on p.pId = s.pId inner join satuan sp on p.spId = sp.spId inner join admin a on a.adminId = s.adminId WHERE p.pId='$id'");
		$data['detail'] = $this->Amodel->queryselect("SELECT * FROM product p inner join supplier s on p.sId = s.sId inner join satuan sp on p.spId = sp.spId inner join category c on c.cId = p.cId WHERE p.pId='$id'");


		#VIEW
		$this->load->view("Com/Com-library", $data);


		$this->load->view('Product/DetailProduct', $data);

	}



	public function CaddProduct()
	{
		$now = time();
		$table = "product";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}
		$modal = preg_replace("/[,|.]/", "", $modal);
		$jual = preg_replace("/[,|.]/", "", $jual);

		if (empty($name) or empty($category) or empty($supplier) or empty($satuan) or empty($code) or empty($name) or empty($modal)  or empty($jual)  or empty($qty) ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if($modal > $jual){
			$error = "Modal Tidak boleh lebih besar dari pada harga jual";
		}

		$where = array('pCode' => $code);
		$checkduplicate = $this->Amodel->jumlahdata_query($table, $where);

		if ($checkduplicate > 0) {
			$error = "Kode Product Telah digunakan";
		}

		if($qty < 0){
			$error = "Stok tidak boleh lebih kecil dari 0";
		}

		$dirpic = '';
		$imgfilename = '';

		$pic = $_FILES['pic']['name'];

		if (empty($error)) {

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
				if (!$this->upload->do_upload('pic')) {
					$error = $this->upload->display_errors();
					// menampilkan pesan error
				} else {
					$filepic = $config['file_name'] . $this->upload->data('file_ext');
				}
			}

			if (empty($error)) {
				$data = array(
					'cId' => $category,
					'sId' => $supplier,
					'spId' => $satuan,
					'pCode' => $code,
					'pName' => $name,
					'pPriceBasic' => $modal,
					'pPrice' => $jual,
					'pQty' => $qty,
				);
				if ($pic) {
					$data['pDir'] = $nowdir;
					$data['pPic'] = $filepic;
				}
				$this->Amodel->input($data, $table);
			}else{
				print $error;

			}


		} else {
			print $error;
		}
	}

	public  function CexportProduct(){
		require_once APPPATH . 'libraries/PHPExcel.php';
		$now = time();
		$error = "";



		if (isset($_FILES['excel'])) {
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



			$this->db->truncate('product');


			$config['upload_path'] = './assets/excel/' . $nowdir . '/';
			if (!@opendir($config['upload_path'])) {
				mkdir("./assets/" . $folder . "/" . $nowdir);
			}
			$config['allowed_types'] = 'xlsx';
			$config['max_size'] = 1024 * 20;
			$config['file_name'] = $nmfile . 'dataexcel.xlsx';
			$this->upload->initialize($config);

			if ($this->upload->do_upload('excel')) {
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('assets/excel/' . $nowdir . '/' . $nmfile . 'dataexcel.xlsx');
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
				$no = 1;

				foreach ($sheet as $row) {
					//GET DATA SURAT
					if ($no > 1) {
						$cid = $row['C'];
						$sid = $row['E'];
						$nama = $row['F'];
						$code = $row['G'];
						$stock = $row['I'];
						$basic = $row['K'];
						$price = $row['M'];






						$data = array(
							'pId' => '',
							'cId' => $cid == '' ? '' : $cid,
							'sId' => $sid == '' ? '' : $sid,
							'spId' => '3',
							'pCode' => $code == '' ? '' : $code,
							'pName' => $nama == '' ? '' : $nama,
							'pPriceBasic' => $basic == '' ? '' : $basic,
							'pPrice' => $price == '' ? '' : $price,
							'pQty' => $stock == '' ? '' : $stock,
							'pDir' => '',
							'pPic' => '',
						);
						$this->Amodel->input($data, 'product');

					}
					$no++;
				}

			}

		}

		#unlink(base_url().'/assets/excel/'.$nowdir.'/dataexcel.xlsx');
		$msg['oke'] = TRUE;


	}


	public function CeditProduct(){
		$now = time();
		$table = "product";
		$error = "";
		$id = $this->uri->segment(3);

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		$modal = preg_replace("/[,|.]/", "", $modal);
		$jual = preg_replace("/[,|.]/", "", $jual);

		if (empty($name) or empty($id)) {
			$error = "Lengkapi data yang diperlukan";
		}

		if (empty($name) or empty($category) or empty($supplier) or empty($satuan) or empty($code) or empty($name) or empty($modal)  or empty($jual)  or empty($qty) ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if($modal > $jual){
			$error = "Modal Tidak boleh lebih besar dari pada harga jual";
		}

		if($qty < 0){
			$error = "Stok tidak boleh lebih kecil dari 0";
		}

		$where = array('pCode' => $code);

		$checkduplicate = $this->Amodel->countdata($table, "pCode='$code' AND pId != $id");

		if ($checkduplicate > 0) {
			$error = "Kode Product telah digunakan";
		}

		$dirpic = '';
		$imgfilename = '';

		$pic = $_FILES['pic']['name'];


		if (empty($error)) {

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
				if (!$this->upload->do_upload('pic')) {
					$error = $this->upload->display_errors();
					// menampilkan pesan error
				} else {
					$filepic = $config['file_name'] . $this->upload->data('file_ext');
				}
			}

			if (empty($error)) {
				$data = array(
					'cId' => $category,
					'sId' => $supplier,
					'spId' => $satuan,
					'pCode' => $code,
					'pName' => $name,
					'pPriceBasic' => $modal,
					'pPrice' => $jual,
					'pQty' => $qty,
				);
				if ($pic) {
					$data['pDir'] = $nowdir;
					$data['pPic'] = $filepic;
				}
				$where = array(
					'pId' => $id,
				);
				$this->Amodel->Update($table, $data, $where);
			}else{
				print $error;
			}






		} else {
			print $error;
		}
	}

	public function CdeleteProduct()
	{
		$now = time();
		$table = "product";
		$error = "";

		$id = $this->uri->segment(3);

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {
			$where = array(
				'pId' => $id,
			);
			$this->Amodel->delete($table, $where);

		} else {
			print $error;
		}


	}


}
