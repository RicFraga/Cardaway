<?php
session_start();
if(!isset($_SESSION["usuario"])){
        header("location:./../../inicio.html");
    }
    ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
  <script src="./../../js/jquery-3.4.1.min.js"></script>
  <script src="./../../js/user_page.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Import Google Icon Font-->
  <link href="./../../icons/icons.css" rel="stylesheet" />
  <!--Import materialize.css-->
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="./../../css/materialize.min.css">

  <link href="./../../fonts/fonts.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="./../../css/style.css" />
  <link rel="stylesheet" href="./../../css/user_style.css">
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems);
    });
  </script>

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
              <a href="#user"><img class="circle" src="https://i.pravatar.cc/500"></a>
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
            <h4 id="user-complete">Nombre Completo</h4>
          </div>
        </div>
        <div class="row">
          <div class="col s1 center-align">
            <i class="material-icons">email</i>
          </div>
          <div class="col s5">
            <p id="user-email">example@gmail.com</p>
          </div>
          <div class="col s1 center-align">
            <i class="fa fa-venus-mars" style="font-size: 25px;"></i>
          </div>
          <div class="col s2">
            <p id="user-gender">Gender</p>
          </div>
          <div class="col s1 center-align">
            <i class="material-icons">cake</i>
          </div>
          <div class="col s2">
            <p id="user-bday">XX/XX/XX</p>
          </div>
        </div>
      </div>
      <div class="tabContent col s12 l9" id="editInfo">
        <div class="myForm2">
        <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s4">
                <input placeholder="NombreUsuario" id="nombre" type="text" >
                <label for="nombre">Nombre</label>
              </div>
              <div class="input-field col s4">
                <input placeholder="ApellidoPatUsuario" id="primer_ap" type="text" >
                <label for="primer_ap">Primer Apellido</label>
              </div>
              <div class="input-field col s4">
                <input placeholder="ApellidoMatUsuario" id="segundo_ap" type="text" >
                <label for="segundo_ap">Segundo Apellido</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input placeholder="example@gmail.com" id="email" type="email"  >
                <label for="email">Email</label>
              </div>
              <div class="col s6">
              <div class="row">
                Genero
              </div>
              <div class="col s6">
                <label>
                  <input class="with-gap" name="group1" type="radio" value = "1" />
                  <span>Hombre</span>
                </label>
              </div>
              <div class="col s6">
                <label>
                  <input class="with-gap" name="group1" type="radio" value = "0"/>
                  <span>Mujer</span>
                </label>
              </div>
            </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input placeholder="*********" id="password" type="password">
                <label for="password">Contraseña</label>
              </div>
            
              <div class="file-field input-field col  s6">
                <div class="btn">
                  <span>Cambiar Foto</span>
                  <input type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
              <div class="col s12">
                  <div class="row center">
                  Fecha de Nacimiento
                  <input type="text" class="datepicker" name="date" value="Lunes 24 de Noviembre"/>
                </div>
                </div>
            </div>
            <button type="submit" class="btn">Guardar Cambios</button>
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