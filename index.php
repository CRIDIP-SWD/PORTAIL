<?php
switch($_GET['view'])
{
    case 'index':
        include ('view/index.php');
        break;

    case 'client-profil':
        include ('view/client-profil.php');
        break;

    case 'cridip':
        include ('view/cridip.php');
        break;

    case 'login':
        include('view/login.php');
        break;

    default:
        include('view/error404.php');
        break;
}