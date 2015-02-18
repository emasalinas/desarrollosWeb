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

class ctrIndex extends clControlador{
    
	public 	$clModelo;
	private $nomConstantes;
	private $nomEntidades;
	private $nomModelo;
	private $nomVista;
	
	public $entIndex;
	
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
	// Metodo para pantalla principal del controlador (Sin Accion)
	/*--------------------------------------------------------------*/
    public function mPrincipal(){	
		
		$this->entIndex  					= new entIndex();
		$this->entIndex->backgroundArt		= $this->clModelo->mObtenerBackgroundUrl('Art');
		$this->entIndex->logotypeBand		= $this->clModelo->mObtenerBackgroundUrl('logoType');
		$this->entIndex->titleCD			= $this->clModelo->mObtenerBackgroundUrl('titleCD');
		
		$this->entIndex->iconFacebook		= $this->clModelo->mObtenerBackgroundUrl('iconFacebook');
		$this->entIndex->iconTwitter		= $this->clModelo->mObtenerBackgroundUrl('iconTwitter');
		$this->entIndex->iconInstagram		= $this->clModelo->mObtenerBackgroundUrl('iconInstagram');
		$this->entIndex->iconYoutube		= $this->clModelo->mObtenerBackgroundUrl('iconYoutube');
		
		$this->entIndex->iconFacebookOn		= $this->clModelo->mObtenerBackgroundUrl('iconFacebookOn');
		$this->entIndex->iconTwitterOn		= $this->clModelo->mObtenerBackgroundUrl('iconTwitterOn');
		$this->entIndex->iconInstagramOn	= $this->clModelo->mObtenerBackgroundUrl('iconInstagramOn');
		$this->entIndex->iconYoutubeOn		= $this->clModelo->mObtenerBackgroundUrl('iconYoutubeOn');
		
		$this->entIndex->buttonDownload		= $this->clModelo->mObtenerBackgroundUrl('buttonDownload');
		
		$this->entIndex->downloadCounter	= $this->clModelo->mObtenerContador(1);
	
		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

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
	
}
