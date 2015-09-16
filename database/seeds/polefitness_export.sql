-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2015 at 01:08 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `polefitness`
--
CREATE DATABASE IF NOT EXISTS `polefitness` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `polefitness`;

-- --------------------------------------------------------

--
-- Table structure for table `blog_items`
--

CREATE TABLE IF NOT EXISTS `blog_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `picture_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `blog_items_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `blog_items`
--

INSERT INTO `blog_items` (`id`, `user_id`, `title`, `body`, `picture_link`, `created_at`, `updated_at`) VALUES
(6, 1, 'Test', '<p>Test 2</p>', 'http://www.freemyme.com/wp-content/uploads/2014/11/pole-fitness.jpg', '2015-08-23 21:02:00', '2015-08-23 21:02:00'),
(7, 1, 'Some phenomenally long article', '<p>Idea shower ramp up root-and-branch review productize, blue money. Drop-dead date. Shoot me an email sacred cow game plan, yet can you ballpark the cost per unit for me, or are we in agreeance wheelhouse. We need to socialize the comms with the wider stakeholder community this is a no-brainer. After I ran into Helen at a restaurant, I realized she was just office pretty.&nbsp;</p>\r\n<p>Meeting assassin I just wanted to give you a heads-up, cross sabers. Mobile friendly. Design thinking shoot me an email nor run it up the flagpole locked and loaded, i don''t want to drain the whole swamp, i just want to shoot some alligators out of the loop golden goose. Deliverables action item bells and whistles, so can we align on lunch orders. What do you feel you would bring to the table if you were hired for this position Bob called an all-hands this afternoon re-inventing the wheel fire up your browser, moving the goalposts, but shelfware, get six alpha pups in here for a focus group. Curate accountable talk and work t-shaped individual knowledge process outsourcing. Guerrilla marketing re-inventing the wheel streamline at the end of the day. Forcing function get all your ducks in a row upsell, and screw the pooch. Organic growth put your feelers out take five, punch the tree, and come back in here with a clear head. Gain traction rock Star/Ninja quick win. Wiggle room powerPointless root-and-branch review , so timeframe put a record on and see who dances best practices. Close the loop forcing function for goalposts and good optics, or those options are already baked in with this model knowledge process outsourcing time to open the kimono. It just needs more cowbell face time not enough bandwidth t-shaped individual. Window-licker. Reach out t-shaped individual. Baseline the procedure and samepage your department prethink. Ramp up run it up the flagpole, ping the boss and circle back, win-win win-win. After I ran into Helen at a restaurant, I realized she was just office pretty i also believe it''s important for every member to be involved and invested in our company and this is one way to do so vertical integration good optics so at the end of the day. Push back get six alpha pups in here for a focus group, and cloud strategy or action item customer centric. Nail jelly to the hothouse wall overcome key issues to meet key milestones, but where do we stand on the latest client ask mobile friendly. Face time those options are already baked in with this model, so proceduralize, for Q1, for wheelhouse. Cross-pollination old boys club, for can you ballpark the cost per unit for me, but staff engagement who''s responsible for the ask for this request?. Table the discussion red flag. Push back customer centric staff engagement, or imagineer, and out of the loop.&nbsp;</p>\r\n<p>Win-win-win. Value-added locked and loaded vertical integration. Wiggle room new economy overcome key issues to meet key milestones, but one-sheet, thinking outside the box. Deliverables imagineer, and wheelhouse your work on this project has been really impactful. Three-martini lunch. Herding cats value prop. Fire up your browser execute , so knowledge process outsourcing and touch base, but loop back where do we stand on the latest client ask. Horsehead offer strategic staircase, pushback, or nail jelly to the hothouse wall. I also believe it''s important for every member to be involved and invested in our company and this is one way to do so. Waste of resources golden goose deploy win-win. Golden goose going forward. Strategic fit one-sheet personal development nor draw a line in the sand, but closer to the metal. Design thinking. Drop-dead date diversify kpis value-added. Productize I just wanted to give you a heads-up due diligence bleeding edge, nor programmatically. New economy we need a paradigm shift. Thinking outside the box hit the ground running.&nbsp;</p>', 'http://www.thegab.com.au/wp-content/uploads/2014/04/Pole-Fitness-Moni-3.jpg', '2015-08-23 21:15:23', '2015-08-23 21:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `picture_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `places_available` int(11) NOT NULL,
  `cost` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `classes_user_id_index` (`user_id`),
  KEY `classes_location_id_index` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `user_id`, `location_id`, `title`, `description`, `date`, `picture_link`, `places_available`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Beginners Pole', '<p>Something something it''s awesome and something else something</p>\r\n<p>Look mah, I''ve edited it!</p>\r\n<p><strong>Woo!</strong></p>', '2015-08-31 11:00:00', 'https://static.wowcher.co.uk/images/deal/402997/109959.jpg', 4, 0, '2015-08-23 14:11:03', '2015-08-24 23:04:23'),
