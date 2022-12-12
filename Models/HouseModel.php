<?php
namespace App\Models;

class HouseModel extends Model
{
    protected $id_house;
    protected $house_name;
    protected $isolation_degree;
    protected $eval_eco;
    protected $citizen_degree;
    protected $street;
    protected $house_number;


    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_house";
        foreach($this as $champ => $valeur) {
            if($champ != 'db' && $champ != 'table' && $champ != 'idName' && $champ != 'champs' && $champ != 'password'){
                $this->champs[] = $champ;
            }
        }
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
     * Get the value of house_name
     */ 
    public function getHouse_name()
    {
        return $this->house_name;
    }

    /**
     * Set the value of house_name
     *
     * @return  self
     */ 
    public function setHouse_name($house_name)
    {
        $this->house_name = $house_name;

        return $this;
    }

    /**
     * Get the value of isolation_degree
     */ 
    public function getIsolation_degree()
    {
        return $this->isolation_degree;
    }

    /**
     * Set the value of isolation_degree
     *
     * @return  self
     */ 
    public function setIsolation_degree($isolation_degree)
    {
        $this->isolation_degree = $isolation_degree;

        return $this;
    }

    /**
     * Get the value of eval_eco
     */ 
    public function getEval_eco()
    {
        return $this->eval_eco;
    }

    /**
     * Set the value of eval_eco
     *
     * @return  self
     */ 
    public function setEval_eco($eval_eco)
    {
        $this->eval_eco = $eval_eco;

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
     * Get the value of street
     */ 
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @return  self
     */ 
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of house_number
     */ 
    public function getHouse_number()
    {
        return $this->house_number;
    }

    /**
     * Set the value of house_number
     *
     * @return  self
     */ 
    public function setHouse_number($house_number)
    {
        $this->house_number = $house_number;

        return $this;
    }
}