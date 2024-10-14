<?php
$math=$_REQUEST["id"];
include_once("controller/cThuongHieu.php");
$p=new cloaisanpham();
$kq=$p->get01loaisanpham($math);
if($kq)
{
    while($r=mysqli_fetch_assoc($kq))
    {
        $tenth=$r["tenlsp"];
        $diachi=$r["diachi"];
        $webstie=$r["Website"];
        $dienthoai=$r["dienthoai"];
    }
}else{
    echo "<script>alert('Mã Thương Hiệu không tồn tại')</script>";
    header("refresh:0;url=admin.php?type=thuonghieu");
}
?>
<form method='post' enctype='multipart/form-data'>
<table>
    <tr>
        <td>Tên thương hiệu</td>
        <td>
            <input size="43px" type="text" name="TenTH" value="<?php if(isset($tenth)) echo $tenth; ?>" require>
        </td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td>
            <input size="43px" type="text" name="DiaChi" value="<?php if(isset($diachi)) echo $diachi; ?>" require>
        </td>
    </tr>
    <tr>
        <td>Website</td>
        <td>
            <input size="43px" type="text" name="Website" value="<?php if(isset($webstie)) echo $webstie; ?>" require>
        </td>
    </tr>
    <tr>
        <td>Điện thoại</td>
        <td>
            <input size="43px" type="text" name="DienThoai" value="<?php if(isset($dienthoai)) echo $dienthoai; ?>" require>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" name="btn-up" value="Cập nhật">
            <input type="reset" name="reset" value="Hủy">
        </td>
    </tr>
</table>
</form>
<?php
    if(isset($_REQUEST["btn-up"])){
        $kq=$p->uploadloaisanpham($math,$_REQUEST["TenTH"],$_REQUEST["DiaChi"],$_REQUEST["Website"],$_REQUEST["DienThoai"]);
        if($kq){
            echo "<script>alert('Upload thanh cong')</script>";
        }else{
            echo "<script>alert('Upload that bai')</script>";
        }
    }
?>