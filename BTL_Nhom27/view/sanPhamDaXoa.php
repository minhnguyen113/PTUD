<!-- sanPhamDaXoa.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm đã xóa tạm thời</title>
</head>
<body>
    <h2>Danh sách sản phẩm đã xóa tạm thời</h2>
    <?php
    include_once("controller/cSanPham.php");
    $p = new cSanPham();
    $listSanPhamDaXoa = $p->getAllSanPhamDaXoa();
    if (isset($listSanPhamDaXoa)) {
        echo '<table id="customers">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Mã SP</th>';
        echo '<th>Tên SP</th>';
        echo '<th>Giá Gốc</th>';
        echo '<th>Giá Bán</th>';
        echo '<th>Hình Ảnh</th>';
        echo '<th>Thương Hiệu</th>';
        echo '<th>Thao tác</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($listSanPhamDaXoa as $sanpham) {
            echo '<tr>';
            echo '<td>'.$sanpham["masp"].'</td>';
            echo '<td>'.$sanpham["tensp"].'</td>';
            echo '<td>'.number_format($sanpham["giagoc"], 0, ",", ".").' VNĐ</td>';
            echo '<td>'.number_format($sanpham["giaban"] ?? $sanpham["giagoc"], 0, ",", ".").' VNĐ</td>';
            echo '<td><img src="image/'.$sanpham["hinhanh"].'" width="100px"></td>';
            echo '<td>'.$sanpham["tenlsp"].'</td>';
            echo '<td><a href="?action=kpsp1&id='.$sanpham["masp"].'" onclick="return confirm(\'Bạn có chắc 
            muốn khôi phục sản phẩm hay không?\');">Khôi phục</a> <br> <br><a href="?action=xoaspvv&id='.$sanpham["masp"].'" 
            onclick="return confirm(\'Bạn có chắc muốn xóa vĩnh viễn sản phẩm hay không?\');">Xóa Vĩnh Viễn</a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>Không có sản phẩm nào đã xóa tạm thời hoặc có lỗi xảy ra trong quá trình lấy dữ liệu.</p>';
    }
    ?>
</body>
</html>
