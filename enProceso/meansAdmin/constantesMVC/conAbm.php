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

/********************************************************************
* Constantes del negocio
*********************************************************************/

/*  Tabla Proveedores   */
define('proveedores-idPrincipal', 			'#');
define('proveedores-razonProveedor', 		'Razon Social');
define('proveedores-cuitProveedor', 		'CUIT');

define('tituloProveedores', 	'Proveedores');
define('subtituloProveedores', 	'Listado');

/*  Tabla Usuarios   */
define('usuarioNombre', 		'Nombre');
define('usuarioApellido', 		'Apellido');
define('usuarioDNI', 			'Documento');
define('usuarioClave', 			'Password');
define('usuarioCalle', 			'Calle');
define('usuarioNumero', 		'Numero');
define('usuarioPiso', 			'Piso');
define('usuarioDepto', 			'Depto');
define('usuarioPrefijo', 		'Cod. Área');
define('usuarioCelular', 		'Celular');
define('usuarioMail', 			'E-Mail');

define('tituloUsuarios', 		'Clientes');
define('subtituloUsuarios', 	'Pasajeros frecuentes');

/*  Tabla Conductores   */
define('conductores-idPrincipal', 			'#');
define('conductores-idRelacion1', 			'Proveedor');
define('conductores-nomConductor', 			'Nombre');
define('conductores-apeConductor', 			'Apellido');

define('tituloConductores', 	'Conductores');
define('subtituloConductores', 	'Listado');

/*  Tabla Moviles   */
define('movil-idPrincipal', 			'#');
define('movil-idRelacion1', 			'Proveedor');
define('movil-idRelacion2', 			'Conductor');
define('movil-capacidadMovil', 			'Capacidad');
define('movil-marcaMovil', 				'Marca');
define('movil-modeloMovil', 			'Modelo');
define('movil-patenteMovil', 			'Patente');
define('movil-colorMovil', 				'Color');

define('tituloMovil', 		'Moviles');
define('subtituloMovil', 	'Listado');

/*  Tabla Ciudades   */
define('ciudades-idPrincipal', 			'#');
define('ciudades-nombreCiudad', 		'Nombre');

define('tituloCiudades', 		'Ciudades');
define('subtituloCiudades', 	'Listado');

/*  Tabla Destinos   */
define('destinos-idPrincipal', 			'#');
define('destinos-idRelacion1', 			'Origen');
define('destinos-idRelacion2', 			'Destino');

define('tituloDestinos', 		'Destinos');
define('subtituloDestinos', 	'Listado');

/*  Tabla Condiciones   */
define('condiciones-idPrincipal', 			'#');
define('condiciones-nomCondicion', 			'Nombre');

define('tituloCondiciones', 		'Condiciones');
define('subtituloCondiciones', 		'Listado');

/*  Tabla Precios   */
define('precios-idPrincipal', 			'#');
define('precios-idRelacion1', 			'Condicion Precio');
define('precios-nomPrecio', 			'Concepto');
define('precios-formulaPrecio', 		'Formula');

define('tituloPrecios', 		'Precios');
define('subtituloPrecios', 		'Listado');

?>