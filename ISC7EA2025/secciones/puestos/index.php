<?php 
include("../../templates/header.php");
include("../../bd.php");

if(isset($_GET['txtId'])){
    $txtID = (isset($_GET['txtId']) ? $_GET['txtId'] : '');
    $sentencia = $conn -> prepare("DELETE FROM `tbl_puestos` WHERE id = :id");
    $sentencia -> bindParam(":id", $txtID);
    $sentencia -> execute();
    header("Location: index.php");
}

$sentencia=$conn->prepare("SELECT * FROM tbl_puestos");
   $sentencia->execute();
   $lista_tbl_puestos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<br/>

<div class="card" style=" background-color:rgb(255, 255, 255); margin-left: 30px; margin-right: 30px;">
<div class="card-header">
        <a
            name=""
            id=""
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
                    <th scope="col">Puesto</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($lista_tbl_puestos as $registro) {
                ?>
                <tr class="">
                <td scope="row"><?php echo $registro['id'] ?></td>
                <td><?php echo $registro['nombreDelPuesto'] ?></td>
                    <td>
                        <a
                            name="btneditar"
                            id="btneditar"
                            class="btn btn-info"
                            href="editar.php?txtId=<?php echo $registro['id'] ?>"
                            role="button"
                            >Editar</a
                        >
                        |
                        <a
                            name="btneliminar"
                            id="btneliminar"
                            class="btn btn-danger"
                            href="index.php?txtId=<?php echo $registro['id'] ?>"
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