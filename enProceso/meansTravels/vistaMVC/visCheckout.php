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
  <div id="travelDetail">
    <div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Origen</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['idRelacion1'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Destino</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['idRelacion2'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Fecha</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['fechaViaje'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Hora</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['horaViaje'] ?></div>
      </div>
    </div>
    <div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Proveedor</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['proveedorViaje'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Chofer</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['conductorViaje'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Precio</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['precioViaje'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Estado del viaje</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['estadoViaje'] ?></div>
      </div>
    </div>
    <div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Marca Movil</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['marcaMovil'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Modelo Movil</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['modeloMovil'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Color Movil</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['colorMovil'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Patente</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['patenteMovil'] ?></div>
      </div>
    </div>
    <div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">ID Viaje</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['idPrincipal'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Asiento</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrTravel['conductorViaje'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Pasajero</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrSeat['usuarioApellido'].', '.$this->entCheckout->arrSeat['usuarioNombre'] ?></div>
      </div>
      <div class="panel panel-info travelData">
        <div class="panel-heading">Dirección</div>
        <div class="panel-body"><?php echo $this->entCheckout->arrSeat['usuarioCalle'].' '.$this->entCheckout->arrSeat['usuarioNumero'].' - Piso: '.$this->entCheckout->arrSeat['usuarioPiso']. ' - Depto: '.$this->entCheckout->arrSeat['usuarioDepto'] ?></div>
      </div>
    </div>
  </div>
  <div id="travelPayForm">
    <div class="priceTable pricingGroup">
      <div class="priceBlock colorOne fl">
        <h2 class="priceTitle">Mercado Pago</h2>
        <div class="priceContent">
          <p class="priceValue"><sup>$</sup> <span>80</span></p>
          <p class="priceHint">Perfect for freelancers</p>
        </div>
        <ul class="pricePoints">
          <li><span class="fontawesome-cog"></span>1 WordPress Install</li>
          <li><span class="fontawesome-star"></span>25,000 visits/mo.</li>
          <li><span class="fontawesome-dashboard"></span>Unlimited Data Transfer</li>
          <li><span class="fontawesome-cloud"></span>10GB Local Storage</li>
        </ul>
        <div class="priceFooter">
          <p>Utilice este medio de pago</p>
        </div>
      </div>
      <div class="priceBlock colorTwo fl">
        <h2 class="priceTitle">Voucher</h2>
        <div class="priceContent">
          <p class="priceValue"><sup>$</sup><span>80</span></p>
          <p class="priceHint">Perfect for freelancers</p>
        </div>
        <ul class="pricePoints">
          <li><span class="fontawesome-cog"></span>10 WordPress Install</li>
          <li><span class="fontawesome-star"></span>100,000 visits/mo.</li>
          <li><span class="fontawesome-dashboard"></span>Unlimited Data Transfer</li>
          <li><span class="fontawesome-cloud"></span>20GB Local Storage</li>
        </ul>
        <div class="priceFooter">
          <p>Utilice este medio de pago</p>
        </div>
      </div>
      <div class="priceBlock colorThree fl">
        <h2 class="priceTitle">Pago a bordo</h2>
        <div class="priceContent">
          <p class="priceValue"><sup>$</sup><span>80</span> </p>
          <p class="priceHint">Perfect for freelancers</p>
        </div>
        <ul class="pricePoints">
          <li><span class="fontawesome-cog"></span>25 WordPress Install</li>
          <li><span class="fontawesome-star"></span>400,000 visits/mo.</li>
          <li><span class="fontawesome-dashboard"></span>Unlimited Data Transfer</li>
          <li><span class="fontawesome-cloud"></span>30GB Local Storage</li>
        </ul>
        <div class="priceFooter">
          <p>Utilice este medio de pago</p>
        </div>
      </div>
    </div>
  </div>
  <div id="travelActions">
    <a href="./checkout/confirm/posted/" class="btn btn-primary">Checkout</a>
  </div>
</div>
