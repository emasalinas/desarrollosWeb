<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_modAbm
* Nombre del archivo	: modAbm.php
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
class modAbm {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de consulta
	/*--------------------------------------------------------------*/
	public function mGetColumns($pTableName){
		
		$this->vQueryString		  = 'SHOW COLUMNS ';
		$this->vQueryString		 .= ' FROM '.$pTableName.' ';
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArrayMultiple();
		return $arrQuery;
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de consulta
	/*--------------------------------------------------------------*/
	public function mExecuteQuery($pFieldsGet, $pTableName, $pFieldsWhere, $pFieldOrder){
		
		$this->vQueryString		 = 'SELECT';
		
		$vCount = 0;
		$vTotal = count($pFieldsGet);
		foreach($pFieldsGet as $vFieldGet){
			$this->vQueryString		.= ' '.$vFieldGet;
			
			$vCount++;
			if($vCount != $vTotal) $this->vQueryString		.= ', ';
		}
		
		$this->vQueryString		 .= ' FROM '.$pTableName.' ';
		
		$vCount = 0;
		$vTotal = count($pFieldsWhere);
		if($vTotal){
			$this->vQueryString		 .= 'WHERE';
			
			$vTotal = count($pFieldsWhere);
			foreach($pFieldsWhere as $vFieldWhere){
				$this->vQueryString		.= ' '.$vFieldWhere[0];
				$this->vQueryString		.= ' '.$vFieldWhere[1];
				$this->vQueryString		.= " '".$vFieldWhere[2]."'";
				
				$vCount++;
				if($vCount != $vTotal) $this->vQueryString		.= ' AND';
			}
		}
		
		if($pFieldOrder != ''){
			$this->vQueryString		 .= ' ORDER BY '.$pFieldOrder.' ASC';
		}
		
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArrayMultiple();
		return $arrQuery;	
		
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
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de consulta
	/*--------------------------------------------------------------*/
	public function mResolveJson($pFolderName, $pTableName, $pFileName){
		
		if($pFileName != ''){
			try {
				$arrJson 			= file_get_contents('./publicMVC/json/'.$pFolderName.'/'.$pTableName.$pFileName.'.json');
				$arrJsonData		= json_decode($arrJson, false);
				return $arrJsonData;
			}
			catch (Exception $e) {
				echo $e->getMessage();
			}		
		}
		
	}
		
}

?>