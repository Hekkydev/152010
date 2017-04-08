<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_shuttle_old extends MY_Controller{

  public function __construct()
  {
        parent::__construct();
        $this->Authentikasi           = $this->Authentikasi();
        $this->AllKota                = $this->AllKota()->result();
        $this->AllMobil               = $this->AllMobil()->result();
        $this->AllSopir               = $this->AllSopir()->result();

  }

  function index()
  {
        $data['mobil']  = $this->AllMobil;
        $data['sopir']  = $this->AllSopir;
        $data['kota']   = $this->AllKota;
        $this->page_form("page",$data);
  }

  // AJAX REQUEST POINT KEBERANGKATAN //
  function point_keberangkatan()
  {
        $UUID_kota = $this->input->post('kota',TRUE);
    	  if($UUID_kota == TRUE):
    			$cabang = cabang_helper($UUID_kota)->result();
          foreach($cabang as $cb):
    				echo '<option value="'.$cb->uuid_cabang.'">'.$cb->nama_cabang.'</option>';
    			endforeach;
    	  else:
    			$this->AlertRequest("Tentukan Asal Keberangkatan","confirm");
    	  endif;
  }

  function tujuan_keberangkatan()
  {
        $UUID_kota = $this->input->post('kota',TRUE);
    	  $UUID_asal = $this->input->post('asal',TRUE);

    	  $tujuan = TujuanCabang($UUID_kota,$UUID_asal);
    	  foreach($tujuan as $cb):
    				echo '<option value="'.$cb->uuid_cabang.'">'.$cb->nama_cabang.'</option>';
    	  endforeach;
  }

  function search_jadwal()
  {
        $data['tgl_berangkat'] = $this->input->post('tgl_berangkat');
        $data['point']  = $this->input->post('asal_keberangkatan');
        $data['tujuan'] = $this->input->post('tujuan_keberangkatan');
        $point          =  $data['point'];
        $tujuan         = $data['tujuan'];
        $data['jadwal_keberangkatan'] = $this->jadwal_model->get_jadwal_keberangkatan($point,$tujuan);
        $this->page_load('jadwal/data_jadwal',$data);
  }

  function detail_jadwal()
  {
        $data['tgl_berangkat'] = $this->input->post('tgl_berangkat');
        $data['kode_jadwal']  = $this->input->post('kode_jadwal');
        $data['point'] = $this->input->post('asal_keberangkatan');
        $data['tujuan'] = $this->input->post('tujuan_keberangkatan');
        $data['jam'] = $this->input->post('jam');
        $data['kode'] = $this->input->post('kode');

        // --------KODEMANIFEST--------------
        $kode_manifest = (object) $_POST;
        $data['kode_manifest'] = kode_manifest($kode_manifest);
        // --------/KODEMANIFEST ------------
        $data['jadwal_post'] = (object) $_POST;
        $data['jadwal_keberangkatan'] = $this->jadwal_model->get_detail_jadwal_keberangakatan($data['kode_jadwal']);
        $this->page_load('jadwal/detail_jadwal',$data);
  }

  function read_cookies()
  {
        $total_memilih  = explode(",",$_COOKIE['selection_seat']);
        sort($total_memilih);
        foreach ($total_memilih as $v) {
          if(!empty($v) || $v != NULL || $v != ""){
            echo "<label>Nomor Kursi : ".$v."</label><br>";
          }

        }
  }

  function read_cookies_total()
  {
      $total = $_COOKIE['total_seat'];
      echo '<div class="form-group">';
          echo '<label for="" class="control-label">';
          echo '<span> Jumlah Kursi yang di pesan : '.$total.'</span>';
          echo '</label>';
      echo '</div>';
      if($total > 0){
      echo '<a  class="checkout btn btn-sm bg-purple tooltips" onclick="customer_add()" data-toggle="tooltip" data-placement="bottom" title="Proses Checkout">
           PROSES CHECKOUT
         </a>';
      }
  }

  function new_customer_form()
  {
            $jenis_kursi = $this->input->post('jenis_kursi');
            $point_berangkat = $this->input->post('point_berangkat');
            $tujuan_berangkat = $this->input->post('tujuan_berangkat');
            $j_penumpang = $this->input->post('jenis_penumpang');
            if($j_penumpang == TRUE){
              $data['jenis_penumpang'] = $j_penumpang;
            }else{
              $data['jenis_penumpang'] = "";
            }
            $data['harga_tiket'] = $this->cek_harga_penumpang($jenis_kursi,$point_berangkat,$tujuan_berangkat,$j_penumpang);
            $this->load->view('checkout/new_customers',$data);
  }

  function detail_customers()
  {
    $kode_booking = $this->input->post('kode_booking');
    $kode_atr = $this->input->post('kode_atr');
    $jam = $this->input->post('jam');
    $nomor_kursi = $this->input->post('nomor_kursi');

            $penumpang = $this->get_DetailPenumpang_by_kode_booking($kode_booking)->num_rows();

            if($penumpang == 1)
            {
                    $data['penumpang'] = $this->customers_info($kode_booking,$nomor_kursi);
                    $jenis_kursi = $this->input->post('jenis_kursi');
                    $point_berangkat = $this->input->post('point_berangkat');
                    $tujuan_berangkat = $this->input->post('tujuan_berangkat');

                    $j_penumpang = $data['penumpang']->jenis_penumpang;
                    if($j_penumpang == TRUE){
                      $data['jenis_penumpang'] = $j_penumpang;
                    }else{
                      $data['jenis_penumpang'] = "";
                    }

                    $data['jadwal_detail'] = $kode_atr." / ".$jam;
                    $data['harga_tiket'] = $this->cek_harga_penumpang($jenis_kursi,$point_berangkat,$tujuan_berangkat,$j_penumpang);
                    $data['nomor_kursi'] = $nomor_kursi;
                    $data['jumlah_penumpang'] = $penumpang;
                    $data['sub_total_tiket'] = $this->reservasi_model->sub_total_tiket($kode_booking)->first_row();
                    $data['grand_total'] = $data['sub_total_tiket']->sub_total_tiket;
                    $this->page_load('checkout/detail_customers',$data);


            }elseif($penumpang > 1){

                    $data['penumpang'] = $this->customers_info($kode_booking,$nomor_kursi);
                    $jenis_kursi = $this->input->post('jenis_kursi');
                    $point_berangkat = $this->input->post('point_berangkat');
                    $tujuan_berangkat = $this->input->post('tujuan_berangkat');

                    $j_penumpang = $data['penumpang']->jenis_penumpang;
                    if($j_penumpang == TRUE){
                      $data['jenis_penumpang'] = $j_penumpang;
                    }else{
                      $data['jenis_penumpang'] = "";
                    }

                    $data['jadwal_detail'] = $kode_atr." / ".$jam;
                    $data['harga_tiket'] = $this->cek_harga_penumpang($jenis_kursi,$point_berangkat,$tujuan_berangkat,$j_penumpang);
                    $data['nomor_kursi'] = $nomor_kursi;
                    $data['jumlah_penumpang'] = $penumpang;
                    $data['sub_total_tiket'] = $this->reservasi_model->sub_total_tiket($kode_booking)->first_row();
                    $data['grand_total'] = $data['sub_total_tiket']->sub_total_tiket; // nanti dikurangi diskon
                    $this->page_load('checkout/detail_customers',$data);
            }

  }


  function customers_info($kode_booking,$nomor_kursi)
  {
        return $this->reservasi_model->info_customers($kode_booking,$nomor_kursi)->first_row();
  }


  function update_data_customers()
  {
                $nomor_kursi = $this->input->post('nomor_kursi');
                $kode_booking = $this->input->post('kode_booking');
                $nomor_tiket = $this->input->post('no_tiket');
                $kode_member = $this->input->post('kode_member');
                $no_handphone = $this->input->post('no_handphone');
                $nama_penumpang = $this->input->post('nama_penumpang');
                $jenis_penumpang_harga = $this->input->post('jenis_penumpang_harga',TRUE);
                $keterangan_penumpang = $this->input->post('keterangan_penumpang',TRUE);


                $penumpang = explode('-',$jenis_penumpang_harga);
                $jenis_penumpang = $penumpang[0]; //jenis_penumpang
                $tarif_penumpang = $penumpang[1]; // tarif_penumpang


                $data_penumpang = array(
                  'kode_member'=>$kode_member,
                  'nama_penumpang'=>$nama_penumpang,
                  'no_telp_penumpang'=>$no_handphone,
                  'keterangan_penumpang'=>$keterangan_penumpang,
                  'jenis_penumpang'=>$jenis_penumpang,
                  'tarif_penumpang'=>$tarif_penumpang,
                );


                $update = $this->reservasi_model->update_penumpang($data_penumpang,$nomor_tiket,$nomor_kursi);
                if($update == TRUE)
                {
                  echo $kode_booking;
                }else {
                  echo "error";
                }

  }

  // -----------------------CEK HARGA PENUMPANG ------------------------------------------//
  function cek_harga_penumpang($jenis_kursi,$point_berangkat,$tujuan_berangkat,$j_penumpang)
  {
            $result = cek_harga_jadwal($jenis_kursi,$point_berangkat,$tujuan_berangkat);
            // bisa di tambahkan dengan harga cabang promo lainnnya
            $response = array(
              'umum'=>$result->umum,
              'mahasiwa'=>$result->mahasiswa,
              'promo'=>$result->promo,
            );
            $harga = $response;
            return $harga;
  }

  // CHECKING MEMBER///////////////////////////////////////////////////////////


  function get_kode_member_cheking()
  {
            $kode_member = $this->input->post('kode_member');
            $arr_criteria = array('kode_member'=>$kode_member);
            $cheking = $this->db->get_where('p_member', $arr_criteria)->num_rows();
            print($cheking);
  }

  function get_kode_member_cheking_display()
  {
            $kode_member = $this->input->post('kode_member');
            $arr_criteria = array('kode_member'=>$kode_member);
            $cheking = $this->db->get_where('p_member', $arr_criteria)->first_row();
            if($cheking == TRUE):
            echo json_encode($cheking);
            else:
            $cheking = (object) array();
            echo json_encode($cheking);
            endif;
  }
  function get_notelp_cheking()
  {
            $no_handphone = $this->input->post('no_handphone');
            $arr_criteria = array('no_handphone'=>$no_handphone);
            $cheking = $this->db->get_where('p_member', $arr_criteria)->first_row();
            if($cheking == TRUE):
            echo json_encode($cheking);
            else:
            $cheking = (object) array();
            echo json_encode($cheking);
            endif;
  }

// ---------------------BATALKAN TIKET-------------------------------------------------//


function pembatalan_tiket()
  {
            $kode_tiket = $this->input->post('kode_tiket');
            $data = array(
              'id_status_pemesanan_shuttle'=>3, // nomor 3 di batalkan
              'deleted_date'=>$this->waktu_skr(),
            );
            $where = array('kode_tiket'=>$kode_tiket);
            $update = $this->db->update('p_reservasi_shuttle_detail',$data,$where);
            if($update == TRUE)
            {
              echo "success";
            }else{
              echo "error";
            }
  }

  // --------------------MUTASI PENUMPANG-----------------------------------------------//
  function mutasi_penumpang()
  {
          $kode_tiket = $this->input->post('kode_tiket');
          $no_kursi = $this->input->post('no_kursi');


          $data = array(
            'id_kursi_shuttle'=>$no_kursi,
            'last_change_date'=>$this->waktu_skr(),
          );

          $where = array('kode_tiket'=>$kode_tiket);
          $update = $this->db->update('p_reservasi_shuttle_detail',$data,$where);
          if($update == TRUE)
          {
            echo "success";
          }else{
            echo "error";
          }
  }









}
