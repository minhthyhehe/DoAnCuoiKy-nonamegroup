

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../assets/plugins/bootstrap/bootstrap.min.css">


  <link rel="stylesheet" href="../assets/plugins/animate/animate.min.css">

  <link rel="stylesheet" href="../assets/plugins/fontawesome/all.css">

  <link href="../assets/plugins/webfonts/font.css"
    rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css" type="text/css">

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="../assets/plugins/uikit/uikit.min.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">


  <title>Giới thiệu</title>

</head>

<body>

  <!-- Begin Topbar -->
  <?php include("../layout/topbar.php"); ?>
  <!-- End Topbar -->
  <?php

$isRequireLogin = true;
$fullname = $phone_number = $email = $address = $note = '';
if (!empty($_POST) ) {
    require_once ('../../database/DBHelper.php');
    require_once ('../../database/utility.php');
    $fullname = $_POST['fullname'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $order_date = date('Y-m-d H:i:s');
    $created_by = $authen['id'];
    $cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}
	if($cart == null || count($cart) == 0) {
		header('Location: ../product');
		die();
	}
  $total = 0;
	foreach ($cart as $item) {
    $total += $item['num'] * $item['price'];
  }
	$sql = "insert into orders (fullname, address, email, phone_number, order_date, note, total, created_by) values ('$fullname', '$address', '$email', '$phone_number', '$order_date', '$note', '$total', '$created_by')";
	$order = execute($sql);
	
	$orderId = $order;
  
	foreach ($cart as $item) {
		$product_id = $item['id'];
		$num = $item['num'];
		$price = $item['price'];
		$sql = "insert into order_details(order_id, product_id, num, price) values ($orderId, $product_id, $num, $price)";
		execute($sql);
	}
 
	// session_destroy();
	unset($_SESSION['cart']);

	echo'
    

    <div class="registratior_custom">
    <form action="">
        <div class="content">
          <div class="x-close">
          <a href="../home">
            <i class="fa fa-times"></i></a>
          </div>
          <h3>Chúc mừng bạn đã đặt thành công đơn hàng</h3>
          <p>Chúng tôi sẽ cập nhật các chương trình khuyến mãi mới đến bạn</p>
          <ul>
            <li>
              <span>Giảm giá sản phẩm</span>
            </li>
            <li>
              <span>Sản phẩm mới</span>
            </li>
            <li>
              <span>Sản phẩm bán chạy/span>
            </li>
          </ul>
          <p>Xin cảm ơn quý khách</p>
          <a class="button_register" href="../home"><p>Ấn vào đây để quay lại trang chủ</p></a>
        </div>
    </form>
  </div>';
	// die();
}
?>
  <?php
    
    if(isset($authen['fullname'])) {
        $fullname = $authen['fullname'];
    }
    if(isset($authen['phone_number'])) {
        $phone_number = $authen['phone_number'];
    }
    if(isset($authen['email'])) {
        $email = $authen['email'];
    }
    if(isset($authen['address'])) {
        $address = $authen['address'];
    }
    ?>
  <!--Banner-->
  <div>
    
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
              <span><span style="color: #777777">Giới thiệu</span></span>
            </li> -->
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--List Prodct-->

  <div class="container">
    <div class="heading-page" >
        <h1 style="text-align:center;">Thanh toán</h1>
    </div>
    
    <div class="row">
      <div class="col-md-6 d-none d-sm-block d-sm-none d-md-block">
        <form method="post" id="formComplete">
            <div class="form-group">
                <label for="name">Họ Và Tên:</label>
                <input type="text" name="id" value="" hidden="true">
                <input required="true" type="text" class="form-control" id="fullname" name="fullname" value="<?=$fullname?>">
            </div>
            
            <div class="form-group">
                <label for="name">SĐT:</label>
                <input required="true" type="text" class="form-control" id="phone_number" name="phone_number" value="<?=$phone_number?>">
            </div>
            <div class="form-group">
                <label for="name">Email:</label>
                <input required="true" type="text" class="form-control" id="email" name="email" value="<?=$email?>">
            </div>
            <div class="form-group">
                <label for="name">Địa chỉ:</label>
                <input required="true" type="text" class="form-control" id="address" name="address" value="<?=$address?>">
            </div>
            <div class="form-group">
                <label for="name">Ghi chú:</label>
                <textarea class="form-control" rows="5" id="note" name="note"></textarea>
            </div>
            <button class="btn btn-success">Hoàn thành</button>
            <button class="btn btn-danger" onclick=cancelPayment()>Huỷ</button>
        </form>

      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="page-wrapper">
          
          <div class="wrapbox-content-page">
            <div class="content-page ">
            <?php
                if(count($cart)==0) {
                    echo 'Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán';
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 0;
                        foreach ($cart as $item) {
                            $itemImages     = executeSingleResult('select * from images where type = 2 && id_product = '.$item['id']);
                            $url_img ='';
                            if(!empty($itemImages)) {
                                $url_img = $itemImages['url'];
                            }
                            echo '<tr>
                                        <td>'.(++$index).'</td>
                                        <td><img src="../../admin/'.$url_img.'" style="max-width: 100px" /></td>
                                        <td>'.$item['name'].'</td>
                                        <td>'.$item['num'].'</td>
                                        <td>'.number_format($item['price']).' vnđ</td>
                                        <td>'.number_format(($item['num']*$item['price'])).' vnđ</td>
                                        <td>
                                            <button class="btn btn-danger" onclick="deleteToCart('.$item['id'].')">X</button>
                                        </td>
                                        
                                    </tr>';
                        }
                        echo '<tr>
                                        <td>'.(++$index).'</td>
                                        <td>Tổng cộng</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>'.number_format($total).' vnđ</td>
                                        <td</td>
                                    </tr>';
                        ?>
                    </tbody>
                </table>
                <?php
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
  <script type="text/javascript">
    function cancelPayment(id) {

      $.post('../ajax/api-product.php', {
        'action': 'cancel',
        'id': id
      }, function(data) {
        location.reload();
        // window.location = "../payment";
      })
    }
  </script>
</body>

</html>