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
$client_class = new client();
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php?view=login");
}
if(isset($_POST['action']) && $_POST['action'] == 'connexion')
{
    if ((isset($_POST['num_client']) && !empty($_POST['num_client'])) && (isset($_POST['password']) && !empty($_POST['password']))) {
        $login = $_POST['num_client'];
        $password = $_POST['password'];
        $pass_enc = sha1($password);

        include "../inc/config.php";
        $sql_verif_account = mysql_query("SELECT COUNT(*) FROM client WHERE num_client = '$login' AND password = '$pass_enc'")or die(mysql_error());
        $data = mysql_result($sql_verif_account, 0);

        if($data == 1)
        {
            session_start();
            $_SESSION['login'] = $_POST['num_client'];
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
if(isset($_POST['action']) && $_POST['action'] == 'edit-client-control')
{
    include "../inc/config.php";
    $idclient           = $_POST['idclient'];
    $nom_client         = $_POST['nom_societe'];
    $nom_societe        = $_POST['nom_societe'];
    $adresse_mail       = $_POST['adresse_email'];
    $telephone          = "0033".$_POST['telephone'];
    $adresse            = htmlentities(addslashes($_POST['adresse']));
    $code_postal        = $_POST['code_postal'];
    $ville              = htmlentities(addslashes($_POST['ville']));
    $region             = htmlentities(addslashes($_POST['region']));

    $sql_up_client = mysql_query("UPDATE client SET nom_client = '$nom_client', nom_societe = '$nom_societe', email = '$adresse_mail', telephone = '$telephone',
                                  adresse = '$adresse', code_postal = '$code_postal', ville = '$ville', region = '$region' WHERE idclient = '$idclient'")or die(mysql_error());

    if($sql_up_client === TRUE)
    {
        header("Location: ../index.php?view=index&sub=compte&success=edit-client");
    }else{
        header("Location: ../index.php?view=index&sub=compte&error=edit-client");
    }


}
if(isset($_POST['action']) && $_POST['action'] == 'modif-password-control'){
    include "../inc/config.php";
    $idclient               = $_POST['idclient'];
    $password               = $_POST['password'];
    $confirm_password       = $_POST['confirm_password'];

    $sql_client = mysql_query("SELECT * FROM client WHERE idclient = '$idclient'");
    $client = mysql_fetch_array($sql_client);
    $email = $client['email'];

    if(!empty($password) && !empty($confirm_password))
    {
        if($password == $confirm_password)
        {
            $pass_crypt = sha1($password);
            $sql_up_client = mysql_query("UPDATE client SET password = '$pass_crypt' WHERE idclient = '$idclient'")or die(mysql_error());


            if($sql_up_client === TRUE)
            {
                header("Location: ../index.php?view=index&sub=compte&success=modif-pass");
            }else{
                header("Location: ../index.php?view=index&sub=compte&error=modif-pass");
            }
        }else{
            header("Location: ../index.php?view=index&sub=compte&warning=no-egal");
        }
    }else{
        header("Location: ../index.php?view=index&sub=compte&warning=champs");
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'supp-info-bancaire')
{
    include "../inc/config.php";
    $idclient = $_GET['idclient'];
    $idclientbancaire = $_GET['idclientbancaire'];

    $sql_delete_info = mysql_query("DELETE FROM client_bancaire WHERE idclientbancaire = '$idclientbancaire'")or die(mysql_error());

    if($sql_delete_info === TRUE)
    {
        header("Location: ../index.php?view=index&sub=compte&success=supp-info-bancaire");
    }else{
        header("Location: ../index.php?view=index&sub=compte&error=supp-info-bancaire");
    }

}
if(isset($_POST['action']) && $_POST['action'] == "add-info-bancaire")
{
    include "../inc/config.php";
    $idclient = $_POST['idclient'];
    $bic = $_POST['bic'];
    $iban = $_POST['iban'];

    $sql_add_banque = mysql_query("INSERT INTO `client_bancaire`(`idclientbancaire`, `idclient`, `iban`, `bic`, `signed`) VALUES (NULL,'$idclient','$iban','$bic','0')")or die(mysql_error());

    if($sql_add_banque === TRUE)
    {
        header("Location: ../index.php?view=index&sub=compte&success=add-info-bancaire");
    }else{
        header("Location: ../index.php?view=index&sub=compte&error=add-info-bancaire");
    }
}

