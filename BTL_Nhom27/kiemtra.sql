-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 09, 2024 lúc 01:36 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kiemtra`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `malsp` int(11) NOT NULL,
  `tenlsp` varchar(50) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `Website` varchar(255) NOT NULL,
  `dienthoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`malsp`, `tenlsp`, `diachi`, `Website`, `dienthoai`) VALUES
(1, 'Bếp từ', 'quận 1', 'cellphones', '02871083355'),
(2, 'Lò vi sóng', 'Quận 2', 'Cellphones', '02871083355'),
(3, 'Nồi chiên không dầu', 'Quận 3', 'Cellphones', '02871083355'),
(4, 'Nồi cơm điện', 'Quận 6', 'Cellphones', '02871083355'),
(5, 'Máy xay sinh tố', 'Quận 4', 'Cellphones', '02871083355');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `giagoc` float NOT NULL,
  `giaban` float NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `malsp` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `giagoc`, `giaban`, `hinhanh`, `malsp`, `is_deleted`) VALUES
(2, 'Bếp điện từ Kangaroo KG20IC2', 1490000, 1440000, 'beptu_hinh2.jpg', 1, 0),
(3, 'Bếp điện từ kangaroo KG18IH2', 0, 1780000, 'beptu_hinh3.jpg', 1, 0),
(4, 'Bếp điện từ kangaroo KG855i\n', 0, 2740000, 'beptu_hinh4.jpg', 1, 0),
(5, 'Bếp điện từ kangaroo KG419i', 2290000, 1890000, 'beptu_hinh5.jpg', 1, 0),
(6, 'Lò vi sóng SHARP R-205VN-S 20L', 1890000, 1390000, 'lovisong_hinh1.jpg', 2, 0),
(7, 'Lò vi sóng Bluestone ICB-6610', 0, 2130000, 'lovisong_hinh2.jpg', 2, 0),
(8, 'Lò vi sóng MG23T5018CK 23L', 0, 1790000, 'lovisong_hinh3.jpg', 2, 0),
(9, 'Lò vi sóng MG23K3515AS 23L', 0, 1290000, 'lovisong_hinh4.jpg', 2, 0),
(10, 'Lò vi sóng MG23K3515AS 23L', 0, 1799000, 'lovisong_hinh5.jpg', 2, 0),
(11, 'Nồi chiên không dầu Kangaroo KG42AF1 4L', 2850000, 1490000, 'noichienkodau_hinh1.jpg', 3, 0),
(12, 'Nồi chiên không dầu  Kangaroo KG55AF1A ', 6990000, 4990000, 'noichienkodau_hinh2.jpg', 3, 0),
(13, 'Nồi chiên không dầu Kangaroo KG6AF1 6L\n', 3659000, 2540000, 'noichienkodau_hinh3.jpg', 3, 0),
(14, 'Nồi chiên không dầu Kangaroo KG42AF1', 3290000, 2990000, 'noichienkodau_hinh4.jpg', 3, 0),
(15, 'Nồi chiên không dầu Kangaroo KG52AF1A', 4290000, 3780000, 'noichienkodau_hinh5.jpg', 3, 0),
(17, 'Nồi cơm điện Kangaroo KG823 1.2L', 2200000, 1990000, 'noicomdien_hinh1.jpg', 4, 0),
(18, 'Nồi cơm điện Kangaroo KG18RC3 1.8L', 2790000, 2460000, 'noicomdien_hinh2.jpg', 4, 0),
(19, 'Nồi cơm điện Kangaroo KG18RC3 1.8L', 3123000, 2789000, 'noicomdien_hinh3.jpg', 4, 0),
(20, 'Nồi cơm điện Kangaroo KG18RC3 1.8L', 2390000, 1872000, 'noicomdien_hinh4.jpg', 4, 0),
(21, 'Nồi cơm điện Kangaroo KG599N 1.8L', 3426000, 3024000, 'noicomdien_hinh5.jpg', 4, 0),
(22, 'Máy xay sinh tố MX-EX1011WRA 450W\n', 859000, 740000, 'mayxaysinhto_hinh1.jpg', 5, 0),
(23, 'Máy xay sinh tố MX-EX1001WRA 450W', 799000, 590000, 'mayxaysinhto_hinh2.jpg', 5, 0),
(24, 'Máy xay sinh tố MX-EX1511WRA 450W', 1470000, 990000, 'mayxaysinhto_hinh3.jpg', 5, 0),
(25, 'Máy xay sinh tố MX-MP5151WRA 700W', 1890000, 1299000, 'mayxaysinhto_hinh4.jpg', 5, 0),
(26, 'Máy xay sinh tố Smart Blender 1.6L', 2190000, 1650000, 'mayxaysinhto_hinh5.jpg', 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `iduser` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idrole` int(10) NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `idrole`, `fullname`) VALUES
(1, 'thanh', '202cb962ac59075b964b07152d234b70', 1, 'Lê Đạt Thành'),
(2, 'sinh', '202cb962ac59075b964b07152d234b70', 3, 'Tiên Sinh'),
(6, 'quyen', 'e10adc3949ba59abbe56e057f20f883e', 2, 'Phan Tiên Sinh'),
(36, 'thanh1212', '202cb962ac59075b964b07152d234b70', 3, 'thanh@gmail.com'),
(37, 'thanh5656', '202cb962ac59075b964b07152d234b70', 3, 'thanh@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `idrole` int(10) NOT NULL,
  `TenVT` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoTa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`idrole`, `TenVT`, `MoTa`) VALUES
(1, 'Admin', 'quản trị tất cả'),
(2, 'Nhân Viên\r\n', 'quản trị (loại sản phẩm, sản phẩm)'),
(3, 'khách hàng', 'quản lý tài khoản khách hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`malsp`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `malsp` (`malsp`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `user_ibfk_2` (`idrole`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`idrole`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `malsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `idrole` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`malsp`) REFERENCES `loaisanpham` (`malsp`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`idrole`) REFERENCES `vaitro` (`idrole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
