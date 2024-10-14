<?php
$masp = $_REQUEST["id"];
include_once "controller/cSanPham.php";
$p = new cSanPham();
$kq = $p->xoaSanPham($masp);
if ($kq) {
    echo "<script>alert('Đã xóa sản phẩm')</script>";
    header("refresh:0;url='admin.php?action=xemsp'");
} else {
    echo "<script>alert('Xóa sản phẩm thất bại')</script>";
    header("refresh:0;url='admin.php?action=xemsp'");
}
?>
