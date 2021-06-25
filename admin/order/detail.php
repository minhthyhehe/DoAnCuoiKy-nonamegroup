<?php
require_once ('../../database/DBHelper.php');
require_once ('../common/utility.php');
$active_page = "order";

$orders = null;
if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'select * from order_details where order_id = '.$id;
    $orders = executeResult($sql);
   
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Quản Lý Đơn Hàng</title>
    <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/default.css" rel="stylesheet">
</head>
<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("../layout/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include("../layout/topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Quản Lý Danh Mục</h1>
                    </div> -->
                    <!-- Content Row -->
                    <div class="row">
                        <div class="container">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h2 class="text-center">Quản Lý Đơn Hàng</h2>
                                </div>
                                <!-- <div class="panel-body"> -->
                                  
                                   
                                    <?php
                if($orders==null) {
                    echo 'Không tìm thấy thông tin chi tiết hoá đơn.';
                } else {
            ?>
            
                          
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th>Hình Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá Bán</th>
                            <th>Tổng</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 0;
                        $total = 0;
                        foreach ($orders as $item) {
                            $infoProduct     = executeSingleResult('select * from product where id = '.$item['product_id']);
                            $productImages     = executeSingleResult('select * from images where type =2 && id_product = '.$item['product_id']);
                            if ($infoProduct != null) {
                                $name = $infoProduct['name'];
                                $price = number_format($infoProduct['price']);
                                $content = $infoProduct['content'];
                            }
                            echo '<tr>
                                        <td>'.(++$index).'</td>
                                        <td><img src=../"'.$productImages['url'].'" style="max-width: 100px" /></td>
                                        <td>'.$infoProduct['name'].'</td>
                                        <td>'.$item['num'].'</td>
                                        <td>'.number_format($item['price']).' vnđ</td>
                                        <td>'.number_format(($item['num']*$item['price'])).' vnđ</td>
                                       
                                        
                                    </tr>';
                            $total += $item['num']*$item['price'];
                        }
                        echo '<tr>
                                        <td>'.(++$index).'</td>
                                        <td>Tổng cộng</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>'.number_format($total).' vnđ</td>
                                        
                                    </tr>';
                        ?>
                    </tbody>
                </table>
                <?php
                    echo '<a class="btn btn-success" href="index.php" style="color:white; float:right;">Quay lại</a>';
                
               }
            ?>
                                    
                                <!-- </div> -->
                            </div>
                       </div>
                    </div>
                </div>
                <!-- End Page Content -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("../layout/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/js/default.js"></script>


    <script type="text/javascript">
        function deleteProduct(id) {
            var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
            if(!option) {
                return;
            }
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {
                    'id': id,
                    'action': 'delete'
                },
                success: function (data) {
                    location.reload()
                },
                error: function (e) {
                    console.log(e.message);
                }
            });
        }
        
        function onSelectChange(){
            document.getElementById('formLimit').submit();
        }
    </script>

</body>
</html>