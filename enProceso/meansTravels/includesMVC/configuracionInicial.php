<?php
/*********************************************************************
* Codigo del archivo	: PHP_001_configuracionInicial
* Nombre del archivo	: configuracionInicial.php
* Objetivo del archivo	: Configuracion necesaria para el sitio PHP
*
* Categoria				: PHP
* Paquete				: 001
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Configuraciones de PHP
*********************************************************************/
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('America/Argentina/Buenos_Aires');

/********************************************************************
* Constantes Globales
*********************************************************************/
require './includesMVC/constantesGlobales.php';

/********************************************************************
* Clases Globales
*********************************************************************/
require './includesMVC/clasesPDF.php';

/********************************************************************
* Variables Globales
*********************************************************************/
//require '';
