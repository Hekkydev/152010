<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Module Pengaturan Index
 */
class Cabang extends MY_Controller
{


  function __construct()
  {
    parent::__construct();

    $this->Authentikasi       = $this->Authentikasi();
    $this->AllCabang          = $this->cabang_model->AllCabangJoin()->result();
    $this->AllKota            = $this->kota_model->AllKota()->result();
    $this->tipeCabang         = $this->cabang_model->tipeCabang()->result();
    $this->waktu_skr          = $this->waktu_skr();
    $this->cabang             = "cabang";
    $this->cabang_add         = "cabang/add";
    $this->cabang_edit        = "cabang/edit";
    $this->perPage            = 10;
  }

  public function index()
  {
    $data['cabang'] = $this->AllCabang;
    $data['record'] = count($this->AllCabang);
    $this->title_page('Cabang');
    $this->page_sub('page',$data);
  }

  public function listData()
  {
    $data = array();

    //total rows count
    $totalRec = count($this->cabang_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->cabang.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['cabang'] = $this->cabang_model->getRows(array('limit'=>$this->perPage));

    $this->page_load('list',$data);
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
        $totalRec = count($this->cabang_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->cabang.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['cabang'] = $this->cabang_model->getRows($conditions);

        //load the view
        $this->page_load('list', $data, false);
    }



  //-------------------------INSERT---------------------------------------------

  public function add()
  {
    $data['kota'] = $this->AllKota;
    $data['cabang_tipe'] = $this->tipeCabang;
    $this->title_page('Tambah Data Cabang');
    $this->page_sub_center('add.php',$data);
  }

  public function detail()
  {
    $id = $this->input->get('sid');
	$id_x = $this->security->xss_clean($id);
    if($id_x == TRUE){

        $data['kota'] = $this->AllKota;
        $data['cabang_tipe'] = $this->tipeCabang;
        $get_cabang = $this->cabang_model->getID($id_x)->num_rows();
		if($get_cabang > 0){
			$data['cabang'] = $this->cabang_model->getID($id_x)->first_row();
			$this->title_page('Detail Cabang');
			$this->page_sub_center('detail',$data);
		}else{
			redirect($this->cabang);
		}
	}else{
          redirect($this->cabang);
    }
  }

  public function edit()
  {
    $id = $this->input->get('sid');
    if($id == TRUE){

        $data['kota'] = $this->AllKota;
        $data['cabang_tipe'] = $this->tipeCabang;
        $data['cabang'] = $this->cabang_model->getID($id)->first_row();
        $this->title_page('Edit Data Cabang');
        $this->page_sub_center('edit.php',$data);
    }else{
          redirect($this->cabang);
    }
  }

/////////////////////////////////proses/////////////////////////////////////////////////////////
  function insert()
  {
    if ($this->input->post('simpan') == TRUE) {
      $data = array(
        'uuid_kota' =>$this->input->post('kota'),
        'kode_cabang'=>$this->input->post('kode_cabang'),
        'nama_cabang'=>$this->input->post('nama_cabang'),
        'alamat_cabang'=>$this->input->post('alamat_cabang'),
        'no_telp_cabang'=>$this->input->post('no_telp_cabang'),
        'fax_cabang'=>$this->input->post('fax_cabang'),
        'id_cabang_tipe'=>$this->input->post('tipe_cabang'),
        'created_date'=>$this->waktu_skr,
      );

      $insert = $this->cabang_model->insert($data);
        if($insert == TRUE) :
                  $this->AlertRequest("Cabang","add");
                  redirect($this->cabang);
        else:
                  redirect($this->cabang_add);
        endif;
    }else {
      redirect($this->cabang_add);
    }
  }


  function update()
  {
    if ($this->input->post('simpan') == TRUE) {
      $data = array(
        'uuid_kota' =>$this->input->post('kota'),
        'kode_cabang'=>$this->input->post('kode_cabang'),
        'nama_cabang'=>$this->input->post('nama_cabang'),
        'alamat_cabang'=>$this->input->post('alamat_cabang'),
        'no_telp_cabang'=>$this->input->post('no_telp_cabang'),
        'fax_cabang'=>$this->input->post('fax_cabang'),
        'id_cabang_tipe'=>$this->input->post('tipe_cabang'),
        'last_change_date'=>$this->waktu_skr,
      );
      $id = $this->input->post('id_cabang');
      $update = $this->cabang_model->update($data,$id);
      if($update == TRUE):
          $this->AlertRequest("cabang","update");
          redirect($this->cabang_edit.'?sid='.$id.'');
      endif;
    }else {
      redirect($this->cabang);
    }
  }


  function delete()
  {
    $id = $this->input->get('sid');
    if($id == TRUE){
        $data = array('deleted_date'=>$this->waktu_skr);
        $hapus = $this->cabang_model->hapus($data,$id);
          if($hapus == TRUE) redirect($this->cabang);
    }else{
          redirect($this->cabang);
    }
  }


}
