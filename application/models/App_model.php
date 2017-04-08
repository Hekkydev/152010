<?php
/**
 * Application model
 */
class App_model extends MY_Model
{
    public function getCompany()
    {
      return $q = $this->db->get('p_company')->first_row();
    }
    public function update_company($data,$id)
    {
                  $this->db->where('ID_company',$id);
      return $q = $this->db->update('p_company',$data);
    }
    public function getStatus()
    {
      return $q = $this->db->get('p_status')->result();
    }
    public function getJenisJurusan()
    {
      return $q = $this->db->get('p_master_jenis_jurusan')->result();
    }
    public function AllGroup()
    {
      return $q = $this->db->get('p_users_group')->result();
    }

    public function jmlKursi()
    {
      return $q = $this->db->get('p_mobil_kursi')->result();
    }

    function getAuth($u,$p,$c)
    {
      $this->db->select('*');
      $this->db->from('p_users_access');
      $this->db->join('p_users','p_users.kode_user = p_users_access.kode_user','left');
      $this->db->where('p_users_access.username',$u);
      $this->db->where('p_users_access.password',$p);
      $this->db->where('p_users.id_cabang',$c);
      $this->db->where('p_users.deleted_date',NULL);
      return $q = $this->db->get();
    }

    function getDataUsers($kode_user)
    {
      $this->db->where('kode_user',$kode_user);
      return $q = $this->db->get('p_users');
    }

    function getUserLog($id)
    {
      $this->db->select('*');
      $this->db->from('p_users');
      $this->db->join('p_cabang','p_cabang.id_cabang = p_users.id_cabang','left');
      $this->db->join('p_users_group','p_users_group.id_user_group = p_users.id_user_group','left');
      $this->db->join('p_users_access','p_users_access.kode_user = p_users.kode_user','left');
      $this->db->join('p_status','p_status.id_status = p_users.id_status','left');
      $this->db->where('p_users.uuid_user',$id);
      return $q = $this->db->get();
    }

    function jenisKelamin()
    {
      $jenis = array(
        '1'=>'Laki - Laki',
        '2'=>'Perempuan',
      );

      return $jenis;
    }

    function session_logs()
    {
      $this->db->select('from_unixtime(timestamp) AS timestamp,ip_address,id');
      $this->db->from('ci_sessions');
      return $this->db->get();
    }

    function cek_kondisi_password($kode){
        $this->db->select('*');
        $this->db->from('p_users_access');
        $this->db->where('p_users_access.kode_user',$kode);
        return $q = $this->db->get();
    }


    function check_phone($nomor)
    {
        
        $this->db->where('telp_customers',$nomor);
        $query = $this->db->get('p_customers_all');
        return $query->first_row();
    }

    function check_member($kode_member)
    {
        $this->db->where('kode_member',$kode_member);
        $query = $this->db->get('p_members');
        return $query->first_row();
    }





}
