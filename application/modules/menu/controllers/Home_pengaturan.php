<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Module Pengaturan Index
 */


class Home_pengaturan extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->Authentikasi = $this->Authentikasi();
  }

  public function index($menu_pilihan = null)
  {

    
    $this->title_page('Pengaturan','fa fa-database');
    $this->page('Home_pengaturan');
  }
}
