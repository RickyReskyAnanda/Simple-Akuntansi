<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detail_project extends MY_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

   
    public function select_data_detail_project(){  // mengambil data2 umum dari project
        $val = json_decode(file_get_contents('php://input'));
        $this->db->where('id_project',$val->id);
        echo json_encode($this->db->get('tabel_project')->row_array());
    }

    public function select_data_buku_besar(){
        $this->db->where('jenis_buku',0);
        $this->db->where('jenis','lainnya');
        echo json_encode($this->db->get('tabel_buku_besar')->result_array());
    }
    public function insert_data_buku_besar(){
        $val = json_decode(file_get_contents('php://input'));
        $data = array(
            'jenis_buku'        => '0',
            'jenis'             => 'lainnya', 
            'nama_buku_besar'   => $val->data->nama_buku_besar,
            'nominal'           => '0',
            'pembayaran'        => $val->data->pembayaran,
            'id_jurnal_umum'    => '0',
            'tgl_pembuatan'     => date('Y-m-d'),
            'id_user'           => '0',
            'id_project'        => $val->id_project,
        );
        $this->db->insert('tabel_buku_besar',$data);

        $this->db->where('id_project',$val->id_project);
        $this->db->order_by('id_buku_besar','DESC');
        $this->db->limit(1);
        echo json_encode($this->db->get('tabel_buku_besar')->row_array());
    }

    public function update_data_buku_besar(){
        $val = json_decode(file_get_contents('php://input'));
        $data['nama_buku_besar'] = $val->data->nama_buku_besar;
        $this->db->where('id_buku_besar',$val->data->id_buku_besar);
        if($this->db->update('tabel_buku_besar',$data)){
            echo "Berhasil Memperbaharui Data";
        }else{
            echo "Gagal Memperbaharui Data";
        }
    }

    public function delete_data_buku_besar(){
        $val = json_decode(file_get_contents('php://input'));
        $this->db->where('id_buku_besar',$val->id);
        $this->db->or_where('jenis_buku',$val->id);
        if($this->db->delete('tabel_buku_besar')){
            echo "Berhasil Menghapus Data";
        }else{
            echo "Gagal Menghapus Data";
        }
    }

    public function select_data_sub_buku_besar(){
        $val = json_decode(file_get_contents('php://input'));
        $this->db->where('jenis_buku',$val->jenis_buku);
        $this->db->where('jenis',$val->jenis);
        $this->db->order_by('id_buku_besar','DESC');
        echo json_encode($this->db->get('tabel_buku_besar')->result_array());
    }

    public function insert_data_sub_buku_besar(){
        $val = json_decode(file_get_contents('php://input'));
        $data = array(
            'jenis_buku'        => $val->jenis_buku,
            'jenis'             => $val->jenis, 
            'nama_buku_besar'   => $val->data->nama_buku_besar,
            'nominal'           => $val->data->nominal,
            'pembayaran'        => $val->pembayaran,
            'id_jurnal_umum'    => '0',
            'tgl_pembuatan'     => date('Y-m-d'),
            'id_user'           => '0',
            'id_project'        => $val->id_project,
        );
        $this->db->insert('tabel_buku_besar',$data);

        $this->db->select('modal_masuk'); //mengambil data jumlah modal
        $this->db->where('id_project',$val->id_project);
        $modal_masuk=$this->db->get('tabel_project')->row_array();

        if($val->data->jenis!="hutang"){
            $this->perhitunganmodal($val->data->pembayaran,$val->id_project,$val->data->nominal);
        }elseif($val->data->jenis=="hutang"){
            $data['jenis']      = "hutang";
            $data['pembayaran'] = "debit";
            $data['jenis_buku'] = 0;
            $this->db->insert('tabel_buku_besar',$data);
        }

        $this->db->limit(1);
        $this->db->where('id_project',$val->id_project);
        $this->db->order_by('id_buku_besar','DESC');
        echo json_encode($this->db->get('tabel_buku_besar')->row_array());

    }
    public function update_data_sub_buku_besar(){
        $val = json_decode(file_get_contents('php://input'));
        $data = array(
            'nama_buku_besar'   => $val->data->nama_buku_besar,
            'nominal'           => $val->data->nominal,
        );
        $this->db->where('id_buku_besar',$val->data->id_buku_besar);
        if($this->db->update('tabel_buku_besar',$data)){
            echo "Berhasil Memperbaharui Data";
        }else{
            echo "Gagal Memperbaharui Data";
        }
    }

    public function delete_data_sub_buku_besar(){
        $val = json_decode(file_get_contents('php://input'));
        
        if($val->data->jenis!="hutang"){
            if ($val->data->pembayaran=="debit")$pembayaran="kredit";
            elseif($val->data->pembayaran=="kredit")$pembayaran="debit";

            $this->perhitunganmodal($pembayaran,$val->id_project,$val->data->nominal);

            $this->db->where('id_buku_besar',$val->data->id_buku_besar);
            if($this->db->delete('tabel_buku_besar')){
                echo "Berhasil Menghapus Data";
            }else{
                echo "Gagal Menghapus Data";
            }
        }else{
            $this->db->select('modal_masuk');
            $this->db->where('id_project',$val->id_project);
            $modal_masuk=$this->db->get('tabel_project')->row_array();
            if($val->data->nominal<=$modal_masuk['modal_masuk']){
                $pembayaran="kredit";
                $this->perhitunganmodal($pembayaran,$val->id_project,$val->data->nominal);
                $this->db->where('id_buku_besar',$val->data->id_buku_besar);
                if($this->db->delete('tabel_buku_besar')){
                    echo "Berhasil Menghapus Data";
                }else{
                    echo "Gagal Menghapus Data";
                }
            }else{
                echo "0";
            }
        }
    }
