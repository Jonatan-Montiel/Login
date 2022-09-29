<?php

$usuario=$_POST['usuario'];
$password=$_POST['password'];

session_start();
$_SESSION['usuario']=$usuario;

$con = mysqli_init(); 
mysqli_ssl_set($con,NULL,NULL, "/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL); 
mysqli_real_connect($conn, "udlsqlbd.mysql.database.azure.com", "jonatanmontiel", "b3Ka120114MOMj950930", "bdudl1", 3306, MYSQLI_CLIENT_SSL);


$usuario = mysqli_real_escape_string($conexion, $usuario);
$password = mysqli_real_escape_string($conexion, $password);


$consulta = mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE usuario = ? AND pass = ?");
mysqli_stmt_bind_param($consulta, "ss", $usuario, $password); //ss = string string
mysqli_stmt_execute($consulta);
$resultado = mysqli_stmt_get_result($consulta);


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