<?php

/**
 * Promo Model - CI_MODEL
 * Author : Hekky Nurhikmat
 */
class Promo_model extends CI_Model
{
    
    function __construct()
    {
        $this->table = "p_tarif_promo";
    }

    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }

    public function update($data,$uuid_promo)
    {
        $this->db->where('uuid_promo',$uuid_promo);
        return $this->db->update($this->table,$data);
    }

    public function getRows()
    {
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where('deleted_date',NULL);         
            return $this->db->get()->result_object();
    }

    public function removed($ata,$uuid_promo)
    {
        $this->db->where('uuid_promo',$uuid_promo);
        $this->db->update($this->table,$data);
    }
}
