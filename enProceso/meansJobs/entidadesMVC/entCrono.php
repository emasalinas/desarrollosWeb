<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_entMVC
* Nombre del archivo	: entMVC.php
* Objetivo del archivo	: Entidades específicas del MVC
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Constantes del sistema
*********************************************************************/
class entCrono {
	
	public $arrListView			= array();
	public $arrFieldsGet		= array();
	public $arrFieldsWhere		= array();
	public $arrOptions 			= array();
	public $arrPost 			= array();
	public $arrPostDays 		= array();
	
	public $arrCronos 			= array();
	public $arrSeatsPending 	= array();
	
	public $vFieldOrder;
	public $vTableName;
	
	public $vTitulo;
	public $vSubTitulo;
	
	public $vDisplay;
	public $vTable;	
}


?>