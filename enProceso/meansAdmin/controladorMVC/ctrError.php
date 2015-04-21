<?php
/*********************************************************************
* Codigo del archivo	: PHP_021_ctrError
* Nombre del archivo	: ctrError.php
* Objetivo del archivo	: Controlador de Error
*
* Categoria				: PHP
* Paquete				: 021
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

class ctrError extends clControlador{
    
	public 	$clModelo;
	private $nomConstantes;
	private $nomEntidades;
	private $nomModelo;
	
	/*--------------------------------------------------------------*/
	// Metodo de carga del archivo de constantes
	/*--------------------------------------------------------------*/
    public function __construct($pNomControlador){
		// Establecemos los nombres de los elementos
		$this->nomConstantes	= 'con'	.	$pNomControlador;
		$this->nomEntidades		= 'ent'	.	$pNomControlador;
		$this->nomModelo		= 'mod'	.	$pNomControlador;
		
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
		
		$vDos = '1';
		//echo "Valor a encriptar: ".$vDos.", ";
		
		//echo "Valor encriptado: ".$this->mEncryptText($vDos, true)."\n ";
		
		//echo "Valor desencriptado: ".$this->mDecryptText($this->mEncryptText($vDos, true), true)."\n ";
		
		echo $this->mEncryptText($vDos, true);
		echo $vValor = 'kiG8bwfZKOzU0teEy5nvWY4JXi%2B7lmndgK02J2M7T9o%3D';
		echo $vValor = 'kiG8bwfZKOzU0teEy5nvWY4JXi%2B7lmndgK02J2M7T9o%3D';
		echo "Valor desencriptado: ".$this->mDecryptText($vValor, true)."\n ";
    }
	
}
