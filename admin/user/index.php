<?php
require_once ('../../database/DBHelper.php');
require_once ('../common/utility.php');

$active_page = "user";
$limit = 10;
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
    $addSql = ' where fullname like "%'.$_GET['search'].'%" ';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quản Lý Người Dùng</title>
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
                                    <h2 class="text-center">Quản Lý Người Dùng</h2>
                                </div>
                                <!-- <div class="panel-body"> -->
                                <div class="row">
                                        <div class="col-sm-6">
                                            <a href="add.php">
                                                <button class="btn btn-success" style="margin-bottom: 15px;">Thêm tài khoản</button>
                                            </a>
                                        </div>
                                        <div class="col-sm-5">
                                            <form method="get">
                                                <div class="md-form mt-0" style="width = 200px; float: right;">
                                                    <input class="form-control" type="text" id="search" name="search" placeholder="Tìm kiếm" value=<?=$search?>>
                                                </div>
                                            </form>
                                        </div>
                                        <div>
                                            <form method="get" id="formLimit" >
                                                <select name="limit" id="limit"   onchange="onSelectChange()" class="browser-default custom-select" style="float: right;">
                                                    <option value="10" <?php if($limit == 10) { echo 'selected'; } ?>>10</option>
                                                    <option value="25" <?php if($limit == 25) { echo 'selected'; } ?>>25</option>
                                                    <option value="50" <?php if($limit == 50) { echo 'selected'; } ?>>50</option>
                                                </select>
                                            </form>
                                            
                                        </div>
                                   
                                    </div>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="50px">STT</th>
                                                <th>Tên tài khoản</th>
                                                <th>Họ và tên</th>
                                                <th>Email</th>
                                                <th>Địa chỉ</th>
                                                <th>Quyền hạn</th>
                                                <th width="50px"></th>
                                                <th width="50px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //Lay danh sach danh muc tu database
                                            $sql          = 'select * from users '.$addSql.' limit '.$fisrtIndex.',
                                            '.$limit;
                                            
                                            $userList = executeResult($sql);

                                            $count = executeSingleResult("select count(id) as total from users ".$addSql);
                                            $total = $count['total'];
                                            $number = ceil($total/$limit);
                                            // $index = 1;
                                            foreach ($userList as $item) {
                                                $role = "Quản trị viên";
                                                if ($item['role'] == "USER") {
                                                    $role = "Người dùng";
                                                }

                                                echo '<tr>
                                                        <td>'.(++$fisrtIndex).'</td>
                                                        <td>'.$item['username'].'</td>
                                                        <td>'.$item['fullname'].'</td>
                                                        <td>'.$item['email'].'</td>
                                                        <td>'.$item['address'].'</td>
                                                        <td>'.$role.'</td>';
                                                        if($item['id'] == $authen['id']) {
                                                            echo '<td>
                                                        </td>
                                                        <td>
                                                        </td>
                                                    </tr>';
                                                        } else {
                                                            echo'
                                                    <td>
                                                        <a href="add.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger" onclick="deleteUser('.$item['id'].')">Xoá</button>
                                                    </td>
                                                </tr>';
                                                        }
                                                
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                     <!-- Begin Pagination -->
                                     <?=pagination($number, $page, $limit, '&search='.$search)?>
                                    <!-- End Pagination -->
                                <!-- </div> -->
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


    <script type="text/javascript">
        function deleteUser(id) {
            var option = confirm('Bạn có chắc chắn muốn xoá tài khoản này không?')
            if(!option) {
                return;
            }
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {
                    'id': id,
                    'action': 'delete'
                },
                success: function (data) {
                    location.reload()
                },
                error: function (e) {
                    console.log(e.message);
                }
            });
        }
        function onSelectChange(){
            document.getElementById('formLimit').submit();
        }
    </script>

</body>
</html>