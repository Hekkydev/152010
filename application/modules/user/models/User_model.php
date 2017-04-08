<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model User
 */
class User_model extends CI_Model
{
  function getRows($params = array())
  {
    $this->db->select(' p_users.nama_lengkap,
                        p_users.kode_user,
                        p_users.no_telp,
                        p_users.no_reg,
                        p_cabang.nama_cabang,
                        p_users_group.tipe_group,
                        p_status.tipe_status,
                        p_users.uuid_user,
    ');
    $this->db->from('p_users');
    $this->db->join('p_users_access','p_users_access.kode_user = p_users.kode_user','left');
    $this->db->join('p_users_group', 'p_users_group.id_user_group = p_users.id_user_group', 'left');
    $this->db->join('p_cabang','p_cabang.id_cabang = p_users.id_cabang','left');
    $this->db->join('p_status','p_status.id_status = p_users.id_status','left');
    $this->db->where('p_users.deleted_date',NULL);
    //filter data by searched keywords
    if(!empty($params['search']['keywords'])){
        $this->db->like('nama_lengkap',$params['search']['keywords']);
        $this->db->or_like('no_reg',$params['search']['keywords']);
        $this->db->or_like('nama_cabang',$params['search']['keywords']);
    }
    //sort data by ascending or desceding order
    if(!empty($params['search']['sortBy'])){
        $this->db->order_by('nama_lengkap',$params['search']['sortBy']);
    }else{
        $this->db->order_by('id_user','desc');
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

  function AllUser()
  {
    $this->db->select('*');
    $this->db->from('p_users');
    $this->db->join('p_users_access','p_users_access.kode_user = p_users.kode_user','left');
    $this->db->join('p_users_group','p_users_group.id_user_group = p_users.id_user_group','left');
    $this->db->join('p_cabang','p_cabang.id_cabang = p_users.id_cabang','left');
    $this->db->join('p_status','p_status.id_status = p_users.id_status','left');
    $this->db->join('p_status_online','p_status_online.id_status_online = p_users.id_status_online','left');
    $this->db->where('p_users.deleted_date',NULL);
    $this->db->order_by('p_users.id_status_online',"ASC");
    return $q = $this->db->get();

  }

  function cek_username_password_lain($username,$password)
  {
    $this->db->select('*');
    $this->db->from('p_users');
    $this->db->join('p_users_access','p_users_access.kode_user = p_users.kode_user','left');
    $this->db->join('p_cabang','p_cabang.id_cabang = p_users.id_cabang','left');
    $this->db->join('p_status','p_status.id_status = p_users.id_status','left');
    $this->db->where('p_users_access.username',$username);
    $this->db->where('p_users_access.password',$username);

    return $q = $this->db->get();
  }

  function insert($data_karyawan,$data_login)
  {
      if($data_karyawan == TRUE):
        $this->db->set('uuid_user', 'UUID()', FALSE);
        $query  =   $this->db->insert('p_users',$data_karyawan);
      endif;
      if ($data_login == TRUE):
        $query =   $this->db->insert('p_users_access',$data_login);
      endif;


      return $query;
  }

  function getUUID($uuid)
  {
    $this->db->select(' p_users.nama_lengkap,
                        p_users.kode_user,
                        p_users.no_telp,
                        p_users.no_reg,
                        p_cabang.nama_cabang,
                        p_users_group.tipe_group,
                        p_status.tipe_status,
                        p_users.uuid_user,
                        p_users.id_status,
                        p_users_group.id_user_group,
                        p_users_access.username,
                        p_users.no_ktp,
                        p_users.alamat_user,
                        p_users.email,
                        p_users.id_cabang
    ');
    $this->db->from('p_users');
    $this->db->join('p_users_access','p_users_access.kode_user = p_users.kode_user','left');
    $this->db->join('p_users_group', 'p_users_group.id_user_group = p_users.id_user_group', 'left');
    $this->db->join('p_cabang','p_cabang.id_cabang = p_users.id_cabang','left');
    $this->db->join('p_status','p_status.id_status = p_users.id_status','left');
    $this->db->where('p_users.deleted_date',NULL);
    $this->db->where('p_users.uuid_user', $uuid);
    return $this->db->get();
  }



  function update_data($table,$data,$key)
  {
      $this->db->where('kode_user',$key);
      return $this->db->update($table,$data);
  }


}
