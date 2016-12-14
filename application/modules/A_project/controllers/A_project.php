<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_project extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        // $logged_in = $this->session->userdata('logged_in_y');
        // if($logged_in != "mskmi") {
            // redirect('A_login');
        // }else{
            $this->load->model('M_project');
            $this->load->model('M_detail_project');
        // }

    }
    /**
     |------------------------------------------------------------------------------------------------------------------
     |                                                  KATEGORI
     |------------------------------------------------------------------------------------------------------------------
     |
     */
    public function index(){
        $this->load->view('V_project');
    }  
    

    //-----CRUD berita------
        public function select_data_project(){
            $this->M_project->select_data_project();
        }
        public function insert_data_project(){
            $this->M_project->insert_data_project();
        }
        public function update_status_project(){
            $this->M_project->update_status_project();
        }
        public function delete_data_project(){
            $this->M_project->delete_data_project();
        }


    // page detail project
    public function view_detail_project(){
        $this->load->view('V_detail_project');
    }

    //-----CRUD-----
        public function select_data_detail_project(){
            $this->M_detail_project->select_data_detail_project();
        }
        public function select_data_buku_besar(){
            $this->M_detail_project->select_data_buku_besar();
        }
        public function select_data_sub_buku_besar(){
            $this->M_detail_project->select_data_sub_buku_besar();
        }

        public function insert_data_sub_buku_besar(){
            $this->M_detail_project->insert_data_sub_buku_besar();
        }
        public function update_data_sub_buku_besar(){
            $this->M_detail_project->update_data_sub_buku_besar();
        }
        public function delete_data_sub_buku_besar(){
            $this->M_detail_project->delete_data_sub_buku_besar();
        }
        public function select_data_jurnal_umum(){
            $this->M_detail_project->select_data_jurnal_umum();
        }

        public function insert_data_jurnal_umum(){
            $this->M_detail_project->insert_data_jurnal_umum();
        }
        public function delete_data_jurnal_umum(){
            $this->M_detail_project->delete_data_jurnal_umum();
        }

}
?>