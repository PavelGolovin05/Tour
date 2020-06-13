-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 13 2020 г., 20:44
-- Версия сервера: 5.7.28-0ubuntu0.18.04.4
-- Версия PHP: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Tour`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`) VALUES
(1, 'Донецк', 1),
(2, 'Макеевка', 1),
(3, 'Шарм-эль-Шейх', 2),
(4, 'Хургада', 2),
(5, 'Дубай', 4),
(6, 'Анкара', 3),
(7, 'Анталья', 3),
(8, 'Париж', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'ДНР'),
(2, 'Египет'),
(4, 'ОАЭ'),
(3, 'Турция'),
(5, 'Франция');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `type_food_id` int(10) UNSIGNED DEFAULT NULL,
  `stars` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `photo_link`, `city_id`, `type_food_id`, `stars`, `description`) VALUES
(1, 'Royal Grand Sharm', '/images/hotel 1.jpg', 3, 1, 5, 'Отель Royal Grand Sharm расположен в 13 км от аэропорта, в 5 км от Naama Bay, на побережье Rus Umm Sid, на самом берегу моря. Отличный отель с хорошим питание и немецким сервисом. '),
(2, 'TROPICANA SEA BEACH', '/images/hotel 2.jpg', 4, 1, 4, 'Отель Tropicana Sea Beach расположен в 12 км от аэропорта, в 25 км от бухты Naama Bay, в районе Nabq Bay, на самом берегу моря. Новый отель с большой территорией. Рекомендуем для экономичного спокойного отдыха. Построен в 2008 году.'),
(3, 'AMWAJ ROTANA JUMEIRAH BEACH', '/images/hotel 3.jpg', 5, 1, 5, 'Amwaj Rotana Jumeirah Beach входит в систему Jumeirah Beach Residence Complex и отвечает новейшим требованиям в области комфорта, предусмотренным в секторе элитной гостиничной и жилой инфраструктуры. Расположен на побережье Персидского залива в районе Джумейра, на первой береговой линии.'),
(4, 'CLUB BORAN MARE BEACH', '/images/hotel 4.jpg', 6, 2, 5, 'Club Boran Mare Beach – чудесный отельный комплекс для желающих провести незабываемый отпуск на Средиземноморском побережье. Отель имеет красивую территорию, окружен великолепным сосновым лесом, предлагает множество развлечений и обслуживание по высшим европейским стандартам. Отель расположен в 9 км от Kemer. Международный аэропорт Antalya находится в 46 км от отеля.'),
(5, 'HOTEL BUYUK PARIS', '/images/hotel 5.jpg', 7, 3, 3, 'Отель Buyuk Paris Hotel находится в Стамбуле, на улице Месихпаша. Вежливый персонал и дружелюбная атмосфера отеля обеспечивают туристам хороший отдых.'),
(6, 'FOUR POINTS BY SHERATON', '/images/hotel 6.jpg', 8, 2, 4, 'Four Points by Sheraton - Hotel Elysee Palace Nice находится в Ницце, на знаменитой Английской Набережной, в 10 минутах ходьбы от пешеходного квартала и площади Массена и в 10 минутах езды от международного аэропорта Cote d\'Azur. '),
(7, 'Royal Hotel', '/images/hotel 7.jpg', 3, 1, 5, 'Лучший отель');

-- --------------------------------------------------------

--
-- Структура таблицы `hotel_photos`
--

