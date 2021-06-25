<?php
require_once ('../../database/DBHelper.php');
require_once ('../../database/utility.php');

$user= authenToken(array("ADMIN", "USER"));
$username = $fullname = $email = $password = $address = '';

if (!empty($_POST)) {
	$username = getPOST('username');
	$password = getPOST('password');
	$password = md5Security($password);

	$sql    = "select * from users where username = '$username' and password = '$password'";
	$result = executeResult($sql);
	if ($result != null && count($result) > 0) {
		//login success
		$email = $result[0]['email'];
		$username = $result[0]['username'];
		$role = $result[0]['role'];
		$id    = $result[0]['id'];
		$token = md5Security($username.time().$id);

		// setcookie('status', 'login', time()+7*24*60*60, '/');
		setcookie('token', $token, time()+24*60*60, '/');

		// save database
		$sql = "insert into login_tokens (id_user, token) values ('$id', '$token')";
		execute($sql);

		header('Location: ../home');
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
    <section class="signin ">
        <div class="container">
            <div class="signin-left">
                <div class="sign-title">
                    <h1>Đăng nhập</h1>
                </div>
            </div>
            <div class="signin-right " id="a-sign">
                <form method="post">
                    <div class="username form-control1 form-group">
                        <input type="text" id="username" name="username" placeholder="Tên đăng nhập">
                    </div>
                    <div class="password form-control1 form-group">
                        <input type="password" id="password" name="password" placeholder="Mật khẩu">
                        <!-- <div class="error" style="position: absolute; bottom: 0;background: #fff; padding:10px; border:1px solid #ccc; color: red">Please fill out this field </div> -->
                    </div>
                 
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="../">Privacy Policy</a> and <a href="../">Terms of Service</a> apply.</div>
                    
                    <div class="submit">
                      <input class="btn" type="submit"  value="Đăng Nhập">
                        <div class="forgetpassword">
                            <p id="quenmk">Quên mật khẩu?</p> hoặc 
                            <a href="../signup">Đăng kí</a>
                      </div>
                       
                    </div>
                    
                </form>
            </div>
            <div class="signin-right " id="b-sign">
                <form action="">
                    <div class="username form-control1 ">
                       <h2>Phục hồi mật khẩu</h2>
                    </div>
                    <div class="password form-control1">
                        <input type="text" id="password" placeholder="Mật khẩu">
                    </div>
                 
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="../">Privacy Policy</a> and <a href="../">Terms of Service</a> apply.</div>
                    <div class="submit">
                      <input class="btn" type="submit" value="Gửi">
                      <div class="forgetpassword">
                            <a href="../" id="huy">Hủy</a>
                      </div>
                       
                    </div>
                    
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
  <script src="../assets/js/sign.js"></script>
</body>

</html>