-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 14 2016 г., 19:42
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.3.29

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
('e4db1c0fa76d5235cec4926d0f98cf005eea1202', '127.0.0.1', 1452684144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323638333936343b),
('a73ca8b5f097c8089fd71a3290e2723ac6792287', '127.0.0.1', 1452685282, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323638353238323b),
('cb551724fe4ae9f347279a38080e60010a0cb115', '127.0.0.1', 1452685639, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323638353633393b),
('98d480b772edee12fe32befbba3ab1d03599c2ea', '127.0.0.1', 1452687330, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323638373333303b),
('a5dc82d6981864ea572f9664d3ee20e3962034b3', '127.0.0.1', 1452687382, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323638373338323b),
('b64359e6268074db58677cec188cb2347ac98b9c', '127.0.0.1', 1452687413, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323638373431333b),
('b01d47bc4b6db683aa7aa582b4f266775df52b92', '127.0.0.1', 1452687438, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323638373433383b),
('4adbd78cee38b8967a6ca0bcc6a9ef1f0e62b534', '127.0.0.1', 1452687985, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323638373938353b),
('368fc072e4e2182d8a3dfd03e558f57a6d0b04d3', '127.0.0.1', 1452688159, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323638383135393b),
('8c95feb28962c4e2a3dacffa988c806807c750b8', '127.0.0.1', 1452688371, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323638383337313b),
('ddbcf8146a7847336be321bed96c03b7622e7996', '127.0.0.1', 1452688835, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323638383833343b),
('4f5371713b69c136341ed3c384e40c9191d5b1a9', '127.0.0.1', 1452690367, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639303336373b),
('9e0194838f8d1db0174d4983aed388cd686645db', '127.0.0.1', 1452690429, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639303432393b),
('a641a89526e5d04c91177a8c275738dcf5f4ed63', '127.0.0.1', 1452690529, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639303532393b),
('40f3204067dbd4fa9410461f1019b284f68eaa9c', '127.0.0.1', 1452693997, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639333939373b),
('3b8783940912563bb84f78dcf510d353f2fd3592', '127.0.0.1', 1452694108, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639343130383b),
('afb0cdab71c4918c161a66402785eb6007cbdccd', '127.0.0.1', 1452694514, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639343531343b),
('fd0edd851f969062b89f665cec2d70445dd32e8c', '127.0.0.1', 1452694566, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639343536363b),
('c583edc98d498e8ed194e910d9fc3bd73b751c68', '127.0.0.1', 1452694587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639343538373b),
('2cb9c1fdf4e79980fd64c96553bfd09cadb21a02', '127.0.0.1', 1452694641, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639343634313b),
('96501a88561b177d9322c4feaec35e8e87e961c3', '127.0.0.1', 1452694980, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639343938303b),
('51e6f1be1c986ab1095036eb7011553b4cf09539', '127.0.0.1', 1452695464, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639353436343b),
('2854fd70e325105b19c066c889f18ddede5ed498', '127.0.0.1', 1452695514, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639353531343b),
('0b0743ceef113aba35f63a1dad2a379c388e8b1a', '127.0.0.1', 1452695524, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639353532343b),
('9d7a4fa7dacd6ae9b7f11ffb4cb6e8295bf5c8c1', '127.0.0.1', 1452695553, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639353535333b),
('38a687e374cdaed12add1fa6a2ebd03c1d305b50', '127.0.0.1', 1452695727, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639353732373b),
('666465579d5d1eb904be5c850c65d929e37e1575', '127.0.0.1', 1452695752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639353735323b),
('22c965c72e1581a87f4aaf11fd8e7a2c8a860514', '127.0.0.1', 1452695760, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639353736303b),
('96f6c133083e877e879268a6a1d68418c3b9cde5', '127.0.0.1', 1452696091, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363039313b),
('f76b18c9c90afc5c4e2e77530ab7d645ef6f2e8a', '127.0.0.1', 1452696126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363132363b),
('0e569bdad51c4a534e64c473afa65e09cf88eba9', '127.0.0.1', 1452696197, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363139373b),
('a7c90a26c4ee6a2d9599c66a852739f012c5e11d', '127.0.0.1', 1452696267, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363236373b),
('460450e09db749688bd81601859b9092ababd6f6', '127.0.0.1', 1452696288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363238383b),
('a793c0cc616c727d6edd9427c5c1d13e9d8376bf', '127.0.0.1', 1452696394, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363339343b),
('bcfd6e9872b92586c66273a98faf86a045c66493', '127.0.0.1', 1452696412, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363431323b),
('0bf1d430f4886da61108a695b8208b3f735714d7', '127.0.0.1', 1452696431, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363433313b),
('602ccc1f593d7ad76cf28446d391c97ac83675e0', '127.0.0.1', 1452696560, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363536303b),
('a61ddb3e33ad87490efc1ec0f0b2f99e77bcb1e6', '127.0.0.1', 1452696574, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363537343b),
('bbef6e930ec1035131582473dfb507c5ece7d251', '127.0.0.1', 1452696692, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363639323b),
('e33ff1a2a0416ec7d72250388e696bb3583f8c10', '127.0.0.1', 1452696738, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363733383b),
('a6bd0ac4752faa1caf78f5c64ed1a229a079707c', '127.0.0.1', 1452696906, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639363930363b),
('6daaec593955d9cbda1b3d4b178fb505285d51c7', '127.0.0.1', 1452697182, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639373138323b),
('bd3a724e57c1ab77a202377bf8bf09a3e1056ccb', '127.0.0.1', 1452697221, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639373232313b),
('78746be6369d76ba2f6e049c05026d02ba25ca99', '127.0.0.1', 1452697613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639373631333b),
('8455de65bf7d3bf76adebcc9b2386b97066cb8fa', '127.0.0.1', 1452697622, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639373632323b),
('e650af5729d5301d08c0e61e9f83e6eab7f5632c', '127.0.0.1', 1452697659, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639373635393b),
('f252b67ab8c1bb7c19cfa83d1688289f60e4bbb6', '127.0.0.1', 1452697793, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639373739333b),
('350df0ea61fb5b502bf31910016cd1bbbce804eb', '127.0.0.1', 1452697887, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639373838373b),
('2d21f49c36c0dc3c1ed903358e9cab3d6ec665e7', '127.0.0.1', 1452698023, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639383032333b),
('fa1f7b4c30e9e94c469dc4fd4404f24e976c6ccd', '127.0.0.1', 1452698056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639383035363b),
('d1c6a804cc9dedc05771945bca52f770cc52f606', '127.0.0.1', 1452698067, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323639383036373b),
('67461f33c486eb11ff49a7a89d773820610d6afe', '127.0.0.1', 1452700077, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323730303037373b),
('89e8c700a406fe388effad8a60e620e88e257513', '127.0.0.1', 1452700103, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323730303130333b),
('295e6a6cb71497dc7850c63f3f699b4bff714d55', '127.0.0.1', 1452700287, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323730303238373b),
('8634860811c8e5a6e3fe4d9f55bfda9697ee1c7b', '127.0.0.1', 1452700339, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323730303333393b),
('aea140eb0f1e1f0ed1cd633552cbc20845930046', '127.0.0.1', 1452700399, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323730303339393b),
('2335c0fe14353f0d3eb79464a262ca4ec47ff171', '127.0.0.1', 1452700442, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323730303434323b),
('b9edc0855faf7e6ddda0c347678fd7200fd8930f', '127.0.0.1', 1452700458, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323730303435383b),
('05b6f655a7d7aceb1343c332dce8e8f95520c23c', '127.0.0.1', 1452700470, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323730303437303b),
('13041c212bdbd255ff5c68edc0c040a3af9d8060', '127.0.0.1', 1452757383, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323735373338333b),
('20ca167c0072864b9ce8db06d842dcd15c2bed5c', '127.0.0.1', 1452757849, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323735373834393b),
('86082d82e7b1240eac7b4fe53b9115e79e60d319', '127.0.0.1', 1452757876, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323735373837363b),
('4ab3f0ffe7317dc5d542d861e26b6eea2eeea174', '127.0.0.1', 1452757901, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323735373930313b),
('7d6645d5cba94144d996190809e228329dd5fe5f', '127.0.0.1', 1452757906, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323735373930363b),
('cd38160fd41b45f0701e8cdbb6e544164096d641', '127.0.0.1', 1452758036, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323735383033363b),
('66f5d9c4c77e878b24f14552c590478a42b89da1', '127.0.0.1', 1452758239, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323735383233393b),
('fc8558d5baab28ddfbbbf759dc16badebc09b3d5', '127.0.0.1', 1452758334, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323735383333343b),
('2b708e05afd9cfaa9520d50e2c8a6d948bb8ba24', '127.0.0.1', 1452758452, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323735383435323b),
('4ad32125bc2f27ae1518530fc8afa705f9940296', '127.0.0.1', 1452760629, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736303632393b),
('fa71ae4115c84cc9ea2ddc5829371f3cd3800385', '127.0.0.1', 1452760651, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736303635313b),
('03071a940a72750d52d44842a38361ce33e8e5d1', '127.0.0.1', 1452760752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736303735323b),
('d77ff49d11ebec367bd245089d52906484a5cd57', '127.0.0.1', 1452760841, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736303834313b),
('20b613c411a433af7222cdf062cb388890fb0684', '127.0.0.1', 1452760889, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736303838393b),
('eaa732a24f65145e1170704c27f610a9b5a23130', '127.0.0.1', 1452760931, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736303933313b),
('441db5fd59aa1bd4c86a64c3c4a7db8085f31409', '127.0.0.1', 1452760942, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736303934323b),
('33ea510f6fb541fd99b4ab1721d516c15c3c52d4', '127.0.0.1', 1452761003, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313030333b),
('15af00d1f343bfe6ed55cb7a6940073837bbf70d', '127.0.0.1', 1452761046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313034363b),
('5d7ef865588da44b698deccca7de45516a1c6d51', '127.0.0.1', 1452761075, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313037353b),
('f6f5beeb06a59b21c5f756c786b2d27ac14d1384', '127.0.0.1', 1452761089, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313038393b),
('364464ab79dfbe022b55fd55446df1bd2a492c20', '127.0.0.1', 1452761114, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313131343b),
('b0a81c244d24aea9ecea750f50d863079d7739b6', '127.0.0.1', 1452761135, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313133353b),
('a3d1de10a9724916f668f45646b6a4d24aedcb53', '127.0.0.1', 1452761184, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313138343b),
('b88197d80143c5dc64d27d7181262b37a264d6c0', '127.0.0.1', 1452761349, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313334393b),
('a6f85a9c3363bcf9fb7c3d3b380689e6e7bdd9e9', '127.0.0.1', 1452761433, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313433333b),
('07357cc0dc29c0fe252a8864d54a57da187a822a', '127.0.0.1', 1452761461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313436313b),
('052153e94bc1d2a9a77f6b54cba3179f262d5bf0', '127.0.0.1', 1452761481, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313438313b),
('f3ab658a949295b16c311201a9c881e3c3a7f6d9', '127.0.0.1', 1452761587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313538373b),
('b1e301459cddeb4580c984c150748537da467e3e', '127.0.0.1', 1452761597, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313539373b),
('d5c33ffec5597c134a5a93ab7ab6f2173a2fceb5', '127.0.0.1', 1452761615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313631353b),
('8ebad0148fd9a49a87bf1cbc8e750f536adb80ed', '127.0.0.1', 1452761620, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736313632303b),
('3d2408da42a82bfce71128e9d6d840b80b847b83', '127.0.0.1', 1452766862, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736363836323b),
('7c8fc9b1f3d8a685675cb163360d91d6a7a4afb3', '127.0.0.1', 1452767063, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736373036333b),
('deafb93ea3beb77519a47f9a84da8abfde0582ef', '127.0.0.1', 1452767677, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736373637373b),
('df8395b369d91cbecce4e65c79260af72c42fe6b', '127.0.0.1', 1452768539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736383533393b),
('5760f0162a60a99e904d414bc4273dbe243aaa40', '127.0.0.1', 1452769551, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736393535313b),
('34d13feafd1b87ff7adc8ed002104671e9019d36', '127.0.0.1', 1452769979, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323736393937393b),
('665427b2ee1f4ba0be367df7158a7285d8cbb30c', '127.0.0.1', 1452770098, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737303039383b),
('df26a48694e5a13f0107119df5cc972a935bdd46', '127.0.0.1', 1452771102, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737313130323b),
('5d8701916feadd8697ad52dd6e8bd8702f72462f', '127.0.0.1', 1452771168, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737313136383b),
('dbfe0fd046258ef7282726b0cf9d9a5a47daa4c4', '127.0.0.1', 1452771173, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737313137333b),
('e134d61c3294cc7cea1fcded75da7eab57d7761c', '127.0.0.1', 1452771238, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737313233383b),
('cf37899654c3b2329ab54cce8da08da1766d684e', '127.0.0.1', 1452774183, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737343138333b),
('492b64a5130c8540a10df9a576a3d420119470cf', '127.0.0.1', 1452776858, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737363835383b),
('252f20fc7618a05f4069fd0e49bd1dbc0ec00e1d', '127.0.0.1', 1452776889, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737363838393b),
('c319fba207987a83ce0bf54f35722fed373098e0', '127.0.0.1', 1452776967, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737363936373b),
('88be009cfdeb9ce38c40c015468061efd0c34649', '127.0.0.1', 1452776978, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737363937383b),
('d2cfdfb331ee250871fa4d59641295f8e233ea47', '127.0.0.1', 1452776999, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737363939393b),
('4085c7c2c5e4d25f0d1b29cbe5444322f0faa1b3', '127.0.0.1', 1452777066, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373036363b),
('5672b9b32a0ff0af88d835d36388dd5f25ab70a8', '127.0.0.1', 1452777157, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373135373b),
('605bc2257e5d21b223f43180898f0cfad6845ba7', '127.0.0.1', 1452777167, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373136373b),
('91a4af9a54fa65f650629f4dcacc0a51cdf07f32', '127.0.0.1', 1452777411, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373431313b),
('65913327f40ae9bca8feb1c56d367b2be22354ee', '127.0.0.1', 1452777458, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373435383b),
('69976eb3f30b48ef12f9822593b316c843d3490a', '127.0.0.1', 1452777570, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373537303b),
('5dc17cad02d3f2712b890e05eefb06525cfb7e5c', '127.0.0.1', 1452777589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373538393b),
('91dce7fe243dee8e8db16e2afadbe7ca5ffcce9c', '127.0.0.1', 1452777623, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373632333b),
('75f93ad4e81966ebb4cfb19e33164ab3add4ea67', '127.0.0.1', 1452777709, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373730393b),
('02e776b89730fd6e7c78a4ded56277e47d627733', '127.0.0.1', 1452777731, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373733313b),
('c496b65d95b07fb1dfa9d43322057c8107a24dea', '127.0.0.1', 1452777814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373831343b),
('2956dce6d42cfd1965c4a7d7bacc33d0d3de4c54', '127.0.0.1', 1452777843, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373834333b),
('9efbe4cb4412ff054ca4f54c25e8f522d9579576', '127.0.0.1', 1452777887, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373838373b),
('660c7b0492b85c9ddf237a0e87f74fe60efb06de', '127.0.0.1', 1452777941, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737373934313b),
('664bea73c7ab41e6b3a7da1a5edbc1e03c01665b', '127.0.0.1', 1452778011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737383031313b),
('75e78ac27ae6c3a111c83310614964cbd9e22de6', '127.0.0.1', 1452778068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737383036383b),
('ed2e4504845947fe52fd63032799bb1279cf90ce', '127.0.0.1', 1452778123, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737383132333b),
('0c42a1e368b91064bd40f65628814dde470e40af', '127.0.0.1', 1452778293, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737383239333b),
('04dfac85dcb4ff85c097b6ee7bc4707e941fe65b', '127.0.0.1', 1452778414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737383431343b),
('0ac47f6297e5e85f556d96cf5d36e5594e347c5f', '127.0.0.1', 1452778462, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737383436323b),
('f524f268c75ebae807dd39dbd17f133027244785', '127.0.0.1', 1452778482, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737383438323b),
('ae0cfaee2bcce7525c9d42f012e80b8b0c09615a', '127.0.0.1', 1452778497, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323737383439373b),
('0c941190ae9bdb46a4f154df7f409dffb17a9a9f', '127.0.0.1', 1452781351, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738313335313b),
('adece37d86871776d80e20c29875b3e9eb6a80aa', '127.0.0.1', 1452781629, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738313632393b),
('9f2eb3929c16b1bee84119976717a5f82494bb71', '127.0.0.1', 1452781663, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738313636333b),
('b6fbb5d9fad5f364b508353c29f16e1a4ae546f6', '127.0.0.1', 1452781721, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738313732313b),
('ad3b2251e90d705efc86dad089c41acc362de752', '127.0.0.1', 1452781763, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738313736333b),
('8a11ca72bad9c601f6fa2f68226b9252486be02a', '127.0.0.1', 1452781795, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738313739353b),
('7b0dbedf471e3caf9f447ef946d38300741ed734', '127.0.0.1', 1452782122, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738323132323b),
('31d1d504c31af7aa5052eb0b3a15b29e6b5e9b38', '127.0.0.1', 1452782215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738323231353b),
('78237abb74ec1e2300f74ca582d76192d8d4a1c1', '127.0.0.1', 1452782219, ''),
('9bc5d2529ed43c886922e71292e0355b3d814eb4', '127.0.0.1', 1452782330, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738323333303b),
('f25747a4ef8960ab8485693c046ba8e7bdc8239e', '127.0.0.1', 1452782334, ''),
('9a97057b52adfcd5bdc43a3ae75b8509d7c1dfea', '127.0.0.1', 1452782425, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738323432353b),
('2cf51fa78d4f39862dec6ea2d3a7ba3822ef84b2', '127.0.0.1', 1452782430, ''),
('ea8fa29dda4ba79c9bd3f0f0510939a884234571', '127.0.0.1', 1452783046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738333034363b),
('0534d626b1f1e851e882d40c49cac4cdd08982fb', '127.0.0.1', 1452783053, ''),
('ff957ef2f8b119e21c47793f4e8eba6e712726b4', '127.0.0.1', 1452783141, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738333134313b),
('3e7072e426b8496b71dc8911cec2e14a1466ff7c', '127.0.0.1', 1452783146, ''),
('d9666cf7b92d43bca31197dc1e898199adcd9449', '127.0.0.1', 1452783179, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738333137393b),
('14b10b118bc973b0a827ecff0ccb3a0ccbbf2ac5', '127.0.0.1', 1452783183, ''),
('068a15a76cef18e61be10e9604502744fd96e954', '127.0.0.1', 1452783193, ''),
('8c6470fb0650d6f3509ea2c442a603b9cebbb979', '127.0.0.1', 1452783196, ''),
('00bcda38878d0af40ae12e4b6bd667c0513f6296', '127.0.0.1', 1452783198, ''),
('450570b61e11035f456b9379a8db77b74966ce13', '127.0.0.1', 1452783260, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738333236303b),
('2132af6b5b7a9e6f9bbf4243462821da4777324e', '127.0.0.1', 1452783263, ''),
('7211fa6206cedbf2abfb79de78e3399b92f7532f', '127.0.0.1', 1452783265, ''),
('2383d852fbb3d09fed0c2a9d4c008db29c92e1b4', '127.0.0.1', 1452783943, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738333934333b),
('2f5f02c42618b2f741514e17a7f133154645aca9', '127.0.0.1', 1452784044, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738343034343b),
('9371daa31432dcac2faa841cae59250edf2a91e3', '127.0.0.1', 1452786799, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738363739393b),
('6087542f20b3b14cffa7533346d0fa2fb9c3a76a', '127.0.0.1', 1452786813, ''),
('2fff502bca779cbe144373a82f005a8252fb142d', '127.0.0.1', 1452786860, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738363836303b),
('470b38a3531ef84d6132b05779766bd9d0ae8726', '127.0.0.1', 1452786875, ''),
('d6ef3975f5ff50e491fa6524a99ffa43958517e5', '127.0.0.1', 1452786902, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738363930323b),
('b43ee6fb8408b5bb49da26f1ab905ae99bbf5749', '127.0.0.1', 1452786908, ''),
('3fac55f534e74fc77ccaf1dbde6bcc380bbc2654', '127.0.0.1', 1452786966, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738363936363b),
('c52c81b111a9be300fb997728563af66fbf11a16', '127.0.0.1', 1452786971, ''),
('92a7e716cb6eb7344bb9ce17129d57eebff28bbc', '127.0.0.1', 1452787005, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738373030353b),
('ace0e69a1b23ae9f0b51df6dba89491039429ec6', '127.0.0.1', 1452787010, ''),
('9a976435d139ad36bccda205de632c0d9de630cf', '127.0.0.1', 1452787012, ''),
('974d83b5a60276fae3fc6f2fda7d7f13a9c66bc0', '127.0.0.1', 1452787072, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738373037323b),
('24824c51849da085a78e9729a287a317646124d7', '127.0.0.1', 1452787096, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738373039363b),
('fbd476b158e84b3bcec276200ce4ccd4adae72a6', '127.0.0.1', 1452787107, ''),
('3cd78f8fd41a644ce6d37e66d7b6c101b21289de', '127.0.0.1', 1452787143, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738373134333b),
('2d5c6db49482ff285d969106688dae36244223c3', '127.0.0.1', 1452787149, ''),
('c6de4976311131bf8521312aaa5f751b982bf5d0', '127.0.0.1', 1452787163, ''),
('4bfe2728e624d2ca689728c7aa848eda57d61b36', '127.0.0.1', 1452787166, ''),
('a6b416798cf5d3cd76d7bf8516d3daebf5aca651', '127.0.0.1', 1452787170, ''),
('ccd5d8fa2c60bcc93e526e486d20a980da4ed80e', '127.0.0.1', 1452787171, ''),
('8230ada76b4336b425d8647b3770cbc1fe1d7a35', '127.0.0.1', 1452787198, ''),
('bd4c802d0e1bf115a903a9391478e3f3c98ce0b3', '127.0.0.1', 1452787258, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738373235383b),
('f72adb14595f77270165ae5f1556f11ca4ef65f6', '127.0.0.1', 1452787266, ''),
('762e140a9a3be3dcbaf955802bcfc545bee1f51c', '127.0.0.1', 1452787312, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738373331323b),
('0dcbfde91a30e7a01589b0bbe84be521d41f176e', '127.0.0.1', 1452787321, ''),
('b2dad1b384f60d047a6d20059ea3231bf337371a', '127.0.0.1', 1452787404, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738373430343b),
('d88096aa1c251489b5180a8e6bc751d31a686c91', '127.0.0.1', 1452787409, ''),
('500ad3af02caeb4e4b02ef94fd4c881e4cc0baf4', '127.0.0.1', 1452787411, ''),
('040ee77bf1070873db5542bd6842f36c08a91bd3', '127.0.0.1', 1452787466, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738373436363b),
('b19278f4c184a9fda4b780ccdf763f2d57deaf1c', '127.0.0.1', 1452787472, ''),
('4f2c4370e58c9e9d17df342d0ef9c10c2dc9496f', '127.0.0.1', 1452787474, ''),
('10eb8096b4728b45e4e352d1a1a46a74c9cd61cd', '127.0.0.1', 1452787532, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738373533323b),
('2f59ec1c17364804b81cf996708f5f042fe0a568', '127.0.0.1', 1452787536, ''),
('03715c3c86ceef105aea5d62b8ea4178b12c82b9', '127.0.0.1', 1452787538, ''),
('e54ca1b53eaf0b400e90a214dd70892dbc005dbf', '127.0.0.1', 1452788236, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738383233363b),
('91fc70a3e86f05c2834eed9b7c9cc0f57cc624e2', '127.0.0.1', 1452788248, ''),
('84f9f08d05f996a6cbcea06829a78ec4e791e757', '127.0.0.1', 1452788271, ''),
('1aeb366db9712c1d09c897471172d2a4a02ffc39', '127.0.0.1', 1452788326, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738383332363b),
('d357c5ca4dbe923ff52d4d328d13f7dfd81016e6', '127.0.0.1', 1452788340, ''),
('46626da9b1b59c002f66243012d3b46d38d8f02b', '127.0.0.1', 1452788361, ''),
('f844d4d84592867fcaccc65e4def1c22c1efbea3', '127.0.0.1', 1452788384, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738383338343b),
('927c6221959049d75c68d6133f11838bbdf91cf6', '127.0.0.1', 1452788395, ''),
('801d34cb1af5b1e6b4c5e10820538661d21948b1', '127.0.0.1', 1452788400, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738383430303b),
('0e0a48bd1a47aad10a756bde96d64a300da4f669', '127.0.0.1', 1452788830, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738383833303b),
('b1750c4a53ca4ab7b5815bbba04c060998f6f447', '127.0.0.1', 1452788839, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323738383833393b);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `password`, `name`, `lastname`, `email`, `user_status`) VALUES
(1, 'fdsfdfds', 'fdsfd', '', 'fdfd@', 0),
(2, 'fdfdsfds', 'dsdsa', '', 'ds', 0),
(3, 'dsadsa', 'dsadsa', '', '@', 0),
(4, 'dfdsfsdfds', 'dasdas', '', 'fdsfdsfsdf@', 0),
(5, 'sadasdas', 'dsadsada', '', 'dasdsa@', 0),
(6, '00262d5ec651', 'Denis', '', 'filippov.den92@gmail.com', 0),
(7, '2ca94f962e1f0d330dc376b696e7c714', 'Denis', '', 'filippov.den92@gmailcom', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
