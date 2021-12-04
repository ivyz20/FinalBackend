<?php
  // 1) Conexion
  // a) realizar la conexion con la bbdd
  // b) seleccionar la base de datos a usar
$conexion = mysqli_connect("127.0.0.1","root","");

  // 2) Almacenamos los datos del envío POST
  // a) generar variables para cada dato a almacenar en la bbdd
  $Imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
  $producto = $_POST ['Producto'];
  $marca = $_POST['Marca'];
  $observacion = $_POST['Observacion'];
  $precio = $_POST['Precio'];
 // Si se desea almacenar una imagen en la base de datos usar lo siguiente: addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))


  // 3) Preparar la orden SQL
  // INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_a_ingresar)
  // => Ingresa dentro de la siguiente tabla los siguientes valores
  // a) generar la consulta a realizar
$consulta = "INSERT INTO articulos (IDarticulos,imagen,Producto,Marca,Observacion,Precio)
        VALUES ('','$Imagen','$producto','$marca','$observacion','$precio')";
  // 4) Ejecutar la orden y ingresamos datos
  mysqli_select_db($conexion,"artistica");
  // a) ejecutar la consulta
  mysqli_query($conexion,$consulta);
  // a) rederigir a index
  header('location: listar.php');

?>
