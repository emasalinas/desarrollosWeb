<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_modRegister
* Nombre del archivo	: modRegister.php
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
class modRegister {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para crear usuario
	/*--------------------------------------------------------------*/
	public function mCrearUsuario($pData){
		
		$arrValidations			 =  $this->mValidarDatos($pData);
		
		if($arrValidations['resultVal'] == true){
			
			$vDate 		= new DateTime();
			$vTimestamp	= $vDate->format('Y-m-d H:i:s');

			$this->vQueryString		 = 'INSERT INTO tblUsuarios (';
			$this->vQueryString		.= 'usuarioDNI, usuarioClave, usuarioNombre, usuarioApellido, ';
			$this->vQueryString		.= 'usuarioCalle, usuarioNumero, usuarioPiso, usuarioDepto, ';
			$this->vQueryString		.= 'usuarioPrefijo, usuarioCelular, usuarioMail, ultimaActualizacion';
			$this->vQueryString		.= ') VALUES (';
			$this->vQueryString		.= "'".$pData['txtDNI']."',";
			$this->vQueryString		.= "'".$pData['txtClave']."',";
			$this->vQueryString		.= "'".$pData['txtNombre']."',";
			$this->vQueryString		.= "'".$pData['txtApellido']."',";
			$this->vQueryString		.= "'".$pData['txtCalle']."',";
			$this->vQueryString		.= "'".$pData['txtNumero']."',";
			$this->vQueryString		.= "'".$pData['txtPiso']."',";
			$this->vQueryString		.= "'".$pData['txtDpto']."',";
			$this->vQueryString		.= "'".$pData['txtPrefijo']."',";
			$this->vQueryString		.= "'".$pData['txtCelular']."',";
			$this->vQueryString		.= "'".$pData['txtMail']."',";
			$this->vQueryString		.= "'".$vTimestamp."'";
			$this->vQueryString		.= ')';
			$clQuery				= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
			
			if($this->clMysqliConn->mysqliErrores == 1){
				
				$vNewId					= $this->clMysqliConn->mObtenerNumeroId();
				$arrNewuser['userID']	= $vNewId;
				
				return $arrNewuser;
			}else{
				$arrResult['resultVal']	= false;
				$arrResult['codError']	= '800';
				$arrResult['descError']	= $this->clMysqliConn->mysqliErrores;
				
				return $arrResult;
			}
		}else{
			return $arrValidations;
		}
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para validacion de datos
	/*--------------------------------------------------------------*/
	public function mValidarDatos($pData){
		
		$arrResult['resultVal']	= false;
		
		if($pData['chkTerms'] == 0){
			$arrResult['codError']	= '001';
			$arrResult['descError']	= 'Debe aceptar los terminos y condiciones';
		}elseif(substr($pData['txtPrefijo'], 0, 1) == '0'){
			$arrResult['codError']	= '002';
			$arrResult['descError']	= 'Ingrese el cod. área sin el 0.';
		}elseif(substr($pData['txtCelular'], 0, 2) == '15'){
			$arrResult['codError']	= '003';
			$arrResult['descError']	= 'Ingrese el número sin el prefijo 15.';
		}elseif($pData['txtClave'] != $pData['txtConfClave']){
			$arrResult['codError']	= '004';
			$arrResult['descError']	= 'Las claves ingresadas no coinciden';
		}elseif(strlen($pData['txtClave']) < 8){
			$arrResult['codError']	= '005';
			$arrResult['descError']	= 'La clave debe tener un mínimo de 8 carácteres';
		}else{
			//Chequeamos existencia de DNI
			$vExiste	=	$this->mExisteUsuario($pData['txtDNI']);
			if($vExiste){
				$arrResult['codError']	= '010';
				$arrResult['descError']	= 'El DNI que ha ingresado ya tiene un usuario creado.';
			}else{
				$arrResult['resultVal']	= true;
			}
		}
		
		return $arrResult;
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para validacion de datos
	/*--------------------------------------------------------------*/
	public function mExisteUsuario($pUserDNI){
		
		$this->vQueryString		 = 'SELECT ';
		$this->vQueryString		.= 'usuarioDNI, usuarioNombre, usuarioApellido ';
		$this->vQueryString		.= 'FROM tblUsuarios ';
		$this->vQueryString		.= 'WHERE usuarioDNI = "'.$pUserDNI.'"';
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		
		if($this->clMysqliConn->mObtenerNumeroFilas() == 0){
			return false;
		}else{
			return true;
		}
		
	}
	
}

?>