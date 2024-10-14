<?php
    //session_start();
    include_once("model/mNguoiDung.php");
    class cNguoiDung{
        public function getAllNguoiDung()
        {
            $p = new mNguoiDung();
            $tbl = $p->selectAllNguoiDung();
            if(mysqli_num_rows($tbl))
            {
                return $tbl;
            }
            else
            {
                return false;
            }
        }
        public function get2NguoiDung($Iduser){
			$p = new mNguoiDung();
			$tbl = $p-> select2NguoiDung($Iduser);
			if(mysqli_num_rows($tbl)>0){
				return $tbl;
			} else{
				return false;
			}
		}
        public function get1NguoiDung($tk,$mk){
            $mk=md5($mk);
            $p=new mNguoiDung();
            $con=$p->select1NguoiDung($tk,$mk);
            if(mysqli_num_rows($con)){
                while($r=mysqli_fetch_assoc($con)){
                    $_SESSION["dn"]=$r["idrole"];
                    $_SESSION["id"]=$r["iduser"];
                }
                echo "<script>alert('Đăng nhập thành công')</script>";
                header("refresh:0;url='admin.php'");
            }else{
                echo "<script>alert('Đăng nhập thất bại')</script>";
                header("refresh:0;url='index.php?dangnhap'");
            }
        }

        public function cUpdateUser($Iduser, $Username, $Password, $Fullname, $Idrole){
            $p=new mNguoiDung();
            $kq=$p->mUpdateUser($Iduser, $Username, $Password, $Fullname, $Idrole);
            return $kq;
        }
        public function cInsertUser($Username, $Password, $Idrole, $Fullname){
            $p = new mNguoiDung();
            $ar = array();
            $r = $this -> getAllNguoiDung();
            foreach($r as $i){
                $ar[] = $i['username'];
            }
            if(in_array($Username,$ar)){
                echo "<script>alert('Tên tài khoản đã tồn tại')</script>";
                header("refresh:0;url='admin.php?action=xemnd'");
            }else{
                $kq = $p->mInsertUser($Username, $Password, $Idrole, $Fullname);
                if($kq){
                    return $kq; 
                }else {
                    return false;
                }
            }             
        }
        public function cDeleteUser($Iduser){
            $p = new mNguoiDung();
            if($Iduser == 1){
                
                echo "<script>alert('Bạn không thể xóa tài khoản admin')</script>";
                header("refresh:0;url='admin.php?action=xemnd'");
            }else{
                $con = $p->mDeleteUser($Iduser);
                return $con;
            }
            
        }
    }
?>