<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 16/01/2017
 * Time: 13:53
 */

namespace Grill\View;


class View
{
    // Nom de varaible complexe pour eviter les collision dans le exctract()
    public function showTemplate($grill_filename, $grill_data = [])
    {
        //Créée une variable nommée comme chacune des clés du tableau
        //la valeur reste la valeur pour chacune des varaibles
        extract($grill_data);
        $grill_page = "../app/templates/$grill_filename.php";
        include('../app/templates/layout.php');
    }
}