<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<body>
    <form id="formdk" name="form1" method="post">
    <table width="450" border="1" align="center">
        <tbody>
        <tr>
            <td colspan="2" align="center">Thông tin Đăng Ký</td>
        </tr>
        <tr>
            <td width="125">Username</td>
            <td width="309"><p>
            <input type="text" name="txtuser" id="txtuser" require>
            </p></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><p>
            <input type="password" name="password" id="password" require>
            </p></td>
        </tr>
        <tr>
            <td>Fullname</td>
            <td><p>
            <input type="text" name="txtname" id="txtname" require>
            <input type="hidden" name="hiddenidrole" id="hiddenidrole" value="3">
            </p></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input name="btn-dk" type="submit" id="btn-dk" value="Đăng ký"></td>
        </tr>
        </tbody>
    </table>
    </form>
    <?php
        if(isset($_REQUEST['btn-dk'])){
            include_once("controller/cNguoiDung.php");
            $p = new cNguoiDung();
            $password = md5($_REQUEST['password']);
            $kq=$p->cInsertUser($_REQUEST['txtuser'], $password,$_REQUEST['hiddenidrole'], $_REQUEST['txtname']);
            if($kq){
                echo "<script>alert('Đăng ký thành công!')</script>";
            } else{
                echo "<script>alert('Đăng ký thất bại!')</script>";
            }
            header("refresh:0; url='index.php?dangnhap'");
        }
    ?>
</body>
</html>