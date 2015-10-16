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

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    <span class="sidebar-header-title">Widget Kit</span>
                </li>
                <li>
                    <a href="page_widgets_stats.html"><i class="gi gi-charts sidebar-nav-icon"></i> <span class="sidebar-nav-mini-hide">Statistics</span></a>
                </li>
                <li>
                    <a href="page_widgets_social.html"><i class="gi gi-share_alt sidebar-nav-icon"></i> <span class="sidebar-nav-mini-hide">Social</span></a>
                </li>
                <li>
                    <a href="page_widgets_media.html"><i class="gi gi-film sidebar-nav-icon"></i> <span class="sidebar-nav-mini-hide">Media</span></a>
                </li>
                <li>
                    <a href="page_widgets_links.html"><i class="gi gi-link sidebar-nav-icon"></i> <span class="sidebar-nav-mini-hide">Links</span></a>
                </li>
                <li class="sidebar-header">
                    <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                    <span class="sidebar-header-title">Design Kit</span>
                </li>
                <li>
                    <a href="#" class="sidebar-nav-menu">
                        <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                        <i class="gi gi-certificate sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">User Interface</span>
                    </a>
                    <ul>
                        <li>
                            <a href="page_ui_grid_blocks.html">Grid &amp; Blocks</a>
                        </li>
                        <li>
                            <a href="page_ui_draggable_blocks.html">Draggable Blocks</a>
                        </li>
                        <li>
                            <a href="page_ui_typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="page_ui_buttons_dropdowns.html">Buttons &amp; Dropdowns</a>
                        </li>
                        <li>
                            <a href="page_ui_navigation_more.html">Navigation &amp; More</a>
                        </li>
                        <li>
                            <a href="page_ui_horizontal_menu.html">Horizontal Menu</a>
                        </li>
                        <li>
                            <a href="page_ui_progress_loading.html">Progress &amp; Loading</a>
                        </li>
                        <li>
                            <a href="page_ui_preloader.html">Page Preloader</a>
                        </li>
                        <li>
                            <a href="page_ui_color_themes.html">Color Themes</a>
                        </li>
                    </ul>
                </li>
            </ul>

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

            <!-- Sidebar Notifications -->
            <div class="sidebar-header sidebar-nav-mini-hide">
                                <span class="sidebar-header-options clearfix">
                                    <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
                                </span>
                <span class="sidebar-header-title">Activity</span>
            </div>
            <div class="sidebar-section sidebar-nav-mini-hide">
                <div class="alert alert-success alert-alt">
                    <small>5 min ago</small><br>
                    <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                </div>
                <div class="alert alert-info alert-alt">
                    <small>10 min ago</small><br>
                    <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                </div>
                <div class="alert alert-warning alert-alt">
                    <small>3 hours ago</small><br>
                    <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in use</strong> 2GB left
                </div>
                <div class="alert alert-danger alert-alt">
                    <small>Yesterday</small><br>
                    <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)"><strong>New bug submitted</strong></a>
                </div>
            </div>
            <!-- END Sidebar Notifications -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->