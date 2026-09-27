-- MariaDB dump 10.20-11.8.9-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: u662960912_digicraftai
-- ------------------------------------------------------
-- Server version	11.8.9-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES
(31,'AWS','brands/01M0D7EPMGBZTTDT0C2CYT81KM.webp',NULL,1,0,'2026-08-19 14:40:24','2026-08-19 14:40:24'),
(32,'cloud linux','brands/01M0D7FGBGBYPRWX9GEZXP39J8.webp',NULL,1,0,'2026-08-19 14:40:51','2026-08-19 14:40:51'),
(33,'cpanl','brands/01M0D7FZRABC0DCAQDDZ1B7CZD.webp',NULL,1,0,'2026-08-19 14:41:06','2026-08-19 14:41:06'),
(34,'google','brands/01M0D7GGEYS8DW6Y0BCXTPCQ7R.webp',NULL,1,0,'2026-08-19 14:41:23','2026-08-19 14:41:23'),
(35,'Litspeed','brands/01M0D7GXV5HGSWQNWF3PXF2Y1S.webp',NULL,1,0,'2026-08-19 14:41:37','2026-08-19 14:41:37'),
(36,'Mirosoft','brands/01M0D7HDNJX7XMM6D4HDM5KSV9.webp',NULL,1,0,'2026-08-19 14:41:53','2026-08-19 14:41:53'),
(37,'Plek','brands/01M0D7HVBVAD032ZESVQ0DQH4X.webp',NULL,1,0,'2026-08-19 14:42:07','2026-08-19 14:42:07'),
(38,'Smater Mail','brands/01M0D7JDREEP2049WKQE1YEE2Y.webp',NULL,1,0,'2026-08-19 14:42:26','2026-08-19 14:42:26'),
(39,'Virualize','brands/01M0D7KDD4P25SBXP6Q570T53B.webp',NULL,1,0,'2026-08-19 14:42:59','2026-08-19 14:42:59'),
(40,'WHMCS','brands/01M0D7KWQHH9WZM7VQRN4QY42R.png',NULL,1,0,'2026-08-19 14:43:14','2026-08-19 14:43:14');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES
('digicraft-ai-cache-356a192b7913b04c54574d18c28d46e6395428ab','i:3;',1787944622),
('digicraft-ai-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer','i:1787944622;',1787944622),
('digicraft-ai-cache-livewire-rate-limiter:135668d825ac7eb5f33a884065e518bfac0fcdc7','i:1;',1787669168),
('digicraft-ai-cache-livewire-rate-limiter:135668d825ac7eb5f33a884065e518bfac0fcdc7:timer','i:1787669168;',1787669168),
('digicraft-ai-cache-livewire-rate-limiter:2bb46e9e9e43f4dc5c003a6d27169eccf59fa985','i:1;',1786626834),
('digicraft-ai-cache-livewire-rate-limiter:2bb46e9e9e43f4dc5c003a6d27169eccf59fa985:timer','i:1786626834;',1786626834),
('digicraft-ai-cache-livewire-rate-limiter:5b4e578618165e3ec653c3356c09c9490c0894e4','i:1;',1787942354),
('digicraft-ai-cache-livewire-rate-limiter:5b4e578618165e3ec653c3356c09c9490c0894e4:timer','i:1787942354;',1787942354),
('digicraft-ai-cache-livewire-rate-limiter:6660b3d47cf4a0114492d2f21f3aa4b7f9338511','i:1;',1788109930),
('digicraft-ai-cache-livewire-rate-limiter:6660b3d47cf4a0114492d2f21f3aa4b7f9338511:timer','i:1788109930;',1788109930),
('digicraft-ai-cache-livewire-rate-limiter:672ebc41be91ed4262922f85638cf3c6cf88649e','i:1;',1787812121),
('digicraft-ai-cache-livewire-rate-limiter:672ebc41be91ed4262922f85638cf3c6cf88649e:timer','i:1787812121;',1787812121),
('digicraft-ai-cache-livewire-rate-limiter:6dd89446cb28b6b491112b6d7237cb6fa84d9251','i:1;',1787248191),
('digicraft-ai-cache-livewire-rate-limiter:6dd89446cb28b6b491112b6d7237cb6fa84d9251:timer','i:1787248191;',1787248191),
('digicraft-ai-cache-livewire-rate-limiter:9814646fc4f92965f6d6bbfe0157bcd9b49bc706','i:1;',1788270854),
('digicraft-ai-cache-livewire-rate-limiter:9814646fc4f92965f6d6bbfe0157bcd9b49bc706:timer','i:1788270854;',1788270854),
('digicraft-ai-cache-livewire-rate-limiter:c85ebac164a6b93b96e304434e4b39f440113a55','i:1;',1788550273),
('digicraft-ai-cache-livewire-rate-limiter:c85ebac164a6b93b96e304434e4b39f440113a55:timer','i:1788550273;',1788550273),
('digicraft-ai-cache-livewire-rate-limiter:ea9c44c02a75e53c0d5c79cb33e5e402bb15a115','i:1;',1787053385),
('digicraft-ai-cache-livewire-rate-limiter:ea9c44c02a75e53c0d5c79cb33e5e402bb15a115:timer','i:1787053385;',1787053385),
('digicraft-ai-cache-livewire-rate-limiter:ed72b47cf7f398b251b3a48f66a602728ef6ea96','i:1;',1787285484),
('digicraft-ai-cache-livewire-rate-limiter:ed72b47cf7f398b251b3a48f66a602728ef6ea96:timer','i:1787285484;',1787285484),
('digicraft-ai-cache-mail_settings','a:13:{s:2:\"id\";i:1;s:10:\"is_enabled\";i:0;s:6:\"mailer\";s:4:\"smtp\";s:4:\"host\";s:9:\"127.0.0.1\";s:4:\"port\";i:2525;s:8:\"username\";N;s:8:\"password\";N;s:10:\"encryption\";s:3:\"tls\";s:12:\"from_address\";s:17:\"hello@example.com\";s:9:\"from_name\";s:12:\"DigiCraft AI\";s:13:\"test_to_email\";N;s:10:\"created_at\";s:19:\"2026-08-11 14:03:29\";s:10:\"updated_at\";s:19:\"2026-08-11 14:03:29\";}',1790200169),
('digicraft-ai-cache-site_settings','a:61:{s:2:\"id\";i:1;s:9:\"site_name\";s:14:\"DIGI CRAFTS AI\";s:7:\"tagline\";s:44:\"AI Digital Agency & Web Development Services\";s:4:\"logo\";s:36:\"brand/01KZK12PTS3B7KA80DTCRV0SMX.png\";s:10:\"logo_white\";s:36:\"brand/01KZQV17588B6RQS8JJ3972RT1.png\";s:7:\"favicon\";s:36:\"brand/01KZNFAYPXEVNVVRR6MNYHQW53.png\";s:14:\"default_banner\";N;s:14:\"preloader_text\";s:14:\"DIGI CRAFTS AI\";s:13:\"preloader_gif\";N;s:22:\"preloader_loading_text\";s:7:\"Loading\";s:13:\"home_template\";s:6:\"home-3\";s:11:\"color_theme\";s:7:\"#384BFF\";s:12:\"color_theme2\";s:7:\"#18185E\";s:12:\"color_theme3\";s:7:\"#F98600\";s:12:\"color_header\";s:7:\"#0F0D1D\";s:10:\"color_text\";s:7:\"#585858\";s:11:\"color_title\";s:7:\"#0F0D1D\";s:8:\"color_bg\";s:7:\"#F3F7FB\";s:10:\"color_body\";s:7:\"#ffffff\";s:12:\"color_border\";s:7:\"#E3E3E3\";s:10:\"font_title\";s:8:\"Rajdhani\";s:9:\"font_body\";s:17:\"Plus Jakarta Sans\";s:5:\"email\";s:21:\"Info@digicraftsai.com\";s:5:\"phone\";s:17:\"+92 334 0 555 111\";s:7:\"address\";s:39:\"2526# S Usman E Ghani Avenue Bahawalpur\";s:13:\"working_hours\";s:22:\"Mod-friday, 09am -05pm\";s:13:\"map_embed_url\";s:434:\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3475.7877113072295!2d71.72273001128751!3d29.405765675148263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393b9067f26af9d9%3A0x3c85e2701f24990d!2sUsman%20e%20Ghani%20Rd%2C%20Bahawalpur%2C%20Pakistan!5e0!3m2!1sen!2sbd!4v1787130940957!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"strict-origin-when-cross-origin\">\";s:8:\"facebook\";s:37:\"https://www.facebook.com/DigiCraftsAI\";s:7:\"twitter\";s:19:\"https://twitter.com\";s:9:\"instagram\";s:39:\"https://www.instagram.com/digicraftsai/\";s:8:\"linkedin\";s:20:\"https://linkedin.com\";s:7:\"youtube\";s:19:\"https://youtube.com\";s:15:\"header_cta_text\";s:11:\"Get A Quote\";s:14:\"header_cta_url\";s:8:\"/contact\";s:14:\"offcanvas_text\";s:166:\"Scale your business with AI-driven web design, custom software development, targeted SEO, and performance digital marketing from DigiCraftsAI. Get a free audit today!\";s:12:\"footer_about\";s:136:\"DigiCraftsAI (digicraftsai.com) — AI-driven IT services, web development, SEO, digital marketing, and custom software CRM Development.\";s:16:\"footer_copyright\";s:44:\"© 2026 Digi Crafts AI. All Rights Reserved.\";s:17:\"locations_heading\";s:9:\"Locations\";s:19:\"locations_watermark\";s:13:\"SALES OFFICES\";s:14:\"home_1_content\";s:1088:\"{\"hero_subtitle\":\"Everything You Need to Create a Website\",\"hero_title\":\"Business Innovation With IT Services expertise\",\"hero_cta_text\":\"get Started\",\"hero_cta_url\":\"\\/quote\",\"hero_image\":\"home\\/heroThumb1_1.png\",\"hero_checklist\":[\"Deployment and Support\",\"Discovery and Analysis\",\"Flexibility and Adaptability\",\"Competitive Advantage\"],\"about_subtitle\":\"about company\",\"about_title\":\"Navigating Tech Horizons Together\",\"about_text\":\"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you\",\"about_cta_text\":null,\"about_cta_url\":\"\\/contact\",\"services_subtitle\":\"Our Services\",\"services_title\":\"Elevating Businesses with IT Ingenuity\",\"services_text\":null,\"pricing_subtitle\":\"Our Pricing\",\"pricing_title\":\"Our Awesome Pricing Plans\",\"cta_title\":\"24\\/7 Expert Hosting Support Our Customers Love\",\"cta_text\":null,\"cta_button_text\":\"Talk to a Specialist\",\"cta_button_url\":\"\\/contact\",\"section_extra_title\":null,\"section_extra_text\":null}\";s:14:\"home_2_content\";s:598:\"{\"hero_subtitle\":\"Modern IT Partner\",\"hero_title\":\"Smart IT Solutions For Your Growing Business\",\"hero_cta_text\":\"Get A Quote\",\"hero_cta_url\":null,\"hero_image\":null,\"hero_checklist\":[],\"about_subtitle\":null,\"about_title\":null,\"about_text\":\"Scale faster with cloud, software and managed IT services.\",\"about_cta_text\":null,\"about_cta_url\":null,\"services_subtitle\":null,\"services_title\":\"What We Offer\",\"services_text\":null,\"pricing_subtitle\":null,\"pricing_title\":null,\"cta_title\":null,\"cta_text\":null,\"cta_button_text\":null,\"cta_button_url\":null,\"section_extra_title\":null,\"section_extra_text\":null}\";s:14:\"home_3_content\";s:4397:\"{\"hero_slides\":[{\"image\":\"home\\/slides\\/01KZJW957ME562B8R6KRMB028W.webp\",\"subtitle\":\"Digi Crafts AI\",\"title\":\"Web Development, SEO & Brand Launch Agency\",\"text\":\"Scale your business with Digi Crafts AI. We deliver custom web design, technical SEO, graphic branding, social media marketing, and complete brand launches.\",\"btn1_text\":\"Explore More\",\"btn1_url\":\"\\/about\",\"btn2_text\":\"Contact Us\",\"btn2_url\":\"\\/contact\"},{\"image\":\"home\\/slides\\/01KZJW957NXFDA1SXCBYNGCPS2.webp\",\"subtitle\":\"Digi Crafts AI\",\"title\":\"Search Engine Optimization (SEO) & AI-Driven Digital Growth\",\"text\":\"Advanced on-page, off-page, and technical SEO strategies designed to secure top rankings and organic growth. High-converting ad creatives, brand assets, and UI\\/UX design tailored to your target audience.\",\"btn1_text\":\"Explore More\",\"btn1_url\":\"\\/about\",\"btn2_text\":\"Contact Us\",\"btn2_url\":\"\\/contact\"},{\"image\":\"home\\/slides\\/01KZJW957NXFDA1SXCBYNGCPS3.webp\",\"subtitle\":\"Digi Crafts AI\",\"title\":\"Digital Marketing Services & ROI Growth Agency\",\"text\":\"Performance marketing agency, ROI-driven SMM campaigns, multi-channel growth strategy, digital marketing company Drive measurable revenue with Digi Crafts AI. Our data-driven digital marketing, SMM, CRO, and multi-channel ad strategies help scale your brand faster.\",\"btn1_text\":\"Explore More\",\"btn1_url\":\"\\/about\",\"btn2_text\":\"Contact Us\",\"btn2_url\":\"\\/contact\"}],\"about_subtitle\":\"ABOUT Digi Crafts AI\",\"about_title\":\"Scale Your Business with Digi Crafts AI\",\"about_text\":\"Digi Crafts AI - Core IT Solution & Technology. From custom web application development to end-to-end marketing funnels, we build high-performing digital infrastructure tailored to your business goals.\",\"about_image\":\"home\\/01KZX02H7XDA8WQCKN08T78DA5.jpg\",\"about_video_url\":\"https:\\/\\/www.youtube.com\\/\",\"about_clients_count\":\"6,561\",\"about_clients_label\":\"Satisfied Clients\",\"about_phone\":\"+92334 0555 111\",\"about_cta_text\":\"Explore More\",\"about_cta_url\":\"\\/about\",\"about_checklist\":[\"Branding and design Identity\",\"Web Design & Development\",\"Social Media Marketing Solutions\",\"Search Engine Optimization\",\"Technical SEO | Core Web Vitals\",\"CRM Software Development\",\"Google Ads (PPC)\",\"Meta Ads\",\"Shopify Store Development\",\"Custom WordPress Development\"],\"brand_text\":\"Partner Ship\",\"services_subtitle\":\"Our Core Capabilities\",\"services_title\":\"Ready to Accelerate Your Digital Transformation?\",\"services_cta_text\":\"See all Services\",\"cta_title\":\"Stay Connected With Digi Crafts AI\",\"cta_phone\":\"+92334 0555 111\",\"services_bg_image\":\"home\\/services\\/01KZX0Z79M9TZS18FE16GEGABP.jpg\",\"pricing_subtitle\":\"Basic\",\"pricing_title\":\"Web Design & Development\",\"process_subtitle\":\"How Digi Crafts AI Work\",\"process_title\":\"Standard Work Process at Digi Crafts AI\",\"process_steps\":[{\"title\":\"Choose A Service\",\"text\":\"To choose the right service, define your specific goal,  Look for proven experience in your specific industry.\",\"icon\":null},{\"title\":\"Define Requirements\",\"text\":\"A requirement is something you need, want, or must do. Write down your exact technical or personal requirements.\",\"icon\":null},{\"title\":\"Request A Meeting\",\"text\":\"In the meeting, we will discuss the project requirements & discuss about quotations.\",\"icon\":null},{\"title\":\"Final Solution\",\"text\":\"After this procedure, to meet the project requirements, budget, and timeline, you have to pay a 50% down payment.\",\"icon\":null}],\"achievement_subtitle\":\"achievement\",\"achievement_title\":\"We Are Increasing Business Success\",\"achievements\":[{\"number\":\"6,561\",\"label\":\"Satisfied Clients\",\"icon\":null},{\"number\":\"600\",\"label\":\"Finished Projects\",\"icon\":null},{\"number\":\"250\",\"label\":\"Skilled Experts\",\"icon\":null},{\"number\":\"590\",\"label\":\"Media Posts\",\"icon\":null}],\"projects_subtitle\":\"PROJECTS\",\"projects_title\":\"Our Latest Incredible\\nClient\'s Projects\",\"projects_video_url\":\"https:\\/\\/www.youtube.com\\/\",\"projects_bg_image\":\"home\\/projects\\/01KZX2S61A673QNX1BEGN9TE5H.jpg\",\"team_subtitle\":\"Team Members\",\"team_title\":\"Our Dedicated Team Members\",\"team_bg_image\":null,\"testimonial_subtitle\":\"Testimonials\",\"testimonial_title\":\"People Who Already Love Us\",\"blog_subtitle\":\"Latest Blog\",\"blog_title\":\"Checkout Our Latest News & Articles\",\"marque_items\":\"CUstom Web Development,Digital Marketeing,Search Engine Optimization,Brand Launcing, AI Automation, CRM Integrations,Core IT Solution & Technology,Shopify,Wordpress\"}\";s:10:\"meta_title\";s:57:\"Digi Crafts AI | Web Development, Custom CRM & SEO Agency\";s:16:\"meta_description\";s:148:\"Scale your business with Digi Crafts AI. Expert web development, custom CRM integrations, data-driven SEO, and complete digital marketing solutions.\";s:13:\"meta_keywords\";s:118:\"Custom Web Development Services, IT Solution,Custom CRM Development, Technical SEO Agency, Digital Marketing Solutions\";s:11:\"meta_author\";s:14:\"Digi Crafts AI\";s:8:\"og_title\";s:46:\"Digi Crafts AI - Core IT Solution & Technology\";s:14:\"og_description\";s:47:\"Business innovation with IT services expertise.\";s:8:\"og_image\";s:34:\"seo/01KZX3GMYH4WHXW24FK0CYBX8Q.png\";s:7:\"og_type\";s:7:\"website\";s:13:\"twitter_title\";s:76:\"Digital Engineering Services | AI-Powered IT Solutions & Product Development\";s:19:\"twitter_description\";s:47:\"Business innovation with IT services expertise.\";s:13:\"twitter_image\";s:34:\"seo/01KZX3GMYJ1S7PYZDNR6ZRBYH1.png\";s:12:\"twitter_card\";s:19:\"summary_large_image\";s:13:\"canonical_url\";s:29:\"https://www.digicraftsai.com/\";s:6:\"robots\";s:13:\"index, follow\";s:13:\"schema_markup\";N;s:16:\"custom_head_code\";N;s:16:\"custom_body_code\";N;s:10:\"created_at\";s:19:\"2026-08-08 03:56:05\";s:10:\"updated_at\";s:19:\"2026-08-21 06:30:28\";}',1790200169);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `og_type` varchar(255) DEFAULT 'website',
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_image` varchar(255) DEFAULT NULL,
  `twitter_card` varchar(255) DEFAULT 'summary_large_image',
  `canonical_url` varchar(255) DEFAULT NULL,
  `robots` varchar(255) DEFAULT 'index, follow',
  `schema_markup` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES
(1,'What services do you offer?','We offer web development, cloud, cybersecurity, UI/UX, marketing and IT consulting.',NULL,NULL,1,1,NULL,NULL,'services, faq',NULL,NULL,NULL,NULL,'website',NULL,NULL,NULL,'summary_large_image',NULL,'index, follow',NULL,'2026-08-08 03:56:06','2026-08-08 03:56:06'),
(2,'How can I get a quote?','Use the contact form or call us directly and our team will respond quickly.',NULL,NULL,1,2,NULL,NULL,'quote, contact, faq',NULL,NULL,NULL,NULL,'website',NULL,NULL,NULL,'summary_large_image',NULL,'index, follow',NULL,'2026-08-08 03:56:06','2026-08-08 03:56:06');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES
(1,'United States','4849 Greenville Avenue, Dallas, Texas, United States 75206','+1-555-123-4567','us@digicraftsai.com','locations/flags/01KZXCPDMQVYF389SZT89T4R43.png',1,2,'2026-08-13 10:55:59','2026-08-13 11:44:06'),
(2,'United Arab Emirates','Level 12 Ajman Chamber of Commerce building Ajman, UAE .','+971 54 480 8234','uae@digicraftsai.com','locations/flags/01KZXCY203RMSRGJ317S8315FA.png',1,2,'2026-08-13 10:55:59','2026-08-13 11:08:19'),
(3,'Saudi Arabia','Al Faisaliah Center, King Fahd Road, Riyadh','+966-515-559-068','ksa@digicraftsai.com','locations/flags/01KZXF3B1GD7BRMYGD0C32WP6C.jpg',1,3,'2026-08-13 10:55:59','2026-08-13 11:48:07'),
(4,'Pakistan','2526# S Usman E Ghani Avenue Bahawalpur, Punjab, Pakistan','+92 334 055 5111','pk@digicraftsai.com','locations/flags/01KZXCK5Q4DK1DXE44N33BXF99.png',1,1,'2026-08-13 10:55:59','2026-08-19 07:30:34');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `mail_settings`
--

DROP TABLE IF EXISTS `mail_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `mail_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL DEFAULT 0,
  `mailer` varchar(255) NOT NULL DEFAULT 'smtp',
  `host` varchar(255) DEFAULT NULL,
  `port` int(10) unsigned NOT NULL DEFAULT 587,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `encryption` varchar(255) DEFAULT NULL,
  `from_address` varchar(255) DEFAULT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `test_to_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_settings`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `mail_settings` WRITE;
/*!40000 ALTER TABLE `mail_settings` DISABLE KEYS */;
INSERT INTO `mail_settings` VALUES
(1,0,'smtp','127.0.0.1',2525,NULL,NULL,'tls','hello@example.com','DigiCraft AI',NULL,'2026-08-11 14:03:29','2026-08-11 14:03:29');
/*!40000 ALTER TABLE `mail_settings` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `marketplace_categories`
--

DROP TABLE IF EXISTS `marketplace_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `marketplace_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `marketplace_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marketplace_categories`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `marketplace_categories` WRITE;
/*!40000 ALTER TABLE `marketplace_categories` DISABLE KEYS */;
INSERT INTO `marketplace_categories` VALUES
(1,'Web Development','web-development',NULL,NULL,1,1,'2026-08-13 12:33:58','2026-08-13 12:33:58'),
(2,'SEO','seo',NULL,NULL,1,2,'2026-08-13 12:33:58','2026-08-13 12:33:58'),
(3,'CRM','crm',NULL,NULL,1,3,'2026-08-13 12:33:58','2026-08-13 12:33:58'),
(4,'UI/UX Design','ui-ux',NULL,NULL,1,4,'2026-08-13 12:33:58','2026-08-13 12:33:58');
/*!40000 ALTER TABLE `marketplace_categories` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `marketplace_products`
--

DROP TABLE IF EXISTS `marketplace_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `marketplace_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `marketplace_category_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `price_suffix` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `og_type` varchar(255) DEFAULT 'website',
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_image` varchar(255) DEFAULT NULL,
  `twitter_card` varchar(255) DEFAULT 'summary_large_image',
  `canonical_url` varchar(255) DEFAULT NULL,
  `robots` varchar(255) DEFAULT 'index, follow',
  `schema_markup` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `marketplace_products_slug_unique` (`slug`),
  KEY `marketplace_products_marketplace_category_id_foreign` (`marketplace_category_id`),
  CONSTRAINT `marketplace_products_marketplace_category_id_foreign` FOREIGN KEY (`marketplace_category_id`) REFERENCES `marketplace_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marketplace_products`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `marketplace_products` WRITE;
/*!40000 ALTER TABLE `marketplace_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `marketplace_products` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `location` varchar(255) NOT NULL DEFAULT 'header',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_parent_id_foreign` (`parent_id`),
  CONSTRAINT `menu_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES
