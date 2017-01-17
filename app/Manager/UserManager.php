<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 17/01/2017
 * Time: 11:29
 */

namespace Manager;
use Grill\Model\Database;
use Entity\User;



class UserManager
{
    public function registerConnexion(User $user)
    {
        $pdo = Database::getPdo();
        $sql = "INSERT INTO users_incription (username, email, password , token, dateCreated, dateModified) VALUES (:username, :email, :password, :token, NOW(),NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":username", $user->getUsername());
        $stmt->bindValue(":email", $user->getEmail());
        $stmt->bindValue(":password", $user->getPassword());
        $stmt->bindValue(":token", $user->getToken());
        $stmt->execute();
    }

    public function registerUsername($username){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM users_incription WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":username", $username);
        $stmt->execute();
        $username = $stmt->fetchObject('Entity\User');
        return $username;
    }
    public function registerEmail($email){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM users_incription WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $email = $stmt->fetchObject('Entity\User');
        return $email;
    }
}