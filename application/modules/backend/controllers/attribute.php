<?php

class Attribute extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('attribute_model');
    }

    public function index() {
        $pass['title'] = 'Attribute';
        $pass['subview'] = 'attribute/index';
        $this->load->model('attr_group_model');
        $pass['attrgs'] = $this->attr_group_model->view();
        $this->load->view('layout', $pass);
    }

    public function addnew() {
        $pass['title'] = 'Attribute';
        $pass['subview'] = 'attribute/addnew';
        $pass['attrs'] = $this->attribute_model->view();
        if ($this->input->post('btn-addnew') != false) {
            $this->load->helper('convert_helper');
            $data = $this->input->post('attr');

            $this->form_validation->set_rules('attr[name]', 'Name', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout', $pass);
            } else {
                $data['slug'] = convert_tv($data['name']);
                print_r($data);
                if ($this->attribute_model->insert($data)) {
                    redirect('backend/attr_group/update', 'location');
                }
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }

  
    public function edit_attr() {
        if ($this->input->post('attr_id')) {
            $id = $this->input->post('attr_id');
            $data = $this->attribute_model->get_attribute($id);
            echo json_encode(array('id'=>$data->id, 'name' => $data->name, 'type' => $data->type_data, 'default' => $data->default));
        }
    }

}
