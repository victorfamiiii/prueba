<?php include('nusoap.php'); ?>
<html>
<body>
<form id="formulario" action="cliente.php" method="get">
Número: <input name="num" type="text">
<input type="submit" value="enviar">
</form>

<?php
if ($_GET) {
require_once('nusoap.php');
//we create an array with the element name that has the form value of name
$parameters = array('num'=>$_GET['num']);

//now we must create a soapclient object
$soapclient = new soapclient('http://localhost/soapbueno/server.php');

//now we call the server.
$result=$soapclient->call('es_primo',$parameters);
if($result==true){
  echo  "<p>Es primo <p>";
}else{
  echo  "<p>No es primo <p>";
}



}
?>
</body>
</html>

