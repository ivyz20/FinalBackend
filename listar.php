<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link rel="stylesheet" href="./CSS/estilos.css">
  <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Artística Papel Madera</title>
</head>
<body class="listar">
  <h1>Papel Madera</h1>



  <button type="submit"><a style="text-decoration:none" href="index.html">Inicio</a></button>
  <button type="submit"><a style="text-decoration:none" href="listar.php">Listar productos</a></button>
  <button type="submit"><a style="text-decoration:none" href="agregar.html">Agregar productos</a></button>
  <h2>Lista de Productos</h2>
  <p>La siguiente lista muestra los datos de los productos actualmente en stock.</p>

  <section>
    <div class="container">
      <div class="row">


        <?php
        // 1) Conexion
        $conexion = mysqli_connect("127.0.0.1", "root", "");
        mysqli_select_db($conexion, "artistica");

        // 2) Preparar la orden SQL
        // Sintaxis SQL SELECT
        // SELECT * FROM nombre_tabla
        // => Selecciona todos los campos de la siguiente tabla
        // SELECT campos_tabla FROM nombre_tabla
        // => Selecciona los siguientes campos de la siguiente tabla
        $consulta='SELECT * FROM articulos';

        // 3) Ejecutar la orden y obtenemos los registros
        $datos= mysqli_query($conexion, $consulta);

        //  recorro todos los registros y genero una CARD PARA CADA UNA
        while ($reg = mysqli_fetch_array($datos)) {?>
          <div class="card col-sm-12 col-md-6 col-lg-3">
            <a style="text-decoration:none" href="ver.php?id=<?php echo $reg['IDarticulos'];?>" class="card-body">
            <img class="card-img-top img-fluid" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" width="100px" height="100px")>
              <h2 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['Producto']) ?></h2>
              <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['Marca']) ?></h3>
                <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['Observacion']) ?></h4>
              <span>$ <?php echo $reg['Precio']; ?></span>
              <a href="modificar.php?id=<?php echo $reg['IDarticulos'];?>">Editar</a>
              <a href="borrar.php?id=<?php echo $reg['IDarticulos'];?>">Borrar</a>

            </a>
          </div>

        <?php } ?>

      </div>
    </div>
  </section>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
