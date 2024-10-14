<?php
    if($_SESSION['dn'] == 1){
        $Idrole = $_REQUEST["id"];
        include_once("controller/cVaiTro.php");
        $p = new cVT();
        $sp = $p->get1VT($Idrole);
        if($sp){
            while($r = mysqli_fetch_assoc($sp)){
                $rolename = $r["TenVT"];
                $mota= $r["MoTa"];
            }
        } else {
            echo "<script>alert('Ma vai tro khong ton tai!')</script>";
            header("refresh: 0; url='admin.php?vaitro'");
        }
    }else{
        echo "<script>alert('Bạn không có quyền truy cập!')</script>";
        header("refresh:0; url='admin.php?'");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa vai trò</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table border="1" width=400 height=100>
        <tbody>
        <tr>
            <td>Tên Vai Trò</td>
            <td><input type="text" name="txtname" id="txtname" value="<?php if(isset($rolename)) echo $rolename; ?>"></td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><input type="text" name="txtmt" id="txtmt" value="<?php if(isset($mota)) echo $mota; ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="btn-sua" id="btn-sua" value="Cập nhật">
        </tr>
        </tbody>
    </table>
    </form>
    <?php
        if(isset($_REQUEST['btn-sua'])){
            $kq=$p->cUpdateVT($Idrole, $_REQUEST['txtname'],$_REQUEST['txtmt']);
            if($kq){
                echo "<script>alert('Sua thanh cong!')</script>";
                header("refresh:0; url='admin.php?action=xemvt'");
            } else{
                echo "<script>alert('Sua that bai!')</script>";
                header("refresh:0; url='admin.php?action=xemvt'");
            }
            header("refresh:0; url='admin.php?action=xemvt'");
        }
    ?>
</body>
</html>