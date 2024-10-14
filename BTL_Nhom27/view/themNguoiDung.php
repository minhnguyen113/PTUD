<?php
if ($_SESSION['dn'] == 1) {
    $_REQUEST["action"];
} else {
    echo "<script>alert('Bạn không đủ thẩm quyền truy cập!')</script>";
    header("refresh:0; url='../admin.php?'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table border="1" width=300 height=300 id="customers">
            <tbody>
                <tr>
                    <td align="center" width="150">Tên ND</td>
                    <td  width="250"><input type="text" name="txtusername" id="txtusername" require></td>
                </tr>
                <tr>
                    <td align="center">Mật Khẩu</td>
                    <td><input type="password" name="txtpass" id="txtpass" require></td>
                </tr>
                <tr>
                    <td align="center">Họ và Tên</td>
                    <td><input type="text" name="txtname" id="txtname" require></td>
                </tr>
                <tr>
                    <td align="center">Vai Trò</td>
                    <td>
                        <?php
                        include("Controller/cVaiTro.php");
                        $pt = new cVT();
                        $kq = $pt->getAllVT();
                        if (!$kq) {
                            echo "No Data!";
                        } else {
                            echo "<select name='cboVT'>";
                            while ($ro = mysqli_fetch_assoc($kq)) {
                                echo "<option value=" . $ro['idrole'] . ">" . $ro['TenVT'] . "</option>";
                            }
                            echo "</select>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center>
                            <input type="submit" name="btn-them" id="btn-them" value="Thêm Người Dùng">
                            <input type="submit" name="submit2" id="submit2" value="Nhập lại">
                        </center>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <?php
    if (isset($_REQUEST['btn-them'])) {
        include_once("controller/cNguoiDung.php");
        $p = new cNguoiDung();
        $password = md5($_REQUEST['txtpass']);
        

        $kq = $p->cInsertUser($_REQUEST['txtusername'], $password, $_REQUEST['cboVT'], $_REQUEST['txtname']);
        if ($kq) {
            echo "<script>alert('Thêm người dùng mới thành công!')</script>";
            header("refresh:0; url='admin.php?action=xemnd'");
        } else {
            echo "<script>alert('Thêm người dùng mới thất bại!')</script>";
        }
    }
    ?>
</body>

</html>