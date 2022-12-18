<?php
namespace App\Models;

class ApartmentModel extends Model
{
    protected $id_apartment;
    protected $num;
    protected $hab;
    protected $citizen_degree;
    protected $id_security;
    protected $id_house;
    protected $id_apartment_type;
    
    
    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_apartment";
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
     * Get the value of id_security
     */ 
    public function getId_security()
    {
        return $this->id_security;
    }

    /**
     * Set the value of id_security
     *
     * @return  self
     */ 
    public function setId_security($id_security)
    {
        $this->id_security = $id_security;

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
        'id_security' => [
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