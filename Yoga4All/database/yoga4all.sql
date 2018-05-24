-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2018 at 07:33 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yoga4all`
--
CREATE DATABASE IF NOT EXISTS `yoga4all` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `yoga4all`;

-- --------------------------------------------------------

--
-- Table structure for table `getintouch`
--

CREATE TABLE IF NOT EXISTS `getintouch` (
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` varchar(400) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `getintouch`
--

INSERT INTO `getintouch` (`name`, `email`, `message`) VALUES
('a', 'a@gmail.com', 'aaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `usertype` varchar(40) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`firstname`, `lastname`, `email`, `password`, `usertype`) VALUES
('Sample', 'Doctor', 'a@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'admin'),
('b', 'b', 'b@gmail.com', '92eb5ffee6ae2fec3ad71c777531578f', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `yoga_desc`
--

CREATE TABLE IF NOT EXISTS `yoga_desc` (
  `email` varchar(40) NOT NULL,
  `yoga` varchar(40) NOT NULL,
  `descr` varchar(4000) NOT NULL,
  `problem` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yoga_desc`
--

INSERT INTO `yoga_desc` (`email`, `yoga`, `descr`, `problem`) VALUES
('a@gmail.com', 'Bhramari Pranayama', 'This exercise is really calming and can drown down the unnecessary noise in your head, making you feel relaxed with just a few breaths. Sit on the floor cross-legged or however you feel comfortable. Now place your fingers over your eyes horizontally. Exhale and when you inhale make a bee like buzzing sound. Make sure you apply very little pressure on the eyeball and keep your lips sealed.', 'eye'),
('a@gmail.com', 'Bhujangasana', 'The eighth pose of the 12 poses of the Surya Namaskar, Bhujangasana is also called the Cobra Pose. It is one of the most important backward bending asanas in yoga. In this asana, the trunk and head resemble the raised hood of a cobra. Lie flat on your stomach. Place your hands on the side and ensure that your toes touch each other. Then, move your hands to the front, making sure they are at the shoulder level, and place your palms on the floor.', 'back');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
