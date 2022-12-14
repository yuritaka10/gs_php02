-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2022 年 12 月 14 日 05:41
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_bm_table`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `ride_day` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `horse` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `instructor` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `activity` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `rating` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `ride_day`, `horse`, `instructor`, `activity`, `rating`, `comment`, `date`) VALUES
(1, '1002', 'uma', 'sense', 'fw', '5', 'comments', '2022-12-12 16:46:27'),
(2, 'Sfdgz', 'ジーズ', '5dfs', 'fw', '2', 'dsffdg', '2022-12-12 17:26:46'),
(3, 'afd', 'sfgdvv', 'gfghf', 'fw', '2', 'sfdghfh', '2022-12-12 17:27:23'),
(4, 'afd', 'sfgdvv', 'gfghf', 'fw', '2', 'sfdghfh', '2022-12-12 17:33:12'),
(5, 'aereg', 'argefd', 'fdghj', 'fw', '2', 'srthgfx', '2022-12-12 17:35:06'),
(6, 'afd', 'ジーズ', 'xfgjh', 'fw', '2', 'llll', '2022-12-12 17:46:14'),
(7, 'Sfdgz', 'fhg', 'asfd', 'fw', '3', 'SFBz', '2022-12-14 11:39:59');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
