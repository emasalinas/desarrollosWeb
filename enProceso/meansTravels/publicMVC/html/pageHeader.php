<html lang="es">
<head>
<base href="<?php echo C_PREFIX_HOME ?>/" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>meansTravels</title>
<link href="./publicMVC/css/cssBootstrap.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssBootstrapTable.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssBootstrapTheme.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssAwesome.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssColors.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssCustom.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssResponsive.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssFonts.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssElements.css" rel="stylesheet" type="text/css">
<!--
<link href="./publicMVC/css/cssCustom.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssGeneral.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssObjects.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssPDF.css" rel="stylesheet" type="text/css">

-->

<script type="text/javascript" src="./publicMVC/js/jsJQuery.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsJQueryBase64.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsJQueryCountDown.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsBootstrap.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsBootstrapTable.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsGeneral.js"></script>
<!--
<script type="text/javascript" src="./publicMVC/js/jsTableExport.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsHtmlToCanvas.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsPdf.js"></script>
-->
</head>
<body>
<header id="mainheader">
  <div class="mt-topbar">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <ul class="mt-topinfo">
            <li> <i class="fa fa-phone"></i> Telefono: +54 9 341 311 0151 </li>
            <li> <i class="fa fa-envelope-o"></i><a href="#">Email: contacto@means.com.ar</a> </li>
          </ul>
        </div>
        <div class="col-md-5">
          <ul class="mt-userinfo">
            <!--<li>
              <div class="mt-social-network">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
              </div>
            </li>-->
            <li><a href="#" data-toggle="modal" data-target="#registerModalbox">Registrate</a> 
              <!-- Modal -->
              <div class="modal fade mt-loginbox" id="registerModalbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body"> <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></a>
                      <div class="mt-login-title">
                        <h2>Registrate con</h2>
                        <span>tu cuenta de</span>
                        <div class="mt-login-network">
                          <ul>
                            <li><a href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i> Facebook</a></li>
                            <li><a href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i> Twitter</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="mt-login-sepratore"><span>Ó</span></div>
                      <form action="./register/validation/" method="post">
                        <p><i class="fa fa-envelope-o"></i>
                          <input type="text" name="txtDNI" placeholder="Documento">
                        </p>
                        <p>
                          <input type="submit" value="Registrar" class="thbg-color">
                        </p>
                      </form>
                      <!--
                      <form action="./register/" method="post">
                      	<p>
	                      <input type="submit" value="Registrar" class="thbg-color">
                        </p>
                      </form>
                      -->
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <?php
			  if($this->userSession == C_USER_LOGIN_OUT){
			  ?>
              <a href="#" data-toggle="modal" data-target="#Modalbox">Logueate</a> 
              <!-- Modal -->
              <div class="modal fade mt-loginbox" id="Modalbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </a>
                      <div class="mt-login-title">
                        <h2>Iniciar sesión con</h2>
                        <span>tu cuenta de</span>
                        <div class="mt-login-network">
                          <ul>
                            <li><a href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i> Facebook</a></li>
                            <li><a href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i> Twitter</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="mt-login-sepratore"><span>Ó</span></div>
                      <form action="./login/validation/" method="post">
                        <p><i class="fa fa-envelope-o"></i>
                          <input type="text" name="txtDNI" placeholder="Documento">
                        </p>
                        <p><i class="fa fa-lock"></i>
                          <input type="password" name="txtPassword" placeholder="Tu Contraseña">
                        </p>
                        <p>
                          <input type="submit" value="Ingresar" class="thbg-color">
                          <a href="#">Olvidaste tu clave?</a> </p>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php	}else{ ?>
              <div id="lang_sel">
                <ul>
                  <li><a class="lang_sel_sel" href="#">Hola, <?php echo $this->userData['usuarioNombre'] ?></a>
                    <ul>
                      <li><a href="#">Mi cuenta</a> 		</li>
                      <li><a href="#">Perfil</a> 			</li>
                      <li><a href="./login/logout">Cerrar Sesión</a> 	</li>
                    </ul>
                  </li>
                </ul>
              </div>
            <?php	} ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  
  <div class="mt-headbar">
    <div class="container">
      <div class="row">
        <div class="col-md-3"><a href="<?php echo C_PREFIX_HOME ?>" class="logo"><img src="./publicMVC/img/logo.png" width="200px" alt=""></a></div>
        <div class="col-md-9">
          <div class="mt-rightside">
            <nav class="navbar navbar-default navigation">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a href="index.html">Inicio</a></li>
                  <li><a href="about-us.html">Quienes somos?</a></li>
                  <li><a href="#">Como funciona?</a>
                    <ul class="sub-dropdown">
                      <li><a href="blog-grid.html">Pedir un viaje</a></li>
                      <li><a href="blog-large.html">Quienes son los conductores?</a></li>
                      <li><a href="blog-medium.html">Que empresas intervienen?</a></li>
                      <li><a href="blog-detail.html">Como pago mis viajes?</a>
                        <ul class="sub-dropdown">
                          <li><a href="blog-detail-video.html">Video &amp; Soundcloud</a></li>
                          <li><a href="blog-detail.html">Single Image Layout</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#">Soporte</a>
                    <ul class="sub-dropdown">
                      <li><a href="undercunstruction.html">Undercunstruction</a></li>
                      <li><a href="404.html">404</a></li>
                      <li><a href="services.html">Services</a></li>
                      <li><a href="#">Team</a>
                        <ul class="sub-dropdown">
                          <li><a href="team-grid.html">Team Grid</a></li>
                          <li><a href="team-medium.html">Team Medium</a></li>
                          <li><a href="team-detail.html">Team Detail</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a href="contact-us.html">Contactanos</a></li>
                </ul>
              </div>
            </nav>
            <!--
            <div class="mt-search"> <a href="#" class="mt-searchbtn" data-toggle="modal" data-target="#searchmodalbox"><i class="fa fa-search"></i></a>
              <div class="modal fade mt-loginbox" id="searchmodalbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                    	<a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></a>
                      <div class="mt-login-title">
                        <h2>Search Your KeyWord</h2>
                      </div>
                      <form>
                        <p><i class="fa fa-search"></i>
                          <input type="text" placeholder="Enter Your Keyword">
                        </p>
                        <p>
                          <input type="submit" value="Search" class="thbg-color">
                        </p>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            --> 
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
