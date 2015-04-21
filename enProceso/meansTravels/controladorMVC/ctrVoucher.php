<?php
/*********************************************************************
* Codigo del archivo	: PHP_021_ctrVoucher
* Nombre del archivo	: ctrVoucher.php
* Objetivo del archivo	: Controlador de ejemplo
*
* Categoria				: PHP
* Paquete				: 021
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

class ctrVoucher extends clControlador{
    
	public 	$clModelo;
	public	$clPDF;
	private $nomConstantes;
	private $nomEntidades;
	private $nomModelo;
	private $nomVista;
	
	public $entVoucher;
	
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
		
		$this->entVoucher  					= new entVoucher();
		$this->clPDF						= new clPdf();
		$this->clPDF->AddPage();
		$this->clPDF->SetFont('Arial','B',16);
		$this->clPDF->Cell(40,10,'Hello World!');
		$this->clPDF->Output();

		// Cargamos la vista con todo lo que teniamos
		$this->mCargarVista($this->nomVista);

    }
	
	
	
}
