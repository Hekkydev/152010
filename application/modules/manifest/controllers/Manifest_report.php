
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Manifest data OCntorlelr
 */
class Manifest_report extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->Authentikasi           = $this->Authentikasi();
        $this->AllKota                = $this->AllKota()->result_object();
    }


    public function index()
    {

        $data['kota'] = $this->AllKota;
        $this->title_page("Manifest Report");
        $this->page_sub("manifest_report/page");
    }
}



/* End of file filename.php */
