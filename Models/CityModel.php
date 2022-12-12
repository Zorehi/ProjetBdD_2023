<?php
namespace App\Models;

class CityModel extends Model
{
    protected $id_city;
    protected $postcode;
    protected $city_name;

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_city";
        foreach($this as $champ => $valeur) {
            if($champ != 'db' && $champ != 'table' && $champ != 'idName' && $champ != 'champs' && $champ != 'password'){
                $this->champs[] = $champ;
            }
        }
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
}