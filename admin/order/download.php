<?php
$file = "../ajax/danh_sach_don_hang.xlsx";
$type = filetype($file);
// Get a date and timestamp
$today = date("F j, Y, g:i a");
$time = time();
header("Content-type: $type");

//** If you think header("Content-type: $type"); is giving you some problems,
//** try header('Content-Type: application/octet-stream');

//** Note filename= --- if using $_GET to get the $file, it needs to be "sanitized".
//** I used the basename function to handle that... so it looks more like:
//** header('Content-Disposition: attachment; filename=' . basename($_GET['mygetvar']));

header("Content-Disposition: attachment;filename=danh_sach_don_hang.xlsx");
header("Content-Transfer-Encoding: binary"); 
header('Pragma: no-cache'); 
header('Expires: 0');
// Send the file contents.
set_time_limit(0);
ob_clean();
flush();
readfile($file);