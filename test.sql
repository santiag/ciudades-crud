--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id_municipio` int(3) NOT NULL,
  `nombre_municipio` varchar(30) NOT NULL,
  `poblacion` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id_municipio`, `nombre_municipio`, `poblacion`) VALUES
(1, 'pereira', 500000),
(2, 'dosquebradas', 210500),
(3, 'santa rosa', 70320),
(4, 'tulua', 230400),
(5, 'buga', 20344),
(6, 'armenia', 430788),
(7, 'salento', 25040);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id_municipio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id_municipio` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;
