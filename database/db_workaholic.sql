-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2026 at 02:34 AM
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
-- Database: `db_workaholic`
--

-- --------------------------------------------------------

--
-- Table structure for table `career_feedback`
--

CREATE TABLE `career_feedback` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` varchar(120) DEFAULT '',
  `tipe` enum('Testimoni','Kritik','Saran') DEFAULT 'Testimoni',
  `rating` tinyint(4) DEFAULT 5,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_feedback`
--

INSERT INTO `career_feedback` (`id`, `nama`, `role`, `tipe`, `rating`, `pesan`, `created_at`) VALUES
(8, 'RAKRET', 'test', 'Testimoni', 5, 'test', '2026-06-03 04:36:07'),
(9, 'bonang', 'penjaga kos', 'Testimoni', 5, 'mantap', '2026-06-03 11:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lowongan_id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `pengalaman` varchar(50) DEFAULT NULL,
  `gaji_ekspektasi` varchar(50) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL,
  `status` enum('dikirim','direview','diterima','ditolak') DEFAULT 'dikirim',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cv_file` varchar(255) DEFAULT '',
  `cv_original_name` varchar(255) DEFAULT '',
  `cover_letter_file` varchar(255) DEFAULT '',
  `cover_letter_original_name` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id`, `user_id`, `lowongan_id`, `nama_lengkap`, `email`, `no_hp`, `kota`, `pendidikan`, `pengalaman`, `gaji_ekspektasi`, `cover_letter`, `status`, `created_at`, `cv_file`, `cv_original_name`, `cover_letter_file`, `cover_letter_original_name`) VALUES
