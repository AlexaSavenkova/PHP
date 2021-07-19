-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 15 2021 г., 12:48
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `session_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'Название',
  `description` text DEFAULT NULL COMMENT 'Описание',
  `price` decimal(11,2) DEFAULT NULL COMMENT 'Цена',
  `image` varchar(30) DEFAULT NULL COMMENT 'имя файла миниатюры - полный путь',
  `views` varchar(30) DEFAULT '0' COMMENT 'число просмотров',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `views`, `created_at`) VALUES
(1, 'iPhone 12', 'A14 Bionic, самый быстрый процессор iPhone. Дисплей OLED от края до края. \nПередняя панель Ceramic Shield, которая в четыре раза снижает риск повреждений дисплея при падении. \nИ Ночной режим на всех камерах. Всё это есть в iPhone 12. В двух размерах.', '79990.00', 'img-1.jpeg', '46', '2021-06-30 19:54:24'),
(2, 'Samsumg Galaxy S20', 'Любимец публики. 6.5-дюймовый S20 Fan Edition 5G построен с учётом реальных пожеланий \nреальных пользователей. \nВ итоге получился самый сообразительный Galaxy S20 из всех, который хорошо показывает себя во всех аспектах сразу. \nГлавное, телефон стоит не так дорого по меркам верхней ценовой ниши.', '51990.00', 'img-2.jpeg', '26', '2021-06-30 19:58:53');

-- --------------------------------------------------------

--
-- Структура таблицы `products_images`
--

CREATE TABLE `products_images` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL COMMENT 'имя файла фотографии для карточки товара - полный путь'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products_images`
--

INSERT INTO `products_images` (`product_id`, `image`) VALUES
(1, 'img-1-1.jpeg'),
(1, 'img-1-2.jpeg'),
(1, 'img-1-3.jpeg'),
(2, 'img-2-1.jpeg'),
(2, 'img-2-2.jpeg'),
(2, 'img-2-3.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `role`) VALUES
(1, 'admin', '$2y$10$2qMwxKY7nxxiFZFBP4yzrePkz5WVzb9F7dKO2xux5.XLbPLXkmBEC', 1),
(2, 'user', '$2y$10$2qMwxKY7nxxiFZFBP4yzrePkz5WVzb9F7dKO2xux5.XLbPLXkmBEC', 0),
(3, 'alex', '$2y$10$2qMwxKY7nxxiFZFBP4yzrePkz5WVzb9F7dKO2xux5.XLbPLXkmBEC', 0),
(5, 'michael', '$2y$10$liRGJju3fw8WGLMugmlAxuE/NySLePRgWduiBPwpk6iZYFC/62vLy', 0),
(6, 'Alina', '$2y$10$.C4rlPPEdPRYYgci7W6fh.Upaa9yStU8h1LXflcArkjofyHbRtVA.', 0),
(7, 'Anna', '$2y$10$bNzx4HV.V4pVqxcAKLW7XOHsz2XzL5PJm2Ztes.3VAN1/pZ26wbA2', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_images`
--
ALTER TABLE `products_images`
  ADD UNIQUE KEY `product_image_idx` (`product_id`,`image`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `products_images`
--
ALTER TABLE `products_images`
  ADD CONSTRAINT `products_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
