Привет! Приложение имеет архитектуру MVC, построенную нативными средствами.
Используемый стек: PHP 7.4, mySql, JS, jQuery, HTML + CSS.

Что бы заработало данное Web-приложение, нужно исполнить файл vedita.sql в root каталоге, или же в вашей СУБД следует выполнить 
следующий SQL запрос (создание таблицы products, вся дополнительная информация хранится в комментариях ниже):

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 05 2021 г., 11:01
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vedita`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--
-- Создание: Июл 03 2021 г., 12:40
-- Последнее обновление: Июл 05 2021 г., 06:32
--

CREATE TABLE `products` (
`id` int NOT NULL,
`name` varchar(255) NOT NULL,
`article` varchar(255) NOT NULL,
`quantity` int UNSIGNED NOT NULL DEFAULT '0',
`price` decimal(10,2) UNSIGNED NOT NULL,
`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`hidden` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `article`, `quantity`, `price`, `created_at`, `hidden`) VALUES
(1, 'Часы', 'Ч-001', 2, '199.00', '2021-07-03 14:55:22', NULL),
(2, 'Гитара', 'Г-001', 2, '1999.00', '2021-07-03 14:56:28', NULL),
(3, 'Стул', 'С-001', 1, '999.00', '2021-07-04 17:05:28', NULL),
(4, 'iPhone 6s', 'Т-001', 2, '25000.00', '2021-07-05 12:24:53', NULL);
(5, 'Samsung A6', 'Т-002', 6, '14000.00', '2021-07-05 15:03:53', NULL);
(6, 'Подушка', 'П-001', 1, '150.00', '2021-07-05 15:04:53', NULL);
(7, 'Одеяло', 'О-001', 1, '699.00', '2021-07-05 15:05:53', NULL);
(8, 'Кресло', 'К-001', 1, '1799.00', '2021-07-05 15:06:53', NULL);
(9, 'Шкаф', 'Ш-001', 1, '18799.00', '2021-07-05 15:07:53', NULL);
(10, 'Очки Ray-Ban', 'О-002', 1, '3799.00', '2021-07-05 15:08:53', NULL);
(11, 'Блокнот', 'Б-001', 1, '99.00', '2021-07-05 15:09:53', NULL);
(12, 'Футболка', 'Ф-001', 1, '799.00', '2021-07-05 15:09:53', NULL);
(12, 'Шорты', 'Ш-001', 0, '799.00', '2021-07-05 15:10:53', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


Что бы настроить подключение к БД, достаточно изменить пару св-в 
в файле ('config/database.php').

На этом всё!
Успешного подключения.