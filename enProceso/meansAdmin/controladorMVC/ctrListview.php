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

class ctrListview extends clControlador{
    
	public 	$clModelo;
	private $nomConstantes;
	private $nomEntidades;
	private $nomModelo;
	private $nomVista;
	
	public $entMVC;
	
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
		
		$this->entListview  					= new entListview();
				
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

    }
	
	/*--------------------------------------------------------------*/
	// Metodo para pantalla principal del controlador (Sin Accion)
	/*--------------------------------------------------------------*/
    public function mCustom($pTableName = '',  $pJsonGet = '', $pJsonWhere = '', $pFieldOrder = '', $pOptions = ''){	
		
		$this->entListview  					= new entListview();
		$this->entListview->vTableName			= 'tbl'.ucfirst($pTableName);
		if(defined('titulo'.ucfirst($pTableName)))
			$this->entListview->vTitulo 	= constant('titulo'.ucfirst($pTableName));
		if(defined('subtitulo'.ucfirst($pTableName)))
			$this->entListview->vSubTitulo 	= constant('subtitulo'.ucfirst($pTableName));
		
		if($pJsonGet != '' && $pJsonGet != 'default'){ 
			$this->entListview->arrFieldsGet		= $this->clModelo->mResolveJson('jsonListview', $pTableName, ucfirst($pJsonGet));
		}
		else{ $this->entListview->arrFieldsGet		= $this->clModelo->mResolveJson('jsonDefault', 'table', 'All'); }
		
		if($pJsonWhere != '' && $pJsonWhere != 'none'){
			$this->entListview->arrFieldsWhere		= $this->clModelo->mResolveJson('jsonListview', $pTableName, ucfirst($pJsonWhere));
		}else{ $this->entListview->arrFieldsWhere	= array();	}
		
		if($pFieldOrder != '' && $pFieldOrder != 'none')
			$this->entListview->vFieldOrder			= $pFieldOrder;
		else
			$this->entListview->vFieldOrder			= '';
		
		
		$this->entListview->arrListView			= $this->clModelo->mExecuteQuery($this->entListview->arrFieldsGet, $this->entListview->vTableName, $this->entListview->arrFieldsWhere, $this->entListview->vFieldOrder);
		//$this->entListview->arrListView			= $this->clModelo->mBorrarDuplicados($this->entListview->arrListView, 'ipDownload');
		
		$this->entListview->arrOptions	 		= explode('-', $pOptions);
			
		//Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

    }
	
	
	
}
