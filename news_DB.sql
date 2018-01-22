-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versie:              9.4.0.5165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Databasestructuur van newsdb wordt geschreven
CREATE DATABASE IF NOT EXISTS `newsdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `newsdb`;

-- Structuur van  tabel newsdb.bijlages wordt geschreven
CREATE TABLE IF NOT EXISTS `bijlages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `postid` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel newsdb.bijlages: 1 rows
/*!40000 ALTER TABLE `bijlages` DISABLE KEYS */;
INSERT INTO `bijlages` (`id`, `postid`, `title`, `url`) VALUES
	(4, 19, 'Extra Link', '');
/*!40000 ALTER TABLE `bijlages` ENABLE KEYS */;

-- Structuur van  tabel newsdb.categories wordt geschreven
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel newsdb.categories: 7 rows
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Tech'),
	(2, 'Science'),
	(3, 'World'),
	(4, 'Health'),
	(5, 'Sport'),
	(6, 'Weather'),
	(7, 'Entertainments');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Structuur van  tabel newsdb.comments wordt geschreven
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL DEFAULT '0',
  `postid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel newsdb.comments: 18 rows
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `comment`, `postid`, `userid`) VALUES
	(3, 'Commodi quia dignissimos et doloremque quos velit ratione.', 19, 10),
	(4, 'Qui nesciunt omnis omnis voluptatem impedit debitis odio.', 18, 9),
	(5, 'Est earum temporibus ut omnis enim qui.', 18, 9),
	(6, 'A omnis enim adipisci similique similique labore rerum nesciunt.', 8, 9),
	(7, 'Iusto iusto ut quia modi odit.', 19, 7),
	(8, 'Autem ratione eum eligendi assumenda necessitatibus aut iusto.', 7, 7),
	(9, 'Voluptas possimus sed dolorum ab.', 18, 7),
	(10, 'Est animi ipsum ipsam in sunt.', 19, 5),
	(11, 'Voluptatem ratione ut ipsa laboriosam autem est qui.', 6, 5),
	(12, 'Excepturi non vero dolores cumque.', 4, 5),
	(13, 'Dolorem similique aut doloremque sit.', 5, 8),
	(14, 'In impedit exercitationem enim et.', 18, 8),
	(15, 'Maxime reprehenderit eaque facilis laudantium.', 19, 11),
	(16, 'Dolores tempora accusantium laborum fuga.', 7, 11),
	(17, 'Et sed quidem voluptates dignissimos quidem numquam.', 19, 6),
	(18, 'Laudantium ut delectus aut corporis consequatur maxime possimus.', 4, 6),
	(19, 'Et rem quis dolor vero.', 9, 6),
	(20, 'Eum cupiditate error ea eligendi.', 9, 6);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Structuur van  tabel newsdb.menu wordt geschreven
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel newsdb.menu: 2 rows
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `title`, `url`) VALUES
	(1, 'Home', 'home'),
	(2, 'Categories', 'categories');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Structuur van  tabel newsdb.posts wordt geschreven
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(9999) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel newsdb.posts: 8 rows
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `content`, `cid`, `time`, `image`, `upvote`, `downvote`) VALUES
	(4, 'soluta', 'Ut aperiam quam dolorem nam ipsa quia distinctio. Cum cumque ad nemo aut. Dolorem nobis illo ut dolores tempore saepe. Voluptatum quo reprehenderit voluptates earum porro iste. Dolore error saepe et vel placeat et.', 4, '2017-12-18 12:19:25', NULL, 0, 0),
	(5, 'esse', 'Quis aut repudiandae modi veritatis. Omnis non minima et sit. Voluptate ut possimus officia recusandae delectus. Ipsa iste voluptatum nemo. Beatae atque ea similique doloribus ducimus aliquam id quam. Ut odio vel hic assumenda tempora assumenda. Dolor velit alias sed impedit excepturi eligendi. Consectetur quasi sint nihil assumenda assumenda.', 6, '2017-12-18 12:20:07', NULL, 0, 0),
	(6, 'neque', 'Maiores inventore nisi qui voluptas odio. Et aliquam voluptas id ut. Quia dolor architecto molestias. Facilis omnis fugiat qui omnis. Quos modi quis sunt. Et perferendis eum qui voluptatem natus suscipit quas est. Sed voluptatem dolores cumque. Vitae quidem nobis qui qui exercitationem quidem aut.', 3, '2017-12-18 12:20:13', NULL, 0, 0),
	(7, 'qui', 'Provident assumenda delectus occaecati voluptas. Id autem dolorem pariatur suscipit. Sit deleniti ullam minus id et. Natus laboriosam tempora aut maiores tenetur. Nulla labore facilis deleniti incidunt. Pariatur sint impedit explicabo doloribus sed. Beatae id nostrum et aperiam.', 7, '2017-12-18 12:20:17', NULL, 0, 0),
	(8, 'atque', 'Minus quod nisi sapiente necessitatibus deleniti. Dignissimos vel id labore numquam. Officiis ea rerum dolorum nam qui. Ipsa optio ut et architecto numquam. Tempore voluptas est repudiandae sit rerum ut perspiciatis.', 1, '2017-12-18 12:20:23', NULL, 0, 0),
	(9, 'possimu', 'Dignissimos modi beatae eligendi. Nobis sit et quasi velit. Delectus ut qui aut animi aliquam temporibus. Ratione minus quo consectetur et voluptatem dolorum quis et. Aspernatur itaque quis sint dolorum repellat aspernatur similique. Eos asperiores quae aut voluptatem dolorem.', 5, '2017-12-18 12:20:36', NULL, 0, 0),
	(18, 'eaque', 'Accusamus iste alias eum rem quae consequatur non cumque. Est qui nesciunt provident possimus qui consequatur eum. Quam ratione voluptate quae et incidunt eligendi est. Sapiente perspiciatis accusamus est ea beatae non facilis. Consequatur blanditiis adipisci voluptas eum. Ad non consequuntur voluptatem et. Debitis sit distinctio quas non cum.', 1, '2017-12-19 08:57:30', 'Fairy.jpg', 0, 0),
	(19, 'volupta', 'Sit aut quia et voluptas molestiae voluptatem. Ratione magnam magnam ut et facere odit alias quibusdam. Et et quae ratione velit. Eligendi eos sit numquam similique ipsum. Non maxime qui officiis et facere doloremque. Vitae laboriosam libero illum. Dicta autem praesentium possimus doloribus. Voluptatem ad possimus laborum culpa veritatis.', 3, '2018-01-15 12:39:52', 'img.jpg', 1, 0);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Structuur van  tabel newsdb.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) NOT NULL DEFAULT '0',
  `UserPassword` varchar(255) NOT NULL DEFAULT '0',
  `UserEmail` varchar(255) NOT NULL DEFAULT '0',
  `RoleName` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel newsdb.users: 8 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`ID`, `UserName`, `UserPassword`, `UserEmail`, `RoleName`) VALUES
	(10, 'Julian', 'qwe123', 'oceane84@gmail.com', 'User'),
	(1, 'admin', 'admin2', 'test@testing.com', 'Admin'),
	(9, 'Maria', 'qwe123', 'vincenza72@collier.net', 'User'),
	(5, 'Curtis', 'qwe123', 'beahan.leonora@carroll.com', 'Admin'),
	(6, 'Norene', 'qwe123', 'clyde49@casper.com', 'User'),
	(7, 'Joey', 'qwe123', 'ndubuque@von.biz', 'User'),
	(8, 'Ayana', 'qwe123', 'zkovacek@cole.info', 'Admin'),
	(11, 'Brycen', 'qwe123', 'wkreiger@ferry.net', 'User');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Structuur van  tabel newsdb.votes wordt geschreven
CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `vote` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel newsdb.votes: 0 rows
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` (`id`, `pid`, `uid`, `vote`) VALUES
	(1, 19, 1, 1);
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
