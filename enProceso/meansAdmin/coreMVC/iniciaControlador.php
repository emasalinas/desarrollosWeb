<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_iniciaControlador
* Nombre del archivo	: iniciaControlador.php
* Objetivo del archivo	: Procesador de los controladores
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

class clControlador extends clMysqliQuery {
		
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
    public function __construct(){	

    }

    /*--------------------------------------------------------------*/
	// Metodo de carga del archivo de constantes
	/*--------------------------------------------------------------*/
	public function mCargarConstantes($pNombreConstantes)
    {
        require './constantesMVC/' . 	$pNombreConstantes 	. '.php';
    }
	
    /*--------------------------------------------------------------*/
	// Metodo de carga del archivo de entidades
	/*--------------------------------------------------------------*/
	public function mCargarEntidades($pNombreEntidad)
    {
        require './entidadesMVC/' .  	$pNombreEntidad 	. '.php';
    }
	
    /*--------------------------------------------------------------*/
	// Metodo de carga del archivo de modelo
	/*--------------------------------------------------------------*/
    public function mCargarModelo($pNombreModelo)
    {
        require './modeloMVC/' .  	$pNombreModelo 		. '.php';
		return new $pNombreModelo();
    }
	
	/*--------------------------------------------------------------*/
	// Metodo de carga del archivo de vista
	/*--------------------------------------------------------------*/
	public function mCargarVista($pNombreEntidad, $pCargaHyF = true, $pShowNavBar = true)
    {	
		$vShowNavBar = $pShowNavBar;
		if($pCargaHyF == true) include './publicMVC/html/pageHeader.php';
        include './vistaMVC/' .  	$pNombreEntidad 	. '.php';
		if($pCargaHyF == true) include './publicMVC/html/pageFooter.php';
		
    }
	
	/*--------------------------------------------------------------*/
	// Encriptar texto
	/*--------------------------------------------------------------*/
	public function mEncryptText($pText, $pUrlEncode = false){
		$vEncode = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(C_ENCRYPTION_STRING), $pText, MCRYPT_MODE_CBC, md5(md5(C_ENCRYPTION_STRING))));
		if($pUrlEncode == true) $vEncode = rawurlencode(rawurlencode($vEncode));
		return $vEncode;
	}
	
	/*--------------------------------------------------------------*/
	// Desencriptar texto
	/*--------------------------------------------------------------*/
	public function mDecryptText($pText, $pUrlDecode = false){
		if($pUrlDecode == true) $pText = rawurldecode(rawurldecode($pText));
		$vDecode = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(C_ENCRYPTION_STRING), base64_decode($pText), MCRYPT_MODE_CBC, md5(md5(C_ENCRYPTION_STRING))), "\0");
		return $vDecode;
	}

}