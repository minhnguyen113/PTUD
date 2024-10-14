<?php
$iduser=$_REQUEST["id"];
include_once "controller/cNguoiDung.php";
$p = new cNguoiDung();
$kq = $p->cDeleteUser($iduser);
if ($kq) {
    echo "<script>alert('Xóa nguoi dung thành Công');</script>";
    header("refest:0;url='admin.php?action=xemnd'");
} else {
    echo "<script>alert('Xóa nguoi dung thất bại')</script>";
}
?>
