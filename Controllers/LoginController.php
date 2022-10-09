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
                // On "nettoie" l'adresse email
                $email = strip_tags($_POST["email"]);

                $user = new UsersModel;
                $userArray = $user->findByEmailOrTel($email);

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
                if (Form::validate($_POST, ["firstname", "lastname", "day", "month", "year", "sex"])) {
                    $email = strip_tags($_POST["email"]);

                    // On check si l'user existe déjà
                    $user = new UsersModel();
                    $userArray = $user->findByEmailOrTel($email);

                    if (!$userArray) {
                        // On chiffre le mot de passe
                        $pass = password_hash($_POST["password"], PASSWORD_ARGON2I);
                        $firstname = strip_tags($_POST["firstname"]);
                        $lastname = strip_tags($_POST["lastname"]);
                        $sex = strip_tags($_POST["sex"]);
                        $day = strip_tags($_POST["day"]);
                        $month = strip_tags($_POST["month"]);
                        $year = strip_tags($_POST["year"]);
                        // format the date to 'year-month-day'
			            $dateofbirth = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year));

                        // On check si c'est un email ou numéro de téléphone
                        if (strstr($email, "@")) {
                            $user->setEmail($email);
                        } else {
                            $user->setTel($email);
                        }

                        $user->setPassword($pass)
                            ->setFirstname($firstname)
                            ->setLastname($lastname)
                            ->setDateofbirth($dateofbirth)
                            ->setSex($sex);

                        $user->create();
                    }
                }
            }
        }

        $this->render('/login/index');
    }

    public function identify()
    {
        if (Form::validate($_POST, ["email"])) {
            $email = strip_tags($_POST["email"]);

            // On check si l'user existe
            $user = new UsersModel();
            $userArray = $user->findByEmailOrTel($email);

            $user->hydrate($userArray);

            if ($userArray) {
                header("Location: /recover/initiate/".$user->getId());
            }

        }

        $this->render('/login/identify');
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