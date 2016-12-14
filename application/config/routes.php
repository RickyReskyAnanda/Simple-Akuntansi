<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']='welcome';
$route['404_override']='';
$route['translate_uri_dashes']=FALSE;

$route['daftar-suplier']="A_suplier";
//login
$route['login']="A_login";
$route['login/proses/']="A_login/cek_login";

//dashboard
$route['dashboard']="A_dashboard";