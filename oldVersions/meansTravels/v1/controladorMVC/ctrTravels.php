<?php
/*********************************************************************
* Codigo del archivo	: PHP_021_ctrTravels
* Nombre del archivo	: ctrTravels.php
* Objetivo del archivo	: Controlador de ejemplo
*
* Categoria				: PHP
* Paquete				: 021
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

class ctrTravels extends clControlador{
    
	public 	$clModelo;
	public 	$clSesion;
	private $nomConstantes;
	private $nomEntidades;
	private $nomModelo;
	private $nomVista;
	
	public $entTravels;
	
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
		
		$this->entTravels  					= new entTravels();
		
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

    }
	
	/*--------------------------------------------------------------*/
	// Metodo para visualizar un viaje
	/*--------------------------------------------------------------*/
    public function mView($pIdTravel){	
		
		$this->entTravels  					= new entTravels();
		$this->entTravels->vTravelID		= $this->mDecryptText($pIdTravel, true);
				
		$this->entTravels->travelData		= $this->clModelo->mGetTravel($this->entTravels->vTravelID);
		$this->entTravels->arrSeats			= $this->clModelo->mGetSeats($this->entTravels->vTravelID);
		
		//Convertimos los valores del array a externos
		$this->entTravels->arrTravel 		= $this->clModelo->mInputToOutput($this->entTravels->travelData);
		
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

    }
	
	
	
}
