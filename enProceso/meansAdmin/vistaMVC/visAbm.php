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
			<h1 class="page-header">ABM - <small>Alta, baja, modificación</small></h1>
		</div>
	</div>
	
    
    
    <?php if($this->entAbm->vDisplay == 'viewShow'){ ?>
    <!------------------------------------------------------------------
    - Custom Toolbar
    ------------------------------------------------------------------->
    <div id="toolbarCustom">
        <div class="form-inline" role="form">
            <a href="./abm/create/<?php echo $this->entAbm->vTable ?>" role="button" class="btn btn-primary">
            <i class="fa fa-plus fa-lg"></i>
             Alta de <?php echo ucfirst($this->entAbm->vTable) ?>  
            </a>
        </div>
    </div>
    
    <!------------------------------------------------------------------
    - Show list
    ------------------------------------------------------------------->
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="headerListView" class="page-header">
              <h3><?php echo $this->entAbm->vTitulo ?>
                <small><?php echo $this->entAbm->vSubTitulo ?></small>
              </h3>
            </div>
            
			<?php
            $vCont = 0;
            if(count($this->entAbm->arrShow) > 0): 
            ?>   
            <table data-toolbar="#toolbarCustom" data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-striped="true" data-sortOrder="desc" data-page-size="20">
              <thead>
                <tr>
                <?php 
                    if(in_array('rowCount', $this->entAbm->arrOptions)){
                        echo '<th data-sortable="true">#</th>';
                    }
                    reset($this->entAbm->arrShow);
                    $arrFieldNames = array_keys(current($this->entAbm->arrShow));
                    foreach($arrFieldNames as $vFieldName){
                        echo '<th data-field="'.$vFieldName.'" data-sortable="true">';
                        if(defined($this->entAbm->vTable.'-'.$vFieldName)){
                            echo constant($this->entAbm->vTable.'-'.$vFieldName);
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
                foreach($this->entAbm->arrShow as $arrListViewRow):
                    $vCount++;
                    array_map('htmlentities', $arrListViewRow);
                ?>
                    <tr>
                        <?php
                            if(in_array('rowCount', $this->entAbm->arrOptions)) echo '<td>'.$vCount.'</td>';
                            foreach($arrListViewRow as $vListViewField => $vListViewRow){
                                echo '<td>'.clConvertions::mExitField($vListViewRow, $vListViewField, $this->entAbm->vTable).'</td>';
                            }
                        ?>
                        <td>
                        	<a href="./abm/edit/<?php echo $this->entAbm->vTable.'/'.$this->mEncryptText($arrListViewRow['idPrincipal'], true) ?>">Editar</a>
                            <a href="./abm/delete/<?php echo $this->entAbm->vTable.'/'.$this->mEncryptText($arrListViewRow['idPrincipal'], true) ?>">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
        <?php endif; ?>
      </div>
    </div>
    
    <!------------------------------------------------------------------
    - Form Section
    ------------------------------------------------------------------->
    <?php }elseif($this->entAbm->vDisplay == 'viewEdit' || $this->entAbm->vDisplay == 'viewCreate'){ ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
	            <div class="panel-heading"><?php echo ucfirst($this->entAbm->vTable) ?></div>
        		<div class="panel-body">
        			<div class="row">
                        <div class="col-lg-10">
                        <?php 
							if($this->entAbm->vDisplay == 'viewEdit') $vView = 'edit';
							elseif($this->entAbm->vDisplay == 'viewCreate') $vView = 'create';
						?>
                        <form role="form" action="./abm/post/<?php echo $vView.'/'.$this->entAbm->vTable.$this->entAbm->vCond ?>" method="post">
                        	<?php
								$vCount = 0;
								if($this->entAbm->vDisplay == 'viewEdit')
								$arrValues		= $this->entAbm->arrShow;
								foreach($this->entAbm->arrColumns as $vFieldName){
									
									$vType = clConvertions::mExitTypeInput($vFieldName['Field'], $vFieldName['Type']);
									
									$vCount++;
									echo '<div class="row">';
									echo '<div class="col-xs-6 col-sm-6 col-md-6">';
									echo '<div class="form-group">';
									
									if($this->entAbm->vDisplay == 'viewEdit'){
									if(defined($this->entAbm->vTable.'-'.$vFieldName['Field']))
										echo '<label for="'.$vFieldName['Field'].'">'.constant($this->entAbm->vTable.'-'.$vFieldName['Field']).':</label>';
									else
										echo '<label for="'.$vFieldName['Field'].'">'.$vFieldName['Field'].':</label>';
									}
									
									if(isset($arrValues[$vFieldName['Field']])) $vValue = $arrValues[$vFieldName['Field']]; else $vValue = '';
									echo clConvertions::mExitObject($this->entAbm->vTable, $vFieldName, $vValue , $vCount);
									
									
									echo '</div></div></div>';
								}
							?>
                            <button type="submit" 	class="btn btn-primary">Generar</button>
			                <a href="./abm/show/<?php echo $this->entAbm->vTable ?>" class="btn btn-primary">Cancelar</a>
                        </form>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>
	</div>
    <?php } ?>
</div>