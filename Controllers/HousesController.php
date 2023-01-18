<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\Entities\CityModel;
use App\Models\Entities\HouseModel;
use App\Models\Entities\ResourceModel;
use App\Models\Associations\OwnerModel;
use App\Models\Entities\ApartmentModel;
use App\Models\Entities\SubstanceModel;
use App\Models\Entities\DepartmentModel;

class HousesController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(false);
    }

    private function retrieveInfoForPanelManage($id)
    {
        $owner = new OwnerModel();
        $owner_array = $owner->findByIdHouse($id);
        if ($owner_array) $owner->hydrate($owner_array);

        $house = new HouseModel();
        $house->hydrate($house->findById($id));

        $apartment = new ApartmentModel();
        $nbr_aparts = $apartment->countApartFromHouse($id);
        $nbr_free_aparts = $apartment->countFreeApartFromHouse($id);

        $pageName = "{$house->getHouse_name()} | Projet BdD";

        return compact('owner', 'house', 'pageName', 'nbr_aparts', 'nbr_free_aparts');
    }

    public function index($id)
    {
        extract($this->retrieveInfoForPanelManage($id));

        $this->render('/houses/index', compact('pageName', 'house', 'owner', 'nbr_aparts', 'nbr_free_aparts'));
    }

    public function house_aparts($id)
    {
        extract($this->retrieveInfoForPanelManage($id));

        $this->render('/houses/house_aparts', compact('pageName', 'house', 'owner', 'nbr_aparts', 'nbr_free_aparts'));
    }

    public function edit($id)
    {
        extract($this->retrieveInfoForPanelManage($id));

        $city = new CityModel();
        $city->hydrate($city->findById($house->getId_city()));

        $this->render('/houses/edit', compact('pageName', 'house', 'owner', 'nbr_aparts', 'nbr_free_aparts', 'city'));
    }

    public function insights($id, $section)
    {
        extract($this->retrieveInfoForPanelManage($id));

        $datas = [];
        $datas_reorganize = [];
        $datas_date = [];

        if ($section == 'consume') {
            $consume_array = $house->consume($id);
            foreach ($consume_array as $key => $value) {
                if (!isset($datas[$value['id_resource']])) $datas[$value['id_resource']] = [];
                $datas[$value['id_resource']][$value['date']] = $value['consumption'];
            }

            $resource = new ResourceModel();
            $index = 0;
            foreach ($datas as $key => $value) {
                $resource_array = $resource->findById(intval($key));
                if ($resource_array) {
                    $datas_reorganize[$index] = ['name' => $resource_array['name'], 'data' => []];

                    for ($i = 30; $i >= 0; $i--) {
                        $date = date('Y-m-d', strtotime("-$i days"));
                        if ($index == 0) {
                            $datas_date[] = $date;
                        }

                        if (isset($value[$date]) && $value[$date] != null) {
                            $datas_reorganize[$index]['data'][] = floatval($value[$date]);
                        } else {
                            $datas_reorganize[$index]['data'][] = 0;
                        }
                    }
                    $index++;
                }
            }
        } else {
            $emit_array = $house->emit($id);
            foreach ($emit_array as $key => $value) {
                if (!isset($datas[$value['id_substance']])) $datas[$value['id_substance']] = [];
                $datas[$value['id_substance']][$value['date']] = $value['emission'];
            }

            $substance = new SubstanceModel();
            $index = 0;
            foreach ($datas as $key => $value) {
                $substance_array = $substance->findById(intval($key));
                if ($substance_array) {
                    $datas_reorganize[$index] = ['name' => $substance_array['name'], 'data' => []];

                    for ($i = 30; $i >= 0; $i--) {
                        $date = date('Y-m-d', strtotime("-$i days"));
                        if ($index == 0) {
                            $datas_date[] = $date;
                        }

                        if (isset($value[$date]) && $value[$date] != null) {
                            $datas_reorganize[$index]['data'][] = floatval($value[$date]);
                        } else {
                            $datas_reorganize[$index]['data'][] = 0;
                        }
                    }
                    $index++;
                }
            }
        }

        $this->render('/houses/insights/' . $section, compact('pageName', 'house', 'owner', 'nbr_aparts', 'nbr_free_aparts', 'datas_date', 'datas_reorganize'), 'analytics');
    }

    // Permet d'afficher la page house/create
    public function create()
    {
        $pageName = "Créer une maison | Projet BdD";
        $house = new HouseModel();
        $city = new CityModel();
        $Departement = new DepartmentModel();
        $owner = new OwnerModel();
        // On appelle la méthode validate de la classe mère pour vérifier que les champs sont bien remplis 
        if (Form::validate($_POST, ["house_name", "isolation_degree", "eval_eco", "citizen_degree", "street", "house_number", "city_name", "postcode"])) { {
                $houseArray = $house->findBy(['house_name' => $_POST['house_name'], 'street' => $_POST['street'], 'house_number' => $_POST['house_number']]);
                if (count($houseArray) == 0) {
                    // On regarde si la ville existe déja 
                    $cityArray = $city->findBy(['city_name' => $_POST['city_name']]);
                    if ($cityArray) // Dans la table city on cherche tous les attributs city name égal à ceux du POST
                    {
                        // Si on connait deja la ville on a juste à l'hydrater 
                        $city->hydrate($cityArray[0]);
                    } else {
                        // aller chercher l'ID du département grace au departementCode
                        $city->hydrate($_POST);
                        $nDepartement = $city->getPostcode();
                        $nDepartement = substr($nDepartement, 0, 2);

                        $IDdepartement = $Departement->findBy(['department_code' => $nDepartement])[0];
                        $city->setId_department($IDdepartement['id_department']);
                        $city->setId_city($city->create());
                        // regarder si la maison existe déjà dans la base de données 
                    }
                    $house->setId_city($city->getId_city());
                    $house->hydrate($_POST);
                    $house->setId_house($house->create());

                    $houseArray = $house->findBy(['house_name' => $_POST['house_name'], 'street' => $_POST['street'], 'house_number' => $_POST['house_number']])[0];

                    $owner->setId_house($houseArray['id_house']);
                    $owner->setId_users($_SESSION['user']['id']);
                    $owner->setFrom_date(date('Y-m-d'));
                    $owner->setTo_date(null);
                    $owner->create();

                    header("Location: /houses/{$house->getId_house()}");
                    exit;
                }
            }
        }

        $this->render('/houses/create', compact('pageName'));
    }
}
