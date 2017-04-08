<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembatalan_tiket extends MY_Controller{

          public function __construct()
          {
            parent::__construct();
            $this->Authentikasi           = $this->Authentikasi();
            $load_model                   = $this->load->model(array('pembatalan_tiket_model'));

          }

  function index()
  {
        $this->title_page('Form Pembatalan Tiket');
        $this->page_sub_center("pembatalan_tiket/form_pembatalan/page");
  }

  function proses()
  {
          $proses = (object) $_POST;

          $nomor_tiket = $proses->nomor_tiket;
          $submited = $proses->proses;

          if($submited == "ok")
          {
                $proses_pembatalan = $this->pembatalan_tiket_model->proses_pembatalan($nomor_tiket);

                if($proses_pembatalan == "success")
                {
                      $this->AlertRequest("Berhasil Membatalkan Tiket ","confirm");
                      redirect("operasional/pembatalan/tiket","refresh");
                }else{
                      $this->AlertRequest("Tidak Ada  Nomor Tiket Pada Reservasi ","confirm");
                      redirect("operasional/pembatalan/tiket","refresh");
                }
          }
  }

}
