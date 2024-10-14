<?php
class clsketnoi
{
    public function MoKetNoi()
    {
        $conn = mysqli_connect("localhost", "root", "", "kiemtra");
        mysqli_set_charset($conn,'utf8');
        return $conn;
    }
    public function DongKetNoi($conn)
    {
        mysqli_close($conn);
    }
}
?>