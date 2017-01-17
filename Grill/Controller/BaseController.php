<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 16/01/2017
 * Time: 13:34
 */

namespace Grill\Controller;
use Grill\View\View;

/**
 * Contrôleur de base à extends par les contrôleurs de l'appli
 */

class BaseController
{
    public function show($filename, $data = [])
    {
       $view = new View();
       $view->showTemplate($filename, $data);
    }

}