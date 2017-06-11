-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 11 2017 г., 21:10
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `home.local`
--

-- --------------------------------------------------------

--
-- Структура таблицы `h_comments`
--

CREATE TABLE IF NOT EXISTS `h_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `datecom` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=231 ;

--
-- Дамп данных таблицы `h_comments`
--

INSERT INTO `h_comments` (`id`, `product_id`, `email`, `name`, `comment`, `datecom`) VALUES
(1, 1, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(2, 2, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(3, 3, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(4, 4, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(5, 5, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(6, 6, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(7, 7, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(8, 8, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(9, 9, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(10, 10, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(11, 11, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(12, 12, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(13, 13, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(14, 14, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800),
(15, 15, '', 'Father', 'Здесь можешь поделиться тем, что понравилось или не очень!', 1481788800);

-- --------------------------------------------------------

--
-- Структура таблицы `h_products`
--

CREATE TABLE IF NOT EXISTS `h_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(10) unsigned NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` double unsigned NOT NULL,
  `description` text NOT NULL,
  `datedg` text NOT NULL,
  `frame` varchar(255) NOT NULL,
  `buh` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Дамп данных таблицы `h_products`
--

INSERT INTO `h_products` (`id`, `section_id`, `img`, `title`, `model`, `price`, `description`, `datedg`, `frame`, `buh`) VALUES
(1, 1, '', 'Повесить картину в комнате', '', 0, 'Нужно отремонтировать дрель', '11.06.2017', '', 1),
(2, 2, '', 'Испечь торт', '', 0, 'Нужно найти рецепт', '11.06.2017', '', 0),
(3, 3, '', 'Сделать уроки', '', 0, 'Узнать домашнее задание', '11.06.2017', '', 1),
(4, 1, '', 'Купить запчасти на велосипед', '', 0, 'Сломалось заднее колесо', '10.06.2017', '', 0),
(5, 2, '', 'Помыть посуду', '', 0, 'Не срочно', '09.06.2017', '', 1),
(6, 3, '', 'Отремонтировать велосипед', '', 0, 'Смазать цепь', '08.06.2017', '', 0),
(7, 1, '', 'Отремонтировать кран', '', 0, 'Течёт кран на кухне\r\n', '10.06.2017', '', 0),
(8, 2, '', 'Купить платье', '', 0, 'Распродажа в магазине', '09.06.2017', '', 1),
(9, 3, '', 'Сходить за хлебом', '', 0, 'Нужен хлеб на завтрак', '11.06.2017', '', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `h_sections`
--

CREATE TABLE IF NOT EXISTS `h_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `h_sections`
--

INSERT INTO `h_sections` (`id`, `title`) VALUES
(3, 'Child'),
(1, 'Father'),
(2, 'Mother');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
