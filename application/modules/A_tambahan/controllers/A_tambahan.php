<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_tambahan extends MY_Controller{

    public function __construct()
    {
        parent::__construct();

    }
    /**
     |------------------------------------------------------------------------------------------------------------------
     |                                                  KATEGORI
     |------------------------------------------------------------------------------------------------------------------
     |
     */
    public function index(){
        $this->load->view('V_not_found');
    }  
    // public function panduan(){
    //     $this->load->view('V_not_found');
    // }  
    // public function developer(){
    //     $this->load->view('V_developer');
    // }

        //-----CRUD berita------
        // public function select_data_tambahan(){
        //     $this->M_tambahan->select_data_tambahan();
        // }
        // public function insert_data_tambahan(){
        //     $this->M_tambahan->insert_data_tambahan();
        // }
        // public function update_data_tambahan(){
        //     $this->M_tambahan->update_data_tambahan();
        // }
        // public function delete_data_tambahan(){
        //     $this->M_tambahan->delete_data_tambahan();
        // }
    
}
?>