<?php

namespace App\Controllers;

class TablesController extends Controller
{
    public function index(string $tablename) {

        $table = '\\App\\Models\\'.$tablename;
        $table = new $table();

        if (isset($_POST['deleteID'])) {
            $table->delete(strip_tags($_POST['deleteID']));
            exit;
        }


        $pageName = 'Table ' . $tablename . ' | Projet BdD';

        $lines = $table->findAll();
        $max = count($lines);
        for ($i=0; $i < $max; $i++) {
            unset($lines[$i]['password']);
        }

        $this->render('/tables/index', compact('pageName', 'tablename', 'table', 'lines'));
    }
}