<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_barbershop extends MY_Controller{

  public function __construct()
  {
          parent::__construct();
          $this->Authentikasi       = $this->Authentikasi();
          $this->AllCabang          = $this->AllCabang()->result();

          $this->model              = $this->load->model(array('r_barbershop_model'));
          $this->library            = $this->load->library(array('cart'));
  }

  function index()
  {

          $data['cabang'] = $this->AllCabang;
          $this->page_form('reservasi_barbershop/page',$data);
  }

  function get_service_cabang()
  {
        $uuid_cabang = $this->input->post('uuid_cabang');
        $service = $this->r_barbershop_model->get_service_cabang($uuid_cabang);

        foreach ($service as $s) {
          echo $options = "<option value='".$s->kode_service."'>".$s->name_service.' - '.rupiah($s->harga_service)."</option>";
        }
  }

  function get_barber_cabang()
  {
        $uuid_cabang = $this->input->post('uuid_cabang');
        $service = $this->r_barbershop_model->get_barber_cabang($uuid_cabang);
          echo $options = "<option value='' selected='' disabled=''>Pilih Tukang</option>";
        foreach ($service as $s) {
          echo $options = "<option value='".$s->kode_pegawai."'>(".$s->kode_pegawai.')  - '.$s->nama_pegawai."</option>";
        }
  }

  function simpan_ke_cart()
  {
        $kode_service = $this->input->post('kode_service');
        $service_data = $this->r_barbershop_model->get_kode($kode_service);
        //print_r($service_data); die();
        $data = array(
              'id'      => $service_data->id_barbershop_service,
              'qty'     => 1,
              'price'   => $service_data->harga_service,
              'name'    => $service_data->name_service,
              'coupon'  => $service_data->kode_service,
        );


      $this->cart->insert($data);
  }

  function load_cart()
  {
        $this->page_load('reservasi_barbershop/entri/cart');
  }

  function cart_destroy()
  {
        $this->cart->destroy();
  }

  function remove_cart()
  {
        $rowid = $this->input->post('rowid');
        $data = array(
        'rowid' => $rowid,
        'qty'   => 0
        );

        $this->cart->update($data);
  }


}
