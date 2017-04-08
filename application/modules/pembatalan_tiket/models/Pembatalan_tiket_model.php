<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembatalan_tiket_model extends CI_Model{

        public function __construct()
        {
              parent::__construct();
              $this->waktu_skr      = date('Y-m-d H:i:s');
        }


        function getRows($params = array())
        {
              $this->db->select('*');
              $this->db->from('p_reservasi_shuttle_fix');
              $this->db->where('id_status_pemesanan_shuttle','3');
              $this->db->join('p_reservasi_shuttle_tipe',
                              'p_reservasi_shuttle_tipe.id_reservasi_shuttle_tipe = p_reservasi_shuttle_fix.id_reservasi_shuttle_tipe', 'left');

              if(!empty($params['search']['keywords'])){
                  $this->db->like('nama_penumpang',$params['search']['keywords']);
                  $this->db->or_like('telp_penumpang',$params['search']['keywords']);
                  $this->db->or_like('kode_tiket',$params['search']['keywords']);
              }
              //sort data by ascending or desceding order
              if(!empty($params['search']['sortBy'])){
                  $this->db->order_by('p_reservasi_shuttle_fix.deleted_date',$params['search']['sortBy']);
              }else{
                  $this->db->order_by('p_reservasi_shuttle_fix.deleted_date','desc');
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

        function all_record()
        {
          $this->db->select('*');
          $this->db->from('p_reservasi_shuttle_fix');
          $this->db->where('id_status_pemesanan_shuttle','3');
          $this->db->join('p_reservasi_shuttle_tipe',
                          'p_reservasi_shuttle_tipe.id_reservasi_shuttle_tipe = p_reservasi_shuttle_fix.id_reservasi_shuttle_tipe', 'left');
          return $this->db->get()->num_rows();
        }

        function proses_pembatalan($nomor_tiket)
        {
          $cek_tiket = $this->cek_tiket($nomor_tiket);
          if($cek_tiket > 0)
          {
              $pembatalan_tiket = $this->pembatalan_tiket($nomor_tiket);
              return "success";
          }else{
              return "error";
          }

        }

        function cek_tiket($nomor_tiket)
        {
              return $this->db->get_where('p_reservasi_shuttle_fix', $where = array('kode_tiket'=>$nomor_tiket))->num_rows();
        }


        function pembatalan_tiket($nomor_tiket)
        {

          $kode_tiket = $this->input->post('kode_tiket');
          $data = array(
            'id_status_pemesanan_shuttle'=>3, // nomor 3 di batalkan
            'deleted_date'=>$this->waktu_skr,
          );
          $where = array('kode_tiket'=>$kode_tiket);
          return $update = $this->db->update('p_reservasi_shuttle_fix',$data,$where);


        }










}
