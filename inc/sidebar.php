<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="index.php?view=index" class="sidebar-brand">
                <i class="gi gi-flash"></i>
                <span class="sidebar-nav-mini-hide"><strong>ESPACE</strong> CLIENT</span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="index.php?view=index&sub=profil">
                        <img src="<?= ROOT,ASSETS,IMAGES; ?>placeholders/avatars/avatar2.jpg" alt="avatar">
                    </a>
                </div>
                <div class="sidebar-user-name"><?= $client['nom_client']; ?><br><h6><span class="text-muted"><?= $client['nom_societe']; ?></span></h6></div>
            </div>
            <!-- END User Info -->

            <ul class="sidebar-nav">
                <?php if($_GET['view'] == 'cridip' AND $client['cridip'] == 1){ ?>
                    <li class="sidebar-header">
                        <span class="sidebar-header-title">Facturation</span>
                    </li>
                    <li>
                        <a href="index.php?view=cridip&sub=devis" <?php if($_GET['sub'] == 'devis'){echo "class='active'";} ?>>
                            <i class="gi gi-charts sidebar-nav-icon"></i>
                            <span class="sidebar-nav-mini-hide">Vos Devis</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?view=cridip&sub=commande" <?php if($_GET['sub'] == 'commande'){echo "class='active'";} ?>>
                            <i class="gi gi-charts sidebar-nav-icon"></i>
                            <span class="sidebar-nav-mini-hide">Vos Commandes</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?view=cridip&sub=facture" <?php if($_GET['sub'] == 'facture'){echo "class='active'";} ?>>
                            <i class="gi gi-charts sidebar-nav-icon"></i>
                            <span class="sidebar-nav-mini-hide">Vos Factures</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->