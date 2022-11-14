-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2022 a las 01:50:28
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lib_asignar_autores`
--

CREATE TABLE `lib_asignar_autores` (
  `cod_libro` int(10) UNSIGNED NOT NULL,
  `cod_autor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lib_asignar_autores`
--

INSERT INTO `lib_asignar_autores` (`cod_libro`, `cod_autor`) VALUES
(1, 1),
(4, 1),
(5, 1),
(3, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lib_asignar_categorias`
--

CREATE TABLE `lib_asignar_categorias` (
  `cod_libro` int(10) UNSIGNED NOT NULL,
  `cod_categoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lib_autor`
--

CREATE TABLE `lib_autor` (
  `cod_autor` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_sexo` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lib_autor`
--

INSERT INTO `lib_autor` (`cod_autor`, `nombres`, `apellidos`, `cod_sexo`) VALUES
(1, 'alex', 'sintec', 1),
(2, 'michael', 'collins', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lib_categoria`
--

CREATE TABLE `lib_categoria` (
  `cod_categoria` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lib_idioma`
--

CREATE TABLE `lib_idioma` (
  `cod_idioma` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lib_idioma`
--

INSERT INTO `lib_idioma` (`cod_idioma`, `descripcion`) VALUES
(1, 'Español');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lib_libro`
--

CREATE TABLE `lib_libro` (
  `cod_libro` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `cod_idioma` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lib_libro`
--

INSERT INTO `lib_libro` (`cod_libro`, `titulo`, `descripcion`, `fecha_publicacion`, `cod_idioma`) VALUES
(1, 'ser yo', 'accion', NULL, 1),
(3, 'despues de mis', 'dramatico', NULL, 1),
(4, 'asd', 'asd', NULL, 1),
(5, 'its', 'terror', NULL, 1),
(6, 'estoy aca', 'suspenso', '2022-11-13', 1);

--
-- Disparadores `lib_libro`
--
DELIMITER $$
CREATE TRIGGER `poner_fecha` BEFORE INSERT ON `lib_libro` FOR EACH ROW SET new.fecha_publicacion = now()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lib_sexo`
--

CREATE TABLE `lib_sexo` (
  `cod_sexo` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lib_sexo`
--

INSERT INTO `lib_sexo` (`cod_sexo`, `descripcion`) VALUES
(2, 'Femenino'),
(1, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_27_131335_create_lib_sexo_table', 2),
(6, '2022_10_27_133341_create_lib_idioma_table', 2),
(7, '2022_10_27_134124_create_lib_categoria_table', 2),
(8, '2022_10_27_141807_create_lib_autor_table', 2),
(9, '2022_10_27_143411_create_lib_libro_table', 2),
(10, '2022_10_27_143439_create_lib_asignar_autores_table', 2),
(11, '2022_10_27_143459_create_lib_asignar_categorias_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hugo armando garcia calvo', 'hugo.garciag4@gmail.com', NULL, '$2y$10$r7Sisx7/atVX9Hhk6q0BsOMiw2O4WjXp.xBxjJosDQ4TuuY/xyS9q', NULL, '2022-11-10 02:34:58', '2022-11-10 02:34:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `lib_asignar_autores`
--
ALTER TABLE `lib_asignar_autores`
  ADD KEY `lib_asignar_autores_cod_libro_foreign` (`cod_libro`),
  ADD KEY `lib_asignar_autores_cod_autor_foreign` (`cod_autor`);

--
-- Indices de la tabla `lib_asignar_categorias`
--
ALTER TABLE `lib_asignar_categorias`
  ADD KEY `lib_asignar_categorias_cod_libro_foreign` (`cod_libro`),
  ADD KEY `lib_asignar_categorias_cod_categoria_foreign` (`cod_categoria`);

--
-- Indices de la tabla `lib_autor`
--
ALTER TABLE `lib_autor`
  ADD PRIMARY KEY (`cod_autor`),
  ADD KEY `lib_autor_cod_sexo_foreign` (`cod_sexo`);

--
-- Indices de la tabla `lib_categoria`
--
ALTER TABLE `lib_categoria`
  ADD PRIMARY KEY (`cod_categoria`),
  ADD UNIQUE KEY `lib_categoria_titulo_unique` (`titulo`);

--
-- Indices de la tabla `lib_idioma`
--
ALTER TABLE `lib_idioma`
  ADD PRIMARY KEY (`cod_idioma`),
  ADD UNIQUE KEY `lib_idioma_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `lib_libro`
--
ALTER TABLE `lib_libro`
  ADD PRIMARY KEY (`cod_libro`),
  ADD UNIQUE KEY `lib_libro_titulo_unique` (`titulo`),
  ADD KEY `lib_libro_cod_idioma_foreign` (`cod_idioma`);

--
-- Indices de la tabla `lib_sexo`
--
ALTER TABLE `lib_sexo`
  ADD PRIMARY KEY (`cod_sexo`),
  ADD UNIQUE KEY `lib_sexo_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lib_autor`
--
ALTER TABLE `lib_autor`
  MODIFY `cod_autor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lib_categoria`
--
ALTER TABLE `lib_categoria`
  MODIFY `cod_categoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lib_idioma`
--
ALTER TABLE `lib_idioma`
  MODIFY `cod_idioma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lib_libro`
--
ALTER TABLE `lib_libro`
  MODIFY `cod_libro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `lib_sexo`
--
ALTER TABLE `lib_sexo`
  MODIFY `cod_sexo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lib_asignar_autores`
--
ALTER TABLE `lib_asignar_autores`
  ADD CONSTRAINT `lib_asignar_autores_cod_autor_foreign` FOREIGN KEY (`cod_autor`) REFERENCES `lib_autor` (`cod_autor`) ON DELETE CASCADE,
  ADD CONSTRAINT `lib_asignar_autores_cod_libro_foreign` FOREIGN KEY (`cod_libro`) REFERENCES `lib_libro` (`cod_libro`) ON DELETE CASCADE;

--
-- Filtros para la tabla `lib_asignar_categorias`
--
ALTER TABLE `lib_asignar_categorias`
  ADD CONSTRAINT `lib_asignar_categorias_cod_categoria_foreign` FOREIGN KEY (`cod_categoria`) REFERENCES `lib_categoria` (`cod_categoria`) ON DELETE CASCADE,
  ADD CONSTRAINT `lib_asignar_categorias_cod_libro_foreign` FOREIGN KEY (`cod_libro`) REFERENCES `lib_libro` (`cod_libro`) ON DELETE CASCADE;

--
-- Filtros para la tabla `lib_autor`
--
ALTER TABLE `lib_autor`
  ADD CONSTRAINT `lib_autor_cod_sexo_foreign` FOREIGN KEY (`cod_sexo`) REFERENCES `lib_sexo` (`cod_sexo`);

--
-- Filtros para la tabla `lib_libro`
--
ALTER TABLE `lib_libro`
  ADD CONSTRAINT `lib_libro_cod_idioma_foreign` FOREIGN KEY (`cod_idioma`) REFERENCES `lib_idioma` (`cod_idioma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
