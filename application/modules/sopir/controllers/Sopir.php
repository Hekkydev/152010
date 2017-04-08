<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Module Pengaturan Index
 */
class Sopir extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->Authentikasi         = $this->Authentikasi();
    $this->AllSopir             = $this->sopir_model->AllSopir()->result();
    $this->waktu_skr            = $this->waktu_skr();
    $this->sopir                = "sopir";
    $this->sopir_add            = "sopir/add";
    $this->sopir_edit           = "sopir/edit";
    $this->perPage              = 10;

  }

  public function index()
  {
    $data['record'] = count($this->AllSopir);
    $this->title_page('Sopir');
    $this->page_sub('Sopir/page',$data);
  }

  public function listData()
  {
    $data = array();

    //total rows count
    $totalRec = count($this->sopir_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->sopir.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['sopir'] = $this->sopir_model->getRows(array('limit'=>$this->perPage));

    $this->page_load('Sopir/list',$data);
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
        $totalRec = count($this->sopir_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->sopir.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['sopir'] = $this->sopir_model->getRows($conditions);

        //load the view
        $this->page_load('Sopir/list', $data, false);
    }




  public function add()
  {
    $this->title_page('Tambah Data Sopir');
    $this->page_sub_center('Sopir/add');
  }

  public  function edit()
  {
    $id = $this->input->get('sid');
    if($id == TRUE){
        $data['sopir'] = $this->sopir_model->getID($id)->first_row();
        $this->title_page("Edit Data Sopir");
        $this->page_sub_center("Sopir/edit",$data);
    }else{
          redirect($this->sopir);
    }
  }

  public  function detail()
  {
    $id = $this->input->get('sid');
    if($id == TRUE){
        $data['sopir'] = $this->sopir_model->getID($id)->first_row();
        $this->title_page("Detail Sopir");
        $this->page_sub_center("Sopir/detail",$data);
    }else{
          redirect($this->sopir);
    }
  }

  // //////////////////////////proses//////////////////////////////////////////
  function insert()
  {
    if ($this->input->post('simpan') == TRUE) {
       $data = array(
         'kode_sopir'=>$this->input->post('kode_sopir'),
         'nama_lengkap'=>$this->input->post('nama_sopir'),
         'no_hp'=>$this->input->post('no_hp'),
         'no_ktp'=>$this->input->post('no_ktp'),
         'no_sim'=>$this->input->post('no_sim'),
         'alamat_sopir'=>$this->input->post('alamat_sopir'),
         'id_status'=>$this->input->post('id_status'),
         'created_date'=>$this->waktu_skr,
       );
       $insert = $this->sopir_model->insert($data);
       if ($insert == TRUE):
            $this->AlertRequest("Sopir","add");
            redirect($this->sopir_add);
       endif;
    }else {
      redirect($this->sopir_add);
    }
  }

  function update()
  {
    if ($this->input->post('simpan') == TRUE) {
      $data = array(
        'kode_sopir'=>$this->input->post('kode_sopir'),
        'nama_lengkap'=>$this->input->post('nama_sopir'),
        'no_hp'=>$this->input->post('no_hp'),
        'no_ktp'=>$this->input->post('no_ktp'),
        'no_sim'=>$this->input->post('no_sim'),
        'alamat_sopir'=>$this->input->post('alamat_sopir'),
        'id_status'=>$this->input->post('id_status'),
        'last_change_date'=>$this->waktu_skr,
      );
      $id = $this->input->post('id_sopir');
      $update = $this->sopir_model->update($data,$id);
      if($update == TRUE) :
        $this->AlertRequest("Sopir","update");
        redirect($this->sopir_edit.'?sid='.$id.'');
      endif;
    }else {
      redirect($this->sopir);
    }
  }

  function hapus()
  {

    $id = $this->input->get('sid');
    if($id == TRUE){
      $data = array(
        'deleted_date'=>$this->waktu_skr,
      );
      $update = $this->sopir_model->update($data,$id);
      if($update == TRUE) redirect($this->sopir);
    }else{
          redirect($this->sopir);
    }

  }

}
