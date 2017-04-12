<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_model extends CI_Model{

  function insert_reservasi_booking($data)
  {
        $this->db->set('uuid_reservasi_shuttle', 'UUID()', FALSE);
        return $this->db->insert('p_reservasi_shuttle_fix',$data);
  }

  function insert($table,$data)
  {
        return $this->db->insert($table, $data);
  }

  function get_DetailPenumpang_by_kode_tiket($kode_tiket)
  {

      $this->db->select("*");
      $this->db->from('p_reservasi_shuttle_fix');
      $this->db->join('p_users', 'p_users.uuid_user = p_reservasi_shuttle_fix.uuid_user', 'left');
      $this->db->join('p_reservasi_shuttle_status_pemesanan','p_reservasi_shuttle_status_pemesanan.id_status_pemesanan_shuttle = p_reservasi_shuttle_fix.id_status_pemesanan_shuttle','left');
      $this->db->where('p_reservasi_shuttle_fix.kode_tiket', $kode_tiket);
      $this->db->where('p_reservasi_shuttle_fix.deleted_date',NULL);
      return $this->db->get();
  }


  function get_informasi_tiket($kode_booking)
  {

      $this->db->select("*");
      $this->db->from('p_reservasi_shuttle_fix');
      $this->db->join('p_users', 'p_users.uuid_user = p_reservasi_shuttle_fix.uuid_user', 'left');
      $this->db->join('p_reservasi_shuttle_status_pemesanan','p_reservasi_shuttle_status_pemesanan.id_status_pemesanan_shuttle = p_reservasi_shuttle_fix.id_status_pemesanan_shuttle','left');
      $this->db->where('p_reservasi_shuttle_fix.kode_booking', $kode_booking);
      $this->db->where('p_reservasi_shuttle_fix.deleted_date',NULL);
      return $this->db->get();
  }

  function penumpang_detail_by_kode_booking($kode_booking)
  {
      $this->db->select("*");
      $this->db->from('p_reservasi_shuttle_fix');
      $this->db->join('p_users', 'p_users.uuid_user = p_reservasi_shuttle_fix.uuid_user', 'left');
      $this->db->join('p_reservasi_shuttle_status_pemesanan','p_reservasi_shuttle_status_pemesanan.id_status_pemesanan_shuttle = p_reservasi_shuttle_fix.id_status_pemesanan_shuttle','left');
      $this->db->where('p_reservasi_shuttle_fix.kode_booking', $kode_booking);
      $this->db->where('p_reservasi_shuttle_fix.deleted_date',NULL);
      return $this->db->get();
  }

  function info_customers($kode_tiket,$nomor_kursi)
  {
      $this->db->select("*");
      $this->db->from('p_reservasi_shuttle_fix');
      $this->db->join('p_users', 'p_users.uuid_user = p_reservasi_shuttle_fix.uuid_user', 'left');
      $this->db->join('p_reservasi_shuttle_status_pemesanan','p_reservasi_shuttle_status_pemesanan.id_status_pemesanan_shuttle = p_reservasi_shuttle_fix.id_status_pemesanan_shuttle','left');
      $this->db->where('p_reservasi_shuttle_fix.kode_tiket', $kode_tiket);
      $this->db->where('p_reservasi_shuttle_fix.nomor_kursi', $nomor_kursi);
      $this->db->where('p_reservasi_shuttle_fix.deleted_date',NULL);
      return $this->db->get();
  }

  function total_tarif($kode_booking)
  {
    $this->db->select("SUM(p_reservasi_shuttle_fix.tarif_penumpang) AS total_tarif");
    $this->db->from('p_reservasi_shuttle_fix');
    $this->db->join('p_users', 'p_users.uuid_user = p_reservasi_shuttle_fix.uuid_user', 'left');
    $this->db->join('p_reservasi_shuttle_status_pemesanan','p_reservasi_shuttle_status_pemesanan.id_status_pemesanan_shuttle = p_reservasi_shuttle_fix.id_status_pemesanan_shuttle','left');
    $this->db->where('p_reservasi_shuttle_fix.kode_booking', $kode_booking);
    $this->db->where('p_reservasi_shuttle_fix.deleted_date',NULL);
    $data = $this->db->get()->first_row();

    try {
      if($data != TRUE) throw new Exception("Error Processing Request");
      return $data->total_tarif;
    } catch (Exception $e) {
      print_r($e->getMessage());
    }
  }


  function total_tarif_diskon($kode_booking)
  {
    $this->db->select("SUM(p_reservasi_shuttle_fix.tarif_diskon) AS total_diskon");
    $this->db->from('p_reservasi_shuttle_fix');
    $this->db->join('p_users', 'p_users.uuid_user = p_reservasi_shuttle_fix.uuid_user', 'left');
    $this->db->join('p_reservasi_shuttle_status_pemesanan','p_reservasi_shuttle_status_pemesanan.id_status_pemesanan_shuttle = p_reservasi_shuttle_fix.id_status_pemesanan_shuttle','left');
    $this->db->where('p_reservasi_shuttle_fix.kode_booking', $kode_booking);
    $this->db->where('p_reservasi_shuttle_fix.deleted_date',NULL);
    $data = $this->db->get()->first_row();

    try {
      if($data != TRUE) throw new Exception("Error Processing Request");
      return $data->total_diskon;
    } catch (Exception $e) {
      print_r($e->getMessage());
    }
  }

  function update_penumpang($data,$tiket,$nomor_kursi)
  {
    $this->db->where('kode_tiket', $tiket);
    $this->db->where('nomor_kursi', $nomor_kursi);
    return $this->db->update('p_reservasi_shuttle_fix',$data);
  }


  function update_to_go($data,$kode_booking)
  {
      $this->db->where('p_reservasi_shuttle_fix.kode_booking', $kode_booking);
      $this->db->where('p_reservasi_shuttle_fix.id_status_pemesanan_shuttle','1');
      return $this->db->update('p_reservasi_shuttle_fix', $data);

  }

  public function reservasi_cek($kode,$tgl,$nomor_kursi)
  {
          $this->db->select('*');
          $this->db->from('p_reservasi_shuttle_fix');
          $this->db->where('kode_jadwal',$kode);
          $this->db->where('tanggal_reservasi',$tgl);
          $this->db->where('nomor_kursi',$nomor_kursi);
          $this->db->where('deleted_date',NULL);
          return $this->db->get();
  }

  public function total_penumpang_trip($kode_manifest)
  {
          $this->db->select('*');
          $this->db->from('p_reservasi_shuttle_fix');
          $this->db->where('kode_manifest',$kode_manifest);
          $this->db->where('id_status_pemesanan_shuttle',2);
          $this->db->where('deleted_date',NULL);
          return $this->db->get();
  }

}
