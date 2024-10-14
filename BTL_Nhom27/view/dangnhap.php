<form action="" method="post">
        <table align="center">
        <caption><h2>Đăng Nhập</h2></caption>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn-dn" value="Đăng nhập">
                <input type="reset" value="Hủy">
        </td>
        </tr>
    </table>

</form>
<?php
if(isset($_REQUEST["btn-dn"])){
    include_once("controller/cNguoiDung.php");
    $p=new cNguoiDung();
    $p->get1NguoiDung($_REQUEST["username"],$_REQUEST["pass"]);}
?>