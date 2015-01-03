
<div class="row">
    <div class="wrapper">
        <h4>Chi tiết hóa đơn</h4>
        <div class="row">
            <div class="small-6 columns">
                <div class="wrapper">
                    <table class="data-table">
                        <tr>
                            <td>Mã hóa đơn: </td>
                            <td><?= $order->bill_code ?></td>
                        </tr>
                        <tr>
                            <td>Thời gian: </td>
                            <td><?= $order->order_time ?></td>
                        </tr>
                        <tr>
                            <td>Trạng thái</td>
                            <td><?php if($order->status==1) echo 'Xác nhận'; ?></td>
                        </tr>
                        <tr>
                            <td>Thông tin: </td>
                            <td><?= $order->order_info ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="small-6 columns">
                <?php if($order->has_user == 1){ ?>
                <label>Khách hàng đã có tài khoản:</label>
                    <table class="data-table">
                        <tr>
                            <td>Tên khách hàng: </td>
                            <td><?= $order->full_name ?></td>
                        </tr>
                        <tr>
                            <td>Địa Chỉ: </td>
                            <td><?= $order->address ?></td>
                        </tr>
                        <tr>
                            <td>Điện thoại: </td>
                            <td><?= $order->phone ?></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><?= $order->email ?></td>
                        </tr>
                    </table>
                <?php }else{ ?>
                Khách hàng chưa có tài khoản.
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <?= form_open(base_url().'backend/order/sendemail', array('method'=>'post')); ?>
    <div class="wrapper">
        <h5>Danh sách sản phẩm</h5>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Số lượng</th>
                    <th>Tổng hàng</th>
                </tr>
            </thead>
            <?php foreach ($products as $product){ ?>
            <tr>
                <td><?= $product['product_id'] ?></td>
                <td><a href="#"><img src="<?= $product['thumbnail'] ?>" /> </a> </td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['discount'] ?></td>
                <td><?= $product['quantity'] ?></td>
                <td><?= $product['total'] ?></td>
            </tr>
            <?php } ?>
        </table>

        <div class="row">
            <hr />
        </div>
        <div class="row">
            <div class="small-4 medium-5 large-6 columns">
                <div class="wrapper">
                    <label>Ghi chú: </label>
                    <textarea rows="4" placeholder="Ghi chú"></textarea>
                </div>
            </div>
            <div class="small-7 medium-6 large-5 columns">
                <h5>Tổng Hóa đơn</h5>
                <div class="row">
                    <div class="small-6 medium-6 large-6 columns">
                        <label>Tổng tiền hàng: </label>
                        <label>Khuyễn mãi: </label>
                        <label>Phí vận chuyển: </label>
                        <label>Tổng cộng: </label>
                    </div>
                    <div class="small-3 medium-3 large-2 end columns text-right">
                        <label><?= $order->amount ?></label>
                        
                    </div>
                </div>
  
                <div class="row">
                    <div class="columns">
                        <ul class="inline-list">
                            <li><a class="button tiny">Hủy hóa đơn</a></li>
                            <li><a class="button tiny">Xuất File</a></li>
                            <input type="hidden" name="user-email" value="<?php if(isset($order->email)) echo $order->email ?>" />
                            <li><input type="submit" name="btn-send" class="button tiny" value="Tiếp tục" /></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= form_close() ?>
</div>

