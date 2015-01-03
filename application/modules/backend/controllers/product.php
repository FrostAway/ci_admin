<?php

class Product extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mproduct');
        $this->load->model('mattribute');
        $this->load->model('mproduct_attr');
    }

    public function index() {
        $pass['title'] = 'Product Manager';
        $pass['subview'] = 'product/index';
        $products = $this->mproduct->get_all();
        $data = array();

        $pass['products'] = $products;
        $this->load->view('layout', $pass);
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
                foreach ($product_attrs as $attr_id => $value) {
                    $this->mproduct_attr->insert($p_id, $attr_id, $value);
                }


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
        if($this->input->post('btn-view-type')){
            $type_id = $this->input->post('view-type');
            $pass['title'] = 'Product Manager';
            $pass['subview'] = 'product/index';            
            switch ($type_id) {
                case 0:
                    redirect('/backend/product/index');
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
    public function delete_image() {
//        if ($this->input->post('imglink')) {
//            $imglink = $this->input->post('imglink');
//            if (unlink($imglink)) {
//                $relaid = $this->input->post('relaid');
//                if ($relaid != 0) {
//                    $this->mproduct_attr->delete_image($relaid);
//                }
//                $res = 1;
//            } else {
//                $res = 0;
//            }
//            echo $res;
//        }
    }

}
