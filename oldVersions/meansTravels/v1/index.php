<?php
/*********************************************************************
* Codigo del archivo	: PHP_001_indexMVC
* Nombre del archivo	: indexMVC.php
* Objetivo del archivo	: Constantes específicas del MVC
*
* Categoria				: PHP
* Paquete				: 001
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Captacion de variables de entorno
*********************************************************************/

/********************************************************************
* Carga de la configuracion inicial
*********************************************************************/
require './includesMVC/configuracionInicial.php';

/********************************************************************
* Carga de la configuracion inicial
*********************************************************************/
require './coreMVC/iniciaAplicacion.php';
require './coreMVC/iniciaConexion.php';
require './coreMVC/iniciaControlador.php';
require './coreMVC/iniciaSesiones.php';

$clAplicacion 	= new clAplicacion();