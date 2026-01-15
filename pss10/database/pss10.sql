-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2026 at 03:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pss10`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `judul`, `slug`, `isi`, `created_at`) VALUES
(1, 'Mengenal Stres dan Dampaknya', 'mengenal-stres-dan-dampaknya', 'Stres adalah Jika respon alami tubuh terhadap tekanan. Jika tidak dikelola dengan baik, stres dapat berdampak pada kesehatan mental dan fisik. fffff', '2026-01-02 12:16:36'),
(2, 'Cara Efektif Mengelola Stres', 'mengelola-stres', 'Mengelola stres dapat dilakukan dengan teknik relaksasi, olahraga, dan menjaga keseimbangan hidup.', '2026-01-02 12:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `pss_interpretasi`
--

CREATE TABLE `pss_interpretasi` (
  `id_interpretasi` int NOT NULL,
  `skor_total_min` tinyint NOT NULL,
  `skor_total_max` tinyint NOT NULL,
  `level_stress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interpretasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekomendasi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pss_interpretasi`
--

INSERT INTO `pss_interpretasi` (`id_interpretasi`, `skor_total_min`, `skor_total_max`, `level_stress`, `interpretasi`, `rekomendasi`) VALUES
(1, 0, 13, 'Stres Rendah  (Low Stress Levels)', 'Skor dalam rentang ini menunjukkan tingkat stres yang dirasakan tergolong rendah.\r\nIndividu dengan tingkat stres seperti ini biasanya memiliki strategi koping (cara mengelola stres) yang efektif dan merasa mampu mengendalikan hidupnya. Mereka juga cenderung memiliki risiko yang lebih rendah terhadap masalah kesehatan serius yang berkaitan dengan stres.', '✅Pertahankan kebiasaan sehat seperti tidur cukup, makan teratur, dan olahraga ringan.\r\n✅Luangkan waktu untuk istirahat dan hal-hal yang kamu sukai.\r\n✅Tetap jaga hubungan baik dengan keluarga dan teman.'),
(2, 14, 20, 'Stres Sedang (Average Stress Levels)', 'Skor dalam rentang ini menunjukkan tingkat stres yang dirasakan berada pada level rata-rata.\r\nIndividu dengan skor ini mungkin mengalami stres yang umum terjadi dalam kehidupan sehari-hari,  seperti beban pekerjaan, tugas rumah, atau masalah pribadi. Namun umumnya masih bisa mengatasinya, tapi tetap perlu menjaga diri agar tidak semakin memburuk. Masalah kesehatan akibat stres mungkin muncul, tetapi biasanya masih dapat dikendalikan atau ditangani dengan baik.', '✅Coba atur ulang waktu dan prioritas agar tidak terlalu padat.\r\n✅Luangkan waktu untuk relaksasi (misalnya mengerjakan hobi, jalan santai, atau mendengarkan musik).\r\n✅Cerita ke orang yang kamu percaya (teman, keluarga, pasangan) bisa sangat membantu meringankan beban pikiran. \r\n✅Perhatikan tanda-tanda stres meningkat, seperti sulit tidur, mudah marah, atau merasa cemas terus-menerus.'),
(3, 21, 26, 'Stres Tinggi (High Stress Levels)', 'Skor dalam rentang ini menunjukkan tingkat stres yang dirasakan tergolong tinggi.\r\nIndividu dengan skor ini mungkin mengalami kesulitan dalam mengelola stres dan bisa merasakan kecemasan atau perasaan kewalahan (kelelahan). Masalah kesehatan yang cukup serius akibat stres dapat muncul, sehingga memerlukan perhatian dan penanganan lebih lanjut.', '✅Kenali sumber stres utama. Coba tuliskan atau pikirkan apa saja yang membuat kamu merasa tertekan.\r\n✅Coba teknik menenangkan diri seperti menulis jurnal atau meditasi ringan.\r\n✅Jika memungkinkan, tunda atau kurangi kegiatan yang membuat kamu semakin tertekan. Fokus dulu pada hal-hal yang paling penting. \r\n✅Jangan ragu untuk mencari bantuan atau berbicara dengan psikolog atau konselor.'),
(4, 27, 40, 'Stres Sangat Tinggi (Very High Stress Levels)', 'Skor dalam rentang ini menunjukkan tingkat stres yang dirasakan sangat tinggi.\r\nIndividu dalam kategori ini sering mengalami kecemasan berat, kesulitan dalam menghadapi tekanan, dan gangguan emosional yang intens. Masalah kesehatan yang serius sangat mungkin terjadi, sehingga diperlukan perhatian khusus dan intervensi dari tenaga profesional. Konseling disarankan untuk individu pada rentang skor ini.', '✅ Jangan hadapi sendiri. Segera cari bantuan dari profesional, seperti psikolog, konselor, atau layanan kesehatan terdekat.\r\n✅Ajak orang dekat untuk menemani dan mendukungmu. Dukungan sosial sangat penting saat kamu merasa kewalahan.\r\n✅Istirahat yang cukup dan hindari hal-hal yang memperburuk stres seperti begadang atau isolasi diri.\r\n✅Fokuskan energi untuk pemulihan diri. Jika memungkinkan, hentikan atau tunda aktivitas yang membuat kamu semakin tertekan. ');

-- --------------------------------------------------------

--
-- Table structure for table `pss_items`
--

CREATE TABLE `pss_items` (
  `id_item` int NOT NULL,
  `nomor_item` tinyint NOT NULL,
  `pernyataan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_reverse` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pss_items`
