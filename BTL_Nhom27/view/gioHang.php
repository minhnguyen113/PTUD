<?php
session_start();

if(isset($_POST['dathang'])) {
    // Kiểm tra nếu session giỏ hàng chưa tồn tại, thì khởi tạo một mảng trống
    if(!isset($_SESSION['giohang'])) {
        $_SESSION['giohang'] = array();
    }

    // Lấy thông tin sản phẩm từ form
    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];

    // Tạo một mảng chứa thông tin sản phẩm
    $item = array(
        'masp' => $masp,
        'tensp' => $tensp,
        'gia' => $gia,
        'soluong' => $soluong
    );

    // Thêm sản phẩm vào giỏ hàng (mảng session)
    array_push($_SESSION['giohang'], $item);

    // Hiển thị thông tin giỏ hàng
    echo '<h2>Giỏ hàng của bạn</h2>';
    echo '<table>';
    echo '<tr><th>Mã SP</th><th>Tên SP</th><th>Đơn giá</th><th>Số lượng</th><th>Thành tiền</th></tr>';
    
    $tongtien = 0;

    foreach($_SESSION['giohang'] as $item) {
        $thanhtien = $item['gia'] * $item['soluong'];
        $tongtien += $thanhtien;
        echo '<tr>';
        echo '<td>' . $item['masp'] . '</td>';
        echo '<td>' . $item['tensp'] . '</td>';
        echo '<td>' . number_format($item['gia'], 0, ",", ".") . ' VNĐ</td>';
        echo '<td>' . $item['soluong'] . '</td>';
        echo '<td>' . number_format($thanhtien, 0, ",", ".") . ' VNĐ</td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '<h3>Tổng tiền: ' . number_format($tongtien, 0, ",", ".") . ' VNĐ</h3>';
} else {
    echo '<p>Không có sản phẩm nào trong giỏ hàng của bạn.</p>';
}
?>
