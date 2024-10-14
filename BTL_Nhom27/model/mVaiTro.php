<?php
include_once("model/ketnoi.php");
class mVT
{
    public function selectAllVT()
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();
        if ($con) {
            $truyvan = "select * from vaitro";
            $tbl = mysqli_query($con, $truyvan);
            $p->DongKetNoi($con);
            return $tbl;
        } else {
            return false;
        }
    }
    public function select1VT($Idrole)
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();
        if ($con) {
            $truyvan = "select * from vaitro where idrole='$Idrole'";
            $tbl = mysqli_query($con, $truyvan);
            $p->DongKetNoi($con);
            return $tbl;
        } else {
            return false;
        }
    }
    
    public function mUpdateVT($Idrole, $Rolename, $mota){
        $p=new clsKetNoi();
        $truyvan="update vaitro set TenVT='$Rolename', MoTa='$mota' where idrole =$Idrole";
        $con=$p->MoKetNoi();
        $kq=mysqli_query($con,$truyvan);
        $p->DongKetNoi($con);
        return $kq;
   }
   public function mInsertVT($Rolename, $mota){
        $p = new clsKetNoi();
        $truyvan="insert into vaitro(TenVT, MoTa) values('$Rolename','$mota')";
        try {
            $con=$p->MoKetNoi();
            $kq=mysqli_query($con,$truyvan);
            $p->DongKetNoi($con);
            return $kq;
        }catch(Exception $e) {
            return false;
        }
   }
   public function mDeleteVT($Idrole){
        $p = new clsKetNoi();
        $truyvan = "delete from vaitro where idrole='$Idrole'";
        $con = $p->MoKetNoi();
        $kq = mysqli_query($con,$truyvan);
        $p->DongKetNoi($con);
        return $kq;
   }
}
