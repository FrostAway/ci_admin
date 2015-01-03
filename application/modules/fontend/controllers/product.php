<?php

class Product extends MX_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mproduct');
    }
    
    public function index(){
        $pass['title'] = 'View Product';
        $pass['subview'] = 'index';
        
        $pass['products'] = $this->mproduct->get_all();
        $this->load->view('layout', $pass);
    }
}

