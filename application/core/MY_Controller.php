<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	public function __construct(){
            parent::__construct();
    }


    /*
    |----------------------------------------------------
    |		cek session
    |----------------------------------------------------
    |	1. fungsi cek_session untuk mengecek user masih login atau tidak
    |	2. jika session bernilai false maka akan kembali ke halaman login
    |	3. 
    
    */
    public function cek_session(){
    	$login = $this->session->userdata('login');
    	if($login != "masukxyz"){
    		redirect('login');
    	}
    }

    /*
    |----------------------------------------------------
    |                  View 1 - Simple load view
    |----------------------------------------------------
    */
    public function simple_load_view($page){
        $this->load->view('A_dashboard/V_header');
        $this->load->view($page);
        $this->load->view('A_dashboard/V_footer');
    }
}