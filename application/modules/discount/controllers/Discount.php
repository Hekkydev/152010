<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discount extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi             = $this->Authentikasi();

    // ---------LOAD MODEL------------------------------------
    $this->load->model(array('discount_model'));
    $this->AllDiscount              = $this->discount_model->AllDiscount();
    $this->discount                 = "discount/discount";
    $this->perPage                  = 30;
  }

  function index()
  {

        $data['record'] = $this->AllDiscount->num_rows();
        $this->title_page("Discount");
        $this->page_sub("discount/page",$data);
  }


  public function listData()
  {
	   $data = array();

    //total rows count
    $totalRec = count($this->discount_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->discount.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['discount'] = $this->discount_model->getRows(array('limit'=>$this->perPage));

    $this->page_load('discount/list',$data);
  }

  public function ajaxPaginationData()
  {
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
        $totalRec = count($this->discount_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->discount.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['discount'] = $this->discount_model->getRows($conditions);

        //load the view
        $this->page_load('discount/list', $data, false);
  }

  function add()
  {
        $this->title_page("Tambah Discount");
        $this->page_sub_center_large("discount/create/add");
  }

  function entri()
  {
        $diskon = (object) $_POST;
        $data = array(
          'id_status'=>1,
          'jumlah_tarif_diskon'=>str_replace(',','',$diskon->tarif),
          'jenis_operasional'=>$diskon->jenis_operasional,
          'informasi_diskon'=>$diskon->informasi,
          'created_date'=>$this->waktu_skr(),
        );

        $simpan = $this->discount_model->entri_discount($data);
        if($simpan == TRUE)
        {
          echo "success";
        }
  }

  function remove_discount()
  {
          $id = $this->input->post('id_tarif_diskon');

          $data = array('deleted_date'=>$this->waktu_skr());
          $update = $this->discount_model->remove_discount($data,$id);
          if($update == TRUE)
          {
            echo "success";
          }
  }

  function change_status()
  {
          $id = $this->input->post('id_tarif_diskon');
          $id_status = $this->input->post('id_status');

          if($id_status == 1)
          {
              $data = array(
                'id_status'=>2,
                'last_change_date'=>$this->waktu_skr()
              );
          }else if($id_status == 2)
          {
            $data = array(
              'id_status'=>1,
              'last_change_date'=>$this->waktu_skr()
            );
          }


          $update = $this->discount_model->change_status($data,$id);
          if($update == TRUE)
          {
            echo "success";
          }

  }

}
