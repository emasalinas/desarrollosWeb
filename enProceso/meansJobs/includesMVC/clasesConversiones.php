<?php

class clConvertions{
	/*--------------------------------------------------------------*/
	// Metodo para crear el objeto de formulario
	/*--------------------------------------------------------------*/
	public static function mExitObject($pTable, $pFieldName, $pValue, $pCount){
		
		// El tipo por defecto es un input
		$vType 		= 	'input';
		$arrFields 	=	$vTableValues	= NULL;
		
		switch($pTable){
			
			/***********************************
			* Modulo - Conductores
			***********************************/
			case 'conductores':
				switch($pFieldName['Field']){
					case 'idRelacion1':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'razonProveedor';
						$vTableValues	=	'tblProveedores';
						$vType			=	'select';
					break;	
				}
			break;
			
			/***********************************
			* Modulo - Moviles
			***********************************/
			case 'movil':
				switch($pFieldName['Field']){
					case 'idRelacion1':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'razonProveedor';
						$vTableValues	=	'tblProveedores';
						$vType			=	'select';
					break;
					
					case 'idRelacion2':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'CONCAT(apeConductor, ", " , nomConductor)';
						$vTableValues	=	'tblConductores';
						$vType			=	'select';
					break;
				}
			break;
			/***********************************
			* Modulo - Destinos
			***********************************/
			case 'destinos':
				switch($pFieldName['Field']){
					case 'idRelacion1':
					case 'idRelacion2':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'nombreCiudad';
						$vTableValues	=	'tblCiudades';
						$vType			=	'select';
					break;
				}
			break;
			/***********************************
			* Modulo - Precios
			***********************************/
			case 'precios':
				switch($pFieldName['Field']){
					case 'idRelacion1':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'nomCondicion';
						$vTableValues	=	'tblCondiciones';
						$vType			=	'select';
					break;
				}
			break;
			
			/***********************************
			* Modulo - Viajes
			***********************************/
			case 'cronograma':
				switch($pFieldName['Field']){
					case 'idRelacion1':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'CONCAT(apeConductor, ", " , nomConductor)';
						$vTableValues	=	'tblConductores';
						$vType			=	'select';
					break;
					case 'precioCronograma':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'nomCondicion';
						$vTableValues	=	'tblCondiciones';
						$vType			=	'select';
					break;
				}
			break;
		}
		
		return self::mCreateObject($pTable, $pFieldName, $pValue, $pCount, $vType, $arrFields, $vTableValues);
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para crear el objeto de formulario
	/*--------------------------------------------------------------*/
	public static function mCreateObject($pTable, $pFieldName, $pValue, $pCount, $pType = 'input', $pFieldValues = NULL, $pTableValues = NULL){
		
		switch($pType){
			case 'input':
				$vObject	 = 	'<input type="'.$pFieldName['Type'].'" name="'.$pFieldName['Field'].'" id="'.$pFieldName['Field'].'" ';
				if(defined($pTable.'-'.$pFieldName['Field']))
					$vObject	.=	'placeholder="'.constant($pTable.'-'.$pFieldName['Field']).'" ';
				else
					$vObject	.= 'placeholder="'.$pFieldName['Field'].'" ';
				
				$vObject	.= 'class="form-control" ';
				$vObject	.= 'value="'.$pValue.'" ';					
				$vObject	.= 'tabindex="'.$pCount.'" ';
				
				if($pFieldName['Null'] == 'NO')
				$vObject	.= 'required';
				
				$vObject	.= '>';
				
				return $vObject;
			
			case 'select':
				$vObject	 =	'<select ';
				
				$vObject	.= 'class="form-control" name="'.$pFieldName['Field'].'" id="'.$pFieldName['Field'].'" ';
				if($pFieldName['Null'] == 'NO')
				$vObject	.= 'required';
				$vObject	.= '>';
				
				
				// Ejecutamos la consulta				
				$arrValues = self::mExecuteQuery($pFieldValues, $pTableValues , NULL, NULL); 
				foreach($arrValues as $vValues){
						$vObject	.=	'<option value="'.$vValues['idPrincipal'].'"';
						if($vValues[$pFieldValues[0]] == $pValue)
							$vObject	.=	' selected>';
						else
							$vObject	.=	'>';
						$vObject	.=	$vValues[$pFieldValues[1]].'</option>';
						
						
				}
				
				// Cerramos el combo
				$vObject	.=	'</select>';
				
				return $vObject;
			
		}
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para establecer el tipo de input
	/*--------------------------------------------------------------*/
	public static function mExitTypeInput($pField, $pType){
		
		switch($pType){
			case 'datetime':
			case 'date':
				return 'date';
				break;
			
			case 'time':
				return 'time';
				break;
				
			case (preg_match('/int*/', $pType) ? true : false):
				return 'number';
				break;
				
			case (preg_match('/varchar*/', $pType) ? true : false):
				return 'text';
				break;
			
			default:
					return 'text';
				break;
		}
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener URL de Imagenes
	/*--------------------------------------------------------------*/
	public static function mExitField($pValue, $pKey, $pTable){
		
		switch($pTable){
			
			/***********************************
			* Modulo - Conductores
			***********************************/
			case 'conductores':
				switch($pKey){
					case 'idRelacion1':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'razonProveedor';
						$vTableValues	=	'tblProveedores';
						$vType			=	'text';
					break;	
				}
			break;
			
			/***********************************
			* Modulo - Moviles
			***********************************/
			case 'movil':
				switch($pKey){
					case 'idRelacion1':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'razonProveedor';
						$vTableValues	=	'tblProveedores';
						$vType			=	'text';
					break;
					
					case 'idRelacion2':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'CONCAT(apeConductor, ", " , nomConductor)';
						$vTableValues	=	'tblConductores';
						$vType			=	'text';
					break;
				}
			break;
			/***********************************
			* Modulo - Destinos
			***********************************/
			case 'destinos':
				switch($pKey){
					case 'idRelacion1':
					case 'idRelacion2':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'nombreCiudad';
						$vTableValues	=	'tblCiudades';
						$vType			=	'text';
					break;
				}
			break;
			/***********************************
			* Modulo - Precios
			***********************************/
			case 'precios':
				switch($pKey){
					case 'idRelacion1':
						//Agregmos los campos a obtener
						$arrFields[] 	= 	'idPrincipal';
						$arrFields[] 	= 	'nomCondicion';
						$vTableValues	=	'tblCondiciones';
						$vType			=	'text';
					break;
				}
			break;
		}
		
		if(isset($arrFields)){
			$arrWhere[0][0]		= 'idPrincipal';
			$arrWhere[0][1]		= '=';
			$arrWhere[0][2]		= $pValue;
			return self::mGetValueField($arrFields, $vTableValues, $arrWhere, NULL);
		}else{
			return $pValue;	
		}
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de consulta
	/*--------------------------------------------------------------*/
	public static function mExecuteQuery($pFieldsGet, $pTableName, $pFieldsWhere, $pFieldOrder){
		
		$vQueryString		 = 'SELECT';
		
		$vCount = 0;
		$vTotal = count($pFieldsGet);
		foreach($pFieldsGet as $vFieldGet){
			$vQueryString		.= ' '.$vFieldGet;
			
			$vCount++;
			if($vCount != $vTotal) $vQueryString		.= ', ';
		}
		
		$vQueryString		 .= ' FROM '.$pTableName.' ';
		
		$vCount = 0;
		$vTotal = count($pFieldsWhere);
		if($vTotal){
			$vQueryString		 .= 'WHERE';
			
			$vTotal = count($pFieldsWhere);
			foreach($pFieldsWhere as $vFieldWhere){
				$vQueryString		.= ' '.$vFieldWhere[0];
				$vQueryString		.= ' '.$vFieldWhere[1];
				$vQueryString		.= " '".$vFieldWhere[2]."'";
				
				$vCount++;
				if($vCount != $vTotal) $vQueryString		.= ' AND';
			}
		}
		
		if($pFieldOrder != ''){
			$vQueryString		 .= ' ORDER BY '.$pFieldOrder.' ASC';
		}
		
		$clMysqliConn 	= new clMysqliQuery();
		$clQuery	= $clMysqliConn->mRealizaConsulta($vQueryString);
		$arrQuery	= $clMysqliConn->mCrearArrayMultiple();
		return $arrQuery;	
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de consulta
	/*--------------------------------------------------------------*/
	public static function mGetValueField($pFieldValues, $pTableName, $pFieldsWhere, $pFieldOrder){
		
		
		$arrValues = self::mExecuteQuery($pFieldValues, $pTableName , $pFieldsWhere, $pFieldOrder); 
		return $arrValues[0][$pFieldValues[1]];
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo de ejecucion de consulta
	/*--------------------------------------------------------------*/
	public static function mExitDateDay($pDayKey, $pWeek = NULL){
		
		//Obtengo la fecha de inicio
		$vDate = new DateTime();
		if($pWeek != NULL) $vWeek = date('W')+$pWeek;
		else $vWeek = date('W');
		$vDate->setISODate(date('Y'), $vWeek , $pDayKey);
		return $vDate->format('Y-m-d');
		
	}
	
}