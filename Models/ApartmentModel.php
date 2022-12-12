<?php
namespace App\Models;

class ApartmentModel extends Model
{
    protected $id_apartment;
    protected $num;
    protected $hab;
    protected $citizen_degree;
    protected $security_degree;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_apartment";
        foreach($this as $champ => $valeur) {
            if($champ != 'db' && $champ != 'table' && $champ != 'idName' && $champ != 'champs' && $champ != 'password'){
                $this->champs[] = $champ;
            }
        }
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
     * Get the value of security_degree
     */ 
    public function getSecurity_degree()
    {
        return $this->security_degree;
    }

    /**
     * Set the value of security_degree
     *
     * @return  self
     */ 
    public function setSecurity_degree($security_degree)
    {
        $this->security_degree = $security_degree;

        return $this;
    }
}