--

INSERT INTO `pss_items` (`id_item`, `nomor_item`, `pernyataan`, `is_reverse`, `created_at`) VALUES
(1, 1, 'Dalam sebulan terakhir, Apakah kamu merasa kesal karena mengalami sesuatu yang terjadi secara tak terduga?', 0, '2026-01-02 12:16:36'),
(2, 2, 'Dalam sebulan terakhir, Apakah kamu merasa tidak mampu mengendalikan hal-hal penting dalam hidupmu?', 0, '2026-01-02 12:16:36'),
(3, 3, 'Dalam sebulan terakhir, Apakah kamu merasa gugup atau tertekan?', 0, '2026-01-02 12:16:36'),
(4, 4, 'Dalam sebulan terakhir, Apakah kamu merasa yakin bahwa kamu bisa menangani masalah pribadimu?', 1, '2026-01-02 12:16:36'),
(5, 5, 'Dalam sebulan terakhir, Apakah kamu merasa bahwa hal-hal berjalan sesuai keinginanmu?', 1, '2026-01-02 12:16:36'),
(6, 6, 'Dalam sebulan terakhir, Apakah kamu merasa tidak bisa mengatasi semua hal yang harus kamu lakukan?', 0, '2026-01-02 12:16:36'),
(7, 7, 'Dalam sebulan terakhir, Apakah kamu bisa mengendalikan gangguan atau kesulitan yang muncul dalam hidupmu? ', 1, '2026-01-02 12:16:36'),
(8, 8, 'Dalam sebulan terakhir, Apakah kamu merasa memiliki kendali atas apa yang terjadi dalam hidupmu?', 1, '2026-01-02 12:16:36'),
(9, 9, 'Dalam sebulan terakhir, Apakah kamu marah karena hal-hal di luar kendalimu membuat segalanya jadi rumit?', 0, '2026-01-02 12:16:36'),
(10, 10, 'Dalam sebulan terakhir, Apakah kamu merasa kesulitan karena banyak hal yang harus kamu pikirkan?', 0, '2026-01-02 12:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `pss_responses`
--

CREATE TABLE `pss_responses` (
  `id_response` int NOT NULL,
  `id_user` int NOT NULL,
  `skor_total` tinyint NOT NULL,
  `level_stress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pss_response_detail`
--

CREATE TABLE `pss_response_detail` (
  `id_detail` int NOT NULL,
  `id_response` int NOT NULL,
  `id_item` int NOT NULL,
  `skor` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_respon_stres`
--

CREATE TABLE `tipe_respon_stres` (
  `id_respon` int NOT NULL,
  `tipe_respon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indikator` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipe_respon_stres`
--

INSERT INTO `tipe_respon_stres` (`id_respon`, `tipe_respon`, `kode`, `indikator`) VALUES
(1, 'FIGHT', 'F3', 'Saya cenderung mempertahankan pendapat saya dengan keras.\r\n'),
(2, 'FIGHT', 'F2', 'Saya cenderung membalas jika seseorang memperlakukan saya tidak adil.\r\n'),
(3, 'FIGHT', 'F1', 'Saya cenderung mudah marah saat merasa tertekan.\r\n'),
(4, 'FIGHT', 'F4', 'Saya cenderung merasa frustrasi jika sesuatu tidak berjalan sesuai keinginan saya.\r\n'),
(5, 'FIGHT', 'F5', 'Saya cenderung menyalahkan orang lain saat berada dalam tekanan.\r\n'),
(6, 'FLIGHT', 'L1', 'Saya merasa lebih baik jika menjauh dari situasi yang membuat saya stres.\r\n'),
(7, 'FLIGHT', 'L2', 'Saya cenderung menghindari konflik.\r\n'),
(8, 'FLIGHT', 'L3', 'Saya merasa sangat  cemas ketika harus menghadapi tekanan.\r\n'),
(9, 'FLIGHT', 'L4', 'Saya lebih suka menyibukkan diri untuk menghindari pikiran negatif.\r\n'),
(10, 'FLIGHT', 'L5', 'Saya sering berharap bisa \"lari\" dari masalah.\r\n'),
(11, 'FREEZE', 'Z1', 'Saya cenderung merasa bingung dan tidak tahu harus berbuat apa saat stres.\r\n'),
(12, 'FREEZE', 'Z2', 'Saya cenderung sulit berpikir jernih saat berada di bawah tekanan.\r\n'),
(13, 'FREEZE', 'Z3', 'Saya cenderung diam dan tidak bereaksi saat terkejut atau takut.\r\n'),
(14, 'FREEZE', 'Z4', 'Saya merasa seolah \"mati rasa\" ketika menghadapi situasi sulit.\r\n'),
(15, 'FREEZE', 'Z5', 'Saya merasa\" tidak tahu harus berbuat apa\" dalam situasi konflik atau tertekan.\r\n'),
(16, 'FAWN', 'N1', 'Saya cenderung meminta maaf walau tidak salah, agar orang lain tidak marah.\r\n'),
(17, 'FAWN', 'N2', 'Saya berusaha keras untuk menyenangkan semua orang.\r\n'),
(18, 'FAWN', 'N3', 'Saya merasa tidak enak menolak permintaan orang lain, meskipun berat.\r\n'),
(19, 'FAWN', 'N4', 'Saya cenderung mengorbankan kebutuhan sendiri demi menjaga situasi tetap tenang.\r\n'),
(20, 'FAWN', 'N5', 'Saya cenderung merasa bersalah jika tidak bisa membantu orang lain.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('superadmin','admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(5, 'dody', 'dody@pss10.com', '$2y$10$jpEJKwlEtru4u0P7Z/WEt.M0mM59cBBHHeditwL04DPIdbiddnUOy', 'superadmin', '2026-01-02 23:14:46'),
(6, 'lia', 'lia@pss10.com', '$2y$10$7UisdyZNHS6UFI/j/8nRYuSEt8ueYdX4TTms1/A8E1TUlU1VfNlhK', 'superadmin', '2026-01-03 08:30:19'),
(8, 'puspita', 'puspita@pss10.com', '$2y$10$0dUi520RJJJv6NbMl30eUekgJnMqB4gpRYqZPtKRJjL0CyCFhHP7.', 'admin', '2026-01-03 08:32:29'),
(11, 'menik', 'menik@pss10.com', '$2y$10$4PXJGkMPMBfXudWnlJepJ.AG.rv09MfreyQ/lNlzgievet4Wi.why', 'admin', '2026-01-15 02:58:34'),
(12, 'audrey', 'audrey@pss10.com', '$2y$10$n2NBCdB7qJ6s5vqnrMDxHek1Lqne6X64Q3PLV4GUXRckbaJf3A/PS', 'admin', '2026-01-15 02:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id_log` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `aktivitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `pss_interpretasi`
--
ALTER TABLE `pss_interpretasi`
  ADD PRIMARY KEY (`id_interpretasi`);

--
-- Indexes for table `pss_items`
--
ALTER TABLE `pss_items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `pss_responses`
--
ALTER TABLE `pss_responses`
  ADD PRIMARY KEY (`id_response`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pss_response_detail`
--
ALTER TABLE `pss_response_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_response` (`id_response`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `tipe_respon_stres`
--
ALTER TABLE `tipe_respon_stres`
  ADD PRIMARY KEY (`id_respon`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id_log`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pss_interpretasi`
--
ALTER TABLE `pss_interpretasi`
  MODIFY `id_interpretasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pss_items`
--
ALTER TABLE `pss_items`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pss_responses`
--
ALTER TABLE `pss_responses`
  MODIFY `id_response` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pss_response_detail`
--
ALTER TABLE `pss_response_detail`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tipe_respon_stres`
--
ALTER TABLE `tipe_respon_stres`
  MODIFY `id_respon` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pss_responses`
--
ALTER TABLE `pss_responses`
  ADD CONSTRAINT `pss_responses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `pss_response_detail`
--
ALTER TABLE `pss_response_detail`
  ADD CONSTRAINT `pss_response_detail_ibfk_1` FOREIGN KEY (`id_response`) REFERENCES `pss_responses` (`id_response`) ON DELETE CASCADE,
  ADD CONSTRAINT `pss_response_detail_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `pss_items` (`id_item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
