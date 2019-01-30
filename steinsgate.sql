SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `steinsgate` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `steinsgate`;


CREATE TABLE `usuarios` (
	`ID`	 int(10) NOT NULL AUTO_INCREMENT,
	`Email` varchar(30) NOT NULL,
	`Pass` text NOT NULL,
	PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`Email`, `Pass`) VALUES
('admin@admin.com', '$2y$10$CqxRZBx/CLL11gEcSaU/Su7YLLd5x8JrC3DKxdXdrQpBr9e2OU5By');

ALTER TABLE `usuarios`
	ADD UNIQUE KEY `Email` (`Email`);

/*************************************seccion 2*************************************/
USE `steinsgate`;

CREATE TABLE `timealter` (
	`Section2`	 int(10) NOT NULL AUTO_INCREMENT,
	`ClaseIcono` varchar(30) NOT NULL,
	`Titulo`	 varchar(15) NOT NULL,
	`Info`		 varchar(200) NOT NULL,
	`Nivel`		 varchar(10) NOT NULL,
	PRIMARY KEY (`Section2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `timealter` (`ClaseIcono`, `Titulo`, `Info`, `Nivel`) VALUES
(	
	'icon-bootstrap', 
	'Bootstrap', 
	'Conjunto de herramientas de cÃ³digo abierto para diseÃ±os de sitios y aplicaciones web basado en CSS y con extenciones de javascript y jQuery, utilizado Ãºnicamente para el desarrollo frontend.', 
	'BÃ¡sico'
),
(
	'icon-css3',
	'CSS y CSS3',
	'Cascading Style Sheet (Hojas de estilo en cascada) es un lenguaje de diseÃ±o grÃ¡fico muy comunmente usado para establecer el diseÃ±o visual e interfaces de usuario escritas en un documento HTML.',
	'Experto'
),
(
	'icon-angular',
	'AngularJS',
	'Framework de javascript utilizado comunmente para desarrollar aplicaciones web de una sola pÃ¡gina, que se adapta al HTML tradicional para mejorar la sincronizaciÃ³n de Modelos y VÃ­stas.',
	'Intermedio'
),
(
	'icon-jquery',
	'jQuery',
	'Una biblioteca multiplataforma de javascript que ofrece una serie de funcionalidades, tales como desarrollar animaciones, agregar interacciÃ³n con la tÃ©cnica ajax, etcÃ©tera.',
	'Experto'
),
(
	'icon-javascript',
	'JavaScript',
	'El lenguaje de scripting mÃ¡s utilizado en el mundo. Orientado a objetos y utilizado para desarrollar aplicaciones complejas y dinÃ¡micas que se ejecutan del lado del cliente.',
	'Avanzado'
),
(
	'icon-jquery',
	'Ajax',
	'La tÃ©cnica de desarrollo web para crear aplicaciones que envian y rceiben pedidos asincrÃ³nicamente. Ã‰sta pÃ¡gina cuenta con un ejemplo inicio de sesiÃ³n con ajax utilizando jQuery, PHP, y MySQL.',
	'Intermedio'
),
(
	'icon-php-alt',
	'PHP',
	'Lenguaje de backend orientado a objetos, principalmente utilizado en el desarrollo de aplicaciones web. En futuras versiones de esta pÃ¡gina, aÃ±adirÃ© mÃ¡s funciones que involucren ajax y PHP.',
	'Experto'
),
(
	'icon-mysql',
	'MySQL',
	'Un sistema de gestiÃ³n de bases de datos relacionales, y conciderada como la base de datos de cÃ³digo abierto mÃ¡s popular del mundo ya que provee una alta velocidad de lectura de datos.',
	'Avanzado'
),
(
	'icon-wordpress',
	'Wordpress',
	'Un sistema de gestiÃ³n de contenidos enfocado a la creaciÃ³n de sitios web y desarrollado en el lenguaje PHP para entornos en donde se ejecuten MySQL y Apache.',
	'BÃ¡sico'
);