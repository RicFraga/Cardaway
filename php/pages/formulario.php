<?php
include "./../functions/parsers.php";
$hoy=getdate();
$hoy_b=$hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"];
?>
<!DOCTYPE html>

<html lang="en">
  <head>
  
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./../../css/materialize.min.css" />

    <link rel="stylesheet" href="./../../css/style.css" />
    <link href="./../../icons/icons.css" rel="stylesheet" />
    <link href="./../../fonts/fonts.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/ed9493b41a.js" crossorigin="anonymous"></script>  
    <script src="./../../js/materialize.min.js"></script>
    <script src ="./../../js/jquery-3.4.1.js"></script>
    <script src="./../../js/formInit.js"></script>
    <script src="./../../js/registrar.js"></script>
      <!--cosas para que funciine sweetAlert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->

    <!--VALIDETTA-->
    <link href="./../../validetta/validetta.css" rel="stylesheet" type="text/css" media="screen">
    <script type="text/javascript" src="./../../validetta/validetta.js"></script>
    <script type="text/javascript" src="./../../validetta/validettaLang-es-ES.js"></script>
   
    <title>Registro</title>
  </head>
  <body>
      <header>
          <nav>
            <div class="nav-wrapper">
              <a href="./../../" class="brand-logo">CARDAWAY</a>
            
            </div>
          </nav>
        </header>
        <main>
    <div class="container myForm">
      <div class="row"></div>
      <div class="row"></div>

        <form class="col s12" id ="formulario"> 
          <div class="row">
            <!-- Campo Nombre -->
            <div class="input-field col s12 l4">
                <i class="fas fa-user-circle prefix"></i>
              <input id="nombre" type="text"  name="nombre"  data-validetta="required" data-validetta="maxLength[10]">
              <label for="nombre">Nombre</label>
            </div>
            <!-- Campo Primer Apellido -->
            <div class="input-field col s12 l4">
              <input id="primer_ap" type="text" name = "primer_ap" data-validetta="required" data-validetta="maxLength[10]">
              <label for="primer_ap">Primer Apellido</label>
            </div>
            <!-- Campo Segundo Apellido -->
            <div class="input-field col s12 l4">
              <input id="segundo_ap" type="text"  name="segundo_ap">
              <label for="nombe">Segundo Apellido*</label>
              <span class="helper-text" >Opcional*</span>
            </div>
          </div>
          <div class="row">
            <!-- Campo Contrasena -->
            <div class="input-field col s12 m6">
              <i class="fas fa-key prefix"></i>
              <input id="password" type="password"  name="contrasena" data-validetta="required"/>
              <label for="password">Contraseña</label>
            </div>
            <!-- Campo Correo -->
            <div class="input-field col s12 m6">
              <i class="fas fa-at prefix"></i>
              <input type ="email" id="correo"  name="correo" data-validetta="required,email"/>
              <label for="email">Correo</label>
            </div>
          </div>
          <div class="row center">
            <!-- Campo Genero -->
            <p>
              Genero:
            </p>

            <div class="col s6">
              <label>
                <input class="with-gap" name="group1" type="radio" value = "1" checked/>
                <span>Hombre</span>
              </label>
            </div>
            <div class="col s6">
              <label>
                <input class="with-gap" name="group1" type="radio" value = "0"/>
                <span>Mujer</span>
              </label>
            </div>
            <div class="row ">
              <div class="row"></div>
              <div class="row"></div>
              <!-- Campo Fecha Nacimiento -->
              <div class="col s12 center">
                Fecha de Nacimiento
                <i class="fas fa-calendar-alt prefix"></i>
                <?php
                echo '<input type="text" class="datepicker" name="date" value="'.anti_parser($hoy_b).'"/>'
                ?>
              </div>
              <div class="row"></div>
              <div class="row"></div>
                <!-- Boton de Envio -->
                <div class="col s12 center">
                  <button
                    class="btn waves-effect waves-light btn-large"
                    type="submit"
                    name="action"
                  >
                    Enviar
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>
 
  </body>
</html>
