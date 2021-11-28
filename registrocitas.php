<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" type="text/css" href="css/formularios.css">

</head>

<body>


    <div class="login-page">
        <div class="form">

            <h2>Citas</h2>
            <form class="register-form" method="POST" action="registrocitas.php">
                <select name="paciente" id="paciente">
                    <option value="">Paciente</option>
                    <?php

                    include("conexion.php");

                    $sql = "SELECT  * FROM PACIENTES";
                    $unir  = oci_parse($conexion, $sql);
                    oci_execute($unir);
                    while ($row = oci_fetch_array($unir, OCI_ASSOC)) {
                        if ($row['NOMBRE'] == "") {
                            continue;
                        } ?>
                        <option value="<?php echo $row['ID_PACIENTE'] ?>"><?php echo $row['NOMBRE'] . " " . $row['APELLIDO1'] . " " . $row['APELLIDO2'] ?> </option>
                    <?php
                    }
                    ?>
                </select>
                <select name="doctor" id="doctor">
                    <option value="">Doctor</option>
                    <?php

                    include("conexion.php");

                    $sql = "SELECT  * FROM DOCTORES";
                    $unir  = oci_parse($conexion, $sql);
                    oci_execute($unir);
                    while ($row = oci_fetch_array($unir, OCI_ASSOC)) {
                        if ($row['NOMBRE'] == "") {
                            continue;
                        } ?>
                        <option value="<?php echo $row['ID_DOCTOR'] ?>"><?php echo $row['NOMBRE'] . " " . $row['APELLIDO1'] . " " . $row['APELLIDO2'] ?> </option>
                    <?php
                    }
                    ?>
                </select>


                <input type="date" placeholder="Fecha" id="fecha" name="fecha" />

                <input type="textarea" placeholder="Motivo" name="motivo" id="motivo">
                <button name="enviarcita" id="enviarcita">Registrar Cita</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
include('conexion.php');
if (isset($_POST['enviarcita'])) {
    $idpaciente = htmlspecialchars($_POST['paciente']);
    if ($idpaciente != "") {
        $doctor = htmlspecialchars($_POST['doctor']);
        if ($doctor != "") {
            $fecha = htmlspecialchars($_POST['fecha']);
            if ($fecha != "") {
                $motivo = htmlspecialchars($_POST['motivo']);
                if ($motivo != "") {
                    $sql = "insert into citas (razon, id_paciente, id_doctor, fecha) values ('$motivo', $idpaciente, $doctor, '$fecha')";
                    $stid = oci_parse($conexion, $sql);
                    $result = oci_execute($stid);
                    if (!$result) {
                        echo "Ocurrio un error al insertar los datos";
                    }
                } else {
                }
            } else {
                echo '<script tyoe="text/javascript" > alert("Selecciona una fecha para tu cita...");</script>';
            }
        } else {
            echo '<script tyoe="text/javascript" > alert("Selecciona un doctor existente...");</script>';
        }
    } else {
        echo '<script tyoe="text/javascript" > alert("Selecciona un nombre existente...");</script>';
    }
}
?>