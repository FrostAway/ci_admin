<?php

class Category extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index() {
        $pass['title'] = 'Category';
        $pass['subview'] = 'category/index';
        $pass['categories'] = $this->category_model->view();
        $this->load->view('layout', $pass);
    }

    public function update($id) {
        $pass['title'] = 'Update Category';
        $pass['subview'] = 'category/update';
        $pass['currcate'] = $this->category_model->get_category($id);
        $pass['parents'] = $this->category_model->get_parent();
        if ($this->input->post('btn-addnew')) {
            
            $this->form_validation->set_rules('cate[name]', 'Name', 'required');
            $this->form_validation->set_rules('cate[sort_order]', 'Sort Order', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout', $pass);
            } else {
                $this->load->helper('convert_helper');
                $data = $this->input->post('cate');
                if ($data['show_in_menu'] == 'on') {
                    $data['show_in_menu'] = 1;
                } else {
                    $data['show_in_menu'] = 0;
                }
                $data['slug'] = convert_tv($data['name']);
                if ($this->category_model->update($data['id'], $data)) {
                    redirect('/backend/category/update/'.$data['id']);
                } else {
                    echo 'errors';
                }
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }

    public function addnew() {
        $pass['title'] = 'Category';
        $pass['subview'] = 'category/addnew';
        $pass['parents'] = $this->category_model->get_parent();

        if ($this->input->post('btn-addnew')) {
            $this->load->database();

            $this->form_validation->set_rules('cate[name]', 'Name', 'required||is_unique(categories.name)');
            $this->form_validation->set_rules('cate[sort_order]', 'Sort Order', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout', $pass);
            } else {
                $this->load->helper('convert_helper');
                $data = $this->input->post('cate');
                if ($data['show_in_menu'] == 'on') {
                    $data['show_in_menu'] = 1;
                } else {
                    $data['show_in_menu'] = 0;
                }
                $data['slug'] = convert_tv($data['name']);
                if ($this->category_model->insert($data)) {
                    redirect('/backend/category/addnew');
                } else {
                    echo 'errors';
                }
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }
    
    public function delete(){
        if($this->input->post('itemid')){
            $id = $this->input->post('itemid');
            if($this->category_model->delete($id)){
                echo 'Xóa thành công';
            }
        }
    }

}
