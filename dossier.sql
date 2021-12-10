/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.21-MariaDB : Database - dossier
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dossier` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dossier`;

/*Table structure for table `adiministrador` */

DROP TABLE IF EXISTS `adiministrador`;

CREATE TABLE `adiministrador` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `chave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `adiministrador` */

/*Table structure for table `aluno` */

DROP TABLE IF EXISTS `aluno`;

CREATE TABLE `aluno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `aluno` */

insert  into `aluno`(`id`,`ra`,`created_at`,`updated_at`) values 
(5,'79797979',NULL,NULL),
(6,'11111111','2021-11-24 19:48:42','2021-11-24 19:48:42');

/*Table structure for table `arquivo` */

DROP TABLE IF EXISTS `arquivo`;

CREATE TABLE `arquivo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` bigint(20) NOT NULL,
  `caminho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pai` int(11) DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `arquivo_caminho_unique` (`caminho`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `arquivo` */

insert  into `arquivo`(`id`,`nome`,`usuario_id`,`caminho`,`pai`,`tipo`,`created_at`,`updated_at`) values 
(1,'Sala 001',1,'/arquivos/felipe@secretario/Sala 001/',0,'pasta','2021-11-23 23:00:32','2021-11-23 23:00:32'),
(9,'ju',2,'/arquivos/felipe@aluno/ju/',0,'pasta','2021-11-24 23:18:44','2021-11-24 23:18:44'),
(10,'i257652.jpeg',2,'/arquivos/felipe@aluno/23190320211124619ec86795adc.jpg',0,'arquivo','2021-11-24 23:19:03','2021-11-24 23:19:03'),
(11,'sala 002',1,'/arquivos/felipe@secretario/sala 002/',0,'pasta','2021-11-26 23:32:46','2021-11-26 23:32:46'),
(12,'minha pasta',1,'/arquivos/felipe@secretario/sala 002/minha pasta/',11,'pasta','2021-11-26 23:33:10','2021-11-26 23:33:10'),
(13,'esqueleto.png',1,'/arquivos/felipe@secretario/2253442021120261a94e788990d.png',0,'arquivo','2021-12-02 22:53:45','2021-12-02 22:53:45'),
(14,'Claudemir',1,'/arquivos/felipe@secretario/Claudemir/',0,'pasta','2021-12-02 22:55:06','2021-12-02 22:55:06'),
(15,'lorem-ipsum.pdf',3,'/arquivos/felipe@prof/1959402021120761afbd2c597b1.pdf',0,'arquivo','2021-12-07 19:59:40','2021-12-07 19:59:40'),
(18,'lorem-ipsum.pdf',1,'/arquivos/felipe@secretario/Sala 001/2032292021120961b267dd51712.pdf',1,'arquivo','2021-12-09 20:32:29','2021-12-09 20:32:29'),
(19,'lorem-ipsum.pdf',1,'/arquivos/felipe@secretario/2345552021120961b29533ea62a.pdf',0,'arquivo','2021-12-09 23:45:56','2021-12-09 23:45:56'),
(20,'Apresentação pi',1,'/arquivos/felipe@secretario/Apresentação pi/',0,'pasta','2021-12-09 23:46:09','2021-12-09 23:46:09');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2019_12_14_000001_create_personal_access_tokens_table',1),
(2,'2021_10_04_202220_criar_tabela_usuario',1),
(3,'2021_11_03_202220_criar_tabela_arquivo',1),
(4,'2021_11_03_202221_criar_tabela_usuario_arquivo',1),
(5,'2021_11_16_194400_criar_tabela_secretario',1),
(6,'2021_11_16_194700_criar_tabela_aluno',1),
(7,'2021_11_16_194900_criar_tabela_professor',1),
(8,'2021_11_16_195200_criar_tabela_adiministrador',1),
(9,'2021_11_16_195500_criar_tabela_usuario_tipo',1);

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `professor` */

DROP TABLE IF EXISTS `professor`;

CREATE TABLE `professor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `professor` */

insert  into `professor`(`id`,`endereco`,`created_at`,`updated_at`) values 
(7,'9889698698',NULL,NULL),
(8,'11.111.111-1','2021-11-25 19:56:44','2021-11-25 19:56:44'),
(10,'rua x','2021-12-02 22:18:54','2021-12-02 22:18:54'),
(11,'rua x','2021-12-07 19:50:16','2021-12-07 19:50:16');

/*Table structure for table `secretario` */

DROP TABLE IF EXISTS `secretario`;

CREATE TABLE `secretario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `turno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `secretario` */

insert  into `secretario`(`id`,`turno`,`created_at`,`updated_at`) values 
(1,'das 8 as 22','2021-11-22 22:34:12','2021-11-22 22:34:12');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verificado` timestamp NULL DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`nome`,`email`,`email_verificado`,`senha`,`cpf`,`telefone`,`nascimento`,`genero`,`ativo`,`created_at`,`updated_at`) values 
(1,'Felipe dos Santos Cavalca','felipe@secretario',NULL,'202cb962ac59075b964b07152d234b70','111111111','11111111111111','1111-11-11',NULL,1,'2021-11-22 22:34:12','2021-11-22 22:34:12'),
(2,'Felipe dos Santos Cavalca','felipe@aluno',NULL,'202cb962ac59075b964b07152d234b70','111.111.111.11','(11) 11111-1111','1111-11-11',NULL,1,'2021-11-24 19:48:42','2021-11-24 19:48:42'),
(3,'Felipe dos Santos Cavalca','felipe@prof',NULL,'202cb962ac59075b964b07152d234b70','111.111.111.11','(11) 11111-1111','1111-11-11',NULL,1,'2021-11-25 19:56:44','2021-11-25 19:56:44'),
(5,'Darla','darla@prof',NULL,'202cb962ac59075b964b07152d234b70','222.222.222.22','(22) 22222-2222','2002-07-30','fem',1,'2021-12-02 22:18:54','2021-12-02 22:18:54'),
(6,'luca','luca@prof',NULL,'202cb962ac59075b964b07152d234b70','111.111.111.11','(11) 11111-1111','1111-11-11','mas',1,'2021-12-07 19:50:16','2021-12-07 19:50:16');

