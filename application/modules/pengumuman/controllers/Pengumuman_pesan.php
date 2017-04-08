<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_pesan extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi       = $this->Authentikasi();
    $this->AllPengumuman      = $this->AllPengumuman()->result();
    $this->perPage            = 30;
    $this->pengumuman         = "pengumuman/pengumuman_pesan";
  }

  function index()
  {
    $data['record'] = count($this->AllPengumuman);
    $this->page_form("Pengumuman_pesan/page",$data);

  }

  public function listData()
  {
    $data = array();

    //total rows count
    $totalRec = count($this->pengumuman_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->pengumuman.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['pengumuman'] = $this->pengumuman_model->getRows(array('limit'=>$this->perPage));
    //print_r($data['pengumuman']); die();
    $this->page_load('pengumuman_pesan/list', $data, false);
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
        $totalRec = count($this->pengumuman_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->pengumuman.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['pengumuman'] = $this->pengumuman_model->getRows($conditions);

        //load the view
        $this->page_load('pengumuman_pesan/list', $data, false);
    }

    public function detail_source()
    {
      $sid = strip_tags($this->input->get('sid'));
      if($sid == TRUE):
        $pengumuman = $this->pengumuman_model->getID($sid)->num_rows();
        if($pengumuman > 0):
          $data['pengumuman'] = $this->pengumuman_model->getID($sid)->first_row();

          $this->title_page("Detail Pengumuman");
          $this->page_source("pengumuman_pesan/detail_source",$data);
        else:
          redirect($this->pengumuman);
        endif;
      else:
      endif;
    }

}
