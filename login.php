<?php
$user = $_POST["user"];
$pass = $_POST["pass"];

$usuario = "admin";
$contrasenia = "1234";

if ($usuario == $user && $contrasenia == $pass) {
  //Print("Correcto");
  header ("location:listar.php");
  //adonde quiero mandar al cliente
} else {
  //Print ("Incorrecto");
  header ("location:error.html");
  //volver a login
}
 ?>
