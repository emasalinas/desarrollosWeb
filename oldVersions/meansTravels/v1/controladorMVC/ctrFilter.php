<?php
/*********************************************************************
* Codigo del archivo	: PHP_021_ctrMVC
* Nombre del archivo	: ctrMVC.php
* Objetivo del archivo	: Controlador de ejemplo
*
* Categoria				: PHP
* Paquete				: 021
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

class ctrFilter extends clControlador {
    
	public 	$clModelo;
	public 	$clSesion;
	private $nomConstantes;
	private $nomEntidades;
	private $nomModelo;
	private $nomVista;
	
	public $entFilter;
	
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
		
		$this->entFilter  					= new entFilter();
		$this->entFilter->arrTargets		= $this->clModelo->mObtenerCiudades();
		
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

    }	
	
	/*--------------------------------------------------------------*/
	// Metodo para mostrar el formulario
	/*--------------------------------------------------------------*/
    public function mFind(){
		
		$this->entFilter  					= new entFilter();
		$this->entFilter->travelData['travelFrom']		= $_POST['txtOrigen'];
		$this->entFilter->travelData['travelTo']		= $_POST['txtDestino'];
		$this->entFilter->travelData['travelDate']		= $_POST['dateViaje'];
		$this->entFilter->travelData['travelTimeFrom']	= $_POST['timeDesde'];
		$this->entFilter->travelData['travelTimeTo']	= $_POST['timeHasta'];
		
		$this->entFilter->arrTravels					= $this->clModelo->mObtenerViajes($this->entFilter->travelData);
		
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

    }
	
	/*--------------------------------------------------------------*/
	// Metodo para devolver datos necesarios
	/*--------------------------------------------------------------*/
    public function mData($pTarget, $pValue){
		
		$this->entFilter		= new entFilter();
		if($pTarget == 'citys'){
			$this->entFilter->arrTargets 	=	 $this->clModelo->mObtenerCiudades($pValue);
			if(count($this->entFilter->arrTargets) > 0){
				foreach($this->entFilter->arrTargets as $arrCiudades):
					echo '<option value="'.$arrCiudades['idPrincipal'].'">'.$arrCiudades['nombreCiudad'].'</option>';
				endforeach;
			}else{
				echo 'NOK';
			}
		}
    }
	
}
