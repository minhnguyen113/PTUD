<?php
session_start();
if (!isset($_SESSION["dn"])) {
  echo "<script>alert('Bạn không có quyền truy cập')</script>";
  header("refresh:0; url='../index.php'");
}
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Untitled Document</title>
  <link rel="stylesheet" href="/style/a">
</head>

<body>
  <header>
    <h2>Thiết Bị Nhà Bếp</h2>
  </header>

  <section>
    <div id="navmenu" style="background-color: #00FFCC;">
      <div id="navngang" style="padding-top: 6px;">
        <a href="index.php">Trang chủ</a> | <a href="view/dangxuat.php" onclick="return confirm('Bạn có chắc muốn đăng xuất hay không?');">Đăng xuất</a>
      </div>
    </div>
  </section>
  <section class="s1">
    <nav id="menu">
      <ul>

        <?php
        if ($_SESSION["dn"] == 1) {
          echo '<li>Quản Lý Thương Hiệu';
          echo '<ul class="sub-menu">';
          echo '<li><a href="?action=xemth">Xem DS Thương Hiệu</a></li>';
          echo '<li><a href="?action=themth">Thêm thương hiệu</a></li>';
          echo '</ul>';
          echo '</li>';
          echo '<li>Quản Lý Sản phẩm';
          echo '<ul class="sub-menu">';
          echo '<li><a href="?action=xemsp">Xem DS sản phẩm</a></li>';
          echo '<li><a href="?action=themsp">Thêm Sản Phẩm</a></li>';
          echo '<li><a href="?action=kpsp">Khôi phục sản Phẩm</a></li>';
          echo '</ul>';
          echo '</li>';

          echo '<li>Quản Lý người dùng';
          echo '<ul class="sub-menu">';
          echo '<li><a href="?action=xemnd">Xem DS người dùng</a></li>';
          echo '<li><a href="?action=themnd">Thêm tài khoản</a></li>';
          echo '</ul>';
          echo '</li>';
          echo '<li>Quản Lý Vai Trò';
          echo '<ul class="sub-menu">';
          echo '<li><a href="?action=xemvt">Xem ds vai trò</a></li>';
          echo '<li><a href="?action=themvt">Thêm vai trò</a></li>';
          echo '</ul>';
          echo '</li>';
        } else if ($_SESSION["dn"] == 2) {
          echo '<li>Quản Lý Thương Hiệu';
          echo '<ul class="sub-menu">';
          echo '<li><a href="?action=xemth">Xem DS Thương Hiệu</a></li>';
          echo '<li><a href="?action=themth">Thêm thương hiệu</a></li>';
          echo '</ul>';
          echo '</li>';
          echo '<li>Quản Lý Sản phẩm';
          echo '<ul class="sub-menu">';
          echo '<li><a href="?action=xemsp">Xem DS sản phẩm</a></li>';
          echo '<li><a href="?action=themsp">Thêm Sản Phẩm</a></li>';
          echo '</ul>';
          echo '</li>';
        } else if ($_SESSION["dn"] == 3) {
          echo '<li>Quản Lý người dùng';
          echo '<ul class="sub-menu">';
          echo '<li><a href="?action=xemtknd">Xem DS nguoi dung</a></li>';
          echo '<li><a href="?action=kh">Thêm tài khoản</a></li>';
          echo '</ul>';
          echo '</li>';
        }
        ?>

      </ul>
    </nav>
    <article>
      <?php

      if (isset($_REQUEST["action"])) {
        $val = $_REQUEST["action"];
        switch ($val) {
          case 'xemtknd':
            include_once("view/tableKhacHang.php");
            break;
          case 'kh':
            include_once("view/dangky.php");
            break;
          case 'xemsp':
            include_once("view/tableSanPham.php");
            break;
          case 'themsp':
            include_once("view/themSanPham.php");
            break;
          case 'suasp':
            include_once("view/sSanPham.php");
            break;
          case 'xoasp':
            include_once("view/xoaSanPham.php");
            break;
          case 'xoaspvv':
            include_once("view/xoaSanPhamVV.php");
            break;
          case 'kpsp':
            include_once("view/sanPhamDaXoa.php");
            break;
          case 'kpsp1':
            include_once("view/khoiPhucSanPham.php");
            break;
          case 'xemth':
            include_once("view/tableThuongHieu.php");
            break;
          case 'themth':
            include_once("view/themThuongHieu.php");
            break;
          case 'sualsp':
            include_once("view/sThuongHieu.php.php");
            break;
          case 'xoalsp':
            include_once("view/xoaThuongHieu.php");
            break;
          case 'xemnd':
            include_once("view/tableNguoiDung.php");
            break;
          case 'suand':
            include_once("view/suaNguoiDung.php");
            break;
          case 'themnd':
            include_once("view/themNguoiDung.php");
            break;
          case 'xoand':
            include_once("view/xoaNguoiDung.php");
            break;
          case 'xemvt':
            include_once("view/tableVaiTro.php");
            break;
          case 'themvt':
            include_once("view/themVaiTro.php");
            break;
          case 'suavt':
            include_once("view/suaVaiTro.php");
            break;
          case 'xoavt':
            include_once("view/xoaVaiTro.php");
            break;

          default:
            if ($_SESSION["dn"] == 1) {
              echo "<center><h1>Trang Admin</h1></center>";
            } else {
              echo "<center><h1>Xin chào khách hàng</h1></center>";
            }
        }
      } else {
        if ($_SESSION["dn"] == 1) {
          echo "<center><h1>Trang Admin</h1></center>";
        } else {
          echo "<center><h1>Xin chào khách hàng</h1></center>";
        }
      }
      ?>
    </article>
  </section>

  <footer>
    <p>
    <p>Lê Đạt Thành - Mai Phương Quyên</p>
    </p>
  </footer>
