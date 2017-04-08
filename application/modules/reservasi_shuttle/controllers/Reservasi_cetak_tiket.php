<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_cetak_tiket extends MY_Controller{

      public function __construct()
      {
        parent::__construct();
        $this->Authentikasi         = $this->Authentikasi();

      }

  function proses()
  {
        $post = (object) $_GET;
        $kode_booking = $post->kode_booking;
        $data['reservasi'] = $this->reservasi_model->get_informasi_tiket($kode_booking)->result();
        $this->load->view('reservasi_shuttle/print/print_tiket', $data);
  }

}
