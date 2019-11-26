<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cardaway-Envio</title>

        <!--Referencias a archivos CSS-->
        <link rel="stylesheet" href="./../../css/styles.css">
        <link rel="stylesheet" href="./../../css/font-awesome.css">
        
        <!--Referencias a archivos JS-->     
        <script src="https://use.fontawesome.com/9aabbc7573.js"></script>
        <script src="../../js/jquery-3.4.1.js"></script>
        <script src="../../js/script.js"></script>
        
    </head>
    <body>  
        <div id="barraMenu">
            <ul class="nav">
                <li><a href="./../../index.php">Inicio</a></li>
                <li><a href="./user_page.php">Mi cuenta</a></li>
            </ul>
        </div>
        <section class="formWrap">
            <section class="contactInfo">
                <section class="infoTitle">
                    <span class="fa fa-user-circle"></span>
                    <h2>Información<br>de contacto</h2>
                </section>
                <section class="infoItems">
                    <p><span class="fa fa-envelope"></span>Cardaway</p>
                </section>
            </section>
            <form method="post" class="formContact">
                <h2>Envia una postal</h2>
                <div class="userInfo">  
                    <label for="names">Asunto*</label>
                    <input type="text" placeholder="Asunto" id="name" name="subject" required>

                    <label for="eMail">Correo*</label>
                    <input type="email" placeholder="correo@destino.com" id="eMail" name="recipent_email" required>

                    <label for="Msj">Mensaje*</label>
                    <textarea id="Msj" name="msj" required></textarea>

                    <label for="postal">La imagen seleccionada se cargara de forma automatica.</label>

                   <input type="submit" value="Enviar mensaje" id="btnSend" name="send">
                    <?php
                        if (isset($_POST['send'])){
                            include("./../functions/sendemail.php");//Mando a llamar la funcion que se encarga de enviar el correo electronico
                            
                            /*Configuracion de variables para enviar el correo*/
                            $mail_username="cardaway.send@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
                            $mail_userpassword="Darkamex1998*&";//Tu contraseña de gmail
                            $template="./../functions/email_template.php";//Ruta de la plantilla HTML para enviar nuestro mensaje
                            
                            /*Inicio captura de datos enviados por $_POST para enviar el correo */
                            $mail_setFromEmail="cardaway.send@gmail.com";
                            $mail_addAddress=$_POST['recipent_email'];//correo electronico que recibira el mensaje
                            $mail_setFromName=$_POST['subject'];
                            $txt_message=$_POST['msj'];
                            $mail_subject=$_POST['subject'];
                            
                            sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje
                        }
                    ?>
                </div>
            </form>
        </section>

    </body>
</html>