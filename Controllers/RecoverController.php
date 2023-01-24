<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\Entities\UsersModel;

class RecoverController extends Controller
{
    public function initiate($id) {
        $user = new UsersModel;
        $userArray = $user->findById($id);

        $user->hydrate($userArray);

        if (Form::validate($_POST, ["send"])) {
            $code = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);

            if ($_POST["send"] == "email") {
                $_SESSION["recover"] = [
                    "send_to" => $user->getEmail(),
                    "id" => $user->getId_users(),
                    "code" => $code
                ];
    
                $message = "Nous avons reçu une demande de réinitialisation de votre mot de passe Projet BdD.\nEntrez le code de réinitialisation du mot de passe suivant : ".$code;
                $sujet = $code." est votre code de récupération de compte Projet BdD";
                $headers = "Content-Type: text/plain; charset=utf-8\r\n";
                $headers .= "From: Projet BdD <projetbdd@hotmail.com>\r\n";
    
                if (mail($user->getEmail(), $sujet, $message, $headers)) {
                    header("Location: /recover/code");
                    exit;
                }
            } else {
                /*
                $_SESSION["recover"] = [
                    "send_to" => $user->getTel(),
                    "id" => $user->getId(),
                    "code" => $code
                ];

                $headers = "Content-Type: text/plain; charset=utf-8\r\n";
                $headers .= "From: Projet BdD <projetbdd@hotmail.com>\r\n";
                $sujet = "1555a1a21e41cd82db33c57e509aa6443da15e74|" . $user->getTel();
                $message = "Votre code est " . $code . " !";

                mail("email2sms@capitolemobile.com", $sujet, $message, $headers);
                */
            }

        }
        
        $this->render('/recover/initiate', compact("user"), "login");
    }
    
    public function code() {
        $send_to = $_SESSION["recover"]["send_to"];
        $id = $_SESSION["recover"]["id"];

        if (Form::validate($_POST, ["code"])) {
            if ($_POST["code"] === $_SESSION["recover"]["code"]) {
                header("Location: /recover/password/?code=".$_SESSION["recover"]["code"]);
                exit;
            }
        }
        
        $this->render('/recover/code', compact("send_to", "id"), "login");
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
                exit;
            }
        }

        $this->render('/recover/password', [], "login");
    }
}