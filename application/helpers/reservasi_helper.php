<?php
if(!function_exists("reservasi_shuttle")):
  function reservasi_shuttle($kode,$tgl,$nomor_kursi,$where)
  {
    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select('*');
    $CI->db->from('p_reservasi_shuttle_fix');
    $CI->db->where('kode_jadwal',$kode);
    $CI->db->where('tanggal_reservasi',$tgl);
    $CI->db->where('nomor_kursi',$nomor_kursi);
    $CI->db->where('deleted_date',NULL);
    return $CI->db->get();
  }
endif;

if(!function_exists('cek_penumpang_nama')):
  function cek_penumpang_nama($kode_j,$tgl_req,$nomor_kursi)
  {

    $where = array();
    $cek = reservasi_shuttle($kode_j,$tgl_req,$nomor_kursi,$where)->first_row();
    try {
      if($cek == FALSE) throw new Exception("BELUM TERISI");
      return $cek->nama_penumpang;
    } catch (Exception $e) {
      print_r($e->getMessage());
    }
  }
endif;

if(!function_exists('cek_penumpang_status')):
  function cek_penumpang_status($kode_j,$tgl_req,$nomor_kursi)
  {
    $where = array();
    $cek = reservasi_shuttle($kode_j,$tgl_req,$nomor_kursi,$where)->first_row();
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
endif;


if(!function_exists('cek_penumpang_button')):
  function cek_penumpang_button($kode_j,$tgl_req,$nomor_kursi)
  {
    $where = array();
    $cek = reservasi_shuttle($kode_j,$tgl_req,$nomor_kursi,$where)->first_row();
    try {
      if($cek == FALSE) throw new Exception("bg-default btn-outline");
      if($cek->id_reservasi_shuttle_tipe == 1):
         echo "bg-blue";
      elseif($cek->id_reservasi_shuttle_tipe == 2):
            echo "bg-red";
      else:
         echo "bg-default btn-outline";
      endif;
    } catch (Exception $e) {
      print_r($e->getMessage());
    }
  }
endif;

if(!function_exists('cek_penumpang_seat')):
  function cek_penumpang_seat($kode_j,$tgl_req,$nomor_kursi)
  {
    $where = array();
    $cek = reservasi_shuttle($kode_j,$tgl_req,$nomor_kursi,$where)->first_row();
    try {
      if($cek == FALSE) throw new Exception("bg-default");
      if($cek->id_reservasi_shuttle_tipe == 1):
         echo "bg-blue";
      elseif($cek->id_reservasi_shuttle_tipe == 2):
            echo "bg-red";
      else:
         echo "bg-default";
      endif;
    } catch (Exception $e) {
      print_r($e->getMessage());
    }
  }
endif;

if(!function_exists('cek_penumpang_data')):
  function cek_penumpang_data($kode_j,$tgl_req,$nomor_kursi)
  {
    $where = array();
    $cek = reservasi_shuttle($kode_j,$tgl_req,$nomor_kursi,$where)->first_row();
    try {
      if($cek == FALSE) throw new Exception(" data-id='0' ");
      if($cek->id_reservasi_shuttle_tipe == 1):
         echo " data-id='1' data-penumpang='".$cek->kode_tiket."' data-booking='".$cek->kode_booking."' ";
      elseif($cek->id_reservasi_shuttle_tipe == 2):
         echo " data-id='2' data-penumpang='".$cek->kode_tiket."' data-booking='".$cek->kode_booking."' ";
      else:
         echo " data-id='0' ";
      endif;
    } catch (Exception $e) {
      print_r($e->getMessage());
    }
  }
endif;

if(!function_exists('cek_penumpang_info')):
  function cek_penumpang_info($kode_j,$tgl_req,$nomor_kursi)
  {
    $where = array();
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
endif;




if(!function_exists('info_aktif_seat')):
  function info_aktif_seat($kode_jadwal,$tanggal,$info)
  {
      if ($info == "booking") {
        $tipe = 1;
      }else if ($info == "soldout") {
        $tipe = 2;
      }


      $jumlah = reservasi_shuttle_sum($kode_jadwal,$tanggal,$tipe);
      return $jumlah;


  }
endif;

if(!function_exists("reservasi_shuttle_sum")):
  function reservasi_shuttle_sum($kode,$tanggal,$tipe)
  {
    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select('*');
    $CI->db->from('p_reservasi_shuttle_fix');
    $CI->db->where('kode_jadwal',$kode);
    $CI->db->where('tanggal_reservasi',$tanggal);
    $CI->db->where('id_reservasi_shuttle_tipe',$tipe);
    $CI->db->where('deleted_date',NULL);
    return $CI->db->get()->num_rows();
  }
endif;
