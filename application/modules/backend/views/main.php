

<script>
    google.load('visualization', '1.0', {'packages': ['corechart']});
    google.setOnLoadCallback(drawColumnChart);
    google.setOnLoadCallback(drawnChartLine);
    google.setOnLoadCallback(drawBarChart);

    function drawColumnChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Ngày', {role: 'style'});
        data.addColumn('number', 'Doanh số');
        data.addRows([
            ['D 1', 1000],
            ['D 2', 1500],
            ['D 3', 2700],
            ['D 4', 4300],
            ['D 5', 5700],
            ['D 6', 6300],
            ['D 7', 6500]
        ]);
        var options = {
            title: 'Doanh số bán hàng',
            height: 400,
            width: '80%',
            'fontSize': 15,
            bar: {
                groupWidth: "50%"
            },
            hAxis: {
                title: 'Ngày'
            },
            vAxis: {
                title: 'Doanh số'
            }
        };
        var chartcolumn = new google.visualization.ColumnChart(document.getElementById('blance-chart'));
        chartcolumn.draw(data, options);
    }
    function drawnChartLine() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Ngày');
        data.addColumn('number', 'Doanh số');
        data.addRows([
            ['D 1', 1000],
            ['D 2', 1500],
            ['D 3', 2700],
            ['D 4', 4300],
            ['D 5', 5700],
            ['D 6', 6300],
            ['D 7', 6500]
        ]);
        var options = {
            title: 'Doanh số bán hàng',
            height: 400,
            width: '80%',
            pointSize: 10,
            bar: {groupWidth: "95%"},
            hAxis: {
                title: 'Ngày',
                ticks: [5, 10, 15, 20]
            },
            vAxis: {
                title: 'Doanh số'
            }
        };
        var chartline = new google.visualization.LineChart(document.getElementById('balance-line-chart'));
        chartline.draw(data, options);
    }

    function drawBarChart() {
//        var data = new google.visualization.arrayToDataTable([
//            ['Sản phẩm', 'Doanh số', {role: 'style'}],
//            ['SP5', 1000, 'color: blue'],
//            ['SP4', 1500, 'color: blue'],
//            ['SP3', 2700, 'color: blue'],
//            ['SP2', 4300, 'color: blue'],
//            ['SP1', 5700, 'color: blue']
//        ]);
        var dataArray;
        var jsonData = $.ajax({
            url: '<?= base_url() ?>'+'backend/admin/product_sell',
            dataType: 'json',
            async: false
        }).responseText;
      
        var data = new google.visualization.DataTable(jsonData);
//         data.addColumn('string', 'Sản phẩm');
//        data.addColumn('number', 'Doanh số');
       var options1 = {
            title: 'Top Sản phẩm bán chạy',
            height: 400,
            width: '80%'
        };
        var chart1 = new google.visualization.BarChart(document.getElementById('top-products'));
        chart1.draw(data, options1);
    }
</script>


<div id="main" class="row">
    <div class="large-9 columns">
        <div class="wrapper">
            <h3 class="title-area">Thông báo</h3>
            <ul class="small-block-grid-2 large-block-grid-4">
                <li>
                    <div class="box-panel">
                        <div class="box-header">
                            <h5 class="text-center">Đơn đặt hàng</h5>
                        </div>
                        <div class="box-content">
                            <a class="icon" href=""><i class="fi-shopping-cart"></i></a>
                            <span class="number right">5</span>
                        </div>
                        <div class="box-footer">
                            <a class="text-center"><h6>Read more...</h6></a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box-panel">
                        <div class="box-header">
                            <h5 class="text-center">Hóa đơn</h5>
                        </div>
                        <div class="box-content">
                            <a class="icon" href=""><i class="fi-shopping-cart"></i></a>
                            <span class="number right">5</span>
                        </div>
                        <div class="box-footer">
                            <a class="text-center"><h6>Read more...</h6></a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box-panel">
                        <div class="box-header">
                            <h5 class="text-center">Thông báo</h5>
                        </div>
                        <div class="box-content">
                            <a class="icon" href=""><i class="fi-shopping-cart"></i></a>
                            <span class="number right">5</span>
                        </div>
                        <div class="box-footer">
                            <a class="text-center"><h6>Read more...</h6></a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box-panel">
                        <div class="box-header">
                            <h5 class="text-center">Đơn đặt hàng</h5>
                        </div>
                        <div class="box-content">
                            <a class="icon" href=""><i class="fi-shopping-cart"></i></a>
                            <span class="number right">5</span>
                        </div>
                        <div class="box-footer">
                            <a class="text-center"><h6>Read more...</h6></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="wrapper">
            <div id="blance-chart" ></div>
        </div>
        <div class="wrapper">
            <div id="balance-line-chart"></div>
        </div>

        <div class="wrapper">
            <div id="top-products"></div>
        </div>

        <div class="wrapper">
            <div id="test-chart"></div>
        </div>
        <script>

        </script>
    </div>
    <!-- end main column -->


    <div class="large-3 columns">
        <div class="wrapper">
            <h5 class="bar-title">Các hoạt động gần đây</h5>
            <ul class="side-nav">
                <li><a href="#"><i class="fi-archive"></i> Hoạt động 1</a> </li>
            </ul>
        </div>

        <div class="wrapper">
            <h5 class="bar-title">Sản phẩm xem nhiều</h5>
            <ul class="small-block-grid-1 medium-block-grid-1 large-block-grid-1">
                <?php foreach ($mostviews as $product){ ?>
                <li class="bar-product text-center">
                    <a class="th" href="#"><img src="<?= $product['thumbnail'] ?>" /></a>                       
                    <label><?= $product['name'] ?></label>
                    <label><?= $product['price'] ?></label>
                </li>
                <?php } ?>
            </ul>
        </div>

        <div class="wrapper">
            <h5 class="bar-title">Khách hàng mới</h5>
            <ul class="side-nav">
                <li>
                    <div class="row">
                        <div class="columns">
                            <table class="bar-table">
                                <thead>
                                    <tr>
                                        <th>Tên khách hàng</th>
                                        <th>Order</th>
                                    </tr>
                                    <?php for($i=0; $i<5; $i++){ ?>
                                    <tr>
                                        <td>Khách hàng <?php echo $i ?></td>
                                        <td><?php echo rand(1,5); ?></td>
                                    </tr>
                                    <?php } ?>
                                </thead>
                            </table>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- end right column -->

</div>


