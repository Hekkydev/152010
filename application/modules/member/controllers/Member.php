<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->Authentikasi      = $this->Authentikasi();
    $this->AllCabang         = $this->AllCabang()->result();
    $this->MemberAll         = $this->member_model->MemberAll()->result();
    $this->AutoKodeMember    = $this->AutoKodeMember();
    $this->jenisKelamin      = $this->jenisKelamin();
    $this->jenis_member      = $this->member_model->jenis_member()->result_object();
    $this->waktu_skr         = $this->waktu_skr();
    $this->password_generate = $this->member_model->password_member_generate();
    $this->member            = "member";
    $this->member_add        = "member/add";
    $this->member_edit       = "member/edit";
    $this->perPage           = 5;

  }

  function index()
  {
      $data['record'] = count($this->MemberAll);
      $this->title_page('Data Member');
      $this->page_sub('Member/page',$data);
  }

  public function listData()
  {
    $data = array();

    //total rows count
    $totalRec = count($this->member_model->getRows());

    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().$this->member.'/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    $data['member'] = $this->member_model->getRows(array('limit'=>$this->perPage));
    $data['no'] = 1;
    $this->page_load('Member/list',$data);
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
        $totalRec = count($this->member_model->getRows($conditions));

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().$this->member.'/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['member'] = $this->member_model->getRows($conditions);

        $data['no'] = $page +1;
        $this->page_load('Member/list', $data, false);
    }





    public function add()
    {
        $data['kode_member'] = $this->AutoKodeMember;
        $data['jenis_kelamin'] = $this->jenisKelamin;
        $data['jenis_member'] = $this->jenis_member;
        $data['password_generate'] = $this->password_generate;
        $this->title_page('Tambah Data Member');
        $this->page_sub_center_large('Member/add',$data);
    }

    public function edit()
    {
        $sid = $this->input->get('sid');
        if($sid == TRUE)
        {
            $CEK_MEMBER = $this->member_model->get_id($sid);
            if($CEK_MEMBER->num_rows() > 0 ):
                $data['member'] = $this->member_model->get_id($sid)->first_row();
                $data['jenis_kelamin'] = $this->jenisKelamin;
                $data['jenis_member'] = $this->jenis_member;
                $data['cabang'] = $this->AllCabang;
                $this->title_page("Edit Data Member");
                $this->page_sub_center_large('Member/edit',$data);
            else:
                 redirect($this->member,'refresh');
            endif;       
        }else{
            redirect($this->member,'refresh');
        }
    }

    public function insert()
    {
        $post = (object) $_POST;
        $data = array(
                'id_status'=>1,
                'id_cabang'=> $this->security->sanitize_filename($post->cabang_daftar),
                'id_jenis_kelamin'=> $this->security->sanitize_filename($post->jenis_kelamin),
                'id_member_golongan'=> $this->security->sanitize_filename($post->jenis_member),
                'kode_member'=> $this->security->sanitize_filename($post->kode_member),
                'nama_depan'=> $this->security->sanitize_filename($post->nama_depan),
                'nama_belakang'=> $this->security->sanitize_filename($post->nama_belakang),
                'alamat'=> $this->security->sanitize_filename($post->alamat),
                'tempat_lahir'=> $this->security->sanitize_filename($post->tempat_lahir),
                'tanggal_lahir'=> $this->security->sanitize_filename($post->tanggal_lahir),
                'no_ktp'=> $this->security->sanitize_filename($post->no_ktp),
                'no_handphone'=> $this->security->sanitize_filename($post->no_telp),
                'no_referensi'=> $this->security->sanitize_filename($post->no_telp_referensi),
                'email_member'=> $this->security->sanitize_filename($post->email),
                'tanggal_terdaftar'=>  $this->security->sanitize_filename($post->tgl_daftar),
                'password'=> $this->security->sanitize_filename($post->password),
                'created_date'=>$this->waktu_skr(),
            );
          

       $simpan = $this->member_model->insert($this->security->xss_clean($data));
       if($simpan == TRUE)
       {
           $this->AlertRequest("Member","add");
           redirect($this->member,'refresh');
           
       }else {
           
           redirect($this->member,'refresh');
        
       }


    }

    public function update()
    {

    }
}
