-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.1.19-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп данных таблицы acars.about_user: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `about_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `about_user` ENABLE KEYS */;

-- Дамп данных таблицы acars.basket: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;

-- Дамп данных таблицы acars.brands: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` (`id`, `name`, `logo`, `created_at`, `updated_at`, `country`) VALUES
	(1, 'Profit', '', NULL, NULL, 'Poland'),
	(2, 'Febi', '', NULL, NULL, 'Germany'),
	(3, 'Swag', '', NULL, NULL, 'Italy'),
	(4, 'Mettelli', '', NULL, NULL, 'Spaine'),
	(5, 'ABS', '', NULL, NULL, 'Portugal'),
	(6, 'WIX', '', NULL, NULL, 'UK'),
	(7, 'Melly', '', NULL, NULL, 'Japane'),
	(8, 'Optimal', '', '2017-05-19 10:01:09', '2017-05-19 10:01:09', 'Chine'),
	(9, 'JP Group', '', '2017-05-19 10:05:33', '2017-05-19 10:05:33', 'Ukraine');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;

-- Дамп данных таблицы acars.cars: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` (`id`, `brand`, `years`, `model`, `engine`, `created_at`, `updated_at`, `alias`) VALUES
	(1, 'audi', '1986-1991', '80 B3', '1.8', NULL, NULL, 'audi_80_B3_1.8'),
	(2, 'audi', '1991-1994', '80 B4', '2.0', NULL, NULL, 'audi_80_B4_2.0'),
	(3, 'bmw', '1991-1998', 'M3', '2.0', NULL, NULL, 'bmw_M3_2.0'),
	(4, 'audi', '1986-1991', '80 B3', '1.6', NULL, NULL, 'audi_80_B3_1.6'),
	(5, 'audi', '1986-1991', '80 B3', '2.0', NULL, NULL, 'audi_80_B3_2.0'),
	(6, 'bmw', '1996-2001', 'M5', '2.5', NULL, NULL, 'bmw_M5_2.5');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Дамп данных таблицы acars.car_item: ~16 rows (приблизительно)
/*!40000 ALTER TABLE `car_item` DISABLE KEYS */;
INSERT INTO `car_item` (`car_id`, `item_id`) VALUES
	(1, 1),
	(2, 3),
	(2, 1),
	(1, 2),
	(1, 3),
	(1, 10),
	(1, 8),
	(1, 12),
	(2, 11),
	(1, 11),
	(2, 10),
	(2, 12),
	(1, 13),
	(4, 3),
	(5, 11),
	(6, 2),
	(3, 13),
	(4, 13);
/*!40000 ALTER TABLE `car_item` ENABLE KEYS */;

-- Дамп данных таблицы acars.categories: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `category_name`, `title`, `has_child`, `parent_id`, `parent_id_2`, `description`, `SEO`, `created_at`, `updated_at`) VALUES
	(1, 'amortizacia', 'Амортизация', 1, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'vyhlopnaya_systema', 'Выхлопная система', 1, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'dvigatel', 'Двигатель', 1, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'zaghiganie_nakalivanie', 'Зажигание, накаливание', 1, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 'amortizatory_podveski', 'Амортизаторы подвески', 1, 1, 4, NULL, NULL, NULL, NULL),
	(6, 'zaschitnye_komplecty_amortizatora', 'Защитные', 0, 5, 3, NULL, NULL, NULL, NULL),
	(7, 'glushytel', 'Глушитель', 1, 2, 4, NULL, NULL, NULL, NULL),
	(8, 'vozdushnyy_filter_dvigatelya', 'Воздушный фильтр двигателя', 0, 7, NULL, NULL, NULL, NULL, NULL),
	(9, 'shrus', 'ШРУС', 0, 1, 2, NULL, NULL, NULL, NULL),
	(10, 'shkiv_remnya', 'Шкив ремня', 0, 5, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп данных таблицы acars.comments: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп данных таблицы acars.history_item_price: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `history_item_price` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_item_price` ENABLE KEYS */;

