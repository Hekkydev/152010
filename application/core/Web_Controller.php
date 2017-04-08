<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Controller extends CI_Controller{

  private $title = "Pasteur Trans";
  private $title_page;
  private $footer_title = "Pasteur Trans 2017 ";

  public $helper = array('url');

  public function __construct()
  {
    parent::__construct();

    $this->load->helper($this->helper);

  }

  protected function title_page($judul,$icon = NULL)
  {
            if($icon != NULL):
                return $this->title_page = "<i class='".$icon."'></i> ".$judul;
              else:
                return $this->title_page = $judul;
            endif;
  }

  protected function page_sub($content,$data = NULL){
          // COMPONENT BOOTSTRAP
          $data['siteTitle'] = $this->title;
          $data['title'] = $this->title_page($this->title_page);
          $data['footer_title'] = $this->footer_title;
          $data['css'] = $this->load->view('template_part_administrator/css',$data,TRUE);
          $data['header'] = $this->load->view('template_part_administrator/header',$data,TRUE);
          $data['topmenu'] = $this->load->view('template_part_administrator/topmenu',$data,TRUE);
          $data['sidemenu'] = $this->load->view('template_part_administrator/sidemenu',$data,TRUE);
          $data['content'] = $this->load->view($content, $data, TRUE);
          $data['footer'] = $this->load->view('template_part_administrator/footer', $data, TRUE);
          $data['script'] = $this->load->view('template_part_administrator/script',$data,TRUE);

          $this->load->view('template_part_administrator/content', $data);
  }

}
