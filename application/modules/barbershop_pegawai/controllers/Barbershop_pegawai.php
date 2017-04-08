<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barbershop_pegawai extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi         = $this->Authentikasi();
    $this->AllCabang            = $this->AllCabang()->result();
    $this->barbershop           = "Barbershop_pegawai";
    $this->model_load           =  $this->load->model(array('barbershop_pegawai_model'));
    $this->Product_service      = $this->barbershop_pegawai_model->pegawai_service();
    $this->Autonumber           = $this->barbershop_pegawai_model->AutoKodeBarbershop_pegawai();
    $this->perPage              = 30;
  }

  function index()
  {
        $data['record'] = count($this->barbershop_pegawai_model->pegawai_service()->result());
        $this->title_page("Pegawai");
        $this->page_sub("Barbershop_pegawai/page",$data);
  }

  public function listData()
  {
    $data = array();

    //total rows count
    $totalRec = count($this->barbershop_pegawai_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->barbershop.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['list'] = $this->barbershop_pegawai_model->getRows(array('limit'=>$this->perPage));

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
        $totalRec = count($this->barbershop_pegawai_model->getRows($conditions));

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
        $data['list'] = $this->barbershop_pegawai_model->getRows($conditions);

        //load the view
        $this->page_load('read/list', $data, false);
    }

  function add()
  {
        $data['cabang'] = $this->AllCabang;
        $this->title_page("Tambah Product Service");
        $this->page_sub_center_large("Barbershop_pegawai/create/add",$data);
  }

  function edit()
  {
        $kode_service = $this->input->get('sid');
        $data['service'] = $this->barbershop_pegawai_model->get_kode($kode_service);
        $data['cabang'] = $this->AllCabang;
        $this->title_page("Edit Data Pegawai");
        $this->page_sub_center_large("Barbershop_pegawai/update/edit",$data);
  }

  function add_proses()
  {
        $post = (object) $_POST;
        //print_r($post); die();
        $data = array(
          'id_status'=>$post->status,
          'uuid_cabang'=>$post->uuid_cabang,
          'kode_pegawai'=>$this->Autonumber,
          'nama_pegawai' =>$post->nama_pegawai,
          'telp_pegawai'=>$post->telp_pegawai,
          'alamat_pegawai'=>$post->alamat_pegawai,
          'created_date'=>$this->waktu_skr(),

        );

        $simpan =  $this->barbershop_pegawai_model->insert($data);
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
          'nama_pegawai' =>$post->nama_pegawai,
          'telp_pegawai'=>$post->telp_pegawai,
          'alamat_pegawai'=>$post->alamat_pegawai,
          'last_change_date'=>$this->waktu_skr(),

        );

        $simpan =  $this->barbershop_pegawai_model->update($data,$post->kode_pegawai);
        if($simpan == TRUE)
        {
          echo "success";
        }else{
          echo "error";
        }
  }

  function remove_service()
  {
        $id = $this->input->post('id_barbershop_pegawai');
        $data = array(
          'deleted_date'=>$this->waktu_skr(),
        );

        $this->db->where('id_barbershop_pegawai',$id);
        $remove = $this->db->update('p_barbershop_pegawai',$data);
        if($remove == TRUE)
        {
          echo "success";
        }else{
          echo "error";
        }
  }


  function change_status()
  {
          $id = $this->input->post('id_barbershop_pegawai');
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


          $this->db->where('id_barbershop_pegawai',$id);
          $update = $this->db->update('p_barbershop_pegawai',$data);
          if($update == TRUE)
          {
            echo "success";
          }else{
            echo "error";
          }
  }

}