(1,'Home','/',NULL,NULL,'header',1,1,'2026-08-08 03:56:05','2026-08-08 03:56:05'),
(2,'About','/about',NULL,NULL,'header',1,2,'2026-08-08 03:56:05','2026-08-08 03:56:05'),
(3,'Services','/services',NULL,NULL,'header',1,3,'2026-08-08 03:56:05','2026-08-08 03:56:05'),
(4,'Team','/team',NULL,NULL,'header',1,4,'2026-08-08 03:56:05','2026-08-08 03:56:05'),
(5,'Projects','/projects',NULL,NULL,'header',1,5,'2026-08-08 03:56:05','2026-08-08 03:56:05'),
(6,'Blog','/blog',NULL,NULL,'header',1,6,'2026-08-08 03:56:05','2026-08-08 03:56:05'),
(7,'Contact','/contact',NULL,NULL,'header',1,7,'2026-08-08 03:56:05','2026-08-08 03:56:05'),
(8,'About',NULL,'about',NULL,'footer',1,1,'2026-08-13 11:14:55','2026-08-13 11:14:55'),
(9,'Our Services',NULL,'services.index',NULL,'footer',1,2,'2026-08-13 11:14:55','2026-08-13 11:14:55'),
(10,'Our Blogs',NULL,'blog.index',NULL,'footer',1,3,'2026-08-13 11:14:55','2026-08-13 11:14:55'),
(11,'FAQ’S',NULL,'faq',NULL,'footer',1,4,'2026-08-13 11:14:55','2026-08-13 11:14:55'),
(12,'Contact Us',NULL,'contact',NULL,'footer',1,5,'2026-08-13 11:14:55','2026-08-13 11:14:55'),
(13,'Terms & Condition',NULL,'contact',NULL,'footer_bottom',1,1,'2026-08-13 11:32:59','2026-08-13 11:32:59'),
(14,'Privacy Policy',NULL,'contact',NULL,'footer_bottom',1,2,'2026-08-13 11:32:59','2026-08-13 11:32:59'),
(15,'Marketplace',NULL,'marketplace.index',NULL,'header',1,80,'2026-08-13 12:33:58','2026-08-13 12:33:58');
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2026_08_08_084719_create_site_settings_table',2),
(5,'2026_08_08_084721_create_pages_table',2),
(6,'2026_08_08_084722_create_services_table',2),
(7,'2026_08_08_084724_create_team_members_table',2),
(8,'2026_08_08_084725_create_projects_table',2),
(9,'2026_08_08_084727_create_posts_table',2),
(10,'2026_08_08_084728_create_faqs_table',2),
(11,'2026_08_08_084730_create_menu_items_table',2),
(12,'2026_08_08_090819_add_default_banner_and_team_banner',3),
(13,'2026_08_08_170556_add_preloader_gif_to_site_settings',4),
(14,'2026_08_09_082000_create_pricing_plans_table',5),
(15,'2026_08_09_084500_change_map_embed_url_to_text',6),
(16,'2026_08_11_113000_create_brands_table',7),
(17,'2026_08_11_120152_create_newsletter_subscribers_table',7),
(18,'2026_08_11_120631_create_plan_subscriptions_table',7),
(19,'2026_08_11_121010_create_mail_settings_table',7),
(20,'2026_08_12_110000_add_request_fields_to_plan_subscriptions_table',8),
(21,'2026_08_13_110000_create_locations_table',9),
(22,'2026_08_13_110100_add_locations_heading_to_site_settings',9),
(23,'2026_08_13_160000_create_marketplace_categories_table',10),
(24,'2026_08_13_160100_create_marketplace_products_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `newsletter_subscribers`
--

DROP TABLE IF EXISTS `newsletter_subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'subscribed',
  `source` varchar(255) NOT NULL DEFAULT 'footer',
  `unsubscribe_token` varchar(64) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `subscribed_at` timestamp NULL DEFAULT NULL,
  `unsubscribed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `newsletter_subscribers_email_unique` (`email`),
  UNIQUE KEY `newsletter_subscribers_unsubscribe_token_unique` (`unsubscribe_token`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter_subscribers`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `newsletter_subscribers` WRITE;
/*!40000 ALTER TABLE `newsletter_subscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletter_subscribers` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `breadcrumb_title` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `sections` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sections`)),
  `template` varchar(255) NOT NULL DEFAULT 'default',
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `og_type` varchar(255) DEFAULT 'website',
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_image` varchar(255) DEFAULT NULL,
  `twitter_card` varchar(255) DEFAULT 'summary_large_image',
  `canonical_url` varchar(255) DEFAULT NULL,
  `robots` varchar(255) DEFAULT 'index, follow',
  `schema_markup` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES
(1,'About Us','about','Who we are','About DigiCraftsAI | AI Solutions, Web Development & SEO Experts','pages/banners/01KZRW43VDKP0G3WCN71NJY1RH.jpg','About DigiCraftsAI\nWelcome to DigiCraftsAI, where artificial intelligence meets custom web engineering and strategy-led digital growth. We build high-performance web applications, intelligent CRM systems, and search engine strategies that empower businesses to scale seamlessly in a fast-evolving digital landscape.\n\nDriving Innovation Through Code, AI, and Strategy\nFounded on the principle that digital solutions should be both technologically advanced and growth-focused, DigiCraftsAI brings together over a decade of hands-on expertise across technical SEO, custom software development, e-commerce engineering, and AI integration.\n\nWhether developing specialized CRM architectures, optimizing enterprise web performance, or scaling organic visibility, we craft bespoke digital solutions tailored to your unique business objectives.',NULL,'default',1,1,'About DigiCraftsAI | AI Solutions, Web Development & SEO Experts','Learn how DigiCraftsAI combines artificial intelligence, custom web development, and technical SEO to scale businesses globally. Meet our expert team today.','About DigiCraftsAI, AI web development agency, custom CRM solutions, technical SEO experts, digital transformation agency','Digi Crafts AI','DigiCraftsAI | AI Integration, Web Engineering & Technical SEO','We build scalable digital ecosystems, custom CRMs, and high-ranking search strategies that turn technical precision into business growth.',NULL,'website','Who We Are | Driving Digital Growth with DigiCraftsAI','From smart AI workflows to e-commerce engineering, see how our specialized team delivers measurable results for brands worldwide.',NULL,'summary_large_image','https://www.digicraftsai.com/about','index, follow',NULL,'2026-08-08 03:56:05','2026-08-11 16:59:22'),
(2,'Contact Us','contact','Contact Us','Contact Us','pages/01KZJTG81B7YCXRGDQEFHPQC72.jpg','How Can We Help You Today?\n\nCustomer & Technical Support: Need help using our AI platforms or managing your account? Reach out to our technical support team for fast assistance.\n\nCustom Enterprise AI Solutions: Looking to integrate custom AI workflows or scale your business operations? Speak with our sales and strategy experts.\n\nPartnerships & Media: Interested in collaborating, media inquiries, or affiliate partnerships? Connect with our business development team.','{\"form_title\":\"Ready to Get Started?\",\"phone_label\":\"Call Us 7\\/24\",\"email_label\":\"Make a Quote\",\"location_label\":\"Location\",\"form_text\":\"Have a question about our AI-driven creative tools, need custom solutions, or want to partner with us? Our team is here to help you turn your digital vision into reality.\",\"video_image\":null,\"video_url\":\"https:\\/\\/www.youtube.com\\/\"}','contact',1,0,'Contact DigiCraftsAI | Get Support & Enterprise Solutions','Have questions about DigiCraftsAI? Contact our team for technical support, enterprise AI integration, partnership opportunities, or general inquiries.','DigiCraftsAI contact, AI creative solutions support, custom AI development, DigiCraftsAI customer service','Digi Crafts AI','Contact DigiCraftsAI | AI Solutions & Web Development Support','Need custom AI workflows, Web Development, or Technical SEO? Contact the DigiCraftsAI team today to scale your digital presence.','seo/01KZNF41A9JFNV2W7E3D96C3KR.png','website','Get in Touch | DigiCraftsAI Support & Custom Solutions','Have a project in mind? Reach out to DigiCraftsAI for expert AI integration, custom CRM development, and technical support.',NULL,'summary_large_image','https://www.digicraftsai.com/contact','index, follow',NULL,'2026-08-08 03:56:05','2026-08-10 14:27:35'),
(4,'Terms & Conditions','terms-conditions','Terms & Conditions AI','Digi Crafts Terms & Conditions',NULL,'<p>Terms &amp; Conditions text</p>',NULL,'default',1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'website',NULL,NULL,NULL,'summary_large_image',NULL,'index, follow',NULL,'2026-08-10 14:23:09','2026-08-13 10:59:45'),
(5,'Our Services','services',NULL,'Digi Crafts AI services','pages/banners/01KZX5ETCN4AGH8P6ZPWMMM33F.jpg','<p><strong>Digi Crafts AI services</strong></p>',NULL,'default',1,0,'Digital Agency Services | Web Dev, SEO & AI | Digi Crafts AI','Transform your business with Digi Crafts AI. We deliver custom web development, Shopify storefronts, technical SEO strategies, and tailored AI solutions.','web development services, technical SEO company, custom Shopify development, WordPress development agency, AI integration services, CRM ERP development','Digi Crafts AI','Digital Agency Services | Web Dev, SEO & AI | Digi Crafts AI','Scale your online presence with end-to-end digital solutions: custom web engineering, Shopify & WordPress, technical SEO, and AI automation.','seo/01KZX5ETCQCMATE3VY84YCTXPA.jpg','website','Digi Crafts AI Services: Web Engineering, SEO & AI Solutions','Custom e-commerce platforms, technical search engine optimization, and custom AI/CRM integrations tailored for high-growth businesses.','seo/01KZX5ETCSVQDHJXNP2NCZ3203.jpg','summary_large_image','https://digicraftsai.com/services','index, follow',NULL,'2026-08-11 14:29:35','2026-08-13 08:57:40'),
(6,'Our Team','team',NULL,'Digi Crafts AI team','pages/banners/01KZT8TJZS5QYRYG49AB5CN3PD.jpg','<p></p>',NULL,'default',1,0,'Meet Our Team | Web Development & SEO Experts | Digi Crafts AI','Meet the visionaries, web engineers, SEO specialists, and AI innovators behind Digi Crafts AI. Learn about our leadership and expert digital agency team.','web development experts, technical SEO specialists, AI integration engineers, leadership team Digi Crafts AI','Digi Crafts AI','Digital Agency Services | Web Dev, SEO & AI | Digi Crafts AI','Scale your online presence with end-to-end digital solutions: custom web engineering, Shopify & WordPress, technical SEO, and AI automation.','seo/01KZX62VBG7S1N3WZM1PY07Y2Y.jpg','website','Digi Crafts AI Services: Web Engineering, SEO & AI Solutions','Custom e-commerce platforms, technical search engine optimization, and custom AI/CRM integrations tailored for high-growth businesses.','seo/01KZX62VBH26B8NNA7HZHZ5N7J.jpg','summary_large_image','https://digicraftsai.com/team','index, follow',NULL,'2026-08-11 14:29:35','2026-08-13 09:08:36'),
(7,'Our Projects','projects',NULL,'Digi Crafts AI Portfolio','pages/banners/01KZX4QPY9221BJZFV220NPDAB.jpg','<p><strong>Digi Crafts AI Portfolio</strong></p>',NULL,'default',1,0,'Digi Crafts AI Projects | Web Development & SEO Portfolio','Explore our portfolio of custom web development, Shopify storefronts, WordPress solutions, and high-impact SEO case studies at Digi Crafts AI.','web development portfolio,SEO case studies,Shopify development portfolio,WordPress site showcase,custom software agency projects','Digi Crafts AI','Digi Crafts AI Projects | Web Development & SEO Portfolio','Explore our portfolio of custom web development, Shopify storefronts, enterprise WordPress solutions, and high-impact SEO case studies at Digi Crafts AI.','seo/01KZX4QPYBJ7WH1Q7QRDWQGKQY.jpg','portfolio','Digi Crafts AI Portfolio: Client Case Studies & Projects','Discover how Digi Crafts AI drives digital growth with custom web engineering, Shopify & WordPress builds, and technical SEO strategies.','seo/01KZX4QPYD9SRGP942VR8R2RAM.jpg','summary_large_image','https://digicraftsai.com/projects','index, follow',NULL,'2026-08-11 14:29:35','2026-08-13 08:45:03'),
(8,'Blog','blog','Terms & Conditions AI','Digi Crafts AI Blog','pages/banners/01KZX4CF60D0HJCM5T0SGWTJ1X.jpg','<h2><strong>Digi Crafts AI Blog</strong></h2>',NULL,'default',1,0,'Digi Crafts AI Blog | Insights on AI, Web Development & SEO','Explore the latest insights, strategies, and industry trends in AI solutions, custom web development, SEO, and e-commerce from the experts at Digi Crafts AI.','AI tech insights, web development blog, SEO strategies, e-commerce tips, digital agency blog','Digi Crafts AI','OG Title (57 Characters): Digi Crafts AI Blog | Insights on AI, Web Development & SEO','Master digital growth with expert guides on AI automation, high-converting web development, technical SEO, and e-commerce scaling strategies from Digi Crafts AI.','seo/01KZX4CF616TTWF3FZZQFMBMXN.jpg','blog','Digi Crafts AI Blog: AI, Web Dev & Technical SEO Insights','Actionable guides on AI integrations, custom WordPress & Shopify development, and technical SEO strategies to scale your digital business.','seo/01KZX4CF625V5MMHJR66AJ43VW.jpg','summary_large_image','https://digicraftsai.com/blog','index, follow',NULL,'2026-08-11 14:29:35','2026-08-13 08:45:45'),
(9,'FAQs','faq',NULL,'FAQs',NULL,NULL,NULL,'default',1,0,'FAQs',NULL,NULL,NULL,NULL,NULL,NULL,'website',NULL,NULL,NULL,'summary_large_image',NULL,'index, follow',NULL,'2026-08-11 14:29:35','2026-08-11 14:29:35'),
(10,'Get A Quote','quote',NULL,'Get a quote Digi Crafts AI','pages/banners/01KZRYMRYR6NC3E114CYH4HVJG.jpg','<p><strong>Get a quote Digi Crafts AI</strong></p>',NULL,'default',1,0,'Get a Free Quote | Digi Crafts AI Development & SEO Services','Request a personalized quote for custom web development, Shopify stores, technical SEO, and AI solutions from Digi Crafts AI. Get a response in 24 hours.','request web development quote, SEO pricing inquiry, custom AI integration quote, Shopify site development estimate, digital agency quote','Digi Crafts AI','Request a Project Estimate | Digi Crafts AI','Get a custom proposal for your next web design, Shopify, WordPress, or SEO project. Fast 24-hour response time from Digi Crafts AI.','seo/01KZX57HSY8GCP4WYHHTTSNR2B.jpg','quotations','Get a Free Quote | Digi Crafts AI Web & SEO Services','Looking for custom web engineering, Shopify development, technical SEO, or AI automation? Request a tailored quote from Digi Crafts AI today.','seo/01KZX57HSZXJD9F426TH4FX2ZF.jpg','summary_large_image','https://digicraftsai.com/quote','index, follow',NULL,'2026-08-11 14:29:35','2026-08-13 08:53:42'),
(11,'Marketplace','marketplace',NULL,'Marketplace',NULL,NULL,NULL,'default',1,0,'Marketplace',NULL,NULL,NULL,NULL,NULL,NULL,'website',NULL,NULL,NULL,'summary_large_image',NULL,'index, follow',NULL,'2026-08-13 12:33:58','2026-08-13 12:33:58');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `plan_subscriptions`
--

DROP TABLE IF EXISTS `plan_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `plan_subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pricing_plan_id` bigint(20) unsigned DEFAULT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_price` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL DEFAULT 'one_time',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_subscriptions_pricing_plan_id_foreign` (`pricing_plan_id`),
  CONSTRAINT `plan_subscriptions_pricing_plan_id_foreign` FOREIGN KEY (`pricing_plan_id`) REFERENCES `pricing_plans` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_subscriptions`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `plan_subscriptions` WRITE;
/*!40000 ALTER TABLE `plan_subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_subscriptions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `og_type` varchar(255) DEFAULT 'website',
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_image` varchar(255) DEFAULT NULL,
  `twitter_card` varchar(255) DEFAULT 'summary_large_image',
  `canonical_url` varchar(255) DEFAULT NULL,
  `robots` varchar(255) DEFAULT 'index, follow',
  `schema_markup` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES
(2,'The Ultimate Guide to AI-Driven Search Engine Optimization (SEO)','the-ultimate-guide-to-ai-driven-search-engine-optimization-seo','SEO','Digi Crafts AI','Modern Search Engine Optimization (SEO) & AI Integration','<h1>Mastering Search Engine Optimization in the Age of AI: A Complete Guide</h1><p>Search engines are evolving faster than ever. What worked a few years ago—keyword stuffing, simple backlink farming, and low-value content—no longer guarantees top rankings. Today, search algorithms leverage advanced artificial intelligence to understand user intent, semantic context, and overall content quality.</p><p>At <a href=\"https://digicraftsai.com/\" target=\"_blank\"><strong>DigiCrafts AI</strong></a>, we believe that combining human creative strategy with intelligent AI tools is the key to dominating search engine results pages (SERPs).</p><p>Whether you are looking to scale organic traffic, optimize existing content, or build a resilient digital presence, this guide breaks down the core pillars of modern Search Engine Optimization (SEO).</p><h2>The 4 Core Pillars of Modern SEO</h2><p>To build a sustainable digital marketing strategy, your business needs to excel across four fundamental areas of SEO:</p><h3>1. On-Page SEO: Optimizing Content &amp; User Intent</h3><p>On-page SEO focuses on elements on your site that you can directly control. Today, search engines prioritize <strong>E-E-A-T</strong> (Experience, Expertise, Authoritativeness, and Trustworthiness).</p><ul><li><p><strong>Search Intent Matching:</strong> Ensure your content answers the exact query type—whether informational, navigational, transactional, or commercial.</p></li><li><p><strong>Semantic Keyword Integration:</strong> Instead of repeating exact-match keywords, incorporate contextual synonyms and natural language entities that AI search engines recognize.</p></li><li><p><strong>Header Hierarchy:</strong> Structure articles with logical <code>H1</code>, <code>H2</code>, and <code>H3</code> tags to help crawlers and users scan content effortlessly.</p></li><li><p><strong>Meta Descriptions &amp; Title Tags:</strong> Craft compelling titles under 60 characters and meta descriptions under 155 characters that drive high click-through rates (CTR).</p></li></ul><h3>2. Technical SEO: Performance &amp; Site Architecture</h3><p>A great strategy fails if search engines can&#039;t crawl or index your web pages properly. Technical SEO ensures your website delivers a seamless underlying infrastructure.</p><ul><li><p><strong>Core Web Vitals:</strong> Optimize load times, visual stability, and interactive responsiveness to meet Google&#039;s user experience standards.</p></li><li><p><strong>Mobile-First Indexing:</strong> Ensure layout responsiveness across smartphones, tablets, and desktops.</p></li><li><p><strong>Structured Data (Schema Markup):</strong> Use schema code to help search engines understand rich snippets, FAQs, product details, and business information.</p></li><li><p><strong>XML Sitemap &amp; Robots.txt:</strong> Guide search engine bots directly to your most important pages while preventing crawl budget waste on unnecessary paths.</p></li></ul><h3>3. Off-Page SEO: Authority &amp; Brand Presence</h3><p>Off-page SEO demonstrates to search engines that your brand is a trusted authority across the broader web.</p><ul><li><p><strong>High-Quality Backlinks:</strong> Earn links from reputable, industry-relevant domains through authoritative guest publishing, data reports, and outreach.</p></li><li><p><strong>Digital PR:</strong> Build brand mentions across news media, industry publications, and digital communities.</p></li><li><p><strong>Local SEO Optimization:</strong> Maintain an updated Google Business Profile, gather real customer reviews, and ensure NAP (Name, Address, Phone) consistency.</p></li></ul><h3>4. Generative Engine Optimization (GEO): SEO for AI Search</h3><p>As AI search overviews and conversational assistants become mainstream, traditional SEO must adapt to <strong>Generative Engine Optimization (GEO)</strong>.</p><ul><li><p><strong>Direct Answer Optimization:</strong> Format concise 40-60 word summaries near the top of key sections to feed AI summaries.</p></li><li><p><strong>Data-Rich Tables &amp; Lists:</strong> Structure key comparisons, steps, and statistics clearly so AI crawlers can digest and cite your content.</p></li><li><p><strong>Unique Insights &amp; First-Party Data:</strong> Generative AI tools favor sources that provide original research, proprietary studies, or expert commentary over generic summaries.</p></li></ul><h2>Step-by-Step Action Plan to Boost Your Organic Rankings</h2><p>If you&#039;re ready to improve your website’s organic performance today, follow this step-by-step optimization workflow:</p><ol start=\"1\"><li><p><strong>Perform an SEO Audit:</strong> Use tools like Google Search Console, Ahrefs, or Semrush to identify technical errors, broken links, and underperforming pages.</p></li><li><p><strong>Conduct Intent-Driven Keyword Research:</strong> Identify low-competition, high-intent keywords that align with your core products or services.</p></li><li><p><strong>Upgrade Top-Performing Content:</strong> Refresh outdated posts with new statistics, improved headings, updated multimedia, and clearer calls to action.</p></li><li><p><strong>Optimize Visuals &amp; Assets:</strong> Compress images, add descriptive <code>alt</code> text, and use WebP file formats to boost page load speed.</p></li><li><p><strong>Monitor &amp; Refine:</strong> Track impressions, CTR, average positions, and organic conversions on a weekly basis to adjust your strategy.</p></li></ol><h2>Supercharge Your Growth with DigiCrafts AI</h2><p>Managing every layer of modern SEO requires time, deep technical knowledge, and continuous adaptation. At <strong>DigiCrafts AI</strong>, we combine cutting-edge AI tools with tailored digital strategies to help your business gain authority, outrank competitors, and drive predictable organic growth.</p><p>Ready to unlock your website&#039;s full organic potential? Visit <a href=\"https://digicraftsai.com/\" target=\"_blank\" rel=\"noopener\" class=\"ng-star-inserted\">DigiCrafts AI</a> today to learn more about our custom AI-driven marketing and SEO solutions!</p>','posts/01KZNVP23421SG22CQ98XKVFJK.jpg','posts/banners/01KZNVJR6SPB9TW7BXKYAZ8DTQ.jpg','2026-08-10 17:45:18',1,0,'Modern Search Engine Optimization (SEO) & AI Integration',' optimize existing content, or build a resilient digital presence, this guide breaks down the core pillars of modern Search Engine Optimization (SEO).','Traditional Approach,Page length & keyword density,Basic sitemaps & crawl budget,Organic rank & blue-link CTR','Digi Crafts AI','Modern SEO Strategy Guide for 2026 | Digi Crafts AI','How to Optimize Your Website for AI Search Engines','seo/01M09Q77PTG0VSHA1A05X5K8JZ.jpg','article','Custom Web Development & SEO Services | Digi Crafts AI','Avoid repetitive lists like SEO Services, Best SEO, Cheap SEO Agency.','seo/01M09Q77PWCJ96Q5V2AEE07513.jpg','summary_large_image','https://www.digicraftsai.com/blog/the-ultimate-guide-to-ai-driven-search-engine-optimization-seo','index, follow',NULL,'2026-08-10 12:50:22','2026-08-18 05:58:59'),
(3,'Custom Web Development Services | Built for Performance & Growth','custom-web-development-services-built-for-performance-growth','Web Development','Digi Crafts AI','Transform your digital presence with custom web development solutions engineered to solve complex business challenges. At DigiCrafts AI, we build high-performance, secure, and scalable websites tailored to your exact operational needs and growth objectives.','<h2>Our Custom Web Development Capabilities</h2><p>Whether you need a bespoke web application, a scalable e-commerce platform, or a complex API integration, our technical team delivers robust solutions across the modern web stack.</p><h3>1. Tailored Web Application Development</h3><p>We turn complex requirements into intuitive, high-performing web applications. From custom dashboards to internal portals, we build responsive systems designed for maximum usability and uptime.</p><h3>2. Custom E-Commerce Solutions</h3><p>Standard storefronts often limit custom checkout flows and complex inventory needs. We engineer bespoke e-commerce platforms tailored for high conversions, fast load times, and effortless payment gateway integrations.</p><h3>3. Full-Stack API Integration &amp; Backend Architecture</h3><p>Connect your digital ecosystem effortlessly. We design secure RESTful APIs, develop custom CRM/ERP integrations, and manage backend databases to keep your business operations synchronized.</p><h3>4. Technical SEO &amp; Speed Optimization</h3><p>A custom site must be visible. We integrate search engine optimization directly into the development cycle—building fast-loading, mobile-first websites structured to rank on Google search engines.</p><h2>Our Development Approach</h2><ol start=\"1\"><li><p><strong>Discovery &amp; Strategy:</strong> We analyze your business model, target audience, and functional goals to define a precise technical roadmap.</p></li><li><p><strong>Architecture &amp; Wireframing:</strong> We map out user journeys, database structures, and system UI to ensure optimal performance and user experience.</p></li><li><p><strong>Custom Development:</strong> Clean, efficient code development using modern frameworks tailored to your requirements.</p></li><li><p><strong>Quality Assurance &amp; Speed Testing:</strong> Rigorous cross-browser, security, and performance testing before any deployment.</p></li><li><p><strong>Deployment &amp; Continuous Growth:</strong> Seamless launch protocols paired with ongoing technical support and performance monitoring.</p></li></ol><h2>Ready to Elevate Your Web Presence?</h2><p>Partner with <strong>DigiCrafts AI</strong> to build a web platform designed specifically for your goals. Contact our technical team today to discuss your project requirements and get a free proposal.</p>','posts/01KZP0034E1NR96YZXAH3DPB6F.jpg','posts/banners/01KZP0034GXHX79G3QPPASP6SC.jpg','2026-08-10 19:06:30',1,0,'Custom Web Development & AI Solutions | DigiCrafts','Elevate your brand with AI-powered custom web development. DigiCrafts AI builds high-performance, tailored websites designed to drive measurable conversions.',' Web Design & Development','Digi Crafts AI','Expert Custom Web Development Services - DigiCrafts AI','Looking for tailored web development? DigiCrafts AI crafts modern, high-speed, scalable websites engineered for your exact business goals. Get a free quote!','seo/01KZP07HJQQ97TNWDD6RHDPBEV.jpg','website','ustom Web Development Services | DigiCrafts AI','Transform your digital presence with custom web development solutions by DigiCrafts AI. Fast, scalable, and built to grow your business. Contact us today!','seo/01KZP07HJS70FS8C2FXJWH6R2G.jpg','summary_large_image','https://digicraftsai.com/blog/custom-web-development-services-built-for-performance-growth','index, follow',NULL,'2026-08-10 14:07:34','2026-08-10 14:11:38'),
(4,'Data-Driven & AI-Powered Best Digital Marketing Services','data-driven-ai-powered-best-digital-marketing-services','Digital Marketing','Digi Crafts AI','Transform your online visibility into predictable revenue. At DigiCraftsAI, we merge advanced artificial intelligence with battle-tested growth marketing strategies to deliver high-converting campaigns across every digital touchpoint.','<h2>Why Modern Brands Choose DigiCraftsAI</h2><p>Traditional marketing approaches are too slow for today&#039;s market. DigiCraftsAI leverages algorithmic insights, predictive analytics, and dynamic content automation to give your business a measurable competitive edge.</p><ul><li><p><strong>Precision Audience Targeting:</strong> Eliminate ad waste by serving hyper-relevant campaigns to buyers ready to convert.</p></li><li><p><strong>AI-Enhanced Content Strategy:</strong> Scale high-ranking, engaging content across your funnel in a fraction of the time.</p></li><li><p><strong>Real-Time Campaign Optimization:</strong> Continuous dynamic adjustments to ad spend, bidding, and dynamic creative for maximum ROI.</p></li><li><p><strong>Transparent Multi-Channel Reporting:</strong> Clear dashboard tracking every lead, click, and dollar spent.</p></li></ul><h2>Core Digital Marketing Solutions</h2><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Service</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Primary Benefit</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Key Deliverables</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>AI Search Engine Optimization (SEO)</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Outrank competitors in organic search</p></td><td rowspan=\"1\" colspan=\"1\"><p>Technical audits, keyword research, on-page optimization, backlink acquisition</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Performance PPC &amp; Paid Social</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Instant traffic and high-intent conversions</p></td><td rowspan=\"1\" colspan=\"1\"><p>Google Ads, Meta Ads, LinkedIn Ads, programmatic ad management</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>AI Content Marketing</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>High-authority, conversion-focused content</p></td><td rowspan=\"1\" colspan=\"1\"><p>SEO blog strategy, landing page copy, email sequences</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Social Media Growth</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Active community engagement &amp; brand trust</p></td><td rowspan=\"1\" colspan=\"1\"><p>Content creation, automated scheduling, social listening, influencer outreach</p></td></tr></tbody></table><h2>How Our Process Works</h2><ol start=\"1\"><li><p><strong>Strategic Audit &amp; Discovery:</strong> We analyze your existing digital footprint, market positioning, and direct competitors.</p></li><li><p><strong>AI-Backed Strategy Blueprint:</strong> Custom roadmap identifying high-yield traffic and conversion opportunities.</p></li><li><p><strong>Execution &amp; Campaign Launch:</strong> Rapid deployment of multi-channel ads, optimized landing pages, and structured SEO paths.</p></li><li><p><strong>Scale &amp; Optimize:</strong> Continuous data testing and iterative upgrades to maximize customer acquisition rates.</p></li></ol><h2>Frequently Asked Questions</h2><p><strong>How does AI improve digital marketing results?</strong></p><p>AI enables rapid data analysis, automating routine tasks like bidding adjustments and audience segmentation. This lets our team focus on creative strategy while optimizing campaigns faster than traditional agencies.</p><p><strong>Which platforms does DigiCraftsAI support?</strong></p><p>We manage campaigns across Google Search &amp; Display, Meta (Facebook &amp; Instagram), LinkedIn, YouTube, TikTok, and major organic search engines.</p>','posts/01KZP0T3CJFQAJ9PE2ZAB1V2W8.jpg','posts/banners/01KZP0T3CMKWVFP9HWFMMK6Y37.jpg','2026-08-10 19:13:13',1,0,'AI-Driven Digital Marketing Services | DigiCraftsAI','Scale your brand faster with DigiCraftsAI. We blend AI technology with expert digital marketing strategies across SEO, PPC','AI-driven marketing, DigiCraftsAI marketing, performance marketing agency, automated SEO services','Digi Crafts AI','Digital Marketing Agency | Optimized SEO Content','Accelerate your revenue with AI-powered digital marketing services. From SEO & PPC to content marketing, DigiCraftsAI delivers measurable growth and ROI.','seo/01KZP0T3CNA54ED9BTG75EJCM2.jpg','website','AI & Performance Digital Marketing Services | DigiCraftsAI','Drive traffic, leads, and sales with scalable, AI-driven digital marketing solutions tailored to your growth goals.','seo/01KZP0T3CQTTZ6T1QR1EXW5RKS.jpg','summary_large_image','https://digicraftsai.com/blog/data-driven-ai-powered-best-digital-marketing-services','index, follow',NULL,'2026-08-10 14:21:46','2026-08-10 14:21:46');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `pricing_plans`
--

DROP TABLE IF EXISTS `pricing_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pricing_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `monthly_price` varchar(255) DEFAULT NULL,
  `yearly_price` varchar(255) DEFAULT NULL,
  `monthly_suffix` varchar(255) NOT NULL DEFAULT '/ Month',
  `yearly_suffix` varchar(255) NOT NULL DEFAULT '/ Year',
  `icon` varchar(255) DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `button_text` varchar(255) NOT NULL DEFAULT 'Get Started Now',
  `button_url` varchar(255) DEFAULT NULL,
  `card_style` varchar(255) NOT NULL DEFAULT 'style1',
  `is_highlighted` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pricing_plans`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `pricing_plans` WRITE;
/*!40000 ALTER TABLE `pricing_plans` DISABLE KEYS */;
INSERT INTO `pricing_plans` VALUES
(1,'Regular Plans','$ 179','$649','/ Month','/ Year',NULL,'[{\"text\":\" 1-5 Web Pages\",\"included\":true},{\"text\":\"Complete Theme Setup\",\"included\":true},{\"text\":\" Mobile-Friendly Design\",\"included\":true},{\"text\":\"Basic On-Page SEO\",\"included\":true},{\"text\":\"Contact Forms, Social Media\",\"included\":true},{\"text\":\" 1 Revision - up to\",\"included\":true},{\"text\":\"Technical & SEO Foundation\",\"included\":false},{\"text\":\" Custom Graphics\",\"included\":true},{\"text\":\"Analytics, Security & Legal\",\"included\":false},{\"text\":\" Search engine submission\",\"included\":true},{\"text\":\" FREE consultation\",\"included\":true},{\"text\":\" FREE Domain Registration\",\"included\":false},{\"text\":\" Logo design (Web Only)\",\"included\":true},{\"text\":\"Google Search Console Setup\",\"included\":false},{\"text\":\"Free Admin Pannel\",\"included\":true},{\"text\":\"Complete SEO Audit\",\"included\":false},{\"text\":\" Meta Tag Optimization\",\"included\":false},{\"text\":\"Core Web Vitals\",\"included\":false},{\"text\":\"24\\/7 Technical Support\",\"included\":false},{\"text\":\"FREE CMS Training\",\"included\":false},{\"text\":\"Web Hosting 1st Yeat\",\"included\":false},{\"text\":\"100% Advance \\/ Down Payment\",\"included\":true}]','Get Started Now','/contact','style1',0,1,1,'2026-08-09 09:31:46','2026-08-13 08:14:57'),
(2,'Standard Plans','$349','$949','/ Month','/ Year',NULL,'[{\"text\":\"1-10 Web Pages\",\"included\":true},{\"text\":\"100% Custom Responsive UI\\/UX\",\"included\":true},{\"text\":\" Mobile-Friendly Design\",\"included\":true},{\"text\":\"Complete On-Page SEO\",\"included\":true},{\"text\":\"Contact Forms, Social Media\",\"included\":true},{\"text\":\" 3 Revision - up to\",\"included\":true},{\"text\":\"Technical & SEO Foundation\",\"included\":false},{\"text\":\" Custom Graphics\",\"included\":true},{\"text\":\"Analytics, Security & Legal\",\"included\":true},{\"text\":\" Search engine submission\",\"included\":true},{\"text\":\" FREE consultation\",\"included\":true},{\"text\":\" FREE Domain Registration\",\"included\":false},{\"text\":\" Logo design (Web & Social)\",\"included\":true},{\"text\":\"Google Search Console Setup\",\"included\":true},{\"text\":\"Free Admin Pannel\",\"included\":true},{\"text\":\"Complete SEO Audit\",\"included\":false},{\"text\":\" Meta Tag Optimization\",\"included\":true},{\"text\":\"Core Web Vitals\",\"included\":false},{\"text\":\"24\\/7 Technical Support\",\"included\":false},{\"text\":\"FREE CMS Training\",\"included\":true},{\"text\":\"Web Hosting 1st Yeat\",\"included\":false},{\"text\":\"50% Advance \\/ Down Payment\",\"included\":true}]','Get Started Now','/contact','style2',1,1,2,'2026-08-09 09:31:46','2026-08-13 08:17:43'),
(3,'Premium Plans','$549','$1449','/ Month','/ Year',NULL,'[{\"text\":\"1-20 Web Pages\",\"included\":true},{\"text\":\"100% Custom Responsive UI\\/UX\",\"included\":true},{\"text\":\" Mobile-Friendly Design\",\"included\":true},{\"text\":\"Complete On-Page SEO\",\"included\":true},{\"text\":\"Contact Forms, Social Media\",\"included\":true},{\"text\":\" 5 Revision - up to\",\"included\":true},{\"text\":\"Technical & SEO Foundation\",\"included\":true},{\"text\":\" Custom Graphics\",\"included\":true},{\"text\":\"Analytics, Security & Legal\",\"included\":true},{\"text\":\" Search engine submission\",\"included\":true},{\"text\":\" FREE consultation\",\"included\":true},{\"text\":\" FREE Domain Registration\",\"included\":true},{\"text\":\" Logo design (Web & Social)\",\"included\":true},{\"text\":\"Google Search Console Setup\",\"included\":true},{\"text\":\"Free Admin Pannel\",\"included\":true},{\"text\":\"Complete SEO Audit\",\"included\":true},{\"text\":\" Meta Tag Optimization\",\"included\":true},{\"text\":\"Core Web Vitals\",\"included\":true},{\"text\":\"24\\/7 Technical Support\",\"included\":true},{\"text\":\"FREE CMS Training\",\"included\":true},{\"text\":\"Web Hosting 1st Yeat\",\"included\":true},{\"text\":\"50% Advance \\/ Down Payment\",\"included\":true}]','Get Started Now','/contact','style1',0,1,3,'2026-08-09 09:31:46','2026-08-13 08:18:26');
/*!40000 ALTER TABLE `pricing_plans` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `client` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `project_date` date DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `og_type` varchar(255) DEFAULT 'website',
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_image` varchar(255) DEFAULT NULL,
  `twitter_card` varchar(255) DEFAULT 'summary_large_image',
  `canonical_url` varchar(255) DEFAULT NULL,
  `robots` varchar(255) DEFAULT 'index, follow',
  `schema_markup` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES
