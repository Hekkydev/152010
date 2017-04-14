<?php

/**
 * Module mobile pengaturan
 */
class Mobil_model extends CI_Model
{
  protected $mobil = 'p_mobil_unit';
  protected $mobil_id = 'p_mobil_unit.uuid_mobil_unit';
  protected $mobil_deleted_date = 'p_mobil_unit.deleted_date';

  function getRows($params = array())
  {
    $this->db->select(' p_mobil_unit.id_mobil_unit,
                        p_mobil_unit.id_sopir_1,
                        p_mobil_unit.id_sopir_2,
                        p_mobil_unit.id_jml_kursi,
                        p_mobil_unit.id_status,
                        p_mobil_unit.uuid_mobil_unit,
                        p_mobil_unit.kode_unit,
                        p_mobil_unit.kode_atr,
                        p_mobil_unit.no_plat,
                        p_mobil_unit.no_polisi,
                        p_mobil_unit.no_stnk,
                        p_mobil_unit.no_bpkb,
                        p_mobil_unit.no_rangka,
                        p_mobil_unit.no_mesin,
                        p_mobil_unit.kilometer_terakhir,
                        p_mobil_unit.uuid_cabang,
                        p_mobil_unit.jenis,
                        p_mobil_unit.merek,
                        p_sopir.nama_lengkap,
                        p_sopir.id_sopir,
                        p_status.tipe_status,
                        p_status.id_status,
                        p_mobil_kursi.jumlah_kursi,
                        p_mobil_kursi.id_jml_kursi,
                        p_cabang.uuid_cabang,
                        p_cabang.nama_cabang ');
    $this->db->from($this->mobil);
    $this->db->join('p_cabang','p_cabang.uuid_cabang = p_mobil_unit.uuid_cabang','left');
    $this->db->join('p_status','p_status.id_status = p_mobil_unit.id_status','left');
    $this->db->join('p_mobil_kursi','p_mobil_kursi.id_jml_kursi = p_mobil_unit.id_jml_kursi','left');
    $this->db->join('p_sopir','p_sopir.id_sopir = p_mobil_unit.id_sopir_1','left');
    $this->db->where($this->mobil_deleted_date,NULL);
    //filter data by searched keywords
    if(!empty($params['search']['keywords'])){
        $this->db->like('kode_unit',$params['search']['keywords']);
        $this->db->or_like('nama_cabang',$params['search']['keywords']);
        $this->db->or_like('nama_lengkap',$params['search']['keywords']);
        $this->db->or_like('no_plat',$params['search']['keywords']);
    }
    //sort data by ascending or desceding order
    if(!empty($params['search']['sortBy'])){
        $this->db->order_by('kode_unit',$params['search']['sortBy']);
    }else{
        $this->db->order_by('id_mobil_unit','desc');
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

  function AllMobil()
  {
    $this->db->select(' p_mobil_unit.id_mobil_unit,
                        p_mobil_unit.id_sopir_1,
                        p_mobil_unit.id_sopir_2,
                        p_mobil_unit.id_jml_kursi,
                        p_mobil_unit.id_status,
                        p_mobil_unit.uuid_mobil_unit,
                        p_mobil_unit.kode_unit,
                        p_mobil_unit.kode_atr,
                        p_mobil_unit.no_plat,
                        p_mobil_unit.no_polisi,
                        p_mobil_unit.no_stnk,
                        p_mobil_unit.no_bpkb,
                        p_mobil_unit.no_rangka,
                        p_mobil_unit.no_mesin,
                        p_mobil_unit.kilometer_terakhir,
                        p_mobil_unit.uuid_cabang,
                        p_mobil_unit.jenis,
                        p_mobil_unit.merek,
                        p_sopir.nama_lengkap,
                        p_sopir.id_sopir,
                        p_status.tipe_status,
                        p_status.id_status,
                        p_mobil_kursi.jumlah_kursi,
                        p_mobil_kursi.id_jml_kursi,
                        p_cabang.uuid_cabang,
                        p_cabang.nama_cabang ');
    $this->db->from($this->mobil);
    $this->db->join('p_cabang','p_cabang.uuid_cabang = p_mobil_unit.uuid_cabang','left');
    $this->db->join('p_status','p_status.id_status = p_mobil_unit.id_status','left');
    $this->db->join('p_mobil_kursi','p_mobil_kursi.id_jml_kursi = p_mobil_unit.id_jml_kursi','left');
    $this->db->join('p_sopir','p_sopir.id_sopir = p_mobil_unit.id_sopir_1','left');
    $this->db->where($this->mobil_deleted_date,NULL);
    return $q = $this->db->get();
  }
  function getID($id)
  {
    $this->db->select(' p_mobil_unit.id_mobil_unit,
                        p_mobil_unit.id_sopir_1,
                        p_mobil_unit.id_sopir_2,
                        p_mobil_unit.id_jml_kursi,
                        p_mobil_unit.id_status,
                        p_mobil_unit.kode_unit,
                        p_mobil_unit.kode_atr,
                        p_mobil_unit.no_plat,
                        p_mobil_unit.no_polisi,
                        p_mobil_unit.no_stnk,
                        p_mobil_unit.no_bpkb,
                        p_mobil_unit.no_rangka,
                        p_mobil_unit.no_mesin,
                        p_mobil_unit.kilometer_terakhir,
                        p_mobil_unit.uuid_mobil_unit,
                        p_mobil_unit.uuid_cabang,
                        p_mobil_unit.jenis,
                        p_mobil_unit.merek,
                        p_mobil_unit.tahun_pembuatan,
                        p_mobil_unit.warna,
                        p_sopir.nama_lengkap,
                        p_sopir.id_sopir,
                        p_status.tipe_status,
                        p_status.id_status,
                        p_mobil_kursi.jumlah_kursi,
                        p_mobil_kursi.id_jml_kursi,
                        p_cabang.uuid_cabang,
                        p_cabang.nama_cabang ');
    $this->db->from($this->mobil);
    $this->db->join('p_cabang','p_cabang.uuid_cabang = p_mobil_unit.uuid_cabang','left');
    $this->db->join('p_status','p_status.id_status = p_mobil_unit.id_status','left');
    $this->db->join('p_mobil_kursi','p_mobil_kursi.id_jml_kursi = p_mobil_unit.id_jml_kursi','left');
    $this->db->join('p_sopir','p_sopir.id_sopir = p_mobil_unit.id_sopir_1','left');
    $this->db->where($this->mobil_deleted_date,NULL);
    $this->db->where($this->mobil_id,$id);
    return $q = $this->db->get();
  }
  function insert($data)
  {
    $this->db->set('uuid_mobil_unit', 'UUID()', FALSE);
    return $q =  $this->db->insert($this->mobil,$data);
  }
  function update($data,$id)
  {
    $this->db->where($this->mobil_id,$id);
    return $q = $this->db->update($this->mobil,$data);
  }
  function delete($data,$id)
  {
    $this->db->where($this->mobil_id,$id);
    return $q = $this->db->update($this->mobil,$data);
  }

  function cek_uuid_mobil($uuid_mobil)
  {
    $this->db->where('uuid_mobil_unit', $uuid_mobil);
    $query = $this->db->get($this->mobil)->first_row();

    return $query;
  }
}
