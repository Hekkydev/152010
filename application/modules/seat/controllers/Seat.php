<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seat extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->KursiMobil           = $this->KursiMobil();

  }

  function index()
  {
        $data['kursi'] = $this->KursiMobil;
        $this->title_page("Kursi Mobil");
        $this->page_sub("page",$data);
  }

}
