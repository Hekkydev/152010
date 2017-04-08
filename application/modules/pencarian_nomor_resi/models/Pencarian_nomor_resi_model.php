<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian_nomor_resi_model extends CI_Model{

  function get_pencarian_nomor($nomor_resi_paket)
  {
          $this->db->select('A.id_pengiriman_paket,
                             A.uuid_pengiriman_paket,
                             A.kode_pengiriman,
                             A.nomor_resi_paket,
                             A.kode_jadwal,
                             A.kode_manifest,
                             A.tanggal_keberangkatan,
                             A.jam_keberangkatan,
                             A.menit_keberangkatan,
                             A.uuid_user,
                             A.created_date,
                             A.last_change_date,
                             A.deleted_date,
                             B.nama_pengirim,
                             B.telp_pengirim,
                             B.alamat_pengirim,
                             C.nama_penerima,
                             C.telp_penerima,
                             C.alamat_penerima,
                             D.jenis_layanan_paket,
                             D.jumlah_koli_paket,
                             D.id_jenis_pengiriman_paket,
                             D.berat_kg,
                             D.harga_per_kg_pertama,
                             D.harga_per_kg_selanjutnya,
                             D.harga_total,
                             D.harga_diskon,
                             D.jenis_pembayaran_paket,
                             E.id_status_pengiriman_paket,
                             E.tipe_status_pengiriman_paket,
                             F.uuid_user,
                             F.nama_lengkap,
                             G.kode_jadwal,
                             G.asal_keberangkatan,
                             G.tujuan_keberangkatan,
                             G.kode_atr,
                             H.tipe_jenis_pengiriman_paket
                            ');
          $this->db->from('p_pengiriman_paket as A');
          $this->db->join('p_pengiriman_paket_pengirim as B',
                          'B.kode_pengiriman = A.kode_pengiriman', 'left');
          $this->db->join('p_pengiriman_paket_penerima as C',
                          'C.kode_pengiriman = A.kode_pengiriman', 'left');
          $this->db->join('p_pengiriman_paket_data_barang AS D',
                          'D.kode_pengiriman = A.kode_pengiriman', 'left');
          $this->db->join('p_pengiriman_paket_status_paket AS E',
                          'E.id_status_pengiriman_paket = A.id_status_pengiriman_paket', 'left');
          $this->db->join('p_users AS F',
                          'F.uuid_user = A.uuid_user', 'left');
          $this->db->join('p_jadwal AS G',
                          'G.kode_jadwal = A.kode_jadwal', 'left');
          $this->db->join('p_pengiriman_paket_jenis_paket AS H',
                          'H.id_jenis_pengiriman_paket = D.id_jenis_pengiriman_paket', 'left');
          $this->db->where('A.nomor_resi_paket', $nomor_resi_paket);
          $this->db->or_where('B.telp_pengirim',$nomor_resi_paket);
          $this->db->where('A.deleted_date',NULL);
          return $this->db->get();
  }



}
