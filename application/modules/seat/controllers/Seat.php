<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seat extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi         = $this->Authentikasi();
    $this->KursiMobil           = $this->KursiMobil();
    $this->load_model           = $this->load->model(array('seat_model'));
    $this->mode_block           = $this->seat_model->mode_block();
    $this->seat                 = "seat";
    $this->perPage              = 5;

  }

  function index()
  {
        $data['record'] = count($this->KursiMobil);
        $this->title_page("Kursi Mobil");
        $this->page_sub("page",$data);
  }


  public function listData()
    {
      $data = array();

      //total rows count
      $totalRec = count($this->seat_model->getRows());

      //pagination configuration
      $config['target']      = '#postList';
      $config['base_url']    = base_url().$this->seat.'/ajaxPaginationData';
      $config['total_rows']  = $totalRec;
      $config['per_page']    = $this->perPage;
      $config['link_func']   = 'searchFilter';
      $this->ajax_pagination->initialize($config);
      $data['kursi'] = $this->seat_model->getRows(array('limit'=>$this->perPage));
      $data['no'] = 1;
      $this->page_load('seat/list',$data);
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
        $totalRec = count($this->seat_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->seat.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['kursi'] = $this->seat_model->getRows($conditions);

        $data['no'] = $page +1;
        $this->page_load('seat/list', $data, false);
    }

    public function layout()
    {
        $sid = $this->input->get('sid');
        if($sid == TRUE)
        {
            $data['seat'] = $this->seat_model->get_id($sid);
            $this->title_page("Layout ".$data['seat']->jumlah_kursi." Kursi");
            $this->page_sub_center_large("seat/options/layout.php",$data);
        }else{
            
            redirect($this->seat,'refresh');
            
        }
    }

    public function add()
    {
            $data['mode_block'] = $this->mode_block;
            $this->title_page("Tambah Data Seat");
            $this->page_sub_center_large("seat/add",$data);
    }

    public function insert()
    {
            $post = (object) $_POST;
            $data = array(
                'jumlah_kursi'=>$post->jumlah_kursi,
                'jumlah_block'=>$post->jumlah_block,
                'tipe_jenis_kursi'=>$post->tipe_kelas,
                'mode_block'=>$post->tipe_layout,
            );
            $simpan = $this->seat_model->insert($data);

            if($simpan == TRUE)
            {
                
                redirect($this->seat,'refresh');
                
            }
    }

    public function edit()
    {
        $sid = $this->input->get('sid');
        $cek = $this->seat_model->get_id($sid);
        if($cek == TRUE)
        {
            $data['seat'] = $this->seat_model->get_id($sid);
            $data['mode_block'] = $this->mode_block;
            $this->title_page('Edit Data Seat');
            $this->page_sub_center_large('seat/edit',$data);
        }else{
            
            redirect($this->seat,'refresh');
            
        }    
    }

        public function update()
    {
            $post = (object) $_POST;
            $data = array(
                'jumlah_kursi'=>$post->jumlah_kursi,
                'jumlah_block'=>$post->jumlah_block,
                'tipe_jenis_kursi'=>$post->tipe_kelas,
                'mode_block'=>$post->tipe_layout,
            );
            $sid = $post->id_jml_kursi;
            $update = $this->seat_model->update($data,$sid);

            if($update == TRUE)
            {
                
                redirect($this->seat,'refresh');
                
            }
    }

    public function load_setting_layout()
    {   
        $post = (object) $_POST;
        $data['setting'] = $post;
        $this->load->view('seat/options/setting_layout_input',$data);
    }
    public function update_setting_layout()
    {
        $post = (object) $_POST;
        $data['setting'] = $post;
        $data['layout'] = $this->seat_model->cek_block($post->id_jml_kursi,$post->nomor_layout);
        $this->load->view('seat/options/setting_layout_update',$data);
    }

    public function konfigurasi_block()
    {
        if($this->input->post('submit') == "insert")
        {
            $post = (object) $_POST;
            $data = array(
                'id_jml_kursi'=>$post->sid,
                'nomor_layout'=>$post->nomor_layout,
                'nomor_kursi'=>$post->nomor_kursi,
                'id_status'=>$post->id_status,
            );

            $cek_layout = $this->seat_model->cek_block($post->sid,$post->nomor_layout);
            if($cek_layout == TRUE){
                echo "update";
            }else{
                $insert = $this->seat_model->insert_block($data);
                if($insert == TRUE)
                {        
                    redirect('seat/layout?sid='.$post->sid.'','refresh');           
                }
            }
        }else if($this->input->post('submit') == "update"){
            $post = (object) $_POST;
            $data_update = array(
                'nomor_kursi'=>$post->nomor_kursi,
                'id_status'=>$post->id_status,
            );

            $cek_layout = $this->seat_model->cek_block($post->sid,$post->nomor_layout);
            if($cek_layout == TRUE){
                $update = $this->seat_model->update_block($data_update,$post->sid,$post->nomor_layout);
                if($update == TRUE)
                {        
                    redirect('seat/layout?sid='.$post->sid.'','refresh');           
                }
            }
        }else if($this->input->post('submit') =='remove'){
            $post = (object) $_POST;
            $data_update = array(
                'nomor_kursi'=>$post->nomor_kursi,
                'id_status'=>$post->id_status,
            );

            $cek_layout = $this->seat_model->cek_block($post->sid,$post->nomor_layout);
             if($cek_layout == TRUE){
                $remove = $this->seat_model->remove_block($post->sid,$post->nomor_layout);
                if($remove == TRUE)
                {        
                    redirect('seat/layout?sid='.$post->sid.'','refresh');           
                }
            }
        }else if($this->input->post('submit') == "close")
        {
             $post = (object) $_POST;
             redirect('seat/layout?sid='.$post->sid.'','refresh');    
        }

   
    }

    


}
