<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_suplier extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
    //     $logged_in = $this->session->userdata('logged_in_y');
    //     if($logged_in != "mskmi") {
    //         redirect('A_login');
    //     }else{
            $this->load->model('M_suplier');
    //     }

    }
    /**
     |------------------------------------------------------------------------------------------------------------------
     |                                                  KATEGORI
     |------------------------------------------------------------------------------------------------------------------
     |
     */
    public function index(){
        $this->load->view('V_suplier');
    }    

    //-----CRUD berita------
        public function select_data_suplier(){
            $this->M_suplier->select_data_suplier();
        }
        public function insert_data_suplier(){
            $this->M_suplier->insert_data_suplier();
        }
        public function update_data_suplier(){
            $this->M_suplier->update_data_suplier();
        }
        public function delete_data_suplier(){
            $this->M_suplier->delete_data_suplier();
        }

    
}
?>