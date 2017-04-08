<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Module Pengaturan Index
 */
class Jurusan extends MY_Controller
{

  function __construct()
  {
    parent::__construct();

        $this->Authentikasi           = $this->Authentikasi();
        $this->AllKota                = $this->AllKota()->result();
        $this->AllJurusan             = $this->AllJurusan()->result();
        $this->KursiMobil             = $this->KursiMobil();
        $this->waktu_skr              = $this->waktu_skr();
        $this->jurusan_add            = "jurusan/add";
        $this->jurusan_load           = "jurusan/edit";
        $this->jurusan_edit           = "jurusan/edit";
        $this->jurusan                = "jurusan/";
		    $this->perPage           	    = 20;



  }

  public function index()
  {
    $data['jurusan'] = $this->AllJurusan;
    $data['record'] = count($this->AllJurusan);
    $this->title_page('Jurusan');
    $this->page_sub('Jurusan/page',$data);
  }

  public function listData()
  {
	$data = array();

    //total rows count
    $totalRec = count($this->jurusan_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->jurusan.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['jurusan'] = $this->jurusan_model->getRows(array('limit'=>$this->perPage));

    $this->page_load('jurusan/read/list',$data);
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
        $totalRec = count($this->jurusan_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->jurusan.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['jurusan'] = $this->jurusan_model->getRows($conditions);

        //load the view
        $this->page_load('Jurusan/read/list', $data, false);
  }

  public function add()
  {
    $data['kode'] = $this->AutoKodeJurusan();
    $data['kota'] = $this->AllKota;
    $this->title_page('Data Jurusan');
    $this->page_form('Jurusan/add/page_add',$data);
  }


  /*------------------------------------EDIT----------------------*/

  public function edit()
  {
    $sid = $this->input->get('sid');
    if($sid  == TRUE):

      $cek_uuid = $this->jurusan_model->cek_uuid($sid);
      if($cek_uuid->num_rows() > 0):

          $data['jurusan'] = $cek_uuid->first_row();
          $data['kota'] = $this->AllKota;
          $this->title_page("Data Jurusan");
          $this->page_form("Jurusan/edit/page_edit",$data);
      else:
          $this->AlertRequest("Data Tidak Valid","confirm");
          redirect($this->jurusan,'refresh');
      endif;

    else:

      redirect($this->jurusan,'refresh');

    endif;
  }


  /*---------------------------------------------------------------------*/


  // ///////////////////////proses/////////////////////////////////////////////

  function entri()
  {
        if ($this->input->post('simpan') == "OK") {
          $kode_jurusan = $this->input->post('kode_jurusan');
          $kode_atr = $this->input->post('kode_atr');
          $asal_keberangkatan = $this->input->post('asal_keberangkatan');
          $tujuan_keberangkatan = $this->input->post('tujuan_keberangkatan');
          $id_status = $this->input->post('id_status');

          $data_jurusan = array(
            'kode_jurusan'=>$kode_jurusan,
            'kode_atr'=>$kode_atr,
            'asal_keberangkatan'=>$asal_keberangkatan,
            'tujuan_keberangkatan'=>$tujuan_keberangkatan,
            'id_status'=>$id_status,
            'created_date'=>$this->waktu_skr,
          );


          $simpan = $this->jurusan_model->insert_master('p_master_jurusan',$data_jurusan);
          if($simpan == TRUE){
            $get  = $this->jurusan_model->cek_kode_jurusan($kode_jurusan)->num_rows();
            $data = $this->jurusan_model->cek_kode_jurusan($kode_jurusan)->first_row();
            if($get > 0)
            {
                redirect($this->jurusan_load.'?sid='.$data->uuid_master_jurusan);
            }

          }else{
                redirect($this->jurusan_add);
          }

        }else{
          redirect($this->jurusan);
        }
  }
////////////////////////////////UPDATE///////////////////////////////////////////
  function cek_kode()
  {
    $kode = $this->input->post('kode_atr');
    $cek = $this->db->get_where('p_master_jurusan',$where = array('kode_atr'=>$kode))->num_rows();
    if($cek > 0)
    {
      echo "false";
    }else{
      echo "true";
    }
  }

  function update_jurusan()
  {
    $sid = $this->input->post('sid');
    $kode_jurusan = $this->input->post('kode_jurusan');
    if ($this->input->post('simpan') == "OK") {
      $kode_atr = $this->input->post('kode_atr');
      $asal_keberangkatan = $this->input->post('asal_keberangkatan');
      $tujuan_keberangkatan = $this->input->post('tujuan_keberangkatan');
      $id_status = $this->input->post('id_status');

      $data_jurusan = array(
        'kode_atr'=>$kode_atr,
        'asal_keberangkatan'=>$asal_keberangkatan,
        'tujuan_keberangkatan'=>$tujuan_keberangkatan,
        'id_status'=>$id_status,
        'last_change_date'=>$this->waktu_skr,
      );


      $update = $this->jurusan_model->update_master($data_jurusan,$kode_jurusan);
      if($update == TRUE)
      {
        redirect(''.$this->jurusan_edit.'?sid='.$sid.'');
      }
    }else{
      redirect($this->jurusan);
    }
  }

  function update_tiket()
  {
      //echo "<pre>";
      //print_r($_POST); die();
      $sid = $this->input->post('sid');
      $kode_jurusan = $this->input->post('kode_jurusan');
      if($this->input->post('simpan_tiket') == "OK"):

        foreach($this->KursiMobil as $km):

            $umum = str_replace(',','',$this->input->post('umum_'.$km->id_jml_kursi.''));
            $mahasiswa = str_replace(',','',$this->input->post('mahasiswa_'.$km->id_jml_kursi.''));
            $promo = str_replace(',','',$this->input->post('promo_'.$km->id_jml_kursi.''));

             $data_reguler_tiket = array(
              'kode_jurusan'=>$kode_jurusan,
              'id_jml_kursi'=>$km->id_jml_kursi,
              'umum'=>$umum,
              'mahasiswa'=>$mahasiswa,
              'promo'=>$promo,
              'created_date'=>$this->waktu_skr,
            );
            $cek = $this->jurusan_model->reguler_tiket_cek_jurusan($kode_jurusan,$km->id_jml_kursi);

            if($cek > 0):
              $update_data_reguler_tiket = $this->jurusan_model->reguler_tiket_update_tiketing($data_reguler_tiket,$kode_jurusan,$km->id_jml_kursi);
            else:
              $simpan_data_reguler_tiket = $this->jurusan_model->reguler_tiket_insert_tiketing($data_reguler_tiket);
            endif;

        endforeach;

        redirect(''.$this->jurusan_edit.'?sid='.$sid.'');
      else:
        redirect(''.$this->jurusan_edit.'?sid='.$sid.'');
      endif;
  }

  function update_bop()
  {
    // echo "<pre>";
    // print_r($_POST);

    $sid = $this->input->post('sid');
    $kode_jurusan = $this->input->post('kode_jurusan');
    if($this->input->post('simpan_bop') == "OK"):
      $biaya_tol = str_replace(',','',$this->input->post('biaya_tol',TRUE));
      $biaya_sopir = str_replace(',','',$this->input->post('biaya_sopir',TRUE));
      $biaya_bbm  = str_replace(',','',$this->input->post('biaya_bbm',TRUE));
      $biaya_perpal  = str_replace(',','',$this->input->post('biaya_perpal',TRUE));

      $data_biaya_operasional = array(
        'kode_jurusan'=>$kode_jurusan,
        'biaya_tol'=>$biaya_tol,
        'biaya_sopir'=>$biaya_sopir,
        'biaya_bbm'=>$biaya_bbm,
        'biaya_perpal'=>$biaya_perpal,
        'created_date'=>$this->waktu_skr,
      );

      $cek = $this->jurusan_model->cek_master_bop($kode_jurusan);
      //print_r($cek); die();
      if($cek > 0):
        $update = $this->jurusan_model->update_master_bop($data_biaya_operasional,$kode_jurusan);
      else:
        $simpan = $this->jurusan_model->insert_master_bop($data_biaya_operasional);
      endif;

        redirect(''.$this->jurusan_edit.'?sid='.$sid.'');
    else:
      redirect(''.$this->jurusan_edit.'?sid='.$sid.'');
    endif;
  }


  function update_non_bop()
  {

      $sid = $this->input->post('sid');
      $kode_jurusan = $this->input->post('kode_jurusan');
      if($this->input->post('simpan_non_bop') == "OK"):
              $biaya_parkir = str_replace(',','',$this->input->post('biaya_parkir',TRUE));

              $data_biaya_operasional = array(
                'kode_jurusan'=>$kode_jurusan,
                'biaya_parkir'=>$biaya_parkir,
                'created_date'=>$this->waktu_skr,
              );

              $cek = $this->jurusan_model->cek_master_bop($kode_jurusan);
              //print_r($cek); die();
              if($cek > 0):
                $update = $this->jurusan_model->update_master_bop($data_biaya_operasional,$kode_jurusan);
              else:
                $simpan = $this->jurusan_model->insert_master_bop($data_biaya_operasional);
              endif;

              redirect(''.$this->jurusan_edit.'?sid='.$sid.'');
      else:
        redirect(''.$this->jurusan_edit.'?sid='.$sid.'');
      endif;
  }

  function update_cargo()
  {

    $sid = $this->input->post('sid');
    $kode_jurusan = $this->input->post('kode_jurusan');
    if($this->input->post('simpan_cargo') == "OK"):

      $data_biaya_cargo = array(
        'kode_jurusan'=>$kode_jurusan,
        'harga_dokument_kg_pertama'=>str_replace(',','',$this->input->post('harga_dokument_kg_pertama')),
        'harga_dokument_kg_selanjutnya'=>str_replace(',','',$this->input->post('harga_dokument_kg_selanjutnya')),
        'harga_barang_kg_pertama'=>str_replace(',','',$this->input->post('harga_barang_kg_pertama')),
        'harga_barang_kg_selanjutnya'=>str_replace(',','',$this->input->post('harga_barang_kg_selanjutnya')),
        'harga_charge_bagasi_kg_pertama'=>str_replace(',','',$this->input->post('harga_charge_bagasi_kg_pertama')),
        'harga_charge_bagasi_kg_selanjutnya'=>str_replace(',','',$this->input->post('harga_charge_bagasi_kg_selanjutnya')),
        'created_date'=>$this->waktu_skr,
      );

      $cek = $this->jurusan_model->cek_master_cargo($kode_jurusan);
      if($cek > 0):
        $update = $this->jurusan_model->update_master_cargo($data_biaya_cargo,$kode_jurusan);
      else:
        $simpan = $this->jurusan_model->insert_master_cargo($data_biaya_cargo);
      endif;
      redirect(''.$this->jurusan_edit.'?sid='.$sid.'');
    else:
      redirect(''.$this->jurusan_edit.'?sid='.$sid.'');
    endif;
  }

  // ------------------------------------------------------------------------------------------------------




///////////////////////////////DELETE//////////////////////////////////////////////

function hapus()
{
  $sid = $this->input->get('sid');
  if($sid == TRUE):
    $hapus = array('deleted_date' =>$this->waktu_skr);
              $where = array('uuid_master_jurusan'=>$sid);
    $result = $this->db->update('p_master_jurusan', $hapus,$where);
    if($result):
      $this->AlertRequest("Jurusan","delete");
      redirect($this->jurusan);
    endif;
  else:
    redirect($this->jurusan);
  endif;
}



}
