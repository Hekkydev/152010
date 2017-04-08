<?php

defined('BASEPATH') OR exit('No such directory');
/**
 * Login authentikasi
 */
class Login extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->AllCabang = $this->cabang_model->AllCabangJoin()->result();
  }

  public function index()
  {
      $d['cabang'] = $this->AllCabang;
      $this->template_auth('login',$d);
  }


  public function autentikasi()
  {
    if($this->input->post('LoginSubmit') == TRUE):
          $id_cabang = $this->encrypt->decode($this->input->post('cabang'));

          $username = htmlspecialchars($this->input->post('username',TRUE));
          $password = htmlspecialchars($this->input->post('password',TRUE));

          // print_r($username);
          // print_r($password);
          // die();
          $check_validation = $this->check_auth_control($username,$password,$id_cabang);
          if($check_validation == TRUE):
                    $getAuthUser = $this->getAuthUser($username,$password,$id_cabang);
                    $isUserLoggedIn = $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $uuid = $this->session->set_userdata('userId',$getAuthUser->uuid_user);

                     $cek = $this->cek_session($isUserLoggedIn,$uuid);
                     //print_r($cek); die();
                    $online = $this->UpdateLogin($getAuthUser->uuid_user,1);
                    if($online):
                        redirect('home','refresh');
                    endif;
              else:
                  redirect('login','refresh');
          endif;
    else:
      redirect('login','refresh');
    endif;
  }

  function cek_session($isUserLoggedIn,$uuid)
  {
      $this->load->model(array('session_model'));
      $cek = $this->session_model->get($uuid)->num_rows();
      if($cek > 0):
      $this->session_model->insert($data = array('isUserLoggedIn'=>$isUserLoggedIn,'uuid_user'=>$uuid));
      endif;
  }



}
