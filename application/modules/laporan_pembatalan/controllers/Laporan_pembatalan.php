<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pembatalan extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi       = $this->Authentikasi();
    $load_model               = $this->load->model(array('pembatalan_tiket_model'));
    $this->pembatalan_tiket   = "laporan_pembatalan";
    $this->perPage            = 25;

  }

  function index()
  {
      $data['record']      = $this->pembatalan_tiket_model->all_record();
      $this->title_page("Laporan Pembatalan Tiket");
      $this->page_sub("laporan_pembatalan/page",$data);
  }

  public function listData()
  {
    $data = array();

    //total rows count
    $totalRec = count($this->pembatalan_tiket_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = site_url().$this->pembatalan_tiket.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['pembatalan_tiket'] = $this->pembatalan_tiket_model->getRows(array('limit'=>$this->perPage));
    $data['first_number'] = 1;
    $this->page_load('laporan_pembatalan/list',$data);
  }

  public function ajaxPaginationData(){
        $conditions = array();

        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }

        //set conditions for search
        $keywords = $this->input->post('keywords');
        $sortBy = $this->input->post('sortBy');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }

        //total rows count
        $totalRec = count($this->pembatalan_tiket_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = site_url().$this->pembatalan_tiket.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['pembatalan_tiket'] = $this->pembatalan_tiket_model->getRows($conditions);
        $data['first_number'] = $page +1;
        //load the view
        $this->page_load('laporan_pembatalan/list', $data, false);
    }



}
