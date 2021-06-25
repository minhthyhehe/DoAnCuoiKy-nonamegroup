<?php
foreach($_FILES['img_file']['name'] as $name => $value){
    $name_img = stripslashes($_FILES['img_file']['name'][$name]);
    $source_img = $_FILES['img_file']['tmp_name'][$name];
    $path_img = "upload/" . $name_img;
    move_uploaded_file($source_img, $path_img);
}
