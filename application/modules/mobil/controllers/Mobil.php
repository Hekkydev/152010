<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Module Pengaturan Index
 */
class Mobil extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->Authentikasi       = $this->Authentikasi();
    $this->AllMobil           = $this->mobil_model->AllMobil()->result();
    $this->AllSopir           = $this->sopir_model->AllSopir()->result();
    $this->AllCabang          = $this->cabang_model->AllCabangJoin()->result();
    $this->waktu_skr          = $this->waktu_skr();
    $this->mobil              = "mobil";
    $this->mobil_add          = "mobil/add";
    $this->mobil_edit         = "mobil/edit";
    $this->perPage            = 10;

  }

  public function index()
  {
    $data['record'] = count($this->AllMobil);
    $this->title_page('Mobil');
    $this->page_sub('Mobil/page',$data);
  }

  public function listData()
  {
    $data = array();

    //total rows count
    $totalRec = count($this->mobil_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->mobil.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['mobil'] = $this->mobil_model->getRows(array('limit'=>$this->perPage));

    $this->page_load('Mobil/list',$data);
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
        $totalRec = count($this->mobil_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->mobil.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['mobil'] = $this->mobil_model->getRows($conditions);

        //load the view
        $this->page_load('Mobil/list', $data, false);
    }


  public function add()
  {
    $data['sopir'] = $this->AllSopir;
    $data['cabang'] = $this->AllCabang;
    $this->title_page('Tambah Unit Mobil');
    $this->page_sub_center_large('Mobil/add',$data);
  }

  public function detail()
  {
    $id = $this->input->get('sid',TRUE);
    if ($id == TRUE) {
      $data['sopir'] = $this->AllSopir;
      $data['cabang'] = $this->AllCabang;
      $data['mobil'] = $this->mobil_model->getID($id)->first_row();
      $this->title_page('Detail Unit Mobil');
      $this->page_sub_center_large('Mobil/detail',$data);
    }else {
      redirect($this->mobil,'refresh');
    }
  }

  public function edit()
  {
    $id = $this->input->get('sid',TRUE);
    if ($id == TRUE) {
      $data['sopir'] = $this->AllSopir;
      $data['cabang'] = $this->AllCabang;
      $data['mobil'] = $this->mobil_model->getID($id)->first_row();
      $this->title_page('Edit Unit Mobil');
      $this->page_sub_center_large('Mobil/edit',$data);
    }else {
      redirect($this->mobil,'refresh');
    }
  }

// /////////////////////////proses//////////////////////////////////////////

  function entri()
  {
    if ($this->input->post('simpan') == TRUE) {
      $data = array(
        'id_sopir_1'=>$this->input->post('id_sopir_1', TRUE),
        'id_sopir_2'=>$this->input->post('id_sopir_2', TRUE),
        'id_jml_kursi'=>$this->input->post('id_jml_kursi', TRUE),
        'uuid_cabang'=>$this->input->post('id_cabang', TRUE),
        'id_status'=>$this->input->post('id_status', TRUE),
        'kode_unit'=>$this->input->post('kode_unit', TRUE),
        'no_plat'=>$this->input->post('no_plat', TRUE),
        'no_polisi'=>$this->input->post('no_polisi', TRUE),
        'jenis'=>$this->input->post('jenis', TRUE),
        'merek'=>$this->input->post('merek', TRUE),
        'tahun_pembuatan'=>$this->input->post('tahun_pembuatan', TRUE),
        'warna'=>$this->input->post('warna', TRUE),
        'no_stnk'=>$this->input->post('no_stnk', TRUE),
        'no_bpkb'=>$this->input->post('no_bpkb', TRUE),
        'no_rangka'=>$this->input->post('no_rangka', TRUE),
        'no_mesin'=>$this->input->post('no_mesin', TRUE),
        'kilometer_terakhir'=>$this->input->post('kilometer_terakhir', TRUE),
        'created_date'=>$this->waktu_skr,
      );
      $insert = $this->mobil_model->insert($data);
      if($insert == TRUE):
          $this->AlertRequest("Unit Mobil","add");
          redirect($this->mobil,'refresh');
      endif;
    }else {
      redirect($this->mobil_add,'refresh');
    }
  }

  function update()
  {
    if ($this->input->post('simpan') == TRUE) {
      $data = array(
        'id_sopir_1'=>$this->input->post('id_sopir_1', TRUE),
        'id_sopir_2'=>$this->input->post('id_sopir_2', TRUE),
        'id_jml_kursi'=>$this->input->post('id_jml_kursi', TRUE),
        'uuid_cabang'=>$this->input->post('id_cabang', TRUE),
        'id_status'=>$this->input->post('id_status', TRUE),
        'kode_unit'=>$this->input->post('kode_unit', TRUE),
        'no_plat'=>$this->input->post('no_plat', TRUE),
        'no_polisi'=>$this->input->post('no_polisi', TRUE),
        'jenis'=>$this->input->post('jenis', TRUE),
        'merek'=>$this->input->post('merek', TRUE),
        'tahun_pembuatan'=>$this->input->post('tahun_pembuatan', TRUE),
        'warna'=>$this->input->post('warna', TRUE),
        'no_stnk'=>$this->input->post('no_stnk', TRUE),
        'no_bpkb'=>$this->input->post('no_bpkb', TRUE),
        'no_rangka'=>$this->input->post('no_rangka', TRUE),
        'no_mesin'=>$this->input->post('no_mesin', TRUE),
        'kilometer_terakhir'=>$this->input->post('kilometer_terakhir', TRUE),
        'last_change_date'=>$this->waktu_skr,
      );
      $id = $this->input->post('id_mobil_unit',TRUE);
      $update = $this->mobil_model->update($data,$id);
      if($update == TRUE):
            $this->AlertRequest("Unit Mobil","update");
            redirect($this->mobil_edit.'?sid='.$id.'','refresh');
      endif;
    }else {
      redirect($this->mobil,'refresh');
    }
  }

  function delete()
  {
      $id = $this->input->get('sid',TRUE);
      if ($id == TRUE) {
          $data = array('deleted_date'=>$this->waktu_skr);
          $hapus = $this->mobil_model->delete($data,$id);
          if ($hapus == TRUE ) redirect($this->mobil,'refresh');
      }else {
        redirect($this->mobil,'refresh');
      }
  }

}
