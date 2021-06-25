<?php
require_once ('../../database/DBHelper.php');
require_once ('../../database/utility.php');

$user= authenToken(array("ADMIN"));
if ($user != null) {
    header('Location: ../category');
    die();
}
$username = $fullname = $email = $password = $address = '';
if (!empty($_POST)) {
	$username = getPOST('username');
	$password = getPOST('password');
	$password = md5Security($password);
	
	$sql    = "select * from users where username = '$username' and password = '$password'";
	$result = executeResult($sql);
	if ($result != null && count($result) > 0 && $result[0]['role'] == "ADMIN") {
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

		header('Location: ../index.php');
		die();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyShop- Login</title>

    <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/default.css" rel="stylesheet">

</head>

<body class="bg-custom-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-6">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username" placeholder="Tên đăng nhập...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Mật khẩu">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <!-- <a href="" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->
                                        <button class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                                    </form>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/js/default.js"></script>

</body>

</html>