(92, 7, 12, 'Akmal', 'akmal@gmail.com', '085154832804', 'Semarang', 'SMA / SMK', '1 – 3 tahun', 'Rp. 100.000.000', '', 'dikirim', '2026-05-25 04:15:48', 'uploads/resumes/resume_user_7_job_12_1779682548.png', 'Screenshot 2025-08-11 222638.png', 'uploads/cover_letters/cover_letter_user_7_job_12_1779682548.png', 'Screenshot 2025-08-08 200140.png'),
(93, 7, 12, 'Salman Abdul Ghani', 'salmanabdul@gmail.com', '085154832804', 'Jakarta', 'SMA / SMK', 'Fresh Graduate', 'Rp. 10.000.000', '', 'dikirim', '2026-05-25 08:52:26', 'uploads/resumes/resume_user_7_job_12_1779699146.png', 'Screenshot 2026-05-25 153051.png', 'uploads/cover_letters/cover_letter_user_7_job_12_1779699146.png', 'Screenshot 2026-05-25 153051.png'),
(94, 10, 12, 'Azzam Damar P', 'azzamdamarp@gmail.com', '08233123123', 'Semarang', 'SMA / SMK', 'Fresh Graduate', 'Rp 5.000.000', '', 'dikirim', '2026-05-25 10:10:19', 'uploads/resumes/resume_user_10_job_12_1779703819.png', 'Screenshot 2025-08-08 110622.png', 'uploads/cover_letters/cover_letter_user_10_job_12_1779703819.png', 'Screenshot 2025-08-04 195131.png'),
(95, 8, 19, 'SEMARONG', 'Semarong@gmail.com', '085154832804', 'Semarong', '', '', '100.000.000', '', 'dikirim', '2026-06-01 05:45:13', 'uploads/resumes/resume_user_8_job_19_1780292713.png', 'Screenshot 2026-05-25 153051.png', 'uploads/cover_letters/cover_letter_user_8_job_19_1780292713.png', 'Screenshot 2026-05-25 153051.png'),
(96, 8, 20, 'bonang', 'bonang@gmail.com', '085154832804', 'Mandiraja', 'SMA / SMK', '3 – 5 tahun', '10.000.000', '', 'dikirim', '2026-06-03 11:54:28', 'uploads/resumes/resume_user_8_job_20_1780487668.png', 'Screenshot 2026-05-25 153051.png', 'uploads/cover_letters/cover_letter_user_8_job_20_1780487668.png', 'Screenshot 2026-05-25 153051.png');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id` int(11) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `mode_kerja` varchar(50) DEFAULT NULL,
  `pengalaman` varchar(50) DEFAULT NULL,
  `gaji_min` int(11) DEFAULT NULL,
  `gaji_max` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kualifikasi` text DEFAULT NULL,
  `status` enum('aktif','tutup') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id`, `perusahaan_id`, `judul`, `lokasi`, `tipe`, `mode_kerja`, `pengalaman`, `gaji_min`, `gaji_max`, `deskripsi`, `kualifikasi`, `status`, `created_at`, `deleted_at`) VALUES
(1, 1, 'Frontend Developer', 'Jakarta Selatan', 'Full-time', 'Hybrid', '1-3 Tahun', 8000000, 14000000, 'Membangun dan menyempurnakan antarmuka pengguna.', 'HTML, CSS, JavaScript, React.js', 'aktif', '2026-05-15 10:22:15', NULL),
(2, 2, 'UI/UX Designer', 'Jakarta Pusat', 'Full-time', 'Remote', '3-5 Tahun', 12000000, 20000000, 'Merancang pengalaman pengguna untuk produk digital.', 'Portfolio kuat dan mahir Figma', 'aktif', '2026-05-15 10:22:15', NULL),
(3, 3, 'Data Analyst', 'Jakarta Barat', 'Full-time', 'On-site', '1-3 Tahun', 7000000, 11000000, 'Menganalisis data transaksi dan insight bisnis.', 'SQL, Python/R, Tableau/Power BI', 'aktif', '2026-05-15 10:22:15', NULL),
(4, 4, 'Content Writer', 'Jakarta Timur', 'Part-time', 'Remote', 'Fresh Graduate', 3000000, 5000000, 'Menulis artikel informatif dan engaging.', 'Komunikasi, jurnalistik, SEO dasar', 'aktif', '2026-05-15 10:22:15', NULL),
(5, 5, 'Backend Engineer (Node.js)', 'Jakarta Selatan', 'Full-time', 'Hybrid', '3-5 Tahun', 15000000, 25000000, 'Membangun layanan backend skala besar.', 'Node.js, TypeScript, microservices', 'aktif', '2026-05-15 10:22:15', NULL),
(6, 6, 'Guru Matematika SMA', 'Bandung', 'Full-time', 'On-site', '1-3 Tahun', 5000000, 8000000, 'Mengajar Matematika untuk kelas 10-12.', 'S1 Pendidikan Matematika dan pengalaman mengajar', 'aktif', '2026-05-15 10:22:15', NULL),
(7, 7, 'Perawat Klinis', 'Surabaya', 'Full-time', 'On-site', 'Fresh Graduate', 4000000, 7000000, 'Bergabung di unit rawat inap rumah sakit.', 'D3/S1 Keperawatan dan STR aktif', 'aktif', '2026-05-15 10:22:15', NULL),
(8, 8, 'Legal Officer', 'Jakarta Pusat', 'Full-time', 'On-site', '1-3 Tahun', 9000000, 14000000, 'Mendukung kontrak dan analisis regulasi.', 'S1 Hukum dan paham kontrak', 'aktif', '2026-05-15 10:22:15', NULL),
(9, 9, 'Social Media Specialist', 'Tangerang', 'Full-time', 'Hybrid', '1-3 Tahun', 5000000, 9000000, 'Mengelola strategi konten media sosial.', 'Copywriting dan analitik sosial media', 'aktif', '2026-05-15 10:22:15', NULL),
(10, 10, 'Mobile Developer (Flutter)', 'Jakarta Selatan', 'Full-time', 'Remote', '3-5 Tahun', 13000000, 22000000, 'Membangun aplikasi mobile perjalanan.', 'Flutter, Dart, REST API', 'aktif', '2026-05-15 10:22:15', NULL),
(11, 11, 'Aktuaris Junior', 'Jakarta Pusat', 'Full-time', 'On-site', 'Fresh Graduate', 8000000, 13000000, 'Analisis risiko dan pelaporan keuangan.', 'Matematika, Statistika, Aktuaria', 'aktif', '2026-05-15 10:22:15', NULL),
(12, 12, 'Graphic Designer', 'Jakarta Pusat', 'Full-time', 'On-site', '1-3 Tahun', 5000000, 8000000, 'Mengerjakan kebutuhan visual media.', 'Adobe Illustrator, Photoshop, portfolio desain', 'aktif', '2026-05-15 10:22:15', NULL),
(18, 18, 'Designer Robot', 'Purwokerto', 'Full-time', 'On-site', 'Lulusan Baru', 3000000, 4000000, 'Designer yang bisa merancang dan membuat robot ai', '-', 'aktif', '2026-05-25 10:15:57', NULL),
(19, 19, 'Lowongan SIGMA', 'Semarang', 'Full-time', 'On-site', 'Bla Bla Bla', 5000000, 10000000, 'Bla Bla Bla', 'Bla Bla Bla', 'tutup', '2026-06-01 05:44:09', '2026-06-01 13:24:48'),
(20, 19, 'test', 'purwoerto', 'Full-time', 'On-site', 'asdasda', 10000000, 100000000, 'test', 'test', 'aktif', '2026-06-03 11:53:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `industri` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cari_kandidat` text DEFAULT NULL,
  `tagline` varchar(200) DEFAULT '',
  `google_uid` varchar(120) DEFAULT '',
  `auth_provider` varchar(30) DEFAULT 'email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `email`, `password`, `industri`, `deskripsi`, `logo`, `kota`, `website`, `created_at`, `cari_kandidat`, `tagline`, `google_uid`, `auth_provider`) VALUES
