<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model{

  function getRows($params = array())
  {
    $this->db->select("*");
    $this->db->from("p_pengumuman");
    $this->db->join("p_users","p_users.uuid_user = p_pengumuman.uuid_user","left");
    $this->db->where("p_pengumuman.deleted_date",NULL);

    if(!empty($params['search']['keywords'])){
        $this->db->like('p_pengumuman.judul_pengumuman',$params['search']['keywords']);
        $this->db->or_like('p_pengumuman.ket_pengumuman',$params['search']['keywords']);
        $this->db->or_like('p_pengumuman.created_date',$params['search']['keywords']);
    }
    //sort data by ascending or desceding order
    if(!empty($params['search']['sortBy'])){
        $this->db->order_by('p_pengumuman.created_date',$params['search']['sortBy']);
    }else{
        $this->db->order_by('p_pengumuman.id_pengumuman','desc');
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

  function getID($sid)
  {
    $this->db->select("
    p_pengumuman.uuid_pengumuman,
    p_pengumuman.judul_pengumuman,
    p_pengumuman.created_date,
    p_pengumuman.last_change_date,
    p_pengumuman.ket_pengumuman,
    p_users.nama_lengkap,
    p_users.uuid_user
    ");
    $this->db->from("p_pengumuman");
    $this->db->join("p_users","p_users.uuid_user = p_pengumuman.uuid_user","left");
    $this->db->where("p_pengumuman.deleted_date",NULL);
    $this->db->where("p_pengumuman.uuid_pengumuman",$sid);
    return $this->db->get();
  }


  function insert($data)
  {
    $this->db->set('uuid_pengumuman', 'UUID()', FALSE);
    return $this->db->insert("p_pengumuman",$data);
  }

  function update($data,$uuid)
  {
    $condition = array("uuid_pengumuman"=>$uuid);
    return $this->db->update('p_pengumuman', $data, $condition);
  }

  function delete($data,$uuid)
  {
    $condition = array("uuid_pengumuman"=>$uuid);
    return $this->db->update('p_pengumuman', $data, $condition);
  }

  function AllPengumuman()
  {
    $this->db->where('deleted_date',NULL);
    return $this->db->get('p_pengumuman');
  }


}
