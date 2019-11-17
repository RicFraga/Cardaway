<?php
    echo "Nombre:".$_FILES["foto"]["name"]."<br>";
    echo "Tipo:".$_FILES["foto"]["type"]."<br>";
    echo "Tama&ntilde;o:".$_FILES["foto"]["size"];
    echo "<br>";
    echo "Nombre temporal:".$_FILES["foto"]["tmp_name"]."<br>";
    echo "Error:".$_FILES["foto"]["error"]."<br>";
   
    $dirFoto = "/opt/lampp/htdocs/Cardaway/images/";
    $archFoto = $dirFoto.basename($_FILES["foto"]["name"]);    

    if(move_uploaded_file($_FILES["foto"]["tmp_name"], $archFoto)){
        echo "Archivo valido, se subio con exito.";
    }else{
        echo "Archivo no permitido.";
    }
?>