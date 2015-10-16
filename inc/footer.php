<!-- Footer -->
<footer class="clearfix">
    <div class="pull-right">
        Créer par CRIDIP Solution Web Developpement
    </div>
    <div class="pull-left">
        <span id="year-copy"></span> &copy; <?= NOM_LOGICIEL; ?> - V.<?= VERSION_LOGICIEL; ?>:<?= BUILD_LOGICIEL; ?>
    </div>
</footer>
<!-- END Footer -->
</div>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="<?= ROOT,ASSETS,JS; ?>helpers/excanvas.min.js"></script><![endif]-->

<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>!window.jQuery && document.write(decodeURI('%3Cscript src="<?= ROOT,ASSETS,JS; ?>vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

<!-- Bootstrap.js, Jquery plugins and Custom JS code -->
<script src="<?= ROOT,ASSETS,JS; ?>vendor/bootstrap.min.js"></script>
<script src="<?= ROOT,ASSETS,JS; ?>plugins.js"></script>
<script src="<?= ROOT,ASSETS,JS; ?>app.js"></script>
<script type="text/javascript" src="<?= ROOT,ASSETS,JS; ?>modify.js"></script>

<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps (Remove 'http:' if you have SSL) -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?= ROOT,ASSETS,JS; ?>helpers/gmaps.min.js"></script>