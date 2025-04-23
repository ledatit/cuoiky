-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2024 lúc 10:55 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID_Admin` varchar(20) NOT NULL,
  `Hoten` varchar(20) NOT NULL,
  `Ngaysinh` date NOT NULL,
  `Diachi` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sdt` int(20) NOT NULL,
  `Gioitinh` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID_Admin`, `Hoten`, `Ngaysinh`, `Diachi`, `Email`, `Sdt`, `Gioitinh`) VALUES
('ad001', 'ADMIN1', '2000-08-01', 'HÀ NỘIiii', 'admin@gmail.com', 23432345, 'Nam'),
('ad002', 'ADMIN2', '2004-12-31', 'HÀ NỘI', 'admin2@gmail.com', 98765, 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detai`
--

CREATE TABLE `detai` (
  `Madetai` varchar(20) NOT NULL,
  `Tendetai` varchar(50) NOT NULL,
  `Tieude` varchar(20) NOT NULL,
  `Trangthai` varchar(40) NOT NULL,
  `Ngaybatdau` date NOT NULL,
  `Ngayketthuc` date NOT NULL,
  `Mota` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `detai`
--

INSERT INTO `detai` (`Madetai`, `Tendetai`, `Tieude`, `Trangthai`, `Ngaybatdau`, `Ngayketthuc`, `Mota`) VALUES
('DT001', 'Quản lý web site', 'Đề tài nghiên cứu', 'Đã kết thúc', '2024-12-15', '2024-12-17', 'bbbbbbbbbbbbbbbb'),
('DT002', 'Quản lý thi trắc nghiệm', 'Website quản lý thi ', 'Đã kết thúc', '2024-12-08', '2024-12-15', 'sssssssssssssss'),
('DT003', 'Quản lý thư viện', 'Phân tích thiết kế đ', 'Đã Tạo', '2024-12-26', '2025-02-14', 'CHÚC CÁC EM MAY MẮN'),
('DT004', 'Lập trình ứng dụng ADR', 'Xây dựng app cho hệ ', 'Đã Tạo', '2024-12-25', '2024-12-31', 'Cuộc thi lập trình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detaisinhvien`
--

CREATE TABLE `detaisinhvien` (
  `ID` int(11) NOT NULL,
  `ID_DTSV` varchar(20) NOT NULL,
  `Tendetai` varchar(50) NOT NULL,
  `ID_Sinhvien` varchar(20) NOT NULL,
  `Hoten` varchar(20) NOT NULL,
  `Hotengv` varchar(20) NOT NULL,
  `Mota` varchar(200) NOT NULL,
  `Tenkhoa` varchar(30) NOT NULL,
  `TrangthaiDT` varchar(30) NOT NULL,
  `Filebaitap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `detaisinhvien`
--

INSERT INTO `detaisinhvien` (`ID`, `ID_DTSV`, `Tendetai`, `ID_Sinhvien`, `Hoten`, `Hotengv`, `Mota`, `Tenkhoa`, `TrangthaiDT`, `Filebaitap`) VALUES
(31, 'nhom03', 'Quản lý thi trắc nghiệm', 'sv001', 'Ánh Sứ', 'Thanh Hồng', 'bài tập lớn', 'Quản Trị Kinh Doanh', 'Chờ Duyệt', ''),
(32, 'nhom05', 'Quản lý web site', 'sv001', 'Ánh Sứ', 'Nguyễn Công TránG', 'thi cuối kì', 'Trí Tuệ Nhân Tạo', 'Hoàn Thành', 'uploads/nhom05_1735324126.pdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `ID_Giangvien` varchar(20) NOT NULL,
  `Hoten` varchar(50) NOT NULL,
  `Ngaysinh` date NOT NULL,
  `Diachi` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sdt` int(20) NOT NULL,
  `Gioitinh` varchar(20) NOT NULL,
  `ID_Khoa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`ID_Giangvien`, `Hoten`, `Ngaysinh`, `Diachi`, `Email`, `Sdt`, `Gioitinh`, `ID_Khoa`) VALUES
('gv001', 'Nguyễn Công TránG', '1990-09-09', '  Hà đông', 'Congtrang@gmail.com', 39835262, 'Nam', 'CNTT'),
('gv002', 'Thanh Hồng', '1980-11-11', 'Hà Nội', 'thanhhong@gmail.com', 37865935, 'Nữ', 'TTNT'),
('gv003', 'Nguyễn Anh Tuấn', '1998-10-08', 'TP HCM', 'Anhtuannguyen@gmail.com', 123457, 'Nam', 'CNTT'),
('gv004', 'Phan Thị Nhung', '1995-01-08', 'Thái Nguyên', 'Nhungphan@gmail.com', 8582757, 'Nữ', 'QTKD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `ID_Ketqua` int(11) NOT NULL,
  `ID_DTSV` varchar(20) NOT NULL,
  `Hoten` varchar(50) NOT NULL,
  `Diem` int(2) NOT NULL,
  `Nhanxet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ketqua`
--

INSERT INTO `ketqua` (`ID_Ketqua`, `ID_DTSV`, `Hoten`, `Diem`, `Nhanxet`) VALUES
(22, 'nhom01', 'Nguyễn Công TránG', 4, 'ok đấy em'),
(25, 'nhom05', 'Nguyễn Công TránG', 6, 'hay đấy em'),
(26, 'nhom02', 'Nguyễn Công TránG', 5, 'hay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `ID_Khoa` varchar(20) NOT NULL,
  `Tenkhoa` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sdt` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`ID_Khoa`, `Tenkhoa`, `Email`, `Sdt`) VALUES
('CNTT', 'Công Nghệ Thông Tin', 'cntt@gmail.com', 1234),
('KETOAN', 'KẾ TOÁN', 'KETOAN@gmail.com', 876545),
('QTKD', 'Quản Trị Kinh Doanh', 'ttnt@gmail.com', 5436733335),
('TTNT', 'Trí Tuệ Nhân Tạo', 'ttnt@gmail.com', 23432345);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsutrangthai`
--

CREATE TABLE `lichsutrangthai` (
  `ID_LS` int(10) NOT NULL,
  `ID_DTSV` varchar(20) NOT NULL,
  `TrangthaiDT` varchar(30) NOT NULL,
  `Thoigian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsutrangthai`
--

INSERT INTO `lichsutrangthai` (`ID_LS`, `ID_DTSV`, `TrangthaiDT`, `Thoigian`) VALUES
(1, 'nhom03', 'Chờ Duyệt', '2024-12-27 06:35:31'),
(9, 'nhom03', 'Đã Duyệt', '2024-12-27 06:52:49'),
(10, 'nhom03', 'Từ Chối', '2024-12-27 07:01:20'),
(11, 'nhom03', 'Đã Duyệt', '2024-12-27 13:06:33'),
(12, 'nhom05', 'Chờ Duyệt', '2024-12-27 16:01:56'),
(13, 'nhom05', 'Đã Duyệt', '2024-12-27 16:02:34'),
(14, 'nhom05', 'Đã Duyệt/Đã Phân Công', '2024-12-27 16:02:55'),
(15, 'nhom05', 'Đã Chấm', '2024-12-27 16:13:26'),
(19, 'nhom05', 'Hoàn Thành', '2024-12-27 16:36:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `ID_Lop` varchar(20) NOT NULL,
  `Tenlop` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sdt` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`ID_Lop`, `Tenlop`, `Email`, `Sdt`) VALUES
('73DCKD23', 'Quản Trị Kinh Doanh 1', 'QTKD01@gmail.com', 34567),
('73DCKT23', 'Kế Toán 1', 'Ketoan1@gmail.com', 234567),
('73DCTN23', 'Trí Tuệ Nhân Tạo 01', 'TTNT01@gmail.com', 456789),
('73DCTT23', 'Information Technology 2', 'cntt@gmail.com', 123456),
('IT001', 'Information Technology 1', 'it@gmail.com', 345678);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom`
--

CREATE TABLE `nhom` (
  `ID_DTSV` varchar(20) NOT NULL,
  `ID_Sinhvien` varchar(20) NOT NULL,
  `Hoten` varchar(20) NOT NULL,
  `Tenkhoa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhom`
--

INSERT INTO `nhom` (`ID_DTSV`, `ID_Sinhvien`, `Hoten`, `Tenkhoa`) VALUES
('nhom01', 'sv001', 'Anh Su', 'Công Nghệ Thông Tin'),
('nhom02', 'sv002', 'Tien Hung', 'Quản Trị Kinh Doanh'),
('nhom02', 'sv003', 'Xuan Dat', 'Quản Trị Kinh Doanh'),
('nhom01', 'sv003', 'Thanh Vân', 'Quản Trị Kinh Doanh'),
('nhom03', 'sv001', 'Ánh Sứ', 'Quản Trị Kinh Doanh'),
('nhom03', 'sv004', 'Xuân Đạt', 'Quản Trị Kinh Doanh'),
('nhom05', 'sv001', 'Ánh Sứ', 'Trí Tuệ Nhân Tạo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancong`
--

CREATE TABLE `phancong` (
  `ID_Phancong` int(11) NOT NULL,
  `ID_DTSV` varchar(20) NOT NULL,
  `Madetai` varchar(20) NOT NULL,
  `ID_Giangvien` varchar(20) NOT NULL,
  `Hoten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phancong`
--

INSERT INTO `phancong` (`ID_Phancong`, `ID_DTSV`, `Madetai`, `ID_Giangvien`, `Hoten`) VALUES
(32, 'nhom05', 'DT001', 'gv001', 'Nguyễn Công TránG'),
(33, 'nhom03', 'DT002', 'gv001', 'Nguyễn Công TránG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanlytk`
--

CREATE TABLE `quanlytk` (
  `ID_TK` int(11) NOT NULL,
  `Tendangnhap` varchar(100) NOT NULL,
  `Matkhau` varchar(225) NOT NULL,
  `Vaitro` tinyint(4) NOT NULL,
  `ID_Sinhvien` varchar(20) NOT NULL,
  `ID_Giangvien` varchar(20) NOT NULL,
  `ID_Admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quanlytk`
--

INSERT INTO `quanlytk` (`ID_TK`, `Tendangnhap`, `Matkhau`, `Vaitro`, `ID_Sinhvien`, `ID_Giangvien`, `ID_Admin`) VALUES
(1, 'Sinhvien001', '123', 0, 'sv001', '', ''),
(2, 'admin1', '123', 1, '', '', 'ad001'),
(6, 'Sinhvien002', '123', 0, 'sv002', '', ''),
(33, 'Sinhvien003', '123', 0, 'sv003', '', ''),
(44, 'Sinhvien004', '123', 0, 'sv004', '', ''),
(55, 'Giangvien001', '123', 2, '', 'gv001', ''),
(66, 'Giangvien002', '123', 2, '', 'gv002', ''),
(87, 'admin2', '123', 1, '', '', 'ad002'),
(123, 'Giangvien003', '123', 2, '', 'gv003', ''),
(234, 'Giangvien004', '123', 2, '', 'gv004', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `ID_Sinhvien` varchar(20) NOT NULL,
  `Hoten` varchar(20) NOT NULL,
  `Ngaysinh` date NOT NULL,
  `Diachi` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sdt` int(20) NOT NULL,
  `Gioitinh` varchar(4) NOT NULL,
  `ID_Lop` varchar(20) NOT NULL,
  `ID_Khoa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`ID_Sinhvien`, `Hoten`, `Ngaysinh`, `Diachi`, `Email`, `Sdt`, `Gioitinh`, `ID_Lop`, `ID_Khoa`) VALUES
('sv001', 'Ánh Sứ', '2004-08-01', 'Nghệ An', 'Anhsu@gamil.com', 999999, 'Nam', '73DCTT23', 'CNTT'),
('sv002', 'Tiến Hưng', '2004-12-23', 'Hải Dương', 'Tienhung@gmail.com', 8888888, 'Nam', '73DCKT23', 'KETOAN'),
('sv003', 'Thanh Vân', '2004-01-18', 'Hà Nội', 'Thanhvan@gmail.com', 7777777, 'Nữ', '73DCKD23', 'QTKD'),
('sv004', 'Xuân Đạt', '2004-10-01', 'Thanh Hóa', 'Xuandat@gmail.com', 6666666, 'Nam', '73DCTN23', 'TTNT'),
('SV01', 'Lê Thanh Hà', '2024-12-09', '  Hà đôngg', 'halee@gmail.com', 2147483647, 'Nữ', '73DCKD23', 'CNTT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `ID` int(11) NOT NULL,
  `Hoten` varchar(20) NOT NULL,
  `Tieude` varchar(255) NOT NULL,
  `Noidung` varchar(200) NOT NULL,
  `ID_DTSV` varchar(20) NOT NULL,
  `Thoigian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`ID`, `Hoten`, `Tieude`, `Noidung`, `ID_DTSV`, `Thoigian`) VALUES
(364, 'ADMIN1', 'aaaaaaaaaaaa', 'bbbbbbbbbbbbbb', 'nhom01', '2024-12-25 10:52:04'),
(365, 'ADMIN2', 'ddddd', 'ccccccccccccc', 'nhom01', '2024-12-25 10:52:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Chỉ mục cho bảng `detai`
--
ALTER TABLE `detai`
  ADD PRIMARY KEY (`Madetai`);

--
-- Chỉ mục cho bảng `detaisinhvien`
--
ALTER TABLE `detaisinhvien`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_DTSV` (`ID_DTSV`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`ID_Giangvien`);

--
-- Chỉ mục cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`ID_Ketqua`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`ID_Khoa`);

--
-- Chỉ mục cho bảng `lichsutrangthai`
--
ALTER TABLE `lichsutrangthai`
  ADD PRIMARY KEY (`ID_LS`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`ID_Lop`);

--
-- Chỉ mục cho bảng `phancong`
--
ALTER TABLE `phancong`
  ADD PRIMARY KEY (`ID_Phancong`);

--
-- Chỉ mục cho bảng `quanlytk`
--
ALTER TABLE `quanlytk`
  ADD PRIMARY KEY (`ID_TK`),
  ADD KEY `ID_Sinhvien` (`ID_Sinhvien`),
  ADD KEY `ID_Giangvien` (`ID_Giangvien`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`ID_Sinhvien`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `detaisinhvien`
--
ALTER TABLE `detaisinhvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `ID_Ketqua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `lichsutrangthai`
--
ALTER TABLE `lichsutrangthai`
  MODIFY `ID_LS` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `phancong`
--
ALTER TABLE `phancong`
  MODIFY `ID_Phancong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
