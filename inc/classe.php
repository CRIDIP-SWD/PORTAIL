<?php
require_once "vendor/autoload.php";

use Ovh\Api;
$apk = "vXjHPaL84Jct1zaB";
$endpoint = "ovh-eu";
$ask = "WwSivyMF8kcmKMlsjd6SRCQsmox8XKnO";
$csk = "k1ung5OPmvb26KtO97wy6R85SyL2ZIVU";
$ovh = new Api($apk,$ask,$endpoint,$csk);

require_once "control/client.php";
$client = new client($login);
$client = $client->info_client($login);

require_once "control/widget.php";
$wg = new widget();

