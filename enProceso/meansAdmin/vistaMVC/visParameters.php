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
	<!------------------------------------------------------------------
    - Header Page
    ------------------------------------------------------------------->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Parametrizacion - <small>Configuración inicial del negocio</small></h1>
		</div>
	</div>
	
    
    
    <?php if($this->entParameters->vDisplay == 'viewShow'){ ?>
    <!------------------------------------------------------------------
    - Custom Toolbar
    ------------------------------------------------------------------->
    <div id="toolbarCustom">
        <div class="form-inline" role="form">
            <a href="./abm/create/<?php echo $this->entParameters->vTable ?>" role="button" class="btn btn-primary">
            <i class="fa fa-plus fa-lg"></i>
             Alta de <?php echo ucfirst($this->entParameters->vTable) ?>  
            </a>
        </div>
    </div>
    
    <!------------------------------------------------------------------
    - Show list
    ------------------------------------------------------------------->
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="headerListView" class="page-header">
              <h3><?php echo $this->entParameters->vTitulo ?>
                <small><?php echo $this->entParameters->vSubTitulo ?></small>
              </h3>
            </div>
            
			<?php
            $vCont = 0;
            if(count($this->entParameters->arrShow) > 0): 
            ?>   
            <table data-toolbar="#toolbarCustom" data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-striped="true" data-sortOrder="desc" data-page-size="20">
              <thead>
                <tr>
                <?php 
                    if(in_array('rowCount', $this->entParameters->arrOptions)){
                        echo '<th data-sortable="true">#</th>';
                    }
                    reset($this->entParameters->arrShow);
                    $arrFieldNames = array_keys(current($this->entParameters->arrShow));
                    foreach($arrFieldNames as $vFieldName){
                        echo '<th data-field="'.$vFieldName.'" data-sortable="true">';
                        if(defined($vFieldName)){
                            echo constant($vFieldName);
                        }else{
                            echo $vFieldName;
                        }
                        echo '</th>';
                    }
                ?>
                <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $vCount = 0;
                foreach($this->entParameters->arrShow as $arrListViewRow):
                    $vCount++;
                    array_map('htmlentities', $arrListViewRow);
                ?>
                    <tr>
                        <?php
                            if(in_array('rowCount', $this->entParameters->arrOptions)) echo '<td>'.$vCount.'</td>';
                            foreach($arrListViewRow as $vListViewField => $vListViewRow){
                                echo '<td>'.$this->clModelo->mExitField($vListViewRow, $vListViewField).'</td>';
                            }
                        ?>
                        <td>
                        	<a href="./abm/edit/<?php echo $this->entParameters->vTable.'/'.$this->mEncryptText($arrListViewRow['idPrincipal'], true) ?>">Editar</a>
                            <a href="./abm/delete/<?php echo $this->entParameters->vTable.'/'.$this->mEncryptText($arrListViewRow['idPrincipal'], true) ?>">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
        <?php endif; ?>
      </div>
    </div>
    
    <!------------------------------------------------------------------
    - Custom Form Section
    ------------------------------------------------------------------->
    <?php }elseif($this->entParameters->vDisplay == 'viewEdit' || $this->entParameters->vDisplay == 'viewCreate'){ ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
	            <div class="panel-heading">Seteo</div>
        		<div class="panel-body">
        			<div class="row">
                        <div class="col-lg-10">
                        <!------------------------------------------------------------------
                        - Condicion de precio
                        ------------------------------------------------------------------->
                        <form role="form" action="./parameters/post/create/precios/" method="post">
                            <div class="formCondPrecio">
                              <ul class="nav nav-pills">
                                <li class="active"><a href="#nuevaComision" data-toggle="tab">Comision</a></li>
                                <li><a href="#nuevoAbono" data-toggle="tab">Abonos</a></li>
                              </ul>
                              <div class="tab-content">
                                <div id="nuevaComision" class="tab-pane active">
                                    <div class="row">
                                    	<div class="col-xs-4 col-sm-4 col-md-4">
                                    		<div class="form-group">
                                            	<input type="text" id="nomPrecio" name="nomPrecio" value="" class="form-control" placeholder="Nombre">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-xs-5 col-sm-5 col-md-5">
                                            <div class="form-group">
                                            	<input type="text" id="formulaPrecio" name="formulaPrecio" value="" class="form-control" placeholder="Formula">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="nuevoAbono" class="tab-pane">
                                    <h4>Pane 2 Content</h4>
                                    <p> and so on ...</p>
                                </div>
                              </div>
                            </div>
                        </form>
					</div>
                </div>
            </div>
        </div>
    </div>
        <?php } ?>
</div>