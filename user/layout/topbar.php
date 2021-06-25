<?php

require_once ('../../database/DBHelper.php');
require_once ('../../database/utility.php');

$authen = authenToken(array("ADMIN", "USER"));
if(isset($isRequireLogin) && $isRequireLogin == true  && $authen == null) {
  header('Location: ../signin');
  die();
}
session_start();
$cart = [];

if (isset($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];
}
$count = 0;
foreach ($cart as $item) {
  $count += $item['num'];
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">

    <div class="container">
      <!-- <a class="navbar-brand" href="../index.php">
        <img src="images/logo.png" class="logo-top" alt="">
      </a> -->
      <a class="navbar-brand sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">My Shop</div>
      </a>
      <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item <?php if($active_page == 'home') { echo 'active'; } ?>">
            <a class="nav-link" href="../index.php">TRANG CHỦ</a>
          </li>
          
          <!-- <li class="nav-item">
            <a class="nav-link" href="../product">SẢN PHẨM</a>
          </li> -->
          <li class="nav-item lisanpham <?php if($active_page == 'product') { echo 'active'; } ?>">
            <a class="nav-link" href="../product">SẢN PHẨM
              <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </a>
            <ul class="sub_menu">
              <?php
                //Lay danh sach danh muc tu database
                $sql          = 'select * from category';
                $categoryList = executeResult($sql);
                foreach ($categoryList as $item) {
                    echo '<li style="min-width: 100px;">
                            <a href="../product?id='.$item['id'].'">'.$item['name'].'</a>
                          </li>';
                }
              ?>
            </ul>
          </li>
          <li class="nav-item <?php if($active_page == 'introduce') { echo 'active'; } ?>">
            <a class="nav-link" href="../introduce">GIỚI THIỆU</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="blog.html">BLOG</a>
          </li> -->
          <li class="nav-item <?php if($active_page == 'contact') { echo 'active'; } ?>">
            <a class="nav-link" href="../contact">LIÊN HỆ</a>
          </li>
        </ul>
      </div>
      <div id="offcanvas-flip1" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="background: white;
        width: 100%;">

          <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>
          <h3 style="font-size: 14px;
          color: #272727;
          text-transform: uppercase;
          margin: 3px 0 30px 0;
          font-weight: 500; letter-spacing: 2px;">MENU</h3>
            <div class="justify-content-md-center">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Product.html">SẢN PHẨM</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle aaaa"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" >
                    <p>SẢN PHẨM</p>
                    <i class="fa fa-angle-double-right"></i>

                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border:0;">
                    <a class="dropdown-item" href="detailproduct.html" title="Sản phẩm - Style 1">Sản phẩm - Style 1</a>
                    <a class="dropdown-item" href="detailproduct.html" title="Sản phẩm - Style 2">Sản phẩm - Style 2</a>
                    <a class="dropdown-item" href="detailproduct.html" title="Sản phẩm - Style 3">Sản phẩm - Style 3</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="introduce.html">GIỚI THIỆU</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="blog.html">BLOG</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Contact.html">LIÊN HỆ</a>
                </li>
              </ul>
            </div>

        </div>
      </div>
      <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="    background: white;
            width: 350px;">

          <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>

          <h3 style="font-size: 14px;
                color: #272727;
                text-transform: uppercase;
                margin: 3px 0 30px 0;
                font-weight: 500; letter-spacing: 2px;">Tìm kiếm</h3>
          <div class="search-box wpo-wrapper-search">
            <form action="search" class="searchform searchform-categoris ultimate-search">
              <div class="wpo-search-inner" style="display:inline">
                <input type="hidden" name="type" value="product">
                <input required="" id="inputSearchAuto" name="q" maxlength="40" autocomplete="off"
                  class="searchinput input-search search-input" type="text" size="20"
                  placeholder="Tìm kiếm sản phẩm...">
              </div>
              <button type="submit" class="btn-search btn" id="search-header-btn">
                <i style="font-weight:bold" class="fas fa-search"></i>
              </button>
            </form>
            <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none">
              <div class="resultsContent"></div>
            </div>
          </div>
        </div>
      </div>
      <div id="offcanvas-flip2" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="    background: white;
            width: 350px;">

          <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>

          <h3 style="font-size: 14px;
                color: #272727;
                text-transform: uppercase;
                margin: 3px 0 30px 0;
                font-weight: 500; letter-spacing: 2px;">Giỏ hàng</h3>
          <div class="site-nav-container-last" style="color:#272727">
            <div class="cart-view clearfix">
              <table id="cart-view">
                <tbody>
                <?php
                  $index = 0;
                  $total = 0;
                  foreach ($cart as $item) {
                    $total += $item['price'] * $item['num'];
                    $itemImages     = executeSingleResult('select * from images where type = 2 && id_product = '.$item['id']);
                      echo '<tr class="item_"'.(++$index).'>
                      <td class="img"><a href="" title="'.$item['name'].'"><img
                            src="../../admin/'.$itemImages['url'].'" alt="/products/nike-air-max-90-essential-grape"></a></td>
                      <td>
                        <a class="pro-title-view" style="color: #272727" href="../detailproduct/?id='.$item['id'].'"
                          title="'.$item['name'].'">'.$item['name'].'</a>
                        <span class="variant">Tím / 36</span>
                        <span class="pro-quantity-view">'.$item['num'].'</span>
                        <span class="pro-price-view">'.number_format($item['price']).' vnđ</span>
                        <span class="remove_link remove-cart"><a href="" onclick=deleteToCart('.$item['id'].')><i style="color: #272727;"
                              class="fas fa-times"></i></a></span>
                      </td>';
                  }
                ?>
                 
                </tbody>
              </table>
              <span class="line"></span>
              <table class="table-total">
                <tbody>
                  <tr>
                    <td class="text-left">TỔNG TIỀN:</td>
                    <td class="text-right" id="total-view-cart"><?=number_format($total);?> vnđ</td>
                  </tr>
                  <tr>
                    <!-- <td class="distance-td"><a href="" class="linktocart button dark" style="color: white">Xem giỏ hàng</a></td> -->
                    <!-- <td><a href="" class="linktocheckout button dark"  style="color: white">Thanh toán</a></td> -->
                  </tr>
                </tbody>
              </table>

              <a href="../payment" target="_blank" class="button btn-check" style="text-decoration:none; color: white; margin-top: 10px;" ><span>Thanh toán</span></a>
            </div>
          </div>
        </div>
      </div>
      <?php
        $id_user = '';
        $url_img ='../assets/images/avatar.png';
        if (!empty($authen)) {
          $id_user = $authen['id'];
          $getImages          = executeResult("select images.* from images where  id_user = ".$id_user." and type = 4");
        }
        
        if(!empty($getImages)) {
            $url_img = $getImages[0]['url'];
        }
        if ($authen == null) {
          echo '
          <ul class="navbar-nav ml-auto" style="margin-top: 0px!important; margin-right: 20px;" >
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-alt"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../signin" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng nhập
                </a>
              </div>
            </li>
          </ul>
          ';
        } else {
          echo '
          <ul class="navbar-nav ml-auto" style="margin-top: 0px!important; margin-right: 20px;" >
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$authen['fullname'].'</span>
                      <img class="img-profile rounded-circle" style="max-width: 20px;"
                          src="../../admin/'.$url_img.'">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                      aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="../profile?id='.$authen['id'].'">
                          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                          Thông tin
                      </a>
                      <!-- <a class="dropdown-item" href="#">
                          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                          Settings
                      </a> -->
                       <a class="dropdown-item" href="../orders">
                          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                          Lịch sử đơn hàng
                      </a> 
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="../logout" >
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Đăng xuất
                      </a>
                      
                  </div>
              </li>
          </ul>
          ';
        }
      ?>

      <div class="icon-ol">
        <!-- <a style="color: #272727" href="">
          <i class="fas fa-user-alt"></i>
        </a>
        -->
        <!-- <a href="#" class="" uk-toggle="target: #offcanvas-flip">
          <i class="fas fa-search" style="color: black"></i>
        </a> -->

        
        <!-- <div class="header-action header-action_cart"> -->
          <a style="color: #272727" href="#" uk-toggle="target: #offcanvas-flip2">
            <i class="fas fa-shopping-cart"><span class="count"style="position: relative;
    top: -9px;
    color: red;
    right: 8px;"><?=$count?></span></i>
          </a>
            
          <!-- </div> -->
        <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
    </div>

</nav>
<script type="text/javascript">
    function deleteToCart(id) {

      $.post('../ajax/api-product.php', {
        'action': 'delete',
        'id': id
      }, function(data) {
        location.reload()
      })
    }
  </script>