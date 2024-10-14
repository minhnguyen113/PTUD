<?php
include_once("controller/cThuongHieu.php");
$p = new cloaisanpham();
$kq=$p->getAllloaisanpham();
if($kq)
{
    echo '<div id="menu">
    <ul>';
    while($r = mysqli_fetch_assoc($kq))
    {
        echo '<li><a href="?th='.$r["malsp"].'">'.$r["tenlsp"].'</a></li>';
    }
    echo '</ul>
    </div>';
}
?>