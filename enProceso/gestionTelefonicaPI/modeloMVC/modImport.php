<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_modImport
* Nombre del archivo	: modMVC.php
* Objetivo del archivo	: Modelo de importación a BD
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Desarrollo de la clase
*********************************************************************/
class modImport {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de Lectra de CSV
	/*--------------------------------------------------------------*/
	public function mLeerCSV($pPathFilename){
		
		if (($vHandle = fopen($pPathFilename, "r")) !== FALSE) {
			while (($vDataCSV = fgetcsv($vHandle, 1000, ";")) !== FALSE) {
				$vNumFields = count($vDataCSV);
				unset($vDataLineCSV);
				for ($vPos=0; $vPos < $vNumFields; $vPos++) {
					$vDataLineCSV[] = $vDataCSV[$vPos];
				}
				$arrDataCSV[] = $vDataLineCSV;
			}
			fclose($vHandle);
		}
		
		return $arrDataCSV;
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de inserción de datos en Mysql
	/*--------------------------------------------------------------*/
	public function mInsertarRegistros($pDataCSV, $pTableName){
		
		foreach($pDataCSV as $arrLineCSV){
			$this->vQueryString		 = 'INSERT INTO '.$pTableName.' VALUES (';
			$vTotal = count($arrLineCSV);
			$vCount = 0;
			foreach($arrLineCSV as $vDataCSV){
				$vCount++;
				$this->vQueryString		.= 	mExitField($vDataCSV, $pTableName ,$vCount);
				if($vCount < $vTotal) $this->vQueryString		.= ', ';
			}
			$this->vQueryString		.= ')';	
			//$clQuery				= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
			$arrResultsMysql[]		= $this->clMysqliConn->mysqliErrores;
		}
		
		return $arrResultsMysql;
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de mapeo de valores de campos para CSV
	/*--------------------------------------------------------------*/
	public function mExitField($pDataCSV, $pTableName, $pFieldPos){
		
		$vString 	 = '"';
		
		if($pTableName == 'tblInterfacesHeader'){
			
			switch($pFieldPos){
				case 1: // Field: codPais
					$vString 	 .= $this->mExitSelect($pDataCSV, $pTableName, 'nomPais', 'codPais');
					break;
					
				case 2:	// Field: codOperadora
					$vString 	 .= $this->mExitSelect($pDataCSV, $pTableName, 'nomOperadora', 'codOperadora');
					break;
				
				case 3:	// Field: codFrente
					$vString 	 .= $this->mExitSelect($pDataCSV, $pTableName, 'nomFrente', 'codFrente');
					break;
					
				case 4:	// Field: codModulo
					$vString 	 .= $this->mExitSelect($pDataCSV, $pTableName, 'nomModulo', 'codModulo');
					break;
				
				case44:	// Field: codRicef
					$vString 	 .= $this->mExitSelect($pDataCSV, $pTableName, 'idPrincipal', 'codRicef');
					break;
					
				default:
					$vString	.= $pDataCSV;
					break;
			}
			
		}else{
			$vString	.= $pDataCSV;
		}
		
		$vString	.= '"';
		
		return $vString;
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de mapeo de valores de campos para CSV
	/*--------------------------------------------------------------*/
	public function mExitSelect($pValue, $pTableName, $pFieldName, $pFieldWhere){
		
		$this->vQueryString		 = 'SELECT '.	$pFieldName;
		$this->vQueryString		.= ' FROM '.	$pTableName;
		$this->vQueryString		.= ' WHERE '.	$pFieldWhere;
		$this->vQueryString		.= ' EQ '.		$pValue;
		$clQuery				= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery				= $this->clMysqliConn->mCreaArray();
		if($this->clMysqliConn->mysqliErrores == 1){
			return $arrQuery[0];
		}else{
			return false;
		};		
	}
}

?>