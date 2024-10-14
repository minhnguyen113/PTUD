<?php
    include_once("model/mVaiTro.php");
    class cVT{
        public function getAllVT(){
			$p=new mVT();
			$tbl=$p->selectAllVT();
			if(mysqli_num_rows($tbl)>0){
				return $tbl;
			} else{
				return false;
			}
		}
		public function get1VT($IdVT){
			$p = new mVT();
			$tbl = $p-> select1VT($IdVT);
			if(mysqli_num_rows($tbl)>0){
				return $tbl;
			} else{
				return false;
			}
		}
		public function cUpdateVT($Idrole, $Rolename, $Mota){
            $p=new mVT();
            $kq=$p->mUpdateVT($Idrole, $Rolename, $Mota);
            return $kq;
        }
        public function cInsertVT($Rolename, $Mota){
            $p = new mVT();
            $ar = array();
            $r = $this->getAllVT();
            foreach($r as $i){
                $ar[] = $i['TenVT'];
            }
            if(in_array($Rolename,$ar)){
                echo "<script>alert('Tên vai trò đã tồn tại')</script>";
                header("refresh:0;url='admin.php?action=xemnd'");
            }else{
            $kq = $p->mInsertVT($Rolename, $Mota);
            return $kq;
            }
            
        }
       
            
        public function cDeleteVT($Idrole){
            $p = new mVT();
            $con = $p->mDeleteVT($Idrole);
            return $con;
        }
    }
?>