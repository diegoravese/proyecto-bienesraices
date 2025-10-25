<?php 
    require 'includes/app.php';
    $db = conectarDB();

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = mysqli_real_escape_string( $db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) );
        $password = mysqli_real_escape_string( $db, $_POST['password'] );
        
        if(!$email) {
            $errores[] = "Ingresa un E-mail valido";
        }
        
        if(!$password) {
            $errores[] = "La contraseña es incorrecta";
        }
        
        if(empty($errores)) {
            $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
            $resultado = mysqli_query($db, $query);
            
            if( $resultado->num_rows) {
                $usuario = mysqli_fetch_assoc($resultado); // Revisar si el email es correcto.
                $auth = password_verify( $password, $usuario['password'] ); // Verificar si el password es correcto.
                
                if($auth) {
                    session_start(); // El usuario esta Autenticado e inicia la sesion.
                    $_SESSION['usuario'] = $usuario['email']; // Llenar el array de la sesion.
                    $_SESSION['login'] = true;
                    header('location: /admin');
                } else {
                    $errores[] = "La contraseña es incorrecta";
                }
            } else {
                $errores[] = "El usuario no existe";
            }
        }
    }

    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" novalidate>
            <fieldset>
                <legend>Iniciar sesion como administrador</legend>

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" id="email" name="email">

                <label for="password">Contraseña</label>
                <input type="password" placeholder="Tu Contraseña" id="password" name="password">
            </fieldset>
            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>
    </main>

    <?php incluirTemplate('footer'); ?>