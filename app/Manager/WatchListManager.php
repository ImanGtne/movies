<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 18/01/2017
 * Time: 13:44
 */

namespace Manager;
use Grill\Model\Database;

class WatchListManager
{
    public function registerInWatchlist($watchlistitem)
    {
        $pdo = Database::getPdo();
        $sql = "INSERT INTO watchlist (id_movie, id_user) VALUES (:id_movie, :id_user)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id_movie", $watchlistitem->getIdmovie());
        $stmt->bindValue(":id_user", $watchlistitem->getIduser());
        $stmt->execute();
        header("Location: ". BASE_URL."/movie?id=". $watchlistitem->getIdmovie());
    }
    public function findMoviesWatchlist($id)
    {
        //echo "jointure";
        $pdo = Database::getPdo();
        $sql = "SELECT movies.*
                FROM movies
                LEFT JOIN watchlist ON movies.id=watchlist.id_movie
                WHERE watchlist.id_user = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $movieadd = $stmt->fetchAll(\PDO::FETCH_CLASS,"\Entity\Movie");
        return $movieadd;
    }
    public function unregisterInWatchlist($watchlistitem)
    {
        $pdo = Database::getPdo();
        $sql = "DELETE watchlist.* FROM watchlist WHERE id_movie = :id_movie AND id_user = :id_user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id_movie", $watchlistitem->getIdmovie());
        $stmt->bindValue(":id_user", $watchlistitem->getIduser());
        $stmt->execute();
        header("Location: ". BASE_URL."/watchlist");
    }
}