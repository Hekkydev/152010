<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian_nomor_resi extends MY_Controller{

  public function __construct()
  {
              parent::__construct();
              $this->Authentikasi         = $this->Authentikasi();
              $this->load->model(array('pencarian_nomor_resi_model'));
              $this->pencarian            = "operasional/pencarian_nomor_resi";
  }

  function index()
  {
              $data = array();
              $this->page_form("pencarian_nomor_resi/page",$data);
  }


  function listData()
  {

              $nomor_handphone = $this->input->post('nomor_resi');
              $data['paket'] = $this->pencarian_nomor_resi_model->get_pencarian_nomor($nomor_handphone)->result_object();
              // echo "<pre>";
              // print_r($data);
              // echo "</pre>";
              $this->page_load('pencarian_nomor_resi/list',$data);
  }

}
