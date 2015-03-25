<?php
/*********************************************************************
* Codigo del archivo	: PHP_021_ctrRegister
* Nombre del archivo	: ctrRegister.php
* Objetivo del archivo	: Controlador de Registro de Usuario
*
* Categoria				: PHP
* Paquete				: 021
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

class ctrRegister extends clControlador{
    
	public 	$clModelo;
	private $nomConstantes;
	private $nomEntidades;
	private $nomModelo;
	private $nomVista;
	
	public $entRegister;
	
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
		
		$this->entRegister  					= new entRegister();
		
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

    }
	
	/*--------------------------------------------------------------*/
	// Metodo para pantalla principal del controlador (Sin Accion)
	/*--------------------------------------------------------------*/
    public function mGenerate(){	
		
		$this->entRegister  					= new entRegister();
		$this->arrUserData						= $_POST;
		$this->entRegister->registerResult		= $this->clModelo->mCrearUsuario($this->arrUserData);
		
		if(array_key_exists('userID', $this->entRegister->registerResult)){
			$this->clSesion = new clSesiones;
			$this->clSesion->mSessionInicializate();
			$this->clSesion->mSessionStart();
				
			$this->entRegister->userSlash		= base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(C_ENCRYPTION_STRING), $this->entRegister->registerResult['userID'], MCRYPT_MODE_CBC, md5(md5(C_ENCRYPTION_STRING))));
				
			$this->clSesion->mSessionCreateVar('userSlash', $this->entRegister->userSlash);
				
			$vCallBackURL		=	$this->clSesion->mSessionGetVar('callBackURL');
			if(isset($vCallBackURL))
				header('Location: /meansTravels'.$vCallBackURL);
			else
				header('Location: /meansTravels/filter/');
		
		}
		
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

    }
	
	
	
}
