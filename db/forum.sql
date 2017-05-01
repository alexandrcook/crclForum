-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 28 2017 г., 17:22
-- Версия сервера: 5.7.17
-- Версия PHP: 7.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `forum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `text`, `topic_id`, `user_id`, `created_at`) VALUES
(1, 'Lorem ipsum sadadsda aa dsdsa dsadadsdsa das . das', 5, 2, '2017-04-28'),
(2, 'Lorem ipsum sadadsda aa dsdsa dsadad sdsLore Lorem ipsum sadadsda aa dsdsa dsadadsdsa das . dasm ipsum sadadsda aa dsdsa dsadadsdsa das . dasa das . das', 8, 3, '2017-04-21'),
(3, 'sadsa dsad as', 1, 3, '2017-04-26'),
(4, 'some test asdads', 3, 13, '2017-04-26'),
(5, 'postrandom about', 9, 13, '2017-04-28'),
(6, 'More post', 9, 13, '2017-04-28'),
(7, 'Greate', 9, 13, '2017-04-28'),
(8, 'Greate', 9, 13, '2017-04-28'),
(9, 'Greate', 9, 13, '2017-04-28');

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id`, `title`, `slug`) VALUES
(1, 'films', 'films'),
(2, 'cars', 'auto'),
(3, 'games', 'games'),
(4, 'moda', 'feshion');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `title`, `section_id`) VALUES
(1, 'volvo', 2),
(2, 'zaz', 2),
(3, 'batman', 1),
(4, 'shkolnitsa', 1),
(5, 'Space Rangers', 3),
(6, 'Space Rangers 2', 3),
(7, 'jeans', 4),
(8, 'converse', 4),
(9, 'random film', 1),
(10, 'is my profession', 4),
(11, 'betman back', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `vk_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `is_admin`, `vk_id`) VALUES
(6, 'test2', 'test2@test2.te', 'e9f6af2ef8239d3b74e408205ecda93a', NULL, NULL),
(7, 'Олександр', NULL, NULL, NULL, '11513800'),
(13, 'admin', 'admin@admin.ad', '25e4ee4e9229397b6b17776bfceaf8e7', 1, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
