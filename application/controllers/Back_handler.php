<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back_handler extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

  }

  function index()
  {
      echo anchor('/', 'kembali').' Module belum siap';

  }

}
