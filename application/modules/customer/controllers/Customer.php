<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi         = $this->Authentikasi();
    $load_model                 = $this->load->model(array('customer_model'));
    $this->AutoNumber           = $this->customer_model->generate();
    $this->waktu_skr            = $this->waktu_skr();

  }

  function index()
  {
      $this->title_page('Customer');
      $this->page_sub('customer/page');
  }

  public function listData()
  {
      
  }

  function insert()
  {
          $post = (object) $_POST;

          $data_customers = array(
            'kode_customers'=>$this->AutoNumber,
            'telp_customers'=>$post->nomor_telephone,
            'nama_customers'=>$post->nama_customers,
            'created_date'=>$this->waktu_skr,
          );

          if($data_customers)
          {
            $simpan = $this->customer_model->simpan_customer($data_customers);
            if ($simpan == TRUE) {
              echo "success";
            }else{
              echo "error";
            }

          }

  }


  

}
