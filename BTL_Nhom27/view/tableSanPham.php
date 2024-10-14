<?php
include_once("controller/cSanPham.php");
$p = new cSanPham();
if (isset($_GET["btn-search"])) {
    $tblSP = $p->searchSP($_GET["txt-search"]);
} else {
    $kq = $p->getAllSanPham();
}

if ($kq && is_array($kq)) { // Kiểm tra $kq là một mảng
    echo '<table id="customers">';
    echo '<center><h2>Quản lý loại sản phẩm</h2></center>';
    echo '<tbody><tr>';
    echo '<th>Mã SP</th>
        <th>Tên SP</th>
        <th>Giá Gốc</th>
        <th>Giá Bán</th>
        <th>Hình Ảnh</th>
        <th>Thương Hiệu</th>
        <th>Hành động</th>';
    echo '</tr>';
    foreach ($kq as $r) { // Duyệt mảng $kq để lấy từng dòng dữ liệu
        echo '<tr>';
        echo '<td>'.$r["masp"].'</td>';
        echo '<td>'.$r["tensp"].'</td>';
        echo '<td>'.number_format($r["giagoc"], 0, ",", ".").' VNĐ</td>';
        echo '<td>'.number_format($r["giaban"] ?? $r["giagoc"], 0, ",", ".").' VNĐ</td>'; // Sử dụng giá bán nếu có, nếu không thì sử dụng giá gốc
        echo '<td>'."<img src='image/".$r["hinhanh"]."' width='100px'>".'</td>';
        echo '<td>'.$r["tenlsp"].'</td>'; // Sửa lại tên cột thành "tenlsp"
        echo '<td><a href="?action=suasp&id='.$r["masp"].'">Sửa</a> | <a href="?action=xoasp&id='.$r["masp"].'" onclick="return confirm(\'Bạn có chắc muốn xóa sản phẩm hay không?\');">Xóa</a></td>';
        echo '</tr>';
    }
    echo '<tbody></table>';
} else {
    echo "Không có sản phẩm nào để hiển thị.";
}
?>
