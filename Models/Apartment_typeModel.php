<?php
namespace App\Models;

class Apartment_typeModel extends Model
{
    protected $id_apartment_type;
    protected $description;


    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_apartment_type";
        foreach($this as $champ => $valeur) {
            if($champ != 'db' && $champ != 'table' && $champ != 'idName' && $champ != 'champs' && $champ != 'password'){
                $this->champs[] = $champ;
            }
        }
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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}