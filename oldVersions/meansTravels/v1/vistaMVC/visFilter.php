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
  <div id="filterHeader"> </div>
  <div id="filterForm">
    <form role="form" class="form-vertical" action="./filter/find/" method="post">
      <h2>Buscador de viajes <small>Encuentra tu mejor opcion.</small></h2>
      <hr class="colorgraph">
      <div class="form-group">
        <select class="form-control" id="txtOrigen" name="txtOrigen">
          <option value="0">Seleccione la ciudad de origen</option>
          <?php
						foreach($this->entFilter->arrTargets as $arrCiudad):
					?>
          <option value="<?php echo $arrCiudad['idPrincipal'] ?>"><?php echo $arrCiudad['nombreCiudad'] ?></option>
          <?php
						endforeach;
					?>
        </select>
      </div>
      <div class="form-group">
        <select class="form-control" id="txtDestino" name="txtDestino">
          <option value="0">Seleccione una ciudad de origen para ver los destinos</option>
        </select>
      </div>
      <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
          <div class="form-group">
            <label class="control-label" for="dateViaje">Fecha: </label>
            <input type="date" class="form-control" id="dateViaje" name="dateViaje">
          </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
          <div class="form-group">
            <label class="control-label" for="timeDesde">Horario desde: </label>
            <input type="time" class="form-control" id="timeDesde" name="timeDesde">
          </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
          <div class="form-group">
            <label class="control-label" for="timeHasta">hasta: </label>
            <input type="time" class="form-control" id="timeHasta" name="timeHasta">
          </div>
        </div>
      </div>
      <hr class="colorgraph">
      <div class="row">
		<div class="col-xs-8 col-md-8">
        	
        </div>
        <div class="col-xs-4 col-md-4">
          <button type="submit" class="btn btn-primary btn-block">Comenzar</button>
        </div>
      </div>
    </form>
  </div>
  <?php
    $vCont = 0;
    if(count($this->entFilter->arrTravels) > 0): 
    ?>
  <div id="filterList" class="panel panel-default">
    <table data-toggle="table" data-sortOrder="asc" data-page-size="20">
      <thead>
        <tr>
          <?php                
                $arrFieldNames = array_keys(current($this->entFilter->arrTravels));
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
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $vCount = 0;
            foreach($this->entFilter->arrTravels as $arrListViewRow):
                $vCount++;
                array_map('htmlentities', $arrListViewRow);
            ?>
        <tr>
          <?php
                        foreach($arrListViewRow as $vListViewField => $vListViewRow){
                            echo '<td>'.$this->clModelo->mExitField($vListViewRow, $vListViewField).'</td>';
                        }
                    ?>
          <td><a href="./travels/view/<?php echo $this->mEncryptText($arrListViewRow['idPrincipal'], true) ?>">Comprar</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>
</div>
