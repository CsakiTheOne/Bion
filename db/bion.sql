-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Ápr 04. 19:08
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `bion`
--
CREATE DATABASE IF NOT EXISTS `bion` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `bion`;

DELIMITER $$
--
-- Eljárások
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CategoriesGetAll` ()  BEGIN
SELECT
  categories.id,
  categories.name
FROM categories;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CategoriesGetById` (IN `paramId` INT)  BEGIN
SELECT
  categories.name
FROM categories
WHERE categories.id = paramId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CommentCreate` (IN `paramUserUniqId` VARCHAR(23), IN `paramText` TEXT, IN `paramDate` DATETIME, IN `paramThemeId` INT)  BEGIN
INSERT INTO comments (userUniqId, text, date, themeId)
  VALUES (paramUserUniqId, paramText, paramDate, paramThemeId);
SELECT
  @@LAST_INSERT_ID AS id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CommentDelete` (IN `paramId` INT)  BEGIN
DELETE
  FROM comments
WHERE comments.id = paramId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CommentGetByThemeId` (IN `paramThemeId` INT)  BEGIN
SELECT
  comments.userUniqId,
  comments.text,
  comments.date
FROM comments
WHERE comments.themeId = paramThemeId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CommentGetByThemeIdWithCreator` (IN `paramThemeId` INT)  BEGIN
SELECT
  users.username,
  comments.id,
  comments.text,
  comments.date
FROM comments
  INNER JOIN users
    ON users.uniqId = comments.userUniqId
WHERE comments.themeId = paramThemeId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CommentGetByUsername` (IN `paramUsername` VARCHAR(32))  BEGIN
SELECT
  users.username,
  comments.id,
  comments.text,
  comments.date
FROM comments
  INNER JOIN users
    ON users.uniqId = comments.userUniqId
WHERE users.username = paramUsername;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemeCreate` (IN `paramCategoryId` INT, IN `paramUniqId` VARCHAR(23), IN `paramDate` DATETIME, IN `paramText` TEXT, IN `paramHeader` VARCHAR(255))  BEGIN
INSERT INTO theme (categoryId, userUniqId, date, text, header)
  VALUES (paramCategoryId, paramUniqId, paramDate, paramText, paramHeader);
SELECT
  @@LAST_INSERT_ID AS id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemeDeleteById` (IN `paramId` INT)  BEGIN
DELETE
  FROM theme
WHERE id = paramId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemeGetAll` ()  BEGIN
SELECT
  theme.id,
  theme.header,
  theme.categoryId,
  theme.userUniqId,
  theme.date,
  theme.text
FROM theme;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemeGetAllByCategory` (IN `paramCategory` VARCHAR(23))  BEGIN
SELECT
  theme.id,
  theme.header,
  users.username,
  categories.name,
  theme.date,
  theme.text
FROM theme
  INNER JOIN categories
    ON theme.categoryId = categories.Id
  INNER JOIN users
    ON users.uniqId = theme.userUniqId
WHERE categories.name = paramCategory;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemeGetAllWithCategoryAndCreator` ()  BEGIN
SELECT
  theme.header,
  theme.id,
  categories.name,
  users.username,
  theme.date,
  theme.text
FROM theme
  INNER JOIN categories
    ON theme.categoryId = categories.id
  INNER JOIN users
    ON theme.userUniqId = users.uniqId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemeGetByCategoryAndText` (IN `paramText` TEXT, IN `paramCategory` VARCHAR(255))  BEGIN
SELECT
  theme.header,
  theme.id,
  categories.name,
  users.username,
  theme.date,
  theme.text
FROM theme
  INNER JOIN categories
    ON theme.categoryId = categories.id
  INNER JOIN users
    ON theme.userUniqId = users.uniqId
WHERE categories.name = paramCategory
AND (theme.text LIKE CONCAT("%", paramText, "%")
OR users.username LIKE CONCAT("%", paramText, "%"));
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemeGetByIdWithCategoryAndCreator` (IN `paramId` INT)  BEGIN
SELECT
  theme.header,
  categories.name,
  users.username,
  theme.date,
  theme.text
FROM theme
  INNER JOIN categories
    ON theme.categoryId = categories.id
  INNER JOIN users
    ON theme.userUniqId = users.uniqId
