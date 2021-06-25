<?php
require_once ('../../database/DBHelper.php');
require_once ('../../database/utility.php');

$active_page = "product";
$id = $fullname = $username = $address = $password = $email = $avatar = '';

if (!empty($_POST)) {
    if (isset($_POST['fullname'])) {
        $fullname = $_POST['fullname'];
        $fullname = str_replace('"', '\\"', $fullname);
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $email = str_replace('"', '\\"', $email);
    }
    if (isset($_POST['username'])) {
      $username = $_POST['username'];
      $username = str_replace('"', '\\"', $username);
  }
    if (isset($_POST['address'])) {
      $address = $_POST['address'];
      $address = str_replace('"', '\\"', $address);
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $password = md5Security($password);
    }
    

    if (!empty($fullname)) {
        //Luu vao database
        $created_at = $updated_at = date('Y-m-d H:s:i');
        $sql = 'insert into users(fullname, email, username, password, address, created_at) values ("'.$fullname.'","'.$email.'", "'.$username.'", "'.$password.'", "'.$address.'", "'.$created_at.'")';
        $id_user = execute($sql);

        if (!empty($_FILES)) {
            if (!empty($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
                $type = 4;
                $time = date("d-m-Y")."-".time() ;
                $name_img = stripslashes($_FILES['avatar']['name']);
                $source_img = $_FILES['avatar']['tmp_name'];
                $path_img = "../../admin/storage/" . $time . $name_img;
                $storage_img = "storage/" . $time . $name_img;
                move_uploaded_file($source_img, $path_img);
                $created_at = date('Y-m-d H:s:i');
                $a = execute('insert into images(name, url, type, id_user, created_at) values ("'.$name_img.'", "'.$storage_img.'", "'.$type.'", "'.$id_user.'", "'.$created_at.'")');
            }
        }
        header('Location: ../signin');
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/plugins/animate/animate.min.css">
  <link rel="stylesheet" href="../assets/plugins/fontawesome/all.css">
  <link rel="stylesheet" href="../assets/plugins/webfonts/font.css">
  <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="../assets/plugins/uikit/uikit.min.css" />
  <link rel="stylesheet" href="../assets/css/sign.css">

  <title>Runner</title>

</head>

<body>

  <!-- Begin Topbar -->
  <?php include("../layout/topbar.php"); ?>
  <!-- End Topbar -->
 
 
  <!--Content-->
  <div class="content">
    <section class="signup">
        <div class="container">
            <div class="signin-left">
                <div class="sign-title">
                    <h1>Tạo tài khoản</h1>
                </div>
            </div>
            <div class="signin-right ">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Ảnh đại diện:</label>
                        <input type="file" name="avatar" onchange="previewAvatar(event);">
                        <!-- <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateThumbnail()"> -->
                        <img id="img_avatar" src="<?=$avatar?>" alt="" style="max-width: 200px;">
                    </div>
                    <div class="firstname form-control1 form-group">
                        <input type="text"  id="fullname" name="fullname" placeholder="Họ và tên">
                    </div>
                    <div class="lastname form-control1 form-group">
                        <input type="text" id="address" name="address" placeholder="Địa chỉ">
                    </div>
                   
                    <!-- <div class="birthday form-control1">
                        <input type="text" id="birthday" placeholder="mm/dd/yyyy">
                    </div> -->
                    <div class="email form-control1 form-group">
                        <input type="email" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="username form-control1 form-group">
                        <input type="text" id="username" name="username" placeholder="Tên đăng nhập">
                    </div>
                    <div class="password form-control1 form-group">
                        <input type="password" id="password" name="password" placeholder="Mật khẩu">
                    </div>
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="../">Privacy Policy</a> and <a href="../">Terms of Service</a> apply.</div>
                    <!-- <div class="submit">
                      <p>Đăng kí</p>
                       
                    </div> -->
                    <!-- <div class="submit">
                    <button class="btn ">Đăng kí</button> -->

                      <input class="btn btn-primary btn-user btn-block" type="submit"  value="Đăng kí">
                        <!-- <div class="forgetpassword">
                            <p id="quenmk">Quên mật khẩu?</p> hoặc 
                            <a href="../signup">Đăng kí</a>
                      </div> -->
                       
                    <!-- </div> -->

                    <!-- <div class="backto">
                      <a href="../"><i class="fa fa-long-arrow-alt-left"></i> Quay lại trang chủ</a>
                    </div> -->
                </form>
            </div>
        </div>
    </section>    
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
  </div>
 
  <script async defer crossorigin="anonymous" src="../assets/plugins/sdk.js"></script>
  <script src="../assets/plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="../assets/plugins/bootstrap/popper.min.js"></script>
  <script src="../assets/plugins/bootstrap/bootstrap.min.js"></script>
  <script src="../assets/plugins/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/js/home.js"></script>
  <script src="../assets/js/script.js"></script>
  <script src="../assets/plugins/uikit/uikit.min.js"></script>
  <script src="../assets/plugins/uikit/uikit-icons.min.js"></script>
  <script type="text/javascript">
    function previewAvatar(event) {
      $('#img_avatar').attr('src', URL.createObjectURL(event.target.files[0]));
    }
  </script>
</body>

</html>