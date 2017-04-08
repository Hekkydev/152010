<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_barbershop extends MY_Controller{

  public function __construct()
  {
            parent::__construct();
            $this->Authentikasi  = $this->Authentikasi();
  }

  function index()
  {
            $this->title_page('Barbershop','fa fa-cut');
            $this->page("home_barbershop");
  }

}
