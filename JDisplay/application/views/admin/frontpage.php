<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="<?= base_url();?>assets/frontend/vendor/font-awesome/css/font-awesome.min.css">

        <link href="<?= base_url();?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,300,600,700,800,400' rel='stylesheet' type='text/css'> 

        <link href="<?= base_url();?>assets/frontend/vendor/flexslider/flexslider.css" rel="stylesheet">
        <link href="<?= base_url();?>assets/frontend/vendor/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?= base_url();?>assets/frontend/css/style.css" rel="stylesheet">
        
        <title>ATVLI News</title>

    </head>
    <body>
        <!-- Header -->
        <div id="menu">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-content">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                          <a class="navbar-brand" href="#">
                            <img src="<?= base_url();?>assets/frontend/img/other/03_Logo.png"> <span>ATVLI</span>
                          </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="menu-content">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#service">Profile</a></li>
                            <li><a href="#experience">About Us</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <header>
            <img src="<?= base_url();?>assets/frontend/img/background/tablet/01_Background_image_1.jpg" class="hidden-xs big-header">
            <img src="<?= base_url();?>assets/frontend/img/background/mobile/01_Background_image_1.jpg" class="visible-xs big-header">   
            <div class="container">
                <h2 class="main-headline">ATVLI KONGRESS.</h2>
            </div>
        </header>
        
        <!-- Service section -->
        <section id="service" class="feature">
            <div class="container">
                <div class="row">
                    <h2 class="sec-title">Profile</h2>
                </div>
                <div class="row">
                    <div class="col-sm-3 item">
                        <div class="i-wrapper">
                            <a href="<?= base_url();?>assets/doc/Anggota.pdf" target="_blank"><i class="fa fa-puzzle-piece fa-fw"></i></a>
                        </div>
                        <h4>Anggota ATVLI</h4>
                        <div class="sep"></div>
                        <p>
                            PERKUMPULAN ANGGOTA TELEVISI LOKAL INDONESIA
                            d/a Gedung Bali Pos Lt. 2 Jl. Palmerah Barat No. 21 F - Jakarta 10270
                            Tel/Fax: 021-535.0592
                            Web: www.atvli.or.id Email: sekretariat@atvli.or.id
                        </p>
                    </div>
                    <div class="col-sm-3 item">
                        <div class="i-wrapper">
                            <a href="<?= base_url();?>assets/doc/Deklarasi.pdf" target="_blank"><i class="fa fa-coffee fa-fw"></i></a>
                        </div>
                        <h4>Deklarasi ATVLI</h4>
                        <div class="sep"></div>
                        <p>
                            Dalam rangka Hari Jadi Asosiasi Televisi Lokal Indonesia (ATVLI) Ke-6 maka seluruh Anggota ATVLI
                            yang melaksanakan Kongres ke-III ATVLI pada tanggal 20-21 Juli 2008 di Ubud Bali 
                        </p>
                    </div>
                    <div class="col-sm-3 item">
                        <div class="i-wrapper">
                            <a href="<?= base_url();?>assets/doc/Pengurus.pdf" target="_blank"><i class="fa fa-camera fa-fw"></i></a>
                        </div>
                        <h4>Pengurus ATVLI</h4>
                        <div class="sep"></div>
                        <p>
                            Susunan Pengurus ATVLI
                            Periode 2016-2020 
                        </p>
                    </div>
                    <div class="col-sm-3 item">
                        <div class="i-wrapper">
                            <a href="<?= base_url();?>assets/doc/Sejarah.pdf" target="_blank"><i class="fa fa-cloud-upload fa-fw"></i></a>
                        </div>
                        <h4>Sejarah ATVLI</h4>
                        <div class="sep"></div>
                        <p>
                            AWAL PERJALANAN ASOSIASI TELEVISI LOKAL INDONESIA
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of sevice section -->

        <!-- Emphasize section -->
    <!--    <section id="emphasize" class="center-back">
            <img src="img/background/tablet/02_Background_image_2.jpg" alt="" class="hidden-xs">
            <img src="img/background/mobile/02_Background_image_2.jpg" alt="" class="visible-xs">
            <div class="center-text">
                <p>
                    My design is </br>
                    about sexy
                </p>
            </div>
        </section> -->
        <!-- End emphasize section -->

        <!-- Parallax-->
        <section class="parallax back1" id="emphasize">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <p>
                           Asosiasi Televisi Lokal Indonesia
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Experience-->
        <section id="experience">
            <div class="container">
                <div class="row">
                    <h2>About Us</h2>
                    <div class="lt-exp-wrapper"> 
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <div class="clearfix">
                                        <div class="lt-house hidden-sm">
                                        </div>
                                        <div class="col-sm-12 lt-exp-content">
                                            <h4>
                                                <span>
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                                <span class="text">
                                                    ATVLI News
                                                </span>
                                            </h4>
                                            <p>
                                                Digunakan untuk pengiriman Materi, Materi dapat berupa : 
                                            </p>
                                            <ul>
                                                <li>
                                                    <i class="fa fa-circle"></i>Soft News Materi
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>Hard News Materi
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>Documenter
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="lt-time">
                                            <p>2222</p>
                                        </div>  
                                    </div>
                                </li>
                                <li>
                                    <div class="clearfix">
                                        <div class="lt-house hidden-sm">
                                        </div>
                                        <div class="col-sm-12 lt-exp-content">
                                            <h4>
                                                <span>
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                                <span class="text">
                                                    Pengajuan Akses 
                                                </span>
                                            </h4>
                                            <p>
                                                Anda dapat mengakases data di ATVLI News dengan persyaratan
                                            </p>
                                            <ul>
                                                <li>
                                                    <i class="fa fa-circle"></i>Anda menjadi kontributor.
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>Anda mengirimkan minimal 2 materi per minggu.
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>Materi yang dikirim harus valid dan terdapat comentar.
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="lt-time">
                                            <p>2222</p>
                                        </div>  
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- contact footer -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 widget w-info">
                        <p class="title">
                            let's socialize
                        </p>
                        <ul class="clearfix">
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            </li>
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-twitter-square"></i>
                                </a>
                            </li>
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-google-plus-square"></i>
                                </a>
                            </li>
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-pinterest-square"></i>
                                </a>
                            </li>
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-linkedin-square"></i>
                                </a>
                            </li>
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-github-square"></i>
                                </a>
                            </li>
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-rss"></i>
                                </a>
                            </li>
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-vimeo-square"></i>
                                </a>
                            </li>
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-youtube-square"></i>
                                </a>
                            </li>
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-flickr"></i>
                                </a>
                            </li>
                            <li class="col-xs-2">
                                <a href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                        <p>No. 79 Brooside Ave Richmond CA 84905</p>
                        <p>Phone: (000) 000-0000</p>
                        <p>Email: <a href="mailto:themesjuice@gmail.com" target="_top">themesjuice@gmail.com</a></p>
                    </div>
                    <div class="col-sm-4 widget w-contact">
                        <p class="title">
                            send a pigeon
                        </p>
                        <form class="clearfix">
                            <input name="name" type="textbox" placeholder="Name:">
                            <input name="email" type="textbox" placeholder="Email:">
                            <textarea name="message"  placeholder="Message:"></textarea>
                            <input type="submit" name="send" value="Send">
                        </form>
                    </div>
                    <div class="col-sm-4 widget w-recent-proj">
                        <p class="title">
                            Recent projects
                        </p>
                        <ul class="project">
                            <li>
                                <a href="#">
                                    <img src="<?= base_url();?>assets/frontend/img/footer/01.jpg" alt="">
                                </a>
                            </li>
                            <li class="even">
                                <a href="#">
                                    <img src="<?= base_url();?>assets/frontend/img/footer/02.jpg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="<?= base_url();?>assets/frontend/img/footer/03.jpg" alt="">
                                </a>
                            </li>
                            <li class="even">
                                <a href="#">
                                    <img src="<?= base_url();?>assets/frontend/img/footer/04.jpg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="<?= base_url();?>assets/frontend/img/footer/05.jpg" alt="">
                                </a>
                            </li>
                            <li class="even">
                                <a href="#">
                                    <img src="<?= base_url();?>assets/frontend/img/footer/06.jpg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <div id="overlay">
                <img src="<?= base_url();?>assets/frontend/img/other/loading.gif">
        </div>

        <!-- footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <p class="col-xs-12 col-sm-5 copyright">
                        Copyright © 2013 - Designed by <a href="https://creativemarket.com/ThemesJuice">ThemesJuice</a>
                    </p>
                    <div class="col-xs-12 col-sm-7 ">
                        <div class="s-menu">
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#service">Services</a>
                                </li>
                                <li>
                                    <a href="#experience">Profile</a>
                                </li>
                                <li>
                                    <a href="#portfolio">Portfolio</a>
                                </li>
                                <li>
                                    <a href="#testimonial">Testimonials</a>
                                </li>
                                <li>
                                    <a href="login">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>   

        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/jquery2.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/moderniz.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/jquery.easing.1.3.js"></script>
         <!-- <script type="text/javascript" src="vendor/jquery.stellar.min.js"></script> -->
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/waypoints.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/jquery.easypiechart.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/flexslider/jquery.flexslider.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/jquery-scrollto.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/jquery.quicksand.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/placeholders.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/prettyphoto/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/vendor/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/frontend/js/main.js"></script>

    </body>
</html> 

