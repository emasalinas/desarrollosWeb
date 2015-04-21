<?php
/*********************************************************************
* Codigo del archivo	: PHP_021_ctrDownload
* Nombre del archivo	: ctrDownload.php
* Objetivo del archivo	: Controlador de descarga
*
* Categoria				: PHP
* Paquete				: 021
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

class ctrDownload extends clControlador{
    
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
		$this->nomVista			= 'vis'	.	$pNomControlador;
		
		// Cargamos los elementos
		$this->mCargaElementos();
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para pantalla principal del controlador (Sin Accion)
	/*--------------------------------------------------------------*/
    public function mPrincipal(){	
		
		$this->entDownload 				= new entDownload();
		$this->entDownload->vPath		= $this->clModelo->mUrlDisco('partPath');
		$this->entDownload->vFilename	= $this->clModelo->mUrlDisco('partFile');
				
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista, false);
		
		//Almacenamos la descarga en la BD
		$this->entDownload->arrLocation = $this->clModelo->mGetLocation();
		$this->clModelo->mAddNewDownload($this->entDownload->vResult, $this->entDownload->arrLocation);

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
	
}
