<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model{
  public $ID = "uuid_master_jurusan";
// CREATE//////////////////////////////////////////////////////////////////////
    function insert($table,$data)
    {

      return $this->db->insert($table, $data);
    }

    function insert_master($table,$data)
    {
        $this->db->set($this->ID, 'UUID()', FALSE);
        return $this->db->insert($table,$data);
    }



    // function insert_liter_bbm($data_liter)
    // {
    //     return $i = $this->db->insert('p_master_liter_bbm',$data_liter);
    // }
    // function non_reguler_insert($data_jurusan,$data_biaya_operasional,$data_non_reguler)
    // {
    //     $i = $this->insert_master('p_master_jurusan',$data_jurusan);
    //     $i = $this->insert('p_master_biaya_operasional',$data_biaya_operasional);
    //     $i = $this->insert('p_master_biaya_non_reguler',$data_non_reguler);
    //     return $i;
    // }
    function reguler_tiket_insert_tiketing($data_reguler_tiket)
    {
      return $i = $this->insert('p_master_biaya_reguler_tiket',$data_reguler_tiket);
    }
    function reguler_tiket_insert_jurusan($data_jurusan,$data_biaya_operasional)
    {
      $i = $this->insert_master('p_master_jurusan',$data_jurusan);
      $i = $this->insert('p_master_biaya_operasional',$data_biaya_operasional);
      return $i;
    }
    function cargo_reguler_insert($data_jurusan,$data_biaya_operasional,$data_cargo)
    {
        $i = $this->insert_master('p_master_jurusan',$data_jurusan);
        $i = $this->insert('p_master_biaya_operasional',$data_biaya_operasional);
        $i = $this->insert('p_master_biaya_paket',$data_cargo);
        return $i;
    }
    function insert_carter($data_carter)
    {
      return $i = $this->insert('p_master_biaya_charter',$data_carter);
    }



// READ //////////////////////////////////////////////////////////////////////////////

	function getRows($params = array())
	{
			  $this->db->select('*');
              $this->db->from('p_master_jurusan');
              $this->db->join('p_master_jenis_jurusan', 'p_master_jenis_jurusan.id_master_jenis_jurusan =
                               p_master_jurusan.id_master_jenis_jurusan', 'left');


              $this->db->join('p_status', 'p_status.id_status = p_master_jurusan.id_status', 'left');
              $this->db->where('p_master_jurusan.deleted_date',NULL);

		if(!empty($params['search']['keywords'])){
		$this->db->like('kode_atr',$params['search']['keywords']);

		}
		//sort data by ascending or desceding order
		if(!empty($params['search']['sortBy'])){
		$this->db->order_by('kode_atr',$params['search']['sortBy']);
		}else{
		$this->db->order_by('kode_atr','asc');
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
    function AllJenisOperasional()
    {
        return $this->db->get('p_master_jenis_operasional')->result();
    }
    function AllJurusan()
    {         $this->db->select('*');
              $this->db->from('p_master_jurusan');
              $this->db->join('p_master_jenis_jurusan', 'p_master_jenis_jurusan.id_master_jenis_jurusan =
                               p_master_jurusan.id_master_jenis_jurusan', 'left');

              $this->db->join('p_status', 'p_status.id_status = p_master_jurusan.id_status', 'left');
              $this->db->where('p_master_jurusan.deleted_date',NULL);
      return $this->db->get();
    }
    function getKode($ID)
    {
          $this->db->where('kode_jurusan',$ID);
          return $this->db->get('p_master_jurusan')->num_rows();
    }

    function cek_kode_jurusan($kode_jurusan)
    {
          $this->db->where('kode_jurusan',$kode_jurusan);
          return $this->db->get('p_master_jurusan');
    }

    function cek_uuid($sid)
    {
               $this->db->select('
               p_master_jurusan.kode_jurusan,
               p_master_jurusan.kode_atr,
               p_master_jurusan.asal_keberangkatan,
               p_master_jurusan.tujuan_keberangkatan,
               p_master_jurusan.uuid_master_jurusan,
               p_master_jurusan.id_status,
               p_master_biaya_operasional.biaya_tol,
               p_master_biaya_operasional.biaya_sopir,
               p_master_biaya_operasional.biaya_perpal,
               p_master_biaya_operasional.biaya_bbm,
               p_master_biaya_operasional.biaya_parkir,
               p_master_biaya_paket.harga_dokument_kg_pertama,
               p_master_biaya_paket.harga_dokument_kg_selanjutnya,
               p_master_biaya_paket.harga_barang_kg_pertama,
               p_master_biaya_paket.harga_barang_kg_selanjutnya,
               p_master_biaya_paket.harga_charge_bagasi_kg_pertama,
               p_master_biaya_paket.harga_charge_bagasi_kg_selanjutnya
               ');
               $this->db->from('p_master_jurusan');
               $this->db->join('p_master_jenis_jurusan', 'p_master_jenis_jurusan.id_master_jenis_jurusan =
                                p_master_jurusan.id_master_jenis_jurusan', 'left');

               $this->db->join('p_master_biaya_operasional', 'p_master_biaya_operasional.kode_jurusan =
                                p_master_jurusan.kode_jurusan', 'left');
               $this->db->join('p_master_biaya_paket','p_master_biaya_paket.kode_jurusan = p_master_jurusan.kode_jurusan','left');
               $this->db->join('p_status', 'p_status.id_status = p_master_jurusan.id_status', 'left');
               $this->db->where('uuid_master_jurusan',$sid);
          return $this->db->get();
    }
	
	
	function cek_jurusan_by_asal_and_tujuan($asal,$tujuan)
    {
               $this->db->select('
               p_master_jurusan.kode_jurusan,
               p_master_jurusan.kode_atr,
               p_master_jurusan.asal_keberangkatan,
               p_master_jurusan.tujuan_keberangkatan,
               p_master_jurusan.uuid_master_jurusan,
               p_master_jurusan.id_status,
               p_master_biaya_operasional.biaya_tol,
               p_master_biaya_operasional.biaya_sopir,
               p_master_biaya_operasional.biaya_perpal,
               p_master_biaya_operasional.biaya_bbm,
               p_master_biaya_operasional.biaya_parkir,
               p_master_biaya_paket.harga_dokument_kg_pertama,
               p_master_biaya_paket.harga_dokument_kg_selanjutnya,
               p_master_biaya_paket.harga_barang_kg_pertama,
               p_master_biaya_paket.harga_barang_kg_selanjutnya,
               p_master_biaya_paket.harga_charge_bagasi_kg_pertama,
               p_master_biaya_paket.harga_charge_bagasi_kg_selanjutnya
               ');
               $this->db->from('p_master_jurusan');
               $this->db->join('p_master_jenis_jurusan', 'p_master_jenis_jurusan.id_master_jenis_jurusan =
                                p_master_jurusan.id_master_jenis_jurusan', 'left');

               $this->db->join('p_master_biaya_operasional', 'p_master_biaya_operasional.kode_jurusan =
                                p_master_jurusan.kode_jurusan', 'left');
               $this->db->join('p_master_biaya_paket','p_master_biaya_paket.kode_jurusan = p_master_jurusan.kode_jurusan','left');
               $this->db->join('p_status', 'p_status.id_status = p_master_jurusan.id_status', 'left');
               $this->db->where('p_master_jurusan.asal_keberangkatan',$asal);
			   $this->db->where('p_master_jurusan.tujuan_keberangkatan',$tujuan);
          return $this->db->get();
    }

// UPDATE /////////////////////////////////////////////////////////////////////////////

    function reguler_tiket_cek_jurusan($kode_jurusan,$id_jml_kursi)
    {

        $arr_criteria = array(
          'kode_jurusan'=>$kode_jurusan,
          'id_jml_kursi'=>$id_jml_kursi,
        );
        return $this->db->get_where('p_master_biaya_reguler_tiket', $arr_criteria)->num_rows();
    }

    function reguler_tiket_update_tiketing($data_reguler_tiket,$kode_jurusan,$id_jml_kursi)
    {
      $this->db->where('kode_jurusan', $kode_jurusan);
      $this->db->where('id_jml_kursi', $id_jml_kursi);
      return $i = $this->db->update('p_master_biaya_reguler_tiket',$data_reguler_tiket);
    }


    // ----------------------------BOP-------
    function update_master_bop($data_biaya_operasional,$kode_jurusan)
    {
        $this->db->where('kode_jurusan', $kode_jurusan);
        return $this->db->update('p_master_biaya_operasional',$data_biaya_operasional);
    }

    function insert_master_bop($data_biaya_operasional)
    {
        return $this->db->insert('p_master_biaya_operasional',$data_biaya_operasional);
    }
    function cek_master_bop($kode_jurusan)
    {
      $where = array('kode_jurusan'=> $kode_jurusan);
      return $this->db->get_where('p_master_biaya_operasional', $where)->num_rows();
    }


    //--------------------------CARGO---------------------------------------

    function cek_master_cargo($kode_jurusan)
    {
      $where = array('kode_jurusan'=> $kode_jurusan);
      return $this->db->get_where('p_master_biaya_paket', $where)->num_rows();
    }

    function update_master_cargo($data_biaya_cargo,$kode_jurusan)
    {
        $this->db->where('kode_jurusan', $kode_jurusan);
        return $this->db->update('p_master_biaya_paket',$data_biaya_cargo);
    }
    function insert_master_cargo($data_biaya_cargo)
    {
        return $this->db->insert('p_master_biaya_paket',$data_biaya_cargo);
    }

    // ---------------------------UPDATE-------------------------------------

    function update_master($data,$kode_jurusan)
    {
        $this->db->where('kode_jurusan', $kode_jurusan);
        return $this->db->update('p_master_jurusan',$data);

    }
   
	public function master_biaya_trip_jurusan($asal,$tujuan)
    {
           $cek = $this->cek_jurusan_by_asal_and_tujuan($asal,$tujuan);
           return $cek;
    }




 // DELETE ///////////////////////////////////////////////////////////////////////////

}
