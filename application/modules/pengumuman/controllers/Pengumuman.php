<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi     = $this->Authentikasi();
    $this->waktu_skr        = $this->waktu_skr();
    $this->AllPengumuman    = $this->AllPengumuman()->result();
    $this->pengumuman       = "pengumuman";
    $this->pengumuman_add   = "pengumuman/add";
    $this->pengumuman_edit  = "pengumuman/edit";
    $this->perPage          = 30;
  }

  function index()
  {
      $data['record'] = count($this->AllPengumuman);
      $this->title_page("Data Pengumuman");
      $this->page_sub("pengumuman/pengumuman/page",$data);
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
    $this->page_load("pengumuman/pengumuman/list",$data,false);
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
        $this->page_load('Pengumuman/pengumuman/list', $data, false);
    }

    //-------------------------CREATE---------------------------------------

    public function add()
    {
      $this->title_page("Buat Pengumuman");
      $this->page_sub_center_large("pengumuman/pengumuman/add");
    }
    public function edit()
    {
      $sid = strip_tags($this->input->get('sid'));
      if($sid == TRUE):
        $pengumuman = $this->pengumuman_model->getID($sid)->num_rows();
        if($pengumuman > 0):
          $data['pengumuman'] = $this->pengumuman_model->getID($sid)->first_row();

          $this->title_page("Detail Pengumuman");
          $this->page_sub_center_large("pengumuman/pengumuman/edit",$data);
        else:
          redirect($this->pengumuman);
        endif;
      else:
      endif;
    }




    //-------------------------PROSES--------------------------------------
    function entri()
    {
      $judul = $this->input->post('judul_pengumuman',TRUE);
      $ket = $this->input->post('ket_pengumuman',TRUE);
      $uuid_user = $this->input->post('uuid_user',TRUE);
      $data = array(
        'uuid_user'=>$uuid_user,
        'judul_pengumuman'=>$judul,
        'ket_pengumuman'=>$ket,
        'created_date'=>$this->waktu_skr,
      );

      $simpan = $this->pengumuman_model->insert($data);
      if($simpan == TRUE):
        $this->AlertRequest("Pengumuman","add");
        redirect($this->pengumuman);
      endif;
    }

    function update()
    {
      $judul = $this->input->post('judul_pengumuman',TRUE);
      $ket = $this->input->post('ket_pengumuman',TRUE);
      $uuid_user = $this->input->post('uuid_user',TRUE);
      $uuid_pengumuman = $this->input->post('uuid_pengumuman',TRUE);
      $data = array(
        'uuid_user'=>$uuid_user,
        'judul_pengumuman'=>$judul,
        'ket_pengumuman'=>$ket,
        'last_change_date'=>$this->waktu_skr,
      );

      $update = $this->pengumuman_model->update($data,$uuid_pengumuman);
      if($update == TRUE):
        $this->AlertRequest("Pengumuman","update");
        redirect($this->pengumuman);
      endif;
    }

    function hapus()
    {
      $sid = strip_tags($this->input->get('sid'));
      if($sid == TRUE):
        $data = array('deleted_date' =>$this->waktu_skr);
        $update = $this->pengumuman_model->update($data,$sid);
        if($update == TRUE):
          $this->AlertRequest("Pengumuman","delete");
          redirect($this->pengumuman);
        endif;
      endif;
    }


}
