<?php
$masp = $_REQUEST["id"];
include_once("controller/cSanPham.php");
$p = new cSanPham();
$kq = $p->get01SanPham($masp);
if ($kq) {
    while ($r = mysqli_fetch_assoc($kq)) {
        $tensp = $r["tensp"];
        $giagoc = $r["giagoc"];
        $giaban = $r["giaban"];
        $hinhanh = $r["hinhanh"];
        $thuonghieu = $r["tenlsp"];
    }
} else {
    echo "<script>alert('Ma San pham khong ton tai')</script>";
    header("refresh:0;url=admin.php?type=sanpham");
}
?>
<form method='post' enctype='multipart/form-data'>
    <table>
        <tr>
            <td>Tên sản phẩm</td>
            <td>
                <input type="text" name="TenSP" value="<?php if (isset($tensp)) echo $tensp; ?>">
            </td>
        </tr>
        <tr>
            <td>Giá gốc</td>
            <td>
                <input type="text" name="GiaGoc" value="<?php if (isset($giagoc)) echo $giagoc; ?>">
            </td>
        </tr>
        <tr>
            <td>Giá bán</td>
            <td>
                <input type="text" name="GiaBan" value="<?php if (isset($giaban)) echo $giaban; ?>">
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="mfile" value="">
                <img src='image/<?php if (isset($hinhanh)) echo $hinhanh; ?>' width='100px'>
            </td>
        </tr>
        <tr>
            <td>Thương hiệu</td>
            <td>
                <?php
                include_once("controller/cThuongHieu.php");
                $q = new cloaisanpham();
                $kq = $q->getAllloaisanpham();
                if ($kq) {
                    echo '<select name="ThuongHieu">';
                    while ($r = mysqli_fetch_assoc($kq)) {
                        if ($r["tenlsp"] == $thuonghieu)
                            echo '<option value="' . $r["malsp"] . '" selected>' . $r["tenlsp"] . '</option>';
                        else
                            echo '<option value="' . $r["malsp"] . '">' . $r["tenlsp"] . '</option>';
                    }
                    echo '</select>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="btn-up" value="Cập nhật">
                <input type="reset" name="reset" value="Hủy">
            </td>
        </tr>
    </table>
</form>
<?php
if (isset($_REQUEST["btn-up"])) {
    // Lấy dữ liệu từ form
    $tenSP = $_REQUEST["TenSP"];
    $giaGoc = $_REQUEST["GiaGoc"];
    $giaBan = $_REQUEST["GiaBan"];
    $kq = $p->uploadSanPham($masp, $tenSP, $giaGoc, $giaBan, $_FILES["mfile"], 
    $hinhanh, $_REQUEST["ThuongHieu"]);
    if ($kq) {
        echo "<script>alert('Upload thành công')</script>";
    } else {
        echo "<script>alert('Upload thất bại')</script>";
    }
}


?>