<?php
if (!function_exists('cabang_result')) {
  function cabang_result($IDkota)
  {
      $CI =& get_instance();
      $CI->load->database();
      $CI->db->select('p_cabang.id_cabang,
                         p_cabang.nama_cabang,
                         p_cabang.kode_cabang,
                         p_cabang.alamat_cabang,
                         p_cabang.no_telp_cabang,
                         p_cabang.fax_cabang,
                         p_cabang.kode_atr,
                         p_cabang.id_cabang_tipe,
                         p_cabang.uuid_cabang,
                         p_kota.nama_kota,
                         p_kota.uuid_kota,
                         p_cabang_tipe.id_cabang_tipe,
                         p_cabang_tipe.tipe_cabang');
      $CI->db->from('p_cabang');
      $CI->db->join('p_kota','p_kota.uuid_kota = p_cabang.uuid_kota','left');
      $CI->db->join('p_cabang_tipe','p_cabang_tipe.id_cabang_tipe = p_cabang.id_cabang_tipe','left');
      $CI->db->where('p_cabang.deleted_date',NULL);
      $CI->db->where('p_cabang.uuid_cabang',$IDkota);
      return $q = $CI->db->get()->result();
  }
}

if (!function_exists('Cabang_helper')) {
  function Cabang_helper($IDkota)
  {
      $CI =& get_instance();
      $CI->load->database();
      $CI->db->select('p_cabang.id_cabang,
                         p_cabang.nama_cabang,
                         p_cabang.kode_cabang,
                         p_cabang.alamat_cabang,
                         p_cabang.no_telp_cabang,
                         p_cabang.fax_cabang,
                         p_cabang.kode_atr,
                         p_cabang.id_cabang_tipe,
                         p_cabang.uuid_cabang,
                         p_kota.nama_kota,
                         p_kota.uuid_kota,
                         p_cabang_tipe.id_cabang_tipe,
                         p_cabang_tipe.tipe_cabang');
      $CI->db->from('p_cabang');
      $CI->db->join('p_kota','p_kota.uuid_kota = p_cabang.uuid_kota','left');
      $CI->db->join('p_cabang_tipe','p_cabang_tipe.id_cabang_tipe = p_cabang.id_cabang_tipe','left');
      // $CI->db->join('p_master_jurusan','p_master_jurusan.asal_keberangkatan = p_cabang.uuid_cabang','left');
      // $CI->db->where("p_master_jurusan.deleted_date",NULL);
      // $CI->db->where('p_cabang.deleted_date',NULL);
      $CI->db->where('p_cabang.uuid_kota',$IDkota);
      return $q = $CI->db->get();
  }
}

if (!function_exists('cabang')) {
  function cabang($ID)
  {
      $CI =& get_instance();
      $CI->load->database();
      $CI->db->select('p_cabang.id_cabang,
                         p_cabang.nama_cabang,
                         p_cabang.kode_cabang,
                         p_cabang.alamat_cabang,
                         p_cabang.no_telp_cabang,
                         p_cabang.fax_cabang,
                         p_cabang.kode_atr,
                         p_cabang.id_cabang_tipe,
                         p_cabang.uuid_cabang,
                         p_kota.nama_kota,
                         p_kota.uuid_kota,
                         p_cabang_tipe.id_cabang_tipe,
                         p_cabang_tipe.tipe_cabang');
      $CI->db->from('p_cabang');
      $CI->db->join('p_kota','p_kota.uuid_kota = p_cabang.uuid_kota','left');
      $CI->db->join('p_cabang_tipe','p_cabang_tipe.id_cabang_tipe = p_cabang.id_cabang_tipe','left');
      $CI->db->where('p_cabang.deleted_date',NULL);
      $CI->db->where('p_cabang.uuid_cabang',$ID);
      return $q = $CI->db->get()->first_row();



  }
}

if(!function_exists('cabang_nama')):
  function cabang_nama($uuid_cabang){
    $cabang = cabang($uuid_cabang);
    if($cabang == TRUE):
      $nama_cabang = $cabang->nama_cabang;
    else:
      $nama_cabang = '-';
    endif;
    return $nama_cabang;
  }
endif;

if(!function_exists('kode_cabang')):
  function kode_cabang($uuid_cabang){
    $cabang = cabang($uuid_cabang);
    if($cabang == TRUE):
      $kode_cabang = $cabang->kode_cabang;
    else:
      $kode_cabang = '-';
    endif;
    return $kode_cabang;
  }
endif;

//////////////////////HARGA NON REGULER///////////////////////////////////////////////
if(!function_exists('non_reguler_harga_tiket1')):
  function non_reguler_harga_tiket1($kode_jurusan){

    $data = table_non_reguler($kode_jurusan);
    try {
      if($data == NULL) throw new Exception($data = NULL);

        return rupiah($data->harga_tiket_1) ;
    } catch (Exception $e) {
        return $e->getMessage();
    }

  }
endif;

if(!function_exists('non_reguler_harga_tiket2')):
  function non_reguler_harga_tiket2($kode_jurusan){

    $data = table_non_reguler($kode_jurusan);
    try {
      if($data == NULL) throw new Exception($data = NULL);

        return rupiah($data->harga_tiket_2) ;
    } catch (Exception $e) {
        return $e->getMessage();
    }

  }
endif;

if(!function_exists('non_reguler_harga_tiket3')):
  function non_reguler_harga_tiket3($kode_jurusan){

    $data = table_non_reguler($kode_jurusan);
    try {
      if($data == NULL) throw new Exception($data = NULL);

        return rupiah($data->harga_tiket_3) ;
    } catch (Exception $e) {
        return $e->getMessage();
    }

  }
endif;

if(!function_exists('non_reguler_harga_tiket4')):
  function non_reguler_harga_tiket4($kode_jurusan){

    $data = table_non_reguler($kode_jurusan);
    try {
      if($data == NULL) throw new Exception($data = NULL);

        return rupiah($data->harga_tiket_4) ;
    } catch (Exception $e) {
        return $e->getMessage();
    }

  }
endif;
if(!function_exists('table_non_reguler')):
  function table_non_reguler($kode_jurusan){

    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select('*');
    $CI->db->from('p_master_biaya_non_reguler');
    $CI->db->where('kode_jurusan', $kode_jurusan);
    return $CI->db->get()->first_row();

  }
endif;




/////////////////////////////////////////////////////////////////////////////////////
////////////////////HARGA TIKET BY KODE //////////////////////////////////////////////
if(!function_exists('harga_tiket_reg_jurusan_umum')):
  function harga_tiket_reg_jurusan_umum($kode_jurusan){
    foreach(table_harga_reg_tiket($kode_jurusan) as $tb):
        echo " <p>".$tb->jumlah_kursi.'- Rp,'.rupiah($tb->umum).'<p>';
    endforeach;
  }
endif;
if(!function_exists('harga_tiket_reg_jurusan_mahasiswa')):
  function harga_tiket_reg_jurusan_mahasiswa($kode_jurusan){
    foreach(table_harga_reg_tiket($kode_jurusan) as $tb):
        echo " <p>".$tb->jumlah_kursi.'- Rp,'.rupiah($tb->mahasiswa).'</p>';
    endforeach;
  }
endif;
if(!function_exists('harga_tiket_reg_jurusan_promo')):
  function harga_tiket_reg_jurusan_promo($kode_jurusan){
    foreach(table_harga_reg_promo($kode_jurusan) as $tb):
        echo " <p>".$tb->jumlah_kursi.'- Rp,'.rupiah($tb->promo).'</p>';
    endforeach;
  }
endif;
if(!function_exists('table_harga_reg_tiket')):
  function table_harga_reg_tiket($kode_jurusan){
    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select('*');
    $CI->db->from('p_master_biaya_reguler_tiket');
    $CI->db->join('p_mobil_kursi','p_mobil_kursi.id_jml_kursi = p_master_biaya_reguler_tiket.id_jml_kursi','left');
    $CI->db->where('kode_jurusan', $kode_jurusan);
    return $CI->db->get()->result();
  }
endif;
//////////////////////////////////////////////////////////////////////////////////////////

// /////////////////////////HARGA KIRIM PAKET////////////////////////////////////////////

if(!function_exists('harga_tiket_kirim_dok')):
  function harga_tiket_kirim_dok($kode_jurusan){
    foreach(table_paket($kode_jurusan) as $tb):
      echo '<p> Rp '.rupiah($tb->harga_dokument_kg_pertama).'/ + '. rupiah($tb->harga_dokument_kg_selanjutnya).'</p>';
    endforeach;
  }
endif;
if(!function_exists('harga_tiket_kirim_barang')):
  function harga_tiket_kirim_barang($kode_jurusan){
    foreach(table_paket($kode_jurusan) as $tb):
      echo '<p> Rp '.rupiah($tb->harga_barang_kg_pertama).'/ + '. rupiah($tb->harga_barang_kg_selanjutnya).'</p>';
    endforeach;
  }
endif;
if(!function_exists('table_paket')):
  function table_paket($kode_jurusan){
    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select('*');
    $CI->db->from('p_master_biaya_paket');
    $CI->db->where('kode_jurusan',$kode_jurusan);
    return $CI->db->get()->result();
  }
endif;


if(!function_exists('harga_paket_harga_dokument_kg_pertama')):
  function harga_paket_harga_dokument_kg_pertama($kode_jurusan)
  {
    $data = table_harga_paket($kode_jurusan);

    try {
      if($data == NULL) throw new Exception($data = NULL);

        return $data->harga_dokument_kg_pertama;
    } catch (Exception $e) {
        $e->getMessage();
    }

  }
endif;

if(!function_exists('harga_paket_harga_dokument_kg_selanjutnya')):
  function harga_paket_harga_dokument_kg_selanjutnya($kode_jurusan)
  {
    $data = table_harga_paket($kode_jurusan);

    try {
      if($data == NULL) throw new Exception($data = NULL);

        return $data->harga_dokument_kg_selanjutnya;
    } catch (Exception $e) {
        $e->getMessage();
    }

  }
endif;

if(!function_exists('harga_paket_harga_barang_kg_pertama')):
  function harga_paket_harga_barang_kg_pertama($kode_jurusan)
  {
    $data = table_harga_paket($kode_jurusan);

    try {
      if($data == NULL) throw new Exception($data = NULL);

        return $data->harga_barang_kg_pertama;
    } catch (Exception $e) {
        $e->getMessage();
    }

  }
endif;

if(!function_exists('harga_paket_harga_barang_kg_selanjutnya')):
  function harga_paket_harga_barang_kg_selanjutnya($kode_jurusan)
  {
    $data = table_harga_paket($kode_jurusan);

    try {
      if($data == NULL) throw new Exception($data = NULL);

        return $data->harga_barang_kg_selanjutnya;
    } catch (Exception $e) {
        $e->getMessage();
    }

  }
endif;

if(!function_exists('harga_paket_harga_charge_bagasi_kg_pertama')):
  function harga_paket_harga_charge_bagasi_kg_pertama($kode_jurusan)
  {
    $data = table_harga_paket($kode_jurusan);

    try {
      if($data == NULL) throw new Exception($data = NULL);

        return $data->harga_charge_bagasi_kg_pertama;
    } catch (Exception $e) {
        $e->getMessage();
    }

  }
endif;

if(!function_exists('harga_paket_harga_charge_bagasi_kg_selanjutnya')):
  function harga_paket_harga_charge_bagasi_kg_selanjutnya($kode_jurusan)
  {
    $data = table_harga_paket($kode_jurusan);

    try {
      if($data == NULL) throw new Exception($data = NULL);

        return $data->harga_charge_bagasi_kg_selanjutnya;
    } catch (Exception $e) {
        $e->getMessage();
    }

  }
endif;

if(!function_exists('harga_paket')):

  function table_harga_paket($kode_jurusan){
    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select('*');
    $CI->db->from('p_master_biaya_paket');
    $CI->db->where('kode_jurusan',$kode_jurusan);
    return $data =  $CI->db->get()->first_row();

  }
endif;
////////////////////////////////////////////////////////////////////////////////////////


// /////////////////////////////Harga OPERASIONAL ///////////////////////////////////////
if(!function_exists('harga_bpo')):
  function harga_bpo($kode_jurusan){
    foreach(table_operasional($kode_jurusan)->result() as $tb):
      echo '<p> Tol    : Rp '.rupiah($tb->biaya_tol).'</p>';
      echo "<p> Sopir  : Rp ".rupiah($tb->biaya_sopir)."</p>";
      echo "<p> Parkir : Rp ".rupiah($tb->biaya_parkir)."</p>";
    endforeach;
  }
endif;


if(!function_exists('table_operasional')):
  function table_operasional($kode_jurusan){
    $CI =& get_instance();
    $CI->load->database();
    $CI->db->select('*');
    $CI->db->from('p_master_biaya_operasional');
    $CI->db->where('kode_jurusan',$kode_jurusan);
    return $CI->db->get();
  }
endif;

if(!function_exists('liter_bbm')):
  function liter_bbm($kode_jurusan,$id_jml_kursi){
    $data = table_liter_bbm($kode_jurusan,$id_jml_kursi);
    return $data->total_liter;
  }
endif;

if(!function_exists('table_liter_bbm')):
    function table_liter_bbm($kode_jurusan,$id_jml_kursi){
      $CI =& get_instance();
      $CI->load->database();
      $CI->db->select('*');
      $CI->db->from('p_master_liter_bbm');
      $CI->db->where('kode_jurusan',$kode_jurusan);
      $CI->db->where('id_jml_kursi',$id_jml_kursi);
      return $CI->db->get()->first_row();

    }
endif;

if(!function_exists('tiket_umum')):
  function tiket_umum($kode_jurusan,$id_jml_kursi){
    $data  = table_tiket($kode_jurusan,$id_jml_kursi);
    try {
        if($data == NULL) throw new Exception($data = NULL);

        return $data->umum;
    } catch (Exception $e) {
         $e->getMessage();
    }

  }
endif;

if(!function_exists('tiket_mahasiswa')):
  function tiket_mahasiswa($kode_jurusan,$id_jml_kursi){
        $data  = table_tiket($kode_jurusan,$id_jml_kursi);
        try {
          if($data == NULL) throw new Exception ($data = NULL);

          return $data->mahasiswa;
        } catch (Exception $e) {
           $e->getMessage();
        }

  }
endif;

if(!function_exists('tiket_promo')):
  function tiket_promo($kode_jurusan,$id_jml_kursi){
        $data  = table_tiket($kode_jurusan,$id_jml_kursi);
        try {
          if($data == NULL) throw new Exception ($data = NULL);

          return $data->promo;
        } catch (Exception $e) {
           $e->getMessage();
        }

  }
endif;

if(!function_exists('table_tiket')):
  function table_tiket($kode_jurusan,$id_jml_kursi){
      $CI =& get_instance();
      $CI->load->database();
      $CI->db->select('*');
      $CI->db->from('p_master_biaya_reguler_tiket');
      $CI->db->where('kode_jurusan',$kode_jurusan);
      $CI->db->where('id_jml_kursi',$id_jml_kursi);
      return $CI->db->get()->first_row();
  }
endif;

/////////////////////////////////////////////////////////////////////////////////////////
