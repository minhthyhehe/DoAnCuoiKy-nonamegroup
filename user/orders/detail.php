<?php
$active_page = "history";
require_once ('../../database/DBHelper.php');
require_once ('../../admin/common/utility.php');
$limit = 10;
$isRequireLogin = true;
$orders = null;
if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'select * from order_details where order_id = '.$id;
    $orders = executeResult($sql);
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../assets/plugins/bootstrap/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

  <link rel="stylesheet" href="../assets/plugins/animate/animate.min.css">

  <link rel="stylesheet" href="../assets/plugins/fontawesome/all.css">

  <link href="../assets/plugins/webfonts/font.css"
    rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css" type="text/css">

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="../assets/plugins/uikit/uikit.min.css" />


  <title>Lịch sử đơn hàng</title>

</head>

<body>

  <!-- Begin Topbar -->
  <?php include("../layout/topbar.php"); ?>
  <!-- End Topbar -->
  <!--Banner-->
  <div>
    <div>
      <img src="../assets/images/collection_banner.jpg" alt="Products">
    </div>
  </div>
  <div class="breadcrumb-shop">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
          <ol class="breadcrumb breadcrumb-arrows">
            <!-- <li>
              <a href="../index.html">
                <span>Trang chủ</span>
              </a>
            </li>
            <li>
              <span><span style="color: #777777">Lịch sử đơn hàng</span></span>
            </li> -->
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--List Prodct-->

  <div class="container">

    <div class="row">
      <div class="col-md-3 d-none d-sm-block d-sm-none d-md-block">
        <div class="sidebar-page">
            <!-- <div class="group-menu">
                <div class="page_menu_title title_block">
                  <h2>Danh mục trang</span></h2>
                </div>
                <div class="layered layered-category">
                    <div class="layered-content">
                        <ul class="menuList-links">
                          <li class=""><a href="../home.html" title="Trang chủ"><span>Trang chủ</span></a></li>       
                          <li class=""><a href="../product.html" title="SẢN PHẨM"><span>Sản phẩm</span></a></li>
                          <li class="active"><a href="../introduce.html" title="Lịch sử đơn hàng"><span>Lịch sử đơn hàng</span></a></li>     
                          <li class=""><a href="../contact.html" title="Liên hệ"><span>Liên hệ</span></a></li>
                        </ul>
                      </div>
                </div>
              </div> -->
          <div class="box_image visible-lg visible-md">
            <div class="banner">
              <a href="../">
                <img src="../assets/images/blog/n-1.jpg" alt="Runner Inn">
              </a>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="page-wrapper">
          <div class="heading-page">
            <h1>Lịch sử đơn hàng</h1>
          </div>
          <div class="wrapbox-content-page">
            <div class="content-page ">
            
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
                                        <td><img src="../../admin/'.$productImages['url'].'" style="max-width: 100px" /></td>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--gallery-->
  <section class="section section-gallery">
    <div class="">
      <div class="hot_sp" style="padding-top: 70px;padding-bottom: 50px;">
        <h2 style="text-align:center;padding-top: 10px">
          <a style="font-size: 28px;color: black;text-decoration: none" href="../">Bộ sưu tập</a>
        </h2>
      </div>
      <div class="list-gallery clearfix">
        <ul class="shoes-gp">
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="../assets/images/shoes/gallery_item_1.jpg" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="../assets/images/shoes/gallery_item_2.jpg" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="../assets/images/shoes/gallery_item_3.jpg" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="../assets/images/shoes/gallery_item_4.jpg" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="../assets/images/shoes/gallery_item_5.jpg" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="../assets/images/shoes/gallery_item_6.jpg" alt="">
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Begin Footer -->
  <?php include("../layout/footer.php"); ?>
  <!-- End Footer -->
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0"></script>
  <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/js/uikit-icons.min.js"></script>
</body>

</html>