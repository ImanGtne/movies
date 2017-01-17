<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 16/01/2017
 * Time: 12:22
 */

namespace Grill\Controller;

class Dispatcher
{
   public function match($routes, $url)
   {
       //on chercher l'url actuelle dans notre tableau de routes
       foreach ($routes as $route)
       {
           if ($route[0] == $url)
           {
               //récupère la méthode associée à l'url
               $methodName = $route[1];
               //récupere le nom complet du controleur à instancier
               $controllerName = "Controller\\". $route[2];
               //instancie le controleur
               $controller = new $controllerName();
               // On appelle la fonction
               $controller->$methodName();
           }
       }
   }
}
