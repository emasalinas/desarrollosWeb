<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_conMVC
* Nombre del archivo	: conMVC.php
* Objetivo del archivo	: Constantes específicas del MVC
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Constantes del sistema
*********************************************************************/
define('MAX_LINES_PAGE', 20);


/********************************************************************
* Constantes del negocio
*********************************************************************/

/*----------------------------------------------------------------
	Campos de tablas - Etiquetas y tipos
----------------------------------------------------------------*/

/*  Tabla Download   */
define('id', 					'#');
define('ipDownload', 			'Direccion IP');
define('countryDownload', 		'Pais');
define('regionDownload', 		'Región');
define('cityDownload', 			'Ciudad');
define('latitudeDownload', 		'Latitud');
define('longitudeDownload', 	'Longitud');
define('dateDownload', 			'Fecha');
define('timeDownload', 			'Hora');
define('resultDownload', 		'Descargado');

define('tituloDownload', 		'Listado de descargas');
define('subtituloDownload', 	'El delirio de los cuerdos');

define('typeId', 					'text');
define('typeIpDownload', 			'text');
define('typeCountryDownload', 		'text');
define('typeRegionDownload', 		'text');
define('typeCityDownload', 			'text');
define('typeLatitudeDownload', 		'text');
define('typeLongitudeDownload', 	'text');
define('typeDateDownload', 			'date');
define('typeTimeDownload', 			'time');
define('typeResultDownload', 		'boolean');


/*  Tabla Usuarios   */
define('idPrincipal', 			'#');
define('usuarioNombre', 		'Nombre');
define('usuarioApellido', 		'Apellido');
define('usuarioDNI', 			'Documento');
define('usuarioClave', 			'Password');
define('usuarioCalle', 			'Calle');
define('usuarioNumero', 		'Numero');
define('usuarioPiso', 			'Piso');
define('UsuarioDepto', 			'Depto');
define('usuarioPrefijo', 		'Cod. Área');
define('usuarioCelular', 		'Celular');
define('usuarioMail', 			'E-Mail');

define('tituloUsuarios', 		'Clientes');
define('subtituloUsuarios', 	'Pasajeros frecuentes');


?>