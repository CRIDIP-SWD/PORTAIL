<?php
namespace Ovh;
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 17/10/2015
 * Time: 01:23
 */
class ovh_wrapper
{

    public function list_serveur()
    {
        use Ovh\Api;
        $apk = "YLVnWI9vwB5nYEg0";
        $endpoint = "ovh-eu";
        $ask = "bDPjuf931jLDmhMMbTLSfatartv43rzB";
        $csk = "is8M5oyHUJNR7UfxB5ToF6wQWAcMPfxn";
        $ovh = new Api($apk,$ask,$endpoint,$csk);

        $liste_server = array();
        while($liste_server){
            $ovh->get("/vps");
        }
        return $liste_server;
    }

}