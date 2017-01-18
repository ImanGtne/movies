<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 16/01/2017
 * Time: 11:50
 */

namespace Controller;

use Grill\Controller\BaseController;
use Grill\View\View;
use Manager\MovieManager;

class MovieController extends BaseController
{
    //page accueil
    public function home()
    {
        $movieManager = new MovieManager();
        $movies = $movieManager->findRandomMovies();
        $data = ["movies" => $movies, "page" => 2];
        $this->show('movie/home', $data);
    }
    //page détail film
    public function showSingle()
    {
        $movieManager = new MovieManager();
        $id = $_GET['id'];
        $movie = $movieManager->findElementSingle($id);
        $this->show("movie/single", ["movie" => $movie]);
    }
}