(5,'E Taxi Web Design','e-taxi-web-design','E TAXI','Web Design','2026-08-01','Transform your online presence with conversion-driven, fast, and SEO-optimized web solutions. At DigiCraftsAI, we build custom websites, e-commerce platforms, and web applications engineered to look stunning, rank on search engines, and drive business growth.','<h3>Core Web Services</h3><ul><li><p><strong>Custom WordPress Development:</strong> Flexible, secure, and easy-to-manage marketing sites built for seamless content management.</p></li><li><p><strong>Shopify E-Commerce Engineering:</strong> High-converting online stores optimized for speed, mobile shopping, and effortless checkout.</p></li><li><p><strong>Custom Web Applications &amp; CRMs:</strong> Tailored web architectures and business management software aligned with your custom workflows.</p></li><li><p><strong>UI/UX &amp; Mobile-First Design:</strong> Responsive interfaces crafted for seamless navigation across desktop, tablet, and mobile devices.</p></li></ul><h3>Key Capabilities Matrix</h3><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Service Area</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Technologies &amp; Tools</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Core Benefits</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Front-End Development</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>HTML5, CSS3, JavaScript, React, Tailwind</p></td><td rowspan=\"1\" colspan=\"1\"><p>Lightning-fast page speeds, modern visual styling, and mobile responsiveness.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>CMS Architecture</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>WordPress, Shopify, Headless CMS</p></td><td rowspan=\"1\" colspan=\"1\"><p>Complete content ownership, easy scaling, and user-friendly dashboards.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Technical SEO Integration</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Schema Markup, Core Web Vitals, XML Sitemaps</p></td><td rowspan=\"1\" colspan=\"1\"><p>Built-in search engine visibility from day one.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Custom Integrations</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>REST APIs, Payment Gateways, Custom CRMs</p></td><td rowspan=\"1\" colspan=\"1\"><p>Automated lead capture, secure transactions, and backend connectivity.</p></td></tr></tbody></table>','projects/01KZNQVH7297FMHM1DR9D9EEDH.jpg','projects/banners/01KZNSG7C7KC90BAVWBB5C2TYV.jpg','[]',1,1,0,'Expert UI/UX Design Services | Custom Web & Mobile UX','Transform your digital product with user-centered UI/UX design. We create intuitive, stunning, and conversion-focused interfaces for web and mobile apps.','UI/UX Design Services','Digi Crafts AI','Custom UI/UX Design Services | Built for Growth','urn complex digital products into intuitive user experiences. Beautiful interfaces, user-centered wireframing, and seamless interactive prototyping.','seo/01KZNTGZT7PJ3JJE9PZX5H8DE8.jpg','website','Transform Your Product with High-Converting UI/UX','Craft digital products your users love. End-to-end UI/UX design, interactive prototypes, and scalable design systems engineered for higher retention.','seo/01KZNTGZT9MVS7C28V71ENE649.jpg','summary_large_image','https://digicraftsai.com/projects/e-taxi-web-design','index, follow',NULL,'2026-08-10 11:45:16','2026-08-10 12:31:56'),
(6,'Shopify Store Development','shopify-store-development','Shopii Ecommerce','Store Developemt','2023-02-11','Drive sales and scale your online business with custom, high-converting Shopify and Shopify Plus storefronts. At DigiCraftsAI, we build ultra-fast, mobile-responsive Shopify stores engineered for seamless checkout experiences, top Core Web Vitals performance, and search engine visibility.','<h1>Shopify E-Commerce Store Development Services</h1><h3>Custom Shopify Solutions</h3><ul><li><p><strong>Bespoke Theme Development &amp; Customization:</strong> Unique visual styling built on Liquid, Tailwind, or React to set your brand apart.</p></li><li><p><strong>Store Migration &amp; Data Transfer:</strong> Seamlessly transition products, customer databases, order history, and SEO redirects from WooCommerce, Magento, or custom CMS platforms.</p></li><li><p><strong>Custom App &amp; API Integrations:</strong> Connect inventory management systems, custom CRMs, payment gateways, and third-party fulfillment workflows.</p></li><li><p><strong>Conversion Rate Optimization (CRO):</strong> Optimized product pages, one-click upsells, streamlined cart flows, and custom checkout experiences.</p></li></ul><h3>Shopify Capabilities &amp; Tech Stack</h3><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Capability Area</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Features Included</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Business Impact</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Frontend Engineering</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Liquid, Online Store 2.0, Headless Commerce</p></td><td rowspan=\"1\" colspan=\"1\"><p>Fast loading speeds, dynamic sections, and flexible content management.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>E-Commerce SEO</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Product Schema, Collection Architecture, Clean URLs</p></td><td rowspan=\"1\" colspan=\"1\"><p>High rankability on search engines for commercial and product keywords.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>App Ecosystem</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Klaviyo, Recharge, <a href=\"http://Judge.me\">Judge.me</a>, Custom Apps</p></td><td rowspan=\"1\" colspan=\"1\"><p>Automated email flows, recurring subscriptions, and social proof integration.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Payment &amp; Checkout</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Shopify Payments, Stripe, Local Gateways</p></td><td rowspan=\"1\" colspan=\"1\"><p>Frictionless transaction flow supporting multi-currency and global buyers.</p></td></tr></tbody></table>','projects/01KZNR1EQ0ENW3NDJTMDKJXYMK.png','projects/banners/01KZNSV8ED9S1GKJTPG6G0BEAW.jpg','[]',1,1,2,'Expert Shopify Store Development Services | Custom E-Commerce','Transform your business with custom Shopify store development. We build fast, mobile-ready, high-converting e-commerce stores tailored to scale your sales.','Shopify Store Development Services','Digi Crafts AI','Build a High-Converting Store | Shopify Development','Turn clicks into revenue with bespoke Shopify store development. Tailored UX design, seamless integrations, and performance speed built for modern brands.','seo/01KZNT62WABBWZFVCX76DR1RHA.png','website','Custom Shopify Development, Migration & Speed Optimization','Launch or upgrade your online store with end-to-end Shopify development services. From custom themes to app integration, we build for maximum ROI.','seo/01KZNT62WB5JBB8QKF4EYH1H31.png','summary_large_image','https://digicraftsai.com/projects/shopify-store-development','index, follow',NULL,'2026-08-10 11:48:30','2026-08-10 12:25:58'),
(7,'Custom Web Development','custom-web-development','Clean Air','Developemt','2025-02-11','Scale your business with tailored, high-performance web applications and custom digital platforms. At DigiCraftsAI, we craft bespoke web applications, enterprise-grade software, and specialized business platforms built from the ground up to handle complex workflows, integrate seamlessly with your existing stack, and support rapid business growth.','<h3>What We Build</h3><ul><li><p><strong>Bespoke Web Applications:</strong> Custom dashboards, SaaS platforms, client portals, and web-based business management tools engineered for speed and security.</p></li><li><p><strong>Custom CRM Solutions:</strong> Tailored Customer Relationship Management software configured to reflect your exact operational workflows, lead scoring, and team pipelines.</p></li><li><p><strong>API Development &amp; System Integrations:</strong> Connect disparate software, automate business processes, and bridge custom web tools with enterprise software stacks.</p></li><li><p><strong>AI &amp; Automation Workflow Embedding:</strong> Integrate machine learning models, custom AI agents, and intelligent data-processing pipelines directly into your core application.</p></li></ul><h2>Tech Stack &amp; Architecture Standards</h2><p>We build using modern, scalable tech stacks designed for long-term security, maintainability, and enterprise performance.</p><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Architectural Layer</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Technologies &amp; Tools</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Key Advantages</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Frontend Frameworks</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>React, Next.js, Vue.js, Tailwind CSS</p></td><td rowspan=\"1\" colspan=\"1\"><p>Ultra-fast client-side rendering, responsive UI/UX, smooth interactive components.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Backend &amp; APIs</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Node.js, Express, Python, Laravel, REST/GraphQL</p></td><td rowspan=\"1\" colspan=\"1\"><p>Secure server logic, rapid database queries, and scalable API architecture.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Databases</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>PostgreSQL, MySQL, MongoDB, Redis</p></td><td rowspan=\"1\" colspan=\"1\"><p>High-concurrency data integrity, optimized query execution, fast caching.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Cloud &amp; DevOps</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>AWS, Cloudflare, Docker, Vercel, CI/CD Pipelines</p></td><td rowspan=\"1\" colspan=\"1\"><p>High availability, continuous deployment, automated security compliance, and DDOS protection.</p></td></tr></tbody></table>','projects/01KZNR7P5ADJYREBKD5F58E9G2.png','projects/banners/01KZNTBS0Q31300M3F6DNR22H6.jpg','[]',1,1,2,'Enterprise Custom Web Development Agency | Web & Web Apps','Scale your business with bespoke web development solutions. High performance, clean code, custom integrations, and seamless user experiences guaranteed.','Custom Web Development Services','Digi Crafts AI','Bespoke Web Development | High-Performance Web Apps','Elevate your digital presence with tailor-made web development solutions. Modern tech stacks, custom API integrations, and scalable infrastructure.','seo/01KZNTBS0SXP0NBPS9CTES0JCB.jpg','website','Custom Web Development Services | Built to Scale','Launch web applications and custom websites built specifically for your brand. High performance, robust security, and seamless user experiences.','seo/01KZNTBS0VXGXZJS85X1BT5P4N.jpg','summary_large_image','https://digicraftsai.com/projects/custom-web-development','index, follow',NULL,'2026-08-10 11:51:54','2026-08-10 12:29:05'),
(8,'SEO','seo','Etsy UAE','Search Engine Optimization','2026-01-03','Drive qualified organic traffic, improve search visibility, and capture high-intent leads with data-driven Search Engine Optimization. At DigiCraftsAI, we deliver full-funnel SEO strategies that combine technical web engineering, on-page content alignment, and authority building to ensure your business dominates organic search results.','<h2>Complete SEO Solutions</h2><ul><li><p><strong>Technical SEO &amp; Core Web Vitals:</strong> Crawl budget optimization, site architecture refinement, JavaScript rendering, and page speed tuning to meet search engine performance benchmarks.</p></li><li><p><strong>On-Page &amp; Semantic SEO:</strong> Keyword research, content structuring, internal linking architecture, and schema markup integration designed for human readers and search algorithms.</p></li><li><p><strong>E-Commerce SEO:</strong> Specialized optimization for Shopify and custom platforms, focusing on product schemas, collection structures, category taxonomies, and faceted navigation.</p></li><li><p><strong>Off-Page &amp; Authority Building:</strong> Quality link acquisition, digital PR, brand signal enhancement, and technical entity establishment across your industry niche.</p></li></ul><h2>Core Pillars &amp; Capabilities</h2><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>SEO Pillar</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Deliverables Included</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Business Impact</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Technical Audit</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Site crawl analysis, canonical tag fixes, XML sitemaps, <code>robots.txt</code> configuration, 301 redirect mapping.</p></td><td rowspan=\"1\" colspan=\"1\"><p>Ensures search engine bots can discover, crawl, and index your critical pages efficiently.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Content Strategy</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Keyword mapping, search intent matching, content briefs, heading hierarchy (<code>H1</code>-<code>H4</code>), meta tag optimization.</p></td><td rowspan=\"1\" colspan=\"1\"><p>Ranks your site for high-intent queries that turn organic visitors into buyers.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Structured Data</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>JSON-LD schema integration (Organization, Product, Service, FAQ, LocalBusiness, Breadcrumb).</p></td><td rowspan=\"1\" colspan=\"1\"><p>Earns rich snippet enhancements on Google search result pages to increase click-through rates (CTR).</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Performance Optimization</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Image compression, code minification, server response time reduction, LCP/INP/CLS metric fixes.</p></td><td rowspan=\"1\" colspan=\"1\"><p>Improves overall search rankings while lowering mobile bounce rates.</p></td></tr></tbody></table>','projects/01KZNREZV611ZN697YHFXA0GWQ.jpg','projects/banners/01KZNSNE63ZHCVG2GA9GRNV1XS.jpg','[]',1,1,4,'Enterprise SEO Agency | Technical SEO & Speed Audit','Drive targeted organic traffic and rank #1 on Google. Our proven technical, on-page, and off-page SEO strategies deliver measurable e-commerce and web ROI.','SEO Services','Digi Crafts AI','Scale Your Organic Search Traffic | Expert SEO','Dominate search engine results with data-driven SEO. Technical audits, keyword strategy, and on-page optimization designed to maximize organic revenue.','seo/01KZNTPNQ610VV32HHT188YMG2.jpg','website','Data-Driven SEO Services Built for Higher Revenue','Stop guessing with search engine rankings. Get higher Google visibility, faster site performance, and consistent organic leads with tailored SEO solutions.','seo/01KZNTPNQ8S4F9ZSTJBEJF4F8H.jpg','summary_large_image','https://digicraftsai.com/projects/seo','index, follow',NULL,'2026-08-10 11:55:53','2026-08-10 12:35:02'),
(9,'Montiva Spring – Custom WordPress Website','montiva-spring-custom-wordpress-website','Crestiva Group','WordPress  Custom Theme Development','2026-08-19','A premium custom WordPress website and Theme developed for Montiva Spring, a natural mineral water brand focused on purity, quality, sustainability, and a modern digital brand experience.','<h2></h2><p>Montiva Spring is a premium natural mineral water brand offering pure drinking water sourced from protected natural springs. The website was developed from the ground up with a custom WordPress theme to create a modern, premium, and brand-focused digital experience.</p><h3>Project Overview</h3><p>The goal of the project was to build a professional WordPress website  and custom theme that communicates Montiva Spring&#039;s natural purity, product quality, and commitment to sustainability while providing a smooth and engaging experience across desktop, tablet, and mobile devices.</p><h3>Custom WordPress Development</h3><p>A fully custom WordPress theme was developed specifically for Montiva Spring instead of relying on a pre-built theme. The website structure, layouts, components, styling, and content sections were tailored around the brand&#039;s visual identity and business requirements.</p><h3>Key Features</h3><p>Fully custom WordPress theme development</p><p>Responsive design for desktop, tablet, and mobile devices</p><p>Premium and modern visual presentation&#039;</p><p>Custom homepage and content sections</p><p>Product-focused presentation for different bottle sizes</p><p>Dedicated sustainability-focused content</p><h3>Brand Experience</h3><p>The design and development approach focuses on presenting Montiva Spring as a premium natural mineral water brand. The website combines clean layouts, high-quality visual content, clear typography, and structured content to communicate the brand&#039;s values of purity, quality, and environmental responsibility.</p><p></p>','projects/01M14WTJR7SJ1MGTKZR39V6QZR.png','projects/banners/01M14WTJRAPN9PZ5FE3TV76WT5.png','[\"projects\\/01M14WQFY5Q09NJMQDAXZS0PPA.png\"]',0,1,4,'Montiva Spring – Custom WordPress Website',NULL,NULL,NULL,NULL,NULL,NULL,'website',NULL,NULL,NULL,'summary_large_image',NULL,'index, follow',NULL,'2026-08-28 19:14:44','2026-08-28 19:17:59');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `og_type` varchar(255) DEFAULT 'website',
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_image` varchar(255) DEFAULT NULL,
  `twitter_card` varchar(255) DEFAULT 'summary_large_image',
  `canonical_url` varchar(255) DEFAULT NULL,
  `robots` varchar(255) DEFAULT 'index, follow',
  `schema_markup` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES
(1,'Custom Web Development Services','web-development','Fast, Scalable & Modern Web Solutions','Build ultra-fast, secure, and conversion-focused websites with our custom web development services. Engineered for scale, search visibility, and maximum ROI. Get a free quote!','<h1>High-Performance Custom Web Development Services</h1><h3>Scalable, Secure, and Built to Drive Business Growth</h3><p>In a digital-first world, your website is your most critical revenue driver. We design and build high-speed, fully custom web applications and websites tailored to your business operations. From high-converting corporate sites to complex web applications, our engineering ensures peak performance, seamless user experiences, and search engine readiness out of the box.</p><h2>Complete Web Development Solutions</h2><h3>Custom Web Application Engineering</h3><p>Move beyond template limitations with bespoke web software. We build scalable backend architectures and dynamic frontends tailored to your exact business workflows.</p><ul><li><p><strong>Tech Stack:</strong> React, Next.js, Vue, Node.js, Python, and PHP.</p></li><li><p><strong>Use Cases:</strong> Enterprise portals, SaaS applications, custom CRMs, and client dashboards.</p></li></ul><h3>E-Commerce Website Development</h3><p>Turn online visitors into repeat customers with high-converting online stores engineered for fast checkouts and secure transactions.</p><ul><li><p>Custom Shopify &amp; WooCommerce development.</p></li><li><p>Multi-currency support and seamless payment gateway integrations.</p></li><li><p>Real-time inventory sync and automated order management systems.</p></li></ul><h3>Content Management System (CMS) Solutions</h3><p>Take total control of your digital content with intuitive, fast, and secure CMS platforms built for easy team collaboration.</p><ul><li><p>Custom headless CMS platforms (Strapi, Sanity, Contentful).</p></li><li><p>Tailored WordPress and Webflow development with zero bloatware.</p></li><li><p>Granular access controls and built-in publishing workflows.</p></li></ul><h3>Modernization &amp; Technical Performance Tuning</h3><p>Upgrade legacy platforms to modern standards without losing your search rankings or historical data.</p><ul><li><p>Core Web Vitals optimization for sub-second page loads.</p></li><li><p>Monolith-to-serverless and API-first architectural upgrades.</p></li><li><p>Full-stack code audits and vulnerability fixes.</p></li></ul><h2>Why Modern Enterprises Build With Us</h2><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Key Feature</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Our Approach</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Business Value</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Speed &amp; Performance</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Sub-second rendering using modern frameworks</p></td><td rowspan=\"1\" colspan=\"1\"><p>Higher conversion rates &amp; improved search rankings</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Mobile-First Design</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Fully responsive UX across all screen sizes</p></td><td rowspan=\"1\" colspan=\"1\"><p>Seamless engagement for 60%+ mobile traffic</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>SEO-Ready Architecture</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Built-in structured data, clean code, and fast crawlability</p></td><td rowspan=\"1\" colspan=\"1\"><p>Faster organic indexing and higher ranking potential</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Enterprise Security</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>SSL, data encryption, automated back-ups, and DDoS protection</p></td><td rowspan=\"1\" colspan=\"1\"><p>Protects brand reputation and sensitive customer data</p></td></tr></tbody></table><h2></h2>','fa-solid fa-code','services/01KZKMFFX862PW922EQSRFJF3H.jfif','services/banners/01KZKMFFXA6N88A186N5S4GFMM.jfif','[\"Discovery\",\"Implementation\",\"Support\"]',1,1,1,'Enterprise Custom Web Application Development | Digi Crafts AI','Build fast, secure, and fully customized web applications tailored to your business goals. Discover enterprise-grade custom web development with Digi Crafts AI.','web development, laravel, websites, Custom Web Development Services, Scalable Custom Web Applications, Enterprise Web Development','Digi Crafts AI','High-Performance Custom Web Development | Digi Crafts AI','Custom platforms allow precise control over HTML structure, rendering strategies (SSR/SSG), schema markup, asset delivery, and Core Web Vitals. This ensures search engines can effortlessly crawl, index, and rank your pages.','seo/01M0CJQXGP54MHMN2BKKTPEPKR.jpg','website','Scalable Custom Web Development Solutions | Digi Crafts AI','Off-the-shelf templates limit your growth and slow down your business. At Digi Crafts AI, we architect and engineer bespoke custom web applications designed to solve your specific operational challenges and deliver seamless digital experiences.','seo/01M0CJQXGRZDKR10HK5VKNAJB3.jpg','summary_large_image','https://digicraftsai.com/services/web-development','index, follow',NULL,'2026-08-08 03:56:05','2026-08-19 08:44:18'),
(2,'Professional SEO Services','seo-services','Search Engine Optimization (SEO)','Scale revenue with data-driven Search Engine Optimization services. From technical audits to high-authority link building, Digi Crafts AI turns search into your top channel. Best SEO agency, organic growth strategy.','<h2>Data-Driven SEO Services That Drive Revenue, Not Just Traffic</h2><p>Ranking #1 doesn&#039;t matter if it doesn&#039;t move your bottom line. We engineer search engine optimization campaigns designed to capture high-intent searchers, build domain authority, and convert traffic into long-term customer revenue.</p><h3>End-to-End SEO Capabilities</h3><p>We execute comprehensive strategies that tackle every ranking factor Google prioritizes.</p><ul><li><p><strong>Technical SEO:</strong> Optimizing crawl budgets, site architecture, page speed, core web vitals, and indexation to ensure search engines crawl and value your site effortlessly.</p></li><li><p><strong>On-Page Optimization:</strong> Structuring metadata, headers, entity-based keyword placement, and internal linking models to maximize relevance for high-value search terms.</p></li><li><p><strong>Content Strategy &amp; Creation:</strong> Producing authoritative, search-optimized content tailored to intent—building domain topical authority that outranks competitors.</p></li><li><p><strong>Off-Page Authority Building:</strong> Acquiring high-authority backlinks and brand mentions through digital PR and outreach to establish domain trust.</p></li><li><p><strong>Local &amp; Enterprise SEO:</strong> Scaling search visibility for multi-location brands locally or enterprise sites managing hundreds of thousands of URLs.</p></li></ul><h3>How We Compare</h3><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Standard SEO Providers</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Digi Crafts AI Approach</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p>Focus on keyword rankings alone</p></td><td rowspan=\"1\" colspan=\"1\"><p>Focus on organic lead volume and revenue impact</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p>Low-quality automated link building</p></td><td rowspan=\"1\" colspan=\"1\"><p>High-authority, contextually relevant PR outreach</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p>One-size-fits-all execution templates</p></td><td rowspan=\"1\" colspan=\"1\"><p>Custom strategies based on competitive gap analysis</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p>Opaque monthly PDF reports</p></td><td rowspan=\"1\" colspan=\"1\"><p>Live performance dashboards with full attribution</p></td></tr></tbody></table><h3>Our SEO Execution Framework</h3><ol start=\"1\"><li><p><strong>Technical &amp; Content Audit:</strong> We perform a complete diagnostic to identify indexation blockers, keyword gaps, and quick-win opportunities.</p></li><li><p><strong>Strategy &amp; Keyword Mapping:</strong> We map high-intent keywords to specific sales funnel stages and prioritize target pages by potential ROI.</p></li><li><p><strong>On-Page &amp; Technical Remediation:</strong> Our team fixes technical debt while optimizing existing pages for search engine intent and UX.</p></li><li><p><strong>Authority &amp; Content Scaling:</strong> We execute link-building campaigns and publish fresh content to capture strategic market share.</p></li><li><p><strong>Continuous Optimization:</strong> We monitor search algorithm changes and user data to continually refine rankings and conversion rates.</p></li></ol>','fa-solid fa-cloud','services/01KZKPZ7369REGTGD77YG9YTM2.jfif','services/banners/01KZKPZ737V1WV5JW9YGZ3G5D0.jfif','[\"Discovery\",\"Implementation\",\"Support\"]',1,1,4,'Professional SEO Agency & Search Solutions | Boost Organic Traffic','Turn search traffic into revenue. We offer data-backed technical, on-page, and local SEO services designed to get your site on Page 1. Get audited today.','Organic traffic growth, technical SEO optimization, search engine optimization agency, local SEO services, link building strategy, SEO audit','Digi Crafts AI','Professional SEO Agency & Search Solutions | Boost Organic Traffic','Turn search traffic into revenue. We offer data-backed technical, on-page, and local SEO services designed to get your site on Page 1. Get audited today.','seo/01M0CKY54CSVKWZKX0K2YX7B3F.jpg','website','Professional SEO Agency & Search Solutions | Boost Organic Traffic','Turn search traffic into revenue. We offer data-backed technical, on-page, and local SEO services designed to get your site on Page 1. Get audited today.','seo/01M0CKY54D72XWDD3FBHE8QYBS.jpg','summary_large_image','https://digicraftsai.com/services/seo-services','index, follow',NULL,'2026-08-08 03:56:05','2026-08-19 08:59:19'),
(3,'Professional UI/UX Design Services','professional-ui-ux-design-services','Custom Web & Mobile Apps','Transform your digital product with user-centered UI/UX design. We craft intuitive interfaces, wireframes, and interactive prototypes that boost conversion. With our UI/UX design services','<h2><strong> User Experience (UX) &amp; User Interface (UI) Design Services</strong></h2><p><em>Intro (2-3 sentences):</em> Introduce how thoughtful design bridges user needs with business goals, improving conversion rates and user retention.</p><h3><strong>Our Comprehensive UI/UX Design Process</strong></h3><ul><li><p><strong>User Research &amp; Discovery:</strong> Empathy mapping, user personas, and competitor analysis.</p></li><li><p><strong>Information Architecture &amp; Wireframing:</strong> Low-fidelity blueprints mapping user flows.</p></li><li><p><strong>UI Design &amp; Interactive Prototyping:</strong> High-fidelity visual components and design systems.</p></li><li><p><strong>Usability Testing &amp; Iteration:</strong> Validation using real user feedback.</p></li></ul><h3><strong> UI vs. UX: Why Both Matter for Your Product</strong></h3><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Core Focus</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>User Experience (UX)</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>User Interface (UI)</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Objective</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Usability, task completion, efficiency</p></td><td rowspan=\"1\" colspan=\"1\"><p>Visual appeal, brand consistency, look &amp; feel</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Key Deliverables</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>User journeys, wireframes, site maps</p></td><td rowspan=\"1\" colspan=\"1\"><p>Color palettes, typography, interactive components</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Success Metric</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>High satisfaction, low drop-off rate</p></td><td rowspan=\"1\" colspan=\"1\"><p>High engagement, brand recognition</p></td></tr></tbody></table><p></p>','fa-solid fa-pen-ruler','services/01KZKN1NXAZ04WCMKEXFX00J8H.jfif','services/banners/01KZKN1NXBTTC3X6SJ3VVGBWHZ.jfif','[]',1,1,2,'Professional UI/UX Design Services | Digi Crafts AI','Elevate your digital product with custom UI/UX design services. We create user-centric, high-converting interfaces for web and mobile apps.','UI UX design services, user experience design, user interface design company, Figma web design, website redesign, custom UI UX, Digi Crafts AI','Digi Crafts AI','Professional UI/UX Design Services | Digi Crafts AI','Elevate your digital product with custom UI/UX design services. We create user-centric, high-converting interfaces for web and mobile apps.','seo/01M0CK1YJ23P8Q0VFSAETKP52Q.jpg','website','Professional UI/UX Design Services | Digi Crafts AI','Elevate your digital product with custom UI/UX design services. We create user-centric, high-converting interfaces for web and mobile apps.','seo/01M0CK1YJ3RVHR8K2BTCDKJ1SW.jpg','summary_large_image','https://digicraftsai.com/services/professional-ui-ux-design-services','index, follow',NULL,'2026-08-08 03:56:05','2026-08-19 08:43:55'),
(4,'Custom CRM Integration Services','custom-crm-integration-services','Custom Software Development','Streamline business operations with custom CRM integration services. We sync your CRM with ERP, e-commerce, and marketing tools for real-time data flow. CRM API integration custom CRM.','<h2><strong>Enterprise CRM Integration &amp; API Services</strong></h2><p><em>Intro:</em> Connect your CRM seamlessly with your tech stack to automate workflows, eliminate data silos, and enable real-time reporting across sales, marketing, and operations.</p><p><strong>Popular CRM Platforms We Integrate</strong></p><ul><li><p><strong>Salesforce:</strong> Custom API connections, AppExchange apps, and legacy ERP bridges.</p></li><li><p><strong>HubSpot:</strong> Marketing automation, transactional data sync, and custom UI cards.</p></li><li><p><strong>Zoho &amp; Microsoft Dynamics 365:</strong> Multi-departmental data synchronization and enterprise pipeline automation.</p></li></ul><h2><strong>Common CRM Integration Use Cases</strong></h2><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Integration Type</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Systems Connected</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Key Business Benefit</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>CRM + ERP</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Salesforce / Dynamics + SAP, Oracle, NetSuite</p></td><td rowspan=\"1\" colspan=\"1\"><p>Real-time inventory tracking, automated invoicing, customer data sync</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>CRM + Marketing</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>HubSpot + Mailchimp, Marketo, Social Ads</p></td><td rowspan=\"1\" colspan=\"1\"><p>Closed-loop attribution, automated lead scoring, behavior triggers</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>CRM + Support</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>CRM + Zendesk, Freshdesk, Intercom</p></td><td rowspan=\"1\" colspan=\"1\"><p>360-degree customer view, faster ticket resolution, history tracking</p></td></tr></tbody></table><h3><strong> Our Technical Integration Approach</strong></h3><ul><li><p><strong>Discovery &amp; Data Mapping:</strong> Blueprinting custom field mappings, API limits, and payload architectures.</p></li><li><p><strong>API Development &amp; Middleware:</strong> Custom REST/SOAP APIs or iPaaS configurations (Zapier, Workato, MuleSoft).</p></li><li><p><strong>Security &amp; Compliance:</strong> End-to-end encryption, GDPR/SOC2 compliance, and fallback error logging.</p></li><li><p><strong>Testing &amp; Deployment:</strong> Staging environment simulation followed by zero-downtime production release.</p></li></ul>','fa-solid fa-shield-halved','services/01KZKNNYWD65H97R394WKN92V6.jfif','services/banners/01KZKNNYWFMWP950Z4HXPH9XRH.jfif','[]',1,1,3,'Custom CRM Integration & API Automation Services | Digi Crafts AI','Connect your sales, marketing, and operations with custom CRM integration services by Digi Crafts AI. Tailored API connections, automated workflows.','Custom CRM integration services, CRM API integration, enterprise CRM connectivity, seamless CRM automation, business system integration.','Digi Crafts AI','Custom CRM Integration Services & ERP Solutions | Digi Crafts AI','Connect your sales, marketing, and operations with custom CRM integration services by Digi Crafts AI. Tailored API connections, automated workflows, and unified data systems.','seo/01M0CKCDW3M0WT7NNFDTQYSZ8R.jpg','website','Custom CRM Integration | Seamless Business Systems Automation','Connect your sales, marketing, and operations with custom CRM integration services by Digi Crafts AI. Tailored API connections, automated workflows, and unified data systems.','seo/01M0CKCDW58NJVNH3Q0S9WJPXN.jpg','summary_large_image','https://digicraftsai.com/services/custom-crm-integration-services','index, follow',NULL,'2026-08-08 03:56:05','2026-08-19 08:49:38'),
(5,'Digital Marketing Services','digital-marketing-services','Grow Your Business With Digi Crafts AI','Drive measurable growth with tailored digital marketing services. From SEO to paid ads, Digi Crafts AI helps brands generate leads, scale traffic, and boost ROI. full-service digital marketing, online marketing strategies.','<h2>Data-Driven Digital Marketing Services That Scale Your Business</h2><p>Stop throwing budget at disjointed tactics. We craft custom digital marketing campaigns that drive qualified traffic, convert visitors into loyal customers, and deliver measurable return on investment.</p><h3>Core Digital Marketing Solutions</h3><p>We combine creative strategy with technical precision across all major marketing channels.</p><ul><li><p><strong>Search Engine Optimization (SEO):</strong> Dominating search results through technical optimizations, strategic keyword targeting, and high-authority link acquisition.</p></li><li><p><strong>Pay-Per-Click Advertising (PPC):</strong> Capturing high-intent buyers on Google Ads and Bing with high-converting landing pages and ROI-focused bidding strategies.</p></li><li><p><strong>Social Media Marketing:</strong> Engaging target audiences across LinkedIn, Meta, TikTok, and Instagram with brand-aligned creative and targeted paid campaigns.</p></li><li><p><strong>Content Marketing:</strong> Crafting valuable blog posts, whitepapers, and guides that establish authority and nurture prospects through the sales funnel.</p></li><li><p><strong>Conversion Rate Optimization (CRO):</strong> Turning existing website traffic into buyers using data-backed A/B testing and user experience refinements.</p></li></ul><h3>Why Partner With <code>Digi Crafts AI</code>?</h3><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>What Most Agencies Do</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>How We Deliver</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p>Focus on vanity metrics (impressions, clicks)</p></td><td rowspan=\"1\" colspan=\"1\"><p>Focus on bottom-line impact (leads, revenue, ROI)</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p>Standardized cookie-cutter packages</p></td><td rowspan=\"1\" colspan=\"1\"><p>Tailored strategies built around your growth targets</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p>Opaque monthly reports</p></td><td rowspan=\"1\" colspan=\"1\"><p>Transparent live dashboards and dedicated support</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p>Siloed channel execution</p></td><td rowspan=\"1\" colspan=\"1\"><p>Integrated multi-channel campaigns working together</p></td></tr></tbody></table><h3>Our 4-Step Growth Process</h3><ol start=\"1\"><li><p><strong>Audit &amp; Discovery:</strong> We analyze your existing digital presence, competitor landscape, and target audience behavior.</p></li><li><p><strong>Strategy Development:</strong> We craft a custom roadmap aligning marketing channels with your specific revenue targets.</p></li><li><p><strong>Execution &amp; Optimization:</strong> Our specialists deploy campaigns, constantly monitoring real-time data to optimize performance.</p></li><li><p><strong>Scale &amp; Report:</strong> We double down on winning channels, expand campaign reach, and provide clear reporting on every dollar spent.</p></li></ol>','fa-solid fa-bullhorn','services/01KZKPBGT5HTJFWKHP0NG05JHS.jfif','services/banners/01KZKPBGT7023QCHRT55E9CGHX.jfif','[\"Discovery\",\"Implementation\",\"Support\"]',1,1,5,'Data-Driven Digital Marketing Agency & Growth Strategies','Drive qualified leads and boost ROI with custom digital marketing services from Digi Crafts AI. Social media, email campaigns, and paid growth built to scale.','Digital marketing agency,  Online marketing services,  Digital growth strategy,  Performance marketing agency,  Multi-channel marketing campaigns','Digi Crafts AI','Data-Driven Digital Marketing Agency & Growth Strategies','Drive qualified leads and boost ROI with custom digital marketing services from Digi Crafts AI. Social media, email campaigns, and paid growth built to scale.','seo/01M0CM5HNBMN049HTBC78DY0WB.jpg','website','Data-Driven Digital Marketing Agency & Growth Strategies','Drive qualified leads and boost ROI with custom digital marketing services from Digi Crafts AI. Social media, email campaigns, and paid growth built to scale.','seo/01M0CM5HNDNBQJBX5EVSVTRFT3.jpg','summary_large_image','https://digicraftsai.com/services/digital-marketing-services','index, follow',NULL,'2026-08-08 03:56:05','2026-08-19 09:03:21'),
(7,'Website Redesign Services','website-redesign-services','Revamp Your Digital Experience – Digi Crafts AI','Website revamp company, UI/UX redesign, responsive website redesign, website migration and redesign, corporate website makeover. Digi Crafts AI Website Redesign Services and UI/UX Modernization','<p>Your website is often the first touchpoint between your brand and potential clients. If it is slow, difficult to navigate, or looks outdated, visitors bounce within seconds. At <strong>Digi Crafts AI</strong>, our website redesign services go beyond surface-level visual updates. We analyze user behavior, fix structural bottlenecks, and rebuild your platform to drive measurable business growth.</p><h3>Key Signs It’s Time for a Redesign:</h3><ul><li><p><strong>High Bounce Rates:</strong> Visitors leave quickly due to poor layout or confusing navigation.</p></li><li><p><strong>Slow Loading Speed:</strong> Modern users expect sub-2-second load times.</p></li><li><p><strong>Poor Mobile Experience:</strong> A non-responsive design hurts both mobile conversions and search rankings.</p></li><li><p><strong>Declining Search Visibility:</strong> Outdated code and architecture restrict SEO performance.</p></li><li><p><strong>Rebranding or Business Growth:</strong> Your current site no longer reflects your expanding service offerings.</p></li></ul><h2>Our Core Redesign Capabilities</h2><p><strong>Comprehensive Website Revamp &amp; Modernization Solutions</strong></p><h3>1. UI/UX Modernization &amp; Interface Design</h3><p>We craft clean, intuitive user interfaces (UI) and frictionless user journeys (UX) tailored to guide visitors naturally toward inquiry forms, checkouts, and key call-to-actions.</p><h3>2. Mobile-First &amp; Fully Responsive Architecture</h3><p>Every redesign is engineered to deliver a seamless experience across all screen sizes—from smartphones and tablets to high-resolution desktop displays.</p><h3>3. Core Web Vitals &amp; Speed Optimization</h3><p>We clean up legacy code, optimize media assets, and implement lightweight frameworks to achieve superior Google Core Web Vitals scores.</p><h3>4. Zero-Downtime Migration &amp; SEO Preservation</h3><p>Never lose your hard-earned rankings. We implement complete 301 redirect mappings, preserve link equity, and update structured data during platform migrations (WordPress, Shopify, custom stacks).</p><h3>5. Conversion Rate Optimization (CRO)</h3><p>We structure page layouts, CTA placements, and content flow using conversion psychology principles to turn passive traffic into active inquiries.</p><h2>Our 5-Step Redesign Process</h2><p><strong> How We Rebuild Your Website for Maximum Impact</strong></p><ol start=\"1\"><li><p><strong>Discovery &amp; UX Audit:</strong> We review your current traffic, heatmaps, search performance, and competitive landscape to establish baseline metrics.</p></li><li><p><strong>Wireframing &amp; Strategic Architecture:</strong> We map out updated site architecture, user flows, and low-fidelity wireframes for seamless navigation.</p></li><li><p><strong>Interactive UI Design:</strong> We create modern, branded prototypes focusing on typography, color theory, and responsive layouts.</p></li><li><p><strong>Development &amp; SEO Integration:</strong> We build on clean, modern code, integrating on-page SEO best practices, schema markup, and speed configurations.</p></li><li><p><strong>Testing, Migration &amp; Launch:</strong> Comprehensive cross-browser testing, redirect verification, and zero-downtime deployment.</p></li></ol><h2>Why Choose Digi Crafts AI?</h2><p><strong>Built for Performance, Scalability, and Search Visibility</strong></p><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>What You Get</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Digi Crafts AI Approach</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Design Approach</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Tailored, modern brand identity designed for conversion</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>SEO Impact</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Protected rankings with full technical redirect mapping</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Performance</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Optimized assets and clean code built for Core Web Vitals</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Platform Flexibility</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Custom frameworks, WordPress, Shopify, and Webflow expertise</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Post-Launch Support</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Dedicated monitoring, maintenance, and performance audits</p></td></tr></tbody></table>','fa-solid fa-laptop-code','services/01KZQQHFFH5QWTBMX5WHF81BHY.jpg','services/banners/01KZQQHFFKH2JKJ5T5DQJACJFX.jpg','[]',1,1,6,'Website Redesign Services | Revamp Your Digital Experience',' high-converting digital assets. Digi Crafts AI offers complete website redesign services focused on UI/UX, speed, and SEO.','Website revamp company, UI/UX redesign, responsive website redesign, website migration and redesign, corporate website makeover','Digi Crafts AI','Modern Website Redesign Services | Digi Crafts AI','Turn your outdated website into a fast, high-converting growth engine with our custom UI/UX and SEO-led redesign services.','seo/01KZQQQ8TCMRXPGFB5Z28PK5SV.jpg','website','Digi Crafts AI Website Redesign Services and UI/UX Modernization','Transform outdated websites into modern, high-converting digital assets. Digi Crafts AI offers complete website redesign services focused on UI/UX, speed, and SEO.','seo/01KZQQQ8TD5W46A8E0XBXS8SXS.jpg','summary_large_image','https://www.digicraftsai.com/services/website-redesign-services','index, follow',NULL,'2026-08-11 06:18:15','2026-08-13 08:08:42'),
(8,'Graphic Designing Services','graphic-designing-services','Professional Graphic Designing Services | Digi Crafts AI','At Digi Crafts AI, our graphic design experts craft distinctive visual assets aligned with your marketing goals, ensuring your brand stands out consistently across print and digital touchpoints. Elevate your brand with custom graphic design services from Digi Crafts AI. We craft stunning logos, UI/UX assets, marketing visuals, and brand identities.','<h2><strong>Why Visual Identity Matters for Your Business</strong></h2><p>In a crowded digital landscape, first impressions define how customers perceive your value. High-quality graphic design is not just about aesthetics—it is a core communication tool that establishes brand credibility, enhances user engagement, and drives commercial results.</p><h2>Full-Spectrum Graphic Design Services We Offer</h2><h4><strong>1. Brand Identity &amp; Logo Design</strong></h4><ul><li><p>Custom logo creation (vector, responsive, and versatile formats)</p></li><li><p>Complete brand style guides (color palettes, typography, and usage rules)</p></li><li><p>Business cards, letterheads, and corporate stationery</p></li></ul><h4><strong>2. Marketing &amp; Advertising Creatives</strong></h4><ul><li><p>High-converting social media creatives (Instagram, LinkedIn, Facebook, X)</p></li><li><p>Digital ad banners (Google Display Ads, programmatic banners)</p></li><li><p>Promotional flyers, brochures, posters, and pitch decks</p></li></ul><h4><strong>3. UI/UX &amp; Web Graphics</strong></h4><ul><li><p>Custom website banners, hero graphics, and iconography</p></li><li><p>Landing page visual assets optimized for fast load times</p></li><li><p>App interface elements and design systems</p></li></ul><h4><strong>4. Packaging &amp; Print Media</strong></h4><ul><li><p>Product packaging and label design</p></li><li><p>Trade show banners, roll-ups, and merchandise design</p></li><li><p>High-resolution, print-ready files (CMYK, vector PDF, EPS)</p></li></ul><h3><strong>Why Choose Digi Crafts AI for Graphic Design?</strong></h3><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Feature</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>What You Get with Digi Crafts AI</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Custom Tailored Designs</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>100% original concepts built from scratch—no generic templates.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Multi-Format Delivery</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Fully editable source files (AI, PSD, Figma) + web-ready formats (SVG, PNG, WebP).</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Conversion-Driven Approach</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Designs crafted with visual hierarchy and user psychology to increase CTR and engagement.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Fast Turnaround &amp; Revisions</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Agile delivery workflows with dedicated revision cycles.</p></td></tr></tbody></table>','fa-solid fa-handshake','services/01KZQRPCCX773D8NFCQJGZQN10.jpg','services/banners/01KZQRPCCZCCHMPM4RH2GJ7D55.jpg','[null]',1,1,7,'Creative Graphic Design & Branding Services | Digi Crafts AI','Elevate your brand with professional graphic design services from Digi Crafts AI. We craft custom logos, brand identities, UI designs.','Graphic Design Services,Creative Graphic Design Agency, Brand Identity Design, Custom Logo Design, UI/UX & Digital Graphics Design, Marketing Collateral Design','Digi Crafts AI','Creative Graphic Design Services That Elevate Your Brand','High-impact visual identity, UI assets, and marketing graphics crafted to captivate audiences and drive business growth.','seo/01KZQSS0RMRE1RGZ11HNT70JKB.jpg','website','Professional Graphic Design Agency | Digi Crafts AI','Transform your visual presence. Digi Crafts AI delivers high-impact graphic design, branding solutions, social media creatives, and marketing collateral.','seo/01KZQSS0RPB6ZFSGX5XH8YDVPJ.jpg','summary_large_image','https://www.digicraftsai.com/services/graphic-designing-services','index, follow',NULL,'2026-08-11 06:38:24','2026-08-11 06:57:19'),
(9,'Mobile App Development Services','mobile-app-development-services','Transform Your Business with Custom Mobile App Development Services','We design and engineer secure, intuitive, and high-performance mobile applications that engage users and drive measurable business growth across iOS app development, Android application development, cross-platform app development, custom mobile app solutions, Flutter development, and React Native app agency.','<h2>Scalable, Future-Ready Mobile Applications Tailored to Your Vision</h2><ul><li><p>In a mobile-first digital economy, your app is often the primary touchpoint between your brand and your customers. At <strong>Digi Crafts AI</strong>, we specialize in end-to-end mobile application development services, combining cutting-edge architecture with sleek UI/UX design.</p><p>Whether you are a startup launching your Minimum Viable Product (MVP) or an established enterprise modernizing legacy workflows, our engineers build robust, feature-rich applications that perform smoothly under high traffic and deliver seamless user experiences.</p></li></ul><h2> Our End-to-End Mobile App Development Solutions</h2><p>Full-cycle mobile app engineering from concept to app store launch.</p><h3>1. Custom iOS App Development</h3><p>Craft bespoke applications for Apple&#039;s ecosystem (iPhone, iPad, Apple Watch). We leverage <strong>Swift</strong> and <strong>Objective-C</strong> alongside Apple&#039;s latest Human Interface Guidelines to deliver pixel-perfect, high-security apps that meet strict App Store compliance standards.</p><h3>2. Android App Development</h3><p>Reach billions of active users globally with scalable Android solutions. Built using <strong>Kotlin</strong> and <strong>Java</strong>, our Android apps are optimized for multi-device compatibility, speed, and seamless integration with Google Play services.</p><h3>3. Cross-Platform &amp; Hybrid App Development</h3><p>Maximize your budget and reduce time-to-market with a unified codebase. Using leading frameworks like <strong>Flutter</strong> and <strong>React Native</strong>, we build cross-platform apps that look, feel, and perform like native applications across both iOS and Android.</p><h3>4. Custom Enterprise Mobile Solutions</h3><p>Streamline enterprise operations, empower remote teams, and connect backend systems with secure enterprise mobile apps featuring custom CRM/ERP integrations, robust data encryption, and role-based access control.</p><h3>5. UI/UX App Design &amp; Prototyping</h3><p>User engagement begins with intuitive design. Our design team creates interactive wireframes, user flow diagrams, and visually engaging interfaces tailored to maximize user retention and conversion rates.</p><h3>6. App Maintenance, Support &amp; Optimization</h3><p>Ensure your app remains bug-free, secure, and compatible with new OS updates. We provide regular performance monitoring, feature upgrades, security patches, and app store optimization (ASO) support.</p><h2>Our Technology Stack</h2><h2>Cutting-Edge Technologies Powering Your Mobile Applications</h2><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Platform / Category</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Technologies &amp; Frameworks</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Native iOS</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Swift, Objective-C, Xcode, CocoaPods</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Native Android</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Kotlin, Java, Android Studio, Jetpack Compose</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Cross-Platform</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Flutter, React Native, Dart</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Backend &amp; APIs</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Node.js, Python, Firebase, GraphQL, RESTful APIs</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Database &amp; Cloud</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>PostgreSQL, MongoDB, AWS, Google Cloud Platform (GCP)</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Design &amp; Prototyping</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Figma, Adobe XD, InVision</p></td></tr></tbody></table><h2>Step-by-Step Development Process</h2><h2> How We Build Your Mobile App: From Idea to Launch</h2><ol start=\"1\"><li><p><strong>Discovery &amp; Strategy:</strong> We analyze your business goals, target audience, and functional requirements to map out a clear technical roadmap and project scope.</p></li><li><p><strong>UI/UX Architecture:</strong> Designing wireframes, interactive prototypes, and design systems focused on seamless navigation and brand identity.</p></li><li><p><strong>Agile Development:</strong> Writing clean, scalable code with continuous integration (CI/CD) and regular milestone updates.</p></li><li><p><strong>Quality Assurance (QA) &amp; Testing:</strong> Rigorous manual and automated testing across devices for performance, responsiveness, security vulnerabilities, and bugs.</p></li><li><p><strong>Deployment &amp; App Store Launch:</strong> Managing full App Store and Google Play Store submission, compliance checks, and approval processes.</p></li><li><p><strong>Post-Launch Support &amp; Scaling:</strong> Ongoing maintenance, feature updates, and performance monitoring as your user base expands.</p></li></ol>','fa-solid fa-pen-ruler','services/01KZQS9YGVA173G0B0BZP4WB7K.jpg','services/banners/01KZQS9YGW6SX2Y00SE55ZEQ6T.jpg','[null]',1,1,8,'Custom Mobile App Development Services | Digi Crafts AI','Build scalable, secure, and user-friendly iOS, Android, and cross-platform mobile apps with Digi Crafts AI.','iOS app development, Android application development, cross-platform app development, custom mobile app solutions, Flutter development, React Native app agency','Digi Crafts AI','Transform Your Business with Custom Mobile App Development Services','We design and engineer secure, intuitive, and high-performance mobile applications that engage users and drive measurable business growth across iOS and Android platforms.','seo/01KZQSDG6MGGGTNSAENVAP3Z7K.jpg','website','Scalable, Future-Ready Mobile Applications Tailored to Your Vision','In a mobile-first digital economy, your app is often the primary touchpoint between your brand and your customers. At Digi Crafts AI,','seo/01KZQSDG6ND01C0PG5QQAE6X6Q.jpg','summary_large_image','https://www.digicraftsai.com/services/mobile-app-development-services','index, follow',NULL,'2026-08-11 06:49:05','2026-08-11 06:51:02'),
(10,'Custom WordPress Development Services','custom-wordpress-development-services','Custom WordPress','Digi Crafts AI delivers high-performance, custom WordPress development designed to replace slow, bloatware templates with tailored code. From bespoke themes and custom plugin logic to WooCommerce builds, we build scalable digital platforms engineered for speed, security, and growth.','<h4><strong>Custom WordPress Development Services for Scalable Digital Growth</strong></h4><p><strong>[Intro Paragraph]</strong> Your website is the face of your business. Generic templates can only take you so far. At Digi Crafts AI, we specialize in <strong>custom WordPress development</strong> that blends aesthetic excellence with robust backend engineering. Whether you need a bespoke theme designed from scratch, custom plugin integration, or a complete migration to a faster, more secure WordPress architecture, our team delivers high-performance solutions engineered for results.</p><h4><strong>Why Choose Digi Crafts AI for Your WordPress Project?</strong></h4><p><em>(Use bullet points for readability)</em></p><ul><li><p><strong>Tailored Design &amp; Development:</strong> We don’t rely on &quot;cookie-cutter&quot; themes. We build custom WordPress environments that reflect your brand identity and specific business logic.</p></li><li><p><strong>Performance-First Approach:</strong> Our developers optimize every site for Core Web Vitals, ensuring lightning-fast loading speeds and seamless mobile responsiveness.</p></li><li><p><strong>Scalability &amp; Security:</strong> We implement clean, secure code and scalable database structures to grow alongside your business.</p></li><li><p><strong>Advanced Integrations:</strong> From CRM and ERP connectivity to complex payment gateway implementations, we bridge the gap between your website and your internal operations.</p></li></ul><h4><strong>Our WordPress Development Expertise</strong></h4><ul><li><p><strong>Custom Theme Development:</strong> Unique, lightweight, and accessible themes built to your exact specifications.</p></li><li><p><strong>Plugin Development &amp; Customization:</strong> Need a unique feature? We code custom WordPress plugins or modify existing ones to integrate perfectly with your workflows.</p></li><li><p><strong>E-commerce Solutions:</strong> High-converting, feature-rich WooCommerce stores optimized for user experience and seamless checkout processes.</p></li><li><p><strong>WordPress Maintenance &amp; Optimization:</strong> Proactive security patches, speed optimization, and regular backups to keep your platform running smoothly.</p></li></ul><h4><strong>The Digi Crafts AI Development Process</strong></h4><ol start=\"1\"><li><p><strong>Discovery &amp; Strategy:</strong> We analyze your business requirements, user journey, and technical constraints to map out a development roadmap.</p></li><li><p><strong>UI/UX Design:</strong> Our designers create intuitive layouts that prioritize user engagement and conversion.</p></li><li><p><strong>Bespoke Development:</strong> Our expert developers (like Raheel Sehzad and our integration specialists) bring the designs to life with clean, performant code.</p></li><li><p><strong>Quality Assurance &amp; Testing:</strong> Rigorous cross-browser, device, and performance testing before deployment.</p></li><li><p><strong>Launch &amp; Ongoing Support:</strong> We ensure a smooth go-live and provide the maintenance needed for long-term success.</p></li></ol><h4><strong>Ready to Build Your Bespoke WordPress Website?</strong></h4><p>Don’t settle for limitations. Partner with the experts at Digi Crafts AI to build a WordPress site that drives traffic, engages users, and converts visitors into loyal customers.</p><p><strong>Get a Free Consultation / Start Your Project</strong></p>',NULL,'services/01M07V784KP7Z7J94A72VEYHCV.jpg','services/banners/01M07V784NZHB3GKJ2TRZFF0H4.jpg','[null]',1,1,9,'Custom WordPress Development Services | Digi Crafts AI','Tailored, high-performance WordPress web development. From bespoke themes to custom plugins and system integrations with Digi Crafts AI.','Custom WordPress Development Services,Bespoke WordPress themes, custom plugins, WooCommerce integration, Core Web Vitals optimization',NULL,'Custom WordPress Web Development Agency  | Digi Crafts AI','Transform your digital footprint with custom WordPress development by Digi Crafts AI. We build fast, secure, bespoke WordPress themes and plugins engineered for high search rankings and conversions.',NULL,'website','Build Scalable, Fast Websites with Custom WordPress','Custom WordPress Plugin Development, WordPress Core Web Vitals Optimization, Custom WooCommerce Development, WordPress API & CRM Integration,\n\nEnterprise WordPress Development',NULL,'summary_large_image','https://www.digicraftsai.com/services/custom-wordpress-development-services','index, follow',NULL,'2026-08-17 12:30:25','2026-08-17 14:25:17'),
(11,'End-to-End Branding and Design Identity Services','end-to-end-branding-and-design-identity-services','Brand Launch','Digi Crafts AI provides complete, end-to-end branding and visual identity solutions designed to bridge the gap between product manufacturing and final consumer sales.','<h1>End-to-End Branding &amp; Design Identity Services: From Factory Floor to Checkout</h1><p>A strong product isn&#039;t enough; your brand identity needs to command attention at every single touchpoint. <strong>Digi Crafts AI</strong> delivers complete, end-to-end branding and design solutions tailored for physical and digital products. We bridge the critical gap between product manufacturing, market positioning, and final consumer sales through unified visual design and strategic positioning.</p><p><strong>Full-Lifecycle Branding Architecture</strong></p><p>We build brand assets designed to scale with your production line and perform in high-intent sales environments.</p><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Phase</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Core Deliverables</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Strategic Impact</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>1. Manufacturing &amp; Product Stage</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Physical Product Design System, Structural Packaging, Dieline Artwork, Label Compliance, Unboxing Layouts</p></td><td rowspan=\"1\" colspan=\"1\"><p>Ensures cost-efficient printing, premium shelf appeal, and unified physical branding straight from the factory.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>2. Brand Identity Foundation</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Logo Suites, Color System, Typography Hierarchy, Voice &amp; Tone Guidelines, Brand Playbooks</p></td><td rowspan=\"1\" colspan=\"1\"><p>Establishes a distinct market presence and keeps all collateral aligned across digital and physical touchpoints.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>3. Go-to-Market &amp; Sales Assets</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>E-Commerce UI/UX Design, B2B Pitch Decks, Print/Digital Catalogs, Social Media Kits, Point-of-Sale (POS) Displays</p></td><td rowspan=\"1\" colspan=\"1\"><p>Translates brand value directly into sales leads, optimized online checkouts, and retailer partnerships.</p></td></tr></tbody></table><p><strong>Our 4-Step End-to-End Branding Process</strong></p><ul><li><p><strong>1. Discovery &amp; Manufacturing Audit:</strong> We evaluate your product specs, target demographics, production constraints, and sales channels to align design with business unit realities.</p></li><li><p><strong>2. Visual Identity &amp; Asset Creation:</strong> Our design team crafts your visual ecosystem—including core logos, iconography, material selection guidelines, and packaging dielines.</p></li><li><p><strong>3. Retail &amp; Digital Optimization:</strong> We adapt your brand identity for e-commerce storefronts, Shopify setups, Amazon A+ content, and B2B distributor decks.</p></li><li><p><strong>4. Brand Governance &amp; Hand-off:</strong> Receive production-ready print files, vector assets, digital UI design kits, and a master brand guidelines document.</p></li></ul><p><strong>Why Choose Digi Crafts AI for Your Product Branding?</strong></p><ul><li><p><strong>Seamless Execution:</strong> Eliminates disconnects between production specs, web design, and marketing collateral.</p></li><li><p><strong>Sales-Driven Aesthetics:</strong> Layouts and packaging engineered specifically to drive conversion rates on shelf and on screen.</p></li><li><p><strong>Scalable Systems:</strong> Flexible identity frameworks ready for product line expansion and multi-channel distribution.</p></li></ul>','fa-solid fa-cloud','services/01M0CGFRB7JB5AADG26V1ACVAT.jpg','services/banners/01M0CGFRB9G0A7VHFAKA0RFWNN.jpg','[\"Brand Launch Services\"]',1,1,10,'End-to-End Branding & Design Identity Services | Digi Crafts AI','Transform your product journey from manufacturing to sales. Digi Crafts AI delivers cohesive brand strategy, visual identity, packaging & sales collateral.',NULL,NULL,NULL,NULL,NULL,'website',NULL,NULL,NULL,'summary_large_image','https://digicraftsai.com/services/end-to-end-branding-and-design-identity-services','index, follow',NULL,'2026-08-19 07:59:02','2026-08-19 08:08:05'),
(12,'Google Ads PPC Services','google-ads-ppc','Google Pay-Per-Click Campaigns','Drive high-intent traffic and maximize ROAS with performance-driven Google Ads (PPC) management by Digi Crafts AI. Get targeted search, display, and shopping campaigns.','<h1>Data-Driven Google Ads (PPC) Management Services</h1><p>Stop wasting your marketing budget on irrelevant clicks. <strong>Digi Crafts AI</strong> delivers targeted, ROI-focused Google Ads campaigns engineered to capture ready-to-buy search traffic and convert high-intent prospects into measurable revenue. By pairing advanced AI keyword bidding with custom high-converting landing pages, we ensure every ad dollar spent drives bottom-line growth.</p><p><strong>Full-Funnel Google Ads Solutions</strong></p><p>We build and optimize multi-channel Google Pay-Per-Click campaigns tailored to your specific business model and revenue targets.</p><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Campaign Type</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Key Features</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Primary Objective</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Google Search Ads</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>High-intent keyword targeting, negative keyword management, dynamic ad copy creation</p></td><td rowspan=\"1\" colspan=\"1\"><p>Capture active buyers searching for your exact products or services.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Google Shopping (PMax)</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Performance Max optimization, product feed structure, automated bidding strategy</p></td><td rowspan=\"1\" colspan=\"1\"><p>Scale direct-to-consumer e-commerce sales with visual product placements.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Google Display &amp; Remarketing</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Audience segmentation, visual ad creatives, cross-device behavioral tracking</p></td><td rowspan=\"1\" colspan=\"1\"><p>Re-engage lost website visitors and maintain brand top-of-mind recall.</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>YouTube Video Ads</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>In-stream video placements, audience intent mapping, conversion action tracking</p></td><td rowspan=\"1\" colspan=\"1\"><p>Increase brand consideration and drive action through video storytelling.</p></td></tr></tbody></table><p><strong>Our 4-Step Google Ads Optimization Process</strong></p><ul><li><p><strong>1. PPC Audit &amp; Intent Research:</strong> We analyze your industry landscape, audit existing accounts, and isolate high-converting, profitable keyword targets while eliminating money-draining search terms.</p></li><li><p><strong>2. Campaign Architecture &amp; Creative Creation:</strong> Our specialists build tightly themed ad groups, craft persuasive ad copy, and set up negative keyword lists to maximize Quality Score.</p></li><li><p><strong>3. Landing Page &amp; Conversion Setup:</strong> We align ad copy directly with landing page messaging and configure end-to-end conversion tracking to measure every lead and sale accurately.</p></li><li><p><strong>4. Continuous Bid &amp; ROAS Optimization:</strong> We actively adjust keyword bids, device targeting, and placement strategies in real time to lower your Cost Per Acquisition (CPA) and boost Return On Ad Spend (ROAS).</p></li></ul><p><strong>Why Partner with Digi Crafts AI for Google Ads?</strong></p><ul><li><p><strong>Focus on Bottom-Line Revenue:</strong> We track qualified leads, sales, and ROAS—not just impressions and clicks.</p></li><li><p><strong>Integrated UX &amp; Landing Pages:</strong> We align campaign creatives directly with custom web development and landing page UX for higher conversion rates.</p></li><li><p><strong>Transparent Campaign Reporting:</strong> Full access to campaign data, clear ROAS breakdowns, and zero hidden markup costs.</p></li></ul>','fa-solid fa-laptop-code','services/01M0CHAVB83BJ4CSJTWGZVYP54.jpg','services/banners/01M0CHAVB96ABBEQ7BMY50KR05.jpg','[null]',1,1,11,'Google Ads (PPC) Management Services | Digi Crafts AI','Drive high-intent traffic and maximize ROAS with performance-driven Google Ads (PPC) management. Get targeted search, display, and shopping campaigns.','Google Ads management agency, pay per click services, Google PPC setup, ROAS optimization services, Google Shopping Ads agency','Digi Crafts AI','Data-Driven Google Ads (PPC) Management | Digi Crafts AI','Maximize your ROAS and capture ready-to-buy search traffic with targeted Google Ads campaigns engineered for high conversion.','seo/01M0CHDSQSPTKVQ8KRWHJ63VGV.jpg','website','Data-Driven Google Ads (PPC) Management | Digi Crafts AI','Maximize your ROAS and capture ready-to-buy search traffic with targeted Google Ads campaigns engineered for high conversion.','seo/01M0CHDSQVEHKDVW8GZ5KP7FTJ.jpg','summary_large_image','https://digicraftsai.com/services/google-ads-ppc','index, follow',NULL,'2026-08-19 08:13:49','2026-08-19 08:44:37'),
(13,'Meta Ads Management','meta-ads-management','Meta Advertising Agency','Scale your business with data-driven Meta Ads management by Digi Crafts AI. We craft high-converting Facebook & Instagram ad campaigns that drive leads and max ROI.','<h1>Data-Driven Meta Ads Management That Scales Your Revenue</h1><p>Stop wasting ad spend on vanity metrics. At <strong>Digi Crafts AI</strong>, we build high-converting Meta advertising campaigns across Facebook and Instagram that drive tangible business growth, lower Customer Acquisition Costs (CAC), and maximize your Return on Ad Spend (ROAS).</p><p>Whether you need e-commerce sales, high-intent B2B leads, or local customer acquisition, our full-funnel Meta Ads strategy turns passive scrolling into active conversions.</p><h2>Why Choose Digi Crafts AI for Meta Ads?</h2><ul><li><p><strong>Full-Funnel Targeting:</strong> We structure campaigns for every stage of the buyer journey—Top of Funnel (Brand Awareness), Middle of Funnel (Engagement &amp; Consideration), and Bottom of Funnel (Direct Conversions &amp; Retargeting).</p></li><li><p><strong>AI-Powered Audience Precision:</strong> Leveraging custom lookalike audiences, detailed demographic segmentation, and advanced behavioral triggers to put your brand in front of high-intent buyers.</p></li><li><p><strong>Creative Testing Engine:</strong> Continuous A/B split testing across visual formats—including video Reels, carousel formats, single-image ads, and direct response copy—to discover winning assets fast.</p></li><li><p><strong>Advanced Tracking &amp; Attribution:</strong> Setup and configuration of the <strong>Meta Pixel</strong> alongside <strong>Conversions API (CAPI)</strong> to ensure 100% data accuracy despite browser privacy restrictions and iOS tracking updates.</p></li></ul><h2>Our Core Meta Ads Services</h2><h3>1. E-Commerce &amp; Catalog Sales Ads</h3><p>Drive direct sales for your Shopify or custom e-commerce platform. We integrate dynamic product catalogs, implement high-converting retargeting loops, and optimize for highest lifetime value (LTV).</p><h3>2. B2B &amp; Service Lead Generation</h3><p>Capture qualified leads directly within Facebook and Instagram using high-converting native Lead Forms and dedicated high-speed landing pages optimized for maximum conversion.</p><h3>3. Dynamic Retargeting Campaigns</h3><p>Never lose a hot lead. We re-engage visitors who abandoned their cart, viewed specific products, or interacted with your brand content to bring them back across the finish line.</p><h3>4. Creative Strategy &amp; Direct-Response Copywriting</h3><p>Our team designs visual creatives, produces short-form video ads for Reels/Stories, and writes persuasive direct-response ad copy tailored specifically to your target buyer persona.</p><h2>Our 4-Step Meta Ads Growth Process</h2><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Stage</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Action Items</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Deliverable</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>1. Audit &amp; Strategy</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>In-depth audit of past account history, audience profiles, and tracking tags.</p></td><td rowspan=\"1\" colspan=\"1\"><p>Strategic Media Plan &amp; Budget Allocation</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>2. Technical Setup</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Pixel installation, Conversions API (CAPI) implementation, Domain Verification.</p></td><td rowspan=\"1\" colspan=\"1\"><p>Fully Tracking-Ready Business Manager</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>3. Creative Launch</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>High-converting ad copy creation, creative design, and multi-variant A/B testing.</p></td><td rowspan=\"1\" colspan=\"1\"><p>Live Multi-Format Campaigns</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>4. Scale &amp; Optimize</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Daily bid adjustments, audience scaling, budget reallocation to top performers.</p></td><td rowspan=\"1\" colspan=\"1\"><p>Weekly Performance &amp; ROAS Reports</p></td></tr></tbody></table><h2>Frequently Asked Questions</h2><p><strong>Q: How quickly can I expect results from Meta Ads?</strong></p><p><em>A:</em> Direct response lead generation and e-commerce campaigns can begin generating traffic and conversions within 24 to 48 hours of going live. However, the initial 14 days are crucial for campaign learning and data optimization.</p><p><strong>Q: How do you handle tracking challenges like iOS updates?</strong></p><p><em>A:</em> We implement server-side tracking via Meta&#039;s Conversions API (CAPI) alongside the standard Meta Pixel to bypass browser limitations and capture accurate conversion data.</p><p><strong>Q: What ad spend budget do I need to start?</strong></p><p><em>A:</em> We tailor campaigns to your specific growth targets. During our initial consultation, we recommend an optimal ad spend budget based on your industry, average order value (AOV), and customer acquisition goals.</p><p><strong>Ready to Scale Your Paid Social ROI?</strong></p><p>Become Partner with Digi Crafts AI Today | Call: +92 334 0 555 111 | Email: <a href=\"mailto:Info@digicraftsai.com\">Info@digicraftsai.com</a></p>','fa-solid fa-cloud','services/01M0CJCREA9JK5JP5PXBS7RV1S.jpg','services/banners/01M0CJ4NGEWRDK8ARKRPSVA80R.jpg','[\"Meta Ads\"]',1,1,12,'Meta Ads Management Services | Scale Revenue with Facebook & Instagram','Scale your business with data-driven Meta Ads management by Digi Crafts AI. We craft high-converting Facebook & Instagram ad campaigns.','Facebook Ads Agency, Instagram Ad Management, Paid Social Media Marketing, Meta Retargeting Campaigns, ROI-Driven Meta Ads','Digi Crafts AI','Meta Ads Management Services | Scale Facebook & Instagram ROAS','Transform your ad spend into predictable revenue. Digi Crafts AI crafts high-converting Facebook and Instagram ad campaigns backed by AI targeting, CAPI tracking, and direct-response creative. Request your strategic audit today!','seo/01M0CJB90HBK3FX61PDSFNY4N0.jpg','website','Meta Ads Management: Drive Higher ROAS on Facebook & Instagram','Stop burning ad budget. Digi Crafts AI builds high-converting Meta campaigns with AI audience targeting, server-side tracking, and high-impact creatives. Scale your revenue today!','seo/01M0CJB90JJFNDGDJP67DFF5N3.jpg','summary_large_image','https://digicraftsai.com/services/meta-ads-management','index, follow',NULL,'2026-08-19 08:27:55','2026-08-19 08:44:47');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES
('31FvkTHqXa3t9SDz0M3thgAyXtwNKTDzbisoEcWf',NULL,'114.119.135.159','Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (HTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)','eyJfdG9rZW4iOiJXaUd3Q3N1UFF6OXZvVE5mTTQxZ3l4VkRSaWxZS0lmRkVvcmo0QzBoIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuZGlnaWNyYWZ0c2FpLmNvbVwvcXVvdGVcL3Nlby1zZXJ2aWNlcyIsInJvdXRlIjoicXVvdGUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1790190529),
('BitaLUdBFpodDMpNtMoQ9xmykqrsOUeoEO1vbrYe',NULL,'149.40.163.186','curl/8.7.1','eyJfdG9rZW4iOiJoOGZWY1BNM0hIUTVFNjZQTEZ6bFdoZmJ6eFpCSXRBOHIyWU9VMjVxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9kaWdpY3JhZnRzYWkuY29tIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790200109),
('Ezz1w1hhMaGfi8br3XFmfTj2kPNuDC7XsshbFJIU',NULL,'104.23.221.195','http://digicraftsai.com/wp-admin/install.php?step=1','eyJfdG9rZW4iOiJYRkF4TUlZdjVvOTNOUVdUdnNtb2hjM1hvRjUxTE5CVFhQR3I2WGw5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9kaWdpY3JhZnRzYWkuY29tXC93cC1hZG1pblwvaW5zdGFsbC5waHA/c3RlcD0xIiwicm91dGUiOiJwYWdlcy5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790196151),
('krbDkE1ALcwdZdDNtLHX5dNvJZ37Bw3CgeK6dyiM',NULL,'216.73.217.30','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)','eyJfdG9rZW4iOiJ2Y01ZTmR5dFNLeTFES0NuSE1sQ2xyaFUwSmZ2eHlYVzVia0g2NGVKIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuZGlnaWNyYWZ0c2FpLmNvbVwvc2l0ZW1hcC54bWwiLCJyb3V0ZSI6InBhZ2VzLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1790195995),
('omeeZtHGeDMtwjUioRMW7R8PzrwcBTKqjK9sfizW',NULL,'104.23.221.195','http://digicraftsai.com/wp-admin/install.php?step=1','eyJfdG9rZW4iOiIyYkE5RDBKc0djNkE3Q1lyazFqMUhQbVQ0RUZtVXZObGtOaDU4NGNvIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9kaWdpY3JhZnRzYWkuY29tXC93cC1hZG1pblwvaW5zdGFsbC5waHA/c3RlcD0xIiwicm91dGUiOiJwYWdlcy5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790188912),
('ssQXJeUhFiguafuXbPb03RFvc9q91ypB2SZsF46m',NULL,'38.225.78.133','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.6533.73 Safari/537.36','eyJfdG9rZW4iOiIyZWtrVDBTTktvUk50SExMMmNNeEIxYmYwTGZobFRKVTE4UlVnTG5NIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9kaWdpY3JhZnRzYWkuY29tXC9xdW90ZSIsInJvdXRlIjoicXVvdGUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1790196434),
('vDK3ubGPxbIpIJ6OZrCa5TLZB7U1jIQqpVGAzNja',NULL,'216.73.217.30','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)','eyJfdG9rZW4iOiJuTnJLc3ZYUUhkbUtJVnYxOFpSYzg2am55ODAzSFBITFBlNmVpTjBRIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuZGlnaWNyYWZ0c2FpLmNvbVwvc2l0ZW1hcC54bWwiLCJyb3V0ZSI6InBhZ2VzLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1790188844),
('yYoz90thSpgvMX2lhIC6ie8su164kkId3rIkE0H4',NULL,'149.40.163.186','curl/8.7.1','eyJfdG9rZW4iOiJDVTdoQW9WeDhSVFQ3bDNnb1RQSjJ6ZDhPMjJjakgydEE5bXpmenp3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9kaWdpY3JhZnRzYWkuY29tIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790200110);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) NOT NULL DEFAULT 'Extech',
  `tagline` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo_white` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `default_banner` varchar(255) DEFAULT NULL,
  `preloader_text` varchar(255) NOT NULL DEFAULT 'EXTECH',
  `preloader_gif` varchar(255) DEFAULT NULL,
  `preloader_loading_text` varchar(255) DEFAULT 'Loading',
  `home_template` varchar(255) NOT NULL DEFAULT 'home-1',
  `color_theme` varchar(255) NOT NULL DEFAULT '#384BFF',
  `color_theme2` varchar(255) NOT NULL DEFAULT '#18185E',
  `color_theme3` varchar(255) NOT NULL DEFAULT '#F98600',
  `color_header` varchar(255) NOT NULL DEFAULT '#0F0D1D',
  `color_text` varchar(255) NOT NULL DEFAULT '#585858',
  `color_title` varchar(255) NOT NULL DEFAULT '#0F0D1D',
  `color_bg` varchar(255) NOT NULL DEFAULT '#F3F7FB',
  `color_body` varchar(255) NOT NULL DEFAULT '#ffffff',
  `color_border` varchar(255) NOT NULL DEFAULT '#E3E3E3',
  `font_title` varchar(255) NOT NULL DEFAULT 'Rajdhani',
  `font_body` varchar(255) NOT NULL DEFAULT 'Plus Jakarta Sans',
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `working_hours` varchar(255) DEFAULT NULL,
  `map_embed_url` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `header_cta_text` varchar(255) NOT NULL DEFAULT 'Get A Quote',
  `header_cta_url` varchar(255) DEFAULT NULL,
  `offcanvas_text` text DEFAULT NULL,
  `footer_about` text DEFAULT NULL,
  `footer_copyright` varchar(255) DEFAULT NULL,
  `locations_heading` varchar(255) DEFAULT NULL,
  `locations_watermark` varchar(255) DEFAULT NULL,
  `home_1_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`home_1_content`)),
  `home_2_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`home_2_content`)),
  `home_3_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`home_3_content`)),
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `og_type` varchar(255) DEFAULT 'website',
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_image` varchar(255) DEFAULT NULL,
  `twitter_card` varchar(255) DEFAULT 'summary_large_image',
  `canonical_url` varchar(255) DEFAULT NULL,
  `robots` varchar(255) DEFAULT 'index, follow',
  `schema_markup` longtext DEFAULT NULL,
  `custom_head_code` longtext DEFAULT NULL,
  `custom_body_code` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES
