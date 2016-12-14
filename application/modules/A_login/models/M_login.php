<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends MY_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function cek_login(){
        $asd=md5($this->input->post('kuncinya'));
        $eml= $this->input->post('email');

        $this->db->where('email',$eml);
        $this->db->where('pass',$asd);
        $data=$this->db->get('tabel_user');

        if ($data->num_rows() > 0) {
            
            $row = $data->row_array();
            if($row['email']==$eml && $row['status']=='aktif'){

                $newdata = array(
                    'nama'=> $row['nama'],
                    'foto'=> $row['foto'],
                    'xyz' => $row['email'],//email
                    'abc' => $row['id_user'],
                    'logged_in' => "78jhk39",
                );
                $this->session->set_userdata($newdata);
                redirect('dashboard/');
            }else{
                redirect('login');
            }
        }
    }
}
?>