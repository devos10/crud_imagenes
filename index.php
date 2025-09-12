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
            $sql=$conexion->query("SELECT * FROM imagenes");
            ?>
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
                        <a href="" class="btn btn-warning">Editar</a>
                        <a href="" class="btn btn-danger">Eliminar</a>                        
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>