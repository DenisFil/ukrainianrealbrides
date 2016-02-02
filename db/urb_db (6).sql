-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 02 2016 г., 12:50
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `urb_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `confirm_email`
--

CREATE TABLE IF NOT EXISTS `confirm_email` (
  `user_id` int(10) NOT NULL,
  `confirm_hash` varchar(40) NOT NULL,
  `email_status` int(2) NOT NULL DEFAULT '0' COMMENT '0 - не подтвержден, 1 - подтвержден',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `invites`
--

CREATE TABLE IF NOT EXISTS `invites` (
  `invite_code` varchar(50) NOT NULL,
  `invite_time` int(15) NOT NULL,
  `invite_from_user` int(10) NOT NULL,
  `user_id` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`invite_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `men_details`
--

CREATE TABLE IF NOT EXISTS `men_details` (
  `user_id` int(10) NOT NULL,
  `credits` int(10) NOT NULL,
  `avatar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `private_messages`
--

CREATE TABLE IF NOT EXISTS `private_messages` (
  `message_id` int(20) NOT NULL AUTO_INCREMENT,
  `sender` int(10) NOT NULL,
  `recipient` int(10) NOT NULL,
  `message` text NOT NULL,
  `departure_date` int(20) NOT NULL,
  `have_read` int(2) NOT NULL DEFAULT '0' COMMENT '0 - не прочитано, 1 - прочитано',
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `password` varchar(40) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_status` int(2) NOT NULL DEFAULT '0' COMMENT '0 - не активирован, 1 - активирован',
  `register_date` int(15) NOT NULL,
  `gender` int(2) NOT NULL DEFAULT '0' COMMENT '0 - не определен, 1 - мужчина, 2 - женщина',
  `social_network` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users_online`
--

CREATE TABLE IF NOT EXISTS `users_online` (
  `user_id` int(10) NOT NULL,
  `last_online` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_photos`
--

CREATE TABLE IF NOT EXISTS `user_photos` (
  `user_id` int(10) NOT NULL,
  `photo_link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
