<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_booking extends MY_Controller{

  public function __construct()
  {
            parent::__construct();
            $this->Authentikasi           = $this->Authentikasi();
            $this->AllKota                = $this->AllKota()->result();
            $this->AllMobil               = $this->AllMobil()->result();
            $this->AllSopir               = $this->AllSopir()->result();
  }

  function booking_add()
  {

        $kode_manifest = $this->input->post('kode_manifest');
        $kode_jadwal = $this->input->post('kode_jadwal');
        $tgl_reservasi = $this->input->post('tanggal_req');
        $nama_penumpang = $this->input->post('nama_penumpang');
        $kode_member  = $this->input->post('kode_member');
        $no_handphone   = $this->input->post('no_handphone');
        $jenis_penumpang_harga = $this->input->post('jenis_penumpang_harga');
        $keterangan = $this->input->post('keterangan');
        $total_seat = $this->input->post('total_seat');
        $nomor_kursi = $this->input->post('nomor_kursi');
        $kode_cso =  $this->input->post('kode_cso');

        $kode_booking = $this->AutoKodeBooking();
        $select_nomor_kursi = explode(",",$nomor_kursi);
        if($total_seat == 1):
              $kode_tiket = $this->AutoKodeReservasi();
              $booking_now = $this->booking_proses($kode_booking,
                                                   $kode_tiket,
                                                   $kode_manifest,
                                                   $kode_jadwal,
                                                   $tgl_reservasi,
                                                   $nama_penumpang,
                                                   $kode_member,
                                                   $no_handphone,
                                                   $jenis_penumpang_harga,
                                                   $keterangan,
                                                   $total_seat,
                                                   $nomor_kursi,
                                                   $kode_cso);
              $booking_kode =  $this->booking_data($kode_booking);
        elseif($total_seat > 1 ):
          foreach($select_nomor_kursi as $key=>$val):
              $nomor_kursi_value = $val;
              $total_seat_new = 1;
              $kode_tiket  = $this->AutoKodeReservasi();
              $booking_now = $this->booking_proses($kode_booking,
                                                   $kode_tiket,
                                                   $kode_manifest,
                                                   $kode_jadwal,
                                                   $tgl_reservasi,
                                                   $nama_penumpang,
                                                   $kode_member,
                                                   $no_handphone,
                                                   $jenis_penumpang_harga,
                                                   $keterangan,
                                                   $total_seat_new,
                                                   $nomor_kursi_value,
                                                   $kode_cso);
          endforeach;
          $booking_kode = $this->booking_data($kode_booking);
        endif;

  }

  function booking_data($kode_booking)
  {

          $dataReservasiKode = array(
            'kode_booking'=>$kode_booking,
          );
          $table_kode = 'p_reservasi_shuttle_kode_booking';
          return $simpan_kode = $this->db->insert($table_kode,$dataReservasiKode);

  }


  function booking_proses($kode_booking,$kode_tiket,$kode_manifest,$kode_jadwal,$tgl_reservasi,$nama_penumpang,$kode_member,$no_handphone,$jenis_penumpang_harga,$keterangan,$total_seat,$nomor_kursi,$kode_cso)
  {


          $kode_status = 1;

          $penumpang = explode('-',$jenis_penumpang_harga);
          $jenis_penumpang = $penumpang[0]; //jenis_penumpang
          $tarif_penumpang = $penumpang[1]; // tarif_penumpang

          $jadwal = $this->jadwal_model->get_detail_jadwal_keberangakatan($kode_jadwal);

          $dataReservasiKode = array(
            'kode_booking'=>$kode_booking,
          );

          $dataReservasiKode_tiket = array(
            'kode_tiket'=>$kode_tiket,
          );

          $dataReservasi = array(
            'kode_jadwal_reservasi_shuttle' =>$kode_booking,
            'kode_jadwal'=>$kode_jadwal,
            'tgl_reservasi_shuttle'=>$tgl_reservasi,
            'jam'=>$jadwal->jam,
            'menit'=>$jadwal->menit,
            'created_date'=>$this->waktu_skr(),
           );

          $dataReservasi_detail = array(
            'id_status_pemesanan_shuttle'=>$kode_status,
            'id_reservasi_shuttle_tipe'=>1, // status tipe di booking
            'id_kursi_shuttle'=>$nomor_kursi,
            'kode_manifest'=>$kode_manifest,
            'kode_tiket'=>$kode_tiket,
            'kode_jadwal_reservasi_shuttle' =>$kode_booking,
            'kode_jadwal'=>$kode_jadwal,
            'uuid_user'=>$kode_cso,
            'kode_member'=>$kode_member,
            'nama_penumpang'=>$nama_penumpang,
            'no_telp_penumpang'=>$no_handphone,
            'keterangan_penumpang'=>$keterangan,
            'jenis_penumpang'=>$jenis_penumpang,
            'tarif_penumpang'=>$tarif_penumpang,
            'tgl_pemesanan_tiket'=>$this->waktu_skr(),
            'created_date'=>$this->waktu_skr(),
          );

          $table = 'p_reservasi_shuttle';
          $table_detail = 'p_reservasi_shuttle_detail';
          $table_kode = 'p_reservasi_shuttle_kode_booking';
          $table_kode_tiket = 'p_reservasi_shuttle_kode_tiket';
          $simpan = $this->db->insert($table,$dataReservasi);
          if($simpan){
            $simpan1 = $this->db->insert($table_detail,$dataReservasi_detail);
            if($simpan1){
                $simpan_kode_tiket = $this->db->insert($table_kode_tiket,$dataReservasiKode_tiket);
            }
          }
  }

}
