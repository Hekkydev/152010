<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Manifest model by Hekky Nurhikmat
 */
class Manifest_model extends CI_Model
{


  public function find_manifest($data){
    $tanggal_awal_cek = new DateTime($data['tanggal_awal']);
    $tanggal_akhir_cek = new DateTime($data['tanggal_akhir']);

    $tanggal_awal = $tanggal_awal_cek->format('Y-m-d');
    $tanggal_akhir = $tanggal_akhir_cek->format('Y-m-d');


    $this->db->select('*');
    $this->db->from('p_manifest_data');
    $this->db->join('p_jadwal', 'p_jadwal.kode_jadwal = p_manifest_data.kode_jadwal', 'left');
    $this->db->where('p_manifest_data.deleted_date',NULL);
    $this->db->where('DATE(p_manifest_data.tanggal_reservasi) BETWEEN "'.$tanggal_awal.'" AND "'.$tanggal_akhir.'" ');
    $this->db->order_by('p_jadwal.jam', 'asc');
    $query = $this->db->get();

    return $query->result_object();
  }

  public function insert($data)
  {
      return $this->db->insert('p_manifest_data',$data);
  }

  public function find_manifest_kode($kode_manifest)
  {
      $this->db->where('kode_manifest', $kode_manifest);
      return $this->db->get('p_manifest_data')->first_row();
  }

  public function cek_tanggal_keberangkatan($kode_manifest)
  {
      $this->db->where('kode_manifest', $kode_manifest);
      $query = $this->db->get('p_manifest_data')->first_row();
      if($query == TRUE)
      {
        return $query->created_date;
      }
  }

}
