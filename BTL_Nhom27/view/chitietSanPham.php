<?php
$masp = $_REQUEST["idct"];
include_once("Controller/cSanPham.php");
$p = new cSanPham();
$sp = $p->get01SanPham($masp);
if ($sp) {
    while ($r = mysqli_fetch_assoc($sp)) {
        $tensp = $r["tensp"];
        $giagoc = $r["giaban"];
        $giaban = $r["giagoc"];
        $hinhanh = $r["hinhanh"];
        $tenlsp = $r["tenlsp"];
    }
} else {
    echo "<script>alert('Ma san pham khong ton tai!')</script>";
    header("refresh: 0; url='admin.php'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="product-info">
            <img src="image/<?php echo $hinhanh; ?>" alt="Product Image">
            <div class="product-details">
                <h2>Thông tin chi tiết sản phẩm</h2>
                <table>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td><?php echo $tensp; ?></td>
                    </tr>
                    <tr>
                        <td>Loại sản phẩm</td>
                        <td><?php echo $tenlsp; ?></td>
                    </tr>
                    <tr>
                        <td>Giá gốc</td>
                        <td><?php echo number_format($giagoc, 0, ',', '.'); ?> VNĐ</td>
                    </tr>
                    <tr>
                        <td>Giá bán</td>
                        <td><?php echo number_format($giaban, 0, ',', '.'); ?> VNĐ</td>
                    </tr>
                    <tr>
                        <td>Số Lượng</td>
                        <td><input type="number"></td>
                    </tr>
                </table>
                <!-- Nút đặt hàng -->
                <form method="post">
                    <input type="submit" name="btnDatHang" class="order-button" value="Thêm giỏ hàng">
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-info {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .product-info img {
        width: 250px;
        height: 300px;
        margin-right: 20px;
        border: 1px solid #ccc;
        padding: 5px;
        object-fit: cover;
    }

    .product-details {
        flex: 1;
    }

    .product-details h2 {
        font-size: 28px;
        margin-bottom: 10px;
        color: #333;
    }

    .product-details table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        border: 1px solid #ccc;
    }

    .product-details table td {
        padding: 15px;
        border: 1px solid #ccc;
    }

    .product-details table td:first-child {
        width: 30%;
        font-weight: bold;
        background-color: #f0f0f0;
        text-align: center;
        vertical-align: middle;
        color: #333;
    }

    .order-button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .order-button:hover {
        background-color: #0056b3;
    }
</style>