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
          <h1>Selección de viaje</h1>		
          <h3>Desde <?php echo $this->clModelo->mExitField($this->entFilter->travelData['travelFrom'], 'idRelacion1') ?> hacia <?php echo $this->clModelo->mExitField($this->entFilter->travelData['travelTo'], 'idRelacion2') ?></h3>
	      <h2>Fecha: <?php echo $this->clModelo->mExitField($this->entFilter->travelData['travelDate'], 'fechaViaje') ?>
          <?php 
		  if(!empty($this->entFilter->travelData['travelTimeFrom']) && !empty($this->entFilter->travelData['travelTimeTo'])){
		  ?>
		  - Entre
		  <?php echo $this->clModelo->mExitField($this->entFilter->travelData['travelTimeFrom'], 'horaViaje'); ?>
          y
		  <?php echo $this->clModelo->mExitField($this->entFilter->travelData['travelTimeTo'], 'horaViaje');
		  }
		  ?>
          </h2>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
if($this->entFilter->actualView		== 'viewForm'){
?>
<div id="mainbanner">
  <div class="bx-wrapper" style="max-width: 100%;">
    <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 640px; background-color:#eaeaea">
      <ul class="bxslider">
        <li" class="bx-clone">
        	<img src="./publicMVC/img/map.jpg" alt="">
          	<div class="mt-caption">
            	<h2></h2>
            	<h1></h1>
          	</div>
        </li>
      </ul>
    </div>
  </div>
  <div class="mt-tourform">
    <div class="container"> <a href="#" class="formbtn">Busca tu viaje</a>
      <form action="./filter/find/" method="post">
        <ul>
          <li>
            <label>
              <select class="form-control" id="txtOrigen" name="txtOrigen" required>
                <option value="">Seleccione la ciudad de origen</option>
                <?php
					foreach($this->entFilter->arrTargets as $arrCiudad):
				?>
                <option value="<?php echo $arrCiudad['idPrincipal'] ?>"><?php echo $arrCiudad['nombreCiudad'] ?></option>
                <?php
					endforeach;
				?>
              </select>
            </label>
          </li>
          <li>
            <label>
              <select class="form-control" id="txtDestino" name="txtDestino" required>
                <option value="">Seleccione una ciudad de origen para ver los destinos</option>
              </select>
            </label>
          </li>
        </ul>
        <ul>
          <li>
            <label>
              <input type="date" class="form-control" id="dateViaje" name="dateViaje" required>
            </label>
          </li>
          <li>
            <label>
              <input type="time" class="form-control" id="timeDesde" name="timeDesde">
            </label>
          </li>
          <li>
            <label>
              <input type="time" class="form-control" id="timeHasta" name="timeHasta">
            </label>
          </li>
          <li>
            <input type="submit" class="thbg-color" value="Buscar viaje">
          </li>
        </ul>
      </form>
    </div>
  </div>
</div>
    
<?php
}elseif($this->entFilter->actualView		== 'viewList'){
	$vCont = 0;
	if(count($this->entFilter->arrTravels) > 0){
?>
<div class="mt-content">
  <section class="mt-pagesection" style="padding: 0px 0px 40px 0px;">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
		  <div class="mt-package-list">
		    <div class="row">
			   <?php 
				$vCount = 0;
				foreach($this->entFilter->arrTravels as $arrListViewRow):
					$vCount++;
					array_map('htmlentities', $arrListViewRow);
				?>
                    <article class="col-md-4">
                    <figure>
                    <a href="./travels/view/<?php echo $this->mEncryptText($arrListViewRow['idPrincipal'], true) ?>">
                      <img src="./publicMVC/img/travelImg.png" alt="">
                    </a>
                      <figcaption>
                      	<span class="package-price thbg-color">
						<?php echo $this->clModelo->mExitField($arrListViewRow['horaViaje'], 'horaViaje') ?>
                        </span>
                        <div class="mt-bottomelement">
                          <h5>
                          <a href="./travels/view/<?php echo $this->mEncryptText($arrListViewRow['idPrincipal'], true) ?>">
                          <?php echo $this->clModelo->mExitField($arrListViewRow['conductorViaje'], 'conductorViaje') ?>
                          </a>
                          </h5>
                          <div class="days-counter"><br />
                          <span><?php echo $this->clModelo->mExitField($arrListViewRow['precioViaje'], 'precioViaje') ?></span>
                          </div>
                        </div>
                      </figcaption>
                    </figure>
                  </article>
				<?php
					//foreach($arrListViewRow as $vListViewField => $vListViewRow){
					//	echo '<td>'.$this->clModelo->mExitField($vListViewRow, $vListViewField).'</td>';
					//}
				?>
			  <?php endforeach; ?>		
        </div>
	  </div>
	</div>
  </section>
</div>
<?php 
	}else{
?>
<div class="mt-content">
  <section class="mt-pagesection" style=" padding: 0px 0px 40px 0px;">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
		  <h2>No hay resultados para la busqueda realizada.</h2> 
          <p>Volver</p>       
        </div>
      </div>
    </div>
  </section>
</div>



<?php
	}
}
?>
