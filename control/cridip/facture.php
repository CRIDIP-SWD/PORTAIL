<?php

/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 26/10/2015
 * Time: 18:13
 */
class facture
{
    public function echeance($nb_jour, $date_facture)
    {
        $calc_str = $nb_jour*86400;
        $echeance = $date_facture + $calc_str;
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
    public function etat_fct_text($etat)
    {
        switch($etat)
        {
            case 0:
                echo "Créer";
                break;
            case 1:
                echo "Facture envoyé";
                break;
            case 2:
                echo "Payé";
                break;
            case 3:
                echo "Partiellement Payé";
                break;
            case 4:
                echo "Impayé";
                break;
            case 5:
                echo "Annulée";
                break;

        }
    }
    public function etat_fct_img($etat)
    {
        switch($etat)
        {
            case 0:
                echo "<img src='".ROOT,ASSETS,IMG."etat/fct-creer.png' />";
                break;
            case 1:
                echo "<img src='".ROOT,ASSETS,IMG."etat/fct-envoyer.png' />";
                break;
            case 2:
                echo "<img src='".ROOT,ASSETS,IMG."etat/fct-paye.png' />";
                break;
            case 3:
                echo "<img src='".ROOT,ASSETS,IMG."etat/fct-ppaye.png' />";
                break;
            case 4:
                echo "<img src='".ROOT,ASSETS,IMG."etat/fct-impaye.png' />";
                break;
            case 5:
                echo "<img src='".ROOT,ASSETS,IMG."etat/fct-impaye.png' />";
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
    public function sous_total($idfacture)
    {
        $sql_ligne = mysql_query("SELECT SUM(total_ligne) FROM c_ligne_facture WHERE idfacture = '$idfacture'")or die("ERROR SQL: ".mysql_error());
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
    public function montant_restant_payer($total_facture, $idfacture)
    {
        $sql_sum_rglt = mysql_query("SELECT SUM(montant_reglement) FROM c_reglement WHERE idfacture = '$idfacture'")or die(mysql_error());
        $sum_rglt = mysql_result($sql_sum_rglt, 0);
        $calc = $total_facture - $sum_rglt;
        return $calc;
    }
    public function mode_reglement($mode_reglement)
    {
        switch($mode_reglement)
        {
            case 1:
                echo "Virement Bancaire";
                break;
            case 2:
                echo "Carte Bancaire (Portail)";
                break;
            case 3:
                echo "Chèque Bancaire";
                break;
            case 4:
                echo "Chèque de Banque";
                break;
            case 5:
                echo "Espèce (Mandat Cash)";
                break;
        }
    }
}