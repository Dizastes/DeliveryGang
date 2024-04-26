-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 26 2024 г., 10:51
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
-- База данных: `deliver`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courier_orders`
--

CREATE TABLE `courier_orders` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `courier_orders`
--

INSERT INTO `courier_orders` (`id`, `order_id`, `user_id`, `updated_at`, `created_at`) VALUES
(50, 4, 2, '2024-04-25', '2024-04-25'),
(51, 6, 2, '2024-04-25', '2024-04-25');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `food`
--

CREATE TABLE `food` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `cost` int NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `food`
--

INSERT INTO `food` (`id`, `name`, `category`, `cost`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'Том Ям', 'супы', 309, 'images/Том Ям.jpg', NULL, NULL),
(3, 'Сырный суп', 'супы', 189, 'images/Сырный суп.jpg', NULL, NULL),
(4, 'Рис для Том Ям', 'супы', 59, 'images/Рис для Том Ям.png', NULL, NULL),
(5, 'Рамэн с курицей', 'супы', 379, 'images/Рамэн с курицей.jpg', NULL, NULL),
(6, 'Wok-лапша удон с говядиной', 'wok', 319, 'images/Wok-лапша удон с говядиной.jpg', NULL, NULL),
(7, 'Wok Футомаки с лососем', 'wok', 319, 'images/Wok Футомаки с лососем.png', NULL, NULL),
(8, 'Сенсейшен с курицей', 'wok', 319, 'images/Сенсейшен с курицей.jpg', NULL, NULL),
(9, 'Wok-лапша пшеничная с говядиной', 'wok', 319, 'images/Wok-лапша пшеничная с говядиной.jpg', NULL, NULL),
(10, 'Рыбка Пуннопан', 'десерты', 85, 'images/Рыбка Пуннопан.jpg', NULL, NULL),
(11, 'Моти', 'десерты', 198, 'images/Моти.jpg', NULL, NULL),
(12, 'Чизкейк', 'десерты', 149, 'images/Чизкейк.jpg', NULL, NULL),
(13, 'Маффин', 'десерты', 129, 'images/Маффин.png', NULL, NULL),
(14, 'Филадельфия', 'роллы', 499, 'images/Филадельфия.png', NULL, NULL),
(15, 'Ойси Сяки', 'роллы', 339, 'images/Ойси Сяки.jpg', NULL, NULL),
(16, 'Похотливый краб', 'роллы', 319, 'images/Похотливый краб.jpg', NULL, NULL),
(17, 'ВсуниУни', 'роллы', 369, 'images/ВсуниУни.jpg', NULL, NULL),
(18, 'КусиСюси', 'роллы', 359, 'images/КусиСюси.jpg', NULL, NULL),
(19, 'Таки Сяки', 'роллы', 419, 'images/Таки Сяки.jpg', NULL, NULL),
(20, 'Каппа Маки', 'роллы', 149, 'images/Каппа Маки.jpg', NULL, NULL),
(21, 'Цезарь темпура', 'роллы', 249, 'images/Цезарь темпура.jpg', NULL, NULL),
(22, 'Эби', 'суши', 129, 'images/Эби.jpg', NULL, NULL),
(23, 'Сяки', 'суши', 139, 'images/Сяки.jpg', NULL, NULL),
(24, 'Унаги', 'суши', 269, 'images/Унаги.jpg', NULL, NULL),
(25, 'Икура Гункан', 'суши', 289, 'images/Икура Гункан.jpg', NULL, NULL),
(26, 'Чукка', 'салаты', 179, 'images/Чукка.jpg', NULL, NULL),
(27, 'Салат из шпината', 'салаты', 199, 'images/Салат из шпината.jpg', NULL, NULL),
(28, 'Грибной салат', 'салаты', 269, 'images/Грибной салат.jpg', NULL, NULL),
(29, 'Битые огурцы', 'салаты', 169, 'images/Битые огурцы.jpg', NULL, NULL),
(30, 'Тортилья с жаренным лососем', 'закуски', 299, 'images/Тортилья с жаренным лососем.png', NULL, NULL),
(31, 'Корндог с сыром', 'закуски', 159, 'images/Корндог с сыром.jpg', NULL, NULL),
(32, 'Корндог с сосиской', 'закуски', 159, 'images/Корндог с сосиской.jpg', NULL, NULL),
(33, 'Пирожок на пару', 'закуски', 29, 'images/Пирожок на пару.jpg', NULL, NULL),
(34, 'Морс облепиховый', 'напитки', 109, 'images/Морс облепиховый.png', NULL, NULL),
(35, 'Морс смородиновый', 'напитки', 109, 'images/Морс смородиновый.png', NULL, NULL),
(36, 'Рамуне', 'напитки', 349, 'images/Рамуне.jpg', NULL, NULL),
(37, 'Лимонад', 'напитки', 119, 'images/Лимонад.png', NULL, NULL),
(38, 'Сасиска', 'наборы', 1500, 'images/Кунимэн.jpg', NULL, '2024-04-25'),
(39, 'Отсосвумэн', 'наборы', 1699, 'images/Отсосвумэн.jpg', NULL, NULL),
(40, 'Отъебэйло', 'наборы', 1399, 'images/Отъебэйло.jpg', NULL, NULL),
(41, 'Поебу Си', 'наборы', 1899, 'images/Поебу Си.jpg', NULL, NULL),
(42, 'Палочки для суши', 'дополнительно', 29, 'images/Палочки для суши.png', NULL, NULL),
(43, 'Соевый соус', 'дополнительно', 29, 'images/Соевый соус.png', NULL, NULL),
(44, 'Имбирь', 'дополнительно', 29, 'images/Имбирь.png', NULL, NULL),
(45, 'Васаби', 'дополнительно', 29, 'images/Васаби.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `food_ingridient`
--

CREATE TABLE `food_ingridient` (
  `id` int NOT NULL,
  `food_id` int NOT NULL,
  `ingridient_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `food_ingridient`