(1, 'Tokopedia', 'hr.tokopedia@workaholic.local', '$2y$10$Andv4NZPC9A7Op1drjUVMuT55dHl/ju2BYLPbiCTFY4LiyGU49syi', 'Teknologi', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Jakarta Selatan', 'https://tokopedia.com', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(2, 'Gojek', 'hr.gojek@workaholic.local', '$2y$10$GfCegYPwGwfpamzF1JBLYOXDfHNBHmLUA5Ba5zlLXyCuAQe6Nxhwi', 'Teknologi', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Jakarta Pusat', 'https://gojek.com', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(3, 'Bank BCA', 'hr.bca@workaholic.local', '$2y$10$8WmRT3kKO4VoYMH3wXIaT.SbhbUb8K2sfWUL/08ebKfMCwKU1bCya', 'Keuangan', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Jakarta Barat', 'https://bca.co.id', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(4, 'KumparanNews', 'hr.kumparan@workaholic.local', '$2y$10$4VY8nBtcPBM9xIK2WjL4EeAwdKUNbQsu2nPTTDWpFFW2mPqPUfg36', 'Media', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Jakarta Timur', 'https://kumparan.com', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(5, 'Shopee Indonesia', 'hr.shopee@workaholic.local', '$2y$10$LrUiNz6S/SDRfkauFiK6jeTGtLNfUNPmmpXNFPzomWtO4cs4ybrPi', 'E-commerce', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Jakarta Selatan', 'https://shopee.co.id', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(6, 'Ruangguru', 'hr.ruangguru@workaholic.local', '$2y$10$iDw7da.YPIMc.EflHZDWJeZPb8VJlgrUKNt3NcLB9LetWK/X0G7GK', 'Pendidikan', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Bandung', 'https://ruangguru.com', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(7, 'RS Siloam', 'hr.siloam@workaholic.local', '$2y$10$MJ1UuinYgg3a3RHQpsVmbuR/FwDACdhgayZ5YXKKwVHwbM0YUEbu.', 'Kesehatan', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Surabaya', 'https://siloamhospitals.com', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(8, 'Pertamina', 'hr.pertamina@workaholic.local', '$2y$10$IgKY8ms18EgTUGA4loqi/.rYeBO9.SWnG8wEXsrX1mUn52L5pjw4K', 'Energi', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Jakarta Pusat', 'https://pertamina.com', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(9, 'Wardah Cosmetics', 'hr.wardah@workaholic.local', '$2y$10$rQb.D2vGwKhS6CfFzTb9uuyPk.DR8zBZbpUPRbcGXVN901vH/ALxu', 'Kecantikan', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Tangerang', 'https://wardahbeauty.com', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(10, 'Traveloka', 'hr.traveloka@workaholic.local', '$2y$10$nKIQTr7HvQms75MPt043.uZrJvWYKiCE39nkHRZEshl9PokZ6IwIK', 'Travel', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Jakarta Selatan', 'https://traveloka.com', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(11, 'Prudential Indonesia', 'hr.prudential@workaholic.local', '$2y$10$nuS5f2RFzaADSa/PMpx8ROIuAt3UBBs41mpOGDTag/Tg2a1Vd4tp2', 'Asuransi', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Jakarta Pusat', 'https://prudential.co.id', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(12, 'Kompas Gramedia', 'hr.kg@workaholic.local', '$2y$10$ZP3HW3umKWzs6CiIZiNfK.42G/yCqTX/beLfHs7HX2d3JGWK9psHG', 'Media', 'Perusahaan contoh untuk demo Workaholic.', NULL, 'Jakarta Pusat', 'https://kompasgramedia.com', '2026-05-15 10:22:15', NULL, '', '', 'email'),
(18, 'PT Sukses', 'radithyaardhani23@gmail.com', '$2y$10$0wOHz2mQDYOBfaVkUty3me5eyQ6UpNJxIkNzF1/WFYBDP1dLXuf.O', 'Teknologi', 'perusahaan ini bergerak di bidang teknologi untuk membuat robot ai', NULL, 'Purwokerto', 'https://sukses.com', '2026-05-25 10:13:33', 'bisa berkerja sama', 'Menuju inovasi yang lebih lanjut', '', 'email'),
(19, 'PT Rong', 'ptrong@gmail.com', '$2y$10$qT6XDfdLb2.j1FkeAPSleu.jSFeRQCZG4qkaJbgAz892bTmVb43Ye', 'Teknologi', 'Bla Bla Bla', NULL, 'Semarang', 'https://rong.com', '2026-06-01 05:42:31', 'Yang pinter', '', '', 'email');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lowongan_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `ktp_verified` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `headline` varchar(200) DEFAULT '',
  `lokasi` varchar(100) DEFAULT '',
  `tentang` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `pengalaman_kerja` text DEFAULT NULL,
  `pendidikan_info` text DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT '',
  `portfolio` varchar(200) DEFAULT '',
  `foto_profile` varchar(255) DEFAULT '',
  `google_uid` varchar(120) DEFAULT '',
  `auth_provider` varchar(30) DEFAULT 'email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `no_hp`, `kota`, `foto_ktp`, `ktp_verified`, `created_at`, `headline`, `lokasi`, `tentang`, `skills`, `pengalaman_kerja`, `pendidikan_info`, `linkedin`, `portfolio`, `foto_profile`, `google_uid`, `auth_provider`) VALUES
(6, 'Adha Rafi', 'adharafi@gmail.com', '$2y$10$kQygYPpMSLZwKM/LHUVFgup5p1nG33O2m76iCx7skcd1baozI2m7y', '08512348692', 'Purwokerto', NULL, 0, '2026-05-21 03:19:12', 'Pelajar', 'Purwokerto', 'I am Adha', 'Ahli Jumpshoot', 'Alok', 'Spatel stematel', '', '', 'uploads/profiles/user_6_1779333576.png', '', 'email'),
(7, 'Muhammad Ghani', 'muhammadghani@gmail.com', '$2y$10$lubPrK82VlQapF3n0Z.Ff.RK7n6eBcRDK9Dx78eOZsZBQ3TLBX7WO', NULL, NULL, NULL, 0, '2026-05-25 03:09:00', '', '', NULL, NULL, NULL, NULL, '', '', '', '', 'email'),
(8, 'Akmal Ashfihany', 'thegomal999@gmail.com', '$2y$10$379i7n/hLHFJvY1eTL.qNepLtVdTNz1kK5JXigetUhHj6HYBblQE.', NULL, NULL, NULL, 0, '2026-05-25 04:20:08', '', '', NULL, NULL, NULL, NULL, '', '', 'https://lh3.googleusercontent.com/a/ACg8ocJr211oBTWtmpE4Hi6XK6vUOWuo5o-f4dUkM6OimBV0mnyM9M3W=s96-c', 'scBk6xxuPYQBkBKrTv5p8krgl5C3', 'google'),
(9, 'asep MUZAKI', 'ambakolaborasi@gmail.com', '$2y$10$A1WUQZ1VW.nJE8Sx69sdSuLeJhyujaS2aIo4VLHxC2sWQ3MPqbJLi', NULL, NULL, NULL, 0, '2026-05-25 09:48:49', '', '', NULL, NULL, NULL, NULL, '', '', '', '', 'email'),
(10, 'Bambang Santoso', 'amayuri1999@gmail.com', '$2y$10$gvVRNNzGilZsTWmOpebl1OzoA5XpF9xgpA7OFgb4JC0OGL4dls8ca', NULL, NULL, NULL, 0, '2026-05-25 10:06:07', '', '', NULL, NULL, NULL, NULL, '', '', '', '', 'email');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career_feedback`
--
ALTER TABLE `career_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lowongan_id` (`lowongan_id`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perusahaan_id` (`perusahaan_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_saved_job` (`user_id`,`lowongan_id`),
  ADD KEY `idx_saved_user` (`user_id`),
  ADD KEY `idx_saved_lowongan` (`lowongan_id`);

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
-- AUTO_INCREMENT for table `career_feedback`
--
ALTER TABLE `career_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD CONSTRAINT `lamaran_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lamaran_ibfk_2` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan` (`id`);

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`);

--
-- Constraints for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD CONSTRAINT `saved_jobs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_jobs_ibfk_2` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
