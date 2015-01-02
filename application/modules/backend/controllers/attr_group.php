<?php

class Attr_group extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('attr_group_model');
    }

    public function index() {
        $pass['title'] = 'Attribute Group';
        $pass['subview'] = 'attr_group/index';
        $pass['attrgs'] = $this->attr_group_model->view();
        $this->load->view('layout', $pass);
    }

    public function update($id) {
        $pass['title'] = 'Update Attribute Group';
        $pass['subview'] = 'attr_group/update';
        $pass['attrg'] = $this->attr_group_model->get_attr_group($id);
        $this->load->model('attribute_model');
        $pass['attrs'] = $this->attribute_model->get_in_group($id);
        if ($this->input->post('btn-addnew')) {
            $this->load->helper('convert_helper');
            $data = $this->input->post('attr');

            $this->form_validation->set_rules('attr[name]', 'Name', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout', $pass);
            } else {
                $data['slug'] = convert_tv($data['name']);

                if (isset($data['id'])) {
                    if ($this->attribute_model->update($data['id'], $data)) {
                        redirect('/backend/attr_group/update/' . $id, 'location');
                    }
                } else {
                    if ($this->attribute_model->insert($data)) {
                        redirect('/backend/attr_group/update/' . $id, 'location');
                    }
                }
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }

    public function delete_attr() {
        if ($this->input->post('itemid')) {
            $id = $this->input->post('itemid');
            if ($this->attr_group_model->delete_attr($id)) {
                echo 'Xóa thành công';
            } else {
                echo 'Có lỗi xảy ra';
            }
        }
    }

    public function addnew() {
        $pass['title'] = 'Attribute Group';
        $pass['subview'] = 'attr_group/addnew';
        $this->load->model('category_model');
        $pass['cates'] = $this->category_model->get_parent();

        if ($this->input->post('btn-addnew')) {
            $data = $this->input->post('attrg');
            $this->form_validation->set_rules('attrg[name]', 'Name', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout', $pass);
            } else {
                $data = $this->input->post('attrg');
                if ($this->attr_group_model->insert($data)) {
                    redirect('/backend/attr_group/addnew');
                }
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }

}
