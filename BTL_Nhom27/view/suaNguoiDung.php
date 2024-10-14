<?php
    if($_SESSION['dn']){
        $Iduser = $_REQUEST["id"];
        include_once("controller/cNguoiDung.php");
        $p = new cNguoiDung();
        $sp = $p->get2NguoiDung($Iduser);
        if($sp){
            while($r = mysqli_fetch_assoc($sp)){
                $username = $r["username"];
                $password = $r["password"];
                $fullname = $r["fullname"];
                $rolename = $r["TenVT"];
            }
        } else {
            echo "<script>alert('Ma nguoi dung khong ton tai!')</script>";
            header("refresh: 0; url='admin.php?xemnd'");
        }
    }else{
        echo "<script>alert('Bạn không đủ thẩm quyền truy cập!')</script>";
        header("refresh:0; url='admin.php'");
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
    <table border="1" width=600 height=400>
        <tbody>
        <tr>
            <td width="150">Tên Người Dùng</td>
            <td width="250"><input type="text" name="txtusername" id="txtusername" value="<?php if(isset($username)) echo $username; ?>"></td>
        </tr>
        <tr>
            <td>Mật Khẩu</td>
            <td><input type="password" name="txtpass" id="txtpass" value="<?php if(isset($password)) echo $password; ?>"></td>
        </tr>
        <tr>
            <td>Họ và Tên</td>
            <td><input type="text" name="txtname" id="txtname" value="<?php if(isset($fullname)) echo $fullname; ?>"></td>
        </tr>
        <tr>
            <td>Vai Trò</td>  
            <td>
                <?php
                    include("controller/cVaiTro.php");
                    $pt = new cVT();
                    $kq = $pt->getAllVT();
                    if(!$kq){
                        echo "No Data!";
                    } else {
                        echo "<select name='cboVT'>";
                        while($ro = mysqli_fetch_assoc($kq)){
                            if($ro["idrole"]==2 || $ro["idrole"]==1){
                                
                            }else{
                                if($ro["TenVT"] == $rolename){
                                    echo "<option value=".$ro['idrole']." selected>".$ro['TenVT']."</option>";
                                } else{
                                    echo "<option value=".$ro['idrole'].">".$ro['TenVT']."</option>";
                                }   
                            }
                        }
                        echo "</select>";
                    }
                ?>
                </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="btn-sua" id="btn-sua" value="Cập nhật">
            <input type="submit" name="submit2" id="submit2" value="Nhập lại"></td>
        </tr>
        </tbody>
    </table>
    </form>
    <?php
        if(isset($_REQUEST['btn-sua'])){
            $kq=$p->cUpdateUser($Iduser, $_REQUEST['txtusername'], $_REQUEST['txtpass'], $_REQUEST['txtname'], $_REQUEST['cboVT']);
            if($kq){
                echo "<script>alert('Sua thanh cong!')</script>";
            } else{
                echo "<script>alert('Sua that bai!')</script>";
            }
            header("refresh:0; url='admin.php?xemnd'");
        }
    ?>
</body>
</html>