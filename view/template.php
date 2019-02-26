
<html>
    <head>
      
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, 
              initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Mon blog</title>

        <!-- Bootstrap Core CSS -->
        <link href="public/themes/vendor/bootstrap/css/bootstrap.min.css" 
              rel="stylesheet">

        <!-- Theme CSS -->
        <link href="public/themes/css/freelancer.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="public/themes/vendor/font-awesome/css/font-awesome.min.css"
              rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
              rel="stylesheet" type="text/css">
        <link 
            href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,
            700italic" 
            rel="stylesheet" type="text/css">



    </head>
    <body>
        <nav id="mainNav" 
             class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" 
                            data-toggle="collapse" 
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="#page-top">MON BLOG</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" 
                     id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="page-scroll">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="/projetoc/">ACCUEIL</a>
                        </li>
                        <li class="page-scroll">
                            <a href="/projetoc/?action=listposts">POST</a>
                        </li>

                        <li class="page-scroll">
                            <a href="/projetoc/?action=connection">CONNECTION</a>
                        </li>
                        <li class="page-scroll">
                            <a href="/projetoc/#Contact">CONTACT</a>
                        </li>


                        <?php
                        /**
                         * TEMPLATE MENU.
                         * 
                         * PHP version 7.2.4
                         * 
                         * @category Controlleur
                         * @package  Controlleur
                         * @author   Name <mail@mail.com>
                         * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
                         * @version  GIT: Release: 1.0.0
                         * @link     URL Documentation
                         */
                        if (isset($_SESSION['user'])) {
                            ?>
                            <li class="page-scroll">
                                <a style="color:red"> 
                                    <?php
                                    if ($_SESSION['user']->getRole() == 2) {
                                        echo 'Bienvenue Patron';
                                        ?></a></li><li class="page-scroll">
                                    <a style="color:red" 
                                       href="/projetoc/?action=admin&adminaction=viewadmin">ADMIN</a>

                                </li><?php
                            } else {

                                echo 'Bienvenue    ' .
                                htmlspecialchars($_SESSION['user']->getPseudo());
                            }
                            ?>
                            </a>
                            </li>
                            <li class="page-scroll">
                                <a style="color:black" 
                                   href="/projetoc/?action=disconnect">Deconnexion</a>
                            </li>

                            <?php
                        }
                        ?>  


                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <section id="Accueil">
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="intro-text">
                                <span class="name">JOSE MADRID</span>
                                <hr class="star-light">
                                <span class="skills">Le développeur des développeur!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>



            <?php echo $content ?>
        </div>

    </section>     

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-6">
                        <h3>Adresse</h3>
                        <p>33 Rue du moulin
                            <br>Roquebrune cap martin, CP 06190</p>
                    </div>
                    <div class="footer-col col-md-6">
                        <h3 class="section-heading">
                            Autres contacts & réseaux sociaux</h3>



                        <div class="col-lg-4 col-lg-offset-2 text-center">
                            <i class="glyphicon glyphicon-envelope 
                               fa-3x sr-contact"></i>
                            <p><a href="mailto:josemadridgil90@gmail.com">
                                    Voir mon Email</a></p>
                        </div>
                        <div class="col-lg-6 text-center">
                            <i class="glyphicon glyphicon-education fa-3x 
                               sr-contact"></i>
                            <p><a href="public/themes/img/cv.pdf" target="_blank">
                                    Voir mon CV</a></p>
                        </div>
                        <div class="col-lg-4 col-lg-offset-2 text-center">
                            <i class="fa-3x sr-contact"><img src="" alt=""></i>
                            <p><a href="https://github.com/Josemadrid" target="_blank">
                                    Voir mon GitHub</a></p>
                        </div>
                        <div class="col-lg-6 text-center">
                            <i class="fa-3x sr-contact"><img src="" alt=""></i>
                            <p><a href="https://openclassrooms.facebook.com/
                                  profile.php?id=100025253353466"
                                  target="_blank">Voir mon Workplace</a></p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            Copyright &copy; Josemadrid 2018
                        </div>
                    </div>
                </div>
            </div>
    </footer>


    <div class="scroll-top page-scroll hidden-sm hidden-xs 
         hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>



    <!-- jQuery -->
    <script src="public/themes/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/themes/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/
    jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="public/themes/js/jqBootstrapValidation.js"></script>


    <!-- Theme JavaScript -->
    <script src="public/themes/js/freelancer.js"></script>


</body>
</html>
</div>
</footer>
</body>
</html>
