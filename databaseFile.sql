-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           10.4.10-MariaDB - mariadb.org binary distribution
-- SO do servidor:               Win64
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


-- A despejar estrutura da base de dados para pgpc
DROP DATABASE IF EXISTS `pgpc`;
CREATE DATABASE IF NOT EXISTS `pgpc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pgpc`;

-- A despejar estrutura para tabela pgpc.advogado
DROP TABLE IF EXISTS `advogado`;
CREATE TABLE IF NOT EXISTS `advogado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Pessoa` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `advogado_id_pessoa_foreign` (`id_Pessoa`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.advogado: 7 rows
DELETE FROM `advogado`;
/*!40000 ALTER TABLE `advogado` DISABLE KEYS */;
INSERT INTO `advogado` (`id`, `nia`, `id_Pessoa`, `created_at`, `updated_at`) VALUES
	(1, '979746POL', 8, '2023-05-28 14:10:10', '2023-05-28 14:10:10'),
	(2, '979746PO55', 9, '2023-05-28 14:14:50', '2023-05-28 14:14:50'),
	(3, '979746POL88', 10, '2023-05-28 14:18:37', '2023-05-28 14:18:37'),
	(4, '979746POP', 12, '2023-05-28 16:43:18', '2023-05-28 16:43:18'),
	(5, '979746POKK', 13, '2023-05-28 16:44:20', '2023-05-28 16:44:20'),
	(6, '979746POKKDD', 16, '2023-05-28 21:57:30', '2023-05-28 21:57:30'),
	(7, '979746POKK00', 17, '2023-05-28 22:05:09', '2023-05-28 22:05:09');
/*!40000 ALTER TABLE `advogado` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.autorpeticao
DROP TABLE IF EXISTS `autorpeticao`;
CREATE TABLE IF NOT EXISTS `autorpeticao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_Pessoa` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `autorpeticao_id_pessoa_foreign` (`id_Pessoa`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.autorpeticao: 4 rows
DELETE FROM `autorpeticao`;
/*!40000 ALTER TABLE `autorpeticao` DISABLE KEYS */;
INSERT INTO `autorpeticao` (`id`, `id_Pessoa`, `created_at`, `updated_at`) VALUES
	(1, 1, '2023-05-22 14:22:43', '2023-05-22 14:22:43'),
	(2, 2, '2023-05-28 10:25:58', '2023-05-28 10:25:58'),
	(3, 18, '2023-05-29 00:33:48', '2023-05-29 00:33:48'),
	(4, 8, '2023-06-08 23:26:19', '2023-06-08 23:26:19');
/*!40000 ALTER TABLE `autorpeticao` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.denucia
DROP TABLE IF EXISTS `denucia`;
CREATE TABLE IF NOT EXISTS `denucia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_TipoCrime` bigint(20) unsigned NOT NULL,
  `id_Peticao` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `denucia_id_tipocrime_foreign` (`id_TipoCrime`),
  KEY `denucia_id_peticao_foreign` (`id_Peticao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.denucia: 0 rows
DELETE FROM `denucia`;
/*!40000 ALTER TABLE `denucia` DISABLE KEYS */;
/*!40000 ALTER TABLE `denucia` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.denunciaqueixacrime
DROP TABLE IF EXISTS `denunciaqueixacrime`;
CREATE TABLE IF NOT EXISTS `denunciaqueixacrime` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricaoCrime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localCrime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataHora` datetime NOT NULL,
  `id_reu` bigint(20) unsigned NOT NULL,
  `id_TipoCrime` bigint(20) unsigned NOT NULL,
  `id_peticao` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `denunciaqueixacrime_id_reu_foreign` (`id_reu`),
  KEY `denunciaqueixacrime_id_tipocrime_foreign` (`id_TipoCrime`),
  KEY `denunciaqueixacrime_id_peticao_foreign` (`id_peticao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.denunciaqueixacrime: 0 rows
DELETE FROM `denunciaqueixacrime`;
/*!40000 ALTER TABLE `denunciaqueixacrime` DISABLE KEYS */;
/*!40000 ALTER TABLE `denunciaqueixacrime` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.depoimento
DROP TABLE IF EXISTS `depoimento`;
CREATE TABLE IF NOT EXISTS `depoimento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Pessoa` bigint(20) unsigned NOT NULL,
  `id_peticao` bigint(20) unsigned NOT NULL,
  `id_reu` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `depoimento_id_pessoa_foreign` (`id_Pessoa`),
  KEY `depoimento_id_peticao_foreign` (`id_peticao`),
  KEY `depoimento_id_reu_foreign` (`id_reu`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.depoimento: 5 rows
DELETE FROM `depoimento`;
/*!40000 ALTER TABLE `depoimento` DISABLE KEYS */;
INSERT INTO `depoimento` (`id`, `Descricao`, `Endereco`, `id_Pessoa`, `id_peticao`, `id_reu`, `created_at`, `updated_at`) VALUES
	(16, 'uououo', '#####', 0, 2, 1, '2023-05-28 21:47:21', '2023-05-28 21:47:21'),
	(17, 'uououo08u', '#####', 14, 2, 0, '2023-05-28 21:48:06', '2023-05-28 21:48:06'),
	(18, 'testar tudo', '#####', 15, 2, 0, '2023-05-28 21:50:51', '2023-05-28 21:50:51'),
	(19, 'FEFEFEFEFEF', '#####', 0, 2, 2, '2023-05-28 22:02:17', '2023-05-28 22:02:17'),
	(20, 'fyfut', '#####', 8, 4, 0, '2023-06-08 23:36:31', '2023-06-08 23:36:31');
/*!40000 ALTER TABLE `depoimento` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.failed_jobs: 0 rows
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.juiz
DROP TABLE IF EXISTS `juiz`;
CREATE TABLE IF NOT EXISTS `juiz` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nij` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Pessoa` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `advogado_id_pessoa_foreign` (`id_Pessoa`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.juiz: 0 rows
DELETE FROM `juiz`;
/*!40000 ALTER TABLE `juiz` DISABLE KEYS */;
/*!40000 ALTER TABLE `juiz` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.migrations: 5 rows
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_04_12_232025_create_migration__user', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.migration__user
DROP TABLE IF EXISTS `migration__user`;
CREATE TABLE IF NOT EXISTS `migration__user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.migration__user: 0 rows
DELETE FROM `migration__user`;
/*!40000 ALTER TABLE `migration__user` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration__user` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.nivelacesso
DROP TABLE IF EXISTS `nivelacesso`;
CREATE TABLE IF NOT EXISTS `nivelacesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(30) NOT NULL,
  `acesso` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela pgpc.nivelacesso: 3 rows
DELETE FROM `nivelacesso`;
/*!40000 ALTER TABLE `nivelacesso` DISABLE KEYS */;
INSERT INTO `nivelacesso` (`id`, `nivel`, `acesso`) VALUES
	(1, 'admin', 'all'),
	(2, 'advogado', 'advogado,processo'),
	(3, 'policial', 'reu,vitima,processo,');
/*!40000 ALTER TABLE `nivelacesso` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.password_resets: 0 rows
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.personal_access_tokens: 0 rows
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.pessoa
DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sexo` enum('masculino','feminino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` datetime NOT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pessoa_bi_unique` (`bi`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.pessoa: 15 rows
DELETE FROM `pessoa`;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`id`, `nome`, `email`, `endereco`, `Sexo`, `data_nascimento`, `telefone`, `bi`, `created_at`, `updated_at`) VALUES
	(1, 'Teste', 'teste@gmail.com', 'Rua 17', 'masculino', '2023-04-29 00:00:00', '+55922209032', '243564yu893456789', '2023-04-18 00:45:05', '2023-04-18 00:45:05'),
	(2, 'Tambu Jenny', 'leandro@construcode.com', 'Martires do Kifangondo Rua 17', 'masculino', '2023-05-28 00:00:00', '+244922201312', '977946463120', '2023-05-28 10:25:58', '2023-05-28 10:25:58'),
	(3, 'Populacao Angolana', 'djennymasengidbanj@gmail.com', 'Rocha Pinto', 'masculino', '2023-05-27 00:00:00', '925880579', '00000', '2023-05-28 10:26:46', '2023-05-28 10:26:46'),
	(8, 'OBRA 005', 'tambujenny@gmail.com', '####', 'masculino', '2023-05-28 15:10:10', '925880579', '978789465435312', '2023-05-28 14:10:10', '2023-05-28 14:10:10'),
	(9, 'OBRA 006', 'tambujenn8@gmail.com', '####', 'masculino', '2023-05-28 15:14:50', '925880579', '97878946543539009', '2023-05-28 14:14:50', '2023-05-28 14:14:50'),
	(10, 'OBRA 458', 'tambujenn855@gmail.com', '####', 'masculino', '2023-05-28 15:18:37', '925880579', '9787894654378912', '2023-05-28 14:18:37', '2023-05-28 14:18:37'),
	(11, 'McTambu', 'tambuje987ny@gmail.com', 'Rocha Pinto rua 23', 'masculino', '2023-05-28 00:00:00', '925880579', '978789465435378', '2023-05-28 15:56:10', '2023-05-28 15:56:10'),
	(12, 'OBRA 6788', 'tambujenny96@gmail.com', '####', 'masculino', '2023-05-28 17:43:17', '92588057741', '976446134224', '2023-05-28 16:43:17', '2023-05-28 16:43:17'),
	(13, 'OUUOUO', 'tambujennRWy96@gmail.com', '####', 'masculino', '2023-05-28 17:44:20', '92588057414741', '9764461342224242', '2023-05-28 16:44:20', '2023-05-28 16:44:20'),
	(14, 'Torre 30853535', 'leandro@construcode.com', 'Martires do Kifangondo Rua 18', 'masculino', '2023-05-28 00:00:00', '+244922201312', '976446139746', '2023-05-28 18:52:38', '2023-05-28 18:52:38'),
	(15, 'OBRA 4B8r3B4p7yhRXuBWLqsQ546WR43cqQwrbXMDFnBi6vSJBeif8tPW85a7r7DM961Jvk4hdryZoByEp8GC8HzsqJpRN4FxGM9:00', '97463131', 'rtyuiop746', '2023-05-28 21:50:32', '2023-05-28 21:50:32'),
	(16, 'Torre 30853535', 'leandro@construcode.com', '####', 'masculino', '2023-05-28 22:57:30', '+244922201312', '97644613946461313', '2023-05-28 21:57:30', '2023-05-28 21:57:30'),
	(17, 'OBRA 005ewrwr', 'tambujenny@gmail.com', '####', 'masculino', '2023-05-28 23:05:08', '925880579', '94631', '2023-05-28 22:05:08', '2023-05-28 22:05:08'),
	(18, 'Andre Maria José', 'joseMaria@gmail.com', 'Martires do Kifangondo Rua 17', 'masculino', '1996-11-21 00:00:00', '974631258', '974631310258POL', '2023-05-29 00:33:48', '2023-05-29 00:33:48'),
	(19, 'Andre Maria José Y', 'joseMaria@gmail.com', 'Martires do Kifangondo Rua 17', 'masculino', '2023-05-29 00:00:00', '974631257', '978789465435317PL', '2023-05-29 00:34:44', '2023-05-29 00:34:44');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.peticao
DROP TABLE IF EXISTS `peticao`;
CREATE TABLE IF NOT EXISTS `peticao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricaoCrime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_autorPeticao` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peticao_id_autorpeticao_foreign` (`id_autorPeticao`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.peticao: 4 rows
DELETE FROM `peticao`;
/*!40000 ALTER TABLE `peticao` DISABLE KEYS */;
INSERT INTO `peticao` (`id`, `descricaoCrime`, `id_autorPeticao`, `created_at`, `updated_at`) VALUES
	(1, 'Boa, boa, boa', 1, '2023-05-22 14:22:43', '2023-05-22 14:22:43'),
	(2, 'Tráfico de Órgão', 2, '2023-05-28 10:25:58', '2023-05-28 10:25:58'),
	(3, 'Tráfico de órgão.', 3, '2023-05-29 00:33:48', '2023-05-29 00:33:48'),
	(4, 'select *from pessoa', 4, '2023-06-08 23:26:19', '2023-06-08 23:26:19');
/*!40000 ALTER TABLE `peticao` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.processo
DROP TABLE IF EXISTS `processo`;
CREATE TABLE IF NOT EXISTS `processo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_Peticao` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_tipoCrime` bigint(20) unsigned DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `processo_id_peticao_foreign` (`id_Peticao`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.processo: 3 rows
DELETE FROM `processo`;
/*!40000 ALTER TABLE `processo` DISABLE KEYS */;
INSERT INTO `processo` (`id`, `id_Peticao`, `created_at`, `updated_at`, `id_tipoCrime`, `nome`) VALUES
	(1, 2, '2023-05-28 22:10:59', '2023-05-28 22:10:59', 2, NULL),
	(2, 3, '2023-05-29 00:38:57', '2023-05-29 00:38:57', 1, 'OG Simpson'),
	(3, 4, '2023-06-08 23:58:47', '2023-06-08 23:58:47', 1, 'OBRA 6788');
/*!40000 ALTER TABLE `processo` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.prova
DROP TABLE IF EXISTS `prova`;
CREATE TABLE IF NOT EXISTS `prova` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `urlFile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_reu` bigint(20) unsigned DEFAULT NULL,
  `id_vitima` bigint(20) unsigned DEFAULT NULL,
  `id_autorPeticao` bigint(20) unsigned DEFAULT NULL,
  `id_DenunciaQueixaCrime` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prova_id_reu_foreign` (`id_reu`),
  KEY `prova_id_vitima_foreign` (`id_vitima`),
  KEY `prova_id_autorpeticao_foreign` (`id_autorPeticao`),
  KEY `prova_id_denunciaqueixacrime_foreign` (`id_DenunciaQueixaCrime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.prova: 0 rows
DELETE FROM `prova`;
/*!40000 ALTER TABLE `prova` DISABLE KEYS */;
/*!40000 ALTER TABLE `prova` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.reu
DROP TABLE IF EXISTS `reu`;
CREATE TABLE IF NOT EXISTS `reu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` enum('masculino','feminino') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nascimento` datetime DEFAULT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_imageFoto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_peticao` bigint(20) unsigned NOT NULL,
  `id_advogado` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reu_id_advogado_foreign` (`id_advogado`),
  KEY `reu_id_peticao_foreign` (`id_peticao`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.reu: 4 rows
DELETE FROM `reu`;
/*!40000 ALTER TABLE `reu` DISABLE KEYS */;
INSERT INTO `reu` (`id`, `nome`, `email`, `endereco`, `sexo`, `data_nascimento`, `telefone`, `bi`, `url_imageFoto`, `id_peticao`, `id_advogado`, `created_at`, `updated_at`) VALUES
	(1, 'TambuLeleno', NULL, 'Rocha Pinto rua 23', 'masculino', '2023-05-28 00:00:00', NULL, '978789465435312', 'sem foto', 2, 6, '2023-05-28 16:04:11', '2023-05-28 21:57:30'),
	(2, 'OBRA 0085', 'tambujenny@gmail.com', 'Rocha Pinto rua 23', 'masculino', '2023-05-29 00:00:00', '92588085412', '974646133131', 'sem foto', 2, 7, '2023-05-28 22:01:48', '2023-05-28 22:05:09'),
	(3, 'Ze Maria Luis', 'leandro@construcode.com', 'Martires do Kifangondo Rua 18', 'masculino', '2023-05-29 00:00:00', '985520314', 'ertyuiop34567890DR', 'sem foto', 3, NULL, '2023-05-29 00:36:10', '2023-05-29 00:36:10'),
	(4, 'Tip.NUM 4', 'tambujenny6464@gmail.com', 'Martires do Kifangondo Rua 17', 'masculino', '2023-06-09 00:00:00', '+244922271312', '978789465435312', 'sem foto', 4, NULL, '2023-06-08 23:34:01', '2023-06-08 23:34:01');
/*!40000 ALTER TABLE `reu` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.tipocrime
DROP TABLE IF EXISTS `tipocrime`;
CREATE TABLE IF NOT EXISTS `tipocrime` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Classificacao` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.tipocrime: 19 rows
DELETE FROM `tipocrime`;
/*!40000 ALTER TABLE `tipocrime` DISABLE KEYS */;
INSERT INTO `tipocrime` (`id`, `Nome`, `Classificacao`, `created_at`, `updated_at`) VALUES
	(1, 'Homicídio', NULL, NULL, NULL),
	(2, 'Estupro', NULL, NULL, NULL),
	(3, 'Roubo', NULL, NULL, NULL),
	(4, 'Furto', NULL, NULL, NULL),
	(5, 'Tráfico de drogas', NULL, NULL, NULL),
	(6, 'Lavagem de dinheiro', NULL, NULL, NULL),
	(7, 'Sequestro', NULL, NULL, NULL),
	(8, 'Terrorismo', NULL, NULL, NULL),
	(9, 'Fraude', NULL, NULL, NULL),
	(10, 'Difamação', NULL, NULL, NULL),
	(11, 'Injúria racial', NULL, NULL, NULL),
	(12, 'Discriminação de gênero', NULL, NULL, NULL),
	(13, 'Assédio sexual', NULL, NULL, NULL),
	(14, 'Abuso de poder', NULL, NULL, NULL),
	(15, 'Crime ambiental', NULL, NULL, NULL),
	(16, 'Contrabando', NULL, NULL, NULL),
	(17, 'Pirataria', NULL, NULL, NULL),
	(18, 'Pirataria', NULL, NULL, NULL),
	(19, 'Violência doméstica', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tipocrime` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.users: 0 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `senha` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Pessoa` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idNivelAcesso` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios_id_pessoa_foreign` (`id_Pessoa`),
  KEY `idNivelAcesso` (`idNivelAcesso`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.usuarios: 1 rows
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `senha`, `id_Pessoa`, `created_at`, `updated_at`, `idNivelAcesso`) VALUES
	(1, '2345', 1, '2023-04-18 00:45:05', '2023-04-18 00:45:05', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.vitima
DROP TABLE IF EXISTS `vitima`;
CREATE TABLE IF NOT EXISTS `vitima` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pessoa` bigint(20) unsigned NOT NULL,
  `id_peticao` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vitima_id_peticao_foreign` (`id_peticao`),
  KEY `vitima_id_pessoa_foreign` (`id_pessoa`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.vitima: 4 rows
DELETE FROM `vitima`;
/*!40000 ALTER TABLE `vitima` DISABLE KEYS */;
INSERT INTO `vitima` (`id`, `id_pessoa`, `id_peticao`, `created_at`, `updated_at`) VALUES
	(6, 14, 2, '2023-05-28 18:53:33', '2023-05-28 18:53:33'),
	(7, 15, 2, '2023-05-28 21:50:32', '2023-05-28 21:50:32'),
	(8, 19, 3, '2023-05-29 00:34:44', '2023-05-29 00:34:44'),
	(9, 8, 4, '2023-06-08 23:27:05', '2023-06-08 23:27:05');
/*!40000 ALTER TABLE `vitima` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
