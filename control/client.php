<?php
class client
{
    public $login;

    public function __construct($login)
    {
        $sql_user = mysql_query("SELECT * FROM client WHERE email = '$login'")or die(mysql_error());
        $client = mysql_fetch_array($sql_user);
        return $client;
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php?view=login");
}

