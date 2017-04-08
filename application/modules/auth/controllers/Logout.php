<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $id = $this->session->userdata('userId');
    $online = $this->UpdateLogout($id,2);
    if($online){
          $this->session->unset_userdata('isUserLoggedIn');
          $this->session->unset_userdata('userId');
          $this->session->sess_destroy();
          redirect('login','refresh');
    }
  }

}
