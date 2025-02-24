<?php 
include("../../templates/header.php");
include("../../bd.php");

$sentencia=$conn->prepare("SELECT * FROM tbl_usuarios");
   $sentencia->execute();
   $lista_tbl_usuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['txtId'])){
    $txtID = (isset($_GET['txtId']) ? $_GET['txtId'] : '');
    $sentencia = $conn -> prepare("DELETE FROM `tbl_usuarios` WHERE id = :id");
    $sentencia -> bindParam(":id", $txtID);
    $sentencia -> execute();
    header("Location: index.php");
}
?>

<br/>

<h4>Listar Usuarios</h4>

<div class="card" style=" background-color:rgb(255, 255, 255); margin-left: 30px; margin-right: 30px;">
    <div class="card-header" > 
    <a
            name="btnagregar"
            id="btnagregar"
            class="btn btn-primary"
            href="crear.php"
            role="button"
            >Agregar Registro</a
        >
    </div>
    <div class="card-body">
        <div
            class="table-responsive-sm"
        >
            <table
                class="table table"
            >
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del usuario</th>
                        <th scope="col">Password</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($lista_tbl_usuarios as $registro) {
                    ?>
                    <tr class="">
                        <td scope="row"><?php echo  $registro['id']?></td>
                        <td><?php echo $registro['nombreUsuario']?></td>
                        <td><?php echo $registro['password']?></td>
                        <td><?php echo $registro['correo']?></td>
                        <td>
                        <a
                            name="btneditar"
                            id="btneditar"
                            class="btn btn-info"
                            href="editar.php?txtId=<?php echo $registro['id']?>"
                            role="button"
                            >Editar</a
                        >
                        |
                        <a
                            name="btneliminar"
                            id="btneliminar"
                            class="btn btn-danger"
                            href="index.php?txtId=<?php echo $registro['id']?>"
                            role="button"
                            >Elimnar</a
                        >
                    </td>
                    </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>    
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php 
include("../../templates/footer.php")
?>