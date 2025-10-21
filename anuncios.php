<?php 
    require 'includes/app.php'; 
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Casas y Pisos en Venta</h1>

        <?php
            $limite = 9;
            include 'includes/templates/anuncios.php';  // Incluir Anuncios desde template
        ?>
        
    </main>

    <?php incluirTemplate('footer'); ?>