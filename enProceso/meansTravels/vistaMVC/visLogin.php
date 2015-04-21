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

<div class="mt-subheader">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="subheader-info">
          <h1>Inicia sesión ó registrate</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mt-content" align="center">
  <section class="mt-pagesection" style=" padding: 0px 0px 40px 0px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <?php
			if(array_key_exists('codError', $this->entLogin->userData)){
		  ?>
          <div id="loginMessage">
            <div class="alert alert-danger" role="alert"> <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> <strong>Error! </strong><?php echo $this->entLogin->userData['descError'] ?> </div>
          </div>
          <?php
			}
	
			if(array_key_exists('idPrincipal', $this->entLogin->userData)){
				echo "Usuario Correcto";
			}else{
			?>
          <div id="loginForm">
            <form role="form" action="./login/validation/" method="post">
              <h2>Inicio de sesión <small>Logueate o registrate gratis.</small></h2>
              <hr class="colorgraph">
              <div class="form-group">
                <input type="number" class="form-control" id="txtDNI" name="txtDNI" placeholder="Usuario" tabindex="1" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Contraseña" tabindex="2" required>
              </div>
              <hr class="colorgraph">
              <div class="row">
                <div class="col-xs-6 col-md-6"><a href="./register/" class="btn btn-primary btn-block">Registrarse</a></div>
                <div class="col-xs-6 col-md-6">
                  <button type="submit" class="btn btn-success btn-block">Iniciar Sesión</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
}
?>
