<?php
require_once "control/client.php";
$client = new client($login);
$client = $client->info_client($login);

