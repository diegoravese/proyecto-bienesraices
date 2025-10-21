<?php 
    require 'includes/app.php'; 
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Blog</h1>

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

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img load="lazy" src="build/img/blog3.jpg" alt="texto entrada blog">
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
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img load="lazy" src="build/img/blog4.jpg" alt="texto entrada blog">
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
    </main>

    <?php incluirTemplate('footer'); ?>