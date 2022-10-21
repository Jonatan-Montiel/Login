<?php

$usuario=$_GET['usuario'];
$password=($_GET['password']);

session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("35.193.109.252","root","b3Ka120114MOMj950930","bdCloud");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and pass='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:galeria.html");
}else{
    ?>
    <?php
    include("index.html");
    ?>
    echo <script> alert("Usuario o contraseña incorrectos"); </script>;
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);