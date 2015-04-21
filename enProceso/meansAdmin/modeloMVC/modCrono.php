<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_modCrono
* Nombre del archivo	: modCrono.php
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
class modCrono {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de insersión
	/*--------------------------------------------------------------*/
	public function mExecuteInsert($pFields, $pTable){
		
		$this->vQueryString		 = 'INSERT INTO '.$pTable.' (';
		
		$vCount = 0;
		$vTotal = count($pFields);
		foreach($pFields as $vKey => $vFields){
			$this->vQueryString		.= $vKey;
			
			$vCount++;
			if($vCount != $vTotal) $this->vQueryString		.= ', ';
		}
		
		$this->vQueryString		 .= ') VALUES (';
		
		$vCount = 0;
		$vTotal = count($pFields);
		foreach($pFields as $vValue){
			$this->vQueryString		.= " '".$vValue."'";
			
			$vCount++;
			if($vCount != $vTotal) $this->vQueryString		.= ', ';
		}
		
		$this->vQueryString		 .= ')';
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de actualizacion
	/*--------------------------------------------------------------*/
	public function mExecuteUpdate($pFields, $pTable, $pIdUpdate){
		
		$this->vQueryString		 = 'UPDATE '.$pTable.' SET ';
		
		$vCount = 0;
		$vTotal = count($pFields);
		foreach($pFields as $vKey => $vValue){
			$this->vQueryString		.= $vKey." = '".$vValue."'";
			
			$vCount++;
			if($vCount != $vTotal) $this->vQueryString		.= ', ';
		}
		
		$this->vQueryString		 .= " WHERE idPrincipal = '".$pIdUpdate."'";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		
	}
	
}

?>