<?php

session_start();
include("conexion.php");
$doctor = $_SESSION['ID_DOCTOR'];
$sql = "SELECT  * FROM CITAS WHERE ID_DOCTOR = $doctor";
$unir  = oci_parse($conexion, $sql);
oci_execute($unir);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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

        h2 {
            height: 100px;
            width: 400px;
            margin: auto;
            color: #3d405b;
        }

        table {
            background-color: #bee1e6;
            height: 200px;
            width: 600px;
            margin: auto;
            text-align: center;
            padding: 10px;
            color: #14213d;
        }
    </style>
</head>

<body>
    <header>
        <a href="salir.php">Salir</a>
    </header>
    <h2>Estas son sus citas pendientes</h2>

    <table border=1 style="border-collapse: collapse;">

        <tr>
            <th>Paciente</th>
            <th>Doctor</th>
            <th>Razon</th>
            <th>Fecha</th>
        </tr>
        <?php while ($row = oci_fetch_array($unir, OCI_ASSOC)) { ?>
            <tr>
                <?php echo "<tr>" . "<td>" . $row['ID_PACIENTE'] . "</td>"; ?>
                <?php echo "<td>" . $row['ID_DOCTOR'] . "</td>"; ?>
                <?php echo "<td>" . $row['RAZON'] . "</td>"; ?>
                <?php echo  "<td>" . $row['FECHA'] . "</td>"; ?>

            </tr>
        <?php } ?>
    </table>
</body>

</html>