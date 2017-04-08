<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_customer extends MY_Controller{

  function __construct()
  {
    parent::__construct();
    $this->Authentikasi         =   $this->Authentikasi();
  }

  public function index()
  {
      $this->title_page('Customer','fa fa-users');
      $this->page('Home_customer');
  }

}
