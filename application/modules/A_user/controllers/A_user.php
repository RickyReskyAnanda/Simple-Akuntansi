<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_user extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
    //     $logged_in = $this->session->userdata('logged_in_y');
    //     if($logged_in != "mskmi") {
    //         redirect('A_login');
    //     }else{
            $this->load->model('M_user');
    //     }

    }
    /**
     |------------------------------------------------------------------------------------------------------------------
     |                                                  KATEGORI
     |------------------------------------------------------------------------------------------------------------------
     |
     */
    public function index(){
        $this->load->view('V_user');
    }  

        //-----CRUD berita------
        public function select_data_user(){
            $this->M_user->select_data_user();
        }
        public function insert_data_user(){
            $this->M_user->insert_data_user();
        }
        public function update_data_user(){
            $this->M_user->update_data_user();
        }
        public function delete_data_user(){
            $this->M_user->delete_data_user();
        }
    
}
?>