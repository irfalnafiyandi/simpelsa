<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
		$this->load->helper('string');
		$this->load->helper('menu_helper');
		#SESSION DATA
		$this->id = $this->session->userdata('id');
		$this->nama = $this->session->userdata('nama');
		$this->email = $this->session->userdata('email');
		$this->checkpoint = $this->session->userdata('checkpoint');

	}
	public function index()
    {


		$data['title'] = "Home";
		$data['session'] = $this->session;
		$queryproses = "SELECT l.id_laporan From laporan_sampah l  inner join pelapor p  on p.id_pelapor = l.id_pelapor where l.status_laporan='p' ";
		$queryselesai = "SELECT l.id_laporan From laporan_sampah l  inner join pelapor p  on p.id_pelapor = l.id_pelapor where l.status_laporan='y' ";


		$data['semualaporan'] = $this->db->query('SELECT l.id_laporan From laporan_sampah l  inner join pelapor p  on p.id_pelapor = l.id_pelapor ')->num_rows();
		$data['laporanproses'] = $this->db->query($queryproses)->num_rows();
		$data['laporanselesai'] = $this->db->query($queryselesai)->num_rows();


		#$data['']
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/index',$data);
    }
	public function forgetpassword()
	{

		$data['title'] = "Lupa Password";
		$data['session'] = $this->session;


		#$data['']
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/forgetpassword',$data);
	}
	public function forgetpasswordproses()
	{
		$now = time();
		$table = "pelapor";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($email)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$where = array(
			'email_pelapor' => $email,
			'statusemail_pelapor'=>'y',
		);

		$user = $this->Amodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php

		if (empty($user->email_pelapor)) {
			$error = "Email Tidak Ditemukan";
		}


		if (empty($error)) {




			$code= random_string('alnum','32');
			$where = array(
				'email_pelapor' => $email,
			);
			$data = array(
				'emailcode_pelapor' => $code,
			);
			$this->Amodel->Update($table, $data, $where);

			$to                 = $email;
			$subject            = "Reset Password";

			$message =  '<!doctype html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><title>Hello world </title><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><style type="text/css">#outlook a{padding: 0;}body{margin: 0;padding: 0;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;}table,td{border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;}img{border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;}p{display: block;margin: 13px 0;}</style><!--[if mso]><noscript><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml></noscript><![endif]--><!--[if lte mso 11]><style type="text/css">.mj-outlook-group-fix{width: 100% !important;}</style><![endif]--><link href="https://fonts.googleapis.com/css?family=Roboto:300,500" rel="stylesheet" type="text/css"><style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:300,500);</style><style type="text/css">@media only screen and (min-width: 480px){.mj-column-per-60{width: 60% !important;max-width: 60%;}.mj-column-per-40{width: 40% !important;max-width: 40%;}.mj-column-per-100{width: 100% !important;max-width: 100%;}.mj-column-per-45{width: 45% !important;max-width: 45%;}}</style><style media="screen and (min-width:480px)">.moz-text-html .mj-column-per-60{width: 60% !important;max-width: 60%;}.moz-text-html .mj-column-per-40{width: 40% !important;max-width: 40%;}.moz-text-html .mj-column-per-100{width: 100% !important;max-width: 100%;}.moz-text-html .mj-column-per-45{width: 45% !important;max-width: 45%;}</style><style type="text/css">@media only screen and (max-width: 480px){table.mj-full-width-mobile{width: 100% !important;}td.mj-full-width-mobile{width: auto !important;}}</style></head><body style="word-spacing:normal;"><div style=""><!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]--><div style="margin:0px auto;max-width:600px;"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"><tbody><tr><td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;"><!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:360px;"><![endif]--><div class="mj-column-per-60 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody></tbody></table></div><!--[if mso | IE]></td><td class="" style="vertical-align:top;width:240px;"><![endif]--><div class="mj-column-per-40 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody></tbody></table></div></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]--><div style="margin:0px auto;max-width:600px;"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"><tbody><tr><td style="direction:ltr;font-size:0px;padding:0px;text-align:center;"><!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;"><![endif]--><div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody><tr><td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;"><tbody><tr><td style="width:550px;"><a href="https://recast.ai?ref=newsletter" target="_blank"><img height="auto" src="https://cdn.recast.ai/newsletter/city-01.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="550"/></a></td></tr></tbody></table></td></tr></tbody></table></div></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]--><div style="margin:0px auto;max-width:600px;"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"><tbody><tr><td style="direction:ltr;font-size:0px;padding:0px;text-align:center;"><!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:270px;"><![endif]--><div class="mj-column-per-45 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody><tr><td align="center" style="font-size:0px;padding:0px;word-break:break-word;"><div style="font-family:Roboto, Helvetica, sans-serif;font-size:18px;font-weight:500;line-height:24px;text-align:center;color:#616161;">Reset Password</div></td></tr><tr><td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;"><p style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:100%;"></p><!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:220px;" role="presentation" width="220px" ><tr><td style="height:0;line-height:0;"> &nbsp;</td></tr></table><![endif]--></td></tr><tr><td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;"><p style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:45%;"></p><!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:99px;" role="presentation" width="99px" ><tr><td style="height:0;line-height:0;"> &nbsp;</td></tr></table><![endif]--></td></tr></tbody></table></div></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]--><div style="margin:0px auto;max-width:600px;"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"><tbody><tr><td style="direction:ltr;font-size:0px;padding:0px;padding-top:30px;text-align:center;"><!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;"><![endif]--><div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody><tr><td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;"><div style="font-family:Roboto, Helvetica, sans-serif;font-size:16px;font-weight:300;line-height:24px;text-align:left;color:#616161;"><p>Hallo {NAMA}!</p><p>    </p><p>Klik Tombol Dibawah ini untuk lakukan Reset Password </p></div></td></tr><tr><td align="center" vertical-align="middle"style="font-size:0px;padding:10px 25px;word-break:break-word;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;"><tr><td align="center" bgcolor="#f45e43" role="presentation"style="border:none;border-radius:3px;cursor:auto;mso-padding-alt:10px 25px;background:#f45e43;"valign="middle"><a href="{LINK}" style="display:inline-block;background:#f45e43;color:white;font-family:Helvetica;font-size:13px;font-weight:normal;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;mso-padding-alt:0px;border-radius:3px;" target="_blank"> Ganti Sekarang ! </a></td></tr></table></td></tr></tbody></table></div></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]--><div style="margin:0px auto;max-width:600px;"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"><tbody><tr><td style="direction:ltr;font-size:0px;padding:0px;text-align:center;"><!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;"><![endif]--><div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody><tr><td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;"><p style="border-top:solid 1px #E0E0E0;font-size:1px;margin:0px auto;width:100%;"></p><!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 1px #E0E0E0;font-size:1px;margin:0px auto;width:550px;" role="presentation" width="550px" ><tr><td style="height:0;line-height:0;"> &nbsp;</td></tr></table><![endif]--></td></tr></tbody></table></div></td></tr></tbody></table></div></div></body></html>';
			#


			$message = str_replace('{NAMA}',$user->nama_pelapor,$message);
			$message = str_replace('{LINK}',base_url('password/'.$user->id_pelapor.'/'.$code),$message);




			$mail = new PHPMailer(true);
			$mail->isSMTP();
			#$mail->SMTPDebug = SMTP::DEBUG_SERVER;

			$mail->Host       = 'smtp.googlemail.com';
			$mail->SMTPAuth   = true;
			$mail->Username   = 'applesaorg@gmail.com'; // ubah dengan alamat email Anda
			$mail->Password   = 'qht3uA2q5Xzz5FA'; // ubah dengan password email Anda
			$mail->SMTPSecure = 'ssl';
			$mail->Port       = 465;

			$mail->setFrom('applesaorg@gmail.com', 'APPELSA'); // ubah dengan alamat email Anda
			$mail->addAddress($to);
			$mail->addReplyTo('applesaorg@gmail.com', 'APPELSA'); // ubah dengan alamat email Anda

			// Isi Email
			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body    = $message;

			$mail->send();


			print "ok";
		} else {
			print $error;
		}
	}
	public function forgetpasswordsukses()
	{
		$data['title'] = "Reset Password";
		$data['session'] = $this->session;
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/suksesforgetpassword',$data);
	}
	public function resetpassword($id,$code)
	{

		$data['title'] = "Reset Password";
		$data['session'] = $this->session;
		$data['code'] = $code;
		$table='pelapor';



		$where = array(
			'emailcode_pelapor' => $code,
			'id_pelapor' => $id,
		);

		$user = $this->Amodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php
		if(empty($user)){
			#$data['']
			#VIEW
			$this->load->view('webcom/com-head',$data);
			$this->load->view('webcom/com-nav',$data);
			$this->load->view('home/resetpasswordgagal',$data);

		}else{
			#$data['']
			#VIEW
			$this->load->view('webcom/com-head',$data);
			$this->load->view('webcom/com-nav',$data);
			$this->load->view('home/resetpassword',$data);

		}



	}
	public function resetpasswordproses()
	{
		$now = time();
		$table = "pelapor";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($password) OR empty($password2)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$where = array(
			'emailcode_pelapor' => $code,
		);

		$user = $this->Amodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php

		if (empty($user)) {
			$error = "Data Tidak Ditemukan";
		}
		if($password != $password2){
			$error = "Password Tidak Cocok";
		}


		if (empty($error)) {
			$password = sha1($password . $this->config->item('CMS_SALT_STRING'));



			$where = array(
				'emailcode_pelapor' => $code,
			);
			$data = array(
				'password_pelapor' => $password,
			);
			$this->Amodel->Update($table, $data, $where);

			$session = array(
				'authenticated' => true, // Buat session authenticated dengan value true
				'id' => $user->id_pelapor ,  // Buat session username
				'email' => $user->email_pelapor,  // Buat session username
				'nama' => $user->nama_pelapor, // Buat session authenticated
				'hp_pelapor' => $user->hp_pelapor, // Buat session authenticated

			);
			$this->session->set_userdata($session); // Buat session sesuai $session
			$this->session->set_flashdata("pesan", "<div class=\"alert success\" id=\"alert\"><b>Password Berhasil direset.</b></div>");

			print "ok";
		} else {
			print $error;
		}
	}
	public function about()
	{

		if(empty($this->nama) AND empty($this->email)  AND empty($this->checkpoint) ){
			header("location:" . base_url("Home"));
		}


		$data['title'] = "Tentang Kami";
		$data['session'] = $this->session;





		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/about',$data);


	}
	public function register()
	{


		$data['title'] = "Register";
		$data['session'] = $this->session;
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/register',$data);


	}
	public function registerprocess()
	{
		$now = time();
		$table = "pelapor";
		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($name) OR empty($email) OR empty($password) OR empty($passwordconf) OR empty($hp)  ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$where = array(
			'email_pelapor' => $email
		);
		$checkduplicate = $this->Amodel->jumlahdata_query($table, $where);

		if ($checkduplicate > 0) {
			$error = "Email telah digunakan";
		}

		if (strlen($password) < 8) {
			$error = "Password minimal memiliki 8 karakter";
		}
		if ($password != $passwordconf) {
			$error = "Konfirmasi password tidak valid atau tidak sama";
		}

		$dirpic = '';
		$imgfilename = '';


		if ($error) {
			echo "<p><ul>";
			echo nl2br($error);
			print "</ul></p>";
		} else {
			$password = sha1($password . $this->config->item('CMS_SALT_STRING'));
			$code= random_string('alnum','32');
			$data = array(
				'email_pelapor' => $email,
				'nama_pelapor' => $name,
				'hp_pelapor' => $hp,
				'alamat_pelapor' => $alamat,
				'password_pelapor' => $password,
				'password_pelapor' => $password,
				'statusemail_pelapor' => 'y',
				'emailcode_pelapor'=>$code,
			);

			$id = $this->Amodel->save($data);


			$to                 = $email;
			$subject            = "Verifikasi Email";

			#
			$message =  '<!doctype html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><title>Hello world </title><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><style type="text/css">#outlook a{padding: 0;}body{margin: 0;padding: 0;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;}table,td{border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;}img{border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;}p{display: block;margin: 13px 0;}</style><!--[if mso]><noscript><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml></noscript><![endif]--><!--[if lte mso 11]><style type="text/css">.mj-outlook-group-fix{width: 100% !important;}</style><![endif]--><link href="https://fonts.googleapis.com/css?family=Roboto:300,500" rel="stylesheet" type="text/css"><style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:300,500);</style><style type="text/css">@media only screen and (min-width: 480px){.mj-column-per-60{width: 60% !important;max-width: 60%;}.mj-column-per-40{width: 40% !important;max-width: 40%;}.mj-column-per-100{width: 100% !important;max-width: 100%;}.mj-column-per-45{width: 45% !important;max-width: 45%;}}</style><style media="screen and (min-width:480px)">.moz-text-html .mj-column-per-60{width: 60% !important;max-width: 60%;}.moz-text-html .mj-column-per-40{width: 40% !important;max-width: 40%;}.moz-text-html .mj-column-per-100{width: 100% !important;max-width: 100%;}.moz-text-html .mj-column-per-45{width: 45% !important;max-width: 45%;}</style><style type="text/css">@media only screen and (max-width: 480px){table.mj-full-width-mobile{width: 100% !important;}td.mj-full-width-mobile{width: auto !important;}}</style></head><body style="word-spacing:normal;"><div style=""><!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]--><div style="margin:0px auto;max-width:600px;"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"><tbody><tr><td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;"><!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:360px;"><![endif]--><div class="mj-column-per-60 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody></tbody></table></div><!--[if mso | IE]></td><td class="" style="vertical-align:top;width:240px;"><![endif]--><div class="mj-column-per-40 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody></tbody></table></div></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]--><div style="margin:0px auto;max-width:600px;"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"><tbody><tr><td style="direction:ltr;font-size:0px;padding:0px;text-align:center;"><!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;"><![endif]--><div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody><tr><td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;"><tbody><tr><td style="width:550px;"><a href="https://recast.ai?ref=newsletter" target="_blank"><img height="auto" src="https://cdn.recast.ai/newsletter/city-01.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="550"/></a></td></tr></tbody></table></td></tr></tbody></table></div></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]--><div style="margin:0px auto;max-width:600px;"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"><tbody><tr><td style="direction:ltr;font-size:0px;padding:0px;text-align:center;"><!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:270px;"><![endif]--><div class="mj-column-per-45 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody><tr><td align="center" style="font-size:0px;padding:0px;word-break:break-word;"><div style="font-family:Roboto, Helvetica, sans-serif;font-size:18px;font-weight:500;line-height:24px;text-align:center;color:#616161;">VERIFIKASI EMAIL</div></td></tr><tr><td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;"><p style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:100%;"></p><!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:220px;" role="presentation" width="220px" ><tr><td style="height:0;line-height:0;"> &nbsp;</td></tr></table><![endif]--></td></tr><tr><td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;"><p style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:45%;"></p><!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:99px;" role="presentation" width="99px" ><tr><td style="height:0;line-height:0;"> &nbsp;</td></tr></table><![endif]--></td></tr></tbody></table></div></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]--><div style="margin:0px auto;max-width:600px;"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"><tbody><tr><td style="direction:ltr;font-size:0px;padding:0px;padding-top:30px;text-align:center;"><!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;"><![endif]--><div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody><tr><td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;"><div style="font-family:Roboto, Helvetica, sans-serif;font-size:16px;font-weight:300;line-height:24px;text-align:left;color:#616161;"><p>Hallo {NAMA}!</p><p> Silakan Lakukan Verifikasi Email Anda Agar Akun anda dapat melakukan pelaporan </p><p>Klik Tombol Dibawah ini untuk lakukan Verifikasi Email</p></div></td></tr><tr><td align="center" vertical-align="middle"style="font-size:0px;padding:10px 25px;word-break:break-word;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;"><tr><td align="center" bgcolor="#f45e43" role="presentation"style="border:none;border-radius:3px;cursor:auto;mso-padding-alt:10px 25px;background:#f45e43;"valign="middle"><a href="{LINK}" style="display:inline-block;background:#f45e43;color:white;font-family:Helvetica;font-size:13px;font-weight:normal;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;mso-padding-alt:0px;border-radius:3px;" target="_blank"> Verifikasi Sekarang ! </a></td></tr></table></td></tr></tbody></table></div></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]--><div style="margin:0px auto;max-width:600px;"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"><tbody><tr><td style="direction:ltr;font-size:0px;padding:0px;text-align:center;"><!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;"><![endif]--><div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tbody><tr><td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;"><p style="border-top:solid 1px #E0E0E0;font-size:1px;margin:0px auto;width:100%;"></p><!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 1px #E0E0E0;font-size:1px;margin:0px auto;width:550px;" role="presentation" width="550px" ><tr><td style="height:0;line-height:0;"> &nbsp;</td></tr></table><![endif]--></td></tr></tbody></table></div></td></tr></tbody></table></div></div></body></html>';
			#


			$message = str_replace('{NAMA}',$name,$message);
			$message = str_replace('{LINK}',base_url('code/'.$id.'/'.$code),$message);




			$mail = new PHPMailer(true);
			$mail->isSMTP();
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;

			$mail->Host       = 'smtp.googlemail.com';
			$mail->SMTPAuth   = true;
			$mail->Username   = 'applesaorg@gmail.com'; // ubah dengan alamat email Anda
			$mail->Password   = 'H87aGupC5TmEubA'; // ubah dengan password email Anda
			$mail->SMTPSecure = 'ssl';
			$mail->Port       = 587;

			$mail->setFrom('applesaorg@gmail.com', 'APPELSA'); // ubah dengan alamat email Anda
			$mail->addAddress($to);
			$mail->addReplyTo('applesaorg@gmail.com', 'APPELSA'); // ubah dengan alamat email Anda

			// Isi Email
			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body    = $message;

			$mail->send();






			print "ok";












		}
	}
	public function laporan()
	{

		if(empty($this->nama) AND empty($this->email)  AND empty($this->checkpoint) ){
			header("location:" . base_url("Home"));
		}


		$data['title'] = "Buat Laporan";
		$data['session'] = $this->session;
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/laporan',$data);


	}
	public function laporanlist()
	{

		if(empty($this->nama) AND empty($this->email)  AND empty($this->checkpoint) ){
			header("location:" . base_url("Home"));
		}


		$data['title'] = "Laporan Anda";
		$data['session'] = $this->session;
		$sql="SELECT * FROM laporan_sampah WHERE id_pelapor='$this->id' ORDER BY tanggal_laporan DESC";
		$data['query'] = $this->db->query($sql)->result();




		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/laporanlist',$data);


	}
	public function dashboard()
	{
		$data['title'] = "Dashboard";
		$data['session'] = $this->session;

		$data['semualaporan'] = $this->db->query('SELECT l.id_laporan From laporan_sampah l  inner join pelapor p  on p.id_pelapor = l.id_pelapor where l.id_pelapor = '.$this->id)->num_rows();
		$data['laporanproses'] = $this->db->query('SELECT l.id_laporan From laporan_sampah l  inner join pelapor p  on p.id_pelapor = l.id_pelapor where l.id_pelapor = '.$this->id.' AND (status_laporan="p" OR status_laporan="b")')->num_rows();
		$data['laporanselesai'] = $this->db->query('SELECT l.id_laporan From laporan_sampah l  inner join pelapor p  on p.id_pelapor = l.id_pelapor where l.id_pelapor = '.$this->id.' AND status_laporan="y"')->num_rows();
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/dashboard',$data);
	}
	public function laporanlistdetail($id)
	{
		if(empty($this->nama) AND empty($this->email)  AND empty($this->checkpoint) ){
			header("location:" . base_url("Home"));
		}
		$data['title'] = "Laporan Anda";
		$data['session'] = $this->session;
		$where = array(
			'id_laporan' => $id,
		);
		$data['detail'] = $this->Amodel->Detail_query('laporan_sampah', $where); // Panggil fungsi get yang ada di UserModel.php
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/laporanlistdetail',$data);


	}

	public function changeprofil()
	{
		if(empty($this->nama) AND empty($this->email)  AND empty($this->checkpoint) ){
			header("location:" . base_url("Home"));
		}
		$data['title'] = "Ubah Profil";
		$data['session'] = $this->session;
		$where = array(
			'id_pelapor' => $this->id,
		);
		$data['detail'] = $this->Amodel->Detail_query('pelapor', $where); // Panggil fungsi get yang ada di UserModel.php
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/changeprofil',$data);


	}
	public function updateprofile(){
		$now = time();
		$table = "pelapor";
		$error = "";
		$password="";
		$hp="";
		$alamat="";


		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if(empty($nama)){
			$error ="Wajib Mengisi Field yangada";
		}
		$where = array(
			'id_pelapor' => $this->id,
		);
		$getuser = $this->Amodel->Detail_query('pelapor', $where); // Panggil fungsi get yang ada di UserModel.php



		if ($error) {
			echo "<p><ul>";
			echo nl2br($error);
			print "</ul></p>";
		} else {
			$where = array(
				'id_pelapor'=>$this->id,
			);
			$data = array(
				'nama_pelapor' => $nama,
				'hp_pelapor' => $hp,
				'alamat_pelapor' => $alamat,
			);
			$this->Amodel->Update($table, $data, $where);
			$this->session->set_flashdata("pesan", "<div class=\"alert success\" id=\"alert\"><b>Akun Anda Berhasil Diubah</b></div>");
			print "ok";
		}

	}
	public function changepassword()
	{
		if(empty($this->nama) AND empty($this->email)  AND empty($this->checkpoint) ){
			header("location:" . base_url("Home"));
		}
		$data['title'] = "Ubah Profil";
		$data['session'] = $this->session;
		$where = array(
			'id_pelapor' => $this->id,
		);
		$data['detail'] = $this->Amodel->Detail_query('pelapor', $where); // Panggil fungsi get yang ada di UserModel.php
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/changepassword',$data);


	}
	public function updatepassword(){
		$now = time();
		$table = "pelapor";
		$error = "";
		$password="";
		$hp="";
		$alamat="";


		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}
		$where = array(
			'id_pelapor' => $this->id,
		);
		$getuser = $this->Amodel->Detail_query('pelapor', $where); // Panggil fungsi get yang ada di UserModel.php

		if (empty($passwordold) OR empty($password) OR empty($passwordconf)    ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}



			if (strlen($password) < 8) {
				$error = "Password minimal memiliki 8 karakter";
			}
			if ($password != $passwordconf) {
				$error = "Konfirmasi password tidak valid atau tidak sama";
			}

			$passwordold = sha1($passwordold . $this->config->item('CMS_SALT_STRING'));
			if($passwordold != $getuser->password_pelapor){
				$error = "Password Tidak Valid";
			}





		if ($error) {
			echo "<p><ul>";
			echo nl2br($error);
			print "</ul></p>";
		} else {
			$password = sha1($password . $this->config->item('CMS_SALT_STRING'));
			$where = array(
				'id_pelapor'=>$this->id,
			);
			$data = array(
				'password_pelapor' => $password,
			);

			$this->Amodel->Update($table, $data, $where);
			$this->session->sess_destroy(); // Hapus semua session
			$this->session->set_flashdata("pesan", "<div class=\"alert success\" id=\"alert\"><b>Password Berhasil Diubah</b></div>");
			print "ok";
		}

	}

	public function laporanget()
	{
		$id = "";
		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		foreach ($this->input->get() as $key => $value) {
			$$key = $value;
		}

		if(empty($nolap)){
			print "<div>Laporan Tidak Ditemukan</div>";
		}else{
			$where = array(
				'id_laporan' => $nolap,
			);
			$laporan = $this->Amodel->Detail_query("laporan_sampah", $where); // Panggil fungsi get yang ada di UserModel.php
			$this->load->view('home/getlaporan',$laporan);


		}




	}
	public function suksesregister()
	{
		$data['title'] = "Sukses Register";
		$data['session'] = $this->session;
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/suksesregister',$data);
	}
	public function loginprocess()
	{
		$now = time();
		$table = "pelapor";
		$error = "";



		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($email) OR empty($password)) {
			$error = "Wajib mengisi seluruh field yang ada";
		}

		$where = array(
			'email_pelapor' => $email,
			'statusemail_pelapor'=>'y',
		);

		$user = $this->Amodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php

		if (empty($user->email_pelapor)) {
			$error = "Username atau Password tidak valid";
		} else {
			$passwordl = sha1($password . $this->config->item('CMS_SALT_STRING'));

			if ($user->password_pelapor != $passwordl) {
				$error = "Username atau Password tidak valid";
			}
		}



		if (empty($error)) {
			$now = time();

			$session = array(
				'authenticated' => true, // Buat session authenticated dengan value true
				'id' => $user->id_pelapor ,  // Buat session username
				'email' => $user->email_pelapor,  // Buat session username
				'nama' => $user->nama_pelapor, // Buat session authenticated
				'hp_pelapor' => $user->hp_pelapor, // Buat session authenticated

			);
			$this->session->set_userdata($session); // Buat session sesuai $session

			print "ok";
		} else {
			print $error;
		}
	}
	public function laporanproses()
	{
		$now = time();

		$error = "";

		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}

		if (empty($_FILES['file']) OR empty($latitude) OR empty($longitude)   ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}


		$dirpic = '';
		$imgfilename = '';



		if (empty($error)) {
			$namefile = '';
			if(isset($_FILES['file'])){
				$this->load->library('upload');
				$nmfile = "laporan_" . time();
				$config['upload_path'] = './assets/laporan/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['max_size'] = '13072'; //maksimum besar file 3M
				$config['max_width'] = '15000'; //lebar maksimum 5000 px
				$config['max_height'] = '15000'; //tinggi maksimu 5000 px
				$config['file_name'] = $nmfile; //nama yang terupload nantinya

				$this->upload->initialize($config);

				if ($_FILES['file']['name']) {
					if ($this->upload->do_upload('file')) {
						$gbr = $this->upload->data();
						$namefile = $gbr['file_name'];


					}
				}
			}

			$session = array(
				'foto' => $namefile,  // Buat session username
				'deskripsi' => $note,  // Buat session username
				'latitude' => $latitude,
				'longitude' => $longitude,

			);
			$this->session->set_userdata($session); // Buat session sesuai $session

			/*$data = array(
				'id_pelapor' => $this->id,
				'tanggal_laporan' => date('Y-m-d H:i:s'),
				'latitude' => $latitude,
				'longitude' => $longitude,
				'keterangan' => $note,
				'foto' => $namefile,
				'status_laporan' => 'b',
				'tanggal_verifikasi' => '',
				'foto_verifikasi' => '',
			);
			$this->Amodel->input($data, 'laporan_sampah');*/
			#$this->session->set_flashdata("pesan", "<div class=\"alert success\" id=\"alert\"><b>Laporan Berhasil ditambahkan.</b></div>");
			print "ok";

		} else {
			print $error;
		}
	}
	public function storelaporan()
	{
		$now = time();

		$error = "";





		$dirpic = '';
		$imgfilename = '';



		if (empty($error)) {
			$namefile = '';
			$data = array(
				'id_pelapor' => $this->id,
				'tanggal_laporan' => date('Y-m-d H:i:s'),
				'latitude' => $this->session->latitude,
				'longitude' => $this->session->longitude,
				'keterangan' => $this->session->deskripsi,
				'foto' => $this->session->foto,
				'status_laporan' => 'b',
				'tanggal_verifikasi' => '',
				'foto_verifikasi' => '',
			);
			$this->Amodel->input($data, 'laporan_sampah');
			$this->session->set_flashdata("pesan", "<div class=\"alert success\" id=\"alert\"><b>Laporan Berhasil ditambahkan.</b></div>");
			header("location:".base_url('Home/laporan'));
			print "ok";

		} else {
			print $error;
		}
	}
	public function previewlaporan()
	{
		if(empty($this->nama) AND empty($this->email)  AND empty($this->checkpoint) ){
			header("location:" . base_url("Home"));
		}
		$data['title'] = "Preview Laporan";
		$data['session'] = $this->session;
		#VIEW
		$this->load->view('webcom/com-head',$data);
		$this->load->view('webcom/com-nav',$data);
		$this->load->view('home/laporanpreview',$data);
	}

	public function updatepelapor($id,$code)
	{
		$now = time();
		$table = "pelapor";
		$error = "";
		if (empty($code)    ) {
			$error = "Wajib mengisi seluruh field yang ada";
		}
		$where = array(
			'id_pelapor' => $id,
			'emailcode_pelapor'=>$code,
		);
		$user = $this->Amodel->Detail_query($table, $where); // Panggil fungsi get yang ada di UserModel.php

		if (empty($user)) {
			$error = "Code Tidak Valid";
		}

		if (empty($error)) {
			$where = array(
				'id_pelapor'=>$id,
				'emailcode_pelapor' => $code,
			);
			$data = array(
				'statusemail_pelapor' => 'y',
			);
			$this->Amodel->Update($table, $data, $where);
			$session = array(
				'authenticated' => true, // Buat session authenticated dengan value true
				'id' => $user->id_pelapor ,  // Buat session username
				'email' => $user->email_pelapor,  // Buat session username
				'nama' => $user->nama_pelapor, // Buat session authenticated
				'hp_pelapor' => $user->hp_pelapor, // Buat session authenticated
				'checkpoint' => 'web', // Buat session authenticated
			);
			$this->session->set_userdata($session); // Buat session sesuai $session
			$this->session->set_flashdata("pesan", "<div class=\"alert success\" id=\"alert\"><b>Akun Anda Berhasil Diverifikasi, Anda Sudah Dapat langsung melakukan pelaporan sampah.</b></div>");
			header("location:" . base_url("Home/laporan"));

		} else {
			print $error;
		}
	}
	public function logout()
	{
		$this->session->sess_destroy(); // Hapus semua session
		header("location:" . base_url("Home"));
	}



}


