<?php

class Category extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mcategory');
    }

    public function index() {
        $pass['title'] = 'Category';
        $pass['subview'] = 'category/index';
        $pass['categories'] = $this->mcategory->get_all();
        $this->load->view('layout', $pass);
    }

    public function update($id) {
        $pass['title'] = 'Update Category';
        $pass['subview'] = 'category/update';
        $pass['currcate'] = $this->mcategory->get_category($id);
        $pass['parents'] = $this->mcategory->get_all();
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
                if ($this->mcategory->update($data['id'], $data)) {
                    redirect('/backend/category/index');
                } else {
                    echo 'errors';
                }
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }

//
    public function addnew() {
        $pass['title'] = 'Add Category';
        $pass['subview'] = 'category/addnew';
        $pass['parents'] = $this->mcategory->get_all();

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
                if ($this->mcategory->insert($data)) {
                    redirect('/backend/category/index');
                } else {
                    echo 'errors';
                }
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }

    public function delete() {
        if ($this->input->post('itemid')) {
            $id = $this->input->post('itemid');
            if ($this->mcategory->delete($id)) {
                echo 'Xóa thành công';
            }
        }
    }

    public function option() {
        if ($this->input->post('view-type')) {
            $type_id = $this->input->post('view-type');
            $pass['title'] = 'Category Manager';
            $pass['subview'] = 'category/index';
            $pass['type_id'] = $type_id;
            switch ($type_id) {
                case 1:
                    $pass['categories'] = $this->mcategory->get_order_by_fild('name', 'asc');
                    break;
                case 2:
                    $pass['categories'] = $this->mcategory->get_order_by_fild('name', 'desc');
                default:
                    break;
            }
            $this->load->view('layout', $pass);
        }
    }

}
