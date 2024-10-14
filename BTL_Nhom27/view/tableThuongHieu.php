<?php
include_once("controller/cThuongHieu.php");
$p = new cloaisanpham();
$kq=$p->getAllloaisanpham();
if($kq)
{
    echo '<table id="customers">';
    echo '
    
    <center><h2>Quản lý loại sản phẩm</h2></center>
    <br>
    <tbody>
      <tr>
        <th scope="col">Mã TH</th>
        <th scope="col">Tên TH</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Website</th>
        <th scope="col">Điện thoại</th>
        <th scope="col">Hành động</th>
      </tr>';
    while($r = mysqli_fetch_assoc($kq))
    {
        echo '<tr>
        <td>'.$r["malsp"].'</td>
        <td>'.$r["tenlsp"].'</td>
        <td>'.$r["diachi"].'</td>
        <td>'.$r["Website"].'</td>
        <td>'.$r["dienthoai"].'</td>
        <td><a href="?action=suath&id='.$r["malsp"].'">Sửa</a> | <a href="?action=xoalsp&id='.$r["malsp"].'" onclick="return confirm(\'Bạn có chắc muốn xóa loại sản phẩm hay không?\');">Xóa</a></td>
      </tr>';
    }
    echo '</tbody>
    </table>';
}
?>