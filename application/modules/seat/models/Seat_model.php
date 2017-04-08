<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Seat Model Reservation Layout
 */
class Seat_model extends CI_Model
{
    
    public function __construct()
    {
        $this->table = "p_mobil_kursi";
    }

    public function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->table);
        // $this->db->join('p_status','p_status.id_status = p_member.id_status','left');
        // $this->db->where('deleted_date',NULL);

        if(!empty($params['search']['keywords'])){
            $this->db->like('jumlah_kursi',$params['search']['keywords']);
            $this->db->or_like('tipe_jenis_kursi',$params['search']['keywords']);
            
        }
        //sort data by ascending or desceding order
        if(!empty($params['search']['sortBy'])){
            $this->db->order_by('id_jml_kursi',$params['search']['sortBy']);
        }else{
            $this->db->order_by('id_jml_kursi','desc');
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
}



/* End of file seat_model.php */
