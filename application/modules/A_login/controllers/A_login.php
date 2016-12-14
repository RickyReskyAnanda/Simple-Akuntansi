<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_login extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }
    /**
     |------------------------------------------------------------------------------------------------------------------
     |                                                  KATEGORI
     |------------------------------------------------------------------------------------------------------------------
     |
     */

    //------------------------ login ------------------

    public function index(){
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in == "78jhk39") {
            redirect('dashboard/');
        }
        else {
            $this->load->view('V_login');
        }
    }
    //proses login
    public function cek_login(){
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in == "78jhk39"){
            redirect('dashboard/');
        }else{
            $this->M_login->cek_login();
        }
    }

    public function keluar() {
        $newdata = array('nama','foto','xyz','abc');
        $this->session->unset_userdata($newdata);
        $this->session->unset_userdata('logged_in');

        redirect('login');
    }

    // public function edit_berita(){
    //     $data['data']=$this->M_berita->select_data_edit_berita();
    //     $this->load->view('A_dashboard/V_header');
    //     $this->load->view('V_edit_berita',$data);
    //     $this->load->view('A_dashboard/V_footer');
    // }

    // public function coba(){
    //     $this->load->view('coba');
    // } 

    // //-----CRUD berita------
    //     public function select_data_berita(){
    //         $this->M_berita->select_data_berita();
    //     }
    //     public function insert_data_berita(){
    //         $this->M_berita->insert_data_berita();
    //     }
    //     public function update_data_berita(){
    //         $this->M_berita->update_data_berita();
    //     }
    // //     public function delete_data_berita(){
    // //         $this->M_berita->delete_data_berita();
    // //     }

    
}
?>