<?php
require_once "vendor/autoload.php";

use Ovh\Api;
$apk = "YLVnWI9vwB5nYEg0";
$endpoint = "ovh-eu";
$ask = "bDPjuf931jLDmhMMbTLSfatartv43rzB";
$csk = "is8M5oyHUJNR7UfxB5ToF6wQWAcMPfxn";
$ovh = new Api($apk,$ask,$endpoint,$csk);

require_once "control/API/ovh_wrapper.php";
$ovh = new \Ovh\ovh_wrapper();


require_once "control/client.php";
$client = new client($login);
$client = $client->info_client($login);

