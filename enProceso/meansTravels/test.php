<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');
$vCountDown = new DateTime();
$vCountDown->modify('+10 min');

echo $vCountDown->format('Y:m:d h:i:s');

echo date_default_timezone_get()

?>