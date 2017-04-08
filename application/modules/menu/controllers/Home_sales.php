<?php

/**
 * Custommer index module
 */
class Home_sales extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->Authentikasi = $this->Authentikasi();
  }

  public function index()
  {
      $this->title_page('Sales','fa fa-file');
      $this->page('Home_sales');
  }
}
