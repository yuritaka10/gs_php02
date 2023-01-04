-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 02 日 04:41
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
  `ride_day` date NOT NULL,
  `activity` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `instructor` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `advice` text COLLATE utf8_unicode_ci NOT NULL,
  `horse` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `horse_habit` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(1) NOT NULL,
  `good` text COLLATE utf8_unicode_ci NOT NULL,
  `improvements` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `ride_day`, `activity`, `instructor`, `advice`, `horse`, `horse_habit`, `rating`, `good`, `improvements`, `date`) VALUES
(10, '2022-12-11', 'cc', '山崎先生', '隅角を意識する', 'マリンアイル', '左の口が硬い', 5, 'lkjhg', 'oihgjfh', '2022-12-26 11:25:11'),
(13, '2022-12-15', 'fw', '山崎先生', '姿勢がチェアシートになりがち', 'ジーズ', '右回転でオーバーランしがち', 3, '内方脚を意識して使うことができた', '焦ると回転の際外方の手綱が外れてしまう', '2022-12-26 09:15:08'),
(14, '2022-11-29', 'fw', '山崎先生', '馬の背を緊張させないように', 'マリンアイル', '重心が前になるとつまづきやすいので起こしておくとよい', 3, '以前よりうまく推進できるようになってきたと思う', '馬の背がリラックスした状態で重心を上に持ってくることができなかった。', '2022-12-26 11:33:26');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
