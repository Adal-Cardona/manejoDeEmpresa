<?php 
include("../../templates/header.php");
include("../../bd.php");

    $sentencia=$conn->prepare("SELECT * FROM tbl_empleados");
   $sentencia->execute();
   $lista_tbl_empleados=$sentencia->fetchAll(PDO::FETCH_ASSOC); 
?>

<h4>Listar Empleados</h4>
<div class="card">
    <div class="card-header"> <a
    name=""
    id=""
    class="btn btn-primary"
    href="crear.php"
    role="button"
    >Agregar Registro</a
></div>
    <div class="card-body">
        <div
            class="table-responsive-sm"
        >
            <table
                class="table table"
            >
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Foto</th>
                        <th scope="col">CV</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Fecha de Ingreso</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">Elmer Homero</td>
                        <td>Foto</td>
                        <td>CV</td>
                        <td>Dueño</td>
                        <td>20/06/2000</td>
                        <td><a
                            name=""
                            id=""
                            class="btn btn-success"
                            href="#"
                            role="button"
                            >Carta</a
                        >
                        | <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="editar.php"
                            role="button"
                            >Editar</a
                        >
                        | <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="#"
                            role="button"
                            >Eliminar</a
                        >
                        </td>
                    </tr>
                 
                </tbody>
            </table>
        </div>
        
    </div>
    
</div>


<?php 
include("../../templates/footer.php")
?>