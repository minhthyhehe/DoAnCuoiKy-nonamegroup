<?php
require_once ('../../database/DBHelper.php');
$active_page = "product";
$id = $name  = $content = $id_category = $price = $id_product = $thumbnail = $thumbnail1 = $thumbnail2 = '';

if (!empty($_POST)) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $name = str_replace('"', '\\"', $name);
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['thumbnail'])) {
        $thumbnail = $_POST['thumbnail'];
        $thumbnail = str_replace('"', '\\"', $thumbnail);
    }
    if (isset($_POST['content'])) {
        $content = $_POST['content'];
        $content = str_replace('"', '\\"', $content);
    }
    if (isset($_POST['id_category'])) {
        $id_category = $_POST['id_category'];
    }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
        $price = str_replace('"', '\\"', $price);
    }

    if (!empty($name)) {
        //Luu vao database
        if ($id == '') {
            $created_at = $updated_at = date('Y-m-d H:s:i');
            $sql = 'insert into product(name, price, content, thumbnail, id_category, created_at, updated_at) values ("'.$name.'","'.$price.'", "'.$content.'", "'.$thumbnail.'", "'.$id_category.'", "'.$created_at.'", "'.$updated_at.'")';
            $id_product = execute($sql);
        } else {
            $updated_at = date('Y-m-d H:s:i');
            $sql = 'update product set name = "'.$name.'", price = "'.$price.'", content = "'.$content.'", thumbnail = "'.$thumbnail.'", id_category = "'.$id_category.'", updated_at = "'.$updated_at.'" where id = '.$id;
            $id_product = execute($sql);
            $id_product = $id;
        }

        if (!empty($_FILES)) {
            if (!empty($_FILES['img_file'])) {
                $removedImages = json_decode($_POST['removed_files'], true);
                foreach ($_FILES['img_file']['name'] as $name => $value) {
                    if (in_array($value, $removedImages) || empty($_FILES['img_file']['name'][$name])) {
                        continue;
                    }
                    $time = date("d-m-Y")."-".time() ;
                    $name_img = stripslashes($_FILES['img_file']['name'][$name]);
                    $source_img = $_FILES['img_file']['tmp_name'][$name];
                    $path_img = "../storage/" . $time . $name_img;
                    $storage_img = "storage/" . $time . $name_img;
                    move_uploaded_file($source_img, $path_img);
                    $created_at = date('Y-m-d H:s:i');
                     execute('insert into images(name, url, id_product, created_at) values ("'.$name_img.'", "'.$storage_img.'", "'.$id_product.'", "'.$created_at.'")');
                }
            }
            if (!empty($_FILES['thumbnail1'])) {
                if (!empty($_FILES['thumbnail1']['name'])) {
                    if (!empty($id)) {
                        execute('delete from images where type = 2 and id_product = '.$id);
                    }
                    $type = 2;
                    $time = date("d-m-Y")."-".time() ;
                    $name_img = stripslashes($_FILES['thumbnail1']['name']);
                    $source_img = $_FILES['thumbnail1']['tmp_name'];
                    $path_img = "../storage/" . $time . $name_img;
                    $storage_img = "storage/" . $time . $name_img;
                    move_uploaded_file($source_img, $path_img);
                    $created_at = date('Y-m-d H:s:i');
                    execute('insert into images(name, url, type, id_product, created_at) values ("'.$name_img.'", "'.$storage_img.'", "'.$type.'", "'.$id_product.'", "'.$created_at.'")');
                }
                
            }
            if (!empty($_FILES['thumbnail2'])) {
                if (!empty($_FILES['thumbnail2']['name'])) {
                    if (!empty($id)) {
                        execute('delete from images where type = 3 and id_product = '.$id);
                    }
                    $type = 3;
                    $time = date("d-m-Y")."-".time() ;
                    $name_img = stripslashes($_FILES['thumbnail2']['name']);
                    $source_img = $_FILES['thumbnail2']['tmp_name'];
                    $path_img = "../storage/" . $time . $name_img;
                    $storage_img = "storage/" . $time . $name_img;
                    move_uploaded_file($source_img, $path_img);
                    $created_at = date('Y-m-d H:s:i');
                    execute('insert into images(name, url, type, id_product, created_at) values ("'.$name_img.'", "'.$storage_img.'", "'.$type.'", "'.$id_product.'", "'.$created_at.'")');
                }
            }
        }
        header('Location: index.php');
        die();
    }
}
// print($_FILES['img_file']);
//     die();
// if(!empty($_FILES['img_file'])) {
//     print($_FILES['img_file']);
//     die();

// }
// foreach($_FILES['img_file']['name'] as $name => $value){
//     $name_img = stripslashes($_FILES['img_file']['name'][$name]);
//     $source_img = $_FILES['img_file']['tmp_name'][$name];
//     $path_img = "upload/" . $name_img;
//     move_uploaded_file($source_img, $path_img);
// }

