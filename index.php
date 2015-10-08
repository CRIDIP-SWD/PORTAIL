<?php
switch($_GET['view'])
{
    case 'index':
        include ('view/index.php');
        break;

    default:
        include('view/error404.php');
        break;
}