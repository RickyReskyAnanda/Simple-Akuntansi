<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_kontak extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
    //     $logged_in = $this->session->userdata('logged_in_y');
    //     if($logged_in != "mskmi") {
    //         redirect('A_login');
    //     }else{
            // $this->load->model('M_kontak');
    //     }

    }
    /**
     |------------------------------------------------------------------------------------------------------------------
     |                                                  KATEGORI
     |------------------------------------------------------------------------------------------------------------------
     |
     */
    public function index(){
        $this->load->view('V_kontak');
    }    

    //-----CRUD berita------
        public function select_data_kontak(){
            $this->M_kontak->select_data_kontak();
        }
        public function insert_data_kontak(){
            $this->M_kontak->insert_data_kontak();
        }
        public function update_data_kontak(){
            $this->M_kontak->update_data_kontak();
        }
        public function delete_data_kontak(){
            $this->M_kontak->delete_data_kontak();
        }

    
}
?>