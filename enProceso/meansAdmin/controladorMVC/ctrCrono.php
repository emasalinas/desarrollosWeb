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
	private $nomVista;
	
	public $entCrono;
	
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
		
		$this->entCrono  					= new entCrono();
		$this->entCrono->vTable				= 'cronograma';
		$this->entCrono->vDisplay			= '';
		
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

    }
	
	/*--------------------------------------------------------------*/
	// Metodo para mostrar formulario de carga
	/*--------------------------------------------------------------*/
	public function mShow($pTableName = '',  $pJsonGet = '', $pJsonWhere = '', $pFieldOrder = '', $pOptions = ''){	
		
		$this->entCrono  					= new entCrono();
		$this->entCrono->vTableName			= 'tbl'.ucfirst($pTableName);
		
		if(defined('titulo'.ucfirst($pTableName)))
			$this->entAbm->vTitulo 	= constant('titulo'.ucfirst($pTableName));
		if(defined('subtitulo'.ucfirst($pTableName)))
			$this->entAbm->vSubTitulo 	= constant('subtitulo'.ucfirst($pTableName));
		
		if($pJsonGet != '' && $pJsonGet != 'default'){ 
			$this->entAbm->arrFieldsGet		= $this->clModelo->mResolveJson('jsonAbm', $pTableName, ucfirst($pJsonGet));
		}
		else{ $this->entAbm->arrFieldsGet		= $this->clModelo->mResolveJson('jsonDefault', 'table', 'All'); }
		
		if($pJsonWhere != '' && $pJsonWhere != 'none'){
			$this->entAbm->arrFieldsWhere		= $this->clModelo->mResolveJson('jsonListview', $pTableName, ucfirst($pJsonWhere));
		}else{ $this->entAbm->arrFieldsWhere	= array();	}
				
		if($pFieldOrder != '' && $pFieldOrder != 'none')
			$this->entAbm->vFieldOrder			= $pFieldOrder;
		else
			$this->entAbm->vFieldOrder			= '';
		
		$this->entAbm->arrShow			= $this->clModelo->mExecuteQuery($this->entAbm->arrFieldsGet, $this->entAbm->vTableName, $this->entAbm->arrFieldsWhere, $this->entAbm->vFieldOrder);
		
		if(count($this->entAbm->arrShow) > 0){
			foreach($this->entAbm->arrShow as $vKey => $arrColumn):
				unset($arrColumn['ultimaActualizacion']);
				$this->entAbm->arrShow[$vKey] = $arrColumn;
			endforeach;
		}else{
			$this->entAbm->arrShow['']['']	= 'No hay resultados para mostrar.';
		}
		
		$this->entAbm->arrOptions	 		= explode('-', $pOptions);
		
		$this->entAbm->vTable		 		= $pTableName;
		$this->entAbm->vDisplay		 		= 'viewShow';
		
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para mostrar formulario de carga
	/*--------------------------------------------------------------*/
	public function mEdit($pTableName = '',  $pPrincipalID = ''){	
		
		$this->entAbm  					= new entAbm();
		$this->entAbm->vTableName		= 'tbl'.ucfirst($pTableName);
		$this->entAbm->arrFieldsGet		= $this->clModelo->mResolveJson('jsonDefault', 'table', 'All');
		
		$this->entAbm->vCond				= 	$this->mDecryptText($pPrincipalID, true);
		$this->entAbm->arrFieldsWhere[0][0]	=	'idPrincipal';
		$this->entAbm->arrFieldsWhere[0][1]	=	'=';
		$this->entAbm->arrFieldsWhere[0][2]	=	$this->entAbm->vCond;
		
		$this->entAbm->arrShow			= $this->clModelo->mExecuteQuery($this->entAbm->arrFieldsGet, $this->entAbm->vTableName, $this->entAbm->arrFieldsWhere, $this->entAbm->vFieldOrder);
		$this->entAbm->arrShow			= $this->entAbm->arrShow[0];
				
		$this->entAbm->arrColumns		= $this->clModelo->mGetColumns($this->entAbm->vTableName);
		//Buscamos las columnas innecesarias y las eliminamos
		foreach($this->entAbm->arrColumns as $vKey => $arrColumn):
			$vFindId = array_search('idPrincipal', $arrColumn, true);
			$vFindUl = array_search('ultimaActualizacion', $arrColumn, true);
			if($vFindId || $vFindUl){
				unset($this->entAbm->arrColumns[$vKey]);
			}			
		endforeach;
		
		$this->entAbm->vDisplay		 		= 'viewEdit';
		$this->entAbm->vTable		 		= $pTableName;
		$this->entAbm->vCond				= '/'.$this->mEncryptText($this->entAbm->vCond, true);
		
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);
	}
	
	
	/*--------------------------------------------------------------*/
	// Metodo para mostrar formulario de carga
	/*--------------------------------------------------------------*/
	public function mCreate($pTableName = ''){	
		
		$this->entAbm  					= new entAbm();
		$this->entAbm->vTableName		= 'tbl'.ucfirst($pTableName);
		$this->entAbm->arrFieldsGet		= $this->clModelo->mResolveJson('jsonDefault', 'table', 'All');
		
		$this->entAbm->arrColumns		= $this->clModelo->mGetColumns($this->entAbm->vTableName);		
		
		//Buscamos las columnas innecesarias y las eliminamos
		foreach($this->entAbm->arrColumns as $vKey => $arrColumn):
			$vFindId = array_search('idPrincipal', $arrColumn, true);
			$vFindUl = array_search('ultimaActualizacion', $arrColumn, true);
			if($vFindId || $vFindUl){
				unset($this->entAbm->arrColumns[$vKey]);
			}			
		endforeach;
		
		$this->entAbm->vDisplay		 		= 'viewCreate';
		$this->entAbm->vTable		 		= $pTableName;
		$this->entAbm->vCond				= '';
		
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);
	}	
	
	
	/*--------------------------------------------------------------*/
	// Metodo para mostrar formulario de carga
	/*--------------------------------------------------------------*/
	public function mPost($pAction, $pTableName,  $pPrincipalID = ''){
		
		$this->entCrono  				= new entCrono();
		$this->entCrono->vTableName		= 'tbl'.ucfirst($pTableName);
		$this->entCrono->vCond			= $this->mDecryptText($pPrincipalID, true);
		
		$this->entCrono->arrPost			= $_POST;
		$this->entCrono->arrPostDays		= $this->entCrono->arrPost['diaCronograma'];
		
		foreach($this->entCrono->arrPostDays as $vCronoDay){
			$this->entCrono->arrPost['diaCronograma'] = $vCronoDay;
			if($pAction == 'create'){
				$this->clModelo->mExecuteInsert($this->entCrono->arrPost, $this->entCrono->vTableName);
			}elseif($pAction == 'edit'){
				$this->clModelo->mExecuteUpdate($this->entCrono->arrPost, $this->entCrono->vTableName, $this->entCrono->vCond);
			}
		}		
		
		header('Location: '.C_PREFIX_HOME.'/crono');
	}
	
}
