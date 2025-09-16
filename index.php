<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud de imagenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <h1 class="text-center text-secondary fw-bold p-4">CRUD DE IMAGENES EN PHP Y MYSQL</h1>
     <?php
            require "model/conexion.php";
            require "controller/registrar.php";
            require "controller/editar.php";
            require "controller/eliminar.php";
            $sql=$conexion->query("SELECT * FROM imagenes");
            ?>
    <script>
        function eliminar(){
            let res=confirm("Estas seguro de eliminar?")
            return res;
        }
    </script>
    <div class="p-3 table-responisve">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registrar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Registro</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" enctype="multipart/form-data" method="POST">
                            <input type="file" class="form-control" name="imagen">
                            <input type="submit" value="Registrar" name="btnRegistrar" class="form-control btn btn-success">
                        </form>
                    </div>            
                </div>
            </div>
        </div>
        <table class="table table-hover table-striped">
            <thead class="table-dark text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Foto</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($datos=$sql->fetch_object()){?>  
                <tr>
                    <th scope="row"><?= $datos->id_imagen?></th>
                    <td>
                        <img width="80" src="<?= $datos->foto?>" alt="">
                    </td>
                    <td>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModalEditar<?=$datos->id_imagen?>" class="btn btn-warning">Editar</a>
                        <a href="index.php?id=<?=$datos->id_imagen?>&nombre=<?=$datos->foto?>" class="btn btn-danger" onclick="return eliminar();">Eliminar</a>
                    </td>
                </tr>

                        <!-- Modal para actualizar -->
        <div class="modal fade" id="exampleModalEditar<?=$datos->id_imagen?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Imagen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" enctype="multipart/form-data" method="POST">
                            <input type="hidden" value="<?=$datos->id_imagen?>" name="id" readonly>
                            <input type="hidden" value="<?=$datos->foto?>" name="nombre" readonly>
                            <input type="file" class="form-control" name="imagen">
                            <input type="submit" value="Modificar" name="btnEditar" class="form-control btn btn-success">
                        </form>
                    </div>            
                </div>
            </div>
        </div>
                <?php }?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>