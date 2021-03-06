<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_iniciaControlador
* Nombre del archivo	: iniciaControlador.php
* Objetivo del archivo	: Procesador de los controladores
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

class clControlador extends clMysqliQuery {
		
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
    public function __construct(){	

    }

    /*--------------------------------------------------------------*/
	// Metodo de carga del archivo de constantes
	/*--------------------------------------------------------------*/
	public function mCargarConstantes($pNombreConstantes)
    {
        require './constantesMVC/' . 	$pNombreConstantes 	. '.php';
    }
	
    /*--------------------------------------------------------------*/
	// Metodo de carga del archivo de entidades
	/*--------------------------------------------------------------*/
	public function mCargarEntidades($pNombreEntidad)
    {
        require './entidadesMVC/' .  	$pNombreEntidad 	. '.php';
    }
	
    /*--------------------------------------------------------------*/
	// Metodo de carga del archivo de modelo
	/*--------------------------------------------------------------*/
    public function mCargarModelo($pNombreModelo)
    {
        require './modeloMVC/' .  	$pNombreModelo 		. '.php';
		return new $pNombreModelo();
    }
	
	/*--------------------------------------------------------------*/
	// Metodo de carga del archivo de entidades
	/*--------------------------------------------------------------*/
	public function mCargarVista($pNombreEntidad)
    {
        include './vistaMVC/' .  	$pNombreEntidad 	. '.php';
    }
}