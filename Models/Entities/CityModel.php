<?php
namespace App\Models\Entities;

use App\Models\Entity;

class CityModel extends Entity
{
    protected $id_city;
    protected $postcode;
    protected $city_name;
    protected $id_department;

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_city";
    }

    /**
     * Get the value of id_city
     */ 
    public function getId_city()
    {
        return $this->id_city;
    }

    /**
     * Set the value of id_city
     *
     * @return  self
     */ 
    public function setId_city($id_city)
    {
        $this->id_city = $id_city;

        return $this;
    }

    /**
     * Get the value of postcode
     */ 
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set the value of postcode
     *
     * @return  self
     */ 
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get the value of city_name
     */ 
    public function getCity_name()
    {
        return $this->city_name;
    }

    /**
     * Set the value of city_name
     *
     * @return  self
     */ 
    public function setCity_name($city_name)
    {
        $this->city_name = $city_name;
        
        return $this;
    }
    
    /**
     * Get the value of id_department
     */ 
    public function getId_department()
    {
        return $this->id_department;
    }

    /**
     * Set the value of id_department
     *
     * @return  self
     */ 
    public function setId_department($id_department)
    {
        $this->id_department = $id_department;

        return $this;
    }

    static $info_tables = [
        'id_city' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'postcode' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => '',
            'pattern' => '(?:0[1-9]|[1-8]\d|9[0-8])\d{3}'
        ],
        'city_name' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'id_department' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'department_name'
        ]
    ];

}