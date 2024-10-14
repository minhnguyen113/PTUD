<?php
include_once("ketnoi.php");
class mNguoiDung
{
    public function selectAllNguoiDung()
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $truyvan = "select * from user u join vaitro v on u.IDRole = v.IDRole";
        $tbl = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $tbl;
    }
    public function select1NguoiDung($tk, $mk)
    {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        $query = "select * from user where username='$tk' and password='$mk'";
        $kq = mysqli_query($con, $query);
        $p->dongKetNoi($con);
        return $kq;
    }
    public function select2NguoiDung($Iduser)
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();
        $truyvan = "select * from user u join vaitro v on u.idrole = v.idrole where u.iduser='$Iduser'";
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }

    public function mUpdateUser($Iduser, $username, $Password, $Fullname, $Idrole)
    {
        $p = new clsKetNoi();
        $truyvan = "update user set username='$username', password='$Password',fullname='$Fullname',idrole='$Idrole' where iduser =$Iduser";
        $con = $p->MoKetNoi();
        $kq = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function mInsertUser($Username, $Password, $Idrole, $Fullname)
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();
        // Check xem đã có tài khoản đã tồn tại chưa
        $checktruyvan = "select * from user where username='$Username'";
        $checkResult = mysqli_query($con, $checktruyvan);
        if (mysqli_num_rows($checkResult) > 0) {
            $p->DongKetNoi($con);
            return "tai khoan da ton tai";
        } else {
            $truyvan = "insert into user(username, password, idrole, fullname) values('$Username', '$Password', $Idrole, '$Fullname')";
            $con = $p->MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p->DongKetNoi($con);
            return $kq;
            
        }
    }

    public function mDeleteUser($Iduser)
    {
        $p = new clsKetNoi();
        $truyvan = "delete from user where iduser='$Iduser'";
        $con = $p->MoKetNoi();
        $kq = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $kq;
    }
}
