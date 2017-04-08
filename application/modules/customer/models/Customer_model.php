<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model{

  // load function generate auto kode customer model
  function generate($length = 7) {

      $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
          }
      return $randomString;
  }

  // insert function customer
  function simpan_customer($data)
  {
        return $this->db->insert('p_customers_all', $data);
  }


  function cek_customer($telp_customers)
  {
      $kriteria = array('telp_customers'=>$telp_customers);
      return $this->db->get_where('p_customers_all', $kriteria)->num_rows();
  }

  function update_customer($data,$telp_customers)
  {
      $this->db->where('telp_customers',$telp_customers);
      return $this->db->update('p_customers_all', $data);
  }

}
