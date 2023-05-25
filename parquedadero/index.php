<?php
include "template/header.php"
?>

<?php
include_once "model/database.php";
$consulta = $bd -> query("SELECT * FROM entrada");
$entrada = $consulta->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5" >
    <div class="row justify-content-center" >
        <div class="col-md-7">
            <?php
            if(isset($_GET["mensaje"]) and $_GET["mensaje"] === "error"){
            ?>
            <div class="alert alert-danger aler-dismissible fade show" role="alert">
                <strong>ERROR</strong>no se agrego informacion.
                <button type="button" class="btn-close"data-bs-dismiss="alert"aria-label="close"></button>
            </div>
            <?php
            }
            ?>
             <?php
            if(isset($_GET["mensaje"]) and $_GET["mensaje"] === "registrado"){
            ?>
            <div class="alert alert-success aler-dismissible fade show" role="alert">
                <strong>¡REGISTRADO!</strong>se agrego la informacion.
                <button type="button" class="btn-close"data-bs-dismiss="alert"aria-label="close"></button>
            </div>
            <?php
            }
            ?>
            <?php
            if(isset($_GET["mensaje"]) and $_GET["mensaje"] === "eliminado"){
            ?>
            <div class="alert alert-warning aler-dismissible fade show" role="alert">
                <strong>¡ELIMINADO!</strong> entrada eliminada.
                <button type="button" class="btn-close"data-bs-dismiss="alert"aria-label="close"></button>
            </div>
            <?php
            }
            ?>
            <div class="card" >
                <div class="card-header">
                    Parqueaderos "Los web 1"
                </div>
                <div class="p-4" >
                    <table class="table aling-middle">
                        <thead>
                            <tr>
                                <th scope="col">PLACA</th>
                                <th scope="col">PROPIETARIO</th>
                                <th scope="col">FECHA</th>
                                <th scope="col">TIPO DE VEHICULO</th>
                                <th scope="col" colspan="2">OPCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($entrada as $dato){
                            ?>
                            <tr>
                                <td><?php echo $dato->placa; ?></td> 
                                <td><?php echo $dato->propietario; ?></td> 
                                <td><?php echo $dato->fecha; ?></td> 
                                <td><?php echo $dato->tipo_vehiculo; ?></td> 
                                <td><a href="edit.php?placa=<?php echo $dato->placa; ?>"class="text successr"><i class="bi bi-pencil-square"></i></a></td>   
                                <td><a onclick="return confirm('estas seguro de eliminar')" href="delete.php?placa=<?php echo $dato->placa; ?>"class="text danger"><i class="bi bi-trash"></i></a></td>           
                           </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Registrar Entrada
                </div>
                <form class="p-4" action="register.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">PLACA</label>
                        <input type="text" class="form-control" name="txtPlaca" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PROPIETARIO</label>
                        <input type="text" class="form-control" name="txtpropietario" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">FECHA</label>
                        <input type="text" class="form-control" name="txtfecha" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">TIPO</label>
                        <input type="text" class="form-control" name="txtTipo" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" value="register">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "template/footer.php"
?>