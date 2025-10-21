<?php 

    require '../../includes/app.php';
    
    $auth = estaAutenticado();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT); // Validar la URL por ID valido

    if(!$id) {
        header('Location: /admin');
    }

    $db = conectarDB(); // Importar conexion a la Base de Datos

    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado); // Consultar DB para obtener los datos de ela propiedad
    $consulta = "SELECT * FROM vendedores";
    $res = mysqli_query($db, $consulta); // Consultar DB para obtener los vendedores
    $errores = []; // Array vacio con mensajes de errores, los errores se van agregando al array, si esta vacio no hay errores.
    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorId'];
    $imagenPropiedad = $propiedad['imagen'];

    if($_SERVER['REQUEST_METHOD'] === 'POST') { // Ejecutar el codigo despues de que el usuario envia el formulario

        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] );
        $creado = date('Y/m/d');
        $imagen = $_FILES['imagen']; // Asignar files a una variable

        if(!$titulo) {
            $errores[] = 'Debes añadir un titulo';
        }
        if(!$precio) {
            $errores[] = 'Debes añadir un precio';
        }
        if ( strlen ($descripcion) < 50 ) {
            $errores[] = 'Debes añadir una descripcion de al menos 50 caracteres';
        }
        if(!$habitaciones) {
            $errores[] = 'El numero de habitaciones es obligatorio';
        }
        if(!$wc) {
            $errores[] = 'El numero de baños es obligatorio';
        }
        if(!$estacionamiento) {
            $errores[] = 'El numero de lugares de estacionamiento es obligatorio';
        }
        if(!$vendedorId) {
            $errores[] = 'Debes elegir un vendedor';
        }
        
        $medida = 1000 * 1000; // Validar imagen por tamaño (1 Mb maximo)
        if( $imagen['size'] > $medida ) {
            $errores[] = 'La imagen es demasiado grande';
        }

        if(empty($errores)) { // Revisar que el array de errores este vacio

            $carpetaImagenes = '../../imagenes/'; 
            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes); // Crear Carpeta
            }

            $nombreImagen = '';

            // ACTUALIZAR ARCHIVOS EN EL SERVIDOR
            if($imagen['name']) {
                unlink($carpetaImagenes . $propiedad['imagen']); // Eliminar imagen anterior
                $nombreImagen = md5( uniqid ( rand(), true ) ) . ".jpg"; // Generar nombre unico
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen); // Subir la imagen
            } else {
                $nombreImagen = $propiedad['imagen'];
            }
            
            // ACTUALIZAR BASE DE DATOS
            $query = " UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id = ${id} ";

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('Location: /admin?resultado=2'); // Redireccionar al usuario
            }
        }
    }
 
    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Actualizar Propiedad</h1>

        <?php foreach ($errores as $error): ?>

            <div class="alerta error">
                <?php echo ($error); ?>
            </div>
            
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" placeholder="Titulo de la Propiedad" name="titulo" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" placeholder="Precio de la propiedad" name="precio" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
                <img src="/imagenes/<?php echo $imagenPropiedad ?>" class="imagen-small">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Detalles de la Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Cantidad de habitaciones" min="0" max="9" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Cantidad de baños" min="0" max="9" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Cantidad de estacionamientos" min="0" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                
                <select name="vendedor">
                    <option value="">-- Seleccione --</option>
                    <?php while( $vendedor = mysqli_fetch_assoc($res) ): ?>
                        <option  <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?>  value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>

                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

        </form>

        <a href="/admin" class="boton boton-verde">Volver</a>
    </main>

    <?php incluirTemplate('footer'); ?>