(1,'DIGI CRAFTS AI','AI Digital Agency & Web Development Services','brand/01KZK12PTS3B7KA80DTCRV0SMX.png','brand/01KZQV17588B6RQS8JJ3972RT1.png','brand/01KZNFAYPXEVNVVRR6MNYHQW53.png',NULL,'DIGI CRAFTS AI',NULL,'Loading','home-3','#384BFF','#18185E','#F98600','#0F0D1D','#585858','#0F0D1D','#F3F7FB','#ffffff','#E3E3E3','Rajdhani','Plus Jakarta Sans','Info@digicraftsai.com','+92 334 0 555 111','2526# S Usman E Ghani Avenue Bahawalpur','Mod-friday, 09am -05pm','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3475.7877113072295!2d71.72273001128751!3d29.405765675148263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393b9067f26af9d9%3A0x3c85e2701f24990d!2sUsman%20e%20Ghani%20Rd%2C%20Bahawalpur%2C%20Pakistan!5e0!3m2!1sen!2sbd!4v1787130940957!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"strict-origin-when-cross-origin\">','https://www.facebook.com/DigiCraftsAI','https://twitter.com','https://www.instagram.com/digicraftsai/','https://linkedin.com','https://youtube.com','Get A Quote','/contact','Scale your business with AI-driven web design, custom software development, targeted SEO, and performance digital marketing from DigiCraftsAI. Get a free audit today!','DigiCraftsAI (digicraftsai.com) — AI-driven IT services, web development, SEO, digital marketing, and custom software CRM Development.','© 2026 Digi Crafts AI. All Rights Reserved.','Locations','SALES OFFICES','{\"hero_subtitle\":\"Everything You Need to Create a Website\",\"hero_title\":\"Business Innovation With IT Services expertise\",\"hero_cta_text\":\"get Started\",\"hero_cta_url\":\"\\/quote\",\"hero_image\":\"home\\/heroThumb1_1.png\",\"hero_checklist\":[\"Deployment and Support\",\"Discovery and Analysis\",\"Flexibility and Adaptability\",\"Competitive Advantage\"],\"about_subtitle\":\"about company\",\"about_title\":\"Navigating Tech Horizons Together\",\"about_text\":\"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you\",\"about_cta_text\":null,\"about_cta_url\":\"\\/contact\",\"services_subtitle\":\"Our Services\",\"services_title\":\"Elevating Businesses with IT Ingenuity\",\"services_text\":null,\"pricing_subtitle\":\"Our Pricing\",\"pricing_title\":\"Our Awesome Pricing Plans\",\"cta_title\":\"24\\/7 Expert Hosting Support Our Customers Love\",\"cta_text\":null,\"cta_button_text\":\"Talk to a Specialist\",\"cta_button_url\":\"\\/contact\",\"section_extra_title\":null,\"section_extra_text\":null}','{\"hero_subtitle\":\"Modern IT Partner\",\"hero_title\":\"Smart IT Solutions For Your Growing Business\",\"hero_cta_text\":\"Get A Quote\",\"hero_cta_url\":null,\"hero_image\":null,\"hero_checklist\":[],\"about_subtitle\":null,\"about_title\":null,\"about_text\":\"Scale faster with cloud, software and managed IT services.\",\"about_cta_text\":null,\"about_cta_url\":null,\"services_subtitle\":null,\"services_title\":\"What We Offer\",\"services_text\":null,\"pricing_subtitle\":null,\"pricing_title\":null,\"cta_title\":null,\"cta_text\":null,\"cta_button_text\":null,\"cta_button_url\":null,\"section_extra_title\":null,\"section_extra_text\":null}','{\"hero_slides\":[{\"image\":\"home\\/slides\\/01KZJW957ME562B8R6KRMB028W.webp\",\"subtitle\":\"Digi Crafts AI\",\"title\":\"Web Development, SEO & Brand Launch Agency\",\"text\":\"Scale your business with Digi Crafts AI. We deliver custom web design, technical SEO, graphic branding, social media marketing, and complete brand launches.\",\"btn1_text\":\"Explore More\",\"btn1_url\":\"\\/about\",\"btn2_text\":\"Contact Us\",\"btn2_url\":\"\\/contact\"},{\"image\":\"home\\/slides\\/01KZJW957NXFDA1SXCBYNGCPS2.webp\",\"subtitle\":\"Digi Crafts AI\",\"title\":\"Search Engine Optimization (SEO) & AI-Driven Digital Growth\",\"text\":\"Advanced on-page, off-page, and technical SEO strategies designed to secure top rankings and organic growth. High-converting ad creatives, brand assets, and UI\\/UX design tailored to your target audience.\",\"btn1_text\":\"Explore More\",\"btn1_url\":\"\\/about\",\"btn2_text\":\"Contact Us\",\"btn2_url\":\"\\/contact\"},{\"image\":\"home\\/slides\\/01KZJW957NXFDA1SXCBYNGCPS3.webp\",\"subtitle\":\"Digi Crafts AI\",\"title\":\"Digital Marketing Services & ROI Growth Agency\",\"text\":\"Performance marketing agency, ROI-driven SMM campaigns, multi-channel growth strategy, digital marketing company Drive measurable revenue with Digi Crafts AI. Our data-driven digital marketing, SMM, CRO, and multi-channel ad strategies help scale your brand faster.\",\"btn1_text\":\"Explore More\",\"btn1_url\":\"\\/about\",\"btn2_text\":\"Contact Us\",\"btn2_url\":\"\\/contact\"}],\"about_subtitle\":\"ABOUT Digi Crafts AI\",\"about_title\":\"Scale Your Business with Digi Crafts AI\",\"about_text\":\"Digi Crafts AI - Core IT Solution & Technology. From custom web application development to end-to-end marketing funnels, we build high-performing digital infrastructure tailored to your business goals.\",\"about_image\":\"home\\/01KZX02H7XDA8WQCKN08T78DA5.jpg\",\"about_video_url\":\"https:\\/\\/www.youtube.com\\/\",\"about_clients_count\":\"6,561\",\"about_clients_label\":\"Satisfied Clients\",\"about_phone\":\"+92334 0555 111\",\"about_cta_text\":\"Explore More\",\"about_cta_url\":\"\\/about\",\"about_checklist\":[\"Branding and design Identity\",\"Web Design & Development\",\"Social Media Marketing Solutions\",\"Search Engine Optimization\",\"Technical SEO | Core Web Vitals\",\"CRM Software Development\",\"Google Ads (PPC)\",\"Meta Ads\",\"Shopify Store Development\",\"Custom WordPress Development\"],\"brand_text\":\"Partner Ship\",\"services_subtitle\":\"Our Core Capabilities\",\"services_title\":\"Ready to Accelerate Your Digital Transformation?\",\"services_cta_text\":\"See all Services\",\"cta_title\":\"Stay Connected With Digi Crafts AI\",\"cta_phone\":\"+92334 0555 111\",\"services_bg_image\":\"home\\/services\\/01KZX0Z79M9TZS18FE16GEGABP.jpg\",\"pricing_subtitle\":\"Basic\",\"pricing_title\":\"Web Design & Development\",\"process_subtitle\":\"How Digi Crafts AI Work\",\"process_title\":\"Standard Work Process at Digi Crafts AI\",\"process_steps\":[{\"title\":\"Choose A Service\",\"text\":\"To choose the right service, define your specific goal,  Look for proven experience in your specific industry.\",\"icon\":null},{\"title\":\"Define Requirements\",\"text\":\"A requirement is something you need, want, or must do. Write down your exact technical or personal requirements.\",\"icon\":null},{\"title\":\"Request A Meeting\",\"text\":\"In the meeting, we will discuss the project requirements & discuss about quotations.\",\"icon\":null},{\"title\":\"Final Solution\",\"text\":\"After this procedure, to meet the project requirements, budget, and timeline, you have to pay a 50% down payment.\",\"icon\":null}],\"achievement_subtitle\":\"achievement\",\"achievement_title\":\"We Are Increasing Business Success\",\"achievements\":[{\"number\":\"6,561\",\"label\":\"Satisfied Clients\",\"icon\":null},{\"number\":\"600\",\"label\":\"Finished Projects\",\"icon\":null},{\"number\":\"250\",\"label\":\"Skilled Experts\",\"icon\":null},{\"number\":\"590\",\"label\":\"Media Posts\",\"icon\":null}],\"projects_subtitle\":\"PROJECTS\",\"projects_title\":\"Our Latest Incredible\\nClient\'s Projects\",\"projects_video_url\":\"https:\\/\\/www.youtube.com\\/\",\"projects_bg_image\":\"home\\/projects\\/01KZX2S61A673QNX1BEGN9TE5H.jpg\",\"team_subtitle\":\"Team Members\",\"team_title\":\"Our Dedicated Team Members\",\"team_bg_image\":null,\"testimonial_subtitle\":\"Testimonials\",\"testimonial_title\":\"People Who Already Love Us\",\"blog_subtitle\":\"Latest Blog\",\"blog_title\":\"Checkout Our Latest News & Articles\",\"marque_items\":\"CUstom Web Development,Digital Marketeing,Search Engine Optimization,Brand Launcing, AI Automation, CRM Integrations,Core IT Solution & Technology,Shopify,Wordpress\"}','Digi Crafts AI | Web Development, Custom CRM & SEO Agency','Scale your business with Digi Crafts AI. Expert web development, custom CRM integrations, data-driven SEO, and complete digital marketing solutions.','Custom Web Development Services, IT Solution,Custom CRM Development, Technical SEO Agency, Digital Marketing Solutions','Digi Crafts AI','Digi Crafts AI - Core IT Solution & Technology','Business innovation with IT services expertise.','seo/01KZX3GMYH4WHXW24FK0CYBX8Q.png','website','Digital Engineering Services | AI-Powered IT Solutions & Product Development','Business innovation with IT services expertise.','seo/01KZX3GMYJ1S7PYZDNR6ZRBYH1.png','summary_large_image','https://www.digicraftsai.com/','index, follow',NULL,NULL,NULL,'2026-08-08 03:56:05','2026-08-21 06:30:28');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`skills`)),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `og_type` varchar(255) DEFAULT 'website',
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_image` varchar(255) DEFAULT NULL,
  `twitter_card` varchar(255) DEFAULT 'summary_large_image',
  `canonical_url` varchar(255) DEFAULT NULL,
  `robots` varchar(255) DEFAULT 'index, follow',
  `schema_markup` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_members_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_members`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `team_members` WRITE;
