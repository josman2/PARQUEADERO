<?php

if(!isset($_GET["placa"])){
    header("location: index.php?mensaje=error");
    exit();
}

include "model/database.php";

$varPlaca = $_GET["placa"];

$consulta = $bd-> prepare("DELETE FROM entrada WHERE placa = ?;");

$resultado = $consulta->execute([$varPlaca]);

if($resultado === TRUE){
    header("location: index.php?mensaje=eliminado");
} else {
    header("location: index.php?mensaje=error");
}

?>