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
          <h1>Datos del viaje</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="mt-content" align="center">
  <section class="mt-pagesection" style=" padding: 0px 0px 40px 0px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info travelData">
            <div class="panel-heading">Origen</div>
            <div class="panel-body"><?php echo $this->entTravels->arrTravel['idRelacion1'] ?></div>
          </div>
          <div class="panel panel-info travelData">
            <div class="panel-heading">Destino</div>
            <div class="panel-body"><?php echo $this->entTravels->arrTravel['idRelacion2'] ?></div>
          </div>
          <div class="panel panel-info travelData">
            <div class="panel-heading">Fecha</div>
            <div class="panel-body"><?php echo $this->entTravels->arrTravel['fechaViaje'] ?></div>
          </div>
          <div class="panel panel-info travelData">
            <div class="panel-heading">Hora</div>
            <div class="panel-body"><?php echo $this->entTravels->arrTravel['horaViaje'] ?></div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="panel panel-info travelData">
            <div class="panel-heading">Proveedor</div>
            <div class="panel-body"><?php echo $this->entTravels->arrTravel['proveedorViaje'] ?></div>
          </div>
          <div class="panel panel-info travelData">
            <div class="panel-heading">Chofer</div>
            <div class="panel-body"><?php echo $this->entTravels->arrTravel['conductorViaje'] ?></div>
          </div>
          <div class="panel panel-info travelData">
            <div class="panel-heading">Precio</div>
            <div class="panel-body"><?php echo $this->entTravels->arrTravel['precioViaje'] ?></div>
          </div>
          <div class="panel panel-info travelData">
            <div class="panel-heading">Estado</div>
            <div class="panel-body"><?php echo $this->entTravels->arrTravel['estadoViaje'] ?></div>
          </div>
        </div>
      </div>
      <?php
	  if($this->entTravels->arrTravel['capacidadMovil'] == 4){
	  ?>
      <div class="row">
        <div class="col-md-12">
          <h1>Seleccioná tu aciento</h1>
          <?php
				$vCount = 0;
				foreach($this->entTravels->arrSeats as $arrSeat){
				$vCount++;
			   ?>
          <?php //if($vCount == 1 || $vCount == 3) {? ><div class="customRow"><?php } ?>
          <div class="travelSeat">
            <?php
					if($arrSeat['estadoPasajero'] == '0')
					echo '<a href="./checkout/confirm/preliminary/'
						 .$this->mEncryptText($this->entTravels->arrTravel['idPrincipal'], true)
						 .'/'
						 .$this->mEncryptText($arrSeat['idPrincipal'], true)
						 .'">';
					?>
            <img src="./publicMVC/img/<?php echo 'seatState'.$arrSeat['estadoPasajero'].'.png'; ?>">
            <?php
					if($arrSeat['estadoPasajero'] == '0') echo '</a>';
					?>
          </div>
          <?php //if($vCount == 2 || $vCount == 4) {? ></div><?php } ?>
          <?php } ?>
          <?php } ?>
        </div>
      </div>
      <div class="row">
        <div class="mt-userservices mt-smallview">
          <div class="row">
            <article class="col-md-4">
              <div class="travelLeyendImg"><img src="./publicMVC/img/seatState0.png" /></div>
              <div class="services-info">
                <h6>Disponible</h6>
              </div>
            </article>
            <article class="col-md-4"> 
              <div class="travelLeyendImg"><img src="./publicMVC/img/seatState1.png" /></div>
              <div class="services-info">
                <h6>Pendiente</h6>
              </div>
            </article>
            <article class="col-md-4">
              <div class="travelLeyendImg"><img src="./publicMVC/img/seatState2.png" /></div>
              <div class="services-info">
                <h6>Ocupado</h6>
              </div>
            </article>
          </div>
        </div>
    </div>
  </section>
</div>