/*Table structure for table `usuario_arquivo` */

DROP TABLE IF EXISTS `usuario_arquivo`;

CREATE TABLE `usuario_arquivo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) NOT NULL,
  `arquivo_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `usuario_arquivo` */

insert  into `usuario_arquivo`(`id`,`usuario_id`,`arquivo_id`,`created_at`,`updated_at`) values 
(1,2,2,'2021-11-24 22:08:23','2021-11-24 22:08:23'),
(2,2,3,'2021-11-24 22:08:33','2021-11-24 22:08:33'),
(3,2,5,'2021-11-24 22:09:09','2021-11-24 22:09:09'),
(4,2,7,'2021-11-24 23:13:22','2021-11-24 23:13:22'),
(5,2,8,'2021-11-24 23:14:32','2021-11-24 23:14:32'),
(6,2,10,'2021-11-24 23:19:03','2021-11-24 23:19:03'),
(7,1,13,'2021-12-02 22:53:45','2021-12-02 22:53:45'),
(8,3,15,'2021-12-07 19:59:41','2021-12-07 19:59:41'),
(9,1,17,'2021-12-09 20:31:53','2021-12-09 20:31:53'),
(10,1,18,'2021-12-09 20:32:29','2021-12-09 20:32:29'),
(11,1,19,'2021-12-09 23:45:56','2021-12-09 23:45:56');

/*Table structure for table `usuario_tipo` */

DROP TABLE IF EXISTS `usuario_tipo`;

CREATE TABLE `usuario_tipo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) NOT NULL,
  `relacionamento_id` bigint(20) NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `usuario_tipo` */

insert  into `usuario_tipo`(`id`,`usuario_id`,`relacionamento_id`,`tipo`,`ativo`,`created_at`,`updated_at`) values 
(1,1,1,'Secretario',1,'2021-11-22 22:34:12','2021-11-22 22:34:12'),
(2,1,5,'Aluno',1,NULL,NULL),
(3,1,7,'Professor',1,NULL,NULL),
(4,2,6,'Aluno',1,'2021-11-24 19:48:42','2021-11-24 19:48:42'),
(5,3,8,'Professor',1,'2021-11-25 19:56:44','2021-11-25 19:56:44'),
(6,5,10,'Professor',1,'2021-12-02 22:18:54','2021-12-02 22:18:54'),
(7,6,11,'Professor',1,'2021-12-07 19:50:16','2021-12-07 19:50:16');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
