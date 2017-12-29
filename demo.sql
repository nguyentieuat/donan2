-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 16, 2017 lúc 09:36 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_01_141846_create_category_table', 1),
(4, '2017_10_01_142405_create_brand_table', 1),
(5, '2017_10_01_142440_create_product_table', 1),
(6, '2017_10_01_142524_create_customer_table', 1),
(7, '2017_10_01_142744_create_listimage_table', 1),
(8, '2017_10_01_142744_create_slide_table', 1),
(9, '2017_10_01_142848_create_orders_table', 1),
(10, '2017_10_01_143315_create_order_detail_table', 1),
(11, '2017_10_01_143345_create_comment_table', 1),
(12, '2017_10_01_143345_create_news_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_brand`
--

CREATE TABLE `tb_brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_brand`
--

INSERT INTO `tb_brand` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Demo', '2017-12-08 22:45:14', '2017-12-08 22:45:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentId` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_category`
--

INSERT INTO `tb_category` (`id`, `name`, `parentId`, `created_at`, `updated_at`) VALUES
(1, 'Phòng Khách', NULL, '2017-12-08 22:49:05', '2017-12-08 22:49:05'),
(2, 'Phòng Ngủ', NULL, '2017-12-08 22:50:00', '2017-12-08 22:50:00'),
(3, 'Phòng Bếp', NULL, '2017-12-08 22:50:19', '2017-12-08 22:50:19'),
(4, 'Ghế Sofa', 1, '2017-12-08 22:50:49', '2017-12-08 22:50:49'),
(5, 'Kệ Tivi', 1, '2017-12-08 22:51:12', '2017-12-08 22:51:20'),
(6, 'Bàn Trà', 1, '2017-12-08 22:51:41', '2017-12-08 22:51:41'),
(7, 'Tủ Quần Áo', 2, '2017-12-08 22:52:03', '2017-12-08 22:52:03'),
(8, 'Giường Ngủ', 2, '2017-12-08 22:52:14', '2017-12-08 22:52:14'),
(9, 'Tủ bếp', 3, '2017-12-09 13:10:32', '2017-12-09 13:10:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_comment`
--

CREATE TABLE `tb_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` int(10) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_comment`
--

INSERT INTO `tb_comment` (`id`, `uid`, `pid`, `content`, `status`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'alert(\"Hello! I am an alert box!!\")', 0, 5.00, '2017-12-10 12:51:54', '2017-12-10 12:51:54'),
(2, 1, 1, 'My list <script>alert(\"spam spam spam!\")</script>', 1, 5.00, '2017-12-13 11:22:55', '2017-12-13 11:23:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `uid`, `name`, `gender`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-09 11:17:48', '2017-12-09 11:17:48'),
(2, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-09 11:31:41', '2017-12-09 11:31:41'),
(3, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-09 22:51:53', '2017-12-09 22:51:53'),
(4, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-09 22:52:14', '2017-12-09 22:52:14'),
(5, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-09 22:52:48', '2017-12-09 22:52:48'),
(6, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-09 23:17:18', '2017-12-09 23:17:18'),
(7, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-09 23:57:36', '2017-12-09 23:57:36'),
(8, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-14 10:29:48', '2017-12-14 10:29:48'),
(9, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-14 10:31:51', '2017-12-14 10:31:51'),
(10, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-14 10:41:58', '2017-12-14 10:41:58'),
(11, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-14 10:48:44', '2017-12-14 10:48:44'),
(12, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-14 10:50:46', '2017-12-14 10:50:46'),
(13, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-14 10:51:07', '2017-12-14 10:51:07'),
(14, 1, 'Luan Nguyen Thanh', 'nam', '0965015396', 'thanhluan.kma@gmail.com', '136 xom Chua, Tan Trieu, Thanh Tri', '2017-12-14 10:53:38', '2017-12-14 10:53:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_listimage`
--

CREATE TABLE `tb_listimage` (
  `id` int(10) UNSIGNED NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_news`
--

CREATE TABLE `tb_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `cid` int(10) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_order`
--

INSERT INTO `tb_order` (`id`, `cid`, `total`, `note`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 27900000, NULL, 'COD', '1', '2017-12-09 11:17:48', '2017-12-09 12:45:40'),
(2, 3, 4050000, NULL, 'COD', '0', '2017-12-09 22:51:53', '2017-12-09 22:51:53'),
(3, 6, 4050000, NULL, 'COD', '1', '2017-12-09 23:17:18', '2017-12-09 23:17:51'),
(4, 7, 170550000, NULL, 'COD', '0', '2017-12-09 23:57:36', '2017-12-09 23:57:36'),
(5, 8, 4320000, NULL, 'COD', '0', '2017-12-14 10:29:48', '2017-12-14 10:29:48'),
(6, 10, 4050000, NULL, 'COD', '0', '2017-12-14 10:41:58', '2017-12-14 10:41:58'),
(7, 11, 4050000, NULL, 'COD', '0', '2017-12-14 10:48:44', '2017-12-14 10:48:44'),
(8, 12, 23850000, NULL, 'COD', '0', '2017-12-14 10:50:46', '2017-12-14 10:50:46'),
(9, 14, 4050000, NULL, 'COD', '0', '2017-12-14 10:53:38', '2017-12-14 10:53:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `oid` int(10) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`id`, `oid`, `pid`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 4050000, '2017-12-09 11:17:48', '2017-12-09 11:17:48'),
(2, 1, 1, 1, 23850000, '2017-12-09 11:17:48', '2017-12-09 11:17:48'),
(3, 2, 2, 1, 4050000, '2017-12-09 22:51:53', '2017-12-09 22:51:53'),
(4, 3, 2, 1, 4050000, '2017-12-09 23:17:18', '2017-12-09 23:17:18'),
(5, 4, 4, 10, 17055000, '2017-12-09 23:57:36', '2017-12-09 23:57:36'),
(6, 5, 3, 1, 4320000, '2017-12-14 10:29:48', '2017-12-14 10:29:48'),
(7, 6, 2, 1, 4050000, '2017-12-14 10:41:58', '2017-12-14 10:41:58'),
(8, 7, 2, 1, 4050000, '2017-12-14 10:48:44', '2017-12-14 10:48:44'),
(9, 8, 1, 1, 23850000, '2017-12-14 10:50:46', '2017-12-14 10:50:46'),
(10, 9, 2, 1, 4050000, '2017-12-14 10:53:38', '2017-12-14 10:53:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cid` int(10) UNSIGNED NOT NULL,
  `bid` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_price` double NOT NULL,
  `p_price` double NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_material` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarentee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` float NOT NULL,
  `view` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_product`
--

INSERT INTO `tb_product` (`id`, `name`, `cid`, `bid`, `description`, `u_price`, `p_price`, `images`, `size`, `main_material`, `guarentee`, `date`, `qty`, `rate`, `view`, `sold`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SOFA GỖ HÀN QUỐC PS072', 4, 1, '<div style=\"box-sizing: border-box; color: rgb(137, 137, 137); font-family: Roboto, sans-serif; text-align: justify;\">\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><span style=\"font-size:16px\"><a href=\"http://dogophuongnam.com.vn/noi-that/phong-khach/sofa-go.html\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(51, 122, 183); text-decoration-line: none;\">SOFA GỖ HÀN QUỐC PS072</a></span></span></span></p>\r\n</div>\r\n\r\n<h2><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\">Đối với những đôi vợ chồng năng động, trẻ trung thì SOFA GỖ HÀN QUỐC PS072 là lựa chọn số 1 cho không gian phòng khách.</span></span></h2>\r\n\r\n<div style=\"box-sizing: border-box; color: rgb(137, 137, 137); font-family: Roboto, sans-serif; text-align: justify;\">\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\">Lịch lãm và trang nhã, đơn giản mà&nbsp;vẫn toát lên vẻ đẹp cho không gian phòng khách.&nbsp;&nbsp; &nbsp;</span></span></p>\r\n</div>\r\n\r\n<div style=\"box-sizing: border-box; color: rgb(137, 137, 137); font-family: Roboto, sans-serif; text-align: justify;\">\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\">Sofa gỗ là một trong những xu hướng mới nhất của&nbsp;năm 2016 và 2017.&nbsp;Với mỗi bộ sofa gỗ cao cấp mà&nbsp;<strong>Nội thất Phương Nam</strong>&nbsp;đưa ra thị trường, đội ngũ thiết kế của chúng tôi&nbsp;đã trải qua quá trình nghiên cứu tỉ mỉ, chi tiết để cho ra những mẫu sofa đẹp nhất, chất lượng nhất.&nbsp;&nbsp;</span></span></p>\r\n</div>\r\n\r\n<div style=\"box-sizing: border-box; color: rgb(137, 137, 137); font-family: Roboto, sans-serif; text-align: justify;\">\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Nội Thất Phương Nam</strong>&nbsp;sẽ mang đến những bộ&nbsp;<strong>Sofa Hiện Đại</strong>&nbsp;nhất mang phong cách trẻ trung nhất tới khách hàng</span></span></p>\r\n</div>\r\n\r\n<div style=\"box-sizing: border-box; color: rgb(137, 137, 137); font-family: Roboto, sans-serif; text-align: center;\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"tr-caption-container\" style=\"background-color:transparent; border-collapse:collapse; border-spacing:0px; box-sizing:border-box; margin-left:auto; margin-right:auto\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><img alt=\"Nội thất gỗ tại Hà Nội, Phương Nam địa chỉ bán sofa gỗ uy tín tại Hà Nội\" src=\"https://dogophuongnam.com.vn/data/images/new%20page/Sf%20go/PS072/sofa%20go%202%20cho%20han%20quoc%20ps072%20-%20sofa%20go%20ha%20noi%20%20sofa%20go%20ha%20noi.jpg\" style=\"border:0px; box-sizing:border-box; height:575px; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle; width:779px\" title=\"\" /></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<h3><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><em>Thiết kế đơn giản mà lịch lãm</em></span></span></h3>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"tr-caption-container\" style=\"background-color:transparent; border-collapse:collapse; border-spacing:0px; box-sizing:border-box; margin-left:auto; margin-right:auto\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><img alt=\"Đồ gỗ nội thất cao cấp tại Hà Nội. Phương Nam cung cấp các sản phẩm mẫu mã độc quyền tới tay người tiêu dùng\" src=\"https://dogophuongnam.com.vn/data/images/new%20page/Sf%20go/PS072/sofa%20go%202%20cho%20han%20quoc%20ps072%20-%20sofa%20go%20ha%20noi%20%20sofa%20go%20ha%20noi%20(2).jpg\" style=\"border:0px; box-sizing:border-box; height:575px; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle; width:819px\" title=\"\" /></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<h3><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><em>Thiết kế vuông vắn, cứng cáp</em></span></span></h3>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"tr-caption-container\" style=\"background-color:transparent; border-collapse:collapse; border-spacing:0px; box-sizing:border-box; margin-left:auto; margin-right:auto\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><img alt=\"Sofa gỗ cao cấp tại Hà Nội\" src=\"https://dogophuongnam.com.vn/data/images/new%20page/Sf%20go/PS072/sofa%20go%202%20cho%20han%20quoc%20ps072%20-%20sofa%20go%20ha%20noi%20%20sofa%20go%20ha%20noi%20(4).jpg\" style=\"border:0px; box-sizing:border-box; height:609px; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle; width:800px\" title=\"\" /></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<h3><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><em>Phương Nam đi đầu trong việc thiết kế các sản phẩm mới, phong cách hiện đại</em></span></span></h3>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"tr-caption-container\" style=\"background-color:transparent; border-collapse:collapse; border-spacing:0px; box-sizing:border-box; margin-left:auto; margin-right:auto\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><img alt=\"Chất liệu bọc cao cấp, đa dạng mẫu mã\" src=\"https://dogophuongnam.com.vn/data/images/new%20page/Sf%20go/PS072/sofa%20go%202%20cho%20han%20quoc%20ps072%20-%20sofa%20go%20ha%20noi%20%20sofa%20go%20ha%20noi%20(3).jpg\" style=\"border:0px; box-sizing:border-box; height:575px; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle; width:800px\" title=\"\" /></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<h3><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><em>Trẻ trung, năng động phù hợp nhiều không gian phòng khách</em></span></span></h3>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', 26500000, 23850000, 'liHspJ_1.jpg', '2,200 x 2,200 x 850', 'Gỗ Sồi tự nhiên + Nỉ Thổ Nhĩ Kỳ + Mút Nhật', '12 tháng', '2017-12-09', 100, 5, 0, 2, 1, '2017-12-08 23:36:20', '2017-12-09 12:45:40'),
(2, 'BÀN TRÀ GỖ KÍNH PN007', 6, 1, '<p><span style=\"background-color:rgb(251, 249, 249); color:rgb(137, 137, 137); font-family:roboto,sans-serif; font-size:16px\">Màu sắc gỗ tự nhiên, vân gỗ rõ nét, mặt kính dày bền đẹp, phù hợp nhiều không gian nội thất.</span></p>', 4500000, 4050000, 'OB0t55_2.jpg', '1,100 x 550', 'Gỗ sồi Mỹ', '12 tháng', '2017-12-09', 11, 5, 0, 3, 1, '2017-12-09 00:02:25', '2017-12-09 23:17:51'),
(3, 'KỆ TIVI CAO CẤP PT021', 5, 1, '<p><span style=\"background-color:rgb(251, 249, 249); color:rgb(137, 137, 137); font-family:roboto,sans-serif; font-size:16px\">Thiết kế hiện đại, màu sác tươi sáng phù hợp với những phòng khách hiện đại, trẻ trung.</span></p>', 5400000, 4320000, 'l4ZpIf_3.jpg', '2,000 x 400', 'MDF An Cường cốt xanh chịu nước', '12 tháng', '2017-12-09', 11, 5, 0, 0, 1, '2017-12-09 00:04:12', '2017-12-09 00:04:12'),
(4, 'SOFA GÓC DA PS070', 4, 1, '<p><span style=\"background-color:rgb(251, 249, 249); color:rgb(137, 137, 137); font-family:roboto,sans-serif; font-size:16px\">Bộ Sofa góc da PS070 mềm mại, uyển chuyển và đẹp mắt.&nbsp;</span><br />\r\n<span style=\"background-color:rgb(251, 249, 249); color:rgb(137, 137, 137); font-family:roboto,sans-serif; font-size:16px\">Sản phẩm được tạo nên từ những nguyên vật liệu nhập khẩu tốt nhất</span></p>', 18950000, 17055000, 'sOfmpM_2.jpg', '2,700 x 1,600', 'Gỗ Sồi tự nhiên + Da Nhật Bản + Mút Nhật Bản', '12 tháng', '2017-12-09', 11, 5, 0, 0, 1, '2017-12-09 00:07:14', '2017-12-09 00:07:14'),
(5, 'TỦ QUẦN ÁO HIỆN ĐẠI PQ001', 7, 1, '<p><a href=\"tel:0937 236 686 - 0911 713 888\" style=\"box-sizing: border-box; background-color: rgb(251, 249, 249); color: rgb(51, 122, 183); text-decoration-line: none; font-family: Roboto, sans-serif; font-size: 16px; font-weight: bold;\">Hotline</a>&nbsp;<a href=\"http://demo.local:8080/\" style=\"font-family: &quot;Open Sans&quot;, sans-serif; background: transparent; box-sizing: border-box; margin: 0px; padding: 0px 20px; outline: none; color: rgb(96, 99, 102); text-decoration-line: none; border: none; vertical-align: baseline; transition: all 0.2s ease-in-out; line-height: 47px; height: 47px; display: inline !important;\">&nbsp;09999999999</a></p>\r\n\r\n<div class=\"pull-right auto-width-right\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif;\">&nbsp;</div>', 0, 0, 'eb5Cci_1.JPG', '0', '0', '0', '2017-12-09', 11, 5, 0, 0, 1, '2017-12-09 00:16:22', '2017-12-09 00:16:22'),
(6, 'TỦ BẾP PB003', 9, 1, '<p><a href=\"tel:0937 236 686 - 0911 713 888\" style=\"box-sizing: border-box; background-color: rgb(251, 249, 249); color: rgb(51, 122, 183); text-decoration-line: none; font-family: Roboto, sans-serif; font-size: 16px; font-weight: bold;\">Hotline 0937 236 686 - 0911 713 888</a></p>', 0, 0, 'xUmpTH_4.jpg', '0', '0', '12 tháng', '2017-12-14', 1, 5, 0, 0, 1, '2017-12-14 08:10:50', '2017-12-14 08:10:50'),
(7, 'MẪU GIƯỜNG GỖ ĐẸP GỖ TỰ NHIÊN GHS-987', 8, 1, '<h2><span style=\"color:rgb(0, 0, 0); font-size:18pt\"><strong>THÔNG TIN CHI TI</strong><strong>ẾT&nbsp;</strong><strong>V</strong><strong>Ề</strong><strong>&nbsp;M</strong><strong>Ẫ</strong><strong>U GI</strong><strong>ƯỜ</strong><strong>NG GỖ ĐẸP HIỆN ĐẠI</strong><strong>&nbsp;GHS-986</strong></span></h2>\r\n\r\n<p><span style=\"font-size:14pt\"><strong>Mã s</strong><strong>ả</strong><strong>n ph</strong><strong>ẩ</strong><strong>m:</strong>&nbsp;GHS-987</span></p>\r\n\r\n<p><span style=\"font-size:14pt\"><strong>H</strong><strong>ướ</strong><strong>ng</strong><strong>&nbsp;d</strong><strong>ẫ</strong><strong>n s</strong><strong>ử</strong><strong>&nbsp;d</strong><strong>ụ</strong><strong>ng:&nbsp;</strong>Mẫu giường gỗ đẹp tự nhiên tạo cảm giác sang trọng, thanh lịch cho phòng ngủ của bạn.</span></p>\r\n\r\n<p><span style=\"font-size:14pt\"><strong>Kích th</strong><strong>ướ</strong><strong>c:&nbsp;&nbsp;</strong>(D) 2330 x (R) 1820 x (C) 1100mm</span></p>\r\n\r\n<p><span style=\"font-size:14pt\"><strong>Ch</strong><strong>ấ</strong><strong>t li</strong><strong>ệ</strong><strong>u:</strong>&nbsp;Gỗ sồi tự nhiên</span></p>\r\n\r\n<p><span style=\"font-size:14pt\"><strong>Màu s</strong><strong>ắ</strong><strong>c :</strong>&nbsp;phun bấm màu tùy lựa</span></p>\r\n\r\n<p><span style=\"font-size:14pt\"><strong>B</strong><strong>ả</strong><strong>o hành:</strong>&nbsp;12 tháng</span></p>\r\n\r\n<p><span style=\"font-size:14pt\"><strong>Th</strong><strong>ờ</strong><strong>i gian nh</strong><strong>ậ</strong><strong>n hàng:</strong>&nbsp;từ 12 – 15 ngày</span></p>', 14000000, 0, 'GafljD_5.jpg', '(D) 2330 x (R) 1820 x (C) 1100mm', 'Gỗ sồi tự nhiên', '12 tháng', '2017-12-14', 2, 5, 0, 0, 1, '2017-12-14 08:20:13', '2017-12-14 08:20:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_slide`
--

CREATE TABLE `tb_slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordinal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_slide`
--

INSERT INTO `tb_slide` (`id`, `image`, `link`, `ordinal`, `created_at`, `updated_at`) VALUES
(1, 'm3tASA_slide1.jpg', 'index', 1, '2017-12-08 22:56:43', '2017-12-08 22:56:43'),
(2, '6ESock_slide2.jpg', 'index', 2, '2017-12-08 22:56:58', '2017-12-08 22:56:58'),
(3, 'oSHkjz_slide3.jpg', 'index', 3, '2017-12-08 22:57:07', '2017-12-08 22:57:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `email`, `password`, `phone`, `avatar`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Luan Nguyen Thanh', 'thanhluan.kma@gmail.com', '$2y$10$h1t/hoQenfcK/5cpQXZ0teU7j7mzwahdqQCyAoeiY1O6Texrtz00q', '0965015396', NULL, 0, 1, 'JtpwELJVcjtkNVoS3JPglkoUkhOHLpT6JZeQmC2sOnCPQxCuGFchz0Y1FAkM', '2017-12-09 10:51:51', '2017-12-09 10:51:51'),
(2, 'Luan Nguyen Thanh', 'thanhluan.kma@gmail.com1', '$2y$10$IIs/a71GWbcv7c5iZ9CKvOvht3EcQx30X2j2HOZ4gG4jbgtjthTg2', '0965015397', NULL, 1, 1, '5m8iT7YFebTkMmD5bPc2XZoeMlUhHaZPzIxixlJUXbRAu9UvtwYD6otm3WNb', '2017-12-09 11:44:18', '2017-12-09 11:44:18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_category_parentid_foreign` (`parentId`);

--
-- Chỉ mục cho bảng `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_comment_uid_foreign` (`uid`),
  ADD KEY `tb_comment_pid_foreign` (`pid`);

--
-- Chỉ mục cho bảng `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_customer_uid_foreign` (`uid`);

--
-- Chỉ mục cho bảng `tb_listimage`
--
ALTER TABLE `tb_listimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_listimage_pid_foreign` (`pid`);

--
-- Chỉ mục cho bảng `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_order_cid_foreign` (`cid`);

--
-- Chỉ mục cho bảng `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_order_detail_oid_foreign` (`oid`),
  ADD KEY `tb_order_detail_pid_foreign` (`pid`);

--
-- Chỉ mục cho bảng `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_product_cid_foreign` (`cid`),
  ADD KEY `tb_product_bid_foreign` (`bid`);

--
-- Chỉ mục cho bảng `tb_slide`
--
ALTER TABLE `tb_slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_user_email_unique` (`email`),
  ADD UNIQUE KEY `tb_user_phone_unique` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `tb_listimage`
--
ALTER TABLE `tb_listimage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `tb_slide`
--
ALTER TABLE `tb_slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_category`
--
ALTER TABLE `tb_category`
  ADD CONSTRAINT `tb_category_parentid_foreign` FOREIGN KEY (`parentId`) REFERENCES `tb_category` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD CONSTRAINT `tb_comment_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `tb_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_comment_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD CONSTRAINT `tb_customer_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `tb_user` (`id`);

--
-- Các ràng buộc cho bảng `tb_listimage`
--
ALTER TABLE `tb_listimage`
  ADD CONSTRAINT `tb_listimage_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `tb_product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `tb_customer` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD CONSTRAINT `tb_order_detail_oid_foreign` FOREIGN KEY (`oid`) REFERENCES `tb_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_order_detail_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `tb_product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `tb_product_bid_foreign` FOREIGN KEY (`bid`) REFERENCES `tb_brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_product_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `tb_category` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
