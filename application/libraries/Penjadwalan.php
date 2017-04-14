<?php

/**
 * Libarary Penjadwalan
 * Author : Hekky Nurhikmat
 */
// EXTENDING GENERAL LIBRARY
class Penjadwalan extends General
{
  var $CI;

  public function __construct()
  {
      parent::__construct();
      $this->CI  =& get_instance();
      $this->waktu_skr = date('Y-m-d H:i:s');
      $this->model_jadwal = '../modules/jadwal/models/jadwal_model';

  }


  public function save_data_sopir($request = array())
  {
          $this->CI->load->model($this->model_jadwal);
          $post = (object) $request;
          $data['kode_jadwal']        = $post->kode_jadwal;
          $data['tgl_setup']          = $post->tanggal_reservasi;
          $data['uuid_sopir']         = $post->uuid_sopir;
          $data['uuid_user']          = $post->uuid_user;


          $data_config_insert = array(
            'kode_jadwal_kendaraan' =>$data['kode_jadwal'],
            'uuid_user'=>$data['uuid_user'],
            'uuid_sopir'=>$data['uuid_sopir'],
            'tanggal_jadwal_kendaraan'=>$data['tgl_setup'],
            'id_status'=>1,
            'created_date'=>$this->waktu_skr,
          );

          $check_row = $this->CI->jadwal_model->check_jadwal_sopir($post->kode_jadwal,$post->tanggal_reservasi)->num_rows();

          $data_config_update = array(
            'uuid_user'=>$data['uuid_user'],
            'uuid_sopir'=>$data['uuid_sopir'],
            'last_change_date'=>$this->waktu_skr,
          );

          if($check_row > 0):
            //update
            $update_at_p_jadwal_kendaraan = $this->CI->jadwal_model->update_config_sopir($data_config_update,$post->kode_jadwal,$post->tanggal_reservasi);
            return TRUE;
          else:
            //insert
            $insert_to_p_jadwal_kendaraan = $this->CI->jadwal_model->insert_config_sopir($data_config_insert);
            return TRUE;
          endif;
  }




  public function save_data_mobil($request = array())
  {
          $this->CI->load->model($this->model_jadwal);
          $post = (object) $request;

          $data['kode_jadwal'] = $post->kode_jadwal;
          $data['tgl_setup'] = $post->tanggal_reservasi;
          $data['uuid_mobil_unit'] = $post->uuid_mobil_unit;
          $data['uuid_user'] = $post->uuid_user;

          $data_config_insert = array(
            'kode_jadwal_kendaraan' =>$data['kode_jadwal'],
            'uuid_user'=>$data['uuid_user'],
            'uuid_mobil_unit'=>$data['uuid_mobil_unit'],
            'tanggal_jadwal_kendaraan'=>$data['tgl_setup'],
            'id_status'=>1,
            'created_date'=>$this->waktu_skr,
          );


          $check_row = $this->CI->jadwal_model->check_jadwal_kendaraan($post->kode_jadwal,$post->tanggal_reservasi)->num_rows();

          $data_config_update = array(
            'uuid_user'=>$data['uuid_user'],
            'uuid_mobil_unit'=>$data['uuid_mobil_unit'],
            'last_change_date'=>$this->waktu_skr,
          );
          if($check_row > 0):
            //update
            $update_at_p_jadwal_kendaraan = $this->CI->jadwal_model->update_config_mobil($data_config_update,$post->kode_jadwal,$post->tanggal_reservasi);
            return TRUE;
          else:
            //insert
            $insert_to_p_jadwal_kendaraan = $this->CI->jadwal_model->insert_config_mobil($data_config_insert);
            return TRUE;
          endif;
  }


}
