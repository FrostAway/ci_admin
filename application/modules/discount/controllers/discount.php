<?php

class Discount extends MX_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index($type, $discount){
        if($type==0){
            return $discount." %";
        }else{
            return $discount." VND";
        }
    }
}