-- Дамп данных таблицы acars.items: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `title`, `description`, `price`, `amount`, `SEO`, `latin_url`, `created_at`, `updated_at`, `brand_id`) VALUES
	(1, 'Тяга', '3. Добавити до таблиці brands стовпчик description, country.', 100.00, 0, NULL, '', NULL, NULL, 5),
	(2, 'Супорт', 'до таблиці brands стовпчик description, country.', 99.00, 0, NULL, '', NULL, NULL, 2),
	(3, 'Тормозной диск', '3. Добавити до таблиці brands стовпчик description,', 55.00, 0, NULL, '', NULL, NULL, 4),
	(4, 'Тяга', '', 23.00, 0, NULL, '', NULL, NULL, 8),
	(5, 'Тяга', '', 0.00, 0, NULL, '', NULL, NULL, 2),
	(6, 'Тяга', '', 0.00, 0, NULL, '', NULL, NULL, 4),
	(7, 'Супорт', '', 0.00, 0, NULL, '', NULL, NULL, 1),
	(8, 'Супорт', '', 0.00, 0, NULL, '', NULL, NULL, 1),
	(9, 'Супорт', '', 0.00, 0, NULL, '', NULL, NULL, 3),
	(10, 'Тормозной диск', '3. Добавити до таблиці brands стовпчик description,', 55.00, 0, NULL, '', NULL, NULL, 6),
	(11, 'Тормозной диск', '3. Добавити до таблиці brands стовпчик description,', 55.00, 0, NULL, '', NULL, NULL, 9),
	(12, 'Тормозной диск', '3. Добавити до таблиці brands стовпчик description,', 55.00, 0, NULL, '', NULL, NULL, 8),
	(13, 'Подшипник ступицы колеса', '', 100.00, 0, NULL, '', NULL, NULL, 9);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

-- Дамп данных таблицы acars.item_category: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `item_category` DISABLE KEYS */;
INSERT INTO `item_category` (`item_id`, `category_id`) VALUES
	(7, 6),
	(10, 6),
	(11, 6),
	(13, 6),
	(2, 6),
	(3, 6),
	(12, 6),
	(5, 6),
	(6, 6),
	(4, 6);
/*!40000 ALTER TABLE `item_category` ENABLE KEYS */;

-- Дамп данных таблицы acars.migrations: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп данных таблицы acars.navbars: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `navbars` DISABLE KEYS */;
INSERT INTO `navbars` (`id`, `position`, `title`, `alias`, `placing`, `for_reg_users`, `for_unreg_users`, `dropdown_menu`, `for_admin`) VALUES
	(1, 1, 'Главная', 'index', 'left', 'true', 'true', 'false', 'false'),
	(2, 2, 'О компании', 'about', 'left', 'true', 'true', 'false', 'false'),
	(3, 3, 'Оплата и доставка', 'paymentAndDelivery', 'left', 'true', 'true', 'false', 'false'),
	(4, 4, 'Контакты', 'contacts', 'left', 'true', 'true', 'false', 'false'),
	(5, 5, 'Регистрация', 'register', 'right', 'false', 'true', 'false', 'false'),
	(6, 6, 'Войти', 'login', 'right', 'false', 'true', 'false', 'false'),
	(7, 5, 'Личный кабинет', 'own_cabinet', 'right', 'false', 'false', 'true', 'false');
/*!40000 ALTER TABLE `navbars` ENABLE KEYS */;

-- Дамп данных таблицы acars.orders: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Дамп данных таблицы acars.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп данных таблицы acars.unregistered_users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `unregistered_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `unregistered_users` ENABLE KEYS */;

-- Дамп данных таблицы acars.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `car_id`) VALUES
	(1, NULL, 'Den', 'dinia@i.ua', '$2y$10$KzQrEsP9ZiohW4F0wqtY2eqS0DVryEE3o2WKsqiFwaT9wq5NdLKlS', 'nBGDQLRah6q8lTPf6E95qJok6Gq6En2LkLVfz0jqXXWT48DOA0pFIfD8piD6', '2017-05-22 06:42:03', '2017-05-22 06:42:03', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
