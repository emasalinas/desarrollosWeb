<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_modIndex
* Nombre del archivo	: modIndex.php
* Objetivo del archivo	: Modelo del Index
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Desarrollo de la clase
*********************************************************************/
class modIndex {
	
	private $clMysqliConn	= null;
	private $vQueryString	= null;
	
	/*--------------------------------------------------------------*/
	// Constructor de la clase
	/*--------------------------------------------------------------*/
	public function __construct(){
		
		$this->clMysqliConn 	= new clMysqliQuery();
			
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener URL de Imagenes
	/*--------------------------------------------------------------*/
	public function mObtenerBackgroundUrl($pBackgroundType){
		
		if($pBackgroundType == 'Art'){
			return './publicMVC/img/backgroundArt.png';
		}elseif($pBackgroundType == 'Page'){
			return './publicMVC/img/backgroundPage.jpg';
		}elseif($pBackgroundType == 'logoType'){
			return './publicMVC/img/logotypeBand.png';
		}elseif($pBackgroundType == 'titleCD'){
			return './publicMVC/img/titleCD.png';
		}elseif($pBackgroundType == 'buttonDownload'){
			return './publicMVC/img/buttonDownload.png';
		}elseif($pBackgroundType == 'iconFacebook'
			 || $pBackgroundType == 'iconTwitter'
			 || $pBackgroundType == 'iconInstagram'
			 || $pBackgroundType == 'iconYoutube'
			 || $pBackgroundType == 'iconFacebookOn'
 			 || $pBackgroundType == 'iconTwitterOn'
			 || $pBackgroundType == 'iconInstagramOn'
			 || $pBackgroundType == 'iconYoutubeOn'){
				
			return './publicMVC/img/'.$pBackgroundType.'.png';
		}				
	}
	
	/*--------------------------------------------------------------*/
	// Metodo para obtener URL de Imagenes
	/*--------------------------------------------------------------*/
	public function mObtenerContador($pResult){
		
		$this->vQueryString		 = 'SELECT COUNT(*) FROM tblDownload WHERE ';
		$this->vQueryString		.= ' resultDownload = ';
		$this->vQueryString		.= "'".$pResult."'";
		$clQuery	= $this->clMysqliConn->mRealizaConsulta($this->vQueryString);
		return $this->clMysqliConn->mCrearArray();
		
	}
}

?>