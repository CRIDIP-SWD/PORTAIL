<?php

/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 26/10/2015
 * Time: 17:52
 */
class devis
{
    public function echeance($nb_jour, $date_devis)
    {
        $calc_str = $nb_jour*86400;
        $echeance = $date_devis + $calc_str;
        return $echeance;
    }
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
    public function etat_devis_text($etat)
    {
        switch($etat)
        {
            case 0:
                echo "Brouillon";
                break;
            case 1:
                echo "Envoyé";
                break;
            case 2:
                echo "Accepté";
                break;
            case 3:
                echo "Perdu";
                break;
            case 4:
                echo "Mort";
                break;
        }
    }
    public function etat_devis_img($etat)
    {
        switch($etat)
        {
            case 0:
                echo "<img src='".ROOT,ASSETS,IMG."etat/devis-brouillon.png' />";
                break;
            case 1:
                echo "<img src='".ROOT,ASSETS,IMG."etat/devis-envoye.png' />";
                break;
            case 2:
                echo "<img src='".ROOT,ASSETS,IMG."etat/devis-accepte.png' />";
                break;
            case 3:
                echo "<img src='".ROOT,ASSETS,IMG."etat/devis-perdu.png' />";
                break;
            case 4:
                echo "<img src='".ROOT,ASSETS,IMG."etat/devis-mort.png' />";
                break;
        }
    }
    public function etat_devis_format($etat)
    {
        switch($etat)
        {
            case 0:
                echo "<span class='label label-default'>".$this->etat_devis_text($etat)."</span>";
                break;
            case 1:
                echo "<span class='label label-warning'>".$this->etat_devis_text($etat)."</span>";
                break;
            case 2:
                echo "<span class='label label-success'>".$this->etat_devis_text($etat)."</span>";
                break;
            case 3:
                echo "<span class='label label-danger'>".$this->etat_devis_text($etat)."</span>";
                break;
            case 4:
                echo "<span class='label label-primary'>".$this->etat_devis_text($etat)."</span>";
                break;
        }
    }
    public function calc_total_ligne($prix_vente_ht,$qte)
    {
        $calc = $prix_vente_ht*$qte;
        return $calc;
    }
    public function sous_total($iddevis)
    {
        $sql_ligne = mysql_query("SELECT SUM(total_ligne) FROM c_ligne_devis WHERE iddevis = '$iddevis'")or die("ERROR SQL: ".mysql_error());
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