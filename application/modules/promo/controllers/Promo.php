<?php

/**
 * Promo Controller*
 * Author : Hekky Nurhikmat
 */
class Promo extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->Authentikasi  = $this->Authentikasi();
        $this->load->model(array('promo_model'));


    }


    public function index(){

        $this->title_page('Master Promo');
        $this->page_sub('promo/page');
    }
    public function listData()
    {
        //$this->data['promo'] = $this->promo_model->getRows();
        $this->page_load('promo/options/list');
    }
    public function add()
    {
        $this->title_page("Tambah Promo Baru");
        $this->page_sub_center("promo/add");
    }

    public function edit()
    {
        $this->title_page("Edit Data Promo");
        $this->page_sub_center("promo/edit");
    }

    public function update()
    {
        $post = (object) $_POST;
    }

    public function entri()
    {
        $post = (object) $_POST;
    }


    public function remove()
    {
        $uuid_promo = $this->input->get('sid');

        print_r($uuid_promo);

    }
}
