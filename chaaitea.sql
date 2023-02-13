-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2023 at 05:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chaaitea`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_30_151711_create_table_category', 1),
(6, '2022_10_31_164038_add_status_field_to_table_category', 1),
(7, '2022_11_01_151429_rename_status_in_table_category', 1),
(8, '2022_11_01_155050_rename_status_category_in_table_category', 1),
(9, '2022_11_05_072246_create_table_product', 1),
(10, '2022_11_05_090641_create_table_product_detail', 1),
(11, '2022_11_07_133357_drop_product_detail_id_from_table_product', 1),
(12, '2022_11_12_141045_alter_table_table_product_detail_change_column_product_detail_origin', 1),
(13, '2022_11_15_155235_create_table_product_photos', 1),
(14, '2022_11_15_163945_add_product_id_to_table_product_photos', 1),
(15, '2022_11_19_180234_rename_user', 1),
(16, '2022_11_19_181323_add_role_to_table_user', 1),
(17, '2022_11_19_181559_add_phone_to_table_user', 1),
(18, '2022_11_19_181959_add_address_to_table_user', 1),
(19, '2022_11_28_140237_add_gender_to_table_user', 2),
(20, '2022_11_28_144125_add_product_intro_to_table_product_detail', 3),
(21, '2022_11_28_174146_alter_tbl_change_colums_gender', 4),
(22, '2022_11_29_153541_add_verify_to_table_user', 5),
(23, '2022_11_29_154035_add_verify_token_to_table_user', 5),
(24, '2022_11_29_160019_alter_table_table_user_change_column_adđress', 6),
(25, '2022_12_15_153914_add_user_img_to_table_user', 7),
(26, '2022_12_17_074419_create_table_table_order', 8),
(27, '2022_12_17_075559_create_table_order_product', 8),
(28, '2022_12_17_095550_add_order_date_to_table_order', 9),
(29, '2022_12_17_101001_add_order_staust_to_table_order', 10),
(30, '2022_12_17_113639_add_method_payment_to_table_order', 11),
(31, '2022_12_17_115253_add_total_quantity_to_order_product', 12),
(32, '2022_12_17_143628_rename_total_quantity_in_table_order_product', 13),
(33, '2022_12_17_144014_add_total_quantity_to_table_order', 13);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(22, 27, 5, '1', NULL, NULL),
(23, 27, 4, '1', NULL, NULL),
(24, 27, 3, '2', NULL, NULL),
(25, 28, 4, '1', NULL, NULL),
(26, 29, 2, '1', NULL, NULL),
(27, 29, 4, '1', NULL, NULL),
(28, 30, 4, '1', NULL, NULL),
(29, 31, 3, '1', NULL, NULL),
(30, 31, 4, '1', NULL, NULL),
(31, 32, 5, '1', NULL, NULL),
(32, 33, 4, '1', NULL, NULL),
(33, 34, 4, '2', NULL, NULL),
(34, 35, 4, '1', NULL, NULL),
(35, 36, 1, '1', NULL, NULL),
(36, 37, 1, '1', NULL, NULL),
(37, 38, 1, '1', NULL, NULL),
(38, 39, 3, '1', NULL, NULL),
(39, 39, 2, '1', NULL, NULL),
(40, 39, 1, '2', NULL, NULL),
(41, 40, 5, '1', NULL, NULL),
(42, 41, 3, '1', NULL, NULL),
(43, 41, 2, '1', NULL, NULL),
(44, 41, 1, '1', NULL, NULL),
(45, 42, 1, '1', NULL, NULL),
(46, 42, 5, '1', NULL, NULL),
(47, 43, 4, '1', NULL, NULL),
(48, 43, 3, '1', NULL, NULL),
(49, 43, 1, '1', NULL, NULL),
(50, 44, 4, '1', NULL, NULL),
(51, 44, 3, '1', NULL, NULL),
(52, 44, 2, '1', NULL, NULL),
(53, 45, 3, '4', NULL, NULL),
(54, 46, 10, '2', NULL, NULL),
(55, 46, 11, '1', NULL, NULL),
(56, 46, 9, '1', NULL, NULL),
(57, 47, 9, '1', NULL, NULL),
(58, 47, 7, '1', NULL, NULL),
(59, 47, 12, '1', NULL, NULL),
(60, 48, 10, '1', NULL, NULL),
(61, 48, 9, '1', NULL, NULL),
(62, 49, 11, '1', NULL, NULL),
(63, 49, 10, '2', NULL, NULL),
(64, 50, 7, '2', NULL, NULL),
(65, 51, 9, '1', NULL, NULL),
(66, 51, 8, '1', NULL, NULL),
(67, 52, 13, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(4, 'Trà Xanh', 'Các chuyên gia của Trà Việt đi khắp các vùng trà từ Tây Bắc, Thái Nguyên đến Bảo Lộc để lựa chọn ra 12 loại trà xanh cao cấp nhất Việt Nam', 1, '2023-01-04 10:21:47', '2023-01-04 10:21:47'),
(5, 'Trà Thảo Mộc', 'Trà nguyên lá chất lượng – Không caffein – Túi lưới bột ngô pyramid an toàn', 1, '2023-01-04 10:44:30', '2023-01-04 10:44:30'),
(6, 'Trà Nở Hoa', 'Nhưng viên trà phổ nhĩ bung nở khi pha, thay lời chúc đẹp đẽ từ những sắc mầu yêu thương: tình yêu như hoa hồng, chân thành tựa cúc trắng, cao thượng sánh hoa ly, sắc đẹp ví hoa lài, phú quý ngàn mẫu đơn.', 1, '2023-01-04 10:54:02', '2023-01-04 10:57:27'),
(7, 'Trà Sữa', 'ađâđ', 1, '2023-01-08 06:24:01', '2023-01-08 06:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `reciver` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `total_money` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(30) NOT NULL,
  `method_payment` varchar(255) NOT NULL,
  `total_quantity` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`order_id`, `reciver`, `phone`, `address`, `total_money`, `order_date`, `order_status`, `method_payment`, `total_quantity`, `id`, `created_at`, `updated_at`) VALUES
(46, 'Nguyễn Hoài Bảo', 987846536, 'Tỉnh Bắc Kạn, Huyện Ba Bể, Xã Mỹ Phương, 454', 1409000, '2023-01-04', 'đã hoàn thành', 'Tiền mặc', '4', 78, NULL, NULL),
(47, 'Nguyễn Hoài Bảo', 987846536, 'Tỉnh Bắc Kạn, Huyện Ba Bể, Xã Mỹ Phương, 454', 929000, '2023-01-04', 'đang giao hàng', 'Tiền mặc', '3', 78, NULL, NULL),
(48, 'Nguyễn Hoàng Khang', 958746532, 'Tỉnh Bắc Ninh, Huyện Yên Phong, Xã Yên Trung, 432', 817000, '2023-01-04', 'đang giao hàng', 'Tiền mặc', '2', 77, NULL, NULL),
(49, 'Nguyễn Hoàng Khang', 958746532, 'Tỉnh Bắc Ninh, Huyện Yên Phong, Xã Yên Trung, 432', 937000, '2023-01-04', 'đang xử lí', 'Thẻ tín dụng', '3', 77, NULL, NULL),
(50, 'Phan Tấn Duy', 886514681, 'Tỉnh Yên Bái, Huyện Văn Yên, Xã Yên Thái, 322', 480000, '2023-01-08', 'đã hoàn thành', 'Tiền mặc', '2', 79, NULL, NULL),
(51, 'Phan Tấn Duy', 886514681, 'Tỉnh Yên Bái, Huyện Văn Yên, Xã Yên Thái, 322', 750000, '2023-01-09', 'đang xử lí', 'Tiền mặc', '2', 79, NULL, NULL),
(52, 'Phan Tấn Duy', 886514681, 'Tỉnh Yên Bái, Huyện Văn Yên, Xã Yên Thái, 322', 257000, '2023-01-09', 'đang xử lí', 'Tiền mặc', '1', 79, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_status` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`product_id`, `product_name`, `product_price`, `product_status`, `category_id`) VALUES
(7, 'Trà Ô Long', 240000, 1, 4),
(8, 'Trà Cổ Thụ', 278000, 1, 4),
(9, 'Hồng trà Hà Giang', 472000, 1, 4),
(10, 'Trà Nõn Tôm', 345000, 1, 4),
(11, 'Trà Bạc Hà', 247000, 1, 5),
(12, 'Trà Cà Phê', 217000, 1, 5),
(13, 'Trà Gạo Lứt', 257000, 1, 5),
(14, 'Trà Phổ Nhĩ', 283000, 1, 6),
(15, 'Trà Shan Tuyết', 495000, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `table_product_detail`
--

CREATE TABLE `table_product_detail` (
  `product_detail_id` int(10) UNSIGNED NOT NULL,
  `product_detail_intro` text NOT NULL,
  `product_detail_desc` text NOT NULL,
  `product_detail_weight` int(11) NOT NULL,
  `product_detail_mfg` date NOT NULL,
  `product_detail_exp` int(11) NOT NULL,
  `product_detail_origin` varchar(255) NOT NULL,
  `product_detail_manual` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_product_detail`
--

INSERT INTO `table_product_detail` (`product_detail_id`, `product_detail_intro`, `product_detail_desc`, `product_detail_weight`, `product_detail_mfg`, `product_detail_exp`, `product_detail_origin`, `product_detail_manual`, `product_id`, `created_at`, `updated_at`) VALUES
(6, 'Từ rất lâu rồi, ở vùng núi sâu An Khê Phúc Kiến, có người thợ săn tên là Hồ Lương. Một ngày trở về nhà sau khi săn thú, mặt trời lên cao, thời tiết nóng nực. Hồ Lương sợ thịt ôi hỏng, bèn tiện tay ngắt vài lá cây ven đường che đậy. Sau lại thấy nhà mình có mùi hương thơm ngát. Tìm quanh quẩn trong ngoài, mới biết hương thơm tỏa ra từ lá cây đã ngắt. Anh dùng lá cây ngâm vào nước, uống thấy tinh thần sảng khoái.\r\n\r\nHồ Lương không quản đường xa, tìm tới nơi, đào cây mang về trồng. Nhưng mùi vị pha không giống như trước. Anh suy nghĩ mông lung, rồi hiểu rằng, lá trà phải phơi nắng, gia công rồi mới có hương thơm. ”Hồ Lương” phát âm ngôn ngữ địa phương gần giống ”Ô Long”. Người dân trong vùng ghi nhớ công lao Hồ Lương liền gọi loại trà này là ”Trà Ô Long”.', 'Từ đồn điền vùng Bảo Lộc, giống cây Tứ Quý. Lên men 30%, vị chát nhẹ. Màu nước vàng sóng sánh. Mùi thơm mạnh, hậu đậm, pha được nhiều lần nước. Phù hợp tặng người coi trọng hương vị.', 42, '2023-01-01', 12, 'Bảo Lộc', 'Bảo quản nơi thoáng mát', 7, '2023-01-04 10:25:47', '2023-01-04 10:25:47'),
(7, 'Trà cổ thụ Tà Xùa là loại trà được làm từ búp và lá của những cây trà có tuổi thọ hàng trăm năm ở vùng núi Tà Xùa – Sơn La. Trà được sản xuất thủ công bởi những người dân tộc H’Mông. Tà Xùa là vùng núi cao, quanh năm có mây mù bao phủ, nhiệt độ chênh lệch giữa ngày và đêm khá lớn. Điều này góp phần tạo nên một loại trà rất chất lượng, mang hương vị đặc trưng của núi rừng Tây Bắc.', 'Được thu hái từ những cây trà hàng trăm năm tuổi mọc ở đỉnh núi Tà Xùa – Sơn La. Là loại trà sạch, hoàn toàn không có sự tác động của con người. Trà có hương thơm lạ, phảng phất mùi khói bếp, màu nước vàng, sánh như mật ong. Vị chát đượm, hậu ngọt và lưu giữ hậu vị rất lâu. Phù hợp tặng cho người sành trà.', 42, '2023-01-02', 12, 'Tà Xùa, Sơn La', 'Bảo quản nơi khô ráo', 8, '2023-01-04 10:34:20', '2023-01-04 10:34:20'),
(8, 'Hồng trà là một dòng sản phẩm cao cấp của trà đen. Nó tuyển chọn từ những búp non của cây chè cổ thụ bên sườn núi, trải qua một quá trình oxy hóa đặc biệt để tạo ra những sợi trà thơm ngát hương rừng.  Hồng Trà là món quà thiên nhiên ban tặng cho những ai đủ tinh tế để thưởng thức nó.\r\n\r\nHồng trà Hà Giang – một trong những đặc sản của giới sành trà Việt Nam. Trà Việt sẽ bật mí cho bạn cách mà hồng trà đi từ ngọn cây cổ thụ phủ sương đến bàn tiệc của giới thượng lưu. Rồi bạn sẽ biết, vì sao chúng tôi gọi hồng trà là thượng phẩm của trà đen.', 'Hồng Trà được chế biến từ loại trà cổ thụ của Hà Giang – nơi sản sinh ra những loại trà ngon bậc nhất Việt Nam. Là loại trà có độ oxy hoá cao, tạo nên hương vị phong phú hơn hẳn dòng trà xanh Độ đậm chát giảm, hương thơm ngọt như mùi mật ong rừng. Có thể pha từ 5 – 7 lần nước. Dành cho người sành trà và người ưa thích những trải nghiệm một mùi vị mới mẻ.', 42, '2023-01-03', 12, 'Hà Giang', 'Bảo quản nơi khô ráo', 9, '2023-01-04 10:37:37', '2023-01-04 10:37:37'),
(9, 'Trà Nõn Tôm, hay còn gọi là trà nõn, trà đinh, trà Tân Cương Thái Nguyên, chè Thái Nguyên… Đây là loại trà thượng phẩm của trà Thái Nguyên. Là loại trà mà bất cứ người sành trà nào cũng biết đến và cực kì ưa chuộng.', 'Là loại trà thượng hạng của Tân Cương – Thái Nguyên.\r\nSợi trà nhỏ xíu, xoăn, chắc.\r\nNước trà xanh, vị chát đậm, hậu ngọt kéo dài.\r\nHương thơm cốm non đặc trưng lan toả mạnh mẽ\r\nPhù hợp tặng những người sành trà, đặc biệt là người miền Bắc bởi hương vị quen thuộc.', 42, '2023-01-03', 12, 'Thái Nguyên', 'Bảo quản nơi khô ráo', 10, '2023-01-04 10:42:19', '2023-01-04 10:42:19'),
(10, 'Bạc hà là một loại thảo mộc thơm đã được sử dụng hàng ngàn năm vì hương vị the mát sảng khoái và nhiều lợi cho sức khỏe. Bạn sẽ thấy nó xuất hiện trong thành phần của các sản phẩm tạo hương cho hơi thở, như kẹo và trà.\r\n\r\nNhiều người tiêu thụ trà bạc hà như một thức nước giải khát không chứa caffeine. Tại ChaaiTea, thức uống này đã trở nên sáng tạo hơn với sự bổ sung hương hoa lài cho trà thêm nồng nàn.', 'Sự kết hợp giữa bạc hà, hoa lài, cỏ ngọt.\r\nNăng lượng cho một ngày mới tươi\r\nCăng thẳng và âu lo\r\nGiúp bạn đẹp hơn từng ngày\r\nDành tặng quà cho những người Phụ Nữ mà bạn rất quý trọng.', 42, '2023-01-01', 12, 'Bảo Lộc', 'Bảo quản nơi khô ráo', 11, '2023-01-04 10:46:34', '2023-01-04 10:46:34'),
(11, 'Trà cà phê của Trà Việt là sự kết hợp độc đáo của hạt cà phê, hồng trà và cỏ ngọt. Hương thơm đặc trưng của loại trà này chắc chắn sẽ khiến bạn hài lòng như một tách cà phê sáng, hoặc thậm chí còn tốt hơn. Trà Cà Phê sẽ giúp não trạng của bạn tỉnh táo để bắt đầu một buổi sáng tràn đầy năng lượng.', 'Là sự kết hợp của trà, cà phê và cỏ ngọt.\r\nHương thơm đặc trưng của trà cà phê chắc chắn sẽ khiến bạn hài lòng như một tách cà phê sáng, hoặc thậm chí còn tốt hơn.\r\nTrà Cà Phê sẽ giúp não trạng của bạn tỉnh táo để bắt đầu một buổi sáng tràn đầy năng lượng.\r\nNgoài ra, cà phê còn giúp giảm nguy cơ bị Alzheimer, Parkinson, tiểu đường loại 2, và các chứng bệnh về gan.\r\nDo đó nếu bạn muốn giữ tâm trạng vui tươi mỗi ngày, thì Trà Cà Phê chính là loại trà bạn nên chọn đó.', 42, '2023-01-01', 12, 'Bảo Lộc', 'Bảo quản nơi khô ráo', 12, '2023-01-04 10:50:05', '2023-01-04 10:50:05'),
(12, 'Thời gian gần đây, nhiều người theo chế độ ăn uống lành mạnh có xu hướng tiêu thụ gạo lứt nhiều hơn. Các bằng chứng khoa học cho thấy nó có hàm lượng tinh bột thấp và giàu chất xơ.\r\n\r\nThông thường, người ta đun sôi nước gạo lứt rang để uống. Tuy nhiên, nước gạo lứt rang khá khó uống vì nó không có nhiều hương vị. \r\n\r\nChaaiTea đã sáng tạo một công thức trà gạo lứt độc đáo không chỉ tăng cường lợi ích sức khỏe mà còn có hương vị khiến bạn yêu thích.', 'Được kết hợp từ gạo lứt, cỏ ngọt và hồng trà.\r\nCó mùi thơm của gạo, vị ngọt thanh.\r\nGiúp giảm cholesterol xấu, và để tăng cường sức khoẻ của những người bị bệnh tim và tiểu đường.\r\nUống thường xuyên để hạn chế nguy cơ bị béo phì, và giữ làn da sáng đẹp.\r\nPhù hợp cho phụ nữ và người lớn tuổi.', 42, '2023-01-01', 12, 'Bảo Lộc', 'Bảo quản nơi khô ráo', 13, '2023-01-04 10:52:13', '2023-01-04 10:52:13'),
(13, 'Những búp trà non từ cây trà cổ thụ lâu năm, được lên men đặc biệt được gọi là trà phổ nhĩ, chuyển hóa những chất đắng chát trở nên mềm đượm giầu phẩm chất.\r\n\r\nSau đó, những búp trà được kết khéo léo như bông hoa, với trung tâm là một loại hoa thơm quyến rũ, là hoa lài, hoa cúc, hoa hồng, mẫu đơn và ly ly. Thàh phẩm là những viên tròn lạ mắt như long châu.\r\n\r\nKhi pha trong nước, viên trà tròn dần nở ra, những búp trà dần duỗi mở tạo hiệu ứng như bông hoa bung nở từng cách, bông hoa kết tại trung tâm là phần rực rỡ nhất xuất hiện sau cùng, tạo nên phần kết mãn nhãn đầy sắc màu thú vị.', 'Loại trà được kỳ công đan kết từ những búp trà phổ nhĩ chất lương cao và hoa thơm, tạo thành một viên long châu, sẽ dần bung ra kỳ diệu như hoa hở khi pha trà. 5 loại hoa gồm hoa cúc, hoa lài, hoa mẫu đơn, hoa hồng và hoa ly. Mỗi hộp quà sẽ là bộ sưu tập đủ 5 loại hoa đầy màu sắc, khiến bạn không hết kinh ngạc vì hết lần này đến lần khác khi pha.', 42, '2023-01-10', 12, 'Hà Giang', 'Bảo quản nơi khô ráo', 14, '2023-01-04 10:55:47', '2023-01-04 10:55:47'),
(14, 'Trà Shan Tuyết là tên gọi để chỉ loại trà mọc trên núi cao. “Shan” là giống trà, cũng có nghĩa là “sơn” / núi theo cách giải thích của người bản địa. “Tuyết” là để chỉ những búp trà có lớp lông tơ trắng muốt bao phủ bên ngoài.', 'Đây là loại trà cổ thụ đặc biệt của vùng Tây Bắc Việt Nam\r\nThu hái : 1 búp non trên đầu\r\nPhẩm chất tốt : nước vàng óng, vị đậm, hương thơm mạnh, hậu ngọt.\r\nNhững búp trà săn chắc, trên bề mặt búp phủ một lớp lông tơ óng ánh bạc, phảng phất mùi tươi mới của núi rừng.\r\nPhù hợp tặng cho người sành trà', 42, '2023-01-01', 12, 'Tà Xùa, Sơn La', 'ko có', 15, '2023-01-08 06:26:57', '2023-01-08 06:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `table_product_photos`
--

CREATE TABLE `table_product_photos` (
  `product_photos_id` int(10) UNSIGNED NOT NULL,
  `product_photo_1st` varchar(255) NOT NULL,
  `product_photo_2nd` varchar(255) NOT NULL,
  `product_photo_3rd` varchar(255) NOT NULL,
  `product_photo_4th` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_product_photos`
--

INSERT INTO `table_product_photos` (`product_photos_id`, `product_photo_1st`, `product_photo_2nd`, `product_photo_3rd`, `product_photo_4th`, `product_id`, `created_at`, `updated_at`) VALUES
(6, 'bat-giac-tuyet.jpg', 'tra-o-long-2.jpg', 'hop-tri-ki-tra-o-long-tra-co-thu.jpg', 'hop-thinh-vuong-tra-o-lonng-tra-co-thu-tra-non-tom-hong-tra.jpg', 7, '2023-01-04 10:28:16', '2023-01-08 06:24:57'),
(7, 'tra-co-thu.png', 'tra-co-thu-zoom.jpg', 'bat-giac-co-thu.jpg', 'hop-thinh-vuong-tra-o-lonng-tra-co-thu-tra-non-tom-hong-tra.jpg', 8, '2023-01-04 10:35:30', '2023-01-04 10:35:30'),
(8, 'tra-den.jpg', 'banner-am-chen-su-trang-2.jpg', 'bat-giac-hong-tra.jpg', 'hop-thinh-vuong-tra-o-lonng-tra-co-thu-tra-non-tom-hong-tra.jpg', 9, '2023-01-04 10:39:31', '2023-01-04 10:39:31'),
(9, 'tra-non-tom-1.jpg', 'bat-giac-non-tom.jpg', 'bat-giac-non-tom.jpg', 'tra-non-tom-8g.jpg', 10, '2023-01-04 10:43:19', '2023-01-04 10:43:19'),
(10, 'tra-bac-ha.jpg', 'TRA-BAC-HA.jpg', 'hop-kim-tu-thap-15.jpg', 'hop-kim-tu-thap-10.jpg', 11, '2023-01-04 10:47:42', '2023-01-04 10:47:42'),
(11, 'tra-ca-phe.jpg', 'TRA-CA-PHE.jpg', 'hop-kim-tu-thap-10.jpg', 'hop-kim-tu-thap-15.jpg', 12, '2023-01-04 10:50:44', '2023-01-04 10:50:44'),
(12, 'tra-gao-lut.jpg', 'TRA-GAO-LUT.jpg', 'hop-kim-tu-thap-10.jpg', 'hop-kim-tu-thap-15.jpg', 13, '2023-01-04 10:52:48', '2023-01-04 10:52:48'),
(13, 'tra-hoa-pho-nhi-1002.jpeg', 'tra-hoa-pho-nhi-57.jpg', 'tra-hoa-pho-nhi-56.jpg', 'hop-kim-tu-thap-10.jpg', 14, '2023-01-04 10:56:43', '2023-01-04 10:58:11'),
(14, 'tra-tuyet-zoom1.jpg', 'tra-tuyet-zoom1.jpg', 'bat-giac-tuyet.jpg', 'qua-tang-cao-cap-.jpg', 15, '2023-01-08 06:27:22', '2023-01-08 06:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `phone` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `gender` varchar(5) NOT NULL DEFAULT '1',
  `avata` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT 0,
  `verify_token` varchar(16) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id`, `name`, `email`, `role`, `phone`, `address`, `gender`, `avata`, `email_verified_at`, `password`, `remember_token`, `verify`, `verify_token`, `created_at`, `updated_at`) VALUES
(67, 'Duy', 'duy123', 1, 886514681, NULL, '1', NULL, NULL, '$2y$10$npFb18M7B27K50jR5sN3IOeO.ME13RY2vCMTClcZqpvF4ZjS4RI/u', 'VKkDpkqRgro5VhTiqmpWflubHiHAr8RhDyu4sbwREAFDAAXj1uDaP1grNTh2', 1, NULL, '2022-12-30 10:19:29', '2022-12-31 09:36:55'),
(77, 'Nguyễn Hoàng Khang', 'khangmsnd@gmail.com', 0, 958746532, 'Tỉnh Bắc Ninh, Huyện Yên Phong, Xã Yên Trung, 432', 'nam', NULL, NULL, '$2y$10$D2Bp0noewCv09Iwzsmsh8O8p6kkcWV2aYmx.FMuJBzfV7UL/4A0sm', NULL, 1, 'Eveicm5W6gciiFZZ', '2023-01-04 11:03:59', '2023-01-04 11:03:59'),
(78, 'Nguyễn Hoài Bảo', 'baongu123@gmail.com', 0, 987846536, 'Tỉnh Bắc Kạn, Huyện Ba Bể, Xã Mỹ Phương, 454', 'nam', NULL, NULL, '$2y$10$KHcTOq8dpAI0n2c7scmcze0ygPM.5mYLAzkN1Reb4PLFcLqiJ0HiG', '6MAk0i2L8eUEb3DGObPO52VTxk73rPNz5mZRHrkWKSmqAIeyCKGinizNqpQ4', 1, 'sKWno3jcvaguECQM', '2023-01-04 11:05:00', '2023-01-04 11:05:00'),
(79, 'Phan Tấn Duy', 'phantanduy14@gmail.com', 0, 886514681, 'Tỉnh Yên Bái, Huyện Văn Yên, Xã Yên Thái, 322', 'nam', 'tra-tuyet.jpg', NULL, '$2y$10$tsoeI3PsjDq9IFLy.phTr.Gqf6Eiwn714s4NwXNVRFxYTo0joMZZ.', NULL, 1, 'AAmq3bY24qYgilvE', '2023-01-08 06:19:57', '2023-01-08 06:22:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `table_product_detail`
--
ALTER TABLE `table_product_detail`
  ADD PRIMARY KEY (`product_detail_id`);

--
-- Indexes for table `table_product_photos`
--
ALTER TABLE `table_product_photos`
  ADD PRIMARY KEY (`product_photos_id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_product_detail`
--
ALTER TABLE `table_product_detail`
  MODIFY `product_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table_product_photos`
--
ALTER TABLE `table_product_photos`
  MODIFY `product_photos_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
