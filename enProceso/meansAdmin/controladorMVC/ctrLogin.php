<?php
/*********************************************************************
* Codigo del archivo	: PHP_021_ctrMVC
* Nombre del archivo	: ctrLogin.php
* Objetivo del archivo	: Controlador de Inicio Sesión
*
* Categoria				: PHP
* Paquete				: 021
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

class ctrLogin extends clControlador{
    
	public 	$clModelo;
	public 	$clSesion;
	private $nomConstantes;
	private $nomEntidades;
	private $nomModelo;
	private $nomVista;
	
	public $entLogin;
	
	/*--------------------------------------------------------------*/
	// Metodo de carga del archivo de constantes
	/*--------------------------------------------------------------*/
    public function __construct($pNomControlador){
		// Establecemos los nombres de los elementos
		$this->nomConstantes	= 'con'	.	$pNomControlador;
		$this->nomEntidades		= 'ent'	.	$pNomControlador;
		$this->nomModelo		= 'mod'	.	$pNomControlador;
		$this->nomVista			= 'vis'	.	$pNomControlador;
		
		// Cargamos los elementos
		$this->mCargaElementos();
	}
	
	/*--------------------------------------------------------------*/
	// Cargamos los elementos necesarios del controlador
	/*--------------------------------------------------------------*/
	private function mCargaElementos(){
		// Realizamos la carga de constantes
		$this->mCargarConstantes($this->nomConstantes);
		// Realizamos la carga de entidades
		$this->mCargarEntidades($this->nomEntidades);
        // Realizamos la carga de modelo
        $this->clModelo = $this->mCargarModelo($this->nomModelo);
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para pantalla principal del controlador (Sin Accion)
	/*--------------------------------------------------------------*/
    public function mPrincipal(){	
		
		$this->entLogin  					= new entLogin();
		
		$this->clSesion = new clSesiones;
		$this->clSesion->mSessionStart();
		if($this->clSesion->mSessionCheck())
		header('Location: '.C_PREFIX_HOME.'/dashboard/');
		
					
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista, true, false);

    }
	
	/*--------------------------------------------------------------*/
	// Metodo para inicio de sesion
	/*--------------------------------------------------------------*/
    public function mValidation(){	
				
		$this->entLogin  					= new entLogin();
		$this->entLogin->userDNI			= $_POST['txtDNI'];
		$this->entLogin->userPassword		= $_POST['txtPassword'];
		
		$this->entLogin->userData			= $this->clModelo->mUserGetData($this->entLogin->userDNI, $this->entLogin->userPassword);
		
		if(array_key_exists('idPrincipal', $this->entLogin->userData)){
			
			if(array_key_exists('tipoUsuario', $this->entLogin->userData)){
				$vLevel	= constant('levelTipoUsuario'.$this->entLogin->userData['tipoUsuario']);
				if($vLevel >= C_MIN_LEVEL_ADMIN){
			
					$this->clSesion = new clSesiones;
					$this->clSesion->mSessionInicializate();
					$this->clSesion->mSessionStart();
					
					$this->entLogin->userSlash			= base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(C_ENCRYPTION_STRING), $this->entLogin->userData['idPrincipal'], MCRYPT_MODE_CBC, md5(md5(C_ENCRYPTION_STRING))));
					
					$this->clSesion->mSessionCreateVar('userSlash', $this->entLogin->userSlash);
					
					$vCallBackURL		=	$this->clSesion->mSessionGetVar('callBackURL');
					if(isset($vCallBackURL))
						header('Location: '.C_PREFIX_HOME.$vCallBackURL);
					else
						header('Location: '.C_PREFIX_HOME.'/dashboard/');
											
				}else{
					
					$this->entLogin->userData['codError']	= '500';
					$this->entLogin->userData['descError']	= 'No tiene permisos para realizar dicha operación.';	
					
					// Cargamos la vista con todo lo que teniamos
					$this->mCargarVista($this->nomVista, true, false);
				}
			}
				
		}else{
			
			// Cargamos la vista con todo lo que teniamos
			$this->mCargarVista($this->nomVista, true, false);
		}
    }
	
	/*--------------------------------------------------------------*/
	// Metodo para cierra de sesion
	/*--------------------------------------------------------------*/
    public function mLogout(){	
		
		$this->clSesion = new clSesiones;
		$this->clSesion->mSessionStart();
		$this->clSesion->mSessionStop();
		
		header('Location: '.C_PREFIX_HOME);
		
	}
	
	
}
