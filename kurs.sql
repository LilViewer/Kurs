-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 26 2022 г., 16:13
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kurs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `akk`
--

CREATE TABLE `akk` (
  `id_akk` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `case_description` varchar(255) NOT NULL,
  `price_standart` int NOT NULL,
  `price_infinite` int NOT NULL,
  `discount` int NOT NULL,
  `date_release` date NOT NULL,
  `min_OS` text NOT NULL,
  `min_Processor` text NOT NULL,
  `min_RAM` int NOT NULL,
  `min_Video_Card` text NOT NULL,
  `rec_OS` text NOT NULL,
  `rec_Processor` text NOT NULL,
  `rec_RAM` int NOT NULL,
  `rec_Video_Card` text NOT NULL,
  `Size` int NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `akk`
--

INSERT INTO `akk` (`id_akk`, `name`, `case_description`, `price_standart`, `price_infinite`, `discount`, `date_release`, `min_OS`, `min_Processor`, `min_RAM`, `min_Video_Card`, `rec_OS`, `rec_Processor`, `rec_RAM`, `rec_Video_Card`, `Size`, `description`) VALUES
(1, 'Minecraft полный доступ', 'Получай доступ к безграничным возможностям полного доступа.', 235, 535, 20, '2011-04-18', 'Windows 7, 8.1, 10; OS X 10.9 Maverick; Linux', 'Intel Core i3-3210', 2, 'Intel HD Graphics 4000 с поддержкой OpenGL 4.4', ' Windows 7, 8.1, 10; OS X 10.9 Maverick; Linux ', 'Intel Core i5-4690', 4, 'GeForce 700 Series с поддержкой OpenGL 4.5', 4, 'Большую часть времени придется рыть шахты в поисках полезных ископаемых. Из них строить механизмы. Например, вначале нужно немного камня для печи, в ней переплавляется руда в чистый металл. Есть очень редкие элементы, чтобы добраться до них, нужно перекопать не одну тысячу кубиков.\r\n\r\nНекоторые материалы находятся в других мирах. Чтобы добыть кварц, придется нырнуть в подземный мир. Там горят огни, а вместо воды течет лава. Ужасные монстры встретятся каждому, кто осмелится туда войти.'),
(2, 'Minecraft + Сайт', 'Лучшее соотношение цены и качества.', 100, 360, 20, '2011-04-18', 'Windows 7, 8.1, 10; OS X 10.9 Maverick; Linux', 'Intel Core i3-3210', 2, 'Intel HD Graphics 4000 с поддержкой OpenGL 4.4', ' Windows 7, 8.1, 10; OS X 10.9 Maverick; Linux ', 'Intel Core i5-4690', 4, 'GeForce 700 Series с поддержкой OpenGL 4.5', 4, 'Большую часть времени придется рыть шахты в поисках полезных ископаемых. Из них строить механизмы. Например, вначале нужно немного камня для печи, в ней переплавляется руда в чистый металл. Есть очень редкие элементы, чтобы добраться до них, нужно перекопать не одну тысячу кубиков.\r\n\r\nНекоторые материалы находятся в других мирах. Чтобы добыть кварц, придется нырнуть в подземный мир. Там горят огни, а вместо воды течет лава. Ужасные монстры встретятся каждому, кто осмелится туда войти.'),
(3, 'Minecraft + лаунчер', 'Дешевый товар позволяющий играть на лицензионых серверах.', 59, 359, 20, '2011-04-18', 'Windows 7, 8.1, 10; OS X 10.9 Maverick; Linux', 'Intel Core i3-3210', 2, 'Intel HD Graphics 4000 с поддержкой OpenGL 4.4', ' Windows 7, 8.1, 10; OS X 10.9 Maverick; Linux ', 'Intel Core i5-4690', 4, 'GeForce 700 Series с поддержкой OpenGL 4.5', 4, 'Большую часть времени придется рыть шахты в поисках полезных ископаемых. Из них строить механизмы. Например, вначале нужно немного камня для печи, в ней переплавляется руда в чистый металл. Есть очень редкие элементы, чтобы добраться до них, нужно перекопать не одну тысячу кубиков.\r\n\r\nНекоторые материалы находятся в других мирах. Чтобы добыть кварц, придется нырнуть в подземный мир. Там горят огни, а вместо воды течет лава. Ужасные монстры встретятся каждому, кто осмелится туда войти.');

-- --------------------------------------------------------

--
-- Структура таблицы `akk_developer`
--

CREATE TABLE `akk_developer` (
  `id` int NOT NULL,
  `id_akk` int NOT NULL,
  `id_developer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `akk_developer`
--

INSERT INTO `akk_developer` (`id`, `id_akk`, `id_developer`) VALUES
(4, 1, 14),
(5, 2, 14),
(6, 3, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `akk_genre`
--

CREATE TABLE `akk_genre` (
  `id` int NOT NULL,
  `id_akk` int NOT NULL,
  `id_genre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `akk_genre`
--

INSERT INTO `akk_genre` (`id`, `id_akk`, `id_genre`) VALUES
(1, 1, 7),
(2, 2, 7),
(3, 3, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `akk_log_akk`
--

CREATE TABLE `akk_log_akk` (
  `id` int NOT NULL,
  `id_akk` int NOT NULL,
  `id_log_akk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `akk_log_akk`
--

INSERT INTO `akk_log_akk` (`id`, `id_akk`, `id_log_akk`) VALUES
(21, 1, 21),
(30, 2, 32),
(31, 2, 25),
(32, 2, 26),
(33, 2, 27),
(34, 2, 24),
(35, 2, 25),
(36, 2, 26),
(37, 2, 27),
(38, 2, 28),
(39, 2, 29),
(40, 2, 30),
(41, 2, 31),
(42, 2, 24),
(43, 2, 25),
(44, 2, 26),
(45, 2, 27),
(46, 2, 28),
(47, 2, 29),
(48, 2, 30),
(49, 2, 31),
(50, 1, 33),
(52, 1, 34);

-- --------------------------------------------------------

--
-- Структура таблицы `akk_publisher`
--

CREATE TABLE `akk_publisher` (
  `id` int NOT NULL,
  `id_akk` int NOT NULL,
  `id_publisher` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `akk_publisher`
--

INSERT INTO `akk_publisher` (`id`, `id_akk`, `id_publisher`) VALUES
(4, 1, 16),
(5, 2, 16),
(6, 3, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `cupon`
--

CREATE TABLE `cupon` (
  `id` int NOT NULL,
  `cupon` varchar(59) NOT NULL,
  `discount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `cupon`
--

INSERT INTO `cupon` (`id`, `cupon`, `discount`) VALUES
(1, 'VIEWER', 20),
(18, 'HH2', 50);

-- --------------------------------------------------------

--
-- Структура таблицы `developer`
--

CREATE TABLE `developer` (
  `id_developer` int NOT NULL,
  `name_developer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `developer`
--

INSERT INTO `developer` (`id_developer`, `name_developer`) VALUES
(1, 'Pieces Interactive'),
(2, 'Techland'),
(3, 'Massive Entertainment'),
(4, ' Firaxis Games'),
(5, ' Aspyr (Mac)'),
(6, ' Aspyr (Linux)'),
(7, 'Ryu Ga Gotoku Studio'),
(8, 'Gearbox Software'),
(9, 'Fatshark'),
(10, 'Ubisoft'),
(11, 'FromSoftware, Inc.'),
(12, 'CAPCOM Co., Ltd.'),
(14, 'MOJANK');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id_genre` int NOT NULL,
  `name_genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id_genre`, `name_genre`) VALUES
(1, 'Ролевые игры'),
(2, 'Экшены'),
(3, 'Стратегии'),
(4, 'Приключенческие игры'),
(5, 'ИНДИ'),
(6, 'SHIVER'),
(7, 'Инди песочница');

-- --------------------------------------------------------

--
-- Структура таблицы `help`
--

CREATE TABLE `help` (
  `id` int NOT NULL,
  `text` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `help`
--

INSERT INTO `help` (`id`, `text`, `user_id`, `date`) VALUES
(6, 'hwegagwehweh', 1, '2021-04-21'),
(7, 'qwhashewhwehweshsdh', 1, '2021-04-21'),
(8, 'qwhashewhwehweshsdh', 1, '2021-04-21'),
(9, 'qwhashewhwehweshsdh', 1, '2021-04-21'),
(10, 'Пенис ', 1, '2021-04-21'),
(11, 'Пенис ', 1, '2021-04-21');

-- --------------------------------------------------------

--
-- Структура таблицы `key_`
--

CREATE TABLE `key_` (
  `id_key` int NOT NULL,
  `key_` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `key_`
--

INSERT INTO `key_` (`id_key`, `key_`) VALUES
(20, 'GOIH49835Y817YG'),
(28, 'geghedrhner3463'),
(29, 'geghedrhner3463'),
(30, 'geghedrhner3463'),
(31, 'mrtmrasfwet'),
(32, 'nfnrfnbsdvgawg'),
(33, 'nfnrfnbsdvgawg'),
(35, 'mnmefanytjtr'),
(37, 'nedrasfbtrhnrtn'),
(38, 'nfgndehbevgbnrtjr'),
(39, 'asgagqweg'),
(40, 'asgagqweg'),
(41, 'asgagqweg'),
(42, 'asgagqweg'),
(43, 'gergsdgsdg'),
(44, 'gergsdgsdg'),
(45, 'gergsdgsdg'),
(46, 'gergsdgsdg'),
(47, 'gergsdgsdg'),
(48, '34asf6dwqaffjdhga'),
(49, '34asf6dwqaffjdhga'),
(50, 'ergdsgshjerhw'),
(51, 'nerhbfagntyjr'),
(52, 'hrhsdfewfqwf'),
(53, 'hrhsdfewfqwf'),
(54, 'hrhsdfewfqwf'),
(55, 'gsegasgtryedrgsg'),
(56, 'gsegasgtryedrgsg'),
(57, 'gsegasgtryedrgsg'),
(58, 'fafnjfhwerfdasf'),
(59, 'jrtgasfbdrfgtwerq'),
(60, 'hwsegsbnrhjgaq'),
(61, 'hsdrgasfvgnjmrtfyhew'),
(62, 'afnrthasfnytrur'),
(63, 'afnrthasfnytrur'),
(65, 'afnrthasfnytrur'),
(66, 'afnrthasfnytrur'),
(67, 'rtnjfafwehyrtjkrtj'),
(68, 'jergasvfnftgjrt'),
(69, 'jsthdsvgbdshgewrhe'),
(70, 'sftjtrsgbhdshrehe'),
(72, '');

-- --------------------------------------------------------

--
-- Структура таблицы `log_akk`
--

CREATE TABLE `log_akk` (
  `id_log_akk` int NOT NULL,
  `log` text NOT NULL,
  `pas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `log_akk`
--

INSERT INTO `log_akk` (`id_log_akk`, `log`, `pas`) VALUES
(21, 'jvg09=34j2jfgope', 'jbv0er9jg093'),
(24, 'ghwes[o0gho0ih', 'hbo9wehr-9bgi'),
(25, 'ibher9-0th23ithn', 'nhbwebhn-[iqhnqi'),
(26, 'gsgqagasg', 'jerjasfafs'),
(27, 'herhsdfg', 'jerjwserfas'),
(28, 'hnswga', 'rthjergwseg'),
(29, 'hqwhgasf', 'ntrhehgqawg'),
(30, 'rktjgasg', 'jrthertqwt'),
(31, 'rktjgasg', 'jrthertqwt'),
(32, 'hsgasg', 'jerhweqwr'),
(33, 'рцурцыу', 'укоукоуко'),
(34, 'рукрукр', 'фпцпйцпцйп');

-- --------------------------------------------------------

--
-- Структура таблицы `otziv`
--

CREATE TABLE `otziv` (
  `id_comm` int NOT NULL,
  `id_tovar` int NOT NULL,
  `author_comm` varchar(255) NOT NULL,
  `text_comm` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `otziv`
--

INSERT INTO `otziv` (`id_comm`, `id_tovar`, `author_comm`, `text_comm`, `date`) VALUES
(8, 1, 'admin', 'фпйцпячс\r\n					', '2021-04-07'),
(10, 1, 'admin', '\r\n		куокеойца			', '2021-04-07'),
(11, 1, 'admin', '\r\nфыаацйцпрукр					', '2021-04-07'),
(13, 4, 'admin', 'qwtqwt\r\n					', '2021-04-07'),
(15, 4, 'admin', 'erhgerherh\r\n					', '2021-04-07'),
(17, 4, 'admin', 'asdasd\r\n					', '2021-04-07'),
(19, 4, 'admin', 'qwtqtqw\r\n					', '2021-04-07'),
(141, 4, 'admin', '\r\n			asgasg		', '2021-04-07'),
(142, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(144, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(145, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(146, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(147, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(148, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(149, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(150, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(151, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(152, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(153, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(154, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(155, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(156, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(157, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(158, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(159, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(160, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(161, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(162, 4, 'viewer', 'Главный майор\r\n					', '2021-04-07'),
(163, 4, 'viewer', 'Глав пенис', '2021-04-07'),
(164, 4, 'viewer', 'Глав пенис', '2021-04-07'),
(165, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(166, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(167, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(168, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(169, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(170, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(171, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(172, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(173, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(174, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(175, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(176, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(177, 4, 'viewer', '\r\n		ццц			', '2021-04-07'),
(178, 2, 'viewer', '\r\n	qweqwe				', '2021-04-08'),
(179, 2, 'viewer', '\r\n	qweqwe				', '2021-04-08'),
(180, 1, 'VIEWER', '\r\n	qwqgqwgdfhrthnfnddddddddddddtrherghewgaqwsg				', '2021-04-09'),
(181, 1, 'VIEWER', '\r\n	qwqgqwgdfhrthnfnddddddddddddtrherghewgaqwsg				', '2021-04-09'),
(183, 6, 'VIEWER', '\r\n			hwehwehewhweh		', '2021-04-11'),
(184, 6, 'VIEWER', '\r\n			hwehwehewhweh		', '2021-04-11'),
(185, 6, 'VIEWER', '\r\n			hwehwehewhweh		', '2021-04-11'),
(186, 6, 'VIEWER', '\r\n			hwehwehewhweh		', '2021-04-11'),
(187, 6, 'VIEWER', '\r\n			hwehwehewhweh		', '2021-04-11'),
(200, 1, 'VIEWER', '\r\n	asfafsa				', '2021-04-14'),
(207, 1, 'VIEWER', '\r\n			ы		', '2021-04-14'),
(208, 1, 'VIEWER', '\r\n			ы		', '2021-04-14');

-- --------------------------------------------------------

--
-- Структура таблицы `otziv_akk`
--

CREATE TABLE `otziv_akk` (
  `id_comm` int NOT NULL,
  `id_akk` int NOT NULL,
  `author_comm` varchar(255) NOT NULL,
  `text_comm` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `otziv_akk`
--

INSERT INTO `otziv_akk` (`id_comm`, `id_akk`, `author_comm`, `text_comm`, `date`) VALUES
(1, 1, 'viewer', 'asfwqf\r\n					', '2021-04-08'),
(2, 1, 'viewer', 'asfwqf\r\n					', '2021-04-08'),
(3, 2, 'viewer', '\r\nasfwqf					', '2021-04-08'),
(4, 2, 'viewer', '\r\nasfwqf					', '2021-04-08');

-- --------------------------------------------------------

--
-- Структура таблицы `publisher`
--

CREATE TABLE `publisher` (
  `id_publisher` int NOT NULL,
  `name_publisher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `publisher`
--

INSERT INTO `publisher` (`id_publisher`, `name_publisher`) VALUES
(1, 'Paradox Interactive'),
(2, 'Techland Publishing'),
(3, 'Ubisoft'),
(4, ' 2K'),
(5, 'Aspyr (Mac)'),
(6, 'Aspyr (Linux)'),
(7, 'SEGA'),
(8, 'Fatshark'),
(9, 'FromSoftware, Inc.'),
(10, 'BANDAI NAMCO Entertainment'),
(11, 'CAPCOM Co., Ltd.'),
(15, 'HRTA'),
(16, 'MOJANK');

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id_tovar` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `discount` int NOT NULL,
  `date_release` date NOT NULL,
  `description` text NOT NULL,
  `min_OS` text NOT NULL,
  `min_Processor` text NOT NULL,
  `min_RAM` int NOT NULL,
  `min_Video_Card` text NOT NULL,
  `rec_OS` text NOT NULL,
  `rec_Processor` text NOT NULL,
  `rec_RAM` int NOT NULL,
  `rec_Video_Card` text NOT NULL,
  `Size` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id_tovar`, `name`, `price`, `discount`, `date_release`, `description`, `min_OS`, `min_Processor`, `min_RAM`, `min_Video_Card`, `rec_OS`, `rec_Processor`, `rec_RAM`, `rec_Video_Card`, `Size`) VALUES
(1, 'DYING LIGHT', 500, 60, '2015-01-22', 'От создателей популярных проектов Dead Island и Call of Juarez. Свыше 50 наград и номинаций от игровой индустрии. Именно эта игра про зомби от первого лица установила новые стандарты жанра. Даже спустя годы после выхода для игры выпускаются новые материалы и проводятся бесплатные события сообщества. Попробуйте выжить в городе, где бушует зомби-вирус! Во время этого спецзадания вам предстоит принимать нелегкие решения. Окажется ли преданность начальству выше желания спасти выживших? Выбор за вами...', 'Windows 7', 'Intel Core i5-2500 с 3,3 ГГц ', 6, 'NVIDIA GeForce GTX 560', 'Windows 7', 'Intel Core i5-4670K с 3,4 ГГц', 12, 'NVIDIA GeForce GTX 780', 50),
(2, 'BORDERLANDS 3', 2000, 60, '2019-10-13', 'Всеми любимый шутер с горами лута возвращается, приготовив ТОННЫ стволов и безбашенные приключения. Вас — одного из четырех новых искателей Хранилища — ждут ураганные бои в неизведанных мирах с новыми противниками Играйте в одиночку или вместе с друзьями, сражайтесь с совершенно безумными врагами, загрузитесь трофеями под завязку и спасите свой дом от самых безжалостных главарей секты во всей галактике.', 'Windows 7', ' Intel i5-3570', 6, ' NVIDIA GeForce GTX 680 (2 ГБ)', 'Windows 10', 'Intel i7-4770\r\n', 16, ' NVIDIA GeForce GTX 1060 (6 ГБ)', 75),
(3, 'SID MEIER’S CIVILIZATION VI', 500, 60, '2016-08-21', 'Изначально созданная легендарным дизайнером Сидом Мейером, Civilization представляет собой пошаговую стратегию, в которой игроку предлагается построить империю, способную выдержать испытание временем. Станьте одним из сильных мира сего, основав цивилизацию и возглавив ее в течение многих эпох, начиная с каменного века и заканчивая веком информации. Объявляйте войны, ведите дипломатические переговоры, развивайте культуру и бросьте вызов величайшим лидерам в истории человечества, чтобы построить величайшую цивилизацию из всех, когда-либо известных человечеству.\r\n\r\nCivilization VI предлагает множество новых способов взаимодействия с игровым миром: теперь города растут, занимая все больше и больше места на карте, ваши действия влияют на ход научных исследований и культурной жизни цивилизации, а противники преследуют различные цели в зависимости от своих исторических черт в попытках достигнуть один из пяти способов одержать окончательную победу.', 'Windows 7 / 8.1 / 10 (64-разрядная)', 'Intel Core i3 с 2,5 ГГц, AMD Phenom II с 2,6 ГГц', 4, '1 Гб видеопамяти, AMD 5570, nVidia 450 или Intel Integrated Graphics 530', 'Windows 7 / 8.1 / 10 (64-разрядная)', '4-е поколение Intel Core i5 с 2,5 ГГц, AMD FX8350 с 4 ГГц', 8, '2 Гб видеопамяти, AMD 7970, nVidia 770', 12),
(4, 'TOM CLANCYS THE DIVISION', 460, 59, '2016-03-08', 'Незадолго до Рождества Нью-Йорк охватывает чудовищная пандемия. Общественные и государственные службы одна за другой перестают функционировать, начинаются перебои с водой, едой и электричеством. Всего за несколько дней улицы города охватывает хаос. И тогда в дело вступает Спецотряд — особое подразделение оперативных агентов. В мирное время они ведут самую обычную жизнь, но когда приходит беда, они начинают действовать. Задача Спецотряда — спасти общество.\r\n\r\nКогда рушится мир, мы его опора.', 'Windows 7, Windows 8.1, Windows 10 64bit', 'Intel Core i5-2400 / AMD FX-6100', 6, 'NVIDIA GeForce GTX 760 / AMD Radeon HD 7770 2 GB VRAM', 'Windows 7, Windows 8.1, Windows 10 64bit', 'Intel Core i7-3770 / AMD FX-8350', 8, 'NVIDIA GeForce GTX 970 / AMD Radeon R9 290', 40),
(5, 'WARHAMMER VERMINTIDE 2', 129, 65, '2018-03-08', 'Warhammer: Vermintide 2 – это сиквел полюбившейся всем игры Vermintide. Настало время вновь погрузиться в свирепое кооперативное рубилово от первого лица, где вас ждут неистовые первоклассные рукопашные схватки в апокалиптическом Конце Времен истерзанного войной мира Warhammer Fantasy Battles.\r\n\r\nПятерка наших героев вернулась, чтобы сразиться с еще большей угрозой – объединенными силами злобной и разрушительной армии Хаоса и кишащего полчища скавенов. Приготовьтесь столкнуться с такими испытаниями, которых еще не встречали, отчаянно пытаясь выжить в бесконечной резне. Выбирайте среди 15 различных профессий, поднимайтесь к вершинам деревьев талантов, подстраивайте арсенал под свой уникальный стиль игры, пробивайтесь через множество потрясающих уровней и испытайте себя в нашей новой системе героических деяний. Единственное, что стоит между сокрушительным поражением и победой, – это вы и ваши союзники. Падете вы – падет Империя.', 'Windows 7 / 8 / 8.1 / 10 (64-разрядная)', 'Intel Core i5-2300 с 2,8 ГГц / AMD FX-4350 с 4,2 ГГц', 6, 'NVIDIA GeForce GTX 460 или AMD Radeon HD 5870', 'Windows 10 (64-разрядная)', 'Intel Core i7- 3770 с 3,5 ГГц или AMD FX-8350 с 4 ГГц', 8, 'NVIDIA GeForce GTX 970/1060 или ATI Radeon серии R9', 100),
(6, 'DARK SOULS 3', 489, 53, '2016-04-12', 'Огонь гаснет, мир обращается в руины, и вам предстоят сражения с еще более колоссальными врагами. Традиционная мрачная и атмосфера, напряженные битвы и еще более динамичный геймплей.\r\nЛишь угли тлеют во мраке... Соберитесь с духом и погрузитесь во тьму!', 'Windows 7 SP1 / Windows 8.1 / Windows 10 (64-разрядная)', 'Intel Core i3-2100 / AMD FX-6300', 4, 'NVIDIA GeForce GTX 750 Ti / ATI Radeon HD 7950', 'Windows 7 SP1 / Windows 8.1 / Windows 10 (64-разрядная)', 'Intel Core i7-3770 / AMD FX-8350', 8, 'NVIDIA GeForce GTX 970 / ATI Radeon R9', 25),
(7, 'YAKUZA 6 THE SONG OF LIFE', 1000, 56, '2021-03-25', 'В Yakuza 6 Кадзуме Кирю предстоит распутать узел мрачных происшествий и ответить на вопрос, чем готов пожертвовать человек ради своей семьи — а близких людей не всегда связывают одни лишь кровные узы. Проведя в тюрьме три года, постаревший и много повидавший Кирю узнаёт о таинственном исчезновении его приемной дочери Харуки. След приводит его на знакомые улицы Камуро-тё, где он вскоре выясняет, что Харуку сбил автомобиль, и теперь она лежит в коме. Мало того, оказывается, что у Харуки появился сын, за которым Кирю должен присматривать. И теперь Кирю — с младенцем на руках — должен отправиться прибрежный городок Ономити, чтобы узнать правду о Харуке и ее сыне, а также разгадать зловещую тайну местных якудза.\r\n\r\nСюжет игры Yakuza 6 развернется в двух местах — это невероятно реалистичный Ономити, прелестный и тихий портовый городок в префектуре Хиросима, а также еще более неотразимый Камуро-тё, крупнейший квартал красных фонарей в Токио. Как всегда, вы увидите мрачную криминальную историю и ураганные бои, а также массу соблазнов и развлечений, которыми наполнены эти два столь разных, но одинаково прекрасных места.', 'Windows 10', 'Intel Core i5-3470 | AMD FX-6300', 4, 'Nvidia GeForce GTX 660, 2 Гб | AMD Radeon HD 7870, 2 Гб', 'Windows 10', 'Intel Core i7-6700 | AMD Ryzen 5 2600', 6, 'Nvidia GeForce GTX 1070, 8 Гб | AMD Radeon RX Vega 56, 8 Гб', 40),
(8, 'WATCH DOGS 2', 456, 23, '2016-11-29', 'УПРАВЛЯЙТЕ СВОИМ ВЗГЛЯДОМ\r\nВаш персонаж - Маркус Холлоуэй, и его задача - уничтожить систему ctOS 2.0. Вместе с устройствами Tobii взгляд станет вашим секретным оружием в борьбе против корпорации \"Блюм\", которая пытается взять под контроль Сан-Франциско.\r\n\r\nС новой технологией, позволяющей считывать направление взгляда, вам станет проще целиться в неприятеля, прятаться за укрытиями, исследовать игровой мир и использовать \"интернет вещей\" в своих целях. Вам станут доступны новые возможности: быстро отмечать врагов, которые прячутся за укрытиями, взаимодействовать с предметами окружения, находить безопасные зоны и выбирать объекты для взлома. Мы можем гарантировать: в ситуации, когда информация обладает поистине разрушительной силой, взлом цифрового \"мозга\" города будет происходить в соответствии именно с вашим видением.', '64bit Windows 7 SP1, Windows 8.1, Windows 10', 'Intel Core i5 2400S 2.5GHz / AMD FX 6120 3.5GHz', 6, 'NVIDIA GeForce GTX 660 2GB / AMD Radeon HD 7870 2GB', '64bit Windows 7 SP1, Windows 8.1, Windows 10', 'Intel Core i5 3470 3.2GHz / AMD FX 8120 3.9GHz', 8, 'NVIDIA GeForce GTX 780 3GB / NVIDIA GeForce GTX 970 4GB / NVIDIA GeForce GTX 1060 3GB / AMD Radeon R9 290 4GB', 50),
(9, 'RESIDENT EVIL 3', 599, 70, '2020-04-03', 'Только Джилл Валентайн знает о преступлениях корпорации «Амбрелла». Чтобы остановить ее, «Амбрелла» использует секретное оружие: Немезис!\r\n\r\nВ комплект входит новая сетевая игра Resident Evil Resistance, в которой четверо выживших бросают вызов зловещему Высшему разуму и пытаются сбежать из его плена.', 'Windows 7/ 8/ 10 64bit', 'Intel Core i5-4460 / AMD FX-6300', 8, 'GeForce GTX 760 / AMD Radeon R7 260x 2GB', 'Windows 10 64bit', 'Intel Core i7-3770 / AMD FX-9590', 8, 'GeForce GTX 1060 / AMD Radeon RX 480 3GB', 45),
(10, 'MAGICKA 2', 153, 56, '2015-05-26', 'Мир Magicka наполнен безумием под завязку: отсылок и шуток полны диалоги и случайные фразы, контента в игре на зависть самым мастистым РПГ, а как доходит до боя, то схлопотать в пылу схватки распыляющий луч от союзного мага – нечего делать. Или создать черную дыру. Или накрыть поле боя метеоритом. В общем, умирать вы будете чаще от рук друзей (или от своих собственных), но в этом прелесть первой части – в этом прелесть и второй.\r\n\r\nЕсли вы не слышали про Magicka, объяснить, что это такое, будет сложно. Это очень веселый аркадно-ролевой экшн, который ориентирован на прохождение с друзьями (от двух до четырех человек в лобби) и уничтожение просто невообразимого количества скелетов, огров и прочей нечисти и чисти, которая встанет у вас на пути. Попутно раскапываем сундуки в поисках новых мантий и посохов, выполняем невероятные в своей нелепости сторонние задания и от души смеемся над шутками, которые разработчики щедрой рукой рассыпали вдоль повествования.', 'Windows 7, Windows 8, Windows 10', 'Intel Pentium G3220 / AMD A4-4000 3GHz', 2, 'NVIDIA GeForce 550 / ATI Radeon HD 5850', 'Windows 7, Windows 8, Windows 10', 'Intel Core i5-2300 / AMD A8-3850 2.8GHz', 4, 'NVIDIA GeForce 640 / ATI Radeon HD 6670', 3),
(16, 'Mortal Kombat 11', 310, 50, '2019-04-22', 'Mortal Kombat возвращается! И это лучшая версия культовой франшизы.\r\n\r\nСтандартное издание Mortal Kombat 11 включает:\r\n• Основную игру\r\n\r\nПользовательские настройки персонажей дарят возможность создавать бойцов по своему вкусу. Новый графический движок демонстрирует все зубодробительные моменты, погружая в бой до ощущения абсолютной реальности. Целая армия новых и классических бойцов и лучший в классе сюжетный режим продолжают 25-летние традиции этой саги.', '64-bit Windows 7 / Windows 10', 'Intel Core i5-750, 2.66 GHz / AMD Phenom II X4 965, 3.4 GHz or AMD Ryzen™ 3 1200, 3.1 GHz', 8, ' NVIDIA® GeForce™ GTX 670 or NVIDIA® GeForce™ GTX 1050 / AMD® Radeon™ HD 7950 or AMD® Radeon™ R9 270', '64-bit Windows 7 / Windows 10', 'Intel Core i5-2300, 2.8 GHz / AMD FX-6300, 3.5GHz or AMD Ryzen™ 5 1400, 3.2 GHz', 8, ' NVIDIA® GeForce™ GTX 780 or NVIDIA® GeForce™ GTX 1060-6GB / AMD® Radeon™ R9 290 or RX 570', 80),
(17, 'DEATH STRANDING', 1399, 60, '2020-04-14', 'Легендарный разработчик Хидео Кодзима выпускает новую знаковую для жанра игру.\r\n\r\nСэм Бриджес должен преодолеть мир, трансформированный Петлёй смерти. Держа в своих руках бессвязные остатки нашего будущего, он отправился в дорогу, чтобы восстановить связь между осколками мира.\r\n\r\nВ главных ролях: Норман Ридус, Мадс Миккельсен, Леа Сейду и Линдси Вагнер.\r\n\r\nДополнительные функции для компьютеров включают ВЫСОКУЮ ЧАСТОТУ КАДРОВ, РЕЖИМ ФОТОСЬЁМКИ и ПОДДЕРЖКУ УЛЬТРАШИРОКОГО МОНИТОРА. Также включает перекрёстный контент из серии игр HALF-LIFE от корпорации Valve.\r\n\r\nВсе копии игры также включают в себя:\r\n• Цифровую книгу «Selections From ‘The Art of DEATH STRANDING’» (от Titan Books)\r\n• СОЛНЕЧНЫЕ ОЧКИ «МАСКИ ЛЮДЕНС» (ХИРАЛЬНОЕ ЗОЛОТО И ОМНИРЕФЛЕКТОР)*\r\n• ЗОЛОТОЙ и СЕРЕБРЯНЫЙ СИЛОВОЙ СКЕЛЕТ*\r\n• ЗОЛОТОЙ и СЕРЕБРЯНЫЙ СКЕЛЕТ-ВЕЗДЕХОД*\r\n• ЗОЛОТУЮ и СЕРЕБРЯНУЮ ЗАЩИТНУЮ БРОНЮ*\r\n\r\n* РАЗБЛОКИРУЙТЕ ВНУТРИИГРОВЫЕ ПРЕДМЕТЫ ПО МЕРЕ ПРОХОЖДЕНИЯ ИГРЫ', 'Windows® 10', 'ntel® Core™ i5-3470 or AMD Ryzen™ 3 1200', 8, ' GeForce GTX 1050 3 GB or AMD Radeon™ RX 560 4 GB', 'Windows® 10', 'Intel™ Core i7-3770 or AMD Ryzen™ 5 1600', 8, 'GeForce GTX 1060 6 GB or AMD Radeon™ RX 590', 80);

-- --------------------------------------------------------

--
-- Структура таблицы `tovar_developer`
--

CREATE TABLE `tovar_developer` (
  `id` int NOT NULL,
  `id_tovar` int NOT NULL,
  `id_developer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tovar_developer`
--

INSERT INTO `tovar_developer` (`id`, `id_tovar`, `id_developer`) VALUES
(1, 10, 1),
(3, 4, 3),
(4, 3, 4),
(5, 3, 5),
(6, 3, 6),
(7, 7, 7),
(8, 2, 8),
(9, 5, 9),
(10, 8, 10),
(11, 6, 11),
(12, 9, 12),
(171, 16, 1),
(172, 16, 3),
(185, 1, 1),
(186, 1, 2),
(187, 1, 5),
(188, 1, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `tovar_genre`
--

CREATE TABLE `tovar_genre` (
  `id` int NOT NULL,
  `id_tovar` int NOT NULL,
  `id_genre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tovar_genre`
--

INSERT INTO `tovar_genre` (`id`, `id_tovar`, `id_genre`) VALUES
(3, 2, 1),
(5, 3, 3),
(6, 4, 2),
(7, 4, 1),
(9, 8, 4),
(10, 6, 1),
(11, 7, 1),
(14, 10, 5),
(17, 10, 2),
(19, 9, 2),
(262, 16, 2),
(263, 16, 3),
(264, 16, 4),
(265, 16, 6),
(275, 1, 2),
(276, 1, 3),
(277, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `tovar_key`
--

CREATE TABLE `tovar_key` (
  `id` int NOT NULL,
  `id_tovar` int NOT NULL,
  `id_key` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tovar_key`
--

INSERT INTO `tovar_key` (`id`, `id_tovar`, `id_key`) VALUES
(20, 4, 20),
(28, 4, 29),
(193, 6, 28),
(194, 6, 33),
(195, 6, 35),
(196, 6, 38),
(197, 3, 39),
(198, 3, 40),
(199, 3, 41),
(200, 3, 42),
(201, 3, 43),
(202, 16, 44),
(203, 16, 47),
(204, 16, 49),
(205, 16, 50),
(206, 16, 51),
(207, 16, 52),
(208, 16, 53),
(209, 16, 54),
(210, 16, 55),
(211, 16, 56),
(212, 16, 57),
(213, 16, 58),
(214, 16, 59),
(215, 16, 60),
(216, 16, 61),
(217, 16, 62),
(223, 9, 63),
(224, 9, 65),
(225, 9, 67),
(226, 9, 69),
(269, 1, 66),
(270, 1, 68),
(271, 1, 70),
(273, 1, 66),
(274, 1, 68),
(275, 1, 70),
(277, 1, 66),
(278, 1, 68),
(279, 1, 70),
(281, 1, 66),
(282, 1, 68),
(283, 1, 70),
(284, 6, 31),
(285, 6, 32),
(286, 6, 45),
(287, 6, 46),
(288, 6, 48),
(289, 6, 31),
(290, 6, 32),
(291, 6, 45),
(292, 6, 46),
(293, 6, 48),
(294, 6, 30),
(295, 6, 30),
(299, 2, 37),
(302, 2, 37);

-- --------------------------------------------------------

--
-- Структура таблицы `tovar_publisher`
--

CREATE TABLE `tovar_publisher` (
  `id` int NOT NULL,
  `id_tovar` int NOT NULL,
  `id_publisher` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tovar_publisher`
--

INSERT INTO `tovar_publisher` (`id`, `id_tovar`, `id_publisher`) VALUES
(1, 10, 1),
(3, 4, 3),
(4, 3, 4),
(5, 3, 6),
(6, 3, 5),
(7, 7, 7),
(8, 2, 4),
(9, 5, 8),
(10, 8, 3),
(11, 6, 9),
(12, 6, 10),
(13, 9, 11),
(139, 16, 1),
(140, 16, 3),
(141, 16, 5),
(148, 1, 2),
(149, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_login` varchar(58) NOT NULL,
  `user_password` varchar(47) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `email`) VALUES
(1, 'VIEWER', 'VIEWER', 'dhdfhdrhr@fasf.com'),
(2, 'ERGE', 'QQQ', 'gasdgq@gag.com'),
(3, 'DENIS', 'DENIS', 'DEMA.COKOL2@GMAIL.COM'),
(4, 'FASF', 'HERHERH', 'GWEGWEG@ASF');

-- --------------------------------------------------------

--
-- Структура таблицы `users_basket`
--

CREATE TABLE `users_basket` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `id_tovar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users_basket`
--

INSERT INTO `users_basket` (`id`, `user_id`, `id_tovar`) VALUES
(498, 3, 1),
(499, 3, 6),
(500, 3, 9),
(501, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `user_basket_akk`
--

CREATE TABLE `user_basket_akk` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `id_akk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `user_hearth`
--

CREATE TABLE `user_hearth` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `id_tovar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user_hearth`
--

INSERT INTO `user_hearth` (`id`, `user_id`, `id_tovar`) VALUES
(258, 3, 1),
(261, 1, 6),
(269, 1, 2),
(270, 3, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `user_hearth_akk`
--

CREATE TABLE `user_hearth_akk` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `id_akk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `user_history`
--

CREATE TABLE `user_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `id_tovar` int DEFAULT NULL,
  `id_akk` int DEFAULT NULL,
  `date` datetime NOT NULL,
  `discount_tovar` int NOT NULL,
  `cupon` int DEFAULT NULL,
  `keys` varchar(20) DEFAULT NULL,
  `log` varchar(20) DEFAULT NULL,
  `pas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user_history`
--

INSERT INTO `user_history` (`id`, `user_id`, `id_tovar`, `id_akk`, `date`, `discount_tovar`, `cupon`, `keys`, `log`, `pas`) VALUES
(113, 1, NULL, 1, '2021-04-14 22:15:35', 20, NULL, NULL, 'gsrege34@gmail.com', 'awfd324grdgh5'),
(114, 1, NULL, 2, '2021-04-14 22:15:35', 20, NULL, NULL, 'bieonrb[oenrbreoi', 'berinbeonenrb[o'),
(115, 1, NULL, 3, '2021-04-14 22:15:35', 20, NULL, NULL, 'boeinrb[obneo', 'beiornbeiornboernboi'),
(116, 1, 10, NULL, '2021-04-14 22:16:13', 56, 20, 'gh398gyh289hgioas', NULL, NULL),
(117, 1, 2, NULL, '2021-04-14 22:16:13', 60, 20, 'GJ048HG2JPASM', NULL, NULL),
(118, 1, 4, NULL, '2021-04-14 22:16:13', 59, 20, 'fdghe5623rasf', NULL, NULL),
(119, 1, NULL, 2, '2021-04-14 22:16:13', 20, 20, NULL, 'b30bh3j4gqoi[apj0w', 'b04h[pwjnfroisne'),
(120, 1, NULL, 3, '2021-04-14 22:16:13', 20, 20, NULL, 'bvw0=thj320fpjh', 'b0ewr9=b34jqh'),
(121, 1, NULL, 1, '2021-04-14 22:16:47', 20, NULL, NULL, 'dbsrhbsebe', 'qwgfer45h4w5h'),
(122, 1, NULL, 2, '2021-04-14 22:16:47', 20, NULL, NULL, 'jvw-0jt4=430tg', 'j09bg42=2h[has'),
(123, 1, NULL, 3, '2021-04-14 22:16:47', 20, NULL, NULL, 'gjvb09=4j9j2305j', 'jb-03ej4=t[q]j'),
(124, 1, 3, NULL, '2021-04-14 22:17:11', 60, 20, 'Y93YGHOIASHGV98', NULL, NULL),
(125, 1, 5, NULL, '2021-04-15 00:29:24', 65, NULL, 'ghj3094g90jqoi', NULL, NULL),
(126, 1, 4, NULL, '2021-04-15 00:29:24', 59, NULL, 'dfgewrt235', NULL, NULL),
(127, 1, 3, NULL, '2021-04-15 00:29:24', 60, NULL, 'G3948GHY98HT', NULL, NULL),
(128, 1, 9, NULL, '2021-04-15 00:29:24', 70, NULL, 'asgasg', NULL, NULL),
(129, 1, 8, NULL, '2021-04-15 00:29:24', 23, NULL, 'jrtjrtjhdgsdgsdg', NULL, NULL),
(130, 1, 7, NULL, '2021-04-15 00:29:24', 56, NULL, 'H298HGHFNOPIAS', NULL, NULL),
(131, 1, NULL, 1, '2021-04-15 00:29:24', 20, NULL, NULL, 'bneoirnberboin', 'bneoirnbe0j23=j[f]q'),
(132, 1, 4, NULL, '2021-04-18 11:19:57', 59, 20, 'hdrfhjtdrjyu456', NULL, NULL),
(133, 3, 2, NULL, '2021-04-21 15:58:07', 60, 20, 'mnmefanytjtr', NULL, NULL),
(134, 3, 1, NULL, '2021-04-21 15:58:07', 60, 20, 'afnrthasfnytrur', NULL, NULL),
(135, 3, 5, NULL, '2021-04-21 15:58:07', 65, 20, 'hshsggqgqw', NULL, NULL),
(136, 1, 4, NULL, '2021-05-07 11:54:47', 59, 20, 't34t5he65wjh4', NULL, NULL),
(137, 1, 8, NULL, '2021-05-07 11:54:47', 23, 20, 'gfp2j390h03', NULL, NULL),
(138, 1, 2, NULL, '2021-05-07 11:54:47', 60, 20, 'hrtjasfrtjrtj', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `akk`
--
ALTER TABLE `akk`
  ADD PRIMARY KEY (`id_akk`);

--
-- Индексы таблицы `akk_developer`
--
ALTER TABLE `akk_developer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akk` (`id_akk`),
  ADD KEY `id_developer` (`id_developer`);

--
-- Индексы таблицы `akk_genre`
--
ALTER TABLE `akk_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akk` (`id_akk`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Индексы таблицы `akk_log_akk`
--
ALTER TABLE `akk_log_akk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akk` (`id_akk`),
  ADD KEY `id_log_akk` (`id_log_akk`);

--
-- Индексы таблицы `akk_publisher`
--
ALTER TABLE `akk_publisher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akk` (`id_akk`),
  ADD KEY `id_publisher` (`id_publisher`);

--
-- Индексы таблицы `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id_developer`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Индексы таблицы `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `key_`
--
ALTER TABLE `key_`
  ADD PRIMARY KEY (`id_key`);

--
-- Индексы таблицы `log_akk`
--
ALTER TABLE `log_akk`
  ADD PRIMARY KEY (`id_log_akk`);

--
-- Индексы таблицы `otziv`
--
ALTER TABLE `otziv`
  ADD PRIMARY KEY (`id_comm`),
  ADD KEY `id_tovar` (`id_tovar`);

--
-- Индексы таблицы `otziv_akk`
--
ALTER TABLE `otziv_akk`
  ADD PRIMARY KEY (`id_comm`),
  ADD KEY `id_akk` (`id_akk`);

--
-- Индексы таблицы `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id_publisher`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id_tovar`);

--
-- Индексы таблицы `tovar_developer`
--
ALTER TABLE `tovar_developer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tovar` (`id_tovar`),
  ADD KEY `id_developer` (`id_developer`);

--
-- Индексы таблицы `tovar_genre`
--
ALTER TABLE `tovar_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genre` (`id_genre`),
  ADD KEY `id_tovar` (`id_tovar`);

--
-- Индексы таблицы `tovar_key`
--
ALTER TABLE `tovar_key`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tovar` (`id_tovar`),
  ADD KEY `id_key` (`id_key`);

--
-- Индексы таблицы `tovar_publisher`
--
ALTER TABLE `tovar_publisher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tovar` (`id_tovar`),
  ADD KEY `id_publisher` (`id_publisher`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `users_basket`
--
ALTER TABLE `users_basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`user_id`),
  ADD KEY `id_basket` (`id_tovar`);

--
-- Индексы таблицы `user_basket_akk`
--
ALTER TABLE `user_basket_akk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_akk` (`id_akk`);

--
-- Индексы таблицы `user_hearth`
--
ALTER TABLE `user_hearth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_tovar` (`id_tovar`);

--
-- Индексы таблицы `user_hearth_akk`
--
ALTER TABLE `user_hearth_akk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_akk` (`id_akk`);

--
-- Индексы таблицы `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akk` (`id_akk`),
  ADD KEY `id_tovar` (`id_tovar`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `akk`
--
ALTER TABLE `akk`
  MODIFY `id_akk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `akk_developer`
--
ALTER TABLE `akk_developer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `akk_genre`
--
ALTER TABLE `akk_genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `akk_log_akk`
--
ALTER TABLE `akk_log_akk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `akk_publisher`
--
ALTER TABLE `akk_publisher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `cupon`
--
ALTER TABLE `cupon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `developer`
--
ALTER TABLE `developer`
  MODIFY `id_developer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `help`
--
ALTER TABLE `help`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `key_`
--
ALTER TABLE `key_`
  MODIFY `id_key` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT для таблицы `log_akk`
--
ALTER TABLE `log_akk`
  MODIFY `id_log_akk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `otziv`
--
ALTER TABLE `otziv`
  MODIFY `id_comm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT для таблицы `otziv_akk`
--
ALTER TABLE `otziv_akk`
  MODIFY `id_comm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id_publisher` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id_tovar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `tovar_developer`
--
ALTER TABLE `tovar_developer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT для таблицы `tovar_genre`
--
ALTER TABLE `tovar_genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT для таблицы `tovar_key`
--
ALTER TABLE `tovar_key`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT для таблицы `tovar_publisher`
--
ALTER TABLE `tovar_publisher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users_basket`
--
ALTER TABLE `users_basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT для таблицы `user_basket_akk`
--
ALTER TABLE `user_basket_akk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `user_hearth`
--
ALTER TABLE `user_hearth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT для таблицы `user_hearth_akk`
--
ALTER TABLE `user_hearth_akk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `akk_developer`
--
ALTER TABLE `akk_developer`
  ADD CONSTRAINT `akk_developer_ibfk_1` FOREIGN KEY (`id_akk`) REFERENCES `akk` (`id_akk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akk_developer_ibfk_2` FOREIGN KEY (`id_developer`) REFERENCES `developer` (`id_developer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `akk_genre`
--
ALTER TABLE `akk_genre`
  ADD CONSTRAINT `akk_genre_ibfk_1` FOREIGN KEY (`id_akk`) REFERENCES `akk` (`id_akk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akk_genre_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `akk_log_akk`
--
ALTER TABLE `akk_log_akk`
  ADD CONSTRAINT `akk_log_akk_ibfk_1` FOREIGN KEY (`id_akk`) REFERENCES `akk` (`id_akk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akk_log_akk_ibfk_2` FOREIGN KEY (`id_log_akk`) REFERENCES `log_akk` (`id_log_akk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `akk_publisher`
--
ALTER TABLE `akk_publisher`
  ADD CONSTRAINT `akk_publisher_ibfk_1` FOREIGN KEY (`id_akk`) REFERENCES `akk` (`id_akk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akk_publisher_ibfk_2` FOREIGN KEY (`id_publisher`) REFERENCES `publisher` (`id_publisher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `help`
--
ALTER TABLE `help`
  ADD CONSTRAINT `help_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tovar_developer`
--
ALTER TABLE `tovar_developer`
  ADD CONSTRAINT `tovar_developer_ibfk_1` FOREIGN KEY (`id_tovar`) REFERENCES `tovar` (`id_tovar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tovar_developer_ibfk_2` FOREIGN KEY (`id_developer`) REFERENCES `developer` (`id_developer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tovar_genre`
--
ALTER TABLE `tovar_genre`
  ADD CONSTRAINT `tovar_genre_ibfk_1` FOREIGN KEY (`id_tovar`) REFERENCES `tovar` (`id_tovar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tovar_genre_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tovar_key`
--
ALTER TABLE `tovar_key`
  ADD CONSTRAINT `tovar_key_ibfk_1` FOREIGN KEY (`id_tovar`) REFERENCES `tovar` (`id_tovar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tovar_key_ibfk_2` FOREIGN KEY (`id_key`) REFERENCES `key_` (`id_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tovar_publisher`
--
ALTER TABLE `tovar_publisher`
  ADD CONSTRAINT `tovar_publisher_ibfk_1` FOREIGN KEY (`id_tovar`) REFERENCES `tovar` (`id_tovar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tovar_publisher_ibfk_2` FOREIGN KEY (`id_publisher`) REFERENCES `publisher` (`id_publisher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users_basket`
--
ALTER TABLE `users_basket`
  ADD CONSTRAINT `users_basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_basket_ibfk_2` FOREIGN KEY (`id_tovar`) REFERENCES `tovar` (`id_tovar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_basket_akk`
--
ALTER TABLE `user_basket_akk`
  ADD CONSTRAINT `user_basket_akk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_basket_akk_ibfk_2` FOREIGN KEY (`id_akk`) REFERENCES `akk` (`id_akk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_hearth`
--
ALTER TABLE `user_hearth`
  ADD CONSTRAINT `user_hearth_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_hearth_ibfk_2` FOREIGN KEY (`id_tovar`) REFERENCES `tovar` (`id_tovar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_hearth_akk`
--
ALTER TABLE `user_hearth_akk`
  ADD CONSTRAINT `user_hearth_akk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_hearth_akk_ibfk_2` FOREIGN KEY (`id_akk`) REFERENCES `akk` (`id_akk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_history`
--
ALTER TABLE `user_history`
  ADD CONSTRAINT `user_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_history_ibfk_2` FOREIGN KEY (`id_akk`) REFERENCES `akk` (`id_akk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_history_ibfk_3` FOREIGN KEY (`id_tovar`) REFERENCES `tovar` (`id_tovar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
