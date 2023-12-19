-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Ago-2020 às 22:47
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mvc`usercompromisso
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracao`
--

DROP TABLE IF EXISTS `configuracao`;
CREATE TABLE IF NOT EXISTS `configuracao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_title` varchar(255) NOT NULL,
  `protocol` enum('http://','https://') NOT NULL,
  `environment` enum('Desenvolvimento','Produção') NOT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_user` varchar(255) DEFAULT NULL,
  `mail_pass` varchar(255) DEFAULT NULL,
  `mail_auth` enum('true','false') DEFAULT 'true',
  `mail_secure` enum('ssl','tls') DEFAULT 'ssl',
  `mail_port` int(4) DEFAULT 465,
  `mail_sendtype` enum('isSMTP','isMAIL') DEFAULT 'isSMTP',
  `mail_contact` varchar(255) DEFAULT '',
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `id_update_user` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `configuracao`
--

INSERT INTO `configuracao` (`id`, `app_title`, `protocol`, `environment`, `mail_host`, `mail_user`, `mail_pass`, `mail_auth`, `mail_secure`, `mail_port`, `mail_sendtype`, `mail_contact`, `data_cadastro`, `data_alteracao`, `id_update_user`, `status`) VALUES
(1, 'SMART Soluções Inteligentes', 'http://', 'Desenvolvimento', 'smtp.hostinger.com.br', 'no-reply@smartsolucoesinteligentes.com.br', '02081992', 'true', 'tls', 587, 'isSMTP', 'joaopaulo@informaticajk.com.br', '2020-01-27 19:45:19', '2020-08-11 22:43:10', 21, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acesso` enum('Administrador','Vendedor') NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` varchar(20) DEFAULT '',
  `cpf` varchar(15) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT '',
  `endereco` varchar(100) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `banco` varchar(50) DEFAULT NULL,
  `agencia` varchar(50) DEFAULT NULL,
  `conta` varchar(50) DEFAULT NULL,
  `op_vr` varchar(50) DEFAULT NULL,
  `tipo_conta` enum('CC','CP') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT 'assets/img/avatar.jpg',
  `session` varchar(255) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `id_update_user` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `acesso`, `nome`, `data_nascimento`, `cpf`, `rg`, `telefone`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado`, `banco`, `agencia`, `conta`, `op_vr`, `tipo_conta`, `email`, `senha`, `imagem`, `session`, `data_cadastro`, `data_alteracao`, `id_update_user`, `status`) VALUES
(21, 'Administrador', 'Administrador', '02/08/1992', '111.111.111-11', '11111', '(62) 9999-99999', 'Rua', '0', 'Ap 100', 'Residencial', '74000-000', 'Goiânia', 'GO', NULL, NULL, NULL, NULL, NULL, 'admin@admin.com', '$2y$12$ppFcsC0oV8Vja8iizu75be9/kYaKdKOblpjhk075mggFiI5qwNnK6', 'assets/img/avatar.jpg', NULL, '2020-06-10 01:04:39', '2020-08-11 22:35:26', 21, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
cjubeonfiguracaoconfiguracaoconfiguracaoconfiguracaojubeconfiguracaoconfiguracaoconfiguracaoconfiguracaoconfiguracao