

<?php 
	include "model/modelUsuarios.php";
	$Cuentas=new modelUsuarios();

	$Cuentas->nombres="Luis";
	$Cuentas->apellidos="Huarcaya Serrano";
	$Cuentas->dni="12345678";
	$Cuentas->fechaNacimiento="1987/06/15";
	$Cuentas->mail="huarseral@hotmail.com";

	$Cuentas->crear();
 ?>
