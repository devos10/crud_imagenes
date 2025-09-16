<?php
    if(!empty($_POST['btnRegistrar'])){
        $imagen=$_FILES['imagen']['tmp_name']; //php asigna la ruta y el nombre de un archivo temporal generado en el servidor al subir un archivo a través de un formulario HTML.
        $nombre_imagen=$_FILES['imagen']['name']; //aqui obtenemos el nombre del archivo original
        $tipo_imagen=strtolower(pathinfo($nombre_imagen,PATHINFO_EXTENSION)); //CON ESTA VARIABLE OBTENEMOS LA EXTENSION DE NUESTRA IMAGEN original
        $tamaño_imagen=$_FILES['imagen']['size']; // nos da el tamaño de la imagen original en bytes
        $directorio="archives/";
        //verificando la extension que solo sea de una imagen o foto 
        //creamos un array con los formato permitidos
        $formatos_permitidos=['jpg','jpeg','png','webp','svg','gif'];
        if(in_array($tipo_imagen,$formatos_permitidos)){
            $registro=$conexion->query("INSERT INTO imagenes (foto) values ('')");
            $id_registro=$conexion->insert_id;

            $ruta=$directorio.$id_registro.".".$tipo_imagen;
            $actualizar_imagen=$conexion->query("UPDATE imagenes SET foto='$ruta' where id_imagen=$id_registro");

        if(move_uploaded_file($imagen,$ruta)){
            echo "<div class='alert alert-info'>IMAGEN guardada exitosamente</div>";


        }else{
            echo "<div class='alert alert-info'>ERROR al guardar la imagen</div>";

        }

        }else{
                echo "<div class='alert alert-info'>FORMATO no permitido</div>";
        }

    }
?>