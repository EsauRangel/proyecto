<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar doctor</title>
    <link rel="stylesheet" type="text/css" href="css/formularios.css">
    </link>
</head>

<body>
    <div class="login-page">
        <div class="form">

            <h2>Doctor</h2>
            <form class="register-form" method="POST" action="registrodoct.php">
                <input type="text" placeholder="nombre" id="nombre" name="nombre" />
                <input type="text" placeholder="primer apellido" name="apellido1" />
                <input type="text" placeholder="segundo apellido" name="apellido2" />
                <input type="phone" placeholder="telefono" name="telefono" />
                <input type="email" placeholder="email" name="correo" />
                <input type="text" placeholder="sexo" name="sexo" />
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

                <input type="text" placeholder="usuario" name="usuario" />
                <input type="password" placeholder="password" name="password" />


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

                                                $sql = "insert into doctores (nombre, apellido1, apellido2, telefono, correo, id_hospital, id_especialidad, id_turno, tipo_usuario, usuario, contrasena, id_asistente) values ('$nombre', '$apellido1', '$apellido2', '$telefono', '$correo', '$hospital', '$especialidad', '$turno', '$tipo_usuario', '$usuario', '$contrasena', '$asistente' )";
                                                $stid = oci_parse($conexion, $sql);
                                                $result = oci_execute($stid);
                                                if ($result) {
                                                    echo "Se insertaron los datos";
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