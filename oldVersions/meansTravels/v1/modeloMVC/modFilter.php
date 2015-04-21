<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_modMVC
* Nombre del archivo	: modMVC.php
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
class modFilter {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener los vaijes
	/*--------------------------------------------------------------*/
	public function mObtenerViajes($pTravelData){
		
		$this->vQueryString		 = "SELECT idPrincipal, idRelacion1, idRelacion2, fechaViaje, horaViaje, ";
		$this->vQueryString		.= "conductorViaje, precioViaje, estadoViaje FROM tblViajes ";
		$this->vQueryString		.= "WHERE idRelacion1 = '".$pTravelData['travelFrom']."' ";
		$this->vQueryString		.= "AND idRelacion2 = '".$pTravelData['travelTo']."' ";
		$this->vQueryString		.= "AND fechaViaje = '".$pTravelData['travelDate']."' ";
		
		if($pTravelData['travelTimeFrom'] != ''){
			$this->vQueryString		.= "AND horaViaje >= '".$pTravelData['travelTimeFrom']."' ";
		}
		if($pTravelData['travelTimeTo'] != ''){
			$this->vQueryString		.= "AND horaViaje <= '".$pTravelData['travelTimeTo']."'";
		}
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
	// Metodo para obtener proveedor
	/*--------------------------------------------------------------*/
	public function mObtenerConductor($pValue){
		
		$this->vQueryString		 = "SELECT nomConductor, apeConductor FROM tblConductores ";
		$this->vQueryString		.= "WHERE idPrincipal = '".$pValue."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
		return $arrQuery['apeConductor'].', '.$arrQuery['nomConductor'];
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener cond. precio
	/*--------------------------------------------------------------*/
	public function mObtenerPrecio($pValue){
		
		$this->vQueryString		 = "SELECT nomPrecio, formulaPrecio FROM tblPrecios ";
		$this->vQueryString		.= "WHERE idRelacion1 = '".$pValue."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArrayMultiple();
		return $this->mCalcularTotal($arrQuery);
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener cond. precio
	/*--------------------------------------------------------------*/
	public function mCalcularTotal($arrValues){
		
		$vTotal = 0;
		foreach($arrValues as $vValues){
			if($vValues['formulaPrecio'] != NULL){
				$vValor = substr($vValues['formulaPrecio'],1);
				switch(substr($vValues['formulaPrecio'], 0, 1)){
					case '*':
						$vTotal = $vTotal * $vValor;
					break;
					case '+':
						$vTotal = $vTotal + $vValor;
					break;
					case '-':
						$vTotal = $vTotal - $vValor;
					break;
					case '/':
						$vTotal = $vTotal / $vValor;
					break;
				}
			}
		}
		
		return $vTotal;
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener ciudad
	/*--------------------------------------------------------------*/
	public function mObtenerCiudades($pDesde = false){
		
		if(!$pDesde){
			$this->vQueryString		 = "SELECT idPrincipal, nombreCiudad FROM tblCiudades ";
			$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
			$arrQuery	= $this->clMysqliConn->mCrearArrayMultiple();
			return $arrQuery;
		}else{
			$this->vQueryString		 = "SELECT tblCiudades.idPrincipal, tblCiudades.nombreCiudad FROM tblDestinos ";
			$this->vQueryString		.= "INNER JOIN tblCiudades ON tblCiudades.idPrincipal = tblDestinos.idRelacion2 ";
			$this->vQueryString		.= "WHERE tblDestinos.idRelacion1 = '".$pDesde."' ";
			$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
			$arrQuery	= $this->clMysqliConn->mCrearArrayMultiple();
			return $arrQuery;
		}
		
		
		
	}
	
	
}

?>