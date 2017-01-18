<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 17/01/2017
 * Time: 11:29
 */

namespace Controller;


use Grill\Model\Security\Security;
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
        $user = new User();
        $validator = new Validator();

        if (!empty($_POST)) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordBis = $_POST["password_bis"];

// hydrate pour pouvoir mettre en value
            $user->setUsername($username);
            $user->setEmail($email);

            //VALIDATION
            //appelle des méthodes de validation (que vous devez créer)
            $validator->validateNotEmpty("username", $username, '');
            $validator->validateNotEmpty("email", $email, '');
            $validator->validateNotEmpty("password", $password, '');
            $validator->validateEmail($email);

            $usertest = $usermanager->findOneUserame($username);
            if ($usertest) {
                $validator->addError("username", "ce nom existe déjà <br>", $username);
            }
            $emailtest = $usermanager->registerEmail($email);
            if ($emailtest) {
                $validator->addError("email", "cet email existe déjà <br>", $username);
            }

            if ($password != $passwordBis) {
                $validator->addError("password_bis", "Passwords not match <br>", $passwordBis);

            }
            //vérifie si des erreurs sont présentes

            if ($validator->isValid()) {
                //données valides

                $password_hashed = (password_hash($password, PASSWORD_DEFAULT));
                $user->setPassword($password_hashed);
                $factory = new \RandomLib\Factory;
                $generator = $factory->getMediumStrengthGenerator();
                $token = $generator->generateString(50, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') . "\n";
                $user->setToken($token);
                $usermanager->registerConnexion($user);
                header('Location: ' .BASE_URL.'/connexion');
                die();

            }
        }
        $this->show('register/inscription', [
            'validator' => $validator,
            'user' => $user
        ]);
    }

    public function connexion()
    {

        $usermanager = new UserManager();
        $user = new User();
        $validator = new Validator();

        if (!empty($_POST)) {
            $login = $_POST["login"];
            $password = $_POST["password"];


            $validator->validateNotEmpty("login", $login, '');
            $validator->validateNotEmpty("password", $password, '');

            $fondUser = $usermanager->findOneUserame($login);
            if ($fondUser) {
                $pwdtest = password_verify($password, $fondUser->getPassword());
                if (!$pwdtest) {
                    $validator->addError("password", "PB PWD <br>", $pwdtest);
                }
            }
            else
            {
                $validator->addError("login", "PB LOGIN <br>", $fondUser);
            }

            if ($validator->isValid()) {
                //données valides
                $security = new Security();
                $security->connectUser($fondUser);
                header('Location: '.BASE_URL);
                die();
            }


        }

        $this->show('connexion/connexion',[
            'validator' => $validator,
            'user' => $user
        ]);
    }
    public function deconnexion()
    {
        $user = new User();
        $security = new \Grill\Model\Security\Security();
        if(!empty($_SESSION['user']))
        {
            $security->disconnectUser();
            header("Location: ". BASE_URL);
            die();
        }
        else
        {
            echo 'pas decoonecte';
        }
    }
}