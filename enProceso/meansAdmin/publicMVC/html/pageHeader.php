<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo C_PREFIX_HOME ?>/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>meansTravels</title>
<link href="./publicMVC/css/cssGeneral.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssBootstrap.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssBootstrapTable.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssFontAwesome.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssElements.css" rel="stylesheet" type="text/css">
<link href="./publicMVC/css/cssObjects.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="./publicMVC/js/jsJQuery.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsJQueryBase64.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsGeneral.js"></script>

<script type="text/javascript" src="./publicMVC/js/jsBootstrap.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsBootstrapTable.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsTableExport.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsHtmlToCanvas.js"></script>
<script type="text/javascript" src="./publicMVC/js/jsPdf.js"></script>
</head>

<body>
<div class="pageFormat">
<?php if($vShowNavBar){ ?>
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <!-----------------------------------------------------------------
    - Barra superior - Header
    ------------------------------------------------------------------->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./dashboard/">meansTravels</a>
      </div>
    
    <!-----------------------------------------------------------------
    - Barra superior - Botones
    ------------------------------------------------------------------->
      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i>
                <i class="fa fa-caret-down"></i>
            </a>
            
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="#">
                        <div>
                            <strong>Titulo</strong>
                            <span class="pull-right text-muted"><em>Yesterday</em></span>
                        </div>
                        <div>Texto descripcion</div>
                    </a>
                </li>
                <li class="divider"></li>
            </ul>
        </li>
    
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-tasks fa-fw"></i>
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-tasks">
                <li>
                    <a href="#">
                        <div>
                            <strong>Task 1</strong>
                            <span class="pull-right text-muted">40% Complete</span>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span> 
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
            </ul>
        </li>
        
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i>
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i>
                            New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
          </ul>
        </li>
    
    
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a> </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a> </li>
                <li class="divider"></li>
                <li><a href="./login/logout/"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a> </li>
            </ul>
        </li>
      </ul>
    
    <!-----------------------------------------------------------------
    - Barra lateral
    ------------------------------------------------------------------->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li><a href="./dashboard/"><i class="fa fa-dashboard fa-fw"></i>Principal</a></li>
                    <li><a href="#">
                    		<i class="fa fa-bar-chart-o fa-fw"></i>ABM
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="./abm/show/proveedores">Proveedores</a></li>
                            <li><a href="./abm/show/conductores">Conductores</a></li>
                            <li><a href="./abm/show/movil">Moviles</a></li>
                            <li><a href="./abm/show/ciudades">Ciudades</a></li>
                            <li><a href="./abm/show/destinos">Destinos</a></li>
                            <li class="divider"></li>
                            <li><a href="./abm/show/condiciones">Condiciones Precios</a></li>
                            <li><a href="./abm/show/precios">Formulas Precio</a></li>
                        </ul>
                    </li>
                    <li><a href="./crono/"><i class="fa fa-table fa-fw"></i> Cronograma</a> </li>
                    <li>
                    	<a href="#">
                    		<i class="fa fa-sitemap fa-fw"></i>Reportes
                            <span class="fa arrow"></span>
						</a>
                        <ul class="nav nav-second-level">
                        	<li><a href="./listview/custom/usuarios/min">Usuarios</a></li>
                            <li><a href="./listview/custom/pasajeros/min">Pasajeros</a></li>
                            <li><a href="./listview/custom/viajes/min">Viajes</a></li>
                            <li><a href="#">Finanzas
                            		<span class="fa arrow"></span>
								</a>
                                <ul class="nav nav-third-level">
                                    <li> <a href="#">Cobros</a> </li>
                                    <li> <a href="#">Pagos</a> </li>
                                    <li> <a href="#">Partidas abiertas</a> </li>
                                    <li> <a href="#">Resumen</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                    	<a href="#">
                        	<i class="fa fa-wrench fa-fw"></i>Parametrización
                        	<span class="fa arrow"></span>
						</a>
                        <ul class="nav nav-second-level">
                            <li> <a href="./parameters/">Condiciones de Pago</a> </li>
                            <li> <a href="./parameters/">Formas de Pago</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php } ?>