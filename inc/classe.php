<?php
require_once "vendor/autoload.php";

use Ovh\Api;
$apk = "YLVnWI9vwB5nYEg0";
$endpoint = "ovh-eu";
$ask = "bDPjuf931jLDmhMMbTLSfatartv43rzB";
$csk = "is8M5oyHUJNR7UfxB5ToF6wQWAcMPfxn";
$ovh = new Api($apk,$ask,$endpoint,$csk);

$apk_1 = "rvXVPOoTCoQhECrI";
$endpoint = "ovh-eu";
$ask_1 = "7Pc4q9eNepLDtNOh8QpGwzjBA3YMYjv4";
$csk_1 = "kUljA7q50Z4x9DsJuhiaYJyTawDrDHI5";
$ovh_1 = new Api($apk_1,$ask_1,$endpoint,$csk_1);

$apk_2 = "75SHNcQE0IeFYoNW";
$endpoint = "ovh-eu";
$ask_2 = "f2oMv4nWyx1IaEiJxFR2s2GITG7l32A8";
$csk_2 = "u4KBxVhfL2vGa5lSLW8qtRDwUlF95TEa";
$ovh_2 = new Api($apk_2,$ask_2,$endpoint,$csk_2);


require_once "control/client.php";
$client = new client($login);
$client = $client->info_client($login);

require_once "control/cridip/devis.php";
$devis_class = new devis();

require_once "control/cridip/commande.php";
$commande_class = new commande();

require_once "control/cridip/facture.php";
$facture_class = new facture();

