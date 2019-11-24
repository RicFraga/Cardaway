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
        <script src="../../js/jquery-3.4.1.js"></script>
        <script src="../../js/script.js"></script>
        
    </head>
    <body>

        <div id="barraMenu">
            <ul class="nav">
                <li><a href="./../../index.php">Inicio</a></li>
                <li><a href="">Mi cuenta</a></li>
                <li><a href="">Postales</a>
                    <ul class="post">
                        <li><a href="">Recividas</a></li>
                        <li><a href="">Enviadas</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <sect'ion class="formWrap">
            <section class="contactInfo">
                <section class="infoTitle">
                    <span class="fa fa-user-circle"></span>
                    <h2>Información<br>de contacto</h2>
                </section>
                <section class="infoItems">
                    <p><span class="fa fa-envelope"></span>investment.cto@gmail.com</p>
                    <p><span class="fa fa-mobile"></span>5617355774</p>
                </section>
            </section>
            <form method="post" class="formContact">
                <h2>Envia un mensaje</h2>
                <div class="userInfo">  
                    <label for="names">Asunto*</label>
                    <input type="text" placeholder="Asunto" id="name" name="subject" required>

                    <label for="eMail">Correo*</label>
                    <input type="email" placeholder="correo@destino.com" id="eMail" name="recipent_email" required>

                    <label for="Msj">Mensaje*</label>
                    <textarea id="Msj" name="msj" required></textarea>

                    <label for="foto">Foto:</label>
                    <input type="file" id="foto" name="foto">

                   <input type="submit" value="Enviar mensaje" id="btnSend" name="send">
                    <?php
                        if (isset($_POST['send'])){
                            include("./../functions/sendemail.php");//Mando a llamar la funcion que se encarga de enviar el correo electronico
                            
                            /*Configuracion de variables para enviar el correo*/
                            $mail_username="investment.cto@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
                            $mail_userpassword="Darkamex1998*&";//Tu contraseña de gmail
                            $template="./../functions/email_template.php";//Ruta de la plantilla HTML para enviar nuestro mensaje
                            
                            /*Inicio captura de datos enviados por $_POST para enviar el correo */
                            $mail_setFromEmail="investment.cto@gmail.com";
                            $mail_addAddress=$_POST['recipent_email'];//correo electronico que recibira el mensaje
                            $mail_setFromName="Luis Aldo";
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