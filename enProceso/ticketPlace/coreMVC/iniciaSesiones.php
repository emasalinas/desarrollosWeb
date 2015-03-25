<?php

class clSesiones{
	
	/*--------------------------------------------------------------*/
	// Metodo para iniciar la sesion PHP
	/*--------------------------------------------------------------*/
	public static function mSessionInicializate() {
		
		$vSessionName 		= 'userSessionTP';
		$vSecure 			= false;
		$vHttpOnly 		= true;
		
		ini_set('session.use_only_cookies', 1);
		
		$vCookieParams = session_get_cookie_params(); //Obtén params de cookies actuales.
		session_set_cookie_params($vCookieParams["lifetime"], $vCookieParams["path"], $vCookieParams["domain"], $vSecure, $vHttpOnly);
		
		session_name($vSessionName);
		session_start();
		session_regenerate_id(true);
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para comenzar
	/*--------------------------------------------------------------*/
	public static function mSessionStart() {
		
		$vSessionName 		= 'userSessionTP';
		session_name($vSessionName);
		session_start();
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para detener la sesion
	/*--------------------------------------------------------------*/
	public static function mStopSession() {
		
		$_SESSION = array();
		$vParams = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000, $vParams["path"], $vParams["domain"], $vParams["secure"], $vParams["httponly"]);
		session_destroy(); 
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
		
		return $_SESSION[$pVarName];
		
	}
}
?>