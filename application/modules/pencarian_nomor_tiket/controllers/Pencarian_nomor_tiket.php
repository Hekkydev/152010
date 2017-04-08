<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian_nomor_tiket extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi           = $this->Authentikasi();
    $this->pencarian              = "operasional/pencarian_nomor_tiket";
    $this->AllKota                = $this->AllKota()->result();
    $this->AllMobil               = $this->AllMobil()->result();
    $this->AllSopir               = $this->AllSopir()->result();
  }

  function index()
  {
    $data['mobil'] = $this->AllMobil;
    $data['sopir'] = $this->AllSopir;
    $data['kota'] = $this->AllKota;
    $this->title_page("Reservasi Reguler");
    $this->page_form("pencarian_nomor_tiket/page",$data);
  }

  function listData()
  {
    $nomor_handphone = $this->input->post('nomor');
    $data['pencarian_nomor'] = $this->pencarian_nomor_model->get_pencarian_nomor($nomor_handphone);
    $this->page_load('pencarian_nomor_tiket/list',$data);
  }

}
