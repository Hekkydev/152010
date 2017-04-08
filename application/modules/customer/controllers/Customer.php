<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi         = $this->Authentikasi();
    $load_model                 = $this->load->model(array('customer_model'));
    $this->AutoNumber           = $this->customer_model->generate();
    $this->waktu_skr            = $this->waktu_skr();
    $this->customer             = "customer";
    $this->perPage              = 10;
  }

  function index()
  {
      $this->title_page('Customer');
      $this->page_sub('customer/page');
  }

  function listData()
  {
    $data = array();

    //total rows count
    $totalRec = count($this->customer_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->customer.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['customer'] = $this->customer_model->getRows(array('limit'=>$this->perPage));
    $data['no'] = 1;
    $this->page_load('customer/list',$data);
  }

  function ajaxPaginationData(){
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
        $totalRec = count($this->customer_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->customer.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['customer'] = $this->customer_model->getRows($conditions);
        $data['no'] = $page +1;
        $this->page_load('customer/list', $data, false);
    }

  function insert()
  {
          $post = (object) $_POST;

          $data_customers = array(
            'kode_customers'=>$this->AutoNumber,
            'telp_customers'=>$post->nomor_telephone,
            'nama_customers'=>$post->nama_customers,
            'created_date'=>$this->waktu_skr,
          );

          if($data_customers)
          {
            $simpan = $this->customer_model->simpan_customer($data_customers);
            if ($simpan == TRUE) {
              echo "success";
            }else{
              echo "error";
            }

          }

  }


  

}
