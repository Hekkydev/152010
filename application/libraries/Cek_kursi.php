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
            return strtoupper($cek->nama_penumpang); // kondisi penumpang terisi
        } catch (Exception $e) {
            print_r($e->getMessage()); // kondisi penumpang kosong
        }
    }

    public function status_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        $cek = $this->cek_data($kode_jadwal,$tanggal_reservasi,$nomor_kursi);

        try {
        if($cek == FALSE) throw new Exception("icon-bangku-kosong");
            if($cek->id_reservasi_shuttle_tipe == 1):
                    echo "icon-bangku-booking"; // kondisi penumpang booking belum membayar
            elseif($cek->id_reservasi_shuttle_tipe == 2):
                    echo "icon-bangku-dibayar"; // kondisi penumpang sudah bayar
            else:
                    echo "icon-bangku-kosong"; // konidisi penumpang kosong
            endif;
        } catch (Exception $e) {
                    print_r($e->getMessage());
        }
    }


    public function button_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        $cek = reservasi_shuttle($kode_j,$tgl_req,$nomor_kursi,$where)->first_row();
        try {
        if($cek == FALSE) throw new Exception("bg-default btn-outline"); 
            if($cek->id_reservasi_shuttle_tipe == 1):
                    echo "bg-blue"; // penumpang kondisi penumpang booking dan belum bayar
            elseif($cek->id_reservasi_shuttle_tipe == 2):
                    echo "bg-red"; // penumpang kondisi penumpang booking sudah dibayar
            else:
                    echo "bg-default btn-outline";  //penumpang kondisi penumpang kosong
            endif;
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }



    public function kursi_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        $cek = reservasi_shuttle($kode_j,$tgl_req,$nomor_kursi,$where)->first_row();
            try {
            if($cek == FALSE) throw new Exception("bg-default");
                if($cek->id_reservasi_shuttle_tipe == 1):
                        echo "bg-blue"; // kondisi penunmpang booking belum bayar
                elseif($cek->id_reservasi_shuttle_tipe == 2):
                        echo "bg-red"; // kondisi penumpang booking / go show sudah membayar
                else:
                        echo "bg-default"; // kondisi penumpang kosong
                endif;
            } catch (Exception $e) {
                 print_r($e->getMessage()); // kondisi penumpang kosong
            }
    }


    public function data_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
            $cek = reservasi_shuttle($kode_j,$tgl_req,$nomor_kursi,$where)->first_row();
            try {
            if($cek == FALSE) throw new Exception(" data-id='0' "); // kondisi penumpnag konsong jika tidak ada data pada table rerservasi
                if($cek->id_reservasi_shuttle_tipe == 1): // kondisi penumpang hanya booking
                    echo " data-id='1' data-penumpang='".$cek->kode_tiket."' data-booking='".$cek->kode_booking."' ";
                elseif($cek->id_reservasi_shuttle_tipe == 2): // kondisi penumpang sudah membayar
                    echo " data-id='2' data-penumpang='".$cek->kode_tiket."' data-booking='".$cek->kode_booking."' ";
                else:
                    echo " data-id='0' ";  // kondisi penumpang kosong
                endif;
            } catch (Exception $e) {
                    print_r($e->getMessage()); // kondisi penumpnag konsong
            }
    }

    public function informasi_penumpang($kode_jadwal,$tanggal_reservasi,$nomor_kursi)
    {
        $cek = reservasi_shuttle($kode_j,$tgl_req,$nomor_kursi,$where)->first_row();

        try {
        if($cek == FALSE) throw new Exception(" penumpang-kosong ");
            if($cek->id_reservasi_shuttle_tipe == 1):
                    echo " penumpang-booking ";
            elseif($cek->id_reservasi_shuttle_tipe == 2):
                    echo " penumpang-dibayar  ";
            else:
                    echo " penumpang-kosong ";
            endif;
        } catch (Exception $e) {
                    print_r($e->getMessage());
        } 


    }


    






}
