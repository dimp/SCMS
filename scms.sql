-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Σύστημα: localhost
-- Χρόνος δημιουργίας: 03 Δεκ 2010, στις 11:26 μμ
-- Έκδοση Διακομιστή: 5.1.41
-- Έκδοση PHP: 5.3.1

--
-- SCMS SQL dump.
--  For version 0.1-alpha1-r11
--  http://www.dimp.tk/scms
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `scms`
--

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','editor','user') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 'Αδειασμα δεδομένων του πίνακα `authors`
--

INSERT INTO `authors` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '1bb40c042e1fc3058411a8d49ee8dbac', 'admin');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `url` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `shorturl` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) DEFAULT '0',
  `type` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- 'Αδειασμα δεδομένων του πίνακα `links`
--

INSERT INTO `links` (`id`, `title`, `url`, `shorturl`, `views`, `type`) VALUES
(1, 'SCMS Project Page', 'http://scms.dimp.tk', 'http://dimp.tk/scms', 0, 'menubar'),
(2, 'SCStats', 'http://scstats.tk', 'http://dimp.tk/scst', 0, 'sidebar');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `author` smallint(5) unsigned NOT NULL,
  `views` int(11) DEFAULT '0',
  `postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 'Αδειασμα δεδομένων του πίνακα `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `author`, `views`, `postdate`) VALUES
(1, 'About', '&lt;p&gt;This site uses the magnificent &lt;a href=&quot;http://scms.dimp.tk/&quot; target=&quot;_blank&quot;&gt;SCMS&lt;/a&gt;!&lt;/p&gt;\r\n&lt;p&gt;SCMS is a new, lightweight and easy to use content management system for everyone.&lt;/p&gt;', 1, 0, '2010-10-06 12:36:00');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `author` smallint(5) unsigned NOT NULL,
  `views` int(11) DEFAULT '0',
  `postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 'Αδειασμα δεδομένων του πίνακα `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `views`, `postdate`) VALUES
(1, 'Welcome to SCMS!', '&lt;p&gt;Hey there!&lt;/p&gt;\r\n&lt;p&gt;Thank you for installing SCMS! I&#039;m sorry if I let you down but this version is still under heavy development...&lt;/p&gt;\r\n&lt;p&gt;A few words about this project:&lt;/p&gt;\r\n&lt;p&gt;SCMS stands for Simplified Content Management System. It was build with simplicity in mind, to help everyone create a website relatively easy. Please login to the admin area (/admin/) and delete this post. Then you are ready to go :-)&lt;/p&gt;\r\n&lt;p&gt;Always check the official homepage for updates!&lt;/p&gt;\r\n&lt;p&gt;Thank you,&lt;br /&gt;The SCMS Team&lt;/p&gt;', 1, 0, '2010-09-29 01:13:09');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 'Αδειασμα δεδομένων του πίνακα `settings`
--

INSERT INTO `settings` (`id`, `value`) VALUES
('sitename', 'SCMS'),
('sitetitle', 'A new lightweight CMS'),
('theme', 'substantial'),
('footer', '(C) 2010 SCMS Project'),
('fancylinks', '0'),
('authorurl', 'author/'),
('posturl', 'content/'),
('pagesurl', 'static/'),
('contentpageurl', 'page/'),
('lastposts', '5'),
('postsperpage', '15');
