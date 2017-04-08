<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Module Pengaturan Index
 */
class Jadwal extends MY_Controller
{

  function __construct()
  {
    parent::__construct();

        $this->Authentikasi           = $this->Authentikasi();
        $this->AllCabang              = $this->cabang_model->AllCabangJoin()->result();
        $this->AllKota                = $this->kota_model->AllKota()->result();
        $this->AutoKodeJadwal         = $this->AutoKodeJadwal();
        $this->KursiMobil             = $this->KursiMobil();
        $this->JenisJadwal            = $this->JenisJadwal();
		    $this->waktu_skr			        = $this->waktu_skr();
        $this->Jam                    = $this->jadwal_model->Jam();
        $this->Menit                  = $this->jadwal_model->Menit();
        $this->jadwal                 = "jadwal";
        $this->jadwal_add             = "jadwal/add";
        $this->jadwal_edit            = "jadwal/edit";
		    $this->perPage				        = 25;
  }

  public function index()
  {
    $data['record'] = count($this->jadwal_model->getRows());
    $this->title_page('Jadwal Keberangkatan');
    $this->page_sub('Jadwal/page',$data);
  }

  public function listData()
  {
	$data = array();

    //total rows count
    $totalRec = count($this->jadwal_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->jadwal.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['jadwal'] = $this->jadwal_model->getRows(array('limit'=>$this->perPage));
    $data['first_number'] = 1;
    $this->page_load('Jadwal/list',$data);
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
        $totalRec = count($this->jadwal_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->jadwal.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['jadwal'] = $this->jadwal_model->getRows($conditions);
        $data['first_number'] = $page +1;
        //load the view
        $this->page_load('Jadwal/list', $data, false);
  }


  public function add()
  {
    $data['kode_jadwal'] = $this->AutoKodeJadwal;
    $data['kota'] = $this->AllKota;
    $data['opt_jam'] = $this->Jam;
    $data['opt_menit'] = $this->Menit;
    $data['jmlKursi'] = $this->KursiMobil;
    $data['jenis_jadwal'] = $this->JenisJadwal;
    $this->title_page('Tambah Data Jadwal');
    $this->page_sub_center_large('Jadwal/add',$data);
  }

  function form_asal_to_tujuan()
  {
    $asal = $this->input->post('asal_keberangkatan');
    $kota = jadwal_tujuan_jurusan($asal);
    $sid = $this->input->post('sid');
    if($sid == TRUE):
        $jadwal = $this->jadwal_model->getID($sid)->num_rows();
         if($jadwal > 0):
          $jadwal_tujuan = $this->jadwal_model->getID($sid)->first_row();
          $tujuan_keberangkatan = $jadwal->tujuan_keberangkatan;
           foreach ($kota as $k) :
             $cabang = jadwal_tujuan_jurusan_cabang($k['uuid_kota'],$asal);
                echo "<optgroup label='".$k['nama_kota']."'>";
                foreach($cabang as $c):
                  if($tujuan_keberangkatan == $c['uuid_cabang']):
                    echo "<option value=".$c['uuid_cabang']." selected=''>".$c['nama_cabang']." (".$c['kode_cabang'].")"."</option>";
                  else:
                    echo "<option value=".$c['uuid_cabang'].">".$c['nama_cabang']." (".$c['kode_cabang'].")"."</option>";
                  endif;
                endforeach;
                echo "</optgroup>";
           endforeach;
        endif;
    else:
      echo '<option value="" selected="" disabled="">Pilih Tujuan</option>';
      foreach ($kota as $k) :
        $cabang = jadwal_tujuan_jurusan_cabang($k['uuid_kota'],$asal);
           echo "<optgroup label='".$k['nama_kota']."'>";
           foreach($cabang as $c):
           echo "<option value=".$c['uuid_cabang'].">".$c['nama_cabang']." (".$c['kode_cabang'].")"."</option>";
           endforeach;
        echo "</optgroup>";
      endforeach;
    endif;

  }

  function form_asal_utama_to_tujuan_utama()
  {
    $asal =  $this->input->post('asal_utama');
    $sid = $this->input->post('sid');
    if($sid == TRUE):
      // belum beres masalah jadwal
      $kota = jadwal_tujuan_jurusan($asal);
           echo '<option value="" selected="" disabled="">Pilih Tujuan</option>';
           foreach ($kota as $k) {
             $cabang = jadwal_tujuan_jurusan_cabang($k['uuid_kota'],$asal);
             echo "<optgroup label='".$k['nama_kota']."'>";
                foreach($cabang as $c):
                echo "<option value=".$c['uuid_cabang'].">".$c['nama_cabang']."</option>";
                endforeach;
             echo "</optgroup>";
           }

    else:
    $kota = jadwal_tujuan_jurusan($asal);
         echo '<option value="" selected="" disabled="">Pilih Tujuan</option>';
         foreach ($kota as $k) {
           $cabang = jadwal_tujuan_jurusan_cabang($k['uuid_kota'],$asal);
           echo "<optgroup label='".$k['nama_kota']."'>";
              foreach($cabang as $c):
              echo "<option value=".$c['uuid_cabang'].">".$c['nama_cabang']."</option>";
              endforeach;
           echo "</optgroup>";
         }
    endif;
  }


  function jadwal_transit_form_asal_and_tujuan()
  {
     $kode_jadwal = array();
     $asal_utama = $this->input->post('asal');
     $tujuan_utama = $this->input->post('tujuan');

     if($asal_utama == TRUE && $tujuan_utama == TRUE):
       $jadwal = $this->jadwal_model->jadwalTransit($asal_utama,$tujuan_utama);
       foreach($jadwal as $j):
         if($j->tipe_jadwal == 1): $tipe = '(REG)'; else: $tipe = '(EXTRA)'; endif;
         $k_jadwal = $tipe.' '.$j->kode_atr.'-'.$j->jam.':'.$j->menit;
         echo "<option value='".$j->kode_jadwal."'>".$k_jadwal."</option>";
       endforeach;
     endif;
  }

  public function edit()
  {
    $sid = $this->input->get('sid');
    if($sid == TRUE):
        $jadwal = $this->jadwal_model->getID($sid)->num_rows();
        if($jadwal > 0):
          $data['kota'] = $this->AllKota;
          $data['opt_jam'] = $this->Jam;
          $data['opt_menit'] = $this->Menit;
          $data['jmlKursi'] = $this->KursiMobil;
          $data['jenis_jadwal'] = $this->JenisJadwal;
          $data['jadwal'] = $this->jadwal_model->getID($sid)->first_row();
          $data['jadwal_utama'] =  $this->jadwal_model->getID_at_kode($data['jadwal']->kode_jadwal);
          $this->title_page('Edit Data Jadwal');
          $this->page_sub_center_large('Jadwal/edit',$data);
        else:
          $this->AlertRequest('Not Valid',"confirm");
          redirect($this->jadwal);
        endif;
    else:
      redirect($this->jadwal);
    endif;
  }



  // function getTujuan_jurusan()
  // {
  //    $asal =  $this->input->get('asal');
  //    $kode_jadwal =  $this->input->get('kode');
  //    $jadwal_utama = $this->jadwal_model->getID_at_kode($kode_jadwal);
  //    if($jadwal_utama  == TRUE):
  //
  //      $asal_utama = $jadwal_utama->tujuan_utama;
  //      $kota = jadwal_tujuan_jurusan($asal);
  //        echo '<option value="" selected="" disabled="">Pilih Tujuan</option>';
  //        foreach ($kota as $k):
  //          $cabang = jadwal_tujuan_jurusan_cabang($k['uuid_kota'],$asal);
  //          echo "<optgroup label='".$k['nama_kota']."'>";
  //             foreach($cabang as $c):
  //               if($asal_utama == $c['uuid_cabang']):
  //                   echo "<option value=".$c['uuid_cabang']." selected=''>".$c['nama_cabang']."</option>";
  //               else:
  //                   echo "<option value=".$c['uuid_cabang'].">".$c['nama_cabang']."</option>";
  //               endif;
  //             endforeach;
  //          echo "</optgroup>";
  //        endforeach;
  //
  //    else:
  //
  //      $kota = jadwal_tujuan_jurusan($asal);
  //      echo '<option value="" selected="" disabled="">Pilih Tujuan</option>';
  //      foreach ($kota as $k) {
  //        $cabang = jadwal_tujuan_jurusan_cabang($k['uuid_kota'],$asal);
  //        echo "<optgroup label='".$k['nama_kota']."'>";
  //           foreach($cabang as $c):
  //           echo "<option value=".$c['uuid_cabang'].">".$c['nama_cabang']."</option>";
  //           endforeach;
  //        echo "</optgroup>";
  //      }
  //    endif;
  //
  // }
  //

  //
  //
  //
  // }
  //
  // function jadwalTransit()
  // {
  //
  //   $kode_jadwal = array();
  //   $asal_utama = $this->input->post('asal');
  //   $tujuan_utama = $this->input->post('tujuan');
  //   $sid =  $this->input->post('sid',TRUE);
  //   $kode = $this->input->post('kode');
  //   if($sid == TRUE):
  //     $jadwal_init =  $this->jadwal_model->getID($kode)->first_row();
  //     if($asal_utama == TRUE && $tujuan_utama == TRUE):
  //       $jadwal = $this->jadwal_model->jadwalTransit($asal_utama,$tujuan_utama);
  //       foreach($jadwal as $j):
  //         if($j->tipe_jadwal == 1): $tipe = '(REG)'; else: $tipe = '(EXTRA)'; endif;
  //         $k_jadwal = $tipe.' '.$j->kode_atr.'-'.$j->jam.':'.$j->menit;
  //         echo "<option value='".$j->kode_jadwal."' selected='' >".$jadwal_init->kode_jadwal_transit."</option>";
  //       endforeach;
  //     endif;
  //
  //   else:
  //
  //     if($asal_utama == TRUE && $tujuan_utama == TRUE):
  //       $jadwal = $this->jadwal_model->jadwalTransit($asal_utama,$tujuan_utama);
  //       foreach($jadwal as $j):
  //         if($j->tipe_jadwal == 1): $tipe = '(REG)'; else: $tipe = '(EXTRA)'; endif;
  //         $k_jadwal = $tipe.' '.$j->kode_atr.'-'.$j->jam.':'.$j->menit;
  //         echo "<option value='".$j->kode_jadwal."'>".$k_jadwal."</option>";
  //       endforeach;
  //     endif;
  //   endif;
  //
  // }
  //
  //
  // function edit()
  // {
  //   $sid = $this->input->get('sid');
  //   if($sid == TRUE):
  //       $jadwal = $this->jadwal_model->getID($sid)->num_rows();
  //       if($jadwal > 0):
  //         $data['kota'] = $this->AllKota;
  //         $data['opt_jam'] = $this->Jam;
  //         $data['opt_menit'] = $this->Menit;
  //         $data['jmlKursi'] = $this->KursiMobil;
  //         $data['jenis_jadwal'] = $this->JenisJadwal;
  //         $data['jadwal'] = $this->jadwal_model->getID($sid)->first_row();
  //         $this->title_page('Edit Data Jadwal');
  //         $this->page_sub_center_large('Jadwal/edit',$data);
  //       else:
  //         $this->AlertRequest('Not Valid',"confirm");
  //         redirect($this->jadwal);
  //       endif;
  //   else:
  //     redirect($this->jadwal);
  //   endif;
  // }
  //
  //
  // function editTransit()
  // {
  //
  //   if($this->input->post('jenis',TRUE) == 2):
  //       $kode = $this->input->post('kode_jadwal');
  //       $sid = $this->input->post('sid');
  //       $data['kota'] = $this->AllKota;
  //       $data['jadwal'] = $this->jadwal_model->getID($sid)->first_row();
  //       $data['jadwal_utama'] = $this->jadwal_model->getID_at_kode($kode);
  //       $this->load->view('Jadwal/edit_transit',$data);
  //   endif;
  // }



  // ///////////////////////proses////////////////////////////////////////////

	function insert()
	{

		if($this->input->post('simpan',TRUE) == TRUE):

			$kode_jadwal  	 = $this->input->post('kode_jadwal',TRUE);
			$uuid_user    	 = $this->input->post('uuid_user',TRUE);
			$kode_atr     	 = $this->input->post('kode_atr',TRUE);
			$asal		  	 = $this->input->post('asal_keberangkatan',TRUE);
			$tujuan		  	 = $this->input->post('tujuan_keberangkatan',TRUE);
			$jam		  	 = $this->input->post('jam_keberangkatan',TRUE);
			$menit 		  	 = $this->input->post('menit_keberangkatan',TRUE);
			$id_jml_kursi 	 = $this->input->post('id_jml_kursi',TRUE);
			$tipe_jadwal  	 = $this->input->post('tipe',TRUE);
			$kondisi_jadwal  = $this->input->post('kondisi_jadwal',TRUE);
			$id_status 		 = $this->input->post('id_status',TRUE);
			$id_jenis_jadwal = $this->input->post('id_jenis_jadwal',TRUE);
      $jadwal_utama = $this->input->post('jenis_jadwal',TRUE);
      $asal_utama   = $this->input->post('asal_utama');
      $tujuan_utama = $this->input->post('tujuan_utama');


        if($id_jenis_jadwal == 2)
        {
            $fix_asal = $asal_utama;
            $transit = $asal;
            $fix_tujuan = $tujuan_utama;
        }else{
            $fix_asal = $asal;
            $transit  = '';
            $fix_tujuan = $tujuan;
        }

        $jadwal = array(
  				'id_status'=>$id_status,
  				'id_jenis_jadwal'=>$id_jenis_jadwal,
  				'id_jml_kursi'=>$id_jml_kursi,
  				'kode_jadwal'=>$kode_jadwal,
  				'kode_atr'=>$kode_atr,
  				'asal_keberangkatan'=>$fix_asal,
          'transit_keberangkatan'=>$transit,
  				'tujuan_keberangkatan'=>$tujuan,
  				'jam'=>$jam,
  				'menit'=>$menit,
  				'tipe_jadwal'=>$tipe_jadwal,
  				'uuid_user'=>$uuid_user,
  				'created_date'=>$this->waktu_skr,
  			);

        $jadwal_transit  = array(
          'kode_jadwal' =>$kode_jadwal,
          'kode_jadwal_transit'=>$jadwal_utama,
          'asal_utama'=>$asal,
          'tujuan_utama'=>$fix_tujuan,
          'created_date'=>$this->waktu_skr,
         );


			$simpan_jadwal = $this->jadwal_model->insert($jadwal);
      $simpan_jadwal_transit = $this->jadwal_model->insert_transit($jadwal_transit);

			if($simpan_jadwal == TRUE):
				$this->AlertRequest("Jadwal","add");
				redirect($this->jadwal_add);
				else:
				$this->AlertRequest("Jadwal","error");
				redirect($this->jadwal_add);
			endif;

		else:
			redirect($this->jadwal_add);
		endif;
	}

  function hapus()
  {


  }

 }
