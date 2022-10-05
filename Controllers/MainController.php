<?php

namespace App\Controllers;

class MainController extends Controller
{
    public function index() {
        if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
            $this->render('/main/index');
        } else {
            $logincontroller = new LoginController();
            $logincontroller->index();
        }
    }
}