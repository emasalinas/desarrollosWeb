<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_modSynchro
* Nombre del archivo	: modSynchro.php
* Objetivo del archivo	: Modelo del Synchro
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Desarrollo de la clase
*********************************************************************/
class modSynchro {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	private $arrSyncHandler;
	
	protected $tableName;
	protected $fieldOrder;
	protected $fieldWhere;
	protected $valueWhere;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para realizar al consulta y extraer datos
	/*--------------------------------------------------------------*/
	public function mRealizaConsulta($pTableName,  $pFieldWhere = '', $pValueWhere = '', $pFieldOrder = ''){	
		
		$this->tableName	=	$pTableName;
		$this->fieldOrder	=	$pFieldOrder;
		$this->fieldWhere	=	$pFieldWhere;
		$this->valueWhere	=	$pValueWhere;
		
		$this->arrSyncHandler = new SqlSyncHandler();
		$this->arrSyncHandler->mCall(array($this, 'mSynchroClubRegatas'), $this->arrSyncHandler);
		
		return $this->arrSyncHandler->mGetServerAnswer();
		
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para comenzar la sincronización
	/*--------------------------------------------------------------*/
	public function mSynchroClubRegatas($pSyncHandler){
						
			$vFileName 		= "data.json";
			$vPhpObject 	= $pSyncHandler->mGetJsonData();
			file_put_contents($vFileName, $vPhpObject);
	
			$pSyncHandler->mReply(true, "Exportando datos desde MySQL", $this->mObtenerDatosMysql());

	}
	
	/*--------------------------------------------------------------*/
	// Metodo para extracción de datos
	/*--------------------------------------------------------------*/
	protected function mObtenerDatosMysql(){
			
		$this->vQueryString 	 = 'SELECT * FROM tbl'.ucfirst($this->tableName);
		if(!empty($this->fieldWhere) && !empty($this->valueWhere)){
			$this->vQueryString 	.= ' WHERE '.$this->fieldWhere.' = "'.$this->valueWhere.'"';
		}
		if(!empty($this->fieldOrder)){
			$this->vQueryString 	.= ' ORDER BY '.$this->fieldOrder;
		}
		
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		$arrQuery	= $this->clMysqliConn->mCrearArray();
		
		$arrJsonData[$this->tableName] = $arrQuery;
		return $arrJsonData[$this->tableName];
		
	}
}

	 
final class SqlSyncHandler{
	
	private $arrClientData, $arrJsonData;
	private $arrServerAnswer = array("result"=> '',"message" => '', "sync_date" => '',"data" => array());
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct($pDataFlow = NULL){
		
		if($pDataFlow == NULL)
			$this -> arrJsonData = file_get_contents('php://input');
		else 
			$this -> arrJsonData = file_get_contents($pDataFlow);
	
		$this -> arrClientData = json_decode($this->arrJsonData);
		
	}
	
	/*--------------------------------------------------------------*/
	// Preparamos la respuesta al cliente
	/*--------------------------------------------------------------*/
	public function mReply($pStatus,	$pMessage,	$pData){
		
		if($pStatus)
			$this -> arrServerAnswer['result'] = 'OK';
		else
			$this -> arrServerAnswer['result'] = 'ERROR';
		
		$this -> arrServerAnswer['message'] 	= $pMessage;
		$this -> arrServerAnswer['data'] 		= $pData;
		$this -> arrServerAnswer['sync_date'] 	= strtotime("now");
		
		//echo json_encode($this->arrServerAnswer);
		
	}
	
	/*--------------------------------------------------------------*/
	// Invocamos a la funcion de sincronización
	/*--------------------------------------------------------------*/
	public function mCall($pFunction,	SqlSyncHandler $pParameter = NULL){
		call_user_func($pFunction, $pParameter);
	}
	
	/*--------------------------------------------------------------*/
	// Devolvemos datos de cliente
	/*--------------------------------------------------------------*/
	public function mGetClientData(){
		return $this -> arrClientData;
	}
	
	/*--------------------------------------------------------------*/
	// Devolvemos datos de servidor
	/*--------------------------------------------------------------*/
	public function mGetServerAnswer(){
		return $this -> arrServerAnswer;
	}
	
	/*--------------------------------------------------------------*/
	// Devolvemos datos
	/*--------------------------------------------------------------*/
	public function mGetJsonData(){
		return $this -> arrJsonData;
	}
	
}

?>