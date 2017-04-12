<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_shuttle extends MY_Controller{

  public function __construct()
  {
            parent::__construct();
            $this->Authentikasi           = $this->Authentikasi();
            $this->AllKota                = $this->AllKota();
            $this->AllMobil               = $this->AllMobil();
            $this->AllSopir               = $this->AllSopir();
            $this->waktu_skr              = $this->waktu_skr();

  }


  function index()
  {

            $data['diskon']               =   $this->Shuttle_Diskon();
            $data['mobil']                =   $this->AllMobil->result_object();
            $data['sopir']                =   $this->AllSopir->result_object();
            $data['kota']                 =   $this->AllKota->result_object();

            //$this->print_data($data);

            $this->page_form("reservasi_shuttle/page",$data);
  }


  // AJAX REQUEST POINT KEBERANGKATAN //
  function point_keberangkatan()
  {
            $UUID_kota = $this->input->post('kota',TRUE);
        	  if($UUID_kota == TRUE):
        			$cabang = cabang_helper($UUID_kota)->result();
              foreach($cabang as $cb):
        				echo '<option value="'.$cb->uuid_cabang.'">'.strtoupper($cb->nama_cabang).'</option>';
        			endforeach;
        	  endif;
  }

  // AJAX REQUEST TUJUAN KEBERANGKATAN //
  function tujuan_keberangkatan()
  {
            $UUID_kota = $this->input->post('kota',TRUE);
        	  $UUID_asal = $this->input->post('asal',TRUE);

        	  $tujuan = TujuanCabang($UUID_kota,$UUID_asal);
        	  foreach($tujuan as $cb):
        				echo '<option value="'.$cb->uuid_cabang.'">'.strtoupper($cb->nama_cabang).'</option>';
        	  endforeach;
  }

  // AJAX REQUEST SEARCH JADWAL //
  function search_jadwal()
  {
            $jadwal_post                  = (object) $_POST;
            $point                        = $jadwal_post->asal_keberangkatan;
            $tujuan                       = $jadwal_post->tujuan_keberangkatan;
            $data['jadwal_post']          = $jadwal_post;
            $data['jadwal_keberangkatan'] = $this->jadwal_model->get_jadwal_keberangkatan($point,$tujuan);
            $this->page_load('reservasi_shuttle/jadwal/list_jadwal',$data);
  }


// AJAX REQUEST DETAIL JADWAL
  function detail_jadwal()
  {
            // -------GET MANIFEST CODE--------------------------//
            // --------KODEMANIFEST--------------//
            $kode_manifest = (object) $_POST;
            $data['kode_manifest'] = kode_manifest($kode_manifest);
            // --------/KODEMANIFEST ------------//
            $data['jadwal_post'] = (object) $_POST;
            $data['jadwal_keberangkatan'] = $this->jadwal_model->get_detail_jadwal_keberangakatan($_POST['kode_jadwal']);
            $this->page_load('reservasi_shuttle/jadwal/detail_jadwal',$data);
  }

  //AJAX REQUEST PRICE
  function get_penumpang_harga()
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
            $this->load->view('reservasi_shuttle/checkout/form-penumpang-harga',$data);
  }

  // AJAX REQUEST COOKIES//
  function read_cookies()
  {
                $total_memilih  = explode(",",$_COOKIE['selection_seat']);
                sort($total_memilih);
                $no = 1;
                $jumlah = 0;
                foreach ($total_memilih as $t) {
                  if(!empty($t) || $t != NULL || $t != ""){
                  $jumlah = $no;
                  }
                $no++;
                }

                if($jumlah > 0){
                foreach ($total_memilih as $v) {
                  if(!empty($v) || $v != NULL || $v != ""){
                    echo "<p class='btn circle-md bg-purple' style='margin:5px;'>".$v."</p>";
                  }
                }
              }else{
                echo "KOSONG";
              }
  }

  function read_cookies_total()
  {
                $total = explode(",",$_COOKIE['selection_seat']);
                $no = 1;
                $jumlah = 0;
                foreach ($total as $t) {
                  if(!empty($t) || $t != NULL || $t != ""){
                  $jumlah = $no;
                  }
                $no++;
                }

                if($jumlah > 0)
                {
                    $this->page_load("reservasi_shuttle/checkout/button_reservasi");
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



  // -------------------------DETAIL PENUMPANG-----------------------------------------//

  function detail_customers()
  {
              $penumpang = (object) $_POST;
              $kode_tiket = $penumpang->kode_tiket;
              $kode_atribut = $penumpang->kode_atribut;
              $jam_keberangkatan = $penumpang->jam_keberangkatan;
              $nomor_kursi = $penumpang->nomor_kursi;
              $penumpang_row    = $this->get_DetailPenumpang_by_kode_tiket($kode_tiket)->num_rows();
              $penumpang_data = $this->customers_info($kode_tiket,$nomor_kursi);
              $kode_booking = $penumpang_data->kode_booking;
              $penumpang_detail = $this->reservasi_model->penumpang_detail_by_kode_booking($kode_booking)->num_rows();
              if ($penumpang_detail == 1) {
                    $data['penumpang'] = $this->customers_info($kode_tiket,$nomor_kursi);
                    $data['penumpang_info'] = $penumpang;
                    $data['jadwal_detail'] = $penumpang->kode_atribut." / ".$penumpang->jam_keberangkatan;
                    $data['jumlah_penumpang'] = $penumpang_detail;

                    // jenis penumpang jika sudah ada --------------------------------//
                    $j_penumpang = $data['penumpang']->jenis_penumpang;
                    if($j_penumpang == TRUE) $data['jenis_penumpang'] = $j_penumpang;
                    else $data['jenis_penumpang'] = "";
                    // ---------------------------------------------------------------//
                    $data['total_tarif'] = $this->reservasi_model->total_tarif($kode_booking);
                    $data['harga_tiket'] = $this->cek_harga_penumpang($penumpang->jenis_kursi,$penumpang->point_berangkat,$penumpang->tujuan_berangkat,$j_penumpang);

              }elseif($penumpang_detail > 1){
                    $data['penumpang'] = $this->customers_info($kode_tiket,$nomor_kursi);
                    $data['penumpang_info'] = $penumpang;
                    $data['jadwal_detail'] = $penumpang->kode_atribut." / ".$penumpang->jam_keberangkatan;
                    $data['jumlah_penumpang'] = $penumpang_detail;
                    // jenis penumpang jika sudah ada --------------------------------//
                    $j_penumpang = $data['penumpang']->jenis_penumpang;
                    if($j_penumpang == TRUE) $data['jenis_penumpang'] = $j_penumpang;
                    else $data['jenis_penumpang'] = "";
                    // ---------------------------------------------------------------//

                    $data['total_tarif_penumpang'] = $this->reservasi_model->total_tarif($kode_booking);
                    $data['total_tarif_diskon'] = $this->reservasi_model->total_tarif_diskon($kode_booking);
                    $data['harga_tiket'] = $this->cek_harga_penumpang($penumpang->jenis_kursi,$penumpang->point_berangkat,$penumpang->tujuan_berangkat,$j_penumpang);

              }else{
                    //die();
              }

              $this->page_load('reservasi_shuttle/checkout/detail_customers',$data);
  }

  function customers_info($kode_tiket,$nomor_kursi)
  {
        return $this->reservasi_model->info_customers($kode_tiket,$nomor_kursi)->first_row();
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
                'nama_penumpang'=>strtoupper($nama_penumpang),
                'telp_penumpang'=>$no_handphone,
                'keterangan_penumpang'=>$keterangan_penumpang,
                'jenis_penumpang'=>$jenis_penumpang,
                'tarif_penumpang'=>$tarif_penumpang,
              );

              $post = (object) array(
                'no_handphone'=>$no_handphone,
                'nama_penumpang'=>$nama_penumpang,
              );

              $customer = $this->customers_reservasi($post);
              $update = $this->reservasi_model->update_penumpang($data_penumpang,$nomor_tiket,$nomor_kursi);
              if($update == TRUE)
              {
                echo $nomor_tiket;
              }else {
                echo "error";
              }

}

// CEK CUSTOMER RESERVASI ---------------------------------------------------//
function customers_reservasi($post)
{
          $telp_customers = $post->no_handphone;
          $data_penumpang = array(
            'kode_customers'=>$this->customer_model->generate(),
            'telp_customers'=>$post->no_handphone,
            'nama_customers'=>strtoupper($post->nama_penumpang),
            'created_date'=>$this->waktu_skr,
          );
          $cek_customer = $this->customer_model->cek_customer($telp_customers);
          if($cek_customer > 0){
              $data_update_customer = array(
                'nama_customers'=>strtoupper($post->nama_penumpang),
                'last_change_date'=>$this->waktu_skr,
              );
              $action = $this->customer_model->update_customer($data_update_customer,$telp_customers);
          }else{
              $action = $this->customer_model->simpan_customer($data_penumpang);
          }

        return "success";

}





// --------------------MUTASI PENUMPANG-----------------------------------------------//
function mutasi_penumpang()
{
        $kode_tiket = $this->input->post('kode_tiket');
        $no_kursi = $this->input->post('no_kursi');


        $data = array(
          'nomor_kursi'=>$no_kursi,
          'last_change_date'=>$this->waktu_skr(),
        );

        $where = array('kode_tiket'=>$kode_tiket);
        $update = $this->db->update('p_reservasi_shuttle_fix',$data,$where);
        if($update == TRUE)
        {
          echo "success";
        }else{
          echo "error";
        }
}

//  AJAX REQUEST PEMBATALAN TIKET
function pembatalan_tiket()
  {
            $kode_tiket = $this->input->post('kode_tiket');
            $data = array(
              'id_status_pemesanan_shuttle'=>3, // nomor 3 di batalkan
              'deleted_date'=>$this->waktu_skr(),
            );
            
            $this->db->where('p_reservasi_shuttle_fix.kode_tiket', $kode_tiket);
            $update = $this->db->update('p_reservasi_shuttle_fix',$data);
            if($update == TRUE)
            {
              echo "success";
            }else{
              echo "error";
            }
  }

// AJAX REQUEST HARGA DISKON
  function koreksi_harga()
  {
        $post = (object) $_POST;
        $penumpang = $post;
        $kode_tiket = $penumpang->kode_tiket;
        $nomor_kursi = $penumpang->nomor_kursi;

        $data['penumpang'] = $this->customers_info($kode_tiket,$nomor_kursi);
        // jenis penumpang jika sudah ada --------------------------------//
        $j_penumpang = $data['penumpang']->jenis_penumpang;
        if($j_penumpang == TRUE) $data['jenis_penumpang'] = $j_penumpang;
        else $data['jenis_penumpang'] = "";
        // ---------------------------------------------------------------//
        $data['harga_tiket'] = $this->cek_harga_penumpang($penumpang->jenis_kursi,$penumpang->point_berangkat,$penumpang->tujuan_berangkat,$j_penumpang);
        $data['diskon']       =   $this->Shuttle_Diskon();
        $this->page_load("reservasi_shuttle/checkout/modal-koreksi-diskon",$data);
  }


  function koreksi_harga_proses()
  {
        $post = (object) $_POST;
        $cek_username_password = $this->cek_username_password_koreksi($post->k_update_username,$post->k_update_password);
        if ($cek_username_password > 0) {
          $jenis_penumpang = $this->jenis_penumpang_harga($post->jenis_penumpang_harga);
          $data_tarif = array(
              'jenis_penumpang'=>$jenis_penumpang->kategori_penumpang,
              'tarif_penumpang'=>$jenis_penumpang->tarif_penumpang,
              'tarif_diskon'=>$post->diskon_penumpang,
          );
          $info = $this->update_data_tarif($post->kode_tiket,$data_tarif);
          echo $info;
        }else{
          echo "error";
        }

  }
  function update_data_tarif($kode_tiket,$data_tarif)
  {
      $this->db->where('kode_tiket', $kode_tiket);
      $info = $this->db->update('p_reservasi_shuttle_fix', $data_tarif);
      if ($info == TRUE) {
        return "success";
      }else {
        return "error";
      }
  }
  function cek_username_password_koreksi($username,$password)
  {
        $this->db->from('p_users_access');
        $this->db->join('p_users', 'p_users.kode_user = p_users_access.kode_user', 'left');
        $this->db->join('p_users_group', 'p_users_group.id_user_group = p_users.id_user_group', 'left');
        $this->db->where('p_users.id_user_group != 5');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $access = $this->db->get()->first_row();
        if ($access == TRUE) {
          return 1;
        }else{
          return 0;
        }

  }

  function jenis_penumpang_harga($post)
  {
              $penumpang = explode('-',$post);

              $jenis_penumpang = (object) array(
                'kategori_penumpang'=>$penumpang[0],
                'tarif_penumpang'=>$penumpang[1],
              );
              return $jenis_penumpang;
  }

  function module_pembayaran()
  {
            $this->load->view('reservasi_shuttle/checkout/modal-metode-pembayaran');
  }

  function manifest_trip()
  {
            $this->load->library(array('manifest'));
            $post = (object) $_POST;            
            $data['manifest'] = $this->manifest->biaya_trip_jurusan($post->asal,$post->tujuan);
            $data['jumlah_penumpang'] = $this->manifest->cek_jumlah_penumpang_trip($post->kode_manifest);
            $this->page_load('reservasi_shuttle/jadwal/manifest_trip',$data);
  }

  function save_manifest_data()
  {
            $this->load->library(array('manifest'));
            $post = (object) $_POST;
           
            $data = array(
              'kode_manifest'=>$post->kode_manifest,
              'uuid_sopir'=>$post->uuid_sopir,
              'uuid_mobil_unit'=>$post->uuid_mobil_unit,
              'tanggal_cetak_manifest'=>$this->waktu_skr,
              'kode_jadwal'=>$post->kode_jadwal,
              'created_date'=>$this->waktu_skr,
            );
           
            $save = $this->manifest->save_manifest_data($data);
            if($save == TRUE)
            {
              echo "success";
            }else{
              echo "error";
            }

  }



}
