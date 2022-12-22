<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UsersModel;

class LoginController extends Controller
{
    public function index() {
        // On vérifie si le formulaire est valide
        if(Form::validate($_POST, ["email", "password"])) {
            // On vérifie le type $_POST
            if ($_POST["type"] === "login") {
                $user = new UsersModel;
                $userArray = $user->findByEmailOrUsername($_POST["email"], $_POST["email"]);

                if ($userArray) {
                    // L'utilisateur existe
                    $user->hydrate($userArray);
    
                    // On vérifie si le mot de passe est correct
                    if (password_verify($_POST["password"], $user->getPassword())) {
                        // Le mot de passe est bon
                        $user->setSession();
                        header("Location: /");
                    } else {
                        // Mauvais mot de passe
                    }
                }


            } else {
                if (Form::validate($_POST, ["tel", "username", "firstname", "lastname", "day", "month", "year", "id_gender"])) {
                    // On check si l'user existe déjà
                    $user = new UsersModel();
                    $userArray = $user->findByEmailOrUsername($_POST["email"], $_POST["username"]);

                    if (!$userArray) {
                        // On chiffre le mot de passe
                        $pass = password_hash($_POST["password"], PASSWORD_ARGON2I);
                        $day = $_POST["day"];
                        $month = $_POST["month"];
                        $year = $_POST["year"];
                        // format the date to 'year-month-day'
			            $birthday = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year));

                        $user->hydrate($_POST);

                        $user->setBirthday($birthday)
                             ->setPassword($pass);

                        $user->create();

                        $userArray = $user->findBy(['email' => $user->getEmail()]);
                        $user->setId_users($userArray['id_users']);

                        $user->setSession();
                        header("Location: /");
                    }
                }
            }
        }

        $pageName = "Projet BdD - Connexion ou inscription";

        $this->render('/login/index', compact('pageName'), "login");
    }

    public function identify()
    {
        if (Form::validate($_POST, ["email"])) {
            $email = strip_tags($_POST["email"]);

            // On check si l'user existe
            $user = new UsersModel();
            $userArray = $user->findByEmailOrTel($email);
            
            if ($userArray) {
                $user->hydrate($userArray);
                $idName = 'get' . ucfirst($user->getIdName());
                header("Location: /recover/initiate/?id=".$user->$idName());
            }

        }

        if (isset($_SESSION["recover"])) {
            unset($_SESSION["recover"]);
        }

        $pageName = "Mot de passe oublié - Projet BdD";

        $this->render('/login/identify', compact('pageName'), "login");
    }

    /**
     * Déconnexion de l'utilisateur
     *
     * @return void
     */
    public function logout() {
        unset($_SESSION["user"]);
        header("Location: /");
        exit;
    }
}