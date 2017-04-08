<?php

/**
 * Cabang MOdel Database
 */
class Cabang_model extends CI_Model
{
    function getRows($params = array())
    {
          $this->db->select('p_cabang.id_cabang,
                             p_cabang.nama_cabang,
                             p_cabang.kode_cabang,
                             p_cabang.alamat_cabang,
                             p_cabang.no_telp_cabang,
                             p_cabang.fax_cabang,
                             p_cabang.kode_atr,
                             p_cabang.id_cabang_tipe,
                             p_cabang.uuid_cabang,
                             p_kota.nama_kota,
                             p_kota.uuid_kota,
                             p_cabang_tipe.id_cabang_tipe,
                             p_cabang_tipe.tipe_cabang');
          $this->db->from('p_cabang');
          $this->db->join('p_kota','p_kota.uuid_kota = p_cabang.uuid_kota','left');
          $this->db->join('p_cabang_tipe','p_cabang_tipe.id_cabang_tipe = p_cabang.id_cabang_tipe','left');
          $this->db->where('p_cabang.deleted_date',NULL);

          if(!empty($params['search']['keywords'])){
              $this->db->like('nama_cabang',$params['search']['keywords']);
              $this->db->or_like('nama_kota',$params['search']['keywords']);
              $this->db->or_like('alamat_cabang',$params['search']['keywords']);
          }
          //sort data by ascending or desceding order
          if(!empty($params['search']['sortBy'])){
              $this->db->order_by('nama_cabang',$params['search']['sortBy']);
          }else{
              $this->db->order_by('id_cabang','desc');
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
    function tipeCabang()
    {
          return $q = $this->db->get('p_cabang_tipe');
    }

    function AllCabangJoin()
    {
        $this->db->select('p_cabang.id_cabang,
                           p_cabang.nama_cabang,
                           p_cabang.kode_cabang,
                           p_cabang.alamat_cabang,
                           p_cabang.no_telp_cabang,
                           p_cabang.fax_cabang,
                           p_cabang.kode_atr,
                           p_cabang.id_cabang_tipe,
                           p_cabang.uuid_cabang,
                           p_kota.nama_kota,
                           p_kota.uuid_kota,
                           p_cabang_tipe.id_cabang_tipe,
                           p_cabang_tipe.tipe_cabang');
        $this->db->from('p_cabang');
        $this->db->join('p_kota','p_kota.uuid_kota = p_cabang.uuid_kota','left');
        $this->db->join('p_cabang_tipe','p_cabang_tipe.id_cabang_tipe = p_cabang.id_cabang_tipe','left');
        $this->db->where('p_cabang.deleted_date',NULL);
        return $q = $this->db->get();
    }

    function getID($uuid)
    {
        $this->db->select('p_cabang.id_cabang,
                           p_cabang.nama_cabang,
                           p_cabang.kode_cabang,
                           p_cabang.alamat_cabang,
                           p_cabang.no_telp_cabang,
                           p_cabang.fax_cabang,
                           p_cabang.kode_atr,
                           p_cabang.uuid_cabang,
                           p_kota.nama_kota,
                           p_kota.uuid_kota,
                           p_cabang_tipe.id_cabang_tipe,
                           p_cabang_tipe.tipe_cabang ');
        $this->db->from('p_cabang');
        $this->db->join('p_kota','p_kota.uuid_kota = p_cabang.uuid_kota','left');
        $this->db->join('p_cabang_tipe','p_cabang_tipe.id_cabang_tipe = p_cabang.id_cabang_tipe','left');
        $this->db->where('p_cabang.deleted_date',NULL);
        $this->db->where('p_cabang.uuid_cabang',$uuid);
        return $q = $this->db->get();
    }

    function insert($data)
    {
        $this->db->set('uuid_cabang', 'UUID()', FALSE);
        return $q = $this->db->insert('p_cabang',$data);
    }

    function update($data,$uuid)
    {
        $this->db->where('p_cabang.uuid_cabang',$uuid);
        return $this->db->update('p_cabang',$data);
    }

    function hapus($data,$uuid)
    {
        $this->db->where('p_cabang.uuid_cabang',$uuid);
        return $this->db->update('p_cabang',$data);
    }


}
