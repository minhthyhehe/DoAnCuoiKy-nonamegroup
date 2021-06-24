-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2021 lúc 02:16 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `my_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nam', '2021-06-13 18:22:30', '2021-06-13 15:48:28'),
(4, 'Nữ', '2021-06-13 17:35:45', '2021-06-13 17:35:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `type` enum('1','2','3','4') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`, `url`, `created_at`, `type`, `id_product`, `id_user`) VALUES
(38, '7-7.jpg', 'storage/15-06-2021-16237644877-7.jpg', '2021-06-15 15:27:41', '1', 48, NULL),
(39, '8.jpg', 'storage/15-06-2021-16237644878.jpg', '2021-06-15 15:27:41', '1', 48, NULL),
(40, '8-8.jpg', 'storage/15-06-2021-16237644878-8.jpg', '2021-06-15 15:27:41', '1', 48, NULL),
(41, '9.jpg', 'storage/15-06-2021-16237644879.jpg', '2021-06-15 15:27:41', '1', 48, NULL),
(42, '2.jpg', 'storage/15-06-2021-16237644872.jpg', '2021-06-15 15:27:41', '2', 48, NULL),
(43, '2-2.jpg', 'storage/15-06-2021-16237644872-2.jpg', '2021-06-15 15:27:41', '3', 48, NULL),
(96, '3.jpg', 'storage/17-06-2021-16239422013.jpg', '2021-06-17 17:21:03', '1', 49, NULL),
(97, '7.jpg', 'storage/17-06-2021-16239422017.jpg', '2021-06-17 17:21:03', '1', 49, NULL),
(98, '8.jpg', 'storage/17-06-2021-16239422018.jpg', '2021-06-17 17:21:03', '1', 49, NULL),
(99, '2.jpg', 'storage/17-06-2021-16239422012.jpg', '2021-06-17 17:21:03', '2', 49, NULL),
(100, '5.jpg', 'storage/17-06-2021-16239422015.jpg', '2021-06-17 17:21:03', '3', 49, NULL),
(101, '', 'storage/17-06-2021-1623942413', '2021-06-17 17:53:06', '1', 50, NULL),
(102, '4.jpg', 'storage/17-06-2021-16239424134.jpg', '2021-06-17 17:53:06', '2', 50, NULL),
(103, '', 'storage/17-06-2021-1623942413', '2021-06-17 17:53:06', '3', 50, NULL),
(144, '11.jpg', 'storage/17-06-2021-162394370911.jpg', '2021-06-17 17:29:28', '2', 47, NULL),
(147, '', 'storage/17-06-2021-1623943718', '2021-06-17 17:38:28', '2', 47, NULL),
(150, '', 'storage/17-06-2021-1623943724', '2021-06-17 17:44:28', '2', 47, NULL),
(153, '', 'storage/17-06-2021-1623943773', '2021-06-17 17:33:29', '2', 47, NULL),
(156, '', 'storage/17-06-2021-1623943779', '2021-06-17 17:39:29', '2', 47, NULL),
(158, '', 'storage/17-06-2021-1623943803', '2021-06-17 17:03:30', '2', 47, NULL),
(160, '', 'storage/17-06-2021-1623943807', '2021-06-17 17:07:30', '2', 47, NULL),
(163, '', 'storage/17-06-2021-1623943815', '2021-06-17 17:15:30', '2', 47, NULL),
(165, '', 'storage/17-06-2021-1623943820', '2021-06-17 17:20:30', '2', 47, NULL),
(167, '', 'storage/17-06-2021-1623943831', '2021-06-17 17:31:30', '2', 47, NULL),
(169, '', 'storage/18-06-2021-1623993948', '2021-06-18 07:48:25', '2', 48, NULL),
(170, '', 'storage/18-06-2021-1623993948', '2021-06-18 07:48:25', '3', 48, NULL),
(171, '', 'storage/18-06-2021-1623993964', '2021-06-18 07:04:26', '2', 48, NULL),
(172, '', 'storage/18-06-2021-1623993964', '2021-06-18 07:04:26', '3', 48, NULL),
(173, '', 'storage/18-06-2021-1623994107', '2021-06-18 07:27:28', '2', 48, NULL),
(174, '', 'storage/18-06-2021-1623994107', '2021-06-18 07:27:28', '3', 48, NULL),
(175, '5.jpg', 'storage/18-06-2021-16240068715.jpg', '2021-06-18 11:11:01', '1', 47, NULL),
(176, '6.jpg', 'storage/18-06-2021-16240068716.jpg', '2021-06-18 11:11:01', '1', 47, NULL),
(177, '7.jpg', 'storage/18-06-2021-16240068717.jpg', '2021-06-18 11:11:01', '1', 47, NULL),
(178, '8.jpg', 'storage/18-06-2021-16240068718.jpg', '2021-06-18 11:11:01', '1', 47, NULL),
(179, '11.jpg', 'storage/18-06-2021-162400687111.jpg', '2021-06-18 11:11:01', '1', 47, NULL),
(180, '', 'storage/18-06-2021-1624006871', '2021-06-18 11:11:01', '2', 47, NULL),
(181, '5.jpg', 'storage/18-06-2021-16240068715.jpg', '2021-06-18 11:11:01', '3', 47, NULL),
(186, '2.jpg', 'storage/18-06-2021-16240069862.jpg', '2021-06-18 11:06:03', '2', 65, NULL),
(187, '5.jpg', 'storage/18-06-2021-16240069865.jpg', '2021-06-18 11:06:03', '3', 65, NULL),
(191, '8.jpg', 'storage/18-06-2021-16240070198.jpg', '2021-06-18 11:39:03', '1', 65, NULL),
(192, '11.jpg', 'storage/18-06-2021-162400701911.jpg', '2021-06-18 11:39:03', '1', 65, NULL),
(199, '7-7.jpg', 'storage/18-06-2021-16240139697-7.jpg', '2021-06-18 12:29:59', '1', 66, NULL),
(200, '8.jpg', 'storage/18-06-2021-16240139698.jpg', '2021-06-18 12:29:59', '1', 66, NULL),
(201, '8-8.jpg', 'storage/18-06-2021-16240139698-8.jpg', '2021-06-18 12:29:59', '1', 66, NULL),
(202, '9.jpg', 'storage/18-06-2021-16240139699.jpg', '2021-06-18 12:29:59', '1', 66, NULL),
(203, '9-9.jpg', 'storage/18-06-2021-16240139699-9.jpg', '2021-06-18 12:29:59', '1', 66, NULL),
(204, '12.jpg', 'storage/18-06-2021-162401396912.jpg', '2021-06-18 12:29:59', '2', 66, NULL),
(205, '12-12.jpg', 'storage/18-06-2021-162401396912-12.jpg', '2021-06-18 12:29:59', '3', 66, NULL),
(206, '6-6.jpg', 'storage/19-06-2021-16240678876-6.jpg', '2021-06-19 03:07:58', '1', 67, NULL),
(207, '7.jpg', 'storage/19-06-2021-16240678877.jpg', '2021-06-19 03:07:58', '1', 67, NULL),
(208, '7-7.jpg', 'storage/19-06-2021-16240678877-7.jpg', '2021-06-19 03:07:58', '1', 67, NULL),
(209, '11.jpg', 'storage/19-06-2021-162406788711.jpg', '2021-06-19 03:07:58', '1', 67, NULL),
(210, '11-11.jpg', 'storage/19-06-2021-162406788711-11.jpg', '2021-06-19 03:07:58', '1', 67, NULL),
(211, '12.jpg', 'storage/19-06-2021-162406788712.jpg', '2021-06-19 03:07:58', '1', 67, NULL),
(212, '1.jpg', 'storage/19-06-2021-16240678871.jpg', '2021-06-19 03:07:58', '2', 67, NULL),
(213, '1-1.jpg', 'storage/19-06-2021-16240678871-1.jpg', '2021-06-19 03:07:58', '3', 67, NULL),
(214, '2-2.jpg', 'storage/19-06-2021-16240685522-2.jpg', '2021-06-19 04:12:09', '1', 68, NULL),
(215, '3.jpg', 'storage/19-06-2021-16240685523.jpg', '2021-06-19 04:12:09', '1', 68, NULL),
(216, '7.jpg', 'storage/19-06-2021-16240685527.jpg', '2021-06-19 04:12:09', '1', 68, NULL),
(217, '7-7.jpg', 'storage/19-06-2021-16240685527-7.jpg', '2021-06-19 04:12:09', '1', 68, NULL),
(218, '11-11.jpg', 'storage/19-06-2021-162406855211-11.jpg', '2021-06-19 04:12:09', '1', 68, NULL),
(219, '12.jpg', 'storage/19-06-2021-162406855212.jpg', '2021-06-19 04:12:09', '1', 68, NULL),
(220, '10.jpg', 'storage/19-06-2021-162406855210.jpg', '2021-06-19 04:12:09', '2', 68, NULL),
(221, '10-10.jpg', 'storage/19-06-2021-162406855210-10.jpg', '2021-06-19 04:12:09', '3', 68, NULL),
(222, '', 'storage/19-06-2021-1624068629', '2021-06-19 04:29:10', '4', NULL, 27),
(224, 'png-clipart-computer-icons-avatar-icon-design-avatar-heroes-computer-wallpaper.png', 'storage/19-06-2021-1624105914png-clipart-computer-icons-avatar-icon-design-avatar-heroes-computer-wallpaper.png', '2021-06-19 14:54:31', '4', NULL, 0),
(227, 'avatar.png', 'storage/19-06-2021-1624110391avatar.png', '2021-06-19 15:31:46', '4', NULL, 29),
(236, '', 'storage/20-06-2021-1624190781', '2021-06-20 14:21:06', '4', NULL, 31),
(237, 'avatar.png', 'storage/20-06-2021-1624191076avatar.png', '2021-06-20 14:16:11', '4', NULL, 30),
(238, '', 'storage/20-06-2021-1624191204', '2021-06-20 14:24:13', '4', NULL, 32),
(239, '', 'storage/20-06-2021-1624192626', '2021-06-20 14:06:37', '4', NULL, 33),
(242, 'avatar.png', 'storage/22-06-2021-1624364145avatar.png', '2021-06-22 14:45:15', '4', NULL, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id_user` int(11) NOT NULL,
  `token` varchar(32) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `login_tokens`
--

INSERT INTO `login_tokens` (`id_user`, `token`) VALUES
(11, '0c524b7de9ed2d7a453a7b8391200538'),
(11, '4b78b10fdd92b3720469b24df07af927'),
(11, '4cc59533c946a34c583a7e1709801765'),
(11, 'a22a111758ddd87e65caffc707ba7bed'),
(11, 'ce2d6ee7c07ffa0b37eeb8b853b65b7f'),
(11, 'f946b4429452fbd147a8bf2e3f41eead'),
(26, '6ab36b24ab6332b73bf73baff1ed7a40'),
(29, '679279da7b227fd29918ecc1394d79d0'),
(30, '4eb174216e857757e5e6a2dd26e41ecc'),
(33, '2e4ae3fcfef96ced50c42b1dd6ba9483'),
(33, '76179287a6c27d7f66641ab7e5645582');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `total` float DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `note` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `phone_number`, `email`, `address`, `total`, `order_date`, `created_by`, `note`) VALUES
(15, 'Nguyen Van A', '+84946452541', 'admin@gmail.com', '29/7 đường TL14 khu phố 3B, phường Thạnh Lộc q12', 28000000, '2021-06-20 12:55:41', 11, 'giao cuối tuần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `num`, `price`) VALUES
(6, 15, 65, 1, 10000000),
(7, 15, 66, 2, 9000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `price` float DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `thumbnail`, `content`, `id_category`, `created_at`, `updated_at`) VALUES
(65, 'Adidas EQT Cushion ADV1', 10000000, '', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: \"Open Sans\", sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-size: 12pt; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; font-family: \"Times New Roman\", serif; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; border: 0px; outline: 0px; vertical-align: baseline; font-family: \"Open Sans\", sans-serif !important;\">- Thiết kế thông minh, bảo vệ tối ưu cho những tín đồ sneakerhead mê giày </span></span></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: \"Open Sans\", sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-size: 12pt; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; font-family: \"Times New Roman\", serif; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; border: 0px; outline: 0px; vertical-align: baseline; font-family: \"Open Sans\", sans-serif !important;\">- Đế PU hiện đại chống trơn trượt</span></span></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: \"Open Sans\", sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-size: 12pt; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; font-family: \"Times New Roman\", serif; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; border: 0px; outline: 0px; vertical-align: baseline; font-family: \"Open Sans\", sans-serif !important;\">- Cấu tạọ quai và đế lót sử dụng da cho những trải nghiệm thêm sống động, đầy cảm hứng.</span></span></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: \"Open Sans\", sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-size: 12pt; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; font-family: \"Times New Roman\", serif; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; font-family: Calibri, serif; border: 0px; outline: 0px; vertical-align: baseline;\">- <span style=\"margin: 0px; padding: 0px; font-weight: 700; border: 0px; outline: 0px; vertical-align: baseline; font-family: \"Open Sans\", sans-serif !important;\">Dãy size (4</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: \"Open Sans\", sans-serif !important;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; border: 0px; outline: 0px; vertical-align: baseline;\"> sizes - size số đôi): ( 35-36 ), ( 37-38), ( 39-40), ( 41-42) tương ứng với size Giày Thể Thao</span></span></span></span></span></p>', 1, '2021-06-18 11:06:03', '2021-06-18 11:50:09'),
(66, 'NIKE ABC 50F', 9000000, '', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\">Trên nền chất liệu da thật và mẫu đế trong suốt LẦN ĐẦU TIÊN XUẤT HIỆN, Limitless chắc chắn sẽ là cái tên \"khuấy đảo\" làng thời trang và giới yêu thích sneaker.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\">Khi chính trải nghiệm thách thức khuôn khổ, lan tỏa cảm hứng, định hình văn hóa, mới là điều một nghệ sĩ trở thành biểu tượng. Lần đầu tiên, một dòng sản phẩm KHÔNG - CẦN - TÊN ra đợi hợp tác cũng chính những biểu tượng không-cần-tên của văn hóa đương đại.<br style=\"margin: 0px; padding: 0px;\">⚡️Hãy cùng Biti\'s Hunter - thương hiệu của đi và trải nghiệm đặt cược vào sức lan tỏa của trải nghiệm đích thực vượt khỏi giới hạn của chính cái tên.⚡️</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\">LƯU Ý: SẢN PHẨM MANG PHONG CÁCH CHUNKY NÊN DÃY SIZE SẼ TO HƠN SO VỚI BẢN CHUẨN! NẾU BẠN YÊU THÍCH FORM FITTING -1 SIZE, VÀ FORM CHUNKY RỘNG RÃI THÌ GIỮ ĐÚNG SỐ SIZE CHUẨN NHÉ!&nbsp;</p>', 1, '2021-06-18 12:29:59', '2021-06-18 12:29:59'),
(67, 'TEST 123', 1000000, '', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: \"Open Sans\", sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; border: 0px; outline: 0px; vertical-align: baseline;\">Giày Thể Thao Nam Biti\'s Hunter Street x VietMax | Arising Vietnam R9 Bold DSMH05600DEN</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: \"Open Sans\", sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; border: 0px; outline: 0px; vertical-align: baseline;\">1. Cảm hứng thiết kế</span></span> : Biti\'s Hunter Street, đồng sáng tạo cùng nghệ sĩ Việt Max, mang đến BST Arising Vietnam - lấy cảm hứng từ khát vọng và tiềm lực của thế hệ trẻ Việt, tự hào vươn mình cùng đất nước.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: \"Open Sans\", sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; border: 0px; outline: 0px; vertical-align: baseline;\">2. Thông tin tính năng</span></span> : </p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: \"Open Sans\", sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\">     - Lấy cảm hứng từ vị thế \"Rồng bay\", BST có ngôn ngữ thiết kế mạnh mẽ, kỳ công và độc đáo đến từng chi tiết như vảy da, chỉ viền, khoen giày, dây giày. Đặc biệt, biểu tượng Rồng trên lưỡi gà được sáng tạo từ nét hoa văn quen thuộc của Trống Đồng, đại diện cho sự song hành của bản sắc Việt và sáng tạo Việt.<br style=\"margin: 0px; padding: 0px;\">     - Phom dáng cổ thấp.<br style=\"margin: 0px; padding: 0px;\">     - Mũ quai sử dụng chất liệu Simili cao cấp hạn chế bám bẩn và thấm nước. <br style=\"margin: 0px; padding: 0px;\">     - Lót quai thun cá sấu kháng khuẩn giúp hạn chế mùi hôi và ẩm mốc. Cấu trúc lót đa lớp kết hợp xốp dày và êm ái. <br style=\"margin: 0px; padding: 0px;\">     - Lót đế trong (Insole) với chất liệu EVA cùng công nghệ ép khuôn 3D theo biên dạng bàn chân, ôm đều & định vị tốt, tránh tuột chân khi vận động mạnh. Kết hợp với chất liệu thun kháng khuẩn, giúp </p>', 1, '2021-06-19 03:07:58', '2021-06-19 04:19:08'),
(68, 'TEST 2', 2000000, '', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: \"Open Sans\", sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; border: 0px; outline: 0px; vertical-align: baseline;\">2. Thông tin tính năng</span></span> : </p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: \"Open Sans\", sans-serif; border: 0px; font-size: 14px; outline: 0px; vertical-align: baseline; line-height: 24px; color: rgb(0, 0, 0);\">     - Lấy cảm hứng từ vị thế \"Rồng bay\", BST có ngôn ngữ thiết kế mạnh mẽ, kỳ công và độc đáo đến từng chi tiết như vảy da, chỉ viền, khoen giày, dây giày. Đặc biệt, biểu tượng Rồng trên lưỡi gà được sáng tạo từ nét hoa văn quen thuộc của Trống Đồng, đại diện cho sự song hành của bản sắc Việt và sáng tạo Việt.<br style=\"margin: 0px; padding: 0px;\">     - Phom dáng cổ thấp.<br style=\"margin: 0px; padding: 0px;\">     - Mũ quai sử dụng chất liệu Simili cao cấp hạn chế bám bẩn và thấm nước. <br style=\"margin: 0px; padding: 0px;\">     - Lót quai thun cá sấu kháng khuẩn giúp hạn chế mùi hôi và ẩm mốc. Cấu trúc lót đa lớp kết hợp xốp dày và êm ái. <br style=\"margin: 0px; padding: 0px;\">     - Lót đế trong (Insole) với chất liệu EVA cùng công nghệ ép khuôn 3D theo biên dạng bàn chân, ôm đều & định vị tốt, tránh tuột chân khi vận động mạnh. Kết hợp với chất liệu thun kháng khuẩn, giúp thấm hút mồ hôi, hạn chế mùi và ẩm mốc. <br style=\"margin: 0px; padding: 0px;\">     - Đế (Outsole) với chất liệu EVA cao su R.E với tính năng mềm dẻo và nhẹ hơn rất nhiều so với cao su truyền thống, nhưng vẫn đảm bảo khả năng chịu mài mòn và va chạm. Độ Shore phù hợp, êm và nẩy tốt giúp bảo vệ và nâng đỡ bàn chân. <br style=\"margin: 0px; padding: 0px;\">     - Đế hộp cao thành ôm gọn mũ quai và liền lạc với mặt đế thành một khối giúp sản phẩm bền bỉ và linh hoạt trong mọi tình huống vận động.</p>', 1, '2021-06-19 04:12:09', '2021-06-20 14:21:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `role` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'USER',
  `address` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `created_at`, `updated_at`, `role`, `address`) VALUES
(11, 'Administrator', 'admin', '55850b7f020ca3a67eaf0b8d990a212b', 'admin@gmail.com', '2021-06-13 17:06:19', '2021-06-13 17:06:19', 'ADMIN', 'đường TL14 khu phố 3B, phường Thạnh Lộc q12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id_user`,`token`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
