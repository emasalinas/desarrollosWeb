<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_iniciaConexion
* Nombre del archivo	: iniciaConexion.php
* Objetivo del archivo	: Iniciador de Base de Datos
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/
	
class clMysqliConn extends mysqli {
	
	public $clConnection;
	
	/*--------------------------------------------------------------*/
	// Creamos la conexion con la base de datos
	/*--------------------------------------------------------------*/
    function __construct($pBdHost, $pBdUsuario, $pBdPassword, $pBdBaseDatos){
		
		$this->clConnection = $this->connect($pBdHost, $pBdUsuario, $pBdPassword, $pBdBaseDatos);
		// Validamos que no haya errores
        if (mysqli_connect_error()) {
            die('Error de Conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
	}
		
	/*--------------------------------------------------------------*/
	// Metodo para obtener la conexion a BD si esta cargada
	/*--------------------------------------------------------------*/
	protected function mMysqliConn_getConn(){		
		return $this->clConnection;
	}
	
}
	
class clMysqliQuery extends clMysqliConn {

	public 		$mysqliErrores;
	protected 	$clMysqliQuery;
	protected 	$clMysqliConn;
	
	protected $BdHost 		= CONS_BDHOST;
	protected $BdUsuario	= CONS_BDUSER;
	protected $BdPassword	= CONS_BDPASS;
	protected $BdBaseDatos	= CONS_BDNAME;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct() {
		
		/*--------------------------------------------------------------*/
		// Creamos la conexion con la base de datos
		/*--------------------------------------------------------------*/
		$this->clMysqliConn = $this->mMysqliConn_getConn();
		if(!$this->clMysqliConn){
			$this->clMysqliConn = new clMysqliConn($this->BdHost, $this->BdUsuario, $this->BdPassword, $this->BdBaseDatos);
		}
    }
	
	/*--------------------------------------------------------------*/
	// Realizamos la consulta a la base de datos
	/*--------------------------------------------------------------*/
	public function mRealizaConsulta($pMysqlString){
		try{
            $this->clMysqliQuery = $this->clMysqliConn->query($pMysqlString);
			$this->mChequeaErrores();
        }catch(Exception $excQuery){
            $this->clMysqliQuery->close();
            return $excQuery;
        }		
	}
	
	/*--------------------------------------------------------------*/
	// Creamos el array
	/*--------------------------------------------------------------*/
	public function mCrearArray(){
		
		try{
			$ltMysqlArrayAssoc = $this->clMysqliQuery->fetch_array(MYSQLI_ASSOC);
			return $ltMysqlArrayAssoc;
		}catch(Exception $excQuery){
            return $excQuery;
        }
		
	}
	
	public function mCrearArrayMultiple($tipoRetorno = MYSQLI_ASSOC){
		
		try{	
			while($t_filaArray = $this->clMysqliQuery->fetch_array($tipoRetorno)){
				$t_mysqlArrayAssoc[] = $t_filaArray;
			}
			if(isset($t_mysqlArrayAssoc))
			return $t_mysqlArrayAssoc;
		}catch(Exception $excQuery){
            return $excQuery;
        }
	}
	
	public function mCrearArrayCampos(){
		
		try{
			$t_filaArray = $this->clMysqliQuery->fetch_fields();
			if(isset($t_filaArray))
			return $t_filaArray;
		}catch(Exception $excQuery){
            return $excQuery;
        }
		
	}
	
	/* Numero de filas de la consulta ejecutada */
	
	public function mObtenerNumeroFilas(){
		
		try{
			$l_mysqlNumRows = $this->clMysqliQuery->num_rows;
			return $l_mysqlNumRows;
		}catch(Exception $excQuery){
            return $excQuery;
        }
	}
	
	/* Obtenemos el ID del ultimo registro creado */
	
	public function mObtenerNumeroId(){
		
		try{
			$l_mysqlNuevoId = $this->clMysqliConn->insert_id;
			return $l_mysqlNuevoId;
		}catch(Exception $excQuery){
            return $excQuery;
        }
	}
	
	/* Chequeo si hubo errores */
	
	public function mChequeaErrores(){
		
		try{
			if(!$this->clMysqliQuery)
			$this->mysqliErrores	=	$this->clMysqliConn->error;
			else
			$this->mysqliErrores	=	true;
		}catch(Exception $excQuery){
            return $excQuery;
        }
	}
	
	/* Sentencias de COMMIT y ROLLBACK */
	public function mSeteaAutocommit($pMysqliAutoCommit) {
		try{
	  		$this->clMysqliConn->autocommit($pMysqliAutoCommit);
		}catch(Exception $excQuery){
            return $excQuery;
        }
	}
	
	public function mCommit() {
		try{
		  $this->clMysqliConn->commit();
		}catch(Exception $excQuery){
			return $excQuery;
		}
	}
	
	public function mRollback() {
		try{
	  		$this->clMysqliConn->rollback();
	  	}catch(Exception $excQuery){
            return $excQuery;
        }
	}	
}


?>