</body>

</html>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    margin: auto;
    width: 80%;
  }

  .s1 {
    display: flex;
  }

  /* Style the header */
  header {
    background-image: url(image/pngtree-kitchen-kitchenware-illustration-background-picture-image_2338800.jpg);
    padding: 30px;
    text-align: center;
    font-size: 35px;
    color: white;
  }

  /* Create two columns/boxes that floats next to each other */
  nav {
    float: left;
    width: 40%;
    /* only for demonstration, should be removed */
    background: #95D2B3;
    padding: 20px;
  }

  /* Style the list inside the menu */
  nav ul {
    list-style-type: none;
    padding: 0;
  }

  article {
    float: left;
    padding: 20px;
    width: 80%;
    background-color: #D8EFD3;
    /* only for demonstration, should be removed */
  }

  /* Clear floats after the columns */
  section::after {
    content: "";
    display: table;
    clear: both;
  }

  /* Style the footer */
  footer {
    background-color: #55AD9B;
    padding: 10px;
    text-align: center;
    color: white;
  }

  /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
  @media (max-width: 700px) {
    .s1 {
      flex-direction: column;
    }

    nav,
    article {
      width: 100%;
      height: auto;
    }
  }

  #search {
    display: flex;
  }

  .menu {
    width: 100%;
  }

  .navmenu {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  #menu ul {
    width: 100%;
    padding: 0;
    list-style-type: none;
    text-align: left;
  }

  #menu li {
    width: auto;
    height: 40px;
    line-height: 40px;
    border-bottom: 1px solid #e8e8e8;
    padding: 0 1em;
  }

  #menu li a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    display: block;
  }

  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td,
  #customers th {
    border: 1px solid #ddd;
    padding: 2px;
  }

  #customers tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #219C90;
    color: white;
  }

  a {
    text-decoration: none;
  }

  h4 {
    text-align: center;
  }

  #navmenu {
    display: flex;
    justify-content: space-between;
  }

  #menu {
    font-family: Arial, sans-serif;
    width: 220px;
    /* Độ rộng của menu */
  }

  ul {
    list-style-type: none;
    padding: 0;
  }

  li {
    position: relative;
    /* Để có thể điều khiển vị trí của submenu */
    cursor: pointer;
    font-weight: bold;
  }

  .sub-menu {
    position: absolute;
    top: 0;
    left: 100%;
    /* Đẩy submenu sang bên phải */
    display: none;
    /* Mặc định ẩn submenu */
    z-index: 1;
    /* Đảm bảo submenu luôn hiển thị trên các phần tử khác */
    background-color: #7FFFD4;
    /* Màu nền của submenu */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    /* Đổ bóng cho submenu */
    width: max-content;
    /* Tự động giãn theo độ dài của nội dung */
    white-space: nowrap;
    /* Để ngăn các mục trong submenu xuống dòng */
  }

  li:hover .sub-menu {
    display: block;
    /* Hiển thị submenu khi hover vào menu item */
  }

  .sub-menu li {
    width: 100%;
    /* Mục trong submenu tự động rộng hết chiều rộng của submenu */
  }

  .sub-menu li a {
    display: block;
    text-decoration: none;
    color: #333;
  }

  .sub-menu li a:hover {
    background-color: #f0f0f0;
    /* Màu nền khi hover vào mục trong submenu */
  }
</style>