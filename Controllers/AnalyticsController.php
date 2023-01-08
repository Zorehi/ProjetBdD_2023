<?php

namespace App\Controllers;

use App\Models\Entities\GenderModel;
use App\Models\Entities\UsersModel;

class AnalyticsController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(true);
    }

    public function index() {
        $pageName = 'Statistiques | Projet BdD';

        $gender = new GenderModel();
        $dataGender = $gender->countEachGender();
        foreach ($dataGender as $key => $value) {
            $dataGender[$key]['y'] = (int) $value['y'];
        }

        $users = new UsersModel();
        $dataRange = $users->countByAgeRange();
        $dataRangeF = [];
        foreach ($dataRange as $key => $value) {
            $dataRangeF[] = (int) $value;
        }

        $this->render('/analytics/index', compact('pageName', 'dataGender', 'dataRangeF'), 'analytics');
    }
}