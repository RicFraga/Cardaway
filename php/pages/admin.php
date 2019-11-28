<?php
  session_start();
  if(!isset($_SESSION["admin"])){
          header("location:./../../index.php");
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Administrador</title>
    <script src="./../../js/jquery-3.4.1.min.js"></script>
    <script src="./../../js/materialize.min.js"></script>

    <link href="./../../fonts/fonts.css" rel="stylesheet" />
    <link rel="stylesheet" href="./../../css/materialize.min.css" />
    <link rel="stylesheet" href="./../../css/style.css" />
    <link rel="stylesheet" href="./../../css/user_style.css" />
    <script
      src="https://kit.fontawesome.com/ed9493b41a.js"
      crossorigin="anonymous"
    ></script>
    <!--VALIDETTA-->
    <link
      href="./../../validetta/validetta.css"
      rel="stylesheet"
      type="text/css"
      media="screen"
    />
    <script
      type="text/javascript"
      src="./../../validetta/validetta.js"
    ></script>
    <script
      type="text/javascript"
      src="./../../validetta/validettaLang-es-ES.js"
    ></script>
    <script src="./../../js/admin.js"></script>
    <script src="./../../js/borrarPostal.js"></script>

    <!--cosas para que funciine sweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->


    <style>
      .tabs .tab a {
        font-weight: 800;
        color: black; /*cambiamos el color de la letra*/
      }
      ul.tabs div.indicator {
        background: black;
        height: 3px;
      }
    </style>
  </head>
  <body>
    <header>
      <div class="row navbar-fixed">
        <nav>
          <div class="nav-wrapper">
            <a href="./../../" class="brand-logo">CARDAWAY-MyAdmin</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li id="nav-li">
                <a href="./../functions/cerrar_session_admin.php">Cerrar Sesion</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <div class="row">
      <div class="col s12">
        <ul class="tabs #e0f7fa cyan lighten-5">
          <li class="tab col s3"><a href="#test1">Usuarios</a></li>
          <li class="tab col s3"><a href="#test2">Postales</a></li>
          <li class="tab col s3"><a href="#test3">Estadisticas</a></li>
          <li class="tab col s3">
            <a href="./../functions/generar_pdf.php" target="_blank "
              >Generar Reporte</a
            >
          </li>
        </ul>
      </div>
    </div>
    <div id="test1" class="col s12">
      <?php 
    include("./../functions/conexion.php");

    $sql = "SELECT * FROM usuarios";
    $res = mysqli_query($conexion,$sql);
    ?>

      <div class="container">
        <br /><br /><br />
        <form class="center">
          <a
            button
            class="waves-effect btn-large modal-trigger #1565c0 blue darken-3"
            href="#modal1"
            >Eliminar Usuario</a
          >
        </form>
        <br />

        <div class="row">
          <div class="col s12 center">
            <table class="striped" id="mitabla">
              <thead>
                <tr>
                  <th class="card-panel #80deea cyan lighten-3">Nombre</th>
                  <th class="card-panel #80deea cyan lighten-3">Correo</th>
                  <th class="card-panel #80deea cyan lighten-3">Nacimiento</th>
                </tr>
              </thead>

              <?php 


                    while($consulta = mysqli_fetch_array($res)){

                                          
  
                ?>

              <tr>
                <td><?php echo $consulta['nombre']?></td>

                <td><?php echo $consulta['correo']?></td>
                <td><?php echo $consulta['fecha_nac']?></td>
              </tr>

              <?php }?>
            </table>
          </div>
        </div>
      </div>

      <div id="modal1" class="modal">
        <div class="modal-content">
          <h6>confirmar</h6>
          <br />
          <form id="cambios">
            <div class="row">
              <div class="input-field col s6">
                <i class="fas fa-envelope prefix"></i>
                <input
                  type="text"
                  id="correo"
                  name="email"
                  data-validetta="required"
                />
                <label for="usuario">Email</label>
              </div>

              <div class="col">
                <div class="modal-footer">
                  <button class="btn #80deea cyan lighten-3" type="submit">
                    Eliminar
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="test2" class="col s12">
      <div class="container">
        <form  id="form_postal" enctype="multipart/form-data">
          <div class="row">
            <div class="file-field input-field col s6">
              <div class="btn">
                <span>Agregar Postal</span>
                <input type="file" name="uploadedFile" id="uploadedFile" />
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" />
              </div>
            </div>
            <div class="input-field col s6">
              <select>
                <option value="Amor">Amor</option>
                <option value="Fechas_fest">Fechas Festivas</option>
                <option value="Paisajes">Paisajes</option>
                <option value="Comida">Comida</option>
                <option value="Vintage">Vintage</option>
                <option value="Otros">Otros</option>
              </select>
              <label>Categoria</label>
            </div>
          </div>
          <div class="row">
            <div class="col s6">
              <button type="submit" name="action" class="btn">
                Guardar Cambios
              </button>
            </div>
            <a class="right"
              >*Formatos Aceptados:(gif,jpg,png) 
            </a>
          </div>
        </form>

        <form class="center">
          <a
            button
            class="waves-effect btn-large modal-trigger #1565c0 blue darken-3"
            href="#modal2"
            >Eliminar postal</a
          >
        </form>
        <br />
        <!-- aqui va conexion-->
        <?php 
            $sql2 = "SELECT *FROM postales";
            $res2 = mysqli_query($conexion,$sql2);

            ?>
        <div class="row">
          <div class="col s12">
            <table class="striped">
              <thead>
                <tr>
                  <th class="card-panel #80deea cyan lighten-3">Id</th>
                  <th class="card-panel #80deea cyan lighten-3">postal</th>
                </tr>
              </thead>

              <?php 
                  
                  while($img = mysqli_fetch_array($res2)){
                
                 ?>

              <tr>
                <td><?php echo $img['id_postal'] ?></td>
                <td><?php echo $img['img']?></td>
              </tr>
              <?php }?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div id="modal2" class="modal">
      <div class="modal-content">
        <h6>Confirmacion</h6>

        <form id="imagenes">
          <div class="row">
            <div class="input-field col s5">
              <i class="far fa-images prefix"></i>
              <input
                type="text"
                id="imagen"
                name="imagen"
                data-validetta="required"
              />
              <label for="imagen">nombre-imagen</label>
            </div>

            <div class="col">
              <div class="modal-footer">
                <button class="btn #80deea cyan lighten-3" type="submit">
                  Eliminar
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-------------------------------------------------------------->

    <div id="test3" class="col s12">
      <form class="center-align">
        <a
          button
          class="btn-large #1565c0 blue darken-3"
          href="../functions/grafica_categorias_mas_gustadas.php"
          target="_blank"
          >Categorias mas gustadas</a
        >
        <a
          button
          class="btn-large #1565c0 blue darken-3"
          href="../functions/grafica_envios_semanales.php"
          target="_blank"
          >Envios semanales</a
        >
        <a
          button
          class="btn-large #1565c0 blue darken-3"
          href="../functions/grafica_generos.php"
          target="_blank"
          >Genero</a
        >
        <a
          button
          class="btn-large #1565c0 blue darken-3"
          href="../functions/grafica_postales_mas_gustadas.php"
          target="_blank"
          >Postales mas gustadas</a
        >
      </form>
    </div>
  </body>

  <script>
    $(document).ready(function() {
      $(".modal").modal();
      $(".tabs").tabs();
    });
  </script>
</html>
