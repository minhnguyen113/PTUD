<?php
$masp = $_REQUEST["id"];
include_once "controller/cSanPham.php";
$p = new cSanPham();
$kq = $p->khoiPhucSanPham($masp);
if ($kq) {
    echo "<script>alert('Đã khôi phục')</script>";
    header("refresh:0;url='admin.php?action=kpsp'");
} else {
    echo "<script>alert('Khôi phục thất bại')</script>";
    header("refresh:0;url='admin.php?action=kpsp'");
}
?>
