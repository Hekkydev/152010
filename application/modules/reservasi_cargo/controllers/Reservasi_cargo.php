<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_cargo extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
        $this->Authentikasi           = $this->Authentikasi();
        $this->AllKota                = $this->AllKota()->result();
        $this->AllMobil               = $this->AllMobil()->result();
        $this->AllSopir               = $this->AllSopir()->result();
        $this->waktu_skr              = $this->waktu_skr();
        $this->PaketDiscount          = $this->discount_model->PaketDiscount()->result();


        $model = $this->load->model(array('cargo_model'));
        $this->nomor_resi_paket = $this->cargo_model->nomor_resi_paket();
        $this->kode_pengiriman  = $this->cargo_model->kode_pengiriman();
        $this->pengiriman_paket = $this->cargo_model->get_pengiriman()->result_object();
        $this->jenis_pengiriman = $this->cargo_model->get_jenis_pengiriman()->result_object();
  }

  function index()
  {
        $data['kota'] = $this->AllKota;
        $data['sopir'] = $this->AllSopir;
        $data['mobil'] = $this->AllMobil;
        $data['jenis_pengiriman'] = $this->jenis_pengiriman;
        $data['discount']  = $this->PaketDiscount;

        //print_r($this->PaketDiscount); die();
        $this->page_form("page",$data);
  }

  // AJAX REQUEST POINT KEBERANGKATAN //
  function point_keberangkatan()
  {
        $UUID_kota = $this->input->post('kota',TRUE);
    	  if($UUID_kota == TRUE):
    			$cabang = cabang_helper($UUID_kota)->result();
          foreach($cabang as $cb):
    				echo '<option value="'.$cb->uuid_cabang.'">'.$cb->nama_cabang.'</option>';
    			endforeach;
    	  else:
    			$this->AlertRequest("Tentukan Asal Keberangkatan","confirm");
    	  endif;
  }

  function tujuan_keberangkatan()
  {
        $UUID_kota = $this->input->post('kota',TRUE);
    	  $UUID_asal = $this->input->post('asal',TRUE);

    	  $tujuan = TujuanCabang($UUID_kota,$UUID_asal);
    	  foreach($tujuan as $cb):
    				echo '<option value="'.$cb->uuid_cabang.'">'.$cb->nama_cabang.'</option>';
    	  endforeach;
  }

  function search_jadwal()
  {
        $data['tgl_berangkat'] = $this->input->post('tgl_berangkat');
        $data['point']  = $this->input->post('asal_keberangkatan');
        $data['tujuan'] = $this->input->post('tujuan_keberangkatan');
        $point          =  $data['point'];
        $tujuan         = $data['tujuan'];
        $data['jadwal_keberangkatan'] = $this->jadwal_model->get_jadwal_keberangkatan($point,$tujuan);
        $this->page_load('jadwal/data_jadwal',$data);
  }

  function detail_jadwal()
  {
        $data['tgl_berangkat'] = $this->input->post('tgl_berangkat');
        $data['kode_jadwal']  = $this->input->post('kode_jadwal');
        $data['point'] = $this->input->post('asal_keberangkatan');
        $data['tujuan'] = $this->input->post('tujuan_keberangkatan');
        $data['jam'] = $this->input->post('jam');
        $data['kode'] = $this->input->post('kode');
        $kode_jadwal = $this->input->post('kode_jadwal');
        $jadwal_post = (object) $_POST;
        // ------------KODE MANIFEST --------------------------------------//
        $kode_manifest = kode_manifest($jadwal_post);
        $data['kode_manifest'] = $kode_manifest;
        // -----------/KODE MANIFEST --------------------------------------//

        $data['jadwal_post'] = (object) $_POST;
        $data['jadwal_keberangkatan'] = $this->jadwal_model->get_detail_jadwal_keberangakatan($data['kode_jadwal']);

        $data['biaya'] = $this->jurusan_model->cek_jurusan_by_asal_and_tujuan($data['point'],$data['tujuan'])->first_row();
        $data['paket'] = $this->cargo_model->get_pengiriman_by_manifest_and_jadwal($kode_manifest,$kode_jadwal)->result_object();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->page_load('jadwal/detail_jadwal',$data);
  }

  function detail_paket()
  {
        $paket = (object) $_POST;
        $data['paket'] = $this->cargo_model->get_pengiriman_by_nomor_resi($paket->nomor_resi_paket)->first_row();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->page_load('checkout/detail_paket',$data);
  }

  function pembatalan_paket()
  {
        $nomor_resi_paket = $this->input->post('nomor_resi_paket');
        $data = array(
            'deleted_date'=>$this->waktu_skr,
        );
        $batalkan = $this->cargo_model->pembatalan_paket($data,$nomor_resi_paket);
        if ($batalkan == TRUE) {
            echo "success";
        }else{
            echo "error";
        }
  }

  function check_customers()
  {        
            $nomor = $this->input->post('nomor',TRUE);      
            $data = $this->general->check_phone($nomor);
            echo json_encode($data);
  }

  

}
