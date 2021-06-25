<?php
$active_page = "history";
require_once ('../../database/DBHelper.php');
require_once ('../../admin/common/utility.php');
$limit = 10;
$isRequireLogin = true;

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if (isset($_GET['limit'])) {
    $limit = $_GET['limit'];
}
$fisrtIndex = ($page-1)*$limit;

// $addSql = '';
// $search = '';
// if (isset($_GET['search'])) {
//     $search = $_GET['search'];
//     $addSql = ' && name like "%'.$_GET['search'].'%" ';
// }
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
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="50px">STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Ngày tạo</th>
                        <th width="110px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Lay danh sach danh muc tu database
                    $sql          = 'select * from orders where created_by = '.$authen['id'].' limit '.$fisrtIndex.', '.$limit;
                    
                    $orderList = executeResult($sql);

                    $count = executeSingleResult("select count(id) as total from orders where created_by = ".$authen['id']);
                    $total = $count['total'];
                    $number = ceil($total/$limit);
                    // $index = 1;
                    foreach ($orderList as $item) {
                        echo '<tr>
                                    <td>'.(++$fisrtIndex).'</td>
                                    <td>'.$item['id'].'</td>
                                    <td>'.$item['email'].'</td>
                                    <td>'.$item['address'].'</td>
                                    <td>'.$item['order_date'].'</td>
                                    <td>
                                        <a href="detail.php?id='.$item['id'].'"><button class="btn btn-warning">Chi tiết</button></a>
                                    </td>
                                    
                                </tr>';
                    }
                    ?>
                </tbody>
            </table>
            
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