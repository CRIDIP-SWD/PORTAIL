<?php
$nom_sector = "";
$nom_page   = "Connexion à l'espace client";
include "inc/config.php";
?>
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>
</head>
<body>
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <img src="assets/images/logo.png" height="54" alt="Porto Admin" />
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> <?= $nom_page; ?></h2>
            </div>
            <div class="panel-body">
                <form action="<?= ROOT,CONTROL; ?>client.php" method="post">
                    <div class="form-group mb-lg">
                        <label>Adresse Mail</label>
                        <div class="input-group input-group-icon">
                            <input name="email" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label class="pull-left">Mot de Passe</label>
                            <a href="pages-recover-password.html" class="pull-right">Mot de passe Perdu ?</a>
                        </div>
                        <div class="input-group input-group-icon">
                            <input name="password" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-block btn-info" name="action" value="connexion"><i class="fa fa-unlock"></i> Connexion</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2015. All Rights Reserved.</p>
    </div>
</section>
<!-- CSS PAGE-->
<link rel="stylesheet" href="<?= ROOT,ASSETS,VENDOR; ?>pnotify/pnotify.custom.css" />
<!-- END CSS PAGE-->

<!-- Vendor -->
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery/jquery.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>bootstrap/js/bootstrap.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>nanoscroller/nanoscroller.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>magnific-popup/magnific-popup.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-placeholder/jquery.placeholder.js"></script>

<!-- JS PAGE -->
<script src="<?= ROOT,ASSETS,VENDOR; ?>pnotify/pnotify.custom.js"></script>
<!-- END JS PAGE -->

<!-- Theme Base, Components and Settings -->
<script src="<?= ROOT,ASSETS,JS; ?>theme.js"></script>

<!-- Theme Custom -->
<script src="<?= ROOT,ASSETS,JS; ?>theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= ROOT,ASSETS,JS; ?>theme.init.js"></script>
<?php if(isset($_GET['error']) && $_GET['error'] == 'user'){ ?>
    <script type="text/javascript">
        var notice = new PNotify({
            title: 'ERREUR',
            text: 'Adresse Mail ou Mot de passe incorrect !',
            type: 'error',
            addclass: 'stack-bottomright'
        });
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'multi-user'){ ?>
    <script type="text/javascript">
        var notice = new PNotify({
            title: 'ERREUR',
            text: 'Problème avec la base de donnée',
            type: 'error',
            addclass: 'stack-bottomright'
        });
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'user'){ ?>
    <script type="text/javascript">
        var notice = new PNotify({
            title: 'ATTENTION',
            text: 'Un ou plusieurs champs ne sont pas renseigner !',
            type: 'notice',
            addclass: 'stack-bottomright'
        });
    </script>
<?php } ?>

</body>
</html>