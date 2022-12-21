<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UsersModel;

class SettingsController extends Controller
{
    public function index($page) {
        $user = new UsersModel;
        $user->hydrate($user->findById($_SESSION['user']['id']));

        if (isset($_POST['type'])) {
            switch ($_POST['type']) {
                case 'fullname':
                    if (Form::validate($_POST, ['firstname', 'lastname'])) {
                        $user->setFirstname(strip_tags($_POST['firstname']));
                        $user->setLastname(strip_tags($_POST['lastname']));
                        $user->update();
                        $user->setSession();
                    }
                    break;
                case 'username':
                    if (Form::validate($_POST, ['username'])) {
                        $user->setUsername(strip_tags($_POST['username']));
                        $user->update();
                    }
                    break;
                case 'email':
                    if (Form::validate($_POST, ['email'])) {
                        $user->setEmail(strip_tags($_POST['email']));
                        $user->update();
                    }
                    break;
                case 'tel':
                    if (Form::validate($_POST, ['tel'])) {
                        $user->setTel(strip_tags($_POST['tel']));
                        $user->update();
                    }
                    break;
                case 'password':
                    if (Form::validate($_POST, ['old-password', 'new-password', 'conf-new-password'])) {
                        if (password_verify($_POST['old-password'], $user->getPassword())) {
                            if ($_POST['new-password'] == $_POST['conf-new-password']) {
                                $user->setPassword(password_hash($_POST["new-password"], PASSWORD_ARGON2I));
                                $user->update();
                            }
                        }
                    }
                    break;
            }
        }
            
        $pageName = 'Paramètres et confidentialité | Projet BdD';

        $this->render('/settings/'.$page, compact('pageName', 'user'));
    }
}