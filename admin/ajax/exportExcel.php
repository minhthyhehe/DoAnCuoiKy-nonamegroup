<?php
if(!empty($_POST)) {
    require_once ('../../database/DBHelper.php');
    require_once ('../../database/utility.php');
    require_once ("../assets/PHPExcel-1.8/Classes/PHPExcel.php");

    $action = getPost('action');
    $id = getPost('id');

    switch ($action) {
        case 'exportOrderList':
            exportOrderList($id);
            break;
        
    }
}

function exportOrderList($id) {
    $sql          = 'select * from orders where created_by = '.$id;
    $orderList = executeResult($sql);
    //Khởi tạo đối tượng
    $excel = new PHPExcel();
    //Chọn trang cần ghi (là số từ 0->n)
    $excel->setActiveSheetIndex(0);
    //Tạo tiêu đề cho trang. (có thể không cần)
    $excel->getActiveSheet()->setTitle('danh_sach_don_hang');

    //Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);

    //Xét in đậm cho khoảng cột
    $excel->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);
    //Tạo tiêu đề cho từng cột
    //Vị trí có dạng như sau:
    /**
     * |A1|B1|C1|..|n1|
     * |A2|B2|C2|..|n1|
     * |..|..|..|..|..|
     * |An|Bn|Cn|..|nn|
     */
    $excel->getActiveSheet()->setCellValue('A1', 'STT');
    $excel->getActiveSheet()->setCellValue('B1', 'Mã đơn');
    $excel->getActiveSheet()->setCellValue('C1', 'Email');
    $excel->getActiveSheet()->setCellValue('D1', 'Địa chỉ');
    $excel->getActiveSheet()->setCellValue('E1', 'Tổng tiền (VNĐ)');
    $excel->getActiveSheet()->setCellValue('F1', 'Ghi chú');
    $excel->getActiveSheet()->setCellValue('G1', 'Ngày tạo');

    // thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
    // dòng bắt đầu = 2
    $numRow = 2;
    $index = 0;
    foreach ($orderList as $row) {
        $excel->getActiveSheet()->setCellValue('A' . $numRow, ++$index);
        $excel->getActiveSheet()->setCellValue('B' . $numRow, $row['id']);
        $excel->getActiveSheet()->setCellValue('C' . $numRow, $row['email']);
        $excel->getActiveSheet()->setCellValue('D' . $numRow, $row['address']);
        $excel->getActiveSheet()->setCellValue('E' . $numRow, $row['total']);
        $excel->getActiveSheet()->setCellValue('F' . $numRow, $row['note']);
        $excel->getActiveSheet()->setCellValue('G' . $numRow, $row['order_date']);
        $numRow++;
    }
    // Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
    // ở đây mình lưu file dưới dạng excel2007
    PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('danh_sach_don_hang.xlsx');
    
// 
// return PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
}
