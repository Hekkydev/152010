<?php
/**
 * Pengaturan Module Otoritas
 */
class Otoritas extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->Authentikasi = $this->Authentikasi();
    $this->AllOtoritas = $this->AllOtoritas()->result();
  }

  function index()
  {
    $data['otoritas'] = $this->AllOtoritas;
    $this->title_page("Otoritas");
    $this->page_sub_center('Otoritas/list',$data);
  }


}
