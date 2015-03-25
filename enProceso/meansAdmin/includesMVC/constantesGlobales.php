<?php
/*********************************************************************
* Codigo del archivo	: PHP_001_constantesGlobales
* Nombre del archivo	: constantesGlobales.php
* Objetivo del archivo	: Constantes Globales del sistema
*
* Categoria				: PHP
* Paquete				: 001
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* URL's del sitio
*********************************************************************/

/********************************************************************
* Constantes del sistema
*********************************************************************/
define('CONS_BDHOST', 'localhost');
define('CONS_BDUSER', 'root');
define('CONS_BDPASS', '');
define('CONS_BDNAME', 'meansTravels');

define('C_ENCRYPTION_STRING', 'enCryptTicketPlaceIDUser');

define('C_MIN_LEVEL_ADMIN', 3);

/********************************************************************
* Constantes del negocio
*********************************************************************/
define('levelTipoUsuario0', 			'1');
define('levelTipoUsuario1', 			'2');
define('levelTipoUsuario2', 			'3');

define('estadoViaje0', 			'Sin Confirmar');
define('estadoViaje1', 			'Confirmado');

?>