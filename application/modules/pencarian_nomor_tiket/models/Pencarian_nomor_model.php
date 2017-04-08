<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian_nomor_model extends CI_Model{

  function get_pencarian_nomor($nomor)
  {
    $this->db->select('*');
    $this->db->from('p_reservasi_shuttle_fix');
    $this->db->join('p_jadwal','p_jadwal.kode_jadwal = p_reservasi_shuttle_fix.kode_jadwal','left');
    $this->db->join('p_reservasi_shuttle_tipe','p_reservasi_shuttle_tipe.id_reservasi_shuttle_tipe = p_reservasi_shuttle_fix.id_reservasi_shuttle_tipe','left');
    $this->db->where('p_reservasi_shuttle_fix.deleted_date',NULL);
    $this->db->where('p_reservasi_shuttle_fix.telp_penumpang',$nomor);
    $this->db->or_where('p_reservasi_shuttle_fix.kode_booking',$nomor);
    $this->db->order_by('p_reservasi_shuttle_fix.tanggal_reservasi', 'DESC');

    return $this->db->get()->result();
  }
}
