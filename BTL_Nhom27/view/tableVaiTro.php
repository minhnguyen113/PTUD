<?php
    if($_SESSION['dn']==1){
        include_once("controller/cVaiTro.php");
        $p = new cVT();
        $tbl = $p->getAllVT();
        if($tbl){
            echo "<table border=1 width=400 height=200 id='customers'>";
            echo "<tr><th><center>IDRole</center></th>
            <th><center>Vai Trò</center></th><th><center>Mô tả</center></th><th><center>Hành động</center></th></tr>";
            while($r = mysqli_fetch_assoc($tbl)){
                echo "<tr>";
                echo "<td align='center'>".$r["idrole"]."</td>";
                echo "<td align='center'>".$r["TenVT"]."</td>";
                echo "<td align='center'>".$r["MoTa"]."</td>";
                echo '<td align="center"><a href="?action=suavt&id='.$r["idrole"].'">Sửa</a> | <a href="?action=xoavt&id='.$r["idrole"].'" onclick="return confirm(\'Bạn có chắc muốn xóa vai trò hay không?\');">Xóa</a></td>';
                echo "</tr>";
            }
            echo "</table>";
        } else{
            echo "No data!";
        }
    }else{
        echo "<script>alert('Bạn không có quyền truy cập!')</script>";
        header("refresh:0; url='admin.php'");
    }
    
?>
