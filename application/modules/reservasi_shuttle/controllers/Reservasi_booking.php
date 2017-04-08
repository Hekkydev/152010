<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_booking extends MY_Controller{

                  public function __construct()
                  {
                    parent::__construct();
                    $this->Authentikasi        = $this->Authentikasi();
                    $this->kode_tiket          = $this->AutoKodeReservasi();
                    $this->kode_booking        = $this->AutoKodeBooking();
                    $this->waktu_skr           = $this->waktu_skr();

                  }

  function booking_add()
  {
            $post = (object) $_POST;
            if($this->input->post('kode_manifest') == TRUE):

                try {
                    if($post != TRUE) throw new Exception("Error Processing Request");

                        $send['booking']   = $this->booking_proses($post);
                        $customer_send     = $this->customers_reservasi($post);

                        $this->print_data($send);
                } catch (Exception $e) {
                    print_r($e->getMessage());
                }


            endif;
  }

  function customers_reservasi($post)
  {
            $telp_customers = $post->no_handphone;
            $data_penumpang = array(
              'kode_customers'=>$this->customer_model->generate(),
              'telp_customers'=>$post->no_handphone,
              'nama_customers'=>$post->nama_penumpang,
              'created_date'=>$this->waktu_skr,
            );
            $cek_customer = $this->customer_model->cek_customer($telp_customers);
            if($cek_customer > 0){
                $data_update_customer = array(
                  'nama_customers'=>$post->nama_penumpang,
                  'last_change_date'=>$this->waktu_skr,
                );
                $action = $this->customer_model->update_customer($data_update_customer,$telp_customers);
            }else{
                $action = $this->customer_model->simpan_customer($data_penumpang);
            }

          return "success";

  }


  function jenis_penumpang_harga($post)
  {
              $penumpang = explode('-',$post);

              $jenis_penumpang = (object) array(
                'kategori_penumpang'=>$penumpang[0],
                'tarif_penumpang'=>$penumpang[1],
              );
              return $jenis_penumpang;
  }

  function booking_proses($post)
  {

              $total_seat = $post->total_seat;

              if($total_seat == 1){
                    // HANYA SATU PENUMPANG
                  $data_reservasi = $this->booking_satu_penumpang($post);

              }elseif($total_seat > 1){

                  // LEBIH DARI SATU PENUMPANG
                  $jadwal = $this->jadwal_model->get_detail_jadwal_keberangakatan($post->kode_jadwal);
                  $penumpang = $this->jenis_penumpang_harga($post->jenis_penumpang_harga);
                  $list_kursi = explode(',',$post->nomor_kursi);

                  foreach ($list_kursi as $key => $nomor_kursi) {
                    $kode_tiket = $this->AutoKodeReservasi();
                    $data_kode_tiket    = array('kode_tiket'=>$kode_tiket);
                    $simpan_kode_tiket  = $this->reservasi_model->insert('p_reservasi_shuttle_kode_tiket',$data_kode_tiket);
                    $data_reservasi_list = array(
                      'id_status_pemesanan_shuttle' =>1,
                      'id_reservasi_shuttle_tipe'=>1,
                      'uuid_user'=>$post->kode_cso,
                      'kode_jadwal'=>$post->kode_jadwal,
                      'kode_manifest'=>$post->kode_manifest,
                      'kode_tiket'=>$kode_tiket,
                      'kode_booking'=>$this->kode_booking,
                      'tanggal_reservasi'=>$post->tanggal_keberangkatan,
                      'jam_reservasi'=>$jadwal->jam,
                      'menit_reservasi'=>$jadwal->menit,
                      'total_kursi'=>1,
                      'nomor_kursi'=>$nomor_kursi,
                      'kode_member'=>$post->kode_member,
                      'telp_penumpang'=>$post->no_handphone,
                      'nama_penumpang'=>strtoupper($post->nama_penumpang),
                      'keterangan_penumpang'=>$post->keterangan,
                      'jenis_penumpang'=>$penumpang->kategori_penumpang,
                      'tarif_penumpang'=>$penumpang->tarif_penumpang,
                      'tarif_diskon'=>$post->diskon_penumpang,
                      'tanggal_pemesanan_tiket'=>$this->waktu_skr,
                      'created_date'=>$this->waktu_skr,
                    );
                    $simpan_reservasi =  $this->booking_lebih_dari_satu_penumpang($data_reservasi_list);
                  }
                  $data_kode_booking  = array('kode_booking'=>$this->kode_booking);
                  $simpan_kode_booking =  $this->reservasi_model->insert('p_reservasi_shuttle_kode_booking',$data_kode_booking);

                  if($simpan_kode_booking == TRUE){
                        $data_reservasi = "success";
                  }



              }


                return $data_reservasi;

  }

  function booking_satu_penumpang($post)
  {


        $jadwal = $this->jadwal_model->get_detail_jadwal_keberangakatan($post->kode_jadwal);
        $penumpang = $this->jenis_penumpang_harga($post->jenis_penumpang_harga);

        $data_kode_tiket    = array('kode_tiket'=>$this->kode_tiket);
        $data_kode_booking  = array('kode_booking'=>$this->kode_booking);
        $data_reservasi = array(
          'id_status_pemesanan_shuttle' =>1,
          'id_reservasi_shuttle_tipe'=>1,
          'uuid_user'=>$post->kode_cso,
          'kode_jadwal'=>$post->kode_jadwal,
          'kode_manifest'=>$post->kode_manifest,
          'kode_tiket'=>$this->kode_tiket,
          'kode_booking'=>$this->kode_booking,
          'tanggal_reservasi'=>$post->tanggal_keberangkatan,
          'jam_reservasi'=>$jadwal->jam,
          'menit_reservasi'=>$jadwal->menit,
          'total_kursi'=>$post->total_seat,
          'nomor_kursi'=>$post->nomor_kursi,
          'kode_member'=>$post->kode_member,
          'telp_penumpang'=>$post->no_handphone,
          'nama_penumpang'=>strtoupper($post->nama_penumpang),
          'keterangan_penumpang'=>$post->keterangan,
          'jenis_penumpang'=>$penumpang->kategori_penumpang,
          'tarif_penumpang'=>$penumpang->tarif_penumpang,
          'tarif_diskon'=>$post->diskon_penumpang,
          'tanggal_pemesanan_tiket'=>$this->waktu_skr,
          'created_date'=>$this->waktu_skr,
        );


        $insert['booking_data']         = $this->reservasi_model->insert_reservasi_booking($data_reservasi);
        $insert['booking_kode_tiket']   = $this->reservasi_model->insert('p_reservasi_shuttle_kode_tiket',$data_kode_tiket);
        $insert['booking_kode_booking'] = $this->reservasi_model->insert('p_reservasi_shuttle_kode_booking',$data_kode_booking);

        if($insert == TRUE)
        {
            return "success";
        }
  }



    function booking_lebih_dari_satu_penumpang($data_reservasi)
    {
          $simpan = $this->reservasi_model->insert_reservasi_booking($data_reservasi);
          if($simpan == TRUE)
          {
            return "success";
          }

    }




    function update_to_go_show()
    {

        $post = (object) $_POST;

        $uuid_user = $post->kode_cso;
        $kode_booking = $post->kode_booking;
        $metode_pembayaran = $post->metode_pembayaran;
        $data = array(
          'id_status_pemesanan_shuttle' =>2,
          'id_reservasi_shuttle_tipe'=>2,
          'uuid_user'=>$uuid_user,
          'tanggal_pembayaran_tiket'=>$this->waktu_skr,
          'metode_pembayaran_tiket'=>strtoupper($metode_pembayaran),
          'last_change_date'=>$this->waktu_skr,
        );
        //$this->print_data($kode_booking);
        $update =  $this->reservasi_model->update_to_go($data,$kode_booking);
        if ($update == TRUE) {
            echo "success";
        }else{
            echo "error";
        }

    }







}
