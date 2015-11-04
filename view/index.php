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
                                <?php
                                $sql_server_1 = mysql_query("SELECT * FROM p_service WHERE type_service = 'dedicated'")or die(mysql_error());
                                while($server = mysql_fetch_array($sql_server_1)){
                                    $ovh_stat_server = $ovh_1->get("/dedicated/server/".$server['designation']);
                                    ?>
                                    <tr class="<?php if($ovh_stat_server['state'] == 'ok'){echo "success";}else{echo "danger";} ?>">
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
                                                            echo "<i class='fa fa-wrench text-danger'></i> Maintenance";
                                                            break;
                                                        case 2:
                                                            echo "<i class='fa fa-warning text-warning'></i> Incident";
                                                            break;
                                                        case 3:
                                                            echo "<i class='fa fa-level-up text-success'></i> Amélioration";
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
                <?php if(isset($_GET['sub']) && $_GET['sub'] == 'view_travaux'){ ?>
                    <?php
                    $idtravaux = $_GET['idtravaux'];
                    $sql_travaux = mysql_query("SELECT * FROM p_travaux WHERE idtravaux = '$idtravaux'")or die(mysql_error());
                    $travaux = mysql_fetch_array($sql_travaux);
                    ?>
                    <div class="row">
                        <div class="pull-right">
                            <a class="btn btn-lg btn-primary" onclick="history.back()"><i class="fa fa-arrow-left"></i> RETOUR</a>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="block">
                                <!-- Block Title -->
                                <div class="block-title">
                                    <h2>Ticket: #<?= $travaux['idtravaux']; ?> - <strong><?= html_entity_decode($travaux['titre_travaux']); ?></strong></h2>
                                </div>
                                <table class="table">
                                    <tr>
                                        <td style="width: 50%; font-weight: bold;">Infrastructure:</td>
                                        <td style="width: 50%;"><?= $travaux['infrastructure']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%; font-weight: bold;">Service:</td>
                                        <td style="width: 50%;"><?= $travaux['service']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%; font-weight: bold;">Type:</td>
                                        <td style="width: 50%;">
                                            <?php
                                            switch($travaux['type_travaux'])
                                            {
                                                case 1:
                                                    echo "<i class='fa fa-wrench fa-lg text-danger'></i> Maintenance";
                                                    break;
                                                case 2:
                                                    echo "<i class='fa fa-warning fa-lg text-warning'></i> Incident";
                                                    break;
                                                case 3:
                                                    echo "<i class='fa fa-level-up fa-lg text-success'></i> Amélioration";
                                                    break;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%; font-weight: bold;">Date de Création:</td>
                                        <td style="width: 50%;"><?= date("d-m-Y à H:i", $travaux['date_travaux']); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%; font-weight: bold;">Date de mise à jour:</td>
                                        <td style="width: 50%;"><?= date("d-m-Y à H:i", $travaux['date_update']); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%; font-weight: bold;">Etat:</td>
                                        <td style="width: 50%;">
                                            <?php
                                            switch($travaux['etat_travaux'])
                                            {
                                                case 0:
                                                    echo "<div class='progress progress-striped active'><div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='33' aria-valuemin='0' aria-valuemax='100' style='width: 33%'></div></div>";
                                                    break;
                                                case 1:
                                                    echo "<div class='progress progress-striped active'><div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow='66' aria-valuemin='0' aria-valuemax='100' style='width: 66%'></div></div>";
                                                    break;
                                                case 2:
                                                    echo "<div class='progress progress-striped active'><div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div></div>";
                                                    break;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="block full">
                                <!-- Timeline Style Title -->
                                <div class="block-title">
                                    <h2>Detail & Commentaire</h2>

                                </div>
                                <!-- END Timeline Style Title -->

                                <!-- Timeline Style Content -->
                                <!-- You can remove the class .block-content-full if you want the block to have its regular padding -->
                                <div class="well">
                                    <?= html_entity_decode($travaux['detail_travaux']); ?>
                                </div>
                                <div class="timeline block-content-full">
                                    <!-- You can remove the class .timeline-hover if you don't want each event to be highlighted on mouse hover -->
                                    <ul class="timeline-list timeline-hover">
                                        <?php
                                        $sql_social_first = mysql_query("SELECT * FROM p_travaux_discussion WHERE idtravaux = '$idtravaux' ORDER BY idtravauxsocial DESC LIMIT 1")or die(mysql_error());
                                        while($social_first = mysql_fetch_array($sql_social_first))
                                        {
                                        ?>
                                        <li class="active">
                                            <div class="timeline-icon"><i class="gi gi-message_empty"></i></div>
                                            <div class="timeline-time"><?= date("d-m-Y à H:i", $social_first['date_social']); ?></div>
                                            <div class="timeline-content">
                                                <p class="push-bit"><?= html_entity_decode($social_first['description']); ?></p>
                                            </div>
                                        </li>
                                        <?php } ?>
                                        <?php
                                        $sql_social = mysql_query("SELECT * FROM p_travaux_discussion WHERE idtravaux = '$idtravaux' ORDER BY idtravauxsocial DESC LIMIT 1, 999")or die(mysql_error());
                                        while($social = mysql_fetch_array($sql_social))
                                        {
                                        ?>
                                        <li class="">
                                            <div class="timeline-icon"><i class="gi gi-message_empty"></i></div>
                                            <div class="timeline-time"><?= date("d-m-Y à H:i", $social['date_social']); ?></div>
                                            <div class="timeline-content">
                                                <p class="push-bit"><?= html_entity_decode($social['description']); ?></p>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <!-- END Timeline Style Content -->
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($_GET['sub']) && $_GET['sub'] == 'profil'){ ?>
                    <?php
                    $idclient = $client['idclient'];
                    ?>
                    <div class="content-header content-header-media">
                        <div class="header-section">
                            <img src="<?= ROOT,ASSETS,IMAGES; ?>placeholders/avatars/avatar2.jpg" alt="Avatar" class="pull-right img-circle">
                            <h1><?= $client['nom_client']; ?> <br><small><?= $client['nom_societe']; ?></small></h1>
                        </div>
                        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
                        <img src="<?= ROOT,ASSETS,IMAGES; ?>placeholders/headers/profile_header.jpg" alt="header image" class="animation-pulseSlow">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="block">
                                <!-- Block Title -->
                                <div class="block-title">
                                    <h2>Votre Profil</h2>
                                </div>
                                <!-- END Block Title -->

                                <!-- Block Content -->
                                <div class="text-center">
                                    <img src="<?= ROOT,ASSETS,IMAGES; ?>placeholders/avatars/avatar2.jpg" class="img-circle" />
                                    <h1><strong><?= $client['nom_societe']; ?></strong></h1>
                                    <h4 class="text-muted"><?= $client['nom_client']; ?></h4>
                                </div>
                                <div class="block">
                                    <!-- Block Content -->
                                    <div class="list-group">
                                        <a href="index.php?view=index&sub=profil" class="list-group-item <?php if($_GET['sub'] == 'profil'){echo 'active';} ?>">
                                            <h4 class="list-group-item-heading">Accueil</h4>
                                        </a>
                                        <a href="index.php?view=index&sub=compte" class="list-group-item <?php if($_GET['sub'] == 'compte'){echo 'active';} ?>">
                                            <h4 class="list-group-item-heading">Compte</h4>
                                        </a>
                                    </div>

                                    <!-- END Block Content -->
                                </div>

                                <!-- END Block Content -->
                            </div>
                        </div>
                        <div class="col-md-8">
                            <?php if($client['etat_client'] == 0){ ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="fa fa-times-circle"></i> Erreur</h4> Votre compte n'est pas actif ou aucune prestation n'est disponible !
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                <?php } ?>
                <?php if(isset($_GET['sub']) && $_GET['sub'] == 'compte'){ ?>
                    <div class="content-header content-header-media">
                        <div class="header-section">
                            <img src="<?= ROOT,ASSETS,IMAGES; ?>placeholders/avatars/avatar2.jpg" alt="Avatar" class="pull-right img-circle">
                            <h1><?= $client['nom_client']; ?> <br><small><?= $client['nom_societe']; ?></small></h1>
                        </div>
                        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
                        <img src="<?= ROOT,ASSETS,IMAGES; ?>placeholders/headers/profile_header.jpg" alt="header image" class="animation-pulseSlow">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="block">
                                <!-- Block Title -->
                                <div class="block-title">
                                    <h2>Votre Profil</h2>
                                </div>
                                <!-- END Block Title -->

                                <!-- Block Content -->
                                <div class="text-center">
                                    <img src="<?= ROOT,ASSETS,IMAGES; ?>placeholders/avatars/avatar2.jpg" class="img-circle" />
                                    <h1><strong><?= $client['nom_societe']; ?></strong></h1>
                                    <h4 class="text-muted"><?= $client['nom_client']; ?></h4>
                                </div>
                                <div class="block">
                                    <!-- Block Content -->
                                    <div class="list-group">
                                        <a href="index.php?view=index&sub=profil" class="list-group-item <?php if($_GET['sub'] == 'profil'){echo 'active';} ?>">
                                            <h4 class="list-group-item-heading">Accueil</h4>
                                        </a>
                                        <a href="index.php?view=index&sub=compte" class="list-group-item <?php if($_GET['sub'] == 'compte'){echo 'active';} ?>">
                                            <h4 class="list-group-item-heading">Compte</h4>
                                        </a>

                                    </div>

                                    <!-- END Block Content -->
                                </div>

                                <!-- END Block Content -->
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="block full">
                                <!-- Block Tabs Title -->
                                <div class="block-title">
                                    <ul class="nav nav-tabs pull-right" data-toggle="tabs">
                                        <li class="active"><a href="#info">Information Personnel</a></li>
                                        <li><a href="#modif-password">Modifier le mot de passe</a></li>
                                        <li><a href="#info-bancaire">Information Bancaire</a></li>
                                    </ul>
                                </div>
                                <!-- END Block Tabs Title -->

                                <!-- Tabs Content -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="info">
                                        <form class="form-horizontal" action="<?= ROOT,CONTROL; ?>client.php" method="post">
                                            <input type="hidden" name="idclient" value="<?= $idclient; ?>" />

                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-hf-email">Votre identité</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="nom_client" class="form-control" value="<?= $client['nom_client']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-hf-email">Votre Société</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="nom_societe" class="form-control" value="<?= $client['nom_societe']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-hf-email">Adresse Mail</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="adresse_email" class="form-control" value="<?= $client['email']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-hf-email">Votre N° de téléphone</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="telephone" name="telephone" class="form-control" value="<?= substr($client['telephone'], 4); ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-textarea-input">Adresse Postal</label>
                                                <div class="col-md-9">
                                                    <textarea name="adresse" rows="6" class="form-control"><?= html_entity_decode($client['adresse']); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-hf-email">Code Postal</label>
                                                <div class="col-md-2">
                                                    <input type="text" id="code_postal" name="code_postal" class="form-control" value="<?= $client['code_postal']; ?>">
                                                </div>
                                                <label class="col-md-3 control-label" for="example-hf-email">Ville</label>
                                                <div class="col-md-4">
                                                    <input type="text" name="ville" class="form-control" value="<?= html_entity_decode($client['ville']); ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-hf-email">Région</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="region" class="form-control" value="<?= html_entity_decode($client['region']); ?>">
                                                </div>
                                            </div>

                                            <div class="form-group form-actions">
                                                <div class="col-sm-offset-9">
                                                    <button class="btn btn-sm btn-primary" type="submit" name="action" value="edit-client-control"><i class="fa fa-pencil"></i> Modifier</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="tab-pane" id="modif-password">
                                        <form class="form-horizontal" id="form-validation" action="<?= ROOT,CONTROL; ?>client.php" method="post">
                                            <input type="hidden" name="idclient" value="<?= $idclient; ?>" />

                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_password">Mot de passe <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="password" id="val_password" name="password" class="form-control">
                                                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_confirm_password">Confirmation du mot de passe <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="password" id="val_confirm_password" name="confirm_password" class="form-control">
                                                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group form-actions">
                                                <div class="col-sm-offset-9">
                                                    <button class="btn btn-sm btn-primary" type="submit" name="action" value="modif-password-control"><i class="fa fa-pencil"></i> Modifier</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="tab-pane" id="info-bancaire">
                                        <div class="block">
                                            <!-- Block Title -->
                                            <div class="block-title">
                                                <h2>Vos Information Bancaire</h2>
                                            </div>
                                            <!-- END Block Title -->

                                            <!-- Block Content -->
                                            <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#add-info-bancaire"><i class="fa fa-plus"></i> Ajouter des coordonnées bancaire</button>
                                            <div class="table-responsive">
                                                <!--
                                                Available Table Classes:
                                                    'table'             - basic table
                                                    'table-bordered'    - table with full borders
                                                    'table-borderless'  - table with no borders
                                                    'table-striped'     - striped table
                                                    'table-condensed'   - table with smaller top and bottom cell padding
                                                    'table-hover'       - rows highlighted on mouse hover
                                                    'table-vcenter'     - middle align content vertically
                                                -->
                                                <table id="general-table" class="table table-striped table-vcenter">
                                                    <thead>
                                                        <tr>
                                                            <th>BIC</th>
                                                            <th>IBAN</th>
                                                            <th>Etat</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $sql_bq = mysql_query("SELECT * FROM client_bancaire WHERE idclient = '$idclient'")or die(mysql_error());
                                                    while($bq = mysql_fetch_array($sql_bq))
                                                    {
                                                    ?>
                                                        <tr>
                                                            <td><?= $bq['bic']; ?></td>
                                                            <td><?= $bq['iban']; ?></td>
                                                            <td>
                                                                <?php if($bq['signed'] == 0){echo "<span class='label label-danger'>Non Signé</span>";} ?>
                                                                <?php if($bq['signed'] == 1){echo "<span class='label label-success'>Valider</span>";} ?>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn" onclick="window.location.href='<?= ROOT,CONTROL; ?>client.php?action=supp-info-bancaire&idclient=<?= $bq['idclient']; ?>&idclientbancaire=<?= $bq['idclientbancaire']; ?>'" data-toggle="tooltip" data-original-title="Supprimer le compte bancaire"><i class="fa fa-times text-danger"></i></button>
                                                                <?php if($bq['signed'] == 0){ ?>
                                                                    <button type="button" class="btn" onclick="window.location.href='<?= GESTCOM_TOKEN; ?>pdf/prlv.php?idclientbancaire=<?= $bq['idclientbancaire']; ?>&type=download'" data-toggle="tooltip" data-original-title="Télécharger la demande prélèvement"><i class="fa fa-file-pdf-o text-info"></i></button>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END Block Content -->
                                        </div>
                                    </div>
                                </div>
                                <!-- END Tabs Content -->
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="add-info-bancaire" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="largeModalHead"><i class="fa fa-plus"></i> Ajout d'une Information Bancaire</h4>
                                </div>
                                <form class="form-horizontal" action="<?= ROOT,CONTROL; ?>client.php" method="POST">
                                    <input type="hidden" name="idclient" value="<?= $idclient; ?>" />
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">BIC</label>
                                            <div class="col-md-10">
                                                <input type="text" id="masked_bic" class="form-control" name="bic" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">IBAN</label>
                                            <div class="col-md-10">
                                                <input type="text" id="masked_iban" class="iban form-control" name="iban" placeholder="FRXX XXXX XXXX XXXX XXXX"/>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="action" value="add-info-bancaire"><i class="fa fa-check"></i> Valider</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
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
            <script src="<?= ROOT,ASSETS,JS; ?>pages/formsGeneral.js"></script>
            <script>$(function(){ FormsGeneral.init(); });</script>
            <script src="<?= ROOT,ASSETS,JS; ?>pages/formsValidation.js"></script>
            <script>$(function(){ FormsValidation.init(); });</script>
            <script src="<?= ROOT,ASSETS,JS; ?>pages/tablesGeneral.js"></script>
            <script>$(function(){ TablesGeneral.init(); });</script>
            <?php if(isset($_GET['success']) && $_GET['success'] == 'edit-client'){ ?>
                <script type="text/javascript">
                    toastr.success("Vos informations ont bien été modifier","", {
                        "positionClass": "toast-bottom-right"
                    })
                </script>
            <?php } ?>
            <?php if(isset($_GET['success']) && $_GET['success'] == 'modif-pass'){ ?>
                <script type="text/javascript">
                    toastr.success("Votre mot de passe à été modifié","", {
                        "positionClass": "toast-bottom-right"
                    })
                </script>
            <?php } ?>
            <?php if(isset($_GET['success']) && $_GET['success'] == 'supp-info-bancaire'){ ?>
                <script type="text/javascript">
                    toastr.success("Vos informations Bancaires ont été supprimer","", {
                        "positionClass": "toast-bottom-right"
                    })
                </script>
            <?php } ?>
            <?php if(isset($_GET['success']) && $_GET['success'] == 'add-info-bancaire'){ ?>
                <script type="text/javascript">
                    toastr.success("Vos informations Bancaires ont été ajouter","", {
                        "positionClass": "toast-bottom-right"
                    })
                </script>
            <?php } ?>

            <?php if(isset($_GET['error']) && $_GET['error'] == 'edit-client'){ ?>
                <script type="text/javascript">
                    toastr.error("Une erreur à eu lieu lors de la modification de vos information","", {
                        "positionClass": "toast-bottom-right"
                    })
                </script>
            <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] == 'modif-pass'){ ?>
                <script type="text/javascript">
                    toastr.error("Une erreur à eu lieu lors de la modification de votre mot de passe","", {
                        "positionClass": "toast-bottom-right"
                    })
                </script>
            <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] == 'supp-info-bancaire'){ ?>
                <script type="text/javascript">
                    toastr.error("Vos informations Bancaires n'ont pas été supprimer","ERREUR", {
                        "positionClass": "toast-bottom-right"
                    })
                </script>
            <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] == 'add-info-bancaire'){ ?>
                <script type="text/javascript">
                    toastr.error("Vos informations Bancaires n'ont pas été ajouter","ERREUR", {
                        "positionClass": "toast-bottom-right"
                    })
                </script>
            <?php } ?>

            <?php if(isset($_GET['warning']) && $_GET['warning'] == 'no-egal'){ ?>
                <script type="text/javascript">
                    toastr.warning("Les mots de passes rentrée doivent être identiques","", {
                        "positionClass": "toast-bottom-right"
                    })
                </script>
            <?php } ?>
            <?php if(isset($_GET['warning']) && $_GET['warning'] == 'no-egal'){ ?>
                <script type="text/javascript">
                    toastr.warning("Un ou plusieurs champs sont vide","", {
                        "positionClass": "toast-bottom-right"
                    })
                </script>
            <?php } ?>

</body>
</html>