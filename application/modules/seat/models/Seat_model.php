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



    public function get_id($sid)
    {
                $this->db->where('id_jml_kursi',$sid);
        return  $this->db->get($this->table)->first_row();
    }

    public function cek_block($sid,$nomor_layout)
    {
        $this->db->where('id_jml_kursi',$sid);
        $this->db->where('nomor_layout',$nomor_layout);
        return $this->db->get_where('p_mobil_kursi_layout')->first_row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }

    public function insert_block($data)
    {
        return $this->db->insert('p_mobil_kursi_layout',$data);
    }

    public function update_block($data,$sid,$nomor_layout)
    {
         return $this->db->update('p_mobil_kursi_layout',$data,$where = array('id_jml_kursi'=>$sid,'nomor_layout'=>$nomor_layout));
    }

    public function remove_block($sid,$nomor_layout)
    {
        $this->db->where('id_jml_kursi',$sid);
        $this->db->where('nomor_layout',$nomor_layout);
        return $this->db->delete('p_mobil_kursi_layout');
    }

    public function mode_block()
    {
        $mode = array(
            'col-lg-3'=>'3 Kolom',
            'col-lg-2'=>'4 Kolom',
        );

        return (object) $mode;
    }


    public function update($data,$sid)
    {
        return $this->db->update('p_mobil_kursi',$data,$condition = array('id_jml_kursi'=>$sid));
    }
}



/* End of file seat_model.php */
