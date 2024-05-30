-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 30 2024 г., 16:43
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ShamshuraRP42`
--

-- --------------------------------------------------------

--
-- Структура таблицы `statements`
--

CREATE TABLE `statements` (
  `id` int NOT NULL,
  `grn` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `grn_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `statement_status` varchar(30) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Новая'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `statements`
--

INSERT INTO `statements` (`id`, `grn`, `grn_desc`, `user_id`, `statement_status`) VALUES
(1, 'с892ун-24', 'Тестик', 2, 'Отклонена'),
(2, 'с892ун-24', 'Тестик', 2, 'Отклонена'),
(3, 'с892ун-24', 'Тестик', 2, 'Отклонена'),
(4, 'с233ке-24', 'Тестик №2', 2, 'Отклонена'),
(5, 'л000ол-24', 'Самый жёсткий тест', 3, 'Решена'),
(7, 'с34уф-21', 'яываяываываываываывааыв', 2, 'Решена'),
(8, 'н123хд-11', 'Супер пупер мега ультра гипер тестик данного крафта карточки', 2, 'Решена');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_level` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `fio`, `telephone`, `email`, `password`, `user_level`) VALUES
(1, 'copp', 'Админов Админ Админович', '89029234189', 'sanyashamshura2003@mail.ru', 'admin', 1),
(2, 'neadmin', 'Иван Игоревич Алексеев', '+78005553535', 'Aleshka@mail.ru', '11111111', 0),
(3, 'nereg', 'Иванина Игоревнивна Алексеевнивна', '+78005553534', 'Aleshka@mail.net', '111111111', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `statements`
--
ALTER TABLE `statements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `statements`
--
ALTER TABLE `statements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `statements`
--
ALTER TABLE `statements`
  ADD CONSTRAINT `statements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
