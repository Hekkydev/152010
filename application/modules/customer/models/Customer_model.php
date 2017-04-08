<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model{

function getRows($params = array())
  {
    $this->db->select('*');
    $this->db->from('p_customers_all');
    $this->db->where('deleted_date',NULL);
    if(!empty($params['search']['keywords'])){
        $this->db->like('nama_customers',$params['search']['keywords']);
        $this->db->or_like('telp_customers',$params['search']['keywords']);
    }
    //sort data by ascending or desceding order
    if(!empty($params['search']['sortBy'])){
        $this->db->order_by('nama_customers',$params['search']['sortBy']);
    }else{
        $this->db->order_by('id_customers','desc');
    }
    //set start and limit
    if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
        $this->db->limit($params['limit'],$params['start']);
    }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
        $this->db->limit($params['limit']);
    }
    //get records
    $query = $this->db->get();
    //return fetched data
    return ($query->num_rows() > 0) ? $query->result() : FALSE;
  }


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
