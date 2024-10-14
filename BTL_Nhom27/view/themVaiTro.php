<?php
    if($_SESSION['dn'] == 1){
        $_REQUEST["action"];
    }else{
        echo "<script>alert('Bạn không có quyền truy cập!')</script>";
        header("refresh:0; url='admin.php'");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Vai Trò</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table border="1" width=400 height=100 id="customers">
        <tbody>
        <tr>
            <td align='center'>Tên Vai Trò</td>
            <td align='center'><input type="text" name="txtname" id="txtname" require></td>
        </tr>
        <tr>
            <td align='center'>Mô Tả</td>
            <td align='center'><input type="text" name="txtmt" id="txtmt"></td>
        </tr>
        <tr>
            <td align='center' colspan="2">
                <input type="submit" name="btn-them" id="btn-them" value="Thêm mới">
        </tr>
        </tbody>
    </table>
    </form>
    <?php
        if(isset($_REQUEST['btn-them'])){
            include_once("controller/cVaiTro.php");
            $p = new cVT();
            $kq=$p->cInsertVT($_REQUEST['txtname'],$_REQUEST['txtmt']);
            if($kq){
                echo "<script>alert('Thêm vai trò thành công!')</script>";
                header("refresh:0; url='admin.php?action=themvt'");
                
            } else{
                echo "<script>alert('Thêm vai trò thất bại!')</script>";
                header("refresh:0; url='admin.php?action=themvt'");
            }
            header("refresh:0; url='admin.php?action=themvt'");
        }
    ?>
</body>
</html>