<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 16/01/2017
 * Time: 11:14
 */

// autocharge toutes nos classes
spl_autoload_register(function($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

    if(file_exists("../app/". $className . ".php"))
    {
        include("../app/" .$className . ".php");
    }
    else
        {
        include("../" .$className . ".php");
    }
});
// Récupérer l'url
$p = (!empty($_GET['p'])) ? $_GET['p'] : "/";

//charger les routes
include('../app/routes.php');
include('../app/config.php');

// Créer une isntance du dispatcher
$dispatcher = new Grill\Controller\Dispatcher();
//faire la correspondance entre les urls et les routes
$dispatcher->match($routes, $p);