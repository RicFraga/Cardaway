<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>
    <script src="./../../js/jquery-3.4.1.min.js"></script>
    <script src="./../../js/materialize.min.js"></script>

    <link href="./../../fonts/fonts.css" rel="stylesheet" />
    <link rel="stylesheet" href="./../../css/materialize.min.css">
    <link rel="stylesheet" href="./../../css/style.css" />
    <link rel="stylesheet" href="./../../css/user_style.css">


    <style>

.tabs .tab a{
font-weight: 800; 
color: black; /cambiamos el color de la letra/
}
ul.tabs div.indicator{
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
        
            <li id="nav-li"><a href="./../functions/cerrar_session.php">Cerrar Sesión</a></li>
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
        <li class="tab col s3"><a href="#test4">Generar Reporte</a></li>
  
      </ul>
    </div>
    <div id="test1" class="col s12">

    <?php 
    include("./../functions/conexion.php");

    $sql = "SELECT * FROM usuarios";
    $res = mysqli_query($conexion,$sql);
    ?>

    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col s12 center">
                <table class="centered highlight">

                <thead>

                    <tr>
                        <th class="card-panel #80deea cyan lighten-3">Nombre</th>     
                        <th class="card-panel #80deea cyan lighten-3">Correo</th>
                        <th class="card-panel #80deea cyan lighten-3">Nacimiento</th>    
                        <th class="card-panel #80deea cyan lighten-3">Editar</th>  
                        <th class="card-panel #80deea cyan lighten-3">Eliminar</th>                
                    </tr>

                </thead>

                <?php 

                    while($consulta = mysqli_fetch_array($res)){
                
                
                ?>

                <tr>
                    <td><?php echo $consulta['nombre'] ?></td>
                    <td><?php echo $consulta['correo'] ?></td>
                    <td><?php echo $consulta['fecha_nac'] ?></td>
                    <td><a href ="#">Editar</a></td>
                    <td><a href ="#">Eliminar</a></td>
                </tr>

                <?php }?>
        
                </table>
            </div>
        </div>
    
    
    
    
    </div>
    
    </div>


    <div id="test2" class="col s12">
        <br>
        <br>    
        <div class="container">

            <div class="row">
            
                <div class="col s12 center">

                    <form id="imag">

                    <input  class ="btn" type="file" name="file">
                    
                    <input class ="btn waves-effect waves-light" type="submit" value="subir"></button>

                    </form>
             
                </div>
            </div>
            <!-- aqui va conexion-->
            <?php 
            $sql2 = "SELECT *FROM postales";
            $res2 = mysqli_query($conexion,$sql2);

            ?>
            <div class="row">
              <div class="col s12">

                 <table class="centered highlight">

                 <thead>
                   <tr>
                    <th>Imagen</th>
                    <th>Eliminar</th>

                   </tr>

                    
                    
                 </thead>
                   
                

                 <?php 
                  
                  while($img = mysqli_fetch_array($res2)){
                
                 ?>

                <tr>
                    <td><?php echo $img['img'] ?></td>
                    <td><a href ="#">Eliminar</a></td>
                </tr>
                  <?php }?>

                  </table>
              </div>
            
            </div>



            
            
        </div>
        
    
    
    </div>

    
    
    
    </div>


    <div id="test3" class="col s12">HDSPTM ESTOY MAMADISIMO</div>

    <div id="test4" class="col s12">HDSPTM ESTOY MAMADISIMO x2</div>
  </div>
        
    
</body>

<script>

$(document).ready(function(){
    $('.tabs').tabs();
  })
</script>


</html>