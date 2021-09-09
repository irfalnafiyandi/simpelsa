<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderControl extends CI_Controller
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
		$this->load->model('Amodel');
		#SESSION DATA
		$data['page'] = 53;
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
		$data['page'] = 53;
		$session_gid = $this->session->userdata('level');
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$keyword = $this->input->post('keyword');
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Order";
		$data['desc'] = "Halaman yang mengelola data Order";




		$data['amodel'] = $this->Amodel;
		$jumlah_data = $this->Amodel->jumlah_dataquery("sId", "supplier");
		//$data['query'] = $this->Amodel->queryselect("SELECT * FROM product p inner join category c on p.cId = c.cId inner join supplier s on s.sId = p.sId inner join satuan sp on   sp.spId = p.spId  ");
		$data['rows'] = $jumlah_data;

		$data['uac'] = $this->Amodel->CheckAkses($session_gid,$data['page']);





		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('Order/OrderData', $data);
		$this->load->view("Com/Com-footer", $data);
	}

	public function ExportOrder()
	{
		$data['page'] = 53;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT

		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Export Order ";
		$data['desc'] = " ";


		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('Order/ExportOrder', $data);
		$this->load->view("Com/Com-footer", $data);
	}
	public  function CexportOrder(){
		require_once APPPATH . 'libraries/PHPExcel.php';
		$now = time();
		$table = "order";
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




			$config['upload_path'] = './assets/excel/' . $nowdir . '/';
			if (!@opendir($config['upload_path'])) {
				mkdir("./assets/" . $folder . "/" . $nowdir);
			}
			$config["allowed_types"] ="*";
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
						$orderpcc = $row['B'];
						$tanggal = $row['C'];
						$code = $row['D'];
						$hargajual = $row['E'];
						$discount = $row['F'];
						$qty = $row['G'];
						$subtotal = $row['H'];

						$tanggal = explode("/",$tanggal);
						$product=   $this->Amodel->getval("pId,pName,pPriceBasic,pPrice", "product", "pCode='$code'");
						$profit = (($product[0]->pPrice - $product[0]->pPriceBasic) * $qty)-$discount ;
						$timestamp = mktime('0', '0', '0', $tanggal[1], $tanggal[0], $tanggal[2]);











						$data = array(
							'orderId' => '',
							'orderPCC' => $orderpcc == '' ? '' : $orderpcc,
							'orderDay' => $tanggal[0] == '' ? '' : $tanggal[0],
							'orderMonth' => $tanggal[1] == '' ? '' : $tanggal[1],
							'orderYear' => $tanggal[2] == '' ? '' : $tanggal[2],
							'orderTime' => '0',
							'orderTimestamp' => $timestamp == '' ? '' : $timestamp,
							'orderName' => '',
							'orderEmail' => '',
							'orderDiscount' => '',
							'orderTotal' => $subtotal == '' ? '' : $subtotal,
							'orderProfit' => $profit == '' ? '' : $profit,
							'orderStatus' => 'paid',
							'orderPaid' => '',
							'orderCompleted' => '',
							'orderDeleted' => '',
						);
						$orderid = $this->Amodel->input($data, 'orders');
						if($orderid){
							$data = array(
								'detailId' => '',
								'orderId' => $orderid == '' ? '' : $orderid,
								'pId' => $product[0]->pId == '' ? '' : $product[0]->pId,
								'pCode' => $code == '' ? '' : $code,
								'pName' => $product[0]->pName == '' ? '' : $product[0]->pName,
								'pPrice' => $hargajual == '' ? '' : $hargajual,
								'detailDiscount' => $discount == '' ? '' : $discount,
								'detailSubtotal' => $subtotal == '' ? '' : $subtotal,
								'detailQty' => $qty == '' ? '' : $qty,

							);
							$this->Amodel->input($data, 'ordersdetail');

						}

					}
					$no++;
				}

			}else{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}

		}

		#unlink(base_url().'/assets/excel/'.$nowdir.'/dataexcel.xlsx');
		$msg['oke'] = TRUE;


	}

	public function allorders(){
		$this->load->model('OrdersModel');
		$list = $this->OrdersModel->get_datatables();
		$data = array();
		$no = $_POST['start'];


		foreach ($list as $key => $value) {
			$items =  $this->Amodel->countdata("ordersdetail","orderId='$value->orderId'");




			$no++;
			$row = array();
			$row[] = '<div class="text-center ">'.$no.'</div>';
			$row[] = '<strong><div><a href="'.base_url()."OrderControl/Adddetail/".$value->orderId.'" data-toggle="tooltip" data-placement="top" title="Detail Invoice:'.$value->orderPCC.'">'.$value->orderPCC.'</a></div></strong><br><small><strong>Tanggal Pesan: </strong>'.date("d F Y",$value->orderTimestamp).'</small>';
			$row[] = '<div class="text-center ">'.$items.'</div>';

			$row[] = '<div class=" "><span class="label label-primary" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Total: '.number_format($value->orderTotal, 0, ',', '.').' ">Rp.'.number_format($value->orderTotal, 0, ',', '.').'</div>';
			$row[] = '<div class=" "><span class="label label-primary" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Total: '.number_format($value->orderProfit, 0, ',', '.').' ">Rp.'.number_format($value->orderProfit, 0, ',', '.').'</div>';

			if($value->orderStatus=="unpaid"){

				$row[] = '<span class="label label-warning" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Status Belum Selesai">Belum Selesai</span>';
			}elseif($value->orderStatus=="paid"){
				$row[] = '<span class="label label-success" style="font-size: small" data-toggle="tooltip" data-placement="top" title="Status  Selesai"> Selesai</span>';
			}



			$row[] = '<div class="text-center "><a href="'.base_url("/OrderControl/Adddetail/" . $value->orderId).'" toggle="tooltip" data-placement="top" class="btn btn-primary"><i class="fa fa-database"></i></a></a></div>';
//			$row[] = '<div class="text-center "><a href="javascript:if(window.confirm(Apakah anda yakin untuk hapus data ini?){validate_delete('.site_url() . "/OrderControl/CdeleteOrder/" . $value->orderId.','. site_url() . "/OrderControl/".')})" toggle="tooltip" data-placement="top" title=""  style="color:red "><i class="fa fa-trash"></i></a></div>';

			if($items == 0){
				$row[] = '<div class="text-center "><button onclick="deletedata('.$value->orderId.')" class="btn btn-danger" toggle="tooltip" data-placement="top" title=""  style="color:white "><i class="fa fa-trash"></i></button></div>';
			}else{
				$row[] = "-";

			}




			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->OrdersModel->count_all(),
			"recordsFiltered" => $this->OrdersModel->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		print json_encode($output);

	}

	public function AddOrder()
	{
		$data['page'] = 53;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambah Order ";
		$data['desc'] = " ";


		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('Order/AddOrder', $data);
		$this->load->view("Com/Com-footer", $data);
	}
	public function Adddetail()
	{
		$data['page'] = 53;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambahkan detail order ";
		$data['desc'] = "Halaman yang mengelolah data detail pada pesanan";
		$data['amodel'] = $this->Amodel;




		#VIEW
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('Order/DetailOrder', $data);
		$this->load->view("Com/Com-footer", $data);
	}
	public function Adddetailfancy()
	{
		$data['page'] = 53;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambahkan detail order ";
		$data['desc'] = "Halaman yang mengelolah data detail pada pesanan";

		$data['amodel'] = $this->Amodel;
		$data['query'] = $this->Amodel->queryselect("SELECT * FROM product p where p.pQty != 0  ");

		#VIEW
		$this->load->view("Com/Com-library", $data);
		$this->load->view('Order/AddDetailOrder', $data);
	}
	public function Editdetailfancy()
	{
		$data['page'] = 53;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$detailid = $this->uri->segment(4);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Tambahkan detail order ";
		$data['desc'] = "Halaman yang mengelolah data detail pada pesanan";

		$data['amodel'] = $this->Amodel;
		$data['query'] = $this->Amodel->queryselect("SELECT * FROM product p where p.pQty != 0  ");
		$data['query2'] = $this->Amodel->queryselect("SELECT * FROM ordersdetail od where od.detailId = '$detailid'  ");


		#VIEW
		$this->load->view("Com/Com-library", $data);
		$this->load->view('Order/EditDetailOrder', $data);
	}
	public  function getPrice(){
		$prodid = $this->uri->segment(3);
		$price = $this->Amodel->getval("pPrice", "product", "pId={$prodid}");

		$price = number_format($price, 0, ",", "");
		$value = htmlentities($price);
		print $value;
	}
	public function EditOrder()
	{
		$data['page'] = 53;
		$data['parentpage'] = $this->Amodel->getval("catId", "admin_menu", "menuId={$data['page']}");
		#DATA DEFAULT
		$id = $this->uri->segment(3);
		$data['projectname'] = $this->config->item('SITENAME_TITLE');
		$data['projectnamelitte'] = $this->config->item('SITENAME_TITLE_LITTLE');

		$data['title'] = "Edit Order ";
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
		$this->load->view("Com/Com-headadmin", $data);
		$this->load->view("Com/Com-menuadmin", $data);
		$this->load->view('Order/EditOrder', $data);
		$this->load->view("Com/Com-footer", $data);
	}
	public function getDetailProd(){
		$prodid = $this->uri->segment(3);
		$stock = $this->Amodel->getval("pQty", "product", "pId={$prodid}");

		$value = number_format($stock, 0, ",", "");

		print $value;
	}
	public function reloadTable(){
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$data['amodel'] = $this->Amodel;
		$this->load->view('Order/ReloadTable',$data);
	}
	public function getDetailProduct(){
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$data['amodel'] = $this->Amodel;
		$this->load->view('Order/getDetailProduct',$data);

	}
	public function CGenerateOrder(){

		if (empty($error)) {

			$nextid = $this->Amodel->nextid("orderId", "orders");
			$opcc = "INV-00" . $nextid;
			$now = time();
			$day = date('d');
			$month = date('m');
			$year = date('Y');
			$time = date("H:i");

			if (empty($error)) {
				$data = array(
					'mId' => '',
					'orderPCC' => $opcc,
					'orderDay' => $day,
					'orderMonth' => $month,
					'orderYear' => $year,
					'orderTime' => $time,
					'orderTimestamp' => $now,
					'orderName' => '',
					'orderEmail' => '',
					'orderDiscount' => '',
					'orderTotal' => '',
					'orderProfit' => '',
					'orderStatus' => 'unpaid',
					'orderPaid' => '',
					'orderCompleted' => 0,
					'orderDeleted' => 0,
				);
				$id = $this->Amodel->input($data, "orders");
				redirect('OrderControl/Adddetail/'.$id);
			} else {
				print $error;

			}

		} else {
			print $error;
		}
	}
	public function CaddDetailOrder()
	{
		$now = time();
		$table = "ordersdetail";
		$error = "";
		$diskon = "";


		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}


		$id = $this->uri->segment(3);
		$stock = $this->Amodel->getval("pQty,pName,pCode,pPriceBasic,pPrice", "product", "pId={$prodid}");


		$price = preg_replace("/[,|.]/", "", $price);
		$jumlah = preg_replace("/[,|.]/", "", $jumlah);

		if(!empty($diskon)){
			$diskon = preg_replace("/[,|.]/", "", $diskon);
		}else{
			$diskon = 0;
		}

		if (empty($prodid) or empty($id) or empty($price) or empty($jumlah) or empty($totalsub) ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if($jumlah == 0){
			$error =" Jumlah Tidak valid";
		}



		if ($stock[0]->pQty < $jumlah) {
			$error = "Stok tidak mencukupi";
		}

		$subtotalb = ($jumlah * $price) - $diskon ;
		$stockb = $stock[0]->pQty;
		$codeb = $stock[0]->pCode;
		$nameb = $stock[0]->pName;






		if (empty($error)) {

			if (empty($error)) {
				$data = array(
					'orderId' => $id,
					'pId' => $prodid,
					'pCode' => $codeb,
					'pName' => $nameb,
					'pPrice' => $price,
					'detailDiscount' => $diskon,
					'detailSubtotal' => $subtotalb,
					'detailQty' => $jumlah,
				);
				$orderid = $this->Amodel->input($data, $table);

				$this->Amodel->updateOrder($id);



			} else {
				print $error;
			}
		} else {
			print $error;
		}
	}
	public function CeditDetailOrder()
	{
		$now = time();
		$table = "ordersdetail";
		$error = "";
		$diskon = "";


		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}


		$id = $this->uri->segment(3);
		$detailid = $this->uri->segment(4);
		$stock = $this->Amodel->getval("pQty,pName,pCode,pPriceBasic,pPrice", "product", "pId={$prodid}");


		$price = preg_replace("/[,|.]/", "", $price);
		$jumlah = preg_replace("/[,|.]/", "", $jumlah);

		if(!empty($diskon)){
			$diskon = preg_replace("/[,|.]/", "", $diskon);
		}else{
			$diskon = 0;
		}

		if (empty($prodid) or empty($id) or empty($price) or empty($jumlah) or empty($totalsub) ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if($jumlah == 0){
			$error =" Jumlah Tidak valid";
		}




		if ($stock[0]->pQty < $jumlah) {
			$error = "Stok tidak mencukupi";
		}

		$subtotalb = ($jumlah * $price) - $diskon ;
		$stockb = $stock[0]->pQty;
		$codeb = $stock[0]->pCode;
		$nameb = $stock[0]->pName;

		$profit = (($stock[0]->pPrice - $stock[0]->pPriceBasic) * $jumlah) - $diskon ;




		if (empty($error)) {

			if (empty($error)) {
				$data = array(
					'orderId' => $id,
					'pId' => $prodid,
					'pCode' => $codeb,
					'pName' => $nameb,
					'pPrice' => $price,
					'detailDiscount' => $diskon,
					'detailSubtotal' => $subtotalb,
					'detailQty' => $jumlah,
				);
				$whereorder = array(
					'detailId' => $detailid,
				);
				$this->Amodel->Update("ordersdetail", $data, $whereorder);

				$this->Amodel->updateOrder($id);

			} else {
				print $error;
			}
		} else {
			print $error;
		}
	}
	public function CdoneOrder()
	{
		$now = time();
		$table = "ordersdetail";
		$error = "";
		$diskon = "";


		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}


		$id = $this->uri->segment(3);
		#$stock = $this->Amodel->getval("pQty,pName,pCode", "product", "pId={$prodid}");



		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$sql = "SELECT * FROM `ordersdetail` where orderId='$id' ";
		$dataquery = $this->Amodel->queryselect($sql);
		foreach ($dataquery as $keyquery => $valuequery){
			$prodid  = $valuequery->pId;
			$stockambil = $valuequery->detailQty;
			$getdata = $this->Amodel->getval("pQty,pName,pCode", "product", "pId={$prodid}");
			if($getdata[0]->pQty < $stockambil){
				$error = "Stok ".$getdata[0]->pName." tidak mencukupi";
			}
		}







		if (empty($error)) {

			if (empty($error)) {

				$dataorder = array(
					'orderStatus' => "paid",
					'orderPaid' => time(),
					'orderCompleted' => time(),
				);

				$whereorder = array(
					'orderId' => $id,
				);
				$this->Amodel->Update("orders", $dataorder, $whereorder);

				$sql = "SELECT * FROM `ordersdetail` where orderId='$id' ";
				$dataquery = $this->Amodel->queryselect($sql);
				foreach ($dataquery as $keyquery => $valuequery){
					$prodid  = $valuequery->pId;
					$stockambil = $valuequery->detailQty;
					$getdata = $this->Amodel->getval("pQty,pName,pCode", "product", "pId={$prodid}");
					$stocksisa = $getdata[0]->pQty - $stockambil;

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
		} else {
			print $error;
		}
	}
	public function CcancelOrder()
	{
		$now = time();
		$table = "ordersdetail";
		$error = "";
		$diskon = "";


		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		$id = $this->uri->segment(3);

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {

			if (empty($error)) {

				$dataorder = array(
					'orderStatus' => "unpaid",
					'orderPaid' => time(),
					'orderCompleted' => time(),
				);

				$whereorder = array(
					'orderId' => $id,
				);
				$this->Amodel->Update("orders", $dataorder, $whereorder);

				$sql = "SELECT * FROM `ordersdetail` where orderId='$id' ";
				$dataquery = $this->Amodel->queryselect($sql);
				foreach ($dataquery as $keyquery => $valuequery){
					$prodid  = $valuequery->pId;
					$stockambil = $valuequery->detailQty;
					$getdata = $this->Amodel->getval("pQty,pName,pCode", "product", "pId={$prodid}");
					$stocksisa = $getdata[0]->pQty + $stockambil;

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
		} else {
			print $error;
		}
	}

	public function CdeleteDetailOrder()
	{
		$now = time();
		$table = "ordersdetail";
		$error = "";
		$orderid=array();

		 $id = $this->uri->segment(3);
		 $orderid = $this->uri->segment(4);


		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if (empty($error)) {
			$where = array(
				'detailId' => $id,
			);
			 $this->Amodel->delete($table, $where);
				$this->Amodel->updateOrder($orderid);










		} else {
			print $error;
		}


	}
	public function cCetakOrder()
	{

		$this->load->library('Pdf');
		$customPaper = array( 0 , 0 , 228.77 , 1080 );
		$this->pdf->set_paper($customPaper,'potrait');
		//$this->pdf->setPaper('F4', 'potrait');

		$this->pdf->filename = "Struk.pdf";
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$data['amodel'] = $this->Amodel;



		$this->pdf->load_view('Order/CetakStruk',$data);

	}
	public function cCetakOrder2()
	{
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$data['amodel'] = $this->Amodel;
		$this->load->view('Order/CetakStruk',$data);

	}


	public function CaddOrder()
	{
		$now = time();
		$table = "product";
		$error = "";


		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}
		$modal = preg_replace("/[,|.]/", "", $modal);
		$jual = preg_replace("/[,|.]/", "", $jual);

		if (empty($name) or empty($category) or empty($supplier) or empty($satuan) or empty($code) or empty($name) or empty($modal) or empty($jual) or empty($qty)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if ($modal > $jual) {
			$error = "Modal Tidak boleh lebih besar dari pada harga jual";
		}

		$where = array('pCode' => $code);
		$checkduplicate = $this->Amodel->jumlahdata_query($table, $where);

		if ($checkduplicate > 0) {
			$error = "Kode Product Telah digunakan";
		}

		if ($qty < 0) {
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
			} else {
				print $error;

			}


		} else {
			print $error;
		}
	}
	public function CeditOrder()
	{
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

		if (empty($name) or empty($category) or empty($supplier) or empty($satuan) or empty($code) or empty($name) or empty($modal) or empty($jual) or empty($qty)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		if ($modal > $jual) {
			$error = "Modal Tidak boleh lebih besar dari pada harga jual";
		}

		if ($qty < 0) {
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
			} else {
				print $error;
			}


		} else {
			print $error;
		}
	}
	public function CdeleteOrder()
	{
		$now = time();
		$table = "orders";
		$error = "";

		 $id = $this->uri->segment(3);

		if (empty($id)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$countdata = $this->Amodel->countdata("ordersdetail", "orderId='$id'");
		if($countdata > 0){
			$error = "Order ini masih memiliki beberapa detail pesanan, silahkan hapus detail terlebih dahulu";
		}

		if (empty($error)) {
			$where = array(
				'orderId' => $id,
			);
			$this->Amodel->delete($table, $where);

		} else {
			print $error;
		}


	}


}
