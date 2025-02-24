<?php 
include("../../templates/header.php");
include("../../bd.php");
if ($_POST) {
    $primerNombre = (isset($_POST['primerNombre']) ? $_POST['primerNombre'] : '');
    $segundoNombre = (isset($_POST['segundoNombre']) ? $_POST['segundoNombre'] : '');
    $apellidoPaterno = (isset($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno'] : '');
    $apellidoMaterno = (isset($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno'] : '');
    $foto = (isset($_POST['foto']) ? $_POST['foto'] : '');
    $cv = (isset($_POST['cv']) ? $_POST['cv'] : '');
    $idpuesto = (isset($_POST['idpuesto']) ? $_POST['idpuesto'] : '');
    $fechadeingreso = (isset($_POST['fechadeingreso']) ? $_POST['fechadeingreso'] : '');
    $sentencia = $conn -> prepare("INSERT INTO `tbl_empleados`(`id`,`apellidoPaterno`,`apellidoMaterno`, `primerNombre`,`segundoNombre`,`foto`,`cv`,`idpuesto`,`fechadeingreso`) VALUES (NULL,  :apellidoPaterno, :apellidoMaterno, :primerNombre, :segundoNombre, :foto, :cv, :idpuesto, :fechadeingreso)");
    $sentencia -> bindParam(":primerNombre", $primerNombre);
    $sentencia -> bindParam(":segundoNombre", $segundoNombre);
    $sentencia -> bindParam(":apellidoPaterno", $apellidoPaterno);
    $sentencia -> bindParam(":apellidoMaterno", $apellidoMaterno);
    $sentencia -> bindParam(":foto", $foto);
    $sentencia -> bindParam(":cv", $cv);
    $sentencia -> bindParam(":idpuesto", $idpuesto);
    $sentencia -> bindParam(":fechadeingreso", $fechadeingreso);
    $sentencia -> execute();
    header("Location: index.php");
}
?>

<br>
<div class="card">
    <div class="card-header">Datos del empleadp</div>
    <div class="card-body"> 
        <form action="" method="post" enctype ="multipart/form-data">
            <div class="mb-3">
                <label for="primerNombre" class="form-label">Primer Nombre</label>
                <input
                    type="text"
                    class="form-control"
                    name="primerNombre"
                    id="primerNombre"
                    aria-describedby="helpId"
                    placeholder="Primer Nombre"
                />
            </div>
            <div class="mb-3">
                <label for="segundoNombre" class="form-label">Segundo Nombre</label>
                <input
                    type="text"
                    class="form-control"
                    name="segundoNombre"
                    id="segundoNombre"
                    aria-describedby="helpId"
                    placeholder="Segundo Nombre"
                />
            </div>
            <div class="mb-3">
                <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                <input
                    type="text"
                    class="form-control"
                    name="apellidoPaterno"
                    id="apellidoPaterno"
                    aria-describedby="helpId"
                    placeholder="Apellido Paterno"
                />
            </div>

            <div class="mb-3">
                <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                <input
                    type="text"
                    class="form-control"
                    name="apellidoMaterno"
                    id="apellidoMaterno"
                    aria-describedby="helpId"
                    placeholder="Apellido Materno"
                />
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input
                    type="file"
                    class="form-control"
                    name="foto"
                    id="foto"
                    placeholder="Foto"
                    aria-describedby="fileHelpId"
                />
            </div>

            <div class="mb-3">
                <label for="cv" class="form-label">CV:</label>
                <input
                    type="file"
                    class="form-control"
                    name="cv"
                    id="cv"
                    placeholder="CV"
                    aria-describedby="fileHelpId"
                />
            </div>
            
            <div class="mb-3">
            <label for="idpuesto" class="form-label">Puesto:</label>
            <select
                class="form-select form-select-sm"
                name="idpuesto"
                id="idpuesto"
            >
                <option selected>Seleccione un Puesto</option>
                <option value="">Programador Jr.</option>
                <option value="">Supervisor</option>
                <option value="">Lider de proyectos</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="fechadeingreso" class="form-label">Fecha de Ingreso</label>
            <input
                type="date"
                class="form-control"
                name="fechadeingreso"
                id="fechadeingreso"
                aria-describedby="helpId"
                placeholder="Fecha de Ingreso"
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
    <div class="card-footer text-muted"></div>
</div>

<?php 
include("../../templates/footer.php")
?>