<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_modMVC
* Nombre del archivo	: modMVC.php
* Objetivo del archivo	: Modelo del MVC
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Desarrollo de la clase
*********************************************************************/
class modFilter {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener los vaijes
	/*--------------------------------------------------------------*/
	public function mObtenerViajes($pTravelData){
		
		$this->vQueryString		= 'SELECT id, artist, track, link FROM song';
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
		return $arrQuery;	
		
	}
}

?>