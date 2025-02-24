<?php 
include("../../templates/header.php");
include("../../bd.php");

if(isset($_GET['txtId'])){
    $txtID = (isset($_GET['txtId']) ? $_GET['txtId'] : '');
    $sentencia = $conn -> prepare("SELECT * FROM tbl_usuarios WHERE id = :id");
    $sentencia -> bindParam(":id", $txtID);
    $sentencia -> execute();
    $registro = $sentencia -> fetch(PDO::FETCH_LAZY);
    $nombreUsuario = $registro['nombreUsuario'];
    $password = $registro['password'];
    $correo = $registro['correo'];
}
if ($_POST) {
    $txtID = (isset($_GET['txtId']) ? $_GET['txtId'] : '');
    $nombreUsuario = (isset($_POST['nombredelusuario']) ? $_POST['nombredelusuario'] : '');
    $password = (isset($_POST['password']) ? $_POST['password'] : '');
    $correo = (isset($_POST['correo']) ? $_POST['correo'] : '');
    $sentencia = $conn -> prepare("UPDATE tbl_usuarios SET nombreUsuario=:nombreUsuario, password=:password, correo=:correo WHERE id=:id");
    $sentencia -> bindParam(":id", $txtID);
    $sentencia -> bindParam(":nombreUsuario", $nombreUsuario);
    $sentencia -> bindParam(":password", $password);
    $sentencia -> bindParam(":correo", $correo);
    $sentencia -> execute();
    header("Location: index.php");
}

    
?>

<div class="card">
    <div class="card-header">Datos del usuario</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="txtId" class="form-label">Id</label>
                <input
                    type="text"
                    class="form-control"
                    name="txtId"
                    value="<?php echo $txtID?>"
                    id="txtId"
                    aria-describedby="helpId"
                    placeholder="ID"
                    readonly
                />
            </div>
            <div class="mb-3">
                <label for="nombredelusuario" class="form-label">Nombre del usuario</label>
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo $nombreUsuario?>"
                    name="nombredelusuario"
                    id="nombredelusuario"
                    aria-describedby="helpId"
                    placeholder="Nombre del usuario"
                />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="passeword"
                    class="form-control"
                    value="<?php echo $password?>"
                    name="password"
                    id="password"
                    aria-describedby="helpId"
                    placeholder="Password"
                />
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input
                    type="email"
                    class="form-control"
                    value="<?php echo $correo?>"
                    name="correo"
                    id="correo"
                    aria-describedby="helpId"
                    placeholder="Correo"
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
                >Cancelar</a>      
        </form>
    </div>
</div>

<?php 
include("../../templates/footer.php")
?>