<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * General Library
 * Author : Hekky Nurhikmat
 */
class General 
{
    var $CI;
    function __construct()
    {
        $this->CI =& get_instance();       
    }

    function check_phone($nomor)
    {
        if(isset($nomor)){
            $this->CI->load->model("app_model");
            $query = $this->CI->app_model->check_phone($nomor);
            return $query;
        }
    }

    function check_member($kode_member)
    {
        if(isset($kode_member)){
            $this->CI->load->model('app_model');
            $query = $this->CI->app_model->check_member($kode_member);
            return $query;
        }
    }

    public function cek_block($sid,$nomor_layout)
    {
        if(isset($nomor_layout)){
            $this->CI->load->model('../modules/seat/models/seat_model');
            $query = $this->CI->seat_model->cek_block($sid,$nomor_layout);
            return $query;
        }

    }


}


/* End of file General Library.php */
