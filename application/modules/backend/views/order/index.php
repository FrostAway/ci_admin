
<div class="row">
    <div class="small-12 large-12 columns">
        <div class="wrapper">
            <div class="row">
                <h4 class="bar-title">Quản lý Hóa đơn</h4>
            </div>
            <div class="row nav-table">
                <div class="small-12 medium-6 large-4 columns">
                    <?= form_open(base_url().'backend/order/option', array('id'=>'form-view', 'method'=>'post')) ?>
                    <div class="row collapse">
                        <div class="small-10 columns">
                            <select name="view-type" id="view-type-id">
                                <option value="0">Chọn kiểu xem</option>
                                <option value="1">Sắp xếp theo tên A-Z</option>
                                <option value="2">Sắp xếp theo tổng tiền</option>
                                <option value="3">Sắp xếp theo trạng thái</option>
                            </select>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
                <div class="small-12 medium-2 large-2 large-offset-4 columns form-group">                   
                    <a class="button radius tiny">Nhập file Excel</a>
                </div>
                <div class="small-12 medium-2 large-2 columns form-group">
                    <a class="button radius tiny">Xuất file Excel</a>
                </div>
<!--                <div class="small-12 medium-2 large-2 columns form-group">
                    <a class="button radius tiny"><i class="fi-plus"></i> Thêm mới</a>
                </div>-->
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
                        <td><input type="checkbox" name="attributes" class="item-check"/></td>
                        <td><?= $order['bill_code'] ?></td>
                        <td><?= $order['order_time'] ?></td>
                        <td><?= $order['fullname'] ?></td>
                        <td><?= $order['amount'] ?></td>
                        <?= form_open(base_url().'backend/order/updateStatus', array('method'=>'post')) ?>
                         <?= form_hidden('order_id', $order['id']); ?>
                        <td>
                            <?php // if($order['status'] == 1) echo 'Chưa thanh toán'; elseif($order['status']==2) echo 'Đã thanh toán'; ?>
                            <select name="status">
                                <?php if($order['status'] == 1){ ?>
                                <option selected="" value="1">Chưa thanh toán</option>
                                <option value="2">Đã thanh toán</option>
                                <?php }else{ ?>
                                 <option value="1">Chưa thanh toán</option>
                                 <option selected="" value="2">Đã thanh toán</option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <a href="<?= base_url() ?>backend/order/detail/<?= $order['id'] ?>" data-tooltip aria-haspopup="true" class="has-tip" title="Xem chi tiết"><i class="fi-book"></i> </a>                   
                            <a href="<?= base_url() ?>backend/order/delete" itemid="<?= $order['id'] ?>" class="item-delete" data-tooltip aria-haspopup="true" class="has-tip" title="Xóa"><i class="fi-x large"></i></a>
                            <input type="submit" data-tooltip aria-haspopup="true" class="has-tip" title="Cập nhật trạng thái" value="Update">
                        </td>
                        <?= form_close(); ?>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

