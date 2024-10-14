<?php echo"<h2>Them san pham</h2>"; 
?>
<form  method="POST" action="#" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Ten san pham</td>
            <td> <input type="text" name ="tensp"  required></td>
        </tr>
        <tr>
            <td>Gia gốc</td>
            <td> <input type="number" name ="giagoc" required></td>
        </tr>
        <tr>
            <td>Gia bán </td>
            <td> <input type="number" name ="giaban" required></td>
        </tr>
        <tr>
        <tr>
           <td>Hinh anh</td>
            <td> <input type="file" name ="hinhanh" value=""></td>
            <td> <img src="img/sanpham/<?php echo $hinhanh;?>" width="50px" >  </td>
        </tr>
        <tr>
            <td>
                Thương hiệu
            </td>
            <td>
                <?php
                include_once("Controller/cThuongHieu.php");
                $pt= new cloaisanpham();
                $kq=$pt->getAllloaisanpham();
                if(!$kq){
                    echo("no data");
                }else{
                    echo"<select name='cboThuongHieu'>";
                    while($ro=mysqli_fetch_assoc($kq)){
                        if($ro["tenlsp"]==$thuonghieu){
                            echo"<option value=".$ro['malsp']." selected>".$ro['tenlsp']."</option>";
                        }else{
                            echo"<option value=".$ro['malsp'].">".$ro['tenlsp']."</option>";
                        }
                    
                    }
                    echo"</select>";
                }
            ?>
            </td>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btninsert" value="Insert">
                    <input type="reset" name="btnLamLai" value="Lam Lại">
                </td>
            </tr>
        </tr>

    </table>




</form>
<?php
if(isset($_REQUEST["btninsert"])){
    include_once ("Controller/cSanPham.php");
    $p=new cSanPham();
    $kq=$p->themSanPham($_REQUEST["tensp"],$_REQUEST["giagoc"],$_REQUEST["giaban"],$_FILES["hinhanh"],$_REQUEST["cboThuongHieu"]);
    if ($kq === "Product already exists") {
        echo "<script>alert('Sản phẩm đã tồn tại!')</script>";
    } elseif ($kq === "Product inserted successfully") {
        echo "<script>alert('Thêm sản phẩm mới thành công!')</script>";
        header("refresh:0; url='admin.php?action=xemsp'");
    } else {
        echo "<script>alert('Thêm sản phẩm mới thất bại!')</script>";
    }
}
?>