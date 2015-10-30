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
                <div class="text-center"><img src="http://gestcom.cridip.com/assets/images/societe/cridip-paypal.png" class="img-responsive"/></div>
                <?php if(!isset($_GET['sub'])){ ?>
                    <?php if($client['cridip'] == 1){ ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center">BIENVENUE SUR VOTRE ESPACE CLIENT <strong>CRIDIP</strong></h1>
                                <h3 class="text-center text-muted">Veuillez selectionner un onglet du menu afin de voir vos documents.</h3>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur</h4> Soit vous n'êtes pas autorisez à acceder à cette onglet, soit aucun documents n'est disponible pour vous.</a>!
                        </div>
                    <?php } ?>
                <?php } ?>
                <?php if(isset($_GET['sub']) && $_GET['sub'] == 'devis'){ ?>
                    <div class="block">
                        <!-- Block Title -->
                        <div class="block-title">
                            <h2>Vos Devis</h2>
                        </div>
                        <!-- END Block Title -->

                        <!-- Block Content -->
                        <div class="table-responsive">
                            <table id="table-devis" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th>Numéro de Devis</th>
                                        <th class="text-center">Date du Devis</th>
                                        <th class="text-center">Date d'expiration</th>
                                        <th class="text-right">Total</th>
                                        <th class="text-center">Etat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_devis = mysql_query("SELECT * FROM c_devis WHERE idclient = '$idclient'")or die(mysql_error());
                                while($devis = mysql_fetch_array($sql_devis))
                                {
                                ?>
                                    <tr>
                                        <td><?= $devis['num_devis']; ?></td>
                                        <td class="text-center"><?= date("d/m/Y", $devis['date_devis']); ?></td>
                                        <td class="text-center">
                                            <?php
                                                if($devis['date_expire'] <= $date_jour_strt)
                                                {
                                                    echo "<span class='label label-danger' data-toggle='tooltip' data-original-title='Expiré'>".date('d/m/Y',$devis['date_expire'])."</span>";
                                                }else{
                                                    echo "<span class='label label-success'>".date('d/m/Y',$devis['date_expire'])."</span>";
                                                }
                                            ?>
                                        </td>
                                        <td class="text-right"><?= number_format($devis_class->total_ttc($devis['total_ht']), 2, ',', ' ')." €"; ?></td>
                                        <td class="text-center">
                                            <?= $devis_class->etat_devis_text($devis['etat_devis']); ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn" data-toggle="tooltip" data-original-title="Voir" onclick="window.location.href='<?= GESTCOM_TOKEN; ?>devis.php?num_devis=<?= $devis['num_devis']; ?>'"><i class="fa fa-eye text-info"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END Block Content -->
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