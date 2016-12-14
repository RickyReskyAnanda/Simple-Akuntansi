<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_suplier extends MY_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function select_data_suplier(){
        echo json_encode($this->select_data('tabel_suplier','id_suplier'));
    }

    public function insert_data_suplier(){
        $val = json_decode(file_get_contents('php://input'));
        $data = array(
            'nama_suplier'	=> $val->data->nama_suplier,
            'no_telp'       => $val->data->no_telp,
            'alamat'        => $val->data->alamat,
            'merk'          => $val->data->merk,
            'id_user'       => 0,
        );
        $this->db->insert('tabel_suplier',$data);

        //mengambil id_kategori data yang barusan diinput
        $this->db->select_max('id_suplier');
        $a=$this->db->get('tabel_suplier')->row_array();
        echo $a['id_suplier'];
    }

    public function update_data_suplier(){
        $val = json_decode(file_get_contents('php://input'));
        $data = array(
            'nama_suplier'  => $val->data->nama_suplier,
            'no_telp'       => $val->data->no_telp,
            'alamat'        => $val->data->alamat,
            'merk'          => $val->data->merk,
        );
        $this->db->where('id_suplier',$val->id);
        $this->db->update('tabel_suplier',$data);
    }

    public function delete_data_suplier(){
        $this->delete_data('tabel_suplier','id_suplier');
    }
}
?>