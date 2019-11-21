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
            <form action="./../functions/printpdf.php" method="GET" class="formContact">
                <h2>Envia un mensaje</h2>
                <div class="userInfo">  
                    <label for="names">Titulo*</label>
                    <input type="text" id="name" name="nombre" required>

                    <label for="eMail">Correo*</label>
                    <input type="text" id="eMail" name="correo" required>

                    <label for="Msj">Mensaje*</label>
                    <textarea id="Msj" name="msj" required></textarea>

                    <label for="foto">Foto:</label>
                    <input type="file" id="foto" name="foto">

                   <input type="submit" value="Enviar mensaje" id="btnSend" href="./../../index.php">
                </div>
            </form>
        </section>

    </body>
</html>