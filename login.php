<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #A5F7F7;
            width: 100%;
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

        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }

        .form .register-form {
            display: none;
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

        .titulo {
            max-height: 30%;
            max-width: 40%;
            position: absolute;
            left: 45%;

        }

        .titulo h1 {
            max-height: 20%;
            max-width: 100%;
            position: relative;
        }
    </style>
</head>

<body>
    <div class="titulo">
        <h1>Hospital</h1>
    </div>
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="POST" action="login.php">
                <input type="text" placeholder="usuario" name="usuario" />
                <input type="password" placeholder="contraseña" name="password" />
                <button name="log">login</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
include('conexion.php');

if (isset($_POST['log'])) {
    session_start();

    $usuario = htmlspecialchars($_POST['usuario']);
    $sha1_usuario = sha1($usuario);

    if ($sha1_usuario != "") {
        $password = htmlspecialchars($_POST['password']);
        $sha1_password = sha1($password);
        if ($sha1_password != "") {
            $sql = "select id_doctor, tipo_usuario from doctores where usuario = '$sha1_usuario' AND contrasena ='$sha1_password'";
            $stid = oci_parse($conexion, $sql);
            oci_execute($stid);
            $row = oci_fetch_array($stid, OCI_ASSOC);



            if ($row) {
                $_SESSION['ID_DOCTOR'] = $row['ID_DOCTOR'];
                $_SESSION['TIPO_USUARIO'] = $row['TIPO_USUARIO'];
                if ($_SESSION['TIPO_USUARIO'] == 'doctor') {
                    header("location: indexdoc.php");
                } else if ($_SESSION['TIPO_USUARIO'] == 'admin') {
                    header("location: indexadm.php");
                }
            } else {
                $sql = "select id_paciente, tipo_usuario from pacientes where usuario = '$sha1_usuario' AND contrasena ='$sha1_password'";
                $stid = oci_parse($conexion, $sql);
                oci_execute($stid);
                $row = oci_fetch_array($stid, OCI_ASSOC);
                if ($row) {
                    $_SESSION['ID_PACIENTE'] = $row['ID_PACIENTE'];
                    $_SESSION['TIPO_USUARIO'] = $row['TIPO_USUARIO'];
                    if ($_SESSION['TIPO_USUARIO'] == 'paciente' && $_SESSION['ID_PACIENTE'] > 0) {
                        header("location: indexpac.php");
                    }
                }
            }
        }
    }
}
?>