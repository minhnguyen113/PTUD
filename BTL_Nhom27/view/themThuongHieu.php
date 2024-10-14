<?php
include_once("controller/cThuongHieu.php");
$p = new cloaisanpham();
?>
<form method='post' enctype='multipart/form-data'>
    <table>
        <tr>
            <td>Tên Thương Hiệu</td>
            <td>
                <input ize="43px" type="text" name="TenLSP" require>
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <input ize="43px" type="text" name="DiaChi" require>
            </td>
        </tr>
        <tr>
            <td>Website</td>
            <td>
                <input ize="43px" type="text" name="Website">
            </td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td>
                <input type="text" name="DienThoai" require>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <center>
                    <input type="submit" name="btn_them" value="Thêm loại sản phẩm">
                    <input type="reset" name="reset" value="Hủy">
                </center>
            </td>
        </tr>
    </table>
</form>
<?php
if (isset($_REQUEST["btn_them"])) {
    $kq = $p->themLoaiSanPham($_REQUEST["TenLSP"], $_REQUEST["DiaChi"], $_REQUEST["Website"], $_REQUEST["DienThoai"]);
    if ($kq) {
        echo "<script>alert('Thêm sản phẩm thành công')</script>";
    } else {
        echo "<script>alert('Thêm thất bại')</script>";
    }
}
?>