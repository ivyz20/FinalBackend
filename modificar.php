<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion=mysqli_connect("127.0.0.1","root","");
 mysqli_select_db($conexion,"artistica");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM articulos WHERE IDarticulos=$id";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$repuesta=mysqli_query ($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($repuesta);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./CSS/estilos.css">
          <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
        <title>Artística Papel Madera</title>
    </head>
    <body class="modificar">
        <?php
        // 6) asignamos a diferentes variables los respectivos valores del array $datos.
        $Imagen=$datos['imagen'];
        $producto=$datos['Producto'];
        $marca=$datos['Marca'];
        $observacion=$datos['Observacion'];
        $precio=$datos['Precio'];
        ?>
        <h2>Modificar</h2>
        <p>Ingrese los nuevos datos del producto.</p>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Imagen</label>
            <input type="file" name="imagen" placeholder="imagen">
            <br>
            <label>Producto</label>
            <input type="text" name="Producto" placeholder="Producto" value="<?php echo "$producto"; ?>">
            <br>
            <label>Marca</label>
            <input type="text" name="Marca" placeholder="Marca" value="<?php echo "$marca"; ?>">
            <br>
            <label>Observación</label>
            <input type="text" name="Observacion" placeholder="Observacion" value="<?php echo "$observacion"; ?>">
            <br>
            <label>Precio</label>
            <input type="text" name="Precio" placeholder="Precio" value="<?php echo "$precio"; ?>">

            <br>
            <input type="submit" name="guardar_cambios" value="Guardar Cambios">

            <button type="submit" name="Cancelar" formaction="index.html">Cancelar</button>
        </form>
        <?php
        // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
        if(array_key_exists('guardar_cambios',$_POST)){

          $conexion = mysqli_connect("127.0.0.1","root","");
           mysqli_select_db($conexion,"artistica");

            // 2') Almacenamos los datos actualizados del envío POST
            // a) generar variables para cada dato a almacenar en la bbdd
            // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
            // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
            $Imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
            $producto=$_POST['Producto'];
            $marca=$_POST['Marca'];
            $observacion=$_POST['Observacion'];
            $precio=$_POST['Precio'];

            // 3') Preparar la orden SQL
            // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
            // a) generar la consulta a realizar
             $consulta = "UPDATE articulos SET imagen='$Imagen', Producto='$producto', Marca='$marca', Observacion='$Observacion', Precio='$precio' WHERE IDarticulos=$id";
            // 4') Ejecutar la orden y actualizamos los datos
            // a) ejecutar la consulta
            mysqli_query($conexion,$consulta);
            // a) rederigir a index
            header('location: listar.php');
        }?>
    </body>
</html>
