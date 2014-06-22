-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 22, 2014 at 03:46 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `book-catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `homepage` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `homepage`) VALUES
(1, 'author1', '', ''),
(2, 'author2', '', ''),
(3, 'author3', '', ''),
(4, 'author4', '', ''),
(5, 'author5', '', ''),
(6, 'author6', '', ''),
(7, 'author7', '', ''),
(8, 'author8', '', ''),
(9, 'author9', '', ''),
(10, 'author10', '', ''),
(11, 'author11', '', ''),
(12, 'author12', '', ''),
(13, 'author13', '', ''),
(14, 'testauthor13', '', ''),
(15, 'author14', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `isbn` varchar(45) NOT NULL,
  `image` varchar(128) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `isbn`, `image`, `created`, `modified`) VALUES
(29, 'testbook1', 'testisbn1', 'uploads/cover2.jpeg', '2014-06-22 06:28:38', '2014-06-22 06:28:38'),
(30, 'testbook2', 'testisbn2', '/img/uploads/cover1.jpeg', '2014-06-22 06:36:25', '2014-06-22 06:36:25'),
(31, 'book3', 'isbn3', '/img/uploads/cover3.jpeg', '2014-06-22 06:38:11', '2014-06-22 06:38:11'),
(32, 'book4', 'isbn4', '/img/uploads/cover4.jpg', '2014-06-22 06:42:01', '2014-06-22 06:42:01'),
(33, 'book5', 'isbn5', '/img/uploads/act_of_treason.jpg', '2014-06-22 06:42:29', '2014-06-22 06:42:29'),
(34, 'book6', 'isbn6', '/img/uploads/dark_celebration.jpg', '2014-06-22 06:42:57', '2014-06-22 06:42:57'),
(35, 'book7', 'isbn7', '/img/uploads/echo_park.jpg', '2014-06-22 06:43:19', '2014-06-22 06:43:19'),
(36, 'book8', 'isbn8', '/img/uploads/freakonomics.jpg', '2014-06-22 06:43:49', '2014-06-22 06:43:49'),
(37, 'book9', 'isbn9', '/img/uploads/good_to_great.jpg', '2014-06-22 06:44:15', '2014-06-22 06:44:15'),
(38, 'book10', 'isbn-10', '/img/uploads/rich_dad_poor_dad.jpg', '2014-06-22 06:44:40', '2014-06-22 06:44:40'),
(39, 'book11', 'isbn11', '/img/uploads/the_lost_colony.jpg', '2014-06-22 06:45:00', '2014-06-22 06:45:00'),
(40, 'book12', 'isbn12', '/img/uploads/the_mephisto_club.jpg', '2014-06-22 06:45:19', '2014-06-22 06:45:19'),
(41, 'book13', 'isbn13', '/img/uploads/the_world_is_flat.jpg', '2014-06-22 06:45:44', '2014-06-22 06:45:44'),
(42, 'book14', 'author14', '/img/uploads/cover7.jpg', '2014-06-22 06:46:06', '2014-06-22 06:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `books_authors`
--

CREATE TABLE `books_authors` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`,`author_id`),
  KEY `fk_books_has_authors_author1` (`author_id`),
  KEY `fk_books_has_authors_books` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_authors`
--

INSERT INTO `books_authors` (`book_id`, `author_id`) VALUES
(29, 1),
(29, 2),
(30, 2),
(31, 3),
(32, 4),
(33, 5),
(34, 6),
(35, 7),
(36, 8),
(37, 9),
(38, 10),
(39, 11),
(40, 12),
(41, 13),
(41, 14),
(42, 15);

-- --------------------------------------------------------

--
-- Table structure for table `books_types`
--

CREATE TABLE `books_types` (
  `book_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`,`type_id`),
  KEY `fk_books_has_types_type1` (`type_id`),
  KEY `fk_books_has_types_books` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_types`
--

INSERT INTO `books_types` (`book_id`, `type_id`) VALUES
(29, 1),
(34, 1),
(30, 2),
(32, 2),
(35, 2),
(40, 2),
(42, 2),
(31, 3),
(33, 3),
(36, 3),
(37, 3),
(39, 3),
(41, 3),
(38, 4);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Novel', '2013-02-06 08:27:44', '2014-02-06 08:27:44'),
(2, 'Fiction', '2013-02-06 08:27:44', '2014-02-06 08:27:44'),
(3, 'Technology', '2013-02-06 08:27:59', '2014-02-06 08:27:59'),
(4, 'Education', '2013-02-06 08:27:59', '2014-02-06 08:27:59');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books_types`
--
ALTER TABLE `books_types`
  ADD CONSTRAINT `fk_books_has_types_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_books_has_types_type1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
  
ALTER TABLE `books_authors`
  ADD CONSTRAINT `fk_books_has_authors_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_books_has_authors_author1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