--

INSERT INTO `food_ingridient` (`id`, `food_id`, `ingridient_id`) VALUES
(1, 2, 43),
(2, 2, 35),
(3, 2, 16),
(4, 2, 47),
(5, 2, 78),
(6, 2, 25),
(7, 2, 53),
(8, 2, 9),
(9, 3, 36),
(10, 3, 53),
(11, 3, 66),
(12, 3, 77),
(13, 4, 49),
(14, 5, 18),
(15, 5, 20),
(16, 5, 11),
(17, 5, 76),
(18, 5, 34),
(19, 5, 26),
(20, 5, 56),
(21, 5, 53),
(22, 5, 82),
(23, 5, 23),
(24, 6, 20),
(25, 6, 7),
(26, 6, 26),
(27, 6, 34),
(28, 6, 63),
(29, 6, 41),
(30, 6, 17),
(31, 6, 74),
(32, 6, 23),
(33, 7, 22),
(34, 7, 20),
(35, 7, 26),
(36, 7, 34),
(37, 7, 13),
(38, 7, 23),
(39, 7, 47),
(40, 7, 74),
(41, 7, 17),
(42, 8, 18),
(43, 8, 49),
(44, 8, 26),
(45, 8, 34),
(50, 8, 17),
(51, 9, 19),
(52, 9, 7),
(53, 9, 26),
(54, 9, 34),
(55, 9, 13),
(56, 9, 41),
(57, 9, 17),
(58, 9, 61),
(59, 10, 52),
(60, 10, 5),
(61, 11, 50),
(62, 11, 28),
(63, 12, 46),
(64, 12, 68),
(65, 13, 69),
(66, 13, 79),
(67, 14, 22),
(68, 14, 54),
(69, 14, 49),
(70, 15, 22),
(71, 15, 59),
(72, 15, 12),
(73, 15, 49),
(74, 15, 39),
(75, 16, 55),
(76, 16, 27),
(77, 16, 22),
(78, 16, 41),
(79, 16, 71),
(80, 16, 39),
(81, 17, 49),
(82, 17, 33),
(83, 17, 51),
(84, 17, 15),
(85, 17, 57),
(86, 17, 39),
(87, 17, 22),
(88, 17, 41),
(89, 17, 54),
(90, 17, 62),
(91, 18, 49),
(92, 18, 33),
(93, 18, 54),
(94, 18, 73),
(95, 18, 4),
(96, 18, 71),
(97, 18, 61),
(98, 18, 45),
(99, 18, 24),
(100, 18, 17),
(101, 18, 39),
(102, 19, 49),
(103, 19, 33),
(104, 19, 51),
(105, 19, 15),
(106, 19, 57),
(107, 19, 39),
(108, 19, 54),
(109, 19, 22),
(110, 19, 4),
(111, 19, 61),
(112, 19, 27),
(113, 19, 17),
(114, 20, 49),
(115, 20, 33),
(116, 20, 51),
(117, 20, 15),
(118, 20, 57),
(119, 20, 39),
(120, 20, 41),
(121, 20, 17),
(122, 21, 49),
(123, 21, 33),
(124, 21, 51),
(125, 21, 15),
(126, 21, 57),
(127, 21, 39),
(128, 21, 54),
(129, 21, 18),
(130, 21, 48),
(131, 21, 41),
(132, 21, 27),
(133, 21, 76),
(134, 21, 56),
(135, 21, 37),
(136, 21, 82),
(137, 21, 64),
(138, 22, 49),
(139, 22, 33),
(140, 22, 51),
(141, 22, 15),
(142, 22, 57),
(143, 22, 16),
(144, 22, 54),
(145, 23, 49),
(146, 23, 33),
(147, 23, 51),
(148, 23, 15),
(149, 23, 57),
(150, 23, 22),
(151, 24, 49),
(152, 24, 33),
(153, 24, 51),
(154, 24, 15),
(155, 24, 57),
(156, 24, 73),
(157, 24, 61),
(158, 24, 17),
(159, 25, 49),
(160, 25, 33),
(161, 25, 51),
(162, 25, 15),
(163, 25, 57),
(164, 25, 39),
(165, 25, 10),
(166, 26, 29),
(167, 26, 42),
(168, 27, 80),
(169, 27, 42),
(170, 27, 17),
(171, 28, 81),
(172, 28, 33),
(173, 28, 32),
(174, 28, 67),
(175, 28, 51),
(176, 29, 41),
(177, 29, 30),
(178, 29, 56),
(179, 29, 33),
(180, 29, 57),
(181, 29, 51),
(182, 29, 17),
(183, 29, 76),
(184, 30, 72),
(185, 30, 60),
(186, 30, 36),
(187, 30, 22),
(188, 30, 61),
(189, 30, 47),
(190, 31, 65),
(191, 31, 36),
(192, 31, 70),
(193, 31, 64),
(194, 32, 58),
(195, 32, 70),
(196, 32, 64),
(197, 32, 14),
(198, 33, 8),
(199, 34, 40),
(200, 34, 51),
(201, 34, 6),
(202, 35, 75),
(203, 35, 51),
(204, 35, 6),
(205, 37, 21),
(206, 37, 51),
(207, 37, 31),
(208, 37, 38),
(209, 38, 90),
(210, 38, 83),
(211, 38, 91),
(212, 38, 93),
(213, 39, 83),
(214, 39, 84),
(215, 39, 85),
(216, 39, 94),
(217, 39, 86),
(218, 40, 86),
(219, 40, 88),
(220, 40, 92),
(221, 41, 93),
(222, 41, 90),
(223, 41, 87),
(224, 41, 86),
(225, 46, 4),
(226, 46, 7),
(227, 46, 5),
(228, 47, 4),
(229, 47, 7),
(230, 47, 5),
(231, 46, 4),
(232, 46, 5),
(233, 47, 4),
(234, 47, 5),
(235, 48, 4),
(236, 48, 6),
(237, 49, 4),
(240, 38, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `ingridient`
--

CREATE TABLE `ingridient` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `ingridient`
--

INSERT INTO `ingridient` (`id`, `name`) VALUES
(4, 'авокадо'),
(5, 'вафельное тесто'),
(6, 'вода'),
(7, 'говядина'),
(8, 'дрожжевое тесто'),
(9, 'зелень'),
(10, 'икра лосося'),
(11, 'имбирь'),
(12, 'кальмар'),
(13, 'капуста'),
(14, 'картофель фри'),
(15, 'комбу'),
(16, 'креветка'),
(17, 'кунжут'),
(18, 'курица'),
(19, 'лапша пшеничная'),
(20, 'лапша удон'),
(21, 'лимон'),
(22, 'лосось'),
(23, 'лук зеленый'),
(24, 'лук кранч'),
(25, 'лук красный'),
(26, 'лук репчатый'),
(27, 'майонез'),
(28, 'малиновое пюре'),
(29, 'маринованные водоросли'),
(30, 'масло кунжутное'),
(31, 'минеральная вода'),
(32, 'мирин'),
(33, 'мицукан'),
(34, 'морковь'),
(35, 'морской коктейль '),
(36, 'моцарелла'),
(37, 'мука'),
(38, 'мята'),
(39, 'нори'),
(40, 'облепиха'),
(41, 'огурец'),
(42, 'ореховый соус'),
(43, 'основа для том ям'),
(44, 'перец болгарский'),
(45, 'перец чили'),
(46, 'песочное тесто'),
(47, 'помидор'),
(48, 'приправа для курицы'),
(49, 'рис'),
(50, 'рисовое тесто'),
(51, 'сахар'),
(52, 'сладкие красные бобы'),
(53, 'сливки'),
(54, 'сливочный сыр'),
(55, 'снежный краб'),
(56, 'соевый соус'),
(57, 'соль'),
(58, 'сосиска'),
(59, 'соус лава'),
(60, 'соус сливочный'),
(61, 'соус унаги'),
(62, 'стружка тунца'),
(63, 'стручковая фасоль'),
(64, 'сухари панировочные'),
(65, 'сыр'),
(66, 'сырный бульон'),
(67, 'тамари'),
(68, 'творожено-сливочная основа'),
(69, 'тесто для кексов'),
(70, 'тесто для корндога'),
(71, 'тобико'),
(72, 'тортилья сырная'),
(73, 'угорь'),
(74, 'устричный соус'),
(75, 'чёрная смородина'),
(76, 'чеснок'),
(77, 'чесночные сухари'),
(78, 'шампиньон'),
(79, 'шоколад'),
(80, 'шпинат'),
(81, 'эноки'),
(82, 'яйцо'),
(83, 'Филадельфия'),
(84, 'Ойси Сяки'),
(85, 'Похотливый краб'),
(86, 'ВсуниУни'),
(87, 'КусиСюси'),
(88, 'Таки Сяки'),
(89, 'Каппа Маки'),
(90, 'Цезарь темпура'),
(91, 'Эби'),
(92, 'Сяки'),
(93, 'Унаги'),
(94, 'Икура Гункан');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_id` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `time` time DEFAULT NULL,
  `cost` float NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `status`, `user_id`, `address`, `time`, `cost`, `updated_at`, `created_at`, `comment`) VALUES
(1, 'готовится', 2, 'ул.пупкина, д. залупкина, под. 1, кв. 16', '09:53:01', 4547, '2024-04-25', '2024-04-24', NULL),
(2, 'ждет курьера', 2, 'ул.пупкина, д. залупкина, под. 1, кв. 16', '10:32:05', 4547, '2024-04-24', '2024-04-24', NULL),
(3, 'ждет курьера', 2, 'ул.пупкина, д. залупкина, под. 1, кв. 16', '10:32:25', 3427, '2024-04-24', '2024-04-24', NULL),
(4, 'в доставке', 3, 'ул.пупкина, д. залупкина, под. 1, кв. 16', '15:38:36', 7374, '2024-04-25', '2024-04-24', NULL),
(5, 'готовится', 1, 'ул.1, д. S, под. D, кв. F', '16:16:29', 29, '2024-04-25', '2024-04-24', NULL),
(6, 'в доставке', 2, 'ул.пупкина, д. залупкина, под. 1, кв. 16', '17:12:25', 2898, '2024-04-25', '2024-04-24', NULL),
(7, 'Ожидает модерации', 5, 'ул.пушкина, д. 12, под. 12, кв. 12', '20:09:53', 3148, '2024-04-24', '2024-04-24', NULL),
(8, 'Ожидает модерации', 5, 'ул., д. , под. , кв. ', '10:20:37', 1449, '2024-04-25', '2024-04-25', NULL),
(9, 'отклонен', 5, 'ул., д. , под. , кв. ', '10:26:07', 1699, '2024-04-25', '2024-04-25', NULL),
(10, 'Ожидает модерации', 1, 'ул., д. , под. , кв. ', '13:13:47', 58, '2024-04-25', '2024-04-25', NULL),
(11, 'Ожидает модерации', 1, 'ул., д. , под. , кв. ', '20:17:00', 58, '2024-04-25', '2024-04-25', NULL),
(12, 'в очереди', 3, 'ул.Пп, д. 2, под. 2, кв. 5', '18:03:00', 4876, '2024-04-25', '2024-04-25', NULL),
(13, 'Ожидает модерации', 3, 'ул.Hdhd, д. 3123131, под. 1, кв. 45', '17:12:00', 87, '2024-04-25', '2024-04-25', NULL),
(14, 'Ожидает модерации', 3, 'ул.Hxhd, д. 123, под. 1, кв. 31231', '17:15:00', 29, '2024-04-25', '2024-04-25', NULL),
(15, 'Ожидает модерации', 3, 'ул.Hdhdh, д. 3123131, под. 3213123, кв. 1', '17:16:00', 29, '2024-04-25', '2024-04-25', NULL),
(16, 'Ожидает модерации', 3, 'ул.пупкина, д. 22, под. 1, кв. 16', '17:00:00', 448, '2024-04-26', '2024-04-26', 'хачу пива');

-- --------------------------------------------------------

--
-- Структура таблицы `order_list`
--

CREATE TABLE `order_list` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `food_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `food_id`) VALUES
(1, 1, 38),
(2, 1, 39),
(3, 1, 40),
(4, 2, 38),
(5, 2, 39),
(6, 2, 40),
(7, 3, 40),
(8, 3, 41),
(9, 3, 22),
(10, 4, 38),
(11, 4, 39),
(12, 4, 40),
(13, 4, 40),
(14, 4, 40),
(15, 4, 42),
(16, 5, 42),
(17, 6, 38),
(18, 6, 38),
(19, 7, 38),
(20, 7, 39),
(21, 8, 38),
(22, 9, 39),
(23, 10, 42),
(24, 10, 42),
(25, 11, 45),
(26, 11, 45),
(27, 12, 38),
(28, 12, 39),
(29, 12, 39),
(30, 12, 42),
(31, 13, 42),
(32, 13, 42),
(33, 13, 42),
(34, 14, 42),
(35, 15, 42),
(36, 16, 19),
(37, 16, 43);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `privilege` int NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `login`, `privilege`, `remember_token`, `created_at`, `updated_at`, `number`, `birth`) VALUES
(1, '123', 'test@mail.ru', '$2y$12$J6h.9lnbVIWvBuR07WZh4On1tCPvmXNLZ2xC.2PMKGs96LaVokpKa', 'lollipop', 3, NULL, '2024-04-22 06:18:35', '2024-04-22 06:18:35', '', NULL),
(2, 'Никита', 'superpuper@mail.ru', '$2y$12$I7CVeY1bK953rMSb.xpe3uuiNv5BxUcmSPvhqTU.7KzaL4AtM/512', 'Inkashi', 1, NULL, '2024-04-25 06:45:42', '2024-04-25 09:24:13', '89821408125', '2024-04-10'),
(3, 'Влад', 'nirvanav.39@gmail.com', '$2y$12$GHQNVcst7efQ2Kn6NrgRLe4c6qStLdrgfEDvSJSAM1URMNvYaYoEW', 'Vlad', 0, NULL, '2024-04-25 09:00:19', '2024-04-25 09:00:19', '79505228997', '2004-05-27'),
(4, 'Nikitka', 'sobaka@mail.ru', '$2y$12$iky5hFEV7EHy/1u0BIy4GuLvterH.guImuHIFBxGSlAiR9QgxX5sa', '123321123', 0, NULL, '2024-04-25 14:51:02', '2024-04-25 14:51:02', '22222222222', '2024-04-04'),
(5, 'lololoshka', 'lololoshka@mail.ru', '$2y$12$n0SMoTX9hd.IzsP3uDvx6ee88W9hXGMR0DeG.2fvoFnGKvknYbB3.', 'lololoshka', 0, NULL, '2024-04-25 14:51:50', '2024-04-25 14:51:50', '11111111111', '2024-04-06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courier_orders`
--
ALTER TABLE `courier_orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `food_ingridient`
--
ALTER TABLE `food_ingridient`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ingridient`
--
ALTER TABLE `ingridient`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courier_orders`
--
ALTER TABLE `courier_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `food`
--
ALTER TABLE `food`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `food_ingridient`
--
ALTER TABLE `food_ingridient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT для таблицы `ingridient`
--
ALTER TABLE `ingridient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
