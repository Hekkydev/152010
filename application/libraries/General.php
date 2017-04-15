<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * General Library
 * Author : Hekky Nurhikmat
 */
class General
{
    var $CI;
    function __construct()
    {
        $this->CI =& get_instance();
        $this->model_reservasi  = '../modules/reservasi_shuttle/models/reservasi_model';
        $this->m_manifest       = '../modules/manifest/models/manifest_model';
        $this->model_mobil      = '../modules/mobil/models/mobil_model';
        $this->model_sopir      = '../modules/sopir/models/sopir_model';
        $this->model_paket      = '../modules/reservasi_cargo/models/cargo_model';
    }

    function check_phone($nomor)
    {
        if(isset($nomor)){
            $this->CI->load->model("app_model");
            $query = $this->CI->app_model->check_phone($nomor);
            return $query;
        }
    }

    function check_member($kode_member)
    {
        if(isset($kode_member)){
            $this->CI->load->model('app_model');
            $query = $this->CI->app_model->check_member($kode_member);
            return $query;
        }
    }

    public function cek_block($sid,$nomor_layout)
    {
        if(isset($nomor_layout)){
            $this->CI->load->model('../modules/seat/models/seat_model');
            $query = $this->CI->seat_model->cek_block($sid,$nomor_layout);
            return $query;
        }

    }

    public function cek_uuid_mobil($uuid_mobil)
    {
        $this->CI->load->model($this->model_mobil);
        $query = $this->CI->mobil_model->cek_uuid_mobil($uuid_mobil);
        if($query == TRUE)
        {
          return $nama_mobil = $query->kode_unit;
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
          return $nama_sopir = $query->nama_lengkap;
        }else{
          return "";
        }

    }

    public function cek_jumlah_penumpang_trip($kode_manifest)
    {

      $this->CI->load->model($this->model_reservasi);
      $Q = $this->CI->reservasi_model->total_penumpang_trip($kode_manifest);
      return count($Q->result_object());
    }

    public function cek_paket_trip($kode_manifest)
    {
      $this->CI->load->model($this->model_paket);
      $Q = $this->CI->cargo_model->total_paket_trip($kode_manifest);
      return count($Q->result_object());
    }

    public function cek_tanggal_keberangkatan($kode_manifest)
    {
      $this->CI->load->model($this->m_manifest);
      $Q = $this->CI->manifest_model->cek_tanggal_keberangkatan($kode_manifest);
      return $Q;
    }


}


/* End of file General Library.php */
