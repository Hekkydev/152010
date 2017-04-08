<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operasional_laporan_keuangan extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi       = $this->Authentikasi();
    $this->my_user            = $this->UUID_User();

  }

  function index()
  {
      $data = array();
      $this->page_form("operasional_laporan_keuangan/page.php",$data);
  }

}
