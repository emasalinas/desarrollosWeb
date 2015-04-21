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
					foreach($this->entIndex->arrTargets as $arrCiudad):
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
<div class="mt-content">
  <section class="mt-pagesection">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mt-modrentitle thememargin">
            <h3>Simples pasos</h3>
            <div class="mt-divider">
              <div class="short-seprator"><span><i class="fa fa-home"></i></span></div>
            </div>
            <br>
            <p>Sigue estos pasos para contratar tu viaje de manera rápida y segura.</p>
          </div>
        </div>
        <div class="col-md-12">
          <div class="mt-services">
            <div class="row">
              <article class="col-md-6">
                <figure><a href="#"><img src="extraimages/services1.jpg" height="100px" alt=""></a></figure>
                <div class="mt-serviceinfo">
                  <h2><a href="#">Paso 1</a></h2>
                  <p>Filtra en los campos del formulario, desde donde deseas viajar y hasta donde. Luego completa la fecha y el rango de horas que deseas viajar.</p>
                  <a href="#" class="mt-readmore thbg-colorhover">Read more</a> </div>
              </article>
              <article class="col-md-6">
                <figure><a href="#"><img src="extraimages/services2.jpg" height="100px" alt=""></a></figure>
                <div class="mt-serviceinfo">
                  <h2><a href="#">Paso 2</a></h2>
                  <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id.</p>
                  <a href="#" class="mt-readmore thbg-colorhover">Read more</a> </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
