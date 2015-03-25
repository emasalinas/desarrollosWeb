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
class modLogin {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener los datos del login
	/*--------------------------------------------------------------*/
	public function mUserGetData($pDNI, $pClave){
		
		$this->vQueryString		 = "SELECT * FROM tblUsuarios ";
		$this->vQueryString		.= "WHERE usuarioDNI ='".$pDNI."' ";
		$this->vQueryString		.= "AND usuarioClave = '".$pClave."'";
		$clQuery				= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$vUserFind 				= $this->clMysqliConn->mObtenerNumeroFilas();
		
		if($vUserFind > 0){
			$arrQuery	= $this->clMysqliConn->mCrearArray();
		}else{
			$arrQuery['codError']	= '001';
			$arrQuery['descError']	= 'Los datos ingresados son incorrectos. Verifiquelos y vuelva a intentarlo';
		}
		return $arrQuery;	
		
	}
	
}

?>