-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2024 at 01:44 PM
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
-- Database: `db_appmhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `FakultasID` int NOT NULL,
  `NamaFakultas` varchar(100) NOT NULL,
  `Deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`FakultasID`, `NamaFakultas`, `Deskripsi`) VALUES
(1, 'Fakultas Teknik', 'Fakultas Teknik dan Ilmu Komputer'),
(2, 'Fakultas Ilmu Sosial', 'Fakultas Ilmu Sosial dan Humaniora'),
(3, 'Fakultas Ekonomi', 'Fakultas Ekonomi dan Bisnis'),
(4, 'Fakultas Kedokteran', 'Fakultas Kedokteran dan Ilmu Kesehatan'),
(5, 'Fakultas Hukum', 'Fakultas Hukum dan Ilmu Politik');

-- --------------------------------------------------------

--
-- Table structure for table `lhpd`
--

CREATE TABLE `lhpd` (
  `id` int NOT NULL,
  `nama_pelapor` varchar(200) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_KTP` varchar(30) NOT NULL,
  `no_registrasi` varchar(30) NOT NULL,
  `no_agenda` varchar(30) NOT NULL,
  `substansi_id` int DEFAULT NULL,
  `instansi_terlapor` varchar(100) NOT NULL,
  `perihal` text NOT NULL,
  `tgl_bedah` date NOT NULL,
  `tgl_laporan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lhpd`
--

INSERT INTO `lhpd` (`id`, `nama_pelapor`, `no_telp`, `alamat`, `no_KTP`, `no_registrasi`, `no_agenda`, `substansi_id`, `instansi_terlapor`, `perihal`, `tgl_bedah`, `tgl_laporan`) VALUES
(2, 'Maimunah', '09786523456', 'Sungai Andai', '29875283435649', 'LM-298347283', '202347385', 2, 'Kantor Walikota Kota Banjarmasin', 'Penundaan Berlarut ', '2024-01-18', '2024-01-25'),
(3, 'Siti ', '087826325627', 'Sungai MIai', '3984729827348254', 'LM-983472983', '202373846', 10, 'SMAN 102 Banjarmasin', 'Pungutan Liar ', '2024-01-27', '2024-01-31'),
(13, 'Shellania', '08784376385', 'cemara', '847293473294729', '9045804520', 'LM29387492', 9, 'Samsat Kota Banjarmasin', 'dfdsewewe', '2024-01-08', '2024-01-01'),
(14, 'Yahya', '081508236457', 'Jl. Kuripan 30-C RT018, Kuripan Banjarmasin Timur', '84729347329472945', 'LM-1234-5678', 'LM29382398', 13, 'Polsek Banjarmasin', 'tidak memberikan pelayanan', '2024-01-16', '2024-01-24'),
(15, 'Nia', '087812653487', 'Jl. Kuripan 30-C RT018, Kuripan Banjarmasin Timur', '780934652873284', 'LM_11_23', 'LM29381209', 10, 'Dinas Pendidikan Kota Banjarmasin', 'Pungutan Liar', '2024-02-01', '2024-01-29'),
(16, 'Lilis', '089612653487', 'JL. A.Yani KM 9,6 No. 14, Kertak Hanyar, Banjrmasin Tengah ', '4985703758340538', 'LM_22_23', 'LM29985492', 3, 'BPN Kota Banjarmasin', 'Penundaan Berlarut Pembuatan Akta Tanah', '2024-01-10', '2024-01-18'),
(17, 'Nina', '081278563487', 'Jl Sultan Adam', '9283745934985783', 'LM_45_43', 'LM29423265', 12, 'Rumah Sakit Anshari Saleh', 'Tidak memberikan pelayanan', '2024-01-24', '2024-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `MahasiswaID` int NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `JenisKelamin` varchar(10) DEFAULT NULL,
  `KontakDarurat` varchar(50) DEFAULT NULL,
  `ProgramStudiID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`MahasiswaID`, `Nama`, `Alamat`, `TanggalLahir`, `JenisKelamin`, `KontakDarurat`, `ProgramStudiID`) VALUES
