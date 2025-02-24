<?php 
include("../../templates/header.php");
include("../../bd.php");

if ($_POST) {
    $nombreUsuario = (isset($_POST['nombredelusuario']) ? $_POST['nombredelusuario'] : '');
    $password = (isset($_POST['password']) ? $_POST['password'] : '');
    $correo = (isset($_POST['correo']) ? $_POST['correo'] : '');
    $sentencia = $conn -> prepare("INSERT INTO `tbl_usuarios`(`id`,`nombreUsuario`,`password`,`correo`) VALUES (NULL, :nombreUsuario, :pwd, :correo)");
    $sentencia -> bindParam(":nombreUsuario", $nombreUsuario);
    $sentencia -> bindParam(":pwd", $password);
    $sentencia -> bindParam(":correo", $correo);
    $sentencia -> execute();
    header("Location: index.php");
}
?>

<h4>Crear Usuarios</h4>

<div class="card" style=" background-color:rgb(255, 255, 255); margin-left: 30px; margin-right: 30px;">
    <div class="card-header">Usuarios</div>
    <div class="card-body">


        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="nombredelusuario" class="form-label">Nombre del usuario</label>
                <input
                    type="text"
                    class="form-control"
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
                >Cancelar</a
            >
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php 
include("../../templates/footer.php")
?>