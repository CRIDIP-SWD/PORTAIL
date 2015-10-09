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
            <?php if(!isset($_GET['sub'])){ ?>
                <h1 class="text-center">BIENVENUE SUR VOTRE PANEL UTILISATEUR</h1>
                <h3 class="text-center text-muted">Veuillez selectionner un lien du menu pour avoir un aperçu de votre compte.</h3>
            <?php } ?>
            <?php if(isset($_GET['sub']) && $_GET['sub'] == 'etat_service'){ ?>
                <h1>ETAT DES SERVICES GWC</h1>
                <div class="row">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                <div class="panel-actions">
                                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                </div>

                                <h2 class="panel-title">SERVEUR VPS</h2>
                            </header>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped mb-none" id="etat_service_serveur">
                                    <thead>
                                        <tr>
                                            <th>Zone</th>
                                            <th>Nom du Serveur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql_service_serveur = mysql_query("SELECT * FROM p_service WHERE type_service = 'server'")or die(mysql_error());
                                    while($s_serveur = mysql_fetch_array($sql_service_serveur))
                                    {
                                    ?>
                                        <tr class="<?php $etat = $ovh->get("/vps/".$s_serveur['designation']); if($etat['state'] == 'running'){echo 'success';}elseif($etat['state'] == 'stopping'){echo 'danger';}else{echo 'primary';} ?>">
                                            <td>
                                                <?php
                                                $vps = $ovh->get("/vps/".$s_serveur['designation']);
                                                echo $vps['zone'];
                                                ?>
                                            </td>
                                            <td><?= $s_serveur['designation']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            <?php } ?>
            <?php if(isset($_GET['sub']) && $_GET['sub'] == 'chantier'){ ?>
                <?php if(!isset($_GET['action'])){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">TRAVAUX CRIDIP</h2>
                                </header>
                                <div class="panel-body">
                                    <table class="table table-bordered table-striped mb-none" id="chantier_cridip">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Service</th>
                                            <th>Tache</th>
                                            <th>Date d'ouverture</th>
                                            <th>Etat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql_travaux_cridip = mysql_query("SELECT * FROM p_travaux WHERE infrastructure = 'CRIDIP'")or die(mysql_error());
                                        while($travaux_cridip = mysql_fetch_array($sql_travaux_cridip))
                                        {
                                            ?>
                                            <tr onclick="window.location.href='index.php?view=index&sub=chantier&action=view&idtravaux=<?= $travaux_cridip['idtravaux']; ?>'" style="cursor: pointer;">
                                                <td><?= $travaux_cridip['idtravaux']; ?></td>
                                                <td>
                                                    <?php
                                                    switch($travaux_cridip['type_travaux'])
                                                    {
                                                        case 1:
                                                            echo "<span class='label label-warning'>Maintenance</span>";
                                                            break;
                                                        case 2:
                                                            echo "<span class='label label-danger'>Incident</span>";
                                                            break;
                                                        case 3:
                                                            echo "<span class='label label-info'>Amélioration</span>";
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= html_entity_decode($travaux_cridip['service']); ?></td>
                                                <td><?= html_entity_decode($travaux_cridip['titre_travaux']); ?></td>
                                                <td><?= date("d-m-Y H:i", $travaux_cridip['date_travaux']); ?></td>
                                                <td>
                                                    <?php
                                                    switch($travaux_cridip['etat_travaux'])
                                                    {
                                                        case 0:
                                                            echo "<span class='label label-dark'><i class='fa fa-clock-o'></i> Programmer</span>";
                                                            break;
                                                        case 1:
                                                            echo "<span class='label label-dark'><i class='fa fa-refresh fa-spin'></i> En cours...</span>";
                                                            break;
                                                        case 2:
                                                            echo "<span class='label label-dark'><i class='fa fa-check-circle'></i> Terminer</span>";
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($_GET['action']) && $_GET['action'] == 'view'){ ?>
                    <?php
                    $idtravaux = $_GET['idtravaux'];
                    $sql_travaux = mysql_query("SELECT * FROM p_travaux WHERE idtravaux = '$idtravaux'")or die(mysql_error());
                    $travaux = mysql_fetch_array($sql_travaux);
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-dark" style="float: right;" onclick="history.back()"><i class="fa fa-arrow-circle-left"></i> RETOUR</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">
                                        #<?= $idtravaux; ?> - <?= html_entity_decode($travaux['titre_travaux']); ?>

                                    </h2>
                                    <span class="text-right">Tâche éditer le <?= date("d-m-Y à H:i", $travaux['date_travaux']); ?> </span>
                                </header>
                                <div class="panel-body">
                                    <h6>Attachée à l'infrastructure <?= $travaux['infrastructure']; ?></h6>
                                    <hr>
                                    <table style="width: 45%;">
                                        <tr>
                                            <td style="width: 50%;">Type:</td>
                                            <td style="width: 50%;">
                                                <?php
                                                switch($travaux['type_travaux'])
                                                {
                                                    case 1:
                                                        echo "<span class='label label-warning'>Maintenance</span>";
                                                        break;
                                                    case 2:
                                                        echo "<span class='label label-danger'>Incident</span>";
                                                        break;
                                                    case 3:
                                                        echo "<span class='label label-info'>Amélioration</span>";
                                                        break;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%;">Service:</td>
                                            <td style="width: 50%;"><?= $travaux['service']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%;">Etat:</td>
                                            <td style="width: 50%;">
                                                <?php
                                                switch($travaux['etat_travaux'])
                                                {
                                                    case 0:
                                                        echo "<span class='label label-dark'><i class='fa fa-clock-o'></i> Programmer</span>";
                                                        break;
                                                    case 1:
                                                        echo "<span class='label label-dark'><i class='fa fa-refresh fa-spin'></i> En cours...</span>";
                                                        break;
                                                    case 2:
                                                        echo "<span class='label label-dark'><i class='fa fa-check-circle'></i> Terminer</span>";
                                                        break;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?php
                                                switch($travaux['etat_travaux'])
                                                {
                                                    case 0:
                                                        echo "<div class='progress progress-striped progress-sm m-md light'><div style='width: 33%;' aria-valuemax='100' aria-valuemin='0' aria-valuenow='33' role='progressbar' class='progress-bar progress-bar-danger'><span class='sr-only'>60%</span></div></div>";
                                                        break;
                                                    case 1:
                                                        echo "<div class='progress progress-striped progress-sm m-md light'><div style='width: 66%;' aria-valuemax='100' aria-valuemin='0' aria-valuenow='66' role='progressbar' class='progress-bar progress-bar-warning'><span class='sr-only'>60%</span></div></div>";
                                                        break;
                                                    case 2:
                                                        echo "<div class='progress progress-striped progress-sm m-md light'><div style='width: 100%;' aria-valuemax='100' aria-valuemin='0' aria-valuenow='100' role='progressbar' class='progress-bar progress-bar-success'><span class='sr-only'>60%</span></div></div>";
                                                        break;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <strong>Détail</strong><br>
                                    <p><?= html_entity_decode($travaux['detail_travaux']); ?></p>
                                </div>
                            </section>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php if(isset($_GET['sub']) && $_GET['sub'] == 'support_wiki'){ ?>
                <?php if(!isset($_GET['action'])){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <h1 class="text-primary">Besoin d'aide ou d'information ?</h1>
                                        <p>Découvrez nos guides et discuter avec le support de SAS CRIDIP.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="<?= ROOT,ASSETS,IMAGES; ?>autre/support_slide.png" class="img-responsive" />
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="tabs">
                                        <ul class="nav nav-tabs nav-justified">
                                            <li class="active">
                                                <a href="#accueil" data-toggle="tab" class="text-center"> Accueil</a>
                                            </li>
                                            <li>
                                                <a href="#contact" data-toggle="tab" class="text-center"> Contactez-nous</a>
                                            </li>
                                            <li>
                                                <a href="#guides" data-toggle="tab" class="text-center"> Guides</a>
                                            </li>
                                            <li>
                                                <a href="#roadmap" data-toggle="tab" class="text-center"> RoadMap</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="accueil" class="tab-pane active">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <section class="panel panel-primary">
                                                            <div class="panel-body bg-info">
                                                                <h1 class="text-center">Découvrez nos guides</h1>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="well bg-dark">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <i class="fa fa-shopping-cart fa-5x" style="position: relative; left: 65px;"></i><br>
                                                                                    <h3 class="text-center">Commerce</h3>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <ul class="list-unstyled">
                                                                                        <li>
                                                                                            <a href="">Gestion</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="">Comptabilité</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="">Ventes</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="well bg-dark">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <i class="fa fa-code fa-5x" style="position: relative; left: 65px;"></i><br>
                                                                                    <h3 class="text-center">WEB</h3>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <ul class="list-unstyled">
                                                                                        <li>
                                                                                            <a href="">Domaine</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="">Serveur</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="">Téléphonie</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="">Infogérance</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="">Projet</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="well bg-dark">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <i class="fa fa-medkit fa-5x" style="position: relative; left: 65px;"></i><br>
                                                                                    <h3 class="text-center">SCPVS</h3>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <ul class="list-unstyled">
                                                                                        <li>
                                                                                            <a href="">Association</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="">Coaching</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="">Rendez-vous</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="owl-carousel" data-plugin-carousel data-plugin-options='{ "autoPlay": 3000, "items": 3, "itemsDesktop": [1199,4], "itemsDesktopSmall": [979,3], "itemsTablet": [768,2], "itemsMobile": [479,1] }'>
                                                            <div class="item spaced">
                                                                <div class="well bg-default text-center">
                                                                    <i class="fa fa-road"></i><br>
                                                                    <h2>ROADMAP</h2>
                                                                    <p>CRIDIP vous présente ces innovations</p>
                                                                    <a class="btn btn-info">Découvrir</a>
                                                                </div>
                                                            </div>
                                                            <div class="item spaced">
                                                                <div class="well bg-default text-center">
                                                                    <i class="fa fa-file"></i><br>
                                                                    <h2>GUIDE</h2>
                                                                    <p>A travers des guides complet, familiarisez-vous avec l'environnement de CRIDIP</p>
                                                                    <a class="btn btn-info">Accéder</a>
                                                                </div>
                                                            </div>
                                                            <div class="item spaced">
                                                                <div class="well bg-default text-center">
                                                                    <i class="fa fa-phone"></i><br>
                                                                    <h2>CONTACT</h2>
                                                                    <p>Un numéro pour tout les services</p>
                                                                    <a class="btn btn-info">Découvrir</a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="contact" class="tab-pane">
                                                <p>Recent <code>.nav-tabs.nav-justified</code></p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                                            </div>
                                            <div id="guides" class="tab-pane">
                                                <p>Recent <code>.nav-tabs.nav-justified</code></p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                                            </div>
                                            <div id="roadmap" class="tab-pane">
                                                <p>Recent <code>.nav-tabs.nav-justified</code></p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </section>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            <!-- end: page -->
        </section>
    </div>

</section>


<link rel="stylesheet" href="<?= ROOT,ASSETS,VENDOR; ?>pnotify/pnotify.custom.css" />
<link rel="stylesheet" href="<?= ROOT,ASSETS,VENDOR; ?>select2/select2.css" />
<link rel="stylesheet" href="<?= ROOT,ASSETS,VENDOR; ?>jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="<?= ROOT,ASSETS,VENDOR; ?>owl-carousel/owl.carousel.css" />
<link rel="stylesheet" href="<?= ROOT,ASSETS,VENDOR; ?>owl-carousel/owl.theme.css" />
<!-- Vendor -->
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery/jquery.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>bootstrap/js/bootstrap.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>nanoscroller/nanoscroller.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>magnific-popup/magnific-popup.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="<?= ROOT,ASSETS,VENDOR; ?>select2/select2.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>pnotify/pnotify.custom.js"></script>
<script src="<?= ROOT,ASSETS,VENDOR; ?>owl-carousel/owl.carousel.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= ROOT,ASSETS,JS; ?>theme.js"></script>

<!-- Theme Custom -->
<script src="<?= ROOT,ASSETS,JS; ?>theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= ROOT,ASSETS,JS; ?>theme.init.js"></script>


<!-- Examples -->
<script src="<?= ROOT,ASSETS,JS; ?>tables/examples.datatables.default.js"></script>
<script src="<?= ROOT,ASSETS,JS; ?>tables/examples.datatables.row.with.details.js"></script>
<script src="<?= ROOT,ASSETS,JS; ?>tables/examples.datatables.tabletools.js"></script>
<script src="<?= ROOT,ASSETS,JS; ?>ui-elements/examples.modals.js"></script>

</body>
</html>