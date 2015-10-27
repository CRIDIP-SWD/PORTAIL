<?php
class client
{

    public function info_client($login)
    {
        $sql_user = mysql_query("SELECT * FROM client WHERE email = '$login'")or die(mysql_error());
        $client = mysql_fetch_array($sql_user);
        return $client;
    }
    public function sum_fact_clt($idclient)
    {
        $sql = mysql_query("SELECT SUM(total_ht) FROM c_facture WHERE idclient = '$idclient'")or die("ERROR SQL: ".mysql_error());
        $data = mysql_result($sql, 0);
        return $data*1.2;
    }

    public function  sum_rglt_clt($idclient)
    {
        $sql = mysql_query("SELECT SUM(montant_reglement) FROM c_reglement, c_facture WHERE c_reglement.idfacture = c_facture.idfacture AND c_facture.idclient = '$idclient'")or die("ERROR SQL: ".mysql_error());
        $data = mysql_result($sql, 0);
        return $data;
    }

    public function clt_balance($idclient)
    {
        $sql_fct = mysql_query("SELECT SUM(total_ht) FROM c_facture WHERE idclient = '$idclient'")or die("ERROR SQL: ".mysql_error());
        $fct = mysql_result($sql_fct, 0)*1.2;
        $sql_reg = mysql_query("SELECT SUM(montant_reglement) FROM c_reglement, c_facture WHERE c_reglement.idfacture = c_facture.idfacture AND c_facture.idclient = '$idclient'")or die("ERROR SQL: ".mysql_error());
        $reg = mysql_result($sql_reg, 0);
        $data = $reg-$fct;
        return $data;
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php?view=login");
}
if(isset($_POST['action']) && $_POST['action'] == 'connexion')
{
    if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password']))) {
        $login = $_POST['email'];
        $password = $_POST['password'];
        $pass_enc = sha1($password);

        include "../inc/config.php";
        $sql_verif_account = mysql_query("SELECT COUNT(*) FROM client WHERE email = '$login' AND password = '$pass_enc'")or die(mysql_error());
        $data = mysql_result($sql_verif_account, 0);

        if($data == 1)
        {
            session_start();
            $_SESSION['login'] = $_POST['email'];
            header("Location: ../index.php?view=index");
            exit();
        }elseif($data == 0){
            header("Location: ../index.php?view=login&error=user");
        }else{
            header("Location: ../index.php?view=login&error=multi-user");
        }
    }else{
        header("Location: ../index.php?view=login&error=champs");
    }
}

