-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2016 г., 15:09
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
-- Структура таблицы `about_my_partner`
--

CREATE TABLE IF NOT EXISTS `about_my_partner` (
  `user_id` int(10) NOT NULL,
  `age` varchar(10) NOT NULL,
  `partner_children` varchar(10) NOT NULL,
  `partner_drinking` varchar(15) NOT NULL,
  `partner_smoking` varchar(15) NOT NULL,
  `about_my_partner` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `about_my_partner`
--

INSERT INTO `about_my_partner` (`user_id`, `age`, `partner_children`, `partner_drinking`, `partner_smoking`, `about_my_partner`) VALUES
(1, '20/25', 'None', 'Negative', 'Negative', 'Hi!');

-- --------------------------------------------------------

--
-- Структура таблицы `change_data`
--

CREATE TABLE IF NOT EXISTS `change_data` (
  `user_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('9b48070603911d94a532a5c5781d8b0a6e940a26', '127.0.0.1', 1455623763, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435353632333734393b67656e6465727c733a313a2231223b6e616d657c733a31303a22d094d0b5d0bdd0b8d181223b6c6173746e616d657c733a31363a22d0a4d0b8d0bbd0b8d0bfd0bfd0bed0b2223b69647c733a313a2231223b);

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
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(30) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=237 ;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'Abkhazia'),
(2, 'Australia'),
(3, 'Austria'),
(4, 'Azerbaijan'),
(5, 'Albania'),
(6, 'American Samoa'),
(7, 'Anguilla'),
(8, 'Angola'),
(9, 'Andorra'),
(10, 'Antarctica'),
(11, 'Antigua and Barbuda'),
(12, 'Argentina'),
(13, 'Armenia'),
(14, 'Aruba'),
(15, 'Afghanistan'),
(16, 'Bahamas'),
(17, 'Bangladesh'),
(18, 'Barbados'),
(19, 'Bahrain'),
(20, 'Belarus'),
(21, 'Belize'),
(22, 'Belgium'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bulgaria'),
(26, 'Bolivia'),
(27, 'Bonaire, Sint Eustatius and Sa'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Burkina Faso'),
(34, 'Burundi'),
(35, 'Bhutan'),
(36, 'Vanuatu'),
(37, 'Hungary'),
(38, 'Venezuela'),
(39, 'Virgin Islands, British'),
(40, 'Virgin Islands, U.S.'),
(41, 'Vietnam'),
(42, 'Gabon'),
(43, 'Haiti'),
(44, 'Guyana'),
(45, 'Gambia'),
(46, 'Ghana'),
(47, 'Guadeloupe'),
(48, 'Guatemala'),
(49, 'Guinea'),
(50, 'Guinea-Bissau'),
(51, 'Germany'),
(52, 'Guernsey'),
(53, 'Gibraltar'),
(54, 'Honduras'),
(55, 'Grenada'),
(56, 'Greenland'),
(57, 'Greece'),
(58, 'Georgia'),
(59, 'Guam'),
(60, 'Denmark'),
(61, 'Jersey'),
(62, 'Djibouti'),
(63, 'Dominica'),
(64, 'Dominican Republic'),
(65, 'Egypt'),
(66, 'Zambia'),
(67, 'Western Sahara'),
(68, 'Zimbabwe'),
(69, 'Israel'),
(70, 'India'),
(71, 'Indonesia'),
(72, 'Jordan'),
(73, 'Iraq'),
(74, 'Iran'),
(75, 'Ireland'),
(76, 'Spain'),
(77, 'Italy'),
(78, 'Yemen'),
(79, 'Cape Verde'),
(80, 'Kazakhstan'),
(81, 'Cambodia'),
(82, 'Cameroon'),
(83, 'Canada'),
(84, 'Qatar'),
(85, 'Kenya'),
(86, 'Cyprus'),
(87, 'Kyrgyzstan'),
(88, 'Kiribati'),
(89, 'China'),
(90, 'Cocos (Keeling) Islands'),
(91, 'Colombia'),
(92, 'Comoros'),
(93, 'Congo'),
(94, 'Korea'),
(95, 'Costa Rica'),
(96, 'Cote d`Ivoire'),
(97, 'Cuba'),
(98, 'Kuwait'),
(99, 'Curaçao'),
(100, 'Lao'),
(101, 'Latvia'),
(102, 'Lesotho'),
(103, 'Lebanon'),
(104, 'Libyan Arab Jamahiriya'),
(105, 'Liberia'),
(106, 'Liechtenstein'),
(107, 'Lithuania'),
(108, 'Luxembourg'),
(109, 'Mauritius'),
(110, 'Mauritania'),
(111, 'Madagascar'),
(112, 'Mayotte'),
(113, 'Macao'),
(114, 'Malawi'),
(115, 'Malaysia'),
(116, 'Mali'),
(117, 'United States Minor Outlying I'),
(118, 'Maldives'),
(119, 'Malta'),
(120, 'Morocco'),
(121, 'Martinique'),
(122, 'Marshall Islands'),
(123, 'Mexico'),
(124, 'Micronesia'),
(125, 'Mozambique'),
(126, 'Moldova'),
(127, 'Monaco'),
(128, 'Mongolia'),
(129, 'Montserrat'),
(130, 'Myanmar'),
(131, 'Namibia'),
(132, 'Nauru'),
(133, 'Nepal'),
(134, 'Niger'),
(135, 'Nigeria'),
(136, 'Netherlands'),
(137, 'Nicaragua'),
(138, 'Niue'),
(139, 'New Zealand'),
(140, 'New Caledonia'),
(141, 'Norway'),
(142, 'United Arab Emirates'),
(143, 'Oman'),
(144, 'Bouvet Island'),
(145, 'Isle of Man'),
(146, 'Norfolk Island'),
(147, 'Christmas Island'),
(148, 'Heard Island and McDonald Isla'),
(149, 'Cayman Islands'),
(150, 'Cook Islands'),
(151, 'Turks and Caicos Islands'),
(152, 'Pakistan'),
(153, 'Palau'),
(154, 'Panama'),
(155, 'Papua New Guinea'),
(156, 'Paraguay'),
(157, 'Peru'),
(158, 'Pitcairn'),
(159, 'Poland'),
(160, 'Portugal'),
(161, 'Puerto Rico'),
(162, 'Macedonia'),
(163, 'Reunion'),
(164, 'Russian Federation'),
(165, 'Rwanda'),
(166, 'Romania'),
(167, 'Samoa'),
(168, 'San Marino'),
(169, 'Sao Tome and Principe'),
(170, 'Saudi Arabia'),
(171, 'Swaziland'),
(172, 'Saint Barthélemy'),
(173, 'Saint Martin'),
(174, 'Senegal'),
(175, 'Saint Vincent and the Grenadin'),
(176, 'Saint Lucia'),
(177, 'Saint Kitts and Nevis'),
(178, 'Saint Pierre and Miquelon'),
(179, 'Serbia'),
(180, 'Seychelles'),
(181, 'Singapore'),
(182, 'Sint Maarten'),
(183, 'Syrian Arab Republic'),
(184, 'Slovakia'),
(185, 'Slovenia'),
(186, 'United Kingdom'),
(187, 'United States'),
(188, 'Solomon Islands'),
(189, 'Somalia'),
(190, 'Sudan'),
(191, 'Suriname'),
(192, 'Sierra Leone'),
(193, 'Tajikistan'),
(194, 'Thailand'),
(195, 'Taiwan'),
(196, 'Tanzania'),
(197, 'Timor-Leste'),
(198, 'Togo'),
(199, 'Tokelau'),
(200, 'Tonga'),
(201, 'Trinidad and Tobago'),
(202, 'Tuvalu'),
(203, 'Tunisia'),
(204, 'Turkmenistan'),
(205, 'Turkey'),
(206, 'Uganda'),
(207, 'Uzbekistan'),
(208, 'Ukraine'),
(209, 'Wallis and Futuna'),
(210, 'Uruguay'),
(211, 'Faroe Islands'),
(212, 'Fiji'),
(213, 'Philippines'),
(214, 'Finland'),
(215, 'Falkland Islands'),
(216, 'France'),
(217, 'Croatia'),
(218, 'Central African Republic'),
(219, 'Chad'),
(220, 'Montenegro'),
(221, 'Czech Republic'),
(222, 'Chile'),
(223, 'Switzerland'),
(224, 'Sweden'),
(225, 'Sri Lanka'),
(226, 'Ecuador'),
(227, 'Equatorial Guinea'),
(228, 'Åland Islands'),
(229, 'El Salvador'),
(230, 'Eritrea'),
(231, 'Estonia'),
(232, 'Ethiopia'),
(233, 'South Africa'),
(234, 'South Sudan'),
(235, 'Jamaica'),
(236, 'Japan');

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
  `avatar` varchar(50) NOT NULL,
  `birthday` varchar(15) NOT NULL DEFAULT '0',
  `country` int(5) NOT NULL DEFAULT '0',
  `height` varchar(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `eyes_color` varchar(20) NOT NULL,
  `hair_color` varchar(20) NOT NULL,
  `children` varchar(5) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `education` varchar(25) NOT NULL,
  `drinking` varchar(5) NOT NULL,
  `smoking` varchar(5) NOT NULL,
  `hobbies` varchar(100) NOT NULL,
  `about_me` varchar(100) NOT NULL,
  PRIMARY KEY (`avatar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `men_details`
--

INSERT INTO `men_details` (`user_id`, `credits`, `avatar`, `birthday`, `country`, `height`, `weight`, `eyes_color`, `hair_color`, `children`, `religion`, `education`, `drinking`, `smoking`, `hobbies`, `about_me`) VALUES
(1, 0, '', '28.1.1992', 64, '172 cm (5'' 8'''')', '60kg (132.3 lbs)', 'Blue', 'Black', 'None', 'Christian', 'University', 'Yes', 'No', 'Football', 'Hello!');

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `user_id` int(10) NOT NULL,
  `news` int(2) NOT NULL DEFAULT '1' COMMENT '0 - не активная, 1 - активная',
  `messages` int(2) NOT NULL DEFAULT '1' COMMENT '0 - не активная, 1 - активная',
  `promo` int(2) NOT NULL DEFAULT '1' COMMENT '0 - не активная, 1 - активная',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `notifications`
--

INSERT INTO `notifications` (`user_id`, `news`, `messages`, `promo`) VALUES
(1, 1, 0, 0);

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
  `photo_link` varchar(50) NOT NULL,
  PRIMARY KEY (`photo_link`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
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
-- Дамп данных таблицы `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `password`, `name`, `lastname`, `email`, `user_status`, `register_date`, `gender`, `social_network`) VALUES
(1, '', 'Денис', 'Филиппов', 'filippov.den92@bk.ru', 0, 1455623763, 0, 'facebook');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
