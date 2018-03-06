-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Mar-2018 às 21:50
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
-- Estrutura da tabela `hack_conquistas`
--

CREATE TABLE `hack_conquistas` (
  `id` int(11) NOT NULL,
  `iduser` varchar(255) NOT NULL,
  `idconq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hack_conquistas`
--

INSERT INTO `hack_conquistas` (`id`, `iduser`, `idconq`) VALUES
(12, '6', 2),
(14, '6', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hack_mail`
--

CREATE TABLE `hack_mail` (
  `id` int(11) NOT NULL,
  `iduser` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `texto` text NOT NULL,
  `idquem` varchar(255) NOT NULL,
  `ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hack_mail`
--

INSERT INTO `hack_mail` (`id`, `iduser`, `title`, `texto`, `idquem`, `ativo`) VALUES
(12, '6', 'Conquista liberada', 'Essa conquista, você liberou ao acessar um site.', '', 0),
(14, '6', 'Conquista liberada', 'Essa conquista, você liberou ao comprar BitCoin', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hack_sites`
--

CREATE TABLE `hack_sites` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `html` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `url` text NOT NULL,
  `ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hack_sites`
--

INSERT INTO `hack_sites` (`id`, `title`, `html`, `iduser`, `url`, `ativo`) VALUES
(1, 'teste', 'Compro BitCoin, chama skype skyper001', 8, 'coadsadas.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hack_transacao`
--

CREATE TABLE `hack_transacao` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hack_transacao`
--

INSERT INTO `hack_transacao` (`id`, `iduser`, `amount`, `status`) VALUES
(1, 6, '20', 'Aprovado'),
(2, 6, '20', 'Aprovado'),
(3, 6, '20', 'Aprovado'),
(4, 6, '20', 'Aprovado'),
(5, 6, '20', 'Aprovado');

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
  `paypal_count` varchar(2555) NOT NULL,
  `btc_count` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hack_user`
--

INSERT INTO `hack_user` (`id`, `email`, `senha`, `nome`, `sobrenome`, `inisession`, `datec`, `ip`, `lastlogin`, `paypal_count`, `btc_count`) VALUES
(6, 'kaway@hotmail.com', 'a0b48bf6735b085374fa984535372a8025210e45', 'Alexandre', 'Silva', '2018-02-19', '2018-02-19', '187.55.39.95', '2018-03-06 12:02:47', '0', '0.0002627'),
(7, 'danielzinhooficial@gmail.com', 'f8ad67e974bfe0bfd1f0217ee4744d5096dcac79', 'Daniel', 'Fontenelle', '2018-02-19', '2018-02-19', '187.17.157.97', '2018-02-19 16:17:25', '20', ''),
(8, 'vandilsonbarbosa1999@hotmail.com', 'ece1c313333bf9f18086a68c836e17a0ffcb4811', 'Vandilson', 'Barbosa', '2018-02-19', '2018-02-19', '89.114.245.202', '2018-02-19 16:20:26', '20', ''),
(9, 'joao@hotmail.com', 'a0b48bf6735b085374fa984535372a8025210e45', 'João', 'Silva', '2018-02-19', '2018-02-19', '187.55.39.95', '2018-02-19 17:33:29', '5120', ''),
(10, 'josecuzinhogostoso@gmail.com', 'b1478c13a5740d9b9d1395cebd58560a9f8980c5', 'MAteus', 'Heckert', '2018-02-24', '2018-02-24', '189.31.72.207', '2018-02-24 22:45:08', '0', '1.8257505101871E+16'),
(11, 'alexferreira0888@hotmail.com', '6182b79dbdfb51921181f9dfa9061507cf2d8e43', 'Jovem', 'Gordo', '2018-02-27', '2018-02-27', '177.32.23.27', '2018-02-27 15:59:53', '20', '0,0'),
(12, 'alexferreira012@hotmail.com', '76a3708a1425833928a1c67421b0958a6b1add7d', 'Jovem ', 'Gordo 2', '2018-02-27', '2018-02-27', '177.32.23.27', '2018-02-27 16:03:06', '20', '0,0'),
(13, 'vandilsonbRBOSA1000@HOTMAIL.COM', '4557b921cca88f57476a7102c9860fdc11686683', 'asdasdsa', 'adsadasdsa', '2018-02-27', '2018-02-27', '89.114.245.202', '2018-02-27 18:17:47', '0', '0.00027113'),
(14, 'nani@hotmail.com', 'a0b48bf6735b085374fa984535372a8025210e45', 'Alexandre', 'Silva', '2018-03-05', '2018-03-05', '187.55.19.93', '2018-03-05 18:48:29', '20', '0,0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hack_conquistas`
--
ALTER TABLE `hack_conquistas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hack_mail`
--
ALTER TABLE `hack_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hack_sites`
--
ALTER TABLE `hack_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hack_transacao`
--
ALTER TABLE `hack_transacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hack_user`
--
ALTER TABLE `hack_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hack_conquistas`
--
ALTER TABLE `hack_conquistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hack_mail`
--
ALTER TABLE `hack_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hack_sites`
--
ALTER TABLE `hack_sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hack_transacao`
--
ALTER TABLE `hack_transacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hack_user`
--
ALTER TABLE `hack_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
