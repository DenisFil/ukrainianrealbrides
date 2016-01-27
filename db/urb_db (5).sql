-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 27 2016 г., 18:52
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

--
-- Дамп данных таблицы `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2da24c44c5352842019658c1a1ae238939b6abeb', '127.0.0.1', 1453823807, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435333832333334393b67656e6465727c733a313a2231223b6e616d657c733a31303a22d094d0b5d0bdd0b8d181223b6c6173746e616d657c733a31363a22d0a4d0b8d0bbd0b8d0bfd0bfd0bed0b2223b69647c733a313a2231223b),
('0c61edad31cde877297c24d1ac373fe0b8e7fb41', '127.0.0.1', 1453884046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435333837373638343b67656e6465727c733a313a2231223b6e616d657c733a31303a22d094d0b5d0bdd0b8d181223b6c6173746e616d657c733a31363a22d0a4d0b8d0bbd0b8d0bfd0bfd0bed0b2223b69647c733a313a2231223b),
('a2064754946dcd10c6a1df24afb0131d42227704', '127.0.0.1', 1453888408, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435333838363331303b67656e6465727c733a313a2231223b6e616d657c733a31303a22d094d0b5d0bdd0b8d181223b6c6173746e616d657c733a31363a22d0a4d0b8d0bbd0b8d0bfd0bfd0bed0b2223b69647c733a313a2231223b),
('99e10854159a88ffd1373f7b48e50b8ff7ca4210', '127.0.0.1', 1453894457, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435333839343435373b67656e6465727c733a313a2231223b6e616d657c733a31303a22d094d0b5d0bdd0b8d181223b6c6173746e616d657c733a31363a22d0a4d0b8d0bbd0b8d0bfd0bfd0bed0b2223b69647c733a313a2231223b),
('a738d72c6f774a53cd31cabf20d43d5809f6de6f', '127.0.0.1', 1453904258, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435333930343235383b67656e6465727c733a313a2231223b6e616d657c733a31303a22d094d0b5d0bdd0b8d181223b6c6173746e616d657c733a31363a22d0a4d0b8d0bbd0b8d0bfd0bfd0bed0b2223b69647c733a313a2231223b);

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

--
-- Дамп данных таблицы `confirm_email`
--

INSERT INTO `confirm_email` (`user_id`, `confirm_hash`, `email_status`) VALUES
(1, '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `men_details`
--

CREATE TABLE IF NOT EXISTS `men_details` (
  `user_id` int(10) NOT NULL,
  `credits` int(10) NOT NULL,
  `avatar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `men_details`
--

INSERT INTO `men_details` (`user_id`, `credits`, `avatar`) VALUES
(1, 0, 'ead2c58ff0aea2eb44516358705745cf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `password`, `name`, `lastname`, `email`, `user_status`, `register_date`, `gender`, `social_network`) VALUES
(1, '', 'Денис', 'Филиппов', 'filippov.den92@bk.ru', 0, 1453823353, 1, 'facebook');

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
