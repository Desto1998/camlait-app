-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour camlait-app
CREATE
DATABASE IF NOT EXISTS `camlait-app` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE
`camlait-app`;

-- Listage de la structure de la table camlait-app. caisses
CREATE TABLE IF NOT EXISTS `caisses`
(
    `caisse_id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `montant` float NOT NULL,
    `raison` varchar
(
    255
) DEFAULT NULL,
    `date_depot` date DEFAULT NULL,
    `description` varchar
(
    1000
) DEFAULT NULL,
    `idtache` int
(
    11
) DEFAULT NULL,
    `identre` int
(
    11
) DEFAULT NULL,
    `idpaiement` int
(
    11
) DEFAULT NULL,
    `type_operation` int
(
    11
) NOT NULL,
    `iduser` int
(
    11
) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY
(
    `caisse_id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

-- Listage des données de la table camlait-app.caisses : ~104 rows (environ)
/*!40000 ALTER TABLE `caisses` DISABLE KEYS */;
REPLACE
INTO `caisses` (`caisse_id`, `montant`, `raison`, `date_depot`, `description`, `idtache`, `identre`, `idpaiement`, `type_operation`, `iduser`, `created_at`, `updated_at`) VALUES
	(1, 50000, 'Approvisionnement de la caisse', '2022-04-22', 'pour toutes depenses liées a l\'entreprise', NULL, 1, NULL, 1, 3, '2022-04-22 00:10:39', '2022-04-22 00:10:39'),
	(2, 2000, 'Sortie pour les charges', '2022-04-22', 'achat d\'eau buvable en bidons', 1, NULL, NULL, 0, 3, '2022-04-22 00:11:05', '2022-04-22 00:11:05'),
	(3, 110000, 'Versement pour facture', '2022-05-06', 'versement total', NULL, NULL, 1, 1, 3, '2022-04-22 00:32:11', '2022-05-06 05:11:34'),
	(4, 164000, 'Sortie pour les charges', '2022-04-23', 'achat du materiels', 2, NULL, NULL, 0, 3, '2022-04-23 04:31:57', '2022-04-23 04:31:57'),
	(5, 10000, 'vente de la souris et approvisionnement de la caisse', '2022-05-06', 'Pour les deplacements', NULL, 2, NULL, 1, 3, '2022-05-04 10:24:09', '2022-05-06 09:49:12'),
	(6, 75000, 'location imprimante', '2022-05-06', 'Reglement de la facture', NULL, 3, NULL, 1, 3, '2022-05-04 10:24:45', '2022-05-06 09:48:56'),
	(7, 1000, 'Sortie pour les charges', '2022-05-04', 'deplacement pour depot facture FUTURIS HOTEL', 3, NULL, NULL, 0, 3, '2022-05-04 10:27:56', '2022-05-04 10:29:01'),
	(8, 10000, 'Sortie pour les charges', '2022-05-05', 'reglement facture ALL IN ONE', 4, NULL, NULL, 0, 3, '2022-05-05 03:21:54', '2022-05-05 03:21:54'),
	(9, 6000, 'Versement pour facture', '2022-05-06', 'pour solder', NULL, NULL, 2, 1, 3, '2022-05-06 05:12:21', '2022-05-06 05:12:21'),
	(10, 6000, 'Sortie pour les charges', '2022-05-06', 'depence de test', 5, NULL, NULL, 0, 3, '2022-05-06 05:43:25', '2022-05-06 05:43:25'),
	(11, 10000, 'Sortie pour les charges', '2022-05-06', 'décaissement pour achat du materiel', 6, NULL, NULL, 0, 3, '2022-05-06 05:45:04', '2022-05-06 05:45:04'),
	(12, 300, 'Sortie pour les charges', '2022-05-06', 'versement a ALL IN ONE', 7, NULL, NULL, 0, 3, '2022-05-06 05:46:13', '2022-05-06 05:46:13'),
	(13, 6000, 'Sortie pour les charges', '2022-05-06', 'test', 8, NULL, NULL, 0, 3, '2022-05-06 06:21:42', '2022-05-06 06:21:42'),
	(14, 5000, 'Sortie pour les charges', '2022-05-06', 'consommation de la moto', 9, NULL, NULL, 0, 3, '2022-05-06 07:28:48', '2022-05-06 07:28:48'),
	(15, 1000, 'Sortie pour les charges', '2022-05-06', 'Crédit de communication du commercial', 10, NULL, NULL, 0, 3, '2022-05-06 07:32:29', '2022-05-06 07:32:29'),
	(16, 2000, 'Approvisionnement de la caisse', '2022-05-06', 'Pour les deplacements', NULL, 4, NULL, 1, 3, '2022-05-06 08:59:46', '2022-05-06 09:49:32'),
	(17, 4900, 'Approvisionnement de la caisse', '2022-05-06', 'Pour les deplacements', NULL, 5, NULL, 1, 3, '2022-05-06 09:01:32', '2022-05-06 09:49:45'),
	(18, 12000, 'Vente des consommables au CABINET MAITRE NICOLE', '2022-05-06', 'Versement fait par akilas', NULL, 6, NULL, 1, 3, '2022-05-06 09:35:11', '2022-05-06 09:48:32'),
	(19, 1000, 'Sortie pour les charges', '2022-05-06', 'Deplacement pour inetervention', 11, NULL, NULL, 0, 3, '2022-05-06 16:04:56', '2022-05-06 16:04:56'),
	(20, 25000, 'Sortie pour les charges', '2022-05-09', 'ACHAT DU TONER POUR LIVRAISON', 12, NULL, NULL, 0, 3, '2022-05-09 10:11:03', '2022-05-09 10:11:03'),
	(21, 500, 'Sortie pour les charges', '2022-05-09', 'deplacement pour la collecte des prix', 13, NULL, NULL, 0, 3, '2022-05-09 13:53:28', '2022-05-09 13:53:28'),
	(22, 200, 'Sortie pour les charges', '2022-05-09', 'deplacement pour depot machine chez BONIFACE', 14, NULL, NULL, 0, 3, '2022-05-09 15:53:41', '2022-05-09 15:53:41'),
	(23, 4000, 'pour la vente d\'une rallonge', '2022-05-10', 'versement par akilas', NULL, 7, NULL, 1, 3, '2022-05-10 09:33:34', '2022-05-10 09:33:49'),
	(24, 5000, 'Sortie pour les charges', '2022-05-10', 'achat d\'eux buvable, papier et thé', 15, NULL, NULL, 0, 3, '2022-05-10 13:29:01', '2022-05-10 13:29:01'),
	(25, 5500, 'Sortie pour les charges', '2022-05-10', 'Expedition colis', 16, NULL, NULL, 0, 3, '2022-05-10 15:35:17', '2022-05-10 15:35:17'),
	(26, 250, 'Sortie pour les charges', '2022-05-10', 'Deplacement pour recuperation machine INTECK', 17, NULL, NULL, 0, 3, '2022-05-10 16:31:38', '2022-05-10 16:31:38'),
	(27, 200, 'APPROVISIONNEMENT DE LA CAISSE', '2022-05-11', NULL, NULL, 8, NULL, 1, 3, '2022-05-11 09:33:36', '2022-05-11 15:41:31'),
	(28, 7500, 'Sortie pour les charges', '2022-05-11', 'ACHAT DE LA COL', 18, NULL, NULL, 0, 3, '2022-05-11 15:32:30', '2022-05-11 15:32:30'),
	(29, 200, 'Sortie pour les charges', '2022-05-11', 'RECUPERATION DE LA MACHINE A INTEK', 19, NULL, NULL, 0, 3, '2022-05-11 15:37:52', '2022-05-11 15:37:52'),
	(30, 200, 'Sortie pour les charges', '2022-05-11', 'DEPOT DE LA MACHINE A INTEK', 20, NULL, NULL, 0, 3, '2022-05-11 15:38:23', '2022-05-11 15:38:23'),
	(31, 200, 'Sortie pour les charges', '2022-05-11', 'RECUPERATION DE LA MACHINE A INTEK', 21, NULL, NULL, 0, 3, '2022-05-11 15:40:19', '2022-05-11 15:40:19'),
	(32, 20000, 'VTE DU DISQUE DUR A INTEK', '2022-05-11', 'VERSEMENT PAR AKILAS', NULL, 9, NULL, 1, 3, '2022-05-11 15:57:41', '2022-05-11 15:57:56'),
	(33, 10000, 'Sortie pour les charges', '2022-05-12', 'ACHAT DU MATERIEL', 22, NULL, NULL, 0, 3, '2022-05-12 07:51:18', '2022-05-12 07:51:18'),
	(34, 700, 'Sortie pour les charges', '2022-05-12', 'DEPLACEMENT POUR DIAGNOSTIQUE  ONDULEUR CABINET MAITRE', 23, NULL, NULL, 0, 3, '2022-05-12 11:19:23', '2022-05-12 11:19:23'),
	(35, 30000, 'Sortie pour les charges', '2022-05-12', 'ACHAT DE 03 CABLES HDMI', 24, NULL, NULL, 0, 3, '2022-05-12 15:04:51', '2022-05-12 15:04:51'),
	(36, 200, 'Sortie pour les charges', '2022-05-12', 'DEPOT DE LA MACHINE A ALL IN ONE', 25, NULL, NULL, 0, 3, '2022-05-12 15:05:50', '2022-05-12 15:05:50'),
	(37, 60000, 'ENCAISSEMENT A HDCOM', '2022-05-12', NULL, NULL, 10, NULL, 1, 3, '2022-05-12 16:30:20', '2022-05-12 16:30:20'),
	(38, 85000, 'VTE DU MATERIEL A CAMI TOYOTA', '2022-05-12', NULL, NULL, 11, NULL, 1, 3, '2022-05-12 16:31:28', '2022-05-12 16:31:28'),
	(39, 12000, 'Sortie pour les charges', '2022-05-13', 'AUTRES ACHAT', 26, NULL, NULL, 0, 3, '2022-05-13 11:16:06', '2022-05-13 11:16:06'),
	(40, 1000, 'Sortie pour les charges', '2022-05-13', 'DEPOT DE LA FACTURE A CAMI TOYOTA', 27, NULL, NULL, 0, 3, '2022-05-13 11:54:57', '2022-05-13 11:54:57'),
	(41, 5000, 'Sortie pour les charges', '2022-05-13', 'CONSOMMATION DE LA MOTO', 28, NULL, NULL, 0, 3, '2022-05-13 11:55:29', '2022-05-13 11:55:29'),
	(42, 112000, 'Sortie pour les charges', '2022-05-13', 'paiement de la facture d\'electricité', 29, NULL, NULL, 0, 3, '2022-05-13 15:29:45', '2022-05-13 15:29:45'),
	(43, 6900, 'Sortie pour les charges', '2022-05-13', 'Cotisation CNPS', 30, NULL, NULL, 0, 3, '2022-05-13 15:31:16', '2022-05-13 15:31:16'),
	(44, 1000, 'Sortie pour les charges', '2022-05-13', 'DEPLACEMENT POUR RECUPERATION DU DISQUE DUR A ISAM', 31, NULL, NULL, 0, 3, '2022-05-13 15:51:27', '2022-05-13 15:51:27'),
	(45, 15000, 'APPROVISIONNEMENT DE LA CAISSE', '2022-05-16', NULL, NULL, 12, NULL, 1, 3, '2022-05-16 13:51:05', '2022-05-16 13:51:05'),
	(46, 1000, 'APPROVISIONNEMENT DE LA CAISSE', '2022-05-16', NULL, NULL, 13, NULL, 1, 3, '2022-05-16 13:53:03', '2022-05-16 13:53:03'),
	(47, 25000, 'Sortie pour les charges', '2022-05-16', 'REGLEMENT DE LA FACTURE CAMTEL', 32, NULL, NULL, 0, 3, '2022-05-16 13:53:30', '2022-05-16 13:53:30'),
	(48, 300, 'Sortie pour les charges', '2022-05-16', 'DEPLACEMENT POUR CAMTEL', 33, NULL, NULL, 0, 3, '2022-05-16 13:54:41', '2022-05-16 13:54:41'),
	(49, 20000, 'fourniture caisse', '2022-05-17', 'approvisionnement', NULL, 14, NULL, 1, 4, '2022-05-17 11:44:53', '2022-05-17 11:44:53'),
	(50, 75000, 'reglement facture  ascoma F2022109', '2022-05-19', NULL, NULL, 15, NULL, 1, 3, '2022-05-19 10:24:52', '2022-05-19 10:24:52'),
	(51, 75000, 'Sortie pour les charges', '2022-05-26', 'Achat local materiel pour livraison asoma', 34, NULL, NULL, 0, 4, '2022-05-26 12:11:29', '2022-05-26 12:11:29'),
	(52, 10000, 'Sortie pour les charges', '2022-06-06', 'ACHAT DU CHARGEUR', 35, NULL, NULL, 0, 3, '2022-06-06 10:22:43', '2022-06-06 10:22:43'),
	(53, 7500, 'APPROVISIONNEMENT DE LA CAISSE', '2022-06-06', 'pour les depenses en interne', NULL, 16, NULL, 1, 3, '2022-06-06 10:23:32', '2022-06-06 10:23:32'),
	(54, 500, 'Sortie pour les charges', '2022-06-06', 'sortie de Marcel Priso pour collecte d\'information', 36, NULL, NULL, 0, 3, '2022-06-06 13:22:33', '2022-06-06 13:22:33'),
	(55, 5500, 'Sortie pour les charges', '2022-06-06', 'Achat d\'eau buvable en bidons, papier poubelle', 37, NULL, NULL, 0, 3, '2022-06-06 13:24:28', '2022-06-06 13:24:28'),
	(56, 5000, 'Sortie pour les charges', '2022-06-06', 'Retrait pour paiement de la facture Liberhe', 38, NULL, NULL, 0, 3, '2022-06-06 14:26:21', '2022-06-06 14:26:21'),
	(57, 4000, 'Sortie pour les charges', '2022-06-07', 'Achat du regulateur', 39, NULL, NULL, 0, 3, '2022-06-07 09:31:16', '2022-06-07 09:31:16'),
	(58, 200, 'Sortie pour les charges', '2022-06-08', 'Dépot du cheque  CCA', 40, NULL, NULL, 0, 3, '2022-06-08 09:30:02', '2022-06-08 09:30:02'),
	(59, 1000, 'Sortie pour les charges', '2022-06-08', 'Deplacement pour retour du chantier de Francis TALLE', 41, NULL, NULL, 0, 3, '2022-06-08 16:03:41', '2022-06-08 16:03:41'),
	(60, 600, 'Sortie pour les charges', '2022-06-08', 'Dépot de la machine NODISCAM par Francis TALLE', 42, NULL, NULL, 0, 3, '2022-06-08 16:59:58', '2022-06-08 16:59:58'),
	(61, 300, 'Sortie pour les charges', '2022-06-09', 'versement a HDCOM', 43, NULL, NULL, 0, 3, '2022-06-09 16:01:35', '2022-06-09 16:01:35'),
	(62, 5000, 'Vente d\'un clavier', '2022-06-09', NULL, NULL, 17, NULL, 1, 3, '2022-06-09 17:13:28', '2022-06-09 17:13:28'),
	(63, 665000, 'APPROVISIONNEMENT DE LA CAISSE', '2022-06-10', 'VERSEMENT PAR CARLET', NULL, 18, NULL, 1, 3, '2022-06-10 13:36:14', '2022-06-10 12:52:09'),
	(64, 25000, 'Sortie pour les charges', '2022-06-10', 'Achat des consommables et materiels', 44, NULL, NULL, 0, 3, '2022-06-10 13:40:56', '2022-06-10 13:40:56'),
	(65, 20000, 'Sortie pour les charges', '2022-06-10', 'Achat d\'un onduleur par CY', 45, NULL, NULL, 0, 3, '2022-06-10 13:42:11', '2022-06-10 13:42:11'),
	(66, 200, 'Sortie pour les charges', '2022-06-10', 'Dépot machine chez Boniface par FT', 46, NULL, NULL, 0, 3, '2022-06-10 14:06:23', '2022-06-10 14:06:23'),
	(67, 300, 'Sortie pour les charges', '2022-06-10', 'versement a ALL IN ONE', 47, NULL, NULL, 0, 3, '2022-06-10 16:56:29', '2022-06-10 16:56:29'),
	(68, 8000, 'VENTE D\'UNE SOURIS POUR ORDINATEUR', '2022-06-10', 'VERSEMENT PAR AKILAS', NULL, 19, NULL, 1, 3, '2022-06-10 12:51:30', '2022-06-10 12:51:50'),
	(69, 620000, 'Sortie pour les charges', '2022-06-10', 'RETRAIT DE LA CAISSE PAR CARLET', 48, NULL, NULL, 0, 3, '2022-06-10 12:52:50', '2022-06-10 12:52:50'),
	(70, 7000, 'Sortie pour les charges', '2022-06-10', 'Retrait de la caisse par Carlet', 49, NULL, NULL, 0, 3, '2022-06-10 12:56:38', '2022-06-10 12:56:38'),
	(71, 1000, 'Sortie pour les charges', '2022-06-13', 'credit de communication de AK', 51, NULL, NULL, 0, 3, '2022-06-13 17:23:38', '2022-06-13 17:23:38'),
	(72, 25000, 'Vente du boittier du disque dur', '2022-06-13', 'Encaissement par SG', NULL, 20, NULL, 1, 3, '2022-06-13 17:25:06', '2022-06-13 17:25:39'),
	(73, 260000, 'Approvisionnement de la caisse', '2022-06-13', 'Encaissement par SG', NULL, 21, NULL, 1, 3, '2022-06-13 17:25:32', '2022-06-13 17:25:32'),
	(74, 15000, 'Vente des piles', '2022-06-13', 'Encaissement par SG', NULL, 22, NULL, 1, 3, '2022-06-13 17:26:15', '2022-06-13 17:26:15'),
	(75, 200, 'Sortie pour les charges', '2022-06-13', 'paiement de la facture d\'electricité', 53, NULL, NULL, 0, 3, '2022-06-13 17:28:29', '2022-06-13 17:28:29'),
	(76, 169850, 'Sortie pour les charges', '2022-06-13', 'Retrait de la caisse par AK', 54, NULL, NULL, 0, 3, '2022-06-13 17:32:44', '2022-06-13 17:32:44'),
	(77, 50000, 'Sortie pour les charges', '2022-06-13', 'Travaux de mise a jour des bureu', 55, NULL, NULL, 0, 3, '2022-06-13 18:02:59', '2022-06-13 18:02:59'),
	(78, 40000, 'Sortie pour les charges', '2022-06-13', 'Paiement des frais du domaine', 56, NULL, NULL, 0, 3, '2022-06-13 18:04:04', '2022-06-13 18:04:04'),
	(79, 5000, 'Sortie pour les charges', '2022-06-14', 'Achat du materiel par AK', 57, NULL, NULL, 0, 3, '2022-06-14 09:56:20', '2022-06-14 09:56:20'),
	(80, 200, 'Sortie pour les charges', '2022-06-14', 'Livraison a ACESS BANK', 58, NULL, NULL, 0, 3, '2022-06-14 11:20:58', '2022-06-14 11:20:58'),
	(81, 300, 'Sortie pour les charges', '2022-06-14', 'Depot de la machine a ASCOMA', 59, NULL, NULL, 0, 3, '2022-06-14 15:04:37', '2022-06-14 15:04:37'),
	(82, 17000, 'Approvisionnement de la caisse', '2022-06-14', 'versement par AK', NULL, 23, NULL, 1, 3, '2022-06-14 15:18:30', '2022-06-14 15:19:07'),
	(83, 255000, 'Vente d\'un video projecteur', '2022-06-14', 'Versement par AK', NULL, 24, NULL, 1, 3, '2022-06-14 16:21:46', '2022-06-14 16:21:46'),
	(84, 260000, 'Vente d\'un video projecteur', '2022-06-15', 'Versement par CY', NULL, 25, NULL, 1, 3, '2022-06-15 11:30:05', '2022-06-15 11:30:05'),
	(85, 300, 'Sortie pour les charges', '2022-06-15', 'Recouvrement a ASCOMA', 60, NULL, NULL, 0, 3, '2022-06-15 12:40:49', '2022-06-15 12:40:49'),
	(86, 25000, 'Main d\'oeuvre de réparation de la machine de ASCOMA', '2022-06-15', 'Versement par SG', NULL, 26, NULL, 1, 3, '2022-06-15 14:45:26', '2022-06-15 14:45:26'),
	(87, 300, 'Sortie pour les charges', '2022-06-15', 'Encaissement A ASCOMA et demande de l\'attestation de domiciliation a ACCESS BANK', 61, NULL, NULL, 0, 3, '2022-06-15 16:01:00', '2022-06-15 16:01:00'),
	(88, 4000, 'Sortie pour les charges', '2022-06-15', 'Achat d\'un paquet d\'agraphe et stronbon', 62, NULL, NULL, 0, 3, '2022-06-15 16:01:44', '2022-06-15 16:01:44'),
	(89, 500, 'Sortie pour les charges', '2022-06-15', 'Recuperation des câbles par Marcel PRISO', 63, NULL, NULL, 0, 3, '2022-06-15 16:02:42', '2022-06-15 16:02:42'),
	(90, 7100, 'Sortie pour les charges', '2022-06-15', 'D\'éclaration de la CNPS et frais de deplacement', 64, NULL, NULL, 0, 3, '2022-06-15 16:08:55', '2022-06-15 16:08:55'),
	(91, 116000, 'Sortie pour les charges', '2022-06-15', 'Retrait de la caisse par Akilas TCHOKOUASSI', 66, NULL, NULL, 0, 3, '2022-06-15 16:43:53', '2022-06-15 16:43:53'),
	(92, 50000, 'Sortie pour les charges', '2022-06-15', 'PRET A CARLET YOUGA', 67, NULL, NULL, 0, 3, '2022-06-15 17:03:55', '2022-06-15 17:03:55'),
	(93, 150000, 'Sortie pour les charges', '2022-06-15', 'Retrait de la caisse par AK', 68, NULL, NULL, 0, 3, '2022-06-15 17:34:40', '2022-06-15 17:34:40'),
	(94, 100000, 'Sortie pour les charges', '2022-06-15', 'Retrait de la caisse par Carlet', 69, NULL, NULL, 0, 3, '2022-06-15 17:35:48', '2022-06-15 17:35:48'),
	(95, 35000, 'Approvisionnement de la caisse', '2022-06-16', NULL, NULL, 27, NULL, 1, 3, '2022-06-16 07:58:16', '2022-06-16 07:58:16'),
	(96, 100000, 'Sortie pour les charges', '2022-06-17', 'Retrait de la caisse par AK', 70, NULL, NULL, 0, 3, '2022-06-17 08:15:26', '2022-06-17 08:15:26'),
	(97, 5000, 'Sortie pour les charges', '2022-06-17', 'Retrait de la caisse par AK pour le Ruban', 71, NULL, NULL, 0, 3, '2022-06-17 09:23:43', '2022-06-17 09:23:43'),
	(98, 70000, 'Sortie pour les charges', '2022-06-17', 'Retrait de la caisse par SM', 72, NULL, NULL, 0, 3, '2022-06-17 09:51:15', '2022-06-17 09:51:15'),
	(99, 10000, 'Sortie pour les charges', '2022-06-17', 'Paiement facture, transport de FT, encaissement a ASCOMA, deplacement pour ACCESS BANK', 73, NULL, NULL, 0, 3, '2022-06-17 10:00:29', '2022-06-17 10:00:29'),
	(100, 5000, 'Sortie pour les charges', '2022-06-17', 'Achat d\'eau, thé et sucre', 74, NULL, NULL, 0, 3, '2022-06-17 13:59:39', '2022-06-17 13:59:39'),
	(101, 1000, 'Sortie pour les charges', '2022-06-20', 'credit de communication SG', 75, NULL, NULL, 0, 3, '2022-06-20 07:46:07', '2022-06-20 07:46:07'),
	(102, 400, 'Sortie pour les charges', '2022-06-20', 'Retrait par CY', 76, NULL, NULL, 0, 3, '2022-06-20 07:46:40', '2022-06-20 07:46:40'),
	(103, 500, 'Sortie pour les charges', '2022-06-20', 'Deplacement pour CCA Bank par SG', 77, NULL, NULL, 0, 3, '2022-06-20 07:49:04', '2022-06-20 07:49:04'),
	(104, 500, 'Sortie pour les charges', '2022-06-20', 'Achat d\'un besoin pour bureau', 78, NULL, NULL, 0, 3, '2022-06-20 07:50:19', '2022-06-20 07:50:19');
/*!40000 ALTER TABLE `caisses` ENABLE KEYS */;

-- Listage de la structure de la table camlait-app. charges
CREATE TABLE IF NOT EXISTS `charges`
(
    `charge_id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `titre` varchar
(
    255
) NOT NULL,
    `description` varchar
(
    1000
) DEFAULT NULL,
    `type_charge` int
(
    11
) DEFAULT NULL,
    `alerte` int
(
    11
) DEFAULT NULL,
    `iduser` int
(
    11
) DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY
(
    `charge_id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Listage des données de la table camlait-app.charges : ~12 rows (environ)
/*!40000 ALTER TABLE `charges` DISABLE KEYS */;
REPLACE
INTO `charges` (`charge_id`, `titre`, `description`, `type_charge`, `alerte`, `iduser`, `created_at`, `updated_at`) VALUES
	(1, 'Fourniture de bureau', 'Consommables', 0, 0, 3, '2022-04-21 23:56:32', '2022-04-21 23:56:32'),
	(2, 'Facture électricité', 'pour toutes les factures enéo', 1, 15, 3, '2022-04-22 00:05:33', '2022-04-22 00:05:33'),
	(3, 'facture CAMTEL', NULL, 1, 22, 3, '2022-04-22 00:06:02', '2022-04-22 00:06:02'),
	(4, 'Transport du personnel pour intervention', 'Pour les transport en cas de deplacement pour livraison, intervention, achat et autres', 0, 0, 3, '2022-04-24 08:02:45', '2022-04-24 08:02:45'),
	(5, 'ACHAT DU MATERIEL POUR LIVRAISON', NULL, 0, 0, 3, '2022-05-06 05:46:59', '2022-05-06 05:46:59'),
	(6, 'Carburant pour moto d\'intervention', NULL, 0, 0, 3, '2022-05-06 07:28:10', '2022-05-06 07:28:10'),
	(7, 'Appel téléphonique', NULL, 0, 0, 3, '2022-05-06 07:30:17', '2022-05-06 07:30:17'),
	(8, 'DECLARATION D\'IS', NULL, 1, 10, 3, '2022-05-10 08:36:06', '2022-05-10 08:36:06'),
	(9, 'FRAIS D\'EXPEDITION', NULL, 0, 0, 3, '2022-05-10 15:34:34', '2022-05-10 15:34:34'),
	(10, 'DECLARATION DU PERSONNEL', NULL, 1, 10, 3, '2022-05-10 15:38:06', '2022-05-10 15:38:06'),
	(11, 'service rendu', NULL, 0, 0, 3, '2022-06-06 14:25:53', '2022-06-06 14:25:53'),
	(12, 'Paiement de la facture fournisseur', NULL, 0, 0, 3, '2022-06-17 09:50:20', '2022-06-17 09:50:20');
/*!40000 ALTER TABLE `charges` ENABLE KEYS */;

-- Listage de la structure de la table camlait-app. clients
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `raison_s_client` varchar(1000) DEFAULT NULL,
  `nom_client` varchar(255) DEFAULT NULL,
  `prenom_client` varchar(255) DEFAULT NULL,
  `email_client` varchar(255) DEFAULT NULL,
  `phone_1_client` varchar(20) NOT NULL,
  `phone_2_client` varchar(20) DEFAULT NULL,
  `idpays` int(11) DEFAULT NULL,
  `ville_client` varchar(255) DEFAULT NULL,
  `adresse_client` varchar(255) DEFAULT NULL,
  `logo_client` varchar(255) DEFAULT NULL,
  `date_ajout` date NOT NULL,
  `contribuable` varchar(100) DEFAULT NULL,
  `slogan` varchar(500) DEFAULT NULL,
  `siteweb` varchar(500) DEFAULT NULL,
  `rcm` varchar(500) DEFAULT NULL,
  `postale` varchar(50) DEFAULT NULL,
  `type_client` varchar(50) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `iddevise` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Listage des données de la table camlait-app.clients : ~36 rows (environ)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
REPLACE INTO `clients` (`client_id`, `raison_s_client`, `nom_client`, `prenom_client`, `email_client`, `phone_1_client`, `phone_2_client`, `idpays`, `ville_client`, `adresse_client`, `logo_client`, `date_ajout`, `contribuable`, `slogan`, `siteweb`, `rcm`, `postale`, `type_client`, `iduser`, `iddevise`, `created_at`, `updated_at`) VALUES
	(1, 'LES BATISSEURS REUNIS', '', '', NULL, '233 426 668', '233 429 276', 29, 'DOUALA', NULL, NULL, '2022-04-22', 'M030400016838H', NULL, NULL, 'RC/DLA/2004/B/032742', '5908 DOUALA', '1', 3, NULL, '2022-04-22 00:23:51', '2022-04-24 06:05:40'),
	(2, 'SCR MAYA & CIE', '', '', 'secretariatdg@scrmaya.com', '233 39 13 34', '233 39 00 76', NULL, 'DOUALA', 'BONABERI', NULL, '2022-04-24', 'M018800000655Y', NULL, NULL, 'RC/DLA/1988/B/06135', NULL, '1', 3, NULL, '2022-04-24 06:15:43', '2022-04-24 06:15:43'),
	(3, 'ASCOMA CAMEROUN SA', '', '', NULL, '233 50 04 00/01', NULL, NULL, 'DOUALA', '1916Bd DE LA LIBERTE', NULL, '2022-04-24', 'M025300001665 C', NULL, NULL, 'RC/DLA/1953/B/1844', '544 DOUALA', '1', 3, NULL, '2022-04-24 06:21:28', '2022-04-24 06:21:28'),
	(4, 'BVMAC S.A', '', '', NULL, '233 43 85 83', '233 43 85 34', NULL, 'DOUALA', '1450 Bd DE LA LIBERTE', NULL, '2022-04-24', NULL, NULL, NULL, 'RC', '442 DOUALA', '1', 3, NULL, '2022-04-24 06:24:23', '2022-05-16 13:39:40'),
	(5, 'ATLANTIQUE ASSURANCES CAMEROUN', '', '', NULL, '243 89 88 54', '651 80 49 28', NULL, 'DOUALA', 'BONANJO', NULL, '2022-04-24', NULL, NULL, NULL, 'RC/DLA/2016/B/660', '2933', '1', 3, NULL, '2022-04-24 06:38:43', '2022-04-24 07:03:51'),
	(6, 'PLASTICAM', '', '', NULL, '691 66 93 41', NULL, 29, 'DOUALA', NULL, NULL, '2022-04-24', NULL, NULL, NULL, '00000000', '4071 DOUALA-CAMEROUN', '1', 3, NULL, '2022-04-24 06:41:05', '2022-04-24 07:02:44'),
	(7, 'AIR LIQUIDE', '', '', NULL, '233 37 24 34', '233 37 42 31', 29, 'DOUALA', 'ZONE INDUSTRIEL DLA BASSA', NULL, '2022-04-24', NULL, NULL, NULL, 'RC/DLA/B/3086', '4031 DOUALA', '1', 3, NULL, '2022-04-24 06:46:38', '2022-04-24 07:02:30'),
	(8, 'ARICAFOOD DISTRIBUTION S.A', '', '', NULL, '233 44 37 92', '699 99 33 60', 238, 'DOUALA', NULL, NULL, '2022-04-24', 'NIU: M090400017498Y', NULL, NULL, 'RC/DLA/2004/B/033621', '15567 DOUALA', '1', 3, NULL, '2022-04-24 06:49:20', '2022-05-09 14:56:29'),
	(9, 'AJE BULDING', '', '', NULL, 'TEL', NULL, 29, 'DOUALA', NULL, NULL, '2022-04-24', NULL, NULL, NULL, 'RC/DLA/2014/B/1326', '12222 DOUALA CAMEROUN', '1', 3, NULL, '2022-04-24 06:55:27', '2022-04-24 07:02:05'),
	(10, 'AFRICA FOOD MANIFACTURE S.A', '', '', NULL, '237 690 706 241', NULL, 238, 'DOUALA', NULL, NULL, '2022-04-24', 'N.I.U : M121300048114H', NULL, NULL, 'RC/DLA/2013/B/4415', '237 DOUALA', '1', 3, NULL, '2022-04-24 07:01:45', '2022-06-10 11:50:06'),
	(11, 'AGROCAM', '', '', NULL, '233 390 438', '233 391 567', NULL, 'DOUALA', NULL, NULL, '2022-05-09', NULL, NULL, NULL, NULL, '9019 DOUALA', '1', 3, NULL, '2022-05-09 13:01:33', '2022-05-09 13:01:33'),
	(12, 'CICA-RE BUREU REGIONAL AFRIQUE CENTRALE', '', '', NULL, '233 42 34 37', '233 42 34 23', 29, 'DOUALA', 'IMMEUBLE CICA-RE , 1791 AVENUE PAUL SOPPO PRISO', NULL, '2022-05-09', NULL, NULL, NULL, NULL, '1176 DOUALA', '1', 3, NULL, '2022-05-09 13:08:01', '2022-05-09 13:08:01'),
	(13, 'TECHNO CAMEROUN', '', '', NULL, '694 43027052', NULL, NULL, 'DOUALA', 'FACE IME BONADIBON', NULL, '2022-05-09', NULL, NULL, NULL, NULL, NULL, '1', 3, NULL, '2022-05-09 13:12:05', '2022-05-09 13:12:05'),
	(14, 'NODISCAM S.A', '', '', NULL, '656 039 279', NULL, NULL, 'DOUALA', 'BONAPRISO DJODJO', NULL, '2022-05-09', NULL, NULL, NULL, NULL, '7754 DOUALA', '1', 3, NULL, '2022-05-09 13:14:16', '2022-05-09 13:14:16'),
	(15, 'ACCESS BANK CAMEROUN', '', '', NULL, '690 48 04 38', NULL, NULL, 'DOUALA', 'Bd DE LA LIBERTE', NULL, '2022-05-09', NULL, NULL, NULL, NULL, NULL, '1', 3, NULL, '2022-05-09 13:26:53', '2022-05-09 13:26:53'),
	(16, '', 'SOUNDJA', 'FRANK', NULL, '699 45 08 89', NULL, 29, 'DOUALA', NULL, NULL, '2022-05-11', '', NULL, NULL, '', NULL, '0', 3, NULL, '2022-05-11 15:13:54', '2022-05-11 15:13:54'),
	(17, 'FERRERO CAMEROUN', '', '', NULL, '698619263', NULL, 238, 'Douala', NULL, NULL, '2022-05-12', NULL, NULL, NULL, 'RC', NULL, '1', 4, NULL, '2022-05-12 09:33:26', '2022-05-12 09:37:30'),
	(18, 'CAMI', '', '', NULL, '233 50 64 00', '233 42 64 10', 29, 'DOUALA', 'ZONE INDUSTRIELLE BONABERI', NULL, '2022-05-12', 'M097100000634G', NULL, NULL, 'RC/DLA/1987/B/4060', '1217 DOUALA', '1', 3, NULL, '2022-05-12 12:20:10', '2022-06-16 12:27:26'),
	(19, '', 'MBIA GUINI', 'THEOPHILE', 'theophile.mbia@ascoma.com', '698 29 76 61', '651 93 16 05', 29, 'DOUALA', NULL, NULL, '2022-05-16', '', NULL, NULL, '', NULL, '0', 3, NULL, '2022-05-16 15:01:53', '2022-05-16 15:01:53'),
	(20, 'AGC Cameroun', '', '', NULL, '233438938', NULL, NULL, 'DOUALA', 'Immeuble le Cauris, Rue Alfred Saker, près du centenaire Akwa Douala Cameroun', NULL, '2022-05-17', NULL, NULL, NULL, NULL, NULL, '1', 4, NULL, '2022-05-17 14:13:19', '2022-05-17 14:13:19'),
	(21, 'SASEL', '', '', NULL, '696838881', NULL, 29, 'Douala', NULL, NULL, '2022-05-18', NULL, NULL, NULL, NULL, NULL, '1', 4, NULL, '2022-05-18 09:48:06', '2022-05-18 09:48:06'),
	(22, 'CEMAVET', '', '', NULL, '697578476', NULL, NULL, 'Douala', NULL, NULL, '2022-05-18', NULL, NULL, NULL, NULL, NULL, '1', 4, NULL, '2022-05-18 11:51:36', '2022-05-18 11:51:36'),
	(23, 'NPM AUTOMATION-SYSTEM', '', '', NULL, '691277931', NULL, NULL, 'Douala', NULL, NULL, '2022-05-31', NULL, NULL, NULL, NULL, NULL, '1', 4, NULL, '2022-05-31 04:47:21', '2022-05-31 04:47:21'),
	(24, 'LJD MANPOWER SERVICES', '', '', 'contact@ljdgroup.com', '699639863', NULL, NULL, 'Douala', NULL, NULL, '2022-06-01', NULL, NULL, NULL, '.', NULL, '1', 4, NULL, '2022-06-01 14:47:53', '2022-06-01 14:49:51'),
	(25, 'CDS', '', '', 'contact@cameroondockworkers.cm', '+237 333420599', NULL, 29, 'Douala', NULL, NULL, '2022-06-03', 'MO61913912294E', NULL, NULL, 'RC/DLA/2009/A/801', '73 DOUALA', '1', 4, NULL, '2022-06-03 14:28:01', '2022-06-03 14:28:01'),
	(26, 'PHP', '', '', 'A.ADAMOU@phpcam.net', '691663024', NULL, 29, 'Douala', NULL, NULL, '2022-06-06', NULL, NULL, NULL, NULL, NULL, '1', 4, NULL, '2022-06-06 13:05:49', '2022-06-06 13:05:49'),
	(27, 'AMH CONSULTING GROUP SARL', '', '', 'contact@amhconsulting-group.com', '694161777', NULL, 29, 'Douala', NULL, NULL, '2022-06-08', NULL, NULL, NULL, NULL, '3615 DOUALA', '1', 5, NULL, '2022-06-08 10:23:01', '2022-06-08 10:23:01'),
	(28, 'MICHELE\'S CORPORATION SARL', '', '', 'fouedjoumomo@gmail.com', '690 15 61 76', NULL, 29, 'DOUALA', 'DOUALA CAMEROUN (ZONE PORTUAIRE)', NULL, '2022-06-10', 'NIU: M060700023356U', NULL, NULL, 'RC: RC/DLA/2007/B/960', NULL, '1', 3, NULL, '2022-06-10 13:18:30', '2022-06-10 13:18:30'),
	(29, '', 'NGUINI MBIA', 'THEOPHILE', 'theophil.mbia@ascoma.com', '651 93 16 05', NULL, NULL, 'DOUALA', NULL, NULL, '2022-06-13', '', NULL, NULL, '', NULL, '0', 3, NULL, '2022-06-13 13:56:19', '2022-06-13 14:16:49'),
	(30, '', 'Jean', 'Pascal', NULL, '691169823', NULL, NULL, 'DOUALA', 'AKWA DOUALA FACE RESTAURANT LA PETITE VILLAGEOISE', NULL, '2022-06-13', '', NULL, NULL, '', NULL, '0', 4, NULL, '2022-06-13 18:05:59', '2022-06-13 18:05:59'),
	(31, 'SITRACO', '', '', NULL, '6 91104225', NULL, 29, 'Douala', 'bassa à LOGBABA Zone industrielle magzi, Douala', NULL, '2022-06-14', NULL, NULL, NULL, NULL, NULL, '1', 1, NULL, '2022-06-14 10:31:30', '2022-06-14 10:31:30'),
	(32, 'ESSO SARL', '', '', NULL, 'TEL', NULL, 29, 'DOUALA', NULL, NULL, '2022-06-15', NULL, NULL, NULL, NULL, NULL, '1', 3, NULL, '2022-06-15 10:14:28', '2022-06-15 10:14:28'),
	(33, 'CASE CONSULTING', '', '', NULL, '6', NULL, 29, 'DOUALA', NULL, NULL, '2022-06-16', NULL, NULL, NULL, NULL, NULL, '1', 3, NULL, '2022-06-16 16:37:37', '2022-06-16 16:37:37'),
	(34, 'ARENA TECHNOLOGY SARL', '', '', NULL, '658 58 35 91', NULL, 29, 'DOUALA', NULL, NULL, '2022-06-17', NULL, NULL, NULL, '0', NULL, '1', 3, NULL, '2022-06-17 12:30:17', '2022-06-17 15:16:07'),
	(35, 'FOTSO', '', '', NULL, '6', NULL, 29, 'DOUALA', NULL, NULL, '2022-06-18', NULL, NULL, NULL, NULL, NULL, '1', 3, NULL, '2022-06-18 12:25:25', '2022-06-18 12:25:25'),
	(36, '', 'MArc', 'EKUENE', NULL, '699348371', NULL, NULL, 'DOUALA', 'AKWA DOUALA FACE RESTAURANT LA PETITE VILLAGEOISE', NULL, '2022-06-18', '', NULL, NULL, '', NULL, '0', 4, NULL, '2022-06-18 15:54:46', '2022-06-18 15:54:46');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Listage de la structure de la table camlait-app. equipements
CREATE TABLE IF NOT EXISTS `equipements`
(
    `equipement_id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `code` varchar
(
    20
) DEFAULT NULL,
    `libelle` varchar
(
    1000
) DEFAULT NULL,
    `description` varchar
(
    1000
) DEFAULT NULL,
    `date_ajout` date NOT NULL,
    `iduser` int
(
    11
) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY
(
    `equipement_id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table camlait-app.equipements : ~2 rows (environ)
/*!40000 ALTER TABLE `equipements` DISABLE KEYS */;
REPLACE
INTO `equipements` (`equipement_id`, `code`, `libelle`, `description`, `date_ajout`, `iduser`, `created_at`, `updated_at`) VALUES
	(1, 'COO000', 'infos terminal', 'ghjghj tghggfg', '2022-07-05', 1, '2022-07-05 15:39:39', '2022-07-05 15:39:39'),
	(2, 'CCCCE', 'infos terminal', 'vbcvbv vbvbvb', '2022-07-05', 1, '2022-07-05 15:41:14', '2022-07-05 15:41:14');
/*!40000 ALTER TABLE `equipements` ENABLE KEYS */;

-- Listage de la structure de la table camlait-app. pays
CREATE TABLE IF NOT EXISTS `pays`
(
    `pays_id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `nom_pays` varchar
(
    255
) NOT NULL,
    `code_pays` varchar
(
    255
) NOT NULL,
    `drapeau` varchar
(
    255
) DEFAULT NULL,
    `visible` int
(
    11
) DEFAULT '0',
    `iddevise` int
(
    11
) DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY
(
    `pays_id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8;

-- Listage des données de la table camlait-app.pays : ~238 rows (environ)
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
REPLACE
INTO `pays` (`pays_id`, `nom_pays`, `code_pays`, `drapeau`, `visible`, `iddevise`, `created_at`, `updated_at`) VALUES
	(1, 'Bénin', '+229', '', 0, 4, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(2, 'Burkina-Faso', '+226', '', 0, 4, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(3, 'Burundi', '+257', '', 0, 17, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(4, 'Cap-Vert', '+238', '', 0, 7, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(5, 'République Centrafricaine', '+236', '', 0, 1, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(6, 'Archipel des Comores', '+269', '', 0, 32, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(7, 'Congo', '+242', '', 0, 43, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(8, 'République Démocratique du Congo', '+243', '', 0, 1, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(9, 'Côte d’Ivoire', '+225', '', 0, 4, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(10, 'Djibouti', '+253', '', 0, 18, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(11, 'Egypte', '+20', '', 0, 11, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(12, 'Gabon', '+241', '', 0, 1, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(13, 'Guinée', '+224', '', 0, 6, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(14, 'Guinée Bissau', '+245', '', 0, 4, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(15, 'Guinée-Equatoriale', '+240', '', 0, 1, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(16, 'Mali', '+223', '', 0, 4, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(17, 'Madagascar', '+261', '', 0, 35, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(18, 'Maroc', '+212', '', 0, 13, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(19, 'Mauritanie', '+222', '', 0, 14, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(20, 'Niger', '+227', '', 0, 4, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(21, 'Qatar', '000', '', 0, 1, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(22, 'Rwanda', '+250', '', 0, 23, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(23, 'Sao Tomé et Principé', '+239', '', 0, 1, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(24, 'Sénégal', '+221', '', 0, 4, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(25, 'Seychelles', '', '', 0, 24, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(26, 'Tchad', '+235', '', 0, 1, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(27, 'Togo', '+228', '', 0, 4, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(28, 'Tunisie', '', '', 0, 15, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(29, 'Cameroun', '+237', '', 0, 15, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(30, 'Italie', '+33', '', 0, 15, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(31, 'États-Unis', '+1', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(32, 'Canada', '+1', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(33, 'Îles Mariannes du Nord', '+1-670', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(34, 'Guam', '+1-671', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(35, 'Bahamas', '+1-242', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(36, 'Barbade', '+1-246', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(37, 'Anguilla', '+1-264', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(38, 'Antigua-et-Barbuda', '+1-268', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(39, 'Îles Vierges britanniques', '+1-284', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(40, 'Îles Vierges des États-Unis', '+1-340', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(41, 'Îles Caïmans', '+1-345', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(42, 'Bermudes', '+1-441', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(43, 'Grenade', '+1-473', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(44, 'Îles Turques-et-Caïques', '+1-649', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(45, 'Jamaïque', '+1-876', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(46, 'Montserrat', '+1-664', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(47, 'Guam', '1 671', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(48, 'Samoa américaines', '+1-684', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(49, 'Saint-Martin', '+1-721', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(50, 'Sainte-Lucie', '+1-758', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(51, 'Dominique', '+1-767', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(52, 'Saint-Vincent-et-les-Grenadines', '+1-784', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(53, 'Porto Rico', '939', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(54, 'Trinité-et-Tobago', '+1-868', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(55, 'Saint-Christophe-et-Niévès', '+1-869', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(56, 'Égypte', '+20', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(57, 'Soudan du Sud', '+211', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(58, 'Maroc', '+212', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(59, 'Algérie', '+213', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(60, 'Tunisie', '+216', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(61, 'Libye', '+218', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(62, 'Gambie', '+220', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(63, 'Sénégal', '+221', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(64, 'Mauritanie', '+222', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(65, 'Ascension', '+247', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(66, 'Seychelles', '+248', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(67, 'Soudan', '+249', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(68, 'Rwanda', '+250', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(69, 'Éthiopie', '+251', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(70, 'Somalie', '+252', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(71, 'Djibouti', '+253', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(72, 'Kenya', '+254', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(73, 'Tanzanie', '+255', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(74, 'Ouganda', '+256', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(75, 'Burundi', '+257', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(76, 'Mozambique', '+258', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(77, 'Zambie', '+260', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(78, 'Madagascar', '+261', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(79, 'La Réunion, Mayotte et', '+262', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(80, 'Angola', '+244', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(81, 'Zimbabwe', '+263', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(82, 'Namibie', '+264', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(83, 'Malawi', '+265', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(84, 'Lesotho', '+266', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(85, 'Botswana', '+267', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(86, 'Eswatini', '+268', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(87, 'Comores', '+269', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(88, 'Afrique du Sud', '+27', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(89, 'Sainte-Hélène', '+290', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(90, 'Tristan da Cunha', '+290', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(91, 'Érythrée', '+291', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(92, 'Aruba', '+297', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(93, 'Îles Féroé', '+298', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(94, 'Groenlan', '+299', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(95, 'Grèce', '+30', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(96, 'Pays-Bas', '+31', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(97, 'Belgique', '+32', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(98, 'France', '+33', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(99, 'Espagne', '+34', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(100, 'Gibraltar', '+350', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(101, 'Portugal', '+351', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(102, 'Luxembourg', '+352', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(103, 'Irlande', '+353', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(104, 'Islande', '+354', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(105, 'Albanie', '+355', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(106, 'Malte', '+356', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(107, 'Chypre', '+357', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(108, 'Finlande', '+358', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(109, 'Bulgarie', '+359', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(110, 'Moldavie', '+373', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(111, 'Arménie', '+374', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(112, 'Biélorussie', '+375', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(113, 'Andorre', '+376', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(114, 'Monaco', '+377', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(115, 'Saint-Marin', '+378', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(116, 'Vatican', '+379', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(117, 'Ukraine', '+380', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(118, 'Serbie', '+381', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(119, 'Monténégro', '+382', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(120, 'Kosovo', '+383', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(121, 'Hongrie', '+36', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(122, 'Lituanie', '+370', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(123, 'Lettonie', '+371', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(124, 'Estonie', '+372', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(125, 'Croatie', '+385', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(126, 'Slovénie', '+386', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(127, 'Bosnie-Herzégovine', '+387', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(128, 'Macédoine du Nord', '+389', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(129, 'Italie', '+39', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(130, 'Roumanie', '+40', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(131, 'Suisse', '+41', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(132, 'République tchèque', '+420', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(133, 'Slovaquie', '+421', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(134, 'Liechtenstein', '+423', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(135, 'Autriche', '+43', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(136, 'Royaume-Uni', '+44', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(137, 'Danemark', '+45', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(138, 'Suède', '+46', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(139, 'Norvège', '+47', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(140, 'Pologne', '+48', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(141, 'Allemagne', '+49', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(142, 'Malouines', '+500', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(143, 'Belize', '+501', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(144, 'Guatemala', '+502', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(145, 'Salvador', '+503', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(146, 'Honduras', '+504', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(147, 'Nicaragua', '+505', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(148, 'Costa Rica', '+506', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(149, 'Panama', '+507', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(150, 'Saint-Pierre-et-Miquelon', '+508', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(151, 'Brésil', '+55', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(152, 'Chili', '+56', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(153, 'Colombie', '+57', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(154, 'Venezuela', '+58', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(155, 'Guadeloupe', '+590', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(156, 'Bolivie', '+591', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(157, 'Guyana', '+592', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(158, 'Équateur', '+593', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(159, 'Haïti', '+509', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(160, 'Pérou', '+51', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(161, 'Mexique', '+52', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(162, 'Cuba', '+53', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(163, 'Argentine', '+54', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(164, 'Guyane', '+594', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(165, 'Paraguay', '+595', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(166, 'Martinique', '+596', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(167, 'Suriname', '+597', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(168, 'Uruguay', '+598', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(169, 'Curaçao et Pays-Bas caribéens', '+599', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(170, 'Malaisie', '+60', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(171, 'Australie', '+61', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(172, 'Indonésie', '+62', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(173, 'Philippines', '+63', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(174, 'Singapour', '+65', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(175, 'Thaïlande', '+66', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(176, 'Timor oriental', '+670', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(177, 'Brunei', '+673', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(178, 'Nauru', '+674', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(179, 'Papouasie-Nouvelle-Guinée', '+675', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(180, 'Tonga', '+676', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(181, 'Îles Salomon', '+677', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(182, 'Vanuatu', '+678', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(183, 'Fidji', '+679', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(184, 'Palaos', '+680', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(185, 'Wallis-et-Futuna', '+681', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(186, 'Îles Cook', '+682', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(187, 'Niue', '+683', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(188, 'Samoa', '+685', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(189, 'Kiribati', '+686', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(190, 'Nouvelle-Calédonie', '+687', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(191, 'Tuvalu', '+688', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(192, 'Polynésie française', '+689', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(193, 'Tokelau', '+690', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(194, 'États fédérés de Micronésie', '+691', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(195, 'Îles Marshall', '+692', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(196, 'Kazakhstan', '+7', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(197, 'Russie', '+7', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(198, 'Japon', '+81', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(199, 'Corée du Sud', '+82', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(200, 'Viêt Nam', '+84', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(201, 'Corée du Nord', '+850', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(202, 'Hong Kong', '+852', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(203, 'Macao', '+853', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(204, 'Cambodge', '+855', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(205, 'Laos', '+856', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(206, 'Chine', '+86', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(207, 'Bangladesh', '+880', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(208, 'Taïwan', '+886', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(209, 'Turquie', '+90', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(210, 'Inde', '+91', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(211, 'Pakistan', '+92', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(212, 'Afghanistan', '+93', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(213, 'Sri Lanka', '+94', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(214, 'Birmanie', '+95', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(215, 'Bahreïn', '+973', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(216, 'Qatar', '+974', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(217, 'Bhoutan', '+975', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(218, 'Mongolie', '+976', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(219, 'Népal', '+977', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(220, 'Maldives', '+960', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(221, 'Liban', '+961', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(222, 'Jordanie', '+962', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(223, 'Syrie', '+963', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(224, 'Irak', '+964', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(225, 'Koweït', '+965', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(226, 'Arabie saoudite', '+966', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(227, 'Yémen', '+967', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(228, 'Oman', '+968', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(229, 'Palestine', '+970', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(230, 'Émirats arabes unis', '+971', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(231, 'Israël', '+972', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(232, 'Iran', '+98', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(233, 'Tadjikistan', '+992', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(234, 'Turkménistan', '+993', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(235, 'Azerbaïdjan', '+994', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(236, 'Géorgie', '+995', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(237, 'Kirghizistan', '+996', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51'),
	(238, 'Ouzbékistan', '+998', '', 1, 0, '2022-04-12 16:10:51', '2022-04-12 16:10:51');
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;

-- Listage de la structure de la table camlait-app. personnels
CREATE TABLE IF NOT EXISTS `personnels`
(
    `personnel_id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `code` varchar
(
    20
) DEFAULT NULL,
    `nom` varchar
(
    1000
) DEFAULT NULL,
    `prenom` varchar
(
    255
) DEFAULT NULL,
    `poste` varchar
(
    255
) DEFAULT NULL,
    `email_p` varchar
(
    255
) DEFAULT NULL,
    `tel` varchar
(
    20
) NOT NULL,
    `adresse_p` varchar
(
    255
) DEFAULT NULL,
    `date_ajout` date NOT NULL,
    `iduser` int
(
    11
) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY
(
    `personnel_id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table camlait-app.personnels : ~2 rows (environ)
/*!40000 ALTER TABLE `personnels` DISABLE KEYS */;
REPLACE
INTO `personnels` (`personnel_id`, `code`, `nom`, `prenom`, `poste`, `email_p`, `tel`, `adresse_p`, `date_ajout`, `iduser`, `created_at`, `updated_at`) VALUES
	(1, 'COOfvcv', 'DESTO', 'Tambu', '54lnnkjljklbjkljljklkl', 'teneyemdesto@gmail.com', '144554545', 'Makepe palace', '2022-07-05', 1, '2022-07-05 15:26:00', '2022-07-05 15:26:00'),
	(2, 'COOcv gggfggfg', 'CVXCVVC', 'cvxcvcv', 'nbnbnbvn', 'desto@gmail.com', 'cvcvvc  1', 'Makepe palace', '2022-07-05', 1, '2022-07-05 15:28:38', '2022-07-05 15:33:43');
/*!40000 ALTER TABLE `personnels` ENABLE KEYS */;

-- Listage de la structure de la table camlait-app. taches
CREATE TABLE IF NOT EXISTS `taches`
(
    `tache_id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `date_debut` date NOT NULL,
    `date_fin` date NOT NULL,
    `date_ajout` date NOT NULL,
    `raison` varchar
(
    1000
) DEFAULT NULL,
    `nombre` int
(
    11
) NOT NULL,
    `prix` float NOT NULL,
    `iduser` int
(
    11
) NOT NULL,
    `statut` int
(
    11
) DEFAULT '1',
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY
(
    `tache_id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- Listage des données de la table camlait-app.taches : ~78 rows (environ)
/*!40000 ALTER TABLE `taches` DISABLE KEYS */;
REPLACE
INTO `taches` (`tache_id`, `date_debut`, `date_fin`, `date_ajout`, `raison`, `nombre`, `prix`, `iduser`, `statut`, `created_at`, `updated_at`) VALUES
	(1, '2022-04-22', '2022-04-22', '2022-04-22', 'achat d\'eau buvable en bidons', 2, 1000, 3, 1, '2022-04-22 00:08:37', '2022-04-22 00:11:05'),
	(2, '2022-04-27', '2022-04-27', '2022-04-23', 'achat du materiels', 10, 16400, 3, 1, '2022-04-23 04:31:57', '2022-04-23 04:31:57'),
	(3, '2022-05-04', '2022-05-04', '2022-05-04', 'deplacement pour depot facture FUTURIS HOTEL', 1, 1000, 3, 1, '2022-05-04 10:27:56', '2022-05-04 10:29:01'),
	(4, '2022-05-05', '2022-05-05', '2022-05-05', 'reglement facture ALL IN ONE', 1, 10000, 3, 1, '2022-05-05 03:21:54', '2022-05-05 03:21:54'),
	(5, '2022-05-06', '2022-05-06', '2022-05-06', 'depence de test', 1, 6000, 3, 1, '2022-05-06 05:43:25', '2022-05-06 05:43:25'),
	(6, '2022-05-05', '2022-05-05', '2022-05-06', 'décaissement pour achat du materiel', 1, 10000, 3, 1, '2022-05-06 05:45:04', '2022-05-06 05:45:04'),
	(7, '2022-05-05', '2022-05-05', '2022-05-06', 'versement a ALL IN ONE', 1, 300, 3, 1, '2022-05-06 05:46:13', '2022-05-06 05:46:13'),
	(8, '2022-05-06', '2022-05-06', '2022-05-06', 'test', 1, 6000, 3, 1, '2022-05-06 06:21:42', '2022-05-06 06:21:42'),
	(9, '2022-05-06', '2022-05-06', '2022-05-06', 'consommation de la moto', 1, 5000, 3, 1, '2022-05-06 07:28:48', '2022-05-06 07:28:48'),
	(10, '2022-05-06', '2022-05-06', '2022-05-06', 'Crédit de communication du commercial', 1, 1000, 3, 1, '2022-05-06 07:32:29', '2022-05-06 07:32:29'),
	(11, '2022-05-04', '2022-05-04', '2022-05-06', 'Deplacement pour inetervention', 1, 1000, 3, 1, '2022-05-06 16:04:56', '2022-05-06 16:04:56'),
	(12, '2022-05-09', '2022-05-09', '2022-05-09', 'ACHAT DU TONER POUR LIVRAISON', 1, 25000, 3, 1, '2022-05-09 10:11:03', '2022-05-09 10:11:03'),
	(13, '2022-05-09', '2022-05-09', '2022-05-09', 'deplacement pour la collecte des prix', 1, 500, 3, 1, '2022-05-09 13:53:28', '2022-05-09 13:53:28'),
	(14, '2022-05-09', '2022-05-09', '2022-05-09', 'deplacement pour depot machine chez BONIFACE', 1, 200, 3, 1, '2022-05-09 15:53:41', '2022-05-09 15:53:41'),
	(15, '2022-05-10', '2022-05-10', '2022-05-10', 'achat d\'eux buvable, papier et thé', 1, 5000, 3, 1, '2022-05-10 13:29:01', '2022-05-10 13:29:01'),
	(16, '2022-05-10', '2022-05-10', '2022-05-10', 'Expedition colis', 1, 5500, 3, 1, '2022-05-10 15:35:17', '2022-05-10 15:35:17'),
	(17, '2022-05-10', '2022-05-10', '2022-05-10', 'Deplacement pour recuperation machine INTECK', 1, 250, 3, 1, '2022-05-10 16:31:38', '2022-05-10 16:31:38'),
	(18, '2022-05-11', '2022-05-11', '2022-05-11', 'ACHAT DE LA COL', 1, 7500, 3, 1, '2022-05-11 15:32:30', '2022-05-11 15:32:30'),
	(19, '2022-05-11', '2022-05-11', '2022-05-11', 'RECUPERATION DE LA MACHINE A INTEK', 1, 200, 3, 1, '2022-05-11 15:37:52', '2022-05-11 15:37:52'),
	(20, '2022-05-11', '2022-05-11', '2022-05-11', 'DEPOT DE LA MACHINE A INTEK', 1, 200, 3, 1, '2022-05-11 15:38:23', '2022-05-11 15:38:23'),
	(21, '2022-05-11', '2022-05-11', '2022-05-11', 'RECUPERATION DE LA MACHINE A INTEK', 1, 200, 3, 1, '2022-05-11 15:40:19', '2022-05-11 15:40:19'),
	(22, '2022-05-12', '2022-05-12', '2022-05-12', 'ACHAT DU MATERIEL', 1, 10000, 3, 1, '2022-05-12 07:51:17', '2022-05-12 07:51:18'),
	(23, '2022-05-12', '2022-05-12', '2022-05-12', 'DEPLACEMENT POUR DIAGNOSTIQUE  ONDULEUR CABINET MAITRE', 1, 700, 3, 1, '2022-05-12 11:19:22', '2022-05-12 11:19:23'),
	(24, '2022-05-12', '2022-05-12', '2022-05-12', 'ACHAT DE 03 CABLES HDMI', 1, 30000, 3, 1, '2022-05-12 15:04:51', '2022-05-12 15:04:52'),
	(25, '2022-05-12', '2022-05-12', '2022-05-12', 'DEPOT DE LA MACHINE A ALL IN ONE', 1, 200, 3, 1, '2022-05-12 15:05:50', '2022-05-12 15:05:50'),
	(26, '2022-05-13', '2022-05-13', '2022-05-13', 'AUTRES ACHAT', 1, 12000, 3, 1, '2022-05-13 11:16:06', '2022-05-13 11:16:06'),
	(27, '2022-05-13', '2022-05-13', '2022-05-13', 'DEPOT DE LA FACTURE A CAMI TOYOTA', 1, 1000, 3, 1, '2022-05-13 11:54:57', '2022-05-13 11:54:57'),
	(28, '2022-05-13', '2022-05-13', '2022-05-13', 'CONSOMMATION DE LA MOTO', 1, 5000, 3, 1, '2022-05-13 11:55:29', '2022-05-13 11:55:29'),
	(29, '2022-05-13', '2022-05-13', '2022-05-13', 'paiement de la facture d\'electricité', 1, 112000, 3, 1, '2022-05-13 15:29:45', '2022-05-13 15:29:45'),
	(30, '2022-05-13', '2022-05-13', '2022-05-13', 'Cotisation CNPS', 1, 6900, 3, 1, '2022-05-13 15:31:16', '2022-05-13 15:31:16'),
	(31, '2022-05-13', '2022-05-13', '2022-05-13', 'DEPLACEMENT POUR RECUPERATION DU DISQUE DUR A ISAM', 1, 1000, 3, 1, '2022-05-13 15:51:27', '2022-05-13 15:51:27'),
	(32, '2022-05-16', '2022-05-16', '2022-05-16', 'REGLEMENT DE LA FACTURE CAMTEL', 1, 25000, 3, 2, '2022-05-16 13:51:40', '2022-05-16 13:55:36'),
	(33, '2022-05-16', '2022-05-16', '2022-05-16', 'DEPLACEMENT POUR CAMTEL', 1, 300, 3, 1, '2022-05-16 13:54:41', '2022-05-16 13:54:41'),
	(34, '2022-05-11', '2022-05-11', '2022-05-26', 'Achat local materiel pour livraison asoma', 1, 75000, 4, 1, '2022-05-26 12:11:29', '2022-05-26 12:11:29'),
	(35, '2022-06-06', '2022-06-06', '2022-06-06', 'ACHAT DU CHARGEUR', 1, 10000, 3, 1, '2022-06-06 10:22:43', '2022-06-06 10:22:43'),
	(36, '2022-06-06', '2022-06-06', '2022-06-06', 'sortie de Marcel Priso pour collecte d\'information', 1, 500, 3, 1, '2022-06-06 13:22:33', '2022-06-06 13:22:33'),
	(37, '2022-06-06', '2022-06-06', '2022-06-06', 'Achat d\'eau buvable en bidons, papier poubelle', 1, 5500, 3, 1, '2022-06-06 13:24:28', '2022-06-06 13:24:28'),
	(38, '2022-06-06', '2022-06-06', '2022-06-06', 'Retrait pour paiement de la facture Liberhe', 1, 5000, 3, 1, '2022-06-06 14:26:21', '2022-06-06 14:26:21'),
	(39, '2022-06-07', '2022-06-07', '2022-06-07', 'Achat de l\'onduleur', 1, 4000, 3, 2, '2022-06-07 09:31:16', '2022-06-07 09:32:56'),
	(40, '2022-06-08', '2022-06-08', '2022-06-08', 'Dépot du cheque  CCA', 1, 200, 3, 1, '2022-06-08 09:30:01', '2022-06-08 09:30:02'),
	(41, '2022-06-08', '2022-06-08', '2022-06-08', 'Deplacement pour retour du chantier de Francis TALLE', 1, 1000, 3, 1, '2022-06-08 16:03:41', '2022-06-08 16:03:41'),
	(42, '2022-06-08', '2022-06-08', '2022-06-08', 'Dépot de la machine NODISCAM par Francis TALLE', 1, 600, 3, 1, '2022-06-08 16:59:58', '2022-06-08 16:59:58'),
	(43, '2022-06-09', '2022-06-09', '2022-06-09', 'versement a HDCOM', 1, 300, 3, 1, '2022-06-09 16:01:35', '2022-06-09 16:01:35'),
	(44, '2022-06-10', '2022-06-10', '2022-06-10', 'Achat des consommables et materiels par AK', 1, 25000, 3, 2, '2022-06-10 13:40:56', '2022-06-10 13:42:25'),
	(45, '2022-06-10', '2022-06-10', '2022-06-10', 'Achat d\'un onduleur par CY', 1, 20000, 3, 1, '2022-06-10 13:42:11', '2022-06-10 13:42:11'),
	(46, '2022-06-10', '2022-06-10', '2022-06-10', 'Dépot machine chez Boniface par FT', 1, 200, 3, 1, '2022-06-10 14:06:23', '2022-06-10 14:06:23'),
	(47, '2022-06-10', '2022-06-10', '2022-06-10', 'versement a ALL IN ONE', 1, 300, 3, 1, '2022-06-10 16:56:29', '2022-06-10 16:56:29'),
	(48, '2022-06-10', '2022-06-10', '2022-06-10', 'Retrait de la caisse par Carlet', 1, 620000, 3, 2, '2022-06-10 12:52:50', '2022-06-10 12:56:54'),
	(49, '2022-06-10', '2022-06-10', '2022-06-10', 'Retrait de la caisse par Carlet', 1, 7000, 3, 1, '2022-06-10 12:56:38', '2022-06-10 12:56:38'),
	(50, '2022-06-13', '2022-06-13', '2022-06-13', 'achat des pilles et boittier du disque dur', 1, 19000, 3, 0, '2022-06-13 17:23:11', '2022-06-13 17:23:11'),
	(51, '2022-06-13', '2022-06-13', '2022-06-13', 'credit de communication de AK', 1, 1000, 3, 1, '2022-06-13 17:23:38', '2022-06-13 17:23:38'),
	(52, '2022-06-13', '2022-06-13', '2022-06-13', 'Retrait de la caisse par AK', 1, 150000, 3, 0, '2022-06-13 17:24:19', '2022-06-13 17:24:20'),
	(53, '2022-06-13', '2022-06-13', '2022-06-13', 'paiement de la facture d\'electricité', 1, 200, 3, 1, '2022-06-13 17:28:29', '2022-06-13 17:28:29'),
	(54, '2022-06-13', '2022-06-13', '2022-06-13', 'Retrait de la caisse par AK', 1, 169850, 3, 1, '2022-06-13 17:32:44', '2022-06-13 17:32:44'),
	(55, '2022-06-13', '2022-06-13', '2022-06-13', 'Travaux de mise a jour des bureu', 1, 50000, 3, 1, '2022-06-13 18:02:59', '2022-06-13 18:02:59'),
	(56, '2022-06-13', '2022-06-13', '2022-06-13', 'Paiement des frais du domaine', 1, 40000, 3, 1, '2022-06-13 18:04:04', '2022-06-13 18:04:04'),
	(57, '2022-06-14', '2022-06-14', '2022-06-14', 'Achat du materiel par AK', 1, 5000, 3, 1, '2022-06-14 09:56:20', '2022-06-14 09:56:20'),
	(58, '2022-06-14', '2022-06-14', '2022-06-14', 'Livraison a ACESS BANK', 1, 200, 3, 1, '2022-06-14 11:20:58', '2022-06-14 11:20:58'),
	(59, '2022-06-14', '2022-06-14', '2022-06-14', 'Depot de la machine a ASCOMA', 1, 300, 3, 1, '2022-06-14 15:04:37', '2022-06-14 15:04:37'),
	(60, '2022-06-15', '2022-06-15', '2022-06-15', 'Recouvrement a ASCOMA', 1, 300, 3, 1, '2022-06-15 12:40:49', '2022-06-15 12:40:49'),
	(61, '2022-06-15', '2022-06-15', '2022-06-15', 'Encaissement A ASCOMA et demande de l\'attestation de domiciliation a ACCESS BANK', 1, 300, 3, 1, '2022-06-15 16:01:00', '2022-06-15 16:01:00'),
	(62, '2022-06-15', '2022-06-15', '2022-06-15', 'Achat d\'un paquet d\'agraphe et stronbon', 1, 4000, 3, 1, '2022-06-15 16:01:44', '2022-06-15 16:01:44'),
	(63, '2022-06-15', '2022-06-15', '2022-06-15', 'Recuperation des câbles par Marcel PRISO', 1, 500, 3, 1, '2022-06-15 16:02:42', '2022-06-15 16:02:42'),
	(64, '2022-06-15', '2022-06-15', '2022-06-15', 'D\'éclaration de la CNPS et frais de deplacement', 1, 7100, 3, 1, '2022-06-15 16:08:55', '2022-06-15 16:08:55'),
	(65, '2022-06-15', '2022-06-15', '2022-06-15', 'Paiement de l\'acompte d\'is', 1, 76973, 3, 2, '2022-06-15 16:11:10', '2022-06-15 16:11:10'),
	(66, '2022-06-15', '2022-06-15', '2022-06-15', 'Retrait de la caisse par Akilas TCHOKOUASSI', 1, 116000, 3, 1, '2022-06-15 16:43:53', '2022-06-15 16:43:53'),
	(67, '2022-06-15', '2022-06-15', '2022-06-15', 'PRET A CARLET YOUGA', 1, 50000, 3, 1, '2022-06-15 17:03:55', '2022-06-15 17:03:55'),
	(68, '2022-06-15', '2022-06-15', '2022-06-15', 'Retrait de la caisse par AK', 1, 150000, 3, 1, '2022-06-15 17:34:40', '2022-06-15 17:34:40'),
	(69, '2022-06-15', '2022-06-15', '2022-06-15', 'Retrait de la caisse par Carlet', 1, 100000, 3, 1, '2022-06-15 17:35:48', '2022-06-15 17:35:48'),
	(70, '2022-06-17', '2022-06-17', '2022-06-17', 'Retrait de la caisse par AK', 1, 100000, 3, 1, '2022-06-17 08:15:26', '2022-06-17 08:15:26'),
	(71, '2022-06-17', '2022-06-17', '2022-06-17', 'Retrait de la caisse par AK pour le Ruban', 1, 5000, 3, 1, '2022-06-17 09:23:43', '2022-06-17 09:23:43'),
	(72, '2022-06-17', '2022-06-17', '2022-06-17', 'Retrait de la caisse par SM', 1, 70000, 3, 1, '2022-06-17 09:51:15', '2022-06-17 09:51:15'),
	(73, '2022-06-16', '2022-06-16', '2022-06-17', 'Paiement facture, transport de FT, encaissement a ASCOMA, deplacement pour ACCESS BANK', 1, 10000, 3, 2, '2022-06-17 10:00:29', '2022-06-17 13:59:54'),
	(74, '2022-06-17', '2022-06-17', '2022-06-17', 'Achat d\'eau, thé et sucre', 1, 5000, 3, 1, '2022-06-17 13:59:39', '2022-06-17 13:59:39'),
	(75, '2022-06-18', '2022-06-18', '2022-06-20', 'credit de communication SG', 1, 1000, 3, 1, '2022-06-20 07:46:07', '2022-06-20 07:46:07'),
	(76, '2022-06-18', '2022-06-18', '2022-06-20', 'Retrait par CY', 1, 400, 3, 1, '2022-06-20 07:46:40', '2022-06-20 07:46:40'),
	(77, '2022-06-18', '2022-06-18', '2022-06-20', 'Deplacement pour CCA Bank par SG', 1, 500, 3, 1, '2022-06-20 07:49:04', '2022-06-20 07:49:04'),
	(78, '2022-06-18', '2022-06-18', '2022-06-20', 'Achat d\'un besoin pour bureau', 1, 500, 3, 1, '2022-06-20 07:50:19', '2022-06-20 07:50:19');
/*!40000 ALTER TABLE `taches` ENABLE KEYS */;

-- Listage de la structure de la table camlait-app. users
CREATE TABLE IF NOT EXISTS `users`
(
    `id` int
(
    10
) unsigned NOT NULL AUTO_INCREMENT,
    `firstname` varchar
(
    255
) COLLATE utf8mb4_unicode_ci NOT NULL,
    `lastname` varchar
(
    255
) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar
(
    255
) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password` varchar
(
    255
) COLLATE utf8mb4_unicode_ci NOT NULL,
    `remember_token` varchar
(
    100
) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `adresse` varchar
(
    255
) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `phone` varchar
(
    255
) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `is_active` int
(
    11
) NOT NULL DEFAULT '0',
    `is_admin` int
(
    11
) NOT NULL DEFAULT '0',
    `idrole` int
(
    10
) unsigned NOT NULL,
    `profile_photo_path` varchar
(
    2048
) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY
(
    `id`
),
    KEY `id`
(
    `id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE =utf8mb4_unicode_ci;

-- Listage des données de la table camlait-app.users : ~4 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE
INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `remember_token`, `adresse`, `phone`, `is_active`, `is_admin`, `idrole`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Desto', 'admin@gmail.com', NULL, '$2y$10$qAEOxT/9I.eUG8RRzvf20.qvE6iVPCR9wYzeeXlx3an9ZcYQjoJz6', NULL, 'logpom', '679353205', 1, 1, 1, 'WIN_20220302_13_53_42_Pro.jpg', NULL, '2022-06-14 11:17:07'),
	(2, 'Desto', 'super text', 'desto237@gmail.com', NULL, '$2y$10$hbuqg51nxRgtZPLCbANN2.Fo1wz1VIhgy2O4B6QsiIQEtiCfxZCxW', NULL, 'logpom', '679353205', 1, 1, 1, NULL, NULL, NULL),
	(3, 'Sonia', 'Madkoudjou', 'sonia.madkoudjou@gsc-technology.com', NULL, '$2y$10$j2CL52sUZ3l5euFQ1QDhm.6q3ahZ4DBuHrIRkDcOQLwqZ23DKA.e.', NULL, '', '655683650', 1, 0, 2, NULL, '2022-04-13 05:50:40', '2022-04-13 05:50:40'),
	(4, 'Soft', 'Global', 'gscdla@gsc-technology.com', NULL, '$2y$10$BtF8yUjI1Diz2ecW06DPQe6G.OeBdAS0pibRyrdiF/mvg03UuJ61y', NULL, '', '691 169 823', 1, 1, 1, NULL, '2022-04-13 05:56:10', '2022-04-13 05:56:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;


drop table if exists inter;
create table inter
(
    inter_id  int primary key AUTO_INCREMENT,
    code          varchar(20)  not null,
    etat          varchar(100)  null,
    centre        varchar(100)  null,
    classe        varchar(100)  null,
    organe        varchar(100)  null,
    date          date          null,
    heure_debut   time          null,
    heure_fin     time          null,
    correction    varchar(1000),
    gamme_n       varchar(1000),
    intervenant_1 varchar(1000),
    intervenant_2 varchar(1000),
    intervenant_3 varchar(1000),
    staut         int       default 0,
    iduser         int      ,
    dest         int      ,
    emet         int      ,
    created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at    DATETIME  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

drop table if exists di;
create table di
(
    di_id           int primary key AUTO_INCREMENT,
    num_di          varchar(20)  not null,
    code_sympt      varchar(250)  null,
    valeur_compteur varchar(250)  null,
    localisation varchar(5000)   null,
    priorite        varchar(250) not null,
    organe        varchar(250) null,
    etat_organe        varchar(250)  null,
    etat_equipement        varchar(250) not null,
    priorite        varchar(250) not null,
    date_souhaite   date         not null,
    date_accepte    date          null,
    heure_di        time          null,
    observation        varchar(5000)        not null,
    iduser         int      ,
    idequipement         int      ,
    emet         int      ,
    dest         int      ,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

drop table if exists bt;
create table bt
(
    bt_id      int primary key AUTO_INCREMENT,
    num_bt     varchar(20)  not null,
    rubrique   varchar(250) not null,
    classe      varchar(250)  null,
    gamme      varchar(250)  null,
    projet     varchar(255) null,
    observation     varchar(5000) null,
    iddi      int          not null,
    iduser         int      ,
    intervenant_1 int null ,
    intervenant_2 int null ,
    intervenant_3 int null ,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
