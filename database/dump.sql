-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 18 2017 г., 10:37
-- Версия сервера: 5.7.19-17-beget-5.7.19-17-1-log
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lenate9u_task`
--
CREATE DATABASE IF NOT EXISTS `lenate9u_task` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lenate9u_task`;

-- --------------------------------------------------------

--
-- Структура таблицы `descs`
--
-- Создание: Дек 13 2017 г., 19:30
-- Последнее обновление: Дек 14 2017 г., 19:10
--

CREATE TABLE `descs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `descs`
--

INSERT INTO `descs` (`id`, `name`, `user_id`) VALUES
(2, 'Work', 1),
(3, 'Home', 1),
(6, 'Sport', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--
-- Создание: Дек 13 2017 г., 20:10
-- Последнее обновление: Дек 14 2017 г., 22:28
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `state` text NOT NULL,
  `desks_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `state`, `desks_id`, `name`) VALUES
(6, 'Active', 2, 'Feed My Bear'),
(7, 'done', 2, 'Craft The Axe'),
(12, 'done', 3, 'Code the test app'),
(15, 'Active', 6, 'Running');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Дек 13 2017 г., 19:20
-- Последнее обновление: Дек 14 2017 г., 21:45
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'dase23', 'b10964e26329bbd16c5909cb5bb7283d');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `descs`
--
ALTER TABLE `descs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `userId` (`user_id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descID` (`desks_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `descs`
--
ALTER TABLE `descs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `descs`
--
ALTER TABLE `descs`
  ADD CONSTRAINT `descs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`desks_id`) REFERENCES `descs` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
