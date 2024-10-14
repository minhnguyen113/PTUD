<?php
$idrole=$_REQUEST["id"];
include_once "controller/cVaiTro.php";
$p = new cVT();
$kq = $p->cDeleteVT($idrole);
if ($kq) {
    echo "<script>alert('Xóa vai trò thành Công');</script>";
    header("refest:0;url='admin.php?action=xemvt'");
} else {
    echo "<script>alert('Vai trò đang tồn tại bên người dùng')</script>";
    header("refest:0;url='admin.php?action=xemvt'");
}
