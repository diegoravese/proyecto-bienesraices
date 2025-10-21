<?php

    require '../../includes/app.php';
    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    $db = conectarDB(); // Importar Conexion a Base de Datos

    $propiedad = new Propiedad;
    
    $consulta = "SELECT * FROM vendedores";
    $res = mysqli_query($db, $consulta); // Consultar la DB para obtener los vendedores

    $errores = Propiedad::getErrores(); // Array con mensajes de errores

    // Ejecutar el codigo antes de que el usuario envie el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        /** Crear nueva instancia */
        $propiedad = new Propiedad($_POST);

        /** SUBIDA DE ARCHIVOS */
        $nombreImagen = md5( uniqid ( rand(), true ) ) . ".jpg"; // Generar nombre unico

        if($_FILES['imagen']['tmp_name']) {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600); // Realizar resize a la imagen con intervention
            $propiedad->setImagen($nombreImagen); // Setear la imagen
        }

        $errores = $propiedad->validar(); // Validar

        if(empty($errores)) {
            $carpetaImagenes = '../../imagenes/';
            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES); // Crear Carpeta
            }
  
            $resultado = $propiedad->guardar(); //Guardar en la base de datos

            $image->save(CARPETA_IMAGENES . $nombreImagen); // Guardar imagen en el servidor

            if($resultado) {
                header('Location: /admin?resultado=1'); // Redireccionar al usuario
            }
        }
    }


    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Crear Nueva Propiedad</h1>
        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo ($error); ?>
            </div>
        <?php endforeach; ?>
        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Publicar Propiedad" class="boton boton-verde">

        </form>

        <a href="/admin" class="boton boton-verde">Volver</a>
    </main>

    <?php incluirTemplate('footer'); ?>