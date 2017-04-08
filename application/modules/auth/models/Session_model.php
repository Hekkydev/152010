<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_model extends CI_Model{

  function insert($data)
  {
    return $this->db->insert('p_sessions', $data);
  }

  function get($uuid)
  {
    $w = array('uuid_user'=>$uuid);
    return $this->db->get_where('p_sessions', $w);
  }

  function update($uuid,$data)
  {
    return $this->db->update('p_sessions', $data, $condition = array('uuid_user'=>$uuid));
  }

}
