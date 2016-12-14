<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends MY_Model {

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
            'nama_project'  => $val->data->nama_project,
            'pemilik'       => $val->data->pemilik,
            'lokasi'        => $val->data->lokasi,
            'tahun'         => $val->data->tahun,
            'debit'         => 0,
            'kredit'        => 0,
            'status'	    => 'berjalan',
            'tgl_update'    => date('Y-m-d h:i:s'),
            'modal_masuk'   => 0,
            'id_user'       => 0
        );
        $this->db->insert('tabel_project',$data);

        // mengambil id_kategori data yang barusan diinput
        $this->db->limit(1);
        $this->db->where('id_user',0);
        $this->db->order_by('id_project','DESC');
        echo json_encode($this->db->get('tabel_project')->row_array());
    }

    public function update_status_project(){
        $val = json_decode(file_get_contents('php://input'));
        if($val->status == 'berjalan'){
            $data['status'] ="selesai";
        }elseif($val->status == 'selesai'){
            $data['status'] ="berjalan";
        }
        $this->db->where('id_project',$val->id);
        $this->db->update('tabel_project',$data);

        $this->db->where('id_project',$val->id);
        echo json_encode($this->db->get('tabel_project')->row_array());
    }

    public function delete_data_project(){
        $val = json_decode(file_get_contents('php://input'));
        $tables = array('tabel_project','tabel_buku_besar','tabel_jurnal_umum','tabel_project','tabel_pembelian','tabel_suplier');
        $this->db->where('id_project',$val->id);
        $this->db->delete($tables);
    }
}
