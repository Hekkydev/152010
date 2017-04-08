<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Module Pengaturan Index
 */
class Kota extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->Authentikasi       = $this->Authentikasi();
    $this->AllKota            = $this->kota_model->AllKota()->result();
    $this->kota               = "kota";
    $this->kota_add           = "kota/add";
    $this->kota_edit          = "kota/edit";
    $this->perPage            = "10";


  }


  public function index()
  {

      $data['record'] = count($this->AllKota);
      $this->title_page('Kota');
      $this->page_sub_center_large('Kota/page',$data);
  }

  public function listData()
  {
    $data = array();

    //total rows count
    $totalRec = count($this->kota_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->kota.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

    //get the posts data
    $data['kota'] = $this->kota_model->getRows(array('limit'=>$this->perPage));
    $this->page_load('Kota/list',$data);
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
        $totalRec = count($this->kota_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->kota.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['kota'] = $this->kota_model->getRows($conditions);

        //load the view
        $this->page_load('Kota/list', $data, false);
    }



  public function add()
  {
    $this->title_page('Tambahkan Kota');
    $this->page_sub_center('Kota/add');
  }


  public function edit()
  {
    $id = $this->input->get('sid');
    $data = array();
    if($id == TRUE):
       $cek = $this->kota_model->getIDkota($id);
      if($cek->num_rows() > 0 ):
        $data['kota']  = $cek->first_row();
        $this->title_page('Edit Data Kota');
        $this->page_sub_center('Kota/edit',$data);
      else:
        redirect($this->kota);
      endif;
    else:
      redirect($this->kota);
    endif;

  }


///////////////////proses///////////////////////////////////////////////////////


  public function input()
  {

    $arr  = array(
      'kode_kota' => $this->input->post('kode_kota'),
      'nama_kota' => $this->input->post('nama_kota'),
      'created_date'=>date('Y-m-d H:i:s'),
    );

    $data = $this->security->xss_clean($arr);
    $insert = $this->kota_model->insert($data);
      if($insert == TRUE) :
          $this->AlertRequest("Kota","add");
          redirect($this->kota,'refresh');
      else :
          $this->AlertRequest("Kota","error");
          redirect($this->kota_add,'refresh');
     endif;
  }


  public function update(){
    $id = $this->input->post('sid');
    if ($id == TRUE) {
      $data  = array(
        'kode_kota' => $this->input->post('kode_kota'),
        'nama_kota' => $this->input->post('nama_kota'),
        'last_change_date'=>date('Y-m-d H:i:s'),
      );
      $update= $this->kota_model->updateID($id,$data);
      if($update == TRUE) :
         $this->AlertRequest("Kota","update");
         redirect($this->kota_edit.'?sid='.$id.'','refresh');
      endif;
    }else{
      redirect($this->kota,'refresh');
    }
  }


  public function delete()
  {
    $id = $this->input->get('sid');
    if ($id == TRUE) {
      $hapus = $this->kota_model->hapusID($id);
      if($hapus == TRUE):
          $this->AlertRequest("Kota","delete");
          redirect('kota/','refresh');
      endif;
    }else{
      redirect($this->kota,'refresh');
    }

  }



}
