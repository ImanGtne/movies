<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 16/01/2017
 * Time: 14:13
 */

namespace Controller;


use Grill\Controller\BaseController;

class DefaultController extends BaseController
{
    //page accueil
    public function mentionslegales()
    {
        $this->show('default/mentionslegales');
    }
    public function faq()
    {
        $this->show('default/faq');
    }
}