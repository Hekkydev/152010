<?php

/**
 * Custommer index module
 */
class Home_shuttle extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->Authentikasi = $this->Authentikasi();
  }

  public function index()
  {
      $this->title_page('Shuttle','fa fa-car');
      $this->page('Home_shuttle');
  }
}
