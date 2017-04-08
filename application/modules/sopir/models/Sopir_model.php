<?php
/**
 * Model Sopir Pengaturan
 */
class Sopir_model extends CI_Model
{

  function getRows($params = array())
  {
    $this->db->select('p_sopir.nama_lengkap,
                       p_sopir.id_sopir,
                       p_sopir.kode_sopir,
                       p_sopir.no_ktp,
                       p_sopir.no_hp,
                       p_sopir.no_sim,
                       p_sopir.id_status,
                       p_sopir.alamat_sopir,
                       p_sopir.uuid_sopir,
                       p_status.tipe_status
    ');
    $this->db->from('p_sopir');
    $this->db->join('p_status','p_status.id_status = p_sopir.id_status','left');
    $this->db->where('p_sopir.deleted_date',NULL);
    if(!empty($params['search']['keywords'])){
        $this->db->like('nama_lengkap',$params['search']['keywords']);
        $this->db->or_like('kode_sopir',$params['search']['keywords']);
        $this->db->or_like('no_ktp',$params['search']['keywords']);
    }
    //sort data by ascending or desceding order
    if(!empty($params['search']['sortBy'])){
        $this->db->order_by('nama_lengkap',$params['search']['sortBy']);
    }else{
        $this->db->order_by('id_sopir','desc');
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
  function AllSopir()
  {
        $this->db->select('p_sopir.nama_lengkap,
                           p_sopir.id_sopir,
                           p_sopir.kode_sopir,
                           p_sopir.no_ktp,
                           p_sopir.no_hp,
                           p_sopir.no_sim,
                           p_sopir.id_status,
                           p_sopir.alamat_sopir,
                           p_sopir.uuid_sopir,
                           p_status.tipe_status
        ');
        $this->db->from('p_sopir');
        $this->db->join('p_status','p_status.id_status = p_sopir.id_status','left');
        $this->db->where('p_sopir.deleted_date',NULL);
        return $q = $this->db->get();

  }

  function getID($uuid)
  {
        $this->db->select('p_sopir.nama_lengkap,
                           p_sopir.id_sopir,
                           p_sopir.kode_sopir,
                           p_sopir.no_ktp,
                           p_sopir.no_hp,
                           p_sopir.no_sim,
                           p_sopir.id_status,
                           p_sopir.alamat_sopir,
                           p_sopir.uuid_sopir,
                           p_status.tipe_status
        ');
        $this->db->from('p_sopir');
        $this->db->join('p_status','p_status.id_status = p_sopir.id_status','left');
        $this->db->where('p_sopir.deleted_date',NULL);
        $this->db->where('p_sopir.uuid_sopir',$uuid);
        return $q = $this->db->get();
  }

  function insert($data)
  {
    $this->db->set('uuid_sopir', 'UUID()', FALSE);
    return $q = $this->db->insert('p_sopir',$data);
  }

  function update($data,$uuid)
  {
      $this->db->where('p_sopir.uuid_sopir',$uuid);
    return $q = $this->db->update('p_sopir',$data);
  }

  function delete($data,$uuid)
  {
    $this->db->where('p_sopir.id_sopir',$uuid);
    return $q = $this->db->update('p_sopir',$data);
  }


}
