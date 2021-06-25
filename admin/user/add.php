<?php
require_once ('../../database/DBHelper.php');
require_once ('../../database/utility.php');
$isRequireLogin = true;
$id = null;
$fullname = $username = $address = $password = $email = $avatar = $role = '';
if (!empty($_GET)) {
    $id = $_GET['id'];
  
    $sql      = 'select * from users where id = '.$id;
    $user = executeSingleResult($sql);
    if ($user != null) {
        $fullname = $user['fullname'];
        $email = $user['email'];
        $address = $user['address'];
        $password = $user['password'];
        $username = $user['username'];
        $role = $user['role'];
        // echo '<pre>$role<br />'; var_dump($role); echo '</pre>';
        // die();
    }
}
if (!empty($_POST)) {
    // echo '<pre>$_POST<br />'; var_dump($_POST); echo '</pre>';
    // die();
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
    if (isset($_POST['role'])) {
        $role = $_POST['role'];
        $role = str_replace('"', '\\"', $role);
      }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $password = md5Security($password);
    }
    if ($id && !empty($fullname)) {
       
        //Luu vao database
        $sql = 'update users set role = "'.$role.'", fullname = "'.$fullname.'", email = "'.$email.'", username = "'.$username.'", address = "'.$address.'" where id = '.$id;
        
        $a = execute($sql);
        
        if (!empty($_FILES)) {
            if (!empty($_FILES['avatar']['name'])) {
                execute('delete from images where type = 4 and id_user = '.$id);

                $type = 4;
                $time = date("d-m-Y")."-".time() ;
                $name_img = stripslashes($_FILES['avatar']['name']);
                $source_img = $_FILES['avatar']['tmp_name'];
                $path_img = "../storage/" . $time . $name_img;
                $storage_img = "storage/" . $time . $name_img;
                move_uploaded_file($source_img, $path_img);
                $created_at = date('Y-m-d H:s:i');
                $a = execute('insert into images(name, url, type, id_user, created_at) values ("'.$name_img.'", "'.$storage_img.'", "'.$type.'", "'.$id.'", "'.$created_at.'")');
            }
        }

        header('Location: index.php');
        die();
    } else if ($id ==null) {
        //Luu vao database
        $created_at = $updated_at = date('Y-m-d H:s:i');
        $sql = 'insert into users(fullname, email, username, password, address, role, created_at) values ("'.$fullname.'","'.$email.'", "'.$username.'", "'.$password.'", "'.$address.'", "'.$role.'", "'.$created_at.'")';
        $id_user = execute($sql);

        if (!empty($_FILES)) {
            if (!empty($_FILES['avatar'])) {
                $type = 4;
                $time = date("d-m-Y")."-".time() ;
                $name_img = stripslashes($_FILES['avatar']['name']);
                $source_img = $_FILES['avatar']['tmp_name'];
                $path_img = "../storage/" . $time . $name_img;
                $storage_img = "storage/" . $time . $name_img;
                move_uploaded_file($source_img, $path_img);
                $created_at = date('Y-m-d H:s:i');
                $a = execute('insert into images(name, url, type, id_user, created_at) values ("'.$name_img.'", "'.$storage_img.'", "'.$type.'", "'.$id_user.'", "'.$created_at.'")');
            }
        }
        header('Location: index.php');
        die();
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Thông tin cá nhân</title>
    <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/default.css" rel="stylesheet">
    <link href="../assets/summernote-0.8.18/summernote-bs4.min.css" rel="stylesheet">
   
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
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
            <div id="main_contain">

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
                                    <h2 class="text-center">Thông tin cá nhân</h2>
                                </div>
                                <div class="panel-body">
                                    <form method="post" enctype="multipart/form-data" id="formUpload">
                                        <?php
                                            $avatar ='';
                                            if (!empty($authen)) {
                                                $getImages          = executeSingleResult("select images.* from images where  id_user = ".$id." and type = 4");
                                                $avatar = $getImages['url'];
                                            }
                                        ?>
                                        <div class="form-group">
                                            <label for="name">Ảnh đại điện:</label>
                                            <input type="file" name="avatar"  onchange="previewAvatar(event);">
                                            <!-- <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateThumbnail()"> -->
                                            <img id="img_avatar" src="../<?=$avatar?>" alt="" style="max-width: 200px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Họ và tên:</label>
                                            <input type="text" name="id" value="<?=$id?>" hidden="true">
                                            <input required="true" type="text" class="form-control" id="fullname" name="fullname" value="<?=$fullname?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Chọn Danh Mục:</label>
                                            <select class="form-control" name="role" id="role">
                                                <option>-- Lựa chọn quyền hạn --</option>
                                                <option <?php if ($role == "ADMIN") {echo 'selected';}?> value="ADMIN">Quản trị viên</option>
                                                <option <?php if ($role == "USER") {echo 'selected';}?> value="USER">Người dùng</option>
                                            </select>
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
                                            <label for="name">Username:</label>
                                            <input required="true" type="text" class="form-control" id="username" name="username" value="<?=$username?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Password:</label>
                                            <input required="true" type="password" class="form-control" id="password" name="password" value="<?=$password?>">
                                        </div>
                                        
                                        <input type="hidden" id="removed_files" name="removed_files" value="" />
                                        <button class="btn btn-primary" >Lưu</button>
                                    </form>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
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
    <script src="../assets/summernote-0.8.18/summernote-bs4.min.js"></script> 

    <script type="text/javascript">
        // xem hình ảnh trước khi upload
        function previewAvatar(event) {
            $('#img_avatar').attr('src', URL.createObjectURL(event.target.files[0]));
        }
    </script>
</body>
</html>