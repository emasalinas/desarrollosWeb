<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_vistaDownload
* Nombre del archivo	: vistaDownload.php
* Objetivo del archivo	: Vista del Download
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Desarrollo del codigo HTML de la vista
********************************************************************/

ignore_user_abort(true);
set_time_limit(0);

if (headers_sent()) {
    echo 'HTTP header already sent';
} else {
    if (!is_file($this->entDownload->vPath.$this->entDownload->vFilename)) {
        header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
        echo 'File not found';
    } else if (!is_readable($this->entDownload->vPath.$this->entDownload->vFilename)) {
        header($_SERVER['SERVER_PROTOCOL'].' 403 Forbidden');
        echo 'File not readable';
    } else {
        header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: Binary");
        header("Content-Length: ".filesize($this->entDownload->vPath.$this->entDownload->vFilename));
        header("Content-Disposition: attachment; filename=\"".$this->entDownload->vFilename."\"");
        readfile($this->entDownload->vPath.$this->entDownload->vFilename);
		
		$this->entDownload->vResult = 1;
    }
}
?>