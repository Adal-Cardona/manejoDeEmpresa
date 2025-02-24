<?php 
include("../../templates/header.php");
include("../../bd.php");

if(isset($_GET['txtId'])){
    $txtID = $_GET['txtId'];
    $sentencia = $conn->prepare("SELECT * FROM tbl_puestos WHERE id = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $nombrePuesto = $registro['nombreDelPuesto'];
}
if ($_POST) {

    $txtID = (isset($_GET['txtId']) ? $_GET['txtId'] : '');
    $nombrePuesto = (isset($_POST['nombredelpuesto']) ? $_POST['nombredelpuesto'] : '');
    $sentencia=$conn->prepare("UPDATE tbl_puestos SET nombreDelPuesto=:nombreDelPuesto WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->bindParam(":nombreDelPuesto", $nombrePuesto);
   $sentencia->execute();

    header("Location: index.php");
}
?>
<br/>
<h4>Editar puestos</h4>
<div class="card">
    <div class="card-header">Datos del puesto</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="txtID" class="form-label">ID</label>
                <input
                    type="text"
                    class="form-control"
                    name="txtID"
                    id="txtID"
                    aria-describedby="helpId"
                    placeholder=""
                    value = "<?php echo $txtID?>"
                    readonly
                />
            </div>
            <div class="mb-3">
                <label for="nombredelpuesto" class="form-label">Nombre del puesto</label>
                <input
                    type="text"
                    class="form-control"
                    name="nombredelpuesto"
                    value="<?php echo $nombrePuesto?>"
                    id="nombredelpuesto"
                    aria-describedby="helpId"
                    placeholder="Nombre del puesto"
                />
            </div>
            <button
                type="submit"
                class="btn btn-success"
            >
            Guardar Cambios
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