<?php
       include("./conexion.php");
       include("./get_Posts.php");
      
      if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        if(($_FILES["uploadedFile"]["type"] == "image/jpeg")
           || ($_FILES["uploadedFile"]["type"] == "image/png")
           || ($_FILES["uploadedFile"]["type"] == "image/gif")) {
             
              $fileName = $_FILES['uploadedFile']['name'];
              $fileNameCmps = explode(".", $fileName);
              $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
              $uploadFileDir = './../../postales/'.$categoria."/";
              $fileExtension = strtolower(end($fileNameCmps));
              $dest_path = $uploadFileDir . $fileName;
              if(!inserta_postal($fileName,$categoria,$conexion)){
                $respAX["msj"]=0;
              }
              else{
              if(move_uploaded_file($fileTmpPath, $dest_path)){
                 $respAX["msj"] = 1;
              }
              else{
                 $respAX["msj"] = -2;
              }
            }
    }
        else{
           $respAX["msj"] =-1 ;
         
        }
     }
     else{
        $respAX["msj"] =-2 ;
    
     }
     echo json_encode($respAX);
?>