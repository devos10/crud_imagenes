<?php
    if(!empty($_POST['btnRegistrar'])){
        $imagen=$_FILES['imagen']['tmp_name']; //php asigna la ruta y el nombre de un archivo temporal generado en el servidor al subir un archivo a través de un formulario HTML.
        $nombre_imagen=$_FILES['imagen']['name']; //aqui obtenemos el nombre del archivo original
        $tipo_imagen=strtolower(pathinfo($nombre_imagen,PATHINFO_EXTENSION)); //CON ESTA VARIABLE OBTENEMOS LA EXTENSION DE NUESTRA IMAGEN original
        echo "<div class='alert alert-info'>$tipo_imagen</div>";

    }
?>