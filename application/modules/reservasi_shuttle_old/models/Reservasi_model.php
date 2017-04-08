<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  function checking_point_seat($kode,$kursi)
  {
    $this->db->where('kode_jadwal', $kode);
    $this->db->where('id_kursi_shuttle', $kursi);
    return $this->db->get('p_reservasi_shuttle_detail');
  }


  function get_DetailPenumpang_by_kode_booking($kode_booking)
  {

    $this->db->select("*");
    $this->db->from('p_reservasi_shuttle_detail');
    $this->db->join('p_users', 'p_users.uuid_user = p_reservasi_shuttle_detail.uuid_user', 'left');
    $this->db->join('p_reservasi_shuttle_status_pemesanan','p_reservasi_shuttle_status_pemesanan.id_status_pemesanan_shuttle = p_reservasi_shuttle_detail.id_status_pemesanan_shuttle','left');
    $this->db->where('p_reservasi_shuttle_detail.kode_jadwal_reservasi_shuttle', $kode_booking);
    $this->db->where('p_reservasi_shuttle_detail.deleted_date',NULL);
    return $this->db->get();
  }


  function sub_total_tiket($kode_booking)
  {

    $this->db->select("SUM(p_reservasi_shuttle_detail.tarif_penumpang) AS sub_total_tiket");
    $this->db->from('p_reservasi_shuttle_detail');
    $this->db->join('p_users', 'p_users.uuid_user = p_reservasi_shuttle_detail.uuid_user', 'left');
    $this->db->join('p_reservasi_shuttle_status_pemesanan','p_reservasi_shuttle_status_pemesanan.id_status_pemesanan_shuttle = p_reservasi_shuttle_detail.id_status_pemesanan_shuttle','left');
    $this->db->where('p_reservasi_shuttle_detail.kode_jadwal_reservasi_shuttle', $kode_booking);
    $this->db->where('p_reservasi_shuttle_detail.deleted_date',NULL);
    return $this->db->get();
  }


  function info_customers($kode_booking,$nomor_kursi)
  {

    $this->db->select("*");
    $this->db->from('p_reservasi_shuttle_detail');
    $this->db->join('p_users', 'p_users.uuid_user = p_reservasi_shuttle_detail.uuid_user', 'left');
    $this->db->join('p_reservasi_shuttle_status_pemesanan','p_reservasi_shuttle_status_pemesanan.id_status_pemesanan_shuttle = p_reservasi_shuttle_detail.id_status_pemesanan_shuttle','left');
    $this->db->where('p_reservasi_shuttle_detail.kode_jadwal_reservasi_shuttle', $kode_booking);
    $this->db->where('p_reservasi_shuttle_detail.id_kursi_shuttle',$nomor_kursi);
    $this->db->where('p_reservasi_shuttle_detail.deleted_date',NULL);
    return $this->db->get();
  }

  function update_penumpang($data,$tiket,$nomor_kursi)
  {
    $this->db->where('kode_tiket', $tiket);
    $this->db->where('id_kursi_shuttle', $nomor_kursi);
    return $this->db->update('p_reservasi_shuttle_detail',$data);
  }


}
