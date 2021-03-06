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
	// Metodo para pantalla principal del controlador (Sin Accion)
	/*--------------------------------------------------------------*/
    public function mPrincipal(){	
		
		$arrCanciones	= $this->clModelo->mCargarCanciones();
		print_r($arrCanciones);

    }
	
	/*--------------------------------------------------------------*/
	// Cargamos los elementos necesarios del controlador
	/*--------------------------------------------------------------*/
	private function mCargaElementos(){
		// Realizamos la carga de constantes
		$this->m_cargarConstantes($this->nomConstantes);
		// Realizamos la carga de entidades
		$this->m_cargarEntidades($this->nomEntidades);
        // Realizamos la carga de modelo
        $this->clModelo = $this->m_cargarModelo($this->nomModelo);
	}
	
}
