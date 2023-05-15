<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>citasCocina</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="vista/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="vista/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="vista/css/login.css">
    </head>
    <body id="page-top">
    <?php
    include("vista/header.php");
    ?>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bienvenido</div>
                <div class="masthead-heading text-uppercase">Reserva, come, disfruta</div>
                <?php
                    //se muestra login cuando no existe una sesion
                    if (!isset($_SESSION['email'])) {
                        echo "<a class=\"btn btn-primary btn-xl text-uppercase\" href=\"/citascocina/vista/login.php\">Iniciar sesión</a>";
                    }
                    ?>
                
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Servicios</h2>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fas fa-clipboard-check fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Disponibilidad</h4>
                        <p class="text-muted">Servidores rápidos y accesibles</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Diseño Responsive</h4>
                        <p class="text-muted">Diseño adaptativo a todo tipo de pantallas</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Seguridad</h4>
                        <p class="text-muted">Todos los datos sensibles serán encriptados</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="m-auto d-flex justify-content-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3172.606969538151!2d-5.418989124205625!3d37.32813657210132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd12983dde205f0d%3A0x4557140b16ff5a52!2sC.%20San%20Pedro%2C%2016%2C%2041620%20Marchena%2C%20Sevilla!5e0!3m2!1ses!2ses!4v1683823411320!5m2!1ses!2ses" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
         </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" target="e_blank" href="https://twitter.com/?lang=es" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" target="e_blank" href="https://es-es.facebook.com/" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" target="e_blank" href="https://es.linkedin.com/" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" target="e_blank" href="https://protecciondatos-lopd.com/empresas/politica-de-privacidad-web/#:~:text=La%20pol%C3%ADtica%20de%20privacidad%20de%20una%20p%C3%A1gina%20web%20es%20un,se%20realizar%C3%A1%20de%20los%20mismos.">Politica de privacidad</a>
                        <a class="link-dark text-decoration-none" target="e_blank" href="https://letslaw.es/terminos-y-condiciones-sitio-web/#:~:text=Concretamente%2C%20los%20T%C3%A9rminos%20y%20Condiciones,a%20trav%C3%A9s%20del%20sitio%20web.">Terminos de uso</a>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <script src="/citascocina/vista/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
