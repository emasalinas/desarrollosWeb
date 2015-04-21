<?php
/*********************************************************************
* Codigo del archivo	: PHP_021_ctrCrono
* Nombre del archivo	: ctrCrono.php
* Objetivo del archivo	: Controlador de ejemplo
*
* Categoria				: PHP
* Paquete				: 021
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

class ctrCrono extends clControlador{
    
	public 	$clModelo;
	private $nomConstantes;
	private $nomEntidades;
	private $nomModelo;
	
	public $entCrono;
	
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
		
		$this->entCrono  					= new entCrono();

    }
	
	/*--------------------------------------------------------------*/
	// Metodo para generar cronograma de viajes
	/*--------------------------------------------------------------*/
	public function mGenerate(){	
		
		$this->entCrono  					= new entCrono();
		$this->entCrono->arrCronos			= $this->clModelo->mGetPreliminary();
		$this->entCrono->vTableName			= 'tblViajes';
		
		$this->mInitProcess('generacion de viajes');
		
		if(count($this->entCrono->arrCronos)>0){					
			
			$vFlag = true;	
			//Recorremos los cronogramas y generamos los viajes
			foreach($this->entCrono->arrCronos as $vCronos){
				
				$arrMovil	= $this->clModelo->mGetMovil($vCronos['idRelacion1']);
				
				// Agregamos el viaje
				unset($this->entCrono->arrFields);
				$this->entCrono->arrFields['idRelacion1']		= $vCronos['origenCronograma']; //Origen
				$this->entCrono->arrFields['idRelacion2']		= $vCronos['destinoCronograma']; //Destino
				$this->entCrono->arrFields['fechaViaje']		= clConvertions::mExitDateDay($vCronos['diaCronograma']); //Fecha
				$this->entCrono->arrFields['horaViaje']			= $vCronos['horaCronograma']; //Hora
				$this->entCrono->arrFields['conductorViaje']	= $vCronos['idRelacion1']; //Conducor
				$this->entCrono->arrFields['movilViaje']		= $arrMovil['idPrincipal']; //Movil
				$this->entCrono->arrFields['precioViaje']		= $vCronos['precioCronograma']; //Precio
				$this->entCrono->arrFields['estadoViaje']		= 0; //Estado
				$vNewTravel	=	$this->clModelo->mExecuteInsert($this->entCrono->arrFields, $this->entCrono->vTableName);
				
				$arrNewTravels[]['ID']		= $vNewTravel;
				$arrNewTravels[]		  	= $this->entCrono->arrFields;
				
				if(!$vNewTravel){
					$vFlag = false;
				}else{
					// Agregamos los asientos del viaje
					unset($this->entCrono->arrFields);
					$this->entCrono->arrFields['idRelacion1']		= $vNewTravel; //Viaje
					$this->entCrono->arrFields['idRelacion2']		= 0; //Usuario
					$this->entCrono->arrFields['estadoPasajero']	= 0; //Estado
					
					$vCount = 1;
					while($vCount <= $arrMovil['capacidadMovil']){
						$vCount++;
						$vNewSeat	= $this->clModelo->mExecuteInsert($this->entCrono->arrFields, 'tblPasajeros');
						if(!$vNewSeat){
							$vFlag = false;	
						}else{
							$arrNewSeat[]['ID']		= $vNewSeat;
							$arrNewSeat[]		  	= $this->entCrono->arrFields;	
						}
					}
				}
			}
			if($vFlag){
				$this->clModelo->mExecuteCommit(true);
				$this->mShowLog($arrNewTravels, 'Viajes');
				$this->mShowLog($arrNewSeat, 'Asientos');
			}else{
				$this->mPrintLines('No existen viajes para ser creados.');
				$this->clModelo->mExecuteUnCommit(false);
			}
		}
		
		$this->mSaveOutput('generateTravels');
		
	}	
	
	/*--------------------------------------------------------------*/
	// Metodo para generar liberar asientos pendientes
	/*--------------------------------------------------------------*/
	public function mLiberate(){	
		
		$vTimeAdd = '-10 min';
		$this->entCrono  					= new entCrono();
		$this->entCrono->arrSeatsPending	= $this->clModelo->mGetSeatsPending($vTimeAdd);
		
		$this->mInitProcess('liberacion de asientos');
		
		if(count($this->entCrono->arrSeatsPending)){
			$vResultQuery	= $this->clModelo->mSetSeatsPending($vTimeAdd);
			if($vResultQuery == '1'){
				foreach($this->entCrono->arrSeatsPending as $vSeatPending){
					$arrSeatPending[]		= $vSeatPending;
				}
				
				// Mostramos el log de todos los valores
				$this->mShowLog($arrSeatPending, 'asientos');
				
				$this->clModelo->mExecuteCommit(true);
				
				// Buscamos que no hayan quedado asientos pendientes por modificar, si quedaron los mostramos
				$this->entCrono->arrSeatsPending	= $this->clModelo->mGetSeatsPending($vTimeAdd);
				if(count($this->entCrono->arrSeatsPending)){
					foreach($this->entCrono->arrSeatsPending as $vSeatPending){
						$arrSeatRest[]		= $vSeatPending;
					}
					$this->mShowLog($arrSeatRest, 'asientos');
				}
			}
		}else{
			$this->mPrintLines('No existen registros para ser modificados');
		}
		
		$this->mSaveOutput('liberateSeat');
	}
}
