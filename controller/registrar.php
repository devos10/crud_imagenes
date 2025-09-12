<?php
    if(!empty($_POST['btnRegistrar'])){
        $imagen=$_FILES['imagen']['tmp_name']; //php asigna la ruta y el nombre de un archivo temporal generado en el servidor al subir un archivo a través de un formulario HTML.
        $nombre_imagen=$_FILES['imagen']['name']; //aqui obtenemos el nombre del archivo original
        $tipo_imagen=strtolower(pathinfo($nombre_imagen,PATHINFO_EXTENSION)); //CON ESTA VARIABLE OBTENEMOS LA EXTENSION DE NUESTRA IMAGEN original
        var_dump($tipo_imagen);
        //verificando la extension que solo sea de una imagen o foto 
        //creamos un array con los formato permitidos
        $formatos_permitidos=['jpg','jpeg','png','webp','svg','gif'];
        if(in_array($tipo_imagen,$formatos_permitidos)){

        }else{
                echo "<div class='alert alert-info'>FORMATO no permitido</div>";
        }

    }
?>