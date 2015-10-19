<?php include ('inc/header.php'); ?>
<body>
<!-- Page Wrapper -->
<!-- In the PHP version you can set the following options from inc/config file -->
<!--
    Available classes:

    'page-loading'      enables page preloader
-->
<div id="page-wrapper">
    <!-- Preloader -->
    <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
    <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
    <!-- END Preloader -->

    <!-- Page Container -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
        Available #page-container classes:

        '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

        'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
        'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
        'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
        'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
        'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

        'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
        'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
        'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

        'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

        'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

        'style-alt'                                     for an alternative main style (without it: the default style)
        'footer-fixed'                                  for a fixed footer (without it: a static footer)

        'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

        'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
        'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar
    -->
    <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
        <?php include "inc/alt_sidebar.php"; ?>

        <?php include "inc/sidebar.php"; ?>

        <!-- Main Container -->
        <div id="main-container">
            <?php include "inc/headerbar.php"; ?>

            <!-- Page content -->
            <div id="page-content">
                <?php if(!isset($_GET['sub'])){ ?>
                    <div class="row">
                        <div class="col-md-2">
                            <span class="arrow vtr" style="position: relative; top: 30px; left: 200px"></span>
                        </div>
                        <div class="col-md-10">
                            <h1 class="text-center">BIENVENUE SUR VOTRE ESPACE CLIENT</h1>
                            <h3 class="text-center text-muted">Veuillez selectionner un onglet afin de choisir l'espace concerner.</h3>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($_GET['sub']) && $_GET['sub'] == 'etat_service'){ ?>
                    <div class="block">
                        <!-- Row Styles Title -->
                        <div class="block-title">
                            <h2>ETAT DES SERVICE</h2>
                        </div>
                        <!-- END Row Styles Title -->

                        <!-- Row Styles Content -->
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                <tr>
                                    <th>SERVICE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="<?php if($ovh->get('/me')){echo "success";}else{echo "danger";} ?>">
                                    <td>OVH</td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                <tr>
                                    <th>SERVEUR</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_server = mysql_query("SELECT * FROM p_service WHERE type_service = 'server'")or die(mysql_error());
                                while($server = mysql_fetch_array($sql_server)){
                                    $ovh_stat_server = $ovh->get("/vps/".$server['designation']);
                                ?>
                                    <tr class="<?php if($ovh_stat_server['state'] == 'running'){echo "success";}else{echo "danger";} ?>">
                                        <td><?= $server['designation']; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END Row Styles Content -->
                    </div>
                <?php } ?>
                <?php if(isset($_GET['sub']) && $_GET['sub'] == 'travaux'){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <div class="block-title"><h4>TRAVAUX</h4></div>
                                <div class="table-responsive">
                                    <table id="table-travaux" class="table table-vcenter table-condensed table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Numéro</th>
                                                <th class="text-center">Infrastructure</th>
                                                <th>Service</th>
                                                <th>Type</th>
                                                <th>Titre</th>
                                                <th>Date de Création</th>
                                                <th>Etat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql_travaux = mysql_query("SELECT * FROM p_travaux ORDER BY date_travaux ASC")or die(mysql_error());
                                        while($travaux = mysql_fetch_array($sql_travaux))
                                        {
                                        ?>
                                            <tr onclick="window.location='index.php?view=index&sub=view_travaux&idtravaux=<?= $travaux['idtravaux']; ?>'" style="cursor: hand;">
                                                <td>#<?= $travaux['idtravaux']; ?></td>
                                                <td><?= $travaux['infrastructure']; ?></td>
                                                <td><?= $travaux['service']; ?></td>
                                                <td>
                                                    <?php
                                                    switch($travaux['type_travaux'])
                                                    {
                                                        case 1:
                                                            echo "<span class='label label-default'><i class='fa fa-wrench text-danger'></i></span> Maintenance";
                                                            break;
                                                        case 2:
                                                            echo "<span class='label label-default'><i class='fa fa-warning text-warning'></i></span> Incident";
                                                            break;
                                                        case 3:
                                                            echo "<span class='label label-default'><i class='fa fa-level-up text-success'></i></span> Amélioration";
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= html_entity_decode($travaux['titre_travaux']); ?></td>
                                                <td><?= date("d-m-y à H:i", $travaux['date_travaux']); ?></td>
                                                <td>
                                                    <?php
                                                    switch($travaux['etat_travaux'])
                                                    {
                                                        case 0:
                                                            echo "<span class='label label-info'><i class='fa fa-clock-o'></i> Programmer</span>";
                                                            break;
                                                        case 1:
                                                            echo "<span class='label label-warning'><i class='fa fa-spinner fa-spin'></i> En cours...</span>";
                                                            break;
                                                        case 2:
                                                            echo "<span class='label label-success'><i class='fa fa-check-square-o'></i> Terminer</span>";
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- END Page Content -->

            <?php include "inc/footer.php"; ?>


<!-- Load and execute javascript code used only in this page -->
            <script src="<?= ROOT,ASSETS,JS; ?>pages/tablesDatatables.js"></script>
            <script>$(function(){ TablesDatatables.init(); });</script>
<script src="<?= ROOT,ASSETS,JS; ?>pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>
</body>
</html>