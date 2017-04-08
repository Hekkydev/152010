<?php
/**
 * Manifest By Hekky Nurhikmat
 */
class Manifest extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->Authentikasi             = $this->Authentikasi();
        $this->model                    = $this->load->model('manifest_model');
        $this->AllKota                  = $this->AllKota()->result_object();
        
    }

    public function index()
    {
        $data['kota'] = $this->AllKota;
        $this->title_page('Daftar Manifest');
        $this->page_sub('manifest/page',$data);
    }

    public function find_manifest()
    {
        $post = $_POST;
        $data_search = array(
            'tanggal_awal'=>$this->waktu_skr(),
            'tanggal_akhir'=>$this->waktu_skr(),
        );
        if(empty($post)){  
            $this->data['manifest'] = $this->manifest_model->find_manifest($data_search);
        }else{
            $this->data['manifest'] = $this->manifest_model->find_manifest($post);
        }

        $this->page_load('manifest/options/list',$this->data);
        
    }
}
