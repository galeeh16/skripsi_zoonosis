-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 07:04 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_zoonosis`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`) VALUES
(1, 'G01', 'Nafsu Makan Berkurang'),
(2, 'G02', 'Ular Terlihat Lesu'),
(3, 'G03', 'Berat Badan Menurun'),
(4, 'G04', 'Pembengkakan Pada Mulut Ular'),
(5, 'G05', 'Pembengkakan Pada Gusi Ular'),
(6, 'G06', 'Perubahan Warna Pada Mulut Ular'),
(7, 'G07', 'Badan Ular Terlihat Membengkak'),
(8, 'G08', 'BAB Jarang'),
(9, 'G09', 'BAB Encer'),
(10, 'G10', 'Ular Muntah-muntah'),
(11, 'G11', 'Terdapat Kutu/Caplak di Badan Ular'),
(12, 'G12', 'Terdapat Gelembung Pada Hidung Ular'),
(13, 'G13', 'Bernafas Dengan Mulut Terbuka'),
(14, 'G14', 'Keluar Cairan Dari Hidung/Mulut'),
(15, 'G15', 'Nafas Yang Berbunyi(Mendengkur)'),
(16, 'G16', 'Selalu Melihat Keatas(Stargazing)'),
(17, 'G17', 'Ular Tidak Mampu Mendirikan Badan'),
(18, 'G18', 'Selalu Tergolek Kearah Belakang'),
(19, 'G19', 'Tidak Merespon Gerakan'),
(20, 'G20', 'Besar Mata Pupil Tidak Seimbang'),
(21, 'G21', 'Ular Mengalami Kelumpuhan'),
(22, 'G22', 'Lendir Kental Dihidung'),
(23, 'G23', 'Bengkak Dibawah Mulut'),
(24, 'G24', 'Ada Massa Padat Di Kloaka(Anus)'),
(25, 'G25', 'Rahang Bawah Bernanah'),
(26, 'G26', 'Ada Plak Kemerahan Di Gusi'),
(27, 'G27', 'Ada Benjol Dirahang Atas'),
(28, 'G28', 'Jalannya Berputar-putar'),
(29, 'G29', 'Ada Jamur Dimulut '),
(30, 'G30', 'Kepala Terpelinting');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `title`, `description`, `user_id`, `date`, `time`) VALUES
(1, 'Hari Selasa', 'Sebantar lagi aku meninggalkan jogja, hmm hatiku sedih.', 13, '2018-10-17', '09:05:08'),
(2, 'Hari rabu', 'Aku tak mengerti apa yang kurasa, rindu yang tak pernah begitu hebatnya.', 13, '2018-11-24', '00:42:57'),
(5, 'Saya suka ame', 'Tapi Boong hehe, nggak deng beneran', 13, '2018-11-24', '00:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `deskripsi_penyakit` text NOT NULL,
  `id_solusi` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `deskripsi_penyakit`, `id_solusi`, `foto`) VALUES
