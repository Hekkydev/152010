<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barbershop_service extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi         = $this->Authentikasi();
    $this->AllCabang            = $this->AllCabang()->result();
    $this->barbershop           = "barbershop_service";
    $this->load->model(array('barbershop_model'));
    $this->Product_service      = $this->barbershop_model->product_service();
    $this->Autonumber           = $this->barbershop_model->AutoKodeBarbershop_service();
    $this->perPage              = 30;
  }

  function index()
  {
        $data['record'] = count($this->barbershop_model->product_service()->result());
        $this->title_page("Product Service");
        $this->page_sub("barbershop_service/page",$data);
  }

  public function listData()
  {
    $data = array();

    //total rows count
    $totalRec = count($this->barbershop_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->barbershop.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['list'] = $this->barbershop_model->getRows(array('limit'=>$this->perPage));

    $this->page_load('read/list',$data);
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
        $totalRec = count($this->barbershop_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->barbershop.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['list'] = $this->barbershop_model->getRows($conditions);

        //load the view
        $this->page_load('read/list', $data, false);
    }

  function add()
  {
        $data['cabang'] = $this->AllCabang;
        $this->title_page("Tambah Product Service");
        $this->page_sub_center_large("barbershop_service/create/add",$data);
  }

  function edit()
  {
        $kode_service = $this->input->get('sid');
        $data['service'] = $this->barbershop_model->get_kode($kode_service);
        $data['cabang'] = $this->AllCabang;
        $this->title_page("Edit Product Service");
        $this->page_sub_center_large("barbershop_service/update/edit",$data);
  }

  function add_proses()
  {
        $post = (object) $_POST;
        //print_r($post); die();
        $data = array(
          'id_status'=>$post->status,
          'uuid_cabang'=>$post->uuid_cabang,
          'kode_service'=>$this->Autonumber,
          'name_service' =>strtolower($post->name_service),
          'harga_service'=>str_replace(',','',$post->biaya_service),
          'created_date'=>$this->waktu_skr(),

        );

        $simpan =  $this->barbershop_model->insert($data);
        if($simpan == TRUE)
        {
          echo "success";
        }else{
          echo "error";
        }
  }


  function edit_proses()
  {
        $post = (object) $_POST;
        //print_r($post); die();
        $data = array(
          'id_status'=>$post->status,
          'uuid_cabang'=>$post->uuid_cabang,
          'name_service' =>strtolower($post->name_service),
          'harga_service'=>str_replace(',','',$post->biaya_service),
          'last_change_date'=>$this->waktu_skr(),

        );

        $simpan =  $this->barbershop_model->update($data,$post->kode_service);
        if($simpan == TRUE)
        {
          echo "success";
        }else{
          echo "error";
        }
  }

  function remove_service()
  {
        $id = $this->input->post('id_barbershop_service');
        $data = array(
          'deleted_date'=>$this->waktu_skr(),
        );

        $this->db->where('id_barbershop_service',$id);
        $remove = $this->db->update('p_barbershop_service',$data);
        if($remove == TRUE)
        {
          echo "success";
        }else{
          echo "error";
        }
  }


  function change_status()
  {
          $id = $this->input->post('id_barbershop_service');
          $id_status = $this->input->post('id_status');

          if($id_status == 2):
            $data = array(
              'id_status'=>1,
              'last_change_date'=>$this->waktu_skr(),
            );
          else:
            $data = array(
              'id_status'=>2,
              'last_change_date'=>$this->waktu_skr(),
            );
          endif;


          $this->db->where('id_barbershop_service',$id);
          $update = $this->db->update('p_barbershop_service',$data);
          if($update == TRUE)
          {
            echo "success";
          }else{
            echo "error";
          }
  }

}
