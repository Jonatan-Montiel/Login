<?php

// $usuario=$_POST['usuario'];
// $password=$_POST['password'];

$usuario= 'jonatan';
$password= '120114';

session_start();
$_SESSION['usuario']=$usuario;

$conexion = mysqli_init();
// if (!$conexion) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// mysqli_ssl_set($con,NULL,NULL, "{path to CA cert}", NULL, NULL);
$conn = mysqli_real_connect($conexion, "udlsqlbd.mysql.database.azure.com", "jonatanmontiel@20.118.40.4", "b3Ka12114MOMj950930", "bdudl1", 3306, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
// $conn = mysqli_connect("udlsqlbd.mysql.database.azure.com", "jonatanmontie", "b3Ka12114MOMj95093", "bdudl1");
if (!$conn) {
    die("Conexion fallida2: " . mysqli_connect_error());
}

// $conexion=mysqli_real_connect("udlsqlbd.mysql.database.azure.com", "jonatanmontiel", "b3Ka120114MOMj950930", "bdudl1", 3306, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);


// $query = "SELECT * FROM usuarios";

// $resultado=mysqli_query($conexion, $query);
// echo "Error:";
// mysqli_num_rows($resultado);
// print_r($resultado);
// echo "Query:" .$query;

// $usuario = mysqli_real_escape_string($conexion, $usuario);
// $password = mysqli_real_escape_string($conexion, $password);


$consulta = mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE usuario = ? AND pass = ?");
mysqli_stmt_bind_param($consulta, "ss", $usuario, $password); 
mysqli_stmt_execute($consulta);
$resultado = mysqli_stmt_get_result($consulta);
echo "Error:".$consulta;


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