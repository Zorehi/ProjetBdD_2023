<?php

namespace App\Controllers;

class AnalyticsController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(true);
    }

    public function index() {
        $pageName = 'Statistiques | Projet BdD';

        $this->render('/analytics/index', compact('pageName'), 'analytics');
    }
}