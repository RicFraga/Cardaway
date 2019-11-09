<?php


session_start();

if(isset($_SESSION["usuario"])){
       // echo "Exclusivo ALUMNOS";
        //echo "<br>";
        header("location:./../../Cardaway/user_Page.html");
        
    }
else{
        header("location:./../../inicio.html");
    }
    









?>