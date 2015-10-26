<?php

/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 26/10/2015
 * Time: 18:05
 */
class commande
{
    public function calc_tva($total_ht)
    {
        $calc = $total_ht*0.2;
        return $calc;
    }
    public function total_ttc($total_ht)
    {
        $calc = $total_ht*1.2;
        return $calc;
    }
    public function etat_cmd_text($etat)
    {
        switch($etat)
        {
            case 0:
                echo "Créer";
                break;
            case 1:
                echo "Valider";
                break;
            case 2:
                echo "Envoyer au client";
                break;
            case 3:
                echo "Transformer";
                break;
        }
    }
    public function etat_cmd_img($etat)
    {
        switch($etat)
        {
            case 0:
                echo "<img src='".ROOT,ASSETS,IMG."etat/cmd-creer.png' />";
                break;
            case 1:
                echo "<img src='".ROOT,ASSETS,IMG."etat/cmd-valider.png' />";
                break;
            case 2:
                echo "<img src='".ROOT,ASSETS,IMG."etat/cmd-ec.png' />";
                break;
            case 3:
                echo "<img src='".ROOT,ASSETS,IMG."etat/cmd-transfo.png' />";
                break;
        }
    }
    public function etat_cmd_format($etat)
    {
        switch($etat)
        {
            case 0:
                echo "<span class='label label-default'>".$this->etat_cmd_text($etat)."</span>";
                break;
            case 1:
                echo "<span class='label label-warning'>".$this->etat_cmd_text($etat)."</span>";
                break;
            case 2:
                echo "<span class='label label-success'>".$this->etat_cmd_text($etat)."</span>";
                break;
            case 3:
                echo "<span class='label label-danger'>".$this->etat_cmd_text($etat)."</span>";
                break;
        }
    }
    public function calc_total_ligne($prix_vente_ht,$qte)
    {
        $calc = $prix_vente_ht*$qte;
        return $calc;
    }
    public function sous_total($idcommande)
    {
        $sql_ligne = mysql_query("SELECT SUM(total_ligne) FROM c_ligne_commande WHERE idcommande = '$idcommande'")or die("ERROR SQL: ".mysql_error());
        $sum = mysql_result($sql_ligne, 0);
        return $sum;
    }
    public function total_tva($sous_total)
    {
        $calc = $sous_total*0.2;
        return $calc;
    }
    public function ttc($sous_total)
    {
        $calc = $sous_total*1.2;
        return $calc;
    }
}