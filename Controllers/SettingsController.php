<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UsersModel;

class SettingsController extends Controller
{
    public function index($page) {
        $params = [
            'pageName' => 'Paramètres et confidentialité | Projet BdD',
        ];

        $this->render('/settings/'.$page, $params);
    }
}