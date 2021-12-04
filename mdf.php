<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Artística Papel Madera</title>
<link rel="stylesheet" href="./CSS/estilos.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

  <body class="producto">


<header>

<h1 class="subtitulo">Productos</h1>


  <img class="Logo4"src="./img/Logo4.jpg" alt="">

<nav class="main-nav">
        <a href="index.html" class="nav-link">Inicio</a>
        <a href="productos.php" class="nav-link">Productos</a>

        <style type="text/CSS">
          a:link {
            text-decoration:none;
          }
        </style>
</nav>
</header>


    <section>
      <div class="container">
        <div class="row">
    <?php
    // 1) Conexion
    $conexion = mysqli_connect("127.0.0.1", "root", "");

    // ) Almacenamos los datos del envío POST
    // No se utiliza este paso en este caso puntual

    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla
    $consulta="SELECT * FROM `articulos` WHERE `Marca` = 'MDF'";

    // 3) Ejecutar la orden y obtenemos los registros
    mysqli_select_db($conexion, "artistica");
    $datos= mysqli_query($conexion, $consulta);

    // 4) Transformar los registros a un array para poder mostrarlos
    //$reg=mysqli_fetch_array($datos); ESTO ESTABA
    // Mostramos por pantalla el array (pude ser con un print_r o con un bucle)
//print_r ($reg); TAMBIEN ESTABA

while ($reg = mysqli_fetch_array($datos)) {?>


<div class="card col-sm-12 col-md-6 col-lg-3">
        <img class="card-img-top img-fluid" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>" alt="")>
        <a style="text-decoration:none" href="ver.php?id=<?php echo $reg['IDarticulos'];?>" class="card-body">
          <h2><?php echo ucwords($reg['Producto'])?></h2>
          <h3><?php echo ucwords($reg['Marca']) ?></h3>
          <h4><?php echo ucwords($reg['Observacion']) ?></h4>
          <p>$ <?php echo $reg['Precio']; ?></p>


        </a>
</div>
   <?php } ?>
 </div>
   </div>
 </section>
  </body>
</html>
