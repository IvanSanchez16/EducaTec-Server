<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Montserrat', sans-serif;
        }
        .container{
            background-color: #fff;
            border-radius: 4px;
            text-align: center;
        }

        h2{
            font-size: 30px;
            color: #8a40a9;
        }
        p{
            color: #666;
        }

        .buttons{
            margin-top: 40px;
        }

        .btn_confirmacion{
            text-decoration: none;
            font-weight: bold;
            color: #fff;
            background-color: #8a40a9;
            border-radius: 5px;
            padding: 15px 25px;
            transition: 0.4s;
        }

        .btn_confirmacion:hover{
            background-color: #632d7b;
            transform: scale(1.1);
        }
    </style>
    <title>Confirmar correo</title>
</head>

<body>
<section>
    <div class="container">
        <div class="intro">
            <h2 class="">Confirma tu correo electrónico</h2>
            <p class="">Gracias por registrarte en Educatec.</p>
            <p class="">Para confirmar tu correo electrónico, haz click en el siguiente botón:&nbsp;</p>
        </div>
        <div class="buttons"><a class="btn_confirmacion" role="button" href="{{$url}}">CONFIRMAR MI CUENTA →</a></div>
    </div>
</section>
</body>
</html>
