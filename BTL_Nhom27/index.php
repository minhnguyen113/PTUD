<?php
session_start();
error_reporting(1);
?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Untitled Document</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<style>

</style>

<body>
  <header>
    <h2>Thiết Bị Nhà Bếp</h2>
  </header>

  <section>
    <div id="navmenu" style="background-color: #00FFCC;">
      <div id="navngang" style="padding-top: 6px;">
        <a href="index.php">Trang chủ</a> |
        <?php
        if (isset($_SESSION["dn"])) { //
          echo '<a href="admin.php">Quản lý</a> |';
          echo '<a href="view/dangxuat.php" onclick="return confirm(\'Bạn có chắc muốn đăng xuất hay không?\');" > Đăng xuất</a>';
        } else {
          echo '<a href="index.php?dangnhap">Đăng nhập</a> |';
          echo '<a href="index.php?dangky"> Đăng ký</a>';
        }
        ?>
      </div>
      <div>

      </div>
      <div id="search">
        <!-- <button style="background-color: #00FFFF; border: none;" onclick="window.location.href = 'gioHang.php';">
          <img id="giohang11" src="image/cart-text-logo.png" width="33px" height="33px" style="" alt="">
        </button> -->
        <form action="#" method="get" style="padding-top: 6px; padding-left: 10px;">
          <input type="text" name="txtTuKhoa">
          <input type="submit" name="btnTimKiem" value="Tìm kiếm">
        </form>
      </div>
    </div>
  </section>
  <section class="s1">
    <nav>
      <?php
      include_once("view/vThuongHieu.php");
      ?>
    </nav>

    <article>
      <?php
      if (isset($_GET["dangnhap"])) {
        include_once("view/dangnhap.php");
      } else if (isset($_GET["dangky"])) {
        include_once("view/dangky.php");
      } else if(isset($_GET['idct'])){
        include_once("view/chitietsanpham.php"); 
      }else{
        include_once("view/vSanPham.php");
      }

      ?>
    </article>
  </section>

  <footer>
    <p>Lê Đạt Thành - Mai Phương Quyên</p>
  </footer>
</body>

</html>

<style>
  * {
    box-sizing: border-box;
  }

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
    width: 21%;
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
    width: 79%;
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
</style>