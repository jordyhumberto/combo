<?php
require "../conexion.php";
$id_municipio=$_POST['id_municipio'];
$queryL="SELECT id_localidad, localidad FROM t_localidad WHERE id_municipio='$id_municipio'";
$resultadoL=$mysqli->query($queryL);
?>
<html lang="en">
<head>
    
</head>
<body>
    <option value=''>seleccionar localidad</option>
    <?php while ($rowL=$resultadoL->fetch_array(MYSQLI_ASSOC)) {?>
        <option value="<?php echo $rowL['id_localidad']?>"><?php echo $rowL['localidad']?></option>
    <?php } ?>
</body>
</html>