<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seat extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi         = $this->Authentikasi();
    $this->KursiMobil           = $this->KursiMobil();
    $this->load_model           = $this->load->model(array('seat_model'));
    $this->seat                 = "seat";
    $this->perPage              = 5;

  }

  function index()
  {
        $data['record'] = count($this->KursiMobil);
        $this->title_page("Kursi Mobil");
        $this->page_sub("page",$data);
  }


  public function listData()
    {
      $data = array();

      //total rows count
      $totalRec = count($this->seat_model->getRows());

      //pagination configuration
      $config['target']      = '#postList';
      $config['base_url']    = base_url().$this->seat.'/ajaxPaginationData';
      $config['total_rows']  = $totalRec;
      $config['per_page']    = $this->perPage;
      $config['link_func']   = 'searchFilter';
      $this->ajax_pagination->initialize($config);
      $data['kursi'] = $this->seat_model->getRows(array('limit'=>$this->perPage));
      $data['no'] = 1;
      $this->page_load('seat/list',$data);
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
        $totalRec = count($this->seat_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->seat.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['kursi'] = $this->seat_model->getRows($conditions);

        $data['no'] = $page +1;
        $this->page_load('seat/list', $data, false);
    }


}
