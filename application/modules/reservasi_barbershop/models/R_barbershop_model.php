<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_barbershop_model extends CI_Model{



        function get_service_cabang($uuid_cabang)
        {
              $this->db->select('*');
              $this->db->from('p_barbershop_service');
              $this->db->join('p_status','p_status.id_status = p_barbershop_service.id_status','left');
              $this->db->join('p_cabang','p_cabang.uuid_cabang = p_barbershop_service.uuid_cabang','left');
              $this->db->where('p_barbershop_service.deleted_date',NULL);
              $this->db->where('p_barbershop_service.id_status',1);
              $this->db->where('p_barbershop_service.uuid_cabang', $uuid_cabang);
              return $this->db->get()->result_object();
        }

        function get_barber_cabang($uuid_cabang)
        {
              $this->db->select('*');
              $this->db->from('p_barbershop_pegawai');
              $this->db->join('p_status','p_status.id_status = p_barbershop_pegawai.id_status','left');
              $this->db->join('p_cabang','p_cabang.uuid_cabang = p_barbershop_pegawai.uuid_cabang','left');
              $this->db->where('p_barbershop_pegawai.deleted_date',NULL);
              $this->db->where('p_barbershop_pegawai.id_status',1);
              $this->db->where('p_barbershop_pegawai.uuid_cabang', $uuid_cabang);
              return $this->db->get()->result_object();
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





}
