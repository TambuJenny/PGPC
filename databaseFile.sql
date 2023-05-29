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
CREATE DATABASE IF NOT EXISTS `pgpc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pgpc`;

-- A despejar estrutura para tabela pgpc.failed_jobs
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
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.migrations: 5 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_04_12_232025_create_migration__user', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.migration__user
CREATE TABLE IF NOT EXISTS `migration__user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.migration__user: 0 rows
/*!40000 ALTER TABLE `migration__user` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration__user` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.personal_access_tokens
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
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.pessoa
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
  UNIQUE KEY `pessoa_email_unique` (`email`),
  UNIQUE KEY `pessoa_telefone_unique` (`telefone`),
  UNIQUE KEY `pessoa_bi_unique` (`bi`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.pessoa: 1 rows
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`id`, `nome`, `email`, `endereco`, `Sexo`, `data_nascimento`, `telefone`, `bi`, `created_at`, `updated_at`) VALUES
	(1, 'Teste', 'teste@gmail.com', 'Rua 17', 'masculino', '2023-04-29 00:00:00', '+55922209032', '243564yu893456789', '2023-04-18 02:45:05', '2023-04-18 02:45:05');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.processo
CREATE TABLE IF NOT EXISTS `processo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_Reu` bigint(20) unsigned NOT NULL,
  `id_TipoCrime` bigint(20) unsigned NOT NULL,
  `DataHora` datetime NOT NULL,
  `localincidente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relatorio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evidencia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `processo_id_reu_foreign` (`id_Reu`),
  KEY `processo_id_tipocrime_foreign` (`id_TipoCrime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.processo: 0 rows
/*!40000 ALTER TABLE `processo` DISABLE KEYS */;
/*!40000 ALTER TABLE `processo` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.reu
CREATE TABLE IF NOT EXISTS `reu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_Pessoa` bigint(20) unsigned NOT NULL,
  `url_imageFoto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reu_id_pessoa_foreign` (`id_Pessoa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.reu: 0 rows
/*!40000 ALTER TABLE `reu` DISABLE KEYS */;
/*!40000 ALTER TABLE `reu` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.tipocrime
CREATE TABLE IF NOT EXISTS `tipocrime` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.tipocrime: 19 rows
/*!40000 ALTER TABLE `tipocrime` DISABLE KEYS */;
INSERT INTO `tipocrime` (`id`, `Nome`, `created_at`, `updated_at`) VALUES
	(1, 'Homicídio', NULL, NULL),
	(2, 'Estupro', NULL, NULL),
	(3, 'Roubo', NULL, NULL),
	(4, 'Furto', NULL, NULL),
	(5, 'Tráfico de drogas', NULL, NULL),
	(6, 'Lavagem de dinheiro', NULL, NULL),
	(7, 'Sequestro', NULL, NULL),
	(8, 'Terrorismo', NULL, NULL),
	(9, 'Fraude', NULL, NULL),
	(10, 'Difamação', NULL, NULL),
	(11, 'Injúria racial', NULL, NULL),
	(12, 'Discriminação de gênero', NULL, NULL),
	(13, 'Assédio sexual', NULL, NULL),
	(14, 'Abuso de poder', NULL, NULL),
	(15, 'Crime ambiental', NULL, NULL),
	(16, 'Contrabando', NULL, NULL),
	(17, 'Pirataria', NULL, NULL),
	(18, 'Violência doméstica', NULL, NULL);
/*!40000 ALTER TABLE `tipocrime` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.users
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
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- A despejar estrutura para tabela pgpc.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `senha` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Pessoa` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios_id_pessoa_foreign` (`id_Pessoa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela pgpc.usuarios: 1 rows
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `senha`, `id_Pessoa`, `created_at`, `updated_at`) VALUES
	(1, '2345', 1, '2023-04-18 02:45:05', '2023-04-18 02:45:05');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
