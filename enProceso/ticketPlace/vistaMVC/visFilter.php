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
<div id="filterHeader">

</div>

<div id="filterForm">
	<form role="form" class="form-vertical" action="./filter/find/" method="post">
        <div class="form-group">
          	<label class="control-label" for="txtOrigen">Origen: </label>
          	<select class="form-control" id="txtOrigen" name="txtOrigen">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group">
          	<label class="control-label" for="txtDestino">Destino: </label>
            <select class="form-control" id="txtDestino" name="txtDestino">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-inline">
	        <div class="form-group">
          		<label class="control-label" for="dateViaje">Fecha: </label>
          		<input type="date" class="form-control" id="dateViaje" name="dateViaje">
			</div>
        	<div class="form-group">
          		<label class="control-label" for="timeDesde">Entre las: </label>
          		<input type="time" class="form-control" id="timeDesde" name="timeDesde">
			</div>
            <div class="form-group">
          		<label class="control-label" for="timeHasta">hasta las: </label>
          		<input type="time" class="form-control" id="timeHasta" name="timeHasta">
			</div>
        </div>
        <div class="form-group" align="right">
            <button type="submit" class="btn btn-default">Buscar Viaje</button>
        </div>
	</form>
</div>
