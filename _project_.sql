-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2022 at 05:15 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `add_book`
--
-- Creation: Oct 23, 2022 at 08:56 PM
--

DROP TABLE IF EXISTS `add_book`;
CREATE TABLE IF NOT EXISTS `add_book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `books_name` varchar(50) NOT NULL,
  `books_image` varchar(5000) NOT NULL,
  `books_author_name` varchar(50) NOT NULL,
  `books_publication_name` varchar(50) NOT NULL,
  `books_purchase_date` varchar(20) NOT NULL,
  `books_price` varchar(10) NOT NULL,
  `books_quantity` varchar(20) NOT NULL,
  `books_availability` varchar(20) NOT NULL,
  `librarian_username` varchar(20) NOT NULL,
  `books_file` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_book`
--

INSERT INTO `add_book` (`id`, `books_name`, `books_image`, `books_author_name`, `books_publication_name`, `books_purchase_date`, `books_price`, `books_quantity`, `books_availability`, `librarian_username`, `books_file`) VALUES
(1, 'Theoretical Numerical Analysis', 'books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg', 'Kendall Atkinson', 'Dover Publications', '15/03/19', '420', '10', '8', 'pompously', 'books-file/nalrs.pdf'),
(2, 'Health Informatics', 'books-image/9749fdc83fefbcc9cf3a55b16c7a353041SZngIJfuL._SX389_BO1,204,203,200_.jpg', 'Nancy Staggers', 'Elsevier Mosby', '12/03/19', '480', '15', '15', 'pompously', 'books-file/Contents and Front Matter.pdf'),
(3, 'Digital Image Processing', 'books-image/f5546d1614746fed61c4162163d81a59196018.jpg', 'Rafael C. Gonzalez', 'Prentice Hall', '20/03/19', '500', '20', '18', 'pompously', 'books-file/IT6005-SCAD-MSM-by www.LearnEngineering.in.pdf'),
(6, 'Artificial Intelligence', 'books-image/17385102edb4831bab1b8b0577389d5e0133001989.jpg', ' Peter Norvig', 'Dover Publications', '25/03/19', '420', '5', '3', 'admin', 'books-file/17385102edb4831bab1b8b0577389d5eArtificial Intelligence.pdf'),
(7, 'Parallel and Distributed Processing', 'books-image/1554233254.jpg', 'Jose Rolim', 'Elsevier Science', '02/0419', '350', '10', '9', 'admin', 'books-file/1554233331.pdf'),
(8, 'The Guest Book: A Novel', 'books-image/1568430614.jpg', 'test', 'test', '10/5/19', '200', '10', '10', 'admin', 'books-file/1568430614.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `finezone`
--
-- Creation: Oct 23, 2022 at 08:56 PM
--

DROP TABLE IF EXISTS `finezone`;
CREATE TABLE IF NOT EXISTS `finezone` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `utype` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `booksname` varchar(50) NOT NULL,
  `fine` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finezone`
--

INSERT INTO `finezone` (`id`, `username`, `utype`, `email`, `booksname`, `fine`) VALUES
(22, 'samir22', 'teacher', 'samir22@gmail.com', 'Theoretical Numerical Analysis', '50'),
(24, 'sayeed22', 'student', 'sayeed@gmail.com', 'Theoretical Numerical Analysis', '50'),
(25, 'sayeed22', 'student', 'sayeed@gmail.com', 'Artificial Intelligence', '50'),
(26, 'sayeed22', 'student', 'sayeed@gmail.com', 'Artificial Intelligence', '50'),
(27, 'jubayermuhit', 'student', 'joyho3343@gmail.com', 'Combinatorics and Graph Theory', '50'),
(28, 'samir22', 'teacher', 'samir22@gmail.com', 'Digital Image Processing', '50'),
(29, 'mamun22', 'student', 'mamun22@gmail.com', 'Health Informatics', '50'),
(30, 'mamun22', 'student', 'mamun22@gmail.com', 'Health Informatics', '50'),
(31, 'samir2', 'student', 'samir2@gmail.com', 'Combinatorics and Graph Theory', '50'),
(32, 'mamun22', 'student', 'mamun22@gmail.com', 'Digital Image Processing', '50'),
(33, 'jubayermuhit', 'student', 'joyho3343@gmail.com', 'Artificial Intelligence', '50');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--
-- Creation: Oct 23, 2022 at 08:56 PM
--

DROP TABLE IF EXISTS `issue_book`;
CREATE TABLE IF NOT EXISTS `issue_book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `utype` varchar(10) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `booksname` varchar(50) NOT NULL,
  `booksissuedate` varchar(10) NOT NULL,
  `booksreturndate` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `utype`, `regno`, `name`, `sem`, `session`, `dept`, `phone`, `email`, `booksname`, `booksissuedate`, `booksreturndate`, `username`) VALUES
