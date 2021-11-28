<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar paciente</title>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    * {
      padding: 0;
      margin: 0;
    }

    .login-page {
      width: 900px;
      padding: 8% 0 0;
      margin: auto;
    }

    .form {
      position: relative;
      z-index: 1;
      background: #FFFFFF;
      max-width: 560px;
      margin: 0 auto 100px;
      padding: 45px;
      text-align: center;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form input {
      font-family: "Roboto", sans-serif;
      outline: 0;
      background: #f2f2f2;
      height: 40%;
      border: 0;
      margin: 0 5px 15px;
      padding: 15px;



    }

    .form button {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: #A5F7F7;
      width: 70%;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
      -webkit-transition: all 0.3 ease;
      transition: all 0.3 ease;
      cursor: pointer;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
      background: #009DAE;
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
  </style>



</head>

<body>
  <header>
    <a href="indexadm.php">Inicio</a>
    <a href="registrodoct.php">Registrar doctor</a>
    <a href="salir.php">Salir</a>
  </header>

  <div class="login-page">
    <div class="form">

      <h2>Paciente</h2>
      <form class="register-form" method="POST" action="registropaciente.php">
        <input type="text" placeholder="nombre" id="nombre" name="nombre" />
        <input type="text" placeholder="primer apellido" name="apellido1" />
        <input type="text" placeholder="segundo apellido" name="apellido2" />
        <input type="phone" placeholder="telefono" name="telefono" />
        <input type="email" placeholder="email" name="correo" />
        <input type="text" placeholder="domicilio" name="domicilio" />
        <input type="text" placeholder="ocupacion" name="ocupacion" />
        <input type="text" placeholder="sexo" name="sexo" />
        <input type="text" placeholder="usuario" name="usuario" />
        <input type="password" placeholder="password" name="password" />
        <button name="enviarpaciente" id="enviarpaciente">Registrar</button>
      </form>
    </div>
  </div>
</body>

</html>

<?php
include("conexion.php");
if (isset($_POST['enviarpaciente'])) {
  $nombre = htmlspecialchars($_POST['nombre']);
  if ($nombre != "") {
    $apellido1 = htmlspecialchars($_POST['apellido1']);
    if ($apellido1 != "") {
      $apellido2 = htmlspecialchars($_POST['apellido2']);
      if ($apellido2 != "") {
        $telefono = htmlspecialchars($_POST['telefono']);
        if ($telefono != "") {
          $correo = htmlspecialchars($_POST['correo']);
          if ($correo != "") {
            $domicilio = htmlspecialchars($_POST['domicilio']);
            if ($domicilio != "") {
              $ocupacion = htmlspecialchars($_POST['ocupacion']);
              if ($ocupacion != "") {
                $sexo = htmlspecialchars($_POST['sexo']);
                if ($sexo != "") {
                  $usuario = sha1($_POST['usuario']);
                  if ($usuario != "") {
                    $contrasena = sha1($_POST['password']);
                    if ($contrasena != "") {
                      $tipo_usuario = "paciente";
                      $sql = "insert into pacientes (nombre, apellido1, apellido2, telefono, correo, domicilio, ocupacion, sexo, usuario, contrasena, tipo_usuario) values ('$nombre', '$apellido1', '$apellido2', '$telefono', '$correo', '$domicilio', '$ocupacion', '$sexo', '$usuario', '$contrasena', '$tipo_usuario')";
                      $stid = oci_parse($conexion, $sql);
                      $result = oci_execute($stid);
                      if ($result) {
                        echo "Se insertaron los datos";
                      }
                    } else {
                      echo "<script type='text/javascript'> alert('Rellene la contrasena del paciente...'); </script>";
                    }
                  } else {
                    echo "<script type='text/javascript'> alert('Rellene el usuario del paciente...'); </script>";
                  }
                } else {
                  echo "<script type='text/javascript'> alert('Rellene el sexo del paciente...'); </script>";
                }
              } else {
                echo "<script type='text/javascript'> alert('Rellene la ocupacion del paciente...'); </script>";
              }
            } else {
              echo "<script type='text/javascript'> alert('Rellene el domicilio del paciente...'); </script>";
            }
          } else {
            echo "<script type='text/javascript'> alert('Rellene el correo del doctor...'); </script>";
          }
        } else {
          echo "<script type='text/javascript'> alert('Rellene el telefono del paciente...'); </script>";
        }
      } else {
        echo "<script type='text/javascript'> alert('Rellene el segundo apellido del paciente...'); </script>";
      }
    } else {
      echo "<script type='text/javascript'> alert('Rellene el primer apellido del paciente...'); </script>";
    }
  } else {
    echo "<script type='text/javascript'> alert('Rellene el nombre del paciente...'); </script>";
  }
}
?>