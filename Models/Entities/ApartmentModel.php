<?php
namespace App\Models\Entities;

use App\Models\Entity;

class ApartmentModel extends Entity
{
    protected $id_apartment;
    protected $num;
    protected $hab;
    protected $citizen_degree;
    protected $id_security_degree;
    protected $id_house;
    protected $id_apartment_type;
    
    
    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_apartment";
    }

    public function countApartFromHouse($idHouse) {
        return $this->requete("SELECT COUNT(*) as nbr_aparts FROM apartment WHERE id_house = {$idHouse}")->fetch()['nbr_aparts'];
    }

    public function countFreeApartFromHouse($idHouse) {
        $today = date("Y-m-d");
        return $this->requete("SELECT COUNT(*) as nbr_free_aparts 
                               FROM apartment A LEFT OUTER JOIN tenant T ON(A.id_apartment = T.id_apartment AND T.from_date <= '{$today}' AND (T.to_date > '{$today}' OR T.to_date is NULL)) 
                               WHERE A.id_house = {$idHouse} AND T.id_users is null")->fetch()['nbr_free_aparts'];
    }

    public function search($querry, $limit = 100, $offset = 0) {
        return $this->requete("SELECT *
                               FROM {$this->table} A INNER JOIN house H ON(A.id_house = H.id_house) NATURAL JOIN apartment_type
                               WHERE house_name LIKE '%{$querry}%' OR
                                     CONCAT('N°', num, ' - ', house_name) LIKE '%{$querry}%' OR
                                     num LIKE '%{$querry}%'
                                     LIMIT $limit OFFSET $offset")->fetchAll();
    }

    public function consume($id_apartment) {
        return $this->requete("SELECT * FROM uptime_by_apartment_with_consumption WHERE id_apartment = {$id_apartment} ORDER BY date ASC")->fetchAll();
    }

    public function emit($id_apartment) {
        return $this->requete("SELECT * FROM uptime_by_apartment_with_emission WHERE id_apartment = {$id_apartment} ORDER BY date ASC")->fetchAll();
    }
    

    /**
     * Get the value of id_apartment_type
     */ 
    public function getId_apartment_type()
    {
        return $this->id_apartment_type;
    }

    /**
     * Set the value of id_apartment_type
     *
     * @return  self
     */ 
    public function setId_apartment_type($id_apartment_type)
    {
        $this->id_apartment_type = $id_apartment_type;

        return $this;
    }

    /**
     * Get the value of id_house
     */ 
    public function getId_house()
    {
        return $this->id_house;
    }

    /**
     * Set the value of id_house
     *
     * @return  self
     */ 
    public function setId_house($id_house)
    {
        $this->id_house = $id_house;

        return $this;
    }

    /**
     * Get the value of id_security_degree
     */ 
    public function getId_security_degree()
    {
        return $this->id_security_degree;
    }

    /**
     * Set the value of id_security_degree
     *
     * @return  self
     */ 
    public function setId_security_degree($id_security_degree)
    {
        $this->id_security_degree = $id_security_degree;

        return $this;
    }

    /**
     * Get the value of citizen_degree
     */ 
    public function getCitizen_degree()
    {
        return $this->citizen_degree;
    }

    /**
     * Set the value of citizen_degree
     *
     * @return  self
     */ 
    public function setCitizen_degree($citizen_degree)
    {
        $this->citizen_degree = $citizen_degree;

        return $this;
    }

    /**
     * Get the value of hab
     */ 
    public function getHab()
    {
        return $this->hab;
    }

    /**
     * Set the value of hab
     *
     * @return  self
     */ 
    public function setHab($hab)
    {
        $this->hab = $hab;

        return $this;
    }

    /**
     * Get the value of num
     */ 
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set the value of num
     *
     * @return  self
     */ 
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get the value of id_apartment
     */ 
    public function getId_apartment()
    {
        return $this->id_apartment;
    }

    /**
     * Set the value of id_apartment
     *
     * @return  self
     */ 
    public function setId_apartment($id_apartment)
    {
        $this->id_apartment = $id_apartment;

        return $this;
    }

    static $info_tables = [
        'id_apartment' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'num' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'hab' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'citizen_degree' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'id_security_degree' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'description'
        ],
        'id_house' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'house_name'
        ],
        'id_apartment_type' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'description'
        ]
    ];
}