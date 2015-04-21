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
          <h1>Creación de usuario</h1>
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
        if(array_key_exists('codError', $this->entRegister->registerResult)){
        ?>
          <div id="registerMessage">
            <div class="alert alert-danger" role="alert"> <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> <strong>Error! </strong><?php echo $this->entRegister->registerResult['descError'] ?> </div>
          </div>
          <?php
		}
		
		if(array_key_exists('idPrincipal', $this->entRegister->registerResult)){
			echo "Usuario Correcto";
		}else{
		?>
          <div id="registerForm">
            <form role="form" method="post" action="./register/generate">
              <h2>Nuevo pasajero <small>Completa los datos para tus viajes.</small></h2>
              <hr class="colorgraph">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre" tabindex="1" required
          <?php if(isset($_POST['txtNombre'])) echo 'value="'.$_POST['txtNombre'].'"'; ?>
          >
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="txtApellido" id="txtApellido" class="form-control" placeholder="Apellido" tabindex="2" required
          <?php if(isset($_POST['txtApellido'])) echo 'value="'.$_POST['txtApellido'].'"'; ?>
          >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5">
                  <div class="form-group">
                    <input type="text" name="txtCalle" id="txtCalle" class="form-control" placeholder="Calle" tabindex="3" required
          <?php if(isset($_POST['txtCalle'])) echo 'value="'.$_POST['txtCalle'].'"'; ?>
          >
                  </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="form-group">
                    <input type="number" name="txtNumero" id="txtNumero" class="form-control" placeholder="Número" tabindex="4" required
          <?php if(isset($_POST['txtNumero'])) echo 'value="'.$_POST['txtNumero'].'"'; ?>
          >
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <input type="text" name="txtPiso" id="txtPiso" class="form-control" placeholder="Piso" tabindex="5" required
          <?php if(isset($_POST['txtPiso'])) echo 'value="'.$_POST['txtPiso'].'"'; ?>
          >
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <input type="text" name="txtDpto" id="txtDpto" class="form-control" placeholder="Dpto" tabindex="6" required
          <?php if(isset($_POST['txtDpto'])) echo 'value="'.$_POST['txtDpto'].'"'; ?>
          >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="form-group">
                    <input type="number" name="txtPrefijo" id="txtPrefijo" class="form-control" placeholder="Cod.Area" tabindex="7"
          <?php if(isset($_POST['txtPrefijo'])) echo 'value="'.$_POST['txtPrefijo'].'"'; ?>
          >
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <input type="number" name="txtCelular" id="txtCelular" class="form-control" placeholder="Celular" tabindex="8"
          <?php if(isset($_POST['txtCelular'])) echo 'value="'.$_POST['txtCelular'].'"'; ?>
          >
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5">
                  <div class="form-group">
                    <input type="number" name="txtDNI" id="txtDNI" class="form-control" placeholder="DNI" tabindex="9" required
          <?php if(isset($_POST['txtDNI'])) echo 'value="'.$_POST['txtDNI'].'"'; ?>
          >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="email" name="txtMail" id="txtMail" class="form-control" placeholder="Correo Electrónico" tabindex="10" required
      <?php if(isset($_POST['txtMail'])) echo 'value="'.$_POST['txtMail'].'"'; ?>
      >
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="password" name="txtClave" id="txtClave" class="form-control" placeholder="Clave" tabindex="11" required>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="password" name="txtConfClave" id="txtConfClave" class="form-control" placeholder="Confirma Clave" tabindex="12" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3"> <span class="button-checkbox">
                  <button type="button" class="btn" data-color="info" tabindex="13">De acuerdo</button>
                  <input type="checkbox" name="chkTerms" id="chkTerms" class="" value="1">
                  </span> </div>
                <div class="col-xs-9 col-sm-9 col-md-9">Al<strong class="label label-primary">Registrarse</strong>, usted esta aceptando los <a href="#" data-toggle="modal" data-target="#registerTerms">Terminos y condiciones</a> de nuestro sitio. </div>
              </div>
              <hr class="colorgraph">
              <div class="row">
                <div class="col-xs-6 col-md-6">
                  <input type="submit" value="Registrarse" class="btn btn-primary btn-block" tabindex="12">
                </div>
                <div class="col-xs-6 col-md-6"><a href="./login/" class="btn btn-success btn-block">Iniciar Sesión</a></div>
              </div>
            </form>
            
            <!-- Modal -->
            <div class="modal fade" id="registerTerms" tabindex="-1" role="dialog" aria-labelledby="tituloTerminos" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="tituloTerminos">Terms & Conditions</h4>
                  </div>
                  <div class="modal-body">Terminos a definir</div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">De acuerdo</button>
                  </div>
                </div>
              </div>
            </div>
            <?php
}
?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
