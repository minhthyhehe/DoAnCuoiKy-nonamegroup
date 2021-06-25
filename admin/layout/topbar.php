<?php
require_once ('../../database/DBHelper.php');
require_once ('../../database/utility.php');

$authen = authenToken(array("ADMIN"));
if ($authen == null) {
    header('Location: ../signin');
    die();
}
?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               
                <?php
                    $id_user = $authen['id'];
                    $getImages          = executeResult("select images.* from images where  id_user = ".$id_user." and type = 4");
                    $url_img ='';

                    if(!empty($getImages)) {
                        $url_img = $getImages[0]['url'];
                    }
                    echo '
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$authen['fullname'].'</span>
                        <img class="img-profile rounded-circle" src=../'.$url_img.'>
                    ';
                ?>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../profile?id=<?=$authen["id"]?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Thông tin
                </a>
                <!-- <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a> -->
                <!-- <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout" >
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng xuất
                </a>
                
            </div>
        </li>

    </ul>

</nav>