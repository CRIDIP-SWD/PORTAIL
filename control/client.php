<?php
class client
{
    public $login;

    public function __construct($login)
    {
        $sql_user = mysql_query("SELECT * FROM c_client WHERE login = '$login'")or die(mysql_error());
        $user = mysql_fetch_array($sql_user);
        return $user;
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php?view=login");
}

