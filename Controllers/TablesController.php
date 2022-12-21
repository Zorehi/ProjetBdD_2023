<?php

namespace App\Controllers;

use App\Core\Form;

class TablesController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(true);
    }
    
    public function index(string $tablename) {
        $this->securityCheck(true);

        $table = '\\App\\Models\\'.$tablename;
        $table = new $table();

        if (isset($_POST['type'])) {
            switch ($_POST['type']) {
                case 'delete':
                    if (Form::validate($_POST, ['deleteID'])) {
                        $table->delete($_POST['deleteID']);
                        exit;
                    }
                    break;
                
                case 'update':
                    if (Form::validate($_POST, array_keys($table::$info_tables))) {
                        $table->hydrate($_POST);
                        $table->update();
                    }
                    break;
                
                case 'create':
                    $not_needed_champs = [];
                    foreach ($table::$info_tables as $key => $value) {
                        if (!empty($value['is_disabled'])) $not_needed_champs[] = $key;
                    }
                    if (Form::validate($_POST, array_diff(array_keys($table::$info_tables), $not_needed_champs))) {
                        $table->hydrate($_POST);
                        $idName = 'set' . ucfirst($table->getIdName());
                        $table->$idName(null);
                        $table->create();
                    }
                    break;

            }
        }

        $pageName = 'Table ' . $tablename . ' | Projet BdD';

        $lines = $table->findAll();

        foreach ($table::$info_tables as $key => $value) {
            if (strpos($key, 'id') !== false && $value['elementHTML'] == 'select') {
                $table_2 = '\\App\\Models\\' . ucfirst(substr($key, 3)) . 'Model';
                $table_2 = new $table_2();
                $table::$info_tables[$key]['values'] = $table_2->findAll();
            } 
        }

        //var_dump($table::$info_tables);

        $this->render('/tables/index', compact('pageName', 'tablename', 'table', 'lines'));
    }
}