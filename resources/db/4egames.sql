-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2020 a las 14:56:43
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `4egames`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `description` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `purchase_price` float NOT NULL,
  `sale_price` float NOT NULL,
  `languages` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `image` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `url` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `categories` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `trademark` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `release_date` date NOT NULL,
  `isDlc` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `code`, `title`, `description`, `stock`, `purchase_price`, `sale_price`, `languages`, `image`, `url`, `categories`, `trademark`, `release_date`, `isDlc`, `date`) VALUES
(3, 3, 'StarCraft 2: Wings of Liberty', 'Tras más de diez años, el legendario Starcraft regresa en una segunda parte dividida en tres juegos. Éste es el primero, Wings of Liberty, cuya campaña narra la historia de los Terran, los humanos lanzados a la conquista del espacio que inevitablemente se ven las caras en el camino con los Zerg y con los Protoss. Además de un completo modo campaña, Starcraft II incluye un modo multijugador lleno de posibilidades gracias a la conexión con Battle.net. Cuenta además con un potente editor de mapas con el que compartir contenido a través del sistema online de Blizzard.', 50, 20, 1391.5, '[{\"id\":\"1\",\"language\":\"Español\"},{\"id\":\"3\",\"language\":\"Ingles\"}]', 'resources/views/img/products/3/893.jpg', 'probando', '[{\"id\":\"2\",\"category\":\"Aventura\"},{\"id\":\"1\",\"category\":\"Accion\"},{\"id\":\"5\",\"category\":\"Ciencia Ficcion\"}]', '3', '2010-07-17', 1, '2020-02-18 13:11:10'),
(4, 4, 'Divinity: Original Sin II', 'Divinity: Original Sin II es la secuela del exitoso juego de rol de corte clásico y vista aérea que Larian Studios lanzó en 2014. Al igual que su primera parte, este nuevo juego ha sido financiado mediante crowdfunding en una exitosa campaña de Kickstarter que alcanzó todos sus objetivos extras de financiación tras superar los dos millones de dólares. Esta nueva aventura será mucho más grande y ambiciosa que su primera parte, aunque las bases jugables se mantendrán intactas, permitiéndonos librar complejos combates estratégicos por turnos en los que podremos interactuar con el entorno de muchas formas distintas. Esta vez ofrecerá multijugador, tanto cooperativo como competitivo, para hasta cuatro jugadores.', 50, 44.99, 3130.18, '[{\"id\":\"3\",\"language\":\"Ingles\"},{\"id\":\"1\",\"language\":\"Español\"}]', 'resources/views/img/products/4/412.jpg', 'probando', '[{\"id\":\"7\",\"category\":\"RPG\"}]', '12', '2017-09-14', 1, '2020-02-18 13:24:28'),
(6, 6, 'Final Fantasy 14', 'Final Fantasy XIV: Shadowbringers es una nueva expansión de contenido para el juego de rol multijugador de Square Enix de consolas y PC. Shadowbringers es la tercera expansión de Final Fantasy XIV y aumenta el límite de nivel hasta 80, incluyendo como es habitual una nueva y elaborada historia y nuevos escenarios. También cuenta clases nuevas, como los Gunbreakers, la primera clase anunciada, portadores de espadas pistola, como la que vimos de Squall en Final Fantasy VIII. Esta clase cumple el rol de tanque en los equipos.\r\n', 50, 59, 4104.92, '[{\"id\":\"3\",\"language\":\"Ingles\"}]', 'resources/views/img/products/6/633.jpg', 'probando', '[{\"id\":\"7\",\"category\":\"RPG\"}]', '11', '2019-07-02', 1, '2020-02-18 13:32:27'),
(7, 7, 'The Witcher 3: Wild Hunt', 'The Witcher 3 es la tercera entrega de la saga The Witcher desarrollada por CD Projekt para PS4, Xbox One y Pc. Se trata de un videojuego que mezcla elementos de aventura, acción y rol en un mundo abierto épico basado en la fantasía. El jugador controlará una vez más a Geralt de Rivia, el afamado cazador de monstruos, (también conocido como el Lobo Blanco) y se enfrentará a un diversificadísimo bestiario y a unos peligros de unas dimensiones nunca vistas hasta el momento en la serie, mientras recorre los reinos del Norte. Durante su aventura, tendrá que hacer uso de un gran arsenal de armas, armaduras y todo tipo de magias para enfrentarse al que hasta ahora ha sido su mayor desafío, la cacería salvaje. Este videojuego ha sido galardonado como el mejor juego del año 2015 tanto por críticos especializados como por galas de premios como los “Golden Joystick Awards”, “Game Developers Choice Awards” y “The Game Awards”. Además cuenta con 2 DLC o Expansiones: Blood and wine, y Hearts of Stone.', 50, 60, 4174.5, '', 'resources/views/img/products/7/907.jpg', 'probando', '', '10', '2015-05-19', 1, '2020-02-18 13:36:55'),
(8, 8, 'Star Wars Jedi: Fallen Order', 'Star Wars Jedi: Fallen Order es un juego de acción y aventura para un jugador en tercera persona que nos trasladará a una época convulsa en la cronología de Star Wars. Desarrollado por EA y Respawn Entertainment, nos invita a encarnar a un Jedi que ha permanecido oculto a la exterminación de su religión tras la Orden 66. Nuestra misión será la de sobrevivir al recién fundado Imperio Galáctico, combatiendo contra los Inquisidores y descubriendo más de la fragmentada y proscrita Orden Jedi.', 50, 50, 3478.75, '[{\"id\":\"1\",\"language\":\"Español\"},{\"id\":\"3\",\"language\":\"Ingles\"}]', 'resources/views/img/products/8/732.jpg', 'probando', '[{\"id\":\"1\",\"category\":\"Accion\"},{\"id\":\"2\",\"category\":\"Aventura\"}]', '1', '2019-11-15', 1, '2020-02-18 13:38:09'),
(9, 9, 'Warcraft III: Reforged', 'Warcraft III: Reforged es la nueva versión del aclamado videojuego de estrategia en tiempo real Warcraft III, todo un clásico del género. Desarrollado por Blizzard, supone una adaptación técnica y jugable, pues además de ofrecer un nuevo aspecto gráfico acorde a los tiempos incluye una serie de cambios en las mecánicas para hacer el título más disfrutables en PC.', 50, 30, 2087.25, '[{\"id\":\"1\",\"language\":\"Español\"},{\"id\":\"3\",\"language\":\"Ingles\"}]', 'resources/views/img/products/9/774.jpg', 'probando', '[{\"id\":\"8\",\"category\":\"RTS\"}]', '3', '2020-01-29', 1, '2020-02-18 13:46:08'),
(10, 10, 'Los Sims 4', 'Los Sims 4 es la nueva entrega de la serie de simulación social de Maxis que nos propone controlar a estos seres virtuales y hacer que evolucionen en sus vidas. Esta cuarta entrega incluye mayor libertad que nunca para construir la vivienda de nuestros Sims, con más opciones de diseño, y un sistema de elecciones que hará que las decisiones que tomen nuestros seres virtuales afecten a su vida.', 50, 60, 4174.5, '[{\"id\":\"1\",\"language\":\"Español\"},{\"id\":\"3\",\"language\":\"Ingles\"}]', 'resources/views/img/products/10/559.jpg', 'probando', '[{\"id\":\"10\",\"category\":\"Simulador social\"},{\"id\":\"9\",\"category\":\"Simulacion\"}]', '1', '2014-09-04', 1, '2020-02-18 13:47:14'),
(11, 11, 'ARK: Survival Evolved', 'ARK: Survival Evolved para PC es un nuevo juego de supervivencia y mundo abierto. A lo largo de la aventura tendremos que cazar para sobrevivir, crear objetos, mejorar nuestra tecnología, construir refugios, etcétera. Todo ello mientras exploramos una gigantesca isla repleta de dinosaurios, lo que se perfila como uno de sus mayores atractivos.', 50, 50, 3478.75, '[{\"id\":\"1\",\"language\":\"Español\"},{\"id\":\"3\",\"language\":\"Ingles\"}]', 'resources/views/img/products/11/552.jpg', 'probando', '[{\"id\":\"11\",\"category\":\"Aventura de accion\"},{\"id\":\"12\",\"category\":\"MMO\"},{\"id\":\"13\",\"category\":\"Mundo abierto\"},{\"id\":\"14\",\"category\":\"Supervivencia\"}]', '9', '0000-00-00', 1, '2020-02-18 13:48:36'),
(12, 12, 'DOOM Eternal', 'DOOM Eternal es la secuela del éxito de 2016, DOOM. Ahondando de nuevo en las raíces clásicas del género de acción en primera persona, la segunda parte desarrollada por id Software y Bethesda sigue apostando por la guerra sin cuartel contra los demonios en Xbox One, PS4, PC y Nintendo Switch.', 50, 60, 4174.5, '[{\"id\":\"3\",\"language\":\"Ingles\"},{\"id\":\"1\",\"language\":\"Español\"}]', 'resources/views/img/products/12/322.jpg', 'probando', '[{\"id\":\"15\",\"category\":\"Shooter en primera persona\"}]', '8', '0000-00-00', 1, '2020-02-18 13:49:47'),
(13, 13, 'GTA 5', 'La quinta parte de Grand Theft Auto para PC vuelve a la costa oeste americana, ambientándose en la ciudad de Los Santos (Los Ángeles) y sus alrededores, con una historia ambientada en la actualidad, especialmente en las consecuencias de la crisis económica. Está protagonizada por Michael, Franklin y Trevor, tres criminales con diferentes habilidades, pudiendo cambiar de personaje en todo momento y vivir cada una de sus vidas, así como aprovechar sus habilidades en las misiones.', 50, 60, 4174.5, '[{\"id\":\"3\",\"language\":\"Ingles\"},{\"id\":\"1\",\"language\":\"Español\"}]', 'resources/views/img/products/13/112.jpg', 'probando', '[{\"id\":\"1\",\"category\":\"Accion\"},{\"id\":\"2\",\"category\":\"Aventura\"}]', '7', '0000-00-00', 1, '2020-02-18 13:51:16'),
(14, 14, 'Red Dead Redemption 2', 'Red Dead Redemption 2 es la secuela del aclamado Red Dead Redemption de 2010 y tercera parte de la saga Red Dead, que se inició en 2004 con Red Dead Revolver. De nuevo nos lleva al salvaje oeste para proponernos convertirnos en un pistolero forajido en un gran escenario de juego. El título está previsto para Xbox One y PS4.', 50, 60, 4174.5, '[{\"id\":\"3\",\"language\":\"Ingles\"},{\"id\":\"1\",\"language\":\"Español\"}]', 'resources/views/img/products/14/846.jpg', 'probando', '[{\"id\":\"13\",\"category\":\"Mundo abierto\"},{\"id\":\"11\",\"category\":\"Aventura de accion\"},{\"id\":\"14\",\"category\":\"Supervivencia\"}]', '7', '0000-00-00', 1, '2020-02-18 13:52:38'),
(15, 15, 'Overwatch', 'Es la nueva saga de Blizzard esta vez en forma de multijugador online en primera persona ambientado en un mundo futurista. Habrá muchos personajes distintos y cada uno de ellos hará uso de sus propias armas y amplificadores. Destacar que cada uno de ellos cumplirá un rol diferente dentro del equipo, como Defensa, Tanque, Apoyo y Ataque.', 50, 40, 2783, '[{\"id\":\"3\",\"language\":\"Ingles\"},{\"id\":\"1\",\"language\":\"Español\"}]', 'resources/views/img/products/15/988.jpg', 'probando', '[{\"id\":\"15\",\"category\":\"Shooter en primera persona\"},{\"id\":\"16\",\"category\":\"Shooter multijugador\"}]', '3', '0000-00-00', 1, '2020-02-18 13:53:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `products_categories`
--

INSERT INTO `products_categories` (`id`, `category`, `date`) VALUES
(1, 'Accion', '2020-02-15 03:37:37'),
(2, 'Aventura', '2020-02-15 04:14:44'),
(5, 'Ciencia Ficcion', '2020-02-18 13:03:35'),
(7, 'RPG', '2020-02-18 13:15:45'),
(8, 'RTS', '2020-02-18 13:16:15'),
(9, 'Simulacion', '2020-02-18 13:18:06'),
(10, 'Simulador social', '2020-02-18 13:18:13'),
(11, 'Aventura de accion', '2020-02-18 13:18:25'),
(12, 'MMO', '2020-02-18 13:18:36'),
(13, 'Mundo abierto', '2020-02-18 13:18:49'),
(14, 'Supervivencia', '2020-02-18 13:18:59'),
(15, 'Shooter en primera persona', '2020-02-18 13:19:10'),
(16, 'Shooter multijugador', '2020-02-18 13:19:25'),
(17, 'Aventura narrativa', '2020-02-18 13:19:49'),
(18, 'Plataformas 2D', '2020-02-18 13:19:56'),
(19, 'Plataformas de puzles', '2020-02-18 13:20:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_languages`
--

CREATE TABLE `products_languages` (
  `id` int(11) NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `products_languages`
--

INSERT INTO `products_languages` (`id`, `language`, `date`) VALUES
(1, 'Español', '2020-02-17 20:56:25'),
(2, 'Aleman', '2020-02-17 20:56:41'),
(3, 'Ingles', '2020-02-17 20:56:50'),
(4, 'Portuges', '2020-02-17 20:57:46'),
(5, 'Guarani', '2020-02-17 20:58:17'),
(7, 'Frances', '2020-02-17 21:00:55'),
(8, 'a', '2020-02-17 21:33:04'),
(9, 'Charrua', '2020-02-17 21:44:47'),
(10, 'Esp', '2020-02-17 22:15:09'),
(11, 'Ingle', '2020-02-18 13:37:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_offerday`
--

CREATE TABLE `products_offerday` (
  `id` int(11) NOT NULL,
  `price_discount` float NOT NULL,
  `discount` float NOT NULL,
  `date_limit` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `offerOn` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `products_offerday`
--

INSERT INTO `products_offerday` (`id`, `price_discount`, `discount`, `date_limit`, `product_id`, `offerOn`, `date`) VALUES
(3, 1363.67, 2, '2020-02-18 15:00:00', 3, 1, '2020-02-18 13:39:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_trademarks`
--

CREATE TABLE `products_trademarks` (
  `id` int(11) NOT NULL,
  `trademark` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `products_trademarks`
--

INSERT INTO `products_trademarks` (`id`, `trademark`, `date`) VALUES
(1, 'Electronics Arts', '2020-02-15 04:55:08'),
(2, 'UBISOFT', '2020-02-15 04:55:21'),
(3, 'Blizzard', '2020-02-18 13:03:59'),
(4, 'Devolver Digital', '2020-02-18 13:20:19'),
(5, 'Private Division', '2020-02-18 13:20:26'),
(6, 'Wicked Witch y Forgotten Empires y Xbox Game Studios', '2020-02-18 13:21:59'),
(7, 'Rockstar games', '2020-02-18 13:22:10'),
(8, 'Bethesda', '2020-02-18 13:22:18'),
(9, 'Wildcard', '2020-02-18 13:22:23'),
(10, 'CD Projeckt', '2020-02-18 13:22:40'),
(11, 'Inglrd', '2020-02-18 13:22:50'),
(12, 'Larian Studios', '2020-02-18 13:22:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `image` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `tyc` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `image`, `birthday`, `status`, `last_login`, `tyc`, `isAdmin`, `create_at`, `updated_at`) VALUES
(1, 'leandro', 'gallucci', 't@t.com', '$2y$10$lL9jJFWWDvMQDBfju2.ihO7jhXebCjrvAuZBD7dWtvghrA3RFLw8y', '', '1998-12-10', 1, '2020-02-15 02:23:31', 0, 0, '2020-02-14 02:02:39', '2020-02-14 02:02:39'),
(3, 'claudia', 'gauto', 'asd@asd.com', '$2y$10$B3VjmOR0Im6dlmxpQolusucqtbr1b8lt0nEysK2u33o2eJE1bG4Mi', '', '0000-00-00', 1, '2020-02-14 02:24:38', 1, 0, '2020-02-14 02:24:38', '2020-02-14 02:24:38'),
(4, 'Tomas', 'Gallucci', 'tomifno1@gmail.com', '$2y$10$Y9gqjkCZkK0q0FX8Q/nYwe3hAjbDgk9F38Aogo1TDhYSZ8V3iPZ7.', 'resources/views/img/users/tomifno1@gmail.com/426.jpg', '1998-10-12', 1, '2020-02-18 13:03:01', 1, 1, '2020-02-14 13:36:33', '2020-02-17 13:10:49');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_languages`
--
ALTER TABLE `products_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_offerday`
--
ALTER TABLE `products_offerday`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_trademarks`
--
ALTER TABLE `products_trademarks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `products_languages`
--
ALTER TABLE `products_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `products_offerday`
--
ALTER TABLE `products_offerday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `products_trademarks`
--
ALTER TABLE `products_trademarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
