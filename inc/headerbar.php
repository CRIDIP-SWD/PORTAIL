<!-- Header -->
<!-- In the PHP version you can set the following options from inc/config file -->
<!--
    Available header.navbar classes:

    'navbar-default'            for the default light header
    'navbar-inverse'            for an alternative dark header

    'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
        'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

    'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
        'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
-->
<header class="navbar navbar-default">
    <!-- Left Header Navigation -->
    <ul class="nav navbar-nav-custom">
        <li>
            <a href="index.php?view=cridip">GENERAL</a>
        </li>
        <li>
            <a href="index.php?view=swd">DEVELOPPEMENT & TECHNOLOGIE</a>
        </li>
        <li>
            <a href="index.php?view=scpvs">SCPVS</a>
        </li>
        <!-- END Template Options -->
    </ul>
    <!-- END Left Header Navigation -->

    <!-- Search Form -->
    <!-- END Search Form -->

    <!-- Right Header Navigation -->
    <ul class="nav navbar-nav-custom pull-right">
        <!-- Alternative Sidebar Toggle Button -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                Assistance <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-options">
                <li>
                    <a href="index.php?view=index&sub=etat_service">
                        <i class="fa fa-server"></i>
                        <span>Etat des Services</span>
                    </a>
                    <a href="index.php?view=index&sub=travaux">
                        <i class="fa fa-wrench"></i>
                        <span>Travaux</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- END Alternative Sidebar Toggle Button -->

        <!-- User Dropdown -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= ROOT,ASSETS,IMAGES; ?>placeholders/avatars/avatar2.jpg" alt="avatar"> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li class="dropdown-header text-center">Votre Compte</li>
                <li>
                    <a href="index.php?view=index&sub=profil">
                        <i class="fa fa-user fa-fw pull-right"></i>
                        Vos Informations
                    </a>
                    <a href="<?= ROOT,CONTROL; ?>client.php?action=deconnexion"><i class="fa fa-ban fa-fw pull-right"></i> Déconnexion</a>
                </li>
            </ul>
        </li>
        <!-- END User Dropdown -->
    </ul>
    <!-- END Right Header Navigation -->
</header>
<!-- END Header -->