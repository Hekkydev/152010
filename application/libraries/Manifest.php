<?php
/**
 *  Class : Manifest
 *  Author : Hekky Nurhikmat
 */
class Manifest 
{
    var $CI;

    public function __construct()
    {  
            $this->CI =& get_instance();
            $this->model_jurusan    = APPPATH.'modules/jurusan/models/jurusan_model'; 
            $this->model_reservasi  = APPPATH.'modules/reservasi_shuttle/models/reservasi_model'; 
    }

    public function validasi_kode($post)
    {
        
    }
    public function kode_manifest($post)
    {
        $Query = $this->validasi_kode($post);
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

   

    


    
}
