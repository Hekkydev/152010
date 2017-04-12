<?php
/**
 * Manifest model by Hekky Nurhikmat
 */
class Manifest_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = "p_manifest_data";
  }
    
  public function find_manifest($data){
    $tanggal_awal_cek = new DateTime($data['tanggal_awal']);  
    $tanggal_akhir_cek = new DateTime($data['tanggal_akhir']);
    
    $tanggal_awal = $tanggal_awal_cek->format('Y-m-d');
    $tanggal_akhir = $tanggal_akhir_cek->format('Y-m-d');
 

    $this->db->select('a.tanggal_reservasi,
                       SUM(a.total_kursi) AS jumlah_penumpang,
                       b.jam,
                       b.menit,
                       b.kode_atr,
                       a.kode_manifest,
                       a.uuid_user,
                       COUNT(c.kode_pengiriman) AS jumlah_paket
                      ');
    $this->db->from('p_reservasi_shuttle_fix AS a');
    $this->db->join('p_jadwal AS b','b.kode_jadwal = a.kode_jadwal');
    $this->db->join('p_pengiriman_paket AS c','c.kode_manifest = a.kode_manifest','left');
    //$this->db->join();
    // JOIN KE TABEL MANIFEST
    $this->db->where('a.deleted_date',NULL);
    $this->db->where('a.id_reservasi_shuttle_tipe',2);
    $this->db->where('DATE(a.tanggal_reservasi) BETWEEN "'.$tanggal_awal.'" AND "'.$tanggal_akhir.'" ');
    $this->db->group_by('a.kode_manifest');
    $this->db->order_by('b.jam','ASC');
    $query = $this->db->get();
    return $query->result_object();
  }

  public function insert($data)
  {
      return $this->db->insert($this->table,$data);
  }

}
