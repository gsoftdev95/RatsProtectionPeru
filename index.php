<?php    
    require_once('helpers/dd.php');
    require_once('controladores/funciones.php');
    require_once('partials/conexionBD.php');
  //Middleware
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once('./partials/head.php')?>
</head>
<body>    
    <header>
        <?php include_once('./partials/navBar.php')?>
    </header>
    
    <aside class="ratswsp m-auto p-0">
        <a href="https://wa.me/+51925850399"  target="_blank">
            <div id="iconratswsp"><span class="icon-whatsapp"></span></div>
            <div id="ratswsptexto">¿Necesitas ayuda?</div>
        </a>
    </aside>


    <section class="container-fluid m-0 p-0">
        <!-- 
        <div id="promociones">20% de dscto en tu primera compra</div>
        -->
        <section id="cuerpoPrincipal">      
            <div id="fotocuerpo1">
                <div id="slogan1"><i>RATS PROTECTION</i></div>
                <div id="slogan2">Que tus habilidades no se limiten por tu falta de seguridad.</div>
            </div>
    
            <div id="reseña1">
                <div id="contenedorReseña">
                    <article id="tituloReseña"></article>
                    <article id="textReseña">
                        Las carreras de ciclismo auspiciadas por nuestra marca, se destacan por su emocionante despliegue de talento y resistencia. Todos los deportistas demuestran habilidades impresionantes y capacidades inigualables para enfrentar desafíos en diversos terrenos. Rats se enorgullece de contribuir con la seguridad y el rendimiento de los mismos, brindando protecciones de alta calidad que les permitan enfocarse en dar lo mejor de sí.
                    </article>
                </div>
                <div id="img1reseña1"></div>
                <div id="img2reseña1"></div>
            </div>
    
            <div id="reseña2">            
                <div id="img1reseña2"></div>
                <div id="img2reseña2"></div>
                <div id="contenedorReseña">
                    <article id="tituloReseña"></article>
                    <article id="textReseña">
                        La calidad de nuestras protecciones garantiza que los deportistas puedan concentrarse en las carreras sin preocuparse por su seguridad.
                        Este patrocinio reafirma nuestro compromiso con el deporte, apoyándolos en cada paso y promoviendo un ambiente de competencia justa y segura.
                    </article>
                </div>
            </div>
            
            <div id="fotocuerpo2">
                <section id="contenedorslogan">
                    <div id="slogan1"><i></i></div>
                    <div id="slogan2"></div>
                </section>            
            </div>
    
            <?php include_once('./partials/bottomNavBar.php')?>
        </section>
    </section> 
    
    
        
    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>
        
        
    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>