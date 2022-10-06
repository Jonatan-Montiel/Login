<?php

// $usuario=$_POST['usuario'];
// $password=$_POST['password'];

$usuario= 'jonatan';
$password= '120114';

session_start();
$_SESSION['usuario']=$usuario;

$conexion = mysqli_init();
// mysqli_ssl_set($con,NULL,NULL, "{path to CA cert}", NULL, NULL);
mysqli_real_connect($conexion, "udlsqlbd.mysql.database.azure.com", "jonatanmontiel", "b3Ka12114MOMj950930", "bdudl1", 3306, NULL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);

// $conexion=mysqli_real_connect("udlsqlbd.mysql.database.azure.com", "jonatanmontiel", "b3Ka120114MOMj950930", "bdudl1", 3306, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM usuarios";

$resultado=mysqli_query($conexion, $query);
echo "Error:" .mysqli_num_rows($resultado);
echo "Query:" .$query;

// $usuario = mysqli_real_escape_string($conexion, $usuario);
// $password = mysqli_real_escape_string($conexion, $password);


// $consulta = mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE usuario = ? AND pass = ?");
// mysqli_stmt_bind_param($consulta, "ss", $usuario, $password); 
// echo "Error:".$consulta;
// mysqli_stmt_execute($consulta);
// $resultado = mysqli_stmt_get_result($consulta);


// $filas=mysqli_num_rows($resultado);

// if($filas){
//     header("location:galeria.html");
// }else{
//     ?>
//     <?php
//     include("index.html");
//     ?>
//     echo <script> alert("Usuario o contraseña incorrectos"); </script>;
//     <?php
// }

// mysqli_free_result($resultado);
mysqli_close($conexion);