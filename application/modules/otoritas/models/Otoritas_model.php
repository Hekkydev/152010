<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otoritas_model extends CI_Model{

  public function AllOtoritas()
  {
    return $this->db->get('p_users_group');
  }

}