(22, 'student', '17020050005', 'Skn Sayeed', '4th', '17/18', 'CSE', '01932670148', 'sayeed@gmail.com', 'Theoretical Numerical Analysis', '05/04/2019', '05/05/2019', 'sayeed22'),
(26, 'student', '14502000030', 'samir ahmed', '6th', '14/15', 'BBA', '01521458890', 'samir2@gmail.com', 'Parallel and Distributed Processing', '05/04/2019', '05/05/2019', 'samir2'),
(28, 'student', '17020050005', 'Skn Sayeed', '4th', '17/18', 'CSE', '01932670148', 'sayeed@gmail.com', 'Artificial Intelligence', '31/08/2019', '30/09/2019', 'sayeed22'),
(29, 'student', '14502000020', 'Mostafizur Rahman', '8th', '14/15', 'CSE', '01997259865', 'mamun22@gmail.com', 'Digital Image Processing', '14/09/2019', '14/10/2019', 'mamun22');

-- --------------------------------------------------------

--
-- Table structure for table `lib_registration`
--
-- Creation: Oct 23, 2022 at 08:56 PM
-- Last update: Oct 24, 2022 at 03:29 PM
--

DROP TABLE IF EXISTS `lib_registration`;
CREATE TABLE IF NOT EXISTS `lib_registration` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_registration`
--

INSERT INTO `lib_registration` (`id`, `name`, `username`, `password`, `email`, `phone`, `address`, `photo`, `status`) VALUES
(1, 'Rethabile', 'user', 'password', 'rethabile@gmail.com', '0766818425', ' 2nd phase', 'upload/1553532571.jpg', ''),
(2, 'rethabile', 'admin', 'admin', 'rethabile@gmail.com', '0766818425', '2nd Ave ', 'upload/1571634617.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--
-- Creation: Oct 23, 2022 at 08:56 PM
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `susername` varchar(50) NOT NULL,
  `rusername` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `read1` varchar(10) NOT NULL,
  `time` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `susername`, `rusername`, `title`, `msg`, `read1`, `time`) VALUES
(10, 'admin', 'mamun22', 'test', 'good afternoon\r\n', 'y', '2019-09-07 11:49:45am'),
(11, 'admin', 'mamun22', 'testing message', 'Hi mamun ! Whats up?', 'y', '2019-09-07 03:53:07pm'),
(12, 'admin', 'mamun22', 'last', 'dfsdf', 'y', '2019-09-07 03:56:15pm'),
(13, 'admin', 'nahid22', 'test', 'Hi nahid!', 'y', '2019-09-10 06:35:04pm'),
(14, 'admin', 'nahid22', 'check', 'is it ok', 'y', '2019-09-10 06:38:07pm'),
(15, 'admin', 'mamun22', 'ttttt', 'mmnbvvv', 'y', '2019-09-14 10:51:44am');

-- --------------------------------------------------------

--
-- Table structure for table `request_books`
--
-- Creation: Oct 23, 2022 at 08:56 PM
--

DROP TABLE IF EXISTS `request_books`;
CREATE TABLE IF NOT EXISTS `request_books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `utype` varchar(10) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `burl` varchar(500) NOT NULL,
  `read1` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_books`
--

INSERT INTO `request_books` (`id`, `name`, `username`, `email`, `utype`, `bname`, `burl`, `read1`) VALUES
(1, 'Mostafizur Rahman', 'mamun22', 'mamun22@gmail.com', 'student', 'Digital Logic Design', 'https://www.oreilly.com/library/view/digital-logic-design/9780750645829/', 'yes'),
(2, 'Mostafizur Rahman', 'mamun22', 'mamun22@gmail.com', 'student', 'Outliers', 'https://www.goodreads.com/book/show/3228917-outliers', 'yes'),
(5, 'Mostafizur Rahman', 'mamun22', 'mamun22@gmail.com', 'student', 'Medical Medium', 'https://www.medicalmedium.com/', 'yes'),
(6, 'Mostafizur Rahman', 'mamun22', 'mamun22@gmail.com', 'student', 'mmmmm', 'https://www.cricbuzz.com/', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `std_registration`
--
-- Creation: Oct 23, 2022 at 08:56 PM
-- Last update: Oct 24, 2022 at 03:34 PM
--

DROP TABLE IF EXISTS `std_registration`;
CREATE TABLE IF NOT EXISTS `std_registration` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `session` varchar(5) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `utype` varchar(7) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `status` varchar(7) NOT NULL,
  `vkey` varchar(250) NOT NULL,
  `verified` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_registration`
--

