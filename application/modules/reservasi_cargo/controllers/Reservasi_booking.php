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
          $this->waktu_skr              = $this->waktu_skr();
          // --------LOAD MODEL---------------------------------------------
          $model = $this->load->model(array('cargo_model'));
          $this->nomor_resi_paket = $this->cargo_model->nomor_resi_paket();
          $this->kode_pengiriman  = $this->cargo_model->kode_pengiriman();
          $this->pengiriman_paket = $this->cargo_model->get_pengiriman()->result_object();
          $this->jenis_pengiriman = $this->cargo_model->get_jenis_pengiriman()->result_object();

  }

  function booking_add()
  {
            $post = (object) isset($_POST) ? $_POST : "";
            $cek_post = $this->valid_array($post);
            try {
              if($cek_post != TRUE) throw new Exception("Error Processing Request");
                $send['pengiriman_paket']  =  $this->proses_data_pengiriman_paket($cek_post);
                $send['pengiriman_paket_penerima'] =  $this->proses_data_pengiriman_penerima($cek_post);
                $send['pengiriman_paket_pengirim'] =  $this->proses_data_pengiriman_pengirim($cek_post);
                $send['pengiriman_paket_data_barang'] = $this->proses_data_pengiriman_data_barang($cek_post);

                $condition = array("false");
                if(in_array($send,$condition,TRUE))
                {
                    echo "false";
                }else{
                    echo "success";
                }
                
            } catch (Exception $e) {
                print_r($e->getMessage()); die();
            }

  }


  function valid_array($post)
  {
            if(is_array($post) == TRUE)
            {
                return (object) $post ;
            }else{
                return false;
            }
  }


  function proses_data_pengiriman_paket($post)
  {
            // print_r($post);
            $waktu  = explode(':',$post->jam);
            $jam    = $waktu[0];
            $menit  = $waktu[1];

            $uuid  = "uuid_pengiriman_paket";
            $data = array(
              'id_status_pengiriman_paket' => 1,
              'uuid_user'=>$post->cso,
              'kode_pengiriman'=>$this->kode_pengiriman,
              'kode_manifest'=>$post->kode_manifest,
              'kode_jadwal'=>$post->kode_jadwal,
              'nomor_resi_paket'=>$this->nomor_resi_paket,
              'tanggal_keberangkatan'=>$post->tanggal_keberangkatan,
              'jam_keberangkatan'=>$jam,
              'menit_keberangkatan'=>$menit,
              'jenis_layanan_pembayaran'=>$post->jenis_layanan_pembayaran,
              'created_date'=>$this->waktu_skr,
           );


           $simpan = $this->cargo_model->insert_table_pengiriman($data,$uuid);
           if($simpan == TRUE)
           {
             $info = "success";
           }else{
             $info = "false";
           }

           return $info;

  }

  function proses_data_pengiriman_pengirim($post)
  {
            $data = array(
              'kode_pengiriman' =>$this->kode_pengiriman ,
              'nama_pengirim'=>$post->nama_pengirim_valid,
              'telp_pengirim'=>$post->telp_pengirim_valid,
              'alamat_pengirim'=>$post->alamat_pengirim_valid,
            );

          $simpan = $this->cargo_model->insert_table_pengirim($data);
          if($simpan == TRUE)
          {
            $info = "success";
          }else{
            $info = "false";
          }

          return $info;

  }

  function proses_data_pengiriman_penerima($post)
  {
            $data = array(
              'kode_pengiriman' =>$this->kode_pengiriman ,
              'nama_penerima'=>$post->nama_penerima_valid,
              'telp_penerima'=>$post->telp_penerima_valid,
              'alamat_penerima'=>$post->alamat_penerima_valid,
            );

            $simpan = $this->cargo_model->insert_table_penerima($data);
            if($simpan == TRUE)
            {
              $info = "success";
            }else{
              $info = "false";
            }

            return $info;
  }

  function proses_data_pengiriman_data_barang($post)
  {

        $data = array(
          'kode_pengiriman'=>$this->kode_pengiriman,
          'id_jenis_pengiriman_paket'=>$post->jenis_barang_valid,
          'jumlah_koli_paket'=>$post->jumlah_koli_valid,
          'jenis_ukuran_berat'=>$post->ukuran_berat_valid,
          'jenis_layanan_paket'=>$post->jenis_layanan_valid,
          'berat_kg'=>$post->berat_kilogram_valid,
          'harga_per_kg_pertama'=>$post->info_biaya,
          'harga_per_kg_selanjutnya'=>$post->info_biaya_selanjutnya,
          'harga_total'=>$post->total_biaya_valid,
        );

        $simpan = $this->cargo_model->insert_table_data_barang($data);
        if($simpan == TRUE)
        {
          $info = "success";
        }else{
          $info = "false";
        }
        return $info;
  }

}
