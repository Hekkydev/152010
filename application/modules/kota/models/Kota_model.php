<?php

/**
 * Model Kota
 */
class Kota_model extends CI_Model
{
  function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('p_kota');
        $this->db->where('deleted_date',NULL);
        //filter data by searched keywords
        if(!empty($params['search']['keywords'])){
            $this->db->like('nama_kota',$params['search']['keywords']);
        }
        //sort data by ascending or desceding order
        if(!empty($params['search']['sortBy'])){
            $this->db->order_by('nama_kota',$params['search']['sortBy']);
        }else{
            $this->db->order_by('id_kota','desc');
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

  function AllKota()
  {
    $this->db->where('deleted_date',NULL);
    return $q = $this->db->get('p_kota');
  }

  function getIDkota($uuid)
  {
    $this->db->where('uuid_kota',$uuid);
    return $q = $this->db->get('p_kota');
  }


  function insert($data)
  {
    $this->db->set('uuid_kota', 'UUID()', FALSE);
    return $q = $this->db->insert('p_kota',$data);
  }

  function hapusID($id)
  {

    $date = array('deleted_date'=>date('Y-m-d H:i:s'));
    $this->db->where('uuid_kota',$id);
    return $q = $this->db->update('p_kota',$date);

  }

  function updateID($uuid,$data)
  {
    $this->db->where('uuid_kota',$uuid);
    return $q = $this->db->update('p_kota',$data);

  }


}
