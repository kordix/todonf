CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `done` boolean default 0,
  `kategoria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `kolumna` int default 1,
    PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

alter table table `todos`
add column archived varchar(1) default 'N';
