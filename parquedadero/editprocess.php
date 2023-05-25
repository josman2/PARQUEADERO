<?php

print_r($_POST);
if(!isset($_POST["placa"])){
    header("location: index.php?mensaje=error");
}

include "model/database.php";

$varPlaca = $_POST["txtPlaca"];
$varPropietario = $_POST["txtpropietario"];
$varFecha = $_POST["txtfecha"];
$varTipo = $_POST["txttipo_vehiculo"];

$consulta = $bd->prepare("UPDATE entrada SET propietario=?, fecha=?, tipo_vehiculo=? WHERE placa=?");

$resultado = $consulta->execute([$varPropietario,$varFecha,$varTipo,$varPlaca]);
if($resultado === TRUE){
    header("location: index-php?mensaje=editado");
}else{
    header("location: index-php?mensaje=error");
    exit();
}

?>