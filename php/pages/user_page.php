<?php
session_start();
if(!isset($_SESSION["usuario"])){
        header("location:./../../index.php");
    }
    else{
    include "./../functions/conexion.php";
    include "./../functions/parsers.php";
    $arr=get_datos($conexion);
    $correo=$arr[0];
    $nombre=$arr[1];
    $primer_ap=$arr[2];
    $segundo_ap=$arr[3];
    $fecha_nac=$arr[4];
    $genero=$arr[5];
    $foto=$arr[6];
    }
    ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
  <script src="./../../js/jquery-3.4.1.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Import Google Icon Font-->
  <link href="./../../icons/icons.css" rel="stylesheet" />
  <!--Import materialize.css-->
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="./../../css/materialize.min.css">

  <link href="./../../fonts/fonts.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>



  <script src=""></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="./../../css/style.css" />
  <link rel="stylesheet" href="./../../css/user_style.css">
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems);
    });
  </script>
    <link href="./../../validetta/validetta.css" rel="stylesheet" type="text/css" media="screen">
    <script type="text/javascript" src="./../../validetta/validetta.js"></script>
    <script type="text/javascript" src="./../../validetta/validettaLang-es-ES.js"></script>
    <script src="./../../js/actual_info.js"></script>
  <title>Usuario</title>
</head>

