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
class modCheckout {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para dejar el asiento pendiente
	/*--------------------------------------------------------------*/
	public function mSetAsientoEstado($pIdSeat, $pStatus, $pUserActive){
		
		$this->vQueryString		 = 'UPDATE tblPasajeros SET ';
		$this->vQueryString		.= 'estadoPasajero 	= '.$pStatus.', ';
		$this->vQueryString		.= 'idRelacion2 	= '.$pUserActive.' ';
		$this->vQueryString		.= 'WHERE idPrincipal = "'.$pIdSeat.'"';
		$clQuery				 = $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		if($this->clMysqliConn->mysqliErrores == 1){
			return true;
		}else{
			return false;
		}
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para dejar el asiento pendiente
	/*--------------------------------------------------------------*/
	public function mGetAsientoEstado($pIdSeat){
		
		$this->vQueryString		 = 'SELECT * FROM tblPasajeros ';
		$this->vQueryString		.= 'WHERE idPrincipal = "'.$pIdSeat.'"';
		$clQuery				 = $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		if($this->clMysqliConn->mysqliErrores){
			$arrQuery			 = $this->clMysqliConn->mCrearArray();
			return $arrQuery;
		}else{
			return false;	
		}
		
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
		$this->vQueryString		.= "INNER JOIN tblMovil ON tblMovil.idPrincipal = tblViajes.movilViaje ";
		$this->vQueryString		.= "WHERE tblViajes.idPrincipal = '".$pIdTravel."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
		return $arrQuery;
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener asientos del viaje
	/*--------------------------------------------------------------*/
	public function mGetSeat($pIdSeat){
		
		$this->vQueryString		 = "SELECT tblPasajeros.*, ";
		$this->vQueryString		.= "tblUsuarios.usuarioNombre, tblUsuarios.usuarioApellido, ";
		$this->vQueryString		.= "tblUsuarios.usuarioCalle, tblUsuarios.usuarioNumero, ";
		$this->vQueryString		.= "tblUsuarios.usuarioPiso, tblUsuarios.usuarioDepto ";
		$this->vQueryString		.= "FROM tblPasajeros ";
		$this->vQueryString		.= "INNER JOIN tblUsuarios ON tblUsuarios.idPrincipal = tblPasajeros.idRelacion2 ";
		$this->vQueryString		.= "WHERE tblPasajeros.idPrincipal = '".$pIdSeat."' ";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
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
				return $this->mObtenerPrecio($pValue);
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