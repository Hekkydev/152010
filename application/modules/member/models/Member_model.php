<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model{
  function getRows($params = array())
  {
    $this->db->select('*');
    $this->db->from('p_member');
    $this->db->join('p_status','p_status.id_status = p_member.id_status','left');
    $this->db->where('deleted_date',NULL);

    if(!empty($params['search']['keywords'])){
        $this->db->like('nama_depan',$params['search']['keywords']);
        $this->db->or_like('nama_belakang',$params['search']['keywords']);
        $this->db->or_like('kode_member',$params['search']['keywords']);
    }
    //sort data by ascending or desceding order
    if(!empty($params['search']['sortBy'])){
        $this->db->order_by('nama_depan',$params['search']['sortBy']);
    }else{
        $this->db->order_by('id_member','desc');
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
  function MemberAll()
  {
    $this->db->where('deleted_date',NULL);
    return $this->db->get('p_member');
  }


  function insert($data)
  {
    $this->db->set('uuid_member', 'UUID()', FALSE);
    return $this->db->insert('p_member',$data);
  }

  function MemberSearch($id)
  {
    $this->db->like('nama_depan', $id);
    $this->db->like('nama_belakang', $id);
    $this->db->where('deleted_date',NULL);
    return $this->db->get('p_member');
  }

  function password_member_generate($length=8)
  {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
        return $randomString;
  }

  function jenis_member()
  {
      return $Query = $this->db->get('p_member_golongan');
  }

  function get_id($sid)
  {
    return $Query = $this->db->get_where('p_member',$where = array('uuid_member'=>$sid));
  }

  function update($data,$sid)
  {
    $this->db->where('uuid_member',$sid);
    return $this->db->update('p_member',$data);
  }

}