<body>

  <header>
    <div class="row navbar-fixed">
      <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo">CARDAWAY</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="btn">Postales</a></li>
            <li><a class="btn">Crear Postal</a></li>
            <li id="nav-li"><a href="#">Cerrar Sesión</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <main>
    <div class="row">
      <div class="col s3">
        <ul id="slide-out" class="sidenav sidenav-fixed">
          <li>
            <div class="user-view">
            <?php
              echo "<a href='#user'><img class='circle' src='".$foto."'></a>";
              ?>
            </div>
          </li>
          <button class="tablink" onclick="openTab(event,'info')">Tú Información</button>
          <button class="tablink" onclick="openTab(event,'editInfo')">Editar Información</button>
          <button class="tablink" onclick="openTab(event,'sent')">Postales Enviadas</button>
          <button class="tablink" onclick="openTab(event,'reci')">Postales Recibidas</button>
        </ul>
        <a href=" #" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      </div>

      <div class="tabContent col s12 l9" id="info">
        <div class="row">
          <div class="col s12">
          <?php
             echo "<h4 id='user-complete'>$nombre $primer_ap $segundo_ap</h4>";
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col s1 center-align">
            <i class="material-icons">email</i>
          </div>
          <div class="col s5">
          <?php
             echo "<p id='user-email'>$correo</p>";
            ?>
            
          </div>
          <div class="col s1 center-align">
            <i class="fa fa-venus-mars" style="font-size: 25px;"></i>
          </div>
          <div class="col s2">
            <?php
            echo "<p id='user-gender'>".genero($genero)."</p>";
            ?>
          </div>
          <div class="col s1 center-align">
            <i class="material-icons">cake</i>
          </div>
          <div class="col s2">
            <?php
            echo "<p id='user-bday'>".cumple($fecha_nac)."</p>";
            ?>
          </div>
        </div>
      </div>
      <div class="tabContent col s12 l9" id="editInfo">
        <div class="myForm2">
        <div class="row">
          <form class="col s12" id="formulario" enctype="multipart/form-data" >
            <div class="row">
              <div class="input-field col s4">
              <?php
                echo '<input value="'.$nombre.'" name="nombre" id="nombre" type="text" data-validetta="required" data-validetta="maxLength[10]" >';
                ?>
                <label for="nombre">Nombre</label>
              </div>
              <div class="input-field col s4">
              <?php
                echo '<input value="'.$primer_ap.'"name="primer_ap" id="primer_ap" type="text" data-validetta="required" data-validetta="maxLength[10]" >';
               ?>
                <label for="primer_ap">Primer Apellido</label>
              </div>
              <div class="input-field col s4">
              <?php
                echo '<input value="'.$segundo_ap.'"name="segundo_ap" id="segundo_ap" type="text" >';
                ?>
                <label for="segundo_ap">Segundo Apellido</label>
              </div>
            </div>
            <div class="row">
            <div class="col s6">
              <label >Contraseña</label>
                <input placeholder="" value="" id="password" name="password" type="password">
                
              </div>
              <div class="col s6">
              <div class="row">
                Genero
              </div>
              <div class="col s6">
                <label>
                  
                  <input class="with-gap" name="group1" type="radio" value = "1" checked/>
                  <span>Hombre</span>
                </label>
              </div>
              <div class="col s6">
                <label>
                <?php
                if(!$genero){
                  echo '<input class="with-gap" name="group1" type="radio" value = "0" checked/>';
                }
                else{
                  echo '<input class="with-gap" name="group1" type="radio" value = "0" />';
                }
                  ?>
                  <span>Mujer</span>
                </label>
              </div>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s6">
              <?php
                echo "<input value='".$correo."'name='email' id='email' type='email' data-validetta='email' >";
                ?>
                <label for="email">Email</label>
              </div>
              <div class="file-field input-field col  s6">
                <div class="btn">
                  <span>Cambiar Foto</span>
                  <input type="file" name="uploadedFile" id="uploadedFile">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
              <div class="col s12">
                  <div class="row center">
                  Fecha de Nacimiento
                  <?php
                  echo '<input type="text" id="fecha_nac" class="datepicker" name="fecha_nac" value="'.anti_parser($fecha_nac).'"/>';
                  ?>
                </div>
                </div>
            </div>
            <button  type="submit" name="action" class="btn">Guardar Cambios</button>
          </form>
        </div>
      </div>
      </div>
      <div class="tabContent col s12 l9" id="sent">
        <table class="highlight">
          <thead>
            <tr>
              <th>Postal</th>
              <th>Destinatario</th>
              <th>Fecha</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td><img src="./../../postales/Comida/limones_01.jpg" class="thumbnail"></td>
              <td>example@gmail.com</td>
              <td>XX/XX/XXXX</td>
            </tr>
            <tr>
              <td><img src="./../../postales/Comida/pina_01.jpg" alt="" class="thumbnail"></td>
              <td>example@gmail.com</td>
              <td>XX/XX/XXXX</td>
            </tr>
            <tr>
              <td><img src="./../../postales/Paisajes/faro_01.jpg" alt="" class="thumbnail"></td>
              <td>example@gmail.com</td>
              <td>XX/XX/XXXX</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="tabContent col s12 l9" id="reci">
        <table class="highlight">
          <thead>
            <tr>
              <th>Postal</th>
              <th>Remitente</th>
              <th>Fecha</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><img src="./../../postales/Comida/starbucks_01.jpg" class="thumbnail"></td>
              <td>example@gmail.com</td>
              <td>XX/XX/XXXX</td>
            </tr>
            <tr>
              <td><img src="./../../postales/Otros/el_bromas_01.jpg" alt="" class="thumbnail"></td>
              <td>example@gmail.com</td>
              <td>XX/XX/XXXX</td>
            </tr>
            <tr>
              <td><img src="./../../postales/Fechas_fest/navidad_01.jpg" alt="" class="thumbnail"></td>
              <td>example@gmail.com</td>
              <td>XX/XX/XXXX</td>
            </tr>
            <tr>
              <td><img src="./../../postales/Fechas_fest/navidad_01.jpg" alt="" class="thumbnail"></td>
              <td>example@gmail.com</td>
              <td>XX/XX/XXXX</td>
            </tr>
            <tr>
              <td><img src="./../../postales/Fechas_fest/navidad_01.jpg" alt="" class="thumbnail"></td>
              <td>example@gmail.com</td>
              <td>XX/XX/XXXX</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!--JavaScript at end of body for optimized loading-->
  <!-- Compiled and minified JavaScript -->
  <script src="./../../js/materialize.min.js"></script>
  <script src="./../../js/tabs.js"></script>
  <script src="./../../js/formInit.js"></script>

  
 
</body>

</html>