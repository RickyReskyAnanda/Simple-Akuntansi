<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends MY_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function select_data_project(){
        echo json_encode($this->select_data('tabel_project','id_project'));
    }

    public function insert_data_project(){
        $val = json_decode(file_get_contents('php://input'));
        $data = array(
            'nama_project'	=> $val->data->nama_project,
            'pemilik'       => $val->data->pemilik,
            'lokasi'        => $val->data->lokasi,
            'tahun'        	=> $val->data->tahun,
            'status'        => "berjalan",
            'debit'        	=> 0,
            'kredit'        => 0,
            'tgl_update'	=> date("y-m-d h:i:s"),
            'modal_masuk'	=> 0
        );
        $this->db->insert('table_project',$data);

        //mengambil id_kategori data yang barusan diinput
        // $this->db->select_max('id_kategori');
        // $a=$this->db->get('table_kategori')->row_array();
        // echo $a['id_kategori'];
    }
}
