<?php include "inc/config.php"; ?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title><?= NOM_LOGICIEL; ?> - CONNEXION</title>

    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= ROOT,ASSETS,IMAGES; ?>favicon.png">
    <link rel="apple-touch-icon" href="<?= ROOT,ASSETS,IMAGES; ?>icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="<?= ROOT,ASSETS,IMAGES; ?>icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="<?= ROOT,ASSETS,IMAGES; ?>icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="<?= ROOT,ASSETS,IMAGES; ?>icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="<?= ROOT,ASSETS,IMAGES; ?>icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="<?= ROOT,ASSETS,IMAGES; ?>icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="<?= ROOT,ASSETS,IMAGES; ?>icon152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="<?= ROOT,ASSETS,IMAGES; ?>icon180.png" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>bootstrap.min.css">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>plugins.css">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>main.css">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>themes.css">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
    <script src="<?= ROOT,ASSETS,JS,VENDOR; ?>modernizr-2.7.1-respond-1.4.2.min.js"></script>
</head>
<body>
<!-- Login Background -->
<div id="login-background">
    <!-- For best results use an image with a resolution of 2560x400 pixels (prefer a blurred image for smaller file size) -->
    <img src="<?= ROOT,ASSETS,IMAGES; ?>placeholders/headers/login_header.jpg" alt="Login Background" class="animation-pulseSlow">
</div>
<!-- END Login Background -->

<!-- Login Container -->
<div id="login-container" class="animation-fadeIn">
    <!-- Login Title -->
    <div class="login-title text-center">
        <h1><i class="gi gi-flash"></i> <strong><?= NOM_LOGICIEL; ?></strong><br><small>Connexion</small></h1>
    </div>
    <!-- END Login Title -->

    <!-- Login Block -->
    <div class="block push-bit">
        <!-- Login Form -->
        <form action="<?= ROOT,CONTROL; ?>client.php" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                        <input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                        <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-xs-4">

                </div>
                <div class="col-xs-8 text-right">
                    <button type="submit" class="btn btn-sm btn-primary" name="action" value="connexion"><i class="fa fa-angle-right"></i> Connexion</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 text-center">
                    <a href="index.php?view=login&sub=pass_reminder"><small>Mot de passe, Perdu ?</small></a>
                </div>
            </div>
        </form>
        <!-- END Login Form -->
    </div>
    <!-- END Login Block -->

    <!-- Footer -->
    <footer class="text-muted text-center">
        <small><span id="year-copy"></span> &copy; SAS CRIDIP - Solution Web Developpement</small>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Login Container -->

<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>!window.jQuery && document.write(decodeURI('%3Cscript src="<?= ROOT,ASSETS,JS; ?>vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

<!-- Bootstrap.js, Jquery plugins and Custom JS code -->
<script src="<?= ROOT,ASSETS,JS; ?>vendor/bootstrap.min.js"></script>
<script src="<?= ROOT,ASSETS,JS; ?>plugins.js"></script>
<script src="<?= ROOT,ASSETS,JS; ?>app.js"></script>
<script type="text/javascript" src="<?= ROOT,ASSETS,JS; ?>modify.js"></script>
<?php if(isset($_GET['error']) && $_GET['error'] == 'user'){ ?>
    <script type="text/javascript">
        toastr.error("Le nom d'utilisateur ou le mot de passe sont erroné", "CONNEXION IMPOSSIBLE",{
            positionClass: "toast-top-full-width",
            timeOut: "10000"
        });
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'multi-user'){ ?>
    <script type="text/javascript">
        toastr.error("Erreur critique dans la base de donnée.<br>Contacteé l'administrateur système.", "CONNEXION IMPOSSIBLE",{
            positionClass: "toast-top-full-width",
            timeOut: "10000"
        });
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'champs'){ ?>
    <script type="text/javascript">
        toastr.warning("Un ou plusieurs champs ne sont pas remplie", "CONNEXION IMPOSSIBLE",{
            positionClass: "toast-top-full-width",
            timeOut: "10000"
        });
    </script>
<?php } ?>

<!-- Load and execute javascript code used only in this page -->
<script src="<?= ROOT,ASSETS,JS; ?>pages/login.js"></script>
<script>$(function(){ Login.init(); });</script>
</body>
</html>