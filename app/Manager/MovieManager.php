<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 16/01/2017
 * Time: 15:28
 */

namespace Manager;
use Grill\Model\Database;

/**
 * Class MovieManager
 * @package Manager
 *  Contient toutes les requêtes SQL à la table movies (ou associées)
 */
class MovieManager
{
    public function findRandomMovies()
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM movies ORDER BY RAND() LIMIT 40";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $movies = $stmt->fetchAll(\PDO::FETCH_CLASS, "\Entity\Movie");
        return $movies;
    }

    public function findId($id)
    {
        $pdoA = Database::getPdo();
        $sql = "SELECT * FROM movies WHERE id = :id";
        $stmt = $pdoA->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        // retourne un seul objet sans tableau
        $movieid = $stmt->fetchObject("\Entity\Movie");
        return $movieid;
    }
    public function findGenre()
    {
        $pdo = Database::getPdo();
        $sql = "SELECT 'title', GROUP_CONCAT('name') AS genre 
                FROM movies,
                INNER JOIN movies_genres ON movies.id=movies_genres.movieId 
                INNER JOIN genres ON movies_genres.genreId=genres.id
                GROUP BY title";
        var_dump($sql);
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $moviegenre = $stmt->fetchObject("\Entity\Movie");
        return $moviegenre;
    }
}