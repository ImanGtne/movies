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
}