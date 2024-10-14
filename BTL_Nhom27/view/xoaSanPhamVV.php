<?php
$masp=$_REQUEST["id"];
include_once "controller/cSanPham.php";
$p = new cSanPham();
$kq = $p->xoaSanPhamVV($masp);
if ($kq) {
    echo "<script>alert('Xóa sp Thành Công')</script>";
    header("refresh:0;url='admin.php?action=kpsp'");
} else {
    echo "<script>alert('Xóa sp thất bại')</script>";
    header("refresh:0;url='admin.php?action=kpsp'");
}