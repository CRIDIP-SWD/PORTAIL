<?php

/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 08/10/2015
 * Time: 20:41
 */
class widget
{
    public function data_fct($mois, $idclient)
    {
        $mois_debut = "01-".$mois."-2015";
        $mois_debut_strt = strtotime($mois_debut);
        $mois_fin = "30-".$mois."-2015";
        $mois_fin_strt = strtotime($mois_fin);
        $sql = mysql_query("SELECT SUM(total_ht) FROM c_facture WHERE date_facture >= '$mois_debut_strt' AND date_facture <= '$mois_fin_strt' AND idclient = '$idclient'")or die(mysql_error());
        $sum = mysql_result($sql, 0);
        return $sum;
    }
}