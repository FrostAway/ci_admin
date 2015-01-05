<?php

class Admin extends MX_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $pass['title'] = 'Trang Admin';
        $pass['subview'] = 'main';
        $this->load->model('mproduct');
        $pass['mostviews'] = $this->mproduct->get_most_view(3);
        $this->load->view('layout', $pass);
    }
    
    public function product_sell(){
        $this->load->model('mproduct');
        $products = $this->mproduct->get_to_chart();
        $row_array = array();
        foreach ($products as $product){
            $data['name'] = $product['name'];
            $data['price'] = $product['price']*1;
            $row_array[] = $data;
        }
        $col_array = array(
            array("id"=>"", "label"=>"Sản phẩm", "pattern"=>"", "type"=>"string"),
            array("id"=>"", "label"=>"Doanh số", "pattent"=>"", "type"=>"number")
        );
        echo json_encode(array("cols"=>$col_array, "rows"=>$row_array));
    }
}

