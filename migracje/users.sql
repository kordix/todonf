CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
    `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
      PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', 'a2089b9e24810440dbde1deccda565ea');