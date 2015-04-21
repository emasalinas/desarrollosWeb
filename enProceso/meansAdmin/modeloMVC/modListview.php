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
class modListview {
	
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
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener URL de Imagenes
	/*--------------------------------------------------------------*/
	public function mBorrarDuplicados($pArray, $pKey){
		$vTmpArray = array();
		$vCont = 0;
		$vKeyArray = array();
		
		foreach($pArray as $vArray){
			if(!in_array($vArray[$pKey],$vKeyArray)){
				$vKeyArray[$vCont] 		= $vArray[$pKey];
				$vTmpArray[$vCont] 		= $vArray;
			}
			$vCont++;
		}
		return $vTmpArray;
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener URL de Imagenes
	/*--------------------------------------------------------------*/
	public function mExitField($pValue, $pKey){
		if(defined('type'.ucfirst($pKey))){
			
			$vTypeField = constant('type'.ucfirst($pKey));
			switch($vTypeField){
				
				case 'date':
					$vDate = new DateTime($pValue);
					return $vDate->format('d M Y');
					break;
				
				case 'time':
					$vTime = new DateTime($pValue);
					return $vTime->format('H:i:s');
					break;
					
				case 'boolean':
					if($pValue == '0') return 'No'; else return 'Si';
					break;
					
				case 'text':
					return ucfirst($pValue);
					break;
				
				default:
						return $pValue;
					break;
			}
		}else{
			return $pValue;
		}
	}
}

?>