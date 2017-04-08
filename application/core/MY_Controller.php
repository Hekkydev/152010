<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

  private $title = "Pasteur Trans";
  private $title_page;
  private $footer_title = "Pasteur Trans 2017 ";
  public  $encryptkey = "mediahutamasss2017";
  public  $per_page;
  public  $apikey = 'bf46d2d5cbbda532d436b5f3251448b6';
  public  $model = array(   'app_model',
                            'auto_number_model',
                            '../core/MY_model',
                            '../modules/reservasi_shuttle/models/reservasi_model',
                            '../modules/pencarian_nomor_tiket/models/pencarian_nomor_model',
                            '../modules/cabang/models/cabang_model',
                            '../modules/kota/models/kota_model',
                            '../modules/jurusan/models/jurusan_model',
                            '../modules/mobil/models/mobil_model',
                            '../modules/sopir/models/sopir_model',
                            '../modules/jadwal/models/jadwal_model',
                            '../modules/user/models/user_model',
                            '../modules/otoritas/models/otoritas_model',
                            '../modules/pengumuman/models/pengumuman_model',
                            '../modules/discount/models/discount_model',
                            '../modules/member/models/member_model',
                            '../modules/customer/models/customer_model',




                          );

  public $helper = array(
                            'url',
                            'jurusan_controller',
                            'jadwal_controller',
                            'app',
                            'nav',
                            'form',
                            'alert',
                            'rupiah',
                            'validasi',
                            'html',
                            'time',
                            'security',
                            'reservasi',
                            'manifest_helper',
                        );

  public $library = array(  'session',
                            'encrypt',
                            'form_validation',
                            'ajax_pagination',
                            'pagination',
							              'security',
                            'general'

                        );


  public function __construct()
  {
          parent::__construct();

          $this->load->database();

          $model    = $this->load->model($this->model);
          $helper   = $this->load->helper($this->helper);
          $library  = $this->load->library($this->library);
          // echo "<pre>";
          // print_r($model);
          // echo "</pre>";
          $this->id = $this->session->userdata('userId');


  }

  /*------------------INHERITANCE-------------------------------------------*/
  public function Authentikasi()
  {
        if($this->session->userdata('isUserLoggedIn') != TRUE):
              $this->session->sess_destroy();
              redirect('logout/');
        endif;
  }

  function print_data($data)
  {
          echo "<pre>";
          print_r($data);
          echo "</pre>";
          die();
  }

  protected function UUID_User(){             return $this->id;                                     }
  protected function Apikey(){				        return $this->apikey;							                    }
  protected function AutoKodeJurusan(){       return $this->auto_number_model->AutoKodeJurusan();   }
  protected function AutoKodeJadwal(){        return $this->auto_number_model->AutoKodeJadwal();    }
  protected function AutoKodeMember(){        return $this->auto_number_model->AutoKodeMember();    }
  protected function AutoKodeUsers(){         return $this->auto_number_model->AutoKodeUsers();     }
  protected function AutoKodeBooking(){       return $this->auto_number_model->AutoKodeBooking();   }
  protected function AutoKodeReservasi(){     return $this->auto_number_model->AutoKodeReservasi(); }
  protected function jenisKelamin(){          return $this->app_model->jenisKelamin();              }
  protected function AllKota(){               return $this->kota_model->AllKota();                  }
  protected function KursiMobil(){            return $this->app_model->jmlKursi();                  }
  protected function AllCabang(){             return $this->cabang_model->AllCabangJoin();          }
  protected function AllJurusan(){            return $this->jurusan_model->AllJurusan();            }
  protected function AllOtoritas(){           return $this->otoritas_model->AllOtoritas();          }
  protected function waktu_skr(){             return date('Y-m-d H:i:s');                           }
  protected function MemberSearch($id){       return $this->member_model->MemberSearch($id);        }
  protected function JenisJadwal(){           return $this->jadwal_model->JenisJadwal();            }
  protected function session_logs_data(){     return $this->app_model->session_logs();              }
  protected function AllPengumuman(){         return $this->pengumuman_model->AllPengumuman();      }
  protected function AllJadwal(){             return $this->jadwal_model->AllJadwal();              }
  protected function AllMobil(){              return $this->mobil_model->AllMobil();                }
  protected function AllSopir(){              return $this->sopir_model->AllSopir();                }
  protected function AllUsers(){              return $this->user_model->AllUser();                  }
  protected function Shuttle_Diskon(){        return $diskon = $this->discount_model->ShuttleDiscount()->result_object();}

  protected function get_DetailPenumpang_by_kode_tiket($kode_tiket)
  {
      return $this->reservasi_model->get_DetailPenumpang_by_kode_tiket($kode_tiket);
  }

  protected function RestApi(){

    $method                   = $_SERVER['REQUEST_METHOD'];
    $key                      = isset($_SERVER['HTTP_APIKEY']) ? $_SERVER['HTTP_APIKEY'] : '';
    if($key != NULL)
    {
      if($key == $this->Apikey()){
        $data['error'] = FALSE;
        $data['method'] = $method;
      }else{
        $data['error'] = TRUE;
        $data['method'] = $method;
      }
    }else{
      $data['error'] = TRUE;
      $data['method'] = $method;
    }
    return (object) $data;

  }




  protected function cek_kondisi_password($kode){
	$kondisi =  $this->app_model->cek_kondisi_password($kode)->num_rows();

	if($kondisi > 0 ){
		$getLine = $this->app_model->cek_kondisi_password($kode)->first_row();
		$password = $getLine->password;
		if($password == TRUE){
			$con = TRUE;
		}else{
			$con = FALSE;
		}

		return $con;
	}else{

		return FALSE;
	}

  }
  protected function cek_username_password_lain($username,$password)
  {
      $cek = $this->user_model->cek_username_password_lain($username,$password)->num_rows();
      if($cek > 0):
        return FALSE;
      else:
        return TRUE;
      endif;
  }

  // ----------------Pagination------------------------------------------------




  // session flashdata info
  public function AlertRequest($title,$position)
  {
    if($position == 'add'):

        $alert = berhasil_menyimpan($title);
      return  $q = $this->session->set_flashdata('info',$alert);

    elseif($position == 'update'):

        $alert = berhasil_mengupdate($title);
      return  $q = $this->session->set_flashdata('info',$alert);

    elseif($position == 'delete'):

        $alert = berhasil_menghapus($title);
      return  $q = $this->session->set_flashdata('info',$alert);

    elseif($position == 'confirm'):

        $alert = berhasil_mengkonfirmasi($title);
      return  $q = $this->session->set_flashdata('info',$alert);

    elseif($position == 'error'):

        $alert = error_konfirmasi($title);
      return  $q = $this->session->set_flashdata('info',$alert);

    endif;
  }


  function check_password_entri($p,$kp)
  {
        if($p == $kp):
          return TRUE;
        else:
          return FALSE;
        endif;
  }

  function check_password_input($password)
  {
      if($password != NULL):
          return TRUE;
      else:
          return FALSE;
      endif;
  }


  function check_auth_control($username,$password,$id_cabang)
  {
        $u = $username;
        $p = md5($password);
        $c = $id_cabang;

        $cek_users = $this->app_model->getAuth($u,$p,$c)->num_rows();

        if($cek_users > 0 ):
          return TRUE;
        else:
          return FALSE;
        endif;
  }

  function getAuthUser($username,$password,$c)
  {
        $u = $username;
        $p = md5($password);
        $getAuth = $this->app_model->getAuth($u,$p,$c)->first_row();
        return $data = $this->app_model->getDataUsers($getAuth->kode_user)->first_row();
  }

  function UpdateLogin($id,$tipe)
  {
        $uuid_user = $id;
        $tipe = $tipe;
        $condition = array(
          'uuid_user'=>$uuid_user,
        );
        $data = array(
          'id_status_online'=>$tipe,
          'login_date'=>$this->waktu_skr(),
        );
      return $this->db->update('p_users',$data,$condition);
  }

  function UpdateLogout($id,$tipe)
  {
        $uuid_user = $id;
        $tipe = $tipe;
        $condition = array(
          'uuid_user'=>$uuid_user,
        );
        $data = array(
          'id_status_online'=>$tipe,
          'logout_date'=>$this->waktu_skr(),
        );
      return $this->db->update('p_users',$data,$condition);
  }


  /*-----------------------TEMPLATE ENGINE--------------------------------------*/
  protected function table_class()
  {
    return "table table-responsive table-bordered table-striped";
  }
  protected function button()
  {
    return "btn btn-sm bg-purple";
  }
  protected function button_outline()
  {
    return "btn btn-sm bg-purple btn-outline";
  }
  protected function form_control()
  {
    return "form-control";
  }
  protected function form_control_sm()
  {
    return "form-control input-sm";
  }

  protected function title_page($judul,$icon = NULL)
  {
            if($icon != NULL):
                return $this->title_page = "<i class='".$icon."'></i> ".$judul;
              else:
                return $this->title_page = $judul;
            endif;
  }


  function page_load($content,$data = NULL)
  {
          // COMPONENT BOOTSTRAP
          $data['usersLog'] = $this->app_model->getUserLog($this->id)->first_row();
          $data['table_class'] = $this->table_class();
          $data['button'] = $this->button();
          $data['button_outline'] = $this->button_outline();
          $data['form_control'] = $this->form_control();
          $data['form_control_sm'] = $this->form_control_sm();
          // COMPONENT BOOTSTRAP

          $data['content'] = $this->load->view($content, $data, TRUE);
          $this->load->view('template_part_load/content', $data);
  }

  function page_source($content,$data = NULL)
  {
          // COMPONENT BOOTSTRAP
          $data['table_class'] = $this->table_class();
          $data['button'] = $this->button();
          $data['button_outline'] = $this->button_outline();
          $data['form_control'] = $this->form_control();
          $data['form_control_sm'] = $this->form_control_sm();
          // COMPONENT BOOTSTRAP
          $data['usersLog'] = $this->app_model->getUserLog($this->id)->first_row();
          $data['status'] = $this->app_model->getStatus();
          $data['jenis_jurusan'] = $this->app_model->getJenisJurusan();
          $data['kursi_mobil'] = $this->app_model->jmlKursi();
          $data['siteTitle'] = $this->title;
          $data['title'] = $this->title_page($this->title_page);
          $data['footer_title'] = $this->footer_title;
          $data['css'] = $this->load->view('template_part_global/css',$data,TRUE);
          $data['header'] = $this->load->view('template_part_global/header',$data,TRUE);
          $data['loading'] = $this->load->view('template_part_global/loading',$data,TRUE);
          $data['loading_black'] = $this->load->view('template_part_global/loading_black',$data,TRUE);
          $data['topmenu'] = $this->load->view('template_part_global/topmenu',$data,TRUE);
          $data['breadcrumbs'] = $this->load->view('template_part_global/breadcrumbs',$data,TRUE);
          $data['content'] = $this->load->view($content, $data, TRUE);
          $data['footer'] = $this->load->view('template_part_global/footer', $data, TRUE);
          $data['script'] = $this->load->view('template_part_global/script',$data,TRUE);

          $this->load->view('template_part_form/content-source', $data);

  }


  function page($content,$data = NULL){
          // COMPONENT BOOTSTRAP
          $data['table_class'] = $this->table_class();
          $data['button'] = $this->button();
          $data['button_outline'] = $this->button_outline();
          $data['form_control'] = $this->form_control();
          $data['form_control_sm'] = $this->form_control_sm();
          // COMPONENT BOOTSTRAP
          $data['usersLog'] = $this->app_model->getUserLog($this->id)->first_row();
          $data['status'] = $this->app_model->getStatus();
          $data['jenis_jurusan'] = $this->app_model->getJenisJurusan();
          $data['kursi_mobil'] = $this->app_model->jmlKursi();
          $data['siteTitle'] = $this->title;
          $data['footer_title'] = $this->footer_title;
          $data['title'] = $this->title_page($this->title_page);
          $data['css'] = $this->load->view('template_part_global/css',$data,TRUE);
          $data['header'] = $this->load->view('template_part_global/header',$data,TRUE);
          $data['loading'] = $this->load->view('template_part_global/loading',$data,TRUE);
          $data['loading_black'] = $this->load->view('template_part_global/loading_black',$data,TRUE);
          $data['topmenu'] = $this->load->view('template_part_global/topmenu',$data,TRUE);
          $data['sidemenu'] = $this->load->view('template_part_global/sidemenu',$data,TRUE);
          $data['conversation'] = $this->load->view('template_part_global/conversation',$data,TRUE);
          $data['content'] = $this->load->view($content, $data, TRUE);
          $data['footer'] = $this->load->view('template_part_global/footer', $data, TRUE);
          $data['script'] = $this->load->view('template_part_global/script',$data,TRUE);

          $this->load->view('template_part_global/content-two', $data);
    }

  function page_sub($content,$data = NULL){
          // COMPONENT BOOTSTRAP
          $data['table_class'] = $this->table_class();
          $data['button'] = $this->button();
          $data['button_outline'] = $this->button_outline();
          $data['form_control'] = $this->form_control();
          $data['form_control_sm'] = $this->form_control_sm();
          // COMPONENT BOOTSTRAP
          $data['usersLog'] = $this->app_model->getUserLog($this->id)->first_row();
          $data['status'] = $this->app_model->getStatus();
          $data['jenis_jurusan'] = $this->app_model->getJenisJurusan();
          $data['kursi_mobil'] = $this->app_model->jmlKursi();
          $data['siteTitle'] = $this->title;
          $data['title'] = $this->title_page($this->title_page);
          $data['footer_title'] = $this->footer_title;
          $data['css'] = $this->load->view('template_part_global/css',$data,TRUE);
          $data['header'] = $this->load->view('template_part_global/header',$data,TRUE);
          $data['loading'] = $this->load->view('template_part_global/loading',$data,TRUE);
          $data['loading_black'] = $this->load->view('template_part_global/loading_black',$data,TRUE);
          $data['topmenu'] = $this->load->view('template_part_global/topmenu',$data,TRUE);
          $data['breadcrumbs'] = $this->load->view('template_part_global/breadcrumbs',$data,TRUE);
          $data['content'] = $this->load->view($content, $data, TRUE);
          $data['footer'] = $this->load->view('template_part_global/footer', $data, TRUE);
          $data['script'] = $this->load->view('template_part_global/script',$data,TRUE);

          $this->load->view('template_part_form/content', $data);
  }

  function page_sub_center($content,$data = NULL)
  {
          // COMPONENT BOOTSTRAP
          $data['table_class'] = $this->table_class();
          $data['button'] = $this->button();
          $data['button_outline'] = $this->button_outline();
          $data['form_control'] = $this->form_control();
          $data['form_control_sm'] = $this->form_control_sm();
          // COMPONENT BOOTSTRAP

          $data['usersLog'] = $this->app_model->getUserLog($this->id)->first_row();
          $data['status'] = $this->app_model->getStatus();
          $data['jenis_jurusan'] = $this->app_model->getJenisJurusan();
          $data['kursi_mobil'] = $this->app_model->jmlKursi();
          $data['siteTitle'] = $this->title;
          $data['title'] = $this->title_page($this->title_page);
          $data['footer_title'] = $this->footer_title;
          $data['css'] = $this->load->view('template_part_global/css',$data,TRUE);
          $data['header'] = $this->load->view('template_part_global/header',$data,TRUE);
          $data['loading'] = $this->load->view('template_part_global/loading',$data,TRUE);
          $data['loading_black'] = $this->load->view('template_part_global/loading_black',$data,TRUE);
          $data['topmenu'] = $this->load->view('template_part_global/topmenu',$data,TRUE);
          $data['breadcrumbs'] = $this->load->view('template_part_global/breadcrumbs',$data,TRUE);
          $data['content'] = $this->load->view($content, $data, TRUE);
          $data['footer'] = $this->load->view('template_part_global/footer', $data, TRUE);
          $data['script'] = $this->load->view('template_part_global/script',$data,TRUE);

          $this->load->view('template_part_form/content-center', $data);
  }

  function page_sub_center_large($content,$data = NULL)
  {
          // COMPONENT BOOTSTRAP
          $data['table_class'] = $this->table_class();
          $data['button'] = $this->button();
          $data['button_outline'] = $this->button_outline();
          $data['form_control'] = $this->form_control();
          $data['form_control_sm'] = $this->form_control_sm();
          // COMPONENT BOOTSTRAP
          $data['usersLog'] = $this->app_model->getUserLog($this->id)->first_row();
          $data['status'] = $this->app_model->getStatus();
          $data['jenis_jurusan'] = $this->app_model->getJenisJurusan();
          $data['kursi_mobil'] = $this->app_model->jmlKursi();
          $data['siteTitle'] = $this->title;
          $data['title'] = $this->title_page($this->title_page);
          $data['footer_title'] = $this->footer_title;
          $data['css'] = $this->load->view('template_part_global/css',$data,TRUE);
          $data['header'] = $this->load->view('template_part_global/header',$data,TRUE);
          $data['loading'] = $this->load->view('template_part_global/loading',$data,TRUE);
          $data['loading_black'] = $this->load->view('template_part_global/loading_black',$data,TRUE);

          $data['topmenu'] = $this->load->view('template_part_global/topmenu',$data,TRUE);
          $data['breadcrumbs'] = $this->load->view('template_part_global/breadcrumbs',$data,TRUE);
          $data['content'] = $this->load->view($content, $data, TRUE);
          $data['footer'] = $this->load->view('template_part_global/footer', $data, TRUE);
          $data['script'] = $this->load->view('template_part_global/script',$data,TRUE);

          $this->load->view('template_part_form/content-center-lg', $data);
  }

  function page_form($content,$data = NULL)
  {
          // COMPONENT BOOTSTRAP
          $data['table_class'] = $this->table_class();
          $data['button'] = $this->button();
          $data['button_outline'] = $this->button_outline();
          $data['form_control'] = $this->form_control();
          $data['form_control_sm'] = $this->form_control_sm();
          // COMPONENT BOOTSTRAP
          $data['usersLog'] = $this->app_model->getUserLog($this->id)->first_row();
          $data['status'] = $this->app_model->getStatus();
          $data['jenis_jurusan'] = $this->app_model->getJenisJurusan();
          $data['kursi_mobil'] = $this->app_model->jmlKursi();
          $data['siteTitle'] = $this->title;
          $data['title'] = $this->title_page($this->title_page);
          $data['footer_title'] = $this->footer_title;
          $data['css'] = $this->load->view('template_part_global/css',$data,TRUE);
          $data['header'] = $this->load->view('template_part_global/header',$data,TRUE);
          $data['css_menu'] = $this->load->view('template_part_form/css',$data,TRUE);
          $data['loading'] = $this->load->view('template_part_global/loading',$data,TRUE);

          $data['topmenu'] = $this->load->view('template_part_global/topmenu',$data,TRUE);
          $data['breadcrumbs'] = $this->load->view('template_part_global/breadcrumbs',$data,TRUE);
          $data['content'] = $this->load->view($content, $data, TRUE);
          $data['footer'] = $this->load->view('template_part_global/footer', $data, TRUE);
          $data['script'] = $this->load->view('template_part_global/script',$data,TRUE);

          $this->load->view('template_part_form/content-form', $data);
  }

  function page_form_pos($content,$data = NULL)
  {
          // COMPONENT BOOTSTRAP
          $data['table_class'] = $this->table_class();
          $data['button'] = $this->button();
          $data['button_outline'] = $this->button_outline();
          $data['form_control'] = $this->form_control();
          $data['form_control_sm'] = $this->form_control_sm();
          // COMPONENT BOOTSTRAP
          $data['usersLog'] = $this->app_model->getUserLog($this->id)->first_row();
          $data['status'] = $this->app_model->getStatus();
          $data['jenis_jurusan'] = $this->app_model->getJenisJurusan();
          $data['kursi_mobil'] = $this->app_model->jmlKursi();
          $data['siteTitle'] = $this->title;
          $data['title'] = $this->title_page($this->title_page);
          $data['footer_title'] = $this->footer_title;
          
          $data['css'] = $this->load->view('template_part_global/css',$data,TRUE);
          $data['header'] = $this->load->view('template_part_global/header',$data,TRUE);
          $data['loading'] = $this->load->view('template_part_global/loading',$data,TRUE);

          $data['topmenu'] = $this->load->view('template_part_global/topmenu',$data,TRUE);
          $data['breadcrumbs'] = $this->load->view('template_part_global/breadcrumbs',$data,TRUE);
          $data['content'] = $this->load->view($content, $data, TRUE);
          $data['footer'] = $this->load->view('template_part_global/footer', $data, TRUE);
          $data['script'] = $this->load->view('template_part_global/script',$data,TRUE);

          $this->load->view('template_part_form/content-form-post', $data);
  }

  function template_auth($content,$data = NULL)
  {
          $data['siteTitle'] = $this->title;
          $data['title'] = $this->title_page($this->title_page);
          $data['footer_title'] = $this->footer_title;
          $data['css'] = $this->load->view('template_part_global/css',$data,TRUE);
          $data['header'] = $this->load->view('template_part_global/header',$data,TRUE);
          $data['content'] = $this->load->view($content, $data, TRUE);
          $data['footer'] = $this->load->view('template_part_global/footer', $data, TRUE);
          $data['script'] = $this->load->view('template_part_global/script',$data,TRUE);

          $this->load->view('template_part_auth/content', $data);
  }






}
