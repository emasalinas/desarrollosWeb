<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_vistaMVC
* Nombre del archivo	: vistaMVC.php
* Objetivo del archivo	: Vista del MVC
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Desarrollo del codigo HTML de la vista
*********************************************************************/
?>
<div class="pageContent">
<div id="loginHeader">Sarasa</div>

<?php
if(array_key_exists('codError', $this->entLogin->userData)){
?>
<div id="loginMessage">
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
        <strong>Error! </strong><?php echo $this->entLogin->userData['descError'] ?>
    </div>
</div>
<?php
}

if(array_key_exists('idPrincipal', $this->entLogin->userData)){
	echo "Usuario Correcto";
}else{
?>

<div id="loginForm">
  <form role="form" class="form-horizontal" action="./login/validation/" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="txtDNI">DNI:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="txtDNI" name="txtDNI">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="txtPassword">Clave:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="txtPassword" name="txtPassword">
      </div>
    </div>
    <div class="form-group">
        <div class="checkbox">
          <label><input type="checkbox">Recordar ingreso</label>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Iniciar Sesión</button>
    </div>
  </form>
</div>
</div>
<?php
}
?>