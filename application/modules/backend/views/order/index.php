
<div class="row">
    <div class="small-12 large-12 columns">
        <div class="wrapper">
            <div class="row">
                <h4 class="bar-title">Quản lý Hóa đơn</h4>
            </div>
             <?= form_open(base_url().'backend/order/option', array('method'=>'post')) ?>
            <div class="row nav-table">
                <div class="small-12 medium-6 large-4 columns">
                   
                    <div class="row collapse">
                        <div class="small-10 columns">
                            <select name="action" id="action-type">
                                <option value="0">Chọn hành động</option>
                                <option value="1">Xóa</option>
                            </select>
                        </div>
                        <div class="small-2 columns">
                            <input type="submit" value="Apply" name="btn-apply" class="button radius tiny" />
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <table class="data-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="all-check"/></th>
                        <th>Mã Hóa đơn</th>
                        <th>Thời gian</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <?php foreach ($orders as $order)  { ?>
                    <tr>
                        <td><input type="checkbox" name="item-check[<?= $order['id'] ?>]" class="item-check"/></td>
                        <td><?= $order['bill_code'] ?></td>
                        <td><?= $order['order_time'] ?></td>
                        <td><?= $order['fullname'] ?></td>
                        <td><?= $order['amount'] ?></td>
                        <?= form_open(base_url().'backend/order/updateStatus', array('method'=>'post')) ?>
                         <?= form_hidden('order_id', $order['id']); ?>
                        <td>
                            <?php  if($order['status'] == 1) echo 'Chưa thanh toán'; elseif($order['status']==2) echo 'Đã thanh toán'; ?>
                            
                        </td>
                        <td>
                            <a href="<?= base_url() ?>backend/order/detail/<?= $order['id'] ?>" data-tooltip aria-haspopup="true" class="has-tip" title="Xem chi tiết"><i class="fi-book"></i> </a>                   
                            <a href="<?= base_url() ?>backend/order/delete" itemid="<?= $order['id'] ?>" class="item-delete" data-tooltip aria-haspopup="true" class="has-tip" title="Xóa"><i class="fi-x large"></i></a>
                            <!--<input type="submit" data-tooltip aria-haspopup="true" class="has-tip" title="Cập nhật trạng thái" value="Update">-->
                        </td>
                        <?= form_close(); ?>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <?= form_close(); ?>
    </div>
</div>

