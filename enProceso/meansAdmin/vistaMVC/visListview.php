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
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Reportes</h1>
		</div>
	</div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="headerListView" class="page-header">
              <h1><?php echo $this->entListview->vTitulo ?>
                <small><?php echo $this->entListview->vSubTitulo ?></small>
              </h1>
            </div>
    
    <?php
    $vCont = 0;
    if (count($this->entListview->arrListView) > 0): 
    ?>   
            <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-striped="true" data-sortOrder="desc" data-page-size="20">
              <thead>
                <tr>
                <?php 
                    if(in_array('rowCount', $this->entListview->arrOptions)){
                        echo '<th data-sortable="true">#</th>';
                    }
                    
                    $arrFieldNames = array_keys(current($this->entListview->arrListView));
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
                </tr>
              </thead>
              <tbody>
                <?php 
                $vCount = 0;
                foreach($this->entListview->arrListView as $arrListViewRow):
                    $vCount++;
                    array_map('htmlentities', $arrListViewRow);
                ?>
                    <tr>
                        <?php
                            if(in_array('rowCount', $this->entListview->arrOptions)) echo '<td>'.$vCount.'</td>';
                            foreach($arrListViewRow as $vListViewField => $vListViewRow){
                                echo '<td>'.$this->clModelo->mExitField($vListViewRow, $vListViewField).'</td>';
                            }
                        ?>
                    </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
        <?php endif; ?>
      </div>
    </div>
</div>