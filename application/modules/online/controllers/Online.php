<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Online extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi           = $this->Authentikasi();
    $this->Online                 = "operasional/online";
    $this->AllUsers               = $this->AllUsers()->result();
  }

  function index()
  {
      $data['users']  = $this->AllUsers;
      $this->title_page("Users Online");
      $this->page_sub("page",$data);
  }

}
