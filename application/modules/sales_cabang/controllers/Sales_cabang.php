
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller : Sales_cabang
 * Author : Hekky Nurhikmat
 */
class Sales_Cabang extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->Authentikasi   = $this->Authentikasi();
    }

    public function index()
    {
        $this->title_page("Sales Cabang");
        $this->page_sub("sales_cabang/page");
    }


}


/* End of file Sales_cabang.php */