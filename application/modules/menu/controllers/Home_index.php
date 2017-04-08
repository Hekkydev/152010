<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_index extends MY_Controller
{

    function __construct()
    {
      parent::__construct();
      $this->Authentikasi = $this->Authentikasi();
    }

    public function index()
    {
        $this->title_page('Home');
        $this->page('Home');
    }


    public function uuid()
    {
      // $send = $this->app_model->send_uuid_data();
      // if($send == TRUE){
      //   echo "success";
      // }
      $m=microtime(true);
      $ui = sprintf("%8x%05x\n",floor($m),($m-floor($m))*1000000);
      echo $ui;
    }




}




/* End of file filename.php */
