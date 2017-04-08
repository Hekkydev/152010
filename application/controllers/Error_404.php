<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends Web_Front{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
        echo "tidak ada page";
  }

}
