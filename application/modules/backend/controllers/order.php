<?php

class Order extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('morder');
        $this->load->model('mproduct_order');
    }

    public function index() {
        $pass['title'] = 'Quản lý hóa đơn';
        $pass['subview'] = 'order/index';
        $pass['orders'] = $this->morder->get_all();
        $this->load->view('layout', $pass);
    }

    public function detail($id) {
        $pass['title'] = 'Chi tiết hóa đơn';
        $pass['subview'] = 'order/detail';
        $pass['order'] = $this->morder->get_order($id);
        $pass['products'] = $this->mproduct_order->get_in_order($id);

        $this->load->view('layout', $pass);
    }

    public function updateStatus() {
        if ($this->input->post('order_id') && $this->input->post('status')) {
            $id = $this->input->post('order_id');
            $stt = $this->input->post('status');
            $this->morder->updateStatus($id, $stt);
            redirect('/backend/order/index');
        }
    }

    public function delete() {
        if ($this->input->post('itemid')) {
            $id = $this->input->post('itemid');
            if ($this->morder->delete($id)) {
                if ($this->mproduct_order->delete_order($id)) {
                    echo 'Successfull';
                }
            }
        }
    }

    public function option() {
        if ($this->input->post('view-type')) {
            $type_id = $this->input->post('view-type');
            $pass['title'] = 'Quản lý hóa đơn';
            $pass['subview'] = 'order/index';
            $pass['type_id'] = $type_id;
            switch ($type_id) {
                case 1:
                    $pass['orders'] = $this->morder->get_order_by_fild('bill_code', 'asc');
                    break;
                case 2:
                    $pass['orders'] = $this->morder->get_order_by_fild('amount', 'asc');
                    break;
                case 3:
                    $pass['orders'] = $this->morder->get_order_by_fild('status', 'asc');
                default:
                    break;
            }
            $this->load->view('layout', $pass);
        }
    }

    public function sendemail() {
        if ($this->input->post('btn-send')) {
            $email = $this->input->post('user-email');
            $listproduct = $this->input->post('product-order');
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => '465',
                'smtp_user' => 'skyfrost.07@gmail.com',
                'smtp_pass' => 'vanlam0705'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('vanlam0705@gmail.com', 'Own Store Email');
            $this->email->to('vanlam0705@gmail.com');
            $this->email->subject('Thông tin đơn hàng');
            $this->email->message('Thông tin đơn hàng của bạn <br />'.$listproduct);

            if ($this->email->send()) {
                redirect('/backend/order/index');
            } else {
                echo 'Fails';
            }
        }
    }

}
