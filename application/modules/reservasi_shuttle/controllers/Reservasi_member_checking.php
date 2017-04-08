<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_member_checking extends MY_Controller{


                public function __construct()
                {
                  parent::__construct();
                    $this->Authentikasi           = $this->Authentikasi();
                }



  function get_kode_member_cheking()
  {
            $kode_member = $this->input->post('kode_member');
            $arr_criteria = array('kode_member'=>$kode_member);
            $cheking = $this->db->get_where('p_member', $arr_criteria)->num_rows();
            print($cheking);
  }

  function get_kode_member_cheking_display()
  {
            $kode_member = $this->input->post('kode_member');
            $arr_criteria = array('kode_member'=>$kode_member);
            $cheking = $this->db->get_where('p_member', $arr_criteria)->first_row();
            if($cheking == TRUE):
            echo json_encode($cheking);
            else:
            $cheking = (object) array();
            echo json_encode($cheking);
            endif;
  }

  function get_notelp_cheking()
  {
            $no_handphone = $this->input->post('no_handphone');
            $arr_criteria = array('telp_customers'=>$no_handphone);
            $cheking = $this->db->get_where('p_customers_all', $arr_criteria)->first_row();
            if($cheking == TRUE):
            echo json_encode($cheking);
            else:
            $cheking = (object) array();
            echo json_encode($cheking);
            endif;
  }

}
