<?php
$nom_sector = "";
$nom_page   = "";
include ('inc/header.php');
?>
<body>
<section class="body">


    <?php include "inc/headerbar.php"; ?>
    <div class="inner-wrapper">
        <?php include ("inc/sidebar.php"); ?>

        <section role="main" class="content-body">
            <header class="page-header">


                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="<?= ROOT; ?>">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <?php if(!empty($nom_sector)){echo "<li>".$nom_sector."</li>";} ?>
                        <?php if(!empty($nom_page)){echo "<li>".$nom_page."</li>";} ?>
                    </ol>
                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <h1 class="text-center">BIENVENUE SUR VOTRE PANEL UTILISATEUR</h1>
            <h3 class="text-center text-muted">Veuillez selectionner un lien du menu pour avoir un aperçu de votre compte.</h3>
            <div class="row">
                <div class="col-md-6">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title">Statut des Serveurs</h2>
                        </header>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table mb-none">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- end: page -->
        </section>
    </div>

    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close visible-xs">
                    Collapse <i class="fa fa-chevron-right"></i>
                </a>

                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark" ></div>

                        <ul>
                            <li>
                                <time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
                                <span>Company Meeting</span>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-widget widget-friends">
                        <h6>Friends</h6>
                        <ul>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </aside>
</section>

<!-- Vendor -->
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery/jquery.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>bootstrap/js/bootstrap.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>nanoscroller/nanoscroller.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>magnific-popup/magnific-popup.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-appear/jquery.appear.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-easypiechart/jquery.easypiechart.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>flot/jquery.flot.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>flot-tooltip/jquery.flot.tooltip.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>flot/jquery.flot.pie.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>flot/jquery.flot.categories.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>flot/jquery.flot.resize.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-sparkline/jquery.sparkline.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>raphael/raphael.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>morris/morris.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>gauge/gauge.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>snap-svg/snap.svg.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>liquid-meter/liquid.meter.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jqvmap/jquery.vmap.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jqvmap/data/jquery.vmap.sampledata.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jqvmap/maps/jquery.vmap.world.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jqvmap/maps/continents/jquery.vmap.africa.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jqvmap/maps/continents/jquery.vmap.asia.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jqvmap/maps/continents/jquery.vmap.australia.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jqvmap/maps/continents/jquery.vmap.europe.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= ROOT,ASSETS,JS; ?>theme.js"></script>

<!-- Theme Custom -->
<script src="<?= ROOT,ASSETS,JS; ?>theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= ROOT,ASSETS,JS; ?>theme.init.js"></script>


<!-- Examples -->
<script src="<?= ROOT,ASSETS,JS; ?>dashboard/examples.dashboard.js"></script>
<script src="<?= ROOT,ASSETS,JS; ?>ui-elements/examples.widgets.js"></script>
</body>
</html>