if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'select * from product where id = '.$id;
    $product = executeSingleResult($sql);

    if ($product != null) {
        $name = $product['name'];
        $price = $product['price'];
        $content = $product['content'];
        $id_category = $product['id_category'];
        $thumbnail     = executeResult('select * from images where type = 1 and id_product = '.$id );
        $thumbnail1     = executeResult('select * from images where type = 2 and id_product = '.$id );
        $thumbnail2     = executeResult('select * from images where type = 3 and id_product = '.$id );
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm/Sửa Sản Phẩm</title>
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
                                    <h2 class="text-center">Thêm/Sửa Sản Phẩm</h2>
                                </div>
                                <div class="panel-body">
                                    <form method="post" enctype="multipart/form-data" id="formUpload">
                                        <div class="form-group">
                                            <label for="name">Tên Sản Phẩm:</label>
                                            <input type="text" name="id" value="<?=$id?>" hidden="true">
                                            <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Chọn Danh Mục:</label>
                                            <select class="form-control" name="id_category" id="id_category">
                                                <option>-- Lựa chọn danh mục sản phẩm --</option>
                                                <?php
                                                    $sql          = 'select * from category';
                                                    $categoryList = executeResult($sql);
                                                    foreach ($categoryList as $item) {
                                                        if ($item['id'] == $id_category) {
                                                            echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
                                                        } else {
                                                            echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Giá Bán:</label>
                                            <input required="true" type="number" class="form-control" id="price" name="price" value="<?=$price?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Hình trưng bày 1:</label>
                                            <input type="file" name="thumbnail1"  onchange="previewThumbnail1(event);">
                                            <!-- <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateThumbnail()"> -->
                                            <img id="img_thumbnail1" src="../<?=$thumbnail1[0]['url']?>" alt="" style="max-width: 200px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Hình trưng bày 2:</label>
                                            <input type="file" name="thumbnail2" onchange="previewThumbnail2(event);">
                                            <!-- <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateThumbnail()"> -->
                                            <img id="img_thumbnail2" src="../<?=$thumbnail2[0]['url']?>" alt="" style="max-width: 200px;">
                                        </div>
                                        <div class="form-group" multiple="true">
                                            <label for="name">Hình chi tiết:</label>
                                            <input type="file" name="img_file[]" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
                                            <div class="box-preview-img">
                                                    <?php
                                                         foreach ($thumbnail as $item) {
                                                            echo '
                                                            <div>
                                                                <img id="img-0&quot;" src="../'.$item['url'].'" style="max-width: 100px;">
                                                                <button class=" btn-danger remove" onclick="deleteImage('.$item['id'].')">x</button>
                                                            </div>
                                                            ';
                                                        }
                                                    ?>
                                            </div>
                                            <!-- <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateThumbnail()"> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Miêu Tả Sản Phẩm:</label>
                                            <textarea class="form-control" rows="5" id="content" name="content"><?=$content?></textarea>
                                        </div>
                                        <input type="hidden" id="removed_files" name="removed_files" value="" />
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
    <script src="../assets/summernote-0.8.18/summernote-bs4.min.js"></script> 

    <script type="text/javascript">
        // xem hình ảnh trước khi upload
        window.newFileList = [];

        $(document).on('click', 'button.remove', function () {
            let remove_element = $(this);
            let id = remove_element.val();
            // remove_element.closest('.appendedImg').remove();
            let input = document.getElementById('img_file');
            let files = input.files;
            if (files.length) {
                if (typeof files[id] !== 'undefined') {
                window.newFileList.push(files[id].name)
                }
            }

            document.getElementById('removed_files').value = JSON.stringify(window.newFileList);
            $(this).parent().remove();
        });

        function previewImg(event) {
            let files = document.getElementById('img_file').files;
            // Show khung chứa hình nhìn thấy trước
            $('#formUpload .box-preview-img').show();
            // Thêm chữ "Xem trước" vào khung
            // $('#formUpload .box-preview-img').html('Xem trước');

            // sử dụng vòng lặp for để thêm các thẻ img vào khung chứa hình xem trước
            for (let i = 0; i < files.length; i++) {
                // $('#formUpload .box-preview-img').append("<div class='col-md-2 margin-top10 appendedImg'><img style='width: 100%; height: 130px; object-fit: cover;' src='" + URL.createObjectURL(event.target.files[i]) + "'><button class='btn btn-block btn-danger margin-top5 btnRemove' value='" + i + "'>Remove</button></div>");
                $('#formUpload .box-preview-img').append('<div><img id=img-'+ i +'" src =' + URL.createObjectURL(event.target.files[i]) +' style="max-width: 100px;"/><button  class=" btn-danger remove" value=' + i + '>x</a></button>');
            }
        }
        // Gán giá trị các file vào biến files
        // $(document).on("click", "a.remove" , function() {
        //     $(this).parent().remove();
        // });

        function previewThumbnail1(event) {
            $('#img_thumbnail1').attr('src', URL.createObjectURL(event.target.files[0]));
        }
        function previewThumbnail2(event) {
            $('#img_thumbnail2').attr('src', URL.createObjectURL(event.target.files[0]));
        }
        // function updateThumbnail() {
        //     $('#img_thumbnail').attr('src', $('#thumbnail').val());
        // }
        $(function() {
            $('#content').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
            });
        })

        function deleteImage(id) {
            console.log("asdfasdf ", id)
            // var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
            // if(!option) {
            //     return;
            // }
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {
                    'id': id,
                    'action': 'delete_img'
                },
                success: function (data) {
                    location.reload()
                },
                error: function (e) {
                    console.log(e.message);
                }
            });
        }
    </script>
</body>
</html>