(1, 'maimunah', 'Alamat 1', '1995-05-10', 'Laki-Laki', 'Kontak 1', 1),
(2, 'Mahasiswa 2', 'Alamat 2', '1996-07-15', 'Perempuan', 'Kontak 2', 2),
(3, 'Mahasiswa 3', 'Alamat 3', '1997-03-20', 'Laki-Laki', 'Kontak 3', 1),
(4, 'Mahasiswa 4', 'Alamat 4', '1998-09-25', 'Perempuan', 'Kontak 4', 3),
(5, 'Mahasiswa 5', 'Alamat 5', '1999-01-30', 'Laki-Laki', 'Kontak 5', 2),
(7, 'lilis', 'jl.Batusari', '2002-10-02', 'Perempuan', '081509782534', 3),
(8, 'Siti', 'Jl. Kuripan 30-C RT018, Kuripan Banjarmasin Timur', '2002-02-16', 'Perempuan', '087812548734', 5),
(9, 'Rizky', 'Jl. Cemara Ujung ', '2001-10-09', 'Laki-Laki', '0815097568712', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `UserID` int NOT NULL,
  `NamaPengguna` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `KataSandi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Peran` varchar(20) NOT NULL,
  `MahasiswaID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`UserID`, `NamaPengguna`, `KataSandi`, `Email`, `Peran`, `MahasiswaID`) VALUES
(6, 'user1', 'password1', 'user1@email.com', 'Mahasiswa', 1),
(7, 'user2', 'password2', 'user2@email.com', 'Dosen', NULL),
(8, 'admin1', '827ccb0eea8a706c4c34a16891f84e7b', 'admin1@email.com', 'Admin', NULL),
(9, 'user3', 'password3', 'user3@email.com', 'Mahasiswa', 2),
(10, 'user4', 'password4', 'user4@email.com', 'Mahasiswa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `perubahandatamahasiswa`
--

CREATE TABLE `perubahandatamahasiswa` (
  `PerubahanID` int NOT NULL,
  `MahasiswaID` int DEFAULT NULL,
  `TanggalPerubahan` date DEFAULT NULL,
  `JenisPerubahan` varchar(50) DEFAULT NULL,
  `DetailPerubahan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `perubahandatamahasiswa`
--

INSERT INTO `perubahandatamahasiswa` (`PerubahanID`, `MahasiswaID`, `TanggalPerubahan`, `JenisPerubahan`, `DetailPerubahan`) VALUES
(1, 1, '2023-03-15', 'Perubahan Alamat', 'Alamat diubah menjadi Alamat Baru 1'),
(2, 2, '2023-02-20', 'Perubahan Jurusan', 'Jurusan diubah menjadi Jurusan Baru 2'),
(3, 3, '2023-01-10', 'Perubahan Alamat', 'Alamat diubah menjadi Alamat Baru 3'),
(4, 4, '2023-04-05', 'Perubahan Jurusan', 'Jurusan diubah menjadi Jurusan Baru 4'),
(5, 5, '2023-05-25', 'Perubahan Alamat', 'Alamat diubah menjadi Alamat Baru 5');

-- --------------------------------------------------------

--
-- Table structure for table `programstudi`
--

CREATE TABLE `programstudi` (
  `ProgramStudiID` int NOT NULL,
  `NamaProgram` varchar(100) NOT NULL,
  `FakultasID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `programstudi`
--

INSERT INTO `programstudi` (`ProgramStudiID`, `NamaProgram`, `FakultasID`) VALUES
(1, 'Teknik Informatika', 1),
(2, 'Ilmu Komunikasi', 2),
(3, 'Manajemen Bisnis', 3),
(4, 'Kedokteran Umum', 4),
(5, 'Hukum', 5);

-- --------------------------------------------------------

--
-- Table structure for table `riwayatregistrasi`
--

CREATE TABLE `riwayatregistrasi` (
  `RegistrasiID` int NOT NULL,
  `MahasiswaID` int DEFAULT NULL,
  `TahunAjaran` int DEFAULT NULL,
  `Semester` varchar(20) DEFAULT NULL,
  `MataKuliahID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `riwayatregistrasi`
--

INSERT INTO `riwayatregistrasi` (`RegistrasiID`, `MahasiswaID`, `TahunAjaran`, `Semester`, `MataKuliahID`) VALUES
(1, 1, 2022, 'Ganjil', 101),
(2, 2, 2022, 'Ganjil', 102),
(3, 3, 2022, 'Ganjil', 103),
(4, 4, 2022, 'Ganjil', 104),
(5, 5, 2022, 'Ganjil', 105);

-- --------------------------------------------------------

--
-- Table structure for table `substansi`
--

CREATE TABLE `substansi` (
  `id` int NOT NULL,
  `nama_substansi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `substansi`
--

INSERT INTO `substansi` (`id`, `nama_substansi`) VALUES
(1, 'Lingkungan Hidup'),
(2, 'Imigrasi'),
(3, 'Pertanahan'),
(4, 'Penanaman Modal'),
(8, 'Ketenagakerjaan'),
(9, 'Peradilan'),
(10, 'Pendidikan'),
(12, 'Kesehatan'),
(13, 'Kepolisian'),
(15, 'Agama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`FakultasID`);

--
-- Indexes for table `lhpd`
--
ALTER TABLE `lhpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`MahasiswaID`),
  ADD KEY `ProgramStudiID` (`ProgramStudiID`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `MahasiswaID` (`MahasiswaID`);

--
-- Indexes for table `perubahandatamahasiswa`
--
ALTER TABLE `perubahandatamahasiswa`
  ADD PRIMARY KEY (`PerubahanID`),
  ADD KEY `MahasiswaID` (`MahasiswaID`);

--
-- Indexes for table `programstudi`
--
ALTER TABLE `programstudi`
  ADD PRIMARY KEY (`ProgramStudiID`),
  ADD KEY `FakultasID` (`FakultasID`);

--
-- Indexes for table `riwayatregistrasi`
--
ALTER TABLE `riwayatregistrasi`
  ADD PRIMARY KEY (`RegistrasiID`),
  ADD KEY `MahasiswaID` (`MahasiswaID`);

--
-- Indexes for table `substansi`
--
ALTER TABLE `substansi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `FakultasID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lhpd`
--
ALTER TABLE `lhpd`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `MahasiswaID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `perubahandatamahasiswa`
--
ALTER TABLE `perubahandatamahasiswa`
  MODIFY `PerubahanID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `programstudi`
--
ALTER TABLE `programstudi`
  MODIFY `ProgramStudiID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riwayatregistrasi`
--
ALTER TABLE `riwayatregistrasi`
  MODIFY `RegistrasiID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `substansi`
--
ALTER TABLE `substansi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`ProgramStudiID`) REFERENCES `programstudi` (`ProgramStudiID`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`MahasiswaID`) REFERENCES `mahasiswa` (`MahasiswaID`);

--
-- Constraints for table `perubahandatamahasiswa`
--
ALTER TABLE `perubahandatamahasiswa`
  ADD CONSTRAINT `perubahandatamahasiswa_ibfk_1` FOREIGN KEY (`MahasiswaID`) REFERENCES `mahasiswa` (`MahasiswaID`);

--
-- Constraints for table `programstudi`
--
ALTER TABLE `programstudi`
  ADD CONSTRAINT `programstudi_ibfk_1` FOREIGN KEY (`FakultasID`) REFERENCES `fakultas` (`FakultasID`);

--
-- Constraints for table `riwayatregistrasi`
--
ALTER TABLE `riwayatregistrasi`
  ADD CONSTRAINT `riwayatregistrasi_ibfk_1` FOREIGN KEY (`MahasiswaID`) REFERENCES `mahasiswa` (`MahasiswaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
