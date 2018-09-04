<?php
require "conexion.php";
$query="SELECT id_estado,estado FROM t_estado";
$resultado=$mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script language="javascript" src="js/jquery-3.3.1.min.js"></script>
    <script language="javascript">
        $(document).ready(function () {
            $("#cbx_estado").change(function () {
                $("#cbx_localidad").find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                $("#cbx_estado option:selected").each(function () {
                    id_estado=$(this).val();
                    $.post("includes/getMunicipio.php",{id_estado: id_estado},function (data) {
                        $("#cbx_municipio").html(data);
                    })
                })
            })
        })
        $(document).ready(function () {
            $("#cbx_municipio").change(function () {
                $("#cbx_municipio option:selected").each(function () {
                    id_municipio=$(this).val();
                    $.post("includes/getLocalidad.php",{id_municipio: id_municipio},function (data) {
                        $("#cbx_localidad").html(data);
                    })
                })
            })
        })
    </script>
</head>
<body>
    <form id="combo" name="combo" action="guardar.php" method="POST">
        <div>selecciona estado: 
            <select name="cbx_estado" id="cbx_estado">
                <option value="">seleccionar estado</option>
                <?php while ($row=$resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                    <option value="<?php echo $row['id_estado'];?>"><?php echo $row['estado'];?></option>
                <?php }?>
            </select> 
        </div>
        <div>selecciona municipio: 
            <select name="cbx_municipio" id="cbx_municipio"></select> 
        </div>
        <div>selecciona localidad: 
            <select name="cbx_localidad" id="cbx_localidad"></select> 
        </div>
    </form>
</body>
</html>