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
            $this->model  = APPPATH.'modules/jurusan/models/jurusan_model'; 
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
        $this->CI->load->model($this->model); 
        $Q = $this->CI->jurusan_model->master_biaya_trip_jurusan($asal_keberangkatan,$tujuan_keberangkatan);
        return $Q;
    }

    


    
}
