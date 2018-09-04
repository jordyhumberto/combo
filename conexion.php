<?php
 $mysqli=new mysqli("localhost","root","","mexico");
 if (mysqli_connect_error()) {
     echo 'conexion fallida : ',mysqli_connect_error();
    exit();
    }
?>