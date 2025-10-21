<?php
    require 'includes/app.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Pisos en Venta</h2>

        <?php
        $limite = 3;
        include 'includes/templates/anuncios.php';  // Incluir Anuncios desde template
        ?>

        <div class="alinear-derecha">
            <a class="boton-verde" href="anuncios.php">Ver todas</a>
        </div>
    </section> 

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un aseesor se pondra en contacto contigo a la brevedad.</p>
        <a class="boton-amarillo" href="contacto.php">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img load="lazy" src="build/img/blog2.jpg" alt="texto entrada blog">
                    </picture>
                </div> <!--.imagen-->

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>18/03/2022 </span>Por: <span>Admin</span></p>
                        <P>Consejos para construir la terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</P>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img load="lazy" src="build/img/blog1.jpg" alt="texto entrada blog">
                    </picture>
                </div> <!--.imagen-->

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>24/04/2022 </span>Por: <span>Admin</span></p>
                        <P>Maximiza la decoracion de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.</P>
                    </a>
                </div>
            </article>

        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con mis expectativas.
                </blockquote>
                <p>- Solange Guevara</p>
            </div>
        </section>
    </div>

    <?php incluirTemplate('footer'); ?>