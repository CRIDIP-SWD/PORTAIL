<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <?php if($_GET['view'] == 'index'){} ?>
            <?php if($_GET['view'] == 'cridip'){ ?>
                <nav id="menu" class="nav-main" role="CRIDIP">
                    <ul class="nav nav-main">
                        <li <?php if(isset($_GET['sub']) && $_GET['sub'] == 'devis'){echo "nav-active";} ?>>
                            <a href="index.php?view=cridip&sub=devis">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Vos Devis</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            <?php } ?>

        </div>

    </div>

</aside>
<!-- end: sidebar -->