<?php
require "../conexion.php";
$id_estado=$_POST['id_estado'];
$queryM="SELECT id_municipio, municipio FROM t_municipio WHERE id_estado='$id_estado'";
$resultadoM=$mysqli->query($queryM);
?>
<html lang="en">
<head>
    
</head>
<body>
    <option value=''>seleccionar municipio</option>
    <?php while ($rowM=$resultadoM->fetch_array(MYSQLI_ASSOC)) {?>
        <option value="<?php echo $rowM['id_municipio']?>"><?php echo $rowM['municipio']?></option>
    <?php } ?>
</body>
</html>