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
class modIndex {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener ciudad
	/*--------------------------------------------------------------*/
	public function mObtenerCiudades($pDesde = false){
		
		if(!$pDesde){
			$this->vQueryString		 = "SELECT idPrincipal, nombreCiudad FROM tblCiudades ";
			$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
			$arrQuery	= $this->clMysqliConn->mCrearArrayMultiple();
			return $arrQuery;
		}else{
			$this->vQueryString		 = "SELECT tblCiudades.idPrincipal, tblCiudades.nombreCiudad FROM tblDestinos ";
			$this->vQueryString		.= "INNER JOIN tblCiudades ON tblCiudades.idPrincipal = tblDestinos.idRelacion2 ";
			$this->vQueryString		.= "WHERE tblDestinos.idRelacion1 = '".$pDesde."' ";
			$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
			$arrQuery	= $this->clMysqliConn->mCrearArrayMultiple();
			return $arrQuery;
		}
	}
}

?>