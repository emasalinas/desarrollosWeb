<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_modTravels
* Nombre del archivo	: modTravels.php
* Objetivo del archivo	: Modelo del MVC
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Desarrollo de la clase
*********************************************************************/
class modTravels {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener detalles del viaje
	/*--------------------------------------------------------------*/
	public function mGetTravel($pIdTravel){
		
		$this->vQueryString		 = "SELECT tblViajes.*, ";
		$this->vQueryString		.= "tblConductores.idRelacion1 AS proveedorViaje, ";
		$this->vQueryString		.= "tblMovil.marcaMovil, tblMovil.colorMovil, tblMovil.capacidadMovil, ";
		$this->vQueryString		.= "tblMovil.modeloMovil, tblMovil.patenteMovil ";
		$this->vQueryString		.= "FROM tblViajes ";
		$this->vQueryString		.= "INNER JOIN tblConductores ON tblConductores.idPrincipal = tblViajes.conductorViaje ";
		$this->vQueryString		.= "INNER JOIN tblMovil ON tblMovil.idPrincipal = tblViajes.autoViaje ";
		$this->vQueryString		.= "WHERE tblViajes.idPrincipal = '".$pIdTravel."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
		return $arrQuery;
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener asientos del viaje
	/*--------------------------------------------------------------*/
	public function mGetSeats($pIdTravel){
		
		$this->vQueryString		 = "SELECT tblPasajeros.* ";
		//$this->vQueryString		.= "tblUsuarios.usuarioNombre, tblUsuarios.usuarioApellido ";
		$this->vQueryString		.= "FROM tblPasajeros ";
		//$this->vQueryString		.= "INNER JOIN tblUsuarios ON tblUsuarios.idPrincipal = tblPasajeros.idRelacion2 ";
		$this->vQueryString		.= "WHERE tblPasajeros.idRelacion1 = '".$pIdTravel."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArrayMultiple();
		return $arrQuery;
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para colocar valores reales
	/*--------------------------------------------------------------*/
	public function mExitField($pValue, $pKey){
		
		switch($pKey){
			case 'idRelacion1':
			case 'idRelacion2':
				return $this->mObtenerCiudad($pValue);
				break;
			
			case 'fechaViaje':
				$vDate = new DateTime($pValue);
				return $vDate->format('d M Y');
				break;
					
			case 'horaViaje':
				$vTime = new DateTime($pValue);
				return $vTime->format('H:i').'hs';
				break;
			
			case 'conductorViaje':
				return $this->mObtenerConductor($pValue);
				break;
				
			case 'proveedorViaje':
				return $this->mObtenerProveedor($pValue);
				break;
			
			case 'precioViaje':
				return '$ '.$this->mObtenerPrecio($pValue);
				break;
			
			case 'estadoViaje':
				return constant($pKey.$pValue);
				break;
					
			default:
				return $pValue;
				break;
		}		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener ciudad
	/*--------------------------------------------------------------*/
	public function mObtenerCiudad($pValue){
		
		$this->vQueryString		 = "SELECT nombreCiudad FROM tblCiudades ";
		$this->vQueryString		.= "WHERE idPrincipal = '".$pValue."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
		return $arrQuery['nombreCiudad'];
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener proveedor
	/*--------------------------------------------------------------*/
	public function mObtenerProveedor($pValue){
		
		$this->vQueryString		 = "SELECT razonProveedor FROM tblProveedores ";
		$this->vQueryString		.= "WHERE idPrincipal = '".$pValue."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
		return $arrQuery['razonProveedor'];
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener conductor
	/*--------------------------------------------------------------*/
	public function mObtenerConductor($pValue){
		
		$this->vQueryString		 = "SELECT nomConductor, apeConductor FROM tblConductores ";
		$this->vQueryString		.= "WHERE idPrincipal = '".$pValue."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
		return $arrQuery['apeConductor'].", ".$arrQuery['nomConductor'];
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener proveedor
	/*--------------------------------------------------------------*/
	public function mObtenerPrecio($pValue){
		
		$this->vQueryString		 = "SELECT precioCondPago FROM tblCondicionesPago ";
		$this->vQueryString		.= "WHERE idPrincipal = '".$pValue."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
		return $arrQuery['precioCondPago'];
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para convertir de valor interno a externo
	/*--------------------------------------------------------------*/
	public function mInputToOutput($pArray){
		
		foreach($pArray as $vTravelField => $vTravelViewRow){
			$vArray[$vTravelField] = $this->mExitField($vTravelViewRow, $vTravelField);
		}
		
		return $vArray;
		
	}
}

?>