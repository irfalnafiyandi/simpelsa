<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//CONFIG INFO WEBSITE
$config['SITENAME_TITLE'] = "KASIR V1";
$config['SITENAME_TITLE_LITTLE'] = "KSR";
$config['CMS_SALT_STRING'] = "[[[[CM||SAu0m4t3&F44STENProc6]]]++";
$config['ASSETS_URL'] = "";
$config['CACHE_URL'] = "";
$config['API_URL'] = "";
$config['LOGO_LOGIN'] = "http://".$_SERVER['HTTP_HOST'].preg_replace('@/+$@', '', dirname($_SERVER['SCRIPT_NAME'])).'/assets/image/cashier.png';



//CONFIG INFO EMAIL
$config['EMAIL_OPTION'] = "queue"; #standard|queue|sendgrid
$config['GA_EMAIL'] = "snorf@gmail.com";
$config['GA_PASSWORD'] = "76671234";
$config['EMAIL_HOST'] = "ssl://smtp.gmail.com'";
$config['EMAIL_PORT'] = "456";

$config['GA_PROFILE_ID'] = "";
$config['GA_PROPERTY_ID'] = "";


//CONFIG INFO API KEY
$config['GOOGLEMAPS_API'] = "";
$config['SITENAME'] = "";
