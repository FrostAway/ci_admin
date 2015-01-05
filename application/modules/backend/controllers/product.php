<?php

class Product extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mproduct');
        $this->load->model('mattribute');
        $this->load->model('mproduct_attr');
        $this->load->model('mcategory');
    }

    public function init_pagination($path, $total_rows, $per_page) {

        // pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'backend/product/' . $path . '/';
        $config['per_page'] = 2;
        $config['uri_segment'] = 4;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="arrow unavailable">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="arrow">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';

        $config['total_rows'] = $total_rows;
        $this->pagination->initialize($config);
    }

    public function index() {
        $pass['title'] = 'Product Manager';
        $pass['subview'] = 'product/index';
        $pass['categories'] = $this->mcategory->get_all();

        // pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'backend/product/index/';
        $config['per_page'] = 2;
        $config['uri_segment'] = 4;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="arrow unavailable">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="arrow">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';

        //option filter
        if ($this->input->post('btn-apply') || $this->session->userdata('btn-apply')) { // mass_option
            $action = $this->input->post('product-action');
            if ($action == 1) {
                $product_check = $this->input->post('product-check');
                if (count($product_check) > 0) {
                    foreach ($product_check as $p_id => $stt) {
                        $this->mproduct->delete($p_id);
                        $this->mproduct_attr->delete_image($p_id);
                        $this->mproduct_attr->delete_by_product($p_id);
                    }
                }
                redirect('/backend/product/index');
            }
//        } elseif ($this->input->post('btn-filter') || $this->session->userdata('btn-filter')) { // loc theo hang muc
//            if ($this->input->post('cate_id')) {
//                $cat_id = $this->input->post('cate_id');
//                $this->session->set_userdata('btn-filter', $cat_id);
//            } else if ($this->session->userdata('btn-filter')) {
//                $cat_id = $this->session->userdata('btn-filter');
//            }
//            if ($cat_id != 0) {
//                $config['total_rows'] = $this->mproduct->get_num_row_in_cat($cat_id);
//                $this->pagination->initialize($config);
//                $pass['products'] = $this->mproduct->get_in_category($cat_id, $config['per_page'], ($this->uri->segment(4) == '') ? 0 : $this->uri->segment(4));
//                $this->load->view('layout', $pass);
//            }
//        } elseif ($this->input->post('btn-search') || $this->session->userdata('btn-search')) { // tim kiem
//            $name = $this->input->post('name');
//            $config['total_rows'] = $this->mproduct->get_num_row_search($name);
//            $this->pagination->initialize($config);
//            $pass['products'] = $this->mproduct->search($name, $config['per_page'], ($this->uri->segment(4) == '') ? 0 : $this->uri->segment(4));
//            $this->load->view('layout', $pass);
        } else {
            $this->session->unset_userdata('btn-filter');
            $config['total_rows'] = $this->mproduct->num_rows();
            $this->pagination->initialize($config);
            $pass['products'] = $this->mproduct->get_all($config['per_page'], ($this->uri->segment(4) == '') ? 0 : $this->uri->segment(4));
            $this->load->view('layout', $pass);
        }
    }

    public function addnew() {
        $pass['title'] = 'Addnew Product';
        $pass['subview'] = 'product/addnew';
        $this->load->model('mcategory');
        $pass['parents'] = $this->mcategory->get_all();
        $this->load->model('mattr_group');
        $pass['attr_groups'] = $this->mattr_group->get_all();
        if ($this->input->post('btn-addnew')) {
            $this->load->helper('convert_helper');

            $this->form_validation->set_rules('product[name]', 'Product name', 'required');
            $this->form_validation->set_rules('product[price]', 'Product price', 'required');
            $this->form_validation->set_rules('product[description]', 'Product descripton', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout', $pass);
            } else {

                $data = $this->input->post('product');
                $p_id = $this->mproduct->insert($data);

                $images = $this->input->post('product-image');

                //insert image
                foreach ($images as $path) {
                    $this->mproduct_attr->insert_image($p_id, $path);
                }

                //insert attrs
                $product_attrs = $this->input->post('product-attrs');
                ;
                foreach ($product_attrs as $attr_id => $value) {
                    $this->mproduct_attr->insert($p_id, $attr_id, $value['value']);
                }
//
//
                redirect('/backend/product/index');
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }

    public function update($id) {
        $pass['title'] = 'Update Product';
        $pass['subview'] = 'product/update';
        $pass['product'] = $this->mproduct->get_product($id);
        $this->load->model('mcategory');
        $pass['parents'] = $this->mcategory->get_all();
        $this->load->model('mattr_group');
        $pass['attr_groups'] = $this->mattr_group->get_all();

        $pass['product_attrs'] = $this->mproduct_attr->get_values($id);
        $pass['product_images'] = $this->mproduct_attr->get_images($id);


        if ($this->input->post('btn-addnew')) {
            $this->load->helper('convert_helper');

            $this->form_validation->set_rules('product[name]', 'Product name', 'required');
            $this->form_validation->set_rules('product[price]', 'Product price', 'required');
            $this->form_validation->set_rules('product[description]', 'Product descripton', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout', $pass);
            } else {
                $data = $this->input->post('product');
                if ($this->mproduct->update($id, $data)) {

                    //update image
                    $images = $this->input->post('product-image');
                    $this->mproduct_attr->delete_image($id);
                    foreach ($images as $img) {
                        $this->mproduct_attr->insert_image($id, $img);
                    }

                    //update attribute
                    $attrs = $this->input->post('product-attrs');
                    foreach ($attrs as $attr_id => $value) {
                        $this->mproduct_attr->update_value($id, $attr_id, $value);
                    }

                    redirect('/backend/product/index');
                }
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }

//
//    
//
    public function addform() {
        if ($this->input->post('form_type')) {
            $id = $this->input->post('form_type');
            $this->load->model('mattribute');
            $attrs = $this->mattribute->get_in_group($id);

            $this->load->view('product/form', array('attrs' => $attrs));
        }
    }

// delete product
    public function delete() {
        if ($this->input->post('itemid')) {
            $id = $this->input->post('itemid');
            if ($this->mproduct->delete($id)) {
                $this->load->model('mproduct_attr');
                if ($this->mproduct_attr->delete_by_product($id) && $this->mproduct_attr->delete_image($id)) {

                    echo 'Xóa thành công';
                }
            }
        }
    }

    public function option() {
        if ($this->input->post('btn-apply')) {
            $action = $this->input->post('product-action');
            if ($action == 1) {
                $product_check = $this->input->post('product-check');
                if (count($product_check) > 0) {
                    foreach ($product_check as $p_id => $stt) {
                        $this->mproduct->delete($p_id);
                        $this->mproduct_attr->delete_image($p_id);
                        $this->mproduct_attr->delete_by_product($p_id);
                    }
                }
                redirect('/backend/product/index');
            }
        }

        if ($this->input->post('btn-filter')) {
            $cat_id = $this->input->post('cate_id');
            if ($cat_id != 0) {
                $pass['title'] = 'Product Manager';
                $pass['subview'] = 'product/index';
                $pass['products'] = $this->mproduct->get_in_category($cat_id);
                $pass['categories'] = $this->mcategory->get_all();
                $this->load->view('layout', $pass);
            }
        }

        if ($this->input->post('btn-search')) {
            $name = $this->input->post('name');
            $pass['title'] = 'Product Manager';
            $pass['subview'] = 'product/index';
            $pass['products'] = $this->mproduct->search($name);
            $pass['categories'] = $this->mcategory->get_all();
            $this->load->view('layout', $pass);
        }

        if ($this->input->post('view-type')) {
            $type_id = $this->input->post('view-type');
            $pass['title'] = 'Product Manager';
            $pass['subview'] = 'product/index';
            switch ($type_id) {
                case 1:
                    $pass['products'] = $this->mproduct->get_order_by_fild('name', 'asc');
                    break;
                case 2:
                    $pass['products'] = $this->mproduct->get_order_by_fild('price', 'asc');
                    break;
                default:
                    break;
            }
            $this->load->view('layout', $pass);
        }
    }

//
//    public function upload_image() {
//
//        $config['upload_path'] = './asset/images/upload/';
//        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = '10000';
//
//        $this->load->library('upload', $config);
//        $this->upload->initialize($config);
//        if (!$this->upload->do_upload('image')) {
//            $error = array('error' => $this->upload->display_errors());
//            print_r($error);
//        } else {
//            $data = $this->upload->data();
//            echo json_encode(array('src' => base_url() . 'asset/images/upload/' . $data['file_name'], 'path' => './asset/images/upload/' . $data['file_name']));
//        }
//
////        $file = $_FILES['image'];
////
////        move_uploaded_file($file['tmp_name'], base_url().'asset/images/upload/' . $file['name']);
////        $url = base_url().'asset/images/upload/' . $file['name'];
////        echo $url;
//    }
//

    public function show_in_cat() {
        if ($this->input->post('btn-filter') || $this->session->userdata('btn-filter')) { // loc theo hang muc
            if ($this->input->post('cate_id')) {
                $cat_id = $this->input->post('cate_id');
                $this->session->set_userdata('btn-filter', $cat_id);
            } else if ($this->session->userdata('btn-filter')) {
                $cat_id = $this->session->userdata('btn-filter');
            }
            if ($cat_id != 0) {
                $this->init_pagination('show_in_cat', $this->mproduct->get_num_row_in_cat($cat_id), 2);
                $pass['title'] = 'Product Manager';
                $pass['subview'] = 'product/index';
                $pass['categories'] = $this->mcategory->get_all();
                $pass['products'] = $this->mproduct->get_in_category($cat_id, 2, ($this->uri->segment(4) == '') ? 0 : $this->uri->segment(4));
                $this->load->view('layout', $pass);
            }
        }
    }

    public function search() {
        if ($this->input->post('btn-search') || $this->session->userdata('btn-search')) { // tim kiem
            if ($this->input->post('name')) {
                $name = $this->input->post('name');
                $this->session->set_userdata('btn-search', $name);
            } else {
                $name = $this->session->userdata('btn-search');
            }
            $this->init_pagination('search', $this->mproduct->get_num_row_search($name), 2);
            $pass['title'] = 'Product Manager';
            $pass['subview'] = 'product/index';
            $pass['categories'] = $this->mcategory->get_all();
            $pass['products'] = $this->mproduct->search($name, 2, ($this->uri->segment(4) == '') ? 0 : $this->uri->segment(4));
            $this->load->view('layout', $pass);
        }
    }

    public function date() {
        $this->load->view('product/date');
    }

}
