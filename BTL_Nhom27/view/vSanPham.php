<?php
session_start();

include_once("controller/cSanPham.php");
$p = new cSanPham();
if (isset($_REQUEST["th"])) {
    $kq = $p->getAllSanPhamByType($_REQUEST["th"]);
} elseif (isset($_REQUEST["btnTimKiem"])) {
    $kq = $p->getAllSanPhamByName($_REQUEST["txtTuKhoa"]);
} else if (isset($_REQUEST["idct"])) {
    $tbl = $p->get01SanPham($_REQUEST["idct"]);
} else {
    $kq = $p->getAllSanPhamTrangChu();
}
if ($kq) {
    echo '<form method="post">';
    echo '<table id="customers">';
    echo '<tr>';
    $dem = 0;
    while ($r = mysqli_fetch_assoc($kq)) {
        echo "<td>";
        echo "<img src='image/" . $r["hinhanh"] . "' width='200px'><br>";
        echo "<a href='?ctsp&idct=" . $r['masp'] . "'>";
        echo "<h4 class='pro-name'>" . $r["tensp"] . "</h4>";
        if ($r["giagoc"] == 0) {
            $r["giagoc"] = $r["giaban"];
        }
        echo "<h4>" . number_format($r["giaban"], "0", ",", ".") . " VNĐ</h4>";
        if ($r["giaban"] != $r["giagoc"]) {
            echo "<h4><s>" . number_format($r["giagoc"], "0", ",", ".") . " VNĐ</s></h4>";
        }
        // echo '<center><input type="number" name="soluong" placeholder="số lượng" id=""></center>';
        // echo "<br><center><input type='submit' name='dathang' value='Đặt hàng'></center>";
        echo "<input type='hidden' name='masp' value='" . $r["masp"] . "'>"; // Thêm trường ẩn mã sản phẩm
        echo "<input type='hidden' name='tensp' value='" . $r["tensp"] . "'>"; // Thêm trường ẩn tên sản phẩm
        echo "<input type='hidden' name='gia' value='" . $r["giaban"] . "'>"; // Thêm trường ẩn giá sản phẩm
        echo '</td>';
        $dem++;
        if ($dem % 4 == 0) {
            echo "</tr><tr>";
        }
    }
    echo '</tr>';
    echo '</table>';
    echo '</form>'; // Kết thúc form sau khi đã thêm hết thông tin sản phẩm và nút Đặt hàng
}else{
    echo '<script>alert("không có sản phẩm cần tìm!")</script>';
    echo "<center><h1>Không có sản phẩm cần tìm</h1></center>";
}
?>