/*!40000 ALTER TABLE `team_members` DISABLE KEYS */;
INSERT INTO `team_members` VALUES
(5,'Asif Jamal Abbasi','asif-jamal-abbasi','CEO, Founder','Software Engineer','<h2><strong>CEO &amp; Founder, DigiCraftsAI | Senior SEO &amp; E-Commerce Strategist</strong></h2><p><strong>About Me</strong> Driven by results and backed by over 12 years of hands-on industry experience, I specialise in scaling online businesses through search engine dominance and custom e-commerce architecture. As the CEO and Founder of <a href=\"http://digicraftsai.com\">digicraftsai.com</a>, I combine cutting-edge AI implementation with proven technical strategies to turn digital platforms into high-converting revenue channels.</p><p><strong>Core Expertise</strong></p><ul><li><p><strong>Full-Stack SEO:</strong> Comprehensive On-Page optimization, strategic Off-Page link building, and deep Technical SEO audits to maximize search visibility and organic growth.</p></li><li><p><strong>E-Commerce Development &amp; Growth:</strong> Tailored store setup, speed optimization, and end-to-end management for Shopify and WordPress (WooCommerce).</p></li><li><p><strong>Conversion Rate Optimization (CRO):</strong> Data-backed user experience improvements designed to turn site traffic into repeat buyers.</p></li><li><p><strong>AI-Powered Digital Strategies:</strong> Leveraging modern AI tools to streamline content, technical analysis, and workflow efficiency.</p></li></ul><p><strong>Why Work With Me</strong></p><ul><li><p><strong>12+ Years of Proven Results:</strong> Long-term track record of helping businesses climb search rankings and boost revenue.</p></li><li><p><strong>Dual Focus (Tech + Marketing):</strong> Rare blend of technical development expertise and high-level marketing strategy.</p></li><li><p><strong>Founder Mindset:</strong> I treat every project with the strategic ownership and efficiency of a business owner.</p></li></ul><h2>Engineering the Future of Digital Transformation</h2><p><strong>Visionary Leadership. Scalable Technology. Measurable Impact.</strong></p><p>At Digi Crafts AI, leadership is built on a clear mandate: bridging advanced technology, robust software engineering, and data-backed digital growth. As CEO and Founder, I spearhead a team dedicated to helping modern enterprises automate workflows, scale their web footprint, and dominate competitive search landscapes.</p><p><strong>Leadership &amp; Strategic Focus</strong></p><p>Digi Crafts AI was established to deliver end-to-end digital solutions that move beyond vanity metrics and drive real business outcomes.</p><ul><li><p><strong>Custom Software &amp; CRM Architecture:</strong> Designing resilient, tailored software systems and CRM workflows that streamline complex operations.</p></li><li><p><strong>High-Performance Web Development:</strong> Building fast, conversion-optimized web applications tailored for user experience and technical efficiency.</p></li><li><p><strong>AI &amp; Technical SEO Growth:</strong> Executing high-intent organic search strategies, enterprise technical SEO, and intelligent digital marketing funnels.</p></li><li><p><strong>Digital Transformation Advisory:</strong> Guiding startups and established brands through modernization, cloud integration, and automated scalability.</p></li></ul><p><strong>Founder’s Message</strong></p><blockquote><p>&quot;Technology delivers value only when it solves real business friction. At Digi Crafts AI, we don&#039;t just build websites or launch campaigns—we engineer custom digital infrastructure designed to compound growth and outpace the market.&quot;</p></blockquote><h3><strong>Why Partner With Digi Crafts AI</strong></h3><ul><li><p><strong>Engineering-First Approach:</strong> Clean code, secure architectures, and future-ready frameworks.</p></li><li><p><strong>Transparent ROI:</strong> Every SEO campaign, software build, and marketing funnel is tracked against concrete business metrics.</p></li><li><p><strong>Dedicated Partnership:</strong> Direct strategic alignment from initial planning to deployment and post-launch scaling.</p></li></ul><p><strong>Get In Touch:</strong> Ready to scale your organic reach or upgrade your e-commerce platform?</p><ul><li><p><strong>Website:</strong> <a href=\"http://digicraftsai.com\">digicraftsai.com</a></p></li><li><p><strong>Role:</strong> CEO &amp; Founder</p></li></ul>','team/01KZNGV2666JBSHD4XP825VCN0.jpg','team/banners/01KZT98FAK0QS20YX6S7R5M2YD.jpg','get2abbasi@gmail.com','+923014980301','https://facebook.com','https://twitter.com','https://linkedin.com','https://www.instagram.com/?hl=en','[{\"name\":\"E Commerce Development & Growth\",\"percent\":99},{\"name\":\"Full Stack SEO\",\"percent\":95},{\"name\":\"Web Design & Development\",\"percent\":85},{\"name\":\"Shopify\",\"percent\":90},{\"name\":\"Wordpress\",\"percent\":80},{\"name\":\"Digital Marketeing\",\"percent\":95},{\"name\":\"Google Ads (PPC)\",\"percent\":99},{\"name\":\"Meta Ads\",\"percent\":99}]',1,1,1,'CEO & Founder Profile | Leadership at Digi Crafts AI','Meet the CEO and Founder of Digi Crafts AI. Driving scalable digital transformation, custom software engineering.','Digi Crafts AI founder, CEO Digi Crafts AI, technology leadership, digital transformation expert, custom software solutions.','Digi Crafts AI','CEO & Founder Profile | Leadership at Digi Crafts AI','Meet the CEO and Founder of Digi Crafts AI. Driving scalable digital transformation, custom software engineering, modern web development, and ROI-focused SEO solutions.','seo/01KZQYDAR0KWFDQAF4H4WTS2ZA.jpg','Profile','CEO & Founder Profile | Leadership at Digi Crafts AI','Meet the CEO and Founder of Digi Crafts AI. Driving scalable digital transformation, custom software engineering, modern web development, and ROI-focused SEO solutions.','seo/01KZQYDAR13BY25Z4WW6SZG447.jpg','summary_large_image','https://www.digicraftsai.com/team/asif-jamal-abbasi','index, follow',NULL,'2026-08-10 09:42:40','2026-08-18 06:30:34'),
(6,'Raheel Shehzad','raheel-shehzad','Lead Web Developer','Masters In Computer Science','<h2><strong>Senior Backend Engineer &amp; Enterprise Integration Specialist</strong></h2><p>Specializing in robust server-side architecture and seamless systems integration, I build scalable, high-performance web applications that drive core business operations. From high-volume e-commerce platforms to complex ERP/CRM pipelines and secure payment processing, my focus is on delivering secure, reliable, and maintainable software tailored for growth.</p><h3>Core Areas of Expertise</h3><ul><li><p><strong>Backend Development</strong></p><ul><li><p>Architecting scalable, modular server-side logic using modern backend frameworks and database systems (SQL and NoSQL).</p></li><li><p>Optimizing database queries, caching strategies, and server performance for high concurrency, low latency, and zero downtime.</p></li></ul></li><li><p><strong>CRM &amp; ERP Integration</strong></p><ul><li><p>Connecting enterprise platforms (Salesforce, HubSpot, SAP, NetSuite, Zoho) to automate cross-functional data flows.</p></li><li><p>Synchronizing inventory, customer records, and order fulfillment in real-time while eliminating manual data entry bottlenecks.</p></li></ul></li><li><p><strong>API Design &amp; Integration</strong></p><ul><li><p>Building and consuming RESTful and GraphQL APIs with clean documentation (OpenAPI/Swagger), robust authentication (OAuth2, JWT), and strict rate-limiting.</p></li><li><p>Creating resilient webhook pipelines and middleware to bridge disjointed third-party software into cohesive ecosystems.</p></li></ul></li><li><p><strong>Payment Gateway Integration</strong></p><ul><li><p>Implementing secure, PCI-DSS-compliant transaction workflows with gateways like Stripe, PayPal, Square, and regional providers.</p></li><li><p>Handling multi-currency checkouts, subscription billing, automated invoicing, webhooks for chargebacks/refunds, and fraud prevention protocols.</p></li></ul></li><li><p><strong>E-Commerce Development</strong></p><ul><li><p>Developing custom e-commerce engines and tailoring platforms (Shopify, WooCommerce, Magento) for frictionless user journeys.</p></li><li><p>Designing custom product catalogs, dynamic pricing rules, stock tracking, and automated fulfillment workflows built to handle traffic spikes.</p></li></ul></li></ul>','team/01KZNH80GZR7SA3YJX1FEFYMMT.png','team/banners/01KZT9KD82ZAPYB6473SWPRGQE.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'[{\"name\":\"Backend Development\",\"percent\":100},{\"name\":\"CRM - ERP Integration\",\"percent\":99},{\"name\":\"API Integration\",\"percent\":100},{\"name\":\"Payment Gateway Integration\",\"percent\":95},{\"name\":\"E Commerce Development\",\"percent\":99}]',1,1,2,'Backend & Systems Integration Specialist | DigiCrafts AI','Meet Raheel Shehzad, Backend & Integration Specialist at DigiCrafts AI. Expert in backend architecture, CRM/ERP pipelines, secure payments.','DigiCrafts AI, backend development, CRM integration, ERP integration, API integration, payment gateway integration, e-commerce development, systems integration engineer, enterprise backend developer','Digi Crafts AI','Backend Developer & Integration Lead at DigiCrafts AI','Explore [Name]’s work at DigiCrafts AI: architecting scalable backends, multi-platform API & ERP integrations, payment gateways, and enterprise e-commerce.','seo/01KZTA682RPRZ21517PMQZWGHH.png','Profile','Backend & Integration Specialist at DigiCrafts AI','Specializing in scalable backends, CRM/ERP integrations, secure payment gateways, and custom e-commerce solutions at DigiCrafts AI.','seo/01KZTA682W4FVXT40KQR0RZTWJ.png','summary_large_image','https://digicraftsai.com/team/raheel-shehzad','index, follow',NULL,'2026-08-10 09:49:44','2026-08-13 10:10:54'),
(7,'Muhammad Usman','muhammad-usman','Digital Marketer','Computer Engineer','<h2><strong>Senior Digital Marketing Strategist &amp; Performance Growth Lead</strong></h2><p>Driving sustainable revenue through data-backed multichannel campaigns, high-converting acquisition funnels, and full-funnel search visibility. With a focus on measurable ROI and scalable audience growth, I combine technical search optimization, precision paid media, and conversion rate optimization to turn digital channels into predictable revenue drivers.</p><h3>Core Areas of Expertise</h3><ul><li><p><strong>Search Engine Optimization (SEO)</strong></p><ul><li><p>Technical SEO audits, site architecture optimization, crawl budget management, and schema implementation.</p></li><li><p>Comprehensive keyword strategy, search intent mapping, and high-impact on-page optimization.</p></li><li><p>Authority building, white-hat link acquisition, and localized/international search optimization.</p></li></ul></li><li><p><strong>Performance Paid Advertising (PPC &amp; Paid Social)</strong></p><ul><li><p>Multi-platform campaign management across Google Ads (Search, Display, Shopping, Performance Max), Meta Ads, LinkedIn Ads, and TikTok.</p></li><li><p>Data-driven audience targeting, lookalike modeling, dynamic retargeting, and budget pacing for maximum ROAS.</p></li><li><p>Rapid A/B testing protocols for ad creative, copy angles, bidding models, and landing page variants.</p></li></ul></li><li><p><strong>Conversion Rate Optimization (CRO) &amp; Funnel Building</strong></p><ul><li><p>Heatmap analysis, user session recordings, and friction-point diagnostics to improve checkout and lead capture rates.</p></li><li><p>Multi-step lead funnel design, high-converting landing page optimization, and micro-copy refinements.</p></li></ul></li><li><p><strong>Content Marketing &amp; Brand Strategy</strong></p><ul><li><p>Thought-leadership editorial planning, bottom-of-funnel (BOFU) asset development, and multi-format content distribution.</p></li><li><p>Brand positioning frameworks and messaging playbooks aligned with target buyer personas.</p></li></ul></li><li><p><strong>Marketing Automation &amp; Lifecycle Marketing</strong></p><ul><li><p>Automated email/SMS sequence setup (HubSpot, Klaviyo, ActiveCampaign) for onboarding, lead nurture, and cart recovery.</p></li><li><p>Customer lifetime value (LTV) enhancement through dynamic segmentation, churn reduction, and retention workflows.</p></li></ul></li><li><p><strong>Web Analytics, Tracking &amp; Attribution</strong></p><ul><li><p>GA4 event tracking, Google Tag Manager (GTM) configuration, and server-side tracking setups.</p></li><li><p>ROI modeling, cross-channel attribution reporting, and custom automated dashboards (Looker Studio).</p></li></ul></li></ul>','team/01KZXBCC0T3XBRW69BDN386ETD.jpg','team/banners/01KZTA7KEMYQDPVC8C6M1AVBGZ.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'[{\"name\":\"Content Marketing & Brand Strategy\",\"percent\":100},{\"name\":\"(CRO) & Funnel Building\",\"percent\":95},{\"name\":\"SMO & SMM\",\"percent\":99},{\"name\":\"Performance Paid Advertising\",\"percent\":100}]',1,1,3,'Muhammad Usman – Senior Digital Marketing Strategist | DigiCrafts AI','Meet Muhammad Usman, Senior Digital Marketing Strategist at DigiCrafts AI. Specializing in high-ROI SEO, performance PPC, conversion funnels.','Scaling brands at DigiCrafts AI through technical SEO, performance paid media, CRO funnels, and data-backed lifecycle marketing.','Digi Crafts AI','Muhammad Usman – Growth Marketing Strategist | DigiCrafts AI Team','Explore Muhammad Usman\'s portfolio at DigiCrafts AI: delivering measurable growth through targeted paid social, enterprise SEO, and lifecycle marketing.','seo/01KZTBB71ATB1TJ71YSJCZB93S.png','Profile','Senior Digital Marketing Lead at DigiCrafts AI','Driving predictable revenue with full-funnel digital strategy: advanced SEO, Google & Meta Ads, conversion rate optimization, and end-to-end analytics.',NULL,'summary_large_image','https://digicraftsai.com/team/muhammad-usman','index, follow',NULL,'2026-08-10 09:58:35','2026-08-13 10:41:11'),
(8,'Engineer Usman Ali','engineer-usman-ali','Project Manager','Masters In Computer Science','<h2>Senior IT Project Manager &amp; Technical Delivery Lead</h2><h3>Core Areas of Expertise</h3><ul><li><p><strong>Agile &amp; Hybrid Project Management</strong></p><ul><li><p>Leading cross-functional teams using Scrum, Kanban, and hybrid methodologies.</p></li><li><p>Facilitating sprint planning, daily stand-ups, backlog grooming, and sprint retrospectives to maintain continuous delivery velocity.</p></li></ul></li><li><p><strong>Full-Lifecycle Software Delivery (SDLC)</strong></p><ul><li><p>Managing end-to-end delivery from scope discovery and technical roadmapping to deployment and post-launch maintenance.</p></li><li><p>Translating complex business requirements into clear technical user stories, acceptance criteria, and actionable development epics.</p></li></ul></li><li><p><strong>Scope, Timeline &amp; Budget Governance</strong></p><ul><li><p>Defining Work Breakdown Structures (WBS), project milestones, and resource allocation models to prevent scope creep.</p></li><li><p>Tracking budget burn rates, project velocity, and key performance milestones using data-driven forecasting.</p></li></ul></li><li><p><strong>Risk Management &amp; Quality Assurance (QA)</strong></p><ul><li><p>Identifying technical dependencies, operational roadblocks, and delivery bottlenecks before they impact project timelines.</p></li><li><p>Partnering with QA and DevOps leads to maintain strict standards for code quality, security compliance, and testing coverage.</p></li></ul></li><li><p><strong>Stakeholder Management &amp; Cross-Team Leadership</strong></p><ul><li><p>Serving as the primary conduit between executive stakeholders, non-technical clients, designers, and engineering teams.</p></li><li><p>Delivering transparent status reporting, KPI dashboards, and proactive change-management communication.</p></li></ul></li></ul>','team/01KZNHTQF2J01D7Y1PM06E9G6J.jpg','team/banners/01KZTAZAP856WR9GJVX4BJBYMG.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'[{\"name\":\"Risk Management & Quality Assurance\",\"percent\":100},{\"name\":\"Agile Delivery\",\"percent\":100},{\"name\":\"Scope Control\",\"percent\":100},{\"name\":\"Stakeholder Alignment\",\"percent\":100}]',1,1,4,'Usman Ali - Senior IT Project Manager | DigiCrafts AI','Meet Usman Ali, Senior IT Project Manager at DigiCrafts AI. Expert in Agile software delivery, technical roadmapping, cross-functional leadership.','DigiCrafts AI, IT project manager, technical project manager, agile delivery lead, scrum master, software delivery manager, SDLC project management','Digi Crafts AI',NULL,NULL,NULL,'Profile',NULL,NULL,NULL,'summary_large_image','https://digicraftsai.com/team/engineer-usman-ali','index, follow',NULL,'2026-08-10 09:59:58','2026-08-13 13:21:55'),
(9,'Muhammad Arslan','muhammad-arslan','Lead Manager',NULL,'<h2>Lead Manager Role, Responsibilities &amp; Pipeline Strategy Guide</h2><p><strong>Soft &amp; Interpersonal Skills</strong></p><ul><li><p>3+ years of experience in sales development, lead generation, or revenue operations.</p></li><li><p>Advanced proficiency in CRM platforms (Salesforce, HubSpot) and sales engagement tools (Outreach, Salesloft, Apollo).</p></li><li><p>Strong analytical ability to translate raw funnel metrics into actionable outreach strategies.</p></li></ul>','team/01KZNJ3SEBKEX86GA0BRK5VPTF.jpg','team/banners/01KZTBTFVA2JWSA7E0Z629C1AY.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'[{\"name\":\"CRM Administration\",\"percent\":85},{\"name\":\"SMO & SMM\",\"percent\":90},{\"name\":\"Data Hygiene & Analytics\",\"percent\":95},{\"name\":\"Backlinks\",\"percent\":85},{\"name\":\"Sales Engagement\",\"percent\":99}]',1,1,5,'Lead Manager Role, Responsibilities & Pipeline Strategy Guide','Discover the key responsibilities, core KPIs, and essential tools of a high-performing Lead Manager. Learn how to optimize lead routing.','lead manager, lead management, sales pipeline, MQL to SQL, lead routing, CRM lead scoring, sales operations','Digi Crafts AI','What Does a Lead Manager Do? Responsibilities, KPIs & Skills','Bridge the gap between sales and marketing. Explore the full breakdown of modern lead management strategies and metrics.','seo/01KZTBTFVEHTB1GDPNXBGRPJD3.jpg','Profile','Lead Manager Blueprint: Drive Pipeline Velocity & Revenue','Master lead qualification, automated CRM routing, and MQL-to-SQL conversions to scale your inbound and outbound sales pipeline.','seo/01KZTBTFVEHTB1GDPNXBGRPJD4.jpg','summary_large_image','https://digicraftsai.com/team/muhammad-arslan','index, follow',NULL,'2026-08-10 10:04:55','2026-08-13 09:18:01'),
(10,'Engineer Khurram Mumtaz','engineer-khurram-mumtaz','UI/UX Designer','Computer System Engineer','<h1>UI/UX Designer: Engineering High-Converting, User-Centric Digital Products</h1><p>At Digi Crafts AI, our UI/UX design philosophy merges deep behavioral research with clean, modern aesthetics to build interfaces that retain users and drive conversion velocity. We turn complex user journeys into intuitive, elegant digital products across SaaS platforms, e-commerce stores, and enterprise web solutions.</p><p><strong>Core Responsibilities</strong></p><ul><li><p><strong>User Research &amp; Mapping:</strong> Conduct usability studies, build user personas, and map frictionless end-to-end user journeys.</p></li><li><p><strong>Wireframing &amp; Prototyping:</strong> Build low-to-high fidelity interactive prototypes in Figma to validate product concepts before development.</p></li><li><p><strong>Design System Development:</strong> Architect scalable, reusable component libraries and design tokens to streamline engineering handoffs.</p></li><li><p><strong>Conversion-Driven UX:</strong> Optimize landing page layouts, checkout funnels, and navigation hierarchies to maximize user engagement and retention.</p></li><li><p><strong>Cross-Functional Collaboration:</strong> Work directly with technical SEO leads, frontend developers, and product strategists to ensure seamless implementation and optimal page performance.</p></li></ul><table><tbody><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Focus Area</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Deliverables</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p><strong>Key Impact Metrics</strong></p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Research &amp; Strategy</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>User journeys, wireframes, competitive audits</p></td><td rowspan=\"1\" colspan=\"1\"><p>Task completion rate, usability score</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Visual Design (UI)</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Hi-fi mockups, typography &amp; token systems</p></td><td rowspan=\"1\" colspan=\"1\"><p>Brand consistency, session duration</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Interaction &amp; Motion</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>Micro-interactions, interactive prototypes</p></td><td rowspan=\"1\" colspan=\"1\"><p>User engagement rate, time on page</p></td></tr><tr><td rowspan=\"1\" colspan=\"1\"><p><strong>Conversion (CRO)</strong></p></td><td rowspan=\"1\" colspan=\"1\"><p>A/B test layouts, optimized checkout flows</p></td><td rowspan=\"1\" colspan=\"1\"><p>Cart completion rate, conversion rate (CVR)</p></td></tr></tbody></table><p><strong>Key Skills &amp; Tooling</strong></p><ul><li><p><strong>Design Tools:</strong> Figma, Adobe XD, Sketch, Photoshop, Illustrator</p></li><li><p><strong>Prototyping &amp; Motion:</strong> ProtoPie, Framer, Principle, Lottie</p></li><li><p><strong>Handoff &amp; Specifications:</strong> Zeplin, Figma Dev Mode, Storybook alignment</p></li><li><p><strong>Foundational Web Knowledge:</strong> Clean HTML/CSS constraints, responsive web design principles, accessibility standards (WCAG 2.1 AA)</p></li></ul>','team/01KZNJDVXNCZHC2WAXEZHVCWE8.jpg','team/banners/01KZTC0K7220S9DK60HKCSGVYV.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'[{\"name\":\"UI\\/UX Design\",\"percent\":100},{\"name\":\"Web Development\",\"percent\":60},{\"name\":\"Custom WordPress\",\"percent\":90}]',1,1,6,NULL,NULL,NULL,'Digi Crafts AI',NULL,NULL,NULL,'website',NULL,NULL,NULL,'summary_large_image',NULL,'index, follow',NULL,'2026-08-10 10:10:25','2026-08-25 14:48:28'),
(11,'Hira Riaz','hira-riaz','SEO Analyst','SEO Analyst','<p>SEO Analyst</p>','team/01KZXAWDD6A1MKESD4N26CGNK8.jpg','team/banners/01KZXBCYZYMTZXHWS5Z3YM2G7M.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'[{\"name\":\"Full Stack SEO & Data Analyst\",\"percent\":90},{\"name\":\"Content Writing\",\"percent\":100},{\"name\":\"Graphics Design\",\"percent\":95},{\"name\":\"Shopify\",\"percent\":90}]',1,1,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'website',NULL,NULL,NULL,'summary_large_image',NULL,'index, follow',NULL,'2026-08-13 09:37:38','2026-08-13 17:47:44');
/*!40000 ALTER TABLE `team_members` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Admin','admin@extech.test',NULL,'$2y$12$.QlJx5ksnTfKiecT2pjfJ.BsBXQ0DwVLzt7BHtJ5Pjh3MW6XXFxZu',NULL,'2026-08-08 03:47:01','2026-08-08 03:56:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Dumping routines for database 'u662960912_digicraftai'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-09-23 21:49:49