INSERT INTO `std_registration` (`id`, `name`, `username`, `password`, `email`, `phone`, `sem`, `dept`, `session`, `regno`, `address`, `utype`, `photo`, `status`, `vkey`, `verified`) VALUES
(4, 'Skn Sayeed', 'user', 'root', 'sayeed@gmail.com', '0766818425', '4th', 'CSE', '17/18', '17020050005', 'jessore,khulna', 'student', 'upload/avatar.jpg', 'no', 'dfdsfsdf', 'yes'),
(5, 'Mostafizur Rahman', 'mamun22', 'root', 'mamun22@gmail.com', '0766818425', '8th', 'CSE', '14/15', '14502000020', 'sonadanga 2nd phase', 'student', 'upload/1568958905.jpg', 'yes', 'gfhtr4ghtrgfbvf', 'yes'),
(38, 'samir ahmed', 'samir2', 'root', 'samir2@gmail.com', '0766818425', '6th', 'BBA', '14/15', '14502000030', 'sonadanga', 'student', 'upload/avatar.jpg', 'pending', '436yhgfjhfdstref', 'no'),
(39, 'utter pompously', 'pompously', '123456', 'utterpompously@gmail.com', '0766818425', '8th', 'CSE', '14/15', '14502000044', 'khulna', 'student', 'upload/avatar.jpg', 'yes', 'dsrfewtgfdgvd', 'yes'),
(49, 'Proddut', 'produtt', '123456', 'itsfreecountry@gmail.com', '0766818425', '1th', 'CSE', '14/15', '14502000026', 'Notun Rasta', 'student', 'upload/avatar.jpg', 'no', 'a9e5dcd08c06d04ea40ed7adc59b8a1e', 'yes'),
(51, 'jack', 'jack123', '123456', 'jack@gmail.com', '0766818425', '1th', 'CSE', '14/15', '1111111112222', 'temp', 'student', 'upload/avatar.jpg', 'no', 'bee5551ae6dbf70b784ed4dd0966c3bd', 'no'),
(52, 'sadia', 'sadia2', 'sadia222', 'loveya3377@gmail.com', '0766818425', '1th', 'CSE', '14/15', '12502000015', 'khulna', 'student', 'upload/avatar.jpg', 'yes', 'c79857de008257e8ded4b1bfaeba6f1d', 'yes'),
(53, 'test', 'zzzz22', '123456', 'joyho3343@gmail.com', '0766818425', '1th', 'CSE', '14/15', '111112222211', 'nnnnnn', 'student', 'upload/avatar.jpg', 'yes', '071703501c47bf0db6a04d6431935496', 'no'),
(54, 'mithun', 'mithun22', '123456', 'peaceinsleeping@gmail.com', '0766818425', '1th', 'CSE', '14/15', '123456666666', 'jibannagar', 'student', 'upload/avatar.jpg', 'no', '6266417382abff9b2cae55c1b617dcd6', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `t_issuebook`
--
-- Creation: Oct 23, 2022 at 08:56 PM
--

DROP TABLE IF EXISTS `t_issuebook`;
CREATE TABLE IF NOT EXISTS `t_issuebook` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `utype` varchar(20) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lecturer` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `booksname` varchar(50) NOT NULL,
  `booksissuedate` varchar(20) NOT NULL,
  `booksreturndate` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_issuebook`
--

INSERT INTO `t_issuebook` (`id`, `utype`, `idno`, `name`, `lecturer`, `phone`, `email`, `booksname`, `booksissuedate`, `booksreturndate`, `username`) VALUES
(17, 'teacher', '1001', 'Nahid Hossen', 'CSE', '01721455456', 'nahid001@gmail.com', 'Theoretical Numerical Analysis', '05/04/2019', '05/05/2019', 'nahid22');

-- --------------------------------------------------------

--
-- Table structure for table `t_registration`
--
-- Creation: Oct 23, 2022 at 08:56 PM
-- Last update: Oct 24, 2022 at 03:32 PM
--

DROP TABLE IF EXISTS `t_registration`;
CREATE TABLE IF NOT EXISTS `t_registration` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lecturer` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `utype` varchar(7) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `status` varchar(7) NOT NULL,
  `vkey` varchar(250) NOT NULL,
  `verified` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_registration`
--

INSERT INTO `t_registration` (`id`, `name`, `username`, `password`, `lecturer`, `email`, `phone`, `idno`, `address`, `utype`, `photo`, `status`, `vkey`, `verified`) VALUES
(1, 'Rethabile', 'user1', 'pass', 'CSE', 'nahid001@gmail.com', '0766818425', '1001', 'Sonadanga 2nd phase, khulna', 'teacher', 'upload/avatar.jpg', 'yes', 'dsfdfsghrfjhyetryt5ergbfvh', 'yes'),
(2, 'rethabile', 'user2', 'root', 'CSE', 'samir22@gmail.com', '0766818425', '1008', 'Sonadanga 2nd phase', 'teacher', 'upload/avatar.jpg', 'yes', 'iuyirtytrfhgn4w3erterfgvggfhgfh', 'yes'),
(4, 'rethabile', 'user3', 'root', 'cse', 'jubayer.muhit@gmail.com', '0766818425', '1245555655', 'khulna', 'teacher', 'upload/avatar.jpg', 'no', '7a3b7cd62fe6740522ecb64f7e9b1ee3', 'no');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
