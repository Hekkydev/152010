<?php
/**
 * Model Database Jadwal
 */
class Jadwal_model extends CI_Model
{
	function getRows($params = array())
	{
		 $this->db->select('*');
		 $this->db->from('p_jadwal');
		 $this->db->join('p_mobil_kursi','p_mobil_kursi.id_jml_kursi = p_jadwal.id_jml_kursi','left');
		 $this->db->join('p_status','p_status.id_status = p_jadwal.id_status','left');
		 $this->db->join('p_jenis_jadwal','p_jenis_jadwal.id_jenis_jadwal = p_jadwal.id_jenis_jadwal','left');
		 $this->db->where('p_jadwal.deleted_date',NULL);
		if(!empty($params['search']['keywords'])){
        $this->db->like('kode_atr',$params['search']['keywords']);
			  $this->db->or_like('jam',$params['search']['keywords']);
          }
          //sort data by ascending or desceding order
          if(!empty($params['search']['sortBy'])){
              $this->db->order_by('jam',$params['search']['sortBy']);
          }else{
              $this->db->order_by('id_jadwal','desc');
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


		function getID($id)
		{
			$this->db->select('*');
			$this->db->from('p_jadwal');
			$this->db->join('p_mobil_kursi','p_mobil_kursi.id_jml_kursi = p_jadwal.id_jml_kursi','left');
			$this->db->join('p_status','p_status.id_status = p_jadwal.id_status','left');
			$this->db->join('p_jenis_jadwal','p_jenis_jadwal.id_jenis_jadwal = p_jadwal.id_jenis_jadwal','left');
			$this->db->where('p_jadwal.deleted_date',NULL);
			$this->db->where('p_jadwal.uuid_jadwal',$id);
			return $this->db->get();
		}

		function getID_at_kode($kode)
		{
			$this->db->select('*');
			$this->db->from('p_jadwal_transit');
			$this->db->where('deleted_date',NULL);
			$this->db->where('kode_jadwal',$kode);
			return $this->db->get()->first_row();
		}

    function jam()
    {
      $opt_jam  = array(
        '01'=>'01',
        '02'=>'02',
        '03'=>'03',
        '04'=>'04',
        '05'=>'05',
        '06'=>'06',
        '07'=>'07',
        '08'=>'08',
        '09'=>'09',
        '10'=>'10',
        '11'=>'11',
        '12'=>'12',
        '13'=>'13',
        '14'=>'14',
        '15'=>'15',
        '16'=>'16',
        '17'=>'17',
        '18'=>'18',
        '19'=>'19',
        '20'=>'20',
        '21'=>'21',
        '22'=>'22',
        '23'=>'23',
      );
      return (object) $opt_jam;
    }

    function menit()
    {

      $opt_menit=array(
        '00'=>'00',
        '15'=>'15',
        '30'=>'30',
        '45'=>'45',
      );
      return (object) $opt_menit;
    }

    function JenisJadwal()
    {
      return $this->db->get('p_jenis_jadwal')->result();
    }

		function insert($data)
		{
			$this->db->set('uuid_jadwal','UUID()',FALSE);
			return $this->db->insert('p_jadwal',$data);
		}

		function insert_transit($data)
		{
			return $this->db->insert('p_jadwal_transit',$data);
		}
		function jadwalTransit($asal,$tujuan)
		{
			$this->db->where('asal_keberangkatan',$asal);
			$this->db->where('tujuan_keberangkatan',$tujuan);
			return $this->db->get('p_jadwal')->result();

		}

		function get_penjadwalan_kendaraan($asal,$tujuan)
		{
			$this->db->select('*');
			$this->db->from('p_jadwal');
			$this->db->join('p_status','p_status.id_status = p_jadwal.id_status','left');
			$this->db->join('p_mobil_kursi','p_mobil_kursi.id_jml_kursi = p_jadwal.id_jml_kursi','left');
			$this->db->where('asal_keberangkatan',$asal);
			$this->db->where('tujuan_keberangkatan',$tujuan);
			$this->db->order_by('p_jadwal.jam','ASC');

			return $this->db->get()->result();
		}

		function get_jadwal_keberangkatan($asal,$tujuan)
		{
			$this->db->select('*');
			$this->db->from('p_jadwal');
			$this->db->join('p_status','p_status.id_status = p_jadwal.id_status','left');
			$this->db->join('p_mobil_kursi','p_mobil_kursi.id_jml_kursi = p_jadwal.id_jml_kursi','left');
			$this->db->where('asal_keberangkatan',$asal);
			$this->db->where('tujuan_keberangkatan',$tujuan);
			$this->db->where('deleted_date',NULL);
			$this->db->order_by('jam', 'asc');
			return $this->db->get()->result();
		}


		function check_jadwal_kendaraan($Kode,$Tanggal)
		{
			$this->db->select("*");
			$this->db->from('p_jadwal_kendaraan');
			$this->db->where('kode_jadwal_kendaraan', $Kode);
			$this->db->where('tanggal_jadwal_kendaraan', $Tanggal);
			return $this->db->get();
		}

		function insert_config_mobil($Data)
		{
			$this->db->set('uuid_jadwal_kendaraan', 'UUID()', FALSE);
			return $this->db->insert('p_jadwal_kendaraan',$Data);
		}

		function update_config_mobil($Data,$Kode,$Tanggal)
		{
			$Condition = array('kode_jadwal_kendaraan'=>$Kode,'tanggal_jadwal_kendaraan'=>$Tanggal);
			return $this->db->update("p_jadwal_kendaraan",$Data,$Condition);
		}

		function check_jadwal_sopir($Kode,$Tanggal)
		{
			$this->db->select("*");
			$this->db->from('p_jadwal_kendaraan');
			$this->db->where('kode_jadwal_kendaraan', $Kode);
			$this->db->where('tanggal_jadwal_kendaraan', $Tanggal);
			return $this->db->get();
		}

		function insert_config_sopir($Data)
		{
			$this->db->set('uuid_jadwal_kendaraan', 'UUID()', FALSE);
			return $this->db->insert('p_jadwal_kendaraan',$Data);
		}

		function update_config_sopir($Data,$Kode,$Tanggal)
		{
			$Condition = array('kode_jadwal_kendaraan'=>$Kode,'tanggal_jadwal_kendaraan'=>$Tanggal);
			return $this->db->update("p_jadwal_kendaraan",$Data,$Condition);
		}

		function AllJadwal()
		{
			$this->db->select('*');
			$this->db->from('p_jadwal');
			$this->db->join('p_mobil_kursi','p_mobil_kursi.id_jml_kursi = p_jadwal.id_jml_kursi','left');
			$this->db->join('p_status','p_status.id_status = p_jadwal.id_status','left');
			$this->db->join('p_jenis_jadwal','p_jenis_jadwal.id_jenis_jadwal = p_jadwal.id_jenis_jadwal','left');
			$this->db->where('p_jadwal.deleted_date',NULL);
			return $this->db->get();
		}

		function get_detail_jadwal_keberangakatan($kode_jadwal)
		{
			$this->db->select('*');
			$this->db->from('p_jadwal');
			$this->db->join('p_mobil_kursi','p_mobil_kursi.id_jml_kursi = p_jadwal.id_jml_kursi','left');
			$this->db->join('p_status','p_status.id_status = p_jadwal.id_status','left');
			$this->db->join('p_jenis_jadwal','p_jenis_jadwal.id_jenis_jadwal = p_jadwal.id_jenis_jadwal','left');
			$this->db->where('p_jadwal.deleted_date',NULL);
			$this->db->where('p_jadwal.kode_jadwal',$kode_jadwal);
			return $this->db->get()->first_row();
		}


}
