<?php

/**
 * Reservation Shuttle Library 
 */
class Cek_kursi
{
    var $CI;
    
    function __construct()
    {
        $this->CI =& get_instance();
        $this->model  = APPPATH.'modules/reservasi_shuttle/models/reservasi_model';
    }

    public function cek_data($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        $this->CI->load->model($this->model);
        $Query = $this->CI->reservasi_model->reservasi_cek($kode_jadwal,$tanggal_reservasi,$nomor_kursi);
        return $Query;
    }

    public function nama_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        $cek = $this->cek_data($kode_jadwal,$tanggal_reservasi,$nomor_kursi);
        try {
            if($cek == FALSE) throw new Exception("BELUM TERISI");
            return strtoupper($cek->nama_penumpang);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function status_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        $cek = $this->cek_data($kode_jadwal,$tanggal_reservasi,$nomor_kursi);

        try {
        if($cek == FALSE) throw new Exception("icon-bangku-kosong");
            if($cek->id_reservasi_shuttle_tipe == 1):
                    echo "icon-bangku-booking";
            elseif($cek->id_reservasi_shuttle_tipe == 2):
                    echo "icon-bangku-dibayar";
            else:
                    echo "icon-bangku-kosong";
            endif;
        } catch (Exception $e) {
                    print_r($e->getMessage());
        }
    }


    public function 


}
