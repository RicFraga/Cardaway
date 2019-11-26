<?php
  session_start();
?>
<?php
// READ FILES FROM THE GALLERY FOLDER

$category=$_GET["id"];
$dir = __DIR__ . DIRECTORY_SEPARATOR ;
$dir.="Postales".DIRECTORY_SEPARATOR.$category.DIRECTORY_SEPARATOR;
$images = glob($dir . "*.{jpg,jpeg,gif,png}", GLOB_BRACE);
$index=(int)(count($images)/3);

// DRAW HTML ?>
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
        <a href="./" class="brand-logo">CARDAWAY</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          
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

    <?php
      if(isset($_SESSION["usuario"])){
                
      
        echo '<div class="myModal">';
        echo '<div class="myCard">';
        echo '<div class="card-content">';
        echo '<a class="waves-effect waves-light btn center" id="enviar" href="./php/pages/envio.php">Enviar</a>';

        echo '</div>';
        echo '<div class="container" id="modal-container">';
        echo '<img src="" alt="" class="modal-img" id="modal-test">';
        echo '</div>';
        echo '</div>';
        echo '<div class="close">';
        echo '<span id="close">X</span>';
        echo ' </div>';
        echo '</div>';
      }
      else{
        echo '<div class="myModal">';
        echo '<div class="myCard">';
        echo '<div class="container" id="modal-container">';
        echo '<img src="" alt="" class="modal-img" id="modal-test">';
        echo '</div>';
        echo '</div>';
        echo '<div class="close">';
        echo '<span id="close">X</span>';
        echo ' </div>';
        echo '</div>';
        
      }
    ?>
    <!-- [THE GALLERY] -->
    <div class="row">
      <div class="container" id="gal-container">
        <div class="row">
          <div class="col s3">
            <?php 
              printf("<h4>%s</h4>",$category);
            ?>
          </div>
        </div>
        <div class="row">
          <div class="gallery-col col s4">
            <?php
              for($i=0;$i<$index;$i++) {
                printf("<img src='Postales/%s/%s' class='gal-img'>", $category,basename($images[$i]));
              }
            ?>
          </div>
          <div class="gallery-col col s4">
            <?php
              for($i=$i;$i<($index*2);$i++) {
                printf("<img src='Postales/%s/%s' class='gal-img'>", $category,basename($images[$i]));
              }
            ?>
          </div>
          <div class="gallery-col col s4">
            <?php
              for($i=$i;$i<count($images);$i++) {
                printf("<img src='Postales/%s/%s' class='gal-img'>", $category,basename($images[$i]));
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <script src="./js/modal.js"></script>
  </body>
</html>