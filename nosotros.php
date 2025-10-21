<?php 
    require 'includes/app.php'; 
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img load="lazy" src="build/img/nosotros.jpg" alt="sobre nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                <p>Consectetur adipisicing elit. Ipsum excepturi beatae, aliquam rerum et exercitationem accusamus aliquid facere dolorem labore ut qui rem, dolores quis dicta. Suscipit iste eius veritatis. Tempore praesentium ducimus dolores incidunt architecto quibusdam excepturi asperiores, natus, ut voluptatem labore voluptates possimus repudiandae! L
                </p>
                <p>Assumenda alias mollitia odio quasi distinctio quam ad dicta saepe reiciendis, placeat sed labore earum? Saepe sed, harum ratione quidem facere eveniet. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam nulla repudiandae temporibus magnam cumque, illo molestiae!</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h2>Mas Sobre Nosotros</h2>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Minima culpa velit laboriosam vero aliquid, rem eius labore voluptate repellat ipsa cupiditate fugit cumque iusto inventore accusamus hic quibusdam iure voluptas.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Minima culpa velit laboriosam vero aliquid, rem eius labore voluptate repellat ipsa cupiditate fugit cumque iusto inventore accusamus hic quibusdam iure voluptas.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Minima culpa velit laboriosam vero aliquid, rem eius labore voluptate repellat ipsa cupiditate fugit cumque iusto inventore accusamus hic quibusdam iure voluptas.</p>
            </div>
        </div>
    </section>

    <?php incluirTemplate('footer'); ?>