<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjadwalan_kendaraan extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi = $this->Authentikasi();
    $this->AllKota      = $this->AllKota()->result();
    $this->waktu_skr    = $this->waktu_skr();
    $this->p_kendaraan  = "penjadwalan_kendaraan";
    $this->perPage      = 20;
  }

  function index()
  {
    $data['kota'] = $this->AllKota;
    $this->title_page("Penjawalan Kendaraan");
    $this->page_sub("penjadwalan_kendaraan/page",$data);
  }

  function listData()
  {
      $asal = $this->input->post('asal_keberangkatan');
      $tujuan = $this->input->post('tujuan_keberangkatan');
      $data = array();
      $jadwal = $this->jadwal_model->get_penjadwalan_kendaraan($asal,$tujuan);
      $data['jadwal'] = $jadwal;
      $this->page_load('penjadwalan_kendaraan/list',$data);
  }



  function form_asal_to_tujuan()
  {

    $asal = $this->input->post('asal_keberangkatan');
    $kota = jadwal_tujuan_jurusan($asal);

    echo '<option value="" selected="" disabled="">Pilih Tujuan</option>';
    foreach ($kota as $k) :
      $cabang = jadwal_tujuan_jurusan_cabang($k['uuid_kota'],$asal);
         echo "<optgroup label='".$k['nama_kota']."'>";
         foreach($cabang as $c):
         echo "<option value=".$c['uuid_cabang'].">".$c['nama_cabang']." (".$c['kode_cabang'].")"."</option>";
         endforeach;
      echo "</optgroup>";
    endforeach;
  }

  function set_module_sopir()
  {
        $data['sopir'] = $this->sopir_model->AllSopir()->result();
        $data['kode_jadwal'] = $this->input->post('kode_jadwal');
        $data['kode_atr'] = $this->input->post('kode_atr');
        $data['tgl_setup'] = $this->input->post('tgl_setup');

        $this->page_load("penjadwalan_kendaraan/setup_sopir",$data);
  }

  function set_module_mobil()
  {
        $data['mobil'] = $this->mobil_model->AllMobil()->result();
        $data['kode_jadwal'] = $this->input->post('kode_jadwal');
        $data['kode_atr'] = $this->input->post('kode_atr');
        $data['tgl_setup'] = $this->input->post('tgl_setup');

        $this->page_load("penjadwalan_kendaraan/setup_mobil",$data);
  }

  function setup_mobil_insert()
  {
          $data['kode_jadwal'] = $this->input->post('kode_jadwal');
          $data['tgl_setup'] = $this->input->post('tgl_setup');
          $data['uuid_mobil_unit'] = $this->input->post('uuid_mobil_unit');
          $data['uuid_user'] = $this->UUID_user();
          $request_data_mobil = array(
            'kode_jadwal' =>$this->input->post('kode_jadwal'),
            'tanggal_reservasi'=>$this->input->post('tgl_setup'),
            'uuid_mobil_unit'=>$this->input->post('uuid_mobil_unit'),
            'uuid_user'=>$this->UUID_user(),
          );

          $setup_mobil = $this->penjadwalan->save_data_mobil($request_data_mobil);
          if($setup_mobil){
            echo "Berhasil Mengatur Jadwal Kendaraan";
          }

  }

  function setup_sopir_insert()
  {
          $data['kode_jadwal'] = $this->input->post('kode_jadwal');
          $data['tgl_setup'] = $this->input->post('tgl_setup');
          $data['uuid_sopir'] = $this->input->post('uuid_sopir');
          $data['uuid_user'] = $this->UUID_user();

          $request_data_sopir = array(
            'kode_jadwal' =>$this->input->post('kode_jadwal'),
            'tanggal_reservasi'=>$this->input->post('tgl_setup'),
            'uuid_sopir'=>$this->input->post('uuid_sopir'),
            'uuid_user'=>$this->UUID_user(),
          );

          $setup_sopir = $this->penjadwalan->save_data_sopir($request_data_sopir);
          if($setup_sopir){
            echo "Berhasil Mengatur Jadwal Kendaraan";
          }

  }

}
