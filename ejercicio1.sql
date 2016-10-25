# phpMyAdmin MySQL-Dump
# version 2.3.2
# http://www.phpmyadmin.net/ (download page)
#
# servidor: localhost
# Tiempo de generaci�n: 03-02-2004 a las 16:34:02
# Versi�n del servidor: 4.00.12
# Versi�n de PHP: 4.3.1
# Base de datos : `lindavista`
# --------------------------------------------------------

#
# Estructura de tabla para la tabla `noticias`
#

CREATE TABLE noticias (
  id smallint(5) unsigned NOT NULL auto_increment,
  titulo varchar(100) NOT NULL default '',
  texto text NOT NULL,
  categoria enum('promociones','ofertas','costas') NOT NULL default 'promociones',
  fecha date NOT NULL default '0000-00-00',
  imagen varchar(100) default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM COMMENT='Noticias de la inmobiliaria Lindavista';

#
# Volcar la base de datos para la tabla `noticias`
#

INSERT INTO noticias VALUES (1, 'Nueva promoci�n en Nervi�n', '145 viviendas de lujo en urbanizaci�n ajardinada situadas en un entorno privilegiado', 'promociones', '2004-02-04', NULL);
INSERT INTO noticias VALUES (2, '�ltimas viviendas junto al r�o', 'Apartamentos de 1 y 2 dormitorios, con fant�sticas vistas. Excelentes condiciones de financiaci�n.', 'ofertas', '2004-02-05', NULL);
INSERT INTO noticias VALUES (3, 'Apartamentos en el Puerto de Sta Mar�a', 'En la playa de Valdelagrana, en primera l�nea de playa. Pisos reformados y completamente amueblados.', 'costas', '2004-02-06', 'apartamento8.jpg');
INSERT INTO noticias VALUES (4, 'Casa reformada en el barrio de la Juder�a', 'Dos plantas y �tico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro hist�rico.', 'promociones', '2004-02-07', NULL);
INSERT INTO noticias VALUES (5, 'Promoci�n en Costa Ballena', 'Con vistas al campo de golf, magn�ficas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2004-02-09', 'apartamento9.jpg');
    