-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 17 2020 г., 11:13
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lab_l_t`
--

-- --------------------------------------------------------

--
-- Структура таблицы `breed`
--

CREATE TABLE `breed` (
  `IDbreed` int(11) NOT NULL,
  `BreedName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `IDcity` int(11) NOT NULL,
  `CityName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `class_feed`
--

CREATE TABLE `class_feed` (
  `IDclass` int(11) NOT NULL,
  `ClassName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cosmetics`
--

CREATE TABLE `cosmetics` (
  `IDcosmetics` int(11) NOT NULL,
  `CosmeticsName` varchar(255) NOT NULL,
  `CosmeticsType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `IDevent` int(11) NOT NULL,
  `EventName` varchar(255) NOT NULL,
  `EventDate` date NOT NULL,
  `IDcity` int(11) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `Building` varchar(255) NOT NULL,
  `IDpet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `feed`
--

CREATE TABLE `feed` (
  `IDfeed` int(11) NOT NULL,
  `TypeFeed` tinyint(1) NOT NULL,
  `IDclass` int(11) NOT NULL,
  `FeedName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `inspection`
--

CREATE TABLE `inspection` (
  `IDinspection` int(11) NOT NULL,
  `IDpet` int(11) NOT NULL,
  `InspectionDate` date NOT NULL,
  `IDcity` int(11) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `Building` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1578336605),
('m200106_184417_create_user_table', 1578336610);

-- --------------------------------------------------------

--
-- Структура таблицы `owner`
--

CREATE TABLE `owner` (
  `IDowner` int(11) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `Patronymic` varchar(255) NOT NULL,
  `IDcity` int(11) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `Building` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IDpet` int(11) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `IDuser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pet`
--

CREATE TABLE `pet` (
  `IDpet` int(11) NOT NULL,
  `IDbreed` int(11) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `DoB` date NOT NULL,
  `Sex` tinyint(1) NOT NULL,
  `Sterilization` tinyint(1) NOT NULL,
  `IDwool` int(11) NOT NULL,
  `Weight` float NOT NULL,
  `IDfeed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `procedures`
--

CREATE TABLE `procedures` (
  `IDprocedure` int(11) NOT NULL,
  `ProcedureName` varchar(255) NOT NULL,
  `Period` int(11) NOT NULL,
  `IDpet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2g8Q0EbQvZqBeCYbgHOgRcCsz9mpgRaE', '$2y$13$o6oxiuFTM4m/b3qdguXRJuwZhXkGAxBJ6O6iVPtzQ8K9tPBBYVRUe', NULL, 'admin@yoursite.ru', 10, 1578337090, 1578337090);

-- --------------------------------------------------------

--
-- Структура таблицы `vaccination`
--

CREATE TABLE `vaccination` (
  `IDvaccination` int(11) NOT NULL,
  `IDvaccine` int(11) NOT NULL,
  `VaccinationDate` date NOT NULL,
  `IDpet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vaccine`
--

CREATE TABLE `vaccine` (
  `IDvaccine` int(11) NOT NULL,
  `VaccineName` int(11) NOT NULL,
  `Period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `wool`
--

CREATE TABLE `wool` (
  `IDwool` int(11) NOT NULL,
  `TypeWool` varchar(255) NOT NULL,
  `ColorWool` varchar(255) NOT NULL,
  `IDcosmetics` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`IDbreed`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`IDcity`);

--
-- Индексы таблицы `class_feed`
--
ALTER TABLE `class_feed`
  ADD PRIMARY KEY (`IDclass`);

--
-- Индексы таблицы `cosmetics`
--
ALTER TABLE `cosmetics`
  ADD PRIMARY KEY (`IDcosmetics`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`IDevent`),
  ADD KEY `IDcity` (`IDcity`,`IDpet`),
  ADD KEY `IDpet` (`IDpet`);

--
-- Индексы таблицы `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`IDfeed`),
  ADD KEY `IDclass` (`IDclass`);

--
-- Индексы таблицы `inspection`
--
ALTER TABLE `inspection`
  ADD PRIMARY KEY (`IDinspection`),
  ADD KEY `IDpet` (`IDpet`,`IDcity`),
  ADD KEY `IDcity` (`IDcity`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`IDowner`),
  ADD KEY `IDcity` (`IDcity`,`IDpet`,`IDuser`),
  ADD KEY `IDpet` (`IDpet`);

--
-- Индексы таблицы `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`IDpet`),
  ADD KEY `IDbreed` (`IDbreed`,`IDwool`,`IDfeed`),
  ADD KEY `IDwool` (`IDwool`),
  ADD KEY `IDfeed` (`IDfeed`);

--
-- Индексы таблицы `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`IDprocedure`),
  ADD KEY `IDpet` (`IDpet`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`IDvaccination`),
  ADD KEY `IDvaccine` (`IDvaccine`,`IDpet`),
  ADD KEY `IDpet` (`IDpet`);

--
-- Индексы таблицы `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`IDvaccine`);

