<?php
include_once('config.php');

//crear sessiones 
//session_start();

//creando objeto de conexion a base de datos
$link = new mysqli(host, user, password, database);

if (mysqli_connect_errno()) {
    # code...
    //echo (mysqli_connect_errno() . "-" . mysqli_connect_error());
    $_SESSION['mensajeTexto']= "El sistema esta en mantenimiento, intente mas tarde";
    $_SESSION['mensajeTipo']= "is-info"; //controlar cuando querian controlar una accion
} else {
    # code...
    mysqli_set_charset($link, "UTF-8");
    //echo ("Conexion a base de datos exitosa");
}