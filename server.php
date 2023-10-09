<?php
require_once "nusoap.php";
 
function es_primo($numero) {
  if ($numero <= 1) {
      return false;
  }
  if ($numero <= 3) {
      return true;
  }

  // Verificar si el número es divisible por 2 o 3
  if ($numero % 2 == 0 || $numero % 3 == 0) {
      return false;
  }

  // Comprobar divisibilidad por números primos mayores
  $i = 5;
  while ($i * $i <= $numero) {
      if ($numero % $i == 0 || $numero % ($i + 2) == 0) {
          return false;
      }
      $i += 6;
  }

  return true;
}

$server = new soap_server();
$server->register("es_primo");
$server->service(file_get_contents( 'php://input' ));

