<!-- start: header -->
<header class="header">
    <div class="logo-container">
        <a href="<?= ROOT; ?>index.php?view=index" class="logo">
            <img src="<?= ROOT,ASSETS,IMAGES; ?>logo.png" height="35" alt="Porto Admin" />
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">
        <div class="menu-gen">
            <a class="menu-gen-title" href="index.php?view=cridip">CRIDIP</a>
            <span class="separator"></span>
            <a class="menu-gen-title" href="index.php?view=swd">CRIDIP-SWD</a>
            <span class="separator"></span>
            <a class="menu-gen-title" href="index.php?view=scpvs">SCPVS</a>
        </div>
        <span class="separator"></span>

        <ul class="notifications">
            <li>
                <a href="#" data-toggle="tooltip" data-placement="bottom" data-original-title="Service GENERAL">
                    <i class="fa fa-server"></i>
                    <span style="position: absolute; right: -7px;top: -7px;padding: 3px 5px;height: 16px;font-size: 10px;"><?php if($ovh->get('/me')){echo "<i class='fa fa-circle text-success'></i>";}else{echo "<i class='fa fa-circle text-danger'></i>";} ?></span>
                </a>
            </li>
            <!--<li>
                <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                    <i class="fa fa-server"></i>
                    <span style="position: absolute; right: -7px;top: -7px;padding: 3px 5px;height: 16px;font-size: 10px;"><?php if($ovh->get('/me')){echo "<i class='fa fa-circle text-success'></i>";}else{echo "<i class='fa fa-circle text-danger'></i>";} ?></span>
                </a>

                <div class="dropdown-menu notification-menu large">
                    <div class="notification-title">
                        <span class="pull-right label label-default">3</span>
                        Tasks
                    </div>

                    <div class="content">
                        <ul>
                            <li>
                                <p class="clearfix mb-xs">
                                    <span class="message pull-left">Generating Sales Report</span>
                                    <span class="message pull-right text-dark">60%</span>
                                </p>
                                <div class="progress progress-xs light">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                </div>
                            </li>

                            <li>
                                <p class="clearfix mb-xs">
                                    <span class="message pull-left">Importing Contacts</span>
                                    <span class="message pull-right text-dark">98%</span>
                                </p>
                                <div class="progress progress-xs light">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
                                </div>
                            </li>

                            <li>
                                <p class="clearfix mb-xs">
                                    <span class="message pull-left">Uploading something big</span>
                                    <span class="message pull-right text-dark">33%</span>
                                </p>
                                <div class="progress progress-xs light mb-xs">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>-->
        </ul>
        <span class="separator"></span>
        <div class="btn-group">
            <span data-toggle="dropdown" class="mb-xs mt-xs mr-xs dropdown-toggle" style="cursor: hand;" aria-expanded="false"><i class="fa fa-arrow-circle-o-down"></i> </span>
            <ul role="menu" class="dropdown-menu">
                <li><a href="index.php?view=index&sub=etat_service"><i class="fa fa-server"></i> Etat des Services</a></li>
                <li><a href="index.php?view=index&sub=chantier"><i class="fa fa-tasks"></i> Chantier</a></li>
                <li><a class="mb-xs mt-xs mr-xs modal-sizes" href="#maj"><i class="fa fa-upload"></i> Note de Mise à jour</a></li>

                <li class="divider"></li>
                <li><a href="index.php?view=index&sub=support_wiki"><i class="fa fa-life-bouy"></i> Support / Wiki</a></li>
            </ul>
            <div id="maj" class="modal-block modal-block-md mfp-hide" style="top: -200px;">
                <section class="panel">
                    <header class="panel-heading bg-dark">
                        <button type="button" data-dismiss="maj" class="close"><i class="fa fa-times"></i></button>
                        <h2 class="panel-title">Note de Mise à jour</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <p>Are you sure that you want to delete this image?</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="<?= $client['email']; ?>">
                    <span class="name"><?= $client['nom_client']; ?></span>
                    <span class="role"><?= $client['nom_societe']; ?></span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="index.php?view=index&sub=mon_profil"><i class="fa fa-user"></i> Mon Profil</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?= ROOT,CONTROL; ?>client.php?action=deconnexion"><i class="fa fa-power-off"></i> Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>
<!-- end: header -->