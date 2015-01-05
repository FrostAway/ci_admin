<?php

class Attr_group extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mattr_group');
    }

    public function index() {
        $pass['title'] = 'Attribute Group';
        $pass['subview'] = 'attr_group/index';
        $pass['attrgs'] = $this->mattr_group->get_all();
        $this->load->view('layout', $pass);
    }

    //them nhom thuoc tinh moi
    public function addnew() {
        $pass['title'] = 'Add Attribute Group';
        $pass['subview'] = 'attr_group/addnew';

        if ($this->input->post('btn-addnew')) {
            $data = $this->input->post('attrg');
            $this->form_validation->set_rules('attrg[name]', 'Name', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout', $pass);
            } else {
                $data = $this->input->post('attrg');
                if ($this->mattr_group->insert($data)) {
                    redirect('/backend/attr_group/index');
                }
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }

    // cap nhat thuoc tinh trong nhom
    public function update($id) {
        $pass['title'] = 'Update Attribute Group';
        $pass['subview'] = 'attr_group/update';
        $pass['attrg'] = $this->mattr_group->get_attr_group($id);
        $this->load->model('mattribute');
        $pass['attrs'] = $this->mattribute->get_in_group($id);
        if ($this->input->post('btn-addnew')) {
            $data = $this->input->post('attr');

            $this->form_validation->set_rules('attr[name]', 'Name', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout', $pass);
            } else {

                if (isset($data['id'])) {
                    if ($this->mattribute->update($data['id'], $data)) {
                        redirect('/backend/attr_group/update/' . $id, 'location');
                    }
                } else {
                    if ($this->mattribute->insert($data)) {
                        redirect('/backend/attr_group/update/' . $id, 'location');
                    }
                }
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }

    //cap nhat nhom thuoc tinh
    public function update_attr() {
        if ($this->input->post('attrid')) {
            $this->load->model('mattribute');
            $id = $this->input->post('attrid');
            $data = $this->mattribute->get_attribute($id);
            echo json_encode(array('id' => $data->id, 'name' => $data->name, 'type' => $data->data_type, 'default' => $data->default));
        }
    }

    // xoa nhom
    public function delete_group() {
        if ($this->input->post('itemid')) {
            $id = $this->input->post('itemid');
            if ($this->mattr_group->delete_group($id)) {
                echo 'Successfully!';
            }
        }
    }

    //xoa thuoc tinh cua nhom
    public function delete_attr() {
        if ($this->input->post('itemid')) {
            $id = $this->input->post('itemid');
            $this->load->model('mattribute');
            if ($this->mattribute->delete($id)) {
                echo 'Xóa thành công';
            } else {
                echo 'Có lỗi xảy ra';
            }
        }
    }

    public function option() {
        if ($this->input->post('view-type')) {
            $type_id = $this->input->post('view-type');
            $pass['title'] = 'Attribute Group Manager';
            $pass['subview'] = 'attr_group/index';
            $pass['type_id'] = $type_id;
            switch ($type_id) {
                case 1:
                    $pass['attrgs'] = $this->mattr_group->get_order_by_fild('name', 'asc');
                    break;
                case 2:
                    $pass['attrgs'] = $this->mattr_group->get_order_by_fild('name', 'desc');
                default:
                    break;
            }
            $this->load->view('layout', $pass);
        }

        if ($this->input->post('btn-apply')) {
            $type = $this->input->post('action');
            if ($type == 1) {
                $item_check = $this->input->post('item-check');
                if (count($item_check) > 1) {
                    foreach ($item_check as $id => $value) {
                        $this->mattr_group->delete_group($id);
                    }
                }
            }
            redirect('/backend/attr_group/index');
        }
    }

//
}
