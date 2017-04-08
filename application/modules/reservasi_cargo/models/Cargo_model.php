<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_model extends CI_Model{
    function kode_pengiriman()
    {
               $q = $this->db->query("select MAX(RIGHT(p_pengiriman_paket.kode_pengiriman,3)) as kd_max from `p_pengiriman_paket`");
               $kd = "";
               $time  = date('Ymd');
               if($q->num_rows()>0)
               {
                   foreach($q->result() as $k)
                   {
                       $tmp = ((int)$k->kd_max)+1;
                       $kd = sprintf("%03s", $tmp);
                   }
               }
               else
               {
                   $kd = "001";
               }

               return "PSTP".$time.$kd;
    }
    function nomor_resi_paket()
    {
            $q = $this->db->query("select MAX(RIGHT(p_pengiriman_paket.nomor_resi_paket,3)) as kd_max from `p_pengiriman_paket`");
               $kd = "";
               $time  = date('Ym');
               $random = $this->generate_nomor_resi_paket();
               if($q->num_rows()>0)
               {
                   foreach($q->result() as $k)
                   {
                       $tmp = ((int)$k->kd_max)+1;
                       $kd = sprintf("%03s", $tmp);
                   }
               }
               else
               {
                   $kd = "001";
               }

               return "PSP".$random.$time.$kd;
    }

    function generate_nomor_resi_paket($length = 5) {

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
        return $randomString;
    }

    function get_pengiriman()
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
                               G.kode_atr
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
            $this->db->where('A.deleted_date',NULL);
            return $this->db->get();
    }


    function get_pengiriman_by_manifest_and_jadwal($kode_manifest,$kode_jadwal)
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
            $this->db->where('A.kode_manifest', $kode_manifest);
            $this->db->where('A.kode_jadwal', $kode_jadwal);
            $this->db->where('A.deleted_date',NULL);
            return $this->db->get();
    }

    function get_pengiriman_by_nomor_resi($nomor_resi_paket)
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
            $this->db->where('A.deleted_date',NULL);
            return $this->db->get();
    }

    function get_jenis_pengiriman()
    {
          return $this->db->get('p_pengiriman_paket_jenis_paket');
    }


    // -----------------RESERVASI INSERT -----------------------------//
    function insert_table_pengiriman($data,$uuid)
    {
        $this->db->set($uuid, 'UUID()', FALSE);
        $this->db->insert('p_pengiriman_paket', $data);
        return $this;
    }
    function insert_table_pengirim($data)
    {
        return $this->db->insert('p_pengiriman_paket_pengirim', $data);
    }

    function insert_table_penerima($data)
    {
        return $this->db->insert('p_pengiriman_paket_penerima', $data);
    }

    function insert_table_data_barang($data)
    {
        return $this->db->insert('p_pengiriman_paket_data_barang', $data);
    }



  // -------------------PEMBATALAN PAKET ----------------------------------//

    function pembatalan_paket($data,$nomor_resi_paket)
    {
        $where = array('nomor_resi_paket'=>$nomor_resi_paket);
        return  $this->db->update('p_pengiriman_paket', $data, $where);
    }

}
