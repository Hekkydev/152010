<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Module Pengaturan Index
 */
class Pengaturan_umum extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->Authentikasi = $this->Authentikasi();
    $this->getCompany = $this->app_model->getCompany();
    $this->pengaturan = "pengaturan_umum";
  }

  public function index()
  {

    $data['comp'] = $this->getCompany;
    $this->title_page('Pengaturan Umum');
    $this->page_sub_center_large('Pengaturan_umum/edit',$data);

  }


  function update()
  {
      if($this->input->post('update') == TRUE):
        $data = array(
          'nama_company'=>$this->input->post('nama_company'),
          'alamat_company'=>$this->input->post('alamat_company'),
          'telp_company'=>$this->input->post('telp_company'),
          'email_company'=>$this->input->post('email_company'),
          'fax_company'=>$this->input->post('fax_company'),
          'web_company'=>$this->input->post('web_company'),
        );
        $id = $this->input->post('ID');
        $update = $this->app_model->update_company($data,$id);
        if($update == TRUE):
                $this->AlertRequest("Berhasil Mengupdate","confirm");
          redirect($this->pengaturan);
        endif;
      endif;
  }


}
