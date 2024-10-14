<?php
$malsp=$_REQUEST["id"];
include_once "controller/cThuongHieu.php";
$p = new cloaisanpham();
$kq = $p->xoaLoaiSanPham($malsp);
if ($kq) {
    echo "<script>alert('Xóa thương hiệu thành Công');</script>";
    header("refest:0;url='admin.php?action=xemvt'");
} else {
    echo "<script>alert('thương hiệu đang tồn tại bên bên sản phẩm')</script>";
    header("refest:0;url='admin.php?action=xemvt'");
}
