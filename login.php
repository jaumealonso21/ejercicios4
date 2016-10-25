<?php
if(isset($_REQUEST['enviar'])) {
    //$error = false;

    $nombre = $_REQUEST['nombre'];
    $nombre = $_REQUEST['apellido'];
    $nombre = $_REQUEST['login'];
    $nombre = $_REQUEST['password'];
    $nombre = $_REQUEST['passResc'];
   
    
    if ($nombre == "") {
        $error = true;
        $error_nombre = "escribe el nombre";
    }
    if ($apellido == "") {
        $error = true;
        $error_apellido = "escribe el apellido";
    }
    if ($login == "") {
        $error = true;
        $error_login = "escribe el login";
    }
    if ($password == "") {
        $error = true;
        $error_password = "escribe el password";
    }
    if ($passResc == "") {
        $error = true;
        $error_passResc = "reescribe el password";
    }
    if ($nombre == "") {
        $error = true;
        $error_nombre = "escribe el nombre";
    }
    
 // -------------------------------------- Inicio de Foto --------------------------------------------------   
        //Subir fichero
    $copiarFichero = false;
    
   // Copiar fichero en directorio de ficheros subidos
   // Se renombra para evitar que sobreescriba un fichero existente
   // Para garantizar la unicidad del nombre se añade una marca de tiempo
      if (is_uploaded_file ($_FILES['foto']['tmp_name']))
      {
         $nombreDirectorio = "img/";
         $nombreFichero = $_FILES['foto']['name'];
         $copiarFichero = true;

      // Si ya existe un fichero con el mismo nombre, renombrarlo
         $nombreCompleto = $nombreDirectorio . $nombreFichero;
         if (is_file($nombreCompleto)){
            $idUnico = time();
            $nombreFichero = $idUnico . "-" . $nombreFichero;
         }
      }
   // El fichero introducido supera el límite de tamaño permitido
      else if ($_FILES['foto']['error'] == UPLOAD_ERR_FORM_SIZE){
      	//$maxsize = $_REQUEST['MAX_FILE_SIZE'];
      }
   // No se ha introducido ningún fichero
      else if ($_FILES['foto']['name'] == "") {
          $nombreFichero = '';
   // El fichero introducido no se ha podido subir
    }else{ 
        //$errores = $errores . "   <LI>No se ha podido subir el fichero\n";
        
    }
    
    // Mover fichero de imagen a su ubicación definitiva
         if ($copiarFichero) {
            move_uploaded_file ($_FILES['foto']['tmp_name'], $nombreDirectorio . $nombreFichero); 
         }
         
 // -------------------------------------- Fin de Foto ---------------------------------------------- 
}

if(!isset($_REQUEST['enviar']) || isset($error)) {
?>

<form action="login.php" enctype="multipart/form-data" method="post">
    Nombre: 
    <?php if (isset($error) && isset($error_nombre)) {//si se ha enviado y existe el error_nombre
        echo "<input type='text' name='nombre' /><br />";
        echo "escribe el nombre";
    } else {
        if (isset($error)&& !isset($error_nombre)) {//si se ha enviado y no existe el error nombre
            //el usuario no tiene que volver a rellenar
             echo "  <input type='text' name='nombre' value='".$nombre."' /><br />";
        } else {//otra opcion -- se carga por primera vez el formulario
            echo "  <input type='text' name='nombre' /><br />";
        }
    }
    ?>
    Apellido:
    <?php if (isset($error) && isset($error_apellido)) {//si se ha enviado y existe el error_apellido
        echo "<input type='text' name='apellido' /><br />";
        echo "escribe el apellido";
    } else {
        if (isset($error)&& !isset($error_apellido)) {//si se ha enviado y no existe el error apellido
            //el usuario no tiene que volver a rellenar
             echo "  <input type='text' name='apellido' value='".$apellido."' /><br />";
        } else {//otra opcion -- se carga por primera vez el formulario
            echo "  <input type='text' name='apellido' /><br />";
        }
    }
    ?>
    Login:
    <?php if (isset($error) && isset($error_login)) {//si se ha enviado y existe el error_login
        echo "<input type='text' name='login' /><br />";
        echo "escribe el login";
    } else {
        if (isset($error)&& !isset($error_login)) {//si se ha enviado y no existe el error login
            //el usuario no tiene que volver a rellenar
             echo "  <input type='text' name='login' value='".$login."' /><br />";
        } else {//otra opcion -- se carga por primera vez el formulario
            echo "  <input type='text' name='login' /><br />";
        }
    }
    ?>
    Password:
    <?php if (isset($error) && isset($error_password)) {//si se ha enviado y existe el error_password
        echo "<input type='password' name='password' /><br />";
        echo "escribe el password";
    } else {
        if (isset($error)&& !isset($error_apellido)) {//si se ha enviado y no existe el error password
            //el usuario no tiene que volver a rellenar
             echo "  <input type='password' name='password' value='".$password."' /><br />";
        } else {//otra opcion -- se carga por primera vez el formulario
            echo "  <input type='password' name='password' /><br />";
        }
    }
    ?>
<!---------------------------------------stic aqui ------------------------------------------------>
    Reescriu: <input type="password" id="passResc" /><br />
    <?php if (isset($error) && isset($error_password)) {//si se ha enviado y existe el error_password
        echo "<input type='password' name='passResc' /><br />";
        echo "escribe el password";
    } else {
        if (isset($error)&& !isset($error_apellido)) {//si se ha enviado y no existe el error password
            //el usuario no tiene que volver a rellenar
             echo "  <input type='password' name='passResc' value='".$passResc."' /><br />";
        } else {//otra opcion -- se carga por primera vez el password
            echo "  <input type='password' name='passResc' /><br />";
        }
    }
    ?>
    Foto: <input type="file" id="foto" /><br />
    <input type="submit" value="Enviar" id="enviar" />
</form>

<?php

} else {
    
    echo "Guayyyyyy!!!";
    echo "Tu nombre es ". $nombre . "<br />";
    echo "Tu apellido es ". $apellido . "<br />";
    echo "Tu login es ". $login . "<br />";
    echo "Tu password es ". $password . "<br />";
    echo "Tu password reescrito es ". $passResc . "<br />";
    
    // Mover fichero de imagen a su ubicación definitiva
    if ($copiarFichero) {
        move_uploaded_file ($_FILES['foto']['tmp_name'], $nombreDirectorio . $nombreFichero); 
    }
    // Mostrar datos introducidos
         if ($copiarFichero){
            print ("   <LI>Foto: <A TARGET='_blank' HREF='" . $nombreDirectorio . $nombreFichero . "'>" . $nombreFichero . "</A>\n");
         }else{
            print ("   <LI>Foto: (no hay)\n");
         }
}
?>