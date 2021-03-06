<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barbershop_model extends CI_Model{

  function getRows($params = array())
  {
              $this->db->select('*');
              $this->db->from('p_barbershop_service');
              $this->db->join('p_status','p_status.id_status = p_barbershop_service.id_status','left');
              $this->db->join('p_cabang','p_cabang.uuid_cabang = p_barbershop_service.uuid_cabang','left');
              $this->db->where('p_barbershop_service.deleted_date',NULL);

              if(!empty($params['search']['keywords'])){
                  $this->db->like('kode_service',$params['search']['keywords']);
                  $this->db->or_like('name_service',$params['search']['keywords']);
                  $this->db->or_like('nama_cabang',$params['search']['keywords']);
              }
              //sort data by ascending or desceding order
              if(!empty($params['search']['sortBy'])){
                  $this->db->order_by('kode_service',$params['search']['sortBy']);
              }else{
                  $this->db->order_by('id_barbershop_service','desc');
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


    function product_service()
    {
          $this->db->select('*');
          $this->db->from('p_barbershop_service');
          $this->db->join('p_status','p_status.id_status = p_barbershop_service.id_status','left');
          $this->db->where('deleted_date',NULL);
          return $this->db->get();
    }
    function get_kode($kode_service)
    {
          $this->db->select('*');
          $this->db->from('p_barbershop_service');
          $this->db->join('p_status','p_status.id_status = p_barbershop_service.id_status','left');
          $this->db->join('p_cabang','p_cabang.uuid_cabang = p_barbershop_service.uuid_cabang','left');
          $this->db->where('p_barbershop_service.deleted_date',NULL);
          $this->db->where('p_barbershop_service.kode_service', $kode_service);
          return $this->db->get()->first_row();
    }
    function insert($data)
    {
          return $this->db->insert('p_barbershop_service',$data);
    }

    function update($data,$kode_service)
    {
          $this->db->where('p_barbershop_service.kode_service', $kode_service);
          return $this->db->update('p_barbershop_service',$data);
    }

    function AutoKodeBarbershop_service()
    {
            $q = $this->db->query("select MAX(RIGHT(p_barbershop_service.kode_service,3)) as kd_max from `p_barbershop_service`");
            $kd = "";
            if($q->num_rows()>0)
            {
                foreach($q->result() as $k)
                {
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }
            else
            {
                $kd = "001";
            }

            return "B".$kd;
          }
}
