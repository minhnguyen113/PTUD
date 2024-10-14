<?php
include_once("model/mSanPham.php");
include_once("upload.php");
class cSanPham
{
    public function getAllSanPham()
    {
        $mSanPham = new mSanPham();
        $result = $mSanPham->selectAllSanPham();
        return $result;
    }
    public function getAllSanPhamTrangChu()
    {
        $mSanPham = new mSanPham();
        $result = $mSanPham->selectAllSanPhamTrangChu();
        return $result;
    }
    public function khoiPhucSanPham($masp)
    {
        $mSanPham = new mSanPham();
        $kq = $mSanPham->khoiPhucSanPham($masp);
        return $kq;
    }
    // Trong file cSanPham.php
    public function getAllSanPhamDaXoa()
    {
        $p = new mSanPham();
        $listSanPhamDaXoa = $p->getAllSanPhamDaXoa1();
        return $listSanPhamDaXoa;
    }

    public function getAllSanPhamByType($type)
    {
        $p = new mSanPham();
        $tbl = $p->selectAllSanPhamByType($type);
        if (mysqli_num_rows($tbl)) {
            return $tbl;
        } else {
            return false;
        }
    }
    public function getAllSanPhamByName($ten)
    {
        $p = new mSanPham();
        $tbl = $p->selectAllSanPhamByName($ten);
        if (mysqli_num_rows($tbl)) {
            return $tbl;
        } else {
            return false;
        }
    }
    public function get01SanPham($masp)
    {
        $p = new mSanPham();
        $tbl = $p->select01SanPham($masp);
        if (mysqli_num_rows($tbl)) {
            return $tbl;
        } else {
            return false;
        }
    }
    public function searchSP($name)
    {
        $p = new mSanPham();
        $tblSP = $p->searchSP($name);
        if ($tblSP) {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return -1; // không có dữ liệu nào trong bảng
            }
        } else {
            return false;
        }
    }
    public function uploadSanPham($maSP, $tenSP, $giaGoc, $giaBan, $fileHinh, $hinhAnh, $th)
    {
        if ($giaGoc < 0) {
            $giaGoc = $giaGoc * -1;
        }
        if ($giaBan < 0) {
            $giaBan = $giaBan * -1;
        }
        if ($fileHinh["tmp_name"] != "") {
            $pu = new clsUpload();
            $kq = $pu->upload($fileHinh, $tenSP, $hinhAnh);
            if (!$kq) {
                return false;
            }
            $p = new mSanPham();
            $kq = $p->updateSP($maSP, $tenSP, $giaGoc, $giaBan, $hinhAnh, $th);
            return $kq;
        }
    }

    public function themSanPham($tenSP, $giagoc, $giaban, $fileHinh, $thuongHieu)
    {
        if ($giaban < 0) {
            $giaban = $giaban * -1;
        }
        if ($giagoc < 0) {
            $giagoc = $giagoc * -1;
        }

        $hinh = "";
        if ($fileHinh["tmp_name"] != "") {
            $pu = new clsUpload();
            $kq = $pu->Upload($fileHinh, $tenSP, $hinh);
            if (!$kq) {
                return false;
            }
        }
        $p = new mSanPham();
        $kq = $p->insertSanPham($tenSP, $giagoc, $giaban, $hinh, $thuongHieu);
        return $kq;
    }

    public function xoaSanPham($masp)
    {
        $p = new mSanPham();
        $con = $p->xoaSanPham1($masp);
        if ($con) {
            return $con;
        } else {
            return -1;
        }
    }
    public function xoaSanPhamVV($masp)
    {
        $p = new mSanPham();
        $con = $p->xoaSanPhamvv($masp);
        if ($con) {
            return $con;
        } else {
            return -1;
        }
    }
}
