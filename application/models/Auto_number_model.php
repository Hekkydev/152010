<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_number_model extends CI_Model{


  function AutoKodeJurusan()
  {
    $q = $this->db->query("select MAX(RIGHT(kode_jurusan,6)) as kd_max from p_master_jurusan");
     $time  = date('Ymd');
     $kd = "";
     if($q->num_rows()>0)
     {
         foreach($q->result() as $k)
         {
             $tmp = ((int)$k->kd_max)+1;
             $kd = sprintf("%06s", $tmp);
         }
     }
     else
     {
         $kd = "001";
     }
     return "KJ".$time.$kd;
  }


  function AutoKodeJadwal()
  {
    $q = $this->db->query("select MAX(RIGHT(kode_jadwal,6)) as kd_max from p_jadwal");
     $time  = date('Ymd');
     $kd = "";
     if($q->num_rows()>0)
     {
         foreach($q->result() as $k)
         {
             $tmp = ((int)$k->kd_max)+1;
             $kd = sprintf("%06s", $tmp);
         }
     }
     else
     {
         $kd = "001";
     }
     return "KJD".$time.$kd;
  }



  function AutoKodeMember()
  {
    $q = $this->db->query("select MAX(RIGHT(kode_member,6)) as kd_max from p_member");

     $kd = "";
     if($q->num_rows()>0)
     {
         foreach($q->result() as $k)
         {
             $tmp = ((int)$k->kd_max)+1;
             $kd = sprintf("%06s", $tmp);
         }
     }
     else
     {
         $kd = "001";
     }
     return "M".$kd;
  }


    function AutoKodeUsers()
    {
      $q = $this->db->query("select MAX(RIGHT(p_users.kode_user,6)) as kd_max from `p_users`");

       $kd = "";
       if($q->num_rows()>0)
       {
           foreach($q->result() as $k)
           {
               $tmp = ((int)$k->kd_max)+1;
               $kd = sprintf("%06s", $tmp);
           }
       }
       else
       {
           $kd = "001";
       }
       return "U".$kd;
    }

    function AutoKodeBooking()
    {
      $q = $this->db->query("select MAX(RIGHT(p_reservasi_shuttle_kode_booking.kode_booking,3)) as kd_max from `p_reservasi_shuttle_kode_booking`");

       $kd = "";
       $time  = date('YmdHi');
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
       return "PSTB".$time.$kd;
    }

    function AutoKodeReservasi()
    {
      $q = $this->db->query("select MAX(RIGHT(p_reservasi_shuttle_kode_tiket.kode_tiket,3)) as kd_max from `p_reservasi_shuttle_kode_tiket`");

       $kd = "";
       $time  = date('Ym');
       $random = $this->generate_kode_tiket();
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
       return "PST".$random.$time.$kd;
    }

    function generate_kode_tiket($length = 5) {

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
        return $randomString;
    }


}
