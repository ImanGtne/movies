<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 17/01/2017
 * Time: 11:29
 */

namespace Controller;


use Grill\Model\Validator;
use Grill\Controller\BaseController;
use Grill\View\View;
use Manager\UserManager;
use Entity\User;

class UserController extends BaseController
{

    //page accueil
    public function inscription()
    {
        $usermanager = new UserManager();

        if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password_bis"])) {
            if ($_POST["username"] != "" && $_POST["email"] != "" && $_POST["password"] != "" && $_POST["password_bis"] != "") {
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $passwordBis = $_POST["password_bis"];

                //VALIDATION
                //appelle des méthodes de validation (que vous devez créer)
                $validator = new Validator();
                $validator->validateNotEmpty("username", $username, '');
                $validator->validateNotEmpty("email", $email, '');
                $validator->validateNotEmpty("password", $password, '');
                $validator->validateEmail($email);

                $usertest = $usermanager->registerUsername($username);
                if($usertest)
                {
                   $validator->addError("username", "ce nom existe déjà <br>", $username);
                }
                $emailtest = $usermanager->registerEmail($email);
                if($emailtest)
                {
                    $validator->addError("email", "cet email existe déjà <br>", $username);
                }

                if ($password != $passwordBis) {
                  $validator->addError("password_bis", "Passwords not match <br>", $passwordBis);

                }
                //vérifie si des erreurs sont présentes

                if ($validator->isValid()) {
                    //données valides

                    $user = new User();
                    $user->setUsername($username);
                    $user->setEmail($email);
                    $password_hashed = (password_hash($password, PASSWORD_DEFAULT));
                    $user->setPassword($password_hashed);
                    $factory = new \RandomLib\Factory;
                    $generator = $factory->getMediumStrengthGenerator();
                    $token = $generator->generateString(50, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')."\n";
                    $user->setToken($token);
                    $usermanager->registerConnexion($user);
                    echo 'Le formulaire a bien été envoyé';

                } else {
                    //données non valides
                    //récupère les messages d'erreurs

                    $errors = $validator->getErrors();
                    foreach($errors as $error){

                        echo 'La valeur du champ ' . $error->getField() . ' contient une erreur : ' . $error->getMessage();

                    }
                }
            }
        }



        $this->show('movie/inscription');
    }
}