CREATE TABLE `hotel_photos` (
  `id` int(11) NOT NULL,
  `hotel_id` int(10) UNSIGNED DEFAULT NULL,
  `photo_link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `hotel_photos`
--

INSERT INTO `hotel_photos` (`id`, `hotel_id`, `photo_link`) VALUES
(1, 1, '/images/hotel 1.jpg'),
(2, 1, '/images/hotel 1.jpg'),
(3, 1, '/images/hotel 3.jpg'),
(4, 1, '/images/hotel 1.jpg'),
(5, 1, '/images/hotel 7.jpg'),
(6, 1, '/images/hotel 4.jpg'),
(7, 1, '/images/hotel 2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `hotel_rooms`
--

CREATE TABLE `hotel_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_id` int(10) UNSIGNED DEFAULT NULL,
  `type_rooms_id` int(10) UNSIGNED DEFAULT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `hotel_rooms`
--

INSERT INTO `hotel_rooms` (`id`, `hotel_id`, `type_rooms_id`, `count`) VALUES
(1, 1, 1, 30),
(2, 1, 2, 30),
(3, 1, 3, 30),
(4, 2, 1, 20),
(5, 2, 2, 20),
(6, 3, 1, 15),
(7, 3, 2, 20),
(8, 4, 1, 60),
(9, 4, 2, 70),
(10, 4, 3, 20),
(11, 5, 1, 20),
(12, 5, 2, 25),
(13, 5, 3, 40),
(14, 6, 1, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `hotel_services`
--

CREATE TABLE `hotel_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_id` int(10) UNSIGNED DEFAULT NULL,
  `type_service_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `hotel_services`
--

INSERT INTO `hotel_services` (`id`, `hotel_id`, `type_service_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_10_213153_create_countries_table', 1),
(5, '2020_02_10_213205_create_cities_table', 1),
(6, '2020_02_10_213218_create_types_food_table', 1),
(7, '2020_02_10_213300_create_hotels_table', 1),
(8, '2020_02_10_213301_create_tours_table', 1),
(9, '2020_02_10_213406_create_types_service_table', 1),
(10, '2020_02_10_213408_create_hotel_services_table', 1),
(11, '2020_02_10_213447_create_types_room_table', 1),
(12, '2020_02_10_213456_create_hotel_rooms_table', 1),
(13, '2020_02_10_213555_create_orders_tour_table', 1),
(14, '2020_02_24_135354_create_type_transfers_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `order_tour`
--

CREATE TABLE `order_tour` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `tour_id` int(10) UNSIGNED NOT NULL,
  `city_departure` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_tour`
--

INSERT INTO `order_tour` (`id`, `user_id`, `tour_id`, `city_departure`) VALUES
(2, 1, 2, 1),
(3, 1, 7, 1),
(4, 1, 3, 1),
(5, 1, 4, 1),
(6, 1, 5, 1),
(7, 1, 6, 2),
(8, 1, 8, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tours`
--

CREATE TABLE `tours` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_id` int(10) UNSIGNED DEFAULT NULL,
  `count_peoples` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `start_tour` date NOT NULL,
  `end_tour` date NOT NULL,
  `insurance` tinyint(1) NOT NULL,
  `type_transfer_id` int(10) UNSIGNED DEFAULT NULL,
  `visa` tinyint(1) NOT NULL,
  `food` tinyint(1) NOT NULL,
  `residence` tinyint(1) NOT NULL,
  `hotel_delivery` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tours`
--

INSERT INTO `tours` (`id`, `hotel_id`, `count_peoples`, `cost`, `start_tour`, `end_tour`, `insurance`, `type_transfer_id`, `visa`, `food`, `residence`, `hotel_delivery`) VALUES
(1, 1, 2, 15300, '2020-03-12', '2020-03-26', 1, 1, 1, 1, 1, 1),
(2, 2, 2, 17800, '2020-03-14', '2020-03-24', 0, 2, 0, 0, 0, 0),
(3, 3, 3, 21700, '2020-04-08', '2020-04-23', 1, 1, 0, 1, 1, 0),
(4, 4, 2, 14500, '2020-03-18', '2020-03-26', 1, 1, 0, 1, 1, 1),
(5, 5, 4, 35140, '2020-04-15', '2020-04-30', 0, 4, 1, 1, 1, 1),
(6, 6, 2, 20000, '2020-02-20', '2020-02-29', 1, 3, 1, 1, 1, 1),
(7, 7, 2, 12000, '2020-03-20', '2020-03-31', 1, 1, 0, 1, 1, 1),
(8, 1, 3, 27000, '2020-02-22', '2020-02-29', 1, 2, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `types_food`
--

CREATE TABLE `types_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `types_food`
--

INSERT INTO `types_food` (`id`, `name`) VALUES
(2, 'Без питания'),
(1, 'Все включено'),
(3, 'Завтрак и Обед');

-- --------------------------------------------------------

--
-- Структура таблицы `types_room`
--

CREATE TABLE `types_room` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `types_room`
--

INSERT INTO `types_room` (`id`, `name`) VALUES
(2, 'Люкс'),
(1, 'Обычный'),
(3, 'Полу люкс');

-- --------------------------------------------------------

--
-- Структура таблицы `types_service`
--

CREATE TABLE `types_service` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `types_service`
--

INSERT INTO `types_service` (`id`, `name`) VALUES
(3, 'Бар'),
(2, 'Бассейн'),
(1, 'Еда в номер'),
(4, 'Массаж'),
(5, 'Музыка');

-- --------------------------------------------------------

--
-- Структура таблицы `type_transfers`
--

CREATE TABLE `type_transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `type_transfers`
--

INSERT INTO `type_transfers` (`id`, `name`) VALUES
(1, 'Автобус'),
(4, 'Корабль'),
(3, 'Поезд'),
(2, 'Самолет');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `phone`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '+38071573663', 'admin@gmail.com', 1, NULL, '$2y$10$p/wS.ntHFaCW0gETGjddfOlek131MxIayeV.h1I5qVlPxDJwBEtDK', 'U5L9g6693GtvZj0l2BtyTewho0JcWy11p71C8xRZLWCMDmKjQbkNwBqX8EPa', '2020-02-11 15:21:11', '2020-02-11 15:21:11');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_city_id_foreign` (`city_id`),
  ADD KEY `hotels_type_food_id_foreign` (`type_food_id`);

--
-- Индексы таблицы `hotel_photos`
--
ALTER TABLE `hotel_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_photos_hotel_id_foreign` (`hotel_id`);

--
-- Индексы таблицы `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_rooms_hotel_id_foreign` (`hotel_id`),
  ADD KEY `hotel_rooms_type_rooms_id_foreign` (`type_rooms_id`);

--
-- Индексы таблицы `hotel_services`
--
ALTER TABLE `hotel_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_services_hotel_id_foreign` (`hotel_id`),
  ADD KEY `hotel_services_type_service_id_foreign` (`type_service_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_tour`
--
ALTER TABLE `order_tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_tour_user_id_foreign` (`user_id`),
  ADD KEY `order_tour_tour_id_foreign` (`tour_id`),
  ADD KEY `order_tour_city_departure_foreign` (`city_departure`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tours_hotel_id_foreign` (`hotel_id`),
  ADD KEY `tours_type_transfer_id_foreign` (`type_transfer_id`);

--
-- Индексы таблицы `types_food`
--
ALTER TABLE `types_food`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `types_food_name_unique` (`name`);

--
-- Индексы таблицы `types_room`
--
ALTER TABLE `types_room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `types_room_name_unique` (`name`);

--
-- Индексы таблицы `types_service`
--
ALTER TABLE `types_service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `types_service_name_unique` (`name`);

--
-- Индексы таблицы `type_transfers`
--
ALTER TABLE `type_transfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_transfers_name_unique` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `hotel_photos`
--
ALTER TABLE `hotel_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `hotel_services`
--
ALTER TABLE `hotel_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `order_tour`
--
ALTER TABLE `order_tour`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `types_food`
--
ALTER TABLE `types_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `types_room`
--
ALTER TABLE `types_room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `types_service`
--
ALTER TABLE `types_service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `type_transfers`
--
ALTER TABLE `type_transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Ограничения внешнего ключа таблицы `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `hotels_type_food_id_foreign` FOREIGN KEY (`type_food_id`) REFERENCES `types_food` (`id`);

--
-- Ограничения внешнего ключа таблицы `hotel_photos`
--
ALTER TABLE `hotel_photos`
  ADD CONSTRAINT `hotel_photos_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Ограничения внешнего ключа таблицы `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  ADD CONSTRAINT `hotel_rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `hotel_rooms_type_rooms_id_foreign` FOREIGN KEY (`type_rooms_id`) REFERENCES `types_room` (`id`);

--
-- Ограничения внешнего ключа таблицы `hotel_services`
--
ALTER TABLE `hotel_services`
  ADD CONSTRAINT `hotel_services_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `hotel_services_type_service_id_foreign` FOREIGN KEY (`type_service_id`) REFERENCES `types_service` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_tour`
--
ALTER TABLE `order_tour`
  ADD CONSTRAINT `order_tour_city_departure_foreign` FOREIGN KEY (`city_departure`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `order_tour_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`),
  ADD CONSTRAINT `order_tour_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `tours_type_transfer_id_foreign` FOREIGN KEY (`type_transfer_id`) REFERENCES `type_transfers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
