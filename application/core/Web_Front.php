<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_Front extends CI_Controller{


  public $title_site = "Pasteur Trans - Jasa Pelayanan Shuttle, Paket dan Carter Bus";
  public $title_footer = "Copyright Pasteurtrans 2017";
  public $judul_halaman;
  public $helper      = array(
                        'url',
                        'form',
                        'nav',
                      );
  public $model       = array(
                        '../modules/index/models/web_model',
                      );
  public $library     = array(
                        'session',
                      );

  public function __construct()
  {
              parent::__construct();
              $this->load->database();
              $this->load->helper($this->helper);
              $this->load->model($this->model);
              $this->load->library($this->library);
  }

  // --------------------FUNCTION--------------------------------------------//
  function title_page($judul){            return $this->judul_halaman = $judul;                                   }
  function AllMenus(){                    return $this->web_model->get_menu_aktif()->result_object();             }
  function AllSubmenus(){                 return $this->web_model->get_menu_sub_aktif()->result_object();         }

  function Post_data($self_url)
  {
        return $this->web_model->get_detail_post($self_url)->first_row();
  }











































  // -------------------FUNCTION TEMPLATE ----------------------------------//
  function page_custom($content,$data=NULL)
  {
            $data['title_site']     = $this->title_site;
            $data['title_footer']   = $this->title_footer;
            $data['title_page']     = $this->title_page($this->judul_halaman);
            $data['menu']           = $this->AllMenus();


            $data['header']         = $this->load->view('index/inc_template/header', $data,TRUE);
            $data['meta_script']    = $this->load->view('index/inc_template/meta-script', $data,TRUE);
            $data['style']          = $this->load->view('index/inc_template/style', $data,TRUE);
            $data['top_menu']       = $this->load->view('index/inc_template/top_menu', $data,TRUE);
            $data['breadcrumb']     = $this->load->view('index/inc_template/breadcrumb', $data,TRUE);
            $data['sidemenus']           = $this->load->view('index/inc_template/sidemenus', $data,TRUE);
            $data['sidebar']           = $this->load->view('index/inc_template/sidebar', $data,TRUE);
            $data['content']        = $this->load->view($content,$data,TRUE);
            $data['footer']         = $this->load->view('index/inc_template/footer',$data,TRUE);
            $data['script']         = $this->load->view('index/inc_template/script', $data,TRUE);
            $this->load->view('index/inc_template/content_custom', $data);
  }

  function page_index($content, $data = NULL)
  {
            $data['title_site']     = $this->title_site;
            $data['title_footer']   = $this->title_footer;
            $data['title_page']     = $this->title_page($this->judul_halaman);
            $data['menu']           = $this->AllMenus();



            $data['header']         = $this->load->view('index/inc_template/header', $data,TRUE);
            $data['meta_script']    = $this->load->view('index/inc_template/meta-script', $data,TRUE);
            $data['style']          = $this->load->view('index/inc_template/style', $data,TRUE);
            $data['top_menu']       = $this->load->view('index/inc_template/top_menu', $data,TRUE);
            $data['slide_banner']   = $this->load->view('index/inc_template/slide_banner', $data,TRUE);
            $data['sidemenus']           = $this->load->view('index/inc_template/sidemenus', $data,TRUE);
            $data['content']        = $this->load->view($content,$data,TRUE);
            $data['footer']         = $this->load->view('index/inc_template/footer',$data,TRUE);
            $data['script']         = $this->load->view('index/inc_template/script', $data,TRUE);
            $this->load->view('index/inc_template/content', $data);
  }

  function page_pages($content,$data = NULL)
  {
            $data['title_site']     = $this->title_site;
            $data['title_footer']   = $this->title_footer;
            $data['title_page']     = $this->title_page($this->judul_halaman);
            $data['menu']           = $this->AllMenus();

            $data['header']         = $this->load->view('index/inc_template/header', $data,TRUE);
            $data['meta_script']    = $this->load->view('index/inc_template/meta-script', $data,TRUE);
            $data['style']          = $this->load->view('index/inc_template/style', $data,TRUE);
            $data['top_menu']       = $this->load->view('index/inc_template/top_menu', $data,TRUE);
            $data['breadcrumb']     = $this->load->view('index/inc_template/breadcrumb', $data,TRUE);
            $data['sidemenus']           = $this->load->view('index/inc_template/sidemenus', $data,TRUE);
            $data['content']        = $this->load->view($content,$data,TRUE);
            $data['footer']         = $this->load->view('index/inc_template/footer',$data,TRUE);
            $data['script']         = $this->load->view('index/inc_template/script', $data,TRUE);
            $this->load->view('index/inc_template/content_page', $data);
  }

  function page_blog($content,$data=NULL)
  {
            $data['title_site']     = $this->title_site;
            $data['title_footer']   = $this->title_footer;
            $data['title_page']     = $this->title_page($this->judul_halaman);
            $data['menu']           = $this->AllMenus();


            $data['header']         = $this->load->view('index/inc_template/header', $data,TRUE);
            $data['meta_script']    = $this->load->view('index/inc_template/meta-script', $data,TRUE);
            $data['style']          = $this->load->view('index/inc_template/style', $data,TRUE);
            $data['top_menu']       = $this->load->view('index/inc_template/top_menu', $data,TRUE);
            $data['breadcrumb']     = $this->load->view('index/inc_template/breadcrumb', $data,TRUE);
            $data['sidemenus']           = $this->load->view('index/inc_template/sidemenus', $data,TRUE);
            $data['content']        = $this->load->view($content,$data,TRUE);
            $data['footer']         = $this->load->view('index/inc_template/footer',$data,TRUE);
            $data['script']         = $this->load->view('index/inc_template/script', $data,TRUE);
            $this->load->view('index/inc_template/content_blog', $data);
  }

  function page_post($content,$data=NULL)
  {
            $data['title_site']     = $this->title_site;
            $data['title_footer']   = $this->title_footer;
            $data['title_page']     = $this->title_page($this->judul_halaman);
            $data['menu']           = $this->AllMenus();


            $data['header']         = $this->load->view('index/inc_template/header', $data,TRUE);
            $data['meta_script']    = $this->load->view('index/inc_template/meta-script', $data,TRUE);
            $data['style']          = $this->load->view('index/inc_template/style', $data,TRUE);
            $data['top_menu']       = $this->load->view('index/inc_template/top_menu', $data,TRUE);
            $data['breadcrumb']     = $this->load->view('index/inc_template/breadcrumb', $data,TRUE);
            $data['sidemenus']           = $this->load->view('index/inc_template/sidemenus', $data,TRUE);
            $data['sidebar']           = $this->load->view('index/inc_template/sidebar', $data,TRUE);
            $data['content']        = $this->load->view($content,$data,TRUE);
            $data['footer']         = $this->load->view('index/inc_template/footer',$data,TRUE);
            $data['script']         = $this->load->view('index/inc_template/script', $data,TRUE);
            $this->load->view('index/inc_template/content_post', $data);
  }

  function page_booking($content,$data=NULL)
  {
            $data['title_site']     = $this->title_site;
            $data['title_footer']   = $this->title_footer;
            $data['title_page']     = $this->title_page($this->judul_halaman);
            $data['menu']           = $this->AllMenus();


            $data['header']         = $this->load->view('index/inc_template/header', $data,TRUE);
            $data['meta_script']    = $this->load->view('index/inc_template/meta-script', $data,TRUE);
            $data['style']          = $this->load->view('index/inc_template/style', $data,TRUE);
            $data['top_menu']       = $this->load->view('index/inc_template/top_menu', $data,TRUE);
            $data['breadcrumb']     = $this->load->view('index/inc_template/breadcrumb', $data,TRUE);
            $data['sidemenus']           = $this->load->view('index/inc_template/sidemenus', $data,TRUE);
            $data['sidebar']           = $this->load->view('index/inc_template/sidebar', $data,TRUE);
            $data['content']        = $this->load->view($content,$data,TRUE);
            $data['footer']         = $this->load->view('index/inc_template/footer',$data,TRUE);
            $data['script']         = $this->load->view('index/inc_template/script', $data,TRUE);
            $this->load->view('index/inc_template/content_booking', $data);
  }

}
