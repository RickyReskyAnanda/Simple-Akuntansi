<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_profile extends MY_Controller{

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
        $this->load->view('V_profile');
    }  
    
}
?>