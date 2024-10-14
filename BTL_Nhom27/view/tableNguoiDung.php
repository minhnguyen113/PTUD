<?php
include_once("controller/cNguoiDung.php");
$p = new cNguoiDung();
$kq = $p->getAllNguoiDung();
if (!$kq) {
    echo "No data";
} else {
    echo "<center><h2>Quản lý người dùng</h2></center>";
    echo "<table width='100%' border='1' id='customers'>";
    echo '<tr>
                <th  scope="col"><center>Mã ND</center></th>
                <th  scope="col"><center>Tên ND</center></th>
                <th  scope="col"><center>Vai trò</center></th>
                <th  scope="col"><center>Họ và tên</center></th>
                <th  scope="col"><center>Thao Tác</center></th>
            </tr>';
    while ($r = mysqli_fetch_assoc($kq)) {
        echo "<tr>";
        echo "<td align='center'>" . $r["iduser"] . "</td>";
        echo "<td align='center'>" . $r["username"] . "</td>";
        echo "<td align='center'>" . $r["TenVT"] . "</td>";
        echo "<td align='center'>" . $r["fullname"] . "</td>";
        echo '<td align="center"><a href="?action=suand&id=' . $r["iduser"] . '">Sửa</a> | <a href="?action=xoand&id=' . $r["iduser"] . '" onclick="return confirm(\'Bạn có chắc muốn xóa người dùng hay không?\');">Xóa</a></td>';
        echo "</tr>";
    }
    echo "</table>";
}
