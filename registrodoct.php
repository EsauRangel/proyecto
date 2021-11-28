<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar doctor</title>
    <link rel="stylesheet" type="text/css" href="css/formularios.css">
    </link>
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
    </style>
</head>

<body>
<header>
        <a href="indexadm.php">Inicio</a>
        <a href="registropaciente.php">Registrar paciente</a>
        <a href="salir.php">Salir</a>
    </header>

    <div class="login-page">
        <div class="form">

            <h2>Doctor</h2>
            <form class="register-form" method="POST" action="registrodoct.php">
                <input type="text" placeholder="nombre" id="nombre" name="nombre" pattern="[a-zA-Z]{1-20}" />
                <input type="text" placeholder="primer apellido" name="apellido1" pattern="[a-zA-Z]{1-20}" />
                <input type="text" placeholder="segundo apellido" name="apellido2" pattern="[a-zA-Z]{1-20}" />
                <input type="phone" placeholder="telefono" name="telefono" pattern="[a-zA-Z]{1-20}"/>
                <input type="email" placeholder="email" name="correo" pattern="[a-zA-Z]{1-20}"/>
                <input type="text" placeholder="sexo" name="sexo" pattern="[a-zA-Z]{1-20}" />
                <select name="hospital" id="hospital">
                    <option value="">Hospital</option>
                    <?php

                    include("conexion.php");

                    $sql = "SELECT  * FROM HOSPITALES";
                    $unir  = oci_parse($conexion, $sql);
                    oci_execute($unir);
                    while ($row = oci_fetch_array($unir, OCI_ASSOC)) {  ?>
                        <option value="<?php echo $row['ID_HOSPITAL'] ?>"><?php echo $row['NOMBRE_HOSPITAL'] ?></option>
                    <?php
                    }
                    ?>
                </select>

                <select name="especialidad" id="especialidad">
                    <option value="">Especialidad</option>
                    <?php

                    include("conexion.php");

                    $sql = "SELECT  * FROM ESPECIALIDADES";
                    $unir  = oci_parse($conexion, $sql);
                    oci_execute($unir);
                    while ($row = oci_fetch_array($unir, OCI_ASSOC)) {  ?>
                        <option value="<?php echo $row['ID_ESPECIALIDAD'] ?>"><?php echo $row['ESPECIALIDAD'] ?></option>
                    <?php
                    }
                    ?>
                </select>

                <select name="turno" id="truno">
                    <option value="">Turno</option>
                    <?php

                    include("conexion.php");

                    $sql = "SELECT  * FROM TURNOS";
                    $unir  = oci_parse($conexion, $sql);
                    oci_execute($unir);
                    while ($row = oci_fetch_array($unir, OCI_ASSOC)) {  ?>
                        <option value="<?php echo $row['ID_TURNO'] ?>"><?php echo $row['TURNO'] ?></option>
                    <?php
                    }
                    ?>

                </select>

                <input type="text" placeholder="usuario" name="usuario" pattern="[a-zA-Z]{1-20}"/>
                <input type="password" placeholder="password" name="password" pattern="[a-zA-Z]{1-20}" />


                <button name="enviardoctor" id="enviardoctor">Registrar</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['enviardoctor'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    if ($nombre != "") {
        $apellido1  = htmlspecialchars($_POST['apellido1']);
        if ($apellido1 != "") {
            $apellido2  = htmlspecialchars($_POST['apellido2']);
            if ($apellido2 != "") {
                $telefono  = htmlspecialchars($_POST['telefono']);
                if ($telefono != "") {
                    $correo  = htmlspecialchars($_POST['correo']);
                    if ($correo != "") {
                        $sexo  = htmlspecialchars($_POST['sexo']);
                        if ($sexo != "") {
                            $hospital  = htmlspecialchars($_POST['hospital']);
                            if ($hospital != "") {
                                $especialidad  = htmlspecialchars($_POST['especialidad']);
                                if ($especialidad != "") {
                                    $turno  = htmlspecialchars($_POST['turno']);
                                    if ($turno != "") {
                                        $usuario  = sha1($_POST['usuario']);
                                        if ($usuario != "") {
                                            $contrasena  = sha1($_POST['password']);
                                            if ($contrasena != "") {
                                                $tipo_usuario = "doctor";

                                                $sql = "insert into doctores (nombre, apellido1, apellido2, telefono, correo, id_hospital, id_especialidad, id_turno, tipo_usuario, usuario, contrasena) values ('$nombre', '$apellido1', '$apellido2', '$telefono', '$correo', '$hospital', '$especialidad', '$turno', '$tipo_usuario', '$usuario', '$contrasena' )";
                                                $stid = oci_parse($conexion, $sql);
                                                $result = oci_execute($stid);
                                                if ($result) {
                                                    
                                                }
                                            } else {
                                                echo "<script type='text/javascript'> alert('Rellene la contrasena del doctor...'); </script>";
                                            }
                                        } else {
                                            echo "<script type='text/javascript'> alert('Rellene el usuario del doctor...'); </script>";
                                        }
                                    } else {
                                        echo "<script type='text/javascript'> alert('Rellene el turno del doctor...'); </script>";
                                    }
                                } else {
                                    echo "<script type='text/javascript'> alert('Rellene la especialidad del doctor...'); </script>";
                                }
                            } else {
                                echo "<script type='text/javascript'> alert('Rellene el hospital del doctor...'); </script>";
                            }
                        } else {
                            echo "<script type='text/javascript'> alert('Rellene el sexo del doctor...'); </script>";
                        }
                    } else {
                        echo "<script type='text/javascript'> alert('Rellene el correo del doctor...'); </script>";
                    }
                } else {
                    echo "<script type='text/javascript'> alert('Rellene el telefono del doctor...'); </script>";
                }
            } else {
                echo "<script type='text/javascript'> alert('Rellene el segundo apellido del doctor...'); </script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('Rellene el primer apellido del doctor...'); </script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Rellene el nombre del doctor...'); </script>";
    }
}

?>