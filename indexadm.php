<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <style>
         * {
            margin: 0;
            padding: 0;
        }

        body {
            background: #A5F7F7;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(right, #A5F7F7, #A5F7F7);
            background: -moz-linear-gradient(right, #A5F7F7, #A5F7F7);
            background: -o-linear-gradient(right, #A5F7F7, #A5F7F7);
            background: linear-gradient(to left, #A5F7F7, #A5F7F7);
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        a {
            text-decoration: none;
            color: #FFFFFF;
            position: relative;
            top: 18px;
            padding: 5px;

        }

        a:hover {
            background-color: #4cc9f0;

        }

        header {
            background-color: #009DAE;
            height: 50px;

        }
        .container {
            background-color: #fff;
            position: relative;
            height: 600px;
            width: 90%;
            margin: auto;
            top: 20px;

        }

        .section,
        h3 {
            color: #2b2d42;
            margin: auto;
            padding: 10px;
            font-size: 30px;
            position: relative;
            left: 10px;

        }

        section,
        img {
            height: 70%;
            width: 90%;
            margin: auto;
            border-radius: 5px;
        }
        .anuncio{
            background-color: #A5F7F7;
            height: 60%;
            width: 90%;
            border: 4px dashed black;
        }
        .container-uro{
            background-color: #fff;
            position: relative;
            height: 600px;
            width: 90%;
            margin: auto;
            top: 20px;
        }
    </style>
</head>
<body>
<header>
        <a href="registrodoct.php">Registrar doctor</a>
        <a href="registropaciente.php">Registrar paciente</a>
        <a href="salir.php">Salir</a>
    </header>


    <div class="container">
        <section class="section">
            
               <img src="https://sonrident.com/wp-content/uploads/2019/11/Promo-Brackets.png" alt="imagen brack">

                <div class="anuncio">
                    <h3>¡Tú eres el creador de tu propia felicidad! Agenda tu cita en la clinica mas cercana e inicia tu tratamiento de Ortodoncia.</h3>
                    <p>Actualmente somos más públicos y visibles que en cualquier época de la historia. Especialmente si nos referimos al mundo digital 
                        ¡Muestra tu mejor sonrisa al mundo y obtén miles de likes! Inicia tu tratamiento de ortodoncia en cualquiera de nuestras sucursales. <br/> Precenta este cupon
                    para obtener un mayor descuento</p>
                </div>
                
            
        </section>
    </div>
    <br>
    <div class="container-uro">
        <section class="section">
            
               <img src="img/urologia.jpg" alt="imagen uro">

                <div class="anuncio">
                    <h3>¡Tú eres el creador de tu propia felicidad! Agenda tu cita en la clinica mas cercana e inicia tu consulta con un especialista.</h3>
                    <p>Actualmente somos más públicos y visibles que en cualquier época de la historia. Especialmente si nos referimos al mundo digital 
                        Manten una buena salud para siempre estar con los que te necesitas <br/> Precenta este cupon
                    para obtener un mayor descuento</p>
                </div>
                
            
        </section>
    </div>
</body>
</html>