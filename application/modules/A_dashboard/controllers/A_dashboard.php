<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_dashboard extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
    //     $logged_in = $this->session->userdata('logged_in_y');
    //     if($logged_in != "mskmi") {
    //         redirect('A_login');
    //     }else{
            $this->load->model('M_dashboard');
    //     }

    }
    /**
     |------------------------------------------------------------------------------------------------------------------
     |                                                  KATEGORI
     |------------------------------------------------------------------------------------------------------------------
     |
     */
    public function index(){
        $this->load->view('V_kerangka');
    }  

    public function view_dashboard(){
        $this->load->view('V_home');
    }

    //-------- CRUD DASHBOARD ------------
        public function select_data_project(){
            $this->M_dashboard->select_data_project();
        }
        public function insert_data_project(){
            $this->M_dashboard->insert_data_project();
        }
    
}
?>
<but