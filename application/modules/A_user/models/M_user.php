<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends MY_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function select_data_user(){
        echo json_encode($this->select_data('tabel_user','id_user'));
    }

    public function insert_data_user(){
        $val = json_decode(file_get_contents('php://input'));

        $data = array(
            'email'         => $val->data->email,
            'pass'          => md5('user'),
            'nama_lengkap'  => $val->data->nama_lengkap,
            'no_hp'        	=> $val->data->no_hp,
            'status'        => $val->data->status,
            'alamat'        => $val->data->alamat,
            'foto'          => "default.png",
            'tgl_update'	=> date("y-m-d h:i:s"),
            'jk'	        => $val->data->jk
        );
        $this->db->insert('tabel_user',$data);

        // mengambil id_kategori data yang barusan diinput
        $this->db->limit(1);
        $this->db->order_by('id_user','DESC');
        echo json_encode($this->db->get('tabel_user')->row_array());
    }

    public function update_data_user(){
        $val = json_decode(file_get_contents('php://input'));
        $data = array(
            'email'         => $val->data->email,
            'nama_lengkap'  => $val->data->nama_lengkap,
            'no_hp'         => $val->data->no_hp,
            'status'        => $val->data->status,
            'alamat'        => $val->data->alamat,
            'tgl_update'    => date("y-m-d h:i:s"),
            'jk'            => $val->data->jk
        );
        $this->db->where('id_user',$val->id);
        $this->db->update('tabel_user',$data);
    }

    public function delete_data_user(){
        $val = json_decode(file_get_contents('php://input'));
        $tables = array('tabel_user','tabel_buku_besar','tabel_jurnal_umum','tabel_project','tabel_pembelian','tabel_transaksi','tabel_suplier');
        $this->db->where('id_user',$val->id);
        $this->db->delete($tables);
    }
}
