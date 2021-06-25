<?php
  $active_page = "product";
  require_once ('../../database/DBHelper.php');
  require_once ('../../admin/common/utility.php');
  $id = 1;
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  $sql = 'select * from category where id = '.$id;
  $category = executeSingleResult($sql);
  if ($category != null) {
      $name = $category['name'];
  }
  $limit = 12;
  $page = 1;
  if (isset($_GET['page'])) {
      $page = $_GET['page'];
  }

  if (isset($_GET['limit'])) {
      $limit = $_GET['limit'];
  }
  $fisrtIndex = ($page-1)*$limit;

  $addSql = '';
  $search = '';
  if (isset($_GET['search'])) {
      $search = $_GET['search'];
      $addSql = ' and product.name like "%'.$_GET['search'].'%" ';
  }

  $sort = '';
  $addSort = '';
  if (isset($_GET['sort'])) {
      $sort = $_GET['sort'];
      switch($sort) {
        case "price-ascending":
          $addSort = ' order by price asc ';
          break;
        case "price-descending":
          $addSort = ' order by price desc ';
          break;
        case "name-ascending":
          $addSort = ' order by name asc ';
          break;
        case "name-descending":
          $addSort = ' order by name desc ';
          break;
        case "created-ascending":
          $addSort = ' order by created_at asc ';
          break;
        case "created-descending":
          $addSort = ' order by created_at desc ';
          break;
      }
      
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


  <title>Sản phẩm <?=$name?></title>

</head>

<body>
  <!-- <div class="header">
    <a style="color: #ffffff;text-decoration: none;" href="../index.html">MIỄN PHÍ VẬN CHUYỂN VỚI ĐƠN HÀNG NỘI THÀNH > 300K
      - ĐỔI TRẢ TRONG 30 NGÀY - ĐẢM BẢO CHẤT LƯỢNG</a>
  </div> -->

  <!-- Begin Topbar -->
  <?php include("../layout/topbar.php"); ?>
  <!-- End Topbar -->

  <!--Banner-->
  <!-- <div>
    <div>
      <img src="../assets/images/collection_banner.jpg" alt="Products">
    </div>
  </div> -->

  <!--List Prodct-->
  <div class="container" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12 sidebar-fix">
        <div class="wrap-filter">
          <div class="box_sidebar">
            <div class="block left-module">
              <div class=" filter_xs">
                <div class="layered">
                  <p class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse"
                  href="../#collapseExample2" role="button" aria-expanded="false"
                  aria-controls="collapseExample2">
                    Bộ lọc sản phẩm
                    <span><i class="fa fa-angle-down" data-toggle="collapse"
                      href="../#collapseExample2" role="button" aria-expanded="false"
                      aria-controls="collapseExample2"></i></span>
                  </p>
                  <div class="block_content collapse" id="collapseExample2">
                    <!-- <div class="group-filter card card-body" style="border:0;padding:0" aria-expanded="true">
                      <div class="layered_subtitle dropdown-filter"><span>Thương hiệu</span><span
                          class="icon-control"><i class="fa fa-minus"></i></span></div>
                      <div class="layered-content bl-filter filter-brand">
                        <ul class="check-box-list">
                          <li>
                            <input type="checkbox" id="data-brand-p1" value="Khác">
                            <label for="data-brand-p1">Khác</label>
                          </li>
                        </ul>
                      </div>
                    </div> -->
                    
                    <div class="group-filter" aria-expanded="true">
                    <form name="formFilterPrice" id="formFilterPrice" method="get">
                      <div class="layered_subtitle dropdown-filter"><span>Giá sản phẩm</span><span
                          class="icon-control"><i class="fa fa-minus"></i></span></div>
                      <div class="layered-content bl-filter filter-price">
                        <ul class="check-box-list">
                          <li>
                            <input type="checkbox" name ="p1" id="p1" onclick=onFilterPrice(1)>
                            <label for="p1">
                              <span>Dưới</span> 500,000₫
                            </label>
                          </li>
                          <li>
                            <input type="checkbox" name ="p2" id="p2" onclick=onFilterPrice(2)>
                            <label for="p2">
                              500,000₫ - 1,000,000₫
                            </label>
                          </li>
                          <li>
                            <input type="checkbox" id="p3" onclick=onFilterPrice(3)>
                            <label for="p3">
                              1,000,000₫ - 1,500,000₫
                            </label>
                          </li>
                          <li>
                            <input type="checkbox" id="p4" onclick=onFilterPrice(4)>
                            <label for="p4">
                              2,000,000₫ - 5,000,000₫
                            </label>
                          </li>
                          <li>
                            <input type="checkbox" id="p5" onclick=onFilterPrice(5)>
                            <label for="p5">
                              <span>Trên</span> 5,000,000₫
                            </label>
                          </li>
                        </ul>
                      </div>
                      </form>
                    </div>

                    <div class="group-filter" aria-expanded="true">
                      <div class="layered_subtitle dropdown-filter"><span>Màu sắc</span><span class="icon-control"><i
                            class="fa fa-minus"></i></span></div>
                      <div class="layered-content filter-color s-filter">
                        <ul class="check-box-list">
                          <li>
                            <input type="checkbox" id="data-color-p1">
                            <label for="data-color-p1" style="background-color: #fb4727"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p2">
                            <label for="data-color-p2" style="background-color: #fdfaef"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p3">
                            <label for="data-color-p3" style="background-color: #3e3473"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p4">
                            <label for="data-color-p4" style="background-color: #ffffff"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p5">
                            <label for="data-color-p5" style="background-color: #75e2fb"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p6">
                            <label for="data-color-p6" style="background-color: #cecec8"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p7">
                            <label for="data-color-p7" style="background-color: #6daef4"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p8">
                            <label for="data-color-p8" style="background-color: #000000"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p9">
                            <label for="data-color-p9" style="background-color: #e2262a"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p10">
                            <label for="data-color-p10" style="background-color: #ee8aa1"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p11">
                            <label for="data-color-p11" style="background-color: #4a5250"></label>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="group-filter" aria-expanded="true">
                      <div class="layered_subtitle dropdown-filter"><span>Kích thước</span><span class="icon-control"><i
                            class="fa fa-minus"></i></span></div>
                      <div class="layered-content filter-size s-filter">

                        <ul class="check-box-list clearfix">

                          
                          <li>
                            <input type="checkbox" id="data-size-p2">
                            <label for="data-size-p2">36</label>
                          </li>

                          <li>
                            <input type="checkbox" id="data-size-p3">
                            <label for="data-size-p3">37</label>
                          </li>

                          <li>
                            <input type="checkbox" id="data-size-p4">
                            <label for="data-size-p4">38</label>
                          </li>

                          <li>
                            <input type="checkbox" id="data-size-p5">
                            <label for="data-size-p5">39</label>
                          </li>

                          <li>
                            <input type="checkbox" id="data-size-p6">
                            <label for="data-size-p6">40</label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-size-p6">
                            <label for="data-size-p6">41</label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-size-p6">
                            <label for="data-size-p6">42</label>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="wrap-collection-title row">
          <div class="col-md-7 col-sm-12 col-xs-12">
            <h1 class="title" >
              Tất cả sản phẩm
            </h1>
            <div class="alert-no-filter"></div>
          </div>
          <div class="col-md-3 d-sm-none d-md-block d-none d-sm-block"  style="float: left">
            <div class="search-box wpo-wrapper-search">
              <form  method="get" class="searchform searchform-categoris ultimate-search">
                <div class="wpo-search-inner" style="display:inline">
                  <input type="hidden" name="type" value="product">
                  <input id="inputSearchAuto" name="search" maxlength="40" autocomplete="off"
                    class="searchinput input-search search-input" type="text" size="20"
                    placeholder="Tìm kiếm sản phẩm..." value=<?=$search?>>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-2 d-sm-none d-md-block d-none d-sm-block" style="float: left">
            <div class="option browse-tags">
              <form id="formSort" method="get">
                <span class="custom-dropdown custom-dropdown--grey">
                
                  <select name="sort" id="sort" class="sort-by custom-dropdown__select" onchange="onSortChange()">
                    <option value="price-ascending" <?php if($sort == "price-ascending") { echo 'selected'; }?>>Giá: Tăng dần</option>
                    <option value="price-descending" <?php if($sort == "price-descending") { echo 'selected'; }?>>Giá: Giảm dần</option>
                    <option value="name-ascending" <?php if($sort == "name-ascending") { echo 'selected'; }?>>Tên: A-Z</option>
                    <option value="name-descending" <?php if($sort == "name-descending") { echo 'selected'; }?>>Tên: Z-A</option>
                    <option value="created-ascending" <?php if($sort == "created-ascending") { echo 'selected'; }?>>Cũ nhất</option>
                    <option value="created-descending" <?php if($sort == "created-descending") { echo 'selected'; }?>>Mới nhất</option>
                    <!-- <option value="best-selling">Bán chạy nhất
                    </option>
                    <option value="quantity-descending">Tồn kho: Giảm dần</option> -->
                  </select>
                </span>
              </form>
            </div>
          </div>
          
        </div>
        <div class="row">
          <?php
            $sql  = 'select product.id, product.name, product.price, product.thumbnail, product.updated_at from 
            product where id_category = '.$id.$addSql.$addSort.' limit '.$fisrtIndex.',
            '.$limit;

            $productList = executeResult($sql);
            $count = executeSingleResult("select count(id) as total from product where 1 ".$addSql);
            $total = $count['total'];
            $number = ceil($total/$limit);
            foreach ($productList as $item) {
              $id_product = $item['id'];
              $getImages1          = executeResult("select images.* from images where  id_product = ".$id_product." and type = 2");
              $getImages2          = executeResult("select images.* from images where  id_product = ".$id_product." and type = 3");
              $url_img1 ='';
              $url_img2 ='';
              if(!empty($getImages1)) {
                  $url_img1 = $url_img2 = $getImages1[0]['url'];
              }
              if(!empty($getImages2)) {
                $url_img2 = $getImages2[0]['url'];
              }
              $price = number_format($item['price']);
              echo '
                <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                  <div class="product-block">
                    <div class="product-img fade-box">
                      <a href="../detailproduct?id='.$item['id'].'" title="'.$item['name'].'" class="img-resize">
                        <img
                          src="../../admin/'.$url_img1.'"
                          alt="'.$item['name'].'" class="lazyloaded">
                        <img
                          src="../../admin/'.$url_img2.'"
                          alt="'.$item['name'].'" class="lazyloaded">
                      </a>
                      
                    </div>
                    <div class="product-detail clearfix">
                      <div class="pro-text">
                        <a style=" color: black; font-size: 14px;text-decoration: none;" href="../detailproduct?id='.$item['id'].'"
                          title="'.$item['name'].'" inspiration pack>
                          '.$item['name'].'
                        </a>
                      </div>
                      <div class="pro-price">
                        <p class="">'.$price.' đ</p>
                      </div>
                    </div>
                  </div>
                </div>
              ';
            }
          ?>
        </div>

        <!-- Begin Pagination -->
        <?=pagination($number, $page, $limit, '&search='.$search.'&sort='.$sort)?>
                                    <!-- End Pagination -->
        <!-- <div class="sortpagibar pagi clearfix text-center">
          <div id="pagination" class="clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <span class="page-node current">1</span>
              <a class="page-node" href="../">2</a>
              <a class="next" href="../">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                  y="0px" viewBox="0 0 31 10" style="enable-background:new 0 0 31 10; width: 31px; height: 10px;"
                  xml:space="preserve">
                  <polygon points="31,5 25,0 25,4 0,4 0,6 25,6 25,10 "></polygon>
                </svg> </a>
            </div>
          </div>
        </div> -->
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
  <script async defer crossorigin="anonymous" src="../assets/plugins/sdk.js"></script>
  <script src="../assets/plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="../assets/plugins/bootstrap/popper.min.js"></script>
  <script src="../assets/plugins/bootstrap/bootstrap.min.js"></script>
  <script src="../assets/plugins/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/plugins/uikit/uikit.min.js"></script>
  <script src="../assets/plugins/uikit/uikit-icons.min.js"></script>
  <script type="text/javascript">
    function onSortChange(){
      document.getElementById('formSort').submit();
    }
    function onFilterPrice(key){
      console.log("asdfasdfasd: ", key)
      document.getElementById('formFilterPrice').submit();

    }
  </script>

</body>

</html>
