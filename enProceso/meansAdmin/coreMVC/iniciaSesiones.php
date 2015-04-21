<?php

class clSesiones{
	
	/*--------------------------------------------------------------*/
	// Metodo para iniciar la sesion PHP
	/*--------------------------------------------------------------*/
	public static function mSessionInicializate() {
		
		self::mSessionStop();
		$vSecure 			= false;
		$vHttpOnly 			= true;
		
		ini_set('session.use_only_cookies', 1);
		
		$vCookieParams = session_get_cookie_params(); //Obtén params de cookies actuales.
		session_set_cookie_params($vCookieParams["lifetime"], $vCookieParams["path"], $vCookieParams["domain"], $vSecure, $vHttpOnly);
		
		self::mSessionStart();
		session_regenerate_id(true);
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para comenzar
	/*--------------------------------------------------------------*/
	public static function mSessionStart() {
		
		$vSessionName 		= 'userSessionMT';
		session_name($vSessionName);
		session_start();
		//session_commit();
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para detener la sesion
	/*--------------------------------------------------------------*/
	public static function mSessionStop() {
		
		$vSessionName 		= 'userSessionMT';
		$_SESSION = array();
		$vParams = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000, $vParams["path"], $vParams["domain"], $vParams["secure"], $vParams["httponly"]);
		session_unset();
		session_destroy(); 
		//session_commit();
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para establecer variables de sesion
	/*--------------------------------------------------------------*/
	public static function mSessionCreateVar($pVarName, $pVarValue) {
		
		$_SESSION[$pVarName]	= $pVarValue;
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para establecer variables de sesion
	/*--------------------------------------------------------------*/
	public static function mSessionGetVar($pVarName) {
		
		if(isset($_SESSION[$pVarName]))
		return $_SESSION[$pVarName];
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para establecer variables de sesion
	/*--------------------------------------------------------------*/
	public static function mSessionCheck() {
		
		$vSlash = self::mSessionGetVar('userSlash');
		if(isset($vSlash)) return true; else return false;
		
	}
	
	

}
?>