<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_modIndex
* Nombre del archivo	: modIndex.php
* Objetivo del archivo	: Modelo del Index
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
	// Metodo de ejemplo
	/*--------------------------------------------------------------*/
	public function mObtenerResultado($pIndiceResultado){
		
		$this->vQueryString		 = 'SELECT idPartido, resultadoLocal, resultadoVisitante ';
		$this->vQueryString		.= 'FROM tblResultados ';
		$this->vQueryString		.= 'WHERE idPartido = '.$pIndiceResultado;
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
		return $arrQuery;
		
	}
}

?>