-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.34 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para beju
CREATE DATABASE IF NOT EXISTS `beju` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `beju`;

-- Copiando estrutura para tabela beju.appointment
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela beju.appointment: ~4 rows (aproximadamente)
INSERT IGNORE INTO `appointment` (`id`, `title`, `start_date`, `end_date`, `status`) VALUES
	(5, 'Fazer Compras', '2023-12-14', '2023-12-15', 0),
	(20, 'Jogar Volei', '2023-12-01', '2023-12-02', 0),
	(21, 'Passear Com o Gato', '2023-12-06', '2023-12-06', 0),
	(22, 'Ir ao Boteco', '2023-12-09', '2023-12-09', 1);

-- Copiando estrutura para tabela beju.configuracao
CREATE TABLE IF NOT EXISTS `configuracao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `app_title` varchar(255) NOT NULL,
  `protocol` enum('http://','https://') NOT NULL,
  `environment` enum('Desenvolvimento','Produção') NOT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_user` varchar(255) DEFAULT NULL,
  `mail_pass` varchar(255) DEFAULT NULL,
  `mail_auth` enum('true','false') DEFAULT 'true',
  `mail_secure` enum('ssl','tls') DEFAULT 'ssl',
  `mail_port` int DEFAULT '465',
  `mail_sendtype` enum('isSMTP','isMAIL') DEFAULT 'isSMTP',
  `mail_contact` varchar(255) DEFAULT '',
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_update_user` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela beju.configuracao: ~1 rows (aproximadamente)
INSERT IGNORE INTO `configuracao` (`id`, `app_title`, `protocol`, `environment`, `mail_host`, `mail_user`, `mail_pass`, `mail_auth`, `mail_secure`, `mail_port`, `mail_sendtype`, `mail_contact`, `data_cadastro`, `data_alteracao`, `id_update_user`, `status`) VALUES
	(1, 'SMART Soluções Inteligentes', 'http://', 'Desenvolvimento', 'smtp.hostinger.com.br', 'no-reply@smartsolucoesinteligentes.com.br', '02081992', 'true', 'tls', 587, 'isSMTP', 'joaopaulo@informaticajk.com.br', '2020-01-27 19:45:19', '2020-08-11 22:43:10', 21, 1);

-- Copiando estrutura para tabela beju.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_update_user` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela beju.user: ~3 rows (aproximadamente)
INSERT IGNORE INTO `user` (`id`, `acesso`, `nome`, `data_nascimento`, `cpf`, `rg`, `telefone`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado`, `banco`, `agencia`, `conta`, `op_vr`, `tipo_conta`, `email`, `senha`, `imagem`, `session`, `data_cadastro`, `data_alteracao`, `id_update_user`, `status`) VALUES
	(21, 'Administrador', 'Administrador', '02/08/1992', '111.111.111-11', '11111', '(62) 9999-99999', 'Rua', '0', 'Ap 100', 'Residencial', '74000-000', 'Goiânia', 'GO', NULL, NULL, NULL, NULL, NULL, 'admin@admin.com', '$2y$12$ppFcsC0oV8Vja8iizu75be9/kYaKdKOblpjhk075mggFiI5qwNnK6', 'assets/img/avatar.jpg', NULL, '2020-06-10 01:04:39', '2020-08-11 22:35:26', 21, 1),
	(34, 'Administrador', 'teste', '', NULL, NULL, '(11) 1111-1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rbeer@hotmail.com', '123', 'assets/img/avatar.jpg', NULL, '2023-12-18 19:52:53', NULL, NULL, 1),
	(37, 'Administrador', 'teste', '', NULL, NULL, '(11) 1111-1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'joe@raddar.com.br', '123', 'assets/img/avatar.jpg', NULL, '2023-12-18 19:56:51', NULL, NULL, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
