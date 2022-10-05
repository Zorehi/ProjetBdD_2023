<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UsersModel;

class RecoverController extends Controller
{
    public function initiate($id) {
        $user = new UsersModel;
        $userArray = $user->findById($id);

        $user->hydrate($userArray);

        if (Form::validate($_POST, ["send"])) {
            $code = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
            $_SESSION["recover"] = [
                "email" => $user->getEmail(),
                "id" => $user->getId(),
                "code" => $code
            ];

            $message = "Nous avons reçu une demande de réinitialisation de votre mot de passe Projet BdD.\nEntrez le code de réinitialisation du mot de passe suivant : ".$code;
            $sujet = $code." est votre code de récupération de compte Projet BdD";
            $headers = "Content-Type: text/plain; charset=utf-8\r\n";
            $headers .= "From: projetbdd@hotmail.com\r\n";

            mail($user->getEmail(), $sujet, $message, $headers);

            header("Location: /recover/code");
        }
        
        $fullname = $user->getFirstname() . " " . $user->getLastname();
        
        $this->render('/recover/initiate', compact("fullname"));
    }
    
    public function code() {
        $email = $_SESSION["recover"]["email"];
        $id = $_SESSION["recover"]["id"];

        if (Form::validate($_POST, ["code"])) {
            if ($_POST["code"] === $_SESSION["recover"]["code"]) {
                header("Location: /recover/password/".$_SESSION["recover"]["code"]);
            }
        }

        $this->render('/recover/code', compact("email", "id"));
    }

    public function password($code) {
        if ($code != $_SESSION["recover"]["code"]) {
            http_response_code(404);
            exit;
        }

        if (Form::validate($_POST, ["password"])) {
            $user = new UsersModel();
            $userArray = $user->findById($_SESSION["recover"]["id"]);

            if ($userArray) {
                unset($_SESSION["recover"]);
                $user->hydrate($userArray);

                $pass = password_hash($_POST["password"], PASSWORD_ARGON2I);
                $user->setPassword($pass);

                $user->update();
                $user->setSession();

                header("Location: /");
            }
        }

        $this->render('/recover/password');
    }
}