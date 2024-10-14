<?php
include_once("ketnoi.php");
class mSanPham
{
    public function selectAllSanPham()
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();
        if ($con) {
            $str = "SELECT sp.*, lsp.tenlsp 
                FROM sanpham sp 
                INNER JOIN loaisanpham lsp ON sp.malsp = lsp.malsp 
                WHERE sp.is_deleted = 0"; // Chỉ lấy các sản phẩm chưa bị xóa
            $kq = mysqli_query($con, $str);
            if ($kq) {
                $listSanPham = [];
                while ($row = mysqli_fetch_assoc($kq)) {
                    $listSanPham[] = $row;
                }
                $p->Dongketnoi($con);
                return $listSanPham;
            } else {
                echo "Lỗi truy vấn SQL: " . mysqli_error($con);
                return false;
            }
        } else {
            echo "Lỗi kết nối CSDL";
            return false;
        }
    }
    public function selectAllSanPhamTrangChu()
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $truyvan = "select*from sanpham s join loaisanpham t on s.malsp = t.malsp";
        $tbl = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $tbl;
    }
    public function selectAllSanPhamByType($type)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $truyvan = "select*from sanpham s join loaisanpham t on s.malsp=t.malsp where s.malsp='$type'";
        $tbl = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $tbl;
    }
    public function selectAllSanPhamByName($ten)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $truyvan = "Select * from sanpham s join loaisanpham l on s.malsp=l.malsp where s.tensp like N'%$ten%'";
        $tbl = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $tbl;
    }
    public function select01SanPham($masp)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $truyvan = "select*from sanpham s join loaisanpham t on s.malsp=t.malsp where masp='$masp'";
        $tbl = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $tbl;
    }
    public function SearchSP($name)
    {
        $p = new clsketnoi();
        $conn = $p->MoKetNoi();
        $conn->set_charset('utf8');
        if ($conn) {
            $str = "select * from sanpham where tensp Like N'%$name%'";
            $tblSP = $conn->query($str);
            $p->dongketnoi($conn);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function updateSP($masp, $tensp, $giagoc, $giaban, $hinhanh, $th)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $query = "update sanpham set tensp=N'$tensp',giagoc=$giagoc,
        giaban=$giaban,hinhanh='$hinhanh',malsp=$th where masp=$masp";
        $kq = mysqli_query($con, $query);
        $p->DongKetNoi($con);
        return $kq;
    }

    public function insertSanPham($tenSP, $giagoc, $giaban, $hinhAnh, $thuongHieu)
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();

        // Check if the product already exists
        $checkQuery = "SELECT * FROM sanpham WHERE tensp = N'$tenSP'";
        $checkResult = mysqli_query($con, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Product already exists
            $p->DongKetNoi($con);
            return "Product already exists";
        } else {
            // Insert new product
            $truyvan = "INSERT INTO sanpham (tensp, giagoc, giaban, hinhanh, malsp) VALUES (N'$tenSP', $giagoc, $giaban, '$hinhAnh', $thuongHieu)";
            $kq = mysqli_query($con, $truyvan);
            $p->DongKetNoi($con);

            if ($kq) {
                return "Product inserted successfully";
            } else {
                return "Insertion failed";
            }
        }
    }

    public function xoaSanPham1($masp)
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();
        if ($con) {
            $str = "UPDATE sanpham SET is_deleted = 1 WHERE masp='$masp'";
            $kq = mysqli_query($con, $str);
            $p->Dongketnoi($con);
            return $kq; // Trả về kết quả của câu truy vấn UPDATE
        } else {
            return false;
        }
    }
    public function khoiPhucSanPham($masp)
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();
        if ($con) {
            $str = "UPDATE sanpham SET is_deleted = 0 WHERE masp = '$masp'";
            $kq = mysqli_query($con, $str);
            $p->Dongketnoi($con);
            return $kq;
        } else {
            return false;
        }
    }
    public function xoaSanPhamVV($masp)
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();
        if ($con) {
            $str = "delete from sanpham where masp='$masp'";
            $kq = mysqli_query($con, $str);
            $p->Dongketnoi($con);
            return $kq;
        } else {
            return false;
        }
    }
    // Trong file mSanPham.php
    // Trong file mSanPham.php
    public function getAllSanPhamDaXoa1()
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();
        if ($con) {
            $str = "SELECT sp.*, lsp.tenlsp 
                FROM sanpham sp 
                INNER JOIN loaisanpham lsp ON sp.malsp = lsp.malsp 
                WHERE sp.is_deleted = 1";
            $kq = mysqli_query($con, $str);
            if ($kq) {
                $listSanPhamDaXoa = [];
                while ($row = mysqli_fetch_assoc($kq)) {
                    $listSanPhamDaXoa[] = $row;
                }
                $p->Dongketnoi($con);
                return $listSanPhamDaXoa;
            } else {
                echo "Lỗi truy vấn SQL: " . mysqli_error($con);
                return false;
            }
        } else {
            echo "Lỗi kết nối CSDL";
            return false;
        }
    }
}
