<?php
include("conexion.php");

$sql = "SELECT  * FROM PACIENTES";
$unir  = oci_parse($conexion, $sql);
oci_execute($unir);


?>

<table border="1" style="border-collapse:collapse;">
<thead>
    <th>ID_PACIENTE</th>
    <th>Nombre</th>
    <th>APELLIDO1</th>
    <th>APELLIDO2</th>
    <th>TELEFONO</th>
    <th>CORREO</th>
    <th>OCUPACION</th>
    <th>DOMICILIO</th>
    <th>SEXO</th>
    <th>USUARIO</th>
    <th>CONTRASENA</th>
    <th>TIPO DE USUARIO</th>

</thead>
<tbody>
    <?php while($row = oci_fetch_array($unir, OCI_ASSOC)){?>

    <?php echo "<tr>" . "<td>" . $row['ID_PACIENTE']. "</td>" ; ?>
    <?php echo "<td>" . $row['NOMBRE']. "</td>" ; ?>
    <?php echo  "<td>" . $row['APELLIDO1']. "</td>" ; ?>
    <?php echo  "<td>" . $row['APELLIDO2']. "</td>" ; ?>
    <?php echo  "<td>" . $row['TELEFONO']. "</td>" ; ?>
    <?php echo  "<td>" . $row['CORREO']. "</td>" ; ?>
    <?php echo  "<td>" . $row['OCUPACION']. "</td>" ; ?>
    <?php echo  "<td>" . $row['DOMICILIO']. "</td>" ; ?>
    <?php echo  "<td>" . $row['SEXO']. "</td>" ; ?>
    <?php echo  "<td>" . $row['USUARIO']. "</td>" ; ?>
    <?php echo  "<td>" . $row['CONTRASENA']. "</td>" ; ?>
    <?php echo  "<td>" . $row['TIPO_USUARIO']. "</td>" ; ?>

    <td><input type="submit" value="Borrar"></td></tr>
        

   
<?php

}
?>
</tbody>
</table>