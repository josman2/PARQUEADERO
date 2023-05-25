<?php
include_once "model/database.php";

$varPlaca = $_POST["txtPlaca"];
$varPropietario = $_POST["txtpropietario"];
$varFecha = $_POST["txtfecha"];
$varTipo = $_POST["txtTipo"];

$consulta = $bd->prepare("INSERT INTO entrada(placa,propietario,fecha,tipo_vehiculo) VALUES (?,?,?,?);");

$resultado = $consulta->execute([$varPlaca,$varPropietario,$varFecha,$varTipo]);

if($resultado === TRUE){
    header("location:index.php?mensaje=registrado");
}else{
    header("location.index.php?mensaje=error");
}
?>