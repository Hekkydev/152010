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
        $Query = $this->CI->reservasi_model->reservasi_cek($kode_jadwal,$tanggal_reservasi,$nomor_kursi)->first_row();
        return $Query;
    }

    public function nama_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        $cek = $this->cek_data($kode_jadwal,$tanggal_reservasi,$nomor_kursi);
        try {
            if($cek == FALSE) throw new Exception("BELUM TERISI");
            return strtoupper($cek->nama_penumpang); // kondisi penumpang terisi
        } catch (Exception $e) {
            return $e->getMessage(); // kondisi penumpang kosong
        }
    }

    public function status_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        $cek = $this->cek_data($kode_jadwal,$tanggal_reservasi,$nomor_kursi);

        if($cek == TRUE){
            $reservasi_tipe = $cek->id_reservasi_shuttle_tipe;
            switch ($reservasi_tipe) {
                case $reservasi_tipe == 1:// kondisi penumpang booking belum membayar
                    return "icon-bangku-booking";
                    break;

                case $reservasi_tipe == 2:// kondisi penumpang sudah bayar
                    return "icon-bangku-dibayar";
                    break;
                
                default:// kondisi penumpang kosong
                    return "icon-bangku-kosong";
                    break;
            }
        }else{
                    return "icon-bangku-kosong"; // kondisi penumpang kosong
        }
       
    }


    public function button_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        $cek = $this->cek_data($kode_jadwal,$tanggal_reservasi,$nomor_kursi);

        if($cek == TRUE){
            $reservasi_tipe = $cek->id_reservasi_shuttle_tipe;
            switch ($reservasi_tipe) {
                case $reservasi_tipe == 1:// kondisi penumpang booking belum membayar
                    return "bg-blue";
                    break;

                case $reservasi_tipe == 2:// kondisi penumpang sudah bayar
                    return "bg-red";
                    break;
                
                default:// kondisi penumpang kosong
                    return "bg-default btn-outline";
                    break;
            }
        }else{
                    return "bg-default btn-outline"; // kondisi penumpang kosong
        }
        
    }



    public function kursi_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        $cek = $this->cek_data($kode_jadwal,$tanggal_reservasi,$nomor_kursi);
        if($cek == TRUE){
                    $reservasi_tipe = $cek->id_reservasi_shuttle_tipe;
                    switch ($reservasi_tipe) {
                        case $reservasi_tipe == 1:// kondisi penumpang booking belum membayar
                            return "bg-blue";
                            break;

                        case $reservasi_tipe == 2:// kondisi penumpang sudah bayar
                            return "bg-red";
                            break;
                        
                        default:// kondisi penumpang kosong
                            return "bg-default";
                            break;
                    }
                }else{
                            return "bg-default"; // kondisi penumpang kosong
                }
    }


    public function data_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
            $cek = $this->cek_data($kode_jadwal,$tanggal_reservasi,$nomor_kursi);


            if($cek == TRUE){
                $reservasi_tipe = $cek->id_reservasi_shuttle_tipe;
                switch ($reservasi_tipe) {
                    case $reservasi_tipe == 1:// kondisi penumpang booking belum membayar
                        return "data-id='1' data-penumpang='".$cek->kode_tiket."' data-booking='".$cek->kode_booking."'";
                        break;

                    case $reservasi_tipe == 2:// kondisi penumpang sudah bayar
                        return "data-id='2' data-penumpang='".$cek->kode_tiket."' data-booking='".$cek->kode_booking."'";
                        break;
                    
                    default:// kondisi penumpang kosong
                        return "data-id='0'";
                        break;
                }
            }else{
                        return "data-id='0'"; // kondisi penumpang kosong
            }
    }

    public function informasi_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        
        $cek = $this->cek_data($kode_jadwal,$tanggal_reservasi,$nomor_kursi);


            if($cek == TRUE){
                $reservasi_tipe = $cek->id_reservasi_shuttle_tipe;
                switch ($reservasi_tipe) {
                    case $reservasi_tipe == 1:// kondisi penumpang booking belum membayar
                        return "penumpang-booking";
                        break;

                    case $reservasi_tipe == 2:// kondisi penumpang sudah bayar
                        return "penumpang-dibayar";
                        break;
                    
                    default:// kondisi penumpang kosong
                        return "penumpang-kosong'";
                        break;
                }
            }else{
                        return "penumpang-kosong"; // kondisi penumpang kosong
            }
    }


    public function find($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {

           
           $html  = '';
           $html .= '<div class="penumpang '.$this->informasi_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi).'">';
           $html .= '<div class="col-lg-3 passengger'.$nomor_kursi.'" align="center" style="padding:10px  0 20px 0; margin:3px;">';
           $html .= '<div class="icon-bangku '.$this->status_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi).'" '.$this->data_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi).' ><span class="infoSeat '.$this->kursi_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi).'">'.$nomor_kursi.'</span></div>';
           $html .= '<button class="btn-bangku btn btn-xs '.$this->button_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi).'">'.$this->nama_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi).'</button>';
           $html .= '</div></div>'; 

           return $html;  
    }






}
