<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_vistaSynchro
* Nombre del archivo	: visSynchro.php
* Objetivo del archivo	: Vista del Synchro
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Desarrollo del codigo HTML de la vista
*********************************************************************/

/*-----------------------------------------------------
	Cross Access
-----------------------------------------------------*/
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

echo json_encode($this->entSynchro->arrServerAnswer);
?>
