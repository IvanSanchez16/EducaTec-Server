<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Educatec</title>
        <style>
            body {
                background-color: #FEECEC;
                font-family: Verdana, sans-serif;
            }
            .cuerpo{
                margin: 15px;
                background-color: #ffffff;
            }
            .carta {
                padding: 20px 50px;
                align-items: center;
            }
            a {
                background-color: #D12727;
                font-family: Verdana, sans-serif;
                color: white;
                display: block;
                width: 215px;
                text-decoration: none;
                height: 45px;
                padding-top: 20px;
                font-size: 17px;
                position: relative;
                text-align: center;
                font-weight: bold;
                line-height: 25px;
                margin: 65px 0 0;
                left: 50%;
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                border-radius: 6px;
            }
            img {
                width: 190px;
                margin-left: 15px;
                margin-top: 15px;
            }
            .footer {
                font-size: 12px;
                padding-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="cuerpo">
            <div class="carta">
                <h2>Buen día {{$user}}</h2>
                <h4>Solicitud para cambio de contraseña</h4>
                <p>Si usted no realizó esta petición ignore este correo, de otra manera presione el botón siguiente para
                    continuar con el proceso.</p>
                <a href="http://localhost:3000/password/token?token={{$token}}&email={{$email}}">Cambiar contraseña</a>
                <div class="footer">
                    <p>Cualquier duda con respecto a nuestro servicio no dude en contactarnos.</p>
                    <p>Buen día por parte del equipo de Educatec.</p>
                </div>
            </div>
        </div>
    </body>
</html>