--
-- Индексы таблицы `wool`
--
ALTER TABLE `wool`
  ADD PRIMARY KEY (`IDwool`),
  ADD KEY `IDcosmetics` (`IDcosmetics`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `breed`
--
ALTER TABLE `breed`
  MODIFY `IDbreed` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `IDcity` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `class_feed`
--
ALTER TABLE `class_feed`
  MODIFY `IDclass` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `cosmetics`
--
ALTER TABLE `cosmetics`
  MODIFY `IDcosmetics` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `IDevent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feed`
--
ALTER TABLE `feed`
  MODIFY `IDfeed` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `inspection`
--
ALTER TABLE `inspection`
  MODIFY `IDinspection` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `owner`
--
ALTER TABLE `owner`
  MODIFY `IDowner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pet`
--
ALTER TABLE `pet`
  MODIFY `IDpet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `procedures`
--
ALTER TABLE `procedures`
  MODIFY `IDprocedure` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `IDvaccination` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `IDvaccine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `wool`
--
ALTER TABLE `wool`
  MODIFY `IDwool` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`IDcity`) REFERENCES `city` (`IDcity`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`IDpet`) REFERENCES `pet` (`IDpet`);

--
-- Ограничения внешнего ключа таблицы `feed`
--
ALTER TABLE `feed`
  ADD CONSTRAINT `feed_ibfk_1` FOREIGN KEY (`IDclass`) REFERENCES `class_feed` (`IDclass`);

--
-- Ограничения внешнего ключа таблицы `inspection`
--
ALTER TABLE `inspection`
  ADD CONSTRAINT `inspection_ibfk_1` FOREIGN KEY (`IDcity`) REFERENCES `city` (`IDcity`),
  ADD CONSTRAINT `inspection_ibfk_2` FOREIGN KEY (`IDpet`) REFERENCES `pet` (`IDpet`);

--
-- Ограничения внешнего ключа таблицы `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`IDcity`) REFERENCES `city` (`IDcity`),
  ADD CONSTRAINT `owner_ibfk_2` FOREIGN KEY (`IDpet`) REFERENCES `pet` (`IDpet`);

--
-- Ограничения внешнего ключа таблицы `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`IDbreed`) REFERENCES `breed` (`IDbreed`),
  ADD CONSTRAINT `pet_ibfk_2` FOREIGN KEY (`IDwool`) REFERENCES `wool` (`IDwool`),
  ADD CONSTRAINT `pet_ibfk_3` FOREIGN KEY (`IDfeed`) REFERENCES `feed` (`IDfeed`);

--
-- Ограничения внешнего ключа таблицы `procedures`
--
ALTER TABLE `procedures`
  ADD CONSTRAINT `procedures_ibfk_1` FOREIGN KEY (`IDpet`) REFERENCES `pet` (`IDpet`);

--
-- Ограничения внешнего ключа таблицы `vaccination`
--
ALTER TABLE `vaccination`
  ADD CONSTRAINT `vaccination_ibfk_1` FOREIGN KEY (`IDpet`) REFERENCES `pet` (`IDpet`),
  ADD CONSTRAINT `vaccination_ibfk_2` FOREIGN KEY (`IDvaccine`) REFERENCES `vaccine` (`IDvaccine`);

--
-- Ограничения внешнего ключа таблицы `wool`
--
ALTER TABLE `wool`
  ADD CONSTRAINT `wool_ibfk_1` FOREIGN KEY (`IDcosmetics`) REFERENCES `cosmetics` (`IDcosmetics`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
