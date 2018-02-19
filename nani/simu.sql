-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Fev-2018 às 20:20
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `hack_user`
--

CREATE TABLE `hack_user` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` text NOT NULL,
  `sobrenome` text NOT NULL,
  `inisession` date NOT NULL,
  `datec` date NOT NULL,
  `ip` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `paypal_count` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hack_user`
--

INSERT INTO `hack_user` (`id`, `email`, `senha`, `nome`, `sobrenome`, `inisession`, `datec`, `ip`, `lastlogin`, `paypal_count`) VALUES
(6, 'kaway@hotmail.com', 'a0b48bf6735b085374fa984535372a8025210e45', 'Alexandre', 'Silva', '2018-02-19', '2018-02-19', '187.55.39.95', '2018-02-19 16:17:49', '20'),
(7, 'danielzinhooficial@gmail.com', 'f8ad67e974bfe0bfd1f0217ee4744d5096dcac79', 'Daniel', 'Fontenelle', '2018-02-19', '2018-02-19', '187.17.157.97', '2018-02-19 16:17:25', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hack_user`
--
ALTER TABLE `hack_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hack_user`
--
ALTER TABLE `hack_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
