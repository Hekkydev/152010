<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_carter extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
        $this->page_form("reservasi_carter/page");
  }

}
