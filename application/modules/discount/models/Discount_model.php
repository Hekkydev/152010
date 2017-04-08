<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discount_model extends CI_Model{

    function getRows($params = array())
    {
            $this->db->select('*');
            $this->db->from('p_tarif_diskon');
            $this->db->join('p_status', 'p_status.id_status = p_tarif_diskon.id_status', 'left');
            $this->db->where('deleted_date',NULL);
            if(!empty($params['search']['keywords'])){
              $this->db->like('jenis_operasional',$params['search']['keywords']);
              $this->db->or_like('jumlah_tarif_diskon',$params['search']['keywords']);
              $this->db->or_like('informasi_diskon',$params['search']['keywords']);
            }
            //sort data by ascending or desceding order
            if(!empty($params['search']['sortBy'])){
                $this->db->order_by('id_tarif_diskon',$params['search']['sortBy']);
            }else{
                $this->db->order_by('id_tarif_diskon','desc');
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

    function AllDiscount()
    {
          $where = array('deleted_date'=>NULL);
          return $this->db->get_where('p_tarif_diskon',$where);
    }

    function PaketDiscount()
    {
          $this->db->where('jenis_operasional','paket');
          $this->db->where('id_status',1);
          $this->db->where('deleted_date',NULL);
          return $this->db->get('p_tarif_diskon');
    }

    function ShuttleDiscount()
    {
          $this->db->where('jenis_operasional','shuttle');
          $this->db->where('id_status',1);
          $this->db->where('deleted_date',NULL);
          return $this->db->get('p_tarif_diskon');
    }

    function entri_discount($data)
    {
          return $this->db->insert('p_tarif_diskon',$data);
    }

    function remove_discount($data,$id)
    {
        return $this->db->update('p_tarif_diskon',$data,$condition = array('id_tarif_diskon'=>$id));
    }

    function change_status($data,$id)
    {
        return $this->db->update('p_tarif_diskon',$data,$condition = array('id_tarif_diskon'=>$id));
    }
}
