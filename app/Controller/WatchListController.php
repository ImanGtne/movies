<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 18/01/2017
 * Time: 13:44
 */

namespace Controller;


use Entity\WatchListItem;
use Grill\Controller\BaseController;
use Manager\WatchListManager;

class WatchListController extends BaseController
{
    public function addToWatchList()
    {
        $watchlistManager = new WatchListManager();
        $idmovie = $_GET['movieid'];
        $iduser = $_SESSION['user'];
        $iduser = $iduser->getId();
        $watchlistitem = new WatchListItem($idmovie, $iduser);
        $watchlistManager->registerInWatchlist($watchlistitem);
    }

    public function showWatchlist()
    {
        $watchlistManager = new WatchListManager();
        $iduser = $_SESSION['user'];
        $iduser = $iduser->getId();
        $watchlist = $watchlistManager->findMoviesWatchlist($iduser);
        $data = ["watchlist" => $watchlist];
        $this->show('movie/watchlist',$data);
    }
    public function deleteToWatchList()
    {
        $watchlistManager = new WatchListManager();
        $idmovie = $_GET['movieid'];
        $iduser = $_SESSION['user'];
        $iduser = $iduser->getId();
        $watchlistitem = new WatchListItem($idmovie, $iduser);
        $watchlistManager->unregisterInWatchlist($watchlistitem);
    }
}