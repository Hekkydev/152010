<?php

if(!function_exists('jadwal_tujuan_jurusan')):
  function jadwal_tujuan_jurusan($asal)
  {

    $data = cek_kota_tujuan($asal);

    $kota = array();
    foreach ($data as $value) {
        $uuid = array(
          'nama_kota'=>$value->nama_kota,
          'uuid_kota'=>$value->uuid_kota,
          'kode_cabang'=>$value->kode_cabang,
        );
        array_push($kota,$uuid);
    }

    return $kota;
    //return $data;
  }
endif;

if(!function_exists('cek_kota_tujuan')):
  function cek_kota_tujuan($asal)
  {
    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select("*");
    $CI->db->from("p_master_jurusan");
    $CI->db->join("p_cabang","p_cabang.uuid_cabang = p_master_jurusan.tujuan_keberangkatan","left");
    $CI->db->join("p_kota","p_kota.uuid_kota = p_cabang.uuid_kota",'left');
    $CI->db->where("p_master_jurusan.asal_keberangkatan",$asal);
    $CI->db->group_by('p_cabang.uuid_kota');
    return $CI->db->get()->result();
  }
endif;


if(!function_exists('jadwal_tujuan_jurusan_cabang')):
  function jadwal_tujuan_jurusan_cabang($uuid_kota,$asal)
  {

    $data = cek_cabang_tujuan($uuid_kota,$asal);

    $cabang = array();
    foreach ($data as $value) {
        $uuid = array(
          'nama_cabang'=>$value->nama_cabang,
          'uuid_cabang'=>$value->uuid_cabang,
          'kode_cabang'=>$value->kode_cabang,
        );
        array_push($cabang,$uuid);
    }

    return $cabang;
    //return $data;
  }
endif;

if(!function_exists('cek_cabang_tujuan')):
  function cek_cabang_tujuan($uuid_kota,$asal)
  {
    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select("*");
    $CI->db->from("p_master_jurusan");
    $CI->db->join("p_cabang","p_cabang.uuid_cabang = p_master_jurusan.tujuan_keberangkatan","left");
    $CI->db->join("p_kota","p_kota.uuid_kota = p_cabang.uuid_kota",'left');
    $CI->db->where("p_master_jurusan.asal_keberangkatan",$asal);
    $CI->db->where("p_kota.uuid_kota",$uuid_kota);
    return $CI->db->get()->result();
  }
endif;


if(!function_exists('TujuanCabang')):
function TujuanCabang($UUID_kota,$UUID_asal)
{
	  $CI =& get_instance();
    $CI->load->database();
    $CI->db->select("*");
    $CI->db->from("p_master_jurusan");
    $CI->db->join("p_cabang","p_cabang.uuid_cabang = p_master_jurusan.tujuan_keberangkatan","left");
    $CI->db->where("p_master_jurusan.asal_keberangkatan",$UUID_asal);
    $CI->db->where("p_master_jurusan.deleted_date",NULL);
    return $CI->db->get()->result();
}
endif;



if(!function_exists('rute_jadwal')):
  function rute_jadwal($kode_jadwal)
  {
      $CI =& get_instance();
      $CI->load->database();
      $CI->db->select("*");
      $CI->db->from('p_jadwal_transit');
      $CI->db->join('p_jadwal','p_jadwal.kode_jadwal = p_jadwal_transit.kode_jadwal','left');
      $CI->db->where('p_jadwal_transit.kode_jadwal_transit',$kode_jadwal);
      return $CI->db->get()->result();

  }
endif;


if(!function_exists('ChekRowsJadwal')):
  function ChekRowsJadwal($kode_jadwal,$kondisi)
  {
    if($kondisi == "mobil"):
      $CI =& get_instance();
      $CI->load->database();
      $CI->db->select("*");
      $CI->db->from('p_jadwal_kendaraan');
      $CI->db->join('p_mobil_unit','p_mobil_unit.uuid_mobil_unit = p_jadwal_kendaraan.uuid_mobil_unit','left');
      $CI->db->where('p_jadwal_kendaraan.kode_jadwal_kendaraan',$kode_jadwal);
      $Data =  $CI->db->get()->first_row();

      if($Data == TRUE){
        if($Data->uuid_mobil_unit == TRUE){
          return $DATA_mobil  = '<span class="config-blue">'.$Data->kode_unit." ".$Data->no_plat.'</span>';
        }else{
          return $Data = "<span class='config'>BELUM DI ATUR</span>";
        }
      }else{
        return $Data = "<span class='config'>BELUM DI ATUR</span>";
      }
    elseif($kondisi == "sopir"):

      $CI =& get_instance();
      $CI->load->database();
      $CI->db->select("*");
      $CI->db->from('p_jadwal_kendaraan');
      $CI->db->join('p_sopir','p_sopir.uuid_sopir = p_jadwal_kendaraan.uuid_sopir','left');
      $CI->db->where('p_jadwal_kendaraan.kode_jadwal_kendaraan',$kode_jadwal);
      $Data =  $CI->db->get()->first_row();

      if($Data == TRUE){
        if($Data->uuid_sopir == TRUE){
          return $DATA_sopir  = '<span class="config-blue">'.$Data->nama_lengkap.'</span>';
        }else{
          return $Data = "<span class='config'>BELUM DI ATUR</span>";
        }

      }else{
        return $Data = "<span class='config'>BELUM DI ATUR</span>";
      }
    else:
      return $Data =   "<span class='config'>BELUM DI ATUR</span>";
    endif;

  }
endif;

// -----------------------------------CEK HARGA--------------------------------------------------------///
if(!function_exists('cek_harga_jadwal')):
  function cek_harga_jadwal($kursi,$UUID_asal,$UUID_tujuan)
  {

    $jurusan = cek_harga_jadwal_init($UUID_asal,$UUID_tujuan);
    $kode_jurusan = $jurusan->kode_jurusan;
    $harga = cek_harga_jadwal_confirm($kursi,$kode_jurusan);
    try {
      if ($harga == FALSE) {
        throw new Exception("Error Processing Request", 1);
      }
      return $harga;
    } catch (Exception $e) {
      return $e->getMessage();
    }

  }
endif;

if(!function_exists('cek_harga_jadwal_confirm')):
  function cek_harga_jadwal_confirm($kursi,$kode_jurusan)
  {

    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select("*");
    $CI->db->from("p_master_biaya_reguler_tiket");
    $CI->db->where("kode_jurusan",$kode_jurusan);
    $CI->db->where("id_jml_kursi",$kursi);
    return $CI->db->get()->first_row();
  }
endif;

if(!function_exists('cek_harga_jadwal_init')):
  function cek_harga_jadwal_init($UUID_asal,$UUID_tujuan)
  {

    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select("*");
    $CI->db->from("p_master_jurusan");
    $CI->db->join("p_cabang","p_cabang.uuid_cabang = p_master_jurusan.tujuan_keberangkatan","left");
    $CI->db->join("p_kota","p_kota.uuid_kota = p_cabang.uuid_kota",'left');
    $CI->db->where("p_master_jurusan.asal_keberangkatan",$UUID_asal);
    $CI->db->where("p_master_jurusan.tujuan_keberangkatan",$UUID_tujuan);
    return $CI->db->get()->first_row();
  }
endif;

if(!function_exists('jadwal_init')):
  function jadwal_init($kode_jadwal)
  {

    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select("*");
    $CI->db->from("p_jadwal");
    $CI->db->where("p_jadwal.kode_jadwal",$kode_jadwal);
    return $CI->db->get()->first_row();
  }
endif;
