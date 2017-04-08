<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_pencarian_nomor extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi         = $this->Authentikasi();
  }

  function index()
  {

      $this->page_form("menu/operasional_menu/Home_pencarian_nomor");

  }

}