//--------------------------- JURNAL UMUM ------------------------------------
    public function select_data_jurnal_umum(){
        $val = json_decode(file_get_contents('php://input'));
        $this->db->where('id_project',$val->id);
        $this->db->order_by('id_jurnal_umum','DESC');
        echo json_encode($this->db->get('tabel_jurnal_umum')->result_array());
    }
    public function select_data_nama_suplier(){
        $this->db->select('id_suplier,nama_suplier');
        $this->db->order_by('id_suplier','DESC');
        echo json_encode($this->db->get('tabel_suplier')->result_array());
    }
    public function insert_data_jurnal_umum(){
        $val = json_decode(file_get_contents('php://input'));
        $dataSuplier = array(
            'nama_suplier' => $val->data->nama_suplier,
            'alamat'    => $val->data->alamat,
            'no_telp'   => $val->data->no_telp,
            'id_project'=> $val->id_project,
            'id_user'   => 1,
        );
        $this->db->insert('tabel_suplier',$dataSuplier); //suplier

        $this->db->select('id_suplier');
        $this->db->where('id_user',1);
        $this->db->limit(1);
        $this->db->order_by('id_suplier','DESC');
        $id_suplier = $this->db->get('tabel_suplier')->row_array();
        $dataJurnal = array(
            'kode'        => "Pembelian",
            'tanggal'     => $val->data->tanggal,
            'no_nota'     => $val->data->no_nota,
            'uraian'      => $val->data->uraian,
            'volume'      => $val->data->volume,
            'satuan'      => $val->data->satuan,
            'harga_satuan'=> $val->data->harga_satuan,
            'total'       => $val->data->harga_satuan * $val->data->volume,
            'id_suplier'  => $id_suplier['id_suplier'],
            'id_user'     => 1,
            'id_project'  => $val->id_project
        );
        $this->db->insert('tabel_jurnal_umum',$dataJurnal); //data jurnal

        $this->db->where('id_project',$val->id_project);
        $this->db->where('no_nota',$val->data->no_nota);
        $this->db->limit(1);
        $this->db->order_by('id_jurnal_umum','DESC');
        $rowDataJurnal = $this->db->get('tabel_jurnal_umum')->row_array();

        $dataBukuBesar = array(
            'nama_buku_besar' => $val->data->uraian, 
            'jenis_buku'      => "0", 
            'jenis'           => "pembelian", 
            'nominal'         => $val->data->harga_satuan * $val->data->volume,
            'pembayaran'      => "kredit",
            'id_user'         => 1,
            'id_project'      => $val->id_project,
            'id_jurnal_umum'  => $rowDataJurnal['id_jurnal_umum'],
        );
        $this->db->insert('tabel_buku_besar',$dataBukuBesar); //data buku besar

        $this->db->select('modal_masuk');
        $this->db->where('id_project',$val->id_project);
        $modal_awal=$this->db->get('tabel_project')->row_array();

        if($dataJurnal['total']<=$modal_awal['modal_masuk']){
            $this->perhitunganmodal('kredit',$val->id_project,$dataJurnal['total']);
        }elseif($dataJurnal['total']>$modal_awal['modal_masuk']){
            $dataBukuBesar['jenis']      = "hutang";
            $dataBukuBesar['pembayaran'] = "debit";
            $this->db->insert('tabel_buku_besar',$dataBukuBesar); //data buku besar
        }
        echo json_encode($rowDataJurnal);
    }

    public function delete_data_jurnal_umum(){
        $val = json_decode(file_get_contents('php://input'));

        $this->db->where('id_jurnal_umum',$val->id);
        $this->db->delete('tabel_buku_besar');

        $this->db->where('id_jurnal_umum',$val->id);
        $this->db->delete('tabel_jurnal_umum');
    }
}