WHERE theme.id = paramId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemeGetByParam` (IN `paramText` TEXT)  BEGIN
SELECT
  theme.header,
  theme.id,
  categories.name,
  users.username,
  theme.date,
  theme.text
FROM theme
  INNER JOIN categories
    ON theme.categoryId = categories.id
  INNER JOIN users
    ON theme.userUniqId = users.uniqId
WHERE theme.text LIKE CONCAT("%", paramText, "%")
OR users.username LIKE CONCAT("%", paramText, "%");
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemeGetByUserUniqId` (IN `paramUserUniqId` VARCHAR(23))  BEGIN
SELECT
  theme.header,
  theme.categoryId,
  theme.date,
  theme.text
FROM theme
WHERE userUniqId = paramUserUniqId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemeGetByUserUniqIdWithCategory` (IN `paramUsername` VARCHAR(32))  BEGIN
SELECT
  users.username,
  theme.id,
  theme.header,
  categories.name,
  theme.userUniqId,
  theme.date,
  theme.text
FROM theme
  INNER JOIN categories
    ON theme.categoryId = categories.id
  INNER JOIN users
    ON theme.userUniqId = users.uniqId
WHERE users.username = paramUsername;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UserCreate` (IN `paramUniqId` VARCHAR(23), IN `paramUsername` VARCHAR(32), IN `paramPassword` VARCHAR(64), IN `paramEmail` VARCHAR(50))  BEGIN
INSERT INTO users (uniqId, username, password, email)
  VALUES (paramUniqId, paramUsername, paramPassword, paramEmail);
SELECT
  @@LAST_INSERT_ID AS id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UserGetByCredentials` (IN `paramEmail` VARCHAR(32), IN `paramPassword` VARCHAR(64))  BEGIN
SELECT
  users.uniqId,
  users.username
FROM users
WHERE users.email = paramEmail
AND users.password = paramPassword;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UserGetByEmail` (IN `paramEmail` VARCHAR(50))  BEGIN
SELECT
  users.uniqId,
  users.username,
  users.email
FROM users
WHERE users.email = paramEmail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UserGetByUniqId` (IN `paramUniqId` VARCHAR(23))  BEGIN
SELECT
  users.uniqId,
  users.username,
  users.email
FROM users
WHERE users.uniqId = paramUniqId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UserGetByUsername` (IN `paramUsername` VARCHAR(32))  BEGIN
SELECT
  users.uniqId,
  users.username,
  users.email
FROM users
WHERE users.username = paramUsername;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1638 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Kémia'),
(2, 'Matematika'),
(3, 'Irodalom'),
(4, 'Nyelvtan'),
(5, 'Történelem'),
(6, 'Fizika'),
(7, 'Biológia'),
(8, 'Idegen nyelv'),
(9, 'Földrajz'),
(10, 'Informatika');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userUniqId` varchar(23) COLLATE utf8_hungarian_ci NOT NULL,
  `text` text COLLATE utf8_hungarian_ci NOT NULL,
  `date` datetime NOT NULL,
  `themeId` int(11) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`id`, `userUniqId`, `text`, `date`, `themeId`) VALUES
(34, '5e88bc858a1ad7.34344340', 'Modern költészeti ág ami 1984-ben indult', '2020-04-04 18:59:23', 13);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `userUniqId` varchar(23) COLLATE utf8_hungarian_ci NOT NULL,
  `date` datetime NOT NULL,
  `text` text COLLATE utf8_hungarian_ci NOT NULL,
  `header` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `theme`
--

INSERT INTO `theme` (`id`, `categoryId`, `userUniqId`, `date`, `text`, `header`) VALUES
(13, 3, '5e88bc3c4cd923.22759437', '2020-04-04 18:57:09', 'Mit takar, melyik évszázad?', 'Mi az a Slam poetry?');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uniqId` varchar(23) COLLATE utf8_hungarian_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `uniqId`, `username`, `password`, `email`) VALUES
(17, '5e88bc3c4cd923.22759437', 'peldaaccount', '4df6e4cb7892366e8738ae7da861b3d9593ca5cc8d3c95784752b413636860a6', 'peldaaccount@peldaaccount'),
(18, '5e88bc858a1ad7.34344340', 'valaszaccount', '1791d121ffe541ef12f90d3d961d7549c2a1450b9725509948d75e3770945422', 'valaszaccount@valaszaccount.com');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT a táblához `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
