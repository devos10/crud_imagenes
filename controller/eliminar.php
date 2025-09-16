<?php

    if(!empty($_GET['id']) && !empty($_GET['nombre'])){
        $id=$_GET['id'];
        $nombre=$_GET['nombre'];

        try{
                unlink($nombre);

            }catch(\Throwable $th){

            }
        //eliminamos en la base de datos
        $eliminar=$conexion->query("DELETE FROM imagenes WHERE id_imagen=$id");

        if($eliminar==1){
            echo "<div class='alert alert-success'>La imagen fue ELIMINADA con éxito</div>";

        }else{
            echo "<div class='alert alert-danger'>ERROR al eliminar la imagen</div>";


        }

    }

?>
      <script>
        //con este script lo que hacemos es que no salga la alerta de reenvio de formulario cuando recargamos la pagina
        history.replaceState(null,null,location.pathname);
    </script>