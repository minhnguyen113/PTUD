<?php
include_once("model/mThuongHieu.php");
class cloaisanpham
{
    public function getAllloaisanpham()
    {
        $p = new mloaisanpham();
        $tbl = $p->selectAllloaisanpham();
        if (mysqli_num_rows($tbl)) {
            return $tbl;
        } else {
            return false;
        }
    }

    public function get01loaisanpham($math)
    {
        $p = new mloaisanpham();
        $tbl = $p->select01loaisanpham($math);
        if (mysqli_num_rows($tbl)) {
            return $tbl;
        } else {
            return false;
        }
    }
    public function uploadloaisanpham($maTH, $tenTH, $diaChi, $website, $dienThoai)
    {
        $p = new mloaisanpham();
        $kq = $p->updateTH($maTH, $tenTH, $diaChi, $website, $dienThoai);
        return $kq;
    }

    public function themLoaiSanPham($tenLSP, $diaChi, $Website, $dienThoai)
    {
        $p = new mloaisanpham();
        $ar = array();
        $r = $this->getAllloaisanpham();
        foreach($r as $i){
            $ar[] = $i['tenlsp'];
        }
        if(in_array($tenLSP,$ar)){
            echo "<script>alert('Tên thương hiệu đã tồn tại')</script>";
            header("refresh:0;url='admin.php?action=xemnd'");
        }else{
            $kq = $p->themLSP($tenLSP, $diaChi, $Website, $dienThoai);
            return $kq;
        }
    }
    public function xoaLoaiSanPham($malsp)
    {
        $p = new mloaisanpham();
        if($malsp !=1 ||$malsp !=2 ||$malsp !=3 ||$malsp !=4||$malsp !=5){
            $con = $p->xoaloaiSanPham1($malsp);
            return $con;
        }else{
            echo "<script>alert('Bạn không thể xóa tài khoản đang đăng nhập')</script>";
            header("refresh:0;url='admin.php?action=xemnd'");
        }
        
    }
}
