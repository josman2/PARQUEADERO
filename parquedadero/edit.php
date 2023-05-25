<?php

include "template/header.php";

?>

<?php
if(!isset($_GET["placa"])){
    header("location: index.php?mensaje=error");
    exit();
}

include_once "model/database.php";

$varPlaca = $_GET["placa"];
$consulta = $bd ->prepare("SELECT * FROM entrada WHERE placa=?;");
$consulta->execute([$varPlaca]);
$varPlaca = $consulta->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Actualizar entrada
                </div>
                <form class="p-4" action="editprocess.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">propietario</label>
                        <input type="text" class="form-control" name="txtpropietario" required_value="<?php echo $varPlaca->propietario; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">fecha</label>
                        <input type="text" class="form-control" name="txtfecha" required_value="<?php echo $varPlaca->fecha; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">tipo vehiculo</label>
                        <input type="text" class="form-control" name="txttipo_vehiculo" required_value="<?php echo $varPlaca->tipo_vehiculo; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="txtplaca" value="<?php echo $varPlaca->placa ?>">
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<?php

include "template/footer.php";

?>