<?php
     include("./conexion.php");
     include("./get_Posts.php");
     include("./parsers.php");
     session_start();
    # $nombre =$_POST["nombre"];
    #($nombre,$primer_ap,$segundo_ap,$correo,$fechaNa,$genero,$contrasena,$conexion

   $correo_ant=$_SESSION["usuario"];

   
   if(actualizar_usuario($nombre,$primer_ap,$segundo_ap,$email,
   parser($fecha_nac),$group1,$password,$correo_ant,$conexion)){             
     if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
         if(($_FILES["uploadedFile"]["type"] == "image/jpeg")
            || ($_FILES["uploadedFile"]["type"] == "image/png")
            || ($_FILES["uploadedFile"]["type"] == "image/gif")) {
               $my_foto=get_foto($correo_ant,false);
               if($my_foto != "./../../usuarios/default_m.jpg"){
                  unlink($my_foto);
               }
               $fileName = $_FILES['uploadedFile']['name'];
               $fileNameCmps = explode(".", $fileName);
               $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
               $uploadFileDir = './../../usuarios/';
               $fileExtension = strtolower(end($fileNameCmps));
               $dest_path = $uploadFileDir . $email .".".$fileExtension;
               if(move_uploaded_file($fileTmpPath, $dest_path)){
                  $respAX["msj"] = 1;
               }
               else{
                  $respAX["msj"] = -2;
               }
     }
         else{
            $respAX["msj"] =-1 ;
          
         }
      }
      else{
         $respAX["msj"] =1 ;
        
         
      }
   }
   else{
         $respAX["msj"] =0 ;
   }
   //   #registrarUsuario($nombre,$primer_ap,$segundo_ap,"hola3@gmail.com",parser($fecha_nac),$group1,"qwery",$conexion);
     
   
     echo json_encode($respAX);
?>