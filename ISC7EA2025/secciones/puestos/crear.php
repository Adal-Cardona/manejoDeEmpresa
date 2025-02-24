<?php 
include("../../templates/header.php");
include("../../bd.php");

if ($_POST) {
    $nombrePuesto = (isset($_POST['nombredelpuesto']) ? $_POST['nombredelpuesto'] : '');
    $sentencia = $conn -> prepare("INSERT INTO `tbl_puestos`(`id`,`nombreDelPuesto`) VALUES (NULL, :nombrePuesto)");
    $sentencia -> bindParam(":nombrePuesto", $nombrePuesto);
    $sentencia -> execute();
    header("Location: index.php");
}
?>

<br/>
<h4>Crear puestos</h4>
<div class="card">
    <div class="card-header">Datos del puesto</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombredelpuesto" class="form-label">Nombre del puesto</label>
                <input
                    type="text"
                    class="form-control"
                    name="nombredelpuesto"
                    id="nombredelpuesto"
                    aria-describedby="helpId"
                    placeholder="Nombre del puesto"
                    value = "<?php echo $registro['nombreDelPuesto'] ?>"
                />
            </div>
            <button
                type="submit"
                class="btn btn-success"
            >
            Agregar Registro
            </button>
        
            <a
                name=""
                id=""
                class="btn btn-danger"
                href="index.php"
                role="button"
                >Cancelar</a
            >


        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php 
include("../../templates/footer.php")
?>