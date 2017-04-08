<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Module Pengaturan User
 */

class User extends MY_Controller
{

  public function __construct()
  {
        parent::__construct();
        $this->Authentikasi   = $this->Authentikasi();
        $this->AllGroup       = $this->app_model->AllGroup();
        $this->AllCabang      = $this->cabang_model->AllCabangJoin()->result();
        $this->AllUser        = $this->user_model->AllUser()->result();
        $this->AutoKodeUsers  = $this->AutoKodeUsers();
        $this->waktu_skr      = $this->waktu_skr();
        $this->user_i         = "user/";
        $this->user_add       = "user/add";
        $this->user_edit      = "user/edit";
        $this->perPage        = 30;

  }

  public function index()
  {
        $data['record'] = count($this->AllUser);
        $this->title_page('Data User');
        $this->page_sub('User/page',$data);
  }

  public function listData()
  {
    $data = array();

    //total rows count
    $totalRec = count($this->user_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->user_i.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['users'] = $this->user_model->getRows(array('limit'=>$this->perPage));

    $this->page_load('User/list',$data);
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
    $totalRec = count($this->user_model->getRows($conditions));

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->user_i.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

    //set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

    //get posts data
    $data['users'] = $this->user_model->getRows($conditions);

    //load the view
    $this->page_load('User/list', $data, false);
  }



  public function add()
  {
        $data['cabang'] = $this->AllCabang;
        $data['otoritas'] = $this->AllGroup;
        $data['kode_user'] = $this->AutoKodeUsers;
        $this->title_page('Tambah Data User');
        $this->page_sub_center_large('User/add',$data);
  }

  public function detail()
  {
    $sid = $this->input->get('sid', TRUE);
    if($sid == TRUE):
        $cek_user = $this->user_model->getUUID($sid);
        if($cek_user->num_rows() > 0):
            $data['cabang'] = $this->AllCabang;
            $data['otoritas'] = $this->AllGroup;
            $data['users'] = $this->user_model->getUUID($sid)->first_row();
            $this->title_page('Data User');
            $this->page_sub_center_large('User/detail',$data);
        else:
            redirect($this->user);
        endif;
    else:
      redirect($this->user);
    endif;
  }

  public function edit()
  {
    $sid = $this->input->get('sid', TRUE);
    if($sid == TRUE):
        $cek_user = $this->user_model->getUUID($sid);
        if($cek_user->num_rows() > 0):
            $data['cabang'] = $this->AllCabang;
            $data['otoritas'] = $this->AllGroup;
            $data['users'] = $this->user_model->getUUID($sid)->first_row();
            $this->title_page('Edit Data User');
            $this->page_sub_center_large('User/edit',$data);
        else:
            redirect($this->user);
        endif;
    else:
      redirect($this->user);
    endif;
  }

  public function profile()
  {
        $this->title_page('Profile');
        $this->page_sub_center('User/profile');
  }

  public function profile_edit()
  {
        $this->title_page('Edit Profile');
        $this->page_sub_center('User/profile_edit');
  }

  public function password_change_view()
  {
        $this->title_page('Akses Username & Password');
        $this->page_sub_center('User/profile_change_password_view');
  }

  public function password_change()
  {
        $this->title_page('Edit Username & Password');
        $this->page_sub_center('User/profile_change_password');
  }

  public function dashboard()
  {
        $this->title_page('Dashboard');
        $this->page_sub('User/dashboard');
  }

  

  ////////////////////////////proses///////////////////////////////////////////////////////////////////////////////////////////////

  function entri()
  {
    // echo "<pre>";
    // print_r($_POST); die();
    // memulai dengan dengan mengecek perintah yang diberikan form button simpan
    if ($this->input->post('simpan',TRUE) == TRUE):
      // mengecek data pada password dan konfirmasi password
      $check_password_entri = $this->check_password_entri($this->input->post('password'),$this->input->post('konfirmasi_password'));
              if($check_password_entri == TRUE):
                            //input post yang dipilih untuk database user karyawan
                            $data_karyawan = array(
                                        'kode_user'=>$this->input->post('kode_user'),
                                        'no_reg'=>$this->input->post('no_reg'),
                                        'no_ktp'=>$this->input->post('no_ktp'),
                                        'no_telp'=>$this->input->post('no_hp'),
                                        'nama_lengkap'=>$this->input->post('nama_lengkap'),
                                        'alamat_user'=>$this->input->post('alamat_user'),
                                        'email'=>$this->input->post('email'),
                                        'id_cabang'=>$this->input->post('id_cabang'),
                                        'id_status'=>$this->input->post('id_status'),
                                        'id_user_group'=>$this->input->post('id_user_group'),
                                        'created_date'=>$this->waktu_skr,
                            );
                            $username  = $this->input->post('username');
                            $password = $this->input->post('password');
                            // input post yuang di pilih untuk databse user login
                            $data_login = array(
                                        'kode_user'=>$this->input->post('kode_user'),
                                        'username'=>$username,
                                        'password'=>md5($password),
                                        'created_date'=>$this->waktu_skr,
                            );

                                      $cek_username_password_lain = $this->cek_username_password_lain($username,md5($password));
                                      if($cek_username_password_lain == TRUE):
                                            $insert = $this->user_model->insert($data_karyawan,$data_login);
                                            // berhasil menyimpan data user
                                            if($insert == TRUE):
                                              $this->AlertRequest("user","add");
                                              redirect($this->user_add);
                                            endif;
                                      else:
                                            $this->AlertRequest("mohon gunakan username dan password lain","confirm");
                                            redirect($this->user_add);
                                      endif;
              else:
                      // reload ketika user tidak sama menginputkan password dan konfirmasi_password
                      $this->AlertRequest("konfirmasi password tidak sesuai","confirm");
                      redirect($this->user_add);
              endif;
    else:
      //reload ketika user tidak bersumber dari save button simpan
      redirect($this->user_add);

    endif;
  }

  public function update()
  {
		//echo "<pre>";
    //print_r($_POST); die();
    // memulai dengan dengan mengecek perintah yang diberikan form button simpan
    if ($this->input->post('simpan',TRUE) == TRUE):
      // mengecek data pada password dan konfirmasi password
      $check_password_entri = $this->check_password_entri($this->input->post('password'),$this->input->post('konfirmasi_password'));
              if($check_password_entri == TRUE):
                            //input post yang dipilih untuk database user karyawan\
                            $kode_user = $this->input->post('kode_user',TRUE);
                            $uuid = $this->input->post('id_user');
                            $data_karyawan = array(
                                        'id_cabang'=>$this->input->post('id_cabang',TRUE),
                                        'id_status'=>$this->input->post('id_status',TRUE),
                                        'id_user_group'=>$this->input->post('id_user_group',TRUE),
                                        'nama_lengkap'=>$this->input->post('nama_lengkap',TRUE),
                                        'alamat_user'=>$this->input->post('alamat_user',TRUE),
                                        'email'=>$this->input->post('email',TRUE),
                                        'no_reg'=>$this->input->post('no_reg',TRUE),
                                        'no_ktp'=>$this->input->post('nomor_ktp',TRUE),
                                        'no_telp'=>$this->input->post('no_hp',TRUE),
                                        'last_change_date'=>$this->waktu_skr,
                            );
                            $username  = $this->input->post('username');
                            $password = $this->input->post('password');
                            $check = $this->check_password_input($password);
                            if($check == TRUE):
                                  // input post yuang di pilih untuk databse user login
                                  $data_login = array(
                                              'username'=>$username,
                                              'password'=>md5($password),
                                              'last_change_date'=>$this->waktu_skr,
                                  );


                            else:
                                    // input post yuang di pilih untuk databse user login
                                    $data_login = array(
                                                'kode_user'=>$this->input->post('kode_user'),
                                                'username'=>$username,
                                                'last_change_date'=>$this->waktu_skr,
                                    );

                            endif;

                             $update = $this->user_model->update_data('p_users',$data_karyawan,$kode_user);
                             if($update == TRUE):
                                  $this->user_model->update_data('p_users_access',$data_login,$kode_user);

                                  $this->AlertRequest("user","update");
                                  redirect($this->user_i,'refresh');

                             endif;

              else:
                      // reload ketika user tidak sama menginputkan password dan konfirmasi_password
                      $this->AlertRequest("konfirmasi password tidak sesuai","confirm");
                      redirect($this->user_i);
              endif;
    else:
      //reload ketika user tidak bersumber dari save button simpan
      redirect($this->user_i);

    endif;

  }

  function delete()
  {
    # code...
  }

}
