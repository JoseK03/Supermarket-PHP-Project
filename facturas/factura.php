<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

echo "si esta";

require_once("config.php");
require_once("../empleados/config.php");
$data = new ConfigFactura();
/* $all = $data->SelectAll(); */
$todo = $data->SelectEmpleado();
$all = $data->SelectAlls(); 

$todoCliente = $data->SelectCliente();


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clientes </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../style/css/estudiantes.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Camper Skills.</h3>
        <img src="images/Diseño sin título.png" alt="" class="imagenPerfil">
        <h3>Jose Vargas</h3>
      </div>
      <div class="menus">
        <a href="../categorias/categorias.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Categorias</h3>
        </a>
        <a href="../clientes/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
        </a>
        <a href="../empleados/empleados.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Empleados</h3>
        </a>
        <a href="../facturas/factura.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Factura</h3>
        </a>
        <a href="../proveedores/proveedores.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Proveedores</h3>
        </a>
       


      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>Factura</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEstudiantes"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">ID empleado</th>
              <th scope="col">ID cliente</th>
              <th scope="col">fecha</th>
              <th scope="col">ELIMINAR</th>
              <th scope="col">DETALLE</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
          <?php
            
              foreach ($all as $key => $val){
                
              
            ?>

            <tr>
                <td> <?php echo $val ['factura_id']?></td>
                <td> <?php echo $val ['empleado_id']?></td>
                <td> <?php echo $val ['cliente_id']?></td>
                <td> <?php echo $val ['fecha']?></td>
                <td> <a href="borrarFactura.php?factura_id=<?= $val['factura_id']?> & req=delete" class="btn btn-danger">Eliminar</a></td>
                <td> <a href="modificarFactura.php?factura_id=<?= $val['factura_id']?>" class="btn btn-warning">Editar</a></td>
            </tr>
            <?php } ?> 

          </tbody>
        
        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Estudiantes</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarEstudiantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Factura</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="registrarFactura.php" method="post">
              <div class="mb-1 col-12">
                <label for="nombre" class="form-label">ID empleado</label>
                <select name="empleado_id" id="empleado_id" class="form-control">
                  <?php
                    foreach ($todo as $key => $value) {
                  ?>
                    <option value="<?php echo $value['empleado_id']?>"><?php echo $value['nombre'] ?></option>
                  <?php } ?>
                   

              </select>
              </div>

              <div class="mb-1 col-12">
                <label for="descripcion" class="form-label">ID cliente</label>
                <select id="cliente_id" name="cliente_id" class="form-control">
                <?php
                    foreach ($todoCliente as $key => $valor) {
                  ?>
                    <option value="<?php echo $valor['cliente_id']?>"><?php echo $valor['nombre'] ?></option>
                  <?php } ?>
                  
              </select>
              </div>
            

              <div class="mb-1 col-12">
                <label for="descripcion" class="form-label">FECHA</label>
                <input type="date" name="fecha">
              </div>
              
              <!-- <div class="mb-1 col-12">
                <label for="logros" class="form-label">Logros</label>
                <input 
                  type="text"
                  id="logros"
                  name="logros"
                  class="form-control"  
                 
                />
              </div> -->

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>