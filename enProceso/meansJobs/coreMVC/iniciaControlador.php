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
	
	
	/*--------------------------------------------------------------*/
	// Metodo para mostrar log de resultado
	/*--------------------------------------------------------------*/
	public function mInitProcess($pProcess){
		
		ob_start();
		echo 'Se inicia el proceso de ejecucion de '.$pProcess.'<br />';
		echo '---------------------------------------------------------------------------------------------'.'<br />';
		echo '<br />';
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para mostrar log de resultado
	/*--------------------------------------------------------------*/
	public function mPrintLines($pText){
		
		echo '<br />';
		echo '---------------------------------------------------------------------------------------------'.'<br />';
		echo '- '.$pText.'<br />';
		echo '---------------------------------------------------------------------------------------------'.'<br />';
		echo '<br />';
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para mostrar log de resultado
	/*--------------------------------------------------------------*/
	public function mShowLog($pArray, $pType = ''){
		
		$vCount = count($pArray) / 2;
		echo 'Se han ejecutado '.$vCount.' registros de '.$pType.'<br />';
		echo '---------------------------------------------------------------------------------------------'.'<br />';
		
		foreach($pArray as	$vArray){
			foreach($vArray as $vKey => $vSubArray){
				echo $vKey.': '.$vSubArray.' | ';
			}
			echo '<br />';
		}
		
		echo '<br /><br />';
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para guardar el fichero output
	/*--------------------------------------------------------------*/
	public function mSaveOutput($pFolder){
		
		$vTimeStamp 	 = new DateTime;
		$vFilename  	 = './publicMVC/jobs/';
		$vFilename  	.= $pFolder.'/';
		$vFilename  	.= $vTimeStamp->format('Y-m-d-H-i-s');
		$vFilename  	.= '.html';
		
		$vContent		 = '<html><head><meta charset="utf-8"></head><body>';
		$vContent		.= ob_get_contents();
		$vContent		.= '</body></html>';		
		
		file_put_contents($vFilename, $vContent);
		
	}
}