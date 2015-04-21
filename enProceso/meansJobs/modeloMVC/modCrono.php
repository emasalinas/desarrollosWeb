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
		$this->clMysqliConn->mSeteaAutocommit(false);
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
		return $this->clMysqliConn->mObtenerNumeroId();
		
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
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de actualizacion
	/*--------------------------------------------------------------*/
	public function mExecuteCommit($pState){
		if($pState == true){
			$this->clMysqliConn->mCommit();
		}else{
			$this->clMysqliConn->mRollback();
		}
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de actualizacion
	/*--------------------------------------------------------------*/
	public function mGetPreliminary(){
		
		$this->vQueryString		 = 'SELECT * FROM tblCronograma ';
		$this->vQueryString		.= 'ORDER BY idRelacion1 ASC';
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArrayMultiple();
		return $arrQuery;
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de actualizacion
	/*--------------------------------------------------------------*/
	public function mGetMovil($pIdConductor){
		
		$this->vQueryString		  = 'SELECT idPrincipal, capacidadMovil FROM tblMovil ';
		$this->vQueryString		 .= 'WHERE idRelacion2 = "'.$pIdConductor.'"';
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
		return $arrQuery;
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de actualizacion
	/*--------------------------------------------------------------*/
	public function mGetSeatsPending($pTimeAdd){
		
		$vDatetime = new Datetime();
		$vDatetime->modify($pTimeAdd);
				
		$this->vQueryString		  = "SELECT * FROM tblPasajeros ";
		$this->vQueryString		 .= "WHERE estadoPasajero = '".estadoAsientoPendiente."' ";
		$this->vQueryString		 .= "AND ultimaActualizacion <= '".$vDatetime->format('Y-m-d H:i:s')."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArrayMultiple();
		return $arrQuery;
		
	}
	
	public function mSetSeatsPending($pTimeAdd){
		
		$vDatetime = new Datetime();
		$vDatetime->modify($pTimeAdd);
		
		$this->vQueryString		  = "UPDATE tblPasajeros ";
		$this->vQueryString		 .= "SET estadoPasajero = '".estadoAsientoLibre."' ";
		$this->vQueryString		 .= "WHERE estadoPasajero = '".estadoAsientoPendiente."' ";
		$this->vQueryString		 .= "AND ultimaActualizacion <= '".$vDatetime->format('Y-m-d H:i:s')."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		return $this->clMysqliConn->mysqliErrores;
		
	}
}

?>