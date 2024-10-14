<?php
include_once("ketnoi.php");
class mloaisanpham
{
    public function selectAllloaisanpham()
    {
        $p=new clsketnoi();
        $con=$p->MoKetNoi();
        $truyvan= "select*from loaisanpham";
        $tbl = mysqli_query($con,$truyvan);
        $p->DongKetNoi($con);
        return $tbl;
    }

    public function select01loaisanpham($malsp)
    {
        $p=new clsketnoi();
        $con=$p->MoKetNoi();
        $truyvan= "select * from loaisanpham where malsp='$malsp'";
        $tbl = mysqli_query($con,$truyvan);
        $p->DongKetNoi($con);
        return $tbl;
    }

    public function updateTH($malsp,$tenlsp,$diachi,$website,$dienthoai){
        $p=new clsKetNoi();
        $query="update loaisanpham set tenlsp=N'$tenlsp',diachi=$diachi,Website='$website', dienthoai='$dienthoai' where malsp=$malsp";
        $con=$p->MoKetNoi();
        $kq=mysqli_query($con,$query);
        $p->DongKetNoi($con);
        return $kq;
        
    }

    public function themLSP($tenLSP,$diaChi,$Website,$dienthoai){
        $p=new clsKetNoi();
        $query="insert into loaisanpham (tenlsp, diachi, Website, dienthoai) Values (N'$tenLSP', '$diaChi', '$Website', '$dienthoai')" ;
        $con=$p->MoKetNoi();
        $kq=mysqli_query($con,$query);
        $p->DongKetNoi($con);
        return $kq;
    }

    public function xoaLoaiSanPham1($malsp)
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();
        if ($con) {
            $str = "delete from loaisanpham where malsp='$malsp'";
            $kq = mysqli_query($con,$str);
            $p->Dongketnoi($con);
            return $kq;
        } else {
            return false;
        }
    }
}
?>