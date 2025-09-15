<?php

    if(!empty($_POST['btnEditar'])){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        //informacion de la iamagen
        $imagen=$_FILES['imagen']['tmp_name']; //php asigna la ruta y el nombre de un archivo temporal generado en el servidor al subir un archivo a través de un formulario HTML.
        $nombre_imagen=$_FILES['imagen']['name']; //aqui obtenemos el nombre del archivo original
        $tipo_imagen=strtolower(pathinfo($nombre_imagen,PATHINFO_EXTENSION)); //CON ESTA VARIABLE OBTENEMOS LA EXTENSION DE NUESTRA IMAGEN original
        $directorio="archives/";

        if(is_file($imagen)){
            //is_file verificar si es un archivo regular
            if($tipo_imagen=="jpg" || $tipo_imagen=="jpeg" || $tipo_imagen=="png"){
                            //con esto borramos la imagen anterior;
            try{
                unlink($nombre);

            }catch(\Throwable $th){

            }

            $ruta=$directorio.$id.".".$tipo_imagen;//creamos la ruta del nuevo archivo
            if(move_uploaded_file($imagen,$ruta)){
                //con move_uploaded_file movemos la imagen a la ruta especificada
                $editar=$conexion->query("UPDATE imagenes SET foto='$ruta' where id_imagen=$id ");

                if($editar==1){
                    echo "<div class='alert alert-success'>La imagen se ha subido con EXITO</div>";
                }else{
                    echo "<div class='alert alert-danger'>ERROR al editar la iamgen</div>";
                    
                }

            }else{
                    echo "<div class='alert alert-info'>ERROR al subir la iamgen al servidor</div>";

            }

            }else{
                echo "<div class='alert alert-info'>Solo se aceptan formatos jpg/jpeg/png </div>";


            }

        }else{
                echo "<div class='alert alert-info'>Debes subir una IMAGEN</div>";

        }

    }
?>