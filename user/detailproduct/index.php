<?php
$active_page = "product";
require_once ('../../database/DBHelper.php');
$active_page = "product";
$id = $name = $price = $content = '';
$productImages = array();
if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $infoProduct     = executeSingleResult('select * from product where id = '.$id);
    $productImages     = executeResult('select * from images where id_product = '.$id);
    if ($infoProduct != null) {
        $name = $infoProduct['name'];
        $price = number_format($infoProduct['price']);
        $content = $infoProduct['content'];
    }
}
?>
<html class="no-js" lang="vi">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0,
      user-scalable=0" name="viewport">
  <meta name="revisit-after" content="1 day">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="HandheldFriendly" content="true">
  <title> Sản phẩm </title>
  <link rel="stylesheet" href="../assets/plugins/bootstrap/bootstrap.min.css">



  <link rel="stylesheet" href="../assets/plugins/animate/animate.min.css">

  <link rel="stylesheet" href="../assets/plugins/fontawesome/all.css">

  <link href="../assets/plugins/webfonts/font.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/plugins/owl.carousel/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/plugins/owl.carousel/owl.theme.default.min.css">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="../assets/plugins/uikit/uikit.min.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
  <!-- <div class="header">
    <a style="color: #ffffff;text-decoration: none;" href="../index.html">MIỄN PHÍ
      VẬN CHUYỂN VỚI ĐƠN HÀNG NỘI THÀNH > 300K
      - ĐỔI TRẢ TRONG 30 NGÀY - ĐẢM BẢO CHẤT LƯỢNG</a>
  </div> -->

  <!-- Begin Topbar -->
  <?php include("../layout/topbar.php"); ?>
  <!-- End Topbar -->

  <!--  detail product -->
  <main class="">

    <div id="product" class="productDetail-page">

      <!-- detail product chính -->
      <div class="container">
        <div class="row product-detail-wrapper">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row product-detail-main pr_style_01">
              <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-gallery">
                  <div class="product-gallery__thumbs-container hidden-sm
                    hidden-xs">
                    <div class="product-gallery__thumbs thumb-fix">
                      <?php
                        $index = 1;
                        foreach ($productImages as $item) {
                            $id_image = $item['id'];
                            $url_img = $item['url'];
                            echo '
                              <div class="product-gallery__thumb  active" id="imgg1">
                                <a class="product-gallery__thumb-placeholder" href="../javascript:void(0);"
                                  data-image="'.$name.'" data-zoom-image="'.$name.'">
                                  <img src="../../admin/'.$item['url'].'" data-image="'.$name.'"
                                    alt="'.$name.'" grape="">
                                </a>
                              </div>
                            ';
                        }
                      ?>
                    </div>
                  </div>
                  <div class="product-image-detail box__product-gallery
                    scroll hidden-xs">
                    <ul id="sliderproduct" class="site-box-content
                      slide_product">
                      <?php
                        $index = 1;
                        foreach ($productImages as $item) {
                            $id_image = $item['id'];
                            $url_img = $item['url'];
                            echo '
                              <li class="product-gallery-item gallery-item
                                current " id="imgg"'.$index.'>
                                <img class="product-image-feature " src="../../admin/'.$item['url'].'"
                                  alt="'.$name.'" grape="">
                              </li>
                            ';
                        }
                      ?>
                    </ul>
                    <div class="product-image__button">
                      <div id="product-zoom-in" class="product-zoom
                        icon-pr-fix" aria-label="Zoom in" title="Zoom in">
                        <span class="zoom-in" aria-hidden="true">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36 36" style="enable-background:new 0 0 36 36; width:
                            30px; height: 30px;" xml:space="preserve">
                            <polyline points="6,14 9,11 14,16 16,14 11,9
                              14,6 6,6">
                            </polyline>
                            <polyline points="22,6 25,9 20,14 22,16 27,11
                              30,14 30,6">
                            </polyline>
                            <polyline points="30,22 27,25 22,20 20,22
                              25,27 22,30 30,30">
                            </polyline>
                            <polyline points="14,30 11,27 16,22 14,20 9,25
                              6,22 6,30">
                            </polyline>
                          </svg>
                        </span>
                      </div>
                      <div class="gallery-index icon-pr-fix"><span class="current">1</span>
                        / <span class="total">8</span></div>
                    </div>
                  </div>
                </div>
                <div class="product-gallery-slide">
                  <div class="owl-carousel owl-theme owl-product-gallery-slide"">
                    <div class=" item">
                    <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="../javascript:void(0);"
                      data-image="images/detailproduct/1.jpg" data-zoom-image="images/detailproduct/1.jpg">
                      <img src="../assets/images/detailproduct/1.jpg" data-image="images/detailproduct/1.jpg"
                        alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="../javascript:void(0);"
                      data-image="images/detailproduct/2.jpg" data-zoom-image="images/detailproduct/2.jpg">
                      <img src="../assets/images/detailproduct/2.jpg" data-image="images/detailproduct/2.jpg"
                        alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="../javascript:void(0);"
                      data-image="images/detailproduct/3.jpg" data-zoom-image="images/detailproduct/3.jpg">
                      <img src="../assets/images/detailproduct/3.jpg" data-image="images/detailproduct/3.jpg"
                        alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="../javascript:void(0);"
                      data-image="images/detailproduct/4.jpg" data-zoom-image="images/detailproduct/4.jpg">
                      <img src="../assets/images/detailproduct/4.jpg" data-image="images/detailproduct/4.jpg"
                        alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="../javascript:void(0);"
                      data-image="images/detailproduct/5.jpg" data-zoom-image="images/detailproduct/5.jpg">
                      <img src="../assets/images/detailproduct/5.jpg" data-image="images/detailproduct/5.jpg"
                        alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  " id="imgg1">
                      <a class="product-gallery__thumb-placeholder" href="../javascript:void(0);"
                        data-image="images/detailproduct/6.jpg" data-zoom-image="images/detailproduct/6.jpg">
                        <img src="../assets/images/detailproduct/6.jpg" data-image="images/detailproduct/6.jpg"
                          alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  " id="imgg1">
                      <a class="product-gallery__thumb-placeholder" href="../javascript:void(0);"
                        data-image="images/detailproduct/7.jpg" data-zoom-image="images/detailproduct/7.jpg">
                        <img src="../assets/images/detailproduct/7.jpg" data-image="images/detailproduct/7.jpg"
                          alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  " id="imgg1">
                      <a class="product-gallery__thumb-placeholder" href="../javascript:void(0);"
                        data-image="images/detailproduct/8.jpg" data-zoom-image="images/detailproduct/8.jpg">
                        <img src="../assets/images/detailproduct/8.jpg" data-image="images/detailproduct/8.jpg"
                          alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>
                  </div>

                </div>
              </div>
              <!-- Flickity HTML init -->

              <!-- <div id="product-zoom-in" class="product-zoom icon-pr-fix
                  hidden-md hidden-sm" style="padding-top:2rem;"
                  aria-label="Zoom in" title="Zoom in">
                  <span class="zoom-in" aria-hidden="true">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                      y="0px"
                      viewBox="0 0 36 36"
                      style="enable-background:new 0 0 36 36; width: 40px;
                      height: 40px;"
                      xml:space="preserve">
                      <polyline points="6,14 9,11 14,16 16,14 11,9 14,6
                        6,6">
                      </polyline>
                      <polyline points="22,6 25,9 20,14 22,16 27,11 30,14
                        30,6">
                      </polyline>
                      <polyline points="30,22 27,25 22,20 20,22 25,27
                        22,30 30,30">
                      </polyline>
                      <polyline points="14,30 11,27 16,22 14,20 9,25 6,22
                        6,30">
                      </polyline>
                    </svg>
                  </span>
                </div> -->
            </div>
            <!-- thong tin chi tiet -->
            <div class="col-md-5 col-sm-12 col-xs-12
                product-content-desc" id="detail-product">
              <div class="product-content-desc-1">
                <div class="product-title">
                  <h1><?=$name?></h1>
                  <!-- <span id="pro_sku">SKU: S-0015-1</span> -->
                </div>
                <div class="product-price" id="price-preview"><span class="pro-price"><?=$price?> đ</span></div>
                <form id="add-item-form" action="/cart/add" method="post" class="variants clearfix">
                  <div class="select clearfix">
                    <div class="selector-wrapper"><label for="product-select-option-0">Màu sắc</label><span
                        class="custom-dropdown custom-dropdown--white"><select class="single-option-selector
                            custom-dropdown__select
                            custom-dropdown__select--white" data-option="option1" id="product-select-option-0">
                          <option value="Tím">Tím</option>
                          <option value="Xanh">Xanh</option>
                        </select></span></div>
                    <div class="selector-wrapper"><label for="product-select-option-1">Kích thước</label><span
                        class="custom-dropdown custom-dropdown--white"><select class="single-option-selector
                            custom-dropdown__select
                            custom-dropdown__select--white" data-option="option2" id="product-select-option-1">
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="35">35</option>
                        </select></span></div><select id="product-select" name="id" style="display:none;">

                      <option value="1040377813">Tím / 36 - 4,800,000₫</option>
                      <option value="1040377814">Tím / 37 - 4,800,000₫</option>
                      <option value="1040377815">Tím / 38 - 4,800,000₫</option>
                      <option value="1040409049">Xanh / 35 - 4,800,000₫</option>
                      <option value="1040409050">Xanh / 36 - 4,800,000₫</option>
                      <option value="1040409053">Xanh / 37 - 4,800,000₫</option>
                      <option value="1040409054">Xanh / 38 - 4,800,000₫</option>
                    </select>
                  </div>
                  <div class="select-swatch clearfix">
                    <div id="variant-swatch-0" class="swatch clearfix" data-option="option1" data-option-index="0">


                      <div class="header" style="background: white;
                          color: #272727;"><span>Tím</span></div>

                      <div class="select-swap">
                        <div data-value="Tím" class="n-sd swatch-element
                            color tim">
                          <input class="variant-0" id="swatch-0-tim" type="radio" name="option1" value="Tím"
                            data-vhandle="tim" checked="">
                          <label class="tim sd" for="swatch-0-tim">
                            <span>Tím</span>
                          </label>

                        </div>
                        <div data-value="Xanh" class="n-sd swatch-element
                            color xanh">
                          <input class="variant-0" id="swatch-0-xanh" type="radio" name="option1" value="Xanh"
                            data-vhandle="xanh">


                          <label class="xanh" for="swatch-0-xanh">
                            <span>Xanh</span>
                          </label>

                        </div>
                      </div>
                    </div>
                    <div id="variant-swatch-1" class="swatch clearfix" data-option="option2" data-option-index="1">


                      <div class="select-swap">
                        <div data-value="36" class="n-sd swatch-element
                            36">
                          <input class="variant-1" id="swatch-1-36" type="radio" name="option2" value="36"
                            data-vhandle="36" checked="">

                          <label for="swatch-1-36" class="sd">
                            <span>36</span>
                          </label>

                        </div>
                        <div data-value="37" class="n-sd swatch-element
                            37">
                          <input class="variant-1" id="swatch-1-37" type="radio" name="option2" value="37"
                            data-vhandle="37">

                          <label for="swatch-1-37">
                            <span>37</span>
                          </label>

                        </div>
                        <div data-value="38" class="n-sd swatch-element
                            38">
                          <input class="variant-1" id="swatch-1-38" type="radio" name="option2" value="38"
                            data-vhandle="38">

                          <label for="swatch-1-38">
                            <span>38</span>
                          </label>

                        </div>
                        <div data-value="35" class="n-sd swatch-element 35
                            soldout">
                          <input class="variant-1" id="swatch-1-35" type="radio" name="option2" value="35"
                            data-vhandle="35" disabled="">

                          <label for="swatch-1-35">
                            <span>35</span>
                          </label>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="selector-actions">
                    <!-- <div class="quantity-area clearfix">
                      <input type="button" value="-" onclick="minusQuantity()" class="qty-btn">
                      <input type="text" id="quantity" name="quantity" value="1" min="1" class="quantity-selector">
                      <input type="button" value="+" onclick="plusQuantity()" class="qty-btn">
                    </div> -->
                    <div class="wrap-addcart clearfix">
                      <div class="row-flex">
                        <button type="button" class="button btn-addtocart addtocart-modal" onclick=addToCart(<?=$id?>)>Thêm
                          vào</button>
                        <button type="button" class="buy-now button" style="display: block;"  onclick=addToCartAndPayment(<?=$id?>)>Mua
                          ngay</button>

                      </div>

                      <!-- <a href="../" target="_blank" class="button btn-check"
                        style="color: #ffffff;text-decoration:none;"><span>Click
                          nhận mã giảm giá ngay
                          !</span></a> -->

                    </div>
                  </div>
                  <!--<div class="product-action-bottom visible-xs">
                      <div class="input-bottom">
                        <input id="quan-input" type="number" value="1" min="1">
                      </div>
                      <button type="button" id="add-to-cartbottom"
                        class="add-to-cartProduct add-cart-bottom button addtocart-modal" name="add">Thêm vào
                        giỏ</button>
                    </div>-->
                </form>
                <div class="product-description">
                  <div class="title-bl">
                    <h2>Mô tả</h2>
                  </div>
                  <div class="description-content">
                    <?php echo '
                      <div class="description-productdetail">
                        '.$content.'
                      </div>
                    '; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="list-productRelated clearfix">
            <div class="heading-title text-center">
              <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                  <div class="product-block">
                    <div class="product-img fade-box">
                      <a href="../#" title="Adidas EQT Cushion ADV" class="img-resize">
                        <img src="../assets/images/shoes/800502_01_e92c3b2bb8764b52a791846d84a3a360_grande.jpg"
                          alt="Adidas EQT Cushion ADV" class="lazyloaded">
                        <img src="../assets/images/shoes/shoes fade 1.jpg" alt="Adidas EQT Cushion ADV" class="lazyloaded">
                      </a>

                    </div>
                    <div class="product-detail clearfix">
                      <div class="pro-text">
                        <a style="color: black;
                            font-size: 14px;text-decoration: none;" href="../#" title="Adidas EQT Cushion ADV" inspiration
                          pack>
                          Adidas EQT Cushion ADV "North America"
                        </a>
                      </div>
                      <div class="pro-price">
                        <p class="">7,000,000₫</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                  <div class="product-block">
                    <div class="product-img fade-box">
                      <a href="../#" title="Adidas Nmd R1" class="img-resize">
                        <img src="../assets/images/shoes/201493_1_017364c87c3e4802a8cda5259e3d5a95_grande.jpg" alt="Adidas Nmd R1"
                          class="lazyloaded">
                        <img src="../assets/images/shoes/shoes fade 2.jpg" alt="Adidas Nmd R1" class="lazyloaded">
                      </a>

                    </div>
                    <div class="product-detail clearfix">
                      <div class="pro-text">
                        <a style="color: black;
                            font-size: 14px;text-decoration: none;" title="Adidas Nmd R1" href="../">
                          Adidas Nmd R1 "Villa Exclusive"
                        </a>
                      </div>
                      <div class="pro-price">
                        <p class="">7,000,000₫</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                  <div class="product-block">
                    <div class="product-img fade-box">
                      <a href="../#" title="Adidas PW Solar HU NMD" class="img-resize">
                        <img src="../assets/images/shoes/805266_02_b8b2cdd1782246febf8879a44a7e5021_grande.jpg"
                          alt="Adidas PW Solar HU NMD" class="lazyloaded">
                        <img src="../assets/images/shoes/shoes fade 3.jpg" alt="Adidas PW Solar HU NMD" class="lazyloaded">
                      </a>

                    </div>
                    <div class="product-detail clearfix">
                      <div class="pro-text">
                        <a style="color: black;
                            font-size: 14px;text-decoration: none;" href="../#" title="Adidas PW Solar HU NMD" inspiration
                          pack>
                          Adidas PW Solar HU NMD "Inspiration Pack"
                        </a>
                      </div>
                      <div class="pro-price">
                        <p class="">5,000,000₫</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                  <div class="product-block">
                    <div class="product-img fade-box">
                      <a href="../#" title="Adidas Ultraboost W" class="img-resize">
                        <img src="../assets/images/shoes/801432_01_b16d089f8bda434bacfe4620e8480be1_grande.jpg"
                          alt="Adidas Ultraboost W" class="lazyloaded">
                        <img src="../assets/images/shoes/shoes fade 4.jpg" alt="Adidas Ultraboost W" class="lazyloaded">
                      </a>

                    </div>
                    <div class="product-detail clearfix">
                      <div class="pro-text">
                        <a style="color: black;
                            font-size: 14px;text-decoration: none;" href="../#" title="Adidas Ultraboost W" inspiration
                          pack>
                          Adidas Ultraboost W
                        </a>
                      </div>
                      <div class="pro-price">
                        <p class="">5,300,000₫</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>


    <!-- show zoom detail product -->
    <!-- zoom -->
    <div class="product-zoom11">
     <div class="product-zom">
      <div class="divclose">
        <i class="fa fa-times-circle"></i>
      </div>
      <div class="owl-carousel owl-theme owl-product1">

        <div class="item"><img src="../assets/images/detailproduct/1.jpg" alt="">
        </div>
        <div class="item"><img src="../assets/images/detailproduct/2.jpg" alt="">
        </div>
        <div class="item"><img src="../assets/images/detailproduct/3.jpg" alt="">
        </div>
        <div class="item"><img src="../assets/images/detailproduct/4.jpg" alt="">
        </div>
        <div class="item"><img src="../assets/images/detailproduct/5.jpg" alt="">
        </div>
        <div class="item"><img src="../assets/images/detailproduct/6.jpg" alt="">
        </div>
        <div class="item"><img src="../assets/images/detailproduct/7.jpg" alt="">
        </div>
        <div class="item"><img src="../assets/images/detailproduct/8.jpg" alt="">
        </div>
      </div>
     </div>
    </div>

  </main>
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



  <!-- footer -->

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
  <script src="../assets/js/script.js"></script>
  <script src="../assets/js/home.js"></script>

  <script type="text/javascript">
    function addToCart(id) {

      $.post('../ajax/api-product.php', {
        'action': 'add',
        'id': id
      }, function(data) {
        location.reload()
      })
    }
    function addToCartAndPayment(id) {

      $.post('../ajax/api-product.php', {
        'action': 'add',
        'id': id
      }, function(data) {
        window.location = "../payment";
      })
    }
    
    // function deleteToCart(id) {

    //   $.post('../ajax/api-product.php', {
    //     'action': 'delete',
    //     'id': id
    //   }, function(data) {
    //     location.reload()
    //   })
    // }
  </script>
</body>

</html>