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

                                <h2 class="panel-title">SERVEUR</h2>
                            </header>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped mb-none" id="etat_service_serveur">
                                    <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th class="hidden-phone">Engine version</th>
                                            <th class="hidden-phone">CSS grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeX">
                                            <td>Trident</td>
                                            <td>Internet
                                                Explorer 4.0
                                            </td>
                                            <td>Win 95+</td>
                                            <td class="center hidden-phone">4</td>
                                            <td class="center hidden-phone">X</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            <?php } ?>
            <!-- end: page -->
        </section>
    </div>

</section>


<link rel="stylesheet" href="<?= ROOT,ASSETS,VENDOR; ?>pnotify/pnotify.custom.css" />
<link rel="stylesheet" href="<?= ROOT,ASSETS,VENDOR; ?>select2/select2.css" />
<link rel="stylesheet" href="<?= ROOT,ASSETS,VENDOR; ?>jquery-datatables-bs3/assets/css/datatables.css" />
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