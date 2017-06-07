
CREATE DATABASE IF NOT EXISTS revenda_noite;

USE revenda_noite;


CREATE TABLE `carros` (
  `id` int(10) UNSIGNED NOT NULL,
  `modelo` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` smallint(6) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `combustivel` enum('A','G','D','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `marca_id` smallint(5) UNSIGNED NOT NULL,
  `destaque` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `carros` (`id`, `modelo`, `cor`, `ano`, `preco`, `combustivel`, `created_at`, `updated_at`, `marca_id`, `destaque`) VALUES
(1, 'Sandero', 'Preto', 2014, '2350000.00', 'F', '2017-05-11 12:12:55', '2017-06-02 02:16:19', 4, 1),
(2, 'Palio', 'Branco', 2012, '1680000.00', 'A', '2017-05-11 12:12:55', '2017-06-02 03:24:41', 1, 1),
(3, 'Fiesta', 'Branco', 2015, '24900.00', 'F', '2017-05-11 12:12:55', '2017-05-30 05:57:17', 5, 1),
(4, 'Onix', 'Vermelho', 2017, '39590.00', 'F', '2017-05-26 11:51:14', '2017-05-30 05:37:34', 2, 1),
(5, 'Prisma', 'Cinza', 2016, '40227.00', 'F', '2017-05-26 11:52:33', '2017-05-30 05:56:56', 2, 1),
(6, 'Punto', 'Branco', 2016, '48126.00', 'F', '2017-05-26 11:54:02', '2017-05-30 05:43:33', 1, 1),
(8, 'Duster', 'Marrom', 2016, '52000.00', 'F', '2017-05-26 11:57:28', '2017-06-01 22:13:56', 4, 1),
(9, 'SpaceFox', 'Branco', 2016, '52900.00', 'F', '2017-05-26 11:59:52', '2017-05-30 06:20:23', 3, 1),
(11, 'auhiahaiu', 'ajijaojao', 2000, '200.00', 'A', '2017-06-02 03:34:29', '2017-06-02 03:34:29', 2, NULL);



CREATE TABLE `marcas` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nome` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `marcas` (`id`, `nome`) VALUES
(1, 'Fiat'),
(2, 'Chefrolet'),
(3, 'Volkswagen'),
(4, 'Renault'),
(5, 'Ford');


CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `propostas` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `proposta` decimal(10,2) DEFAULT NULL,
  `carro_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `propostas` (`id`, `nome_cliente`, `email`, `telefone`, `proposta`, `carro_id`) VALUES
(1, 'Cliente Um', 'cliente1@gmail.com', '9128-1397', '10000.00', 2),
(2, 'Cliente Dois', 'cliente2@gmail.com', '9128-1852', '20000.00', 2),
(3, 'Cliente Tres', 'cliente3@gmail.com', '8428-0280', '30000.00', 2),
(19, 'Bruna Nobre Almeida', 'brunanobrealmeida@gmail.com', '5391281397', '30000.00', 3),
(20, 'Bruna Nobre Almeida', 'brunanobrealmeida@gmail.com', '5391281397', '30000.00', 5),
(21, 'Bruna Nobre Almeida', 'brunanobrealmeida@gmail.com', '5391281397', '10000.00', 1),
(22, 'Bruna Nobre Almeida', 'brunanobrealmeida@gmail.com', '5391281397', '1000000.00', 3);



CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `carros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carros_marca_id_foreign` (`marca_id`);


ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);


ALTER TABLE `propostas`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);


ALTER TABLE `carros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `marcas`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `propostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;


ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `carros`
  ADD CONSTRAINT `carros_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`);


