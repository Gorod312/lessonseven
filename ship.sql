-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3308
-- Время создания: Май 07 2019 г., 15:50
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ship`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name_user` text NOT NULL,
  `session_id` text NOT NULL,
  `id_ship` int(11) NOT NULL,
  `quonty` int(11) NOT NULL,
  `adress` text NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `data_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `name_user`, `session_id`, `id_ship`, `quonty`, `adress`, `status`, `id_user`, `data_order`) VALUES
(136, 'Васёк', 'bmsf1gr0831vui85fru2uvdho9lpr39t', 2, 1, 'артур', NULL, 16, '2019-05-07 13:32:57'),
(141, 'Миша', 'bmsf1gr0831vui85fru2uvdho9lpr39t', 2, 1, 'артур', NULL, 1, '2019-05-07 14:34:49'),
(143, 'Миша', 'bmsf1gr0831vui85fru2uvdho9lpr39t', 2, 1, 'артур', NULL, 1, '2019-05-07 15:49:27');

-- --------------------------------------------------------

--
-- Структура таблицы `nation`
--

CREATE TABLE `nation` (
  `id` int(11) NOT NULL,
  `nation_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nation`
--

INSERT INTO `nation` (`id`, `nation_name`) VALUES
(1, 'USE'),
(2, 'USSR');

-- --------------------------------------------------------

--
-- Структура таблицы `ships`
--

CREATE TABLE `ships` (
  `id` int(11) NOT NULL,
  `id_nation` int(11) NOT NULL,
  `name` text NOT NULL,
  `prev` text NOT NULL,
  `price` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ships`
--

INSERT INTO `ships` (`id`, `id_nation`, `name`, `prev`, `price`, `img`) VALUES
(1, 1, 'Montana', '(рус. Монтана[1]) — американский линкор X уровня. Имеет высокую огневую мощь благодаря большому количеству орудий ГК и хорошему урону снарядов. А также серьёзное вооружение ПВО и хороший запас очков боеспособности. Является прекрасным универсальным линкором, способным нанести существенный урон кораблю любого класса. ', 87, 'Montana.png'),
(2, 1, 'Iowa', '(рус. Айова[1]) — американский линкор IX уровня. Один из сильнейших линкоров Второй мировой войны. Предназначался для сопровождения ударных авианосных соединений. По скорости хода превосходил все линейные корабли в мире. Новая мощная противоторпедная защита и кардинально измененная система бронирования с внутренним бронепоясом существенно повысили живучесть линкора. ', 654, 'Iowa.png'),
(3, 1, 'North Carolina', '(Норт Кэролайна[1]) — американский линкор VIII уровня. Первый американский линкор нового поколения. Основное преимущество перед предыдущими типами кораблей этого класса заключалось в существенно возросшей скорости хода. По толщине главного бронепояса несколько уступал предшественникам, но при этом имел очень сильную горизонтальную защиту и превосходное ПВО вооружение, включающее в себя многочисленную универсальную артиллерию. ', 358, 'North_Carolina.png'),
(4, 2, 'Победа', 'советский линкор X уровня. Проект линкора, разработанный по окончании Второй мировой войны (проект 24). Являлся развитием кораблей типа «Советский Союз» и предназначался для противостояния американским линкорам типа Iowa и Montana.', 150, 'Pobeda.png'),
(5, 2, 'Кремль', 'советский линкор X уровня. Проект линкора, разработанный по окончании Второй мировой войны (проект 24). Являлся развитием кораблей типа «Советский Союз» и предназначался для противостояния американским линкорам типа Iowa и Montana. ', 202, 'Sovetskaya_Rossiya.png'),
(6, 2, 'Советский Союз', 'советский линкор IX уровня. Самый крупный артиллерийский корабль, когда-либо строившийся в СССР (проект 23), и один из самых мощных в мире линкоров. От прототипа, «линкора А», отличался увеличенными размерами и более совершенными системами вооружения. ', 57, 'Sovetsky_Soyuz.png');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `hash` text NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `hash`, `login`, `pass`, `mail`) VALUES
(1, '', 'noregistration', '', 'notel'),
(13, '4999800105cd05b48ed4799.47801846', 'admin', '$2y$10$Fk46Jq6HsQYzuQEPYwhrXezHOz6UidfjnZae3hfLRU.76DczvjLs.', 'admin'),
(15, '20464942095cd1441981d346.77115118', 'Толик', '$2y$10$SEWOs.5OtkGAsLkgjCX2gekKYEs1PqOI3px0e8gZklAPQqAtDY/LG', '1@mail.ru'),
(16, '11376029925cd15d2a4fcba2.13729247', 'Васёк', '$2y$10$ycS/559tBlU52s1TNGXXaurMDwyAVl4dTBB0Pq48u0PZSKwqL/Nmy', '2@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ship` (`id_ship`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `nation`
--
ALTER TABLE `nation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nation` (`id_nation`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT для таблицы `nation`
--
ALTER TABLE `nation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `ships`
--
ALTER TABLE `ships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_ship`) REFERENCES `ships` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `ships`
--
ALTER TABLE `ships`
  ADD CONSTRAINT `ships_ibfk_1` FOREIGN KEY (`id_nation`) REFERENCES `nation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
