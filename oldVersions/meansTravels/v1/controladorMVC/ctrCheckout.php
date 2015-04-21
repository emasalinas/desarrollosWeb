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

class ctrCheckout extends clControlador{
    
	public 	$clModelo;
	public 	$clSesion;
	private $nomConstantes;
	private $nomEntidades;
	private $nomModelo;
	private $nomVista;
	
	public $entCheckout;
	
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
		
		$this->entCheckout  				= new entCheckout();
		
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

    }
	
	/*--------------------------------------------------------------*/
	// Metodo para pantalla principal del controlador (Sin Accion)
	/*--------------------------------------------------------------*/
    public function mConfirm($pState, $pIdTravel = NULL, $pIdSeat = NULL){
		
		$this->clSesion = new clSesiones;
		$this->clSesion->mSessionStart();
		
		if($pIdTravel != NULL){
			$this->clSesion->mSessionCreateVar('travelID'	, $pIdTravel);
			$this->clSesion->mSessionCreateVar('seatID'		, $pIdSeat);
		}else{
			$pIdTravel	=	$this->clSesion->mSessionGetVar('travelID');
			$pIdSeat	=	$this->clSesion->mSessionGetVar('seatID');
		}
				
		$vUserSlash	= $this->clSesion->mSessionGetVar('userSlash');
		if(isset($vUserSlash)){
		
			$this->entCheckout  				= new entCheckout();
			
			$vIdTravel	=	$this->mDecryptText($pIdTravel,true );
			$vIdSeat	=	$this->mDecryptText($pIdSeat,true);
			$this->entCheckout->userActive		= $this->mDecryptText($vUserSlash,true);
			$this->entCheckout->seatState		= $this->clModelo->mGetAsientoEstado($vIdSeat);
			
			if(strtolower($pState) == 'preliminary'){
				// Para colocarlo como pendiente, debe estar libre
				if($this->entCheckout->seatState['estadoPasajero'] == '0'){
					//Ponemos el asiento en estado 'Pendiente'.
					$this->entCheckout->seatChanged		= $this->clModelo->mSetAsientoEstado($vIdSeat, C_SEAT_STATE_PENDING, $this->entCheckout->userActive);
				}else{
					
				}
			}elseif(strtolower($pState) == 'posted'){
				// Para colocarlo como pendiente, debe estar pendiente
				// Y tomado por el mismo usuario
				if(	$this->entCheckout->seatState['estadoPasajero'] == '1'
				&& 	$this->entCheckout->seatState['idRelacion2'] 	== $this->entCheckout->userActive){
				//Ponemos el asiento en estado 'Confirmado'.
					$this->entCheckout->seatChanged		= $this->clModelo->mSetAsientoEstado($vIdSeat, C_SEAT_STATE_CONFIRM, $this->entCheckout->userActive);
				}else{
					
				}
			}
			
			$this->entCheckout->travelData		= $this->clModelo->mGetTravel($vIdTravel);
			$this->entCheckout->arrSeat			= $this->clModelo->mGetSeat($vIdSeat);
			
			//Convertimos los valores del array a externos
			$this->entCheckout->arrTravel 		= $this->clModelo->mInputToOutput($this->entCheckout->travelData);
			
			// Cargamos la vista con todo lo que teniamos
			$this->mCargarVista($this->nomVista);
		}else{
			
			$vCallBackURL = '/checkout/confirm/'.$pState;
			$this->clSesion->mSessionCreateVar('callBackURL'	, $vCallBackURL);
			$this->clSesion->mSessionCreateVar('travelID'		, $pIdTravel);
			$this->clSesion->mSessionCreateVar('seatID'			, $pIdSeat);
			header('Location: '.C_PREFIX_HOME.'/login/');
			
		}

    }	
}
