<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--Import Google Icon Font-->
  <link href="./icons/icons.css" rel="stylesheet" />
  <!--Import materialize.css-->
  
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="./css/materialize.min.css">

  <link href="./fonts/fonts.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/ed9493b41a.js" crossorigin="anonymous"></script>  

  <link rel="stylesheet" href="./css/style.css" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  
  <script src ="./js/jquery-3.4.1.min.js"></script>
  
   <!--cosas para que funciine sweetAlert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

   <!--VALIDETTA-->
   <link href="./validetta/validetta.css" rel="stylesheet" type="text/css" media="screen">
   <script type="text/javascript" src="validetta/validetta.js"></script>
   <script type="text/javascript" src="validetta/validettaLang-es-ES.js"></script>
  
 
  <!--Con jquery $(document).ready no es necesario poner los js hasta abajo , execepto el 
  archivo myslide.js-->

  <script src="./js/materialize.min.js"></script>
  <script src="./js/login.js"></script>
  <script>

    $(document).ready(function(){
  
      $('.modal').modal();

    });
  
  </script>

  

  
</head>

<body>
  

  

  <header>
    <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">CARDAWAY</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a class="btn" id ="postales">Postales</a></li>
          <li><a class="btn">Crear Postal</a></li>
          <?php
          if(!isset($_SESSION["usuario"])){
              echo '<li id="nav-li"><a class ="waves-effect waves-light btn modal-trigger" href="#login">Iniciar Sesion</a></li>';
              echo '<li id="nav-li"><a href="./php/pages/formulario.php"><button class="btn">Crea tu Cuenta</button></a></li>';
  }
          else{
            echo  '<li id="nav-li"><a href="./php/pages/user_page.php">Mi cuenta</a></li>';
            echo  '<li id="nav-li"><a href="./php/functions/cerrar_session.php">Cerrar Sesión</a></li>';
          }
          ?>
          </ul>
      </div>
    </nav>
  </header>




  <!--Login -->


  <div class ="modal" id="login">

      <div class="modal-content center">
        <form id ="datos">

          <div class="input-field">
              <i class="fas fa-envelope prefix"></i>
              <input type="text" id="usuario" name="usuario" data-validetta="email" data-validetta="required">
              <label for="usuario">Email</label>
          </div>
          
          <div class="input-field">
              <i class="fas fa-key prefix"></i>
              <input type="password" id="contrasena" name="contrasena" data-validetta="required">
              <label for="contrasena">Contraseña</label>

          </div>

          <div class="enviar">

            <button class="btn" type="submit">Entrar</button>
          
          </div>



        </form>
      </div>
      
    </div>

  <main>

    <div class="myModal">
      <div class="myCard">
        <div class="card-content">
          <a class="waves-effect waves-light btn">Enviar</a>
          <a class="waves-effect waves-light btn">Editar</a>
        </div>
        <div class="container" id="modal-container">
          <img src="" alt="" class="modal-img" id="modal-test">
        </div>
      </div>
      <div class="close">
        <span id="close">X</span>
      </div>
    </div>

    <div class="row" id="slider-row">
      <div class="divBtn" id="prevBtn"></div>
      <div class="container" id="slides-container">
        <div class="mySlider-slides">
          <img src="./postales/Paisajes/lago_01.jpg" alt="" class="slider-img" id="lastClone">
          <img src="./postales/Paisajes/playa_01.jpg" alt="" class="slider-img">
          <img src="./postales/Paisajes/vias_01.jpg" alt="" class="slider-img">
          <img src="./postales/Comida/limones_01.jpg" alt="" class="slider-img">
          <img src="./postales/Paisajes/vias_02.jpg" alt="" class="slider-img">
          <img src="./postales/Paisajes/lago_01.jpg" alt="" class="slider-img">
          <img src="./postales/Paisajes/playa_01.jpg" alt="" class="slider-img" id="firstClone">
        </div>
      </div>
      <div class="title">
        <p>Destacados:</p>
      </div>
      <div class="divBtn" id="nextBtn"></div>
    </div>

    <div class="row">
      <div class="col s12">
        <h1 class="center-align" id="slogan">Conecta con las personas que amas</h1>
      </div>
    </div>

    <div class="row">
      <div class="container" id="icon-container">
        <div class="icon-div"><a href="" id="icons"><i class="material-icons">favorite_border</i></a></div>
        <div class="icon-div"><a href="" id="icons"><i class="material-icons">date_range</i></a></div>
        <div class="icon-div"><a href="" id="icons"><i class="material-icons">crop_original</i></a></div>
        <div class="icon-div"><a href="" id="icons"><i class="material-icons">local_dining</i></a></div>
        <div class="icon-div"><a href="" id="icons"><i class="material-icons">beach_access</i></a></div>
        <div class="icon-div"><a href="" id="icons"><i class="material-icons">search</i></a></div>
      </div>
    </div>

    <div class="row">
      <div class="container" id="gal-container">
        <div class="row">
          <div class="col s3">
            <h4>Galería</h4>
          </div>
          <div class="input-field col s3 offset-s6">
            <input id="search" type="text" class="validate">
            <label for="search"><i class="material-icons">search</i>Buscar</label>
          </div>
        </div>
        <div class="row">
          <div class="gallery-col col s4">
            <img src="./postales/Paisajes/playa_01.jpg" class="gal-img" alt="" id="test">
            <img src="./postales/Vintage/motoneta_01.jpg" class="gal-img" alt="">
            <img src="./postales/Comida/limones_01.jpg" class="gal-img" alt="">
            <img src="./postales/Paisajes/vias_02.jpg" alt="" class="gal-img">
          </div>
          <div class="gallery-col col s4">
            <img src="./postales/Paisajes/faro_01.jpg" class="gal-img" alt="">
            <img src="./postales/Paisajes/edificios_01.jpg" class="gal-img" alt="">
            <img src="./postales/Vintage/calle_old_01.jpg" class="gal-img" alt="">
            <img src="./postales/Paisajes/vias_01.jpg" class="gal-img" alt="">
          </div>
          <div class="gallery-col col s4">
            <img src="./postales/Comida/pina_01.jpg" class="gal-img" alt="">
            <img src="./postales/Paisajes/lago_01.jpg" class="gal-img" alt="">
            <img src="./postales/Otros/girasol_01.jpg" class="gal-img" alt="">
          </div>
        </div>
      </div>
    </div>

  </main>

  <!--JavaScript at end of body for optimized loading-->
  <!-- Compiled and minified JavaScript -->
  
  <script src="./js/mySlide.js"></script>
  <script src="./js/modal.js"></script>
  
  
</body>



 

</html>