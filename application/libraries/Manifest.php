<?php
/**
 *  Class : Manifest
 *  Author : Hekky Nurhikmat
 */
class Manifest extends General
{
    var $CI;

    public function __construct()
    {
            $this->CI =& get_instance();
            $this->model_jurusan    = '../modules/jurusan/models/jurusan_model';
            $this->model_reservasi  = '../modules/reservasi_shuttle/models/reservasi_model';
            $this->m_manifest       = '../modules/manifest/models/manifest_model';
            $this->model_mobil      = '../modules/mobil/models/mobil_model';
            $this->model_sopir      = '../modules/sopir/models/sopir_model';
    }

    public function validasi_kode($post)
    {
        $this->CI->load->model($this->m_manifest);
        return $Query = $this->CI->manifest_model->find_manifest_kode($post);

    }
    public function find_manifest_kode($kode_manifest)
    {
        $Query = $this->validasi_kode($kode_manifest);
        return $Query;
    }

    public function biaya_trip_jurusan($asal_keberangkatan,$tujuan_keberangkatan)
    {
        $this->CI->load->model($this->model_jurusan);
        $Q = $this->CI->jurusan_model->master_biaya_trip_jurusan($asal_keberangkatan,$tujuan_keberangkatan);
        return $Q->first_row();
    }

    public function cek_jumlah_penumpang_trip($kode_manifest)
    {
        $this->CI->load->model($this->model_reservasi);
        $Q = $this->CI->reservasi_model->total_penumpang_trip($kode_manifest);
        return count($Q->result_object());
    }

    public function save_manifest_data($data)
    {
        $this->CI->load->model($this->m_manifest);
        $Q = $this->CI->manifest_model->insert($data);
        return $Q;
    }

    public function cek_uuid_mobil($uuid_mobil)
    {
        $this->CI->load->model($this->model_mobil);
        $query = $this->CI->mobil_model->cek_uuid_mobil($uuid_mobil);
        if($query == TRUE)
        {
          return $nama_mobil = $query->kode_unit.' - '.$query->no_stnk;
        }else{
          return "";
        }
    }

    public function cek_uuid_sopir($uuid_sopir)
    {
        $this->CI->load->model($this->model_sopir);
        $query = $this->CI->sopir_model->cek_uuid_sopir($uuid_sopir);
        if($query == TRUE)
        {
          return $nama_sopir = $query->kode_sopir.' - '.$query->nama_lengkap;
        }else{
          return "";
        }

    }









}
