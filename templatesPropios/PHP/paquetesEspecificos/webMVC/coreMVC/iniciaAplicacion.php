<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_iniciaAplicacion
* Nombre del archivo	: iniciaAplicacion.php
* Objetivo del archivo	: Procesador de las aplicaciones
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

class clAplicacion{
	
    private $nomControlador		= null;
	private $clControlador		= null;
	private $urlControlador 	= null;
    private $urlAccion 			= null;
    private $urlParametro1 		= null;
    private $urlParametro2 		= null;
    private $urlParametro3 		= null;

	/*--------------------------------------------------------------*/
	// Comenzamos la aplicacion con la URL indicada
	/*--------------------------------------------------------------*/
    public function __construct()
    {
        // Creamos el array de la URL
        $this->m_separaURL();
		
        // Chequeamos que el controlador exista
        if (file_exists('./controladorMVC/' . $this->urlControlador . '.php')) {
						
			// Establecemos el nombre del controlador
			$this->urlControlador	= ucfirst(strtolower($this->urlControlador));
			$this->nomControlador	= 'ctr' .	$this->urlControlador;
			
            // Si existe, creamos y cargamos el controlador
            // Ejemplo: Si el controlador se llama "main", entonces vamos a traducir la llamada a: $this->main = new main();
            require './controladorMVC/' . $this->nomControlador . '.php';
            $this->clControlador = new $this->nomControlador();

            // Chequea que el metodo exista en el controlador
            if (method_exists($this->clControlador, $this->urlAccion)) {

                // Llamamos al metrodo y le enviamos los parametros segun estan cargados
                if (isset($this->urlParametro3)) {
                    $this->clControlador->{$this->urlAccion}($this->urlParametro1, $this->urlParametro2, $this->urlParametro3);
                } elseif (isset($this->urlParametro2)) {
                    $this->clControlador->{$this->urlAccion}($this->urlParametro1, $this->urlParametro2);
                } elseif (isset($this->urlParametro1)) {
                    $this->clControlador->{$this->urlAccion}($this->urlParametro1);
                } else {
                    $this->clControlador->{$this->urlAccion}();
                }
            } else {
                // Llamar al metodo index del controlador
                $this->clControlador->mPrincipal($this->urlControlador);
            }
        } else {
			
			$this->urlControlador	= 'error';
			
			// Establecemos el nombre del controlador
			$this->urlControlador	= ucfirst(strtolower($this->urlControlador));
			$this->nomControlador	= 'ctr' .	$this->urlControlador;
			
            // Si la direccio es invalida vamos al controlador de error
            require './controladorMVC/' . $this->nomControlador . '.php';
            $this->clControlador = new $this->nomControlador($this->urlControlador);
            $this->clControlador->mPrincipal();
        }
    }

    /*--------------------------------------------------------------*/
	// Obtenenemos la direccion y la separamos en parametros
	/*--------------------------------------------------------------*/
    private function m_separaURL()
    {
        if (isset($_GET['url'])) {

            // Separamos la URL
            $lvUrl = rtrim($_GET['url'], '/');
            $lvUrl = filter_var($lvUrl, FILTER_SANITIZE_URL);
            $lvUrl = explode('/', $lvUrl);

            // Ponemos los campos de la url en cada una de las variables
            $this->urlControlador 	= (isset($lvUrl[0]) ? $lvUrl[0] : null);
            $this->urlAccion	 	= (isset($lvUrl[1]) ? $lvUrl[1] : null);
            $this->urlParametro1 	= (isset($lvUrl[2]) ? $lvUrl[2] : null);
            $this->urlParametro2 	= (isset($lvUrl[3]) ? $lvUrl[3] : null);
            $this->urlParametro3 	= (isset($lvUrl[4]) ? $lvUrl[4] : null);

            echo 'Controlador: ' 	. $this->urlControlador . '<br />';
            echo 'Accion: '			. $this->urlAccion 		. '<br />';
            echo 'Parametro 1: ' 	. $this->urlParametro1 	. '<br />';
            echo 'Parametro 2: ' 	. $this->urlParametro2 	. '<br />';
            echo 'Parametro 3: ' 	. $this->urlParametro3 	. '<br />';
        }
    }
}