(15, 1, 1, 'James'' Super Party', '<p>No Description needed</p>', '2015-08-27 20:00:00', 'http://englandevents.co.uk/wp-content/uploads/2014/11/1416325309_10608692_946112185405323_2989889500793462455_o.jpg', 8, 0, '2015-08-24 21:04:23', '2015-08-24 21:04:23'),
(17, 1, 2, 'Beginners Pole', '<p>Something something it''s awesome and something else something</p>\r\n<p>Look mah, I''ve edited it!</p>\r\n<p><strong>Woo!</strong></p>', '2015-09-08 18:00:00', 'https://static.wowcher.co.uk/images/deal/402997/109959.jpg', 4, 0, '2015-08-24 22:19:14', '2015-08-24 23:56:59'),
(18, 1, 2, 'Test Validation Class', '<p>Lookie here, a description!</p>', '2015-08-29 20:22:00', 'http://www.freemyme.com/wp-content/uploads/2014/11/pole-fitness.jpg', 10, 20.5, '2015-08-25 18:23:37', '2015-08-26 20:57:52'),
(20, 1, 1, 'Yet Another Test Class', '<p>Aren''t you getting sick of these things yet?</p>', '2015-08-27 21:00:00', 'http://www.inversionpolefitness.co.uk/wp-content/gallery/gallery-1/dsc_0399-gallery-resize.jpg', 3, 50, '2015-08-25 18:55:01', '2015-08-25 18:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `classe_payment_method`
--

CREATE TABLE IF NOT EXISTS `classe_payment_method` (
  `classe_id` int(10) unsigned NOT NULL,
  `payment_method_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`classe_id`,`payment_method_id`),
  KEY `class_payment_method_class_id_index` (`classe_id`),
  KEY `class_payment_method_payment_method_id_index` (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classe_payment_method`
--

INSERT INTO `classe_payment_method` (`classe_id`, `payment_method_id`) VALUES
(1, 1),
(18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `classe_user`
--

CREATE TABLE IF NOT EXISTS `classe_user` (
  `classe_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `used_free_space` tinyint(1) NOT NULL,
  `transaction_id` int(11) unsigned DEFAULT NULL,
  `rejected` tinyint(1) NOT NULL,
  PRIMARY KEY (`classe_id`,`user_id`),
  KEY `class_user_class_id_index` (`classe_id`),
  KEY `class_user_user_id_index` (`user_id`),
  KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classe_user`
--

INSERT INTO `classe_user` (`classe_id`, `user_id`, `created_at`, `updated_at`, `used_free_space`, `transaction_id`, `rejected`) VALUES
(1, 1, '2015-08-23 19:13:56', '2015-08-26 21:25:20', 1, NULL, 0),
(1, 2, '2015-08-24 20:57:12', '2015-08-26 21:25:00', 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `address`, `picture_link`, `created_at`, `updated_at`) VALUES
(1, 'A Pole New Adventure', 'A Pole New Adventure, Carver St, Sheffield, S1 4FS', 'http://3.bp.blogspot.com/-59Zsdmtz69Q/U6wmwfWgq2I/AAAAAAAAAKU/mp98oPldoUE/s1600/logo+(1).png', '2015-08-23 14:09:28', '2015-08-24 23:55:38'),
(2, 'Foundry & Fusion', 'Foundry, Studio & Fusion, Western Bank, S10 2TG', 'https://thisisalondonparticular.files.wordpress.com/2012/03/5036815852_a7821f232c_b5.jpg', '2015-08-24 23:56:48', '2015-08-24 23:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE IF NOT EXISTS `memberships` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` double(5,2) NOT NULL,
  `free_classes` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `cost`, `free_classes`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Standard', 100.00, 10, 0, '2015-08-23 14:12:03', '2015-08-25 00:25:10'),
(2, 'Pro', 125.00, 6, 1, '2015-08-25 18:05:15', '2015-08-25 18:05:15'),
(4, 'Standard', 50.00, 3, 1, '2015-08-25 18:33:15', '2015-08-25 18:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_07_19_185930_create_memberships_table', 1),
('2015_07_19_190006_create_classes_table', 1),
('2015_07_19_190015_create_locations_table', 1),
('2015_07_19_190054_create_payment_methods_table', 1),
('2015_07_19_190110_create_tokens_table', 1),
('2015_07_19_190653_create_blog_items_table', 1),
('2015_07_19_191858_create_transactions_table', 1),
('2015_07_19_193027_create_user_memberships_table', 1),
('2015_07_19_193030_create_pivot_tables', 1),
('2015_07_19_193831_create_foreign_key_constraints', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Cash on arrival', 1, '2015-08-23 14:12:18', '2015-08-23 14:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expires` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `payment_method_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `successful` tinyint(1) NOT NULL,
  `failed` tinyint(1) NOT NULL,
  `rejected` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_index` (`user_id`),
  KEY `transactions_payment_method_id_index` (`payment_method_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `payment_method_id`, `name`, `description`, `amount`, `successful`, `failed`, `rejected`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Membership Fee', 'Membership type "Standard"', 100, 1, 0, 0, '2015-08-23 17:33:48', '2015-08-26 23:11:11'),
(2, 2, 1, 'Class Cost', 'Class "Beginner''s Pole" on Thursday 25th August 6:00pm', 0, 0, 0, 0, '2015-08-24 20:56:58', '2015-08-26 22:20:09'),
(5, 1, 1, 'Membership Fee', 'Membership type "Standard"', 50, 0, 0, 0, '2015-08-27 00:31:47', '2015-08-27 00:32:17'),
(6, 1, 1, 'Membership Fee', 'Membership type "Pro"', 125, 0, 0, 0, '2015-08-28 23:27:38', '2015-08-28 23:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_confirmed` tinyint(1) NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `first_name`, `last_name`, `picture_link`, `email`, `email_confirmed`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'James', 'King', 'https://scontent-lhr3-1.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/11033100_10153043196556546_664665814910563268_n.jpg?oh=2fff7b2c45323acc74e67dd886af3938&oe=568312DA', 'ripixel@gmail.com', 1, '123', NULL, '2015-08-23 14:08:39', '2015-08-28 23:28:12'),
(2, 1, 'Benjamin', 'Hawker', 'https://scontent-lhr3-1.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/11898635_10153162896483174_542118835325352178_n.jpg?oh=7208e353a7b117cc4eb6635ee9e0ee34&oe=5681FF08', 'hawker@msn.com', 0, '123', NULL, '2015-08-23 17:17:17', '2015-08-26 23:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_memberships`
--

CREATE TABLE IF NOT EXISTS `user_memberships` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `membership_id` int(10) unsigned NOT NULL,
  `transaction_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_memberships_user_id_index` (`user_id`),
  KEY `user_memberships_membership_id_index` (`membership_id`),
  KEY `user_memberships_transaction_id_index` (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_memberships`
--

INSERT INTO `user_memberships` (`id`, `user_id`, `membership_id`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2015-08-23 17:34:24', '2015-08-23 17:34:24'),
(4, 1, 4, 5, '2015-08-27 00:31:47', '2015-08-27 00:31:47'),
(5, 1, 2, 6, '2015-08-28 23:27:38', '2015-08-28 23:27:38');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_items`
--
ALTER TABLE `blog_items`
  ADD CONSTRAINT `blog_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `classes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `classe_payment_method`
--
ALTER TABLE `classe_payment_method`
  ADD CONSTRAINT `class_payment_method_class_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `class_payment_method_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`);

--
-- Constraints for table `classe_user`
--
ALTER TABLE `classe_user`
  ADD CONSTRAINT `classe_user_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `classe_user_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `class_user_class_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `class_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_memberships`
--
ALTER TABLE `user_memberships`
  ADD CONSTRAINT `user_memberships_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`),
  ADD CONSTRAINT `user_memberships_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `user_memberships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
