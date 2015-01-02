<?php

class Product extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mproduct');
        $this->load->model('mattribute');
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
                $data['slug'] = convert_tv($data['name']);
                $p_id = $this->mproduct->insert($data);

                $images = $this->input->post('product-image');

                //insert image
                $this->load->model('mproduct_attr');
                foreach ($images as $img) {
                    $this->attr_relation_model->insert($p_id, 1, $img);
                }

                //insert attrs

                $product_attrs = $this->input->post('product-attrs');
                foreach ($product_attrs as $attr_id => $value) {
                    $this->attr_relation_model->insert($p_id, $attr_id, $value);
                }


                redirect('/backend/product/index');
            }
        } else {
            $this->load->view('layout', $pass);
        }
    }
    
//    public function update($id) {
//        $pass['title'] = 'Update Product';
//        $pass['subview'] = 'product/update';
//        $pass['product'] = $this->mproduct->get_product($id);
//        $this->load->model('category_model');
//        $pass['parents'] = $this->category_model->get_parent();
//        $this->load->model('attr_group_model');
//        $pass['attr_groups'] = $this->attr_group_model->view();
//        $this->load->model('attr_relation_model');
//        $pass['pr_image'] = $this->attr_relation_model->get_images($id, 1);
//        $product_attrs = $this->attr_relation_model->get_values($id);
//        if (count($product_attrs) > 0) {
//            $pr_attrs = array();
//            foreach ($product_attrs as $attr) {
//                $attr['name'] = $this->attribute_model->get_name($attr['attr_id']);
//                $pr_attrs[] = $attr;
//            }
//            $pass['product_attrs'] = $pr_attrs;
//        }
//
//        if ($this->input->post('btn-addnew')) {
//            $this->load->helper('convert_helper');
//
//            $this->form_validation->set_rules('product[name]', 'Product name', 'required');
//            $this->form_validation->set_rules('product[price]', 'Product price', 'required');
//            $this->form_validation->set_rules('product[description]', 'Product descripton', 'required');
//
//            if ($this->form_validation->run() == false) {
//                $this->load->view('layout', $pass);
//            } else {
//                $data = $this->input->post('product');
//                $data['slug'] = convert_tv($data['name']);
//                if ($this->mproduct->update($id, $data)) {
//
//                    //update image
//                    $images = $this->input->post('product-image');
//                    $this->attr_relation_model->delete($id, 1);
//                    foreach ($images as $img) {
//                        $this->attr_relation_model->insert($id, 1, $img);
//                    }
//
//                    //update attribute
//                    $attrs = $this->input->post('product-attrs');
//                    foreach ($attrs as $relaid => $value) {
//                        $this->attr_relation_model->update_value($relaid, $value);
//                    }
//
//                    redirect('/backend/product/index');
//                }
//            }
//        } else {
//            $this->load->view('layout', $pass);
//        }
//    }
//
//    
//
//    public function addform() {
//        if ($this->input->post('form_type')) {
//            $id = $this->input->post('form_type');
//            $this->load->model('attribute_model');
//            $attrs = $this->attribute_model->get_in_group($id);
//
//            $this->load->view('product/form', array('attrs' => $attrs));
//        }
//    }
//
//    public function delete() {
//        if ($this->input->post('itemid')) {
//            $id = $this->input->post('itemid');
//            if ($this->mproduct->delete($id)) {
//                echo 'Xóa thành công';
//            }
//        }
//    }
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
//    public function delete_image() {
//        if ($this->input->post('imglink')) {
//            $imglink = $this->input->post('imglink');
//            if (unlink($imglink)) {
//                $relaid = $this->input->post('relaid');
//                if ($relaid != 0) {
//                    $this->load->model('attr_relation_model');
//                    $this->attr_relation_model->delete_id($relaid);
//                }
//                $res = 1;
//            } else {
//                $res = 0;
//            }
//            echo $res;
//        }
//    }
//
//    public function image() {
//        $this->load->view('image');
//    }
//
//    public function unlink() {
//        $this->load->helper('file');
//        $filename = './asset/images/upload/xoafile.jpg';
//        if (unlink($filename)) {
//            echo 'xoa thanh cong';
//        } else {
//            echo 'khong xoa duoc';
//        }
//        var_dump(delete_files($filename));
//    }

}
