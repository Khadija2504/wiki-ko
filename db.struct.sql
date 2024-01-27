-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 08 jan. 2024 à 10:40
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wiki_ko`
--

-- --------------------------------------------------------

-- Users table to store information about authors and administrators
CREATE TABLE `users` (
  `UserID` INT AUTO_INCREMENT PRIMARY KEY,
  `Username` VARCHAR(50) NOT NULL,
  `Email` VARCHAR(255) NOT NULL,
  `Password` VARCHAR(255) NOT NULL,
  `aboutMe` VARCHAR(555),
  `Role` ENUM('author', 'admin') NOT NULL DEFAULT 'author'
);

-- Categories table to manage content organization
CREATE TABLE `categories` (
  `CategoryID` INT AUTO_INCREMENT PRIMARY KEY,
  `CategoryName` VARCHAR(50) NOT NULL
);

-- Tags table to facilitate content tagging
CREATE TABLE `tags` (
  `TagID` INT AUTO_INCREMENT PRIMARY KEY,
  `TagName` VARCHAR(50) NOT NULL
);

-- Wikis table to store information about wikis
CREATE TABLE `wikis` (
  `Wik  iID` INT AUTO_INCREMENT PRIMARY KEY,
  `Title` VARCHAR(255) NOT NULL,
  `Content` TEXT NOT NULL,
  `AuthorID` INT,
  `CategoryID` INT,
  FOREIGN KEY (`AuthorID`) REFERENCES `users`(`UserID`),
  FOREIGN KEY (`CategoryID`) REFERENCES `categories`(`CategoryID`),
  `CreatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `Archived` BOOLEAN NOT NULL DEFAULT false
);

-- WikiTags table to associate tags with wikis
CREATE TABLE `wiki_tags` (
  `WikiID` INT,
  `TagID` INT,
  PRIMARY KEY (`WikiID`, `TagID`),
  FOREIGN KEY (`WikiID`) REFERENCES `wikis`(`WikiID`),
  FOREIGN KEY (`TagID`) REFERENCES `tags`(`TagID`)
);

-- DashboardStats table to store statistics for the dashboard
CREATE TABLE `dashboard_stats` (
  `StatID` INT AUTO_INCREMENT PRIMARY KEY,
  `EntityType` ENUM('users', 'categories', 'wikis') NOT NULL,
  `Count` INT NOT NULL
);
