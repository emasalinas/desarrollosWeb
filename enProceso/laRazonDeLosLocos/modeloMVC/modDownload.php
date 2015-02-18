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
class modDownload {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener la URL del Disco
	/*--------------------------------------------------------------*/
	public function mUrlDisco($pPart){
		
		if($pPart == 'partPath'){
			return './publicMVC/files/';
		}elseif($pPart == 'partFile'){
			return 'LaRazonDeLosLocos-ElDelirioDeLosCuerdos.zip';
		}
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener la URL del Disco
	/*--------------------------------------------------------------*/
	public function mAddNewDownload($pDownloadResult, $pLocation){
		
		$this->vQueryString		 = 'INSERT INTO tblDownload (ipDownload, countryDownload, regionDownload, cityDownload, latitudeDownload, longitudeDownload, dateDownload, timeDownload, resultDownload)';
		$this->vQueryString		.= ' VALUES (';
		$this->vQueryString		.= "'".$pLocation['ip']."', ";
		$this->vQueryString		.= "'".$pLocation['country_name']."', ";
		$this->vQueryString		.= "'".$pLocation['region_name']."', ";
		$this->vQueryString		.= "'".$pLocation['city']."', ";
		$this->vQueryString		.= "'".$pLocation['latitude']."', ";
		$this->vQueryString		.= "'".$pLocation['longitude']."', ";
		$this->vQueryString		.= "'".date('Y-m-d')."', ";
		$this->vQueryString		.= "'".date('H:i:S')."', ";
		$this->vQueryString		.= "'".$pDownloadResult."'";
		$this->vQueryString		.= ')';
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener la URL del Disco
	/*--------------------------------------------------------------*/
	public function mGetLocation(){
		
		$vJsonData = file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']);
		$arrLocation = json_decode($vJsonData, true);
		return $arrLocation;
		
	}
	
}

?>