(1, 'P01', 'Sariawan (Stomatitis)', 'Juga dikenal dengan sebutan mouth rot, ini adalah penyakit yang umum dijumpai pada ular peliharaan. Sewaktu bakteri memasuki mulut, bisa menyebabkan infeksi meliputi bagian mulut, gusi dan berpotensi juga menyerang bagian pencernaan ular    ', 1, 'sariawan.jpg'),
(2, 'P02', 'IBD (Inclusion Body Disease)', 'IBD adalah salah satu penyakit paling berbahaya yang ditemui di ular peliharaan. Biasanya dijumpai di jenis boa dan python terutama pada jenis molurus dan boa constrictors. Tanda tanda berbeda pada tiap jenis tapi biasanya melibatkan gangguan saraf , tumor dan penyakit lainnya. Tanda khas dari gangguan saraf pada ular adalah keadaan dimana ular tidak bisa mendirikan badannya, selalu tergolek ke arah belakang, melihat ke atas (star gazing)', 2, 'ibd.JPG'),
(3, 'P03', 'Sembelit (Constipation)', 'Pencernaan ular tergantung pada ukuran dan metabolismenya, bisa lebih lama, bisa juga lebih cepat, tapi apabila jadwal yang seharusnya sudah terlewati dan ular terlihat bengkak, lesu dan kurang nafsu makan itu mungkin disebabkan oleh sembelit', 3, 'sembelit.jpg'),
(4, 'P04', 'Parasit (Parasites)', 'Penyakit yang disebabkan oleh parasite biasanya agak susah untuk dideteksi, gejala gejalanya biasanya muntah , kurang nafsu makan, berat badan yang menurun dan penampilan sakit dari ular', 4, 'parasit.jpg'),
(5, 'P05', 'Flu (Influenza)', 'Flu sendiri adalah reaksi hewan terhadap perubahan suhu/kelembapan yaitu sekitar mulut dan hidung mengeluarkan lendir yang menggangu pernafasan. Seringkali ular yang terkena flu biasanya mogok makan. Meskipun ada ular yang terkena flu namun nafsu makannya tetap tinggi seperti retic dan water tiger. Namun, flu sendiri untuk ular harus cepat di tangani karena bila di biarkan bisa mengakibatkan kematian.', 5, 'flu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id_rules` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id_rules`, `id_penyakit`, `id_gejala`, `cf`) VALUES
(1, 1, 1, 0.2),
(2, 2, 1, 0.2),
(3, 3, 1, 0.2),
(4, 4, 1, 0.2),
(5, 5, 1, 0.2),
(6, 2, 2, 0.2),
(7, 3, 2, 0.2),
(8, 4, 2, 0.2),
(9, 1, 3, 0.5),
(10, 4, 3, 0.5),
(11, 1, 4, 0.5),
(12, 5, 4, 0.5),
(13, 1, 5, 0.8),
(14, 1, 6, 0.7),
(15, 3, 7, 0.4),
(16, 3, 8, 0.5),
(17, 3, 9, 0.1),
(18, 4, 10, 0.5),
(19, 4, 11, 0.9),
(20, 5, 12, 0.8),
(21, 5, 13, 0.7),
(22, 5, 14, 0.9),
(23, 5, 15, 0.8),
(24, 2, 16, 0.9),
(25, 2, 17, 0.6),
(26, 2, 18, 0.8),
(27, 2, 19, 0.2),
(28, 2, 20, 0.5),
(29, 2, 21, 0.6),
(30, 5, 22, 0.9),
(31, 5, 23, 0.6),
(32, 2, 24, 0.9),
(33, 1, 25, 0.7),
(34, 1, 26, 0.9),
(35, 1, 27, 0.4),
(36, 2, 28, 0.7),
(37, 1, 29, 0.2),
(38, 5, 29, 0.2),
(39, 2, 30, 0.4);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(11) NOT NULL,
  `nama_solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `nama_solusi`) VALUES
(1, 'Pencegahan bakteri bisa dilakukan dengan pembersihan yang teratur, air minum bersih dan menyingkirkan segala benda yang bisa mengakibatkan luka pada mulut ular. pisahkann ular yang terinfeksi dari yang lain, bersihkan mulut dengan kapas atau cotton bud dengan betadine yang dicairkan, yakinkan kalau ular tidak menelan cairan pembersih dengan mengarahkan kepala ular ke bagian bawah sewaktu melakukan pembersihan, lalu oleskan obat yang mengandung antibiotik, apabila keadaan tidak juga membaik selama seminggu, segera jumpai dokter hewan yang berpengalaman sesegera mungkin.  '),
(2, 'Segera bawa ke Ruang Karantiana agar segera ditangani Oleh dokter yang tepat'),
(3, 'Pengobatan sederhana memerlukan perendaman di air hangat selama 15 menit /hari yang biasanya bisa sangat membantu mempercepat pengeluaran apalagi bila dibantu dengan pijatan ringan ke arah bawah selama perendaman. Apabila tindakan ini tidak membantu dan bagian perut ular semakin membengkak, lebih baik segera menemui dokter hewan yang berpengalaman.'),
(4, 'Kotoran ular dibawa ke laboratorium untuk diperiksa bisa untuk mendiagnosa adanya parasit pada ular, yang kemudian bisa dijadikan acuan pengobatan. Tanpa adanya diagnosa dari dokter hewan yang berpengalaman, pemakaian obat cacing sangat tidak dianjurkan.'),
(5, '1. Kurangi Intensitas Mandi Air Dingin <br>\r\n2. Rendam Dengan Air Sirih Hangat <br>\r\n3. Bersihkan Kandang Dengan Air Sirih <br>\r\n4. Beri Alas Pada Kandang <br>\r\n5. Jemur Kandang Beserta Ular <br>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `level` enum('Admin','Member') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `name`, `address`, `handphone`, `level`, `photo`, `pertanyaan`, `jawaban`) VALUES
(13, 'hutama', '123130040', 'Hutama Dewangga Mfckr', 'Maguwoharjo', '083213213217', 'Admin', 'user_32cbe47c46.jpg', '', ''),
(34, 'dadadahehefasfa', '123130039', 'dadada', 'Seturan', '000231321321', 'Member', 'user_276ee49ae0.jpg', '', ''),
(35, 'dadadahehefa', '123130039', 'dadada', 'Seturan', '000231321321', 'Member', 'user_84e8701316.jpg', '', ''),
(37, 'gagagaga', '12345', 'Hutama Dewangga M', 'gagagagaa', '000231321321', 'Member', 'user_1cc8d26311.jpg', '', ''),
(38, 'dadada', 'dadadad', 'dadada', 'dadada', '083213213217', 'Member', 'user_ba18588e2e.jpg', '', ''),
(39, 'hutama14', '123130040', 'Hutama Dewangga', '', '', 'Member', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`),
  ADD KEY `id_solusi` (`id_solusi`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id_rules`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id_rules` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD CONSTRAINT `penyakit_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`);

--
-- Constraints for table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `rules_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
