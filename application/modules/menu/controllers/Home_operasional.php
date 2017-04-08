<?php

/**
 * Custommer index module
 */
class Home_operasional extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->Authentikasi         =   $this->Authentikasi();
  }

  public function index()
  {
      $this->title_page('Operasional','fa fa-desktop');
      $this->page('Home_operasional');
  }
}
