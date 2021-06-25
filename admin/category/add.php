<?php
require_once ('../../database/DBHelper.php');
$active_page = "category";
$id = $name = '';
if (!empty($_POST)) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $name = str_replace('"', '\\"', $name);
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    if (!empty($name)) {
        //Luu vao database
        if ($id == '') {
            $created_at = $updated_at = date('Y-m-d H:s:i');
            $sql = 'insert into category(name, created_at, updated_at) values ("'.$name.'", "'.$created_at.'", "'.$updated_at.'")';
        } else {
            $updated_at = date('Y-m-d H:s:i');
            $sql = 'update category set name = "'.$name.'", updated_at = "'.$updated_at.'" where id = '.$id;
        }

        execute($sql);

        header('Location: index.php');
        die();
    }
}

if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'select * from category where id = '.$id;
    $category = executeSingleResult($sql);
    if ($category != null) {
        $name = $category['name'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm/Sửa Danh Mục</title>
    <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/default.css" rel="stylesheet">
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
            <div id="content">

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
                                    <h2 class="text-center">Thêm/Sửa Danh Mục</h2>
                                </div>
                                <div class="panel-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="name">Tên Danh Mục:</label>
                                            <input type="text" name="id" value="<?=$id?>" hidden="true">
                                            <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
                                        </div>
                                        <button class="btn btn-success">Lưu</button>
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
</body>
</html>