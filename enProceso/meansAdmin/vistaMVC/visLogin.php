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

<div class="pageContentTwo">
  <div id="loginHeader">Sarasa</div>
  <?php
if(array_key_exists('codError', $this->entLogin->userData)){
?>
  <div id="loginMessage">
    <div class="alert alert-danger" role="alert"> <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> <strong>Error! </strong><?php echo $this->entLogin->userData['descError'] ?> </div>
  </div>
  <?php
}

?>
  <div id="loginForm">
    <form role="form" action="./login/validation/" method="post">
      <h2>Inicio de sesión</h2>
      <hr class="colorgraph">
      <div class="form-group">
        <input type="number" class="form-control" id="txtDNI" name="txtDNI" placeholder="Usuario" tabindex="1" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Contraseña" tabindex="2" required>
      </div>
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-6 col-md-6"></div>
        <div class="col-xs-6 col-md-6">
          <button type="submit" class="btn btn-success btn-block">Iniciar Sesión</button>
        </div>
      </div>
    </form>
  </div>
</div>
