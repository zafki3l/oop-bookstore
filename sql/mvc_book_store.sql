-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2025 at 04:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `pages` int(11) NOT NULL DEFAULT 0,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `cover` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `publisher`, `pages`, `category_id`, `description`, `price`, `quantity`, `status`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Crime ', 'Fyodor', 'a', 0, 1, 'a', 1000000.00, 0, 0, '415SkSLLrzL20250926162534.jpg', '2025-09-25 16:35:50', '2025-09-26 14:57:58'),
(13, '22', '3', '3', 3, 1, '3', 1.00, 1, 1, '0gzoylpn20250926093901.png', '2025-09-26 07:39:01', '2025-09-26 14:49:34'),
(14, '22', '3', '3', 3, 1, '3', 1.00, 1, 1, '0gzoylpn20250926094040.png', '2025-09-26 07:40:40', '2025-09-26 14:49:39'),
(29, 'The Idiot', 'Fyodor Dostoeyvsky', 'Penguin Classics', 987, 1, 'The Idiot (pre-reform Russian: Идіотъ; post-reform Russian: Идиот, romanized: Idiót) is a novel by the 19th-century Russian author Fyodor Dostoevsky. It was first published serially in the journal The Russian Messenger in 1868–1869.\r\n\r\nThe title is an ironic reference to the central character of the novel, Lev Nikolayevich Myshkin, a young prince whose goodness, open-hearted simplicity, and guilelessness lead many of the more worldly characters he encounters to mistakenly assume that he lacks intelligence and insight. In the character of Prince Myshkin, Dostoevsky set himself the task of depicting \"the positively good and beautiful man.\"[1] The novel examines the consequences of placing such a singular individual at the centre of the conflicts, desires, passions, and egoism of worldly society, both for the man himself and for those with whom he becomes involved.\r\n\r\nJoseph Frank describes The Idiot as \"the most personal of all Dostoevsky\'s major works, the book in which he embodies his most intimate, cherished, and sacred convictions.\"[2] It includes descriptions of some of his most intense personal ordeals, such as epilepsy and mock execution, and explores moral, spiritual, and philosophical themes consequent upon them. His primary motivation in writing the novel was to subject his own highest ideal, that of true Christian love, to the crucible of contemporary Russian society.', 350000.00, 10, 1, '0gzoylpn20250926192513.png', '2025-09-26 17:25:13', '2025-09-26 17:25:13'),
(30, 'The Brothers Karamazov', 'Fyodor Dostoeyvsky', 'Penguin Classics', 1238, 1, 'adadasdads', 350000.00, 10, 1, 'Kurumi Tokisaki20250926234920.jpg', '2025-09-26 21:49:20', '2025-09-27 07:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fiction', '2025-09-25 16:35:06', '2025-09-25 16:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`, `role`, `created_at`, `updated_at`) VALUES
(6, 'Th41', 'Th42@abc.com', '$2y$10$j4VZ1YJhUqQghOO5dcQOaOVK2KlC0eZZaK4Fpbhl9JkTpSHasYIrG', 'Hà Nội', 3, '2025-09-21 14:48:03', '2025-09-27 07:39:29'),
(19, 'Hoa rơi cửa phật', 'phamdinhthai312322222@abc.com', '$2y$10$iGB2VH4xFNfwHhafgmVh1.LnZs16h1lcIoHI7FJw864Vth8fQEOWO', 'Bac Ninh', 1, '2025-09-23 07:27:55', '2025-09-23 07:27:55'),
(20, '1234', 'phamdinhtha22@abc.com', '$2y$10$NaoAXKbKnVCyJKcJ0V2d0OVENFDYlVxBtzo.n1VxTpAGZtm.EMrXK', 'Bac Ninh', 1, '2025-09-23 07:28:57', '2025-09-23 07:28:57'),
(21, '1234', 'phamdinhth2a22@abc.com', '$2y$10$m3VYlQpni2JGRigTuAHFguXd0yndWecws2JcoUPxr/D3H5zCuu1sy', 'Bac Ninh', 1, '2025-09-23 07:29:22', '2025-09-23 07:29:22'),
(23, '1234', 'phamdi22222@abc.com', '$2y$10$ivmQehEy2GK47Tq5LZANi.Lh1Guu7Fr.757IR367hFjk5TqcCbklS', 'Bac Ninh', 1, '2025-09-23 07:31:28', '2025-09-23 07:31:28'),
(31, 'Th43', 'phamdinhthai@mail.com', '$2y$10$70hEl44iLYwUN0Wq.9BME.qUyUhIFZ2cQzcvqOfE5JkeWjqbM7LS6', 'Hà Nội', 1, '2025-09-25 05:20:37', '2025-09-25 05:20:49'),
(33, 'Thái', 'phamdinhthai@12321323mail.com', '$2y$10$0CYr2.ZpFyjn1YGbLDXdz.G8vy8IM9bQnDdETU.lVdTwP5U4pjuhy', 'Hà Nội', 2, '2025-09-25 05:55:51', '2025-09-25 05:55:59'),
(35, 'Nguyễn Văn A', 'ngvana@12321323mail.com', '$2y$10$zEP73.tDxPfJzERonbNSzubxRCHX49ywPBX6E4Cq1QZmKoVVa3F4W', 'Hà Nội', 1, '2025-09-25 06:11:26', '2025-09-25 06:11:26'),
(37, '10 Điểm Toán', 'mathematics123@12321323mail.com', '$2y$10$8.Cp3ZUQXLJK3FEeXCODWuBj381K9zh5x3Hxt8undDgyh3iRlKwK2', 'Hà Nội', 1, '2025-09-26 18:37:28', '2025-09-26 18:37:28'),
(38, 'avvv', 'mathematics1234@12321323mail.com', '$2y$10$bY602R1pLf5EOJifHS6VXeXvfKegEpVfAyMT1YBpUMOo0s1WHEAae', 'Hà Nội', 1, '2025-09-26 18:37:45', '2025-09-26 18:37:45'),
(39, 'avvv', 'phadd@mail.com', '$2y$10$97qgzF39rUKdDKVRp6LlbuOHmLNyEiLMmALBR60Ht8mcWxBXuZ96K', 'Hà Nội', 1, '2025-09-26 18:38:04', '2025-09-26 18:38:04'),
(40, 'avvv222', 'abcd@mail123.com', '$2y$10$C.eebBnRUlkpy7Hm/AabEOy04gn8O1/REdJ8fkxHpuKbaOkZKC8za', 'Hà Nội', 1, '2025-09-26 18:38:26', '2025-09-26 18:38:26'),
(41, 'avvv222', '123aada@mail.com', '$2y$10$o6MDMyVP/fRuYW6Cg9rQFeMFta9DNnDArZi2cHsKKOiKFgUif/zWS', 'Hà Nội', 1, '2025-09-26 18:38:42', '2025-09-26 18:38:42'),
(42, 'avvv222', '123@mail1234.com', '$2y$10$pt5hoz7YBMF5he2kQc7a.OmThOIMBAzYqD/0/Cv9dktpoIh0RU4Jm', 'Hà Nội', 1, '2025-09-26 18:38:59', '2025-09-26 18:38:59'),
(43, 'avvv222222', 'am@mail.com', '$2y$10$2iLCYXcUSPaM/eZ8zE3n9.a3mE/qnen4sdFj9gjM81s5iWmWE2J8K', 'Hà Nội', 1, '2025-09-26 18:39:19', '2025-09-26 18:39:19'),
(44, '12345', 'johnneoson123222222@abc.com', '$2y$10$mNyN1kYWTAeunVXeDY4UoOD4pFTX6z7ZbUJKeob1Gn1PBZEZOnIEe', 'Bac Ninh', 1, '2025-09-27 09:48:41', '2025-09-27 09:48:41'),
(45, 'Phạm Đình Thái', 'phamdinhthai1324@mail.com', '$2y$10$ItFCRxSPcfR9sInMWp4r3Of.6TuY.2cxPtzkKgZYHqGQfYAQuqt4m', '12/123 Hoàn kiếm, Hà Nội', 1, '2025-09-27 14:48:39', '2025-09-27 14:48:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK01_books` (`category_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK01_carts` (`user_id`),
  ADD KEY `FK02_carts` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK01_orderDetails` (`order_id`),
  ADD KEY `FK02_orderDetails` (`book_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK01_orders` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK01_books` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `FK01_carts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK02_carts` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `FK01_orderDetails` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK02_orderDetails` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK01_orders` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
