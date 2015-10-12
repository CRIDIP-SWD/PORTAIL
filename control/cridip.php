<?php

/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 12/10/2015
 * Time: 10:08
 */
class cridip
{
    public function count_devis($idclient)
    {
        $sql = mysql_query("SELECT COUNT(iddevis) FROM c_devis WHERE idclient = '$idclient'")or die(mysql_error());
        $count = mysql_result($sql,0);
        return $count;
    }
}